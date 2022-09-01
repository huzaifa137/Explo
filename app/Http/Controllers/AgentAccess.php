<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\agentregister;
use Illuminate\Support\Facades\DB;

class AgentAccess extends Controller
{
    public function agentlogin()
    {
        return view('agent-login');
    }

    public function agentregister()
    {
        return view('agent-register');
    }


    public function auth_agent_save(Request $request)
    {
        $Admin = new agentregister();

        $request->validate([
            'fname'=>'required|String',
            'lname'=>'required|String',
            'country'=>'required|String',
            'district'=>'required|String',
            'subcounty'=>'required|String',
            'village'=>'required|String',
            'responsibility'=>'required|String',
            'NIN'=>'required|String',
            'languages'=>'required|String',
            'email'=>'required|unique:agentregisters',
            'phonenumber'=>'required|min:10|max:10',
            'password'=>'required|min:5|max:12',
            'profile_photo'=>'required|mimes:jpg,jpeg,png,bmp',
            'National_id'=>'required|mimes:jpg,jpeg,png,bmp'
        ]);
        

        if($request->file('profile_photo'))
        {
            $file=$request->file('profile_photo');
            $filename1=date('YmdHi').$file->getClientOriginalName();
            $file->move(public_path('public/agent_profile_pic'),$filename1);
            $Admin['profile_photo']=$filename1;
        }
        

        if($request->file('National_id'))
        {
            $file=$request->file('National_id');
            $filename=date('YmdHi').$file->getClientOriginalName();
            $file->move(public_path('public/agent_national_id_pic'),$filename);
            $Admin['national_id']=$filename;
        }
        
        $Admin->fname = $request->input('fname');
        $Admin->lname = $request->input('lname');
        $Admin->country = $request->input('country');
        $Admin->district = $request->input('district');
        $Admin->subcounty = $request->input('subcounty');
        $Admin->village = $request->input('village');
        $Admin->responsibility = $request->input('responsibility');
        $Admin->NIN = $request->input('NIN');
        $Admin->languages = $request->input('languages');
        $Admin->email = $request->input('email');
        $Admin->phonenumber = $request->input('phonenumber');
        $Admin->password = Hash::make($request->input('password'));
        $save = $Admin->save();

        if($save)
        {
            return back()->with('success','Account created Successfully')
            ->with('fail','Account waiting for activation');
        }
        else
        {
            return back()->with('fail','Failed to create account');
        }
    }
    
        function agent_pass(Request $request)
        {
            if($userInfo = agentregister::all()
                        ->where('email','=',$request->email)
                        ->where('status','=','invalid')
                        ->first())
                        {
                            return back()->with('fail','Account not activated');    
                        } 

            $userInfo = agentregister::where('email','=',$request->email)->first();
            if(Hash::check($request->password,$userInfo->password))
                    {  
                    $request->session()->put('LoggedUser1',$userInfo->id); 
                    return redirect('Admin.AgentDashboard');
                    }
            else     
                {
                return back()->with('fail','incorrect password'); 
                }
        }

    public function auth_agent_check(Request $request)
    {
        $request->validate([
            'email'=>'required',
            'password'=>'required|min:5|max:12'
        ]);

        $userInfo = agentregister::where('email','=',$request->email)->first();

        if(!$userInfo)
        {
            return back()->with('fail','Email not registered');
        }

        else
        {    
            return $this->agent_pass($request);
        }
    }

    public function agent_logout()
    {
        if(session()->has('LoggedUser1'))
        {
            session()->pull('LoggedUser1');
            return redirect('auth.agent-login');
        }
    }

    public function agent_dashboard()
    {
        $data=['LoggedUser1'=>agentregister::where('id','=',session('LoggedUser1'))->first()];
        return view('Admin.AgentDashboard',$data);
    }

    public function Agentinformation()
    {
        $data=['LoggedUser1'=>agentregister::where('id','=',session('LoggedUser1'))->first()];
        foreach ($data as $key ) {
            $info=$key->id;
        }

        $infodata=DB::select('select * from agent_assigned_tasks');
        return view('Admin.Agentinformation',$data)->with('infodata',$infodata);
    }
}

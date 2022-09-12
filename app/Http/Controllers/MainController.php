<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\Admin;
use App\Models\addtask;
use Illuminate\Support\Facades\DB;


class MainController extends Controller
{
    public function login()
    {
        return view('login');
    }

    public function register()
    {
        return view('register');
    }

    public function authsave(Request $request)
    {
        $request->validate([
            'fname'=>'required',
            'email'=>'required|unique:Admins',
            'phonenumber'=>'required|min:10|max:10',
            'password'=>'required|min:5|max:12',
            'confirm_password'=>'required|min:5|max:12'
        ]);

        $password1=$request->input('password');
        $password2=$request->input('confirm_password');

        if(strcmp($password1,$password2)!=0)
        {
            return back()->with('fail','Password entered dont much');
        }
        $Admin = new Admin();
        $Admin->name = $request->input('fname');
        $Admin->email = $request->input('email');
        $Admin->phonenumber = $request->input('phonenumber');
        $Admin->password = Hash::make($request->input('password'));
        $save = $Admin->save();

        if($save)
        {
            return back()->with('success','Account created Successfully')
            ->with('fail','Account waiting for Activation');
        }
        else
        {
            return back()->with('fail','Failed to create account');
        }
    }
    
        function pass(Request $request)
        {
            if($userInfo = Admin::all()
                        ->where('email','=',$request->email)
                        ->where('status','=','invalid')
                        ->first())
                        {
                            return back()->with('fail','Account not activated');    
                        } 

            $userInfo = Admin::where('email','=',$request->email)->first();
            if(Hash::check($request->password,$userInfo->password))
                    {  
                    $request->session()->put('LoggedUser',$userInfo->id); 
                    return redirect('Admin.dashboard');
                    }
            else     
                {
                return back()->with('fail','incorrect email or password'); 
                }
        }

    public function authcheck(Request $request)
    {
        $request->validate([
            'email'=>'required',
            'password'=>'required|min:5|max:12'
        ]);

        $userInfo = Admin::where('email','=',$request->email)->first();

        if(!$userInfo)
        {
            return back()->with('fail','incorrect email or password');
        }

        else
        {    
            return $this->pass($request);
        }
    }

    public function logout()
    {
        if(session()->has('LoggedUser'))
        {
            session()->pull('LoggedUser');
            return redirect('auth.login');
        }
    }


        // LoggedIn Admin/Client page

        public function dashboard()
        {
            // $data=['LoggedUser'=>Admin::where('id','=',session('LoggedUser'))->first()];

            $data=['LoggedUser'=>Admin::where('id','=',session('LoggedUser'))->first()];
            foreach ($data as $key ) {
                $info=$key->id;
            }

            $infodata=addtask::all()->where('AdminId','=',$info);
            $info=$infodata->count();
            
            return view('Admin.login_dashboard',$data)->with('info',$info);

        }

        //LoggedIn Admin Pages
        public function addtask()
        {
            $data=['LoggedUser'=>Admin::where('id','=',session('LoggedUser'))->first()];
            return view('Admin.task',$data);
        }
        
        public function information()
        {            
            $data=['LoggedUser'=>Admin::where('id','=',session('LoggedUser'))->first()];
            foreach ($data as $key ) {
                $info=$key->id;
            }

            $infodata=DB::select('select * from addtasks where AdminId = ?', [$info]);
            return view('Admin.information',$data)->with('infodata',$infodata);
        }

    
    public function createTask(Request $request)
    {   
            $data=['LoggedUser'=>Admin::where('id','=',session('LoggedUser'))->first()];
            foreach ($data as $val) {
                $info=$val->id;
           }

             $request->validate([
            'taskname'=>'required',
            'agency'=>'required',
            'area'=>'required',
            'district'=>'required',
            'date'=>'required',
            'BusinessType'=>'required',
            'extraservices'=>'required',
            'questionnaire'=>'required'
        ]);  

        $addtask = new addtask(); 
        $addtask->name = $request->taskname;
        $addtask->agency = $request->agency;
        $addtask->area = $request->area;
        $addtask->district = $request->district;
        $addtask->date = $request->date;
        $addtask->questionnaire=$request->questionnaire;
        $addtask->BusinessType = $request->BusinessType;
        $addtask->AdminId= $info;
        $addtask->extraservices = $request->extraservices;

        $save = $addtask->save();
        
            if($save)
            {     
                return redirect()->back()->with('success','Task was added');
            }
            
        }

        public function deleteTask($id)
        {
            $erase_record = addtask::find($id);
            $erase_record->delete();
            return redirect()->back()->with('Deleted','Record has been deleted Successfully');
        }

        public function editTask($id)
        {
            $save = addtask::find($id);
            $data=['LoggedUser'=>Admin::where('id','=',session('LoggedUser'))->first()];
            return view('Admin.edit_information',$data)->with('save',$save);
        }
       
        public function updateTask(Request $request)
        {   
            $data=['LoggedUser'=>Admin::where('id','=',session('LoggedUser'))->first()];
            foreach ($data as $val) {
                $info=$val->id;
           }
            $addtask = addtask::find($request->id);
            
             $request->validate([
            'taskname'=>'required',
            'agency'=>'required',
            'area'=>'required',
            'district'=>'required',
            'date'=>'required',
            'BusinessType'=>'required',
            'extraservices'=>'required'
        ]);  

        $addtask->name = $request->taskname;
        $addtask->agency = $request->agency;
        $addtask->area = $request->area;
        $addtask->district = $request->district;
        $addtask->date = $request->date;
        $addtask->BusinessType = $request->BusinessType;
        $addtask->AdminId= $info;
        $addtask->extraservices = $request->extraservices;

        $save = $addtask->save();
        
            if($save)
            {     
                return redirect('Admin.information')->with('success','Task Updated Successfully');
            }
            
        }
    }   
<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\agentregister;
use Illuminate\Support\Facades\DB;
use App\Models\assignedTask;
use App\Models\submitted_result;
use Illuminate\Support\Str;
use App\Models\addtask;

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
            'confirm_password'=>'required|min:5|max:12',
            'profile_photo'=>'required|mimes:jpg,jpeg,png,bmp',
            'National_id'=>'required|mimes:jpg,jpeg,png,bmp'
        ]);
        
        $password1=$request->input('password');
        $password2=$request->input('confirm_password');

        if(strcmp($password1,$password2)!=0)
        {
            return back()->with('fail','Passwords entered dont much');
        }

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
                return back()->with('fail','Invalid email or password'); 
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
            return back()->with('fail','Invalid email or password');
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

        $data=['LoggedUser1'=>agentregister::where('id','=',session('LoggedUser1'))->first()];
            foreach ($data as $key ) {
                $info=$key->id;
            }

            $info_data=assignedTask::where([
                'AgentId'=> $info,
                'status'=>'assigned'
            ])->get();
    
            $info_data_complete=assignedTask::where([
                'AgentId'=> $info,
                'status'=>'completed'
            ])->get();

            $assigned_task =$info_data->count();
            $completed_task =$info_data_complete->count();

            // $infodata=addtask::all()->where('AdminId','=',$info);
            // $info=$infodata->count
        
        return view('Admin.AgentDashboard',$data)
        ->with('assigned_task',$assigned_task)
        ->with('completed_task',$completed_task);
    }

    public function agent_assigned_details($id)
    {
        $data=['LoggedUser1'=>agentregister::where('id','=',session('LoggedUser1'))->first()];
        $Task_info = assignedTask::find($id);
        
         return view('Owner.agent_assigned_details',$data)->with('Task_info',$Task_info);
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

    public function submitTask($id)
    {
        $info_data = assignedTask::find($id);
         
         return view('Result_Information',compact('info_data',$info_data));
    }   


        public function SubmitResults(Request $request)
        {
             $info = new submitted_result();

            $UpdateAssigned=$request->AgentIdHidden;

            $info->TaskName= $request->TaskName;
            $info->AgentName= $request->AgentName;
            $request->survey_options;
            $data= collect($request->survey_options)->implode(',');
            $info->Details= $data;
            $saved = $info->save();

            
          $updates = DB::select('select TaskId from assigned_tasks where TaskId = ?',[$UpdateAssigned]);

         foreach ($updates as $key) {
              $data=$key->TaskId;
         }
         $save=addtask::where('id',$data)->update(['status'=>'completed']);
         $save1=assignedTask::where('Taskid',$data)->update(['status'=>'completed']);
            

         return Redirect()->route('Admin.AgentDashboard');
        }

        public function ResultsData()
        {
            return view('Result_Information');
        }

        public function DisplaySubmittedRecords()
        {
            $submittedInfo = DB::table('submitted_results')->get();
            return view('testpage',compact('submittedInfo',$submittedInfo));
        }
      
        public function showId($id)
        {
            $data= submitted_result::find($id);
            $detail= $data->Details;

            $final = Str::replace(',',' ',$detail);
            $result = preg_split('/\s+/', $final, -1, PREG_SPLIT_NO_EMPTY);
            

            foreach ($result as $key => $value) {
               echo $key .'=>'. $value;

               echo '<br>';
            }
        }
}

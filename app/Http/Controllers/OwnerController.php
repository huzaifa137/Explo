<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\owner;
use App\Models\Admin;
use App\Models\assignedTask;
use App\Models\addtask;
use App\Models\agentregister;
use Illuminate\Support\Facades\DB;

class OwnerController extends Controller
{
    public function owner_login()
    {
        return view('ownerlogin');
    }

    public function owner_register()
    {
        return view('owner-register');
    }

    public function ownerTaskInfo()
    {
        return view('Owner.ownertasks');
    }

    public function ownerdashboard()
    {
        $data=['Loggedowner'=>owner::where('id','=',session('Loggedowner'))->first()];
        return view('ownerdashboard',$data);
    }

    public function clients_info() 
    {
        $data=['Loggedowner'=>owner::where('id','=',session('Loggedowner'))->first()];
        $infodata = Admin::all();
        return view('Owner.clients',$data)->with('infodata',$infodata);
    }

    public function agents_info()
    {
        $data=['Loggedowner'=>owner::where('id','=',session('Loggedowner'))->first()];
        $info_data= agentregister::all();

        return view('Owner.agents',$data)->with('info_data',$info_data);
    }

    public function tasks_info()
    {
        $data=['Loggedowner'=>owner::where('id','=',session('Loggedowner'))->first()];
        $info_data= addtask::all();

        return view('owner.ownertasks',$data)->with('info_data',$info_data);
    }

    //Owner dashboard ----> Tasks Table

    public function TaskInfo($id)
    {
        $data=['Loggedowner'=>owner::where('id','=',session('Loggedowner'))->first()];
        $Task_info = addtask::find($id);

        return view('owner.TaskInfo',$data)->with('Task_info',$Task_info);
    }

    public function submitTask($id)
    {
        $info_data = assignedTask::find($id);

         $updates = DB::select('select TaskId from assigned_tasks where TaskId = ?',[$info_data->TaskId]);

         foreach ($updates as $key) {
            $data=$key->TaskId;
         }

         $save=addtask::where('id',$data)->update(['status'=>'completed']);
         $save1=assignedTask::where('Taskid',$data)->update(['status'=>'completed']);
         
         return Redirect()->route('Admin.AgentDashboard');
    }   

    public function TaskEdit($id)
    {
        $save = addtask::find($id);
        $data=['Loggedowner'=>owner::where('id','=',session('Loggedowner'))->first()];

        return view('owner.ownerTaskEdit',$data)->with('save',$save);
    }

    public function updateTask(Request $request)
        {   
            $data=['Loggedowner'=>owner::where('id','=',session('Loggedowner'))->first()];
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
                return redirect()->back()->with('success','Task Updated Successfully');
            }
        }

    public function deleteTask($id)
    {
        $data = addtask::find($id);
        $data->delete();
        return redirect()->back()->with('Deleted','The Task has been deleted ');
    }

    //Owner dashboard ----> Agent Table

    public function agent_assigned_details($id)
    {
        $data=['Loggedowner'=>owner::where('id','=',session('Loggedowner'))->first()];
        $Task_info = assignedTask::find($id);

         return view('owner.agent_assigned_details',$data)->with('Task_info',$Task_info);
    }


    public function delete_agent($id)
    {
        $agent_data = agentregister::find($id);
        $agent_data->delete();

        return redirect()->back()->with('Deleted','The Agent has been deleted Successfully');
    }

    public function edit_agent($id)
    {
        $save=agentregister::find($id);
        
        return view('owner.ownerAgentEdit')->with('save',$save);
    }

    public function auth_owner_save(Request $request)
    {
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
            'email'=>'required',
            'status'=>'required|String',
        ]);

        $Admin = agentregister::find($request->id);
        
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
        $Admin->status = $request->input('status');
        $save = $Admin->save();

        if($save)
        {     
            return redirect()->back()->with('success','Agent Updated Successfully');
        }
    }

    public function view_agent($id)
    {
        $data=['Loggedowner'=>owner::where('id','=',session('Loggedowner'))->first()];
        $agent_data =agentregister::find($id);

        return view('Owner.view_agent_details',$data)->with('agent_data',$agent_data);
    }

    /* Owner dashboard--> Client Table */
    public function edit_client($id)
    {
        $save = Admin::find($id);
        
        return view('Owner.ownerClientEdit')->with('save',$save);
    }

    public function owner_client_insert(Request $request)
    {
        $request->validate([
            'name'=>'required',
            'email'=>'required',
        ]);

        $Admin = Admin::find($request->id);

        $Admin->name = $request->input('name');
        $Admin->email = $request->input('email');
        $Admin->status= $request->input('status');
        $save = $Admin->save();

        if($save)
        {
            return back()->with('success','Account Updated Successfully');
        }
    }

    public function delete_client($id)
    {
        $data = Admin::find($id);
        $data->delete();

        return redirect()->back()->with('Deleted','The Client has been deleted Successfully');
    }

    //unActivated Accounts

    public function client_unactivated()
    {
        $data=['Loggedowner'=>owner::where('id','=',session('Loggedowner'))->first()];
        $info = DB::select('select * from admins where status = ? ',['invalid']);

        return view('owner.clientnotactivated',$data)->with('infodata',$info);
    }

    public function delete_unactive($id)
    {
        $data = Admin::find($id);
        $data->delete();
        
        return redirect()->back()->with('deleted','Client has been deleted successfully');
    }

    public function agent_unactivated()
    {
     
        $data=['Loggedowner'=>owner::where('id','=',session('Loggedowner'))->first()];
        $infodata = DB::select('select * from agentregisters where status = ?',['invalid']);
        return view('owner.agentnotactivated',$data)->with('infodata',$infodata);
    }

    // Creating a new owner in database
    public function create_owner(Request $request)
    {
        $request->validate([
            'fname'=>'required',
            'email'=>'required|unique:owners',
            'phonenumber'=>'required|min:10|max:10',
            'password'=>'required|min:5|max:12',
            'confirm_password'=>'required|min:5|max:12'
        ]);

            $password1=$request->input('password');
            $password2=$request->input('confirm_password');

            if(strcmp($password1,$password2)!=0)
            {
                return back()->with('fail','Passwords entered dont much');
            }
                $Admin = new owner();
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
    
    public function verify(Request $request)
    {
        if($userInfo = owner::all()
                        ->where('email','=',$request->email)
                        ->where('status','=','invalid')
                        ->first())
                        {
                            return back()->with('fail','Account not activated');    
                        } 

            $userInfo = owner::where('email','=',$request->email)->first();
            if(Hash::check($request->password,$userInfo->password))
                    {  
                    $request->session()->put('Loggedowner',$userInfo->id); 
                    return redirect('owner.dashboard');
                    }
            else     
                {
                return back()->with('fail','invalid email or password'); 
                }   
    }

    public function owner_auth(Request $request)
    {
        $request->validate([
            'email'=>'required',
            'password'=>'required|min:5|max:12'
        ]);

        $userInfo = owner::where('email','=',$request->email)->first();

        if(!$userInfo)
        {
            return back()->with('fail','invalid email or password');
        }

        else
        {    
            return $this->verify($request);
        }
    }

    public function owner_logout()
    {
        if(session()->has('Loggedowner'))
        {
            session()->pull('Loggedowner');
            return redirect('owner.login');
        }
    }


    public function assign_task()
    {
        $data = ['Loggedowner'=>owner::where('id','=',session('Loggedowner'))->first()];
        
        $agent_info = agentregister::all();
        $task_info  = DB::select('select * from addtasks where status = ?', ['unassigned']);

        return view('Owner.AssignTask',$data)->with('agent_info',$agent_info)->with('task_info',$task_info);
    }

    public function updateTasksTable(Request $request)
    {
        $taskupdate = DB::select('select id from addtasks where id = ?',[$request->task_name]);
        foreach ($taskupdate as $info) {    
            $data=$info->id;
        }

        $save=addtask::where('id',$data)->update(['status'=>'assigned']);
    }   

    public function agent_assign_task(Request $request)
    {
        $info= session()->get('LoggedUser1',$request->agent_name);

        $data=['LoggedUser1'=>agentregister::where('id','=',session('LoggedUser1'))->first()];

        $info_data=assignedTask::where([
            'AgentId'=> $info,
            'status'=>'assigned'
        ])->get();


        return view('Owner.AllTasks',$data)->with('info_data',$info_data);
    }


    public function agent_completed_task(Request $request)
    {
        $info= session()->get('LoggedUser1',$request->agent_name);

        $data=['LoggedUser1'=>agentregister::where('id','=',session('LoggedUser1'))->first()];

        $info_data=assignedTask::where([
            'AgentId'=> $info,
            'status'=>'completed'
        ])->get();


        return view('Owner.completed',$data)->with('info_data',$info_data);
    }

    public function Taskdelete($id)
    {
        $data= addtask::find($id);
        $data->delete();

        return redirect()->back()->with('success','Task has been deleted successfully');
    }

    public function agent_details()
    {   
        $data=['Loggedowner'=>owner::where('id','=',session('Loggedowner'))->first()];
        $info_data=DB::select('select * from assigned_tasks where status = ?',['assigned']);

        return view('Owner.assignedTasks',$data)->with('info_data',$info_data);
    }

    // public function view_assigned_tasks($id)
    // {
    //     return assignedTask::find($id);
    // }

    public function Task_assigned(Request $request)
    {
        $request->validate([
            'agent_name'=>'required',
            'task_name'=>'required',
            'start_date'=>'required',
            'submission_date'=>'required'
        ]);

        $agentname = DB::select('select fname from agentregisters where id = ?',[$request->agent_name]);
        $agentemail = DB::select('select email from agentregisters where id = ?',[$request->agent_name]);
        $AgentDistrict = DB::select('select district from agentregisters where id = ?',[$request->agent_name]);
        $taskname = DB::select('select name from addtasks where id = ?',[$request->task_name]);
        $taskid = DB::select('select id from addtasks where id = ?',[$request->task_name]);
        $Agentname = DB::select('select id from agentregisters where id = ?',[$request->agent_name]);

        foreach ($taskid as $keys) {
            $task_id=$keys->id;
        }

        foreach ($Agentname as $keys) {
            $Agentid=$keys->id;
        }

        foreach ($agentname as $key ) {
            $infoname=$key->fname;
        }

        foreach ($agentemail as $key ) {
            $infoemail=$key->email;
        }

        foreach ($AgentDistrict as $key ) {
            $infodistrict=$key->district;
        }

        foreach ($taskname as $key ) {
            $infotaskname=$key->name;
        }
        $assign = new assignedTask();

        $assign->AgentName = $infoname;
        $assign->email = $infoemail;
        $assign->district = $infodistrict;
        $assign->TaskName = $infotaskname;
        $assign->startdate = $request->input('start_date');
        $assign->Submission_date = $request->input('submission_date');
        $assign->AgentId=$Agentid;
        $assign->TaskId=$task_id;
        $save = $assign->save();
        
        $this->updateTasksTable($request);

        if($save)
        {
            return redirect()->back()->with('success','Task has been assigned Successfully');

        }
        else
        {
            return redirect()->back()->with('fail','Task has not been assigned !!!');
    
        }

    }
}

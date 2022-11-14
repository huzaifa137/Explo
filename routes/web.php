<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AgentController;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\MainController;
use App\Http\Controllers\AgentAccess;
use App\Http\Controllers\OwnerController;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::view('/','index')->name('homepage');
Route::view('about','about');
Route::view('pricing','pricing');
Route::view('contact','contact');
Route::view('services','services');
Route::view('register','register');
Route::view('get-a-quote', 'get-a-quote');
Route::view('Agent-login', 'Agent-login');
Route::view('client-login','client-login');
Route::view('questionnaire','questionnaire');
Route::view('Agent-register', 'Agent-register');
Route::view('client-register','client-register');
Route::view('service-details', 'service-details');


// -------------------------------------Client login and Registration----------------------------------------
// ----------------------------------------------------------------------------------------------------------
// ----------------------------------------------------------------------------------------------------------

Route::post('auth.save',[MainController::class,'authsave'])->name('auth.save');
Route::post('auth/check',[MainController::class,'authcheck'])->name('auth.check');
Route::get('auth.logout',[MainController::class,'logout'])->name('auth.logout');


Route::group(['middleware'=>'AuthCheck'],function (){

    Route::get('Admin.dashboard',[MainController::class,'dashboard'])->name('Admin.dashboard');
    Route::get('Admin.addtask',[MainController::class,'addtask'])->name('Admin.addtask');
    Route::get('Admin.information',[MainController::class,'information'])->name('Admin.information');
    Route::get('auth.login',[MainController::class,'login'])->name('auth.login');
    Route::get('auth.register',[MainController::class,'register'])->name('auth.register');
    Route::get('delete-task/{id}',[MainController::class,'deleteTask']);
    Route::get('edit-task/{id}',[MainController::class,'editTask'])->name('edit-task');
   
});

Route::post('task-now',[MainController::class,'updateTask'])->name('task-now');
Route::post('create-task',[MainController::class,'createTask'])->name('create-task');

// -------------------------------------Agent login and Registration-----------------------------------------
// ----------------------------------------------------------------------------------------------------------
// ----------------------------------------------------------------------------------------------------------

Route::post('auth.agent-save',[AgentAccess::class,'auth_agent_save'])->name('auth.agent-save');
Route::post('auth.agent-check',[AgentAccess::class,'auth_agent_check'])->name('auth.agent-check');
Route::get('auth.agent-logout',[AgentAccess::class,'agent_logout'])->name('auth.agent-logout');
Route::post('store',[AgentAccess::class,'SubmitResults'])->name('store');

Route::group(['middleware'=>'AgentAuthCheck'],function (){

    Route::get('Admin.AgentDashboard',[AgentAccess::class,'agent_dashboard'])->name('Admin.AgentDashboard');
    Route::get('auth.agent-login',[AgentAccess::class,'agentlogin'])->name('auth.agent-login');
    Route::get('auth.agent-register',[AgentAccess::class,'agentregister'])->name('auth.agent-register');
    Route::get('Agent.information',[MainController::class,'Agentinformation']);
    Route::get('All-assigned-Tasks',[OwnerController::class,'agent_assign_task'])->name('All-assigned-Tasks');
    Route::get('All-completed-Tasks',[OwnerController::class,'agent_completed_task'])->name('All-completed-Tasks');
    Route::get('agent-assigned-details/{id}',[AgentAccess::class,'agent_assigned_details']);
    Route::get('submission',[AgentAccess::class,'ResultsData']);
    Route::get('displayRecords',[AgentAccess::class,'DisplaySubmittedRecords']);
    Route::get('editrecord/{id}',[AgentAccess::class,'showId']);
    Route::get('owner.submit/{id}',[AgentAccess::class,'submitTask']);
});


// ------------------------------------Admin Dashboard Login------------------------------------
// ----------------------------------------------------------------------------------------------------------
// ----------------------------------------------------------------------------------------------------------

    Route::post('auth.owner',[OwnerController::class,'owner_auth'])->name('auth.owner');
    Route::post('create.owner',[OwnerController::class,'create_owner'])->name('create.owner');
    Route::get('owner.logout',[OwnerController::class,'owner_logout'])->name('owner.logout');

Route::group(['middleware'=>'OwnerCheck'],function (){

    Route::get('owner.dashboard',[OwnerController::class,'ownerdashboard'])->name('owner.dashboard');
    Route::get('owner.login',[OwnerController::class,'owner_login'])->name('owner.login');
    Route::get('owner.register',[OwnerController::class,'owner_register'])->name('owner.register');
    Route::get('owner.client-info',[OwnerController::class,'clients_info'])->name('owner.client-info');
    Route::get('owner.agent-info',[OwnerController::class,'agents_info'])->name('owner.agent-info');
    Route::get('owner.task-info',[OwnerController::class,'tasks_info'])->name('owner.task-info');
    Route::get('task-delete/{id}',[OwnerController::class,'Taskdelete']);
    Route::get('owner.clientEdit/{id}',[OwnerController::class,'edit_client']);
    Route::get('owner.delete_unactive/{id}',[OwnerController::class,'delete_unactive']);    
    Route::get('owner.unactivated-clients',[OwnerController::class,'client_unactivated'])->name('owner.unactivated-clients');
    Route::get('owner.unactivated-agents',[OwnerController::class,'agent_unactivated'])->name('owner.unactivated-agents');
    Route::get('owner.taskinfo/{id}',[OwnerController::class,'TaskInfo']);
    Route::get('agent-assigned-records/{id}',[OwnerController::class,'agent_assigned_records']);
    Route::get('owner.TaskInfo',[OwnerController::class,'ownerTaskInfo'])->name('owner.TaskInfo');
    Route::get('owner.taskdelete/{id}',[OwnerController::class,'deleteTask']);
    Route::get('owner.agent-delete/{id}',[OwnerController::class,'delete_agent']);
    Route::get('owner.agent-edit/{id}',[OwnerController::class,'edit_agent']);
    Route::get('owner.agent-view/{id}',[OwnerController::class,'view_agent']);
    Route::get('owner.taskedit/{id}',[OwnerController::class,'ownerTaskEdit']);
    Route::get('assign-task',[OwnerController::class,'assign_task'])->name('assign.task');
    Route::get('owner-assigned-tasks',[OwnerController::class,'agent_details'])->name('owner-assigned-tasks');
    Route::get('owner-SubmittedTasks',[OwnerController::class,'submittedRecords'])->name('owner-SubmittedTasks');
    Route::get('agent-submitted-records/{id}',[OwnerController::class,'agent_submitted_records']);
});


Route::post('task-update',[OwnerController::class,'updateTask'])->name('task-updatedd');
Route::post('owner-save',[OwnerController::class,'auth_owner_save'])->name('owner-save');
Route::post('owner-client-save',[OwnerController::class,'owner_client_insert'])->name('owner-client-save');
Route::post('final-assign',[OwnerController::class,'Task_assigned'])->name('final-assign');





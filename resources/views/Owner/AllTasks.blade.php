@extends('layouts.AgentDashboardmenu')
@section('content')
<div class="main-panel">
    <div class="content-wrapper">
      <div class="page-header">
        <h3 class="page-title"> Assigned Tasks</h3>
      </div>

      <script>
          var $msg='{{Session::get('Deleted')}}';
          var $comp ='{{Session::has('Deleted')}}';
          if($comp)
          {
            alert($msg);
          }
      </script>

      <div class="row">
        <div class="col-lg-12 stretch-card">
          <div class="card">
            <div class="card-body">
              <h4 class="card-title">Assigned Tasks Information</h4>
              <table class="table table-bordered">
                <thead>
                  <tr>
                    <th>Agent Name </th>
                    <th>Task Name </th>
                    <th>District</th>
                    <th>Start date </th>
                    <th>Submission date</th>
                    <th>Email</th>
                    <th>Status</th>
                    <th>View</th>
                  </tr>
                </thead>
                <tbody>

                  @foreach ($info_data as $info)

                  <tr class="table-info" >
                    <td> {{$info->AgentName}} </td>  
                    <td> {{$info->TaskName}} </td>
                    <td> {{$info->district}}</td>
                    <td> {{$info->startdate}} </td>
                    <td> {{$info->Submission_date}} </td>
                    <td> {{$info->email}} </td>
                    <td><a class="btn btn-success btn-fw">{{$info->status}}</a></td>
                    <td><a class="btn btn-primary" href="{{'owner.taskinfo/'.$info->id}}"> View</a></td>
                  </tr>
                  @endforeach


                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
    </div>
@endsection
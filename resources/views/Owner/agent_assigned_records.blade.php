@extends('Owner.OwnerDashboardMenu')
@section('content')
<div class="main-panel">
    <div class="content-wrapper">
      <div class="page-header">
        <h3 class="page-title"> Assigned Tasks Details :</h3>
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
        <table class="table">
          <thead>
          <tr>
            <td> <span style="font-weight:bold">AgentName</span>     :  {{$Task_info->AgentName}} </td>
            <td><span style="font-weight:bold">TaskName</span>     :  {{$Task_info->TaskName}} </td>
          </tr>
            <tr>
                <td><span style="font-weight:bold">Status</span>              :  {{$Task_info->status}} </td>
             <td><span style="font-weight:bold">District</span>    :  {{$Task_info->district}} </td>
          </tr>
            <tr>
              <td><span style="font-weight:bold">Start date</span>    :  {{$Task_info->startdate}} </td>
              <td><span style="font-weight:bold">Submission date</span>     :  {{$Task_info->Submission_date}} </td>
          </tr>
          </thead>
        </table>
      </div>
    </div>
  </div>
</div>
    </div>
@endsection
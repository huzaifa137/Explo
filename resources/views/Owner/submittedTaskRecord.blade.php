@extends('Owner.OwnerDashboardMenu')
@section('content')
<div class="main-panel">
    <div class="content-wrapper">
      <div class="page-header">
        <h3 class="page-title"> Submitted Task Details :</h3>
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
          </thead>
        </table>
        <br>  
        <tr>
            <td><span style="font-weight:bold;color:black;"> Details</span>  <span style="color: black;"> :  {{$Task_info->Details}}</span></td>
        </tr>  
      </div>
    </div>
  </div>
</div>
    </div>
@endsection
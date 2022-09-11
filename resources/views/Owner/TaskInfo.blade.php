@extends('Owner.OwnerDashboardMenu')
@section('content')
<div class="main-panel">
    <div class="content-wrapper">
      <div class="page-header">
        <h3 class="page-title"> Task Details : </h3>
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
                  <td> <span style="font-weight:bold">Task Name</span>     :  {{$Task_info->name}} </td>
                  <td><span style="font-weight:bold">Agency</span>     :  {{$Task_info->agency}} </td>
                </tr>
                  <tr>
                   <td><span style="font-weight:bold">Area</span>       :  {{$Task_info->area}} </td>
                   <td><span style="font-weight:bold">District</span>    :  {{$Task_info->district}} </td>
                </tr>
                  <tr>
                    <td><span style="font-weight:bold">Date</span>    :  {{$Task_info->date}} </td>
                    <td><span style="font-weight:bold">Business Type</span>     :  {{$Task_info->BusinessType}} </td>
                </tr>
                  <tr>
                    <td><span style="font-weight:bold">Extra Servicves</span>   :  {{$Task_info->extraservices}} </td>
                    <td><span style="font-weight:bold">Status</span>              :  {{$Task_info->status}} </td>
                </tr>
                </thead>
              </table>
            </div>
          </div>
        </div>
      </div>
    </div>
@endsection
@extends('Owner.OwnerDashboardMenu')
@section('content')
<div class="main-panel">
    <div class="content-wrapper">
      <div class="page-header">
        <h3 class="page-title"> Agent Details : </h3>
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
              <h4 class="card-title">{{$agent_data['fname']}} {{$agent_data['lname']}}'s  Information.</h4>
              <table class="table">
                <thead>
                <tr>
                  <td> <span style="font-weight:bold">First Name</span>     :  {{$agent_data->fname}} </td>
                  <td><span style="font-weight:bold">Last Name</span>     :  {{$agent_data->lname}} </td>
                </tr>
                  <tr>
                   <td><span style="font-weight:bold">County</span>       :  {{$agent_data->country}} </td>
                   <td><span style="font-weight:bold">subcounty</span>    :  {{$agent_data->subcounty}} </td>
                </tr>
                  <tr>
                    <td><span style="font-weight:bold">District</span>    :  {{$agent_data->district}} </td>
                    <td><span style="font-weight:bold">Village</span>     :  {{$agent_data->village}} </td>
                </tr>
                  <tr>
                    <td><span style="font-weight:bold">responsibility</span>   :  {{$agent_data->responsibility}} </td>
                    <td><span style="font-weight:bold">NIN</span>              :  {{$agent_data->NIN}} </td>
                </tr>
                  <tr>
                    <td><span style="font-weight:bold">national id</span>    : <img src="{{ url('public/agent_national_id_pic/'.$agent_data->national_id) }}" alt="image"> </td>
                    <td><span style="font-weight:bold">profile photo</span>  : <img src="{{url('public/agent_profile_pic/'.$agent_data->profile_photo)}}" alt="profile_pic"> </td>
                </tr>
                <tr>
                    <td><span style="font-weight:bold">languages</span>    :  {{$agent_data->languages}}</td>
                    <td><span style="font-weight:bold">Email</span>      : {{$agent_data->email}}</td>
                </tr>

                <tr>
                    <td><span style="font-weight:bold">Status</span>    :  {{$agent_data->status}}</td>
                </tr>
                </thead>
              </table>
            </div>
          </div>
        </div>
      </div>
    </div>
@endsection
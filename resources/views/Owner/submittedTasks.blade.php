@extends('Owner.OwnerDashboardMenu')
@section('content')
<div class="main-panel">
    <div class="content-wrapper">
      <div class="page-header">
        <h3 class="page-title"> Submitted Tasks</h3>
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
              <h4 class="card-title">Submitted Tasks Information</h4>
              <table class="table table-bordered">
                <thead>
                  <tr>
                    <th>TaskName </th>
                    <th>AgentName </th>
                    <th>Details</th>
                    <th>View</th>
                  </tr>
                </thead>
                <tbody>

                  @foreach ($info_data as $info)

                  <tr class="table-info" >
                    <td> {{$info->TaskName}} </td>  
                    <td> {{$info->AgentName}} </td>
                    <td> {{$info->Details}}</td>
                    <td><a class="btn btn-success" href="{{'agent-submitted-records/'.$info->id}}">View</a></td>
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
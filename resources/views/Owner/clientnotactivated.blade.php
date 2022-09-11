@extends('Owner.OwnerDashboardMenu')
@section('content')
<div class="main-panel">
    <div class="content-wrapper">
      <div class="page-header">
        <h3 class="page-title"> Client information </h3>
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
              <h4 class="card-title">Clients Data</h4>
              <table class="table table-bordered">
                <thead>
                  <tr>
                    <th>Client Name </th>
                    <th>Email </th>
                    <th>phone number</th>
                    <th>Status</th>
                    <th>Edit</th>
                    <th>Delete</th>
                  </tr>
                </thead>
                <tbody>

                  @foreach ($infodata as $info)
                  <tr class="table-info">
                    <td> {{$info->name}} </td>
                    <td> {{$info->email}}</td>
                    <td> {{$info->phonenumber}} </td>
                    <td> <a class="btn btn-warning">{{$info->status}}</a></td>
                    <td><a class="btn btn-primary" href="{{'owner.clientEdit/'.$info->id}}"> Edit</a></td>
                    <td><a class="btn btn-danger" href="{{'owner.delete_unactive/'.$info->id}}">Delete</a></td>
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
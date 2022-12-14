@extends('Owner.OwnerDashboardMenu')
@section('content')
<div class="main-panel">
    <div class="content-wrapper">
      <div class="page-header">
        <h3 class="page-title"> Task information </h3>
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
              <h4 class="card-title">Tasks information</h4>
              <table class="table table-bordered">
                <thead>
                  <tr>
                    <th> Id </th>
                    <th>Task Name </th>
                    <th> Agency </th>
                    <th> Area </th>
                    <th> District </th>
                    <th>Business Type</th>
                    <th>Extra Services</th>
                    <th>Details</th>
                    <th>Edit</th>
                    <th>Delete</th>
                  </tr>
                </thead>
                <tbody>

                  @foreach ($info_data as $info)
                  <tr class="table-info">
                    <td> {{$info->id}}</td>
                    <td> {{$info->name}} </td>
                    <td> {{$info->agency}}</td>
                    <td> {{$info->area}} </td>
                    <td> {{$info->district}} </td>
                    <td> {{$info->BusinessType}} </td>
                    <td> {{$info->extraservices}} </td>
                    <td><a class="btn btn-success" href="{{'owner.taskinfo/'.$info->id}}"> View</a></td>
                    <td><a class="btn btn-primary" href="{{'owner.taskedit/'.$info->id}}"> Edit</a></td>
                    {{-- <td><a class="btn btn-danger" href="{{'task-delete/'.$info->id}}">Delete</a></td> --}}
                    <td><a class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this Task ?')" href="{{'task-delete/'.$info->id}}">Delete</i></a></td>
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
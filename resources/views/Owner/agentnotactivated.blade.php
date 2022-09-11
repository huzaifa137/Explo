@extends('Owner.OwnerDashboardMenu')
@section('content')
<div class="main-panel">
    <div class="content-wrapper">
      <div class="page-header">
        <h3 class="page-title"> Agents information </h3>
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
              <h4 class="card-title">Agents data</h4>
              <table class="table table-bordered">
                <thead>
                  <tr>
                    <th>Name </th>
                    <th>Village</th>
                    <th>NIN</th>
                    <th>national id</th>
                    <th>Email</th>
                    <th>number</th>
                    <th>status</th>
                    <th>Details</th>
                    <th>Edit</th>
                    <th>Delete</th>
                  </tr>
                </thead>
                <tbody>

                  @foreach ($infodata as $info)
                  <tr class="table-info">
                    <td> {{$info->fname}}</td>
                    <td> {{$info->village}} </td>
                    <td> {{$info->NIN}} </td>
                    <td> <img src="{{ url('public/agent_national_id_pic/'.$info->national_id) }}" alt="image"> </td>
                    <td> {{$info->email}} </td>
                    <td> {{$info->phonenumber}} </td>
                    <td> <a class="btn btn-warning">{{$info->status}} </a></td>
                    <td><a class="btn btn-success" href="{{'owner.agent-view/'.$info->id}}"> view</a></td>
                    <td><a class="btn btn-primary" href="{{'owner.agent-edit/'.$info->id}}"> Edit</a></td>
                    <td><a class="btn btn-danger" href="{{'owner.agent-delete/'.$info->id}}">Delete</a></td>
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
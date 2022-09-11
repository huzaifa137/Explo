<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{asset('bootstrap/css/bootstrap.min.css')}}">
    <title>Document</title>
</head>
<body>
    <div class="container">
        <div class="row">
            <div class="col-md-6 offset-md-3">
                <div class="signup-form">
                    <form action="{{route('final-assign')}}" class="mt-5 border p-4 bg-light shadow" method="POST">
                        @csrf
                        <h4 class="mb-5 text-secondary">Assign a Task to an Agent</h4>
                        @if (Session::get('success'))
                            <div class="alert alert-success">
                                {{Session::get('success')}}
                            </div>
                        @endif

                        @if (Session::get('fail'))
                            <div class="alert alert-danger">
                                {{Session::get('fail')}}
                            </div>
                        @endif
                        {{-- <input type="hidden" name="id" value="{{$save->id}}"> --}}
                        <div class="row">
                            <div class="mb-3 col-md-6">
                                <label>Agent Name<span class="text-danger">*</span></label>
                                <select class="form-select" aria-label="Default select example" name="agent_name">
                                    <option value="">Select Agent Name</option>
                                    @foreach ($agent_info as $info)
                                    <option value="{{$info->id}}">{{$data=$info->fname}}</option>
                                    @endforeach
                                  </select>
                                  <span class="text-danger">@error('agent_name'){{$message}}@enderror</span>
                            </div>
                            
                             <div class="mb-3 col-md-6">
                                <label>Task Name<span class="text-danger">*</span></label>
                                <select class="form-select" aria-label="Default select example" name="task_name">
                                    <option value=" ">Select Task Name</option>
                                    @foreach ($task_info as $info)
                                    <option value="{{$info->id}}">{{$info->name}}</option>
                                    @endforeach
                                  </select>
                                <span class="text-danger">@error('task_name'){{$message}}@enderror</span>
                            </div>
                            
                            <div class="mb-3 col-md-6">
                                <label>Start date<span class="text-danger">*</span></label>
                                <input type="date" name="start_date" class="form-control" placeholder="Enter responsibility" value="chairman">
                                <span class="text-danger"></span>
                                <span class="text-danger">@error('start_date'){{$message}}@enderror</span>
                            </div>

                            <div class="mb-3 col-md-6">
                                <label>Last-submission-date<span class="text-danger">*</span></label>
                                <input type="date" name="submission_date" class="form-control" placeholder="Enter responsibility" value="chairman">
                                <span class="text-danger"></span>
                                <span class="text-danger">@error('submission_date'){{$message}}@enderror</span>
                            </div>

                            <div class="col-md-12">
                               <button class="btn btn-primary float-end">Assign</button>
                            </div>
                        </div>
                    </form>
                    <p class="text-center mt-3 text-secondary">Return back to <a href="{{route('owner.dashboard')}}">Dashboard</a></p>                   
                </div>
            </div>
        </div>
    </div>
</body>
</html>
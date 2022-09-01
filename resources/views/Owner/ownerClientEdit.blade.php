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
                    <form action="{{route('owner-client-save')}}" class="mt-5 border p-4 bg-light shadow" method="POST">
                        @csrf
                        <h4 class="mb-5 text-secondary">Update a Business Account</h4>
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
                        <input type="hidden" name="id" value="{{$save->id}}">
                        <div class="row">
                            <div class="mb-3 col-md-12">
                                <label>Business Name<span class="text-danger">*</span></label>
                                <input type="text" name="name" class="form-control" placeholder="Enter Business Name" value="{{$save->name}}">
                                <span class="text-danger">@error('name'){{$message}}@enderror</span>
                            </div>
    
                            <div class="mb-3 col-md-12">
                                <label>Email<span class="text-danger">*</span></label>
                                <input type="email" name="email" class="form-control" placeholder="Enter Email" value="{{$save->email}}">
                                <span class="text-danger">@error('email'){{$message}}@enderror</span>
                            </div>
    
                            <div class="mb-3 col-md-12">
                                <label>Status<span class="text-danger">*</span></label>
                                <input type="text" name="status" class="form-control" placeholder="Enter status" value="{{$save->status}}">
                            </div>
                            <div class="col-md-12">
                               <button class="btn btn-primary float-end">Update</button>
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
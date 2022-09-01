<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{asset('bootstrap/css/bootstrap.min.css')}}">
    <title>Agent-login</title>
</head>
<body>
    
    <div class="container">
        <div class="row">
            <div class="col-md-6 offset-md-3">
                <div class="signup-form">
                    <form action="{{route('auth.agent-check')}}" class="mt-5 border p-4 bg-light shadow" method="POST">
                        @csrf
                        <h4 class="mb-5 text-secondary">Login into Agent Account</h4>
                        @if (Session::get('fail'))
                           <div class="alert alert-danger">
                            {{Session::get('fail')}}
                           </div>
                        @endif
                        <div class="row">
                            <div class="mb-3 col-md-12">
                                <label>Email<span class="text-danger">*</span></label>
                                <input type="email" name="email" class="form-control" placeholder="Enter Email" value="{{old('email')}}">
                                <span class="text-danger">@error('email'){{$message}}@enderror</span>
                            </div>

                            <div class="mb-3 col-md-12">
                                <label>Password<span class="text-danger">*</span></label>
                                <input type="password" name="password" class="form-control" placeholder="Enter Password">
                                <span class="text-danger">@error('password'){{$message}}@enderror</span>
                            </div>
                           
                            <div class="col-md-12">
                               <button class="btn btn-primary float-end">Login</button>
                            </div>
                        </div>
                    </form>
                    <p class="text-center mt-3 text-secondary">If you don't have account, Please <a href="{{route('auth.agent-register')}}">Signup Now</a></p>
                    <p class="text-center mt-3 text-secondary">Return back to, <a href="{{route('homepage')}}">homepage</a></p>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
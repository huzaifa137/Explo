<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{asset('bootstrap/css/bootstrap.min.css')}}">
    <title>Agent-register</title>
</head>
<body>
    <div class="container">
        <div class="row">
            <div class="col-md-6 offset-md-3">
                <div class="signup-form">
                    <form action="{{route('auth.agent-save')}}" class="mt-5 border p-4 bg-light shadow" method="POST" enctype="multipart/form-data">
                        @csrf
                        <h4 class="mb-5 text-secondary">Create an Agent Account</h4>
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

                        <div class="row">
                            <div class="mb-3 col-md-6">
                                <label>First Name<span class="text-danger">*</span></label>
                                <input type="text" name="fname" class="form-control" placeholder="Enter first Name" value="{{old('fname')}}">
                                <span class="text-danger">@error('fname'){{$message}}@enderror</span>
                            </div>

                            <div class="mb-3 col-md-6">
                                <label>Last Name<span class="text-danger">*</span></label>
                                <input type="text" name="lname" class="form-control" placeholder="Enter last Name" value="{{old('lname')}}">
                                <span class="text-danger">@error('lname'){{$message}}@enderror</span>
                            </div>

                            <div class="mb-3 col-md-6">
                                <label>Country<span class="text-danger">*</span></label>
                                <input type="text" name="country" class="form-control" placeholder="Enter country" value="{{old('country')}}">
                                <span class="text-danger">@error('country'){{$message}}@enderror</span>
                            </div>
    
                            <div class="mb-3 col-md-6">
                                <label>District<span class="text-danger">*</span></label>
                                <input type="text" name="district" class="form-control" placeholder="Enter district" value="{{old('district')}}">
                                <span class="text-danger">@error('district'){{$message}}@enderror</span>
                            </div>

                            <div class="mb-3 col-md-6">
                                <label>Subcounty<span class="text-danger">*</span></label>
                                <input type="text" name="subcounty" class="form-control" placeholder="Enter subcountry" value="{{old('subcounty')}}">
                                <span class="text-danger">@error('subcounty'){{$message}}@enderror</span>
                            </div>

                            <div class="mb-3 col-md-6">
                                <label>Village<span class="text-danger">*</span></label>
                                <input type="text" name="village" class="form-control" placeholder="Enter village" value="{{old('village')}}">
                                <span class="text-danger">@error('village'){{$message}}@enderror</span>
                            </div>

                            <div class="mb-3 col-md-6">
                                <label>Responsibility<span class="text-danger">*</span></label>
                                <input type="text" name="responsibility" class="form-control" placeholder="Enter responsibility" value="{{old('responsibility')}}">
                                <span class="text-danger">@error('responsibility'){{$message}}@enderror</span>
                            </div>

                            <div class="mb-3 col-md-6">
                                <label>NIN<span class="text-danger">*</span></label>
                                <input type="text" name="NIN" class="form-control" placeholder="Enter NIN number" value="{{old('NIN')}}">
                                <span class="text-danger">@error('NIN'){{$message}}@enderror</span>
                            </div>

                            <div class="mb-3 col-md-12">
                                <label>Nation Id pic<span class="text-danger">*</span></label>
                                <input type="file" name="National_id" class="form-control" value="{{old('National_id')}}">
                                <span class="text-danger">@error('National_id'){{$message}}@enderror</span>
                            </div>

                            <div class="mb-3 col-md-12">
                                <label>profile picture<span class="text-danger">*</span></label>
                                <input type="file" name="profile_photo" class="form-control"  value="{{old('profile_photo')}}">
                                <span class="text-danger">@error('profile_photo'){{$message}}@enderror</span>
                            </div>

                            <div class="mb-3 col-md-12">
                                <label>Languages<span class="text-danger">*</span></label>
                                <input type="text" name="languages" class="form-control" placeholder="Enter languages you know 1,2,3..." value="{{old('languages')}}">
                                <span class="text-danger">@error('languages'){{$message}}@enderror</span>
                            </div>

                            <div class="mb-3 col-md-12">
                                <label>Email<span class="text-danger">*</span></label>
                                <input type="email" name="email" class="form-control" placeholder="Enter Email" value="{{old('email')}}">
                                <span class="text-danger">@error('email'){{$message}}@enderror</span>
                            </div>
    
                            <div class="mb-3 col-md-12">
                                <label>Phone number<span class="text-danger">*</span></label>
                                <input type="number" name="phonenumber" class="form-control" placeholder="Enter phone number" value="{{old('phonenumber')}}">
                                <span class="text-danger">@error('phonenumber'){{$message}}@enderror</span>
                            </div>
    
                            <div class="mb-3 col-md-12">
                                <label>Password<span class="text-danger">*</span></label>
                                <input type="password" name="password" class="form-control" placeholder="Enter Password">
                                <span class="text-danger">@error('password'){{$message}}@enderror</span>
                            </div>
                            <div class="col-md-12">
                               <button class="btn btn-primary float-end">Signup Now</button>
                            </div>
                        </div>
                    </form>
                    <p class="text-center mt-3 text-secondary">If you have account, Please <a href="{{route('auth.agent-login')}}">Login Now</a></p>
                    <p class="text-center mt-3 text-secondary">Return back to, <a href="{{route('homepage')}}">homepage</a></p>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
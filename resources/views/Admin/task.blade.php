@extends('layouts.dashboardmenu')
@section('content')
        <script>
            var $msg ='{{Session::get('success')}}';
            var $verify ='{{Session::has('success')}}';

            if($verify)
            {
              alert($msg);
            }
        </script>
        <!-- partial -->
        <div class="main-panel">
          <div class="content-wrapper">
            <div class="page-header">
              <h3 class="page-title"> Create a Task </h3>
            </div>
            <div class="row">
              <div class="col-12 grid-margin stretch-card">
                <div class="card">
                  <div class="card-body">
                    <h4 class="card-title">Enter Task details</h4>
                    <p class="card-description"> Basic form elements </p>
                    <form class="forms-sample" method="POST" action="{{route('create-task')}}">
                      @csrf
                      <div class="form-group">
                        <label for="exampleInputName1">1.Task Name</label>
                        <input type="text" class="form-control" id="exampleInputName1" placeholder="Name" name="taskname" value="{{old('taskname')}}" required>
                          <span class="text-danger">@error('Taskname'){{$message}}@enderror</span>
                      </div>
                      <div class="form-group">
                        <label for="exampleInputEmail3">2.Agency of Information</label>
                        <input type="text" class="form-control" id="exampleInputEmail3" placeholder="Agency" name="agency" value="{{old('agency')}}" required>
                        <span class="text-danger">@error('Agency'){{$message}}@enderror</span>
                      </div>
                      <div class="form-group">
                        <label for="exampleInputPassword4">3.District</label>
                        <input type="text" class="form-control" id="exampleInputPassword4" placeholder="District" name="district" value="{{old('district')}}" required>
                      </div>
                      <div class="form-group">
                        <label for="exampleInputPassword4">4.Area</label>
                        <input type="text" class="form-control" id="exampleInputPassword4" placeholder="Area" name="area" value="{{old('area')}}" required>
                      </div>
                      <div class="form-group">
                        <label for="exampleInputPassword4">5.Effective Date</label>
                        <input type="date" class="form-control" id="exampleInputPassword4" placeholder="00-00-0000" name="date" value="{{old('date')}}" >
                      </div>
                      
                      <div class="form-group">
                        <label for="exampleSelectGender">6.Type of Business</label>
                        <div class="form-group">
                        <div class="form-check form-check-inline">
                          <input class="form-check-input" type="radio" name="BusinessType" id="flexRadioDefault1" value="Financial" checked> <span class="text-dark">Financial</span> 
                        </div>
                        <div class="form-check form-check-inline">
                          <input class="form-check-input" type="radio" name="BusinessType" id="flexRadioDefault2" value="Technical"><span class="text-dark">Technical</span> 
                        </div>
                        <div class="form-check form-check-inline">
                          <input class="form-check-input" type="radio" name="BusinessType" id="flexRadioDefault2" value="Other"><span class="text-dark">Other</span> 
                        </div>
                      </div>

                      <div class="form-group">
                        <label for="exampleInputEmail3">7.Questionnaire (Enter topics to be research by globalexplo :  Format:1,2,3,4)</label>
                        <textarea name="questionnaire" class="form-control" cols="30" rows="10"></textarea>
                        <span class="text-danger">@error('Agency'){{$message}}@enderror</span>
                      </div>

                      <div class="form-group">
                        <label for="exampleSelectGender">8.Extra Services</label>
                        <div class="form-check form-check-inline">
                          <input class="form-check-input" type="radio" name="extraservices" id="flexRadioDefault1" value="Financial" checked> <span class="text-dark">Analyzed Report</span> 
                        </div>
                        <div class="form-check form-check-inline">
                          <input class="form-check-input" type="radio" name="extraservices" id="flexRadioDefault2" value="Technical"><span class="text-dark">Visualized statistics</span> 
                        </div>

                      <button type="submit" class="btn btn-primary mr-2">Add Task</button>
                      <button class="btn btn-light">Cancel</button>
                    </form>
                  </div>
                </div>
              </div>
            </div>
          </div>        
@endsection
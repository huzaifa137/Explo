@extends('Owner.OwnerDashboardMenu')
@section('content')
        <!-- partial -->
        <div class="main-panel">
          <div class="content-wrapper">
            <div class="row" id="proBanner">
              <div class="col-12">
                <span class="d-flex align-items-center purchase-popup">
                  {{-- <p>Like what you see? Check out our premium version for more.</p> --}}
                  <a href="#" class="btn btn-success ml-auto  ">Explo Owner Dashboard</a>
                  {{-- <a href="http://www.bootstrapdash.com/demo/connect-plus/jquery/template/" target="_blank" class="btn purchase-button">Upgrade To Pro</a> --}}
                  <i class="mdi mdi-close" id="bannerClose"></i>
                </span>
              </div>
            </div>
            <div class="d-xl-flex justify-content-between align-items-start">
              <h2 class="text-dark font-weight-bold mb-2"> Overview Owner dashboard </h2>
              <div class="d-sm-flex justify-content-xl-between align-items-center mb-2">
                <div class="dropdown ml-0 ml-md-4 mt-2 mt-lg-0">
                  <button class="btn bg-white dropdown-toggle p-3 d-flex align-items-center" type="button" id="dropdownMenuButton1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="mdi mdi-calendar mr-1"></i>{{"Date : ". $date = date('d-m-Y')}} </button>
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-md-12">
                <div class="d-sm-flex justify-content-between align-items-center transaparent-tab-border {">
          
                </div>
                <div class="tab-content tab-transparent-content">
                  <div class="tab-pane fade show active" id="business-1" role="tabpanel" aria-labelledby="business-tab">
                    <div class="row">
                      
                      <div class="col-xl-3 col-lg-6 col-sm-6 grid-margin stretch-card">
                        <div class="card">
                          <div class="card-body text-center">
                            <h5 class="mb-2 text-dark font-weight-normal">All Tasks</h5>
                            <h2 class="mb-4 text-dark font-weight-bold">{{$AllTasks}}</h2>
                            <div class="dashboard-progress dashboard-progress-1 d-flex align-items-center justify-content-center item-parent"><i class="mdi mdi-lightbulb icon-md absolute-center text-dark"></i></div>
                            <p class="mt-4 mb-0">All Total task</p>
                            <h3 class="mb-0 font-weight-bold mt-2 text-dark">{{$AllTasks}}.0</h3>
                          </div>
                        </div>
                      </div>

                      <div class="col-xl-3 col-lg-6 col-sm-6 grid-margin stretch-card">
                        <div class="card">
                          <div class="card-body text-center">
                            <h5 class="mb-2 text-dark font-weight-normal">All Clients</h5>
                            <h2 class="mb-4 text-dark font-weight-bold">{{$all_clients}}</h2>
                            <div class="dashboard-progress dashboard-progress-2 d-flex align-items-center justify-content-center item-parent"><i class="mdi mdi-comment-account icon-md absolute-center text-dark"></i></div>
                            <p class="mt-4 mb-0">All Total task</p>
                            <h3 class="mb-0 font-weight-bold mt-2 text-dark">{{$all_clients}}.0</h3>
                          </div>
                        </div>
                      </div>


                      <div class="col-xl-3 col-lg-6 col-sm-6 grid-margin stretch-card">
                        <div class="card">
                          <div class="card-body text-center">
                            <h5 class="mb-2 text-dark font-weight-normal">All Agents</h5>
                            <h2 class="mb-4 text-dark font-weight-bold">{{$all_agents_details}}</h2>
                            <div class="dashboard-progress dashboard-progress-3 d-flex align-items-center justify-content-center item-parent"><i class="mdi mdi-account-multiple-outline icon-md absolute-center text-dark"></i></div>
                            <p class="mt-4 mb-0">Completed Tasks</p>
                            <h3 class="mb-0 font-weight-bold mt-2 text-dark">{{$all_agents_details}}.0</h3>
                          </div>
                        </div>
                      </div>

                      <div class="col-xl-3 col-lg-6 col-sm-6 grid-margin stretch-card">
                        <div class="card">
                          <div class="card-body text-center">
                            <h5 class="mb-2 text-dark font-weight-normal">Completed Tasks</h5>
                            <h2 class="mb-4 text-dark font-weight-bold">{{$completedTask}}</h2>
                            <div class="dashboard-progress dashboard-progress-4 d-flex align-items-center justify-content-center item-parent"><i class="mdi mdi-account-circle icon-md absolute-center text-dark"></i></div>
                            <p class="mt-4 mb-0">Completed Tasks</p>
                            <h3 class="mb-0 font-weight-bold mt-2 text-dark">{{$completedTask}}.0</h3>
                          </div>
                        </div>
                      </div>

                  </div>
                  </div>
                </div>
              </div>
            </div>

            <div class="row">
              <div class="col-md-12">
                <div class="d-sm-flex justify-content-between align-items-center transaparent-tab-border {">
          
                </div>
                <div class="tab-content tab-transparent-content">
                  <div class="tab-pane fade show active" id="business-1" role="tabpanel" aria-labelledby="business-tab">
                    <div class="row">
                      
                      <div class="col-xl-3 col-lg-6 col-sm-6 grid-margin stretch-card">
                        <div class="card">
                          <div class="card-body text-center">
                            <h5 class="mb-2 text-dark font-weight-normal">Assigned Tasks</h5>
                            <h2 class="mb-4 text-dark font-weight-bold">{{$assigned_Task}}</h2>
                            <div class="dashboard-progress dashboard-progress-3 d-flex align-items-center justify-content-center item-parent"><i class="mdi mdi-cube icon-md absolute-center text-dark"></i></div>
                            <p class="mt-4 mb-0">Assigned Tasks<p>
                            <h3 class="mb-0 font-weight-bold mt-2 text-dark">{{$assigned_Task}}.0</h3>
                          </div>
                        </div>
                      </div>
                    
                    <div class="col-xl-3 col-lg-6 col-sm-6 grid-margin stretch-card">
                      <div class="card">
                        <div class="card-body text-center">
                          <h5 class="mb-2 text-dark font-weight-normal">Unactivated Agents</h5>
                          <h2 class="mb-4 text-dark font-weight-bold">{{$not_validate}}</h2>
                          <div class="dashboard-progress dashboard-progress-1 d-flex align-items-center justify-content-center item-parent"><i class="mdi mdi-emoticon-sad icon-md absolute-center text-dark"></i></div>
                          <p class="mt-4 mb-0">Not activated Clients</p>
                          <h3 class="mb-0 font-weight-bold mt-2 text-dark">{{$not_validate}}.0</h3>
                        </div>
                      </div>
                    </div>

                    <div class="col-xl-3 col-lg-6 col-sm-6 grid-margin stretch-card">
                      <div class="card">
                        <div class="card-body text-center">
                          <h5 class="mb-2 text-dark font-weight-normal">Unactivated Clients</h5>
                          <h2 class="mb-4 text-dark font-weight-bold">{{$not_valid_client}}</h2>
                          <div class="dashboard-progress dashboard-progress-2 d-flex align-items-center justify-content-center item-parent"><i class="mdi mdi-human-greeting icon-md absolute-center text-dark"></i></div>
                          <p class="mt-4 mb-0">Not activated Clients</p>
                          <h3 class="mb-0 font-weight-bold mt-2 text-dark">{{$not_valid_client}}.0</h3>
                        </div>
                      </div>
                    </div>
                  </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
@endsection
       
         

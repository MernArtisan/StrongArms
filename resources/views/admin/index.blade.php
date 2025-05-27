@extends('admin.layout.layout')
@section('title', 'admin')
@section('content')

<div id="app">
    <div class="main-wrapper main-wrapper-1">
      <div class="navbar-bg"></div>

      <!-- Main Content -->
      <div class="main-content">
        <section class="section">
          <ul class="breadcrumb breadcrumb-style ">
            <li class="breadcrumb-item">
              <h4 class="page-title m-b-0">Dashboard</h4>
            </li>
            <li class="breadcrumb-item">
              <a href="index-2.html">
                <i data-feather="home"></i></a>
            </li>
            <li class="breadcrumb-item active">Dashboard </li>
          </ul>
          <div class="row">
            <div class="col-lg-3 col-sm-6">
              <div class="card">
                <div class="card-statistic-5">
                  <div class="info-box7-block">
                    <div class="row ">
                      <div class="col-lg-5 col-md-5 col-sm-5 col-xs-5">
                        <div class="banner-img">
                          <img src="{{ asset('admin/img/banner/1.png')}}" alt="">
                        </div>
                      </div>
                      <div class="col-lg-7 col-md-7 col-sm-7 col-xs-7">
                        <h6 class="m-b-20 text-right">New Customers</h6>
                        <h4 class="text-right"><span>{{ $users }}</span>
                        </h4>
                      </div>
                    </div>
                    <div id="cardChart1"></div>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-lg-3 col-sm-6">
              <div class="card">
                <div class="card-statistic-5">
                  <div class="info-box7-block">
                    <div class="row ">
                      <div class="col-lg-5 col-md-5 col-sm-5 col-xs-5">
                        <div class="banner-img">
                          <img src="{{ asset('admin/img/banner/2.png')}}" alt="">
                        </div>
                      </div>
                      <div class="col-lg-7 col-md-7 col-sm-7 col-xs-7">
                        <h6 class="m-b-20 text-right">Orders Received</h6>
                        <h4 class="text-right"><span></span>
                        </h4>
                      </div>
                    </div>
                    <div id="cardChart2"></div>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-lg-3 col-sm-6">
              <div class="card">
                <div class="card-statistic-5">
                  <div class="info-box7-block">
                    <div class="row ">
                      <div class="col-lg-5 col-md-5 col-sm-5 col-xs-5">
                        <div class="banner-img">
                          <img src="{{ asset('admin/img/banner/3.png')}}" alt="">
                        </div>
                      </div>
                      <div class="col-lg-7 col-md-7 col-sm-7 col-xs-7">
                        <h6 class="m-b-20 text-right">Total Products</h6>
                        <h4 class="text-right"><span>{{ $products }}</span>
                        </h4>
                      </div>
                    </div>
                    <div id="cardChart3"></div>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-lg-3 col-sm-6">
              <div class="card">
                <div class="card-statistic-5">
                  <div class="info-box7-block">
                    <div class="row ">
                      <div class="col-lg-5 col-md-5 col-sm-5 col-xs-5">
                        <div class="banner-img">
                          <img src="{{ asset('admin/img/banner/4.png')}}" alt="">
                        </div>
                      </div>
                      <div class="col-lg-7 col-md-7 col-sm-7 col-xs-7">
                        <h6 class="m-b-20 text-right">Revenue Today</h6>
                        <h4 class="text-right"><span>$22,973</span>
                        </h4>
                      </div>
                    </div>
                    <div id="cardChart4"></div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-md-12 col-lg-8 col-xl-8 ">
              <div class="card">
                <div class="card-header">
                  <h4>Revenue Chart</h4>
                  <div class="card-header-action">
                    <ul class="nav nav-pills" role="tablist" id="chart-tabs">
                      <li class="nav-item">
                        <a class="nav-link active card-tab-style" data-toggle="tab" data-id="1" role="tab"
                          aria-selected="true">2017</a>
                      </li>
                      <li class="nav-item">
                        <a class="nav-link card-tab-style" data-toggle="tab" data-id="2" role="tab"
                          aria-selected="false">2018</a>
                      </li>
                      <li class="nav-item">
                        <a class="nav-link card-tab-style" data-toggle="tab" data-id="3" role="tab"
                          aria-selected="false">2019</a>
                      </li>
                    </ul>
                  </div>
                </div>
                <div class="card-body">
                  <div id="chart1"></div>
                </div>
              </div>
            </div>
            <div class="col-md-12 col-lg-4 col-xl-4">
              <div class="card">
                <div class="card-header">
                  <h4>Project Team</h4>
                </div>
                <div class="card-body">
                  <div class="media-list position-relative">
                    <div class="table-responsive" id="project-team-scroll">
                      <table class="table table-hover table-xl mb-0">
                        <thead>
                          <tr>
                            <th>Project Name</th>
                            <th>Employees</th>
                            <th>Cost</th>
                          </tr>
                        </thead>
                        <tbody>
                          <tr>
                            <td class="text-truncate">Project X</td>
                            <td class="text-truncate">
                              <ul class="list-unstyled order-list m-b-0">
                                <li class="team-member team-member-sm"><img class="rounded-circle"
                                    src="{{ asset('admin/img/users/user-8.png')}}" alt="user" data-toggle="tooltip" title=""
                                    data-original-title="Wildan Ahdian"></li>
                                <li class="team-member team-member-sm"><img class="rounded-circle"
                                    src="{{ asset('admin/img/users/user-9.png')}}" alt="user" data-toggle="tooltip" title=""
                                    data-original-title="John Deo"></li>
                                <li class="team-member team-member-sm"><img class="rounded-circle"
                                    src="{{ asset('admin/img/users/user-10.png')}}" alt="user" data-toggle="tooltip" title=""
                                    data-original-title="Sarah Smith"></li>
                                <li class="avatar avatar-sm"><span class="badge badge-primary">+3</span></li>
                              </ul>
                            </td>
                            <td class="text-truncate">$8999</td>
                          </tr>
                         
                        </tbody>
                      </table>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12">
              <div class="card">
                <div class="card-header">
                  <h4>Revenue Chart</h4>
                </div>
                <div class="card-body">
                  <div class="row text-center p-t-10">
                    <div class="col-sm-4 col-6">
                      <h4 class="margin-0">$ 209 </h4>
                      <p class="text-muted"> Today's Income</p>
                    </div>
                    <div class="col-sm-4 col-6">
                      <h4 class="margin-0">$ 837 </h4>
                      <p class="text-muted">This Week's Income</p>
                    </div>
                    <div class="col-sm-4 col-6">
                      <h4 class="margin-0">$ 3410 </h4>
                      <p class="text-muted">This Month's Income</p>
                    </div>
                  </div>
                  <div id="amchartLineDashboard" class="amChartHeight"></div>
                </div>
              </div>
            </div>
            <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12">
              <div class="card">
                <div class="card-header">
                  <h4>Revenue Chart</h4>
                </div>
                <div class="card-body">
                  <div class="row text-center p-t-10">
                    <div class="col-sm-4 col-6">
                      <h4 class="margin-0">$ 209 </h4>
                      <p class="text-muted"> Today's Income</p>
                    </div>
                    <div class="col-sm-4 col-6">
                      <h4 class="margin-0">$ 837 </h4>
                      <p class="text-muted">This Week's Income</p>
                    </div>
                    <div class="col-sm-4 col-6">
                      <h4 class="margin-0">$ 3410 </h4>
                      <p class="text-muted">This Month's Income</p>
                    </div>
                  </div>
                  <div id="dumbbellPlotChart" class="amChartHeight"></div>
                </div>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-md-12 col-lg-4 col-xl-4">
              <div class="card">
                <div class="card-header">
                  <h4>Project List</h4>
                </div>
                <div class="card-body">
                  <div class="table-responsive" id="project-list">
                    <table class="table table-hover table-xl mb-0">
                      <tbody>
                        <tr>
                          <td>Java Software</td>
                          <td class="text-right">
                            <span class="badge-outline col-purple">25%</span>
                          </td>
                        </tr>
                        <tr>
                          <td>Landing Page</td>
                          <td class="text-right">
                            <div class="badge-outline col-red">Rejected</div>
                          </td>
                        </tr>
                        <tr>
                          <td>Logo Design</td>
                          <td class="text-right">
                            <div class="badge-outline col-green">Completed</div>
                          </td>
                        </tr>
                        <tr>
                          <td>E-commerce Website</td>
                          <td class="text-right">
                            <span class="badge-outline col-purple">40%</span>
                          </td>
                        </tr>
                        <tr>
                          <td>.Net Project</td>
                          <td class="text-right">
                            <span class="badge-outline col-orange">Pending</span>
                          </td>
                        </tr>
                        <tr>
                          <td>PHP Website</td>
                          <td class="text-right">
                            <span class="badge-outline col-green">Completed</span>
                          </td>
                        </tr>
                        <tr>
                          <td>Angular Website</td>
                          <td class="text-right">
                            <span class="badge-outline col-purple">98%</span>
                          </td>
                        </tr>
                        <tr>
                          <td>SEO Website</td>
                          <td class="text-right">
                            <span class="badge-outline col-red">Rejected</span>
                          </td>
                        </tr>
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-md-12 col-lg-8 col-xl-8">
              <div class="card">
                <div class="card-header">
                  <h4>Client Details</h4>
                </div>
                <div class="card-body">
                  <div class="tableBody" id="client-details">
                    <div class="table-responsive">
                      <table class="table table-hover dashboard-task-infos">
                        <thead>
                          <tr>
                            <th>#</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Rating</th>
                            <th>Project Name</th>
                            <th>Action</th>
                          </tr>
                        </thead>
                        <tbody>
                        
                     
                        </tbody>
                      </table>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </section>
        <div class="settingSidebar">
          <a href="javascript:void(0)" class="settingPanelToggle"> <i class="fa fa-spin fa-cog"></i>
          </a>
          <div class="settingSidebar-body ps-container ps-theme-default">
            <div class=" fade show active">
              <div class="setting-panel-header">Setting Panel
              </div>
              <div class="p-15 border-bottom">
                <h6 class="font-medium m-b-10">Select Layout</h6>
                <div class="selectgroup layout-color w-50">
                  <label class="selectgroup-item">
                    <input type="radio" name="value" value="1" class="selectgroup-input-radio select-layout" checked>
                    <span class="selectgroup-button">Light</span>
                  </label>
                  <label class="selectgroup-item">
                    <input type="radio" name="value" value="2" class="selectgroup-input-radio select-layout">
                    <span class="selectgroup-button">Dark</span>
                  </label>
                </div>
              </div>
              <div class="p-15 border-bottom">
                <h6 class="font-medium m-b-10">Sidebar Color</h6>
                <div class="selectgroup selectgroup-pills sidebar-color">
                  <label class="selectgroup-item">
                    <input type="radio" name="icon-input" value="1" class="selectgroup-input select-sidebar">
                    <span class="selectgroup-button selectgroup-button-icon" data-toggle="tooltip"
                      data-original-title="Light Sidebar"><i class="fas fa-sun"></i></span>
                  </label>
                  <label class="selectgroup-item">
                    <input type="radio" name="icon-input" value="2" class="selectgroup-input select-sidebar" checked>
                    <span class="selectgroup-button selectgroup-button-icon" data-toggle="tooltip"
                      data-original-title="Dark Sidebar"><i class="fas fa-moon"></i></span>
                  </label>
                </div>
              </div>
              <div class="p-15 border-bottom">
                <h6 class="font-medium m-b-10">Color Theme</h6>
                <div class="theme-setting-options">
                  <ul class="choose-theme list-unstyled mb-0">
                    <li title="white" class="active">
                      <div class="white"></div>
                    </li>
                    <li title="cyan">
                      <div class="cyan"></div>
                    </li>
                    <li title="black">
                      <div class="black"></div>
                    </li>
                    <li title="purple">
                      <div class="purple"></div>
                    </li>
                    <li title="orange">
                      <div class="orange"></div>
                    </li>
                    <li title="green">
                      <div class="green"></div>
                    </li>
                    <li title="red">
                      <div class="red"></div>
                    </li>
                  </ul>
                </div>
              </div>
              <div class="p-15 border-bottom">
                <div class="theme-setting-options">
                  <label class="m-b-0">
                    <input type="checkbox" name="custom-switch-checkbox" class="custom-switch-input"
                      id="mini_sidebar_setting">
                    <span class="custom-switch-indicator"></span>
                    <span class="control-label p-l-10">Mini Sidebar</span>
                  </label>
                </div>
              </div>
              <div class="p-15 border-bottom">
                <div class="theme-setting-options">
                  <label class="m-b-0">
                    <input type="checkbox" name="custom-switch-checkbox" class="custom-switch-input"
                      id="sticky_header_setting">
                    <span class="custom-switch-indicator"></span>
                    <span class="control-label p-l-10">Sticky Header</span>
                  </label>
                </div>
              </div>
              <div class="mt-4 mb-4 p-3 align-center rt-sidebar-last-ele">
                <a href="#" class="btn btn-icon icon-left btn-primary btn-restore-theme">
                  <i class="fas fa-undo"></i> Restore Default
                </a>
              </div>
            </div>
          </div>
        </div>
      </div>
      <footer class="main-footer">
        <div class="footer-left">
          Copyright &copy; 2020 <div class="bullet"></div> Design By <a href="#">Redstar</a>
        </div>
        <div class="footer-right">
        </div>
      </footer>
    </div>
  </div>
@endsection
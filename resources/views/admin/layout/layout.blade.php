<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
    <title>@yield('title')</title>
    <!-- General CSS Files -->
    <link rel="stylesheet" href="{{ asset('/admin/css/app.min.css') }}">
    <!-- Template CSS -->
    <link rel="stylesheet" href="{{ asset('/admin/css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('/admin/css/components.css') }}">
    <link rel="stylesheet" href="{{ asset('/admin/bundles/jqvmap/dist/jqvmap.min.css') }}">
    <!-- Custom style CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css" />
    <link rel="stylesheet" href="{{ asset('/admin/css/custom.css') }}">
    <link rel='shortcut icon' type='image/x-icon' href="{{ asset('/admin/img/favicon.ico') }}" />
    <link href="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.18/summernote-bs4.min.css" rel="stylesheet">
    @yield('styles')
</head>

<body>
    @php
        $isAdmin = Auth::check() && Auth::user()->hasRole('admin');
        $isProvider = Auth::check() && Auth::user()->hasRole('provider');
    @endphp

    <div id="app">
        <div class="main-wrapper main-wrapper-1">
            <div class="navbar-bg"></div>
            <nav class="navbar navbar-expand-lg main-navbar sticky">
                <div class="form-inline mr-auto">
                    <ul class="navbar-nav mr-3">
                        <li>
                            <a href="#" data-toggle="sidebar" class="nav-link nav-link-lg
									collapse-btn">
                                <i data-feather="menu"></i></a>
                        </li>
                        <li>

                        </li>
                    </ul>
                </div>
                <ul class="navbar-nav navbar-right">
                    <li>
                        </br>
                        {{-- <a href="/">
                            <i class="fa fa-laptop"></i>
                            <span class="hhh user_info"></span>
                        </a> --}}
                    </li>
                    <li class="dropdown">
                        <a href="#" data-toggle="dropdown"
                            class="nav-link dropdown-toggle nav-link-lg nav-link-user">
                            <img alt="image" src="{{ asset(asset(Auth()->user()->image)) }}"
                                class="user-img-radious-style"> <span class="d-sm-none d-lg-inline-block"></span></a>

                        <div class="dropdown-menu dropdown-menu-right pullDown">
                            <div class="dropdown-title">{{ Auth()->user()->name }}</div>
                            <a href="{{ route('profile') }}" class="dropdown-item has-icon"><i class="far fa-user"></i>
                                Profile </a>


                            <div class="dropdown-divider"></div>
                            <a href="{{ route('logout') }}" class="dropdown-item has-icon text-danger"> <i
                                    class="fas fa-sign-out-alt"></i> Logout
                            </a>
                        </div>
                    </li>
                </ul>
            </nav>
            <div class="main-sidebar sidebar-style-2">
                <aside id="sidebar-wrapper">
                    <div class="sidebar-brand">
                        <a href="/">
                            <img src="{{ asset('assets/images/logo/logo.png') }}" class="header-logo" width="30px"
                                height="80px" />
                            <span class="logo-name">StrongArms</span>
                        </a>
                    </div>
                    <div class="sidebar-user">
                        <div class="sidebar-user-picture">
                            <img alt="image" src="{{ asset(Auth()->user()->image) }}">
                        </div>
                        <div class="sidebar-user-details">
                            <div class="user-name">{{ Auth()->user()->name }}</div>
                        </div>
                    </div>

                    <ul class="sidebar-menu">
                    
                        {{-- Dashboard (always visible) --}}
                        <li class="menu-header">Dashboard</li>
                        <li class="dropdown">
                            <a href="{{ route('dashboard') }}" class="nav-link">
                                <i data-feather="monitor"></i> Dashboard
                            </a>
                        </li>

                        {{-- User Management --}}
                        <li class="menu-header">User Management</li>
                        @if ($isAdmin)
                            <li class="dropdown">
                                <a href="{{ route('all-users.index') }}" class="nav-link">
                                    <i data-feather="user"></i> User/Providers
                                </a>
                            </li>
                        @else
                            @if (Auth::user()->can('user-view'))
                                <li class="dropdown">
                                    <a href="{{ route('all-users.index') }}" class="nav-link">
                                        <i data-feather="user"></i> User/Providers
                                    </a>
                                </li>
                            @endif
                        @endif

                        {{-- Content Management --}}
                        <li class="menu-header">Content Management</li>
                        <li class="dropdown">
                            <a href="{{ route('blogs-upload.index') }}" class="nav-link">
                                <i data-feather="image"></i>Blogs
                            </a>
                        </li>

                        @if ($isAdmin)
                            <li class="dropdown">
                                <a href="{{ route('homebanner.index') }}" class="nav-link">
                                    <i data-feather="image"></i> Home Banners
                                </a>
                            </li>
                        @else
                            @if (Auth::user()->can('user-view'))
                                <li class="dropdown">
                                    <a href="{{ route('homebanner.index') }}" class="nav-link">
                                        <i data-feather="image"></i> Home Banners
                                    </a>
                                </li>
                            @endif
                        @endif

                        <li class="dropdown">
                            <a href="{{ route('content.index') }}" class="nav-link">
                                <i data-feather="image"></i> Content
                            </a>
                        </li>

                        {{-- Access Control --}}
                        <li class="menu-header">Access Control</li>
                        @if ($isAdmin)
                            <li class="dropdown">
                                <a href="{{ route('role.index') }}" class="nav-link">
                                    <i data-feather="lock"></i> Roles
                                </a>
                            </li>
                        @else
                            @can('role-view')
                                <li class="dropdown">
                                    <a href="{{ route('role.index') }}" class="nav-link">
                                        <i data-feather="lock"></i> Roles
                                    </a>
                                </li>
                            @endcan
                        @endif

                        {{-- Product Management --}}
                        <li class="menu-header">Product Management</li>
                        @if ($isAdmin)
                            <li class="dropdown">
                                <a href="{{ route('product-category.index') }}" class="nav-link">
                                    <i data-feather="grid"></i> Categories
                                </a>
                            </li>
                        @else
                            @can('categories-view')
                                <li class="dropdown">
                                    <a href="{{ route('product-category.index') }}" class="nav-link">
                                        <i data-feather="grid"></i> Categories
                                    </a>
                                </li>
                            @endcan
                        @endif

                        @if ($isAdmin)
                            <li class="dropdown">
                                <a href="{{ route('product.index') }}" class="nav-link">
                                    <i data-feather="box"></i> Products
                                </a>
                            </li>
                        @else
                            @can('product-view')
                                <li class="dropdown">
                                    <a href="{{ route('product.index') }}" class="nav-link">
                                        <i data-feather="box"></i> Products
                                    </a>
                                </li>
                            @endcan
                        @endif

                        @if ($isProvider || $isAdmin)
                            <li class="dropdown">
                                <a href="{{ route('service.index') }}" class="nav-link">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20"
                                        fill="#999999" viewBox="0 0 16 16">
                                        <path
                                            d="M8 4.754a3.246 3.246 0 1 0 0 6.492 3.246 3.246 0 0 0 0-6.492zM5.754 8a2.246 2.246 0 1 1 4.492 0 2.246 2.246 0 0 1-4.492 0z" />
                                        <path
                                            d="M9.796 1.343c-.527-1.79-3.065-1.79-3.592 0l-.094.319a.873.873 0 0 1-1.255.52l-.292-.16c-1.64-.892-3.433.902-2.54 2.541l.159.292a.873.873 0 0 1-.52 1.255l-.319.094c-1.79.527-1.79 3.065 0 3.592l.319.094a.873.873 0 0 1 .52 1.255l-.16.292c-.892 1.64.901 3.434 2.541 2.54l.292-.159a.873.873 0 0 1 1.255.52l.094.319c.527 1.79 3.065 1.79 3.592 0l.094-.319a.873.873 0 0 1 1.255-.52l.292.16c1.64.893 3.434-.902 2.54-2.541l-.159-.292a.873.873 0 0 1 .52-1.255l.319-.094c1.79-.527 1.79-3.065 0-3.592l-.319-.094a.873.873 0 0 1-.52-1.255l.16-.292c.893-1.64-.902-3.433-2.541-2.54l-.292.159a.873.873 0 0 1-1.255-.52l-.094-.319zm-2.633.283c.246-.835 1.428-.835 1.674 0l.094.319a1.873 1.873 0 0 0 2.693 1.115l.291-.16c.764-.415 1.6.42 1.184 1.185l-.159.292a1.873 1.873 0 0 0 1.116 2.692l.318.094c.835.246.835 1.428 0 1.674l-.319.094a1.873 1.873 0 0 0-1.115 2.693l.16.291c.415.764-.42 1.6-1.185 1.184l-.291-.159a1.873 1.873 0 0 0-2.693 1.116l-.094.318c-.246.835-1.428.835-1.674 0l-.094-.319a1.873 1.873 0 0 0-2.692-1.115l-.292.16c-.764.415-1.6-.42-1.184-1.185l.159-.291a1.873 1.873 0 0 0-1.116-2.693l-.318-.094c-.835-.246-.835-1.428 0-1.674l.319-.094a1.873 1.873 0 0 0 1.115-2.693l-.16-.291c-.415-.764.42-1.6 1.185-1.184l.291.159a1.873 1.873 0 0 0 2.693-1.116l.094-.318z" />
                                    </svg>
                                    &nbsp;&nbsp; Services
                                </a>
                            </li>
                        @else
                            @can('service-view')
                                <li class="dropdown">
                                    <a href="{{ route('service.index') }}" class="nav-link">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20"
                                            fill="#999999" viewBox="0 0 16 16">
                                            <path
                                                d="M8 4.754a3.246 3.246 0 1 0 0 6.492 3.246 3.246 0 0 0 0-6.492zM5.754 8a2.246 2.246 0 1 1 4.492 0 2.246 2.246 0 0 1-4.492 0z" />
                                            <path
                                                d="M9.796 1.343c-.527-1.79-3.065-1.79-3.592 0l-.094.319a.873.873 0 0 1-1.255.52l-.292-.16c-1.64-.892-3.433.902-2.54 2.541l.159.292a.873.873 0 0 1-.52 1.255l-.319.094c-1.79.527-1.79 3.065 0 3.592l.319.094a.873.873 0 0 1 .52 1.255l-.16.292c-.892 1.64.901 3.434 2.541 2.54l.292-.159a.873.873 0 0 1 1.255.52l.094.319c.527 1.79 3.065 1.79 3.592 0l.094-.319a.873.873 0 0 1 1.255-.52l.292.16c1.64.893 3.434-.902 2.54-2.541l-.159-.292a.873.873 0 0 1 .52-1.255l.319-.094c1.79-.527 1.79-3.065 0-3.592l-.319-.094a.873.873 0 0 1-.52-1.255l.16-.292c.893-1.64-.902-3.433-2.541-2.54l-.292.159a.873.873 0 0 1-1.255-.52l-.094-.319z" />
                                        </svg>
                                        &nbsp;&nbsp; Services
                                    </a>
                                </li>
                            @endcan
                        @endif

                        {{-- Profile and Misc --}}
                        <li class="menu-header">Other</li>
                        <li class="dropdown">
                            <a href="{{ route('profile') }}" class="nav-link">
                                <i data-feather="user"></i> Profile
                            </a>
                        </li>
                        <li class="dropdown">
                            <a href="{{ route('inquiry') }}" class="nav-link">
                                <i data-feather="user"></i> Inquiry
                            </a>
                        </li>
                        <li class="dropdown">
                            <a href="{{ route('logout') }}" class="nav-link">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                    viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                    stroke-linecap="round" stroke-linejoin="round" class="feather feather-log-out">
                                    <path d="M9 21H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h4"></path>
                                    <polyline points="16 17 21 12 16 7"></polyline>
                                    <line x1="21" y1="12" x2="9" y2="12"></line>
                                </svg> Logout
                            </a>
                        </li>
                    </ul>
                </aside>
            </div>



            @yield('content')


            <script src="{{ asset('admin/js/app.min.js') }}"></script>
            <script src="{{ asset('/admin/bundles/apexcharts/apexcharts.min.js') }}"></script>
            <script src="{{ asset('/admin/bundles/jqvmap/dist/jquery.vmap.min.js') }}"></script>
            <script src="{{ asset('/admin/bundles/jqvmap/dist/maps/jquery.vmap.usa.js') }}"></script>
            <script src="{{ asset('/admin/js/page/index.js') }}"></script>
            <script src="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.18/summernote-bs4.min.js"></script>
            <script src="{{ asset('/admin/js/scripts.js') }}"></script>
            <script src="{{ asset('/admin/js/custom.js') }}"></script>
            <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
            <script src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>
            
            <script>
                toastr.options = {
                    "closeButton": true,
                    "progressBar": true,
                    "positionClass": "toast-top-right",
                    "timeOut": "5000"
                };

                @if (session('success'))
                    toastr.success("{{ session('success') }}", "Success");
                @endif

                @if (session('error'))
                    toastr.error("{{ session('error') }}", "Error");
                @endif
            </script>
            <script>
                $(document).ready(function() {
                    $('#table-1').DataTable();
                });
            </script>
            <style>
                #table-1_filter {
                    float: right;
                }
            </style>
            @yield('scripts')
</body>

</html>

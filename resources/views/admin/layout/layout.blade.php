<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
    <meta name="csrf-token" content="{{ csrf_token() }}">

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
                            <a href="#" data-toggle="sidebar" class="nav-link nav-link-lg collapse-btn">
                                <i data-feather="menu"></i></a>
                        </li>
                    </ul>
                </div>
                <ul class="navbar-nav navbar-right">
                    <li class="dropdown">
                        <a href="#" data-toggle="dropdown" class="nav-link dropdown-toggle nav-link-lg nav-link-user">
                            <img alt="image" src="{{ asset(Auth()->user()->image) }}" class="user-img-radious-style">
                        </a>
                        <div class="dropdown-menu dropdown-menu-right pullDown">
                            <div class="dropdown-title">{{ Auth()->user()->name }}</div>
                            <a href="{{ route('profile') }}" class="dropdown-item has-icon">
                                <i data-feather="user"></i> Profile
                            </a>
                            <div class="dropdown-divider"></div>
                            <a href="{{ route('logout') }}" class="dropdown-item has-icon text-danger">
                                <i data-feather="log-out"></i> Logout
                            </a>
                        </div>
                    </li>
                </ul>
            </nav>

            <div class="main-sidebar sidebar-style-2">
                <aside id="sidebar-wrapper">
                    <div class="sidebar-brand">
                        <a href="/">
                            <img src="{{ asset('assets/images/logo/logo.png') }}" class="header-logo" width="30px" height="80px" />
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

                        {{-- Dashboard --}}
                        <li class="menu-header">Dashboard</li>
                        <li class="dropdown">
                            <a href="{{ route('dashboard') }}" class="nav-link">
                                <i data-feather="monitor"></i> Dashboard
                            </a>
                        </li>

                        {{-- User Management --}}
                        @if ($isAdmin)
                            <li class="menu-header">User Management</li>
                            <li class="dropdown">
                                <a href="{{ route('all-users.index') }}" class="nav-link">
                                    <i data-feather="users"></i> Accounts
                                </a>
                            </li>
                        @else
                            @can('user-view')
                                <li class="dropdown">
                                    <a href="{{ route('all-users.index') }}" class="nav-link">
                                        <i data-feather="users"></i> User/Providers
                                    </a>
                                </li>
                            @endcan
                        @endif

                        {{-- Content Management --}}
                        <li class="menu-header">Content Management</li>
                        <li class="dropdown">
                            <a href="{{ route('blogs-upload.index') }}" class="nav-link">
                                <i data-feather="file-text"></i> Blogs
                            </a>
                        </li>

                        @if ($isAdmin)
                            <li class="dropdown">
                                <a href="{{ route('homebanner.index') }}" class="nav-link">
                                    <i data-feather="image"></i> Home Banners
                                </a>
                            </li>
                        @else
                            @can('user-view')
                                <li class="dropdown">
                                    <a href="{{ route('homebanner.index') }}" class="nav-link">
                                        <i data-feather="image"></i> Home Banners
                                    </a>
                                </li>
                            @endcan
                        @endif

                        {{-- Orders --}}
                        @if ($isAdmin)
                            <li class="menu-header">Orders</li>
                            <li class="dropdown">
                                <a href="{{ route('orders.management') }}" class="nav-link">
                                    <i data-feather="shopping-cart"></i> Orders
                                </a>
                            </li>
                        @else
                            @can('order-index')
                                <li class="dropdown">
                                    <a href="{{ route('orders.management') }}" class="nav-link">
                                        <i data-feather="shopping-cart"></i> Orders
                                    </a>
                                </li>
                            @endcan
                        @endif

                        {{-- Content --}}
                        <li class="menu-header">Content</li>
                        <li class="dropdown">
                            <a href="{{ route('content.index') }}" class="nav-link">
                                <i data-feather="file"></i> Content
                            </a>
                        </li>

                        {{-- Access Control --}}
                        @if ($isAdmin)
                            <li class="menu-header">Access Control</li>
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
                        @if ($isAdmin || $isProvider)
                            <li class="menu-header">Product Management</li>
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

                        {{-- Products --}}
                        @if ($isAdmin)
                            <li class="dropdown">
                                <a href="{{ route('product.index') }}" class="nav-link">
                                    <i data-feather="package"></i> Products
                                </a>
                            </li>
                        @else
                            @can('product-view')
                                <li class="dropdown">
                                    <a href="{{ route('product.index') }}" class="nav-link">
                                        <i data-feather="package"></i> Products
                                    </a>
                                </li>
                            @endcan
                        @endif

                        {{-- Services --}}
                        @if ($isAdmin || $isProvider)
                            <li class="dropdown">
                                <a href="{{ route('service.index') }}" class="nav-link">
                                    <i data-feather="layers"></i> Services
                                </a>
                            </li>
                        @else
                            @can('service-view')
                                <li class="dropdown">
                                    <a href="{{ route('service.index') }}" class="nav-link">
                                        <i data-feather="layers"></i> Services
                                    </a>
                                </li>
                            @endcan
                        @endif

                        {{-- Availability --}}
                        @if ($isAdmin || $isProvider)
                            <li class="menu-header">Availability</li>
                            <li class="dropdown">
                                <a href="{{ route('avail.index') }}" class="nav-link">
                                    <i data-feather="clock"></i> Availabilities
                                </a>
                            </li>
                        @else
                            @can('availability-view')
                                <li class="dropdown">
                                    <a href="{{ route('avail.index') }}" class="nav-link">
                                        <i data-feather="clock"></i> Availabilities
                                    </a>
                                </li>
                            @endcan
                        @endif

                        {{-- Profile & Other --}}
                        <li class="menu-header">Other</li>
                        <li class="dropdown">
                            <a href="{{ route('profile') }}" class="nav-link">
                                <i data-feather="user"></i> Profile
                            </a>
                        </li>
                        <li class="dropdown">
                            <a href="{{ route('inquiry') }}" class="nav-link">
                                <i data-feather="mail"></i> Inquiry
                            </a>
                        </li>
                        <li class="dropdown">
                            <a href="{{ route('logout') }}" class="nav-link">
                                <i data-feather="log-out"></i> Logout
                            </a>
                        </li>

                    </ul>
                </aside>
            </div>

            {{-- Main Content --}}
            @yield('content')

            {{-- Scripts --}}
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

            {{-- Toastr --}}
            <script>
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });

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

            {{-- Datatables --}}
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
        </div>
    </div>
</body>

</html>

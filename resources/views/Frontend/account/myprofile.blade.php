@extends('Frontend.layout.layout')
@section('title', 'Profile')

@section('content')

    <style>
        :root {
            --account-order-red: #d32f2f;
            --account-order-dark: #1a1a1a;
            --account-order-gray: #2d2d2d;
            --account-order-light: #f5f5f5;
        }

        .my-main-cont {
            margin-top: 80px;
            margin-bottom: 80px;
        }

        .account-order-profile-header {
            background: linear-gradient(135deg, var(--account-order-dark), var(--account-order-gray));
            color: white;
            padding: 30px;
            border-radius: 8px 8px 0 0;
        }

        .account-order-profile-img {
            width: 100px;
            height: 100px;
            border-radius: 50%;
            border: 3px solid var(--account-order-red);
            object-fit: cover;
        }

        .account-order-sidebar {
            background-color: white;
            border-radius: 8px;
            padding: 0;
            height: auto;
            overflow: hidden;
        }

        .account-order-sidebar-menu {
            list-style: none;
            padding: 0;
            margin: 0;
        }

        .account-order-sidebar-menu li {
            border-bottom: 1px solid #eee;
        }

        .account-order-sidebar-menu li:last-child {
            border-bottom: none;
        }

        .account-order-sidebar-menu a {
            display: block;
            padding: 15px 20px;
            color: var(--account-order-dark);
            text-decoration: none;
            transition: all 0.3s;
        }

        .account-order-sidebar-menu a:hover,
        .account-order-sidebar-menu a.account-order-active {
            background-color: #f8f9fa;
            color: var(--account-order-red);
            border-left: 4px solid var(--account-order-red);
        }

        .account-order-sidebar-menu i {
            width: 25px;
            text-align: center;
            margin-right: 10px;
        }

        /********my-profile-css***********/
        :root {
            --my-profile-red: #d32f2f;
            --my-profile-dark: #1a1a1a;
            --my-profile-gray: #2d2d2d;
            --my-profile-light: #f5f5f5;
        }

        .my-profile-container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 20px;
        }

        .my-profile-card {
            border: none;
            border-radius: 8px;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
            overflow: hidden;
            transition: transform 0.3s;
            background: white;
        }

        .my-profile-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 6px 16px rgba(0, 0, 0, 0.15);
        }

        .my-profile-header {
            background: linear-gradient(135deg, var(--my-profile-dark), var(--my-profile-gray));
            color: white;
            padding: 30px;
            text-align: center;
            position: relative;
        }

        .my-profile-avatar {
            width: 120px;
            height: 120px;
            border-radius: 50%;
            border: 3px solid var(--my-profile-red);
            object-fit: cover;
            margin: 0 auto 15px;
            background-color: white;
            padding: 5px;
        }

        .my-profile-edit-btn {
            position: absolute;
            top: 20px;
            right: 20px;
            background: var(--my-profile-red);
            color: white;
            border: none;
            width: 40px;
            height: 40px;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            cursor: pointer;
            transition: all 0.3s;
        }

        .my-profile-edit-btn:hover {
            background: white;
            color: var(--my-profile-red);
            transform: rotate(15deg);
        }

        .my-profile-badge {
            display: inline-block;
            padding: 5px 10px;
            border-radius: 20px;
            font-size: 0.8rem;
            font-weight: 600;
            margin: 0 5px;
        }

        .my-profile-badge-primary {
            background-color: rgba(211, 47, 47, 0.1);
            color: var(--my-profile-red);
            border: 1px solid var(--my-profile-red);
        }

        .my-profile-badge-secondary {
            background-color: #f5f5f5;
            color: var(--my-profile-gray);
        }

        .my-profile-section {
            padding: 25px;
            border-bottom: 1px solid #eee;
        }

        .my-profile-section:last-child {
            border-bottom: none;
        }

        .my-profile-section-title {
            color: #878244;
            margin-bottom: 20px;
            display: flex;
            align-items: center;
        }

        .my-profile-section-title i {
            margin-right: 10px;
        }

        .my-profile-info-grid {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(250px, 1fr));
            gap: 20px;
        }

        .my-profile-info-item {
            margin-bottom: 15px;
        }

        .my-profile-info-label {
            font-weight: 600;
            color: var(--my-profile-gray);
            margin-bottom: 5px;
            font-size: 0.9rem;
        }

        .my-profile-info-value {
            padding: 8px 12px;
            background: #f9f9f9;
            border-radius: 4px;
            border-left: 3px solid var(--my-profile-red);
        }

        .my-profile-weapon-card {
            display: flex;
            align-items: center;
            padding: 15px;
            border-radius: 6px;
            background: #f9f9f9;
            margin-bottom: 10px;
            transition: all 0.3s;
        }

        .my-profile-weapon-card:hover {
            background: #f0f0f0;
            transform: translateX(5px);
        }

        .my-profile-weapon-img {
            width: 60px;
            height: 40px;
            object-fit: cover;
            border-radius: 4px;
            border: 1px solid #ddd;
            margin-right: 15px;
        }

        .my-profile-caliber-badge {
            background: var(--my-profile-dark);
            color: white;
            font-size: 0.7rem;
            padding: 3px 8px;
            border-radius: 4px;
            margin-right: 5px;
        }

        @media (max-width: 768px) {
            .my-profile-info-grid {
                grid-template-columns: 1fr;
            }

            .my-profile-avatar {
                width: 100px;
                height: 100px;
            }
        }
    </style>

    <section class="breadcumb-area jarallax bg-img af">
        <div class="breadcumb">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <div class="content">
                            <h2>My Profile</h2>
                            <ul>
                                <li><a href="/">Home</a></li>
                                <li><a href="javascript:void(0)">My Profile</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <div class="container py-5 my-main-cont">
        <!-- Profile Header -->
        <div class="account-order-card mb-4">
            <div class="account-order-profile-header text-center text-md-start">
                <div class="row align-items-center">
                    <div class="col-md-2 text-center mb-3 mb-md-0">
                        <img src="{{ Auth::user()->image && file_exists(public_path(Auth::user()->image)) ? asset(Auth::user()->image) : asset('default.png') }}"
                            alt="Profile" class="account-order-profile-img">
                    </div>

                    <div class="col-md-6">
                        <h3>{{ Auth::user()->name }}</h3>
                        <p class="mb-1"><i class="fas fa-shield-alt me-2"></i> Member Since:
                            {{ \Carbon\Carbon::parse(Auth::user()->created_at)->format('F Y') }}
                        </p>
                        {{-- <p class="mb-0"><i class="fas fa-id-card me-2"></i> FFL License: #123456789</p> --}}
                    </div>
                </div>
            </div>
        </div>

        <div class="row">

            @include('Frontend.account.partail.sidebar')
            <!--start Main Content -->
            <!-- <div class="my-profile-container py-4">
                                                                                                        <div class="row"> -->
            @yield('profile-content')
            <!--  </div>
                                                                                                    </div> -->
            <!----end-main-code----->

        </div>
        {{-- <div class="container py-4">
            <div class="row">
                <div class="col-lg-6">
                    <div class="my-profile-card mb-4">
                        <div class="my-profile-section">
                            <h5 class="my-profile-section-title">
                                <i class="fas fa-gun"></i> Registered Weapons
                            </h5>

                            <div class="my-profile-weapon-card">
                                <img src="assets/images/products/100.jpg" alt="AR-15" class="my-profile-weapon-img">
                                <div>
                                    <h6 class="mb-1">Tactical AR-15 Rifle</h6>
                                    <div class="d-flex align-items-center">
                                        <span class="my-profile-caliber-badge">5.56 NATO</span>
                                        <small class="text-muted">Serial: AR15-TAC-789456</small>
                                    </div>
                                </div>
                            </div>

                            <div class="my-profile-weapon-card">
                                <img src="assets/images/products/101.jpg" alt="Glock 19" class="my-profile-weapon-img">
                                <div>
                                    <h6 class="mb-1">Glock 19 Gen 5</h6>
                                    <div class="d-flex align-items-center">
                                        <span class="my-profile-caliber-badge">9mm</span>
                                        <small class="text-muted">Serial: GLK19-G5-123789</small>
                                    </div>
                                </div>
                            </div>

                            <div class="my-profile-weapon-card">
                                <img src="assets/images/products/103.jpeg" alt="1911" class="my-profile-weapon-img">
                                <div>
                                    <h6 class="mb-1">Colt M1911</h6>
                                    <div class="d-flex align-items-center">
                                        <span class="my-profile-caliber-badge">.45 ACP</span>
                                        <small class="text-muted">Serial: COLT1911-456123</small>
                                    </div>
                                </div>
                            </div>

                            <button class="btn btn-outline-dark btn1 mt-3">
                                <i class="fas fa-plus"></i> Register New Weapon
                            </button>
                        </div>
                    </div>
                </div>

                <div class="col-lg-6">
                    <div class="my-profile-card">
                        <div class="my-profile-section">
                            <h5 class="my-profile-section-title">
                                <i class="fas fa-medal"></i> Training & Certifications
                            </h5>
                            <div class="my-profile-info-grid">
                                <div class="my-profile-info-item">
                                    <div class="my-profile-info-label">NRA Certification:</div>
                                    <div class="my-profile-info-value">
                                        <i class="fas fa-check-circle text-success"></i> Certified Instructor
                                    </div>
                                </div>
                                <div class="my-profile-info-item">
                                    <div class="my-profile-info-label">Tactical Training:</div>
                                    <div class="my-profile-info-value">Advanced Close Quarters Combat</div>
                                </div>
                                <div class="my-profile-info-item">
                                    <div class="my-profile-info-label">Sniper Certification:</div>
                                    <div class="my-profile-info-value">Long Range Precision (1000m+)</div>
                                </div>
                                <div class="my-profile-info-item">
                                    <div class="my-profile-info-label">Last Range Visit:</div>
                                    <div class="my-profile-info-value">15 June 2023</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div> --}}
    </div>
    <!---my-code---->


    <script>
        // JavaScript with account-order prefix
        document.addEventListener('DOMContentLoaded', function() {
            const currentPage = window.location.pathname.split('/').pop();
            const menuItems = document.querySelectorAll('.account-order-sidebar-menu a');

            menuItems.forEach(item => {
                if (item.getAttribute('href') === currentPage) {
                    item.classList.add('account-order-active');
                }
            });
        });
    </script>
    <script>
        // Sample dynamic data loading
        document.addEventListener('DOMContentLoaded', function() {
            // In a real app, you would fetch this from an API
            const profileData = {
                name: "John Wick",
                callsign: "Reaper",
                avatar: "https://randomuser.me/api/portraits/men/32.jpg",
                joinDate: "Jan 2022",
                fflLicense: "#FFL-789456123",
                weapons: [{
                        name: "Tactical AR-15 Rifle",
                        caliber: "5.56 NATO",
                        serial: "AR15-TAC-789456",
                        image: "https://via.placeholder.com/150x100/333/fff?text=AR-15"
                    },
                    // More weapons data...
                ],
                // More profile data...
            };

            // You would use this data to populate the UI dynamically
            // document.querySelector('.my-profile-avatar').src = profileData.avatar;
            // etc...
        });
    </script>
@endsection

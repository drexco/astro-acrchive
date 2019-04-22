<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="author" content="Drexco">
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <link rel="shortcut icon" href="../assets/images/favicon.png">
    <meta name="robots" content="noindex, nofollow">
    <title>Astro Options : @yield('page_title')</title>
    <link href="https://fonts.googleapis.com/css?family=Nunito:300,400,400i,600,700,800,900" rel="stylesheet">
    <link rel="stylesheet" href="assets/styles/css/themes/lite-purple.min.css">
</head>

<body class="text-left">
    <div class="app-admin-wrap layout-sidebar-large clearfix">
        <div class="main-header">
            <div class="logo">
                <img src="assets/images/logo.png" alt="">
            </div>

            <div class="menu-toggle">
                <div></div>
                <div></div>
                <div></div>
            </div>

            <div style="margin: auto"></div>

            <div class="header-part-right">
                <!-- Full screen toggle -->
                <i class="i-Full-Screen header-icon d-none d-sm-inline-block" data-fullscreen></i>
                <!-- Grid menu Dropdown -->
                @if(Session::get('user_id'))
                    <div class="dropdown">
                        <i class="i-Safe-Box text-muted header-icon" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" role="button" aria-expanded="false"></i>
                        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                            <div class="menu-icon-grid">
                                <a href="#"><i class="i-Shop-4"></i> Home</a>
                                <a href="#"><i class="i-Library"></i> UI Kits</a>
                                <a href="#"><i class="i-Drop"></i> Apps</a>
                                <a href="#"><i class="i-File-Clipboard-File--Text"></i> Forms</a>
                                <a href="#"><i class="i-Checked-User"></i> Sessions</a>
                                <a href="#"><i class="i-Ambulance"></i> Support</a>
                            </div>
                        </div>
                    </div>
                @endif

                <!-- User avatar dropdown -->
                @if(Session::get('user_id'))
                    <div class="dropdown">
                        <div class="user col align-self-end">
                            <img src="assets/images/faces/1.jpg" id="userDropdown" alt="" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">

                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="userDropdown">
                                <div class="dropdown-header">
                                    <i class="i-Lock-User mr-1"></i> {{Session::get('username')}}
                                </div>
                                <a class="dropdown-item">Profile</a>
                                <a class="dropdown-item">Transactions</a>
                                <a class="dropdown-item" href="/log-out">Sign out</a>
                            </div>
                        </div>
                    </div>
                @endif
            </div>

        </div>

        <div class="side-content-wrap">
            <div class="sidebar-left open rtl-ps-none" data-perfect-scrollbar data-suppress-scroll-x="true">
                <ul class="navigation-left">
                    @if(Session::get('user_id'))
                         @if(Session::get('account_type')=='user')
                            <li class="nav-item active" data-item="/">
                                <a class="nav-item-hold" href="#">
                                    <i class="nav-icon i-Shop"></i>
                                    <span class="nav-text">Dashboard</span>
                                </a>
                                <div class="triangle"></div>
                            </li>
                            <li class="nav-item" data-item="profile">
                                <a class="nav-item-hold" href="#">
                                    <i class="nav-icon i-Male"></i>
                                    <span class="nav-text">Profile</span>
                                </a>
                                <div class="triangle"></div>
                            </li>
                            <li class="nav-item" data-item="funds">
                                <a class="nav-item-hold" href="#">
                                    <i class="nav-icon i-Money-2"></i>
                                    <span class="nav-text">Funds</span>
                                </a>
                                <div class="triangle"></div>
                            </li>
                            <li class="nav-item" data-item="transactions">
                                <a class="nav-item-hold" href="#">
                                    <i class="nav-icon i-Line-Chart-2"></i>
                                    <span class="nav-text">Transactions</span>
                                </a>
                                <div class="triangle"></div>
                            </li>
                            <li class="nav-item" data-item="help">
                                <a class="nav-item-hold" href="#">
                                    <i class="nav-icon i-Headset"></i>
                                    <span class="nav-text">Help</span>
                                </a>
                                <div class="triangle"></div>
                            </li>
                        @elseif(Session::get('account_type')=='admin')
                            <li class="nav-item">
                                <a class="nav-item-hold" href="/">
                                    <i class="nav-icon i-Shop"></i>
                                    <span class="nav-text">Dashboard</span>
                                </a>
                                <div class="triangle"></div>
                            </li>
                            <li class="nav-item" data-item="profile">
                                <a class="nav-item-hold" href="#">
                                    <i class="nav-icon i-Administrator"></i>
                                    <span class="nav-text">Profile</span>
                                </a>
                                <div class="triangle"></div>
                            </li>
                            <li class="nav-item" data-item="accounts">
                                <a class="nav-item-hold" href="#">
                                    <i class="nav-icon i-Briefcase"></i>
                                    <span class="nav-text">Accounts</span>
                                </a>
                                <div class="triangle"></div>
                            </li>
                            <li class="nav-item" data-item="transactions">
                                <a class="nav-item-hold" href="#">
                                    <i class="nav-icon i-Line-Chart-2"></i>
                                    <span class="nav-text">Transactions</span>
                                </a>
                                <div class="triangle"></div>
                            </li>
                            <li class="nav-item" data-item="users">
                                <a class="nav-item-hold" href="#">
                                    <i class="nav-icon i-MaleFemale"></i>
                                    <span class="nav-text">Users</span>
                                </a>
                                <div class="triangle"></div>
                            </li>
                            <li class="nav-item" data-item="settings">
                                <a class="nav-item-hold" href="#">
                                    <i class="nav-icon i-Gear-2"></i>
                                    <span class="nav-text">Settings</span>
                                </a>
                                <div class="triangle"></div>
                            </li>
                        @endif
                    @else
                        <li class="nav-item">
                                <a class="nav-item-hold" href="signin">
                                    <i class="nav-icon i-Power-2"></i>
                                    <span class="nav-text">Sign In</span>
                                </a>
                                <div class="triangle"></div>
                         </li>
                         <li class="nav-item">
                                <a class="nav-item-hold" href="signup">
                                    <i class="nav-icon i-Book"></i>
                                    <span class="nav-text">Sign Up</span>
                                </a>
                                <div class="triangle"></div>
                         </li>
                    @endif
                </ul>
            </div>

            <div class="sidebar-left-secondary rtl-ps-none" data-perfect-scrollbar data-suppress-scroll-x="true">
                <!-- Submenu Dashboards -->
                @if(Session::get('user_id'))
                         @if(Session::get('account_type')=='user')
                            <ul class="childNav" data-parent="dashboard">
                                <li class="nav-item">
                                    <a href="../users/summary">
                                        <i class="nav-icon i-Shop"></i>
                                        <span class="item-name">Home</span>
                                    </a>
                                </li>
                            </ul>
                            <ul class="childNav" data-parent="profile">
                                <li class="nav-item">
                                    <a href="/editprofile">
                                        <i class="nav-icon i-Edit"></i>
                                        <span class="item-name">Edit</span>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="/security">
                                        <i class="nav-icon i-Lock"></i>
                                        <span class="item-name">Security</span>
                                    </a>
                                </li>
                            </ul>
                            <ul class="childNav" data-parent="funds">
                                <li class="nav-item">
                                    <a href="/depositfunds">
                                        <i class="nav-icon i-Add"></i>
                                        <span class="item-name">Deposit</span>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="/withdrawfunds">
                                        <i class="nav-icon i-Remove"></i>
                                        <span class="item-name">Withdraw</span>
                                    </a>
                                </li>
                                <li class="nav-item">
                                        <a href="../users/tradetransfer">
                                            <i class="nav-icon i-Shuffle"></i>
                                            <span class="item-name">Trade Transfer</span>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="../users/transferfunds">
                                            <i class="nav-icon i-Shuffle-2"></i>
                                            <span class="item-name">Funds Transfer</span>
                                        </a>
                                    </li>
                                <li class="nav-item">
                                    <a href="/balance">
                                        <i class="nav-icon i-Money-2"></i>
                                        <span class="item-name">Balance</span>
                                    </a>
                                </li>
                            </ul>
                            <ul class="childNav" data-parent="transactions">
                                <li class="nav-item">
                                    <a href="/viewtransctions">
                                        <i class="nav-icon i-Align-Left"></i>
                                        <span class="item-name">List</span>
                                    </a>
                                </li>
                            </ul>
                            <ul class="childNav" data-parent="help">
                                <li class="nav-item">
                                    <a href="/help">
                                        <i class="nav-icon i-Smile"></i>
                                        <span class="item-name">Help</span>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="accordion.html">
                                        <i class="nav-icon i-Headset"></i>
                                        <span class="item-name">Live Chat</span>
                                    </a>
                                </li>
                            </ul>
                        @elseif(Session::get('account_type')=='admin')
                            <ul class="childNav" data-parent="profile">
                                <li class="nav-item">
                                    <a href="/viewprofile">
                                        <i class="nav-icon i-Eye"></i>
                                        <span class="item-name">View</span>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="/editprofile">
                                        <i class="nav-icon i-Pencil"></i>
                                        <span class="item-name">Edit</span>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="/changepassword">
                                        <i class="nav-icon i-Lock"></i>
                                        <span class="item-name">Change Password</span>
                                    </a>
                                </li>
                            </ul>
                            <ul class="childNav" data-parent="accounts">
                                <li class="nav-item">
                                    <a href="/addaccount">
                                        <i class="nav-icon i-Plus"></i>
                                        <span class="item-name">Add</span>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="/viewaccounts">
                                        <i class="nav-icon i-List"></i>
                                        <span class="item-name">View</span>
                                    </a>
                                </li>
                            </ul>
                            <ul class="childNav" data-parent="transactions">
                                <li class="nav-item">
                                    <a href="/addtransaction">
                                        <i class="nav-icon i-Plus"></i>
                                        <span class="item-name">Add</span>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="/viewtransactions">
                                        <i class="nav-icon i-List"></i>
                                        <span class="item-name">View</span>
                                    </a>
                                </li>
                            </ul>
                            <ul class="childNav" data-parent="users">
                                <li class="nav-item">
                                    <a href="/adduser">
                                        <i class="nav-icon i-Plus"></i>
                                        <span class="item-name">Add</span>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="/viewusers">
                                        <i class="nav-icon i-List"></i>
                                        <span class="item-name">View</span>
                                    </a>
                                </li>
                            </ul>
                            <ul class="childNav" data-parent="settings">
                                <li class="nav-item">
                                    <a href="/viewsettings">
                                        <i class="nav-icon i-List"></i>
                                        <span class="item-name">View</span>
                                    </a>
                                </li>
                            </ul>
                        @endif
                    @endif
            </div>
            <div class="sidebar-overlay"></div>
        </div>
        <!--=============== Left side End ================-->

        <!-- ============ Body content start ============= -->
        <div class="main-content-wrap sidenav-open d-flex flex-column">
            @yield('content')
            <!-- Footer Start -->
            <div class="flex-grow-1"></div>
            <div class="app-footer">
                <div class="row">
                    <div class="col-md-9">
                        <p><strong>Join our Trading Academy to sharpen you skills</strong></p>
                        <p>We offer hands-on trading tutorials on the the various trading strategies to give you an edge and to further enhance your trading acument. Hit the button below to join us now!!
                        </p>
                    </div>
                </div>
                <div class="footer-bottom border-top pt-3 d-flex flex-column flex-sm-row align-items-center">
                    <a class="btn btn-primary text-white btn-rounded" href="https://themeforest.net/user/mh_rafi" target="_blank">Demo Live</a>
                    <span class="flex-grow-1"></span>
                    <div class="d-flex align-items-center">
                        <img class="logo" src="./assets/images/logo.png" alt="">
                        <div>
                            <p class="m-0">&copy; 2019 Astro Options</p>
                            <p class="m-0">All rights reserved</p>
                        </div>
                    </div>
                </div>
            </div>
            <!-- fotter end -->
        </div>
        <!-- ============ Body content End ============= -->
    </div>
    <!--=============== End app-admin-wrap ================-->

    <script src="assets/js/vendor/jquery-3.3.1.min.js"></script>
    <script src="assets/js/vendor/bootstrap.bundle.min.js"></script>
    <script src="assets/js/vendor/perfect-scrollbar.min.js"></script>
    <script src="assets/js/vendor/echarts.min.js"></script>

    <script src="assets/js/form.validation.script.js"></script>

    <script src="assets/js/es5/echart.options.min.js"></script>
    <script src="assets/js/es5/dashboard.v1.script.min.js"></script>

    <!-- page vendor js -->
    <script src="assets/js/vendor/datatables.min.js"></script>
    <script src="assets/js/es5/script.min.js"></script>
    <script src="assets/js/es5/sidebar.large.script.min.js"></script>

    <!-- page custom js -->
    <script src="assets/js/datatables.script.js"></script>

    <script src="assets/js/es5/script.min.js"></script>
    <script src="assets/js/es5/sidebar.large.script.min.js"></script>
</body>

</html>
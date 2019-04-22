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
	    <title>Astro Options : User Summary</title>
	    <link href="https://fonts.googleapis.com/css?family=Nunito:300,400,400i,600,700,800,900" rel="stylesheet">
	    <link rel="stylesheet" href="../assets/styles/css/themes/lite-purple.min.css">
	</head>

	<body class="text-left">
	    <div class="app-admin-wrap layout-sidebar-large clearfix">
	        <div class="main-header">
	            <div class="logo">
	                <img src="../assets/images/logo.png" alt="">
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
	                                <a href="/"><i class="i-Shop"></i> Home</a>
	                                <a href="#"><i class="i-Male"></i> Profile</a>
	                                <a href="#"><i class="i-Money-2"></i> Funds</a>
	                                <a href="#"><i class="i-Ambulance"></i> Help</a>
	                            </div>
	                        </div>
	                    </div>
	                @endif
	                <!-- Notificaiton -->
	                @if(Session::get('user_id'))
	                    <div class="dropdown">
	                        <div class="badge-top-container" id="dropdownNotification" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
	                            <span class="badge badge-primary">{{$data['notifications']}}</span>
	                            <i class="i-Bell text-muted header-icon"></i>
	                        </div>
	                        <!-- Notification dropdown -->
	                        <div class="dropdown-menu rtl-ps-none dropdown-menu-right notification-dropdown" aria-labelledby="dropdownNotification" data-perfect-scrollbar data-suppress-scroll-x="true">
	                            <div class="dropdown-item d-flex">
	                                <div class="notification-icon">
	                                    <i class="i-Speach-Bubble-6 text-primary mr-1"></i>
	                                </div>
	                                <div class="notification-details flex-grow-1">
	                                    <p class="m-0 d-flex align-items-center">
	                                        @foreach($data['notes'] as $note)
			                                    <span>{{ $note->notice }}</span>
			                                @endforeach 
	                                        <span class="flex-grow-1"></span>
	                                    </p>
	                                    @foreach($data['notes'] as $note)
			                                <p class="text-small text-muted m-0">{{ $note->message }}</p>
			                            @endforeach 
	                                    @foreach($data['notes'] as $note)
			                               	<p class="text-small text-muted ml-auto">{{ $note->noted_on }}</p>
			                           	@endforeach 
	                                </div>
	                            </div>
	                        </div>
	                    </div>
	                @endif
	                <!-- Notificaiton End -->

	                <!-- User avatar dropdown -->
	                @if(Session::get('user_id'))
	                    <div class="dropdown">
	                        <div class="user col align-self-end">
	                            <img src="../assets/images/faces/1.jpg" id="userDropdown" alt="" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">

	                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="userDropdown">
	                                <div class="dropdown-header">
	                                    <i class="i-Lock-User mr-1"></i> {{Session::get('username')}}
	                                </div>
	                                <a class="dropdown-item">Profile</a>
	                                <a class="dropdown-item">Transactions</a>
	                                <a class="dropdown-item" href="../log-out">Sign out</a>
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
	                            <li class="nav-item active" data-item="dashboard">
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
	                                    <a href="../users/profile">
	                                        <i class="nav-icon i-Edit"></i>
	                                        <span class="item-name">Edit</span>
	                                    </a>
	                                </li>
	                                <li class="nav-item">
	                                    <a href="../users/security">
	                                        <i class="nav-icon i-Lock"></i>
	                                        <span class="item-name">Security</span>
	                                    </a>
	                                </li>
	                            </ul>
	                            <ul class="childNav" data-parent="funds">
	                                <li class="nav-item">
	                                    <a href="../users/depositfunds">
	                                        <i class="nav-icon i-Add"></i>
	                                        <span class="item-name">Deposit</span>
	                                    </a>
	                                </li>
	                                <li class="nav-item">
	                                    <a href="../users/withdrawfunds">
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
	                                    <a href="../users/fundsbalance">
	                                        <i class="nav-icon i-Money-2"></i>
	                                        <span class="item-name">Balance</span>
	                                    </a>
	                                </li>
	                            </ul>
	                            <ul class="childNav" data-parent="transactions">
	                                <li class="nav-item">
	                                    <a href="../users/transactions">
	                                        <i class="nav-icon i-Align-Left"></i>
	                                        <span class="item-name">List</span>
	                                    </a>
	                                </li>
	                            </ul>
	                            <ul class="childNav" data-parent="help">
	                                <li class="nav-item">
	                                    <a href="../help">
	                                        <i class="nav-icon i-Smile"></i>
	                                        <span class="item-name">Help</span>
	                                    </a>
	                                </li>
	                                <li class="nav-item">
	                                    <a href="../chat">
	                                        <i class="nav-icon i-Headset"></i>
	                                        <span class="item-name">Live Chat</span>
	                                    </a>
	                                </li>
	                            </ul>
	                        @elseif(Session::get('account_type')=='admin')
	                            <ul class="childNav" data-parent="profile">
	                                <li class="nav-item">
	                                    <a href="../admin/profile/edit">
	                                        <i class="nav-icon i-Pencil"></i>
	                                        <span class="item-name">Edit</span>
	                                    </a>
	                                </li>
	                                <li class="nav-item">
	                                    <a href="../admin/profile/changepassword">
	                                        <i class="nav-icon i-Lock"></i>
	                                        <span class="item-name">Change Password</span>
	                                    </a>
	                                </li>
	                            </ul>
	                            <ul class="childNav" data-parent="accounts">
	                                <li class="nav-item">
	                                    <a href="../admin/accounts/list">
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
	            <div class="breadcrumb">
                <h1 class="mr-2">{{Session::get('username')}}</h1>
                <ul>
                    <li><a href="">Dashboard</a></li>
                    <li>User Summary</li>
                </ul>
            </div>

            <div class="separator-breadcrumb border-top"></div>

            <div class="row">
                <!-- ICON BG -->
                <div class="col-lg-3 col-md-6 col-sm-6">
                    <div class="card card-icon-bg card-icon-bg-primary o-hidden mb-4">
                        <div class="card-body text-center">
                            <i class="i-Financial"></i>
                            <div class="content">
                                <p class="text-muted mt-2 mb-0">Trades</p>
                                <p class="text-primary text-24 line-height-1 mb-2">{{$data['trades']}}</p>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-lg-3 col-md-6 col-sm-6">
                    <div class="card card-icon-bg card-icon-bg-primary o-hidden mb-4">
                        <div class="card-body text-center">
                            <i class="i-Checkout-Basket"></i>
                            <div class="content">
                                <p class="text-muted mt-2 mb-0">Orders</p>
                                <p class="text-primary text-24 line-height-1 mb-2">{{$data['totalOrders']}}</p>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-lg-3 col-md-6 col-sm-6">
                    <div class="card card-icon-bg card-icon-bg-primary o-hidden mb-4">
                        <div class="card-body text-center">
                            <i class="i-Money-2"></i>
                            <div class="content">
                                <p class="text-muted mt-2 mb-0">Trading ($)</p>
                                @foreach($data['tradingBalance'] as $trade)
                                    <p class="text-primary text-24 line-height-1 mb-2">{{ $trade->account_balance }}</p>
                                @endforeach 
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-lg-3 col-md-6 col-sm-6">
                    <div class="card card-icon-bg card-icon-bg-primary o-hidden mb-4">
                        <div class="card-body text-center">
                            <i class="i-Money-2"></i>
                            <div class="content">
                                <p class="text-muted mt-2 mb-0">Balance ($)</p>
                                @foreach($data['accountBalance'] as $account)
                                    <p class="text-primary text-24 line-height-1 mb-2">{{ $account->account_balance }}</p>
                                @endforeach 
                            </div>
                        </div>
                    </div>
                </div>

            </div>

            <div class="row">
                <div class="col-lg-8 col-md-12">
                    <div class="card mb-4">
                        <div class="card-body">
                            <div class="card-title">This Year Sales</div>
                            <div id="echartBar" style="height: 500px;"></div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-sm-12">
                    <div class="table-responsive">
                        <table id="zero_configuration_table" class="display table table-striped table-bordered" style="width:100%">
                            <thead>
                                <tr>
                                    <th>Name</th>
                                    <th>Last</th>
                                    <th>24H</th>
                                    <th>Volume ($)</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>BTC</td>
                                    <td>5049.5</td>
                                    <td>0.71%</td>
                                    <td>30,342,857</td>                                        
                                </tr>
                                <tr>
                                    <td>ETH</td>
                                    <td>164.97</td>
                                    <td>0.68%</td>
                                    <td>24,042,837</td>                                        
                                </tr>
                                <tr>
                                    <td>BCH</td>
                                    <td>312.97</td>
                                    <td>1.28%</td>
                                    <td>24,042,837</td>                                        
                                </tr>
                                <tr>
                                    <td>XRP</td>
                                    <td>0.354</td>
                                    <td>0.68%</td>
                                    <td>24,042,837</td>                                        
                                </tr>
                                <tr>
                                    <td>EOS</td>
                                    <td>5.32</td>
                                    <td>0.68%</td>
                                    <td>24,042,837</td>                                        
                                </tr>
                                <tr>
                                    <td>LTC</td>
                                    <td>87.56</td>
                                    <td>0.68%</td>
                                    <td>24,042,837</td>                                        
                                </tr>
                                <tr>
                                    <td>OMG</td>
                                    <td>2.387</td>
                                    <td>0.68%</td>
                                    <td>24,042,837</td>                                        
                                </tr>
                                <tr>
                                    <td>NEO</td>
                                    <td>13.28</td>
                                    <td>0.68%</td>
                                    <td>24,042,837</td>                                        
                                </tr>
                                <tr>
                                    <td>XMR</td>
                                    <td>70.152</td>
                                    <td>2.68%</td>
                                    <td>24,042,837</td>                                        
                                </tr>
                                <tr>
                                    <td>XMR</td>
                                    <td>70.152</td>
                                    <td>2.68%</td>
                                    <td>24,042,837</td>                                        
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-7">
                    <div class="card">
                        <div class="card-body">
                            <div class="card-title">Order Form</div>
                            <form class="needs-validation" novalidate>
                                <div class="form-row">
                                    <div class="col-form-label col-sm-2 pt-0">Price Selection</div>
                                        <div class="col-sm-10">
                                            <div class="form-check">
                                                <input class="form-check-input" type="radio" name="lastprice" id="lastprice" value="lastprice">
                                                <label class="form-check-label ml-3" for="lastprice">
                                                    Last Price
                                                </label>
                                            </div>
                                            <div class="form-check">
                                                <input class="form-check-input" type="radio" name="marketprice" id="marketprice" value="marketprice">
                                                <label class="form-check-label ml-3" for="marketprice">
                                                    Market Price
                                                </label>
                                            </div>
                                        </div>
                                </div>
                                <div>&nbsp;</div>
                                <div>&nbsp;</div>
                                <div class="form-row">
                                    <div class="col-md-4 mb-3">
                                        <label for="validationTooltip01">Price</label>
                                        <input type="number" class="form-control" id="validationTooltip01" placeholder="Enter Price" required>
                                    </div>
                                    <div class="col-md-4 mb-3">
                                        <label for="validationTooltip02">Amount</label>
                                        <input type="text" class="form-control" id="validationTooltip02" placeholder="Enter Amount" required>
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="col-md-4 mb-3">
                                        <button class="btn btn-success" type="submit">Buy</button>
                                    </div>
                                    <div class="col-md-4 mb-3">
                                        <button class="btn btn-primary" type="submit">Sell</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>

                <div class="col-lg-5 col-sm-5">
                                    <div class="card-body">
                                        <h4 class="card-title mb-3">Live Trades (BTC/USD)</h4>
                                            <div class="table-responsive">
                                                <table id="zero_configuration_table" class="display table table-striped table-bordered" style="width:100%">
                                                    <thead>
                                                        <tr>
                                                            <th>Time</th>
                                                            <th>Price</th>
                                                            <th>Amount</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <tr>
                                                            <td>10:21</td>
                                                            <td>5098.21</td>
                                                            <td>0.90</td>                               
                                                        </tr>
                                                        <tr>
                                                            <td>10:21</td>
                                                            <td>5021.21</td>
                                                            <td>1.22</td>                                       
                                                        </tr>
                                                        <tr>
                                                            <td>10:21</td>
                                                            <td>5021.21</td>
                                                            <td>1.22</td>                                       
                                                        </tr>
                                                        <tr>
                                                            <td>10:21</td>
                                                            <td>5021.21</td>
                                                            <td>1.22</td>                                       
                                                        </tr>
                                                        <tr>
                                                            <td>10:21</td>
                                                            <td>5021.21</td>
                                                            <td>1.22</td>                                       
                                                        </tr>
                                                        <tr>
                                                            <td>10:21</td>
                                                            <td>5021.21</td>
                                                            <td>1.22</td>                                       
                                                        </tr>
                                                        <tr>
                                                            <td>10:21</td>
                                                            <td>5021.21</td>
                                                            <td>1.22</td>                                       
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                    </div>
                                </div>
            </div>

            <div class="row">
                <div class="col-lg-12 col-md-12">
                    <div class="row">
                        <div class="col-lg-12 col-sm-12">
                            <div class="card-body">
                                <h4 class="card-title mb-3">Active Orders</h4>
                                    <div class="table-responsive">
                                        <table id="zero_configuration_table" class="display table table-striped table-bordered" style="width:100%">
                                            <thead>
                                                <tr>
                                                    <th>Pair</th>
                                                    <th>Type</th>
                                                    <th>Amount</th>
                                                    <th>Price</th>
                                                    <th>Status</th>
                                                    <th>Actions</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td>BTC/USD</td>
                                                    <td>Limit</td>
                                                    <td>0.90</td>
                                                    <td>5049.76</td>
                                                    <td><span class="badge badge-info">Pending</span></td>   
                                                    <td>
                                                        <a href="#" class="text-success mr-2">
                                                            <i class="nav-icon i-Pen-2 font-weight-bold"></i>
                                                        </a>
                                                        <a href="#" class="text-danger mr-2">
                                                            <i class="nav-icon i-Close-Window font-weight-bold"></i>
                                                        </a>
                                                    </td>                                  
                                                </tr>
                                                <tr>
                                                    <td>ETH/USD</td>
                                                    <td>Limit</td>
                                                    <td>1.90</td>
                                                    <td>164.76</td>
                                                    <td><span class="badge badge-info">Pending</span></td>   
                                                    <td>
                                                        <a href="#" class="text-success mr-2">
                                                            <i class="nav-icon i-Pen-2 font-weight-bold"></i>
                                                        </a>
                                                        <a href="#" class="text-danger mr-2">
                                                            <i class="nav-icon i-Close-Window font-weight-bold"></i>
                                                        </a>
                                                    </td>                                         
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
                <div class="col-lg-12 col-md-12">
                    <div class="row">
                        <div class="col-lg-12 col-sm-12">
                            <div class="card-body">
                                <h4 class="card-title mb-3">Order History</h4>
                                    <div class="table-responsive">
                                        <table id="zero_configuration_table" class="display table table-striped table-bordered" style="width:100%">
                                            <thead>
                                                <tr>
                                                    <th>Pair</th>
                                                    <th>Type</th>
                                                    <th>Amount</th>
                                                    <th>Price</th>
                                                    <th>Status</th>
                                                    <th>Time</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td>BTC/USD</td>
                                                    <td>Limit</td>
                                                    <td>0.90</td>
                                                    <td>5049.76</td>
                                                    <td><span class="badge badge-success">Executed</span></td>   
                                                    <td>12-12-09 10:24:72</td>                                  
                                                </tr>
                                                <tr>
                                                    <td>ETH/USD</td>
                                                    <td>Limit</td>
                                                    <td>1.90</td>
                                                    <td>164.76</td>
                                                    <td><span class="badge badge-success">Executed</span></td>   
                                                    <td>12-12-09 10:24:72</td>                                        
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
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

	    <script src="../assets/js/vendor/jquery-3.3.1.min.js"></script>
	    <script src="../assets/js/vendor/bootstrap.bundle.min.js"></script>
	    <script src="../assets/js/vendor/perfect-scrollbar.min.js"></script>
	    <script src="../assets/js/vendor/echarts.min.js"></script>

	    <script src="../assets/js/form.validation.script.js"></script>

	    <script src="../assets/js/es5/echart.options.min.js"></script>
	    <script src="../assets/js/es5/dashboard.v1.script.min.js"></script>

	    <!-- page vendor js -->
	    <script src="../assets/js/vendor/datatables.min.js"></script>
	    <script src="../assets/js/es5/script.min.js"></script>
	    <script src="../assets/js/es5/sidebar.large.script.min.js"></script>

	    <!-- page custom js -->
	    <script src="../assets/js/datatables.script.js"></script>

	    <script src="../assets/js/es5/script.min.js"></script>
	    <script src="../assets/js/es5/sidebar.large.script.min.js"></script>
	</body>

</html>
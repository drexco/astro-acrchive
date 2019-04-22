@extends('layouts.master')

@section('page_title')
	Admin Search
@stop

@section('content')
    <!-- Main Container -->
            <main id="main-container">
                <!-- Page Header -->
                <div class="content bg-gray-lighter">
                    <div class="row items-push">
                        <div class="col-sm-7">
                            <h1 class="page-heading">
                                Search Results
                            </h1>
                        </div>
                        <div class="col-sm-5 text-right hidden-xs">
                            <ol class="breadcrumb push-10-t">
                                <li>Admin Search</li>
                                <li><a class="link-effect" href="">Search Results</a></li>
                            </ol>
                        </div>
                    </div>
                </div>
                <!-- END Page Header -->

                <!-- Page Content -->
                <div class="content">
                    <div class="block">
                        <ul class="nav nav-tabs" data-toggle="tabs">
                            <li class="active">
                                <a href="#search-projects">Projects</a>
                            </li>
                            <li>
                                <a href="#search-users">Users</a>
                            </li>
                            <li>
                                <a href="#search-classic">Classic</a>
                            </li>
                        </ul>
                        <div class="block-content tab-content bg-white">
                            <!-- Projects -->
                            <div class="tab-pane fade fade-up in active" id="search-projects">
                                <div class="border-b push-30">
                                    <h2 class="push-10">6 <span class="h5 font-w400 text-muted">Projects Found</span></h2>
                                </div>
                                <table class="table table-striped table-vcenter">
                                    <thead>
                                        <tr>
                                            <th><i class="fa fa-suitcase text-gray"></i> Project Name</th>
                                            <th class="text-center hidden-xs" style="width: 15%;"><i class="fa fa-ticket text-gray"></i> Tickets</th>
                                            <th class="text-center hidden-xs hidden-sm" style="width: 15%;"><i class="fa fa-bar-chart text-gray"></i> Sales</th>
                                            <th class="text-right" style="width: 15%; min-width: 110px;"><i class="fa fa-trophy text-gray"></i> Earnings</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>
                                                <h3 class="h5 font-w600 push-10">
                                                    <a class="link-effect" href="javascript:void(0)">Web Application Framework</a>
                                                </h3>
                                                <div class="push-10">
                                                    <span class="label label-success"><i class="fa fa-check"></i> Completed</span>
                                                </div>
                                                <div class="font-s13 text-muted hidden-xs">
                                                    <p>Dolor posuere proin blandit accumsan senectus netus nullam curae, ornare laoreet adipiscing luctus mauris adipiscing pretium eget fermentum, tristique lobortis est ut metus lobortis tortor tincidunt himenaeos habitant quis dictumst proin odio sagittis purus mi, nec taciti vestibulum quis in sit varius lorem sit metus mi.</p>
                                                </div>
                                            </td>
                                            <td class="h3 text-center hidden-xs">15</td>
                                            <td class="h3 text-center hidden-xs hidden-sm">520</td>
                                            <td class="h3 text-primary text-right">$ 7,850</td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <h3 class="h5 font-w600 push-10">
                                                    <a class="link-effect" href="javascript:void(0)">Wordpress Theme</a>
                                                </h3>
                                                <div class="push-10">
                                                    <span class="label label-warning"><i class="fa fa-refresh fa-spin"></i> In Progress</span>
                                                </div>
                                                <div class="font-s13 text-muted hidden-xs">
                                                    <p>Dolor posuere proin blandit accumsan senectus netus nullam curae, ornare laoreet adipiscing luctus mauris adipiscing pretium eget fermentum, tristique lobortis est ut metus lobortis tortor tincidunt himenaeos habitant quis dictumst proin odio sagittis purus mi, nec taciti vestibulum quis in sit varius lorem sit metus mi.</p>
                                                </div>
                                            </td>
                                            <td class="h3 text-center hidden-xs">-</td>
                                            <td class="h3 text-center hidden-xs hidden-sm">-</td>
                                            <td class="h3 text-primary text-right">-</td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <h3 class="h5 font-w600 push-10">
                                                    <a class="link-effect" href="javascript:void(0)">Mobile Application</a>
                                                </h3>
                                                <div class="push-10">
                                                    <span class="label label-success"><i class="fa fa-check"></i> Completed</span>
                                                </div>
                                                <div class="font-s13 text-muted hidden-xs">
                                                    <p>Dolor posuere proin blandit accumsan senectus netus nullam curae, ornare laoreet adipiscing luctus mauris adipiscing pretium eget fermentum, tristique lobortis est ut metus lobortis tortor tincidunt himenaeos habitant quis dictumst proin odio sagittis purus mi, nec taciti vestibulum quis in sit varius lorem sit metus mi.</p>
                                                </div>
                                            </td>
                                            <td class="h3 text-center hidden-xs">25</td>
                                            <td class="h3 text-center hidden-xs hidden-sm">980</td>
                                            <td class="h3 text-primary text-right">$ 16,698</td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <h3 class="h5 font-w600 push-10">
                                                    <a class="link-effect" href="javascript:void(0)">UI Kit</a>
                                                </h3>
                                                <div class="push-10">
                                                    <span class="label label-danger"><i class="fa fa-times"></i> Cancelled</span>
                                                </div>
                                                <div class="font-s13 text-muted hidden-xs">
                                                    <p>Dolor posuere proin blandit accumsan senectus netus nullam curae, ornare laoreet adipiscing luctus mauris adipiscing pretium eget fermentum, tristique lobortis est ut metus lobortis tortor tincidunt himenaeos habitant quis dictumst proin odio sagittis purus mi, nec taciti vestibulum quis in sit varius lorem sit metus mi.</p>
                                                </div>
                                            </td>
                                            <td class="h3 text-center hidden-xs">-</td>
                                            <td class="h3 text-center hidden-xs hidden-sm">-</td>
                                            <td class="h3 text-primary text-right">-</td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <h3 class="h5 font-w600 push-10">
                                                    <a class="link-effect" href="javascript:void(0)">Admin Template</a>
                                                </h3>
                                                <div class="push-10">
                                                    <span class="label label-success"><i class="fa fa-check"></i> Completed</span>
                                                </div>
                                                <div class="font-s13 text-muted hidden-xs">
                                                    <p>Dolor posuere proin blandit accumsan senectus netus nullam curae, ornare laoreet adipiscing luctus mauris adipiscing pretium eget fermentum, tristique lobortis est ut metus lobortis tortor tincidunt himenaeos habitant quis dictumst proin odio sagittis purus mi, nec taciti vestibulum quis in sit varius lorem sit metus mi.</p>
                                                </div>
                                            </td>
                                            <td class="h3 text-center hidden-xs">262</td>
                                            <td class="h3 text-center hidden-xs hidden-sm">1600</td>
                                            <td class="h3 text-primary text-right">$ 12,320</td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <h3 class="h5 font-w600 push-10">
                                                    <a class="link-effect" href="javascript:void(0)">Flat Icon Set</a>
                                                </h3>
                                                <div class="push-10">
                                                    <span class="label label-success"><i class="fa fa-check"></i> Completed</span>
                                                </div>
                                                <div class="font-s13 text-muted hidden-xs">
                                                    <p>Dolor posuere proin blandit accumsan senectus netus nullam curae, ornare laoreet adipiscing luctus mauris adipiscing pretium eget fermentum, tristique lobortis est ut metus lobortis tortor tincidunt himenaeos habitant quis dictumst proin odio sagittis purus mi, nec taciti vestibulum quis in sit varius lorem sit metus mi.</p>
                                                </div>
                                            </td>
                                            <td class="h3 text-center hidden-xs">3</td>
                                            <td class="h3 text-center hidden-xs hidden-sm">148</td>
                                            <td class="h3 text-primary text-right">$ 6,320</td>
                                        </tr>
                                    </tbody>
                                </table>
                                <div class="border-t">
                                    <ul class="pagination">
                                        <li class="disabled"><a href="javascript:void(0)">Prev</a></li>
                                        <li class="active"><a href="javascript:void(0)">1</a></li>
                                        <li><a href="javascript:void(0)">2</a></li>
                                        <li><span>...</span></li>
                                        <li><a href="javascript:void(0)">10</a></li>
                                        <li><a href="javascript:void(0)">Next</a></li>
                                    </ul>
                                </div>
                            </div>
                            <!-- END Projects -->

                            <!-- Users -->
                            <div class="tab-pane fade fade-up" id="search-users">
                                <div class="border-b push-30">
                                    <h2 class="push-10">192 <span class="h5 font-w400 text-muted">Users Found</span></h2>
                                </div>
                                <table class="table table-striped table-vcenter">
                                    <thead>
                                        <tr>
                                            <th class="text-center" style="width: 100px;"><i class="si si-user"></i></th>
                                            <th>Name</th>
                                            <th class="hidden-xs" style="width: 30%;">Email</th>
                                            <th class="hidden-xs hidden-sm" style="width: 15%;">Access</th>
                                            <th class="text-center" style="width: 80px;">Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td class="text-center">
                                                <img class="img-avatar img-avatar48" src="assets/img/avatars/avatar7.jpg" alt="">
                                            </td>
                                            <td class="font-w600">Susan Elliott</td>
                                            <td class="hidden-xs">client1@example.com</td>
                                            <td class="hidden-xs hidden-sm">
                                                <span class="label label-warning">Trial</span>
                                            </td>
                                            <td class="text-center">
                                                <div class="btn-group">
                                                    <button class="btn btn-xs btn-default" type="button" data-toggle="tooltip" title="Edit Client"><i class="fa fa-pencil"></i></button>
                                                    <button class="btn btn-xs btn-default" type="button" data-toggle="tooltip" title="Remove Client"><i class="fa fa-times"></i></button>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="text-center">
                                                <img class="img-avatar img-avatar48" src="assets/img/avatars/avatar11.jpg" alt="">
                                            </td>
                                            <td class="font-w600">Jeremy Fuller</td>
                                            <td class="hidden-xs">client2@example.com</td>
                                            <td class="hidden-xs hidden-sm">
                                                <span class="label label-info">Business</span>
                                            </td>
                                            <td class="text-center">
                                                <div class="btn-group">
                                                    <button class="btn btn-xs btn-default" type="button" data-toggle="tooltip" title="Edit Client"><i class="fa fa-pencil"></i></button>
                                                    <button class="btn btn-xs btn-default" type="button" data-toggle="tooltip" title="Remove Client"><i class="fa fa-times"></i></button>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="text-center">
                                                <img class="img-avatar img-avatar48" src="assets/img/avatars/avatar10.jpg" alt="">
                                            </td>
                                            <td class="font-w600">Keith Simpson</td>
                                            <td class="hidden-xs">client3@example.com</td>
                                            <td class="hidden-xs hidden-sm">
                                                <span class="label label-warning">Trial</span>
                                            </td>
                                            <td class="text-center">
                                                <div class="btn-group">
                                                    <button class="btn btn-xs btn-default" type="button" data-toggle="tooltip" title="Edit Client"><i class="fa fa-pencil"></i></button>
                                                    <button class="btn btn-xs btn-default" type="button" data-toggle="tooltip" title="Remove Client"><i class="fa fa-times"></i></button>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="text-center">
                                                <img class="img-avatar img-avatar48" src="assets/img/avatars/avatar13.jpg" alt="">
                                            </td>
                                            <td class="font-w600">Joshua Munoz</td>
                                            <td class="hidden-xs">client4@example.com</td>
                                            <td class="hidden-xs hidden-sm">
                                                <span class="label label-warning">Trial</span>
                                            </td>
                                            <td class="text-center">
                                                <div class="btn-group">
                                                    <button class="btn btn-xs btn-default" type="button" data-toggle="tooltip" title="Edit Client"><i class="fa fa-pencil"></i></button>
                                                    <button class="btn btn-xs btn-default" type="button" data-toggle="tooltip" title="Remove Client"><i class="fa fa-times"></i></button>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="text-center">
                                                <img class="img-avatar img-avatar48" src="assets/img/avatars/avatar2.jpg" alt="">
                                            </td>
                                            <td class="font-w600">Susan Elliott</td>
                                            <td class="hidden-xs">client5@example.com</td>
                                            <td class="hidden-xs hidden-sm">
                                                <span class="label label-warning">Trial</span>
                                            </td>
                                            <td class="text-center">
                                                <div class="btn-group">
                                                    <button class="btn btn-xs btn-default" type="button" data-toggle="tooltip" title="Edit Client"><i class="fa fa-pencil"></i></button>
                                                    <button class="btn btn-xs btn-default" type="button" data-toggle="tooltip" title="Remove Client"><i class="fa fa-times"></i></button>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="text-center">
                                                <img class="img-avatar img-avatar48" src="assets/img/avatars/avatar1.jpg" alt="">
                                            </td>
                                            <td class="font-w600">Julia Cole</td>
                                            <td class="hidden-xs">client6@example.com</td>
                                            <td class="hidden-xs hidden-sm">
                                                <span class="label label-warning">Trial</span>
                                            </td>
                                            <td class="text-center">
                                                <div class="btn-group">
                                                    <button class="btn btn-xs btn-default" type="button" data-toggle="tooltip" title="Edit Client"><i class="fa fa-pencil"></i></button>
                                                    <button class="btn btn-xs btn-default" type="button" data-toggle="tooltip" title="Remove Client"><i class="fa fa-times"></i></button>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="text-center">
                                                <img class="img-avatar img-avatar48" src="assets/img/avatars/avatar15.jpg" alt="">
                                            </td>
                                            <td class="font-w600">John Parker</td>
                                            <td class="hidden-xs">client7@example.com</td>
                                            <td class="hidden-xs hidden-sm">
                                                <span class="label label-danger">Disabled</span>
                                            </td>
                                            <td class="text-center">
                                                <div class="btn-group">
                                                    <button class="btn btn-xs btn-default" type="button" data-toggle="tooltip" title="Edit Client"><i class="fa fa-pencil"></i></button>
                                                    <button class="btn btn-xs btn-default" type="button" data-toggle="tooltip" title="Remove Client"><i class="fa fa-times"></i></button>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="text-center">
                                                <img class="img-avatar img-avatar48" src="assets/img/avatars/avatar12.jpg" alt="">
                                            </td>
                                            <td class="font-w600">Adam Hall</td>
                                            <td class="hidden-xs">client8@example.com</td>
                                            <td class="hidden-xs hidden-sm">
                                                <span class="label label-success">VIP</span>
                                            </td>
                                            <td class="text-center">
                                                <div class="btn-group">
                                                    <button class="btn btn-xs btn-default" type="button" data-toggle="tooltip" title="Edit Client"><i class="fa fa-pencil"></i></button>
                                                    <button class="btn btn-xs btn-default" type="button" data-toggle="tooltip" title="Remove Client"><i class="fa fa-times"></i></button>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="text-center">
                                                <img class="img-avatar img-avatar48" src="assets/img/avatars/avatar14.jpg" alt="">
                                            </td>
                                            <td class="font-w600">Ryan Hall</td>
                                            <td class="hidden-xs">client9@example.com</td>
                                            <td class="hidden-xs hidden-sm">
                                                <span class="label label-warning">Trial</span>
                                            </td>
                                            <td class="text-center">
                                                <div class="btn-group">
                                                    <button class="btn btn-xs btn-default" type="button" data-toggle="tooltip" title="Edit Client"><i class="fa fa-pencil"></i></button>
                                                    <button class="btn btn-xs btn-default" type="button" data-toggle="tooltip" title="Remove Client"><i class="fa fa-times"></i></button>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="text-center">
                                                <img class="img-avatar img-avatar48" src="assets/img/avatars/avatar13.jpg" alt="">
                                            </td>
                                            <td class="font-w600">Ryan Hall</td>
                                            <td class="hidden-xs">client10@example.com</td>
                                            <td class="hidden-xs hidden-sm">
                                                <span class="label label-primary">Personal</span>
                                            </td>
                                            <td class="text-center">
                                                <div class="btn-group">
                                                    <button class="btn btn-xs btn-default" type="button" data-toggle="tooltip" title="Edit Client"><i class="fa fa-pencil"></i></button>
                                                    <button class="btn btn-xs btn-default" type="button" data-toggle="tooltip" title="Remove Client"><i class="fa fa-times"></i></button>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="text-center">
                                                <img class="img-avatar img-avatar48" src="assets/img/avatars/avatar5.jpg" alt="">
                                            </td>
                                            <td class="font-w600">Ashley Welch</td>
                                            <td class="hidden-xs">client11@example.com</td>
                                            <td class="hidden-xs hidden-sm">
                                                <span class="label label-danger">Disabled</span>
                                            </td>
                                            <td class="text-center">
                                                <div class="btn-group">
                                                    <button class="btn btn-xs btn-default" type="button" data-toggle="tooltip" title="Edit Client"><i class="fa fa-pencil"></i></button>
                                                    <button class="btn btn-xs btn-default" type="button" data-toggle="tooltip" title="Remove Client"><i class="fa fa-times"></i></button>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="text-center">
                                                <img class="img-avatar img-avatar48" src="assets/img/avatars/avatar8.jpg" alt="">
                                            </td>
                                            <td class="font-w600">Emma Cooper</td>
                                            <td class="hidden-xs">client12@example.com</td>
                                            <td class="hidden-xs hidden-sm">
                                                <span class="label label-warning">Trial</span>
                                            </td>
                                            <td class="text-center">
                                                <div class="btn-group">
                                                    <button class="btn btn-xs btn-default" type="button" data-toggle="tooltip" title="Edit Client"><i class="fa fa-pencil"></i></button>
                                                    <button class="btn btn-xs btn-default" type="button" data-toggle="tooltip" title="Remove Client"><i class="fa fa-times"></i></button>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="text-center">
                                                <img class="img-avatar img-avatar48" src="assets/img/avatars/avatar10.jpg" alt="">
                                            </td>
                                            <td class="font-w600">Jack Greene</td>
                                            <td class="hidden-xs">client13@example.com</td>
                                            <td class="hidden-xs hidden-sm">
                                                <span class="label label-info">Business</span>
                                            </td>
                                            <td class="text-center">
                                                <div class="btn-group">
                                                    <button class="btn btn-xs btn-default" type="button" data-toggle="tooltip" title="Edit Client"><i class="fa fa-pencil"></i></button>
                                                    <button class="btn btn-xs btn-default" type="button" data-toggle="tooltip" title="Remove Client"><i class="fa fa-times"></i></button>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="text-center">
                                                <img class="img-avatar img-avatar48" src="assets/img/avatars/avatar5.jpg" alt="">
                                            </td>
                                            <td class="font-w600">Evelyn Willis</td>
                                            <td class="hidden-xs">client14@example.com</td>
                                            <td class="hidden-xs hidden-sm">
                                                <span class="label label-warning">Trial</span>
                                            </td>
                                            <td class="text-center">
                                                <div class="btn-group">
                                                    <button class="btn btn-xs btn-default" type="button" data-toggle="tooltip" title="Edit Client"><i class="fa fa-pencil"></i></button>
                                                    <button class="btn btn-xs btn-default" type="button" data-toggle="tooltip" title="Remove Client"><i class="fa fa-times"></i></button>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="text-center">
                                                <img class="img-avatar img-avatar48" src="assets/img/avatars/avatar4.jpg" alt="">
                                            </td>
                                            <td class="font-w600">Amber Walker</td>
                                            <td class="hidden-xs">client15@example.com</td>
                                            <td class="hidden-xs hidden-sm">
                                                <span class="label label-warning">Trial</span>
                                            </td>
                                            <td class="text-center">
                                                <div class="btn-group">
                                                    <button class="btn btn-xs btn-default" type="button" data-toggle="tooltip" title="Edit Client"><i class="fa fa-pencil"></i></button>
                                                    <button class="btn btn-xs btn-default" type="button" data-toggle="tooltip" title="Remove Client"><i class="fa fa-times"></i></button>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="text-center">
                                                <img class="img-avatar img-avatar48" src="assets/img/avatars/avatar1.jpg" alt="">
                                            </td>
                                            <td class="font-w600">Ashley Welch</td>
                                            <td class="hidden-xs">client16@example.com</td>
                                            <td class="hidden-xs hidden-sm">
                                                <span class="label label-warning">Trial</span>
                                            </td>
                                            <td class="text-center">
                                                <div class="btn-group">
                                                    <button class="btn btn-xs btn-default" type="button" data-toggle="tooltip" title="Edit Client"><i class="fa fa-pencil"></i></button>
                                                    <button class="btn btn-xs btn-default" type="button" data-toggle="tooltip" title="Remove Client"><i class="fa fa-times"></i></button>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="text-center">
                                                <img class="img-avatar img-avatar48" src="assets/img/avatars/avatar8.jpg" alt="">
                                            </td>
                                            <td class="font-w600">Rebecca Reid</td>
                                            <td class="hidden-xs">client17@example.com</td>
                                            <td class="hidden-xs hidden-sm">
                                                <span class="label label-danger">Disabled</span>
                                            </td>
                                            <td class="text-center">
                                                <div class="btn-group">
                                                    <button class="btn btn-xs btn-default" type="button" data-toggle="tooltip" title="Edit Client"><i class="fa fa-pencil"></i></button>
                                                    <button class="btn btn-xs btn-default" type="button" data-toggle="tooltip" title="Remove Client"><i class="fa fa-times"></i></button>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="text-center">
                                                <img class="img-avatar img-avatar48" src="assets/img/avatars/avatar10.jpg" alt="">
                                            </td>
                                            <td class="font-w600">Donald Barnes</td>
                                            <td class="hidden-xs">client18@example.com</td>
                                            <td class="hidden-xs hidden-sm">
                                                <span class="label label-success">VIP</span>
                                            </td>
                                            <td class="text-center">
                                                <div class="btn-group">
                                                    <button class="btn btn-xs btn-default" type="button" data-toggle="tooltip" title="Edit Client"><i class="fa fa-pencil"></i></button>
                                                    <button class="btn btn-xs btn-default" type="button" data-toggle="tooltip" title="Remove Client"><i class="fa fa-times"></i></button>
                                                </div>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                                <div class="border-t">
                                    <ul class="pagination">
                                        <li class="disabled"><a href="javascript:void(0)">Prev</a></li>
                                        <li class="active"><a href="javascript:void(0)">1</a></li>
                                        <li><a href="javascript:void(0)">2</a></li>
                                        <li><span>...</span></li>
                                        <li><a href="javascript:void(0)">10</a></li>
                                        <li><a href="javascript:void(0)">Next</a></li>
                                    </ul>
                                </div>
                            </div>
                            <!-- END Users -->

                            <!-- Classic -->
                            <div class="tab-pane fade fade-up" id="search-classic">
                                <div class="border-b push-30">
                                    <h2 class="push-10">270 <span class="h5 font-w400 text-muted">Sites Found</span></h2>
                                </div>
                                <div class="row items-push">
                                    <div class="col-md-6">
                                        <h3 class="h5 font-w600">
                                            <a class="link-effect" href="javascript:void(0)">OneUI - Admin UI Framework</a>
                                        </h3>
                                        <div class="font-s13 text-success push-5">http://pixelcave.com/oneui/</div>
                                        <p>Dolor posuere proin blandit accumsan senectus netus nullam curae, ornare laoreet adipiscing luctus mauris adipiscing pretium eget fermentum, tristique lobortis est ut metus lobortis tortor tincidunt himenaeos habitant quis dictumst proin odio sagittis purus mi, nec taciti vestibulum quis in sit varius lorem sit metus mi.</p>
                                    </div>
                                    <div class="col-md-6">
                                        <h3 class="h5 font-w600">
                                            <a class="link-effect" href="javascript:void(0)">OneUI - Admin UI Framework</a>
                                        </h3>
                                        <div class="font-s13 text-success push-5">http://pixelcave.com/oneui/</div>
                                        <p>Dolor posuere proin blandit accumsan senectus netus nullam curae, ornare laoreet adipiscing luctus mauris adipiscing pretium eget fermentum, tristique lobortis est ut metus lobortis tortor tincidunt himenaeos habitant quis dictumst proin odio sagittis purus mi, nec taciti vestibulum quis in sit varius lorem sit metus mi.</p>
                                    </div>
                                </div>
                                <div class="row items-push">
                                    <div class="col-md-6">
                                        <h3 class="h5 font-w600">
                                            <a class="link-effect" href="javascript:void(0)">OneUI - Admin UI Framework</a>
                                        </h3>
                                        <div class="font-s13 text-success push-5">http://pixelcave.com/oneui/</div>
                                        <p>Dolor posuere proin blandit accumsan senectus netus nullam curae, ornare laoreet adipiscing luctus mauris adipiscing pretium eget fermentum, tristique lobortis est ut metus lobortis tortor tincidunt himenaeos habitant quis dictumst proin odio sagittis purus mi, nec taciti vestibulum quis in sit varius lorem sit metus mi.</p>
                                    </div>
                                    <div class="col-md-6">
                                        <h3 class="h5 font-w600">
                                            <a class="link-effect" href="javascript:void(0)">OneUI - Admin UI Framework</a>
                                        </h3>
                                        <div class="font-s13 text-success push-5">http://pixelcave.com/oneui/</div>
                                        <p>Dolor posuere proin blandit accumsan senectus netus nullam curae, ornare laoreet adipiscing luctus mauris adipiscing pretium eget fermentum, tristique lobortis est ut metus lobortis tortor tincidunt himenaeos habitant quis dictumst proin odio sagittis purus mi, nec taciti vestibulum quis in sit varius lorem sit metus mi.</p>
                                    </div>
                                </div>
                                <div class="row items-push">
                                    <div class="col-md-6">
                                        <h3 class="h5 font-w600">
                                            <a class="link-effect" href="javascript:void(0)">OneUI - Admin UI Framework</a>
                                        </h3>
                                        <div class="font-s13 text-success push-5">http://pixelcave.com/oneui/</div>
                                        <p>Dolor posuere proin blandit accumsan senectus netus nullam curae, ornare laoreet adipiscing luctus mauris adipiscing pretium eget fermentum, tristique lobortis est ut metus lobortis tortor tincidunt himenaeos habitant quis dictumst proin odio sagittis purus mi, nec taciti vestibulum quis in sit varius lorem sit metus mi.</p>
                                    </div>
                                    <div class="col-md-6">
                                        <h3 class="h5 font-w600">
                                            <a class="link-effect" href="javascript:void(0)">OneUI - Admin UI Framework</a>
                                        </h3>
                                        <div class="font-s13 text-success push-5">http://pixelcave.com/oneui/</div>
                                        <p>Dolor posuere proin blandit accumsan senectus netus nullam curae, ornare laoreet adipiscing luctus mauris adipiscing pretium eget fermentum, tristique lobortis est ut metus lobortis tortor tincidunt himenaeos habitant quis dictumst proin odio sagittis purus mi, nec taciti vestibulum quis in sit varius lorem sit metus mi.</p>
                                    </div>
                                </div>
                                <div class="row items-push">
                                    <div class="col-md-6">
                                        <h3 class="h5 font-w600">
                                            <a class="link-effect" href="javascript:void(0)">OneUI - Admin UI Framework</a>
                                        </h3>
                                        <div class="font-s13 text-success push-5">http://pixelcave.com/oneui/</div>
                                        <p>Dolor posuere proin blandit accumsan senectus netus nullam curae, ornare laoreet adipiscing luctus mauris adipiscing pretium eget fermentum, tristique lobortis est ut metus lobortis tortor tincidunt himenaeos habitant quis dictumst proin odio sagittis purus mi, nec taciti vestibulum quis in sit varius lorem sit metus mi.</p>
                                    </div>
                                    <div class="col-md-6">
                                        <h3 class="h5 font-w600">
                                            <a class="link-effect" href="javascript:void(0)">OneUI - Admin UI Framework</a>
                                        </h3>
                                        <div class="font-s13 text-success push-5">http://pixelcave.com/oneui/</div>
                                        <p>Dolor posuere proin blandit accumsan senectus netus nullam curae, ornare laoreet adipiscing luctus mauris adipiscing pretium eget fermentum, tristique lobortis est ut metus lobortis tortor tincidunt himenaeos habitant quis dictumst proin odio sagittis purus mi, nec taciti vestibulum quis in sit varius lorem sit metus mi.</p>
                                    </div>
                                </div>
                                <div class="row items-push">
                                    <div class="col-md-6">
                                        <h3 class="h5 font-w600">
                                            <a class="link-effect" href="javascript:void(0)">OneUI - Admin UI Framework</a>
                                        </h3>
                                        <div class="font-s13 text-success push-5">http://pixelcave.com/oneui/</div>
                                        <p>Dolor posuere proin blandit accumsan senectus netus nullam curae, ornare laoreet adipiscing luctus mauris adipiscing pretium eget fermentum, tristique lobortis est ut metus lobortis tortor tincidunt himenaeos habitant quis dictumst proin odio sagittis purus mi, nec taciti vestibulum quis in sit varius lorem sit metus mi.</p>
                                    </div>
                                    <div class="col-md-6">
                                        <h3 class="h5 font-w600">
                                            <a class="link-effect" href="javascript:void(0)">OneUI - Admin UI Framework</a>
                                        </h3>
                                        <div class="font-s13 text-success push-5">http://pixelcave.com/oneui/</div>
                                        <p>Dolor posuere proin blandit accumsan senectus netus nullam curae, ornare laoreet adipiscing luctus mauris adipiscing pretium eget fermentum, tristique lobortis est ut metus lobortis tortor tincidunt himenaeos habitant quis dictumst proin odio sagittis purus mi, nec taciti vestibulum quis in sit varius lorem sit metus mi.</p>
                                    </div>
                                </div>
                                <div class="row items-push">
                                    <div class="col-md-6">
                                        <h3 class="h5 font-w600">
                                            <a class="link-effect" href="javascript:void(0)">OneUI - Admin UI Framework</a>
                                        </h3>
                                        <div class="font-s13 text-success push-5">http://pixelcave.com/oneui/</div>
                                        <p>Dolor posuere proin blandit accumsan senectus netus nullam curae, ornare laoreet adipiscing luctus mauris adipiscing pretium eget fermentum, tristique lobortis est ut metus lobortis tortor tincidunt himenaeos habitant quis dictumst proin odio sagittis purus mi, nec taciti vestibulum quis in sit varius lorem sit metus mi.</p>
                                    </div>
                                    <div class="col-md-6">
                                        <h3 class="h5 font-w600">
                                            <a class="link-effect" href="javascript:void(0)">OneUI - Admin UI Framework</a>
                                        </h3>
                                        <div class="font-s13 text-success push-5">http://pixelcave.com/oneui/</div>
                                        <p>Dolor posuere proin blandit accumsan senectus netus nullam curae, ornare laoreet adipiscing luctus mauris adipiscing pretium eget fermentum, tristique lobortis est ut metus lobortis tortor tincidunt himenaeos habitant quis dictumst proin odio sagittis purus mi, nec taciti vestibulum quis in sit varius lorem sit metus mi.</p>
                                    </div>
                                </div>
                                <div class="row items-push">
                                    <div class="col-md-6">
                                        <h3 class="h5 font-w600">
                                            <a class="link-effect" href="javascript:void(0)">OneUI - Admin UI Framework</a>
                                        </h3>
                                        <div class="font-s13 text-success push-5">http://pixelcave.com/oneui/</div>
                                        <p>Dolor posuere proin blandit accumsan senectus netus nullam curae, ornare laoreet adipiscing luctus mauris adipiscing pretium eget fermentum, tristique lobortis est ut metus lobortis tortor tincidunt himenaeos habitant quis dictumst proin odio sagittis purus mi, nec taciti vestibulum quis in sit varius lorem sit metus mi.</p>
                                    </div>
                                    <div class="col-md-6">
                                        <h3 class="h5 font-w600">
                                            <a class="link-effect" href="javascript:void(0)">OneUI - Admin UI Framework</a>
                                        </h3>
                                        <div class="font-s13 text-success push-5">http://pixelcave.com/oneui/</div>
                                        <p>Dolor posuere proin blandit accumsan senectus netus nullam curae, ornare laoreet adipiscing luctus mauris adipiscing pretium eget fermentum, tristique lobortis est ut metus lobortis tortor tincidunt himenaeos habitant quis dictumst proin odio sagittis purus mi, nec taciti vestibulum quis in sit varius lorem sit metus mi.</p>
                                    </div>
                                </div>
                                <div class="row items-push">
                                    <div class="col-md-6">
                                        <h3 class="h5 font-w600">
                                            <a class="link-effect" href="javascript:void(0)">OneUI - Admin UI Framework</a>
                                        </h3>
                                        <div class="font-s13 text-success push-5">http://pixelcave.com/oneui/</div>
                                        <p>Dolor posuere proin blandit accumsan senectus netus nullam curae, ornare laoreet adipiscing luctus mauris adipiscing pretium eget fermentum, tristique lobortis est ut metus lobortis tortor tincidunt himenaeos habitant quis dictumst proin odio sagittis purus mi, nec taciti vestibulum quis in sit varius lorem sit metus mi.</p>
                                    </div>
                                    <div class="col-md-6">
                                        <h3 class="h5 font-w600">
                                            <a class="link-effect" href="javascript:void(0)">OneUI - Admin UI Framework</a>
                                        </h3>
                                        <div class="font-s13 text-success push-5">http://pixelcave.com/oneui/</div>
                                        <p>Dolor posuere proin blandit accumsan senectus netus nullam curae, ornare laoreet adipiscing luctus mauris adipiscing pretium eget fermentum, tristique lobortis est ut metus lobortis tortor tincidunt himenaeos habitant quis dictumst proin odio sagittis purus mi, nec taciti vestibulum quis in sit varius lorem sit metus mi.</p>
                                    </div>
                                </div>
                                <div class="row items-push">
                                    <div class="col-md-6">
                                        <h3 class="h5 font-w600">
                                            <a class="link-effect" href="javascript:void(0)">OneUI - Admin UI Framework</a>
                                        </h3>
                                        <div class="font-s13 text-success push-5">http://pixelcave.com/oneui/</div>
                                        <p>Dolor posuere proin blandit accumsan senectus netus nullam curae, ornare laoreet adipiscing luctus mauris adipiscing pretium eget fermentum, tristique lobortis est ut metus lobortis tortor tincidunt himenaeos habitant quis dictumst proin odio sagittis purus mi, nec taciti vestibulum quis in sit varius lorem sit metus mi.</p>
                                    </div>
                                    <div class="col-md-6">
                                        <h3 class="h5 font-w600">
                                            <a class="link-effect" href="javascript:void(0)">OneUI - Admin UI Framework</a>
                                        </h3>
                                        <div class="font-s13 text-success push-5">http://pixelcave.com/oneui/</div>
                                        <p>Dolor posuere proin blandit accumsan senectus netus nullam curae, ornare laoreet adipiscing luctus mauris adipiscing pretium eget fermentum, tristique lobortis est ut metus lobortis tortor tincidunt himenaeos habitant quis dictumst proin odio sagittis purus mi, nec taciti vestibulum quis in sit varius lorem sit metus mi.</p>
                                    </div>
                                </div>
                                <div class="border-t">
                                    <ul class="pagination">
                                        <li class="disabled"><a href="javascript:void(0)">Prev</a></li>
                                        <li class="active"><a href="javascript:void(0)">1</a></li>
                                        <li><a href="javascript:void(0)">2</a></li>
                                        <li><span>...</span></li>
                                        <li><a href="javascript:void(0)">10</a></li>
                                        <li><a href="javascript:void(0)">Next</a></li>
                                    </ul>
                                </div>
                            </div>
                            <!-- END Classic -->
                        </div>
                    </div>
                </div>
                <!-- END Page Content -->
            </main>
            <!-- END Main Container -->
@stop
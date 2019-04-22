<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width,initial-scale=1">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <meta name="author" content="Drexco">
        <meta name="csrf-token" content="{{ csrf_token() }}" />
        <link rel="shortcut icon" href="assets/images/favicon.png">
        <meta name="robots" content="noindex, nofollow">
        <title>Astro Options : Sign Up</title>
        <link href="https://fonts.googleapis.com/css?family=Nunito:300,400,400i,600,700,800,900" rel="stylesheet">
        <link rel="stylesheet" href="assets/styles/css/themes/lite-purple.min.css">
    </head>

    <body class="text-left">
        <div class="auth-layout-wrap" style="background-image: url(./assets/images/photo-wide-4.jpg)">
            <div class="auth-content">
                <div class="card o-hidden">
                    <div class="row">
                        <div class="col-md-6 text-center " style="background-size: cover;background-image: url(./assets/images/photo-long-3.jpg)">
                            <div class="pl-3 auth-right">
                                <div class="auth-logo text-center mt-4">
                                    <a href="../"><img src="assets/images/logo.png" alt=""></a>                                
                                </div>
                                <div class="flex-grow-1"></div>
                                <div class="w-100 mb-4">
                                    <a class="btn btn-outline-primary btn-outline-email btn-block btn-icon-text btn-rounded" href="signin">
                                        <i class="i-Mail-with-At-Sign"></i> Sign in with Email
                                    </a>
                                </div>
                                <div class="flex-grow-1"></div>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="p-4">
                                <h1 class="mb-3 text-18">Sign Up</h1>
                                <form class="needs-validation" action="signup" method="post" role="form" novalidate>
                                    <div class="form-group">
                                        <label for="username">Username</label>
                                        <input id="username" name="username" class="form-control form-control-rounded" type="text" required minlength="5">
                                    </div>
                                    <div class="form-group">
                                        <label for="email">Email Address</label>
                                        <input id="email" name="email" class="form-control form-control-rounded" type="email" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="password">Password</label>
                                        <input id="temp_password" name="temp_password" class="form-control form-control-rounded" type="password" required minlength="8">
                                    </div>
                                    <div class="form-group">
                                        <label for="repassword">Retype password</label>
                                        <input id="password" name="password" class="form-control form-control-rounded" type="password" required minlength="8">
                                    </div>
                                    <button class="btn btn-primary btn-block btn-rounded mt-3" type="submit">Sign Up</button>
                                    <div class="form-group">
                                        <div style="color: red;" class="col-xs-12">
                                            @if(Session::get('signup_message'))
                                                {{Session::get('signup_message')}}
                                            @endif
                                        </div>
                                    </div>
                                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
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

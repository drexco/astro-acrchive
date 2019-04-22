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
        <title>Astro Options : Secure Sign-In</title>
        <link href="https://fonts.googleapis.com/css?family=Nunito:300,400,400i,600,700,800,900" rel="stylesheet">
        <link rel="stylesheet" href="assets/styles/css/themes/lite-purple.min.css">
    </head>

    <body class="text-left">

        <div class="auth-layout-wrap" style="background-image: url(./assets/images/photo-wide-4.jpg)">
            <div class="auth-content">
                <div class="card o-hidden">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="p-4">
                                <div class="auth-logo text-center mb-4">
                                    <a href="../"><img src="assets/images/logo.png" alt=""></a>
                                </div>
                                <h1 class="mb-3 text-18">Sign In</h1>
                                <form class="needs-validation" action="signin" method="post" role="form" novalidate>
                                    <div class="form-group">
                                        <label for="username">Username</label>
                                        <input id="username" name="username" class="form-control form-control-rounded" type="text" required minlength="5">
                                    </div>
                                    <div class="form-group">
                                        <label for="password">Password</label>
                                        <input id="password" name="password" class="form-control form-control-rounded" type="password" required minlength="8">
                                    </div>
                                    <button class="btn btn-rounded btn-primary btn-block mt-2" type="submit">Sign In</button>
                                    <div class="form-group">
                                        <div style="color: red;" class="col-xs-12">
                                            @if(Session::get('signin_message'))
                                                {{Session::get('signin_message')}}
                                            @endif
                                        </div>
                                    </div>
                                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                </form>
                                <div class="mt-3 text-center">
                                    <a href="signin/password-recovery" class="text-muted"><u>Forgot Password?</u></a>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 text-center " style="background-size: cover;background-image: url(../assets/images/photo-long-3.jpg)">
                            <div class="pr-3 auth-right">
                                <a class="btn btn-rounded btn-outline-primary btn-outline-email btn-block btn-icon-text" href="signup">
                                    <i class="i-Mail-with-At-Sign"></i> Sign up with Email
                                </a>
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

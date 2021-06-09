<!DOCTYPE html>
<html lang="en" dir="">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Recover Password - Infinity</title>
    <link href="https://fonts.googleapis.com/css?family=Nunito:300,400,400i,600,700,800,900" rel="stylesheet">
    <link rel="stylesheet" href="{{ url('/public/html/src') }}/assets/styles/css/themes/lite-purple.min.css">
</head>

<body class="text-left">
    <div class="auth-layout-wrap" style="background-image: url({{ url('/public/html/src') }}/assets/images/photo-wide-4.jpg)">
        <div class="auth-content">
            <div class="card o-hidden">
                <div class="row">
                    <div class="col-md-6">
                        <div class="p-4">
                            <div class="auth-logo text-center mb-4">
                                <img src="{{ url('/public/html/src') }}/assets/images/logo.png" alt="">
                            </div>
                            <h1 class="mb-3 text-18">Forgot Password</h1>
                            <form action="">
                                <div class="form-group">
                                    <label for="email">Email address</label>
                                    <input id="email" class="form-control form-control-rounded" type="email">
                                </div>
                                <button class="btn btn-primary btn-block btn-rounded mt-3">Reset Password</button>

                            </form>
                            <div class="mt-3 text-center">
                                <a class="text-muted" href="{{ url('/login') }}"><u>Sign in</u></a>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 text-center " style="background-size: cover;background-image: url({{ url('/public/html/src') }}/assets/images/photo-long-3.jpg)">
{{--                         <div class="pr-3 auth-right">
                            <a class="btn btn-outline-primary btn-outline-email btn-block btn-icon-text btn-rounded" href="signup.html">
                                <i class="i-Mail-with-At-Sign"></i> Sign up with Email
                            </a>
                            <a class="btn btn-outline-primary btn-outline-google btn-block btn-icon-text btn-rounded">
                                <i class="i-Google-Plus"></i> Sign in with Google
                            </a>
                            <a class="btn btn-outline-primary btn-outline-facebook btn-block btn-icon-text btn-rounded">
                                <i class="i-Facebook-2"></i> Sign in with Facebook
                            </a>
                        </div> --}}
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="{{ url('/public/html/src') }}/assets/js/vendor/jquery-3.3.1.min.js"></script>
    <script src="{{ url('/public/html/src') }}/assets/js/vendor/bootstrap.bundle.min.js"></script>
    <script src="{{ url('/public/html/src') }}/assets/js/es5/script.min.js"></script>
</body>

</html>
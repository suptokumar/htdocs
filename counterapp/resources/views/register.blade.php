<!DOCTYPE html>
<html lang="en" dir="">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Sign up Infinity</title>
    <link href="https://fonts.googleapis.com/css?family=Nunito:300,400,400i,600,700,800,900" rel="stylesheet">
    <link rel="stylesheet" href="{{ url('/public/html/src') }}/assets/styles/css/themes/lite-purple.min.css">
</head>

<body class="text-left">
    <div class="auth-layout-wrap" style="background-image: url({{ url('/public/html/src') }}/assets/images/photo-wide-4.jpg)">
        <div class="auth-content">
            <div class="card o-hidden">
                <div class="row">
                    <div class="col-md-6 text-center " style="background-size: cover;background-image: url({{ url('/public/html/src') }}/assets/images/photo-long-3.jpg)">
                        <div class="pl-3 auth-right">
                            <div class="auth-logo text-center mt-4">
                                <img src="{{ url('/public/html/src') }}/assets/images/logo.png" alt="">
                            </div>
                            <div class="flex-grow-1"></div>
 {{--                            <div class="w-100 mb-4">
                                <a class="btn btn-outline-primary btn-block btn-icon-text btn-rounded" href="signin.html">
                                    <i class="i-Mail-with-At-Sign"></i> Sign in with Email
                                </a>
                                <a class="btn btn-outline-google btn-block btn-icon-text btn-rounded">
                                    <i class="i-Google-Plus"></i> Sign in with Google
                                </a>
                                <a class="btn btn-outline-facebook btn-block btn-icon-text btn-rounded">
                                    <i class="i-Facebook-2"></i> Sign in with Facebook
                                </a>
                            </div> --}}
                            <div class="flex-grow-1"></div>
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="p-4">

                            <h1 class="mb-3 text-18">Sign Up</h1>
                            <form action="{{ url('/register') }}" method="POST">
                                @csrf


                                @if ($message = session("message"))
<div class="alert alert-card alert-danger" role="alert">
{{$message}}
<button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">×</span>
</button>
</div>
@endif

@if ($success = session("success"))
<div class="alert alert-card alert-success" role="alert">
{!!$success!!}
<button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">×</span>
</button>
</div>
@endif
                                <div class="form-group">
                                    <label for="username">Your name</label>
                                    <input id="username" name="username" class="form-control form-control-rounded" type="text">
                                </div>
                                <div class="form-group">
                                    <label for="email">Email address</label>
                                    <input id="email" name="email" class="form-control form-control-rounded" type="email">
                                </div>
                                <div class="form-group">
                                    <label for="password">Password</label>
                                    <input id="password" name="password" class="form-control form-control-rounded" type="password">
                                </div>
                                <button class="btn btn-primary btn-block btn-rounded mt-3">Sign Up</button>
                                <a href="{{ url('/login') }}" class="text-muted"><u>Already have account? Sign in</u></a>

                            </form>
                        </div>
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
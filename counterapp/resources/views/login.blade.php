<!DOCTYPE html>
<html lang="en" dir="">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Login - Infinity</title>
    <link href="https://fonts.googleapis.com/css?family=Nunito:300,400,400i,600,700,800,900" rel="stylesheet">
    <link rel="stylesheet" href="{{ url('/public/html/src') }}/assets/styles/css/themes/dark-purple.min.css?g">
</head>

<body class="text-left">
    <div class="auth-layout-wrap" style="background: #efe2ba">
        <div class="auth-content">
            <div class="card o-hidden">
                <div class="row">
                    <div class="col-md-6">
                        <div class="p-4">
                            <div class="auth-logo text-center mb-4">
                                
                            </div>
                            <h1 class="mb-3 text-18">Sign In</h1>
                            <form action="{{ url('/login') }}" method="POST">
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
{{$success}}
<button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">×</span>
</button>
</div>
@endif
                                <div class="form-group">
                                    <label for="email">Email address</label>
                                    <input id="email" name="email" autocomplete="off" class="form-control form-control-rounded" type="email">
                                </div>
                                <div class="form-group">
                                    <label for="password">Password</label>
                                    <input id="password" name="password" autocomplete="off" class="form-control form-control-rounded" type="password">
                                </div>
                                @if($msg = session("redirect"))

                                <input type="hidden" name="redirect" value="{{$msg}}">
                                @else
                                <input type="hidden" name="redirect" value="{{url("/")}}">
                                @endif
                                <button class="btn btn-rounded btn-primary btn-block mt-2">Sign In</button>

                            </form>

                            <div class="mt-3 text-center">
                                <a href="{{ url('/forgetpass') }}" class="text-muted"><u>Forgot Password?</u></a><br>
                                <a href="{{ url('/register') }}" class="text-muted"><u>Sign Up Now</u></a>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 text-center " style="background-size: cover;background-image: url({{ url('/public/html/src') }}/assets/images/photo-long-3.jpg)">
{{--                         <div class="pr-3 auth-right">
                            <a class="btn btn-rounded btn-outline-primary btn-outline-email btn-block btn-icon-text" href="signup.html">
                                <i class="i-Mail-with-At-Sign"></i> Sign up with Email
                            </a>
                            <a class="btn btn-rounded btn-outline-google btn-block btn-icon-text">
                                <i class="i-Google-Plus"></i> Sign up with Google
                            </a>
                            <a class="btn btn-rounded btn-block btn-icon-text btn-outline-facebook">
                                <i class="i-Facebook-2"></i> Sign up with Facebook
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
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Main CSS-->
    <link rel="stylesheet" type="text/css" href="{{asset('admin/assets/css/main.css')}}">
    <!-- Font-icon css-->
    <link rel="stylesheet" type="text/css"
          href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <title>Login -Admin</title>
</head>
<body>
<section class="material-half-bg">
    <div class="cover"></div>
</section>
<section class="login-content">
    <div class="logo">
        <h1>TexMax Group</h1>
    </div>
    <div class="login-box">
        <form class="login-form" method="POST" action="{{ route('admin.password.update')}}">
            @csrf
            <input type="hidden" name="token" value="{{ $token }}">
            <input type="hidden" name="email" value="{{ $email }}">
            <h3 class="login-head"><i class="fa fa-lg fa-fw fa-user"></i>Reset Password</h3>
            <div class="form-group">
                <label class="control-label">New Password</label>
                <input class="form-control" id="reset-password-new" name="password" type="password" placeholder=".........." autofocus="">
                @error('password')
                <span class="invalid-feedback" role="alert" style="color: red;">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>
            <div class="form-group">
                <label class="control-label" for="reset-password-confirm">Confirm Password</label>
                <input class="form-control" id="reset-password-confirm" type="password" name="password_confirmation" placeholder="············" aria-describedby="reset-password-confirm" tabindex="2">
{{--                <input class="form-control" name="password" type="password" placeholder="Password">--}}
                @error('password_confirmation')
                <span class="invalid-feedback" role="alert" style="color: red;">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>
            <div class="form-group">
                <div class="utility">
                    <p class="text-center mt-2"><a href="{{ route('admin.login') }}"><svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-chevron-left"><polyline points="15 18 9 12 15 6"></polyline></svg> Back to login</a></p>
                </div>
            </div>
            <div class="form-group btn-container">
                <button class="btn btn-primary btn-block"><i class="fa fa-sign-in fa-lg fa-fw"></i>Reset</button>
            </div>
        </form>
        {{--        <form class="forget-form" action="#">--}}
        {{--            <h3 class="login-head"><i class="fa fa-lg fa-fw fa-lock"></i>Forgot Password ?</h3>--}}
        {{--            <div class="form-group">--}}
        {{--                <label class="control-label">EMAIL</label>--}}
        {{--                <input class="form-control" type="text" placeholder="Email">--}}
        {{--            </div>--}}
        {{--            <div class="form-group btn-container">--}}
        {{--                <button class="btn btn-primary btn-block"><i class="fa fa-unlock fa-lg fa-fw"></i>RESET</button>--}}
        {{--            </div>--}}
        {{--            <div class="form-group mt-3">--}}
        {{--                <p class="semibold-text mb-0"><a href="#" data-toggle="flip"><i class="fa fa-angle-left fa-fw"></i> Back--}}
        {{--                        to Login</a></p>--}}
        {{--            </div>--}}
        {{--        </form>--}}
    </div>
</section>
<!-- Essential javascripts for application to work-->
<script src="{{asset('admin/assets/js/jquery-3.3.1.min.js')}}"></script>
<script src="{{asset('admin/assets/js/popper.min.js')}}"></script>
<script src="{{asset('admin/assets/js/bootstrap.min.js')}}"></script>
<script src="{{asset('admin/assets/js/main.js')}}"></script>
<!-- The javascript plugin to display page loading on top-->
<script src="{{asset('admin/assets/js/plugins/pace.min.js')}}"></script>
<script type="text/javascript">
    // Login Page Flipbox control
    $('.login-content [data-toggle="flip"]').click(function () {
        $('.login-box').toggleClass('flipped');
        return false;
    });
</script>
</body>
</html>



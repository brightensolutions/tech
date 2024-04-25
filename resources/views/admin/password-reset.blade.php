<!doctype html>
<html lang="en">
<head>
    <title>Shagun | Admin - Login</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <link rel="stylesheet" href="{{ asset('login/css/stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css') }}">
    <link rel="stylesheet" href="{{ asset('login/css/A.style.css.pagespeed.cf.EsokhafFue.css') }}">
</head>
<body>
    <section class="ftco-section">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-6 col-lg-5">
                    <div class="login-wrap p-4 p-md-5">
                        <div class="icon d-flex align-items-center justify-content-center">
                            <span class="fa fa-user-o"></span>
                        </div>
                        <h3 class="text-center mb-2">Forgot Password</h3>
                        <p class="text-center text-dark mb-4">Enter your email and we'll send you a link to reset your password.</p>
                        <form action="{{url('/admin/password-reset')}}" method="POST" class="login-form">
                            @csrf
                            <div class="form-group">
                                <input type="text" class="form-control rounded-left" placeholder="Email" name="email" value="{{ old('email') }}">
                                @error('email')
                                <span class="text-danger">
                                    {{ $message }}
                                </span>
                                @enderror
                            </div>
                            <div class="form-group d-md-flex justify-content-end">
                                <div class="text-right">
                                    <a href="/admin/login"><i class="fa fa-light fa-chevron-left"></i>  Back to Login</a>
                                </div>
                            </div>
                            <div class="form-group">
                                <button type="submit" class="btn btn-primary rounded submit p-3 px-5">Submit</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <script src="{{ asset('plugins/jquery/jquery.min.js') }}"></script>
    <script src="{{ asset('login/js/popper.js%2bbootstrap.min.js%2bmain.js.pagespeed.jc.wRxug4_Avg.js') }}"></script>
</body>
</html>

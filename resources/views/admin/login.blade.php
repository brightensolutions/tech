<!doctype html>
<html lang="en">
<head>
    <title>Shivshakti Elevator Components Pvt. Ltd. | Admin - Login</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <link rel="stylesheet" href="{{ asset('admin/login/css/stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css') }}">
    <link rel="stylesheet" href="{{ asset('admin/login/css/A.style.css.pagespeed.cf.EsokhafFue.css') }}">
</head>
<body>
    <section class="ftco-section">
        <div class="container">
            @if(session()->has('message'))
            <div class="alert alert-danger text-center">
                {{ session()->get('message') }}
            </div>
            @endif
            <div class="row justify-content-center">
                <div class="col-md-6 col-lg-5">
                    <div class="login-wrap p-4 p-md-5">
                        <div class="icon d-flex align-items-center justify-content-center">
                            <span class="fa fa-user-o"></span>
                        </div>
                        <h3 class="text-center mb-4">Admin Login</h3>
                        <form action="{{url('/super-admin/login')}}" method="POST" class="login-form">
                            @csrf
                            <div class="form-group">
                                <input type="email" class="form-control rounded-left" placeholder="Email" name="email" required>
                            </div>
                            <div class="form-group d-flex">
                                <input type="password" class="form-control rounded-left" placeholder="Password" name="password" required>
                            </div>
                            <div class="form-group d-md-flex justify-content-end">
                                <div class="text-right">
                                    <a href="/super-admin/Password-reset">Forgot Password ?</a>
                                </div>
                            </div>
                            <div class="form-group">
                                <button type="submit" class="btn btn-primary rounded submit p-3 px-5">Login</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <script src="{{ asset('admin/plugins/jquery/jquery.min.js') }}"></script>
    <script src="{{ asset('admin/login/js/popper.js%2bbootstrap.min.js%2bmain.js.pagespeed.jc.wRxug4_Avg.js') }}"></script>
</body>
</html>

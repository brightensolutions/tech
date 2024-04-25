@include('layouts.header')
@php
    $contact_details_page = '';
@endphp
@include('layouts.sidebar')


<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Contact Details Page</h1>
                    @if (session()->has('message') && session()->has('result_code'))
                        <div class="alert alert-{{ session('result_code') }}" id="result-alert">
                            {{ session()->get('message') }}
                        </div>
                        {{ session()->forget('message') }}
                    @endif
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="/">Contact Details</a></li>
                        {{-- <li class="breadcrumb-item active">images</li> --}}
                    </ol>
                </div>
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <!-- left column -->

                <div class="col-md-6">
                    <div class="card card-primary">
                        <!-- /.card-header -->
                        <!-- form start -->
                        {{-- slider form 1 --}}
                        <form method="POST" id="addressForm" action="{{ route('address') }}"
                            enctype="multipart/form-data">
                            @csrf
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="addressContent">Address</label>
                                    <textarea class="form-control" name="address" id="addressContent" rows='5'>{{ $data['address'] ?? '' }}</textarea>
                                </div>
                                <div class="card-footer">
                                    <button type="submit" class="btn btn-primary">Submit</button>
                                    <span id="successMessage" class="text-success" style="display: none;"></span>
                                    <span id="errorMessage" class="text-danger" style="display: none;"></span>
                                </div>
                            </div>
                        </form>


                        {{-- slider form 2 --}}

                    </div>
                </div>
            </div>

            <div class="row">
                <!-- left column -->
                <div class="col-md-6">
                    <div class="card card-primary">
                        <!-- /.card-header -->
                        <!-- form start -->
                        {{-- slider form 1 --}}
                        <form method="POST" id="emailForm" action="{{ route('email') }}" enctype="multipart/form-data">
                            @csrf
                            <div class="card-body">

                                <div class="form-group">
                                    <label for="content">Email</label>
                                    <textarea class="form-control" name="email" id="email" rows='5'>{{ $data['email'] ?? '' }}</textarea>
                                </div>

                                <div class="card-footer">
                                    <button type="submit" class="btn btn-primary">Submit</button>
                                    <span id="successMessage2" class="text-success" style="display: none;"></span>
                                    <span id="errorMessage2" class="text-danger" style="display: none;"></span>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>

            </div>

            <div class="row">
                <!-- left column -->
                <div class="col-md-6">
                    <div class="card card-primary">
                        <!-- /.card-header -->
                        <!-- form start -->
                        {{-- slider form 1 --}}
                        <form method="POST" id="mobileForm" action="{{ route('mobile') }}">
                            @csrf
                            <div class="card-body">

                                <div class="form-group">
                                    <label for="title">Mobile</label>
                                    <textarea class="form-control" name="mobile" id="mobile" rows='5'>{{ $data['mobile'] ?? '' }}</textarea>
                                </div>
                                <div class="card-footer">
                                    <button type="submit" class="btn btn-primary">Submit</button>
                                    <span id="successMessage3" class="text-success" style="display: none;"></span>
                                    <span id="errorMessage3" class="text-danger" style="display: none;"></span>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>

            </div>






        </div>
        <!-- /.row -->
</div><!-- /.container-fluid -->
</section>
<!-- /.content -->
</div>
<!-- /.content-wrapper -->
@include('layouts.footer')

<script>
    $(document).ready(function() {
        $('#addressForm').submit(function(e) {
            e.preventDefault();

            var formData = new FormData(this);

            $.ajax({
                type: 'POST',
                url: $(this).attr('action'),
                data: formData,
                contentType: false,
                processData: false,
                success: function(response) {
                    $('#successMessage').text('Address updated successfully').show();
                    $('#errorMessage').hide();

                    setTimeout(function() {
                        $('#successMessage').hide();
                    }, 5000);
                },
                error: function(xhr, status, error) {
                    var errorMessage = xhr.responseText ? JSON.parse(xhr.responseText)
                        .message : 'An error occurred';
                    $('#errorMessage').text(errorMessage).show();
                    $('#successMessage').hide();
                }
            });
        });

        $('#emailForm').submit(function(e) {
            e.preventDefault();

            var formData = new FormData(this);

            $.ajax({
                type: 'POST',
                url: $(this).attr('action'),
                data: formData,
                contentType: false,
                processData: false,
                success: function(response) {
                    $('#successMessage2').text('Email updated successfully').show();
                    $('#errorMessage2').hide();

                    setTimeout(function() {
                        $('#successMessage2').hide();
                    }, 5000);
                },
                error: function(xhr, status, error) {
                    var errorMessage = xhr.responseText ? JSON.parse(xhr.responseText)
                        .message : 'An error occurred';
                    $('#errorMessage2').text(errorMessage).show();
                    $('#successMessage2').hide();
                }
            });
        });

        $('#mobileForm').submit(function(e) {
            e.preventDefault();

            var formData = new FormData(this);

            $.ajax({
                type: 'POST',
                url: $(this).attr('action'),
                data: formData,
                contentType: false,
                processData: false,
                success: function(response) {
                    $('#successMessage3').text('Mobile updated successfully').show();
                    $('#errorMessage3').hide();

                    setTimeout(function() {
                        $('#successMessage3').hide();
                    }, 5000);
                },
                error: function(xhr, status, error) {
                    var errorMessage = xhr.responseText ? JSON.parse(xhr.responseText)
                        .message : 'An error occurred';
                    $('#errorMessage3').text(errorMessage).show();
                    $('#successMessage3').hide();
                }
            });
        });
    });
</script>

<script src="{{ asset('plugins/summernote/summernote-bs4.min.js') }}"></script>
<script>
    $(function() {
        // Summernote
        $('#address').summernote();
        $('#mobile').summernote();
        $('#email').summernote();
    })
</script>

</body>

</html>

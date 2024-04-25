@include('layouts.header')
@php
    $about_page = '';
@endphp
@include('layouts.sidebar')


<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">About Page</h1>
                    @if (session()->has('message') && session()->has('result_code'))
                        <div class="alert alert-{{ session('result_code') }}" id="result-alert">
                            {{ session()->get('message') }}
                        </div>
                        {{ session()->forget('message') }}
                    @endif
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="/">About</a></li>
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
                        <form method="POST" id="imageform1" action="{{ route('aboutimage1') }}"
                            enctype="multipart/form-data">
                            @csrf
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="image1">Image 1</label>

                                    <!-- Old image -->
                                    <img id="oldImagePreview" src="{{ asset('assets/img/' . $data['image1']) }}"
                                        alt="Old Image" style="width: 30%; height: 30%;">

                                    <!-- File input -->
                                    <input type="file" class="form-control" name="aboutimage1" id="imageInput1"
                                        accept="image/*">

                                    <!-- New image preview -->
                                    <img id="imagePreview1" src="" alt="Image Preview"
                                        style="display: none; margin-top: 10px; max-width: 100%;">
                                </div>
                                <div class="card-footer">
                                    <button type="submit" class="btn btn-primary">Submit</button>
                                    <span id="successMessage3" class="text-success" style="display: none;"></span>
                                    <span id="errorMessage3" class="text-danger" style="display: none;"></span>
                                </div>
                            </div>
                        </form>


                        <form method="POST" id="imageform2" action="{{ route('aboutimage2') }}"
                            enctype="multipart/form-data">
                            @csrf
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="image2">Image 2</label>

                                    <!-- Old image -->
                                    <img id="oldImagePreview2" src="{{ asset('assets/img/' . $data['image2']) }}"
                                        alt="Old Image" style="width: 30%; height: 30%;">

                                    <!-- File input -->
                                    <input type="file" class="form-control" name="aboutimage2" id="imageInput2"
                                        accept="image/*">

                                    <!-- New image preview -->
                                    <img id="imagePreview2" src="" alt="Image Preview"
                                        style="display: none; margin-top: 10px; max-width: 100%;">
                                </div>
                                <div class="card-footer">
                                    <button type="submit" class="btn btn-primary">Submit</button>
                                    <span id="successMessage4" class="text-success" style="display: none;"></span>
                                    <span id="errorMessage4" class="text-danger" style="display: none;"></span>
                                </div>
                            </div>
                        </form>


                    </div>
                </div>
                <div class="col-md-6">
                    <div class="card card-primary">
                        <!-- /.card-header -->
                        <!-- form start -->
                        {{-- slider form 1 --}}
                        <form method="POST" id="title" action="{{ route('abouttitle') }}"
                            enctype="multipart/form-data">
                            @csrf
                            <div class="card-body">

                                <div class="form-group">
                                    <label for="title">Title</label>
                                    <input type="text" class="form-control" name="title"
                                        value="{{ $data['title'] ?? '' }}" id="title">
                                </div>

                                <div class="card-footer">
                                    <button type="submit" class="btn btn-primary">Submit</button>
                                    <span id="successMessage1" class="text-success" style="display: none;"></span>
                                    <span id="errorMessage1" class="text-danger" style="display: none;"></span>
                                </div>
                            </div>
                        </form>


                        {{-- slider form 2 --}}
                        <form method="POST" id="content" action="{{ route('aboutcontent') }}"
                            enctype="multipart/form-data">
                            @csrf
                            <div class="card-body">

                                <div class="form-group">
                                    <label for="content">Content</label>
                                    <textarea class="form-control" name="content" id="summernote" rows='5'>{{ $data['content'] ?? '' }}</textarea>
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
                        <form method="POST" id="imageform3" action="{{ route('directorimage1') }}"
                            enctype="multipart/form-data">
                            @csrf
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="image1">Director 1</label>

                                    <!-- Old image -->
                                    <img id="oldImagePreview3" src="{{ asset('assets/img/' . $data['director1']) }}"
                                        alt="Old Image" style="width: 30%; height: 30%;">

                                    <!-- File input -->
                                    <input type="file" class="form-control" name="directorimage1"
                                        id="imageInput3" accept="image/*">

                                    <!-- New image preview -->
                                    <img id="imagePreview3" src="" alt="Image Preview"
                                        style="display: none; margin-top: 10px; max-width: 100%;">
                                </div>
                                <div class="card-footer">
                                    <button type="submit" class="btn btn-primary">Submit</button>
                                    <span id="successMessage5" class="text-success" style="display: none;"></span>
                                    <span id="errorMessage5" class="text-danger" style="display: none;"></span>
                                </div>
                            </div>
                        </form>





                    </div>
                </div>
                <div class="col-md-6">
                    <div class="card card-primary">
                        <!-- /.card-header -->
                        <!-- form start -->
                        {{-- slider form 1 --}}
                        <form method="POST" id="imageform4" action="{{ route('directorimage2') }}"
                            enctype="multipart/form-data">
                            @csrf
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="image2">Director 2</label>

                                    <!-- Old image -->
                                    <img id="oldImagePreview4" src="{{ asset('assets/img/' . $data['director2']) }}"
                                        alt="Old Image" style="width: 30%; height: 30%;">

                                    <!-- File input -->
                                    <input type="file" class="form-control" name="directorimage2"
                                        id="imageInput4" accept="image/*">

                                    <!-- New image preview -->
                                    <img id="imagePreview4" src="" alt="Image Preview"
                                        style="display: none; margin-top: 10px; max-width: 100%;">
                                </div>
                                <div class="card-footer">
                                    <button type="submit" class="btn btn-primary">Submit</button>
                                    <span id="successMessage6" class="text-success" style="display: none;"></span>
                                    <span id="errorMessage6" class="text-danger" style="display: none;"></span>
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
                        <form method="POST" id="beliveform" action="{{ route('believe') }}">
                            @csrf
                            <div class="card-body">

                                <div class="form-group">
                                    <label for="title">Quality Of Product</label>
                                    <input type="text" class="form-control" name="quality"
                                        value="{{ $data['quality'] ?? '' }}" id="quality">
                                </div>

                                <div class="form-group">
                                    <label for="title">Uniform Product</label>
                                    <input type="text" class="form-control" name="uniform"
                                        value="{{ $data['uniform_product'] ?? '' }}" id="uniform">
                                </div>

                                <div class="form-group">
                                    <label for="title">Satisfaction</label>
                                    <input type="text" class="form-control" name="satisfaction"
                                        value="{{ $data['satisfaction'] ?? '' }}" id="satisfaction">
                                </div>

                                <div class="form-group">
                                    <label for="title">Mission</label>
                                    <input type="text" class="form-control" name="mission"
                                        value="{{ $data['mission'] ?? '' }}" id="mission">
                                </div>

                                <div class="card-footer">
                                    <button type="submit" class="btn btn-primary">Submit</button>
                                    <span id="successMessage7" class="text-success" style="display: none;"></span>
                                    <span id="errorMessage7" class="text-danger" style="display: none;"></span>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="card card-primary">
                        <!-- /.card-header -->
                        <!-- form start -->
                        {{-- slider form 1 --}}
                        <form method="POST" id="countersform" action="{{ route('counters') }}">
                            @csrf
                            <div class="card-body">

                                <div class="form-group">
                                    <label for="title">Happy Clients</label>
                                    <input type="text" class="form-control" name="clients"
                                        value="{{ $data['happy_clients'] ?? '' }}" id="clients">
                                </div>

                                <div class="form-group">
                                    <label for="title">Projects</label>
                                    <input type="text" class="form-control" name="projects"
                                        value="{{ $data['projects'] ?? '' }}" id="projects">
                                </div>

                                <div class="form-group">
                                    <label for="title">Hard Workers</label>
                                    <input type="text" class="form-control" name="hard_workers"
                                        value="{{ $data['hard_workers'] ?? '' }}" id="hard_workers">
                                </div>


                                <div class="card-footer">
                                    <button type="submit" class="btn btn-primary">Submit</button>
                                    <span id="successMessage8" class="text-success" style="display: none;"></span>
                                    <span id="errorMessage8" class="text-danger" style="display: none;"></span>
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
                        <form method="POST" id="section1" action="{{ route('sectioncontent1') }}">
                            @csrf
                            <div class="card-body">

                                <div class="form-group">
                                    <label for="title">Content</label>
                                    <textarea class="form-control" name="content" id="section1content" rows='5'>{{ $data['about_content1'] ?? '' }}</textarea>
                                </div>
                                <div class="card-footer">
                                    <button type="submit" class="btn btn-primary">Submit</button>
                                    <span id="successMessage9" class="text-success" style="display: none;"></span>
                                    <span id="errorMessage9" class="text-danger" style="display: none;"></span>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="card card-primary">
                        <!-- /.card-header -->
                        <!-- form start -->
                        {{-- slider form 1 --}}
                        <form method="POST" id="imageform5" action="{{ route('sectionimage1') }}"
                            enctype="multipart/form-data">
                            @csrf
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="image2">Section 1 Image</label>

                                    <!-- Old image -->
                                    <img id="oldImagePreview6"
                                        src="{{ asset('assets/img/' . $data['about_image1']) }}" alt="Old Image"
                                        style="width: 30%; height: 30%;">

                                    <!-- File input -->
                                    <input type="file" class="form-control" name="about_image1" id="imageInput5"
                                        accept="image/*">

                                    <!-- New image preview -->
                                    <img id="imagePreview5" src="" alt="Image Preview"
                                        style="display: none; margin-top: 10px; max-width: 100%;">
                                </div>
                                <div class="card-footer">
                                    <button type="submit" class="btn btn-primary">Submit</button>
                                    <span id="successMessage10" class="text-success" style="display: none;"></span>
                                    <span id="errorMessage10" class="text-danger" style="display: none;"></span>
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
                        <form method="POST" id="imageform6" action="{{ route('sectionimage2') }}"
                            enctype="multipart/form-data">
                            @csrf
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="image2">Section 2 Image</label>

                                    <!-- Old image -->
                                    <img id="oldImagePreview7"
                                        src="{{ asset('assets/img/' . $data['about_image2']) }}" alt="Old Image"
                                        style="width: 30%; height: 30%;">

                                    <!-- File input -->
                                    <input type="file" class="form-control" name="about_image2" id="imageInput6"
                                        accept="image/*">

                                    <!-- New image preview -->
                                    <img id="imagePreview6" src="" alt="Image Preview"
                                        style="display: none; margin-top: 10px; max-width: 100%;">
                                </div>
                                <div class="card-footer">
                                    <button type="submit" class="btn btn-primary">Submit</button>
                                    <span id="successMessage11" class="text-success" style="display: none;"></span>
                                    <span id="errorMessage11" class="text-danger" style="display: none;"></span>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="card card-primary">
                        <!-- /.card-header -->
                        <!-- form start -->
                        {{-- slider form 1 --}}
                        <form method="POST" id="section2" action="{{ route('sectioncontent2') }}">
                            @csrf
                            <div class="card-body">

                                <div class="form-group">
                                    <label for="title">Content</label>
                                    <textarea class="form-control" name="content" id="section2content" rows='5'>{{ $data['about_content2'] ?? '' }}</textarea>
                                </div>
                                <div class="card-footer">
                                    <button type="submit" class="btn btn-primary">Submit</button>
                                    <span id="successMessage12" class="text-success" style="display: none;"></span>
                                    <span id="errorMessage12" class="text-danger" style="display: none;"></span>
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

        $('#imageInput1').change(function() {
            var input = this;
            if (input.files && input.files[0]) {
                var reader = new FileReader();
                reader.onload = function(e) {
                    var img = new Image();
                    img.onload = function() {
                        var newWidth = this.width / 5; // Reduce width by 50%
                        var newHeight = this.height / 5; // Reduce height by 50%
                        $('#imagePreview1').attr('src', e.target.result).css({
                            width: newWidth + 'px',
                            height: newHeight + 'px'
                        }).show();
                    };
                    img.src = e.target.result;
                };
                reader.readAsDataURL(input.files[0]);
            }
        });

        $('#imageform1').submit(function(e) {
            e.preventDefault(); // Prevent default form submission

            var formData = new FormData(this);

            $.ajax({
                type: 'POST',
                url: $(this).attr('action'),
                data: formData,
                contentType: false,
                processData: false,
                success: function(response) {
                    // Update the old image with the new one
                    $('#oldImagePreview').attr('src', response.image_url).show();

                    // Hide the preview image
                    $('#imagePreview1').hide();

                    // Clear the file input
                    $('#imageInput1').val('');

                    // Show success message
                    $('#successMessage3').text('Image uploaded successfully').show();

                    setTimeout(function() {
                        $('#successMessage3').hide();
                    }, 5000);
                    $('#errorMessage3').hide();
                },
                error: function(xhr, status, error) {
                    // Show error message
                    var errorMessage = xhr.responseText ? JSON.parse(xhr.responseText)
                        .message : 'An error occurred';
                    $('#errorMessage3').text(errorMessage).show();
                    $('#successMessage3').hide();
                }
            });
        });

        $('#imageInput2').change(function() {
            var input = this;
            if (input.files && input.files[0]) {
                var reader = new FileReader();
                reader.onload = function(e) {
                    var img = new Image();
                    img.onload = function() {
                        var newWidth = this.width / 5; // Reduce width by 50%
                        var newHeight = this.height / 5; // Reduce height by 50%
                        $('#imagePreview2').attr('src', e.target.result).css({
                            width: newWidth + 'px',
                            height: newHeight + 'px'
                        }).show();
                    };
                    img.src = e.target.result;
                };
                reader.readAsDataURL(input.files[0]);
            }
        });

        $('#imageform2').submit(function(e) {
            e.preventDefault(); // Prevent default form submission

            var formData = new FormData(this);

            $.ajax({
                type: 'POST',
                url: $(this).attr('action'),
                data: formData,
                contentType: false,
                processData: false,
                success: function(response) {
                    // Update the old image with the new one
                    $('#oldImagePreview2').attr('src', response.image_url).show();

                    // Hide the preview image
                    $('#imagePreview2').hide();

                    // Clear the file input
                    $('#imageInput2').val('');

                    // Show success message
                    $('#successMessage4').text('Image uploaded successfully').show();
                    setTimeout(function() {
                        $('#successMessage4').hide();
                    }, 5000);
                    $('#errorMessage4').hide();
                },
                error: function(xhr, status, error) {
                    // Show error message
                    var errorMessage = xhr.responseText ? JSON.parse(xhr.responseText)
                        .message : 'An error occurred';
                    $('#errorMessage4').text(errorMessage).show();
                    $('#successMessage4').hide();
                }
            });
        });

        $('#title').submit(function(e) {
            e.preventDefault();

            var formData = new FormData(this);

            $.ajax({
                type: 'POST',
                url: $(this).attr('action'),
                data: formData,
                contentType: false,
                processData: false,
                success: function(response) {
                    // Handle success response here
                    $('#successMessage1').text('title updated successfully').show();
                    $('#errorMessage1').hide();

                    setTimeout(function() {
                        $('#successMessage1').hide();
                    }, 5000);
                },
                error: function(xhr, status, error) {
                    // Handle error response here
                    var errorMessage = xhr.responseText ? JSON.parse(xhr.responseText)
                        .message : 'An error occurred';
                    $('#errorMessage1').text(errorMessage).show();
                    $('#successMessage1').hide();
                }
            });
        });

        $('#content').submit(function(e) {
            e.preventDefault();

            var formData = new FormData(this);

            $.ajax({
                type: 'POST',
                url: $(this).attr('action'),
                data: formData,
                contentType: false,
                processData: false,
                success: function(response) {
                    // Handle success response here
                    $('#successMessage2').text('Content updated successfully').show();
                    $('#errorMessage2').hide();

                    setTimeout(function() {
                        $('#successMessage2').hide();
                    }, 5000);
                },
                error: function(xhr, status, error) {
                    // Handle error response here
                    var errorMessage = xhr.responseText ? JSON.parse(xhr.responseText)
                        .message : 'An error occurred';
                    $('#errorMessage2').text(errorMessage).show();
                    $('#successMessage2').hide();
                }
            });
        });

        $('#imageInput3').change(function() {
            var input = this;
            if (input.files && input.files[0]) {
                var reader = new FileReader();
                reader.onload = function(e) {
                    var img = new Image();
                    img.onload = function() {
                        var newWidth = this.width / 5; // Reduce width by 50%
                        var newHeight = this.height / 5; // Reduce height by 50%
                        $('#imagePreview3').attr('src', e.target.result).css({
                            width: newWidth + 'px',
                            height: newHeight + 'px'
                        }).show();
                    };
                    img.src = e.target.result;
                };
                reader.readAsDataURL(input.files[0]);
            }
        });

        $('#imageform3').submit(function(e) {
            e.preventDefault(); // Prevent default form submission

            var formData = new FormData(this);

            $.ajax({
                type: 'POST',
                url: $(this).attr('action'),
                data: formData,
                contentType: false,
                processData: false,
                success: function(response) {
                    // Update the old image with the new one
                    $('#oldImagePreview3').attr('src', response.image_url)
                        .show();

                    // Hide the preview image
                    $('#imagePreview3').hide();

                    // Clear the file input
                    $('#imageInput5').val('');

                    // Show success message
                    $('#successMessage5').text('Image uploaded successfully')
                        .show();
                    setTimeout(function() {
                        $('#successMessage5').hide();
                    }, 5000);
                    $('#errorMessage5').hide();
                },
                error: function(xhr, status, error) {
                    // Show error message
                    var errorMessage = xhr.responseText ? JSON.parse(xhr
                        .responseText).message : 'An error occurred';
                    $('#errorMessage5').text(errorMessage).show();
                    $('#successMessage5').hide();
                }
            });
        });

        $('#imageInput4').change(function() {
            var input = this;
            if (input.files && input.files[0]) {
                var reader = new FileReader();
                reader.onload = function(e) {
                    var img = new Image();
                    img.onload = function() {
                        var newWidth = this.width / 5; // Reduce width by 50%
                        var newHeight = this.height / 5; // Reduce height by 50%
                        $('#imagePreview4').attr('src', e.target.result).css({
                            width: newWidth + 'px',
                            height: newHeight + 'px'
                        }).show();
                    };
                    img.src = e.target.result;
                };
                reader.readAsDataURL(input.files[0]);
            }
        });

        $('#imageform4').submit(function(e) {
            e.preventDefault(); // Prevent default form submission

            var formData = new FormData(this);

            $.ajax({
                type: 'POST',
                url: $(this).attr('action'),
                data: formData,
                contentType: false,
                processData: false,
                success: function(response) {
                    // Update the old image with the new one
                    $('#oldImagePreview4').attr('src', response.image_url)
                        .show();

                    // Hide the preview image
                    $('#imagePreview4').hide();

                    // Clear the file input
                    $('#imageInput6').val('');

                    // Show success message
                    $('#successMessage6').text('Image uploaded successfully')
                        .show();
                    setTimeout(function() {
                        $('#successMessage6').hide();
                    }, 5000);
                    $('#errorMessage6').hide();
                },
                error: function(xhr, status, error) {
                    // Show error message
                    var errorMessage = xhr.responseText ? JSON.parse(xhr
                        .responseText).message : 'An error occurred';
                    $('#errorMessage6').text(errorMessage).show();
                    $('#successMessage6').hide();
                }
            });
        });

        $('#beliveform').submit(function(e) {
            e.preventDefault(); // Prevent default form submission

            var formData = new FormData(this);

            $.ajax({
                type: 'POST',
                url: $(this).attr('action'),
                data: formData,
                contentType: false,
                processData: false,
                success: function(response) {
                    // Show success message
                    $('#successMessage7').text(response.message).removeClass('text-danger')
                        .addClass('text-success').show();
                    setTimeout(function() {
                        $('#successMessage7').hide();
                    }, 5000);
                },
                error: function(xhr, status, error) {
                    // Show error message
                    var errorMessage = xhr.responseText ? JSON.parse(xhr.responseText)
                        .error : 'An error occurred';
                    $('#errorMessage7').text(errorMessage).removeClass('text-success')
                        .addClass('text-danger').show();
                }
            });
        });

        $('#countersform').submit(function(e) {
            e.preventDefault(); // Prevent default form submission

            var formData = new FormData(this);

            $.ajax({
                type: 'POST',
                url: $(this).attr('action'),
                data: formData,
                contentType: false,
                processData: false,
                success: function(response) {
                    // Show success message
                    $('#successMessage9').text(response.message).removeClass('text-danger')
                        .addClass('text-success').show();
                    setTimeout(function() {
                        $('#successMessage9').hide();
                    }, 5000);
                },
                error: function(xhr, status, error) {
                    // Show error message
                    var errorMessage = xhr.responseText ? JSON.parse(xhr.responseText)
                        .error : 'An error occurred';
                    $('#errorMessage9').text(errorMessage).removeClass('text-success')
                        .addClass('text-danger').show();
                }
            });
        });

        $('#section1').submit(function(e) {
            e.preventDefault();

            var formData = new FormData(this);

            $.ajax({
                type: 'POST',
                url: $(this).attr('action'),
                data: formData,
                contentType: false,
                processData: false,
                success: function(response) {
                    // Handle success response here
                    $('#successMessage9').text('Content updated successfully')
                        .show();
                    $('#errorMessage9').hide();

                    setTimeout(function() {
                        $('#successMessage9').hide();
                    }, 5000);
                },
                error: function(xhr, status, error) {
                    // Handle error response here
                    var errorMessage = xhr.responseText ? JSON.parse(xhr
                            .responseText)
                        .message : 'An error occurred';
                    $('#errorMessage9').text(errorMessage).show();
                    $('#successMessage9').hide();
                }
            });
        });

        $('#imageInput5').change(function() {
            var input = this;
            if (input.files && input.files[0]) {
                var reader = new FileReader();
                reader.onload = function(e) {
                    var img = new Image();
                    img.onload = function() {
                        var newWidth = this.width / 5; // Reduce width by 50%
                        var newHeight = this.height / 5; // Reduce height by 50%
                        $('#imagePreview5').attr('src', e.target.result).css({
                            width: newWidth + 'px',
                            height: newHeight + 'px'
                        }).show();
                    };
                    img.src = e.target.result;
                };
                reader.readAsDataURL(input.files[0]);
            }
        });

        $('#imageform5').submit(function(e) {
            e.preventDefault(); // Prevent default form submission

            var formData = new FormData(this);

            $.ajax({
                type: 'POST',
                url: $(this).attr('action'),
                data: formData,
                contentType: false,
                processData: false,
                success: function(response) {
                    // Update the old image with the new one
                    $('#oldImagePreview5').attr('src', response.image_url)
                        .show();

                    // Hide the preview image
                    $('#imagePreview5').hide();

                    // Clear the file input
                    $('#imageInput6').val('');

                    // Show success message
                    $('#successMessage10').text('Image uploaded successfully')
                        .show();
                    setTimeout(function() {
                        $('#successMessage10').hide();
                    }, 5000);
                    $('#errorMessage10').hide();
                },
                error: function(xhr, status, error) {
                    // Show error message
                    var errorMessage = xhr.responseText ? JSON.parse(xhr
                        .responseText).message : 'An error occurred';
                    $('#errorMessage10').text(errorMessage).show();
                    $('#successMessage10').hide();
                }
            });
        });

        $('#imageInput6').change(function() {
            var input = this;
            if (input.files && input.files[0]) {
                var reader = new FileReader();
                reader.onload = function(e) {
                    var img = new Image();
                    img.onload = function() {
                        var newWidth = this.width / 5; // Reduce width by 50%
                        var newHeight = this.height / 5; // Reduce height by 50%
                        $('#imagePreview6').attr('src', e.target.result).css({
                            width: newWidth + 'px',
                            height: newHeight + 'px'
                        }).show();
                    };
                    img.src = e.target.result;
                };
                reader.readAsDataURL(input.files[0]);
            }
        });

        $('#imageform6').submit(function(e) {
            e.preventDefault(); // Prevent default form submission

            var formData = new FormData(this);

            $.ajax({
                type: 'POST',
                url: $(this).attr('action'),
                data: formData,
                contentType: false,
                processData: false,
                success: function(response) {
                    // Update the old image with the new one
                    $('#oldImagePreview6').attr('src', response.image_url)
                        .show();

                    // Hide the preview image
                    $('#imagePreview6').hide();

                    // Clear the file input
                    $('#imageInput6').val('');

                    // Show success message
                    $('#successMessage11').text('Image uploaded successfully')
                        .show();
                    setTimeout(function() {
                        $('#successMessage11').hide();
                    }, 5000);
                    $('#errorMessage11').hide();
                },
                error: function(xhr, status, error) {
                    // Show error message
                    var errorMessage = xhr.responseText ? JSON.parse(xhr
                        .responseText).message : 'An error occurred';
                    $('#errorMessage11').text(errorMessage).show();
                    $('#successMessage11').hide();
                }
            });
        });

        $('#section2').submit(function(e) {
            e.preventDefault();

            var formData = new FormData(this);

            $.ajax({
                type: 'POST',
                url: $(this).attr('action'),
                data: formData,
                contentType: false,
                processData: false,
                success: function(response) {
                    // Handle success response here
                    $('#successMessage12').text('Content updated successfully')
                        .show();
                    $('#errorMessage12').hide();

                    setTimeout(function() {
                        $('#successMessage12').hide();
                    }, 5000);
                },
                error: function(xhr, status, error) {
                    // Handle error response here
                    var errorMessage = xhr.responseText ? JSON.parse(xhr
                            .responseText)
                        .message : 'An error occurred';
                    $('#errorMessage12').text(errorMessage).show();
                    $('#successMessage12').hide();
                }
            });
        });

    });
</script>

<script src="{{ asset('plugins/summernote/summernote-bs4.min.js') }}"></script>
<script>
    $(function() {
        // Summernote
        $('#summernote').summernote();

        $('#section1content').summernote();
        $('#section2content').summernote();
    })
</script>

</body>

</html>

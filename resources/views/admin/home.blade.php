@include('layouts.header')
@php
    $home_page = '';
@endphp
@include('layouts.sidebar')


<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Home</h1>
                    @if (session()->has('message') && session()->has('result_code'))
                        <div class="alert alert-{{ session('result_code') }}" id="result-alert">
                            {{ session()->get('message') }}
                        </div>
                        {{ session()->forget('message') }}
                    @endif
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="/">Home</a></li>
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

                        <form method="POST" id="title" action="{{ route('title') }}" enctype="multipart/form-data">
                            @csrf
                            <div class="card-body">

                                <div class="form-group">
                                    <label for="title">Title</label>
                                    <input type="text" class="form-control" name="title"
                                        value="{{ $data['hero_title'] ?? '' }}" id="title">
                                </div>

                                <div class="card-footer">
                                    <button type="submit" class="btn btn-primary">Submit</button>
                                    <span id="successMessage1" class="text-success" style="display: none;"></span>
                                    <span id="errorMessage1" class="text-danger" style="display: none;"></span>
                                </div>
                            </div>
                        </form>


                        {{-- slider form 2 --}}
                        <form method="POST" id="content" action="{{ route('content') }}"
                            enctype="multipart/form-data">
                            @csrf
                            <div class="card-body">

                                <div class="form-group">
                                    <label for="content">Content</label>
                                    <textarea class="form-control" name="content" id="content">{{ $data['hero_content'] ?? '' }}</textarea>
                                </div>

                                <div class="card-footer">
                                    <button type="submit" class="btn btn-primary">Submit</button>
                                    <span id="successMessage2" class="text-success" style="display: none;"></span>
                                    <span id="errorMessage2" class="text-danger" style="display: none;"></span>
                                </div>
                            </div>
                        </form>

                        {{-- slider form 3 --}}
                        <form method="POST" id="imageform1" action="{{ route('image1') }}"
                            enctype="multipart/form-data">
                            @csrf
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="image1">Image 1</label>

                                    <!-- Old image -->
                                    <img id="oldImagePreview" src="{{ asset('assets/img/' . $data['image1']) }}"
                                        alt="Old Image" style="max-width: 100%;">

                                    <!-- File input -->
                                    <input type="file" class="form-control" name="image1" id="imageInput1"
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

                        <form method="POST" id="imageform2" action="{{ route('image2') }}"
                            enctype="multipart/form-data">
                            @csrf
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="image2">Image 2</label>

                                    <!-- Old image -->
                                    <img id="oldImagePreview2" src="{{ asset('assets/img/' . $data['image2']) }}"
                                        alt="Old Image" style="max-width: 100%;">

                                    <!-- File input -->
                                    <input type="file" class="form-control" name="image2" id="imageInput2"
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

                        {{-- slider form 3 --}}
                        {{-- <form method="POST" id="homeimageForm" action="{{ route('homeimage') }}"
                            enctype="multipart/form-data">
                            @csrf
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="home">Home Image</label>
                                    @foreach ($data as $item)
                                        @if (isset($item['img']))
                                            <img id="homeimage"
                                                src="{{ asset('assets/images/' . $item['img']) }}" alt="home image"
                                                style="width: 20%; height: 20%;">
                                        @endif
                                    @endforeach
                                    <input type="file" class="form-control" name="homeimage" id="homeimage"
                                        accept="image/*">
                                    <img src="" id="homeimagePreview" style="display: none;">
                                </div>
                                <div class="card-footer">
                                    <button type="submit" class="btn btn-primary">Submit</button>
                                    <span id="successMessage4" class="text-success" style="display: none;"></span>
                                    <span id="errorMessage4" class="text-danger" style="display: none;"></span>
                                </div>
                            </div>
                        </form> --}}
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
        //home title

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

        //image1
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

        //image2
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

    });
</script>
{{-- <script>
    $(function() {
       // Summernote
       $('#main-desc').summernote();
       $('#sec2-desc').summernote();
    })
 </script> --}}
</body>

</html>

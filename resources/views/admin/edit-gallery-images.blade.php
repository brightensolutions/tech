@include('layouts.header')
@php
    $international_journey_page = '';
@endphp
@include('layouts.sidebar')


<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Edit Gallery Images</h1>
                    @if (session()->has('message') && session()->has('result_code'))
                        <div class="alert alert-{{ session('result_code') }}" id="result-alert">
                            {{ session()->get('message') }}
                        </div>
                        {{ session()->forget('message') }}
                    @endif
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="/">Update Gallery Images</a></li>
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
                    <a href="/super-admin/gallery-images">Go Back</a>
                    <div class="card card-primary">
                        <!-- /.card-header -->
                        <!-- form start -->
                        {{-- slider form 1 --}}

                        <form method="POST" id="image" action="{{ route('galleryimages') }}"
                            enctype="multipart/form-data">
                            @csrf
                            <input type="hidden" name="image_id" value="{{ $data->id }}">
                            <input type="hidden" name="old_image" value="{{ $data->img }}">
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="img">Image</label>
                                    <img id="imagePreview"
                                        src="{{ asset('assets/images/Gallery/' . $data->img) }}" alt="About Image"
                                        style="width: 30%; height: 30%;">
                                    <input type="file" class="form-control" name="image" id="imageInput"
                                        accept="image/*">
                                    <img src="" id="preview" style="display: none;">
                                </div>
                                <div class="form-group">
                                    <label for="text">Text</label>
                                    <input type="text" class="form-control" value="{{ $data->text }}"
                                        name="text" id="textInput">
                                </div>
                                <div class="card-footer">
                                    <button type="submit" class="btn btn-primary">Submit</button>
                                    <span id="successMessage" class="text-success" style="display: none;"></span>
                                    <span id="errorMessage" class="text-danger" style="display: none;"></span>
                                </div>
                            </div>
                        </form>


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
        // Function to handle change event of the file input
        $('#imageInput').change(function() {
            var input = this;
            if (input.files && input.files[0]) {
                var reader = new FileReader();
                reader.onload = function(e) {
                    var img = new Image();
                    img.onload = function() {
                        var newWidth = this.width / 10; // Reduce width by 50%
                        var newHeight = this.height / 10; // Reduce height by 50%
                        $('#preview').attr('src', e.target.result).css({
                            width: newWidth + 'px',
                            height: newHeight + 'px'
                        }).show();
                    };
                    img.src = e.target.result;
                }
                reader.readAsDataURL(input.files[0]);
            }
        });

        // Function to handle form submission
        $('#image').submit(function(e) {
            e.preventDefault();

            var formData = new FormData(this);

            $.ajax({
                type: 'POST',
                url: $(this).attr('action'),
                data: formData,
                contentType: false,
                processData: false,
                success: function(response) {
                    console.log(response);
                    // Update success message
                    $('#imagePreview').attr('src', response.image_url)
                .show(); // Update image preview
                    $('#preview').hide();
                    $('#errorMessage').hide();
                    $('#successMessage').text('Data updated successfully').show();

                // Hide success message after 30 seconds
                    setTimeout(function() {
                        $('#successMessage').hide();
                    }, 3000); // 30 seconds in milliseconds
                                    },
                error: function(xhr, status, error) {
                    // Update error message
                    var errorMessage = xhr.responseText ? JSON.parse(xhr.responseText)
                        .message : 'An error occurred';
                    $('#successMessage').hide();
                    $('#errorMessage').text(errorMessage).show();

                    // Hide error message after 30 seconds
                    setTimeout(function() {
                        $('#errorMessage').hide();
                    }, 3000); // 30 seconds in milliseconds
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

@include('layouts.header')
@php
    $csr_page = '';
@endphp
@include('layouts.sidebar')


<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">CSR</h1>
                    @if (session()->has('message') && session()->has('result_code'))
                        <div class="alert alert-{{ session('result_code') }}" id="result-alert">
                            {{ session()->get('message') }}
                        </div>
                        {{ session()->forget('message') }}
                    @endif
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="home">Home</a></li>
                        <li class="breadcrumb-item active">CSR</li>
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

                <div class="col-md-12">
                    <div class="card card-primary">
                        <!-- /.card-header -->
                        <!-- form start -->
                        {{-- slider form 1 --}}
                        {{-- slider form 2 --}}
                        <form method="POST" id="csr" action="{{ route('csr') }}"
                            enctype="multipart/form-data">
                            @csrf
                            <div class="card-body">

                            <img id="oldImagePreview" src="{{ asset('assets/img/' . $data['image']) }}"
                                alt="Old Image" style="width: 30%; height: 30%;">

                            <!-- File input -->
                            <input type="file" class="form-control" name="csrimage"
                                id="imageInput" accept="image/*">

                            <!-- New image preview -->
                            <img id="imagePreview" src="" alt="Image Preview"
                                style="display: none; margin-top: 10px; max-width: 100%;">

                                <div class="form-group">
                                    <label for="content">Content</label>
                                    <textarea class="form-control" name="content" id="summernote" rows='5'>{{ $data['content'] ?? '' }}</textarea>
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

                <!-- /.row -->
            </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->
@include('layouts.footer')
<script>
    $(document).ready(function() {
        $('#imageInput').change(function() {
            var input = this;
            if (input.files && input.files[0]) {
                var reader = new FileReader();
                reader.onload = function(e) {
                    var img = new Image();
                    img.onload = function() {
                        var newWidth = this.width / 5; // Reduce width by 50%
                        var newHeight = this.height / 5; // Reduce height by 50%
                        $('#imagePreview').attr('src', e.target.result).css({
                            width: newWidth + 'px',
                            height: newHeight + 'px'
                        }).show();
                    };
                    img.src = e.target.result;
                };
                reader.readAsDataURL(input.files[0]);
            }
        });

        $('#csr').submit(function(e) {
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
                    $('#imagePreview').hide();

                    // Clear the file input
                    $('#imageInput').val('');

                    // Show success message
                    $('#successMessage').text('CSR Data uploaded successfully').show();
                    $('#errorMessage').hide();
                },
                error: function(xhr, status, error) {
                    // Show error message
                    var errorMessage = xhr.responseText ? JSON.parse(xhr.responseText)
                        .message : 'An error occurred';
                    $('#errorMessage').text(errorMessage).show();
                    $('#successMessage').hide();
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
    })
</script>

</body>

</html>

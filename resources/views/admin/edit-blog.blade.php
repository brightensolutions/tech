@include('layouts.header')
@php
    $blog_page = '';
@endphp
@include('layouts.sidebar')


<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Edit video</h1>
                    @if (session()->has('message') && session()->has('result_code'))
                        <div class="alert alert-{{ session('result_code') }}" id="result-alert">
                            {{ session()->get('message') }}
                        </div>
                        {{ session()->forget('message') }}
                    @endif
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="/">Update Video</a></li>
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
                    <a href="/super-admin/video">Go Back</a>
                    <div class="card card-primary">
                        <!-- /.card-header -->
                        <!-- form start -->
                        {{-- slider form 1 --}}

                        <form method="POST" id="video" action="{{ route('video') }}"
                            enctype="multipart/form-data">
                            @csrf
                            <input type="hidden" name="id" value="{{ $data->id }}">
                            <input type="hidden" name="old_url" value="{{ $data->url }}">
                            <div class="card-body">
                                <div class="form-group">

                                <div class="video-container wow fadeInUp">
                                    <iframe src="https://youtube.com/embed/<?php echo $data->url;?>" frameborder="0"
                                        allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture web-share"
                                        allowfullscreen></iframe><br>
                                </div>

                            </div>
                                <div class="form-group">
                                    <label for="text">Youtube Link</label>
                                    <input type="text" class="form-control" value="{{ $data->url }}"
                                        name="url" id="textInput">
                                </div>
                                <div class="card-footer">
                                    <button type="submit" class="btn btn-primary">Submit</button>
                                    <div id="successMessage" class="text-success" style="display: none;"></div>
                                    <div id="errorMessage" class="text-danger" style="display: none;"></div>
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
    $('#video').submit(function(e) {
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
                $('#successMessage').text('Video updated successfully').show();
                $('#errorMessage').hide();
            },
            error: function(xhr, status, error) {
                console.log(xhr.responseText);
                // Update error message
                var errorMessage = xhr.responseText ? JSON.parse(xhr.responseText).message : 'An error occurred';
                $('#errorMessage').text(errorMessage).show();
                $('#successMessage').hide();
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

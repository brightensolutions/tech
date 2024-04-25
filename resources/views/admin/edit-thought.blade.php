@include('layouts.header')
@php
    $video_page = '';
@endphp
@include('layouts.sidebar')


<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Edit Thought</h1>
                    @if (session()->has('message') && session()->has('result_code'))
                        <div class="alert alert-{{ session('result_code') }}" id="result-alert">
                            {{ session()->get('message') }}
                        </div>
                        {{ session()->forget('message') }}
                    @endif
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="/">Update Thought</a></li>
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
                    <a href="/super-admin/thought">Go Back</a>
                    <div class="card card-primary">
                        <!-- /.card-header -->
                        <!-- form start -->
                        {{-- slider form 1 --}}

                        <form method="POST" id="thought" action="{{ route('thought') }}"
                            enctype="multipart/form-data">
                            @csrf
                            <input type="hidden" name="id" value="{{ $data->id }}">
                            <input type="hidden" name="old_thought" value="{{ $data->thought }}">
                            <div class="card-body">

                                <div class="form-group">
                                    <label for="text">Thought</label>
                                    <textarea class="form-control" name="thought" id="summernote2">{{ $data->thought ?? '' }}</textarea>
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
    $('#thought').submit(function(e) {
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
                $('#successMessage').text('Thought updated successfully').show();
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
<script src="{{ asset('plugins/summernote/summernote-bs4.min.js') }}"></script>
<script>
    $(function() {
        // Summernote initialization
        $('#summernote2').summernote();
    });
</script>
</body>

</html>

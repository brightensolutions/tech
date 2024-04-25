@include('layouts.header')
@php
    $thought_page = '';
@endphp
@include('layouts.sidebar')


<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Add Thought</h1>
                    @if (session()->has('message') && session()->has('result_code'))
                        <div class="alert alert-{{ session('result_code') }}" id="result-alert">
                            {{ session()->get('message') }}
                        </div>
                        {{ session()->forget('message') }}
                    @endif
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="/">Add Thought</a></li>
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
                    &nbsp;
                    <a href="/super-admin/add-thought">
                        <button type="button" class="btn btn-primary">
                            + Add More
                        </button>
                    </a>
                    <br>



                    <div class="card card-primary">
                        <!-- /.card-header -->
                        <!-- form start -->
                        {{-- slider form 1 --}}

                        <form method="POST" id="thought" action="{{ route('addedthought') }}" enctype="multipart/form-data">
                            @csrf
                            <input type="hidden" name="id" value="{{ $data->id ?? '' }}">
                            <!-- Hidden field for journey ID -->
                            <input type="hidden" name="old_thought" value="{{ $data->thought ?? '' }}">
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="text">Thought</label>
                                    <textarea class="form-control" name="thought" id="summernote">{{ $data->thought ?? '' }}</textarea>
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
        $('#thought').submit(function(e) {
            e.preventDefault();

            var formData = new FormData(this);
            console.log(formData);

            var url = $(this).attr('action');
            console.log(url);

            var method = 'POST'; // Default method is POST for new submissions

            // Check if ID exists (indicating update)
            var id = $(this).find('input[name="id"]').val();
            if (id) {
                formData.append('_method', 'PUT'); // For updating existing data
                url = url + '/' + id; // Append ID to URL for update
                method = 'POST'; // Use POST for updates
            }

            $.ajax({
                type: method,
                url: url,
                data: formData,
                contentType: false,
                processData: false,
                success: function(response) {
                    console.log(response);
                    $('#successMessage').text('Data added/updated successfully').show();
                    $('#errorMessage').hide();
                    $('#thought')[0].reset(); // Reset form

                    setTimeout(function() {
                        $('#successMessage').hide();
                    }, 3000);
                },
                error: function(xhr, status, error) {
                    var errorMessage = xhr.responseText ? JSON.parse(xhr.responseText).message : 'An error occurred';
                    console.log(errorMessage);
                    $('#successMessage').hide();
                    $('#errorMessage').text(errorMessage).show();

                    setTimeout(function() {
                        $('#errorMessage').hide();
                    }, 3000);
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
    //    $('#sec2-desc').summernote();
    })
 </script>
</body>

</html>

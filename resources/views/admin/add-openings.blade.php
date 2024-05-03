@include('layouts.header')
@php
    $opening_page = '';
@endphp
@include('layouts.sidebar')


<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Add Job Opening</h1>
                    @if (session()->has('message') && session()->has('result_code'))
                        <div class="alert alert-{{ session('result_code') }}" id="result-alert">
                            {{ session()->get('message') }}
                        </div>
                        {{ session()->forget('message') }}
                    @endif
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="/">Add Job Opening</a></li>
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
                    <a href="/super-admin/opening">Go Back</a>
                    &nbsp; <br><br>
                    <a href="/super-admin/add-opening">
                        <button type="button" class="btn btn-primary">
                            + Add More
                        </button>
                    </a>
                    <br>

                    <div class="card card-primary">
                        <!-- /.card-header -->
                        <!-- form start -->
                        {{-- slider form 1 --}}

                        <form method="POST" id="opening" action="{{ route('addedopening') }}"
                            enctype="multipart/form-data">
                            @csrf
                            <input type="hidden" name="id" value="{{ $data->id ?? '' }}">
                            <!-- Hidden field for journey ID -->

                            <div class="card-body">

                                <div class="form-group">
                                    <label for="text">Job Title</label>
                                    <input type="text" class="form-control" name="jobtitle">{{ $data->job_title ?? '' }}</textarea>
                                </div>
                                <div class="form-group">
                                    <label for="text">Location</label>
                                    <input type="text" class="form-control" name="location">{{ $data->location ?? '' }}</textarea>
                                </div>
                                <div class="form-group">
                                        <label for="text">Job Description</label>
                                        <textarea class="form-control" name="jobdescription" id="summernote">{{ $data->job_description ?? '' }}</textarea>
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

        $('#categorySelect').change(function() {
            var categoryId = $(this).val(); // Get the selected category ID
            console.log(categoryId);

            // Send AJAX request to fetch subcategories
            $.ajax({
                url: '/super-admin/fetch-subcategories',
                type: 'GET',
                data: {
                    categoryId: categoryId
                },
                success: function(response) {
                    // Clear existing options and add new subcategory options
                    $('#subcategorySelect').html(
                        '<option value="">Select Sub Category</option>');
                    $.each(response.subcategories, function(index, subcategory) {
                        $('#subcategorySelect').append('<option value="' +
                            subcategory.id + '">' + subcategory.sub_cat_name +
                            '</option>');
                    });
                },
                error: function(xhr, status, error) {
                    console.error(error);
                }
            });
        });


        $('#product').submit(function(e) {
            e.preventDefault(); // Prevent the default form submission behavior

            var formData = new FormData(this);
            var url = $(this).attr('action');
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
                    $('#subcategory')[0].reset(); // Reset form

                    setTimeout(function() {
                        $('#successMessage').hide();
                    }, 3000);
                },
                error: function(xhr, status, error) {
                    var errorMessage = xhr.responseText ? JSON.parse(xhr.responseText)
                        .message : 'An error occurred';
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

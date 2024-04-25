@include('layouts.header')
@php
    $category_page = '';
@endphp
@include('layouts.sidebar')


<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Add Product</h1>
                    @if (session()->has('message') && session()->has('result_code'))
                        <div class="alert alert-{{ session('result_code') }}" id="result-alert">
                            {{ session()->get('message') }}
                        </div>
                        {{ session()->forget('message') }}
                    @endif
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="/">Add Product</a></li>
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
                    <a href="/super-admin/product">Go Back</a>
                    &nbsp;
                    <a href="/super-admin/add-product">
                        <button type="button" class="btn btn-primary">
                            + Add More
                        </button>
                    </a>
                    <br>

                    <div class="card card-primary">
                        <!-- /.card-header -->
                        <!-- form start -->
                        {{-- slider form 1 --}}

                        <form method="POST" id="product" action="{{ route('addedproduct') }}"
                            enctype="multipart/form-data">
                            @csrf
                            <input type="hidden" name="id" value="{{ $data->id ?? '' }}">
                            <!-- Hidden field for journey ID -->
                            <input type="hidden" name="old_subcategory" value="{{ $data->subcategory ?? '' }}">
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="text">Category</label>
                                    <select class="form-control" name="category" id="categorySelect">
                                        <option value="">Select Category</option>
                                        @foreach ($categories as $category)
                                            <option value="{{ $category->id }}"
                                                {{ isset($data) && $data->category == $category->id ? 'selected' : '' }}>
                                                {{ $category->cat_name }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="form-group">
                                    <label for="text">Sub Category</label>
                                    <select class="form-control" name="subcategory" id="subcategorySelect">
                                        <option value="">Select Sub Category</option>
                                        @foreach ($subcategories as $subcategory)
                                            <option value="{{ $subcategory->id }}"
                                                {{ isset($data) && $data->subcategory == $subcategory->id ? 'selected' : '' }}
                                                data-category="{{ $subcategory->category_id }}">
                                                <!-- Add data attribute for category ID -->
                                                {{ $subcategory->sub_cat_name }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="img">Product</label>
                                    <img id="imagePreview"
                                        src="{{ asset('assets/images/product/' . ($data->img ?? '')) }}"
                                        alt="Product Image" style="width: 30%; height: 30%; display: none;">
                                    <input type="file" class="form-control" name="image" id="imageInput"
                                        accept="image/*" multiple>
                                    <img src="" id="preview" style="display: none;">
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

        $('#imageInput').change(function() {
            var input = this;
            if (input.files && input.files[0]) {
                var reader = new FileReader();
                reader.onload = function(e) {
                    var img = new Image();
                    img.onload = function() {
                        var newWidth = this.width / 5; // Reduce width by 50%
                        var newHeight = this.height / 5; // Reduce height by 50%
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
{{-- <script>
    $(function() {
       // Summernote
       $('#main-desc').summernote();
       $('#sec2-desc').summernote();
    })
 </script> --}}
</body>

</html>

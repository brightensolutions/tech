@include('layouts.header')
@php
   $international_page = '';
@endphp
@include('layouts.sidebar')


<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
   <!-- Content Header (Page header) -->
   <div class="content-header">
      <div class="container-fluid">
         <div class="row mb-2">
            <div class="col-sm-6">
               <h1 class="m-0">International Journey Images</h1>
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
                  <li class="breadcrumb-item active">International Journey Images</li>
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
            <div class="col-2 p-2">
               <a href="/super-admin/add-international-images">
                  <button type="button" class="btn btn-primary">
                     + Add New
                  </button>
               </a>
            </div>
            <div class="col-12">
               <div class="card">
                  {{-- <div class="card-header">
                     <h3 class="card-title">Bookings</h3>
                  </div> --}}
                  <div class="card-body">
                     <table id="example1" class="table table-bordered table-striped">
                        <thead>
                           <tr>
                              <th>Id</th>
                              <th>Image</th>
                              <th>Text</th>
                              <th>Action</th>
                           </tr>
                        </thead>
                        <tbody>
                           @php
                              $count = 1;
                           @endphp
                           @foreach ($data as $item)
                              <tr>
                                 <td>{{ $count }}</td>
                                 <td><img src="{{ asset('assets/images/journy-images/'.$item->img) }}" style="height: 20%; width: 20%;"></td>
                                 <td>{{ $item->text }}</td>

                                 <td>
                                    <a href="/super-admin/edit-international-journey/{{ $item->id }}"><i class="fa fa-edit" style="padding:5px;font-size:15px;cursor:pointer;"
                                          aria-hidden="true"></i></a>
                                    <a onclick="return confirm('Are you sure?')" href="/super-admin/delete-international-journey/{{ $item->id }}"><i class="fa fa-trash" style="padding:5px;font-size:15px;cursor:pointer;"
                                          aria-hidden="true"></i></a>
                                 </td>
                              </tr>
                              @php
                                 $count++;
                              @endphp
                           @endforeach
                        </tbody>
                     </table>
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
   $(function() {
      $("#example1").DataTable({
         "responsive": true,
         "lengthChange": false,
         "autoWidth": false,
         "buttons": [], // Remove all buttons
         "paging": false, // Hide pagination
         "searching": true, // Hide search box
         "info": false // Hide "Showing" information
      });
      $('#example1_wrapper .col-lg-6:eq(0)').append($("#example1").parent());
   });
</script>
</body>

</html>

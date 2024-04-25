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
               <h1 class="m-0">Videos</h1>
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
                  <li class="breadcrumb-item active">Videos</li>
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
               <a href="/super-admin/add-video">
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
                              <th>Video</th>
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
                                 <td> <div class="col-lg-4 col-md-6 col-sm-6 ">
                                    <div class="video-container wow fadeInUp">
                                        <video controls width="320" height="240">
                                            <source src="{{ asset('assets/img/' . $item->video) }}" type="video/mp4">
                                            Your browser does not support the video tag.
                                        </video>
                                        <br>
                                        {{ $item->url }}
                                    </div>
                                </div></td>
                                 <td>
                                    <a href="/super-admin/edit-video/{{ $item->id }}"><i class="fa fa-edit" style="padding:5px;font-size:15px;cursor:pointer;"
                                          aria-hidden="true"></i></a>
                                    <a onclick="return confirm('Are you sure?')" href="/super-admin/delete-video/{{ $item->id }}"><i class="fa fa-trash" style="padding:5px;font-size:15px;cursor:pointer;"
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

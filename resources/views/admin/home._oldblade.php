@include('layouts.header')
@php
   $booking_page = '';
@endphp
@include('layouts.sidebar')


<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
   <!-- Content Header (Page header) -->
   <div class="content-header">
      <div class="container-fluid">
         <div class="row mb-2">
            <div class="col-sm-6">
               <h1 class="m-0">Bookings</h1>
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
                  <li class="breadcrumb-item active">Bookings</li>
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
               {{-- <a href="/admin/add-email">
                  <button type="button" class="btn btn-primary">
                     + Add New
                  </button>
               </a> --}}
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
                              <th>Name</th>
                              <th>Phone</th>
                              <th>Email</th>
                              <th>Date</th>
                              <th>Slot</th>
                              <th>Price</th>
                              <th>Guest No</th>
                              <th>Total</th>
                              <th>Transaction Id</th>
                              <th>Status</th>
                              <th>Action</th>
                           </tr>
                        </thead>
                        <tbody>
                           @php
                              $count = 1;
                           @endphp
                           @foreach ($bookings as $item)
                              <tr>
                                 <td>{{ $count }}</td>
                                 <td>{{ $item->full_name }}</td>
                                 <td>{{ $item->phone }}</td>
                                 <td>{{ $item->email }}</td>
                                 <td>{{ $item->date }}</td>
                                 <td>{{ $item->slot->time }}</td>
                                 <td>{{ $item->price }}</td>
                                 <td>{{ $item->guest_no }}</td>
                                 <td>{{ $item->total }}</td>
                                 <td>{{ $item->transaction_id }}</td>
                                 <td>{{ $item->status }}</td>



                                 <td>
                                    <a href="/admin/edit-email/{{ $item->id }}"><i class="fa fa-edit" style="padding:5px;font-size:15px;cursor:pointer;"
                                          aria-hidden="true"></i></a>
                                    <a onclick="return confirm('Are you sure?')" href="/admin/delete-email/{{ $item->id }}"><i class="fa fa-trash" style="padding:5px;font-size:15px;cursor:pointer;"
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
         "searching": false, // Hide search box
         "info": false // Hide "Showing" information
      });
      $('#example1_wrapper .col-lg-6:eq(0)').append($("#example1").parent());
   });
</script>
</body>

</html>

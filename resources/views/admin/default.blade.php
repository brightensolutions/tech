@include('layouts.header')
@php
   $dashboard = '';
@endphp
@include('layouts.sidebar')


<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
   <!-- Content Header (Page header) -->
   <div class="content-header">
      <div class="container-fluid">
         <div class="row mb-2">
            <div class="col-sm-6">
               <h1 class="m-0">Dashboard</h1>
               @if (session()->has('message') && session()->has('result_code'))
                  <div class="alert alert-{{ session('result_code') }}" id="result-alert">
                     {{ session()->get('message') }}
                  </div>
                  {{ session()->forget('message') }}
               @endif
            </div><!-- /.col -->
            <div class="col-sm-6">
               <ol class="breadcrumb float-sm-right">
                  <li class="breadcrumb-item"><a href="/admin/home">Home</a></li>
                  <li class="breadcrumb-item active">DataTables</li>
               </ol>
            </div>
         </div><!-- /.row -->
      </div><!-- /.container-fluid -->
   </div>
   <!-- /.content-header -->

   <!-- Main content -->
   <section class="content">
      <div class="container-fluid">
         <!-- /.row -->
      </div><!-- /.container-fluid -->
   </section>
   <!-- /.content -->
</div>
<!-- /.content-wrapper -->
@include('layouts.footer')
</body>

</html>

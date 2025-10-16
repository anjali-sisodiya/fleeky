@include('adminlte/partials/header')
@include('adminlte/partials/nav')
@include('adminlte/partials/sidebar')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
   <!-- Content Header (Page header) -->
   <section class="content-header">
      <div class="container-fluid">
         <div class="row mb-2">
            <div class="col-sm-6">
               <h1>Tax</h1>
            </div>
            <div class="col-sm-6">
               <ol class="breadcrumb float-sm-right">
                  <li class="breadcrumb-item"><a href="/admin_2">Home</a></li>
                  <li class="breadcrumb-item active">Add Tax</li>
               </ol>
            </div>
         </div>
      </div>
      <!-- /.container-fluid -->
   </section>
   <button class="btn btn-success" style="margin-left: 15px;
      margin-bottom: 20px;"><a href="/tax_list" class="text-decoration-none text-white">Tax List</a></button>
   <!-- Main content -->
   <section class="content">
      <div class="container-fluid">
         <div class="row">
            <!-- left column -->
            <div class="col-md-12">
               <!-- jquery validation -->
               <div class="card card-primary">
                  <!-- /.card-header -->
                  <!-- form start -->
                  <form action="/add_tax" method="post">
                     @csrf
                     <div class="card-body">
                        <div class="form-group">
                           <label for="tax_value">Tax Value</label>
                           <input type="text" name="tax_value" class="form-control" id="tax_value" placeholder="Please enter tax_value...">
                           @error('tax_value')
                           <div class="text-danger">{{ $message }}</div>
                           @enderror
                        </div>
                        <div class="form-group">
                           <label for="tax_desc">Tax Description</label>
                           <input type="text" name="tax_desc" class="form-control" id="tax_desc" placeholder="Please enter tax_desc...">
                           @error('tax_desc')
                           <div class="text-danger">{{ $message }}</div>
                           @enderror
                        </div>
                     </div>
                     <div class="card-footer">
                        <button type="submit" class="btn btn-info btn-block">ADD Tax</button>
                     </div>
                  </form>
               </div>
               <!-- /.card -->
            </div>
            <!--/.col (left) -->
            <!-- right column -->
            <div class="col-md-6"></div>
            <!--/.col (right) -->
         </div>
         <!-- /.row -->
      </div>
      <!-- /.container-fluid -->
   </section>
   <!-- /.content -->
</div>
<!-- /.content-wrapper -->
@include('adminlte/partials/footer')
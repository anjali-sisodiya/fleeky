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
               <h1>Brand</h1>
            </div>
            <div class="col-sm-6">
               <ol class="breadcrumb float-sm-right">
                  <li class="breadcrumb-item"><a href="/admin_2">Home</a></li>
                  <li class="breadcrumb-item active">Add Brand</li>
               </ol>
            </div>
         </div>
      </div>
      <!-- /.container-fluid -->
   </section>
   <button class="btn btn-success" style="margin-left: 15px;
      margin-bottom: 20px;"><a href="/brand_list" class="text-decoration-none text-white">Brand List</a></button>
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
                  <form action="/add_brand" method="post" enctype="multipart/form-data">
                     @csrf
                     <div class="card-body">
                        <div class="form-group">
                           <label for="brand_title">Brand Name</label>
                           <input type="text" name="brand" class="form-control" id="brand" placeholder="Please enter Brand name...">
                           @error('brand')
                           <div class="text-danger">{{ $message }}</div>
                           @enderror
                        </div>

                        <div class="form-group">
                           <label for="brand_title">Brand Image</label>
                           <input type="file" name="image" class="form-control" id="image" placeholder="Please enter Brand image...">
                           @error('image')
                           <div class="text-danger">{{ $message }}</div>
                           @enderror
                        </div>

                        <div class="form-group">
                      <label for="is_home">Show In Home Page</label>
                      <input type="checkbox" name="is_home" class="mt-1" id="is_home" value="1">
                      @error('is_home')
                          <div class="text-danger">{{ $message }}</div>
                      @enderror
                  </div>

                     </div>

                     <div class="card-footer">
                        <button type="submit" class="btn btn-info btn-block">ADD Brand</button>
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
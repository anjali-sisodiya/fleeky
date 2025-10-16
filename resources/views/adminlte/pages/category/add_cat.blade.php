@include('adminlte/partials/header') @include('adminlte/partials/nav')
@include('adminlte/partials/sidebar')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
   <!-- Content Header (Page header) -->
   <section class="content-header">
      <div class="container-fluid">
         <div class="row mb-2">
            <div class="col-sm-6">
               <h1>Category</h1>
            </div>
            <div class="col-sm-6">
               <ol class="breadcrumb float-sm-right">
                  <li class="breadcrumb-item"><a href="/admin_2">Home</a></li>
                  <li class="breadcrumb-item active">Add Category</li>
               </ol>
            </div>
         </div>
      </div>
      <!-- /.container-fluid -->
   </section>
   <button class="btn btn-success" style="margin-left: 15px;
      margin-bottom: 20px;"><a href="/cat_list" class="text-decoration-none text-white">Category List</a></button>
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
                  <form action="/add_cat" method="post" enctype="multipart/form-data">
                     @csrf
                     <div class="card-body">
                        <div class="row">
                           <div class="col-md-4">
                              <div class="form-group">
                                 <label for="category_name">Category name</label>
                                 <input type="text" name="category_name" class="form-control" id="cat_name" placeholder="Please enter category name...">
                                 @error('category_name')
                                 <div class="text-danger">{{ $message }}</div>
                                 @enderror
                              </div>
                           </div>
                           <div class="col-md-4">
                              <div class="form-group">
                                 <label for="parent_category_id" class="form-label">Parent Category</label>
                                 <select id="inputState" name="parent_category_id" class="form-control">
                                    <option value="0">Select Category</option>
                                    @foreach($categories as $category)
                                    <option value="{{ $category->id }}">{{ $category->category_name }}</option>
                                    @endforeach
                                 </select>
                                 @error('parent_category_id')
                                 <div class="text-danger">{{ $message }}</div>
                                 @enderror
                              </div>
                           </div>
                           <div class="col-md-4">
                              <div class="form-group">
                                 <label for="category_slug">Category slug</label>
                                 <input type="text" name="category_slug" class="form-control" id="cat_slug" placeholder="Please enter category slug...">
                                 @error('category_slug')
                                 <div class="text-danger">{{ $message }}</div>
                                 @enderror
                              </div>
                           </div>
                        </div>
                       <div class="form-group">
                    <label for="category_image">Image</label>
                    <input type="file" name="category_image" class="form-control-file" id="image">
                    @error('category_image')
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
                        <button type="submit" class="btn btn-info btn-block">ADD CATEGORY</button>
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
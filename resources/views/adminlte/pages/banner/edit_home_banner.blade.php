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
               <h1>Edit Banner</h1>
            </div>
            <div class="col-sm-6">
               <ol class="breadcrumb float-sm-right">
                  <li class="breadcrumb-item"><a href="/admin_2">Home</a></li>
                  <li class="breadcrumb-item active">Edit Banner</li>
               </ol>
            </div>
         </div>
      </div>
      <!-- /.container-fluid -->
   </section>

   <button class="btn btn-success" style="margin-left: 15px; margin-bottom: 20px;">
      <a href="/home_banner_list" class="text-decoration-none text-white">Banner List</a>
   </button>

   <!-- Main content -->
   <section class="content">
      <div class="container-fluid">
         <div class="row">
            <!-- left column -->
            <div class="col-md-12">
               <!-- jquery validation -->
               <div class="card card-primary">
                  <!-- form start -->
                  <form action="{{ route('update_home_banner', ['id' => $show['id']]) }}" method="post" enctype="multipart/form-data">
                     @method('PUT')
                     @csrf
                     <div class="card-body">
                        <div class="row">
                           <div class="col-md-6">
                              <div class="form-group">
                                 <label for="btn_txt">Btn Text</label>
                                 <input type="text" name="btn_txt" class="form-control" id="btn_txt" value="{{$show['btn_txt']}}">
                                 @error('btn_txt')
                                    <div class="text-danger">{{ $message }}</div>
                                 @enderror
                              </div>
                           </div>
                           <div class="col-md-6">
                              <div class="form-group">
                                 <label for="btn_link">Btn Link</label>
                                 <input type="text" name="btn_link" class="form-control" id="btn_link" value="{{$show['btn_link']}}">
                                 @error('btn_link')
                                    <div class="text-danger">{{ $message }}</div>
                                 @enderror
                              </div>
                           </div>
                        </div>
                        <div class="row">
    <div class="col-md-6">
        <div class="form-group">
            <label for="desc">Description</label>
            <textarea type="text" name="desc" class="form-control" id="desc">{{ $show->desc }}</textarea>
        </div>
    </div>
    <div class="col-md-6">
        <div class="form-group">
            <label for="short_desc">Short Description</label>
            <textarea type="text" name="short_desc" class="form-control" id="short_desc">{{ $show->short_desc }}</textarea>
        </div>
    </div>
</div>

                        <div class="form-group">
                           <label for="home_banner_image">Home Banner Image</label>
                           <input type="file" name="home_banner_image" class="form-control-file" id="home_banner_image">
                           <img src="{{ asset($show->image) }}" alt="Home Banner Image" width="100" class="mt-2">
                        </div>
                     </div>

                     <div class="card-footer">
                        <button type="submit" class="btn btn-info btn-block">UPDATE</button>
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

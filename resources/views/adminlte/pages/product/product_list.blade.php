@include('adminlte/partials/header') 
@include('adminlte/partials/nav')
@include('adminlte/partials/sidebar')
<div class="wrapper">
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
   <!-- Content Header (Page header) -->
   <section class="content-header">
      <div class="container-fluid">
         <div class="row mb-2">
            <div class="col-sm-6">
               <h1>product List</h1>
            </div>
            <div class="col-sm-6">
               <ol class="breadcrumb float-sm-right">
                  <li class="breadcrumb-item"><a href="/admin_2">Home</a></li>
                  <li class="breadcrumb-item active">product List</li>
               </ol>
            </div>
         </div>
      </div>
      <!-- /.container-fluid -->
   </section>
   <!-- Main content -->
   @if (session('success'))
   <div class="alert alert-success">
      {{ session('success') }}
   </div>
   @endif
   @if(session('error'))
   <div class="alert alert-danger">
      {{ session('error') }}
   </div>
   @endif
   <section class="content">
      <div class="container-fluid">
         <div class="row">
            <div class="col-md-6">
            </div>
         </div>
         <!-- /.row -->
         <div class="row">
            <div class="col-12">
               <div class="card">
                  <div class="card-header">
                     <button class="btn btn-success"><a href="/add_product" class="text-decoration-none text-white">Add product</a></button>
                     <div class="card-tools">
                        <div class="input-group input-group-sm" style="width: 150px;">
                           <input type="text" name="table_search" class="form-control float-right" placeholder="Search">
                           <div class="input-group-append">
                              <button type="submit" class="btn btn-default">
                              <i class="fas fa-search"></i>
                              </button>
                           </div>
                        </div>
                     </div>
                  </div>
                  <!-- /.card-header -->
                  <div class="card-body table-responsive p-0">
                     <table class="table table-hover text-nowrap table-bordered text-center">
                        <thead>
                           <tr>
                              <th>ID</th>
                              <th>product Name</th>
                              <th>Slug</th>
                              <th>Brand</th>
                              <th>Model</th>
                              <!-- <th>Short Description</th>
                              <th>Description</th>
                              <th>Keywords</th>
                              <th>Technical Specification</th>
                              <th>Uses</th>
                              <th>Warranty</th> -->
                              <th>Product Image</th>
                              <th>Status</th>
                              <th colspan="2">Action</th>
                           </tr>
                        </thead>
                        <tbody>
                           @foreach($show as $product)
                           <tr>
                              <td>{{ $product->id }}</td>
                              <td>{{ $product->name }}</td>
                              <td>{{ $product->slug }}</td>
                              <td>{{ $product->brand_id }}</td>
                              <td>{{ $product->model }}</td>
                              <!-- <td>{{ $product->short_desc }}</td>
                              <td>{{ $product->desc }}</td>
                              <td>{{ $product->keywords }}</td>
                              <td>{{ $product->technical_specification }}</td>
                              <td>{{ $product->uses }}</td>
                              <td>{{ $product->warranty }}</td> -->
                              <td>
                                 <img src="{{ asset($product->image) }}" alt="Product Image" width="75">
                              </td>
                              <td>
                                 @if($product->status == 1)
                                 <form method="POST" action="{{ route('product_status', ['status' => 0, 'id' => $product->id]) }}">
                                    @csrf
                                    @method('PUT')
                                    <button type="submit" class="btn ms-1 reduced-font btn-success btn-sm text-white">Active</button>
                                 </form>
                                 @elseif($product->status == 0)
                                 <form method="POST" action="{{ route('product_status', ['status' => 1, 'id' => $product->id]) }}">
                                    @csrf
                                    @method('PUT')
                                    <button type="submit" class="btn ms-1 reduced-font btn-warning btn-sm text-dark">Deactivate</button>
                                 </form>
                                 @endif
                              </td>
                              <td> 
                                 <a class="text-decoration-none text-white" href="edit_product/{{ $product->id }}">
                                 <button type="button" class="btn reduced-font btn-success btn-sm text-white">Edit
                                 <i class="fa-solid fa-pen-to-square reduced-font ms-1"></i>
                                 </button>
                                 </a>
                                 <a class="text-decoration-none text-white" href="delete_product/{{ $product->id }}">
                                 <button type="button" class="btn ms-1 reduced-font btn-danger btn-sm text-white">Delete
                                 <i class="fa fa-trash reduced-font ms-1" aria-hidden="true"></i>
                                 </button>
                                 </a>
                              </td>
                           </tr>
                           @endforeach
                        </tbody>
                     </table>
                  </div>
                  <!-- /.card-body -->
               </div>
               <!-- /.card -->
            </div>
         </div>
      </div>
      <!-- /.container-fluid -->
   </section>
   <!-- /.content -->
</div>
<!-- /.content-wrapper -->
@include('adminlte/partials/footer')
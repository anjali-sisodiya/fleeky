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
               <h1>ADD Products Attributes</h1>
            </div>
            <div class="col-sm-6">
               <ol class="breadcrumb float-sm-right">
                  <li class="breadcrumb-item"><a href="/admin_2">Home</a></li>
                  <li class="breadcrumb-item active">Add Products Attributes</li>
               </ol>
            </div>
         </div>
      </div>
      <!-- /.container-fluid -->
   </section>
   <button class="btn btn-secondary" style="margin-left: 15px; margin-bottom: 20px;"><a href="/edit_products_attr" class="text-decoration-none text-white">Edit Products Attributess</a></button>
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
                  <div class="col-md-12" id="product_attr_box">
                     <div id="product_attr_1">
                        <form action="/products_attributes" method="post" enctype="multipart/form-data" id="product_attr_box_form">
                           @csrf
                           <div class="card-body">
                              <div class="row">
                                 <!-- Product name -->
                                 <div class="form-group col-2">
                                    <label for="product" class="form-label">Product Name</label>
                                    <select id="inputState" name="product_id[]" class="form-control">
                                       <option value="">Select product</option>
                                       @foreach($products as $product)
                                       <option value="{{ $product->id }}">{{ $product->name }}</option>
                                       @endforeach
                                    </select>
                                    @error('product_id')
                                    <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                 </div>
                                 <!-- MRP -->
                                 <div class="col-2">
                                    <label for="mrp" class="form-label">MRP</label>
                                    <input type="text" name="mrp[]" class="form-control" id="mrp">
                                    @error('mrp')
                                    <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                 </div>
                                 <!-- Quantity -->
                                 <div class="col-2">
                                    <label for="qty" class="form-label">Quantity</label>
                                    <input type="text" name="qty[]" class="form-control" id="qty">
                                    @error('qty')
                                    <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                 </div>
                                 <!-- Price -->
                                 <div class="col-2">
                                    <label for="price" class="form-label">Price</label>
                                    <input type="text" name="price[]" class="form-control" id="price">
                                    @error('price')
                                    <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                 </div>
                                 <!-- SKU -->
                                 <div class="col-2">
                                    <label for="sku" class="form-label">SKU</label>
                                    <input type="text" name="sku[]" class="form-control" id="sku">
                                    @error('sku')
                                    <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                 </div>
                                 <!-- Size -->
                                 <div class="form-group col-3">
                                    <label for="size" class="form-label">Size</label>
                                    <select id="inputState" name="size_id[]" class="form-control">
                                       <option value="">Select Size</option>
                                       @foreach($sizes as $size)
                                       <option value="{{ $size->id }}">{{ $size->size }}</option>
                                       @endforeach
                                    </select>
                                    @error('size_id')
                                    <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                 </div>
                                 <!-- Color -->
                                 <div class="form-group col-3">
                                    <label for ="color" class="form-label">Color</label>
                                    <select id="inputState" name="color_id[]" class="form-control">
                                       <option value="">Select Color</option>
                                       @foreach($colors as $color)
                                       <option value="{{ $color->id }}">{{ $color->color }}</option>
                                       @endforeach
                                    </select>
                                    @error('color_id')
                                    <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                 </div>
                                 <!-- Image -->
                                 <div class="col-5">
                                    <label for="image" class="form-label">Image</label>
                                    <input type="file" name="image[]" class="form-control-file" id="image">
                                    @error('image')
                                    <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                 </div>
                              </div>
                              <div class="row">
                                 <!-- ADD Button -->
                                 <div class="col-2 mt-4">
                                    <button type="button" class="btn btn-success" onclick="add_more()">
                                    <i class="fa fa-plus"></i> Add more
                                    </button>
                                 </div>
                              </div>
                           </div>
                     </div>
                  </div>
               </div>
               <div class="col-md-12 text-center mt-4">
               <button type="submit" class="btn btn-info btn-block">Add Products Attributes</button>
               </div>
               </form>
            </div>
         </div>
      </div>
   </section>
</div>
<!-- /.content-wrapper -->
@include('adminlte/partials/footer')
<script>
   var loop_count=1; 
   function add_more(){
     loop_count++;
     var html = ' <div class="card card-primary" id="product_attr_'+loop_count+'"><div class="card-body"><div class="form-group row container"><div class="row">';
     // Product
     html += '<div class="form-group col-2"><label for="product" class="form-label">Product Name</label> <select id="inputState" name="product_id[]" class="form-control"><option value="">Select product</option>@foreach($products as $product)<option value="{{ $product->id }}">{{ $product->name }}</option>@endforeach</select></div>';
     // MRP
     html += '<div class="col-2"><label for="mrp" class="form-label">MRP</label><input type="text" name="mrp[]" class="form-control" id="mrp"></div>';
     // Quantity
     html += '<div class="col-2"><label for="qty" class="form-label">Quantity</label><input type="text" name="qty[]" class="form-control" id="qty"></div>';
     // Price
     html += '<div class="col-2"><label for="price" class="form-label">Price</label><input type="text" name="price[]" class="form-control" id="price"></div>';
     // SKU
     html += '<div class="col-2"><label for="sku" class="form-label">SKU</label><input type="text" name="sku[]" class="form-control" id="sku"></div>';
     // Size
     html += '<div class="form-group col-3"><label for="size" class="form-label">Size</label><select id="inputState" name="size_id[]" class="form-control"><option value="">Select Size</option>@foreach($sizes as $size)<option value="{{ $size->id }}">{{ $size->size }}</option>@endforeach</select></div>';
     // Color
     html += '<div class="form-group col-3"><label for="color" class="form-label">Color</label><select id="inputState" name="color_id[]" class="form-control"><option value="">Select Color</option>@foreach($colors as $color)<option value="{{ $color->id }}">{{ $color->color }}</option>@endforeach</select></div>';
     // Image
     html += '<div class="col-5"><label for="image" class="form-label">Image</label><input type="file" name="image[]" class="form-control-file" id="image"></div>';
     // Remove Button
     html += '<div class="col-2 mt-4"><button type="button" class="btn btn-danger" onclick=remove_more("'+loop_count+'")><i class="fa fa-minus"></i> Remove</button></div>';

     html+='</div></div></div></div>';

       jQuery('#product_attr_box_form').append(html)
   }
   
   function remove_more(loop_count){
        jQuery('#product_attr_'+loop_count).remove();
   }
</script>
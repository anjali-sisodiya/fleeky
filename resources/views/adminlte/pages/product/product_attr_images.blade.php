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
               <h1>Multiple Products Attributes Images</h1>
            </div>
            <div class="col-sm-6">
               <ol class="breadcrumb float-sm-right">
                  <li class="breadcrumb-item"><a href="/admin_2">Home</a></li>
                  <li class="breadcrumb-item active">Add Products Attributes Images</li>
               </ol>
            </div>
         </div>
      </div>
      <!-- /.container-fluid -->
   </section>
   <button class="btn btn-secondary" style="margin-left: 15px; margin-bottom: 20px;"><a href="/edit_product_attr_images" class="text-decoration-none text-white">Edit Products Attributess</a></button>
   <!-- Main content -->
   <section class="content">
      <div class="container-fluid">
         <div class ="row">
            <div class="col-md-12">
               <div class="card card-primary">
                  <div class="col-md-12">
                     <div class="product_attr_1">
                        <form action="/product_attr_images" method="post" enctype="multipart/form-data" id="product_attr_box_form">
                           @csrf
                           <div class="row" id="product_attr_box">
                              <div class="form-group col-3 mt-5" style="margin-left: 14px;">
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
                              <div class="col-4 mt-5">
                                 <label for="image" class="form-label">Image</label>
                                 <input type="file" name="image[]" class="form-control-file mt-1" id="image">
                                 @error('image')
                                 <div class="text-danger">{{ $message }}</div>
                                 @enderror
                              </div>
                              <div class="row">
                                 <div class="col-8 mt-4">
                                    <button type="button" class="btn btn-success" onclick="add_more()" style="position: relative; right: 83px; width: 100px; top: 44px;">
                                       +ADD More
                                    </button>
                                 </div>
                              </div>
                           </div>
                           <div class="col-md-12 text-center mt-5">
                              <button type="submit" class="btn btn-info btn-block">Add Products Images</button>
                           </div>
                        </form>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </section>
</div>
@include('adminlte/partials/footer')
<script>
  var loop_count = 0;

  function add_more() {
    loop_count++;
    var html = '<div class="card card-primary mx-2" id="product_attr_' + loop_count + '" style="width: 470px;"><div class="card-body"><div class="form-group row">';


    // Product Name
    html += '<div class="col-5">';
    html += '<label for="product" class="form-label">Product Name</label>';
    html += '<select id="inputState" name="product_id[]" class="form-control">';
    html += '<option value="">Select product</option>';
    html += '@foreach($products as $product)';
    html += '<option value="{{ $product->id }}">{{ $product->name }}</option>';
    html += '@endforeach';
    html += '</select>';
    html += '</div>';

    // Image
    html += '<div class="col-6 mt-1">';
    html += '<label for="image" class="form-label">Image</label>';
    html += '<input type="file" name="image[]" class="form-control-file" id="image">';
    html += '</div>';

    // Remove Button
    html += '<div class="col-3 mt-4">';
    html += '<button type="button" class="btn btn-danger" onclick=remove_more("'+loop_count+'")>';
    html += '<i class="fa fa-minus"></i>Remove';
    html += '</button>';
    html += '</div>';

    html += '</div></div></div></div>';

    jQuery('#product_attr_box').append(html);
  }

  function remove_more(loop_count) {
    jQuery('#product_attr_' + loop_count).remove();
  }
</script>


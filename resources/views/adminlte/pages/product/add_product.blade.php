<!DOCTYPE html>
<html lang="en">
   <head>
      <meta charset="UTF-8">
      <title>Add Product</title>
      <style type="text/css">
         .custom-ckeditor {
         display: block !important;
         height: 200px !important;
         }
      </style>
   </head>
   </style>
   <body>
      @include('adminlte/partials/header')
      @include('adminlte/partials/nav')
      @include('adminlte/partials/sidebar')
      <div class="content-wrapper">
         <section class="content-header">
            <div class="container-fluid">
               <div class="row mb-2">
                  <div class="col-sm-6">
                     <h1>Add Product</h1>
                  </div>
                  <div class="col-sm-6">
                     <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="/admin_2">Home</a></li>
                        <li class="breadcrumb-item active">Add product</li>
                     </ol>
                  </div>
               </div>
            </div>
         </section>
         <button class="btn btn-success" style="margin-left: 15px; margin-bottom: 20px;">
         <a href="/product_list" class="text-decoration-none text-white">Product List</a>
         </button>
         <button class="btn btn-secondary" style="margin-left: 15px; margin-bottom: 20px;">
         <a href="/products_attributes" class="text-decoration-none text-white">Add Products Attributes</a>
         </button>
         <button class="btn btn-primary" style="margin-left: 15px; margin-bottom: 20px;">
         <a href="/product_attr_images" class="text-decoration-none text-white">Add Products Images</a>
         </button>
         <section class="content">
            <div class="container-fluid">
               <div class="row">
                  <div class="col-md-12">
                     <div class="card card-primary">
                        <form action="/add_product" method="post" enctype="multipart/form-data">
                           @csrf
                           <div class="card-body">
                              <div class="row">
                                 <div class="col-6">
                                    <div class="form-group">
                                       <label for="product_name">Product Name</label>
                                       <input type="text" name="name" class="form-control" id="product_name" placeholder="Please enter product name...">
                                       @error('name')
                                       <div class="text-danger">{{ $message }}</div>
                                       @enderror
                                    </div>
                                 </div>
                                 <div class="col-6">
                                    <div class="form-group">
                                       <label for="slug">Slug</label>
                                       <input type="text" name="slug" class="form-control" id="slug" placeholder="Please enter slug...">
                                       @error('slug')
                                       <div class="text-danger">{{ $message }}</div>
                                       @enderror
                                    </div>
                                 </div>
                              </div>
                              <div class="row">
                                 <div class="col-4">
                                    <div class="form-group">
                                       <label for="cat_id" class="form-label">Category</label>
                                       <select id="inputState" name="category_id" class="form-control">
                                          <option value="">Select Category</option>
                                          @foreach($categories as $category)
                                          <option value="{{ $category->id }}">{{ $category->category_name }}</option>
                                          @endforeach
                                       </select>
                                       @error('category_id')
                                       <div class="text-danger">{{ $message }}</div>
                                       @enderror
                                    </div>
                                 </div>
                                 <div class="col-4">
                                    <div class="form-group">
                                       <label for="brand">Brand</label>
                                       <select id="inputState" name="brand" class="form-control">
                                          <option value="">Select Brand</option>
                                          @foreach($brands as $brand)
                                          <option value="{{ $brand->id }}">{{ $brand->name }}</option>
                                          @endforeach
                                       </select>
                                       @error('brand')
                                       <div class="text-danger">{{ $message }}</div>
                                       @enderror
                                    </div>
                                 </div>
                                 <div class="col-4">
                                    <div class="form-group">
                                       <label for="model">Model</label>
                                       <input type="text" name="model" class="form-control" id="model" placeholder="Please enter product model...">
                                       @error('model')
                                       <div class="text-danger">{{ $message }}</div>
                                       @enderror
                                    </div>
                                 </div>
                              </div>
                              
                              <div class="row">
                                 <div class="col-4">
                                    <div class="form-group">
                                       <label for="keywords">Keywords</label>
                                       <input type="text" name="keywords" class="form-control" id="keywords" placeholder="Please enter keywords...">
                                       @error('keywords')
                                       <div class="text-danger">{{ $message }}</div>
                                       @enderror
                                    </div>
                                 </div>
                                 <div class="col-4">
                                    <div class="form-group">
                                       <label for="warranty">Warranty</label>
                                       <input type="text" name="warranty" class="form-control" id="warranty" placeholder="Please enter warranty...">
                                       @error('warranty')
                                       <div class="text-danger">{{ $message }}</div>
                                       @enderror
                                    </div>
                                 </div>
                                 <div class="col-4">
                                    <div class="form-group">
                                       <label for="uses">Uses</label>
                                       <textarea name="uses" class="form-control" id="uses" placeholder="Please enter uses..."></textarea>
                                       @error('uses')
                                       <div class="text-danger">{{ $message }}</div>
                                       @enderror
                                    </div>
                                 </div>
                              </div>
                               <div class="row">
                                 <div class="col-md-6">
                                    <div class="form-group">
                                       <label for="lead_time">Lead Time</label>
                                       <input type="text" name="lead_time" class="form-control" id="lead_time" placeholder="Please enter lead_time...">
                                       @error('lead_time')
                                       <div class="text-danger">{{ $message }}</div>
                                       @enderror
                                    </div>
                                 </div>
                                 <div class="col-md-6">
                                    <div class="form-group">
                                       <label for="tax_id">Tax</label>
                                       <select id="inputState" name="tax_id" class="form-control">
                                          <option value="">Select Tax</option>
                                          @foreach($taxs as $tax)
                                          <option value="{{ $tax->id }}">{{ $tax->tax_desc }}</option>
                                          @endforeach
                                       </select>
                                       @error('tax_id')
                                       <div class="text-danger">{{ $message }}</div>
                                       @enderror
                                    </div>
                                 </div>
                              </div>
                           <div class="row">
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label for="is_promo">Is Promo</label>
                                        <select id="is_promo" name="is_promo" class="form-control">
                                            <option value="1">Yes</option>
                                            <option value="0">No</option>
                                        </select>
                                        @error('is_promo')
                                        <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label for="is_featured">Is Featured</label>
                                        <select id="is_featured" name="is_featured" class="form-control">
                                            <option value="1">Yes</option>
                                            <option value="0">No</option>
                                        </select>
                                        @error('is_featured')
                                        <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label for="is_discounted">Is Discounted</label>
                                        <select id="is_discounted" name="is_discounted" class="form-control">
                                            <option value="1">Yes</option>
                                            <option value="0">No</option>
                                        </select>
                                        @error('is_discounted')
                                        <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label for="is_tranding">Is Tranding</label>
                                        <select id="is_tranding" name="is_tranding" class="form-control">
                                            <option value="1">Yes</option>
                                            <option value="0">No</option>
                                        </select>
                                        @error('is_tranding')
                                        <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                            </div>

                              <div class="row">
                                 <div class="col-6">
                                    <div class="form-group">
                                       <label for="short_desc">Short Description</label>
                                       <!-- Change the input field to a textarea -->
                                       <textarea name="short_desc" class="form-control" id="short_desc" placeholder="Please enter short description..."></textarea>
                                       @error('short_desc')
                                       <div class="text-danger">{{ $message }}</div>
                                       @enderror
                                    </div>
                                 </div>
                                 <div class="col-6">
                                    <div class="form-group">
                                       <label for="desc">Description</label>
                                       <textarea name="desc" class="form-control" id="desc" placeholder="Please enter description..."></textarea>
                                       @error('desc')
                                       <div class="text-danger">{{ $message }}</div>
                                       @enderror
                                    </div>
                                 </div>
                              </div>
                              <div class="form-group">
                                 <label for="technical_specification">Technical Specification</label>
                                 <textarea name="technical_specification" class="form-control" id="technical_specification" placeholder="Please enter technical specification..."></textarea>
                                 @error('technical_specification')
                                 <div class="text-danger">{{ $message }}</div>
                                 @enderror
                              </div>
                              <div class="row">
                                 <div class="col-6">
                                    <div class="form-group">
                                       <label for="image">Image</label>
                                       <input type="file" name="image" class="form-control-file" id="image">
                                       @error('image')
                                       <div class="text-danger">{{ $message }}</div>
                                       @enderror
                                    </div>
                                 </div>
                              </div>
                           </div>
                           <div class="card-footer">
                              <button type="submit" class="btn btn-info btn-block">Add Product</button>
                           </div>
                        </form>
                     </div>
                  </div>
               </div>
            </div>
         </section>
      </div>
      @include('adminlte/partials/footer')
   </body>
</html>
<script src="{{asset('ckeditor/ckeditor.js')}}"></script>
<script>
   CKEDITOR.replace('short_desc');
   CKEDITOR.replace('desc');
   CKEDITOR.replace('technical_specification');
</script>
<!DOCTYPE html>
<html lang="en">
   <head>
      <meta charset="UTF-8">
      <title>Edit Products</title>
      <style type="text/css">
         .custom-ckeditor {
         display: block !important;
         height: 200px !important;
         }
      </style>
   </head>
   <body>
      @include('adminlte/partials/header')
      @include('adminlte/partials/nav')
      @include('adminlte/partials/sidebar')
      <div class="content-wrapper">
         <section class="content-header">
            <div class="container-fluid">
               <div class="row mb-2">
                  <div class="col-sm-6">
                     <h1>Edit Product</h1>
                  </div>
                  <div class="col-sm-6">
                     <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="/admin_2">Home</a></li>
                        <li class="breadcrumb-item active">Edit product</li>
                     </ol>
                  </div>
               </div>
            </div>
         </section>
         <button class="btn btn-success" style="margin-left: 15px; margin-bottom: 20px;">
         <a href="/product_list" class="text-decoration-none text-white">Product List</a>
         </button>
         <section class="content">
            <div class="container-fluid">
               <div class="row">
                  <div class="col-md-12">
                     <div class="card card-primary">
                        <form action="update_product/{{$show['id']}}" method="post" enctype="multipart/form-data">
                           @method('PUT')
                           @csrf
                           <div class="card-body">
                              <div class="row">
                                 <div class="col-6">
                                    <div class="form-group">
                                       <label for="name">Product Name</label>
                                       <input type="text" name="name" class="form-control" id="name" value="{{ $show->name }}">
                                    </div>
                                 </div>
                                 <div class="col-6">
                                    <div class="form-group">
                                       <label for="slug">Slug</label>
                                       <input type="text" name="slug" class="form-control" id="slug" value="{{ $show->slug }}">
                                    </div>
                                 </div>
                              </div>
                              <div class="row">
                                 <div class="col-4">
                                    <div class="form-group">
                                       <label for="cat_id" class="form-label">Category</label>
                                       <select id="inputState" name="category_id" class="form-control">
                                       @foreach($categories as $category)
                                       <option value="{{ $category->id }}" {{ $show->category_id == $category->id ? 'selected' : '' }}>{{ $category->category_name }}</option>
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
                                       @foreach($brands as $brand)
                                       <option value="{{ $brand->id }}" {{ $show->brand_id == $brand->id ? 'selected' : '' }}>{{ $brand->name }}</option>
                                       @endforeach
                                       </select>
                                    </div>
                                 </div>
                                 <div class="col-4">
                                    <div class="form-group">
                                       <label for="model">Model</label>
                                       <input type="text" name="model" class="form-control" id="model" value="{{ $show->model }}">
                                    </div>
                                 </div>
                              </div>

                               <div class="row">
                                  <div class="col-4">
                                    <div class="form-group">
                                       <label for="keywords">Keywords</label>
                                       <input type="text" name="keywords" class="form-control" id="keywords" value="{{ $show->keywords }}">
                                    </div>
                                 </div>
                                 <div class="col-4">
                                    <div class="form-group">
                                       <label for="warranty">Warranty</label>
                                       <input type="text" name="warranty" class="form-control" id="warranty" value="{{ $show->warranty }}">
                                    </div>
                                 </div>
                                 <div class="col-4">
                                    <div class="form-group">
                                       <label for="uses">Uses</label>
                                       <textarea name="uses" class="form-control" id="uses">{{ $show->uses }}</textarea>
                                    </div>
                                 </div>
                              </div>

                               <div class="row">
                                 <div class="col-md-6">
                                    <div class="form-group">
                                       <label for="lead_time">Lead Time</label>
                                       <input type="text" name="lead_time" class="form-control" id="lead_time"  value="{{ $show->lead_time }}">
                                       @error('lead_time')
                                       <div class="text-danger">{{ $message }}</div>
                                       @enderror
                                    </div>
                                 </div>
                                 <div class="col-md-6">
                                    <div class="form-group">
                                       <label for="tax_id">Tax</label>
                                       <select id="inputState" name="tax_id" class="form-control">
                                       @foreach($taxs as $tax)
                                       <option value="{{ $tax->id }}" {{ $show->tax_id == $tax->id ? 'selected' : '' }}>{{ $tax->tax_desc }}</option>
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
            <select id="inputState" name="is_promo" class="form-control">
                <option value="1" {{ $show->is_promo == 1 ? 'selected' : '' }}>Yes</option>
                <option value="0" {{ $show->is_promo == 0 ? 'selected' : '' }}>No</option>
            </select>
            @error('is_promo')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>
    </div>

    <div class="col-md-3">
        <div class="form-group">
            <label for="is_featured">Is Featured</label>
            <select id="inputState" name="is_featured" class="form-control">
                <option value="1" {{ $show->is_featured == 1 ? 'selected' : '' }}>Yes</option>
                <option value="0" {{ $show->is_featured == 0 ? 'selected' : '' }}>No</option>
            </select>
            @error('is_featured')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>
    </div>

    <div class="col-md-3">
        <div class="form-group">
            <label for="is_discounted">Is Discounted</label>
            <select id="inputState" name="is_discounted" class="form-control">
                <option value="1" {{ $show->is_discounted == 1 ? 'selected' : '' }}>Yes</option>
                <option value="0" {{ $show->is_discounted == 0 ? 'selected' : '' }}>No</option>
            </select>
            @error('is_discounted')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>
    </div>

    <div class="col-md-3">
        <div class="form-group">
            <label for="is_tranding">Is Tranding</label>
            <select id="inputState" name="is_tranding" class="form-control">
                <option value="1" {{ $show->is_tranding == 1 ? 'selected' : '' }}>Yes</option>
                <option value="0" {{ $show->is_tranding == 0 ? 'selected' : '' }}>No</option>
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
                                        <textarea name="short_desc" class="form-control" id="short_desc">{{ $show->short_desc }}</textarea>
                                    </div>
                                 </div>
                                 <div class="col-6">
                                    <div class="form-group">
                                       <label for="desc">Description</label>
                                       <textarea name="desc" class="form-control" id="desc">{{ $show->desc }}</textarea>
                                    </div>
                                 </div>
                              </div>
                              
                                    <div class="form-group">
                                       <label for="technical_specification">Technical Specification</label>
                                       <textarea name="technical_specification" class="form-control" id="technical_specification">{{ $show->technical_specification }}</textarea>
                                    </div>
                               
                             
                              <div class="form-group">
                                 <label for="image">Product Image</label>
                                 <input type="file" name="image" class="form-control-file" id="image">
                                 <img src="{{ asset($show->image) }}" alt="Product Image" width="100" class="mt-2">
                              </div>
                           </div>
                           <div class="card-footer">
                              <button type="submit" class="btn btn-info btn-block">Update</button>
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
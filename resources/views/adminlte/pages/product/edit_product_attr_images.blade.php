@include('adminlte/partials/header')
@include('adminlte/partials/nav')
@include('adminlte/partials/sidebar')

<div class="content-wrapper">
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

   <section class="content-header">
      <div class="container-fluid">
         <div class="row mb-2">
            <div class="col-sm-6">
               <h1>Edit Products Attributes Images</h1>
            </div>
            <div class="col-sm-6">
               <ol class="breadcrumb float-sm-right">
                  <li class="breadcrumb-item"><a href="/admin_2">Home</a></li>
                  <li class="breadcrumb-item active">Edit Products Attributes Images</li>
               </ol>
            </div>
         </div>
      </div>
   </section>

   <button class="btn btn-success" style="margin-left: 15px; margin-bottom: 20px;">
      <a href="/product_attr_images" class="text-decoration-none text-white">Add Products Attributes</a>
   </button>

   <section class="content">
      <div class="container-fluid">
         <div class="row">
            <div class="col-md-12">
               <div class="card card-primary">
                  <div class="card-body">
                      @php
                     $loop_count_num = 1;
                     @endphp
                     @foreach($productAttrArr as $key => $val)
                     @php
                     $loop_count_prev = $loop_count_num;
                     @endphp
                     <form action="{{ route('update_product_attr_images', ['id' => $val->id]) }}" method="post"
                        enctype="multipart/form-data" id="product_img_box_form">
                        @method('PUT')
                        @csrf

                        <input type="hidden" name="piid[]" class="form-control" value="{{ $val->id }}">
                        <div id="product_img_box">
                           <div id="product_img_{{ $loop_count_num++ }}">
                              <div class="row">
                                 <div class="form-group col-4">
                                    <label for="product" class="form-label">Product Name</label>
                                    <select id="inputState" name="product_id[]" class="form-control">
                                       <option value="">Select product</option>
                                       @foreach($products as $product)
                                          <option value="{{ $product->id }}"
                                             {{ $product->id == $val->product_id ? 'selected' : '' }}>
                                             {{ $product->name }}
                                          </option>
                                       @endforeach
                                    </select>
                                    @error('product_id')
                                    <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                 </div>

                                 <div class="col-5">
                                    <label for="image" class="form-label">Image</label>
                                    <input type="file" name="image[]" class="form-control-file" id="image">
                                    <img src="{{ asset($val->image) }}" alt="Product Image" width="100"
                                       class="mt-2">
                                    @error('image')
                                    <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                 </div>
                              
                                 @if($loop_count_num == 2)
                                 <div class="col-3 mt-4">
                                    <button type="button" class="btn btn-success mb-3" onclick="add_more()">
                                       <i class="fa fa-plus"></i> Add more
                                    </button>
                                 </div>
                                 @else
                                 <div class="col-2 mt-4">
                                    <a class="text-decoration-none text-white"
                                       href="delete_product_attr_images/{{ $val->id }}"><button type="button"
                                          class="btn btn-danger mb-3">
                                          <i class="fa fa-minus"></i> Remove
                                       </button></a>
                                 </div>
                                 @endif
                              </div>
                           </div>
                            @endforeach
                        </div>
                  </div>
               </div>
               <div class="col-md-12 text-center mt-4">
                           <button type="submit" class="btn btn-info btn-block">Submit</button>
                        </div>
                     </form>
            </div>
         </div>
      </div>
   </section>
</div>

@include('adminlte/partials/footer')

<script>
   var loop_count = {{ count($productAttrArr) }};

   function add_more() {
      loop_count++;
      var html = '<div class="card card-primary mt-3" id="product_img_' + loop_count + '">' +
         '<div class="card-body"><div class="form-group row"><div class="row">' +

         // Product
         '<div class="form-group col-4"><label for="product" class="form-label">Product Name</label>' +
         '<select id="inputState" name="product_id[]" class="form-control"><option value="">Select product</option>' +
         '@foreach($products as $product)<option value="{{ $product->id }}">{{ $product->name }}</option>@endforeach' +
         '</select></div>' +

         // Image
         '<div class="col-5"><label for="image" class="form-label">Image</label>' +
         '<input type="file" name="image[]" class="form-control-file" id="image"></div>' +

         // Remove Button
         '<div class="col-3 mt-4"><button type="button" class="btn btn-danger" onclick=remove_more("' +
         loop_count + '")><i class="fa fa-minus"></i> Remove</button></div>' +

         '</div></div></div></div>';

      jQuery('#product_img_box').append(html);
   }

   function remove_more(loop_count) {
      jQuery('#product_img_' + loop_count).remove();
   }
</script>

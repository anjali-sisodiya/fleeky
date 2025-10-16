<?php
namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use App\Models\Admin\Product;
use App\Models\Admin\Products_attr;
use App\Models\Admin\Product_images;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProductController extends Controller
{

//********************Add products View*******************************
public function add_products() {
$categories = DB::table('categories')->where('status', 1)->where(['parent_category_id'=>0])->get();
$sizes = DB::table('sizes')->where('status', 1)->get();
$colors = DB::table('colors')->where('status', 1)->get();
$brands = DB::table('brands')->where('status', 1)->get();
$taxs = DB::table('taxes')->where('status', 1)->get();
return view('adminlte.pages.product.add_product', ['categories' => $categories ,
 'sizes' => $sizes, 'colors' => $colors, 'brands' => $brands, 'taxs' => $taxs]);
}

//********************Add products data*******************************

public function add_product(Request $request)
{
    $request->validate([
        'category_id' => 'required',
        'name' => 'required|string|max:255',
        'slug' => 'required|string|max:255|unique:products',
        'brand' => 'required|string|max:255',
        'model' => 'required|string|max:255',
        'lead_time' => 'string|max:255',
        'tax_id' => 'required',
        'short_desc' => 'required|string|max:255',
        'desc' => 'required|string',
        'keywords' => 'required|string',
        'technical_specification' => 'required|string',
        'uses' => 'required|string',
        'warranty' => 'required|string',
        'image' => 'required|image',
    ]);

    $product = new Product;
    $product->category_id = $request->input('category_id');
    $product->name = $request->input('name');
    $product->slug = $request->input('slug');
    $product->brand_id = $request->input('brand');
    $product->model = $request->input('model');
    $product->lead_time = $request->input('lead_time');
    $product->tax_id = $request->input('tax_id');
    $product->is_promo = $request->input('is_promo');
    $product->is_featured = $request->input('is_featured');
    $product->is_discounted = $request->input('is_discounted');
    $product->is_tranding = $request->input('is_tranding');
    $product->short_desc = strip_tags($request->input('short_desc'));
    $product->desc = strip_tags($request->input('desc'));
    $product->technical_specification = strip_tags($request->input('technical_specification'));
    $product->keywords = $request->input('keywords');
    $product->uses = $request->input('uses');
    $product->warranty = $request->input('warranty');

    if ($request->hasFile('image') && $request->file('image')->isValid()) {
        $file = $request->file('image');
        $extension = $file->getClientOriginalExtension();
        $filename = time() . '.' . $extension;
        $file->move('adminlte/upload/', $filename);
        $product->image = 'adminlte/upload/' . $filename;
    }

    $result = $product->save();

    if ($result) {
        return redirect('/product_list')->with('success', 'Product added successfully');
    } else {
        return "Something went wrong";
    }
}

//**************************Products List******************************
public function product_list() {
$show = Product::all();
return view('adminlte.pages.product.product_list' , ['show' => $show]);
}

//********************Edit Products Data*******************************

public function edit_product($id){
$show = Product::find($id);
$sizes = DB::table('sizes')->where('status', 1)->get();
$colors = DB::table('colors')->where('status', 1)->get();
$categories = DB::table('categories')->where('status', 1)->where(['parent_category_id'=>0])->get();
$brands = DB::table('brands')->where('status', 1)->get();
$taxs = DB::table('taxes')->where('status', 1)->get();


return view('adminlte.pages.product.edit_product', ['show' => $show], ['categories' => $categories , 'sizes' => $sizes, 'colors' => $colors, 'brands' => $brands, 'taxs' => $taxs] );
}




//********************Update Products Data*******************************

   public function update_product(Request $request, $id)
{
    $product = Product::find($id);

    $product->category_id = $request->input('category_id');
    $product->name = $request->input('name');
    $product->slug = $request->input('slug');
    $product->brand_id = $request->input('brand');
    $product->model = $request->input('model');
    $product->lead_time = $request->input('lead_time');
    $product->tax_id = $request->input('tax_id');
    $product->short_desc = strip_tags($request->input('short_desc'));
    $product->desc = strip_tags($request->input('desc'));
    $product->technical_specification = strip_tags($request->input('technical_specification'));
    $product->keywords = $request->input('keywords');
    $product->uses = $request->input('uses');
    $product->warranty = $request->input('warranty');
   
    if ($request->hasFile('image') && $request->file('image')->isValid()) {
        $file = $request->file('image');
        $extension = $file->getClientOriginalExtension();
        $filename = time() . '.' . $extension;
        $file->move('adminlte/upload/', $filename);
        $product->image = 'adminlte/upload/' . $filename;
    }
    
    $result = $product->update();

    if ($result) {
        return redirect('/product_list')->with('success', 'Product updated successfully');


    } else {
        return redirect('/product_list')->with('error', 'Failed to update product');
    }
}


//********************Delete Products Data*******************************

public function delete_product($id){
$show = Product::find($id);
if (!$show) {
return redirect('/product_list')->with('error', 'Product not found or already deleted.');
}
$show->delete();
return redirect('/product_list')->with('success', 'Product deleted successfully.');
}

//********************Products Status Fetch*******************************

public function product_status(Request $request, $status, $id){
$product = Product::find($id);
if (!$product) {
return redirect('/product_list')->with('error', 'Product not found.');
}
$product->status = $status;
$product->save();
return redirect('/product_list')->with('success', 'Product status updated.');
}


//********************Products atriutes Section******************************
//********************Add products atriutes view*******************************

public function products_attributes() {
    $categories = DB::table('categories')->where('status', 1)->get();
    $products = DB::table('products')->where('status', 1)->get();
    $sizes = DB::table('sizes')->where('status', 1)->get();
    $colors = DB::table('colors')->where('status', 1)->get();
    return view('adminlte.pages.product.products_attr', ['categories' => $categories ,
     'sizes' => $sizes, 'colors' => $colors,'products' => $products]);
    }

//********************Add product Attributes Data*******************************

public function products_attr(Request $request) {
    $request->validate([
        'product_id' => 'required|array',
        'mrp' => 'required|array',
        'qty' => 'required|array',
        'price' => 'required|array',
        'sku' => 'required|unique:products_attr',
        'size_id' => 'required|array',
        'color_id' => 'required|array',
        'image.*' => 'mimes:jpg,jpeg,png',
    ]);

    $product_idArr = $request->post('product_id') ?? [];
    $mrpArr = $request->post('mrp') ?? [];
    $qtyArr = $request->post('qty') ?? [];
    $priceArr = $request->post('price') ?? [];
    $skuArr = $request->post('sku') ?? [];
    $size_idArr = $request->post('size_id') ?? [];
    $color_idArr = $request->post('color_id') ?? [];

    foreach ($skuArr as $key => $value) {
        $productAttrArr = new Products_attr();
        $productAttrArr->product_id = $product_idArr[$key];
        $productAttrArr->size_id = $size_idArr[$key] ?? 0;
        $productAttrArr->color_id = $color_idArr[$key] ?? 0;
        $productAttrArr->sku = $skuArr[$key];
        $productAttrArr->price = $priceArr[$key];
        $productAttrArr->qty = $qtyArr[$key];
        $productAttrArr->mrp = $mrpArr[$key];

        if ($request->hasFile('image') && $request->file('image')[$key]->isValid()) {
            $file = $request->file('image')[$key];
            $extension = $file->getClientOriginalExtension();
            $filename = time() . '_' . $key . '.' . $extension;
            $file->move('adminlte/upload/', $filename);
            $productAttrArr->image = 'adminlte/upload/' . $filename;
        } else {
            $productAttrArr->image = '';
        }

        $productAttrArr->save();
    }

    return redirect('/products_attr_list')->with('success', 'Products Attributes Added Successfully');
}

//********************product Attributes List*******************************


public function products_attr_list() {
    $show = Products_attr::all();
    return view('adminlte.pages.product.products_attr_list' , ['show' => $show]);
    }

//********************Edit product Attributes*******************************

  public function edit_products_attr() {
    $productAttrArr = Products_attr::all();
    $products = DB::table('products')->where('status', 1)->get();
    $sizes = DB::table('sizes')->where('status', 1)->get();
    $colors = DB::table('colors')->where('status', 1)->get();
  
    return view('adminlte.pages.product.edit_products_attr', [
        'productAttrArr' => $productAttrArr,
        'sizes' => $sizes,
        'colors' => $colors,
        'products' => $products
    ]);
  }
  
  public function update_products_attr(Request $request, $id) {
      $request->validate([
          'sku' => 'required',
          'image.*' => 'mimes:jpg,jpeg,png',
      ]);
  
      $paidArr = $request->post('paid') ?? [];
      $product_idArr = $request->post('product_id') ?? [];
      $mrpArr = $request->post('mrp') ?? [];
      $qtyArr = $request->post('price') ?? [];
      $priceArr = $request->post('price') ?? [];
      $skuArr = $request->post('sku') ?? [];
      $size_idArr = $request->post('size_id') ?? [];
      $color_idArr = $request->post('color_id') ?? [];
  
      $inserted = 0;
      $updated = 0;
  
      foreach ($skuArr as $key => $value) {
         
          $existingSku = DB::table('products_attr')
              ->where('sku', $skuArr[$key])
              ->where('id', '!=', $paidArr[$key])
              ->first();
  
          if ($existingSku) {
              return redirect('/products_attr_list')->with('error', 'SKU is not unique');
          }
  
          $productAttrArr = new Products_attr();
          $productAttrArr->product_id = $product_idArr[$key];
          $productAttrArr->size_id = $size_idArr[$key] ?? 0;
          $productAttrArr->color_id = $color_idArr[$key] ?? 0;
          $productAttrArr->sku = $skuArr[$key];
          $productAttrArr->price = $priceArr[$key];
          $productAttrArr->qty = $qtyArr[$key];
          $productAttrArr->mrp = $mrpArr[$key];
  
        
          if ($request->hasFile('image') && isset($request->file('image')[$key]) 
          && $request->file('image')[$key]->isValid()) {
              $file = $request->file('image')[$key];
              $extension = $file->getClientOriginalExtension();
              $filename = time() . '_' . $key . '.' . $extension;
              $file->move('adminlte/upload/', $filename);
              $productAttrArr->image = 'adminlte/upload/' . $filename;
          } else {
              
              $existingProduct = DB::table('products_attr')
                  ->where('id', $paidArr[$key])
                  ->first();
  
              if ($existingProduct) {
                  $productAttrArr->image = $existingProduct->image;
              }
          }
  
         
          if ($paidArr[$key] != '') {
             
              $result = DB::table('products_attr')
                  ->where('id', $paidArr[$key])
                  ->update([
                      'product_id' => $productAttrArr->product_id,
                      'size_id' => $productAttrArr->size_id,
                      'color_id' => $productAttrArr->color_id,
                      'sku' => $productAttrArr->sku,
                      'price' => $productAttrArr->price,
                      'qty' => $productAttrArr->qty,
                      'mrp' => $productAttrArr->mrp,
                      'image' => $productAttrArr->image,
                  ]);
  
              if ($result) {
                  $updated++;
              }
          } else {
              
              $result = DB::table('products_attr')->insert([
                  'product_id' => $productAttrArr->product_id,
                  'size_id' => $productAttrArr->size_id,
                  'color_id' => $productAttrArr->color_id,
                  'sku' => $productAttrArr->sku,
                  'price' => $productAttrArr->price,
                  'qty' => $productAttrArr->qty,
                  'mrp' => $productAttrArr->mrp,
                  'image' => $productAttrArr->image, 
              ]);
  
              if ($result) {
                  $inserted++;
              }
          }
      }
  
     
      if ($inserted > 0 && $updated > 0) {
          $successMessage = 'Product attributes successfully inserted and updated.';
      } elseif ($inserted > 0) {
          $successMessage = 'Product attributes successfully inserted.';
      } elseif ($updated > 0) {
          $successMessage = 'Product attributes successfully updated.';
      } else {
          $successMessage = 'No changes made.';
      }
  
      return redirect('/edit_products_attr')->with('success', $successMessage);
  }
  
  
  //********************Delete Products Attributes*******************************
  
  public function delete_products_attr($id){
  $show = Products_attr::find($id);
  if (!$show) {
  return redirect('/edit_products_attr')->with('error', 'Product not found or already deleted.');
  }
  $show->delete();
  return redirect('/edit_products_attr')->with('success', 'Product deleted successfully.');
  }



  //********************Products atriutes Images Section*******************************
  //********************Add products atriutes Images view*******************************

public function product_attr_image() {
   
    $products = DB::table('products')->where('status', 1)->get();
    return view('adminlte.pages.product.product_attr_images', ['products' => $products]);
    }


  //********************Add products atriutes Images Data*******************************

  public function product_attr_images(Request $request) {
    
    $request->validate([
        'product_id' => 'required|array',
        'product_id.*' => 'exists:products,id',
        'image.*' => 'required|image|mimes:jpg,jpeg,png|max:2048',
    ]);

    $productIds = $request->input('product_id', []);
    $images = $request->file('image', []);

    
    foreach ($productIds as $key => $productId) {
       
        $productAttrArr = new Product_images();

       
        $productAttrArr->product_id = $productId;

      
        if (isset($images[$key]) && $images[$key]->isValid()) {
            $file = $images[$key];

           
            $filename = time() . '_' . $key . '.' . $file->getClientOriginalExtension();
            $file->move('adminlte/upload/', $filename);

            $productAttrArr->image = 'adminlte/upload/' . $filename;
        }
        $productAttrArr->save();
    }

    return redirect('/edit_product_attr_images')->with('success', 'Products Attributes Added Successfully');
}


//********************Edit product Attributes Images*******************************

public function edit_product_attr_images() {
    $productAttrArr = Product_images::all();
    $products = DB::table('products')->where('status', 1)->get();
  
    return view('adminlte.pages.product.edit_product_attr_images', [
        'productAttrArr' => $productAttrArr,
        'products' => $products
    ]);
  }

//********************Update product Attributes Images*******************************

public function update_product_attr_images(Request $request, $id)
{

    $request->validate([
        'product_id.*' => 'required',
        'image.*' => 'mimes:jpg,jpeg,png',
    ]);

    $piidArr = $request->post('piid') ?? [];
    $product_idArr = $request->post('product_id') ?? [];

    $inserted = 0;
    $updated = 0;

    foreach ($piidArr as $key => $value) {

        $productAttrArr = new Product_images();
        $productAttrArr->product_id = $product_idArr[$key];

        if ($request->hasFile('image') && isset($request->file('image')[$key]) && $request->file('image')[$key]->isValid()) {
            $file = $request->file('image')[$key];
            $extension = $file->getClientOriginalExtension();
            $filename = time() . '_' . $key . '.' . $extension;
            $file->move('adminlte/upload/', $filename);
            $productAttrArr->image = 'adminlte/upload/' . $filename;
        } else {

            $existingProduct = DB::table('product_images')
                ->where('id', $piidArr[$key])
                ->first();

            if ($existingProduct) {
                $productAttrArr->image = $existingProduct->image;
            }
        }

        if ($piidArr[$key] != '') {

            $result = DB::table('product_images')
                ->where('id', $piidArr[$key])
                ->update([
                    'product_id' => $productAttrArr->product_id,
                    'image' => $productAttrArr->image,
                ]);

            if ($result) {
                $updated++;
            }
        } else {

            $result = DB::table('product_images')->insert([
                'product_id' => $productAttrArr->product_id,
                'image' => $productAttrArr->image,
            ]);

            if ($result) {
                $inserted++;
            }
        }
    }

    if ($inserted > 0 && $updated > 0) {
        $successMessage = 'Product attributes successfully inserted and updated.';
    } elseif ($inserted > 0) {
        $successMessage = 'Product attributes successfully inserted.';
    } elseif ($updated > 0) {
        $successMessage = 'Product attributes successfully updated.';
    } else {
        $successMessage = 'No changes made.';
    }

    return redirect('/edit_product_attr_images')->with('success', $successMessage);
}

//********************Delete Products Attributes Images*******************************
  
  public function delete_product_attr_images($id){
  $show = Product_images::find($id);
  if (!$show) {
  return redirect('/edit_product_attr_images')->with('error', 'Product Image not found or already deleted.');
  }
  $show->delete();
  return redirect('/edit_product_attr_images')->with('success', 'Product Image deleted successfully.');
  }


}
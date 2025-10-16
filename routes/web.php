<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\Adminlte;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\HomeBannerController;
use App\Http\Controllers\Admin\CouponController;
use App\Http\Controllers\Admin\SizeController;
use App\Http\Controllers\Admin\ColorController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\BrandController;
use App\Http\Controllers\Admin\TaxController;
use App\Http\Controllers\Admin\CustomerController;
use App\Http\Controllers\Admin\OrderController;

use App\Http\Controllers\Front\FrontController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
// Route::get('/', function () {
//         return view('welcome');
//      });

// ************************Front-End Controller******************************

Route::get('/', [FrontController::class, 'index'])->name('index');
Route::get('product/{id}', [FrontController::class, 'product'])->name('product');
Route::get('category/{id}',[FrontController::class,'category']);
Route::post('add_to_cart',[FrontController::class,'add_to_cart']);
Route::get('cart',[FrontController::class,'cart']);
Route::get('search/{str}',[FrontController::class,'search']);
Route::get('registration',[FrontController::class,'registration']);
Route::post('registration_process',[FrontController::class,'registration_process'])->name('registration.registration_process');

Route::post('login_process',[FrontController::class,'login_process'])->name('login.login_process');
Route::get('front_end_logout',[FrontController::class,'front_end_logout'])->name('front_end_logout');

Route::get('/verification/{id}',[FrontController::class,'email_verification']);
Route::post('forgot_password',[FrontController::class,'forgot_password']);
Route::get('/forgot_password_change/{id}',[FrontController::class,'forgot_password_change']);
Route::post('forgot_password_change_process',[FrontController::class,'forgot_password_change_process']);
Route::get('/checkout',[FrontController::class,'checkout']);
Route::post('apply_coupon_code',[FrontController::class,'apply_coupon_code']);
Route::post('remove_coupon_code',[FrontController::class,'remove_coupon_code']);
Route::post('place_order',[FrontController::class,'place_order']);
Route::get('/order_placed',[FrontController::class,'order_placed']);
Route::get('/order_fail',[FrontController::class,'order_fail']);
Route::get('/instamojo_payment_redirect',[FrontController::class,'instamojo_payment_redirect']);

Route::post('product_review_process',[FrontController::class,'product_review_process']);

// Route::group(['middleware'=>'disable_back_btn'],function(){
//     Route::group(['middleware'=>'user_auth'],function(){
        Route::get('/order',[FrontController::class,'order']);
        Route::get('/order_detail/{id}',[FrontController::class,'order_detail']);
//     });
// });


// ************************Admin Site Controllers******************************

// ***************************Adminlte Registration*****************/
Route::get('/register', [Adminlte::class, 'register'])->name('register');
Route::post('/store_register_info', [Adminlte::class, 'store_register_info']);
// ***************************Adminlte Login***********************/
Route::get('/login', [Adminlte::class, 'login'])->name('login');
Route::post('/store_login_info', [Adminlte::class, 'store_login_info']);
// ***************************Adminlte Logout***********************/
Route::get('/logout', [Adminlte::class, 'logout'])->name('logout');
// *************************Password recovery*******************************/
Route::get('/recov_pass', [Adminlte::class, 'recov_pass']);
// ***************************Adminlte Dashboard*******************/
Route::get('admin_2', [Adminlte::class, 'index'])->name('admin_2');

// *************************Category*******************************/
Route::get('/add_cat', [CategoryController::class, 'add_cat']);
Route::post('/add_cat', [CategoryController::class, 'add_category']);
Route::get('/cat_list', [CategoryController::class, 'cat_list']);
Route::get('/edit_cat/{id}', [CategoryController::class, 'edit_category']);
Route::put('/edit_cat/update_cat/{id}', [CategoryController::class, 'update_category'])->name('update_category');
Route::get('/delete_cat/{id}', [CategoryController::class, 'delete_category']);
Route::put('/add_cat/status/{status}/{id}', [CategoryController::class, 'category_status'])->name('category_status');

// *************************Banner*******************************/
Route::get('/add_home_banner', [HomeBannerController::class, 'add_home_banners']);
Route::post('/add_home_banner', [HomeBannerController::class, 'add_home_banner']);
Route::get('/home_banner_list', [HomeBannerController::class, 'home_banner_list']);
Route::get('/edit_home_banner/{id}', [HomeBannerController::class, 'edit_home_banner']);
Route::put('/edit_home_banner/update_home_banner/{id}', [HomeBannerController::class, 'update_home_banner'])->name('update_home_banner');
Route::get('/delete_home_banner/{id}', [HomeBannerController::class, 'delete_home_banner']);
Route::put('/add_home_banner/status/{status}/{id}', [HomeBannerController::class, 'home_banner_status'])->name('home_banner_status');

// *************************Coupon*******************************/
Route::get('/add_coupon', [CouponController::class, 'add_coupons']);
Route::post('/add_coupon', [CouponController::class, 'add_coupon']);
Route::get('/coupon_list', [CouponController::class, 'coupon_list']);
Route::get('/edit_coupon/{id}', [CouponController::class, 'edit_coupon']);
Route::put('/edit_coupon/update_coupon/{id}', [CouponController::class, 'update_coupon']);
Route::get('/delete_coupon/{id}', [CouponController::class, 'delete_coupon']);
Route::put('/add_coupon/status/{status}/{id}', [CouponController::class, 'coupon_status'])->name('coupon_status');

// *************************Size*******************************/
Route::get('/add_size', [SizeController::class, 'add_sizes']);
Route::post('/add_size', [SizeController::class, 'add_size']);
Route::get('/size_list', [SizeController::class, 'size_list']);
Route::get('/edit_size/{id}', [SizeController::class, 'edit_size']);
Route::put('/edit_size/update_size/{id}', [SizeController::class, 'update_size']);
Route::get('/delete_size/{id}', [SizeController::class, 'delete_size']);
Route::put('/add_size/status/{status}/{id}', [SizeController::class, 'size_status'])->name('size_status');

// *************************Color*******************************/
Route::get('/add_color', [ColorController::class, 'add_colors']);
Route::post('/add_color', [ColorController::class, 'add_color']);
Route::get('/color_list', [ColorController::class, 'color_list']);
Route::get('/edit_color/{id}', [ColorController::class, 'edit_color']);
Route::put('/edit_color/update_color/{id}', [ColorController::class, 'update_color']);
Route::get('/delete_color/{id}', [ColorController::class, 'delete_color']);
Route::put('/add_color/status/{status}/{id}', [ColorController::class, 'color_status'])->name('color_status');
// *************************Product*******************************/
Route::get('/add_product', [ProductController::class, 'add_products']);
Route::post('/add_product', [ProductController::class, 'add_product']);
Route::get('/product_list', [ProductController::class, 'product_list'])->name('product_list');
Route::get('/edit_product/{id}', [ProductController::class, 'edit_product']);
Route::put('/edit_product/update_product/{id}', [ProductController::class, 'update_product'])->name('update_product');
Route::get('/delete_product/{id}', [ProductController::class, 'delete_product']);
Route::put('/add_product/status/{status}/{id}', [ProductController::class, 'product_status'])->name('product_status');

// *************************Products attr*******************************/
Route::get('/products_attributes', [ProductController::class, 'products_attributes'])->name('products_attributes');
Route::post('/products_attributes', [ProductController::class, 'products_attr']);

// *************************Edit Products attr*******************************/
Route::get('/products_attr_list', [ProductController::class, 'products_attr_list'])->name('products_attr_list');
Route::get('/edit_products_attr', [ProductController::class, 'edit_products_attr'])->name('edit_products_attr');
Route::put('/edit_products_attr/update_products_attr/{id}', [ProductController::class, 'update_products_attr'])->name('update_products_attr');
Route::get('/delete_products_attr/{id}', [ProductController::class, 'delete_products_attr']);

// *************************Products attr Images*******************************/
Route::get('/product_attr_images', [ProductController::class, 'product_attr_image'])->name('product_attr_image');
Route::post('/product_attr_images', [ProductController::class, 'product_attr_images']);
Route::get('/edit_product_attr_images', [ProductController::class, 'edit_product_attr_images'])->name('edit_product_attr_images');
Route::put('/edit_product_attr_images/update_product_attr_images/{id}', [ProductController::class, 'update_product_attr_images'])->name('update_product_attr_images');
Route::get('/delete_product_attr_images/{id}', [ProductController::class, 'delete_product_attr_images']);

// *************************Brand*******************************/
Route::get('/add_brand', [BrandController::class, 'add_brands']);
Route::post('/add_brand', [BrandController::class, 'add_brand']);
Route::get('/brand_list', [BrandController::class, 'brand_list']);
Route::get('/edit_brand/{id}', [BrandController::class, 'edit_brand']);
Route::put('/edit_brand/update_brand/{id}', [BrandController::class, 'update_brand']);
Route::get('/delete_brand/{id}', [BrandController::class, 'delete_brand']);
Route::put('/add_brand/status/{status}/{id}', [BrandController::class, 'brand_status'])->name('brand_status');

// *************************Tax*******************************/
Route::get('/add_tax', [TaxController::class, 'add_taxs']);
Route::post('/add_tax', [TaxController::class, 'add_tax']);
Route::get('/tax_list', [TaxController::class, 'tax_list']);
Route::get('/edit_tax/{id}', [TaxController::class, 'edit_tax']);
Route::put('/edit_tax/update_tax/{id}', [TaxController::class, 'update_tax']);
Route::get('/delete_tax/{id}', [TaxController::class, 'delete_tax']);
Route::put('/add_tax/status/{status}/{id}', [TaxController::class, 'tax_status'])->name('tax_status');

// *************************Customer*******************************/
Route::get('/customer_list', [CustomerController::class, 'customer_list']);
Route::get('/show_customer/{id}', [CustomerController::class, 'show_customer']);
Route::put('/add_customer/status/{status}/{id}', [CustomerController::class, 'customer_status'])->name('customer_status');

Route::get('admin_order',[OrderController::class,'index']);
Route::get('admin_order_detail/{id}',[OrderController::class,'order_detail']);

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
               <h1>coupon</h1>
            </div>
            <div class="col-sm-6">
               <ol class="breadcrumb float-sm-right">
                  <li class="breadcrumb-item"><a href="/admin_2">Home</a></li>
                  <li class="breadcrumb-item active">Add coupon</li>
               </ol>
            </div>
         </div>
      </div>
      <!-- /.container-fluid -->
   </section>
   <button class="btn btn-success" style="margin-left: 15px; margin-bottom: 20px;">
   <a href="/coupon_list" class="text-decoration-none text-white">coupon List</a>
   </button>
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
                  <form action="/add_coupon" method="post">
                     @csrf
                     <div class="card-body">
                        <div class="row">
                           <div class="col-md-6">
                              <div class="form-group">
                                 <label for="coupon_title">Coupon Title</label>
                                 <input type="text" name="title" class="form-control" id="coupon_title" placeholder="Please enter coupon title...">
                                 @error('title')
                                 <div class="text-danger">{{ $message }}</div>
                                 @enderror
                              </div>
                           </div>
                           <div class="col-md-6">
                              <div class="form-group">
                                 <label for="coupon_code">Coupon Code</label>
                                 <input type="text" name="code" class="form-control" id="coupon_code" placeholder="Please enter coupon code...">
                                 @error('code')
                                 <div class="text-danger">{{ $message }}</div>
                                 @enderror
                              </div>
                           </div>
                        </div>
                        <div class="row">
                           <div class="col-md-6">
                              <div class="form-group">
                                 <label for="coupon_value">Coupon Value</label>
                                 <input type="text" name="value" class="form-control" id="coupon_value" placeholder="Please enter coupon value...">
                                 @error('value')
                                 <div class="text-danger">{{ $message }}</div>
                                 @enderror
                              </div>
                           </div>
                           <div class="col-md-6">
                              <div class="form-group">
                                 <label for="type" class="form-label">Type</label>
                                 <select id="inputState" name="type" class="form-control">
                                    <option value="Value">Value</option>
                                    <option value="Per">Percentage</option>
                                 </select>
                              </div>
                           </div>
                        </div>
                        <div class="row">
                           <div class="col-md-6">
                              <div class="form-group">
                                 <label for="min_order_amt">Min Order Amt</label>
                                 <input type="number" name="min_order_amt" class="form-control" id="min_order_amt" placeholder="Please enter Min Order Amt...">
                                 @error('min_order_amt')
                                 <div class="text-danger">{{ $message }}</div>
                                 @enderror
                              </div>
                           </div>
                           <div class="col-md-6">
                              <div class="form-group">
                                 <label for="is_one_time" class="form-label">Is One Time</label>
                                 <select id="inputState" name="is_one_time" class="form-control">
                                    <option value="1">Yes</option>
                                    <option value="0">No</option>
                                 </select>
                              </div>
                           </div>
                        </div>
                     </div>
                     <div class="card-footer">
                        <button type="submit" class="btn btn-info btn-block">ADD COUPON</button>
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
<!-- resources/views/customers/edit.blade.php -->

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
                    <h1>Customer Deatils</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="/admin_2">Home</a></li>
                        <li class="breadcrumb-item active">Customer</li>
                    </ol>
                </div>
            </div>
        </div>
        <!-- /.container-fluid -->
    </section>
    <button class="btn btn-success" style="margin-left: 15px; margin-bottom: 20px;">
        <a href="/customer_list" class="text-decoration-none text-white">Customer Deatils List</a>
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
                        <form action="" method="post">
                            @method('PUT')
                            @csrf
                            <div class="card-body">
                                <div class="row">
                                    <!-- Column 1 -->
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="name">Name:</label>
                                            <input type="text" class="form-control" id="name" name="name" value="{{ $customer->name }}">
                                        </div>

                                        <div class="form-group">
                                            <label for="email">Email:</label>
                                            <input type="email" class="form-control" id="email" name="email" value="{{ $customer->email }}">
                                        </div>

                                        <div class="form-group">
                                            <label for="mobile">Mobile:</label>
                                            <input type="text" class="form-control" id="mobile" name="mobile" value="{{ $customer->mobile }}">
                                        </div>

                                        <div class="form-group">
                                            <label for="password">Password:</label>
                                            <input type="text" class="form-control" id="password" name="password" value="{{ $customer->password }}">
                                        </div>
                                    </div>

                                    <!-- Column 2 -->
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="address">Address:</label>
                                            <input type="text" class="form-control" id="address" name="address" value="{{ $customer->address }}">
                                        </div>

                                        <div class="form-group">
                                            <label for="city">City:</label>
                                            <input type="text" class="form-control" id="city" name="city" value="{{ $customer->city }}">
                                        </div>

                                        <div class="form-group">
                                            <label for="state">State:</label>
                                            <input type="text" class="form-control" id="state" name="state" value="{{ $customer->state }}">
                                        </div>

                                        <div class="form-group">
                                            <label for="zip">ZIP:</label>
                                            <input type="text" class="form-control" id="zip" name="zip" value="{{ $customer->zip }}">
                                        </div>
                                    </div>

                                    <!-- Column 3 -->
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="company">Company:</label>
                                            <input type="text" class="form-control" id="company" name="company" value="{{ $customer->company }}">
                                        </div>

                                        <div class="form-group">
                                            <label for="gstin">GSTIN:</label>
                                            <input type="text" class="form-control" id="gstin" name="gstin" value="{{ $customer->gstin }}">
                                        </div>

                                        <div class="form-group">
                                            <label for="created_at">Created On:</label>
                                           <input type="text" class="form-control" id="created_at" name="created_at" value="{{ $customer->created_at }}">
                                        </div>

                                          <div class="form-group">
                                            <label for="updated_at">Updated On:</label>
                                           <input type="text" class="form-control" id="updated_at" name="updated_at" value="{{ $customer->updated_at }}">
                                        </div>
                                    </div>
                                </div>
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

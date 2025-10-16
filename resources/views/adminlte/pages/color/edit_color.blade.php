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
                    <h1>Edit color</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="/admin_2">Home</a></li>
                        <li class="breadcrumb-item active">Edit color</li>
                    </ol>
                </div>
            </div>
        </div>
        <!-- /.container-fluid -->
    </section>
    <button class="btn btn-success" style="margin-left: 15px;
    margin-bottom: 20px;"><a href="/color_list" class="text-decoration-none text-white">color List</a></button>


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
                       <form action="update_color/{{$show['id']}}" method="post">
@method('PUT')
    @csrf
    <div class="card-body">
        <div class="form-group">
            <label for="color_title">color title</label>
            <input type="text" name="color" class="form-control" id="color" value="{{$show['color']}}">
            @error('color')
    <div class="text-danger">{{ $message }}</div>
@enderror
        </div>
    </div>
    <div class="card-footer">
        <button type="submit" class="btn btn-info btn-block">UPDATE</button>
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

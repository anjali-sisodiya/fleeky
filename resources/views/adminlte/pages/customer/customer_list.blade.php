@include('adminlte/partials/header') 
@include('adminlte/partials/nav')
@include('adminlte/partials/sidebar')

<div class="wrapper">
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>customer List</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="/admin_2">Home</a></li>
              <li class="breadcrumb-item active">customer List</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
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
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-md-6">
          
          </div>
        
        </div>
        <!-- /.row -->
        <div class="row">
          <div class="col-12">
            <div class="card">
              <div class="card-header">
                <div class="card-tools">
                  <div class="input-group input-group-sm" style="width: 150px;">
                    <input type="text" name="table_search" class="form-control float-right" placeholder="Search">

                    <div class="input-group-append">
                      <button type="submit" class="btn btn-default">
                        <i class="fas fa-search"></i>
                      </button>
                    </div>
                  </div>
                </div>
              </div>
              <!-- /.card-header -->
              <div class="card-body table-responsive p-0">
                <table class="table table-hover text-nowrap table-bordered text-center">
                  <thead>
                    <tr>
                      <th>ID</th>
                      <th>Customer name</th>
                      <th>Email</th>
                      <th>Mobile no.</th>
                      <th>Status</th>
                      <th>Action</th>
                    </tr>
                  </thead>
                  <tbody>
    @foreach($show as $member)

                    <tr>
                      <td>{{ $member->id }}</td>
                      <td>{{ $member->name }}</td>
                      <td>{{ $member->email }}</td>
                      <td>{{ $member->mobile }}</td>
                      <td>
    @if($member->status == 1)
        <form method="POST" action="{{ route('customer_status', ['status' => 0, 'id' => $member->id]) }}">
            @csrf
            @method('PUT')
            <button type="submit" class="btn ms-1 reduced-font btn-success btn-sm text-white">Active</button>
        </form>
    @elseif($member->status == 0)
        <form method="POST" action="{{ route('customer_status', ['status' => 1, 'id' => $member->id]) }}">
            @csrf
            @method('PUT')
            <button type="submit" class="btn ms-1 reduced-font btn-warning btn-sm text-dark">Deactivate</button>
        </form>
    @endif
</td>
                      <td> 
                          <a class="text-decoration-none text-white" href="show_customer/{{ $member->id }}">
                                <button type="button" class="btn reduced-font btn-primary btn-sm text-white">View
                                        <i class="fa-solid fa-eye reduced-font ms-1"></i>
                                </button>
                          </a>

                      </td>
                    </tr>
    @endforeach

                  </tbody>
                </table>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
        </div>
      
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
@include('adminlte/partials/footer')
 
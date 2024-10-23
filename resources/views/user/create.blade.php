@extends('layout.app')
@section('page-title', $data['page_title'])
@section('main-content')
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">{{ $data['page_title'] }}</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">{{ $data['menu'] }}</a></li>
              <li class="breadcrumb-item active">{{ $data['page_title'] }}</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
            <div class="card card-primary card-outline">
              <div class="card-header">
                <div class="card-title"><i class="fa fa-user-plus"></i> {{ $data['page_title'] }}</div>
              </div>
              <div class="card-body">
                <form action="{{ route('user.store') }}" id="create-user-form" enctype="multipart/form-data">
                  <div class="row">
                    <div class="col-md-6">
                      <div class="form-group">
                        <label>Name <span class="error">*</span></label>
                        <input type="text" name="name" id="name" class="form-control" placeholder="Enter Name">
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="form-group">
                        <label>User Name <span class="error">*</span></label>
                        <input type="text" name="username" id="username" class="form-control" placeholder="Enter Username">
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="form-group">
                        <label>Email <span class="error">*</span></label>
                        <input type="email" name="email" id="email" class="form-control" placeholder="Enter Email">
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="form-group">
                        <label>Password <span class="error">*</span></label>
                        <input type="password" name="password" id="password" class="form-control" placeholder="Enter Password">
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="form-group">
                        <label>Phone No</label>
                        <input type="text" name="phone_no" id="phone-no" class="form-control" placeholder="Enter Phone No">
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="form-group">
                        <label>Designation</label>
                        <input type="text" name="designation" id="designation" class="form-control" placeholder="Enter Designation">
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="form-group">
                        <label>User Image</label>
                        <input type="file" name="image" id="image" class="form-control">
                      </div>
                    </div>
                  </div>
                </form>
              </div>
              <!-- /.card-body -->
              <div class="card-footer">
                <button class="btn btn-success" id="btn-save-user">Save</button>
                <a class="btn btn-danger" href="{{ route('user.index') }}">Back</a>
              </div>
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
      </div>
      <!-- /.container-fluid -->
    </section>
  </div>
@endsection
@section('scripts')
<script src="{{ url('/assets/js/user.js') }}"></script>
@endsection

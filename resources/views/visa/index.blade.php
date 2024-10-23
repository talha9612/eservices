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
                <div class="card-title"><i class="fa fa-users"></i> {{ $data['page_title'] }}</div>
                <div class="card-tools">
                  <a href="{{ route('visa.create') }}" class="btn btn-sm btn-info"> <i class="fa fa-plus"></i> Create Visa</a>
                </div>
              </div>
              <div class="card-body">
                <div class="table-responsive">
                  <table id="visa-table" class="table table-bordered table-hover datatable">
                    <thead>
                      <tr>
                        <th>Visa No.</th>
                        <th>Date of Issue</th>
                        <th>Created At</th>
                        <th>Visa Status</th>
                        <th>Action</th>
                      </tr>
                    </thead>
                    <tbody>
                      @foreach($data['visas'] as $visa)
                        <tr>
                          <td>{{ $visa->visa_no }}</td>
                          <td>{{ date('d/m/Y', strtotime($visa->date_of_issue)) }}</td>
                          <td>{{ date('d/m/Y', strtotime($visa->created_at)) }}</td>
                          <td>
                            @if($visa->is_active)
                              <button data-url="{{ route('visa.update.status', $visa->id) }}" class="btn btn-sm btn-success btn-update-status">Active</button>
                            @else
                              <button data-url="{{ route('visa.update.status', $visa->id) }}" class="btn btn-sm btn-danger btn-update-status">Deactive</button>
                            @endif
                          </td>
                          <td>
                            <a href="{{ route('visa.edit', $visa->id) }}" class="btn btn-sm btn-primary"><i class="fa fa-edit"></i> Edit</a>
                            <a href="{{ route('visa.show', $visa->id) }}" target="_blank" class="btn btn-sm btn-success"><i class="fa fa-download"></i> Open And Download</a>
                            <button class="btn btn-sm btn-danger btn-destroy-visa" data-url="{{ route('visa.destroy', $visa->id) }}"><i class="fa fa-trash"></i> Delete</button>
                          </td>
                        </tr>
                      @endforeach
                    </tbody>
                  </table>
                </div>
              </div>
              <!-- /.card-body -->
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
<script src="{{ url('/assets/js/visa.js') }}"></script>
@endsection

@extends('backend.admin-master')

@section('site-title')
    {{ __('Add Visitor Counter') }}
@endsection

@push('css')
@endpush

@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="margin-top-40"></div>
                        <x-error-msg />
                        <x-flash-msg />
                    </div>
                    <div class="col-md-8 offset-md-2">
                        <!-- Horizontal Form -->
                        <div class="card card-info">
                            <div class="card-header bg-dark text-white">
                                <h3 class="card-title mb-0">{{ __('Add New Visitors') }}</h3>
                            </div>
                            <!-- /.card-header -->

                            <!-- form start -->
                            <form action="{{ route('admin.visitor.store') }}" method="POST"
                                enctype="multipart/form-data" class="form-horizontal">
                                @csrf
                                <div class="card-body">
                                    <div class="form-group row">
                                        <label for="inputVisitor">{{ __('Total Number of Visitors') }}</label>
                                        <input type="text" class="form-control" id="count" name="count" value="{{ old('count') }}" placeholder="{{ __('Enter Number of Visitors') }}" autocomplete="off">
                                    </div>
                                </div>
                                <!-- /.card-body -->
                                <div class="card-footer bg-dark">
                                    <button type="submit" class="btn btn-info">{{ __('Add Visitors') }}</button>
                                    {{-- <a href="#" class="btn btn-warning">{{ __('Back') }}</a> --}}
                                </div>
                                <!-- /.card-footer -->
                            </form>
                        </div>
                        <!-- /.card -->
                    </div>
                </div>
                <!-- /.row -->
            </div><!-- /.container-fluid -->
        </section>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->
@endsection

@push('js')
@endpush

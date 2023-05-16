@extends('backend.admin-master')

@section('site-title')
    {{ __('Edit Visitor Counter') }}
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
                                <h3 class="card-title mb-0">{{ __('Edit Visitor Counter') }}</h3>
                            </div>
                            <!-- /.card-header -->

                            <!-- form start -->
                            <form action="{{ route('admin.visitor.update', $visitor->id) }}" method="POST"
                                enctype="multipart/form-data" class="form-horizontal">
                                @csrf
                                <div class="card-body">
                                    <div class="form-group row">
                                        <label for="visitor" hidden>{{ __('Total Number of Visitors') }}</label>
                                        <input type="number" class="form-control" id="totalcount" name="totalcount" value="{{ $visitor->visitors_count }}" placeholder="{{ __('Enter Number of Visitors') }}" autocomplete="off" hidden>
                                    </div>

                                    <div class="form-group row">
                                        <label for="inputVisitor">{{ __('Total Number of Visitors') }}</label>
                                        <input type="number" class="form-control" id="count" name="count" value="{{ $visitor->visitors_count }}" placeholder="{{ __('Enter Number of Visitors') }}" autocomplete="off">
                                    </div>
                                </div>
                                <!-- /.card-body -->
                                <div class="card-footer bg-dark">
                                    <button type="submit" class="btn btn-info">{{ __('Update Visitors') }}</button>
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

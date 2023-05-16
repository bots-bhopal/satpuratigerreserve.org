@extends('backend.admin-master')

@section('style')
    <link rel="stylesheet" href="{{ asset('assets/backend/css/bootstrap-tagsinput.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/backend/css/summernote-bs4.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/backend/css/dropzone.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/backend/css/media-uploader.css') }}">
@endsection

@section('site-title')
    {{ __('Add Tender') }}
@endsection

@push('css')
    <style>
        .website-url {
            display: none;
        }
    </style>
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

                    <!-- column -->
                    <div class="col-lg-8 offset-lg-2">
                        <!-- form -->
                        <form action="{{ route('admin.tender.update', $tender->id) }}" method="POST"
                            enctype="multipart/form-data">
                            @csrf
                            <div class="card mb-5">
                                <div class="card-body">
                                    <div class="form-group">
                                        <label for="language"><strong>{{ __('Language') }}</strong></label>
                                        <select name="lang" id="language" class="form-control">
                                            @foreach ($all_languages as $lang)
                                                <option @if ($lang->slug == $tender->lang) selected @endif
                                                    value="{{ $lang->slug }}">{{ $lang->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>

                                    <div class="form-group">
                                        <label for="title">{{ __('Title') }}</label>
                                        <input type="text" class="form-control" id="title" name="title"
                                            value="{{ $tender->title }}" placeholder="Enter Tender Title"
                                            autocomplete="off">
                                    </div>

                                    <div class="form-group">
                                        <label for="description">{{ __('Description') }}</label>
                                        <input type="hidden" name="description" value="{!! $tender->description !!}">
                                        <div class="summernote">{!! $tender->description !!}</div>
                                    </div>

                                    <div class="form-group">
                                        <label for="date">{{ __('Select Tender Last Date') }}</label>
                                        <input type="datetime-local" class="form-control" id="date" name="date"
                                            value="{{ date('Y-m-d\TH:i', strtotime($tender->last_date)) }}">
                                    </div>

                                    <div class="form-group">
                                        <label for="status">{{ __('Status') }}</label>
                                        <select name="status" id="status" class="form-control">
                                            <option @if ($tender->status == 'publish') selected @endif value="publish">
                                                {{ __('Publish') }}</option>
                                            <option @if ($tender->status == 'draft') selected @endif value="draft">
                                                {{ __('Draft') }}</option>
                                        </select>
                                    </div>

                                    <div class="form-group">
                                        <label for="docs">{{ __('Current Tender File') }}</label>
                                        <div class="row">
                                            <div class="col-lg-12">
                                                @if ($tender->file_extension)
                                                    @if ($tender->file_extension == 'doc' || $tender->file_extension == 'docx')
                                                        <img src="{{ asset('assets/frontend/img/word.png') }}"
                                                            width="32" height="32" class="img-responsive rounded"
                                                            alt="doc-image">
                                                        <span
                                                            style="font-weight: 600; position: relative; top: 4px;">{{ $tender->original_filename }}</span>
                                                    @endif

                                                    @if ($tender->file_extension == 'xls' || $tender->file_extension == 'xlsx')
                                                        <img src="{{ asset('assets/frontend/img/excel.png') }}"
                                                            width="32" height="32" class="img-responsive rounded"
                                                            alt="doc-image">
                                                        <span
                                                            style="font-weight: 600; position: relative; top: 4px;">{{ $tender->original_filename }}</span>
                                                    @endif

                                                    @if ($tender->file_extension == 'pdf')
                                                        <img src="{{ asset('assets/frontend/img/pdf.png') }}"
                                                            width="32" height="32" class="img-responsive rounded"
                                                            alt="doc-image">
                                                        <span
                                                            style="font-weight: 600; position: relative; top: 4px;">{{ $tender->original_filename }}</span>
                                                    @endif
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- /.card-body -->

                                <div class="card-footer">
                                    <button type="submit" class="btn btn-primary"><i class="nav-icon fas fa-save"
                                            style="margin-right: 5px;"></i>{{ __('Submit') }}</button>
                                </div>
                                <!-- /.card-footer -->
                            </div><!-- /.card -->
                        </form>
                        <!-- /.form-->
                    </div>
                    <!--/.col -->
                </div>
                <!-- /.row -->
            </div><!-- /.container-fluid -->
        </section>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->
@endsection

@section('script')
    <script src="{{ asset('assets/backend/js/summernote-bs4.js') }}"></script>
    <script src="{{ asset('assets/backend/js/bootstrap-tagsinput.js') }}"></script>
    <script>
        $(document).ready(function() {
            $('.summernote').summernote({
                height: 400, //set editable area's height
                codemirror: { // codemirror options
                    theme: 'monokai'
                },
                callbacks: {
                    onChange: function(contents, $editable) {
                        $(this).prev('input').val(contents);
                    }
                }
            });
            if ($('.summernote').length > 1) {
                $('.summernote').each(function(index, value) {
                    $(this).summernote('code', $(this).data('content'));
                });
            }
        });
    </script>
    <script src="{{ asset('assets/backend/js/dropzone.js') }}"></script>
    @include('backend.partials.media-upload.media-js')
@endsection

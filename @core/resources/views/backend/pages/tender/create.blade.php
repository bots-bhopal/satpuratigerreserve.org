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
                        <form action="{{ route('admin.tender.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="card mb-5">
                                <div class="card-body">
                                    <div class="form-group">
                                        <label for="language"><strong>{{ __('Language') }}</strong></label>
                                        <select name="lang" id="language" class="form-control">
                                            <option value="">{{ __('Select Language') }}</option>
                                            @foreach ($all_languages as $lang)
                                                <option value="{{ $lang->slug }}">{{ $lang->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>

                                    <div class="form-group">
                                        <label for="title">{{ __('Title') }}</label>
                                        <input type="text" class="form-control" id="title" name="title"
                                            value="{{ old('title') }}" placeholder="Enter Tender Title"
                                            autocomplete="off">
                                    </div>

                                    <div class="form-group">
                                        <label for="slug">{{ __('Slug') }}</label>
                                        <input type="text" class="form-control" id="slug" name="slug"
                                            placeholder="{{ __('Slug') }}">
                                    </div>

                                    <div class="form-group">
                                        <label for="description">{{ __('Description') }}</label>
                                        <input type="hidden" name="description">
                                        <div class="summernote"></div>
                                    </div>

                                    <div class="form-group">
                                        <label for="date">{{ __('Select Tender Last Date') }}</label>
                                        <input type="datetime-local" class="form-control" id="date" name="date"
                                            value="{{ old('date') }}">
                                    </div>

                                    <div class="form-group">
                                        <label for="status">{{ __('Status') }}</label>
                                        <select name="status" id="status" class="form-control">
                                            <option value="publish">{{ __('Publish') }}</option>
                                            <option value="draft">{{ __('Draft') }}</option>
                                        </select>
                                    </div>

                                    <div class="file-group">
                                        <div class="form-group">
                                            <label>Choose File</label>
                                            <input type="file" class="form-control-file col-12 pl-0" name="file">
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
    <script>
        $('#title').keyup(function(e) {
            $.get('{{ route('slug.check') }}', {
                    'title': $(this).val()
                },
                function(data) {
                    $('#slug').val(data.slug);
                }
            );
        });
    </script>
    <script src="{{ asset('assets/backend/js/summernote-bs4.js') }}"></script>
    <script src="{{ asset('assets/backend/js/bootstrap-tagsinput.js') }}"></script>
    {{-- <x-backend.auto-slug-js :url="route('admin.tender.slug.check')" :type="'new'" /> --}}
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

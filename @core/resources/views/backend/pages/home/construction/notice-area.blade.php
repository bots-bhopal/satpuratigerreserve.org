@extends('backend.admin-master')
@section('site-title')
    {{ __('Notice Area Settings') }}
@endsection
@section('style')
    <link rel="stylesheet" href="{{asset('assets/backend/css/summernote-bs4.css')}}">
@endsection
@section('content')
    <div class="col-lg-12 col-ml-12 padding-bottom-30">
        <div class="row">
            <div class="col-lg-12">
                <div class="margin-top-40"></div>
                <x-flash-msg />
                <x-error-msg />
            </div>
            <div class="col-lg-12 mt-5">
                <div class="card">
                    <div class="card-body">
                        <h4 class="header-title">{{ __('Notice Area Settings') }}</h4>
                        <form action="{{ route('admin.home09.notice.area') }}" method="post" enctype="multipart/form-data">
                            @csrf
                            <nav>
                                <div class="nav nav-tabs" id="nav-tab" role="tablist">
                                    @foreach ($all_languages as $key => $lang)
                                        <a class="nav-item nav-link @if ($key == 0) active @endif"
                                            data-toggle="tab" href="#nav-home-{{ $lang->slug }}" role="tab"
                                            aria-selected="true">{{ $lang->name }}</a>
                                    @endforeach
                                </div>
                            </nav>
                            <div class="tab-content margin-top-30" id="nav-tabContent">
                                @foreach ($all_languages as $key => $lang)
                                    <div class="tab-pane fade @if ($key == 0) show active @endif"
                                        id="nav-home-{{ $lang->slug }}" role="tabpanel">
                                        <div class="form-group">
                                            <label
                                                for="notice_title_{{ $lang->slug }}_notice_title_text">{{ __('Notice Area Title') }}</label>
                                            <input type="text" class="form-control"
                                                id="notice_title_{{ $lang->slug }}_notice_title_text"
                                                name="notice_title_{{ $lang->slug }}_notice_title_text"
                                                value="{{ get_static_option('notice_title_' . $lang->slug . '_notice_title_text') }}"
                                                placeholder="{{ __('Notice Area Title') }}">
                                        </div>
                                        <div class="form-group">
                                            <label
                                                for="notice_board_title_{{ $lang->slug }}_notice_board_title_text">{{ __('Notice Board Header Title') }}</label>
                                            <input type="text" class="form-control"
                                                id="notice_board_title_{{ $lang->slug }}_notice_board_title_text"
                                                name="notice_board_title_{{ $lang->slug }}_notice_board_title_text"
                                                value="{{ get_static_option('notice_board_title_' . $lang->slug . '_notice_board_title_text') }}"
                                                placeholder="{{ __('Notice Board Header Title') }}">
                                        </div>
                                        <div class="form-group">
                                            <label for="notice_about_section_{{$lang->slug}}_description">{{__('Description')}}</label>
                                            <input type="hidden" name="notice_about_section_{{$lang->slug}}_description" >
                                            <div class="summernote" data-content='{{get_static_option('notice_about_section_'.$lang->slug.'_description')}}'></div>
                                        </div>
                                        <div class="form-group">
                                            <label
                                                for="notice_board_button_title_{{ $lang->slug }}_notice_board_button_title_text">{{ __('Notice Board Button Title Text') }}</label>
                                            <input type="text" class="form-control"
                                                id="notice_board_button_title_{{ $lang->slug }}_notice_board_button_title_text"
                                                name="notice_board_button_title_{{ $lang->slug }}_notice_board_button_title_text"
                                                value="{{ get_static_option('notice_board_button_title_' . $lang->slug . '_notice_board_button_title_text') }}"
                                                placeholder="{{ __('Notice Board Button Title Text') }}">
                                        </div>
                                        <div class="form-group">
                                            <label
                                                for="notice_board_message_{{ $lang->slug }}_notice_board_message_text">{{ __('Notice Board Message Text') }}</label>
                                            <input type="text" class="form-control"
                                                id="notice_board_message_{{ $lang->slug }}_notice_board_message_text"
                                                name="notice_board_message_{{ $lang->slug }}_notice_board_message_text"
                                                value="{{ get_static_option('notice_board_message_' . $lang->slug . '_notice_board_message_text') }}"
                                                placeholder="{{ __('Notice Board Message Text') }}">
                                        </div>
                                        <div class="form-group">
                                            <label
                                                for="visitor_month_header_title_{{ $lang->slug }}_visitor_month_header_title_text">{{ __('Pic of the Month by Visitor Header Title') }}</label>
                                            <input type="text" class="form-control"
                                                id="visitor_month_header_title_{{ $lang->slug }}_visitor_month_header_title_text"
                                                name="visitor_month_header_title_{{ $lang->slug }}_visitor_month_header_title_text"
                                                value="{{ get_static_option('visitor_month_header_title_' . $lang->slug . '_visitor_month_header_title_text') }}"
                                                placeholder="{{ __('Pic of the Month by Visitor Header Title') }}">
                                        </div>
                                        <div class="form-group">
                                            <label
                                                for="visitor_month_footer_title_{{ $lang->slug }}_visitor_month_footer_title_text">{{ __('Pic of the Month by Visitor Footer Title') }}</label>
                                            <input type="text" class="form-control"
                                                id="visitor_month_footer_title_{{ $lang->slug }}_visitor_month_footer_title_text"
                                                name="visitor_month_footer_title_{{ $lang->slug }}_visitor_month_footer_title_text"
                                                value="{{ get_static_option('visitor_month_footer_title_' . $lang->slug . '_visitor_month_footer_title_text') }}"
                                                placeholder="{{ __('Pic of the Month by Visitor Footer Title') }}">
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                            <button type="submit"
                                class="btn btn-primary mt-4 pr-4 pl-4">{{ __('Update Notice Page Settings') }}</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('script')
    <script src="{{asset('assets/backend/js/summernote-bs4.js')}}"></script>
    <script>
        $(document).ready(function () {

            $('.summernote').summernote({
                height: 200,   //set editable area's height
                codemirror: { // codemirror options
                    theme: 'monokai'
                },
                callbacks: {
                    onChange: function(contents, $editable) {
                        $(this).prev('input').val(contents);
                    }
                }
            });

            if($('.summernote').length > 0){
                $('.summernote').each(function(index,value){
                    $(this).summernote('code', $(this).data('content'));
                });
            }
        });
    </script>
@endsection

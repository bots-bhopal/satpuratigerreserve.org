@extends('backend.admin-master')
@section('site-title')
    {{ __('Notices & Tenders Page Settings') }}
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
                        <h4 class="header-title">{{ __('Notices & Tenders Page Settings') }}</h4>
                        <form action="{{ route('admin.ntender.page.settings') }}" method="post" enctype="multipart/form-data">
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
                                                for="ntender_page_{{ $lang->slug }}_title">{{ __('Enter Title Here') }}</label>
                                            <input type="text" class="form-control"
                                                id="ntender_page_{{ $lang->slug }}_title"
                                                name="ntender_page_{{ $lang->slug }}_title"
                                                value="{{ get_static_option('ntender_page_' . $lang->slug . '_title') }}"
                                                placeholder="{{ __('Enter Title Here') }}">
                                        </div>

                                        <div class="form-group">
                                            <label
                                            for="ntender_message_{{ $lang->slug }}_text_here">{{ __('Enter Info Message Here') }}</label>
                                            <input type="text" class="form-control"
                                                id="ntender_message_{{ $lang->slug }}_text_here"
                                                name="ntender_message_{{ $lang->slug }}_text_here"
                                                value="{{ get_static_option('ntender_message_' . $lang->slug . '_text_here') }}"
                                                placeholder="{{ __('Enter Info Message Here') }}">
                                        </div>

                                        <div class="form-group">
                                            <label
                                            for="ntender_btn_{{ $lang->slug }}_text_here">{{ __('Enter Button Caption Here') }}</label>
                                            <input type="text" class="form-control"
                                                id="ntender_btn_{{ $lang->slug }}_text_here"
                                                name="ntender_btn_{{ $lang->slug }}_text_here"
                                                value="{{ get_static_option('ntender_btn_' . $lang->slug . '_text_here') }}"
                                                placeholder="{{ __('Enter Button Caption Here') }}">
                                        </div>
                                    </div>
                                @endforeach
                            </div>

                            {{-- <label for="link_page_btn_text">{{ __('Change Button Text') }}</label>
                                <input type="text" class="form-control" id="link_page_btn_text"
                                    value="{{ get_static_option('link_page_btn_text') }}" name="link_page_btn_text"
                                    placeholder="{{ __('Enter Button Caption Here') }}"> --}}

                            <button type="submit"
                                class="btn btn-primary mt-4 pr-4 pl-4">{{ __('Update Settings') }}</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

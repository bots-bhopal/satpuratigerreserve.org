@extends('backend.admin-master')
@section('site-title')
    {{ __('Announcement Area Settings') }}
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
                        <h4 class="header-title">{{ __('Announcement Area Settings') }}</h4>
                        <form action="{{ route('admin.home09.announcement.area') }}" method="post" enctype="multipart/form-data">
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
                                                for="title_{{ $lang->slug }}_title_text">{{ __('Announcement Area Title') }}</label>
                                            <input type="text" class="form-control"
                                                id="title_{{ $lang->slug }}_title_text"
                                                name="title_{{ $lang->slug }}_title_text"
                                                value="{{ get_static_option('title_' . $lang->slug . '_title_text') }}"
                                                placeholder="{{ __('Announcement Area Title') }}">
                                        </div>
                                        <div class="form-group">
                                            <label
                                                for="announcement_board_title_{{ $lang->slug }}_announcement_board_title_text">{{ __('Announcement Board Title') }}</label>
                                            <input type="text" class="form-control"
                                                id="announcement_board_title_{{ $lang->slug }}_announcement_board_title_text"
                                                name="announcement_board_title_{{ $lang->slug }}_announcement_board_title_text"
                                                value="{{ get_static_option('announcement_board_title_' . $lang->slug . '_announcement_board_title_text') }}"
                                                placeholder="{{ __('Announcement Board Title') }}">
                                        </div>
                                        <div class="form-group">
                                            <label
                                                for="announcement_board_button_title_{{ $lang->slug }}_announcement_board_button_title_text">{{ __('Announcement Board Button Title Text') }}</label>
                                            <input type="text" class="form-control"
                                                id="announcement_board_button_title_{{ $lang->slug }}_announcement_board_button_title_text"
                                                name="announcement_board_button_title_{{ $lang->slug }}_announcement_board_button_title_text"
                                                value="{{ get_static_option('announcement_board_button_title_' . $lang->slug . '_announcement_board_button_title_text') }}"
                                                placeholder="{{ __('Announcement Board Button Title Text') }}">
                                        </div>
                                        <div class="form-group">
                                            <label
                                                for="announcement_board_message_{{ $lang->slug }}_announcement_board_message_text">{{ __('Announcement Board Message Text') }}</label>
                                            <input type="text" class="form-control"
                                                id="announcement_board_message_{{ $lang->slug }}_announcement_board_message_text"
                                                name="announcement_board_message_{{ $lang->slug }}_announcement_board_message_text"
                                                value="{{ get_static_option('announcement_board_message_' . $lang->slug . '_announcement_board_message_text') }}"
                                                placeholder="{{ __('Announcement Board Message Text') }}">
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                            <button type="submit"
                                class="btn btn-primary mt-4 pr-4 pl-4">{{ __('Update Announcement Page Settings') }}</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

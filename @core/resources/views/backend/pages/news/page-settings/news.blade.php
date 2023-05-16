@extends('backend.admin-master')
@section('site-title')
    {{ __('News Page Settings') }}
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
                        <h4 class="header-title">{{ __('News Page Settings') }}</h4>
                        <form action="{{ route('admin.news.page.settings') }}" method="post" enctype="multipart/form-data">
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
                                                for="news_page_{{ $lang->slug }}_read_more_btn_text">{{ __('News Read More Text') }}</label>
                                            <input type="text" class="form-control"
                                                id="news_page_{{ $lang->slug }}_read_more_btn_text"
                                                name="news_page_{{ $lang->slug }}_read_more_btn_text"
                                                value="{{ get_static_option('news_page_' . $lang->slug . '_read_more_btn_text') }}"
                                                placeholder="{{ __('News Read More Text') }}">
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                            <div class="form-group">
                                <label for="blog_page_item">{{ __('News Items') }}</label>
                                <input type="text" class="form-control" id="news_page_item"
                                    value="{{ get_static_option('news_page_item') }}" name="news_page_item"
                                    placeholder="{{ __('News Items') }}">
                                <small
                                    class="text-danger">{{ __('Enter how many news you want to show in News page') }}</small>
                            </div>
                            <button type="submit"
                                class="btn btn-primary mt-4 pr-4 pl-4">{{ __('Update News Page Settings') }}</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

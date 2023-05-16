<style>
    .counter {
        display: inline-block;
        padding: 6px 6px 4px;
        border-radius: 3px;
        background: var(--construction-color);
        color: #fff;
        font-size: 20px;
        font-weight: 700;
        margin-right: -2px;
        box-shadow: 1px 1px 5px 1px #555555aa;
    }

    .visitor-name{
        border-radius: 5px;
        text-align: center;
        font-size: 20px;
        font-weight: 600;
        box-shadow: 1px 2px 2px 1px #9999;
    }
    
    .documentary {
        font-size: 22px;
        font-weight: 900;
        color: #f67307;
    }

    .documentary-title {
        font-size: 20px;
        font-weight: 900;
        color: #065e2e;
    }

    .documentary-span-title {
        color: #000;
    }

    :root {
        --minimum-width: 300px;
        --ratio: 16/9;
    }

    .image-box img {
        background: rgba(163, 163, 163, 0.10);
        border-radius: 16px;
        backdrop-filter: blur(2.7px);
        -webkit-backdrop-filter: blur(2.7px);
        border: 1px solid rgba(163, 163, 163, 0.17);
        aspect-ratio: var(--ratio);
        object-fit: contain;
        width: 100%;
    }

    .news-image-box {
        background: rgba(163, 163, 163, 0.10);
        border-radius: 16px;
        backdrop-filter: blur(2.7px);
        -webkit-backdrop-filter: blur(2.7px);
        border: 1px solid rgba(163, 163, 163, 0.17);
        aspect-ratio: var(--ratio);
        object-fit: contain;
        width: 100%;
    }

    .single-blog-grid-01 .content:after {
        border-radius: 16px;
        aspect-ratio: var(--ratio);
        object-fit: contain;
        width: 100%;
    }

    .badge-mix {
        background: #088c46;
        background-image: linear-gradient(to right, rgba(0,85,10,1) 0%, rgba(0,139,65,1) 51%, rgba(0,85,10,1) 100%);
        color: #FFFFFF;
        transition: 0.5s!important;
        background-size: 200% auto;
        padding: 0.4em 0.4em!important;
    }

    .badge.badge-mix:hover {
        background-position: right center;
        color: #fff;
    }

    .scroll-bar{
        overflow-y: auto!important;
    }

    .scroll-bar::-webkit-scrollbar {
        width: 6px;
    }

    .scroll-bar::-webkit-scrollbar-thumb {
        background-color: #088c46;
        border-radius: 50px;
        border: 3px solid #088c46;
    }

    .scroll-bar::-webkit-scrollbar-track {
        background: #CFD8DC;
    }

    .card ul li {
        padding: 5px 0px;
    }
</style>

@php
    $home_page_variant = $home_page ?? get_static_option('home_page_variant');
@endphp
<div class="construction-support-area">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="support-inner">
                    <div class="left-content-wrap">
                        <img src="{{ asset('assets/uploads/str-logo.jpg') }}" alt="satpura-logo">
                    </div>
                    <div class="center-content-wrap pl-2 pr-2">
                        <img src="{{ asset('assets/uploads/satpura-banner.png') }}" alt="satpura-banner">
                    </div>
                    <div class="right-content-wrap">
                        <img src="{{ asset('assets/uploads/MPFD-Logo.png') }}" alt="MPFD-Logo">
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="header-style-03  header-variant-{{ $home_page_variant }}">
    <nav class="navbar navbar-area navbar-expand-lg">
        <div class="container nav-container">
            <div class="collapse navbar-collapse" id="bizcoxx_main_menu">
                <ul class="navbar-nav">
                    {!! render_frontend_menu($primary_menu) !!}
                </ul>
            </div>
            <div class="responsive-mobile-menu">
                <div class="logo-wrapper" style="float: right; margin-right: -15px;">
                    {{-- <div class="dropdown" id="langchange">
                        @if (!empty(filter_static_option_value('language_select_option', $static_field_data)))
                        <button class="btn btn-warning dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            @foreach ($all_language as $lang)
                                @if ($user_select_lang_slug == $lang->slug)
                                    {{ explode('(', $lang->name)[0] ?? $lang->name }}
                                @endif
                            @endforeach
                        </button>
                        
                        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                            @foreach ($all_language as $lang)
                                <a class="dropdown-item" href="{{$lang->slug}}">{{ explode('(', $lang->name)[0] ?? $lang->name }}</a>
                            @endforeach
                        </div>
                        @endif
                    </div> --}}

                    <ul class="navbar-nav">
                        @if (!empty(filter_static_option_value('language_select_option', $static_field_data)))
                            <li>
                                <select id="langchange">
                                    @foreach ($all_language as $lang)
                                        <option @if ($user_select_lang_slug == $lang->slug) selected @endif
                                            value="{{ $lang->slug }}" class="lang-option">
                                            {{ explode('(', $lang->name)[0] ?? $lang->name }}</option>
                                    @endforeach
                                </select>
                            </li>
                        @endif
                    </ul>
                </div>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#bizcoxx_main_menu"
                    aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
            </div>
        </div>
    </nav>
</div>

<div class="header-slider-wrapper">
    <div class="header-slider-one global-carousel-init" data-loop="true" data-desktopitem="1" data-mobileitem="1"
        data-tabletitem="1" data-nav="true" data-autoplay="true" data-margin="0">
        @foreach ($all_header_slider as $data)
            <div class="header-area style-04 header-bg-04" {!! render_background_image_markup_by_attachment_id($data->image) !!}>
                <div class="container">
                    <div class="row justify-content-center">
                        <div class="col-lg-8">
                            <div class="header-inner style-01">
                                @if (!empty($data->title))
                                    <h1 class="title">{{ $data->title }}</h1>
                                @endif
                                @if (!empty($data->description))
                                    <p class="description">{{ $data->description }}</p>
                                @endif
                                <div class="header-bottom">
                                    @if (!empty($data->btn_01_status))
                                        <div class="btn-wrapper desktop-left">
                                            <a href="{{ $data->btn_01_url }}"
                                                class="boxed-btn">{{ $data->btn_01_text }}</a>
                                        </div>
                                    @endif
                                    @if (!empty($data->video_btn_status))
                                        <div class="vdo-btn-wrap">
                                            <a class="video-play mfp-iframe" href="{{ $data->video_btn_url }}">
                                                <i class="fas fa-play"></i>{{ $data->video_btn_text }}</a>
                                        </div>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</div>

@if (!empty(filter_static_option_value('home_page_about_us_section_status', $static_field_data)))
    <div class="construction-about-area padding-top-60 padding-bottom-0">
        <div class="row justify-content-center">
            <div class="col-lg-8">
                <div class="section-title desktop-center margin-bottom-40 industry-home">
                    <h2 class="title">
                        {{ get_static_option('title_' . $user_select_lang_slug. '_title_text') }}
                    </h2>
                </div>
            </div>
        </div>
        <div class="container">
            <div class="row">
                <div class="col-lg-6">
                    <div class="left-content-area mb-5">
                        <div class="card border-0">
                            <div class="card-header text-dark"
                                style="background-color: #fff!important; font-size: 22px; font-weight: 700;">
                                <span class="glyphicon glyphicon-list-alt"></span>
                                <b>{{ get_static_option('notice_board_title_' . $user_select_lang_slug. '_notice_board_title_text') }}</b>
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-sm-12">
                                        <div class="text-justify">
                                            {!! get_static_option('notice_about_section_' . $user_select_lang_slug. '_description') !!}
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="btn-wrapper" style="display: inline!important;">
                                <a href="{{ url('introduction') }}" class="industry-btn const-home-color">
                                    {{ get_static_option('notice_board_button_title_' . $user_select_lang_slug. '_notice_board_button_title_text') }}    
                                    <i class="far fa-comment-alt"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
                
                <div class="col-lg-6 mb-sm-5 pull-lg-6 mt-sm-30 mt-xs-30 text-center">
                    <div>
                        @if ($user_select_lang_slug == 'hi_IN')
                            <h3 class="documentary">सतपुड़ा टाइगर रिज़र्व पर</h3>
                            <h3 class="documentary-title" style="margin-bottom:10px!important;">एक  <span class="documentary-span-title"> लघु फिल्म</span</h3>
                        @endif
                        
                        @if ($user_select_lang_slug == 'en_US')
                            <h3 class="documentary">A Short Film On</h3>
                            <h3 class="documentary-title">Satpura  <span class="documentary-span-title">Tiger Reserve</span></h3>
                        @endif
                    </div>
                    
                    
                    <iframe width="100%" height="315" src="{{ get_static_option('gallery_video_section_video_url') }}" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen=""></iframe>

                    {{-- <div class="shape">
                        <img src="{{ asset('assets/frontend/img/shape/12.png') }}" alt="">
                    </div>
                    <div class="construction-video-wrap">
                        {!! render_image_markup_by_attachment_id(get_static_option('gallery_video_section_background_image')) !!}
                        <a class="video-play mfp-iframe"
                            href="{{ get_static_option('gallery_video_section_video_url') }}"><i
                                class="fas fa-play"></i></a>
                    </div> --}}
                </div>
            </div>
        </div>
    </div>
@endif

@if (!empty(filter_static_option_value('home_page_latest_news_section_status', $static_field_data)))
    <section class="blog-area padding-top-60 padding-bottom-60 bg-liteblue">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-8">
                    <div class="section-title desktop-center margin-bottom-20 industry-home">
                        <h2 class="title">
                            @if ($user_select_lang_slug == 'hi_IN')
                                संपर्क सूचना
                            @endif
                            
                            @if ($user_select_lang_slug == 'en_US')
                                Contact Info
                            @endif
                        </h2>
                    </div>
                </div>
            </div>
            
            <div class="row">
                <div class="col-lg-4 mrb-sm">
                    <div class="contact-email-icon">
                        <i class="far fa-envelope"></i>
                    </div>
                    
                    <div class="contact-content">
                        @if ($user_select_lang_slug == 'en_US')
                            <p class="contact-title">Email Address</span>
                        @endif
                        
                        @if ($user_select_lang_slug == 'hi_IN')
                            <p class="contact-title">ई-मेल एड्रेस</span>
                        @endif
                        <p class="contact-p">ddsatnp.hbd@mp.gov.in</p>
                        <p class="contact-p">dirsatpuranp@mp.gov.in</p>
                    </div>
                </div>
                
                <div class="col-lg-4 mrb-sm">
                    <div class="contact-phone-icon">
                        <i class="fas fa-phone"></i>
                    </div>
                    
                    <div class="contact-content">
                        @if ($user_select_lang_slug == 'en_US')
                            <p class="contact-title">Phone</span>
                        @endif
                        
                        @if ($user_select_lang_slug == 'hi_IN')
                            <p class="contact-title">फ़ोन</span>
                        @endif
                        <p class="contact-p">07574-254394</p>
                    </div>
                </div>
                
                <div class="col-lg-4">
                    <div class="contact-address-icon">
                        <i class="fas fa-map-marker-alt"></i>
                    </div>
                    
                    <div class="contact-content">
                        @if ($user_select_lang_slug == 'en_US')
                            <p class="contact-title">Location</span>
                            <p class="contact-p">Satpura Tiger Reserve, Narmadapuram, Madhya Pradesh</p>
                        @endif
                        
                        @if ($user_select_lang_slug == 'hi_IN')
                            <p class="contact-title">स्थान</span>
                            <p class="contact-p">सतपुड़ा टाइगर रिज़र्व, नर्मदापुरम, मध्य प्रदेश</p>
                        @endif
                    </div>
                </div>

            </div>
        </div>
    </section>
@endif

@if (!empty(filter_static_option_value('home_page_about_us_section_status', $static_field_data)))
    <div class="construction-about-area padding-top-40 padding-bottom-40">
        <div class="row justify-content-center">
            <div class="col-lg-8">
                <div class="section-title desktop-center margin-bottom-40 industry-home">
                    <h2 class="title">
                        {{ get_static_option('notice_title_' . $user_select_lang_slug. '_notice_title_text') }}
                    </h2>
                </div>
            </div>
        </div>
        <div class="container">
            <div class="row">
                <div class="col-lg-6">
                    <div class="right-content-area mb-5">
                        <div class="card" style="height: 520px!important;">
                            <div class="card-header text-dark"
                                style="background-color: #fff!important; font-size: 22px; font-weight: 700;">
                                <span class="glyphicon glyphicon-list-alt"></span>
                                <b>{{ get_static_option('aboard_page_' . $user_select_lang_slug . '_title') }}</b>
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-sm-12">
                                        <ul class="demo1 text-left" style="height: 520px!important;">
                                            @forelse ($announcements as $announcement)
                                                <li class="news-item" style="padding: 4px 4px;">
                                                        @if ($announcement->url)
                                                            <img src="{{ asset('assets/frontend/img/www.png') }}"
                                                                width="30" class="img-circle" />
                                                            <a href="{{ $announcement->url }}" target="_blank"
                                                                style="color:#135e2a; font-weight: 800!important;">{{ $announcement->title }}</a>
                                                            @if ($announcement->expired_at > Carbon\Carbon::now()->toDateTimeString())
                                                                <img src="{{ asset('assets/frontend/img/new.gif') }}"
                                                                    class="img-circle" />
                                                            @endif
                                                        @elseif($announcement->url == '' && !$announcement->file_extension == 'pdf')
                                                            <img src="{{ asset('assets/frontend/img/file.png') }}" width="30" class="img-circle" />
                                                            <span style="color:#135e2a; font-weight: 800!important;">{{ $announcement->title }}</span>
                                                            @if ($announcement->expired_at > Carbon\Carbon::now()->toDateTimeString())
                                                                <img src="{{ asset('assets/frontend/img/new.gif') }}"
                                                                    class="img-circle" />
                                                            @endif
                                                        @endif

                                                        @if ($announcement->file_extension == 'pdf')
                                                            <img src="{{ asset('assets/frontend/img/pdf.png') }}"
                                                                width="30" class="img-circle" />
                                                            <a href="{{ route('user.download', $announcement->original_filename) }}"
                                                                target="_blank"
                                                                style="color:#135e2a; font-weight: 800!important;">{{ $announcement->title }}</a>
                                                            @if ($announcement->expired_at > Carbon\Carbon::now()->toDateTimeString())
                                                                <img src="{{ asset('assets/frontend/img/new.gif') }}"
                                                                    class="img-circle" />
                                                            @endif
                                                        @endif

                                                        @if ($announcement->file_extension == 'doc' || $announcement->file_extension == 'docx')
                                                            <img src="{{ asset('assets/frontend/img/word.png') }}"
                                                                width="30" class="img-circle" />
                                                            <a href="{{ route('user.download', $announcement->original_filename) }}"
                                                                target="_blank"
                                                                style="color:#135e2a; font-weight: 800!important;">{{ $announcement->title }}</a>
                                                            @if ($announcement->expired_at > Carbon\Carbon::now()->toDateTimeString())
                                                                <img src="{{ asset('assets/frontend/img/new.gif') }}"
                                                                    class="img-circle" />
                                                            @endif
                                                        @endif

                                                        @if ($announcement->file_extension == 'xls' || $announcement->file_extension == 'xlsx')
                                                            <img src="{{ asset('assets/frontend/img/excel.png') }}"
                                                                width="30" class="img-circle" />
                                                            <a href="{{ route('user.download', $announcement->original_filename) }}"
                                                                target="_blank"
                                                                style="color:#135e2a; font-weight: 800!important;">{{ $announcement->title }}</a>
                                                            @if ($announcement->expired_at > Carbon\Carbon::now()->toDateTimeString())
                                                                <img src="{{ asset('assets/frontend/img/new.gif') }}"
                                                                    class="img-circle" />
                                                            @endif
                                                        @endif
                                                </li>
                                            @empty
                                                <li class="news-item" style="padding: 4px 4px 0 4px;">
                                                    <h4 style="font-weight: 800; text-align: center; color:red;">
                                                        {{ get_static_option('aboard_message_' . $user_select_lang_slug. '_text_here') }}
                                                    </h4>
                                                </li>
                                            @endforelse
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <div class="card-footer"
                                style="background-color: #fff!important; color: #343a40!important; font-weight: 600;">
                                <div class="btn-wrapper" style="display: inline!important;">
                                    <a href="{{ route('frontend.aboard') }}" class="industry-btn const-home-color">
                                        {{ get_static_option('aboard_btn_' . $user_select_lang_slug. '_text_here') }}
                                        <i class="far fa-comment-alt"></i>
                                    </a>
                                </div>
                                {{-- <ul class="float-left">
                                    <li><a href="#" style="position: relative; top: 6px;">Show
                                            More.....</a>
                                    </li>
                                </ul> --}}
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-lg-6">
                    <div class="right-content-area">
                        <div class="card border-0">
                            <div class="card-header text-dark text-center pl-0" style="background-color: #fff!important; font-size: 22px; font-weight: 700;">
                                <span class="glyphicon glyphicon-list-alt"></span>
                                <b>{{ get_static_option('visitor_month_header_title_' . $user_select_lang_slug. '_visitor_month_header_title_text') }}    </b>
                            </div>

                            <div class="row">
                                <div class="col-6">
                                    <div class="badge-info mt-2 mb-2 p-1 visitor-name">
                                        {{ $all_visitor_images->name ?? ''}}
                                    </div>
                                </div>

                                <div class="col-4 ml-auto">
                                    <div class="badge-warning mt-2 mb-2 p-1 visitor-name">
                                        @if ($all_visitor_images != '')
                                            {{ $all_visitor_images->created_at->format('M-Y') }}
                                        @else
                                            {{ '' }}
                                        @endif

                                        {{-- {{ $all_visitor_images->created_at->format('M - Y'); }} --}}
                                    </div>
                                </div>
                            </div>

                            <div class="card-body p-0">
                                <div class="row">
                                    <div class="col-sm-12">
                                        <div class="quality-img">
                                            {!! render_image_markup_by_attachment_id($all_visitor_images->image ?? '') !!}
                                        </div>
                                        {{-- <div class="quality-img"
                                            style="background-image: url(https://xgenious.com/laravel/nexelit/assets/uploads/media-uploader/051595833303.png);">
                                        </div> --}}
                                    </div>
                                </div>
                            </div>
                        </div> 
                    </div>
                    
                    {{-- <div class="d-flex mt-2 align-items-center justify-content-center">
                        <h4>{{ get_static_option('visitor_month_footer_title_' . $user_select_lang_slug. '_visitor_month_footer_title_text') }}     
                            : <span class="counter">{{ $all_visitors->visitors_count }}</span>
                        </h4>
                    </div> --}}
                </div>
            </div>
        </div>
    </div>
@endif

@if (!empty(filter_static_option_value('home_page_latest_news_section_status', $static_field_data)))
    <section class="blog-area padding-top-60 padding-bottom-60 bg-liteblue">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-8">
                    <div class="section-title desktop-center margin-bottom-60 industry-home">
                        <span
                            class="subtitle">{{ filter_static_option_value('construction_news_area_section_' . $user_select_lang_slug . '_subtitle', $static_field_data) }}</span>
                        <h2 class="title">
                            {{ filter_static_option_value('construction_news_area_section_' . $user_select_lang_slug . '_title', $static_field_data) }}
                        </h2>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <div class="blog-grid-carosel-wrapper">
                        <div class="blog-grid-carousel global-carousel-init" data-loop="true" data-desktopitem="2"
                            data-mobileitem="1" data-tabletitem="1" data-nav="true" data-autoplay="true"
                            data-margin="30">
                            @foreach ($all_news as $data)
                                <div class="single-blog-grid-01 news-image-box" {!! render_background_image_markup_by_attachment_id($data->image, 'large') !!}>
                                    <div class="content">
                                        <ul class="post-meta">
                                            <li>
                                                <a href="{{ route('frontend.news.single', $data->slug) }}"><i
                                                        class="far fa-clock"></i>
                                                    {{ date_format($data->created_at, 'd M Y') }}
                                                </a>
                                            </li>
                                        </ul>
                                        <h4 class="title"><a
                                                href="{{ route('frontend.news.single', $data->slug) }}">{{ $data->title }}</a>
                                        </h4>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
            <div class="row mt-5">
                <div class="col-12">
                    <div class="btn-wrapper text-center mt-2">
                        <a href="{{ route('frontend.news') }}" class="industry-btn const-home-color">
                            {{ filter_static_option_value('construction_news_area_section_' . $user_select_lang_slug . '_btn_text', $static_field_data) }}
                            <i class="{{ filter_static_option_value('construction_about_section_button_one_icon', $static_field_data) }}"></i>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endif

@if (!empty(filter_static_option_value('home_page_case_study_section_status', $static_field_data)))
    <div class="industry-project-area padding-top-40 padding-bottom-0">
        <div class="container">
            <div class="row margin-top-0">
                <div class="col-lg-8">
                    <div class="section-title industry-home">
                        <span class="subtitle">{{ filter_static_option_value('industry_project_section_' . $user_select_lang_slug . '_subtitle', $static_field_data) }}</span>
                        <h2 class="title">
                            {{ filter_static_option_value('industry_project_section_' . $user_select_lang_slug . '_title', $static_field_data) }}
                        </h2>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="project-carousel-nav"></div>
                </div>
            </div>

            <div class="row">
                <div class="col-lg-12">
                    <div class="global-carousel-init logistic-dots" data-loop="true" data-desktopitem="3"
                        data-mobileitem="1" data-tabletitem="1" data-dots="true" data-nav="true"
                        data-autoplay="true" data-margin="30" data-navcontainer=".project-carousel-nav">
                        @foreach ($all_gallery_images as $data)
                            <div class="single-gallery-image image-box">
                                {!! render_image_markup_by_attachment_id($data->image) !!}
                            </div>
                        @endforeach
                    </div>
                    {{-- <div class="btn-wrapper text-center mt-2">
                        <a href="{{ route('frontend.image.gallery') }}" class="industry-btn black">{{ filter_static_option_value('industry_project_section_' . $user_select_lang_slug . '_button_text', $static_field_data) }}
                            <i class="{{ filter_static_option_value('industry_about_section_button_one_icon', $static_field_data) }}"></i>
                        </a>
                    </div> --}}

                    <div class="btn-wrapper text-center mt-2">
                        <a href="{{ route('frontend.image.gallery') }}" class="industry-btn const-home-color">
                            {{ filter_static_option_value('industry_project_section_' . $user_select_lang_slug . '_button_text', $static_field_data) }}
                            <i class="far fa-comment-alt"></i>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endif

@if (!empty(filter_static_option_value('home_page_about_us_section_status', $static_field_data)))
    <div class="construction-about-area padding-top-60 padding-bottom-40">
        <div class="row justify-content-center">
            <div class="col-lg-8">
                <div class="section-title desktop-center margin-bottom-40 industry-home">
                    <h2 class="title">
                        {{ get_static_option('dlink_section_' . $user_select_lang_slug. '_title') }}
                    </h2>
                </div>
            </div>
        </div>
        <div class="container">
            <div class="row">
                <div class="col-lg-6 mb-sm-5">
                    <div class="right-content-area">
                        <div class="card" style="height: 520px!important;">
                            <div class="card-header text-dark"
                                style="background-color: #fff!important; font-size: 22px; font-weight: 700;">
                                <span class="glyphicon glyphicon-list-alt"></span>
                                <b>{{ get_static_option('dlink_page_' . $user_select_lang_slug . '_title') }}</b>
                            </div>
                            <div class="card-body scroll-bar" style="overflow: hidden; padding: 0.8rem 1.25rem;">
                                <div class="row">
                                    <div class="col-sm-12">
                                        @forelse ($dlists as $dlist)
                                        <span class="badge badge-mix rounded-1" style="font-size: 14px;">{{ $dlist->name }}</span>
                                            @foreach($dlist->dlinks as $dlink)
                                                <ul class="text-left">
                                                    <li class="news-item" style="padding: 4px 4px;">
                                                            @if ($dlink->url)
                                                                <img src="{{ asset('assets/frontend/img/www.png') }}"
                                                                    width="30" class="img-circle" />
                                                                <a href="{{ $dlink->url }}" target="_blank"
                                                                    style="color:#135e2a; font-weight: 800!important;">{{ $dlink->title }}</a>
                                                                @if ($dlink->expired_at > Carbon\Carbon::now()->toDateTimeString())
                                                                    <img src="{{ asset('assets/frontend/img/new.gif') }}"
                                                                        class="img-circle" />
                                                                @endif
                                                            @elseif($dlink->url == '' && !$dlink->file_extension == 'pdf')
                                                                <img src="{{ asset('assets/frontend/img/file.png') }}" width="30" class="img-circle" />
                                                                <span style="color:#135e2a; font-weight: 800!important;">{{ $dlink->title }}</span>
                                                                @if ($dlink->expired_at > Carbon\Carbon::now()->toDateTimeString())
                                                                    <img src="{{ asset('assets/frontend/img/new.gif') }}"
                                                                        class="img-circle" />
                                                                @endif
                                                            @endif

                                                            @if ($dlink->file_extension == 'pdf')
                                                                <img src="{{ asset('assets/frontend/img/pdf.png') }}"
                                                                    width="30" class="img-circle" />
                                                                <a href="{{ route('user.download', $dlink->original_filename) }}"
                                                                    target="_blank"
                                                                    style="color:#135e2a; font-weight: 800!important;">{{ $dlink->title }}</a>
                                                                @if ($dlink->expired_at > Carbon\Carbon::now()->toDateTimeString())
                                                                    <img src="{{ asset('assets/frontend/img/new.gif') }}"
                                                                        class="img-circle" />
                                                                @endif
                                                            @endif

                                                            @if ($dlink->file_extension == 'doc' || $dlink->file_extension == 'docx')
                                                                <img src="{{ asset('assets/frontend/img/word.png') }}"
                                                                    width="30" class="img-circle" />
                                                                <a href="{{ route('user.download', $dlink->original_filename) }}"
                                                                    target="_blank"
                                                                    style="color:#135e2a; font-weight: 800!important;">{{ $dlink->title }}</a>
                                                                @if ($dlink->expired_at > Carbon\Carbon::now()->toDateTimeString())
                                                                    <img src="{{ asset('assets/frontend/img/new.gif') }}"
                                                                        class="img-circle" />
                                                                @endif
                                                            @endif

                                                            @if ($dlink->file_extension == 'xls' || $dlink->file_extension == 'xlsx')
                                                                <img src="{{ asset('assets/frontend/img/excel.png') }}"
                                                                    width="30" class="img-circle" />
                                                                <a href="{{ route('user.download', $dlink->original_filename) }}"
                                                                    target="_blank"
                                                                    style="color:#135e2a; font-weight: 800!important;">{{ $dlink->title }}</a>
                                                                @if ($dlink->expired_at > Carbon\Carbon::now()->toDateTimeString())
                                                                    <img src="{{ asset('assets/frontend/img/new.gif') }}"
                                                                        class="img-circle" />
                                                                @endif
                                                            @endif
                                                    </li>
                                                </ul>
                                            @endforeach
                                        @empty
                                            <ul>
                                                <li class="news-item" style="padding: 4px 4px 0 4px;">
                                                    <h4 style="font-weight: 800; text-align: center; color:red;">
                                                        {{ get_static_option('dlink_message_' . $user_select_lang_slug. '_text_here') }}
                                                    </h4>
                                                </li>
                                            </ul>
                                        @endforelse
                                    </div>
                                </div>
                            </div>
                            <div class="card-footer"
                                style="background-color: #fff!important; color: #343a40!important; font-weight: 600;">
                                <div class="btn-wrapper" style="display: inline!important;">
                                    <a href="{{ route('frontend.dlink') }}" class="industry-btn const-home-color">
                                        {{ get_static_option('dlink_btn_' . $user_select_lang_slug. '_text_here') }}
                                        <i class="far fa-comment-alt"></i>
                                    </a>
                                </div>
                                {{-- <ul class="float-left">
                                    <li><a href="#" style="position: relative; top: 6px;">Show
                                            More.....</a>
                                    </li>
                                </ul> --}}
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-lg-6">
                    <div class="right-content-area">
                        <div class="card" style="height: 520px!important;">
                            <div class="card-header text-dark"
                                style="background-color: #fff!important; font-size: 22px; font-weight: 700;">
                                <span class="glyphicon glyphicon-list-alt"></span>
                                <b>{{ get_static_option('ntender_page_' . $user_select_lang_slug . '_title') }}</b>
                            </div>
                            <div class="card-body scroll-bar" style="overflow: hidden; padding: 0.8rem 1.25rem;">
                                <div class="row">
                                    <div class="col-sm-12">
                                        @forelse ($ntlists as $ntlist)
                                        <span class="badge badge-mix rounded-1" style="font-size: 14px;">{{ $ntlist->name }}</span>
                                            @foreach($ntlist->ntender as $ntender)
                                                <ul class="text-left">
                                                    <li class="news-item" style="padding: 4px 4px;">
                                                            @if ($ntender->url)
                                                                <img src="{{ asset('assets/frontend/img/www.png') }}"
                                                                    width="30" class="img-circle" />
                                                                <a href="{{ $ntender->url }}" target="_blank"
                                                                    style="color:#135e2a; font-weight: 800!important;">{{ $ntender->title }}</a>
                                                                @if ($ntender->expired_at > Carbon\Carbon::now()->toDateTimeString())
                                                                    <img src="{{ asset('assets/frontend/img/new.gif') }}"
                                                                        class="img-circle" />
                                                                @endif
                                                            @elseif($ntender->url == '' && !$ntender->file_extension == 'pdf')
                                                                <img src="{{ asset('assets/frontend/img/file.png') }}" width="30" class="img-circle" />
                                                                <span style="color:#135e2a; font-weight: 800!important;">{{ $ntender->title }}</span>
                                                                @if ($ntender->expired_at > Carbon\Carbon::now()->toDateTimeString())
                                                                    <img src="{{ asset('assets/frontend/img/new.gif') }}"
                                                                        class="img-circle" />
                                                                @endif
                                                            @endif

                                                            @if ($ntender->file_extension == 'pdf')
                                                                <img src="{{ asset('assets/frontend/img/pdf.png') }}"
                                                                    width="30" class="img-circle" />
                                                                <a href="{{ route('user.download', $ntender->original_filename) }}"
                                                                    target="_blank"
                                                                    style="color:#135e2a; font-weight: 800!important;">{{ $ntender->title }}</a>
                                                                @if ($ntender->expired_at > Carbon\Carbon::now()->toDateTimeString())
                                                                    <img src="{{ asset('assets/frontend/img/new.gif') }}"
                                                                        class="img-circle" />
                                                                @endif
                                                            @endif

                                                            @if ($ntender->file_extension == 'doc' || $ntender->file_extension == 'docx')
                                                                <img src="{{ asset('assets/frontend/img/word.png') }}"
                                                                    width="30" class="img-circle" />
                                                                <a href="{{ route('user.download', $ntender->original_filename) }}"
                                                                    target="_blank"
                                                                    style="color:#135e2a; font-weight: 800!important;">{{ $ntender->title }}</a>
                                                                @if ($ntender->expired_at > Carbon\Carbon::now()->toDateTimeString())
                                                                    <img src="{{ asset('assets/frontend/img/new.gif') }}"
                                                                        class="img-circle" />
                                                                @endif
                                                            @endif

                                                            @if ($ntender->file_extension == 'xls' || $ntender->file_extension == 'xlsx')
                                                                <img src="{{ asset('assets/frontend/img/excel.png') }}"
                                                                    width="30" class="img-circle" />
                                                                <a href="{{ route('user.download', $ntender->original_filename) }}"
                                                                    target="_blank"
                                                                    style="color:#135e2a; font-weight: 800!important;">{{ $ntender->title }}</a>
                                                                @if ($ntender->expired_at > Carbon\Carbon::now()->toDateTimeString())
                                                                    <img src="{{ asset('assets/frontend/img/new.gif') }}"
                                                                        class="img-circle" />
                                                                @endif
                                                            @endif
                                                    </li>
                                                </ul>
                                            @endforeach
                                        @empty
                                            <ul>
                                                <li class="news-item" style="padding: 4px 4px 0 4px;">
                                                    <h4 style="font-weight: 800; text-align: center; color:red;">
                                                        {{ get_static_option('ntender_message_' . $user_select_lang_slug. '_text_here') }}
                                                    </h4>
                                                </li>
                                            </ul>
                                        @endforelse
                                    </div>
                                </div>
                            </div>
                            <div class="card-footer"
                                style="background-color: #fff!important; color: #343a40!important; font-weight: 600;">
                                <div class="btn-wrapper" style="display: inline!important;">
                                    <a href="{{ route('frontend.ntender') }}" class="industry-btn const-home-color">
                                        {{ get_static_option('ntender_btn_' . $user_select_lang_slug. '_text_here') }}
                                        <i class="far fa-comment-alt"></i>
                                    </a>
                                </div>
                                {{-- <ul class="float-left">
                                    <li><a href="#" style="position: relative; top: 6px;">Show
                                            More.....</a>
                                    </li>
                                </ul> --}}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endif

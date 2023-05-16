<div class="construction-support-area">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="support-inner">
                    <div class="left-content-wrap">
                        <img src="{{ asset('assets/uploads/str-logo.jpg') }}" alt="satpura-logo">
                    </div>
                    <div class="center-content-wrap">
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
                <div class="logo-wrapper" style="float: right;">
                    <ul class="navbar-nav">
                        @if (!empty(filter_static_option_value('language_select_option', $global_static_field_data)))
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

{{-- <div class="header-style-01  navbar-variant-01">
    <nav class="navbar navbar-area nav-absolute navbar-expand-lg nav-style-01">
        <div class="container nav-container">
            <div class="responsive-mobile-menu">
                <div class="logo-wrapper">
                    <a href="{{url('/')}}" class="logo">
                        @if(!empty(filter_static_option_value('site_white_logo',$global_static_field_data)))
                            {!! render_image_markup_by_attachment_id(filter_static_option_value('site_white_logo',$global_static_field_data)) !!}
                        @else
                            <h2 class="site-title">{{filter_static_option_value('site_'.$user_select_lang_slug.'_title',$global_static_field_data)}}</h2>
                        @endif
                    </a>
                </div>
                <x-product-cart-mobile/>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#bizcoxx_main_menu"
                        aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
            </div>
            <div class="collapse navbar-collapse" id="bizcoxx_main_menu">
                <ul class="navbar-nav">
                    {!! render_frontend_menu($primary_menu) !!}
                </ul>
            </div>
            <div class="nav-right-content">
                <div class="icon-part">
                    <ul>
                        <x-navbar-search/>
                        <x-product-cart/>
                    </ul>
                </div>
            </div>
        </div>
    </nav>
</div> --}}

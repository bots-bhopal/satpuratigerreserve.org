<div class="blog-classic-item-01 {{ $margin ? 'margin-bottom-60' : '' }}">
    <div class="thumbnail">
        {!! render_image_markup_by_attachment_id($strevent->image) !!}
    </div>
    <div class="content">
        <ul class="post-meta">
            <li><a href="{{ route('frontend.strevent.single', $strevent->slug) }}"><i class="fa fa-user"></i>
                    {{ $strevent->author }}</a></li>
            <li><a href="{{ route('frontend.strevent.single', $strevent->slug) }}"><i class="far fa-clock"></i>
                    {{ date_format($strevent->created_at, 'd M y') }}</a></li>
        </ul>
        <h4 class="title"><a href="{{ route('frontend.strevent.single', $strevent->slug) }}">{{ $strevent->title }}</a></h4>
        <p>{{ $strevent->excerpt }}</p>
        <div class="btn-wrapper">
            <a href="{{ route('frontend.strevent.single', $strevent->slug) }}"
                class="boxed-btn reverse-color">{{ get_static_option('event_page_' . $user_select_lang_slug . '_read_more_btn_text') }}</a>
        </div>
    </div>
</div>

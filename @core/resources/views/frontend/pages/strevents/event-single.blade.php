@extends('frontend.frontend-page-master')
@php
$strevent_img = null;
$strevent_image = get_attachment_image_by_id($strevent->image, 'full', false);
$strevent_img = !empty($strevent_image) ? $strevent_image['img_url'] : '';
@endphp

@section('og-meta')
    <meta property="og:url" content="{{ route('frontend.strevent.single', $strevent->slug) }}" />
    <meta property="og:type" content="article" />
    <meta property="og:title" content="{{ $strevent->title }}" />
    <meta property="og:image" content="{{ $strevent_img }}" />
@endsection
@section('page-meta-data')
    <meta name="description" content="{{ $strevent->meta_description }}">
    <meta name="tags" content="{{ $strevent->meta_tag }}">
@endsection
@section('site-title')
    {{ $strevent->title }}
@endsection
@section('page-title')
    {{ $strevent->title }}
@endsection
@section('content')
    <section class="blog-details-content-area padding-top-100 padding-bottom-60">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 offset-lg-2">
                    <div class="blog-details-item">
                        <div class="thumb">
                            @php
                                
                            @endphp
                            @if (!empty($strevent_image))
                                <img src="{{ $strevent_image['img_url'] }}" alt="{{ __($strevent->title) }}">
                            @endif
                        </div>
                        <div class="entry-content">
                            <ul class="post-meta">
                                <li><i class="fas fa-calendar-alt"></i> {{ date_format($strevent->created_at, 'd M Y') }}
                                </li>
                                <li><i class="fas fa-user"></i> {{ $strevent->author }}</li>
                            </ul>
                            <div class="content-area">
                                {!! $strevent->content !!}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

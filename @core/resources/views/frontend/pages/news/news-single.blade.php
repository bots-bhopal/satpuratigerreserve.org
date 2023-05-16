@extends('frontend.frontend-page-master')
@php
$news_img = null;
$news_image = get_attachment_image_by_id($news->image, 'full', false);
$news_img = !empty($news_image) ? $news_image['img_url'] : '';
@endphp

@section('og-meta')
    <meta property="og:url" content="{{ route('frontend.news.single', $news->slug) }}" />
    <meta property="og:type" content="article" />
    <meta property="og:title" content="{{ $news->title }}" />
    <meta property="og:image" content="{{ $news_img }}" />
@endsection
@section('page-meta-data')
    <meta name="description" content="{{ $news->meta_description }}">
    <meta name="tags" content="{{ $news->meta_tag }}">
@endsection
@section('site-title')
    {{ $news->title }}
@endsection
@section('page-title')
    {{ $news->title }}
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
                            @if (!empty($news_image))
                                <img src="{{ $news_image['img_url'] }}" alt="{{ __($news->title) }}">
                            @endif
                        </div>
                        <div class="entry-content">
                            <ul class="post-meta">
                                <li><i class="fas fa-calendar-alt"></i> {{ date_format($news->created_at, 'd M Y') }}
                                </li>
                                <li><i class="fas fa-user"></i> {{ $news->author }}</li>
                            </ul>
                            <div class="content-area">
                                {!! $news->content !!}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

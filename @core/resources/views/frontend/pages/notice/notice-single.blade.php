<style>
    .single-what-we-cover-item-02 .content {
        padding: 20px !important;
    }

    .single-what-we-cover-item-02:hover .content {
        background-color: #fff !important;
    }

    .single-what-we-cover-item-02 .content .title {
        color: var(--heading-color) !important;
    }

    .single-what-we-cover-item-02 .content p {
        color: color: var(--paragraph-color) !important;
    }

    .btn-wrapper .boxed-btn.reverse-color:hover {
        background-color: var(--main-color-two) !important;
    }
</style>

@extends('frontend.frontend-page-master')
@section('og-meta')
    <meta property="og:url" content="{{ route('frontend.notice.single', $notice->slug) }}" />
    <meta property="og:type" content="article" />
    <meta property="og:title" content="{{ $notice->title }}" />
    {!! render_og_meta_image_by_attachment_id($notice->image) !!}
@endsection
@section('page-meta-data')
    <meta name="description" content="{{ $notice->meta_description }}">
    <meta name="tags" content="{{ $notice->meta_tag }}">
    {!! render_og_meta_image_by_attachment_id($notice->image) !!}
@endsection
@section('site-title')
    {{ $notice->title }} - {{ get_static_option('notice_page_' . $user_select_lang_slug . '_name') }}
@endsection
@section('page-title')
    {{ $notice->title }}
@endsection
@section('content')
    <div class="page-content service-details padding-top-120 padding-bottom-115">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 offset-lg-2">
                    <div class="single-what-we-cover-item-02 margin-bottom-30">
                        <div class="single-what-img-1">
                            @if ($notice->file_extension)
                                @if ($notice->file_extension == 'doc' || $notice->file_extension == 'docx')
                                    <img src="{{ asset('assets/frontend/img/word.png') }}" width="150" height="150"
                                        class="img-fluid rounded mt-4 mb-4" alt="doc-image">
                                @endif

                                @if ($notice->file_extension == 'xls' || $notice->file_extension == 'xlsx')
                                    <img src="{{ asset('assets/frontend/img/excel.png') }}" width="150" height="150"
                                        class="img-fluid rounded mt-4 mb-4" alt="xls-image">
                                @endif

                                @if ($notice->file_extension == 'pdf')
                                    <img src="{{ asset('assets/frontend/img/pdf.png') }}" width="150" height="150"
                                        class="img-fluid rounded mt-4 mb-4" alt="pdf-image">
                                @endif
                            @endif
                        </div>
                        <div class="content border-top text-justify" style="border: 1px #solid #e5e5e5;">
                            <h4 class="title">{{ $notice->title }}</h4>
                            <p>{!! $notice->description !!}</p>
                            <div class="btn-wrapper">
                                <a href="{{ route('user.notice.download', $notice->original_filename) }}"
                                    target="_blank" class="boxed-btn reverse-color">{{ __('Download File') }}</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

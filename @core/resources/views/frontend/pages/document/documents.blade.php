@extends('frontend.frontend-page-master')
@section('site-title')
    {{ get_static_option('document_page_' . $user_select_lang_slug . '_name') }}
@endsection
@section('page-title')
    {{ get_static_option('document_page_' . $user_select_lang_slug . '_name') }}
@endsection
@section('page-meta-data')
    <meta name="description"
        content="{{ get_static_option('document_page_' . $user_select_lang_slug . '_meta_description') }}">
    <meta name="tags" content="{{ get_static_option('document_page_' . $user_select_lang_slug . '_meta_tags') }}">
    {!! render_og_meta_image_by_attachment_id(get_static_option('document_page_' . $user_select_lang_slug . '_meta_image')) !!}
@endsection
@section('content')
    <section class="service-area service-page padding-120">
        <div class="container">
            <div class="row">
                @php $a = 1; @endphp
                @forelse ($all_documents as $data)
                    <div class="col-lg-4 col-md-6">
                        <x-frontend.document.grid :increment="$a" :document="$data" />
                    </div>
                    @php
                        if ($a == 4) {
                            $a = 1;
                        } else {
                            $a++;
                    } @endphp
                @empty
                    <div class="col-lg-12">
                        <h2 class="text-center text-danger font-weight-bold">{{ __('No Documents Found !!') }}</h2>
                    </div>
                @endforelse
                <div class="col-lg-12">
                    <div class="pagination-wrapper">
                        {{ $all_documents->links() }}
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

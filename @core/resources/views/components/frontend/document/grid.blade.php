<style>
    .btn-wrapper .boxed-btn.reverse-color:hover {
        background-color: var(--main-color-two) !important;
    }
</style>

<div class="single-what-we-cover-item-02 margin-bottom-30">
    <div class="single-what-img-1">
        @if ($document->file_extension)
            @if ($document->file_extension == 'doc' || $document->file_extension == 'docx')
                <img src="{{ asset('assets/frontend/img/word.png') }}" width="150" height="150"
                    class="img-fluid rounded mt-4 mb-4" alt="doc-image">
            @endif

            @if ($document->file_extension == 'xls' || $document->file_extension == 'xlsx')
                <img src="{{ asset('assets/frontend/img/excel.png') }}" width="150" height="150"
                    class="img-fluid rounded mt-4 mb-4" alt="xls-image">
            @endif

            @if ($document->file_extension == 'pdf')
                <img src="{{ asset('assets/frontend/img/pdf.png') }}" width="150" height="150"
                    class="img-fluid rounded mt-4 mb-4" alt="pdf-image">
            @endif
        @endif
    </div>
    <div class="content border-top" style="border: 1px #solid #e5e5e5;">
        <a href="{{ route('frontend.document.single', $document->slug) }}">
            <h4 class="title">{{ $document->title }}</h4>
        </a>
        <p>{!! Str::limit($document->description, 200, '...') !!}</p>
        <div class="btn-wrapper">
            <a href="{{ route('frontend.document.single', $document->slug) }}"
                class="boxed-btn reverse-color">{{ get_static_option('document_page_' . $user_select_lang_slug . '_read_more_btn_text') }}</a>
        </div>
    </div>
</div>

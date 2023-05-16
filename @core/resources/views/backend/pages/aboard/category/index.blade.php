@extends('backend.admin-master')

@section('site-title')
    {{ __('All Category') }}
@endsection

@push('css')
    <style>
        .website-url {
            display: none
        }
    </style>
@endpush

@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">

                <div class="row">
                    <div class="col-lg-12">
                        <div class="margin-top-40"></div>
                        <x-error-msg />
                        <x-flash-msg />
                    </div>
                    <!-- column -->
                    <div class="col-lg-12">
                        <div class="card mb-5">
                            <div class="card-body">
                                <h4 class="header-title">{{ __('All Category') }}</h4>
                                <ul class="nav nav-tabs" id="myTab" role="tablist">
                                    @php $a=0; @endphp
                                    @foreach ($categories as $key => $data)
                                        <li class="nav-item">
                                            <a class="nav-link @if ($a == 0) active @endif"
                                                data-toggle="tab" href="#slider_tab_{{ $key }}" role="tab"
                                                aria-controls="home"
                                                aria-selected="true">{{ get_language_by_slug($key) }}</a>
                                        </li>
                                        @php $a++; @endphp
                                    @endforeach
                                </ul>
                                <div class="tab-content margin-top-40">
                                    <div class="table-wrap table-responsive">
                                        <table class="table table-default" id="all_category_table">
                                            <thead>
                                                <th class="text-center">{{ __('ID') }}</th>
                                                <th>{{ __('Name') }}</th>
                                                <th>{{ __('Action') }}</th>
                                            </thead>
                                            <tbody>
                                                @foreach ($categories as $key => $category)
                                                    <tr>
                                                        <td>{{ $key+1 }}</td>
                                                        <td>{{ $category->name }}</td>
                                                        <td class="text-left">
                                                            <a href="{{ route('admin.abcategory.edit', $category->id) }}"
                                                                class="btn btn-sm btn-primary mt-1" data-toggle="tooltip"
                                                                data-placement="top" title="Edit"
                                                                style="font-size: 14px; font-weight: 500;"><i
                                                                    class="far fa-edit"></i> Edit</a>

                                                            <button type="button" class="btn btn-sm btn-danger mt-1"
                                                                onclick="deleteCategory({{ $category->id }})"
                                                                data-toggle="tooltip" data-placement="top" title="Delete"
                                                                style="font-size: 14px; font-weight: 500;"><i
                                                                    class="fa fa-trash-alt"></i> Delete</button>
                                                            <form id="delete-form-{{ $category->id }}"
                                                                action="{{ route('admin.abcategory.destroy', $category->id) }}"
                                                                method="POST" style="display: none;">
                                                                @csrf
                                                                @method('DELETE')
                                                            </form>
                                                        </td>
                                                    </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                </div>

                            </div>
                        </div>
                        <!-- /.card -->
                    </div>
                    <!--/.col -->
                </div>
                <!-- /.row -->
            </div><!-- /.container-fluid -->
        </section>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->

    <!-- Modal -->
    <div class="modal fade" id="delModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content" style="overflow-y: unset;">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">{{ __('Confirmation') }}</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    {{ __('Do you really want to delete this record?') }}
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">{{ __('Cancel') }}</button>
                    <button type="button" class="btn btn-danger" id="delCategory">{{ __('Yes') }}</button>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('js')
    <script>
        // Delete Function
        function deleteCategory(id) {
            $("#delModal").modal('show');

            document.getElementById("delCategory").addEventListener("click", function() {
                event.preventDefault();
                document.getElementById('delete-form-' + id).submit();
            });
        }
    </script>
@endpush

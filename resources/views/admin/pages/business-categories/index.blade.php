@extends('admin.layouts.app')

@section('content')
    <div class="page-wrapper">
        <div class="container-xl">
            <!-- Page title -->
            <div class="page-header d-print-none">
                <div class="row align-items-center">
                    <div class="col">
                        <div class="page-pretitle">
                            {{ __('Overview') }}
                        </div>
                        <h2 class="page-title">
                            {{ __('Business Categories') }}
                        </h2>
                    </div>
                    <!-- Add Business Category -->
                    <div class="col-auto ms-auto d-print-none">
                        <a type="button" href="{{ route('admin.business-categories.add') }}" class="btn btn-primary">
                            <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-plus" width="24"
                                height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none"
                                stroke-linecap="round" stroke-linejoin="round">
                                <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                <line x1="12" y1="5" x2="12" y2="19"></line>
                                <line x1="5" y1="12" x2="19" y2="12"></line>
                            </svg>
                            {{ __('Create') }}
                        </a>
                    </div>
                </div>
            </div>
        </div>

        <div class="page-body">
            <div class="container-xl">
                {{-- Failed --}}
                @if (Session::has('failed'))
                    <div class="alert alert-important alert-danger alert-dismissible" role="alert">
                        <div class="d-flex">
                            <div>
                                {{ Session::get('failed') }}
                            </div>
                        </div>
                        <a class="btn-close btn-close-white" data-bs-dismiss="alert" aria-label="close"></a>
                    </div>
                @endif

                {{-- Success --}}
                @if (Session::has('success'))
                    <div class="alert alert-important alert-success alert-dismissible" role="alert">
                        <div class="d-flex">
                            <div>
                                {{ Session::get('success') }}
                            </div>
                        </div>
                        <a class="btn-close btn-close-white" data-bs-dismiss="alert" aria-label="close"></a>
                    </div>
                @endif

                <div class="row row-deck row-cards">
                    <div class="col-sm-12 col-lg-12">
                        <div class="card">
                            <div class="table-responsive px-2 py-2">
                                <table class="table table-vcenter card-table" id="table">
                                    <thead>
                                        <tr>
                                            <th class="text-start">{{ __('#') }}</th>
                                            <th class="text-start">{{ __('Business Category Name') }}</th>
                                            <th class="text-start">{{ __('Created At') }}</th>
                                            <th class="text-start">{{ __('Status') }}</th>
                                            <th class="text-start w-1">{{ __('Actions') }}</th>
                                        </tr>
                                    </thead>
                                    <tbody>

                                        @foreach ($business_categories as $business_category)
                                            <tr>
                                                <td class="text-start">{{ $loop->iteration }}</td>
                                                <td class="text-start">{{ __($business_category->business_category_name) }}
                                                </td>
                                                <td class="text-start">{{ $business_category->created_at }}</td>
                                                <td class="text-start">
                                                    @if ($business_category->status == 0)
                                                        <span class="badge bg-red">{{ __('Discontinued') }}</span>
                                                    @else
                                                        <span class="badge bg-green">{{ __('Active') }}</span>
                                                    @endif
                                                </td>
                                                <td class="text-center">
                                                    <span class="dropdown">
                                                        <button class="btn small-btn dropdown-toggle align-text-top"
                                                            data-bs-boundary="viewport" data-bs-toggle="dropdown"
                                                            aria-expanded="false">{{ __('Actions') }}</button>
                                                        <div class="dropdown-menu dropdown-menu-end" style="">
                                                            <a class="dropdown-item"
                                                                href="{{ route('admin.edit.business-category', $business_category->business_category_id) }}">{{ __('Edit') }}</a>

                                                            @if ($business_category->status == 0)
                                                                <a class="dropdown-item" href="#"
                                                                    onclick="getBusinessCategory('{{ $business_category->business_category_id }}'); return false;">{{ __('Activate') }}</a>
                                                            @else
                                                                <a class="dropdown-item" href="#"
                                                                    onclick="getBusinessCategory('{{ $business_category->business_category_id }}'); return false;">{{ __('Deactivate') }}</a>
                                                            @endif
                                                            <a class="dropdown-item" href="#"
                                                                onclick="deleteBusinessCategory('{{ $business_category->business_category_id }}'); return false;">{{ __('Delete') }}</a>
                                                        </div>
                                                    </span>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        {{-- Footer --}}
        @include('admin.includes.footer')
    </div>


    {{-- Activation Modal --}}
    <div class="modal modal-blur fade" id="activation-modal" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-sm modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-body">
                    <div class="modal-title">{{ __('Are you sure?') }}</div>
                    <div>{{ __('If you proceed, you will active/deactivate this business category data.') }}</div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary me-auto"
                        data-bs-dismiss="modal">{{ __('Cancel') }}</button>
                    <a class="btn btn-danger" id="business_category_id">{{ __('Yes, proceed') }}</a>
                </div>
            </div>
        </div>
    </div>

    {{-- Delete Modal --}}
    <div class="modal modal-blur fade" id="delete-modal" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-sm modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-body">
                    <div class="modal-title">{{ __('Are you sure?') }}</div>
                    <div>{{ __('If you proceed, you will delete this business category data.') }}</div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary me-auto"
                        data-bs-dismiss="modal">{{ __('Cancel') }}</button>
                    <a class="btn btn-danger" id="delete_business_category_id">{{ __('Yes, proceed') }}</a>
                </div>
            </div>
        </div>
    </div>


    {{-- Custom JS --}}
@section('custom-js')
    {{-- Datatable --}}
    <script>
        $('#table').DataTable({
            "order": [
                [0, "asc"]
            ]
        });
    </script>

    {{-- Get business category --}}
    <script>
        function getBusinessCategory(parameter) {
            "use strict";

            $("#activation-modal").modal("show");
            var link = document.getElementById("business_category_id");
            link.setAttribute("href", "{{ route('admin.activation.business-category') }}?business_category_id=" +
                parameter);
        }

        // Delete business category
        function deleteBusinessCategory(parameter) {
            "use strict";

            $("#delete-modal").modal("show");
            var link = document.getElementById("delete_business_category_id");
            link.setAttribute("href", "{{ route('admin.delete.business-category') }}?business_category_id=" + parameter);
        }
    </script>
@endsection
@endsection

@extends("layouts.core")

<!-- Admin > Transactions > History -->

@section('title')
    History
@endsection

<!-- -->

@section('custom_css')
    
@endsection

<!-- -->

@section('breadcrumb')

    <!-- Item -->
    <li class="breadcrumb-item text-muted">
        <a href="#" class="text-muted text-hover-primary">Transactions</a>
    </li>

    <!-- Dash -->
    <li class="breadcrumb-item">
        <span class="bullet bg-gray-200 w-5px h-2px"></span>
    </li>

    <!-- Item -->
    <li class="breadcrumb-item text-dark">History</li>

@endsection

<!-- -->

@section("content")

<!--begin::Transactions Table Card-->
<div class="card">

    <!--begin::Card header-->
    <div class="card-header border-0 pt-6">
        <div class="card-title">

            <!--begin::Search-->
            <div class="d-flex align-items-center position-relative my-1">
                <!-- Svg Icon | path: ../../assets/media/icons/duotune/general/gen021.svg-->
                <span class="svg-icon svg-icon-1 position-absolute ms-6">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                        <rect opacity="0.5" x="17.0365" y="15.1223" width="8.15546" height="2" rx="1" transform="rotate(45 17.0365 15.1223)" fill="black"/>
                        <path d="M11 19C6.55556 19 3 15.4444 3 11C3 6.55556 6.55556 3 11 3C15.4444 3 19 6.55556 19 11C19 15.4444 15.4444 19 11 19ZM11 5C7.53333 5 5 7.53333 5 11C5 14.4667 7.53333 17 11 17C14.4667 17 17 14.4667 17 11C17 7.53333 14.4667 5 11 5Z" fill="black"/>
                    </svg>
                </span>
                <input type="text" data-kt-transaction-table-filter="search" class="form-control form-control-solid w-250px ps-14" placeholder="Search transaction">
            </div>
            <!--end::Search-->

        </div>

        <!--begin::Card toolbar-->
        <div class="card-toolbar">
            <div class="d-flex justify-content-end" data-kt-transaction-table-toolbar="base">

                <!-- Export -->
                <button type="button" class="btn btn-light-primary me-3" data-bs-toggle="modal" data-bs-target="#kt_modal_export_transactions">
                    <!-- Svg Icon | path: ../../assets/media/icons/duotune/arrows/arr078.svg-->
                    <span class="svg-icon svg-icon-2">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                            <rect opacity="0.3" x="12.75" y="4.25" width="12" height="2" rx="1" transform="rotate(90 12.75 4.25)" fill="black"/>
                            <path d="M12.0573 6.11875L13.5203 7.87435C13.9121 8.34457 14.6232 8.37683 15.056 7.94401C15.4457 7.5543 15.4641 6.92836 15.0979 6.51643L12.4974 3.59084C12.0996 3.14332 11.4004 3.14332 11.0026 3.59084L8.40206 6.51643C8.0359 6.92836 8.0543 7.5543 8.44401 7.94401C8.87683 8.37683 9.58785 8.34458 9.9797 7.87435L11.4427 6.11875C11.6026 5.92684 11.8974 5.92684 12.0573 6.11875Z" fill="black"/>
                            <path d="M18.75 8.25H17.75C17.1977 8.25 16.75 8.69772 16.75 9.25C16.75 9.80228 17.1977 10.25 17.75 10.25C18.3023 10.25 18.75 10.6977 18.75 11.25V18.25C18.75 18.8023 18.3023 19.25 17.75 19.25H5.75C5.19772 19.25 4.75 18.8023 4.75 18.25V11.25C4.75 10.6977 5.19771 10.25 5.75 10.25C6.30229 10.25 6.75 9.80228 6.75 9.25C6.75 8.69772 6.30229 8.25 5.75 8.25H4.75C3.64543 8.25 2.75 9.14543 2.75 10.25V19.25C2.75 20.3546 3.64543 21.25 4.75 21.25H18.75C19.8546 21.25 20.75 20.3546 20.75 19.25V10.25C20.75 9.14543 19.8546 8.25 18.75 8.25Z" fill="#C4C4C4"/>
                        </svg>
                    </span>Export
                </button>
                
            </div>

            <!-- Delete Selected -->
            <div class="d-flex justify-content-end align-items-center d-none" data-kt-transaction-table-toolbar="selected">
                <div class="fw-bolder me-5">
                    <span class="me-2" data-kt-transaction-table-select="selected_count"></span>Selected
                </div>
                <button type="button" class="btn btn-danger" data-kt-transaction-table-select="delete_selected">Delete Selected</button>
            </div>

            <!--begin::Modal - Export Transactions-->
            <div class="modal fade" id="kt_modal_export_transactions" tabindex="-1" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered mw-650px">
                    <div class="modal-content">

                        <!-- Modal header -->
                        <div class="modal-header">
                            <!-- Modal title -->
                            <h2>Export Transactions</h2>
                            
                            <!-- Close -->
                            <div class="btn btn-icon btn-sm btn-active-icon-primary" data-kt-transactions-modal-action="close">
                                <!--begin::Svg Icon | path: assets/media/icons/duotune/arrows/arr061.svg-->
                                <span class="svg-icon svg-icon-1">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                        <rect opacity="0.5" x="6" y="17.3137" width="16" height="2" rx="1" transform="rotate(-45 6 17.3137)" fill="black"/>
                                        <rect x="7.41422" y="6" width="16" height="2" rx="1" transform="rotate(45 7.41422 6)" fill="black"/>
                                    </svg>
                                </span>
                            </div>

                        </div>

                        <!-- Modal body -->
                        <div class="modal-body scroll-y mx-5 mx-xl-15 my-7">
                            <!--begin::Form-->
                            <form id="kt_modal_export_transactions_form" class="form" action="#">

                                <!-- Input group -->
                                <div class="fv-row mb-10">
                                    <!--begin::Label-->
                                    <label class="required fs-6 fw-bold form-label mb-2">Select Export Format:</label>
                                    <!--end::Label-->

                                    <!--begin::Input-->
                                    <select name="format" data-control="select2" data-placeholder="Select a format" data-hide-search="true" class="form-select form-select-solid fw-bolder">
                                        <option></option>
                                        <option value="zip">PDF</option>
                                        <option value="pdf">JSON</option>
                                        <option value="cvs">CSV</option>
                                    </select>
                                    <!--end::Input-->
                                </div>

                                <!-- Actions -->
                                <div class="text-center">
                                    <button type="reset" class="btn btn-light me-3" data-kt-transactions-modal-action="cancel">Discard</button>
                                    <button type="submit" class="btn btn-primary" data-kt-transactions-modal-action="submit">
                                        <span class="indicator-label">Submit</span>
                                        <span class="indicator-progress">Please wait... 
                                        <span class="spinner-border spinner-border-sm align-middle ms-2"></span></span>
                                    </button>
                                </div>

                            </form>
                            <!--end::Form-->
                        </div>

                    </div>
                </div>
            </div>
            <!--end::Modal - Export Books-->

        </div>
        <!--end::Card toolbar-->

    </div>
    <!--end::Card header-->

    <!--begin::Card body-->
    <div class="card-body pt-0">

        <!--begin::Table-->
        <table class="table align-middle table-row-dashed fs-6 gy-5" id="kt_table_transactions">

            <!--begin::Table head-->
            <thead>
                <tr class="text-start text-muted fw-bolder fs-7 text-uppercase gs-0">
                    <th class="w-10px pe-2">
                        <div class="form-check form-check-sm form-check-custom form-check-solid me-3">
                            <input class="form-check-input" type="checkbox" data-kt-check="true" data-kt-check-target="#kt_table_transactions .form-check-input" value="1">
                        </div>
                    </th>
                    <th class="min-w-100px">Transaction Number</th>
                    <th class="min-w-100px">Book ID / ISBN</th>
                    <th class="min-w-100px">User ID</th>
                    <th class="min-w-125px">Accepted Date</th>
                    <th class="min-w-100px">From</th>
                    <th class="min-w-100px">To</th>
                    <th class="min-w-125px">Returned Date</th>
                    <th class="min-w-75px">Copies</th>
                    <th class="min-w-75px">Penalty Issued</th>
                </tr>
            </thead>
            <!--end::Table head-->

            <!--begin::Table body-->
            <tbody class="text-gray-600 fw-bold">

                <!--begin::Table row | Book -->
                <tr>
                    <!-- Checkbox -->
                    <td>
                        <div class="form-check form-check-sm form-check-custom form-check-solid">
                            <input class="form-check-input" type="checkbox" value="1">
                        </div>
                    </td>

                    <!-- Transaction Number -->
                    <td class>109-00011</td>

                    <!-- Book ID / ISBN -->
                    <td>
                        <a href="#" class="text-gray-800 text-hover-primary mb-1">9780000000000</a>
                    </td>

                    <!-- User ID -->
                    <td>
                        <a href="#" class="text-gray-800 text-hover-primary mb-1">25909</a>
                    </td>

                    <!-- Accepted Date -->
                    <td>10 Mar 2021, 6:05 pm</td>

                    <!-- From -->
                    <td>12 Mar 2021</td>

                    <!-- To -->
                    <td>14 Mar 2021</td>

                    <!-- Returned Date -->
                    <td>15 Mar 2021, 6:05 pm</td>

                    <!-- Copies -->
                    <td>1</td>

                    <!-- Penalty Issued -->
                    <td>₱ 100</td>
                </tr>
                <!--end::Table row | Book -->
            </tbody>
            <!--end::Table body-->

        </table>
        <!--end::Table-->

    </div>
    <!--end::Card body-->

</div>
<!--end::Transactions Table Card-->

@endsection

<!-- -->

@section("vendor_js")

@endsection

<!-- -->

@section("custom_js")

@endsection
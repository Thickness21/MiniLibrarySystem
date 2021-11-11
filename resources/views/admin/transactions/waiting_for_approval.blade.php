@extends("layouts.core")

<!-- Admin > Transactions > Waiting For Approval -->

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
                
            </div>

            <!-- Selected -->
            <div class="d-flex justify-content-end align-items-center d-none" data-kt-transaction-table-toolbar="selected">
                <div class="fw-bolder me-5">
                    <span class="me-2" data-kt-transaction-table-select="selected_count"></span>Selected
                </div>
                <button type="button" class="btn btn-success" data-kt-transaction-table-select="accept_selected">Accept</button>
                <button type="button" class="btn btn-danger" data-kt-transaction-table-select="decline_selected">Decline</button>
            </div>

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
                    <th class="min-w-125px">Transaction Number</th>
                    <th class="min-w-125px">Book ID / ISBN</th>
                    <th class="min-w-125px">User ID</th>
                    <th class="min-w-150px">Request Date</th>
                    <th class="min-w-125px">From</th>
                    <th class="min-w-125px">To</th>
                    <th class="min-w-75px">Copies</th>
                    <th class="text-end min-w-100px">Actions</th>
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

                    <!-- Request Date -->
                    <td>10 Mar 2021, 6:05 pm</td>

                    <!-- From -->
                    <td>12 Mar 2021</td>

                    <!-- To -->
                    <td>14 Mar 2021</td>

                    <!-- Copies -->
                    <td>1</td>
                    
                    <!-- Actions -->
                    <td class="text-end">
                        <a href="#" class="btn btn-light btn-active-light-primary btn-sm" data-kt-menu-trigger="click" data-kt-menu-placement="bottom-end">Actions 
                        <!-- Svg Icon | path: ../../assets/media/icons/duotune/arrows/arr072.svg-->
                            <span class="svg-icon svg-icon-5 m-0">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                    <path d="M11.4343 12.7344L7.25 8.55005C6.83579 8.13583 6.16421 8.13584 5.75 8.55005C5.33579 8.96426 5.33579 9.63583 5.75 10.05L11.2929 15.5929C11.6834 15.9835 12.3166 15.9835 12.7071 15.5929L18.25 10.05C18.6642 9.63584 18.6642 8.96426 18.25 8.55005C17.8358 8.13584 17.1642 8.13584 16.75 8.55005L12.5657 12.7344C12.2533 13.0468 11.7467 13.0468 11.4343 12.7344Z" fill="black"/>
                                </svg>
                            </span>
                        </a>
                        <!-- Menu -->
                        <div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-600 menu-state-bg-light-primary fw-bold fs-7 w-125px py-4" data-kt-menu="true">
                            <!-- Menu item -->
                            <div class="menu-item px-3">
                                <a href="#" class="menu-link px-3">Accept</a>
                            </div>

                            <!-- Menu item -->
                            <div class="menu-item px-3">
                                <a href="#" class="menu-link px-3">Decline</a>
                            </div>
                            
                        </div>

                    </td>
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
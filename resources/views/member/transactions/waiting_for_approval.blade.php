@extends("layouts.core")

<!-- User > Transactions > Waiting For Approval -->

@section('title')
    Waiting for Approval
@endsection

<!-- -->

@section('breadcrumb')

    <!-- Item -->
    <li class="breadcrumb-item text-muted">
        <a href="#" class="text-muted text-hover-primary">Transactions</a>
    </li>

    <!-- Item -->
    <li class="breadcrumb-item text-dark">Waiting for Approval</li>

@endsection

<!-- -->

@section("content")

<!--begin::Transactions Table Card-->
<div class="card">

    <!--begin::Card header-->
    <div class="card-header border-0 pt-6">
        <div class="card-title">
        </div>

        <!--begin::Card toolbar-->
        <div class="card-toolbar">
            <div class="d-flex justify-content-end" data-kt-transactions-table-toolbar="base">

            </div>

            <!-- Selected -->
            <div class="d-flex justify-content-end align-items-center d-none" data-kt-transactions-table-toolbar="selected">
                <div class="fw-bolder me-5">
                    <span class="me-2" data-kt-transactions-table-select="selected_count"></span>Selected
                </div>
                <button type="button" class="btn btn-danger" data-kt-transactions-table-select="cancel_selected">Cancel Selected</button>
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
                            <input class="form-check-input" type="checkbox" data-kt-check="true" data-kt-check-target="#kt_table_transactions .form-check-input" value="0">
                        </div>
                    </th>
                    <th class="w-75px">Transaction Number</th>
                    <th>Book ID / ISBN</th>
                    <th>Request Date</th>
                    <th>From</th>
                    <th>To</th>
                    <th>Copies</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <!--end::Table head-->

            <!--begin::Table body-->
            <tbody class="text-gray-600 fw-bold">

                @foreach ($allTransactions as $transaction)

                    <!--begin::Table row | Transaction -->
                    <tr>
                        <!-- Checkbox -->
                        <td>
                            <div class="form-check form-check-sm form-check-custom form-check-solid">
                                <input class="form-check-input" type="checkbox" value="{{ $transaction->id }}">
                            </div>
                        </td>

                        <!-- Transaction Number -->
                        <td>
                            <p>{{ $transaction->id }}</p>
                        </td>

                        <!-- Book ID / ISBN -->
                        <td>
                            <a href="{{ route('books.show', $transaction->book_id) }}" class="text-gray-800 text-hover-primary mb-1">{{ $transaction->book_id }}</a>
                        </td>

                        <!-- Request Date -->
                        <td>
                            <div class="badge badge-light fw-bolder">{{ $transaction->date_requested }}</div>
                        </td>

                        <!-- From -->
                        <td>
                            <div class="badge badge-light fw-bolder">{{ $transaction->date_from }}</div>
                        </td>

                        <!-- To -->
                        <td>
                            <div class="badge badge-light fw-bolder">{{ $transaction->date_to }}</div>
                        </td>

                        <!-- Copies -->
                        <td>{{ $transaction->copies }}</td>

                        <!-- Actions -->
                        <td>
                            <a href="#" class="btn btn-icon btn-danger btn-sm" data-kt-transactions-table-filter="cancel_row" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Cancel">
                                <span class="svg-icon svg-icon-1 position-absolute">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                        <rect opacity="0.3" x="2" y="2" width="20" height="20" rx="5" fill="black"/>
                                        <rect x="7" y="15.3137" width="12" height="2" rx="1" transform="rotate(-45 7 15.3137)" fill="black"/>
                                        <rect x="8.41422" y="7" width="12" height="2" rx="1" transform="rotate(45 8.41422 7)" fill="black"/>
                                    </svg>
                                </span>
                            </a>
                        </td>
                    </tr>
                    <!--end::Table row | Book -->

                @endforeach

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
    <script src="{{ asset("plugins/custom/datatables/datatables.bundle.js") }}"></script>
@endsection

<!-- -->

@section("custom_js")
    <script src="{{ asset("js/custom/member/transactions-page/transactions-waiting-table.js") }}"></script>
@endsection

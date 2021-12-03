@extends("layouts.core")

<!-- Admin > transactions > In Progress -->

@section('title')
    In Progress
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

    <!-- Item -->
    <li class="breadcrumb-item text-dark">In Progress</li>

@endsection

<!-- -->

@section("content")

<!--begin::transactions Table Card-->
<div class="card">

    <!--begin::Card body-->
    <div class="card-body pt-6">

        <!--begin::Table-->
        <table class="table align-middle table-row-dashed fs-6 gy-5" id="kt_table_transactions">

            <!--begin::Table head-->
            <thead>
                <tr class="text-start text-muted fw-bolder fs-7 text-uppercase gs-0">
                    <th class="w-75px">Transaction Number</th>
                    <th>Book ID</th>
                    <th>User ID</th>
                    <th>Date Accepted</th>
                    <th>From</th>
                    <th>To</th>
                    <th>Copies</th>
                    <th>Penalty</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <!--end::Table head-->

            <!--begin::Table body-->
            <tbody class="text-gray-600 fw-bold">

                @foreach ($allTransactions as $transaction)

                    <!--begin::Table row | Book -->
                    <tr class="text-start">

                        <!-- transactions Number -->
                        <td>
                            <p>{{ $transaction->id }}</p>
                        </td>

                        <!-- Book ID / ISBN -->
                        <td>
                            <a href="{{ route('books.edit', $transaction->book_id) }}" class="text-gray-800 text-hover-primary mb-1">{{ $transaction->book_id }}</a>
                        </td>

                        <!-- User ID -->
                        <td>
                            <a href="{{ route('users.edit', $transaction->user_id) }}" class="text-gray-800 text-hover-primary mb-1">{{ $transaction->user_id }}</a>
                        </td>

                        <!-- Accepted Date -->
                        <td>
                            <div class="badge badge-light fw-bolder">{{ $transaction->date_accepted }}</div>
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

                        <!-- Penalty -->
                        <td>{{ $transaction->penalty }}</td>

                        <!-- Actions -->
                        <td>
                            @if ($transaction->status == 'unclaimed')
                                <a href="#" class="btn btn-icon btn-primary btn-sm" data-kt-transactions-table-filter="claimed_row" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Mark as claimed">
                                    <span class="svg-icon svg-icon-1 position-absolute">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                            <rect opacity="0.3" x="12.75" y="4.25" width="12" height="2" rx="1" transform="rotate(90 12.75 4.25)" fill="black"/>
                                            <path d="M12.0573 6.11875L13.5203 7.87435C13.9121 8.34457 14.6232 8.37683 15.056 7.94401C15.4457 7.5543 15.4641 6.92836 15.0979 6.51643L12.4974 3.59084C12.0996 3.14332 11.4004 3.14332 11.0026 3.59084L8.40206 6.51643C8.0359 6.92836 8.0543 7.5543 8.44401 7.94401C8.87683 8.37683 9.58785 8.34458 9.9797 7.87435L11.4427 6.11875C11.6026 5.92684 11.8974 5.92684 12.0573 6.11875Z" fill="black"/>
                                            <path d="M18.75 8.25H17.75C17.1977 8.25 16.75 8.69772 16.75 9.25C16.75 9.80228 17.1977 10.25 17.75 10.25C18.3023 10.25 18.75 10.6977 18.75 11.25V18.25C18.75 18.8023 18.3023 19.25 17.75 19.25H5.75C5.19772 19.25 4.75 18.8023 4.75 18.25V11.25C4.75 10.6977 5.19771 10.25 5.75 10.25C6.30229 10.25 6.75 9.80228 6.75 9.25C6.75 8.69772 6.30229 8.25 5.75 8.25H4.75C3.64543 8.25 2.75 9.14543 2.75 10.25V19.25C2.75 20.3546 3.64543 21.25 4.75 21.25H18.75C19.8546 21.25 20.75 20.3546 20.75 19.25V10.25C20.75 9.14543 19.8546 8.25 18.75 8.25Z" fill="#C4C4C4"/>
                                        </svg>
                                    </span>
                                </a>
                            @elseif ($transaction->status == 'claimed')
                                <a href="#" class="btn btn-icon btn-success btn-sm" data-kt-transactions-table-filter="return_row" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Mark as returned">
                                    <span class="svg-icon svg-icon-1 position-absolute">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                            <rect opacity="0.3" width="12" height="2" rx="1" transform="matrix(0 -1 -1 0 12.75 19.75)" fill="black"/>
                                            <path d="M12.0573 17.8813L13.5203 16.1256C13.9121 15.6554 14.6232 15.6232 15.056 16.056C15.4457 16.4457 15.4641 17.0716 15.0979 17.4836L12.4974 20.4092C12.0996 20.8567 11.4004 20.8567 11.0026 20.4092L8.40206 17.4836C8.0359 17.0716 8.0543 16.4457 8.44401 16.056C8.87683 15.6232 9.58785 15.6554 9.9797 16.1256L11.4427 17.8813C11.6026 18.0732 11.8974 18.0732 12.0573 17.8813Z" fill="black"/>
                                            <path d="M18.75 15.75H17.75C17.1977 15.75 16.75 15.3023 16.75 14.75C16.75 14.1977 17.1977 13.75 17.75 13.75C18.3023 13.75 18.75 13.3023 18.75 12.75V5.75C18.75 5.19771 18.3023 4.75 17.75 4.75L5.75 4.75C5.19772 4.75 4.75 5.19771 4.75 5.75V12.75C4.75 13.3023 5.19771 13.75 5.75 13.75C6.30229 13.75 6.75 14.1977 6.75 14.75C6.75 15.3023 6.30229 15.75 5.75 15.75H4.75C3.64543 15.75 2.75 14.8546 2.75 13.75V4.75C2.75 3.64543 3.64543 2.75 4.75 2.75L18.75 2.75C19.8546 2.75 20.75 3.64543 20.75 4.75V13.75C20.75 14.8546 19.8546 15.75 18.75 15.75Z" fill="#C4C4C4"/>
                                        </svg>
                                    </span>
                                </a>
                            @endif
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
<!--end::transactions Table Card-->

@endsection

<!-- -->

@section("vendor_js")
    <script src="{{ asset("plugins/custom/datatables/datatables.bundle.js") }}"></script>
@endsection

<!-- -->

@section("custom_js")
    <script src="{{ asset("js/custom/admin/transactions-page/transactions-in-progress-table.js") }}"></script>
@endsection

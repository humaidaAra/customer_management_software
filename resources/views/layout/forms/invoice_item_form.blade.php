@extends('index')

@section('content')
    <div class="col12">
        <div class="card">
            <div class="card-body">
                <form method="POST" class="row g-3" action="{{ Route::currentRouteName() == 'customers.edit' ? route('customers.update', $customer->id) : route('customers.store') }}">
                    @csrf

                </form
            </div>
        </div>
    </div>
    <div class="col-12">
        <div class="card recent-sales overflow-auto">
            <div class="card-body">
                <div class="d-flex justify-content-between">
                    <h1 class="card-title fs-1">Invoices</h1>
                    <a class="btn btn-primary my-4 fs-5" href="{{ route('invoiceitems.create') }}"><i class="bi bi-plus fs-5"></i>Create</a>
                </div>
                <table class="table table-borderless table-responsive datatable overflow-auto">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Invoice NO.</th>
                            <th scope="col">Item Name</th>
                            <th scope="col">Price</th>
                            <th scope="col">Quantity</th>
                            <th scope="col">Discount (%)</th>
                            <th scope="col">Subtotal</th>
                            <th scope="col">Note</th>
                            <th scope="col"></th>
                        </tr>
                    </thead>
                    <tbody>
                        @if (isset($invoice))
                            <tr>
                                <th scope="row">#{{ $invoice->id }}</th>
                                <td>{{ $invoice->customer_name }}</td>
                                <td><a href="#" class="text-primary">{{ number_format($invoice->total, 2) . ' ' . $current_currency_type }}</a></td>
                                <td>
                                    @switch($invoice->status)
                                        @case(0)
                                            <h6 class="badge bg-danger">Unpaid</h6>
                                        @break

                                        @case(1)
                                            <h6 class="badge bg-success">Paid</h6>
                                        @break

                                        @case(2)
                                            <h6 class="badge bg-warning">Due</h6>
                                        @break

                                        @default
                                    @endswitch
                                </td>
                                <td>{{ $invoice->contract->customer->name }}</td>

                                <td>
                                    <form action="{{ route('invoices.edit', $invoice->id) }}">
                                        <button class="btn btn-secondary"><i class="bi bi-pencil-square"></i></button>
                                        @csrf
                                    </form>

                                </td>
                                <td>
                                    <form action="{{ route('invoiceitems.show', $invoice->id) }}" method="get">

                                        <button class="btn btn-primary" type="submit"><i class="bi bi-search"></i></button>
                                    </form>

                                </td>
                                <td> <!-- Disabled Modal -->
                                    <button type="button" class="btn btn-danger btn-sm" data-bs-toggle="modal" data-bs-target="#delete_{{ $invoice->id }}">
                                        <i class="bi bi-trash-fill"></i>
                                    </button>
                                    <form method="POST" action="{{ route('invoices.destroy', $invoice->id) }}">
                                        @csrf
                                        @method('DELETE')
                                        <div class="modal fade" id="delete_{{ $invoice->id }}" tabindex="-1" data-bs-backdrop="false">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title">Deletion!</h5>
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                    </div>
                                                    <div class="modal-body">
                                                        Deleting customer is Irreversable! Are you sure of this action?
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-primary" data-bs-dismiss="modal">Close</button>
                                                        <button type="submit" class="btn btn-danger" onclick="this.classList.toggle('disabled')">Yes</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div><!-- End modal-->
                                    </form>
                                </td>
                            </tr>
                        @endif
                    </tbody>
                </table>

            </div>
        </div>
    </div>
@endsection

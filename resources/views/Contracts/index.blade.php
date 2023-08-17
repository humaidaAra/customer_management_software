@extends('index')

@section('content')
    <div class="col-12">
        <div class="card recent-sales overflow-auto">
            <div class="card-body">
                <div class="d-flex justify-content-between">
                    <h1 class="card-title fs-1">Contracts</h1>
                    <a class="btn btn-primary my-4 fs-5" href="{{ route('contracts.create') }}"><i class="bi bi-plus fs-5"></i>Create</a>
                </div>
                <table class="table table-borderless datatable">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Contract Owner</th>
                            <th scope="col">Total</th>
                            <th scope="col">Created at.</th>
                            <th scope="col"> </th>
                            <th scope="col"></th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($contracts as $contract)
                            <tr>
                                <th scope="row">#{{ $contract->id }}</th>
                                <td>{{ $contract->customer->name }}</td>
                                <td><a href="#" class="text-primary">{{ number_format($contract->payment, 2) . ' ' . $current_currency_type }}</a></td>
                                <td>{{ $contract->created_at }}</td>
                                <td>
                                    <form action="{{ route('contracts.edit', $contract->id) }}">
                                        <button class="btn btn-primary" type="submit">Open</button>
                                        @csrf
                                    </form>
                                <td>
                                    <button type="button" class="btn btn-danger btn-sm" data-bs-toggle="modal" data-bs-target="#delete_{{ $contract->id }}">
                                        Delete
                                    </button>
                                    <form method="POST" action="{{ route('contracts.destroy', $contract->id) }}">
                                        @csrf
                                        @method('DELETE')
                                        <div class="modal fade" id="delete_{{ $contract->id }}" tabindex="-1" data-bs-backdrop="false">
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
                        @endforeach
                    </tbody>
                </table>

            </div>

        </div>
    </div>
@endsection

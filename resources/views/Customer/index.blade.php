@extends('index')

@section('content')
    <div class="card">
        <div class="card-body">
            <div class="d-flex justify-content-between">
                <h1 class="card-title fs-1">Customers</h1>
                <a class="btn btn-primary my-4 fs-5" href="{{ route('customers.create') }}"><i class="bi bi-plus fs-5"></i>Create</a>
            </div>

            <!-- Default Table -->
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Name</th>
                        <th scope="col">Phone</th>
                        <th scope="col">Start Date</th>
                        <th scope="col"></th>
                        <th scope="col"></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($customers as $customer)
                        <tr>
                            <th scope="row">{{ $customer->id }}</th>
                            <td>{{ $customer->name }}</td>
                            <td>{{ $customer->phone }}</td>
                            <td>{{$customer->created_at}}</td>
                            <td>
                                <form action="{{ route('customers.edit', $customer->id) }}">
                                    <button class="btn btn-primary" type="submit">Open</button>
                                    @csrf
                                </form>
                            </td>
                            <td> <!-- Disabled Backdrop Modal -->
                                <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#delete_{{ $customer->id }}">
                                    Delete
                                </button>
                                <form method="POST" action="{{ route('customers.destroy', $customer->id) }}">
                                    @csrf
                                    @method('DELETE')
                                    <div class="modal fade" id="delete_{{ $customer->id }}" tabindex="-1" data-bs-backdrop="false">
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
                                    </div><!-- End Disabled Backdrop Modal-->
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            <!-- End Default Table Example -->
        </div>
    </div>
@endsection

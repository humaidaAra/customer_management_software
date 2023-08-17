<template lang="">
    <div class="card">
        <div class="card-body">
            <h5 class="card-title">Default Table</h5>

            <!-- Default Table -->
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Name</th>
                        <th scope="col">Phone</th>
                        <th scope="col">Created at</th>
                        <th class="col text-center" colspan="2">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <!-- @foreach ($customers as $customer) -->
                        <tr>
                            <!-- <th scope="row">{{ $customer->id }}</th> -->
                            <!-- <td>{{ $customer->name }}</td> -->
                            <!-- <td>{{ $customer->phone }}</td> -->
                            <td>2016-05-25</td>
                            <td><button class="btn btn-primary">Open</button></td>
                            <td> <!-- Disabled Backdrop Modal -->
                                <!-- <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#delete_{{ $customer->id }}"> -->
                                    Delete
                                </button>
                                <!-- <form method="POST" action="{{ route('customers.destroy', $customer->id) }}"> -->
                                    <!-- @csrf -->
                                    <!-- @method('DELETE') -->
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
</template>
<style></style>
<script></script>
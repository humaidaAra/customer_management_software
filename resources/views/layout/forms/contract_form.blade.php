<div class="card">
    <div class="card-body">
        <h5 class="card-title">Contract</h5>
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        @php
            $isEdit = Route::currentRouteName() == 'contracts.edit';
        @endphp

        <form method="POST" class="row g-3" action="{{ $isEdit ? route('contracts.update', $contract->id) : route('contracts.store') }}">
            @csrf
            @if ($isEdit)
                @method('PUT')
            @endif
            <div class="col-12">
                <label for="customer_name" class="form-label">Contract for Customer: </label>
                <select name="customer_id" class="form-select shadow-sm p-4 mb-4 bg-white" aria-label="Default select example">
                    <option selected>Please Select a Customer...</option>
                    @if (isset($customers))
                        @foreach ($customers as $customer)
                            <option 
                            value="{{ $customer->id }}"
                            @if ($isEdit)
                                {{$customer->id == $contract->customer_id ? 'selected' :''}}
                            @endif
                            >{{ $customer->name }}
                            </option>
                        @endforeach
                    @endif
                </select>
            </div>
            <div class="col-12">
                <label for="start_date" class="form-label">Start Date</label>
                <input name="start_date" type="date" class="form-control" id="startdate" value="{{ $contract->start_date ?? (old('start_date') ?? '') }}">
            </div>
            <div class="col-12">
                <label for="expire_date" class="form-label">Expire Date</label>
                <input type="date" name="expire_date" class="form-control" id="expire_date" value="{{ $contract->expire_date ?? (old('expire_date') ?? '') }}">
            </div>
            <div class="col-12">
                <label for="payment" class="form-label">Payment (Number Only)</label>
                <input type="text" name="payment" class="form-control" id="payment" value="{{ $contract->payment ?? (old('payment') ?? '') }}">
            </div>
            <div class="col-12">
                <label for="note" class="form-label">Note</label>
                <input type="text" name="note" class="form-control" id="note" value="{{ $contract->note ?? (old('note') ?? '') }}">
            </div>
            <div class="col-12 d-flex flex-row-reverse my-5">
                <button type="button" class="btn btn-dark me-3 mt-5 p-3" onclick="history.back();">Cancel</button>
                <button type="reset" class="btn btn-secondary me-3 mt-5 p-3">Reset</button>
                <button type="submit" class="btn btn-primary me-3 mt-5 p-3">Save</button>
            </div>
        </form>

    </div>
</div>

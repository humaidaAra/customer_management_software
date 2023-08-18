<div class="card">
    <div class="card-body">
        @php
            $isEdit = Route::currentRouteName() == 'invoices.edit';
        @endphp
        <h5 class="card-title">{{$isEdit? "Update Invoice": "New Invoice"}}</h5>
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif



        <form method="POST" class="row g-3" action="{{ $isEdit ? route('invoices.update', $invoice->id) : route('invoices.store') }}">
            @csrf
            @if ($isEdit)
                @method('PUT')
            @endif
            <div class="col-12">
                <label for="customer_name" class="form-label">Invoice for contract: </label>
                <select name="contract_id" class="form-select shadow-sm p-4 mb-4 bg-white" aria-label="Default select example">
                    <option selected>Select a contract ...</option>
                    @if (isset($contracts))
                        @foreach ($contracts as $contract)
                            <option style="word-spacing: 50%" value="{{ $contract->id }}" @if ($isEdit) {{ $contract->id == $invoice->contract_id ? 'selected' : '' }} @endif>
                                {{ $contract->customer->name }} {{ $contract->payment }}
                            </option>
                        @endforeach
                    @endif
                </select>
            </div>
            <div class="col-12">
                <label for="customer_name" class="form-label">Customer Name</label>
                <input name="customer_name" type="text" class="form-control" id="name" value="{{ $invoice->customer_name ?? (old('customer_name') ?? '') }}">
            </div>
            <div class="col-12">
                <label for="invoice_date" class="form-label">Date</label>
                <input type="date" name="invoice_date" class="form-control" id="invoice_date" value="{{ $invoice->invoice_date ?? (old('invoice_date') ?? '') }}">
            </div>
            <div class="col-12">
                <label for="total" class="form-label">Total Amount (Number Only)</label>
                <input type="text" name="total" class="form-control" id="total" value="{{ $invoice->total ?? (old('total') ?? '') }}">
            </div>

            <div class="col-12">
                <label for="status" class="form-label me-5 fw-bold">Status</label>
            </div>
            <div class="col-12 d-flex justify-content-around mb-5">
                <div>
                    <input type="radio" value="1" class="btn-check" name="status" id="paid" {{$isEdit&&$invoice->status==1? 'checked':''}}>
                    <label class="btn btn-outline-secondary p-3" for="paid">Paid</label>
                </div>
                <div>
                    <input type="radio" value="0" class="btn-check" name="status" id="unpaid" {{$isEdit&&$invoice->status==0? 'checked':''}}>
                    <label class="btn btn-outline-danger p-3" for="unpaid">Unpaid</label>
                </div>
                <div>
                    <input type="radio" value="2" class="btn-check" name="status" id="due" {{$isEdit&&$invoice->status==2? 'checked':''}}>
                    <label class="btn btn-outline-warning p-3" for="due">Due</label>
                </div>
            </div>
            <div class="col-12 d-flex flex-row-reverse my-5">
                <button type="button" class="btn btn-dark me-3 mt-5 p-3" onclick="history.back();">Cancel</button>
                <button type="reset" class="btn btn-secondary me-3 mt-5 p-3">Reset</button>
                <button type="submit" class="btn btn-primary me-3 mt-5 p-3">Save</button>
            </div>
        </form>

    </div>
</div>

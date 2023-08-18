@extends('index')

@section('content')
    @php
        $isEdit = Route::currentRouteName() == 'invoiceitems.edit';
    @endphp
    <div class="col12">
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">Detail</h5>
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                <form method="POST" class="row g-1" id="detail_form" action="{{ $isEdit ? route('invoiceitems.update', $invoiceitem->id) : route('invoiceitems.store') }}">
                    @csrf
                    @if ($isEdit)
                        @method('PUT')
                    @endif

                    <input type="hidden" name="invoice_id" value="{{ $invoice->id?? $invoiceitem->invoice_id }}">
                    <div class="col-12">
                        <label for="item_name" class="form-label">Item Name</label>
                        <input name="item_name" type="text" class="form-control" id="item_name" value=" {{ $invoiceitem->item_name ?? (old('item_name') ?? '') }}">
                    </div>
                    <div class="col-12">
                        <label for="price" class="form-label">Price (Number Only)</label>
                        <input name="price" type="text" class="form-control" id="price" value="{{ $invoiceitem->price ?? (old('price') ?? '') }}">
                    </div>
                    <div class="col-12">
                        <label for="quantity" class="form-label">Quantity</label>
                        <input name="quantity" type="text" class="form-control" id="quantity" value="{{ $invoiceitem->quantity ?? (old('quantity') ?? '') }}">
                    </div>
                    <div class="col-12">
                        <label for="discount" class="form-label">Discount (Number Only)</label>
                        <input name="discount" type="text" class="form-control" id="discount" value="{{ $invoiceitem->discount ?? (old('discount') ?? '') }}">
                    </div>
                    <div class="col-12">
                        <label for="note" class="form-label">Note</label>
                        <input name="note" type="text" class="form-control" id="note" value="{{ $invoiceitem->note ?? (old('note') ?? '') }}">
                    </div>
                    <div class="text-center col-12 d-flex flex-row-reverse my-5">
                        <button type="submit" class="btn btn-primary ms-5 btn-lg">{{ $isEdit ? 'save' : 'create' }}</button>
                        <button type="reset" class="btn btn-secondary btn-lg">Reset</button>
                    </div>

                </form>
            </div>
        </div>
    </div>
@endsection

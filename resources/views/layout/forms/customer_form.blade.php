<div class="card">
    <div class="card-body">
        <h5 class="card-title">Customer</h5>

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <form method="POST" class="row g-3" action="{{ Route::currentRouteName() == 'customers.edit' ? route('customers.update', $customer->id) : route('customers.store') }}">

            @csrf
            @if (Route::currentRouteName() == 'customers.edit')
                @method('PUT')
            @endif
            <div class="col-12">
                <label for="name" class="form-label">Name</label>
                <input name="name" type="text" class="form-control" id="name" value="{{ $customer->name?? old('name')?? "" }}">
            </div>
            <div class="col-12">
                <label for="phone" class="form-label">phone</label>
                <input type="text" name="phone" class="form-control" id="phone" value="{{ $customer->phone?? old('phone')?? ""}}">
            </div>
            <div class="col-12">
                <label for="address" class="form-label">Address</label>
                <input type="text" name="address" class="form-control" id="address" placeholder="1234 Main St" value="{{ $customer->address?? old('address')?? "" }}">
            </div>
            <div class="col-12">
                <label for="Free trial" class="form-label">Free trial</label>
                <input type="text" name="free_trial" class="form-control" id="Free trial" value="{{ $customer->free_trial?? old('free_trial')?? "" }}">
            </div>
            <div class="col-12">
                <label for="startdate" class="form-label">Start Date</label>
                <input type="date" name="start_date" class="form-control" id="startdate" value="{{ $customer->start_date?? old('start_date')?? "" }}">
            </div>
            <div class="col-12">
                <label for="Free trial" class="form-label">Note</label>
                <textarea type="text" name="note" class="form-control" id="note">{{ $customer->note?? old('name')?? "" }}</textarea>
            </div>
            <div class="text-center">
                <button type="submit" class="btn btn-primary">Save</button>
                <button type="reset" class="btn btn-secondary">Reset</button>
                <button type="button" class="btn btn-dark" onclick="history.back();">Cancel</button>
            </div>
        </form><!-- Vertical Form -->

    </div>
</div>

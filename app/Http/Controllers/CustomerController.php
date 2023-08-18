<?php

namespace App\Http\Controllers;

use App\Http\Requests\CustomerRequest;
use App\Models\Customer;
use Illuminate\Http\Request;

class CustomerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $customers = Customer::get();
        return view('Customer.index')->with(compact('customers'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('Customer.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CustomerRequest $request)
    {
        Customer::create($request->validated());
        return redirect('customers');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        try {
            $customer = Customer::findOrFail($id);
            return view('Customer.edit')->with(compact('customer'));

        } catch (\Throwable $th) {
            //throw $th;
            return response(null, 500);
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(CustomerRequest $request, string $id)
    {
        try {
            $customer = Customer::find($id);
            $customer->update($request->validated());
            return redirect('customers');
        } catch (\Throwable $th) {
            return response('error', 500);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        try {
            $customer = Customer::find($id);
            foreach($customer->contracts as $contract)
            {
                foreach($contract->invoices as $invoice)
                {
                    $invoice->invoiceItems()->delete();
                }
                $contract->invoices()->delete();
            }
            $customer->contracts()->delete();
            $customer->delete();
            return redirect('/customers');
        } catch (\Throwable $th) {
            return response('500');
            // dd($th);
        }
    }
}

<?php

namespace App\Http\Controllers;

use App\Http\Requests\InvoiceRequest;
use App\Models\Contract;
use App\Models\Invoice;
use Illuminate\Http\Request;

class InvoiceController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $invoices = Invoice::get();
        return view('Invoices.index')->with(compact('invoices'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $contracts = Contract::with('invoices')->get();
        return view('Invoices.create')->with(compact('contracts'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(InvoiceRequest $request)
    {
        try {
            Invoice::create($request->validated());
            return redirect('invoices');
        } catch (\Throwable $th) {
            //throw $th;
            dd($th);
            // return response(null, 500);
        }
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
            $contracts = Contract::get();
            $invoice = Invoice::findOrFail($id);
            return view('Invoices.edit')->with(compact(['invoice', 'contracts']));
        } catch (\Throwable $th) {
            //throw $th;
            return response(null, 500);
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(InvoiceRequest $request, string $id)
    {
        try {
            $invoice = Invoice::findOrFail($id);
            $invoice->update($request->validated());
            return redirect('invoices');
        } catch (\Throwable $th) {
            //throw $th;
            return response('null', 500);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        try {
            Invoice::findOrFail($id)->delete();
            return redirect('invoices');
        } catch (\Throwable $th) {
            //throw $th;
            return response(null, 500);
        }
    }
}

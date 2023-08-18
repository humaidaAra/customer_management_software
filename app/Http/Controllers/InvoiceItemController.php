<?php

namespace App\Http\Controllers;

use App\Http\Requests\InvoiceItemRequest;
use App\Models\Invoice;
use App\Models\InvoiceItem;
use Illuminate\Http\Request;

class InvoiceItemController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index($invoice_id)
    {
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create($id)
    {
        $invoice = Invoice::findOrFail($id);
        return view('InvoiceItems.create')->with(compact('invoice'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(InvoiceItemRequest $request)
    {
        try {
            $invoiceitem = InvoiceItem::create($request->validated());
            $data = Invoice::findOrFail($request->invoice_id);
            return $this->show($data->id);
        } catch (\Throwable $th) {
            // dd($th);
            return response(null, 500);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $invoiceitems = InvoiceItem::where('invoice_id', '=', $id)->get();
        $invoice_id = $id;
        return view('InvoiceItems.index')->with(compact(['invoiceitems', 'invoice_id']));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $invoiceitem = InvoiceItem::findOrFail($id);
        $invoice = $invoiceitem->invoice;
        return view('InvoiceItems.edit')->with(compact('invoiceitem'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(InvoiceItemRequest $request, string $id)
    {
        $item = InvoiceItem::find($id);
        $item->update($request->validated());
        return redirect(route('invoiceitems.show', $item->invoice_id));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        try {
            $invoiceitem = InvoiceItem::findOrFail($id);
            $invoiceitem->delete();
            return redirect(route('invoiceitems.show', $invoiceitem->id));
        } catch (\Throwable $th) {
            //throw $th;
            // dd($th);
            return response(null, 500);
        }
    }
}

<?php

namespace App\Http\Controllers;

use App\Http\Requests\ContractRequest;
use App\Models\Contract;
use App\Models\Customer;
use Illuminate\Http\Request;

class ContractController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $contracts = Contract::get();
        return view('Contracts.index')->with(compact('contracts'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $customers = Customer::get();
        return view('Contracts.create')->with(compact('customers'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ContractRequest $request)
    {
        try {
            Contract::create($request->validated());
            return redirect('contracts');
        } catch (\Throwable $th) {
            //throw $th;
            return response(null, 500);
            // dd($th);
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
            $customers = Customer::get();
            $contract = Contract::findOrFail($id);
            return view('Contracts.edit')->with(compact('contract', 'customers'));
        } catch (\Throwable $th) {
            //throw $th;
            return response(null, 500);
            // dd($th);
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(ContractRequest $request, string $id)
    {
        try {
            $contract = Contract::findOrFail($id);
            $contract->update($request->validated());
            return redirect('contracts');
        } catch (\Throwable $th) {
            //throw $th;
            // return response(null, 500);
            dd($th);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        try {
            Contract::findOrFail($id)->delete();
            return redirect('contracts');
        } catch (\Throwable $th) {
            //throw $th;
            return response(null, 500);
        }
    }
}

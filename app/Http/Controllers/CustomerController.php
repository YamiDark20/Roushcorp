<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Customer;
use Illuminate\Support\Str;

class CustomerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $customers = Customer::all();
        return view('customers.index', compact('customers'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('customers.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'rif' => 'required|unique:customers',
            'address' => 'required',
            'telephone' => ['required', 'regex:/0(2(12|3[4589]|4[0-9]|[5-8][1-9]|9[1-5])|(4(12|14|16|24|26)))-?\d{7}/'],
            'email' => 'required|unique:customers|email',
            'city' => 'required'
        ]);
        $customer = Customer::create($request->all());
        $customer->rif = Str::upper($request->get('tiporif')."-".$request->get('rif'));
        $customer->save();
        return redirect()->route('customers.edit', $customer)
        ->with('info', 'El cliente se ha creado exitosamente');
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
    public function edit(Customer $customer)
    {
        return view('customers.edit', compact('customer'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Customer $customer)
    {
        $request->validate([
            'name' => 'required',
            'rif' => "required|unique:customers,rif,$customer->id",
            'address' => 'required',
            'telephone' => 'required',
            'email' => "required|unique:customers,email,$customer->id",
            'city' => 'required'
        ]);
        $customer->update($request->all());
        return redirect()->route('customers.edit', $customer)
        ->with('info', 'El cliente se ha actualizado exitosamente');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}

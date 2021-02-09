<?php

namespace App\Http\Controllers\crud;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Customer;

class CustomerController extends Controller
{
    public function index()
    {
        $customers = \App\Customer::paginate(10);

        return view('admin.customers.index', compact('customers'));
    }

    public function create()
    {
        $customers = \App\Customer::all();

        return view('admin.customers.create', compact('customers'));
    }

    public function store(Request $request)
    {
        Customer::create([
            'name' => $request->name,
            'Address' => $request->Address,
        ]);

        flash('Cliente Cadastrado com Sucesso')->success();
        return redirect()->route('admin.customers.index');
    }

    public function edit($customer)
    {
        $customer = \App\Customer::find($customer);

        return view('admin.customers.edit', compact('customer'));
    }

    public function update(Request $request, $customer)
    {
        $data = $request->all();

        $customer = \App\Customer::find($customer);
        $customer->update($data);

        flash('Cliente Atualizado com Sucesso')->success();
        return redirect()->route('admin.customers.index');
    }

    public function destroy($customer)
    {
        $customer = \App\Customer::find($customer);
        $customer->delete();

        flash('Cliente Removido com Sucesso')->warning();
        return redirect()->route('admin.customers.index');
    }

}

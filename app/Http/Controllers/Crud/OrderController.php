<?php

namespace App\Http\Controllers\crud;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Order;

class OrderController extends Controller
{
    public function index()
    {
        $orders = \App\Order::all();

        return view('admin.orders.index')->with(['orders' => $orders]);
    }

    public function create()
    {
        $customers = \App\Customer::all();
        $products = \App\Product::all();

        return view('admin.orders.create')->with(['customers' => $customers, 'products' => $products]);
    }

    public function store(Request $request)
    {
        $order = Order::create([
            'customer_id' => $request->customer,
        ]);
        
        $products = $request->input('products', []);
        $amounts = $request->input('amounts', []);
        for ($product=0; $product < count($products); $product++) {
        if ($products[$product] != '') {
            $order->products()->attach($products[$product], ['amount' => $amounts[$product]]);
        }
    }

        flash('Pedido Cadastrado com Sucesso')->success();
        return redirect()->route('admin.orders.index');
    }

    public function edit($order)
    {
        $order = \App\Order::find($order);
        $customers = \App\Customer::all();
        $products = \App\Product::all();

        return view('admin.orders.edit')->with(['order' => $order, 'customers' => $customers, 'products' => $products]);
    }

    public function update(Request $request, $order)
    {
        //Atualizando Cliente
        $order = \App\Order::find($order);
        $order->customer_id = $request->customer;
        $order->update($request->all());
        //Removendo Produtos
        $products = $order->products;
        for ($product=0; $product < count($products); $product++) {
        if ($products[$product] != '') {
            $order->products()->detach($products[$product]);
        }}
        //Cadastrando novos Produtos
        $products = $request->input('products', []);
        $amounts = $request->input('amounts', []);
        for ($product=0; $product < count($products); $product++) {
        if ($products[$product] != '') {
            $order->products()->attach($products[$product], ['amount' => $amounts[$product]]);
        }}

        flash('Pedido Atualizado com Sucesso')->success();
        return redirect()->route('admin.orders.index');
    }

    public function destroy($order)
    {
        $order = \App\Order::find($order);
        $order->delete();

        flash('Pedido Removido com Sucesso')->warning();
        return redirect()->route('admin.orders.index');
    }
    
}

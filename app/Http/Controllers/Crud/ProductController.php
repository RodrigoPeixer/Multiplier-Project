<?php

namespace App\Http\Controllers\crud;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Product;

class ProductController extends Controller
{
    public function index()
    {
        $products = \App\Product::paginate(10);

        return view('admin.products.index', compact('products'));
    }

    public function create()
    {
        return view('admin.products.create', compact('products'));
    }

    public function store(Request $request)
    {
        Product::create([
            'name' => $request->name,
            'description' => $request->description,
            'price' => $request->price,
        ]);

        flash('Produto Cadastrado com Sucesso')->success();
        return redirect()->route('admin.products.index');
       
    }

    public function edit($product)
    {
        $product = \App\Product::find($product);

        return view('admin.products.edit', compact('product'));
    }

    public function update(Request $request, $product)
    {
        $data = $request->all();

        $product = \App\Product::find($product);
        $product->update($data);

        flash('Produto Atualizado com Sucesso')->success();
        return redirect()->route('admin.products.index');
    }

    public function destroy($product)
    {
        $product = \App\Product::find($product);
        $product->delete();

        flash('Produto Removido com Sucesso')->warning();
        return redirect()->route('admin.products.index');
    }

}

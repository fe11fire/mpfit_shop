<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProductFormRequest;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function __invoke(Product $product)
    {
        return view('product.index', [
            'product' => $product,
        ]);
    }

    public function changeNew()
    {
        return view(
            'product.change',
            [
                'product' => null,
                'categories' => Category::all(),
            ]
        );
    }

    public function changeUpdate(Product $product)
    {
        // dd($product->priceUpdate());
        return view(
            'product.change',
            [
                'product' => $product,
                'categories' => Category::all(),
            ]
        );
    }

    public function create(ProductFormRequest $request)
    {
        $validated = $request->validated();
        // dd($validated);
        $product = Product::create($validated);
        return redirect()->route('catalog');
    }

    public function update(Product $product, ProductFormRequest $request)
    {
        $validated = $request->validated();
        // dd($validated);
        $product = Product::find($product->id);
        $product->update($validated);
        $product->save();
        return redirect()->route('product', $product->slug);
    }

    public function delete(Product $product)
    {
        $product->delete();
        return redirect()->route('catalog');
    }
}

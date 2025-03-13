<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class CatalogController extends Controller
{
    public function __invoke()
    {
        $products = Product::query()
            ->select('id', 'title', 'slug', 'price', 'category_id')->with('category')->get();

        return view(
            'catalog.index',
            [
                'products' => $products,
            ]
        );
    }
}

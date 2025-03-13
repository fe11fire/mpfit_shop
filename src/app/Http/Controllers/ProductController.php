<?php

namespace App\Http\Controllers;

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
}

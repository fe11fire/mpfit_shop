<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Product;
use App\Services\ValueObjects\Status;
use App\Http\Requests\OrderFormRequest;

class OrderController extends Controller
{
    public function __invoke()
    {
        return view(
            'order.index',
            [
                'orders' => Order::all(),
            ]
        );
    }

    public function changeNew(Product $product)
    {
        return view(
            'order.change',
            [
                'order' => null,
                'product' => $product,
                'statuses' => Status::cases(),
            ]
        );
    }

    public function changeUpdate(Order $order)
    {
        // dd($product->priceUpdate());
        return view(
            'order.change',
            [
                'order' => $order,
                'product' => null,
                'statuses' => Status::cases(),
            ]
        );
    }

    public function create(Product $product, OrderFormRequest $request)
    {
        $validated = $request->validated();
        $validated += [
            'product_price' => $product->price->value(),
            'product_title' => $product->title,
            'product_id' => $product->id,
        ];
        // dd($validated);
        $product = Order::create($validated);
        return redirect()->route('orders');
    }

    public function update(Order $order, OrderFormRequest $request)
    {
        $validated = $request->validated();
        $order = Order::find($order->id);
        $order->update($validated);
        $order->save();
        return redirect()->route('orders');
    }
}

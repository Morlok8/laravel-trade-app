<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Order;


class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $orders = Order::with('product')->get();
        return view('orders.index', ["orders" => $orders]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        $products = Product::all();
        return view('orders.create', ["products"=> $products]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        
       $validatedData =  $request->validate([
            'FIO' => 'required|string|max:255',
            'order_date' => 'required|date',
            //'status' => 'required|string',
            'comment' => 'nullable|string',
            'number' => 'required|numeric',
            //'price' => 'required|numeric|min:0',
            'product_id' => 'required|numeric|exists:products,id',
        ]);
        $product = Product::findOrFail($validatedData['product_id']);
        $validatedData['price'] = $product['price'] * $validatedData['number'];
        $validatedData['status'] = 0;

        Order::create($validatedData);
        return redirect()->route('orders.index')->with('success', 'Заказ создан!');
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
        //
        $order = Order::find($id);
        $product = Product::find($order->product_id);
        return view('orders.edit', ["order" => $order, "product" => $product]);

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(string $id)
    {
        //
        $order = Order::find($id);

        $order->update(['status' => true]);
        return redirect()->route('orders.index')->with('success', 'Заказ обновлён!');
    }
}

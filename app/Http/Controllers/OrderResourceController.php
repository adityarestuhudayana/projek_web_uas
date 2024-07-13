<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Comment;
use App\Models\Order;
use App\Models\OrderHistories;
use App\Models\Product;
use App\Models\SpendingHistory;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class OrderResourceController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('products.orders', [
            'orders' => Order::query()->where('buyer_id', Auth::user()->id)->get()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'email' => ['required'],
            'phone' => ['required'],
            'address' => ['required'],
        ]);

        $validated['first_name'] = explode(' ', $request->name)[0];
        $validated['last_name'] = explode(' ', $request->name);
        $validated['last_name'] = end($validated['last_name']);

        $user = User::query()->where('id', Auth::user()->id)->first();
        $user->update($validated);

        $id = explode('x', $request->product_id);
        array_pop($id);

        foreach ($id as $item) {
            $product = Product::query()->where('id', $item)->first();
            $cart = Cart::query()->where('buyer_id', Auth::user()->id)->get()[0];
            Order::create([
                'payment' => $request->payment,
                'product_id' => $product->id,
                'buyer_id' => $request->buyer_id,
                'order_amount' => $cart->order_amount,
                'seller_id' => $cart->product->user_id
            ]);
            $cart->delete();
        }


        return redirect('orders')->with('success', 'Pesanan sedang diproses');
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
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $order = Order::query()->firstWhere('id', $id);
        $order->update($request->all());
        if ($request->status == 'diterima') {
            $product = Product::query()->where('id', $order->product_id)->first();
            $product->update([
                'stock' => $product->stock -= $order->order_amount,
                'sold' => $product->sold += $order->order_amount,
            ]);

            $date = date('d');
            $cost = $order->order_amount * $order->product->price;
            $histories = SpendingHistory::query()->firstWhere('date', $date);
            if ($histories) {
                $histories->update([
                    'cost' => $histories->cost += $cost
                ]);
            } else {
                SpendingHistory::create([
                    'date' => $date,
                    'cost' => $cost,
                    'user_id' => $order->buyer_id,
                ]);
            }
        }
        return redirect('products')->with('success', 'Status berhasil diubah');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $order = Order::query()->where('id', $id)->where('buyer_id', Auth::user()->id)->first();
        $order->delete();
        return redirect()->back()->with('success', 'Pesanan dibatalkan');
    }

    public function delete(Request $request, string $id)
    {
        $validated = $request->validate([
            'comment' => ['required'],
            'product_id' => ['required'],
            'user_id' => ['required']
        ]);

        Comment::create($validated);

        $order = Order::query()->where('id', $id)->where('buyer_id', Auth::user()->id)->first();
        OrderHistories::create([
            'payment' => $order->payment,
            'order_amount' => $order->order_amount,
            'status' => $order->status,
            'product_id' => $order->product_id,
            'buyer_id' => $order->buyer_id,
            'seller_id' => $order->seller_id
        ]);
        $order->delete();
        return redirect()->back()->with('success', 'Terima kasih sudah memesan');
    }
}

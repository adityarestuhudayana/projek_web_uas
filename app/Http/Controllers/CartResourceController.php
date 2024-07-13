<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CartResourceController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('products.cart', [
            'carts' => Cart::query()->where('buyer_id', Auth::user()->id)->get()
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
        if($request->order_amount == 0) {
            return redirect()->back()->with('errors', 'Belum memasukan jumlah pesanan');
        }
        $product = Product::query()->firstWhere('id', $request->product_id);
        if($product->user_id == Auth::user()->id){
            return redirect()->back()->with('errors', 'Akses ditolak');
        }
        Cart::create($request->all());
        return redirect('cart')->with('success', 'Berhasil menambahkan ke keranjang');
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
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $cart = Cart::query()->where('buyer_id', Auth::user()->id)->where('id', $id)->first();
        if(!$cart) {
            return redirect()->back()->with('errors', 'Not found');
        }
        $cart->delete();
        return redirect()->back()->with('success', 'Berhasil menghapus');
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Order;
use App\Models\Product;
use App\Models\Cart;
use App\Models\OrderHistories;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProductResourceController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $carts = [];
        $products = Product::query()->where('user_id', Auth::user()->id)->get();
        foreach ($products as $product) {
        }
        return view('products.my_products', [
            'categories' => Category::query()->latest()->get(),
            'products' => Product::query()->where('user_id', Auth::user()->id)->latest()->paginate(5),
            'orders' => Order::query()->where('seller_id', Auth::user()->id)->latest()->get(),
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
            'product_name' => ['required'],
            'description' => ['required'],
            'stock' => ['required'],
            'price' => ['required'],
            'category_id' => ['required'],
            'image' => ['required'],
        ]);

        $validated['user_id'] = Auth::user()->id;
        $validated['image'] = 'storage/' . $request->file('image')->store('images');
        Product::create($validated);

        return redirect('products')->with('success', 'Berhasil menambahkan barang baru');
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
        $product = Product::query()->where('id', $id)->where('user_id', Auth::user()->id)->first();

        if (!$product) {
            return redirect()->back()->with('errors', 'Akses ditolak');
        }

        return view('products.edit_product', [
            'product' => $product,
            'categories' => Category::query()->latest()->get(),
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validated = $request->validate([
            'product_name' => ['required'],
            'description' => ['required'],
            'stock' => ['required'],
            'price' => ['required'],
            'category_id' => ['required'],
        ]);

        $product = Product::query()->where('id', $id)->where('user_id', Auth::user()->id)->first();

        if ($request->file('image')) {
            $validated['image'] = 'storage/' . $request->file('image')->store('images');
        } else {
            $validated['image'] = $product->image;
        }

        $product->update($validated);
        return redirect('products')->with('success', 'Data produk berhasil diubah');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $product = Product::query()->where('id', $id)->where('user_id', Auth::user()->id)->first();
        if (!$product) {
            return redirect()->back()->with('errors', 'Akses ditolak');
        }
        $order = Order::query()->firstWhere('product_id', $product->id);
        if($order) {
            $order->delete();
        }
        $product->delete();
        return redirect('products')->with('success', 'Produk sudah dihapus');
    }
}

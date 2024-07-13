<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Comment;
use App\Models\Order;
use App\Models\OrderHistories;
use App\Models\Product;
use App\Models\SpendingHistory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProductController extends Controller
{
    public function home() {
        if(request('sort')) {
            return view('products.products', [
                'products' => Product::query()->filters(request(['category', 'search']))->orderBy('price', request('sort'))->paginate(8)->withQueryString(),
                'categories' => Category::query()->latest()->get(),
                'frequently_purchased_items' => Product::query()->orderBy('sold', 'desc')->paginate(4)
            ]);
        }
        return view('products.products', [
            'products' => Product::query()->filters(request(['category', 'search']))->latest()->paginate(8)->withQueryString(),
            'categories' => Category::query()->latest()->get(),
            'frequently_purchased_items' => Product::query()->orderBy('sold', 'desc')->paginate(4)
        ]);
    }

    public function detail($id) {
        $product = Product::query()->firstWhere('id', $id);
        return view('products.product_detail', [
            'product' => $product,
            'comments' => Comment::query()->where('product_id', $product->id)->latest()->get()
        ]);
    }

    public function confirm($id) {
        return view('products.confirm', [
            'product_id' => $id
        ]);
    }

    public function history() {
        return view('products.history', [
            'orders' => OrderHistories::query()->where('buyer_id', Auth::user()->id)->latest()->get(),
            'spending_histories' => SpendingHistory::query()->where('user_id', Auth::user()->id)->get(),
            'products' => Product::query()->where('user_id', Auth::user()->id)->get()
        ]);
    }
}

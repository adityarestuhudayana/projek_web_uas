@extends('layouts.main')

@section('container')
    <div class="pt-[2rem] px-10">
        <h1 class="text-2xl mb-5">Keranjang</h1>

        <?php
        $qty = 0;
        $total = 0;
        $id = '';
        ?>

        <div class="relative overflow-x-auto
         sm:rounded-lg">
            <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
                <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                    <tr>
                        <th scope="col" class="px-6 py-3">
                            Gambar
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Produk
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Qty
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Harga
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Aksi
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @if ($carts->count())
                        @foreach ($carts as $cart)
                            <tr
                                class="bg-white border-b dark:bg-gray-800 dark:border-gray-300 hover:bg-gray-50 dark:hover:bg-gray-600">
                                <td class="p-4">
                                    <img src="{{ asset($cart->product->image) }}" class="w-16 md:w-32 max-w-full max-h-full"
                                        alt="Apple Watch">
                                </td>
                                <td class="px-6 py-4 font-semibold text-gray-900 dark:text-white">
                                    {{ $cart->product->product_name }}
                                </td>
                                <td class="px-6 py-4">
                                    {{ $cart->order_amount }}
                                </td>
                                <td class="px-6 py-4 font-semibold text-gray-900 dark:text-white">
                                    Rp {{ number_format($cart->product->price) }}
                                </td>
                                <td class="px-6 py-4">
                                    <form action="/cart/{{ $cart->id }}" method="POST" onsubmit="confirmDelete(event)">
                                        @csrf
                                        @method('delete')
                                        <button
                                            class="font-medium text-red-600 dark:text-red-500 hover:underline">Cancel</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    @else
                        <div class="flex items-center p-4 mb-4 text-sm text-blue-800 rounded-lg bg-blue-50 dark:bg-gray-800 dark:text-blue-400"
                            role="alert">
                            <svg class="flex-shrink-0 inline w-4 h-4 me-3" aria-hidden="true"
                                xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                                <path
                                    d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z" />
                            </svg>
                            <span class="sr-only">Info</span>
                            <div>
                                <span class="font-medium">Info!</span> Kamu belum memesan apapun
                            </div>
                        </div>
                    @endif
                </tbody>
            </table>
        </div>


        <p class="text-2xl my-5">Ringkasan belanja</p>


        <div class="relative overflow-x-auto">
            <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
                <thead class="text-xs text-gray-700 uppercase bg-gray-100 dark:bg-gray-700 dark:text-gray-400">
                    <tr>
                        <th scope="col" class="px-6 py-3 rounded-s-lg">
                            Product name
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Qty
                        </th>
                        <th scope="col" class="px-6 py-3 rounded-e-lg">
                            Price
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($carts as $cart)
                        <?php
                        $qty += $cart->order_amount;
                        $total += $cart->product->price * $cart->order_amount;
                        $id .= $cart->product->id . 'x';
                        
                        ?>
                        <tr class="bg-white dark:bg-gray-800">
                            <th scope="row"
                                class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                {{ $cart->product->product_name }}
                            </th>
                            <td class="px-6 py-4">
                                {{ $cart->order_amount }}
                            </td>
                            <td class="px-6 py-4">
                                Rp {{ number_format($cart->product->price * $cart->order_amount) }}
                            </td>
                        </tr>
                    @endforeach
                </tbody>
                <tfoot>
                    <tr class="font-semibold text-gray-900 dark:text-white">
                        <th scope="row" class="px-6 py-3 text-base">Total</th>
                        <td class="px-6 py-3">{{ $qty }}</td>
                        <td class="px-6 py-3">Rp {{ number_format($total) }}</td>
                    </tr>
                    <tr class="font-semibold text-gray-900 dark:text-white">
                        <th scope="row" class="px-6 py-3 text-base">
                            <a href="/confirm/{{ $id }}"
                                class="my-5 hover:shadow-form rounded-md bg-blue-500 text-white py-3 px-8 text-center text-base font-semibold outline-none">
                                Checkout
                            </a>
                        </th>
                    </tr>
                </tfoot>
            </table>
        </div>


    </div>
@endsection

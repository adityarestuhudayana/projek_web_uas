@extends('layouts.main')

@section('container')
    <div class="pt-[2rem] px-10">
        <?php
        $qty = 0;
        $total = 0;
        $id = '';
        $order_id = 0;
        ?>

        <p class="text-2xl my-5">Pesanan saya</p>

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
                            Pembayaran
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Status
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Aksi
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @if ($orders->count())
                        @foreach ($orders as $order)
                            <tr
                                class="bg-white border-b dark:bg-gray-800 dark:border-gray-300 hover:bg-gray-50 dark:hover:bg-gray-600">
                                <td class="p-4">
                                    <img src="{{ asset($order->product->image) }}"
                                        class="w-16 md:w-32 max-w-full max-h-full" alt="Apple Watch">
                                </td>
                                <td class="px-6 py-4 font-semibold text-gray-900 dark:text-white">
                                    {{ $order->product->product_name }}
                                </td>
                                <td class="px-6 py-4">
                                    {{ $order->order_amount }}
                                </td>
                                <td class="px-6 py-4 font-semibold text-gray-900 dark:text-white">
                                    Rp {{ number_format($order->product->price * $order->order_amount) }}
                                </td>
                                <td class="px-6 py-4 font-semibold text-gray-900 dark:text-white">
                                    {{ $order->payment }}
                                </td>
                                <td class="px-6 py-4 font-semibold text-gray-900 dark:text-white">
                                    @if ($order->status == 'sedang proses')
                                        <button class="border-2 border-red-500 p-2 text-red-500 rounded-md">
                                            {{ Str::title($order->status) }}
                                        </button>
                                    @elseif($order->status == 'diterima')
                                        <button class="border-2 border-green-500 p-2 text-green-500 rounded-md">
                                            {{ Str::title($order->status) }}
                                        </button>
                                    @else
                                        <button class="border-2 border-yellow-500 p-2 text-yellow-500 rounded-md">
                                            {{ Str::title($order->status) }}
                                        </button>
                                    @endif
                                </td>
                                <td class="px-6 py-4">
                                    @if ($order->status == 'diterima')
                                        <!-- Modal toggle -->
                                        <button data-modal-target="default-modal" data-modal-toggle="default-modal"
                                            class="font-medium text-green-600 dark:text-green-500 hover:underline"
                                            type="button" onclick="completeProductIdInput(event)">
                                            Beri komentar
                                            <p id="order_id" class="hidden">{{ $order->id }}</p>
                                            <p id="product_id" class="hidden">{{ $order->product->id }}</p>
                                        </button>
                                    @else
                                        <form action="/orders/{{ $order->id }}" method="POST"
                                            onsubmit="confirmDelete(event)">
                                            @csrf
                                            @method('delete')
                                            <button
                                                class="font-medium text-red-600 dark:text-red-500 hover:underline">Cancel</button>
                                        </form>
                                    @endif
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

        <!-- Main modal -->
        <div id="default-modal" tabindex="-1" aria-hidden="true"
            class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
            <div class="relative p-4 w-full max-w-2xl max-h-full">
                <!-- Modal content -->
                <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                    <!-- Modal header -->
                    <div class="flex items-center justify-between p-4 md:p-5 border-b rounded-t dark:border-gray-300">
                        <h3 class="text-xl font-semibold text-gray-900 dark:text-white">
                            Beri komentar
                        </h3>
                        <button type="button"
                            class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white"
                            data-modal-hide="default-modal">
                            <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                                viewBox="0 0 14 14">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                            </svg>
                            <span class="sr-only">Close modal</span>
                        </button>
                    </div>
                    <!-- Modal body -->
                    <div class="p-4 md:p-5 space-y-4">
                        <form action="/orders/delete/" method="POST" id="comment_form">
                            <label for="message"
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Komentar</label>
                            <textarea id="message" rows="4" name="comment"
                                class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                placeholder=""></textarea>

                    </div>
                    <!-- Modal footer -->
                    <div class="flex items-center p-4 md:p-5 border-t border-gray-200 rounded-b dark:border-gray-600">

                        @csrf
                        @method('delete')
                        <input type="text" name="user_id" class="hidden" value="{{ auth()->user()->id }}">
                        <input type="text" name="product_id" class="hidden" value="" id="product_id_input">
                        <button data-modal-hide="default-modal" type="button" onclick="checkOrderId(event)"
                            class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Kirim</button>
                        </form>
                        <button data-modal-hide="default-modal" type="button"
                            class="py-2.5 px-5 ms-3 text-sm font-medium text-gray-900 focus:outline-none bg-white rounded-lg border border-gray-200 hover:bg-gray-100 hover:text-blue-700 focus:z-10 focus:ring-4 focus:ring-gray-100 dark:focus:ring-gray-700 dark:bg-gray-800 dark:text-gray-400 dark:border-gray-600 dark:hover:text-white dark:hover:bg-gray-700">Batal</button>
                    </div>
                </div>
            </div>
        </div>


    </div>
@endsection

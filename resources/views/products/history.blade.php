@extends('layouts.main')

@section('container')
    <?php
    $date = '';
    $cost = '';
    
    foreach ($spending_histories as $item) {
        $date .= $item->date . ',';
        $cost .= $item->cost . ',';
    }
    
    $product_amount = '';
    $product_name = '';
    
    foreach ($products as $product) {
        $product_amount .= $product->sold . ',';
        $product_name .= $product->product_name . ',';
    }
    
    ?>
    <div class="pt-2">
        <div class="lg:flex gap-10 items-end">
            <div class="lg:w-1/2">
                <p class="ml-10 font-semibold text-xl">Pengeluaran saya selama seminggu</p>
                <p id="spending_date" class="hidden">{{ $date }}</p>
                <p id="spending_cost" class="hidden">{{ $cost }}</p>
                <canvas id="myChart"></canvas>
            </div>
            <div class="lg:w-1/2 h-[20rem]">
                @if ($products->count())
                    <p class="ml-10 font-semibold text-xl">Produk saya yang sering dibeli</p>
                @endif
                <p id="frequently_purchased_items" class="hidden">{{ $product_amount }}</p>
                <p id="product_name" class="hidden">{{ $product_name }}</p>
                <canvas id="myChart2"></canvas>
            </div>
        </div>



        <div class="relative overflow-x-auto pt-10 mt-10
         sm:rounded-lg">
            <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
                <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                    <tr>
                        <th scope="col" class="px-6 py-3">
                            Gambar
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Tanggal diterima/dibatalkan
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Produk
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Qty
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Total
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Pembayaran
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Status
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
                                    {{ date('d-m-Y', strtotime($order->updated_at)) }}
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
                                            Dibatalkan
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


        <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
        <script>
            const ctx = document.getElementById('myChart');
            const ctx2 = document.getElementById('myChart2');

            const spending_date = document.getElementById('spending_date').innerText
            const spending_datex = spending_date.split(',')
            const spending_datexx = spending_datex.slice(0, -1)

            const spending_cost = document.getElementById('spending_cost').innerText
            const spending_costx = spending_cost.split(',')
            const spending_costxx = spending_costx.slice(0, -1)

            const frequentlyPurchasedItems = document.getElementById('frequently_purchased_items').innerText
            const frequentlyPurchasedItemsx = frequentlyPurchasedItems.split(',')
            const frequentlyPurchasedItemsxx = frequentlyPurchasedItemsx.slice(0, -1)

            const productName = document.getElementById('product_name').innerText
            const productNamex = productName.split(',')
            const productNamexx = productNamex.slice(0, -1)

            new Chart(ctx, {
                type: 'line',
                data: {
                    labels: spending_datexx,
                    datasets: [{
                        label: 'Pengeluaran minggu ini',
                        data: spending_costxx,
                        borderWidth: 1
                    }]
                },
                options: {
                    scales: {
                        y: {
                            beginAtZero: true
                        }
                    }
                }
            });

            new Chart(ctx2, {
                type: 'doughnut',
                data: {
                    labels: productNamexx,
                    datasets: [{
                        label: 'Terjual: ',
                        data: frequentlyPurchasedItemsxx,
                        borderWidth: 1
                    }]
                },
                options: {

                }
            });
        </script>

    </div>
@endsection

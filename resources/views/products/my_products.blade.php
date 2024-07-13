@extends('layouts.main')

@section('container')
    <div class="pt-[2rem] px-10">

        <?php
        $qty = 0;
        $total = 0;
        $id = '';
        ?>

        <!-- Modal toggle -->
        <button data-modal-target="crud-modal" data-modal-toggle="crud-modal"
            class="my-5 block text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800"
            type="button">
            Tambah barang
        </button>

        <!-- Main modal -->
        <div id="crud-modal" tabindex="-1" aria-hidden="true"
            class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
            <div class="relative p-4 w-full max-w-md max-h-full">
                <!-- Modal content -->
                <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                    <!-- Modal header -->
                    <div class="flex items-center justify-between p-4 md:p-5 border-b rounded-t dark:border-gray-600">
                        <h3 class="text-lg font-semibold text-gray-900 dark:text-white">
                            Tambah barang baru
                        </h3>
                        <button type="button"
                            class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white"
                            data-modal-toggle="crud-modal">
                            <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                                viewBox="0 0 14 14">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                            </svg>
                            <span class="sr-only">Close modal</span>
                        </button>
                    </div>
                    <!-- Modal body -->
                    <form class="p-4 md:p-5" action="/products" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="grid gap-4 mb-4 grid-cols-2">
                            <div class="col-span-2">
                                <label for="name"
                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Nama barang</label>
                                <input type="text" name="product_name" id="name"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                    placeholder="Masukan nama barang" required="">
                            </div>
                            <div class="col-span-2 sm:col-span-1">
                                <label for="price"
                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Harga</label>
                                <input type="number" name="price" id="price"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                    placeholder="Rp 50.000" required="">
                            </div>
                            <div class="col-span-2 sm:col-span-1">
                                <label for="price"
                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Stok</label>
                                <input type="number" name="stock" id="price"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                    placeholder="10" required="">
                            </div>
                            <div class="col-span-2 sm:col-span-1">
                                <label for="category"
                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Kategori</label>
                                <select id="category" name="category_id"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500">
                                    <option selected="">Select category</option>
                                    @foreach ($categories as $category)
                                        <option value="{{ $category->id }}">{{ Str::title($category->category_name) }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-span-2">
                                <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white"
                                    for="file_input">Gambar</label>
                                <input
                                    class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400"
                                    id="file_input" type="file" name="image">
                            </div>
                            <div class="col-span-2">
                                <label for="description"
                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Deskripsi
                                    Produk</label>
                                <textarea id="description" rows="4" name="description"
                                    class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                    placeholder="Tuliskan deskripsi produk mu disini"></textarea>
                            </div>
                        </div>
                        <button type="submit"
                            class="text-white inline-flex items-center bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                            <svg class="me-1 -ms-1 w-5 h-5" fill="currentColor" viewBox="0 0 20 20"
                                xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd"
                                    d="M10 5a1 1 0 011 1v3h3a1 1 0 110 2h-3v3a1 1 0 11-2 0v-3H6a1 1 0 110-2h3V6a1 1 0 011-1z"
                                    clip-rule="evenodd"></path>
                            </svg>
                            Kirim
                        </button>
                    </form>
                </div>
            </div>
        </div>




        <div class="relative overflow-x-auto sm:rounded-lg">
            <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
                <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                    <tr>
                        <th scope="col" class="px-6 py-3">
                            Gambar
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Nama produk
                        </th>
                        <th scope="col" class="px-6 py-3">
                            <div class="flex items-center">
                                Stok
                            </div>
                        </th>
                        <th scope="col" class="px-6 py-3">
                            <div class="flex items-center">
                                Kategori
                            </div>
                        </th>
                        <th scope="col" class="px-6 py-3">
                            <div class="flex items-center">
                                Harga
                            </div>
                        </th>
                        <th scope="col" class="px-6 py-3">
                            <div class="flex items-center">
                                Aksi
                            </div>
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @if ($products->count())
                        @foreach ($products as $product)
                            <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-300">
                                <td class="px-6 py-4">
                                    <img src="{{ asset($product->image) }}" alt="" width="50">
                                </td>
                                <th scope="row"
                                    class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                    {{ $product->product_name }}
                                </th>
                                <td class="px-6 py-4">
                                    {{ $product->stock }}
                                </td>
                                <td class="px-6 py-4">
                                    {{ Str::title($product->category->category_name) }}
                                </td>
                                <td class="px-6 py-4">
                                    Rp {{ number_format($product->price) }}
                                </td>
                                <td class="px-6 py-4">
                                    <a href="/products/{{ $product->id }}/edit"
                                        class="font-medium text-blue-600 dark:text-blue-500 text-xl mx-2 hover:underline"><i
                                            class="fa-regular fa-pen-to-square"></i></a>

                                    <form action="/products/{{ $product->id }}" method="POST" class="inline-block"
                                        onsubmit=" confirmDelete(event)">
                                        @csrf
                                        @method('delete')
                                        <button type="submit" id="delete"
                                            class="font-medium text-red-600 dark:text-blue-500 text-xl mx-2 hover:underline"><i
                                                class="fa-regular fa-trash-can"></i></button>
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
                                <span class="font-medium">Info!</span> Kamu belum mempunyai produk
                            </div>
                        </div>
                    @endif
                </tbody>
            </table>
            <div class="mt-5">
                {{ $products->links() }}
            </div>
        </div>

        <p class="text-2xl mb-5 mt-10">Yang pesan product anda</p>

        <div class="relative overflow-x-auto
         sm:rounded-lg">
            <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
                <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                    <tr>
                        <th scope="col" class="px-6 py-3">
                            Gambar
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Nama pembeli
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
                            Alamat
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
                                    <img src="{{ asset($order->product->image) }}" class="w-16 max-w-full max-h-full"
                                        alt="Apple Watch">
                                </td>
                                <td class="px-6 py-4 font-semibold text-gray-900 dark:text-white">
                                    {{ $order->user->first_name . ' ' . $order->user->last_name }}
                                </td>
                                <td class="px-6 py-4 font-semibold text-gray-900 dark:text-white">
                                    {{ $order->product->product_name }}
                                </td>
                                <td class="px-6 py-4">
                                    {{ $order->order_amount }}
                                </td>
                                <td class="px-6 py-4 font-semibold text-gray-900 dark:text-white">
                                    {{ number_format($order->product->price * $order->order_amount) }}
                                </td>
                                <td class="px-6 py-4 font-semibold text-gray-900 dark:text-white">
                                    {{ $order->payment }}
                                </td>
                                <td class="px-6 py-4 font-semibold text-gray-900 dark:text-white">
                                    {{ $order->user->address }}
                                </td>
                                <td class="px-6 py-4">
                                    <form action="/orders/{{ $order->id }}" method="POST">
                                        @csrf
                                        @method('put')
                                        <select id="countries" name="status" onchange="this.form.submit()"
                                            class="bg-gray-50 border border-blue-500 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                            <option value="sedang proses"
                                                {{ $order->status == 'sedang proses' ? 'selected' : '' }}>Sedang proses
                                            </option>
                                            <option value="dalam perjalanan"
                                                {{ $order->status == 'dalam perjalanan' ? 'selected' : '' }}>Dalam
                                                perjalanan</option>
                                            <option value="diterima" {{ $order->status == 'diterima' ? 'selected' : '' }}>
                                                Diterima</option>
                                        </select>
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
                                <span class="font-medium">Info!</span> Belum ada orderan
                            </div>
                        </div>
                    @endif
                </tbody>
            </table>
        </div>

    </div>
@endsection

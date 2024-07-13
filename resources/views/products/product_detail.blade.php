@extends('layouts.main')

@section('container')
    <div class="pt-2">

        <div id="stock" class="hidden">{{ $product->stock }}</div>

        <section class="text-gray-700 body-font overflow-hidden bg-white">
            <div class="container px-5 py-2 mx-auto">
                <div class="lg:w-[85%] block lg:flex gap-5">
                    <img alt="ecommerce" class="lg:w-[40%] object-cover object-center rounded border border-gray-200"
                        src="{{ asset($product->image) }}">
                    <div class="w-full">
                        <h2 class="text-sm title-font text-gray-500 tracking-widest">Nama barang</h2>
                        <h1 class="text-gray-900 text-3xl title-font font-medium mb-1">{{ $product->product_name }}</h1>
                        <div class="flex mb-4">
                            <span class="flex items-center">
                                <i class="fa-solid fa-cubes text-xl"></i>
                                <span class="text-gray-600 ml-3">Stok: <span class="font-bold"
                                        id="stock">{{ $product->stock }}</span></span>
                            </span>
                        </div>
                        <p class="leading-relaxed">
                            {{ $product->description }}
                        </p>
                        <div class="flex mt-6 items-center pb-5 border-b-2 border-gray-200 mb-5">
                            <div class="flex items-center">
                                <button id="decrement"
                                    class="inline-flex items-center justify-center p-1 me-3 text-sm font-medium h-6 w-6 text-gray-500 bg-white border border-gray-300 rounded-full focus:outline-none hover:bg-gray-100 focus:ring-4 focus:ring-gray-200 dark:bg-gray-800 dark:text-gray-400 dark:border-gray-600 dark:hover:bg-gray-700 dark:hover:border-gray-600 dark:focus:ring-gray-700"
                                    type="button">
                                    <span class="sr-only">Quantity button</span>
                                    <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                        fill="none" viewBox="0 0 18 2">
                                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                            stroke-width="2" d="M1 1h16" />
                                    </svg>
                                </button>
                                <div>
                                    <input type="number" id="order_amount"
                                        class="bg-gray-50 w-14 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block px-2.5 py-1 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                        placeholder="0" required disabled />
                                </div>
                                <button id="increment"
                                    class="inline-flex items-center justify-center h-6 w-6 p-1 ms-3 text-sm font-medium text-gray-500 bg-white border border-gray-300 rounded-full focus:outline-none hover:bg-gray-100 focus:ring-4 focus:ring-gray-200 dark:bg-gray-800 dark:text-gray-400 dark:border-gray-600 dark:hover:bg-gray-700 dark:hover:border-gray-600 dark:focus:ring-gray-700"
                                    type="button">
                                    <span class="sr-only">Quantity button</span>
                                    <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                        fill="none" viewBox="0 0 18 18">
                                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                            stroke-width="2" d="M9 1v16M1 9h16" />
                                    </svg>
                                </button>
                            </div>
                        </div>
                        @if ($product->stock == 0)
                            <div class="flex items-center p-4 mb-4 text-sm text-red-800 rounded-lg bg-red-50 dark:bg-gray-800 dark:text-red-400"
                                role="alert">
                                <svg class="flex-shrink-0 inline w-4 h-4 me-3" aria-hidden="true"
                                    xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                                    <path
                                        d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z" />
                                </svg>
                                <span class="sr-only">Info</span>
                                <div>
                                    <span class="font-medium">Info!</span> Stok sudah habis.
                                </div>
                            </div>
                        @endif
                        <div class="flex">
                            <span class="title-font font-medium text-2xl text-gray-900">Rp
                                {{ number_format($product->price) }}</span>
                            <form action="/cart" method="POST"
                                class="flex ml-auto text-white {{ $product->stock == 0 ? 'bg-blue-300' : 'bg-blue-500 hover:bg-blue-700' }} border-0 py-2 px-6 focus:outline-none rounded">
                                @csrf
                                <input type="number" name="order_amount" value="0" id="order_amount_2" class="hidden">
                                <input type="text" name="product_id" value="{{ $product->id }}" class="hidden">
                                <input type="text" name="buyer_id" value="{{ auth()->user()->id }}" class="hidden">
                                <button class="" type="submit" {{ $product->stock == 0 ? 'disabled' : '' }}>Masukan
                                    keranjang</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </section>


        @foreach ($comments as $comment)
            <div class="flex items-start gap-2.5 mt-5 pl-5">
                <img class="w-8 h-8 rounded-full" src="{{ asset($comment->user->image) }}" alt="Jese image">
                <div
                    class="flex flex-col w-full max-w-[320px] leading-1.5 p-4 border-gray-200 bg-gray-100 rounded-e-xl rounded-es-xl dark:bg-gray-700">
                    <div class="flex items-center space-x-2 rtl:space-x-reverse">
                        <span
                            class="text-sm font-semibold text-gray-900 dark:text-white">{{ $comment->user->first_name . ' ' . $comment->user->last_name }}
                            {{ auth()->user()->first_name == $comment->user->first_name ? '(Anda)' : '' }}</span>
                        <span
                            class="text-sm font-normal text-gray-500 dark:text-gray-400">{{ $comment->created_at->diffForHumans() }}</span>
                    </div>
                    <p class="text-sm font-normal py-2.5 text-gray-900 dark:text-white">{{ $comment->comment }}</p>
                    <span class="text-sm font-normal text-gray-500 dark:text-gray-400">Pelanggan</span>
                </div>
            </div>
        @endforeach


        {{-- <div class="rating-css">
            <div class="star-icon">
                <input type="radio" value="1" name="product_rating" checked id="rating1">
                <label for="rating1" class="fa fa-star"></label>
                <input type="radio" value="2" name="product_rating" id="rating2">
                <label for="rating2" class="fa fa-star"></label>
                <input type="radio" value="3" name="product_rating" id="rating3">
                <label for="rating3" class="fa fa-star"></label>
                <input type="radio" value="4" name="product_rating" id="rating4">
                <label for="rating4" class="fa fa-star"></label>
                <input type="radio" value="5" name="product_rating" id="rating5">
                <label for="rating5" class="fa fa-star"></label>
            </div>
        </div> --}}

    </div>
@endsection

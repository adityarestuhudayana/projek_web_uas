@extends('layouts.main')

@section('container')
    <div class="pt-[2rem] px-4">

        <h1 class="text-2xl mb-5">Promo</h1>

        <div class="w-full">
            <div class="glide">
                <div class="glide__track" data-glide-el="track">
                    <ul class="glide__slides">
                        <li class="glide__slide"><img src="{{ asset('images/banner2.png') }}" alt="" class="w-full">
                        </li>
                        <li class="glide__slide"><img src="{{ asset('images/banner1.png') }}" alt="" class="w-full">
                        </li>
                        <li class="glide__slide"><img src="{{ asset('images/banner3.png') }}" alt="" class="w-full">
                        </li>
                        <li class="glide__slide"><img src="{{ asset('images/banner4.png') }}" alt="" class="w-full">
                        </li>
                    </ul>
                </div>
                <div class="glide__arrows flex justify-between absolute w-full top-[30%] lg:top-[40%]"
                    data-glide-el="controls">
                    <button
                        class="glide__arrow glide__arrow--left p-2 bg-[rgba(0,0,0,.3)] text-white text-4xl hover:text-blue-500"
                        data-glide-dir="<">&#10094;</button>
                    <button
                        class="glide__arrow glide__arrow--right p-2 bg-[rgba(0,0,0,.3)] text-white text-4xl hover:text-blue-500"
                        data-glide-dir=">">&#10095;</button>
                </div>
            </div>
        </div>


        <h1 class="text-2xl my-5">Filter Kategori</h1>

        {{-- Produk berdasarkan kategori --}}
        <div class="w-full">
            <div class="w-full h-full p-0 flex flex-wrap items-center gap-5">

                @foreach ($categories as $category)
                    <form action="/" class="">
                        <input type="text" name="category" value="{{ $category->category_name }}" class="hidden">
                        <button type="submit"
                            class="shadow-[0_0_2px_rgba(0,0,0,0.5)] w-[8.5rem] lg:w-[14rem] flex items-center justify-center py-2 rounded-md hover:bg-blue-400 duration-500 hover:text-white cursor-pointer"
                            id="drink">
                            <img src="{{ asset($category->image) }}" alt="Drink" class="w-[3rem] lg:w-[6rem]">
                            <h1 class="lg:text-xl">{{ $category->category_name }}</h1>
                        </button>
                    </form>
                @endforeach


            </div>
        </div>

        <form action="/" method="get">
            <div class="w-[10rem] my-7">
                <select id="countries" name="sort" onchange="this.form.submit()"
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                    <option value="">Sort by price</option>
                    <option value="asc">Dari termurah</option>
                    <option value="desc">Dari termahal</option>
                </select>
            </div>
        </form>

        @if (request('search'))
            <h1 class="text-2xl my-5">Hasil pencarian: <span class="font-bold">"{{ request('search') }}"</span></h1>
        @elseif(request('category'))
            <h1 class="text-2xl my-5">Produk dengan kategori: <span class="font-bold">{{ request('category') }}</span></h1>
        @else
            <h1 class="text-2xl my-5">Mungkin anda suka</h1>
        @endif

        <div class="flex gap-2 flex-wrap">

            @if ($products->count())
                @foreach ($products as $product)
                    <a href="/products/{{ $product->id }}"
                        class="w-[15rem] transform overflow-hidden rounded-lg bg-white dark:bg-slate-800 border-2 duration-300">
                        <img class="h-36 w-full object-cover object-center" src="{{ asset($product->image) }}"
                            alt="Product Image" />
                        <div class="p-4">
                            <h2 class="mb-2 text-lg font-medium dark:text-white text-gray-900">{{ $product->product_name }}
                            </h2>
                            <p class="mb-2 text-justify dark:text-gray-300 text-gray-700 text-sm">
                                {{ $product->description }}
                            </p>
                            <div class="flex items-center">
                                <p class="mr-2 text-lg font-semibold text-gray-900 dark:text-white">
                                    Rp {{ number_format($product->price) }}
                                </p>
                            </div>
                        </div>
                    </a>
                @endforeach
            @else
                <div class="flex items-center p-4 mb-4 text-sm text-red-800 rounded-lg bg-red-50 dark:bg-gray-800 dark:text-red-400"
                    role="alert">
                    <svg class="flex-shrink-0 inline w-4 h-4 me-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                        fill="currentColor" viewBox="0 0 20 20">
                        <path
                            d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z" />
                    </svg>
                    <span class="sr-only">Info</span>
                    <div>
                        <span class="font-medium">Info!</span> Tidak ditemukan
                    </div>
                </div>
            @endif

        </div>
        <div class="mt-[1rem] mb-[1rem] text-center">
            {{ $products->links() }}
        </div>

        <h1 class="text-2xl my-5">Sedang trend 🔥</h1>

        <div class="flex gap-2 flex-wrap">

            @foreach ($frequently_purchased_items as $item)
                <a href="/products/{{ $item->id }}"
                    class="w-[15rem] transform overflow-hidden rounded-lg bg-white dark:bg-slate-800 border-2 duration-300">
                    <img class="h-36 w-full object-cover object-center" src="{{ asset($item->image) }}"
                        alt="Product Image" />
                    <div class="p-4">
                        <h2 class="mb-2 text-lg font-medium dark:text-white text-gray-900">{{ $item->product_name }}
                        </h2>
                        <p class="mb-2 text-justify dark:text-gray-300 text-gray-700 text-sm">
                            {{ $item->description }}
                        </p>
                        <div class="flex items-center">
                            <p class="mr-2 text-lg font-semibold text-gray-900 dark:text-white">
                                Rp {{ number_format($item->price) }}
                            </p>
                        </div>
                    </div>
                </a>
            @endforeach

        </div>

    </div>
    <div class="bg-blue-500 mt-10 text-white px-10 py-4 w-full flex items-center justify-center">
        <p>Dibuat dengan ❤️ oleh <a href="#">Aditya. &copy; 2024 All rights reserved.</a></p>
    </div>
@endsection

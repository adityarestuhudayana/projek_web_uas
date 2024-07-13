@extends('layouts.main')

@section('container')
    <div class="pt-[2rem] px-10">
        <h1 class="text-2xl mb-5">Dashboard</h1>

        <div class="flex w-full gap-3">
            <a href="/users"
                class="shadow-[0_0_2px_rgba(0,0,0,0.5)] w-[8.5rem] lg:w-[14rem] flex items-center justify-center py-2 rounded-md hover:bg-orange-500 duration-500 hover:text-white cursor-pointer"
                id="drink">
                <img src="{{ asset('images/check-profile.png') }}" alt="Drink" class="w-[3.7rem] lg:w-[7rem]">
                <div>
                    <h1 class="lg:text-xl">Pengguna</h1>
                    <p class="font-bold text-2xl text-center">{{ $users_count }}</p>
                </div>
            </a>
            <a href="/categories"
                class="shadow-[0_0_2px_rgba(0,0,0,0.5)] w-[8.5rem] lg:w-[14rem] flex items-center justify-center py-2 rounded-md hover:bg-orange-500 duration-500 hover:text-white cursor-pointer"
                id="drink">
                <img src="{{ asset('images/boxes.png') }}" alt="Drink" class="w-[3.7rem] lg:w-[7rem]">
                <div>
                    <h1 class="lg:text-xl">Kategori</h1>
                    <p class="font-bold text-2xl text-center">{{ $categories_count }}</p>
                </div>
            </a>
            <a href="/comments"
                class="shadow-[0_0_2px_rgba(0,0,0,0.5)] w-[8.5rem] lg:w-[14rem] flex items-center justify-center py-2 rounded-md hover:bg-orange-500 duration-500 hover:text-white cursor-pointer"
                id="drink">
                <img src="{{ asset('images/chat.png') }}" alt="Drink" class="w-[3.7rem] lg:w-[7rem]">
                <div>
                    <h1 class="lg:text-xl">Komentar</h1>
                    <p class="font-bold text-2xl text-center">{{ $comments_count }}</p>
                </div>
            </a>
        </div>
    </div>
@endsection

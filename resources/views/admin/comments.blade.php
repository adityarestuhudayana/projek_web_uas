@extends('layouts.main')

@section('container')
    <div class="pt-[2rem] px-10">
        <h1 class="text-2xl mb-5">Komentar</h1>

        <div class="relative overflow-x-auto sm:rounded-lg">
            <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
                <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                    <tr>
                        <th scope="col" class="px-6 py-3">
                            No
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Pengguna
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Komentar
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Produk yang dikomentari
                        </th>
                        <th scope="col" class="px-6 py-3">
                            <div class="flex items-center">
                                Aksi
                            </div>
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @if ($comments->count())
                        @foreach ($comments as $comment)
                            <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-300">
                                <th scope="row"
                                    class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                    {{ $loop->iteration }}
                                </th>
                                <th scope="row"
                                    class="px-6 flex items-center gap-2 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                    <img src="{{ asset($comment->user->image) }}" alt="" width="50">
                                    {{ Str::title($comment->user->first_name) }}
                                </th>
                                <td class="px-6 py-4">
                                    {{ $comment->comment }}
                                </td>
                                <td class="px-6 py-4 flex items-center gap-3">
                                    <img src="{{ $comment->product->image }}" alt="" width="70">
                                    {{ $comment->product->product_name }}
                                </td>
                                <td class="px-6 py-4">
                                    <a href="/comments/{{ $comment->id }}/edit"
                                        class="font-medium text-blue-600 dark:text-blue-500 text-xl mx-2 hover:underline"><i
                                            class="fa-regular fa-pen-to-square"></i></a>

                                    <form action="/comments/{{ $comment->id }}" method="POST" class="inline-block"
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
                                <span class="font-medium">Info!</span> Tidak ada komentar
                            </div>
                        </div>
                    @endif
                </tbody>
            </table>
        </div>

    </div>
@endsection

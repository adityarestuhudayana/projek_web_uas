@extends('layouts.main')

@section('container')
    <div class="pt-[2rem] px-10">

        <div class="flex items-center">
            <div class="w-full max-w-[550px]">
                <form action="/categories/{{ $category->id }}" method="POST" class="max-w-lg" enctype="multipart/form-data">
                    @csrf
                    @method('put')
                    <div class="-mx-3 flex flex-wrap">
                        <div class="w-full px-3 sm:w-1/2">
                            <div class="mb-5">
                                <label for="fName" class="mb-3 block text-base font-medium text-[#07074D]">
                                    Nama kategori
                                </label>
                                <input type="text" name="category_name" id="fName" value="{{ $category->category_name }}"
                                    class="w-full rounded-md border border-gray-300 bg-white py-3 px-6 text-base font-medium text-[#6B7280] outline-none focus:border-[#6A64F1] focus:shadow-md" />
                            </div>
                        </div>
                    </div>
                    <div class="col-span-2 mb-5">
                        <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white"
                            for="file_input">Avatar</label>
                        <input
                            class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400"
                            id="file_input" type="file" name="image">
                    </div>

                    <img src="{{ asset($category->image) }}" alt="" class="mb-5" width="200">

                    <div class="flex items-center gap-5">
                        <button type="submit"
                            class="my-5 hover:shadow-form rounded-md bg-blue-500 text-white py-3 px-8 text-center text-base font-semibold outline-none">
                            Submit
                        </button>
                        <a href="/categories"
                            class="my-5 hover:shadow-form rounded-md bg-white text-blue-500 border-2 border-blue-500 hover:bg-blue-500 hover:text-white duration-150 py-3 px-8 text-center text-base font-semibold outline-none">Kembali</a>
                    </div>
                </form>
            </div>
        </div>

    </div>
@endsection

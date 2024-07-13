@extends('layouts.main')

@section('container')
    <div class="pt-[2rem] px-10">

        <div class="flex items-center">
            <div class="w-full max-w-[550px]">
                <form action="/comments/{{ $comment->id }}" method="POST" class="max-w-lg" enctype="multipart/form-data">
                    @csrf
                    @method('put')
                    <div class="-mx-3 flex flex-wrap">
                        <div class="w-full px-3 sm:w-1/2">
                            <div class="mb-5">
                                <label for="fName" class="mb-3 block text-base font-medium text-[#07074D]">
                                    Komentar
                                </label>
                                <input type="text" name="comment" id="fName"
                                    value="{{ $comment->comment }}"
                                    class="w-full rounded-md border border-gray-300 bg-white py-3 px-6 text-base font-medium text-[#6B7280] outline-none focus:border-[#6A64F1] focus:shadow-md" />
                            </div>
                        </div>
                    </div>
                    <div class="col-span-2 mb-5">

                    <div class="flex items-center gap-5">
                        <button type="submit"
                            class="my-5 hover:shadow-form rounded-md bg-blue-500 text-white py-3 px-8 text-center text-base font-semibold outline-none">
                            Submit
                        </button>
                        <a href="/comments"
                            class="my-5 hover:shadow-form rounded-md bg-white text-blue-500 border-2 border-blue-500 hover:bg-blue-500 hover:text-white duration-150 py-3 px-8 text-center text-base font-semibold outline-none">Kembali</a>
                    </div>
                </form>
            </div>
        </div>

    </div>
@endsection

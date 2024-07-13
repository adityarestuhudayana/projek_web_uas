@extends('layouts.main')

@section('container')
    <div class="pt-[2rem] px-10">

        <div class="flex items-center">
            <div class="w-full max-w-[550px]">
                <form action="/users/{{ $user->id }}" method="POST" class="max-w-lg" enctype="multipart/form-data">
                    @csrf
                    @method('put')
                    <div class="-mx-3 flex flex-wrap">
                        <div class="w-full px-3 sm:w-1/2">
                            <div class="mb-5">
                                <label for="fName" class="mb-3 block text-base font-medium text-[#07074D]">
                                    Nama depan
                                </label>
                                <input type="text" name="first_name" id="fName"
                                    value="{{ $user->first_name }}"
                                    class="w-full rounded-md border border-gray-300 bg-white py-3 px-6 text-base font-medium text-[#6B7280] outline-none focus:border-[#6A64F1] focus:shadow-md" />
                            </div>
                        </div>
                        <div class="w-full px-3 sm:w-1/2">
                            <div class="mb-5">
                                <label for="fName" class="mb-3 block text-base font-medium text-[#07074D]">
                                    Nama belakang
                                </label>
                                <input type="text" name="last_name" id="fName"
                                    value="{{ $user->last_name }}"
                                    class="w-full rounded-md border border-gray-300 bg-white py-3 px-6 text-base font-medium text-[#6B7280] outline-none focus:border-[#6A64F1] focus:shadow-md" />
                            </div>
                        </div>
                        <div class="w-full px-3 sm:w-1/2">
                            <div class="mb-5">
                                <label for="lName" class="mb-3 block text-base font-medium text-[#07074D]">
                                    Email
                                </label>
                                <input type="text" name="email" id="lName" value="{{ $user->email }}"
                                    class="w-full rounded-md border border-gray-300 bg-white py-3 px-6 text-base font-medium text-[#6B7280] outline-none focus:border-[#6A64F1] focus:shadow-md" />
                            </div>
                        </div>
                    </div>
                    <div class="mb-5">
                        <label for="guest" class="mb-3 block text-base font-medium text-[#07074D]">
                            No telepon
                        </label>
                        <input type="number" name="phone" id="guest" min="0" value="{{ $user->phone }}"
                            class="w-full appearance-none rounded-md border border-gray-300 bg-white py-3 px-6 text-base font-medium text-[#6B7280] outline-none focus:border-[#6A64F1] focus:shadow-md" />
                    </div>

                    <div class="col-span-2 mb-5">
                        <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white"
                            for="file_input">Avatar</label>
                        <input
                            class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400"
                            id="file_input" type="file" name="image">
                    </div>

                    <img src="{{ asset($user->image) }}" alt="" class="mb-5" width="200">

                    <div class="my-5">
                        <label for="message" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Alamat</label>
                        <textarea id="message" rows="4" name="address"
                            class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">{{ $user->address }}</textarea>
                    </div>


                    <div>
                        <label for="countries"
                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Role</label>
                        <select id="countries" name="is_admin"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                            <option value="">Pilih</option>
                            <option value="1" {{ ($user->is_admin == 1) ? 'selected' : '' }}>Admin</option>
                            <option value="0" {{ ($user->is_admin == 0) ? 'selected' : '' }}>User</option>
                        </select>
                    </div>

                    <div class="flex items-center gap-5">
                        <button type="submit"
                            class="my-5 hover:shadow-form rounded-md bg-blue-500 text-white py-3 px-8 text-center text-base font-semibold outline-none">
                            Submit
                        </button>
                        <a href="/users"
                            class="my-5 hover:shadow-form rounded-md bg-white text-blue-500 border-2 border-blue-500 hover:bg-blue-500 hover:text-white duration-150 py-3 px-8 text-center text-base font-semibold outline-none">Kembali</a>
                    </div>
                </form>
            </div>
        </div>

    </div>
@endsection

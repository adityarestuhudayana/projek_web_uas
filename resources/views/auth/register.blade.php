<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Sign up</title>
    @vite('resources/css/app.css')
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100..900;1,100..900&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap"
        rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css"
        integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link href="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.3.0/flowbite.min.css" rel="stylesheet" />
</head>

<body class="font-Montserrat">
    <div class="min-h-screen bg-gray-100 flex flex-col justify-center sm:py-12">
        <div class="p-10 xs:p-0 mx-auto md:w-full md:max-w-md">
            <h1 class="font-bold text-center text-2xl mb-5">Sign up</h1>
            <div class="bg-white shadow w-full rounded-lg divide-y divide-gray-200">
                <div class="px-5 py-7">
                    <form action="/register" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="flex gap-3">
                            <div>
                                <label class="font-semibold text-sm text-gray-600 pb-1 block">Nama depan</label>
                                <input type="text" autocomplete="off" class="border rounded-lg px-3 py-2 mt-1 mb-5 text-sm w-full"
                                    name="first_name" />
                            </div>
                            <div>
                                <label class="font-semibold text-sm text-gray-600 pb-1 block">Nama belakang</label>
                                <input type="text" autocomplete="off" class="border rounded-lg px-3 py-2 mt-1 mb-5 text-sm w-full"
                                    name="last_name" />
                            </div>
                        </div>
                        <div class="flex gap-3">
                            <div>
                                <label class="font-semibold text-sm text-gray-600 pb-1 block">No Telpon</label>
                                <input type="text" autocomplete="off" class="border rounded-lg px-3 py-2 mt-1 mb-5 text-sm w-full"
                                    name="phone" />
                            </div>
                            <div>
                                <label class="font-semibold text-sm text-gray-600 pb-1 block">Email</label>
                                <input type="email" autocomplete="off" class="border rounded-lg px-3 py-2 mt-1 mb-5 text-sm w-full"
                                    name="email" />
                            </div>
                        </div>

                        <label class="font-semibold text-sm text-gray-600 pb-1 block">Username</label>
                        <input type="text" autocomplete="off" class="border rounded-lg px-3 py-2 mt-1 mb-5 text-sm w-full"
                            name="username" />
                        <label class="font-semibold text-sm text-gray-600 pb-1 block">Password</label>
                        <input type="text" autocomplete="off" class="border rounded-lg px-3 py-2 mt-1 mb-5 text-sm w-full"
                            name="password" />


                        <div class="my-3">
                            <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white"
                                for="file_input">Avatar</label>
                            <input
                                class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400"
                                id="file_input" type="file" name="image">
                        </div>


                        <button type="submit"
                            class="transition duration-200 bg-blue-500 hover:bg-blue-600 focus:bg-blue-700 focus:shadow-sm focus:ring-4 focus:ring-blue-500 focus:ring-opacity-50 text-white w-full py-2.5 rounded-lg text-sm shadow-sm hover:shadow-md font-semibold text-center inline-block">
                            <span class="inline-block mr-2">Sign up</span>
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                stroke="currentColor" class="w-4 h-4 inline-block">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M17 8l4 4m0 0l-4 4m4-4H3" />
                            </svg>
                        </button>
                    </form>
                </div>
            </div>
            <div class="py-5">
                <div class="grid grid-cols-2 gap-1">
                    <div class="text-center sm:text-left whitespace-nowrap">
                        <a href="/login"
                            class="transition duration-200 mx-5 px-5 py-4 cursor-pointer font-normal text-sm rounded-lg text-gray-500 hover:bg-gray-200 focus:outline-none focus:bg-gray-300 focus:ring-2 focus:ring-gray-400 focus:ring-opacity-50 ring-inset">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                stroke="currentColor" class="w-4 h-4 inline-block align-text-top">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M10 19l-7-7m0 0l7-7m-7 7h18" />
                            </svg>
                            <span class="inline-block ml-1">Back to login</span>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>

</body>

</html>

<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <title>{{ config('app.name', 'Laravel') }}</title>
        <script src="https://cdn.tailwindcss.com"></script>

        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Platypi:ital,wght@0,300..800;1,300..800&family=Raleway:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">
        <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.3.0/datepicker.min.js"></script>
        <link href="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.3.0/flowbite.min.css" rel="stylesheet" />



        <style>
            body{
                font-family: "Raleway", sans-serif;
            }
        </style>
    </head>
    <body class="bg-gray-200 px-4 xl:px-0">
        <header class="bg-white rounded-xl container mx-auto py-6 px-4 mt-10 flex items-center flex-col xl:flex-row gap-4">
            <!-- Logo -->
            <a href="">
                <div class="flex justify-center items-center">
                    <img src="https://mousumibd.org/wp-content/uploads/2023/07/cropped-308713555_456505983174032_85954199752637187_n.png" alt="Logo" class="h-12 w-12 mr-2">
                    <h1 class="text-3xl font-semibold text-gray-600">Mousumi</h1>
                </div>
            </a>
            <!-- Search input with icon -->
            <div class="relative flex items-center">
                <input type="text" placeholder="Search..." class="border border-gray-300 rounded-md py-2 px-3 focus:outline-none focus:border-blue-500">
                <div class="absolute inset-y-0 right-0 flex items-center pr-3">
                    <x-lucide-search class="h-6 w-6 text-gray-300"/>
                </div>
            </div>

            <!-- Align elements to the right -->
            <div class="flex items-center space-x-4 ml-auto">
                <!-- Contact number -->
                <a href="#" class="mr-4">
                    <span class="text-gray-600 border border-gray-300 rounded-md py-2 px-4 hidden xl:inline">123-456-7890</span>
                </a>
                <div class="relative hidden xl:inline">
                    <span class="absolute -top-4 -right-2 bg-green-500 px-2 rounded-full text-white">2</span>
                    <span>
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-8 h-8">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M2.25 12.76c0 1.6 1.123 2.994 2.707 3.227 1.068.157 2.148.279 3.238.364.466.037.893.281 1.153.671L12 21l2.652-3.978c.26-.39.687-.634 1.153-.67 1.09-.086 2.17-.208 3.238-.365 1.584-.233 2.707-1.626 2.707-3.228V6.741c0-1.602-1.123-2.995-2.707-3.228A48.394 48.394 0 0 0 12 3c-2.392 0-4.744.175-7.043.513C3.373 3.746 2.25 5.14 2.25 6.741v6.018Z" />
                        </svg>
                    </span>
                </div>
                <!-- Notification icon -->
                <div class="relative hidden xl:inline">
                    <span class="absolute -top-4 -right-2 bg-red-500 px-2 rounded-full text-white">2</span>
                    <span>
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-8 h-8">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M14.857 17.082a23.848 23.848 0 0 0 5.454-1.31A8.967 8.967 0 0 1 18 9.75V9A6 6 0 0 0 6 9v.75a8.967 8.967 0 0 1-2.312 6.022c1.733.64 3.56 1.085 5.455 1.31m5.714 0a24.255 24.255 0 0 1-5.714 0m5.714 0a3 3 0 1 1-5.714 0" />
                          </svg>
                    </span>
                </div>
                <!-- Vertical border -->
                <div class="hidden xl:inline border-l border-gray-300 h-6"></div>
                {{-- <div x-data="{ isOpen: false }" class="relative inline-block ">
                    <!-- Dropdown toggle button -->
                    <button @click="isOpen = !isOpen" class="relative z-10 flex items-center p-2 text-sm text-gray-600 bg-white border rounded-md focus:border-blue-500 focus:ring-opacity-40 dark:focus:ring-opacity-40 focus:ring-blue-300 focus:ring border-gray-300 focus:outline-none">
                        <span class="mx-1 text-xl">Jane Doe</span>
                        <svg class="w-5 h-5 mx-1" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M12 15.713L18.01 9.70299L16.597 8.28799L12 12.888L7.40399 8.28799L5.98999 9.70199L12 15.713Z" fill="currentColor"></path>
                        </svg>
                    </button>

                    <!-- Dropdown menu -->
                    <div x-show="isOpen"
                        @click.away="isOpen = false"
                        x-transition:enter="transition ease-out duration-100"
                        x-transition:enter-start="opacity-0 scale-90"
                        x-transition:enter-end="opacity-100 scale-100"
                        x-transition:leave="transition ease-in duration-100"
                        x-transition:leave-start="opacity-100 scale-100"
                        x-transition:leave-end="opacity-0 scale-90"
                        class="absolute right-0 z-20 w-56 py-2 mt-2 overflow-hidden origin-top-right bg-white rounded-md shadow-xl"
                    >
                        <a href="#" class="flex items-center p-3 -mt-2 text-sm text-gray-600 transition-colors duration-300 transform  hover:bg-gray-100  ">
                            <img class="flex-shrink-0 object-cover mx-1 rounded-full w-9 h-9" src="https://images.unsplash.com/photo-1523779917675-b6ed3a42a561?ixid=MnwxMjA3fDB8MHxzZWFyY2h8N3x8d29tYW4lMjBibHVlfGVufDB8fDB8fA%3D%3D&ixlib=rb-1.2.1&auto=format&fit=face&w=500&q=200" alt="jane avatar">
                            <div class="mx-1">
                                <h1 class="text-sm font-semibold text-gray-700">Jane Doe</h1>
                                <p class="text-sm text-gray-500 ">janedoe@exampl.com</p>
                            </div>
                        </a>

                        <hr class="border-gray-200  ">

                        <a href="#" class="block px-4 py-3 text-sm text-gray-600 capitalize transition-colors duration-300 transform  hover:bg-gray-100 ">
                            view profile
                        </a>

                        <a href="#" class="block px-4 py-3 text-sm text-gray-600 capitalize transition-colors duration-300 transform  hover:bg-gray-100  ">
                            Settings
                        </a>
                        <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();" class="block px-4 py-3 text-sm text-gray-600 capitalize transition-colors duration-300 transform hover:bg-gray-100">
                            Sign Out
                        </a>

                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            @csrf
                        </form>

                    </div>
                </div> --}}

                @livewire('admin.top-bar');


            </div>
        </header>

        <header class="fixed bottom-0 left-0 right-0 bg-white border-t border-gray-300 p-4 rounded-lg xl:hidden container mx-auto z-50">
            <div class="flex justify-between items-center">
                <a href="#" class="text-gray-600 hover:text-gray-900">
                    <x-lucide-home class="h-8 w-8"/>
                </a>
                <div class="relative">
                    <a href="#" class="text-gray-600 hover:text-gray-900">
                        <x-lucide-message-square class="h-8 w-8"/>
                        <span class="absolute -top-2 -right-2 bg-green-500 px-2 rounded-full text-white">2</span>
                    </a>
                </div>
                <div class="relative">
                    <a href="#" class="text-gray-600 hover:text-gray-900">
                        <x-lucide-bell class="h-8 w-8"/>
                        <span class="absolute -top-2 -right-2 bg-red-500 px-2 rounded-full text-white">2</span>
                    </a>
                </div>
                <div class="relative">
                    <img src="avatar.jpg" alt="Avatar" class="h-10 w-10 rounded-full">
                    <span class="absolute -top-2 -right-2 bg-green-500 px-2 rounded-full text-white">2</span>
                </div>
            </div>
        </header>
            <button id="sidebarToggle" class="block lg:hidden container px-8 mt-8">
                <x-lucide-menu class="h-6 w-6"/>
            </button>
        <div class="container mx-auto flex gap-8 m-8 relative">
            <div id="sidebar" class="hidden lg:flex flex-col justify-between border-e min-h-[50vh] bg-white xl:w-1/5 rounded-xl shadow-lg absolute lg:static top-0 left-0 h-full z-50">
                <div class="px-4 py-6">
                    <ul class="mt-6 space-y-1">

                        <li>
                            <a
                                href="{{route('dashboard')}}"
                                class="flex items-center rounded-lg px-4 py-2 text-sm font-medium {{ request()->routeIs('dashboard') ? 'text-gray-700 bg-gray-100' : 'hover:bg-gray-100 hover:text-gray-700'}}"
                            ><x-lucide-home class="h-4 w-4 mr-2"/>
                                Home
                            </a>
                        </li>

                        <li>
                            <details class="group [&_summary::-webkit-details-marker]:hidden">
                                <summary
                                class="flex justify-between items-center rounded-lg px-4 py-2 text-sm font-medium cursor-pointer {{ request()->routeIs(['classes', 'admissions', 'subjects.index', 'admission-create', 'admin.students.show', 'student.edit', 'subjects.create', 'subjects.edit', 'student-results.index', 'student.attendance']) ? 'text-gray-700 bg-gray-100' : 'hover:bg-gray-100 hover:text-gray-700'}}"
                                >
                                <span class="text-sm font-medium flex items-center"><x-lucide-school class="h-4 w-4 mr-2"/> School </span>

                                <span class="shrink-0 transition duration-300 group-open:-rotate-180">
                                    <x-lucide-chevron-down class="h-5 w-5 font-semibold"/>
                                </span>
                                </summary>

                                <ul class="mt-2 space-y-1 px-4">
                                <li>
                                    <a
                                    href="{{route('classes')}}"
                                    class="block rounded-lg px-4 py-2 text-sm font-medium text-gray-500 hover:bg-gray-100 hover:text-gray-700"
                                    >
                                    Class
                                    </a>
                                </li>

                                <li>
                                    <a
                                    href="{{route('admissions')}}"
                                    class="block rounded-lg px-4 py-2 text-sm font-medium text-gray-500 hover:bg-gray-100 hover:text-gray-700"
                                    >
                                    Student
                                    </a>
                                </li>
                                <li>
                                    <a
                                    href="{{route('subjects.index')}}"
                                    class="block rounded-lg px-4 py-2 text-sm font-medium text-gray-500 hover:bg-gray-100 hover:text-gray-700"
                                    >
                                    Subjects
                                    </a>
                                </li>
                                <li>
                                    <a
                                    href="{{route('student-results.index')}}"
                                    class="block rounded-lg px-4 py-2 text-sm font-medium text-gray-500 hover:bg-gray-100 hover:text-gray-700"
                                    >
                                    Results
                                    </a>
                                </li>
                                <li>
                                    <a
                                    href="{{route('student.attendance')}}"
                                    class="block rounded-lg px-4 py-2 text-sm font-medium text-gray-500 hover:bg-gray-100 hover:text-gray-700"
                                    >
                                    Attendance
                                    </a>
                                </li>
                                </ul>
                            </details>
                        </li>

                        <li>
                            <details class="group [&_summary::-webkit-details-marker]:hidden">
                            <summary
                                class="flex justify-between items-center rounded-lg px-4 py-2 text-sm font-medium cursor-pointer {{ request()->routeIs(['admin.header', 'admin.hero-section', 'admin.video-section', 'smart.learn-section', 'student.review-section', 'admin.blogs' ]) ? 'text-gray-700 bg-gray-100' : 'hover:bg-gray-100 hover:text-gray-700'}}"
                            >
                                <span class="text-sm font-medium flex items-center"><x-lucide-laptop-minimal  class="h-4 w-4 mr-2"/> Websites </span>

                                <span class="shrink-0 transition duration-300 group-open:-rotate-180">
                                    <x-lucide-chevron-down class="h-5 w-5 font-semibold"/>
                                </span>
                            </summary>

                            <ul class="mt-2 space-y-1 px-4">
                                <li>
                                <a
                                    href="{{route('admin.header')}}"
                                    class="block rounded-lg px-4 py-2 text-sm font-medium text-gray-500 hover:bg-gray-100 hover:text-gray-700"
                                >
                                    Header
                                </a>
                                </li>

                                <li>
                                <a
                                    href="{{route('admin.hero-section')}}"
                                    class="block rounded-lg px-4 py-2 text-sm font-medium text-gray-500 hover:bg-gray-100 hover:text-gray-700"
                                >
                                    Hero Section
                                </a>

                                </li>
                                <li>
                                    <a href="{{route('admin.video-section')}}" class="block rounded-lg px-4 py-2 text-sm font-medium text-gray-500 hover:bg-gray-100 hover:text-gray-700">Video Class</a>
                                </li>
                                <li>
                                    <a href="{{route('smart.learn-section')}}" class="block rounded-lg px-4 py-2 text-sm font-medium text-gray-500 hover:bg-gray-100 hover:text-gray-700">Smarter Learner</a>
                                </li>
                                <li>
                                    <a href="{{route('student.review-section')}}" class="block rounded-lg px-4 py-2 text-sm font-medium text-gray-500 hover:bg-gray-100 hover:text-gray-700">Student Reviews</a>
                                </li>
                                <li>
                                    <a href="{{route('admin.blogs')}}" class="block rounded-lg px-4 py-2 text-sm font-medium text-gray-500 hover:bg-gray-100 hover:text-gray-700">Blogs</a>
                                </li>
                            </ul>
                            </details>
                        </li>

                        <li>
                            <details class="group [&_summary::-webkit-details-marker]:hidden">
                            <summary
                                class="flex justify-between items-center rounded-lg px-4 py-2 text-sm font-medium cursor-pointer {{ request()->routeIs(['roles', 'permissions', 'users']) ? 'text-gray-700 bg-gray-100' : 'hover:bg-gray-100 hover:text-gray-700'}}"
                            >
                                <span class="text-sm font-medium flex items-center"><x-lucide-ratio class="h-4 w-4 mr-2"/> Role & Permission </span>

                                <span class="shrink-0 transition duration-300 group-open:-rotate-180">
                                    <x-lucide-chevron-down class="h-5 w-5 font-semibold"/>
                                </span>
                            </summary>

                            <ul class="mt-2 space-y-1 px-4">
                                <li>
                                <a
                                    href="{{route('roles')}}"
                                    class="block rounded-lg px-4 py-2 text-sm font-medium text-gray-500 hover:bg-gray-100 hover:text-gray-700"
                                >
                                    Roles
                                </a>
                                </li>

                                <li>
                                <a
                                    href="{{route('permissions')}}"
                                    class="block rounded-lg px-4 py-2 text-sm font-medium text-gray-500 hover:bg-gray-100 hover:text-gray-700"
                                >
                                    Permission
                                </a>

                                </li>
                                <li>
                                    <a
                                    href="{{route('users')}}"
                                    class="block rounded-lg px-4 py-2 text-sm font-medium text-gray-500 hover:bg-gray-100 hover:text-gray-700"
                                    >
                                    Asign Role
                                    </a>

                                </li>
                            </ul>
                            </details>
                        </li>

                    </ul>
                </div>
            </div>


            <div class="w-full xl:w-4/5">
                <main class="mb-20">
                    {{ $slot }}
                </main>
            </div>
        </div>

        <script>
            document.addEventListener('DOMContentLoaded', function () {
                const sidebarToggle = document.getElementById('sidebarToggle');
                const sidebar = document.getElementById('sidebar');

                sidebarToggle.addEventListener('click', function () {
                    sidebar.classList.toggle('hidden');
                });
            });
        </script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.3.0/flowbite.min.js"></script>
    </body>
</html>

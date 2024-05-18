<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
    <title>Mousumi Biddyanikaton | 2024</title>
    <script src="https://cdn.tailwindcss.com"></script>
    
</head>
<body>

    <header class="bg-green-700 px-8 py-4 md:py-4 md:px-8">
        <div class="container mx-auto flex items-center justify-between">
            <!-- Logo -->
            @livewire('components.logo')
            <!-- Navigation -->
            <nav id="desktopNav" class="hidden md:flex items-center">
                <ul class="flex space-x-12 transition ease-in-out">
                    <li><a href="#" class="active text-white hover:underline hover:underline-offset-8">Home</a></li>
                    <li><a href="#" class="text-white hover:underline hover:underline-offset-8 ">About</a></li>
                    <li><a href="#" class="text-white hover:underline hover:underline-offset-8 ">Services</a></li>
                    <li><a href="#" class="text-white hover:underline hover:underline-offset-8 ">Contact</a></li>
                </ul>
            </nav>
            <!-- Mobile Navigation Toggle -->
            <button id="toggleButton" class="md:hidden text-white">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" class="w-6 h-6">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16m-7 6h7"></path>
                </svg>
            </button>
        </div>
        <!-- Mobile Navigation -->
        <nav id="mobileNav" class="hidden md:hidden flex flex-col items-center justify-center">
            <ul class="flex flex-col items-center space-y-4 mt-10">
                <li><a href="#" class="active text-white hover:underline hover:underline-offset-8">Home</a></li>
                <li><a href="#" class="text-white hover:underline hover:underline-offset-8">About</a></li>
                <li><a href="#" class="text-white hover:underline hover:underline-offset-8">Services</a></li>
                <li><a href="#" class="text-white hover:underline hover:underline-offset-8">Contact</a></li>
            </ul>
        </nav>
    </header>

            <!-- Page Content -->
            <main>
                {{ $slot }}
            </main>

    <!-- Footer -->
    <footer class="bg-gray-100">
        <div class="container mx-auto px-8 py-8 md:py-12 md:px-8">
            <div class="gap-4 md:grid grid-cols-4 py-12">
                <div class="flex md:grid flex-col items-center justify-center py-4 md:py-0">
                    <h1 class="text-3xl font-bold"><span class="text-green-700">Dor</span><span class="text-orange-500">ik</span> <span class="text-green-700">School</span></h1>
                    <p class="text-gray-800">Lorem ipsum dolor sit amet consectetur adipisicing elit. Ut necessitatibus repellat debitis recusandae beatae corporis.</p>
                    <div class="my-4 flex items-center">
                        <svg class="orange-fill" width="30px" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
                            <path d="M164.9 24.6c-7.7-18.6-28-28.5-47.4-23.2l-88 24C12.1 30.2 0 46 0 64C0 311.4 200.6 512 448 512c18 0 33.8-12.1 38.6-29.5l24-88c5.3-19.4-4.6-39.7-23.2-47.4l-96-40c-16.3-6.8-35.2-2.1-46.3 11.6L304.7 368C234.3 334.7 177.3 277.7 144 207.3L193.3 167c13.7-11.2 18.4-30 11.6-46.3l-40-96z"/>
                        </svg>
                        <h3 class="ml-4 text-2xl text-gray-700">(704) 555-0027</h3>
                    </div>
                </div>

                <div class="">
                    <h3 class="text-2xl font-semibold">Courses</h3>
                    <ul class="text-gray-800 mt-5">
                        <li class="mb-2"><a href="#" class="hover:text-gray-600">General English</a></li>
                        <li class="mb-2"><a href="#" class="hover:text-gray-600">Young Learner</a></li>
                        <li class="mb-2"><a href="#" class="hover:text-gray-600">Dutch Language</a></li>
                        <li class="mb-2"><a href="#" class="hover:text-gray-600">China Language</a></li>
                        <li class="mb-2"><a href="#" class="hover:text-gray-600">Textile Engineer</a></li>
                    </ul>
                </div>

                <div class="">
                    <h3 class="text-2xl font-semibold">About</h3>
                    <ul class="text-gray-800 mt-5">
                        <li class="mb-2"><a href="#" class="hover:text-gray-600">Home</a></li>
                        <li class="mb-2"><a href="#" class="hover:text-gray-600">About Us</a></li>
                        <li class="mb-2"><a href="#" class="hover:text-gray-600">Courses</a></li>
                        <li class="mb-2"><a href="#" class="hover:text-gray-600">Location</a></li>
                    </ul>
                </div>

                <div class="">
                    <h3 class="text-2xl font-semibold">Newsletter</h3>
                    <div class="mt-5">
                        <div class="mb-2 flex">
                            <input type="email" placeholder="Enter your email" class="p-4 border-none rounded-l-lg shadow-2xl w-full">
                            <a href="" class="bg-orange-500 p-4 shadow-lg rounded-r-lg text-white hover:bg-white hover:text-orange-500">
                                <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-mail">
                                    <rect width="20" height="16" x="2" y="4" rx="2"/>
                                    <path d="m22 7-8.97 5.7a1.94 1.94 0 0 1-2.06 0L2 7"/>
                                </svg>
                            </a>
                        </div>
                        <h1 class="mb-2 text-2xl font-semibold mt-10">Follow</h1>
                        <div class="mt-8 flex">
                            <!-- Facebook icon with link -->
                            <a href="#" class="rounded-full border border-gray-500 p-2 mr-2 hover:bg-orange-500">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-facebook"><path d="M18 2h-3a5 5 0 0 0-5 5v3H7v4h3v8h4v-8h3l1-4h-4V7a1 1 0 0 1 1-1h3z"/></svg>
                            </a>

                            <!-- Twitter icon with link -->
                            <a href="#" class="active rounded-full border hover:bg-orange-500 border-gray-500 p-2 mr-2">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-twitter"><path d="M22 4s-.7 2.1-2 3.4c1.6 10-9.4 17.3-18 11.6 2.2.1 4.4-.6 6-2C3 15.5.5 9.6 3 5c2.2 2.6 5.6 4.1 9 4-.9-4.2 4-6.6 7-3.8 1.1 0 3-1.2 3-1.2z"/></svg>
                            </a>

                            <!-- Instagram icon with link -->
                            <a href="#" class="rounded-full border hover:bg-orange-500 border-gray-500 p-2 mr-2">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-instagram"><rect width="20" height="20" x="2" y="2" rx="5" ry="5"/><path d="M16 11.37A4 4 0 1 1 12.63 8 4 4 0 0 1 16 11.37z"/><line x1="17.5" x2="17.51" y1="6.5" y2="6.5"/></svg>
                            </a>

                            <!-- Google icon with link -->
                            <a href="#" class="rounded-full border hover:bg-orange-500 border-gray-500 p-2 mr-2">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-linkedin"><path d="M16 8a6 6 0 0 1 6 6v7h-4v-7a2 2 0 0 0-2-2 2 2 0 0 0-2 2v7h-4v-7a6 6 0 0 1 6-6z"/><rect width="4" height="12" x="2" y="9"/><circle cx="4" cy="4" r="2"/></svg>
                            </a>
                        </div>

                    </div>
                </div>
            </div>
        </div>

            <section class="bg-green-700 mt-12">
                <nav class="py-4">
                    <div class="container mx-auto flex justify-between items-center  px-8 py-8 md:py-12 md:px-8">
                        <!-- Logo -->
                        <a href="#" class="text-white">&copy;2024 dorik.com</a>
                        <!-- Navbar links -->
                        <ul class="flex">
                            <li><a href="#" class="text-white hover:text-gray-500 lg:ml-5">Privacy Policy</a></li>
                            <li><a href="#" class="text-white hover:text-gray-500 ml-3 lg:ml-5">Terms</a></li>
                            <li><a href="#" class="text-white hover:text-gray-500 ml-3 lg:ml-5">Security</a></li>
                        </ul>
                    </div>
                </nav>
            </section>

    </footer>

<script src="script/script.js"></script>
</body>
</html>

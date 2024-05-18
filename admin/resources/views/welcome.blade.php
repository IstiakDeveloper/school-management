<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
    <title>Dorik School | 2024</title>
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

    <!-- Hero -->
    <section id="hero">
        <div class="bg-image-1 bg-cover bg-center h-[500px] lg:h-[700px] md:bg-cover md:bg-center lg:bg-cover lg:bg-center flex justify-center items-center">
            <div class="text-white container mx-auto px-8 py-4 md:py-4 md:px-8">
                <div class="-mt-16">
                    <h2>Welcome to</h2>
                    <h1 class="text-6xl mt-4 font-semibold">Dorik School</h1>
                    <div class="flex flex-col md:flex-row gap-4 mt-6">
                        <a href="">
                            <button class="bg-orange-500 hover:bg-transparent hover:border hover:border-gray-300 py-4 px-4 rounded min-w-[120px]">Get started</button>
                        </a>
                        <a class="border border-gray-300 py-3 px-4 rounded hover:bg-orange-500 w-[155px] flex gap-2" href="">
                            Watch video <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-circle-play"><circle cx="12" cy="12" r="10"/><polygon points="10 8 16 12 10 16 10 8"/></svg>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Hero -->
    <section class="container mx-auto relative bottom-20 sm:bottom-20 md:bottom-32 lg:bottom-56 px-8 py-4 md:py-4 md:px-8">
        <div class="flex flex-row items-center justify-center text-center shadow-xl">
            <div class="bg-white border border-gray-200 z-10">
                <div class="img">
                    <img src="images/Top-section-images/friends (2).jpg" width="400px" alt="">
                </div>
                <div class="text py-6 bg-white">
                    <h1 class="font-bold">Scholarship</h1>
                    <span class="flex justify-center">
                        <h1 class="text-center text-xl text-orange-500 mt-2">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-move-right"><path d="M18 8L22 12L18 16"/><path d="M2 12H22"/></svg>
                        </h1>
                    </span>
                </div>
            </div>
            <div class="bg-white border border-gray-200 z-10">
                <div class="img">
                    <img src="images/Top-section-images/assignment.jpg" width="400px" alt="">
                </div>
                <div class="text py-6">
                    <h1 class="font-bold">Academics</h1>
                    <span class="flex justify-center">
                        <h1 class="text-center text-xl text-orange-500 mt-2">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-move-right"><path d="M18 8L22 12L18 16"/><path d="M2 12H22"/></svg>
                        </h1>
                    </span>
                </div>
            </div>
            <div class="bg-white border border-gray-200 z-10">
                <div class="img">
                    <img src="images/Top-section-images/college-student.jpg" width="400px" alt="">
                </div>
                <div class="text py-6">
                    <h1 class="font-bold">Schoole Life</h1>
                    <span class="flex justify-center">
                        <h1 class="text-center text-xl text-orange-500 mt-2">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-move-right"><path d="M18 8L22 12L18 16"/><path d="M2 12H22"/></svg>
                        </h1>
                    </span>
                </div>
            </div>
        </div>
    </section>

    <!-- Smartness showcase -->
    <section class="bg-green-700">
        <div class="container mx-auto flex flex-col gap-6 md:gap-20 justify-between items-center md:flex-row py-16 px-8 md:px-8">
            <div>
                <img class="max-h-[450px]" src="images/female-student.png" alt="">
            </div>
            <div class="text-white text-justify w-2/3 md:w-2/4">
                <h3 class="text-2xl text-center md:text-left md:text-4xl font-bold">Smarter way to go through your school</h3>
                <p class="mt-4">Lorem ipsum dolor sit amet consectetur adipisicing elit. Placeat nemo saepe consequatur iure aut dolore ut adipisci molestias dignissimos impedit.</p>
                <h3 class="mt-6 flex"><span class="mt-1 mr-2 text-orange-500"><svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-circle-check-big"><path d="M22 11.08V12a10 10 0 1 1-5.93-9.14"/><path d="m9 11 3 3L22 4"/></svg></span> Lorem ipsum dolor sit amet consectetur adipisicing elit. Voluptas, similique!</h3>
                <h3 class="mt-4 flex"><span class="mt-1 mr-2 text-orange-500"><svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-circle-check-big"><path d="M22 11.08V12a10 10 0 1 1-5.93-9.14"/><path d="m9 11 3 3L22 4"/></svg></span> Lorem ipsum dolor sit amet consectetur adipisicing.</h3>
                <h3 class="mt-4 flex"><span class="mt-1 mr-2 text-orange-500"><svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-circle-check-big"><path d="M22 11.08V12a10 10 0 1 1-5.93-9.14"/><path d="m9 11 3 3L22 4"/></svg></span> Lorem ipsum dolor sit amet consectetur, adipisicing elit. Vel, expedita.</h3>
                <p class="mt-6 md:mt-10 ">Lorem ipsum dolor sit amet consectetur adipisicing elit. Accusamus voluptatum voluptas fuga architecto praesentium aliquam iores!</p>
            </div>
        </div>
    </section>

    <!-- Courses -->
    <section class="bg-gray-50 px-8 py-8 md:py-12 md:px-8">
        <div class="text-center">
            <h1 class="text-5xl font-bold">Our Main Courses</h1>
            <p class="mt-4">Lorem ipsum dolor sit amet consectetur adipisicing elit. At hic <br> cupiditate distinctio cumque. Tenetur, laborum.</p>
        </div>

        <div class="container mx-auto mt-12">
            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-6">
                <div class="bg-white">
                    <div class="content p-4">
                        <img src="images/card-image/civil.jpg" alt="Civil Engineering" class="w-full h-auto rounded-t-lg mb-4">
                        <h3 class="text-xl text-center font-bold mb-2">Civil Engineering</h3>
                        <p class="text-center">His able orthographic entered not look had the alone ti their could and</p>
                        <div class="flex justify-between mt-2 p-2">
                            <h3 class="flex items-center gap-2"><span class="text-orange-500">
                                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-award"><circle cx="12" cy="8" r="6"/><path d="M15.477 12.89 17 22l-5-3-5 3 1.523-9.11"/></svg>
                            </span>3rd Grade</h3>
                            <h3 class="flex items-center gap-2"><span class="text-orange-500">
                                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-graduation-cap"><path d="M21.42 10.922a1 1 0 0 0-.019-1.838L12.83 5.18a2 2 0 0 0-1.66 0L2.6 9.08a1 1 0 0 0 0 1.832l8.57 3.908a2 2 0 0 0 1.66 0z"/><path d="M22 10v6"/><path d="M6 12.5V16a6 3 0 0 0 12 0v-3.5"/></svg>
                            </span>3.00</h3>
                            <h3 class="flex items-center gap-1"><span class="text-orange-500">
                                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-book-check"><path d="M4 19.5v-15A2.5 2.5 0 0 1 6.5 2H20v20H6.5a2.5 2.5 0 0 1 0-5H20"/><path d="m9 9.5 2 2 4-4"/></svg>
                            </span>50</h3>
                        </div>
                    </div>
                    <button class="bg-orange-500 w-full mt-2 p-2 text-white hover:bg-gray-400">Apply Now</button>
                </div>
                <div class="bg-white">
                    <div class="content p-4">
                        <img src="images/card-image/civil.jpg" alt="Civil Engineering" class="w-full h-auto rounded-t-lg mb-4">
                        <h3 class="text-xl text-center font-bold mb-2">Civil Engineering</h3>
                        <p class="text-center">His able orthographic entered not look had the alone ti their could and</p>
                        <div class="flex justify-between mt-2 p-2">
                            <h3 class="flex items-center gap-2"><span class="text-orange-500">
                                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-award"><circle cx="12" cy="8" r="6"/><path d="M15.477 12.89 17 22l-5-3-5 3 1.523-9.11"/></svg>
                            </span>3rd Grade</h3>
                            <h3 class="flex items-center gap-2"><span class="text-orange-500">
                                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-graduation-cap"><path d="M21.42 10.922a1 1 0 0 0-.019-1.838L12.83 5.18a2 2 0 0 0-1.66 0L2.6 9.08a1 1 0 0 0 0 1.832l8.57 3.908a2 2 0 0 0 1.66 0z"/><path d="M22 10v6"/><path d="M6 12.5V16a6 3 0 0 0 12 0v-3.5"/></svg>
                            </span>3.00</h3>
                            <h3 class="flex items-center gap-1"><span class="text-orange-500">
                                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-book-check"><path d="M4 19.5v-15A2.5 2.5 0 0 1 6.5 2H20v20H6.5a2.5 2.5 0 0 1 0-5H20"/><path d="m9 9.5 2 2 4-4"/></svg>
                            </span>50</h3>
                        </div>
                    </div>
                    <button class="bg-orange-500 w-full mt-2 p-2 text-white hover:bg-gray-400">Apply Now</button>
                </div>
                <div class="bg-white">
                    <div class="content p-4">
                        <img src="images/card-image/civil.jpg" alt="Civil Engineering" class="w-full h-auto rounded-t-lg mb-4">
                        <h3 class="text-xl text-center font-bold mb-2">Civil Engineering</h3>
                        <p class="text-center">His able orthographic entered not look had the alone ti their could and</p>
                        <div class="flex justify-between mt-2 p-2">
                            <h3 class="flex items-center gap-2"><span class="text-orange-500">
                                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-award"><circle cx="12" cy="8" r="6"/><path d="M15.477 12.89 17 22l-5-3-5 3 1.523-9.11"/></svg>
                            </span>3rd Grade</h3>
                            <h3 class="flex items-center gap-2"><span class="text-orange-500">
                                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-graduation-cap"><path d="M21.42 10.922a1 1 0 0 0-.019-1.838L12.83 5.18a2 2 0 0 0-1.66 0L2.6 9.08a1 1 0 0 0 0 1.832l8.57 3.908a2 2 0 0 0 1.66 0z"/><path d="M22 10v6"/><path d="M6 12.5V16a6 3 0 0 0 12 0v-3.5"/></svg>
                            </span>3.00</h3>
                            <h3 class="flex items-center gap-1"><span class="text-orange-500">
                                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-book-check"><path d="M4 19.5v-15A2.5 2.5 0 0 1 6.5 2H20v20H6.5a2.5 2.5 0 0 1 0-5H20"/><path d="m9 9.5 2 2 4-4"/></svg>
                            </span>50</h3>
                        </div>
                    </div>
                    <button class="bg-orange-500 w-full mt-2 p-2 text-white hover:bg-gray-400">Apply Now</button>
                </div>
                <div class="bg-white">
                    <div class="content p-4">
                        <img src="images/card-image/civil.jpg" alt="Civil Engineering" class="w-full h-auto rounded-t-lg mb-4">
                        <h3 class="text-xl text-center font-bold mb-2">Civil Engineering</h3>
                        <p class="text-center">His able orthographic entered not look had the alone ti their could and</p>
                        <div class="flex justify-between mt-2 p-2">
                            <h3 class="flex items-center gap-2"><span class="text-orange-500">
                                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-award"><circle cx="12" cy="8" r="6"/><path d="M15.477 12.89 17 22l-5-3-5 3 1.523-9.11"/></svg>
                            </span>3rd Grade</h3>
                            <h3 class="flex items-center gap-2"><span class="text-orange-500">
                                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-graduation-cap"><path d="M21.42 10.922a1 1 0 0 0-.019-1.838L12.83 5.18a2 2 0 0 0-1.66 0L2.6 9.08a1 1 0 0 0 0 1.832l8.57 3.908a2 2 0 0 0 1.66 0z"/><path d="M22 10v6"/><path d="M6 12.5V16a6 3 0 0 0 12 0v-3.5"/></svg>
                            </span>3.00</h3>
                            <h3 class="flex items-center gap-1"><span class="text-orange-500">
                                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-book-check"><path d="M4 19.5v-15A2.5 2.5 0 0 1 6.5 2H20v20H6.5a2.5 2.5 0 0 1 0-5H20"/><path d="m9 9.5 2 2 4-4"/></svg>
                            </span>50</h3>
                        </div>
                    </div>
                    <button class="bg-orange-500 w-full mt-2 p-2 text-white hover:bg-gray-400">Apply Now</button>
                </div>
                <div class="bg-white">
                    <div class="content p-4">
                        <img src="images/card-image/civil.jpg" alt="Civil Engineering" class="w-full h-auto rounded-t-lg mb-4">
                        <h3 class="text-xl text-center font-bold mb-2">Civil Engineering</h3>
                        <p class="text-center">His able orthographic entered not look had the alone ti their could and</p>
                        <div class="flex justify-between mt-2 p-2">
                            <h3 class="flex items-center gap-2"><span class="text-orange-500">
                                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-award"><circle cx="12" cy="8" r="6"/><path d="M15.477 12.89 17 22l-5-3-5 3 1.523-9.11"/></svg>
                            </span>3rd Grade</h3>
                            <h3 class="flex items-center gap-2"><span class="text-orange-500">
                                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-graduation-cap"><path d="M21.42 10.922a1 1 0 0 0-.019-1.838L12.83 5.18a2 2 0 0 0-1.66 0L2.6 9.08a1 1 0 0 0 0 1.832l8.57 3.908a2 2 0 0 0 1.66 0z"/><path d="M22 10v6"/><path d="M6 12.5V16a6 3 0 0 0 12 0v-3.5"/></svg>
                            </span>3.00</h3>
                            <h3 class="flex items-center gap-1"><span class="text-orange-500">
                                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-book-check"><path d="M4 19.5v-15A2.5 2.5 0 0 1 6.5 2H20v20H6.5a2.5 2.5 0 0 1 0-5H20"/><path d="m9 9.5 2 2 4-4"/></svg>
                            </span>50</h3>
                        </div>
                    </div>
                    <button class="bg-orange-500 w-full mt-2 p-2 text-white hover:bg-gray-400">Apply Now</button>
                </div>
                <div class="bg-white">
                    <div class="content p-4">
                        <img src="images/card-image/civil.jpg" alt="Civil Engineering" class="w-full h-auto rounded-t-lg mb-4">
                        <h3 class="text-xl text-center font-bold mb-2">Civil Engineering</h3>
                        <p class="text-center">His able orthographic entered not look had the alone ti their could and</p>
                        <div class="flex justify-between mt-2 p-2">
                            <h3 class="flex items-center gap-2"><span class="text-orange-500">
                                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-award"><circle cx="12" cy="8" r="6"/><path d="M15.477 12.89 17 22l-5-3-5 3 1.523-9.11"/></svg>
                            </span>3rd Grade</h3>
                            <h3 class="flex items-center gap-2"><span class="text-orange-500">
                                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-graduation-cap"><path d="M21.42 10.922a1 1 0 0 0-.019-1.838L12.83 5.18a2 2 0 0 0-1.66 0L2.6 9.08a1 1 0 0 0 0 1.832l8.57 3.908a2 2 0 0 0 1.66 0z"/><path d="M22 10v6"/><path d="M6 12.5V16a6 3 0 0 0 12 0v-3.5"/></svg>
                            </span>3.00</h3>
                            <h3 class="flex items-center gap-1"><span class="text-orange-500">
                                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-book-check"><path d="M4 19.5v-15A2.5 2.5 0 0 1 6.5 2H20v20H6.5a2.5 2.5 0 0 1 0-5H20"/><path d="m9 9.5 2 2 4-4"/></svg>
                            </span>50</h3>
                        </div>
                    </div>
                    <button class="bg-orange-500 w-full mt-2 p-2 text-white hover:bg-gray-400">Apply Now</button>
                </div>

            </div>
            <div class="p-20">
                <span class="flex gap-8 justify-center">
                    <a href=""><svg xmlns="http://www.w3.org/2000/svg" width="35" height="35" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-arrow-left"><path d="m12 19-7-7 7-7"/><path d="M19 12H5"/></svg></a>
                    <a class="text-orange-500" href=""><svg xmlns="http://www.w3.org/2000/svg" width="35" height="35" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-arrow-right"><path d="M5 12h14"/><path d="m12 5 7 7-7 7"/></svg></a>
                </span>
            </div>
        </div>
    </section>

    <!-- Video -->
    <section>
        <div class="bg-image-2 h-[500px] bg-cover bg-center">
            <div class="flex flex-col items-center text-white conatiner mx-auto">
                <h1 class="text-3xl text-center font-bold mt-20">The Smarter Way To Learn</h1>
                <p class="text-center mt-4">Lorem ipsum dolor sit amet consectetur adipisicing elit. Est adipisci tenetur atque voluptates ducimus omnis eligendi nulla numquam, distinctio maiores?</p>
            </div>
        </div>
        <div class="flex items-center justify-center relative bottom-44 lg:bottom-52">
            <iframe class="max-w-[600px] lg:w-[800px] h-[300px] lg:h-[400px]" src="https://www.youtube.com/embed/htv8i393lQo" frameborder="0" allowfullscreen></iframe>
        </div>
    </section>

    <!-- Review Students -->
    <section class="container mx-auto -mt-32">
        <div class="grid grid-cols-2 sm:grid-cols-3 md:grid-cols-4 items-center">
                <div>
                    <h2 class="text-3xl font-bold text-center text-orange-500">120+</h2>
                    <h3 class=" text-gray-600 text-center mt-3 text-xs w-full">Student campuses</h3>
                </div>
                <div>
                    <h2 class="text-3xl font-bold text-center text-orange-500">5000+</h2>
                    <h3 class= "text-gray-600 text-center mt-3 text-xs w-full">Student enrolled</h3>
                </div>
                <div>
                    <h2 class="text-3xl font-bold text-center text-orange-500">100+</h2>
                    <h3 class=" text-gray-600 text-center mt-3 text-xs w-full">Certificated teachers</h3>
                </div>
                <div>
                    <h2 class="text-3xl font-bold text-center text-orange-500">60+</h2>
                    <p class=" text-gray-600 text-center mt-3 text-xs w-full">Countrywide awards</p>
                </div>
            </div>

        <div  class="flex flex-col items-center justify-center mt-16">
            <h1 class="text-3xl font-bold">What Student Says</h1>
            <p class="text-center mt-3 text-gray-600">Lorem ipsum dolor, sit amet consectetur adipisicing elit. Soluta  minima repellat adipisci <br> similique? Voluptatem quis eligendi nemo expedita!</p>
        </div>

        <div class="flex flex-col items-center justify-center mt-8 md:w-2/4 mx-auto relative">
            <!-- Carousel -->
            <div id="carousel" class="overflow-hidden w-full relative">
                <div class="flex transition-transform duration-500 ease-in-out" id="slideContainer">
                    <!-- Review Box 1 -->
                    <div class="flex-none w-full">
                        <div class="p-6 text-center">
                            <h1 class="text-3xl text-orange-500 mb-2">★ ★ ★ ★ ★</h1>
                            <h3 class="text-center text-2xl text-gray-500">"I've taken several courses on different platforms, but this one stands out for its interactive approach and practical assignments. The instructors provided valuable feedback, which helped me improve my skills significantly."</h3>
                            <h1 class="font-bold mt-7">Kavin Jhonson</h1>
                            <p>Student</p>
                        </div>
                    </div>
                    <!-- Review Box 2 -->
                    <div class="flex-none w-full">
                        <div class="p-6 text-center">
                            <h1 class="text-3xl text-orange-500 mb-2">★ ★ ★ ★ ★</h1>
                        <h3 class="text-center text-2xl text-gray-500">"The course content was comprehensive and well-structured. I found the instructors to be highly knowledgeable and engaging. Overall, a fantastic learning experience!"</h3>
                        <h1 class="font-bold mt-7">John Doe</h1>
                        <p>Student</p>
                        </div>
                    </div>
                    <!-- Review Box 3 -->
                    <div class="flex-none w-full">
                        <div class="p-6 text-center">
                            <h1 class="text-3xl text-orange-500 mb-2">★ ★ ★ ★ ★</h1>
                        <h3 class="text-center text-2xl text-gray-500">"I was initially skeptical about online courses, but this platform exceeded my expectations. The quality of instruction was top-notch, and I appreciated the flexibility it offered. Highly recommended"</h3>
                        <h1 class="font-bold mt-7">Emily Smith</h1>
                        <p>Student</p>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Indicator Buttons -->
            <div class="flex justify-center mt-4" id="indicatorContainer">
                <button class="mx-1 w-3 h-3 rounded-full bg-gray-300 focus:outline-none"></button>
                <button class="mx-1 w-3 h-3 rounded-full bg-gray-300 focus:outline-none"></button>
                <button class="mx-1 w-3 h-3 rounded-full bg-gray-300 focus:outline-none"></button>
            </div>
        </div>

        <div class="p-20">
            <span class="flex gap-8 justify-center">
                <a href=""><svg xmlns="http://www.w3.org/2000/svg" width="35" height="35" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-arrow-left"><path d="m12 19-7-7 7-7"/><path d="M19 12H5"/></svg></a>
                <a class="text-orange-500" href=""><svg xmlns="http://www.w3.org/2000/svg" width="35" height="35" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-arrow-right"><path d="M5 12h14"/><path d="m12 5 7 7-7 7"/></svg></a>
            </span>
        </div>
    </section>

    <!-- Events -->
    <section>
        <div class="bg-image-3 bg-cover bg-center md:h-[800px] relative px-8 py-8 md:px-8 md:mb-12">
            <div class="absolute inset-0 bg-black opacity-70"></div>
            <div class="container mx-auto relative z-10">
                <div class="flex flex-col items-center justify-center text-white">
                    <h1 class="text-3xl mt-10 font-bold">Our Latest Event</h1>
                    <p class="text-center mt-4">Lorem ipsum dolor sit amet consectetur adipisicing elit. Est adipisci tenetur atque <br> voluptates ducimus omnis eligendi nulla numquam, distinctio maiores?</p>
                </div>

                    <div class="md:flex justify-between md:flex-row md:mt-10">
                        <div class="pb-20">
                            <img src="images/course-main.jpg" width="500px" alt="">
                            <h3 class="text-white mt-5">20 April 2024 | 2:00 AM</h3>
                            <h1 class="text-2xl text-white font-bold">Sport Management Information Webinar</h1>
                            <button class="bg-orange-500 text-white hover:bg-gray-600 py-3 px-4 rounded mt-6">Read More</button>
                        </div>

                        <div class="pb-20">
                            <div class="flex flex-row  justify-center items-ceneter gap-4 mb-4">
                                <img class="w-[100px] h-[90px] object-cover" src="images/walking.jpg" alt="">
                                <div class="text-white font-semibold md:ml-3">
                                    <h1 class="text-[10px] sm:text-[16px] mt-2">Sport Management Information Webinar</h1>
                                    <h3 class="mt-2 text-xs">20 April 2024 | 2:00 AM</h3>
                                </div>
                            </div>
                            <div class="flex flex-row justify-center items-ceneter gap-4 mb-4">
                                <img class="w-[100px] h-[90px] object-cover" src="images/walking.jpg" alt="">
                                <div class="text-white font-semibold md:ml-3">
                                    <h1 class="text-[10px] sm:text-[16px] mt-2">Sport Management Information Webinar</h1>
                                    <h3 class="mt-2 text-xs">20 April 2024 | 2:00 AM</h3>
                                </div>
                            </div>
                            <div class="flex flex-row justify-center items-ceneter gap-4 mb-4">
                                <img class="w-[100px] h-[90px] object-cover" src="images/walking.jpg" alt="">
                                <div class="text-white font-semibold md:ml-3">
                                    <h1 class="text-[10px] sm:text-[16px] mt-2">Sport Management Information Webinar</h1>
                                    <h3 class="mt-2 text-xs">20 April 2024 | 2:00 AM</h3>
                                </div>
                            </div>
                            <div class="flex flex-row justify-center items-ceneter gap-4 mb-4">
                                <img class="w-[100px] h-[90px] object-cover" src="images/walking.jpg" alt="">
                                <div class="text-white font-semibold md:ml-3">
                                    <h1 class="text-[10px] sm:text-[16px] mt-2">Sport Management Information Webinar</h1>
                                    <h3 class="mt-2 text-xs">20 April 2024 | 2:00 AM</h3>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Joining Massage -->
    <section>
        <div class="container text-center mx-auto my-12">
            <div class="bg-green-700 text-white flex flex-col justify-center items-center py-20">
                <h1 class="text-2xl font-semibold">Join Over 4500+ Courses</h1>
                <p class="mt-5">Lorem ipsum, dolor sit amet consectetur adipisicing elit. Consequatur, assumenda!</p>
                <button class="bg-orange-500 text-white hover:bg-indigo-600 py-3 px-4 rounded mt-6">Apply Now</button>
            </div>
        </div>
    </section>

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

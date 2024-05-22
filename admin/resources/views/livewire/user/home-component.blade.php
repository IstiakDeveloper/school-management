<div>

    <div>
        <section id="hero">
            <div>
                <div style="
                    background: url('{{ asset('storage/' . $heroSection->background_image) }}') no-repeat;
                    position: relative;
                    background-color: rgba(0, 0, 0, 0.6);
                    background-blend-mode: overlay;
                    background-position: center;
                    background-size: cover;
                "
                class="h-[500px] lg:h-[700px] flex justify-center items-center">
                    <div class="text-white container mx-auto px-8 py-4 md:py-4 md:px-8">
                        <div class="-mt-16">
                            <h2>{{$heroSection['small_title']}}</h2>
                            <h1 class="text-6xl mt-4 font-semibold">{{$heroSection['big_title']}}</h1>
                            <div class="flex flex-col md:flex-row gap-4 mt-6">
                                <a href="{{$heroSection['link1_url']}}">
                                    <button class="bg-orange-500 hover:bg-transparent hover:border hover:border-gray-300 py-4 px-4 rounded min-w-[120px]">{{$heroSection['link1_text']}}</button>
                                </a>
                                <a class="border border-gray-300 py-3 px-4 rounded hover:bg-orange-500 w-[155px] flex gap-2" href="{{$heroSection['link2_url']}}">
                                    {{$heroSection['link2_text']}} <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-circle-play"><circle cx="12" cy="12" r="10"/><polygon points="10 8 16 12 10 16 10 8"/></svg>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="container mx-auto relative bottom-20 sm:bottom-20 md:bottom-32 lg:bottom-56 px-8 py-4 md:py-4 md:px-8">
                <div class="flex flex-row items-center justify-center text-center shadow-xl">
                    <div class="bg-white border border-gray-200 z-10">
                        <div class="img">
                            <img class="w-[400px] h-[300px] object-cover" src="{{ asset('storage/' . $heroSection['service1_image']) }}" alt="">
                        </div>
                        <div class="text py-6 bg-white">
                            <h1 class="font-bold">{{$heroSection['service1_title']}}</h1>
                            <span class="flex justify-center">
                                <h1 class="text-center text-xl text-orange-500 mt-2">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-move-right"><path d="M18 8L22 12L18 16"/><path d="M2 12H22"/></svg>
                                </h1>
                            </span>
                        </div>
                    </div>
                    <div class="bg-white border border-gray-200 z-10">
                        <div class="img">
                            <img class="w-[400px] h-[300px] object-cover" src="{{ asset('storage/' . $heroSection['service2_image']) }}" alt="">
                        </div>
                        <div class="text py-6">
                            <h1 class="font-bold">{{$heroSection['service2_title']}}</h1>
                            <span class="flex justify-center">
                                <h1 class="text-center text-xl text-orange-500 mt-2">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-move-right"><path d="M18 8L22 12L18 16"/><path d="M2 12H22"/></svg>
                                </h1>
                            </span>
                        </div>
                    </div>
                    <div class="bg-white border border-gray-200 z-10">
                        <div class="img">
                            <img class="w-[400px] h-[300px] object-cover" src="{{ asset('storage/' . $heroSection['service3_image']) }}" alt="">
                        </div>
                        <div class="text py-6">
                            <h1 class="font-bold">{{$heroSection['service3_title']}}</h1>
                            <span class="flex justify-center">
                                <h1 class="text-center text-xl text-orange-500 mt-2">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-move-right"><path d="M18 8L22 12L18 16"/><path d="M2 12H22"/></svg>
                                </h1>
                            </span>
                        </div>
                    </div>
                </div>
            </div>
        </section>


        <section class="bg-green-700">
            <div class="container mx-auto flex flex-col gap-6 md:gap-20 justify-between items-center md:flex-row py-16 px-8 md:px-8">
                <div>
                    <img class="max-h-[450px]" src="images/female-student.png" alt="">
                </div>
                <div class="text-white text-justify w-2/3 md:w-2/4">
                    <h3 class="text-2xl text-center md:text-left md:text-4xl font-bold">Smarter way to go through your school</h3>
                    <p class="mt-4">Lorem ipsum dolor sit amet consectetur adipisicing elit. Placeat nemo saepe consequatur iure aut dolore ut adipisci molestias dignissimos impedit.</p>
                    <h3 class="mt-6 flex">
                        <span class="mt-1 mr-2 text-orange-500">
                            <x-lucide-circle-check-big class="h-5 w-5"/>
                        </span>
                        Lorem ipsum dolor sit amet consectetur adipisicing elit. Voluptas, similique!
                    </h3>
                    <h3 class="mt-4 flex">
                        <span class="mt-1 mr-2 text-orange-500">
                            <x-lucide-circle-check-big class="h-5 w-5"/>
                        </span>
                        Lorem ipsum dolor sit amet consectetur adipisicing.</h3>
                    <h3 class="mt-4 flex">
                        <span class="mt-1 mr-2 text-orange-500">
                            <x-lucide-circle-check-big class="h-5 w-5"/>
                        </span>
                        Lorem ipsum dolor sit amet consectetur, adipisicing elit. Vel, expedita.
                    </h3>
                    <p class="mt-6 md:mt-10 ">Lorem ipsum dolor sit amet consectetur adipisicing elit. Accusamus voluptatum voluptas fuga architecto praesentium aliquam iores!</p>
                </div>
            </div>
        </section>

        <!-- Courses -->
        <section class="bg-gray-50 px-8 py-8 md:py-12 md:px-8">
            <div class="text-center">
                <h1 class="text-5xl font-bold">{{$videoClassesSection['main_title']}}</h1>
                <p class="mt-4">{{$videoClassesSection['description']}}</p>
            </div>

            @php

            @endphp
            <div class="container mx-auto mt-12">
                <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-6">
                    @foreach ($videoClasses as $videoClass)
                        <div class="bg-white">
                            <div class="content p-4">
                                @php
                                    // Extract the video ID from the URL if necessary
                                    if (preg_match('/(?:youtube\.com\/(?:[^\/]+\/.+\/|(?:v|e(?:mbed)?)\/|.*[?&]v=)|youtu\.be\/)([^"&?\/ ]{11})/i', $videoClass['url'], $matches)) {
                                        $videoId = $matches[1];
                                    } else {
                                        $videoId = null;
                                    }
                                @endphp
                                @if($videoId)
                                <iframe
                                    src="https://www.youtube.com/embed/{{ $videoId }}"
                                    title="YouTube video player"
                                    class="w-full h-[300px] rounded-t-lg mb-4"
                                    frameborder="0"
                                    allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
                                    allowfullscreen>
                                </iframe>
                                @else
                                <p>Invalid video URL</p>
                                @endif
                                <h3 class="text-xl text-center font-bold mb-2">{{$videoClass['title']}}</h3>
                                <p class="text-center">{{$videoClass['subtitle']}}</p>
                                {{-- <div class="flex justify-between mt-2 p-2">
                                    <h3 class="flex items-center gap-2"><span class="text-orange-500">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-award"><circle cx="12" cy="8" r="6"/><path d="M15.477 12.89 17 22l-5-3-5 3 1.523-9.11"/></svg>
                                    </span>3rd Grade</h3>
                                    <h3 class="flex items-center gap-2"><span class="text-orange-500">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-graduation-cap"><path d="M21.42 10.922a1 1 0 0 0-.019-1.838L12.83 5.18a2 2 0 0 0-1.66 0L2.6 9.08a1 1 0 0 0 0 1.832l8.57 3.908a2 2 0 0 0 1.66 0z"/><path d="M22 10v6"/><path d="M6 12.5V16a6 3 0 0 0 12 0v-3.5"/></svg>
                                    </span>3.00</h3>
                                    <h3 class="flex items-center gap-1"><span class="text-orange-500">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-book-check"><path d="M4 19.5v-15A2.5 2.5 0 0 1 6.5 2H20v20H6.5a2.5 2.5 0 0 1 0-5H20"/><path d="m9 9.5 2 2 4-4"/></svg>
                                    </span>50</h3>
                                </div> --}}
                            </div>
                            <a href="{{$videoClass['url']}}" target="_blank">
                                <button class="bg-orange-500 w-full mt-2 p-2 text-white hover:bg-gray-400">Wathc Now</button>
                            </a>
                        </div>
                    @endforeach
                </div>
            </div>
        </section>

        <!-- Video -->
        <section class="mt-20">
            <div class="h-[500px]" style="
            background: url('{{ asset('storage/' . $smarterLearnerSection['background_image']) }}') no-repeat;
            position: relative;
            background-color: rgba(0, 0, 0, 0.6);
            background-blend-mode: overlay;
            background-position: center;
            background-size: cover;
        ">
                <div class="flex flex-col items-center text-white conatiner mx-auto">
                    <h1 class="text-3xl text-center font-bold mt-20">{{$smarterLearnerSection['main_title']}}</h1>
                    <p class="text-center mt-4">{{$smarterLearnerSection['description']}}</p>
                </div>
            </div>
            <div class="flex items-center justify-center relative bottom-44 lg:bottom-52">
                <iframe class="max-w-[600px] lg:w-[800px] h-[300px] lg:h-[400px]" src="{{$smarterLearnerSection['video_url']}}" frameborder="0" allowfullscreen></iframe>
            </div>
        </section>

        <!-- Review Students -->
        <section class="container mx-auto -mt-32">
            <div class="grid grid-cols-2 sm:grid-cols-3 md:grid-cols-4 items-center">
                    <div>
                        <h2 class="text-3xl font-bold text-center text-orange-500">{{$smarterLearnerSection['item1_number']}}+</h2>
                        <h3 class=" text-gray-600 text-center mt-3 text-xs w-full">{{$smarterLearnerSection['item1_title']}}</h3>
                    </div>
                    <div>
                        <h2 class="text-3xl font-bold text-center text-orange-500">{{$smarterLearnerSection['item2_number']}}+</h2>
                        <h3 class= "text-gray-600 text-center mt-3 text-xs w-full">{{$smarterLearnerSection['item2_title']}}</h3>
                    </div>
                    <div>
                        <h2 class="text-3xl font-bold text-center text-orange-500">{{$smarterLearnerSection['item3_number']}}+</h2>
                        <h3 class=" text-gray-600 text-center mt-3 text-xs w-full">{{$smarterLearnerSection['item3_title']}}</h3>
                    </div>
                    <div>
                        <h2 class="text-3xl font-bold text-center text-orange-500">{{$smarterLearnerSection['item4_number']}}+</h2>
                        <p class=" text-gray-600 text-center mt-3 text-xs w-full">{{$smarterLearnerSection['item4_title']}}</p>
                    </div>
                </div>
            <div  class="flex flex-col items-center justify-center mt-16">
                <h1 class="text-3xl font-bold">{{$studentReviews['main_title']}}</h1>
                <p class="text-center mt-3 text-gray-600">{{$studentReviews['description']}}</p>
            </div>

            <div class="flex flex-col items-center justify-center mt-8 md:w-2/4 mx-auto relative">
                <div id="carousel" class="overflow-hidden w-full relative">
                    <div class="flex transition-transform duration-500 ease-in-out" id="slideContainer">
                        <!-- Review Box 1 -->
                        @foreach ($studentReviewItems as $item)
                            <div class="flex-none w-full">
                                <div class="p-6 text-center">
                                    <h1 class="text-3xl text-orange-500 mb-2">
                                        @for ($i = 1; $i <= 5; $i++)
                                            @if ($i <= $item['stars'])
                                                ★
                                            @else
                                                ☆
                                            @endif
                                        @endfor
                                    </h1>
                                    <h3 class="text-center text-2xl text-gray-500">"{{$item['summary']}}"</h3>
                                    <h1 class="font-bold mt-7">{{$item['name']}}</h1>
                                    <p>Student</p>
                                </div>
                            </div>
                        @endforeach

                        {{-- <!-- Review Box 2 -->
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
                        </div> --}}
                    </div>
                </div>
                <!-- Indicator Buttons -->
                <div class="flex justify-center mt-4" id="indicatorContainer">
                    @foreach ($studentReviewItems as $item)
                    <button class="mx-1 w-3 h-3 rounded-full bg-gray-300 focus:outline-none"></button>
                @endforeach
                </div>
            </div>

        </section>

        <!-- Events -->
        <section class="mt-20">
            <div class="bg-cover bg-center md:h-[800px] relative px-8 py-8 md:px-8 md:mb-12" style="
            background: url('{{ asset('storage/' . $blogSection->background_image) }}') no-repeat;
            position: relative;
            background-color: rgba(0, 0, 0, 0.6);
            background-blend-mode: overlay;
            background-position: center;
            background-size: cover;
        ">
                <div class="absolute inset-0 bg-black opacity-70"></div>
                <div class="container mx-auto relative z-10">
                    <div class="flex flex-col items-center justify-center text-white">
                        <h1 class="text-3xl mt-10 font-bold">{{$blogSection['main_title']}}</h1>
                        <p class="text-center mt-4">{{$blogSection['description']}}</p>
                    </div>

                        <div class="md:flex justify-between md:flex-row md:mt-10">
                            <div class="pb-20">
                                @if ($latestBlog)
                                    <a href="{{ route('blog.show', $latestBlog->id) }}">
                                        <img class="w-[500px] h-[300px] object-cover" src="{{ Storage::disk('public')->url($latestBlog->thumbnail) }}" alt="{{ $latestBlog->title }}">
                                        <h3 class="text-white mt-5">{{ $latestBlog->created_at->format('d F Y | h:i A') }}</h3>
                                        <h1 class="text-2xl text-white font-bold">{{ $latestBlog->title }}</h1>
                                        <button class="bg-orange-500 text-white hover:bg-gray-600 py-3 px-4 rounded mt-6">Read More</button>
                                    </a>
                                @else
                                    <p class="text-white">No latest blog available.</p>
                                @endif
                            </div>

                            <div class="pb-20">
                                @foreach ($lastFiveBlogs as $blog)
                                    <a href="{{ route('blog.show', $blog->id) }}" class="flex flex-row justify-center items-center gap-4 mb-4">
                                        <img class="w-[100px] h-[90px] object-cover" src="{{ Storage::disk('public')->url($blog->thumbnail) }}" alt="{{ $blog->title }}">
                                        <div class="text-white font-semibold md:ml-3">
                                            <h1 class="text-[10px] sm:text-[16px] mt-2">{{ $blog->title }}</h1>
                                            <h3 class="mt-2 text-xs">{{ $blog->created_at->format('d F Y | h:i A') }}</h3>
                                        </div>
                                    </a>
                                @endforeach
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
    </div>
</div>

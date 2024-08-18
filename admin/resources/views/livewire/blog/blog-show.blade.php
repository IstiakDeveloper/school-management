<div class="bg-gray-100 font-sans tracking-normal">
    <!-- Header -->
    <div class="bg-blue-600 text-white py-4">
        <div class="container mx-auto px-6">
            <h1 class="text-3xl font-bold">{{ $blog->title }}</h1>
        </div>
    </div>

    <!-- Main Content -->
<div class="bg-white">
    <div class="container mx-auto px-6 py-8">
        <div class="bg-white rounded-lg shadow-md p-6">
            <div class="mb-6">
                @if ($blog->thumbnail)
                    <img src="{{ asset('storage/' . $blog->thumbnail) }}" alt="Thumbnail" class="w-full h-64 object-cover rounded-md mb-4">
                @endif
                <h2 class="text-2xl font-semibold mb-4">{{ $blog->title }}</h2>
                <div class="text-gray-700 mb-4">
                    {!! nl2br(e($blog->content)) !!}
                </div>
            </div>

        </div>
    </div>
</div>


</div>

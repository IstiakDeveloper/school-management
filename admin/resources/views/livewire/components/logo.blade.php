<div>
    @if ($logo)
        <h1 class="text-2xl font-semibold text-white flex items-center">
            <img src="{{ asset('storage/' . $logo->logo) }}" alt="logo" class="w-12 mr-2">
            <span class="mr-1">{{$logo->logo_text}}</span>
        </h1>
    @endif
</div>

<div class="login-container">
    <div class="login-box">
        <div class="login-form">
            <h1 class="text-2xl font-bold mb-2 text-center">Register</h1>
            <p class="text-gray-500 mb-6 text-center">Get started with your account</p>
            <form wire:submit.prevent="register">
                <!-- Name -->
                <div class="mb-4">
                    <label for="name" class="block text-gray-700">Name</label>
                    <input wire:model.defer="name" id="name" class="block mt-1 w-full p-2 border border-gray-300 rounded" type="text" name="name" required autofocus autocomplete="name" />
                    @error('name') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
                </div>

                <!-- Email Address or Phone Number -->
                <div class="mb-4">
                    <label for="credential" class="block text-gray-700">Email or Phone Number</label>
                    <input wire:model.defer="credential" id="credential" class="block mt-1 w-full p-2 border border-gray-300 rounded" type="text" name="credential" required autocomplete="off" />
                    @error('credential') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
                </div>

                <!-- Password -->
                <div class="mb-4">
                    <label for="password" class="block text-gray-700">Password</label>
                    <input wire:model.defer="password" id="password" class="block mt-1 w-full p-2 border border-gray-300 rounded" type="password" name="password" required autocomplete="new-password" />
                    @error('password') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
                </div>

                <!-- Confirm Password -->
                <div class="mb-4">
                    <label for="password_confirmation" class="block text-gray-700">Confirm Password</label>
                    <input wire:model.defer="password_confirmation" id="password_confirmation" class="block mt-1 w-full p-2 border border-gray-300 rounded" type="password" name="password_confirmation" required autocomplete="new-password" />
                    @error('password_confirmation') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
                </div>

                <div class="flex items-center justify-between mt-4">
                    <a class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" href="{{ route('login') }}">
                        Already registered?
                    </a>

                    <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600 transition">Register</button>
                </div>
            </form>
        </div>
        <div class="login-image">
            <img src="https://via.placeholder.com/150" alt="Profile Image" class="w-36 h-36">
            <h2 class="text-xl font-bold mt-2">Join us and enhance your skills</h2>
        </div>
    </div>
</div>

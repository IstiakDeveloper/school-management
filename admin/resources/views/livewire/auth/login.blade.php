<div class="login-container">
    <div class="login-box">
        <div class="login-form">
            <h1 class="text-2xl font-bold mb-2 text-center">Login</h1>
            <p class="text-gray-500 mb-6 text-center">Login to manage this school</p>
            <form wire:submit.prevent="login">
                <!-- Email Address or Phone Number -->
                <div class="mb-4">
                    <label for="credential" class="block text-gray-700">Email or Phone Number</label>
                    <input wire:model.defer="credential" id="credential" class="block mt-1 w-full p-2 border border-gray-300 rounded" type="text" name="credential" required autocomplete="off" />
                    @error('credential') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
                </div>

                <!-- Password -->
                <div class="mb-4">
                    <label for="password" class="block text-gray-700">Password</label>
                    <input wire:model.defer="password" id="password" class="block mt-1 w-full p-2 border border-gray-300 rounded" type="password" name="password" required autocomplete="current-password" />
                    @error('password') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
                </div>

                <div class="flex items-center justify-between mb-4">
                    <label class="inline-flex items-center text-gray-700">
                        <input wire:model.defer="remember" type="checkbox" class="form-checkbox">
                        <span class="ml-2">Remember me</span>
                    </label>
                    <a href="#" class="text-sm text-blue-500 hover:underline">Forget Password?</a>
                </div>

                <div class="mb-4">
                    <button type="submit" class="w-full bg-blue-500 text-white p-2 rounded hover:bg-blue-600 transition">Login</button>
                </div>
            </form>
        </div>
        <div class="login-image">
            <img src="{{asset('logo.jpg')}}" alt="Profile Image" class="w-36 h-36">
            <h2 class="text-xl font-bold mt-2">Build your team and improve your school performance</h2>
        </div>
    </div>
</div>

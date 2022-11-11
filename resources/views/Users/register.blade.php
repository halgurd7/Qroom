<x-layout>
    <x-card class="p-10 max-w-lg mx-auto mt-24">
        <header class="text-center">
            <h2 class="text-2xl font-bold uppercase mb-1">
                Register
            </h2>
            <p class="mb-4">Create an account to create contracts</p>
        </header>

        <form action="/users" method="POST">
            @csrf

            {{-- Name Field --}}
            <div class="mb-6">
                <label for="name" class="inline-block text-lg mb-2">
                    Name
                </label>
                <input type="text" class="border border-gray-200 rounded p-2 w-full" name="name"
                    value="{{ old('name') }}" />
                @error('name')
                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                @enderror
            </div>

            {{-- Address Field --}}
            <div class="mb-6">
                <label for="address" class="inline-block text-lg mb-2">
                    Address
                </label>
                <input type="text" class="border border-gray-200 rounded p-2 w-full" name="address"
                    value="{{ old('address') }}" />
                @error('address')
                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                @enderror
            </div>

            {{-- Username Field --}}
            <div class="mb-6">
                <label for="username" class="inline-block text-lg mb-2">Username</label>
                <input type="text" class="border border-gray-200 rounded p-2 w-full" name="username"
                    value="{{ old('username') }}" />
                @error('username')
                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                @enderror
            </div>

            {{-- Contact Number 1 --}}
            <div class="mb-6">
                <label for="contact 1" class="inline-block text-lg mb-2">Contact 1</label>
                <input type="tel" class="border border-gray-200 rounded p-2 w-full" name="contact_1"
                    value="{{ old('contact_1') }}" />
                @error('contact_1')
                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                @enderror
            </div>

            {{-- Contact Number 2 --}}
            <div class="mb-6">
                <label for="contact 2" class="inline-block text-lg mb-2">Contact 2</label>
                <input type="tel" class="border border-gray-200 rounded p-2 w-full" name="contact_2"
                    value="{{ old('contact_2') }}" />
                @error('contact_2')
                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                @enderror
            </div>

            {{-- Password Field --}}
            <div class="mb-6">
                <label for="password" class="inline-block text-lg mb-2">
                    Password
                </label>
                <input type="password" class="border border-gray-200 rounded p-2 w-full" name="password" />
                @error('password')
                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-6">
                <label for="password2" class="inline-block text-lg mb-2">
                    Confirm Password
                </label>
                <input type="password" class="border border-gray-200 rounded p-2 w-full" name="password_confirmation" />
                @error('password_confirmation')
                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-6">
                <button type="submit" class="bg-laravel text-white rounded py-2 px-4 hover:bg-black">
                    Sign Up
                </button>
            </div>

            <div class="mt-8">
                <p>
                    Already have an account?
                    <a href="/login" class="text-laravel">Login</a>
                </p>
            </div>
        </form>
    </x-card>
</x-layout>

<x-layout>
    <x-card class="p-10 max-w-lg mx-auto mt-24">
        <header class="text-center">
            <h2 class="text-2xl font-bold uppercase mb-1">
                Welcome, {{ auth()->user()->name }}
            </h2>
            <p class="mb-4">Edit {{ auth()->user()->name }}</p>
        </header>

        <form action="/users/{{ auth()->user()->id }}" method="POST">
            @csrf
            @method('PUT')

            {{-- Name Field --}}
            <div class="mb-6">
                <label for="name" class="inline-block text-lg mb-2">Name</label>
                <input type="text" class="border border-gray-200 rounded p-2 w-full" name="name"
                    value="{{ auth()->user()->name }}" />
                @error('name')
                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                @enderror
            </div>

            {{-- Username Field --}}
            <div class="mb-6">
                <label for="username" class="inline-block text-lg mb-2">Username</label>
                <input type="text" class="border border-gray-200 rounded p-2 w-full" name="username"
                    placeholder="Example: Senior Laravel Developer" value="{{ auth()->user()->username }}" />
                @error('username')
                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                @enderror
            </div>

            {{-- Address Field --}}
            <div class="mb-6">
                <label for="address" class="inline-block text-lg mb-2">Address</label>
                <input type="text" class="border border-gray-200 rounded p-2 w-full" name="address"
                    placeholder="Example: Remote, Boston MA, etc" value="{{ auth()->user()->address }}" />
                @error('address')
                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                @enderror
            </div>

            {{-- Contact Number 1 --}}
            <div class="mb-6">
                <label for="contact_1" class="inline-block text-lg mb-2">Contact 1</label>
                <input type="tel" class="border border-gray-200 rounded p-2 w-full" name="contact_1"
                    value="{{ auth()->user()->contact_1 }}" />
                @error('contact_1')
                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                @enderror
            </div>

            {{-- Contact Number 2 --}}
            <div class="mb-6">
                <label for="contact_2" class="inline-block text-lg mb-2">
                    Contact 2
                </label>
                <input type="text" class="border border-gray-200 rounded p-2 w-full" name="contact_2"
                    value="{{ auth()->user()->contact_2 }}" />
                @error('website')
                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                @enderror
            </div>

            {{-- Password Field --}}
            <div class="mb-6">
                <label for="password" class="inline-block text-lg mb-2">
                    Password
                </label>
                <input type="password" class="border border-gray-200 rounded p-2 w-full" name="password"
                    placeholder="" />
                @error('password')
                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-6">
                <label for="confirm_password" class="inline-block text-lg mb-2">
                    Confirm Password
                </label>
                <input type="password" class="border border-gray-200 rounded p-2 w-full" name="password_confirmation" />
                @error('password_confirmation')
                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                @enderror
            </div>

            {{-- Description Field --}}
            <div class="mb-6">
                <label for="note" class="inline-block text-lg mb-2">
                    Note
                </label>
                <textarea class="border border-gray-200 rounded p-2 w-full" name="note" rows="10" placeholder="">{{ auth()->user()->note }}</textarea>
                @error('note')
                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-6">
                <button class="bg-laravel text-white rounded py-2 px-4 hover:bg-black">
                    Update Profile
                </button>
                <a href="/" class="text-black ml-4"> Back </a>
            </div>
        </form>
    </x-card>
</x-layout>

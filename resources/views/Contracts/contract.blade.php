<x-layout>
    <x-card class="p-10 max-w-lg mx-auto mt-24">
        <header class="text-center">
            <h2 class="text-2xl font-bold uppercase mb-1">
                Create The Contract
            </h2>
        </header>
        <form action="/contracts/" method="POST">
            @csrf
            {{-- Subcription Plans End --}}
            <div class="mb-6">
                <label for="select_plan" class="inline-block text-lg mb-2">Select Plan</label>
                <select class="border border-gray-200 rounded p-2 w-full" id="selected" name="monthly_payment"
                    id="cars">
                    <option value="9.99">Silver 9.99$</option>
                    <option value="49.99">Gold 49.99$</option>
                    <option value="99.99">Platinum 99.99$</option>
                </select>
            </div>
            {{-- Subcription Plans End --}}

            {{-- Start Date --}}
            <div class="mb-6">
                <label for="valid_from" class="inline-block text-lg mb-2">Start Date</label>
                <input type="date" id="valid_from" class="border border-gray-200 rounded p-2 w-full"
                    name="valid_from" placeholder="01-05-2000" value="{{ old('valid_from') }}" />
                @error('valid_from')
                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                @enderror
            </div>
            {{-- Start Date --}}

            {{-- Expire Date --}}
            <div class="mb-6">
                <label for="valid_to" class="inline-block text-lg mb-2">Expire Date</label>
                <input type="date" id="valid_to" class="border border-gray-200 rounded p-2 w-full" name="valid_to"
                    placeholder="01-05-2000" value="{{ old('valid_to') }}" />
                @error('valid_to')
                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                @enderror
            </div>
            {{-- Expire Date --}}

            {{-- Quantity --}}
            <div class="mb-6">
                <label for="quantity" class="inline-block text-lg mb-2">
                    Quantity
                </label>
                <input type="number" id="quantity" class="border border-gray-200 rounded p-2 w-full"
                    name="user_quantity" placeholder="1, 2, 3 ..." value="{{ old('user_quantity') }}" />
                @error('user_quantity')
                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                @enderror
            </div>
            {{-- Quantity --}}

            {{-- Note --}}
            <div class="mb-6">
                <label for="note" class="inline-block text-lg mb-2">
                    Description
                </label>
                <textarea class="border border-gray-200 rounded p-2 w-full" name="note" rows="10"
                    placeholder="Include tasks, requirements, salary, etc">{{ old('note') }}</textarea>
                @error('note')
                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                @enderror
            </div>
            {{-- Note --}}


            <div class="mb-6">
                <button class="bg-laravel text-white rounded py-2 px-4 hover:bg-black">
                    Create Contract
                </button>
                <a href="/" class="text-black ml-4"> Back </a>
            </div>
        </form>
    </x-card>
</x-layout>

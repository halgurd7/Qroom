{{-- Extends The Layout Cause We Use The Same Layout in The Other Views --}}
<x-layout>
    {{-- Summoning The Partials --}}
    @include('Partials._search')

    <a href="/" class="inline-block text-black ml-4 mb-4"><i class="fa-solid fa-arrow-left"></i> Back
    </a>
    <div class="mx-4">
        {{-- Slot Card --}}
        <x-card class="p-10">
            <div class="flex flex-col items-center justify-center text-center">
                <img class="w-48 mr-6 mb-6" src="{{ asset('/images/no-image.png') }}" alt="" />

                {{-- Item Name --}}
                <h3 class="text-2xl mb-2">{{ $invoice->item_name }}</h3>

                {{-- Item Price --}}
                <div class="text-xl font-bold mb-4">{{ $invoice->price }}$</div>
                <div class="text-lg my-4">
                    {{-- Quantity of The Item --}}
                    <i class="fa-solid fa-clone"></i> Quantity: {{ $invoice->quantity }}
                </div>
                <div class="border border-gray-200 w-full mb-6"></div>
                <div>
                    {{-- Description of The Item --}}
                    <h3 class="text-3xl font-bold mb-4">
                        Item Description
                    </h3>
                    <div class="text-lg space-y-6">
                        {{ $invoice->note }}

                        {{-- Total Value --}}
                        <div class="block bg-laravel text-white mt-6 py-2 rounded-xl hover:opacity-80">Subtotal:
                            {{ $invoice->quantity * $invoice->price }}$</div>
                    </div>
                </div>
            </div>
            {{-- End --}}
        </x-card>
    </div>
</x-layout>

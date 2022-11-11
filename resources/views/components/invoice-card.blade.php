@props(['invoice'])

{{-- Slot Card --}}
<x-card>
    <div class="flex">
        <img class="hidden w-48 mr-6 md:block" src="{{ asset('/images/no-image.png') }}" alt="" />
        <div>
            {{-- Item Name --}}
            <h3 class="text-2xl">
                <a href="/invoices/{{ $invoice->id }}">{{ $invoice->item_name }}</a>
            </h3>

            {{-- Price --}}
            <div class="text-xl font-bold mb-4">{{ $invoice->price }}$</div>

            {{-- Description --}}
            <div class="text-lg mt-4">
                <i class="fa-solid fa-location-dot"></i> {{ $invoice->note }}
            </div>
        </div>
    </div>
</x-card>

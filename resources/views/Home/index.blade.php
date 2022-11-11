<x-layout>
    @include('Partials._hero')
    @include('Partials._search')
    <div class="lg:grid lg:grid-cols-2 gap-4 space-y-4 md:space-y-0 mx-4">

        @if (count($invoices) == 0)
            <p>No Listings</p>
        @endif

        {{-- Showing The Lists --}}
        @foreach ($invoices as $invoice)
            {{-- Prop Component of Lists --}}
            <x-invoice-card :invoice='$invoice' />
            {{-- End of Lists --}}
        @endforeach
    </div>
    {{-- End of Lists --}}
    <div class="mt-6 p-4">
        {{-- For the Pagitation --}}
        {{ $invoices->links() }}
    </div>
</x-layout>

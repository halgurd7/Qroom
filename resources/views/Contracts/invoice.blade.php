<x-layout>
    <x-card class="p-10">
        <header>
            <h1 class="text-3xl text-center font-bold my-6 uppercase">
                Show Invoices
            </h1>
        </header>

        <table class="w-full table-auto rounded-sm">
            <tbody>
                {{-- Checking The Invoice Data --}}
                @unless($invoices->isEmpty())

                    {{-- Seperating The Data --}}
                    @foreach ($invoices as $invoice)
                        <tr class="border-gray-300">

                            {{-- The Name of the User --}}
                            <td class="px-4 py-8 border-t border-b border-gray-300 text-lg">
                                Name: {{ auth()->user()->name }}
                            </td>

                            {{-- Invoice Date --}}
                            <td class="px-4 py-8 border-t border-b border-gray-300 text-lg">
                                Date: {{ $invoice->invoice_date }}
                            </td>

                            {{-- The End of Action --}}
                            <td class="px-4 py-8 border-t border-b border-gray-300 text-lg">
                                <i class="fa-solid fa-pen-to-square"></i>
                                @if ($invoice->done == 1)
                                    <a>Done</a>
                                @else
                                    <p>Failed</p>
                                @endif
                            </td>
                        </tr>
                        {{-- End --}}
                    @endforeach
                @endunless
            </tbody>
        </table>
    </x-card>
</x-layout>

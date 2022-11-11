<x-layout>
    <x-card class="p-10">
        <header>
            <h1 class="text-3xl text-center font-bold my-6 uppercase">
                Show Contract
            </h1>
        </header>

        <table class="w-full table-auto rounded-sm">
            <tbody>
                <tr class="border-gray-300">
                    {{-- Date From --}}
                    <td class="px-4 py-8 border-t border-b border-gray-300 text-lg">
                        Valid From: {{ $contract->valid_from }}
                    </td>

                    {{-- Date To --}}
                    <td class="px-4 py-8 border-t border-b border-gray-300 text-lg">
                        Valid to: {{ $contract->valid_to }}
                    </td>

                    {{-- Prepayment --}}
                    <td class="px-4 py-8 border-t border-b border-gray-300 text-lg">
                        Prepayment: {{ $contract->prepayment }}$
                    </td>

                    {{-- Quantity of The Item --}}
                    <td class="px-4 py-8 border-t border-b border-gray-300 text-lg">
                        Quantity: {{ $contract->user_quantity }}
                    </td>

                    {{-- Total --}}
                    <td class="px-4 py-8 border-t border-b border-gray-300 text-lg">
                        Total: {{ $contract->prepayment * 2 }}$
                    </td>

                    {{-- The Edit/Delete Form --}}
                    <td class="px-4 py-8 border-t border-b border-gray-300 text-lg">
                        <i class="fa-solid fa-pen-to-square"></i>
                        <a href="/contracts/{{ $contract->user_id }}/edit">Edit</a>
                        <form method="POST" action="/contracts/{{ $contract->user_id }}">
                            @csrf
                            @method('DELETE')
                            <button class="text-red-500">
                                <i class="fa-solid fa-trash"></i>Delete
                            </button>
                        </form>
                    </td>
                    {{-- End --}}
                </tr>
            </tbody>
        </table>
    </x-card>
</x-layout>

<?php
/** @var Illuminate\Contracts\Pagination\LengthAwarePaginator|App\Invoice[] $invoices */
?>

<div x-data class="h-full min-w-0 w-full" xmlns:wire="http://www.w3.org/1999/xhtml">
    <div class="w-full md:px-4 py-4 md:px-6">
        <div class="w-full bg-gray-100 dark:bg-gray-800 md:border-x border-y border-gray-400 dark:border-gray-600 md:rounded-lg overflow-hidden">
            <div wire:loading class="w-full text-center text-gray-700 dark:text-gray-400 p-4">
                <span class="fas fa-sync-alt fa-4x fa-spin"></span>
            </div>

            <div wire:loading.remove class="w-full overflow-x-auto">
                @if(count($invoices) < 1)
                    <div class="w-full text-center font-medium p-4">
                        Sin Resultados
                    </div>
                @else
                    <table class="min-w-full tracking-wide">
                        {{-- Table Head --}}
                        <thead class="text-gray-700 dark:text-gray-400 text-sm bg-gray-200 dark:bg-gray-900 font-semibold uppercase">
                        <tr class="border-b border-gray-400 dark:border-gray-600">
                            <th class="px-4 md:px-6 py-2 text-center">ID</th>
                            <th class="px-4 md:px-6 py-2 text-left">Usuario</th>
                            <th class="px-4 md:px-6 py-2 text-left">Total</th>
                            <th class="px-4 md:px-6 py-2 text-left whitespace-no-wrap">Fecha de Pedido</th>
                            <th class="px-4 md:px-6 py-2 text-center"></th>
                        </tr>
                        </thead>

                        {{-- Table Body --}}
                        <tbody class="font-medium">
                        @foreach($invoices as $invoice)
                            <tr class="border-b-2 last:border-0 border-gray-200 dark:border-gray-700">
                                {{-- ID --}}
                                <td class="px-4 md:px-6 py-2 text-center">
                                    {{ $invoice->id }}
                                </td>

                                {{-- Usuario --}}
                                <td class="max-w-xs md:max-w-sm xl:max-w-2xl px-4 md:px-6 py-2 truncate">
                                    {{ $invoice->user->name }}
                                </td>

                                {{-- Total --}}
                                <td class="px-4 md:px-6 py-2 text-left">
                                    @price($invoice->total)
                                </td>

                                <td class="px-4 md:px-6 py-2 whitespace-no-wrap">
                                    {{ $invoice->created_at->format('F j, Y') }}
                                </td>

                                {{-- Actions --}}
                                <td class="px-4 md:px-6 py-2 text-center text-gray-600 dark:text-gray-500 whitespace-no-wrap">
                                    {{--<a class="inline-block align-middle hocus:text-blue-600 focus:shadow-outline focus:outline-none transform duration-200 hocus:scale-150 mx-2" href="{{ route('dashboard.posts.show', $invoice) }}">
                                        <span class="fas fa-eye"></span>
                                    </a>--}}
                                    <a
                                        class="text-blue-500 hocus:text-blue-700 hocus:underline focus:outline-none"
                                        href="{{ route('dashboard.invoices.invoice', $invoice) }}"
                                    >
                                        Ver Recibo
                                    </a>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                @endif
            </div>

            @if(count($invoices) > 0)
                {{ $invoices->onEachSide(1)->links() }}
            @endif
        </div>
    </div>
</div>

<x-app-layout>
    @section('breadcrumbs')
        {{ Breadcrumbs::render('home') }}
    @endsection
    <div class="grid grid-cols-12 gap-6">
        <div class="col-span-12 2xl:col-span-12">
            <div class="grid grid-cols-12 gap-6">
                <!-- BEGIN: General Report -->
                <div class="col-span-12 mt-8">
                    <div class="intro-y flex h-10 items-center">
                        <h2 class="mr-5 truncate text-lg font-medium">{{ __('General data') }}</h2>
                        <a
                            class="ml-auto flex items-center text-primary"
                            href=""
                        >
                            <x-base.lucide
                                class="mr-3 h-4 w-4"
                                icon="RefreshCcw"
                            /> {{ __('Refresh data') }}
                        </a>
                    </div>
                    <div class="mt-5 grid grid-cols-12 gap-6">
                        <div class="intro-y col-span-12 sm:col-span-6 xl:col-span-3">
                            <div @class([
                                'relative zoom-in',
                                'before:content-[\'\'] before:w-[90%] before:shadow-[0px_3px_20px_#0000000b] before:bg-slate-50 before:h-full before:mt-3 before:absolute before:rounded-md before:mx-auto before:inset-x-0 before:dark:bg-darkmode-400/70',
                            ])>
                                <div class="box p-5">
                                    <div class="flex">
                                        <x-base.lucide
                                            class="h-[28px] w-[28px] text-primary"
                                            icon="bar-chart-4"
                                        />
                                    </div>
                                    <div class="mt-6 text-3xl font-medium leading-8">{{ $events->count() }}</div>
                                    <div class="mt-1 text-base text-slate-500">{{ __('Total events') }}</div>
                                </div>
                            </div>
                        </div>
                        <div class="intro-y col-span-12 sm:col-span-6 xl:col-span-3">
                            <div @class([
                                'relative zoom-in',
                                'before:content-[\'\'] before:w-[90%] before:shadow-[0px_3px_20px_#0000000b] before:bg-slate-50 before:h-full before:mt-3 before:absolute before:rounded-md before:mx-auto before:inset-x-0 before:dark:bg-darkmode-400/70',
                            ])>
                                <div class="box p-5">
                                    <div class="flex">
                                        <x-base.lucide
                                            class="h-[28px] w-[28px] text-pending"
                                            icon="CreditCard"
                                        />
                                        <div class="ml-auto">

                                        </div>
                                    </div>
                                    <div class="mt-6 text-3xl font-medium leading-8">{{ $totalSold }}</div>
                                    <div class="mt-1 text-base text-slate-500">{{ __('Total tickets sold') }}</div>
                                </div>
                            </div>
                        </div>
                        <div class="intro-y col-span-12 sm:col-span-6 xl:col-span-3">
                            <div @class([
                                'relative zoom-in',
                                'before:content-[\'\'] before:w-[90%] before:shadow-[0px_3px_20px_#0000000b] before:bg-slate-50 before:h-full before:mt-3 before:absolute before:rounded-md before:mx-auto before:inset-x-0 before:dark:bg-darkmode-400/70',
                            ])>
                                <div class="box p-5">
                                    <div class="flex">
                                        <x-base.lucide
                                            class="h-[28px] w-[28px] text-success"
                                            icon="User"
                                        />
                                    </div>
                                    <div class="mt-6 text-3xl font-medium leading-8">{{ $totalEntries }}</div>
                                    <div class="mt-1 text-base text-slate-500">{{ __('Total of entries for all events') }}</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- END: General Report -->

                <!-- BEGIN: Weekly Top Products -->
                <div class="col-span-12 mt-6">
                    <div class="intro-y block h-10 items-center sm:flex">
                        <h2 class="mr-5 truncate text-lg font-medium">
                            {{ __('Last transactions made') }}
                        </h2>
                    </div>
                    @if($transactions->count() > 0)
                        <div class="intro-y mt-8 overflow-auto sm:mt-0 lg:overflow-visible">
                            <x-base.table class="border-separate border-spacing-y-[10px] sm:mt-2">
                                <x-base.table.thead>
                                    <x-base.table.tr>
                                        <x-base.table.th class="whitespace-nowrap border-b-0">
                                            {{ __('ID') }}
                                        </x-base.table.th>
                                        <x-base.table.th class="whitespace-nowrap border-b-0 text-center">
                                            {{ __('Approved') }}
                                        </x-base.table.th>
                                        <x-base.table.th class="whitespace-nowrap border-b-0 text-center">
                                            {{ __('Paid') }}
                                        </x-base.table.th>
                                        <x-base.table.th class="whitespace-nowrap border-b-0 text-center">
                                            {{ __('Created at') }}
                                        </x-base.table.th>
                                        <x-base.table.th class="whitespace-nowrap border-b-0 text-center">
                                            {{ __('Updated at') }}
                                        </x-base.table.th>
                                    </x-base.table.tr>
                                </x-base.table.thead>
                                <x-base.table.tbody>
                                    @foreach($transactions as $transaction)
                                        <x-base.table.tr class="intro-x">
                                            <x-base.table.td
                                                class="border-b-0 bg-white shadow-[20px_3px_20px_#0000000b] first:rounded-l-md last:rounded-r-md dark:bg-darkmode-600"
                                            >
                                                <div
                                                    class="whitespace-nowrap font-medium"
                                                    href=""
                                                >
                                                    {{ $transaction->id }}
                                                </div>
                                                <div class="mt-0.5 whitespace-nowrap text-xs text-slate-500">
                                                    {{ $transaction->method }}
                                                </div>
                                            </x-base.table.td>
                                            <x-base.table.td
                                                class="w-40 border-b-0 bg-white shadow-[20px_3px_20px_#0000000b] first:rounded-l-md last:rounded-r-md dark:bg-darkmode-600"
                                            >
                                                <div @class([
                                                        'flex items-center justify-center',
                                                        'text-success' => $transaction->approved == '1',
                                                        'text-danger' => $transaction->approved != '1',
                                                    ])>
                                                    <x-base.lucide
                                                        class="mr-2 h-4 w-4"
                                                        icon="CheckSquare"
                                                    />
                                                </div>
                                            </x-base.table.td>
                                            <x-base.table.td
                                                class="w-40 border-b-0 bg-white shadow-[20px_3px_20px_#0000000b] first:rounded-l-md last:rounded-r-md dark:bg-darkmode-600"
                                            >
                                                <div @class([
                                                        'flex items-center justify-center',
                                                        'text-success' => $transaction->paid == '1',
                                                        'text-danger' => $transaction->paid != '1',
                                                    ])>
                                                    <x-base.lucide
                                                        class="mr-2 h-4 w-4"
                                                        icon="CheckSquare"
                                                    />
                                                </div>
                                            </x-base.table.td>
                                            <x-base.table.td
                                                class="border-b-0 bg-white text-center shadow-[20px_3px_20px_#0000000b] first:rounded-l-md last:rounded-r-md dark:bg-darkmode-600"
                                            >
                                                {{ $transaction->created_at->format('d/m/Y H:i') }}
                                            </x-base.table.td>
                                            <x-base.table.td
                                                class="border-b-0 bg-white text-center shadow-[20px_3px_20px_#0000000b] first:rounded-l-md last:rounded-r-md dark:bg-darkmode-600"
                                            >
                                                {{ $transaction->updated_at->format('d/m/Y H:i') }}
                                            </x-base.table.td>
                                        </x-base.table.tr>
                                    @endforeach
                                </x-base.table.tbody>
                            </x-base.table>
                        </div>
                        <div class="intro-y mt-3 flex flex-wrap items-center sm:flex-row sm:flex-nowrap">
                            <x-base.pagination class="w-full sm:mr-auto sm:w-auto">
                                @php
                                    // Determine the range of pages to display
                                    $start = max($transactions->currentPage() - 2, 1);
                                    $end = min($transactions->currentPage() + 2, $transactions->lastPage());
                                    $showFirst = $start > 1;
                                    $showLast = $end < $transactions->lastPage();
                                @endphp

                                @if ($showFirst)
                                    <x-base.pagination.link href="{{ $transactions->url(1) }}"><<</x-base.pagination.link>
                                @endif

                                @if ($transactions->currentPage() > 1)
                                    <x-base.pagination.link href="{{ $transactions->previousPageUrl() }}">
                                        <x-base.lucide class="h-4 w-4" icon="ChevronLeft"/>
                                    </x-base.pagination.link>
                                @endif

                                @for ($i = $start; $i <= $end; $i++)
                                    @if ($i == $transactions->currentPage())
                                        <x-base.pagination.link active>{{ $i }}</x-base.pagination.link>
                                    @else
                                        <x-base.pagination.link href="{{ $transactions->url($i) }}">{{ $i }}</x-base.pagination.link>
                                    @endif
                                @endfor

                                @if ($transactions->hasMorePages())
                                    <x-base.pagination.link href="{{ $transactions->nextPageUrl() }}">
                                        <x-base.lucide class="h-4 w-4" icon="ChevronRight"/>
                                    </x-base.pagination.link>
                                @endif

                                @if ($showLast)
                                    <x-base.pagination.link href="{{ $transactions->url($transactions->lastPage()) }}">>></x-base.pagination.link>
                                @endif
                            </x-base.pagination>

                            <form method="GET" action="{{ route('dashboard') }}">
                                <x-base.form-select name="per_page" class="!box mt-3 w-20 sm:mt-0" onchange="this.form.submit()">
                                    <option value="10" {{ $perPage == 10 ? 'selected' : '' }}>10</option>
                                    <option value="25" {{ $perPage == 25 ? 'selected' : '' }}>25</option>
                                    <option value="35" {{ $perPage == 35 ? 'selected' : '' }}>35</option>
                                    <option value="50" {{ $perPage == 50 ? 'selected' : '' }}>50</option>
                                </x-base.form-select>
                            </form>
                        </div>
                    @else
                        <div class="intro-y mt-8 overflow-auto sm:mt-0 lg:overflow-visible">
                            <div class="intro-y col-span-12 flex items-center justify-center">
                                <x-base.alert class="w-full">
                                    {{ __('No transactions found') }}
                                </x-base.alert>
                            </div>
                        </div>
                    @endif
                </div>
                <!-- END: Weekly Top Products -->
            </div>
        </div>

    </div>


</x-app-layout>

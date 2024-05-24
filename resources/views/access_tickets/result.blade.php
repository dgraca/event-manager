<x-app-layout>
    @section('breadcrumbs')
        {{ Breadcrumbs::render('access-tickets.result') }}
    @endsection
    @once
        @push('firstStyles')
            @filamentStyles
        @endpush
    @endonce
    @once
        @push('scripts')
            @filamentScripts
        @endpush
    @endonce
    <div class="intro-y mt-8 flex flex-col items-center sm:flex-row">
        <h2 class="mr-auto text-lg font-medium">{{ __('Validation Result') }}</h2>
    </div>
    <!-- BEGIN: HTML Table Data -->
    <div class="mt-8">
        <div class="w-full flex flex-col items-center justify-between">
            @if($result == 'valid')
                <x-base.lucide
                    :tw-merge="false"
                    class="h-12 w-12 text-green-500"
                    icon="thumbs-up"
                />
            @else
                <x-base.lucide
                    :tw-merge="false"
                    class="h-12 w-12 text-red-500"
                    icon="thumbs-down"
                />
            @endif
        </div>
        <div>
            <div class="mt-4 flex justify-center">
                <p class="w-48 px-5 tracking-tight font-semibold py-3 text-center text-gray-600 bg-white rounded-lg shadow-lg -bottom-12 dark:shadow-none shadow-gray-200 dark:bg-gray-800 dark:text-white">
                    @if($result == 'valid')
                        {{ __('Valid ticket') }}
                    @else
                        {{ __('Invalid ticket') }}
                    @endif
                </p>
            </div>
        </div>
    </div>
</x-app-layout>

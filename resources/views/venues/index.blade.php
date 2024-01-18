<x-app-layout>
    @section('breadcrumbs')
        {{ Breadcrumbs::render('venues.index') }}
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
        <h2 class="mr-auto text-lg font-medium">{{ __('Venues') }}</h2>
        <div class="mt-4 flex w-full sm:mt-0 sm:w-auto">
            <x-base.button
                class="mr-2 shadow-md"
                variant="primary"
                href="{{ route('venues.create') }}"
                as="a"
            >
                {{ __('Create Venue') }}
            </x-base.button>
        </div>
    </div>
    <!-- BEGIN: HTML Table Data -->
    <div class="intro-y mt-8">
        <livewire:venues-table />

    </div>
</x-app-layout>

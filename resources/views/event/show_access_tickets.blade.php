<x-app-layout>
    @section('breadcrumbs')
        {{ Breadcrumbs::render('events.validate', $event) }}
    @endsection
    <div class="intro-y mt-8 flex flex-col items-center sm:flex-row">
        <h2 class="mr-auto text-lg font-medium">{{ __('Validate access tickets') }}</h2>
    </div>
    <livewire:validate-transactions :transactions="$transactions" />
</x-app-layout>

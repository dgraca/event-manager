<x-app-layout>
    @section('breadcrumbs')
        {{ Breadcrumbs::render('payment-options.create') }}
    @endsection
    <div class="intro-y mt-8 flex flex-col items-center sm:flex-row">
        <h2 class="mr-auto text-lg font-medium">{{ __('Create Payment Options') }}</h2>
    </div>
    <livewire:payment-form :paymentOption="$paymentOption" />
</x-app-layout>

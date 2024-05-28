<x-app-layout>
    @section('breadcrumbs')
        {{ Breadcrumbs::render('events.create') }}
    @endsection
    <div class="intro-y mt-8 flex flex-col items-center sm:flex-row">
        <h2 class="mr-auto text-lg font-medium">{{ __('Create Event') }}</h2>
    </div>
    <livewire:event-creator :event="$event" />
</x-app-layout>

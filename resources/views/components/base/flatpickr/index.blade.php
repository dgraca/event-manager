<x-base.form-input
    type="text"
    {{ $attributes->class(merge(['', $attributes->whereStartsWith('class')->first()]))->merge($attributes->whereDoesntStartWith('class')->getAttributes()) }}
/>

@once
    @push('vendors')
        @vite('resources/js/vendor/flatpickr/index.js')
    @endpush
@endonce

@once
    @push('scripts')
        @vite('resources/js/components/flatpickr/index.js')
    @endpush
@endonce

@once
    @push('styles')
        @vite('resources/css/components/_flatpickr.css')
    @endpush
@endonce


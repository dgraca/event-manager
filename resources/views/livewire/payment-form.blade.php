<div
    x-on:venue-created="toastShow('{{ __('Saved with success') }}', '', 'success')"
    x-on:venue-error="toastShow('{{ __('Failed to save') }}', '', 'error')"
>
    <form wire:submit="save" method="POST" accept-charset="UTF-8">
        @csrf

        <div class="box mt-3 p-5">
            @include('payment_options.fields-livewire')
        </div>

        <div class="mt-5 text-right">
            <x-base.button
                class="mr-1 w-24"
                as="a"
                variant="outline-secondary"
                href="{{ route('payment-options.index') }}"
            >{{ __('Cancel') }}
            </x-base.button>
            <x-base.button
                class="w-24"
                type="submit"
                variant="primary"
            >{{ __('Save') }}
            </x-base.button>
        </div>
    </form>

</div>

<div class="p-4 ">
    <form wire:submit="save" method="POST" accept-charset="UTF-8">
        @csrf

        <h1 class="font-semibold text-2xl tracking-wide">{{ __('Add venue') }}</h1>
        <div class="mt-4">
            @include('venues.fields-livewire', ['venue' => $venue])
        </div>
        <div class="flex flex-row items-center justify-end gap-2">
            <x-base.button
                :tw-merge="false"
                class="mr-1 w-auto"
                type="button"
                variant="outline-warning"
                wire:click="$dispatch('closeModal')"
            >{{ __('Cancel') }}
            </x-base.button>
            <x-base.button
                :tw-merge="false"
                class="mr-1 w-auto"
                type="submit"
                variant="primary"
            >{{ __('Save') }}
            </x-base.button>
        </div>
    </form>
</div>

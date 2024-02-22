<div
    x-on:venue-created="toastShow('{{ __('Saved with success') }}', '', 'success')"
    x-on:venue-error="toastShow('{{ __('Failed to save') }}', '', 'error')"
>
    <form wire:submit="save" method="POST" accept-charset="UTF-8">
        @csrf

        {{--   SECTION 1 - Event details     --}}
        <h1 class="mt-6">SECÇÃO 1</h1>
        <div class="box mt-3 p-5">
            @include('event.fields')
        </div>

        {{--   SECTION 2 - Event Session details     --}}
        <h1 class="mt-6">SECÇÃO 2</h1>
        <div class="box mt-3 p-5">
            @if(count($eventSessionForm->sessions) <= 0)
                <div class="w-full text-center">
                    <h1 class="text-lg font-light">{{ __('Add sessions') }}</h1>
                </div>
            @endif

            @foreach($eventSessionForm->sessions as $index => $session)
                <div class="box mt-3 p-5">
                    <h1 class="text-lg font-light">Session #{{ $index + 1 }}</h1>
                    <div wire:key="session-{{ $index }}" class="mt-3">
                        @include('event_sessions.livewire-fields', ['session' => $session])
                        <div class="mt-5 text-right">
                            <x-base.button
                                :tw-merge="false"
                                type="button"
                                variant="outline-danger"
                                wire:click="removeSession({{ $index }})"
                            >{{ __('Remove session') }}
                            </x-base.button>
                        </div>
                    </div>
                </div>
            @endforeach

            <div class="text-right {{ count($eventSessionForm->sessions) > 0 ? 'mt-5' : ''}}">
                <x-base.button
                    :tw-merge="false"
                    class="mr-1 w-24"
                    type="button"
                    variant="outline-primary"
                    wire:click="addSession"
                >{{ __('Add session') }}
                </x-base.button>
            </div>
        </div>

        {{--   SECTION 3 - Ticket details     --}}
        <h1 class="mt-6">SECÇÃO 3</h1>
        <div class="box mt-3 p-5">
            @if(count($ticketForm->tickets) <= 0)
                <div class="w-full text-center">
                    <h1 class="text-lg font-light">{{ __('Add tickets') }}</h1>
                </div>
            @endif

            @foreach($ticketForm->tickets as $index => $ticket)
                <div class="box mt-3 p-5">
                    <h1 class="text-lg font-light">Ticket #{{ $index + 1 }}</h1>
                    <div wire:key="ticket-{{ $index }}" class="mt-3">
                        @include('tickets.fields-livewire', ['ticket' => $ticket])
                        <div class="mt-5 text-right">
                            <x-base.button
                                :tw-merge="false"
                                type="button"
                                variant="outline-danger"
                                wire:click="removeTicket({{ $index }})"
                            >{{ __('Remove ticket') }}
                            </x-base.button>
                        </div>
                    </div>
                </div>
            @endforeach

            <div class="text-right {{ count($ticketForm->tickets) > 0 ? 'mt-5' : ''}}">
                <x-base.button
                    :tw-merge="false"
                    class="mr-1 w-24"
                    type="button"
                    variant="outline-primary"
                    wire:click="addTicket"
                >{{ __('Add ticket') }}
                </x-base.button>
            </div>
        </div>

        {{--    Events Create form submition    --}}
        <div class="mt-5 text-right">
            <x-base.button
                :tw-merge="false"
                class="mr-1 w-24"
                type="a"
                variant="outline-secondary"
                href="{{ route('events.index') }}"
            >{{ __('Cancel') }}
            </x-base.button>
            <x-base.button
                :tw-merge="false"
                class="w-24"
                type="submit"
                variant="primary"
            >{{ __('Save') }}
            </x-base.button>
        </div>
    </form>
</div>

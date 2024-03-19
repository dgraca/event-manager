<!-- Event Id Field -->
{{--<div class="mb-3">--}}
{{--    <x-base.form-label for="event_id">{{ $ticket->getAttributeLabel('event_id') }}</x-base.form-label>--}}
{{--    <x-base.form-input--}}
{{--        class="w-full {{ ($errors->has('event_id') ? 'border-danger' : '') }}"--}}
{{--        id="event_id"--}}
{{--        name="event_id"--}}
{{--        :value="old('event_id', $ticket->event_id ?? '')"--}}
{{--        type="number"--}}
{{--        step="1"--}}
{{--    />--}}
{{--    @error('event_id')--}}
{{--        <div class="mt-2 text-danger">{{ $message }}</div>--}}
{{--    @enderror--}}
{{--</div>--}}

<!-- Zone Id Field -->
{{--<div class="mb-3">--}}
{{--    <x-base.form-label for="zone_id">{{ $ticket->getAttributeLabel('zone_id') }}</x-base.form-label>--}}
{{--    <x-base.form-input--}}
{{--        class="w-full {{ ($errors->has('zone_id') ? 'border-danger' : '') }}"--}}
{{--        id="zone_id"--}}
{{--        name="zone_id"--}}
{{--        :value="old('zone_id', $ticket->zone_id ?? '')"--}}
{{--        type="number"--}}
{{--        step="1"--}}
{{--    />--}}
{{--    @error('zone_id')--}}
{{--        <div class="mt-2 text-danger">{{ $message }}</div>--}}
{{--    @enderror--}}
{{--</div>--}}

<!-- Name Field -->
<div class="mb-3">
    <x-base.form-label :tw-merge="false" for="name">{{ \App\Models\Ticket::getAttributeLabelStatic('name') }}</x-base.form-label>
    <x-base.form-input
        :tw-merge="false"
        class="w-full {{ ($errors->has('name') ? 'border-danger' : '') }}"
        wire:model.live="ticketForm.tickets.{{ $index }}.name"
        type="text"
    />
    @error('name')
        <div class="mt-2 text-danger">{{ $message }}</div>
    @enderror
</div>

<!-- Description Field -->
<div class="mb-3">
    <x-base.form-label :tw-merge="false" for="description">{{ \App\Models\Ticket::getAttributeLabelStatic('description') }}</x-base.form-label>
    <x-base.form-textarea
        :tw-merge="false"
        class="w-full {{ ($errors->has('description') ? 'border-danger' : '') }}"
        wire:model.live="ticketForm.tickets.{{ $index }}.description"
        rows="5"
    ></x-base.form-textarea>
    @error('description')
        <div class="mt-2 text-danger">{{ $message }}</div>
    @enderror
</div>

<!-- Max Check In Field -->
<div class="mb-3">
    <x-base.form-label :tw-merge="false" for="max_check_in">{{ \App\Models\Ticket::getAttributeLabelStatic('max_check_in') }}</x-base.form-label>
    <x-base.form-input
        :tw-merge="false"
        class="w-full {{ ($errors->has('max_check_in') ? 'border-danger' : '') }}"
        wire:model.live="ticketForm.tickets.{{ $index }}.max_check_in"
        type="number"
        step="1"
    />
    @error('max_check_in')
        <div class="mt-2 text-danger">{{ $message }}</div>
    @enderror
</div>

<!-- Max Tickets Per Order Field -->
<div class="mb-3">
    <x-base.form-label :tw-merge="false" for="max_tickets_per_order">{{ \App\Models\Ticket::getAttributeLabelStatic('max_tickets_per_order') }}</x-base.form-label>
    <x-base.form-input
        :tw-merge="false"
        class="w-full {{ ($errors->has('max_tickets_per_order') ? 'border-danger' : '') }}"
        wire:model.live="ticketForm.tickets.{{ $index }}.max_tickets_per_order"
        type="number"
        step="1"
    />
    @error('max_tickets_per_order')
        <div class="mt-2 text-danger">{{ $message }}</div>
    @enderror
</div>

<!-- Price Field -->
<div class="mb-3">
    <x-base.form-label :tw-merge="false" for="price">{{ \App\Models\Ticket::getAttributeLabelStatic('price') }}</x-base.form-label>
    <x-base.form-input
        :tw-merge="false"
        class="w-full {{ ($errors->has('price') ? 'border-danger' : '') }}"
        wire:model.live="ticketForm.tickets.{{ $index }}.price"
        type="number"
        step="1"
        step="1"
    />
    @error('price')
        <div class="mt-2 text-danger">{{ $message }}</div>
    @enderror
</div>

<!-- Currency Field -->
<div class="mb-3">
    <x-base.form-label :tw-merge="false" for="currency">{{ \App\Models\Ticket::getAttributeLabelStatic('currency') }}</x-base.form-label>
    <x-base.form-input
        :tw-merge="false"
        class="w-full {{ ($errors->has('currency') ? 'border-danger' : '') }}"
        wire:model.live="ticketForm.tickets.{{ $index }}.currency"
        type="text"
    />
    @error('currency')
        <div class="mt-2 text-danger">{{ $message }}</div>
    @enderror
</div>

<div class="mb-3">
    <x-base.form-label :tw-merge="false" for="session_id">{{ \App\Models\Ticket::getAttributeLabelStatic('session_id') }}</x-base.form-label>
    <x-base.form-select
        :tw-merge="false"
        class="w-full {{ ($errors->has('session_id') ? 'border-danger' : '') }}"
        wire:model="ticketForm.tickets.{{ $index }}.session_id"
    >
        <option value="">{{ __('Select session') }}</option>
        @foreach($sessions as $index => $session)
            <option wire:key="session-{{ $index }}" value="session-{{ $index }}">{{ $session["name"] }}</option>
        @endforeach
    </x-base.form-select>
    @error('session_id')
    <div class="mt-2 text-danger">{{ $message }}</div>
    @enderror
</div>

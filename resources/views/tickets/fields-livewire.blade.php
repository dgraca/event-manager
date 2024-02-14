<!-- Event Id Field -->
{{--<div class="mb-3">--}}
{{--    <x-base.form-label for="event_id">{{ $tickets->getAttributeLabel('event_id') }}</x-base.form-label>--}}
{{--    <x-base.form-input--}}
{{--        class="w-full {{ ($errors->has('event_id') ? 'border-danger' : '') }}"--}}
{{--        id="event_id"--}}
{{--        name="event_id"--}}
{{--        :value="old('event_id', $tickets->event_id ?? '')"--}}
{{--        type="number"--}}
{{--        step="1"--}}
{{--    />--}}
{{--    @error('event_id')--}}
{{--        <div class="mt-2 text-danger">{{ $message }}</div>--}}
{{--    @enderror--}}
{{--</div>--}}

<!-- Zone Id Field -->
{{--<div class="mb-3">--}}
{{--    <x-base.form-label for="zone_id">{{ $tickets->getAttributeLabel('zone_id') }}</x-base.form-label>--}}
{{--    <x-base.form-input--}}
{{--        class="w-full {{ ($errors->has('zone_id') ? 'border-danger' : '') }}"--}}
{{--        id="zone_id"--}}
{{--        name="zone_id"--}}
{{--        :value="old('zone_id', $tickets->zone_id ?? '')"--}}
{{--        type="number"--}}
{{--        step="1"--}}
{{--    />--}}
{{--    @error('zone_id')--}}
{{--        <div class="mt-2 text-danger">{{ $message }}</div>--}}
{{--    @enderror--}}
{{--</div>--}}

<!-- Name Field -->
<div class="mb-3">
    <x-base.form-label :tw-merge="false" for="name">{{ $tickets->getAttributeLabel('name') }}</x-base.form-label>
    <x-base.form-input
        :tw-merge="false"
        class="w-full {{ ($errors->has('name') ? 'border-danger' : '') }}"
        wire:model="name"
        type="text"
    />
    @error('name')
        <div class="mt-2 text-danger">{{ $message }}</div>
    @enderror
</div>

<!-- Description Field -->
<div class="mb-3">
    <x-base.form-label :tw-merge="false" for="description">{{ $tickets->getAttributeLabel('description') }}</x-base.form-label>
    <x-base.form-textarea
        :tw-merge="false"
        class="w-full {{ ($errors->has('description') ? 'border-danger' : '') }}"
        wire:model="description"
        rows="5"
    ></x-base.form-textarea>
    @error('description')
        <div class="mt-2 text-danger">{{ $message }}</div>
    @enderror
</div>

<!-- Max Check In Field -->
<div class="mb-3">
    <x-base.form-label :tw-merge="false" for="max_check_in">{{ $tickets->getAttributeLabel('max_check_in') }}</x-base.form-label>
    <x-base.form-input
        :tw-merge="false"
        class="w-full {{ ($errors->has('max_check_in') ? 'border-danger' : '') }}"
        wire:model="max_check_in"
        type="number"
        step="1"
    />
    @error('max_check_in')
        <div class="mt-2 text-danger">{{ $message }}</div>
    @enderror
</div>

<!-- Max Tickets Per Order Field -->
<div class="mb-3">
    <x-base.form-label :tw-merge="false" for="max_tickets_per_order">{{ $tickets->getAttributeLabel('max_tickets_per_order') }}</x-base.form-label>
    <x-base.form-input
        :tw-merge="false"
        class="w-full {{ ($errors->has('max_tickets_per_order') ? 'border-danger' : '') }}"
        wire:model="max_tickets_per_order"
        type="number"
        step="1"
    />
    @error('max_tickets_per_order')
        <div class="mt-2 text-danger">{{ $message }}</div>
    @enderror
</div>

<!-- Price Field -->
<div class="mb-3">
    <x-base.form-label :tw-merge="false" for="price">{{ $tickets->getAttributeLabel('price') }}</x-base.form-label>
    <x-base.form-input
        :tw-merge="false"
        class="w-full {{ ($errors->has('price') ? 'border-danger' : '') }}"
        wire:model="price"
        type="number"
        step="1"
    />
    @error('price')
        <div class="mt-2 text-danger">{{ $message }}</div>
    @enderror
</div>

<!-- Currency Field -->
<div class="mb-3">
    <x-base.form-label :tw-merge="false" for="currency">{{ $tickets->getAttributeLabel('currency') }}</x-base.form-label>
    <x-base.form-input
        :tw-merge="false"
        class="w-full {{ ($errors->has('currency') ? 'border-danger' : '') }}"
        wire:model="currency"
        type="text"
    />
    @error('currency')
        <div class="mt-2 text-danger">{{ $message }}</div>
    @enderror
</div>

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
    <x-base.form-label for="name">{{ $ticket->getAttributeLabel('name') }}</x-base.form-label>
    <x-base.form-input
        class="w-full {{ ($errors->has('name') ? 'border-danger' : '') }}"
        id="name"
        name="name"
        :value="old('name', $ticket->name ?? '')"
        type="text"
    />
    @error('name')
        <div class="mt-2 text-danger">{{ $message }}</div>
    @enderror
</div>

<!-- Description Field -->
<div class="mb-3">
    <x-base.form-label for="description">{{ $ticket->getAttributeLabel('description') }}</x-base.form-label>
    <x-base.form-textarea
        class="w-full {{ ($errors->has('description') ? 'border-danger' : '') }}"
        id="description"
        name="description"
        rows="5"
    >{{ old('description', $ticket->description ?? '') }}</x-base.form-textarea>
    @error('description')
        <div class="mt-2 text-danger">{{ $message }}</div>
    @enderror
</div>

<!-- Max Check In Field -->
<div class="mb-3">
    <x-base.form-label for="max_check_in">{{ $ticket->getAttributeLabel('max_check_in') }}</x-base.form-label>
    <x-base.form-input
        class="w-full {{ ($errors->has('max_check_in') ? 'border-danger' : '') }}"
        id="max_check_in"
        name="max_check_in"
        :value="old('max_check_in', $ticket->max_check_in ?? '')"
        type="number"
        step="1"
    />
    @error('max_check_in')
        <div class="mt-2 text-danger">{{ $message }}</div>
    @enderror
</div>

<!-- Max Tickets Per Order Field -->
<div class="mb-3">
    <x-base.form-label for="max_tickets_per_order">{{ $ticket->getAttributeLabel('max_tickets_per_order') }}</x-base.form-label>
    <x-base.form-input
        class="w-full {{ ($errors->has('max_tickets_per_order') ? 'border-danger' : '') }}"
        id="max_tickets_per_order"
        name="max_tickets_per_order"
        :value="old('max_tickets_per_order', $tickets->max_tickets_per_order ?? '')"
        type="number"
        step="1"
    />
    @error('max_tickets_per_order')
        <div class="mt-2 text-danger">{{ $message }}</div>
    @enderror
</div>

<!-- Price Field -->
<div class="mb-3">
    <x-base.form-label for="price">{{ $ticket->getAttributeLabel('price') }}</x-base.form-label>
    <x-base.form-input
        class="w-full {{ ($errors->has('price') ? 'border-danger' : '') }}"
        id="price"
        name="price"
        :value="old('price', $ticket->price ?? '')"
        type="number"
        step="1"
    />
    @error('price')
        <div class="mt-2 text-danger">{{ $message }}</div>
    @enderror
</div>

<!-- Currency Field -->
<div class="mb-3">
    <x-base.form-label for="currency">{{ $ticket->getAttributeLabel('currency') }}</x-base.form-label>
    <x-base.form-input
        class="w-full {{ ($errors->has('currency') ? 'border-danger' : '') }}"
        id="currency"
        name="currency"
        :value="old('currency', $ticket->currency ?? '')"
        type="text"
    />
    @error('currency')
        <div class="mt-2 text-danger">{{ $message }}</div>
    @enderror
</div>

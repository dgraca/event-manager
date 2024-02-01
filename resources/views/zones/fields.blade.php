<!-- Venue Id Field -->
<div class="mb-3">
    <x-base.form-label for="venue_id">{{ $zone->getAttributeLabel('venue_id') }}</x-base.form-label>
    <x-base.form-input
        class="w-full {{ ($errors->has('venue_id') ? 'border-danger' : '') }}"
        id="venue_id"
        name="venue_id"
        :value="old('venue_id', $zone->venue_id ?? '')"
        type="number"
        step="1"
    />
    @error('venue_id')
        <div class="mt-2 text-danger">{{ $message }}</div>
    @enderror
</div>

<!-- Name Field -->
<div class="mb-3">
    <x-base.form-label for="name">{{ $zone->getAttributeLabel('name') }}</x-base.form-label>
    <x-base.form-input
        class="w-full {{ ($errors->has('name') ? 'border-danger' : '') }}"
        id="name"
        name="name"
        :value="old('name', $zone->name ?? '')"
        type="text"
    />
    @error('name')
        <div class="mt-2 text-danger">{{ $message }}</div>
    @enderror
</div>

<!-- Slug Field -->
<div class="mb-3">
    <x-base.form-label for="slug">{{ $zone->getAttributeLabel('slug') }}</x-base.form-label>
    <x-base.form-input
        class="w-full {{ ($errors->has('slug') ? 'border-danger' : '') }}"
        id="slug"
        name="slug"
        :value="old('slug', $zone->slug ?? '')"
        type="text"
    />
    @error('slug')
        <div class="mt-2 text-danger">{{ $message }}</div>
    @enderror
</div>

<!-- Max Capacity Field -->
<div class="mb-3">
    <x-base.form-label for="max_capacity">{{ $zone->getAttributeLabel('max_capacity') }}</x-base.form-label>
    <x-base.form-input
        class="w-full {{ ($errors->has('max_capacity') ? 'border-danger' : '') }}"
        id="max_capacity"
        name="max_capacity"
        :value="old('max_capacity', $zone->max_capacity ?? '')"
        type="number"
        step="1"
    />
    @error('max_capacity')
        <div class="mt-2 text-danger">{{ $message }}</div>
    @enderror
</div>

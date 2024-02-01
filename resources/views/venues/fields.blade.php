<!-- Entity Id Field -->
<div class="mb-3">
    <x-base.form-label for="entity_id">{{ $venue->getAttributeLabel('entity_id') }}</x-base.form-label>
    <x-base.form-input
        class="w-full {{ ($errors->has('entity_id') ? 'border-danger' : '') }}"
        id="entity_id"
        name="entity_id"
        :value="old('entity_id', $venue->entity_id ?? '')"
        type="number"
        step="1"
    />
    @error('entity_id')
        <div class="mt-2 text-danger">{{ $message }}</div>
    @enderror
</div>

<!-- Name Field -->
<div class="mb-3">
    <x-base.form-label for="name">{{ $venue->getAttributeLabel('name') }}</x-base.form-label>
    <x-base.form-input
        class="w-full {{ ($errors->has('name') ? 'border-danger' : '') }}"
        id="name"
        name="name"
        :value="old('name', $venue->name ?? '')"
        type="text"
    />
    @error('name')
        <div class="mt-2 text-danger">{{ $message }}</div>
    @enderror
</div>

<!-- Slug Field -->
<div class="mb-3">
    <x-base.form-label for="slug">{{ $venue->getAttributeLabel('slug') }}</x-base.form-label>
    <x-base.form-input
        class="w-full {{ ($errors->has('slug') ? 'border-danger' : '') }}"
        id="slug"
        name="slug"
        :value="old('slug', $venue->slug ?? '')"
        type="text"
    />
    @error('slug')
        <div class="mt-2 text-danger">{{ $message }}</div>
    @enderror
</div>

<!-- Address Field -->
<div class="mb-3">
    <x-base.form-label for="address">{{ $venue->getAttributeLabel('address') }}</x-base.form-label>
    <x-base.form-input
        class="w-full {{ ($errors->has('address') ? 'border-danger' : '') }}"
        id="address"
        name="address"
        :value="old('address', $venue->address ?? '')"
        type="text"
    />
    @error('address')
        <div class="mt-2 text-danger">{{ $message }}</div>
    @enderror
</div>

<!-- Location Field -->
<div class="mb-3">
    <x-base.form-label for="location">{{ $venue->getAttributeLabel('location') }}</x-base.form-label>
    <x-base.form-input
        class="w-full {{ ($errors->has('location') ? 'border-danger' : '') }}"
        id="location"
        name="location"
        :value="old('location', $venue->location ?? '')"
        type="text"
    />
    @error('location')
        <div class="mt-2 text-danger">{{ $message }}</div>
    @enderror
</div>

<!-- Country Field -->
<div class="mb-3">
    <x-base.form-label for="country">{{ $venue->getAttributeLabel('country') }}</x-base.form-label>
    <x-base.form-input
        class="w-full {{ ($errors->has('country') ? 'border-danger' : '') }}"
        id="country"
        name="country"
        :value="old('country', $venue->country ?? '')"
        type="text"
    />
    @error('country')
        <div class="mt-2 text-danger">{{ $message }}</div>
    @enderror
</div>

<!-- Postcode Field -->
<div class="mb-3">
    <x-base.form-label for="postcode">{{ $venue->getAttributeLabel('postcode') }}</x-base.form-label>
    <x-base.form-input
        class="w-full {{ ($errors->has('postcode') ? 'border-danger' : '') }}"
        id="postcode"
        name="postcode"
        :value="old('postcode', $venue->postcode ?? '')"
        type="text"
    />
    @error('postcode')
        <div class="mt-2 text-danger">{{ $message }}</div>
    @enderror
</div>

<!-- Latitude Field -->
<div class="mb-3">
    <x-base.form-label for="latitude">{{ $venue->getAttributeLabel('latitude') }}</x-base.form-label>
    <x-base.form-input
        class="w-full {{ ($errors->has('latitude') ? 'border-danger' : '') }}"
        id="latitude"
        name="latitude"
        :value="old('latitude', $venue->latitude ?? '')"
        type="text"
    />
    @error('latitude')
        <div class="mt-2 text-danger">{{ $message }}</div>
    @enderror
</div>

<!-- Longitude Field -->
<div class="mb-3">
    <x-base.form-label for="longitude">{{ $venue->getAttributeLabel('longitude') }}</x-base.form-label>
    <x-base.form-input
        class="w-full {{ ($errors->has('longitude') ? 'border-danger' : '') }}"
        id="longitude"
        name="longitude"
        :value="old('longitude', $venue->longitude ?? '')"
        type="text"
    />
    @error('longitude')
        <div class="mt-2 text-danger">{{ $message }}</div>
    @enderror
</div>

<!-- Email Field -->
<div class="mb-3">
    <x-base.form-label for="email">{{ $venue->getAttributeLabel('email') }}</x-base.form-label>
    <x-base.form-input
        class="w-full {{ ($errors->has('email') ? 'border-danger' : '') }}"
        id="email"
        name="email"
        :value="old('email', $venue->email ?? '')"
        type="email"
    />
    @error('email')
        <div class="mt-2 text-danger">{{ $message }}</div>
    @enderror
</div>

<!-- Phone Field -->
<div class="mb-3">
    <x-base.form-label for="phone">{{ $venue->getAttributeLabel('phone') }}</x-base.form-label>
    <x-base.form-input
        class="w-full {{ ($errors->has('phone') ? 'border-danger' : '') }}"
        id="phone"
        name="phone"
        :value="old('phone', $venue->phone ?? '')"
        type="text"
    />
    @error('phone')
        <div class="mt-2 text-danger">{{ $message }}</div>
    @enderror
</div>

<!-- Mobile Field -->
<div class="mb-3">
    <x-base.form-label for="mobile">{{ $venue->getAttributeLabel('mobile') }}</x-base.form-label>
    <x-base.form-input
        class="w-full {{ ($errors->has('mobile') ? 'border-danger' : '') }}"
        id="mobile"
        name="mobile"
        :value="old('mobile', $venue->mobile ?? '')"
        type="text"
    />
    @error('mobile')
        <div class="mt-2 text-danger">{{ $message }}</div>
    @enderror
</div>

{{--<!-- Entity Id Field -->--}}
{{--<div class="mb-3">--}}
{{--    <x-base.form-label :tw-merge="false" for="entity_id">{{ $venue->getAttributeLabel('entity_id') }}</x-base.form-label>--}}
{{--    <x-base.form-input--}}
{{--        :tw-merge="false"--}}
{{--        class="w-full {{ ($errors->has('entity_id') ? 'border-danger' : '') }}"--}}
{{--        id="entity_id"--}}
{{--        name="entity_id"--}}
{{--        :value="old('entity_id', $venue->entity_id ?? '')"--}}
{{--        type="number"--}}
{{--        step="1"--}}
{{--    />--}}
{{--    @error('entity_id')--}}
{{--        <div class="mt-2 text-danger">{{ $message }}</div>--}}
{{--    @enderror--}}
{{--</div>--}}

<!-- Name Field -->
<div class="mb-3">
    <x-base.form-label :tw-merge="false" for="name">{{ $venue->getAttributeLabel('name') }}</x-base.form-label>
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

{{--<!-- Slug Field -->--}}
{{--<div class="mb-3">--}}
{{--    <x-base.form-label :tw-merge="false" for="slug">{{ $venue->getAttributeLabel('slug') }}</x-base.form-label>--}}
{{--    <x-base.form-input--}}
{{--        :tw-merge="false"--}}
{{--        class="w-full {{ ($errors->has('slug') ? 'border-danger' : '') }}"--}}
{{--        id="slug"--}}
{{--        name="slug"--}}
{{--        :value="old('slug', $venue->slug ?? '')"--}}
{{--        type="text"--}}
{{--    />--}}
{{--    @error('slug')--}}
{{--        <div class="mt-2 text-danger">{{ $message }}</div>--}}
{{--    @enderror--}}
{{--</div>--}}

<!-- Address Field -->
<div class="mb-3">
    <x-base.form-label :tw-merge="false" for="address">{{ $venue->getAttributeLabel('address') }}</x-base.form-label>
    <x-base.form-input
        :tw-merge="false"
        class="w-full {{ ($errors->has('address') ? 'border-danger' : '') }}"
        wire:model="address"
        type="text"
    />
    @error('address')
        <div class="mt-2 text-danger">{{ $message }}</div>
    @enderror
</div>

<!-- Location Field -->
<div class="mb-3">
    <x-base.form-label :tw-merge="false" for="location">{{ $venue->getAttributeLabel('location') }}</x-base.form-label>
    <x-base.form-input
        :tw-merge="false"
        class="w-full {{ ($errors->has('location') ? 'border-danger' : '') }}"
        wire:model="location"
        type="text"
    />
    @error('location')
        <div class="mt-2 text-danger">{{ $message }}</div>
    @enderror
</div>

<div class="flex flex-row items-center justify-between gap-2">
    <!-- Country Field -->
    <div class="w-full mb-3">
        <x-base.form-label :tw-merge="false" for="country">{{ $venue->getAttributeLabel('country') }}</x-base.form-label>
        <x-base.form-input
            :tw-merge="false"
            class="w-full {{ ($errors->has('country') ? 'border-danger' : '') }}"
            wire:model="country"
            type="text"
        />
        @error('country')
        <div class="mt-2 text-danger">{{ $message }}</div>
        @enderror
    </div>

    <!-- Postcode Field -->
    <div class="w-full mb-3">
        <x-base.form-label :tw-merge="false" for="postcode">{{ $venue->getAttributeLabel('postcode') }}</x-base.form-label>
        <x-base.form-input
            :tw-merge="false"
            class="w-full {{ ($errors->has('postcode') ? 'border-danger' : '') }}"
            wire:model="postcode"
            type="text"
        />
        @error('postcode')
        <div class="mt-2 text-danger">{{ $message }}</div>
        @enderror
    </div>
</div>

<div class="flex flex-row items-center justify-between gap-2">
    <!-- Latitude Field -->
    <div class="w-full mb-3">
        <x-base.form-label :tw-merge="false" for="latitude">{{ $venue->getAttributeLabel('latitude') }}</x-base.form-label>
        <x-base.form-input
            :tw-merge="false"
            class="w-full {{ ($errors->has('latitude') ? 'border-danger' : '') }}"
            wire:model="latitude"
            type="text"
        />
        @error('latitude')
            <div class="mt-2 text-danger">{{ $message }}</div>
        @enderror
    </div>

    <!-- Longitude Field -->
    <div class="w-full mb-3">
        <x-base.form-label :tw-merge="false" for="longitude">{{ $venue->getAttributeLabel('longitude') }}</x-base.form-label>
        <x-base.form-input
            :tw-merge="false"
            class="w-full {{ ($errors->has('longitude') ? 'border-danger' : '') }}"
            wire:model="longitude"
            type="text"
        />
        @error('longitude')
            <div class="mt-2 text-danger">{{ $message }}</div>
        @enderror
    </div>
</div>

<!-- Email Field -->
<div class="mb-3">
    <x-base.form-label :tw-merge="false" for="email">{{ $venue->getAttributeLabel('email') }}</x-base.form-label>
    <x-base.form-input
        :tw-merge="false"
        class="w-full {{ ($errors->has('email') ? 'border-danger' : '') }}"
        wire:model="email"
        type="email"
    />
    @error('email')
        <div class="mt-2 text-danger">{{ $message }}</div>
    @enderror
</div>

<!-- Phone Field -->
<div class="mb-3">
    <x-base.form-label :tw-merge="false" for="phone">{{ $venue->getAttributeLabel('phone') }}</x-base.form-label>
    <x-base.form-input
        :tw-merge="false"
        class="w-full {{ ($errors->has('phone') ? 'border-danger' : '') }}"
        wire:model="phone"
        type="text"
    />
    @error('phone')
        <div class="mt-2 text-danger">{{ $message }}</div>
    @enderror
</div>

<!-- Mobile Field -->
<div class="mb-3">
    <x-base.form-label :tw-merge="false" for="mobile">{{ $venue->getAttributeLabel('mobile') }}</x-base.form-label>
    <x-base.form-input
        :tw-merge="false"
        class="w-full {{ ($errors->has('mobile') ? 'border-danger' : '') }}"
        wire:model="mobile"
        type="text"
    />
    @error('mobile')
        <div class="mt-2 text-danger">{{ $message }}</div>
    @enderror
</div>

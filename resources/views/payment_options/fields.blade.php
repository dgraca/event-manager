<!-- Entity Id Field -->
<div class="mb-3">
    <x-base.form-label for="entity_id">{{ $paymentOption->getAttributeLabel('entity_id') }}</x-base.form-label>
    <x-base.form-input
        class="w-full {{ ($errors->has('entity_id') ? 'border-danger' : '') }}"
        id="entity_id"
        name="entity_id"
        :value="old('entity_id', $paymentOption->entity_id ?? '')"
        type="number"
        step="1"
    />
    @error('entity_id')
        <div class="mt-2 text-danger">{{ $message }}</div>
    @enderror
</div>

<!-- Business Entity Name Field -->
<div class="mb-3">
    <x-base.form-label for="business_entity_name">{{ $paymentOption->getAttributeLabel('business_entity_name') }}</x-base.form-label>
    <x-base.form-input
        class="w-full {{ ($errors->has('business_entity_name') ? 'border-danger' : '') }}"
        id="business_entity_name"
        name="business_entity_name"
        :value="old('business_entity_name', $paymentOption->business_entity_name ?? '')"
        type="text"
    />
    @error('business_entity_name')
        <div class="mt-2 text-danger">{{ $message }}</div>
    @enderror
</div>

<!-- Vat Field -->
<div class="mb-3">
    <x-base.form-label for="vat">{{ $paymentOption->getAttributeLabel('vat') }}</x-base.form-label>
    <x-base.form-input
        class="w-full {{ ($errors->has('vat') ? 'border-danger' : '') }}"
        id="vat"
        name="vat"
        :value="old('vat', $paymentOption->vat ?? '')"
        type="text"
    />
    @error('vat')
        <div class="mt-2 text-danger">{{ $message }}</div>
    @enderror
</div>

<!-- Address Field -->
<div class="mb-3">
    <x-base.form-label for="address">{{ $paymentOption->getAttributeLabel('address') }}</x-base.form-label>
    <x-base.form-input
        class="w-full {{ ($errors->has('address') ? 'border-danger' : '') }}"
        id="address"
        name="address"
        :value="old('address', $paymentOption->address ?? '')"
        type="text"
    />
    @error('address')
        <div class="mt-2 text-danger">{{ $message }}</div>
    @enderror
</div>

<!-- Location Field -->
<div class="mb-3">
    <x-base.form-label for="location">{{ $paymentOption->getAttributeLabel('location') }}</x-base.form-label>
    <x-base.form-input
        class="w-full {{ ($errors->has('location') ? 'border-danger' : '') }}"
        id="location"
        name="location"
        :value="old('location', $paymentOption->location ?? '')"
        type="text"
    />
    @error('location')
        <div class="mt-2 text-danger">{{ $message }}</div>
    @enderror
</div>

<!-- Country Field -->
<div class="mb-3">
    <x-base.form-label for="country">{{ $paymentOption->getAttributeLabel('country') }}</x-base.form-label>
    <x-base.form-input
        class="w-full {{ ($errors->has('country') ? 'border-danger' : '') }}"
        id="country"
        name="country"
        :value="old('country', $paymentOption->country ?? '')"
        type="text"
    />
    @error('country')
        <div class="mt-2 text-danger">{{ $message }}</div>
    @enderror
</div>

<!-- Postcode Field -->
<div class="mb-3">
    <x-base.form-label for="postcode">{{ $paymentOption->getAttributeLabel('postcode') }}</x-base.form-label>
    <x-base.form-input
        class="w-full {{ ($errors->has('postcode') ? 'border-danger' : '') }}"
        id="postcode"
        name="postcode"
        :value="old('postcode', $paymentOption->postcode ?? '')"
        type="text"
    />
    @error('postcode')
        <div class="mt-2 text-danger">{{ $message }}</div>
    @enderror
</div>

<!-- Email Field -->
<div class="mb-3">
    <x-base.form-label for="email">{{ $paymentOption->getAttributeLabel('email') }}</x-base.form-label>
    <x-base.form-input
        class="w-full {{ ($errors->has('email') ? 'border-danger' : '') }}"
        id="email"
        name="email"
        :value="old('email', $paymentOption->email ?? '')"
        type="email"
    />
    @error('email')
        <div class="mt-2 text-danger">{{ $message }}</div>
    @enderror
</div>

<!-- Data Field -->
<div class="mb-3">
    <x-base.form-label for="data">{{ $paymentOption->getAttributeLabel('data') }}</x-base.form-label>
    <x-base.form-textarea
        class="w-full {{ ($errors->has('data') ? 'border-danger' : '') }}"
        id="data"
        name="data"
        rows="5"
    >{{ old('data', $paymentOption->data ?? '') }}</x-base.form-textarea>
    @error('data')
        <div class="mt-2 text-danger">{{ $message }}</div>
    @enderror
</div>

{{-- Phone Field --}}
<x-base.form-label :tw-merge="false"
                   for="phone">{{ \App\Models\Venue::getAttributeLabelStatic('phone') }}</x-base.form-label>
<x-base.form-phone value="{{ old('phone', '') }}" id="phone" name="phone" placeholder="{{ \App\Models\Venue::getAttributeLabelStatic('phone') }}" class="w-1/2 h-10 bg-transparent border border-primary dark:border-primary rounded-md p-2" />


<!-- Currency Field -->
<div class="mb-3">
    <x-base.form-label for="currency">{{ $paymentOption->getAttributeLabel('currency') }}</x-base.form-label>
    <x-base.form-input
        class="w-full {{ ($errors->has('currency') ? 'border-danger' : '') }}"
        id="currency"
        name="currency"
        :value="old('currency', $paymentOption->currency ?? '')"
        type="text"
    />
    @error('currency')
        <div class="mt-2 text-danger">{{ $message }}</div>
    @enderror
</div>

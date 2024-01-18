<!-- Entity Id Field -->
<div class="mb-3">
    <x-base.form-label for="entity_id">{{ $paymentOptions->getAttributeLabel('entity_id') }}</x-base.form-label>
    <x-base.form-input
        class="w-full {{ ($errors->has('entity_id') ? 'border-danger' : '') }}"
        id="entity_id"
        name="entity_id"
        :value="old('entity_id', $paymentOptions->entity_id ?? '')"
        type="number"
        step="1"
    />
    @error('entity_id')
        <div class="mt-2 text-danger">{{ $message }}</div>
    @enderror
</div>

<!-- Business Entity Name Field -->
<div class="mb-3">
    <x-base.form-label for="business_entity_name">{{ $paymentOptions->getAttributeLabel('business_entity_name') }}</x-base.form-label>
    <x-base.form-input
        class="w-full {{ ($errors->has('business_entity_name') ? 'border-danger' : '') }}"
        id="business_entity_name"
        name="business_entity_name"
        :value="old('business_entity_name', $paymentOptions->business_entity_name ?? '')"
        type="text"
    />
    @error('business_entity_name')
        <div class="mt-2 text-danger">{{ $message }}</div>
    @enderror
</div>

<!-- Vat Field -->
<div class="mb-3">
    <x-base.form-label for="vat">{{ $paymentOptions->getAttributeLabel('vat') }}</x-base.form-label>
    <x-base.form-input
        class="w-full {{ ($errors->has('vat') ? 'border-danger' : '') }}"
        id="vat"
        name="vat"
        :value="old('vat', $paymentOptions->vat ?? '')"
        type="text"
    />
    @error('vat')
        <div class="mt-2 text-danger">{{ $message }}</div>
    @enderror
</div>

<!-- Address Field -->
<div class="mb-3">
    <x-base.form-label for="address">{{ $paymentOptions->getAttributeLabel('address') }}</x-base.form-label>
    <x-base.form-input
        class="w-full {{ ($errors->has('address') ? 'border-danger' : '') }}"
        id="address"
        name="address"
        :value="old('address', $paymentOptions->address ?? '')"
        type="text"
    />
    @error('address')
        <div class="mt-2 text-danger">{{ $message }}</div>
    @enderror
</div>

<!-- Location Field -->
<div class="mb-3">
    <x-base.form-label for="location">{{ $paymentOptions->getAttributeLabel('location') }}</x-base.form-label>
    <x-base.form-input
        class="w-full {{ ($errors->has('location') ? 'border-danger' : '') }}"
        id="location"
        name="location"
        :value="old('location', $paymentOptions->location ?? '')"
        type="text"
    />
    @error('location')
        <div class="mt-2 text-danger">{{ $message }}</div>
    @enderror
</div>

<!-- Country Field -->
<div class="mb-3">
    <x-base.form-label for="country">{{ $paymentOptions->getAttributeLabel('country') }}</x-base.form-label>
    <x-base.form-input
        class="w-full {{ ($errors->has('country') ? 'border-danger' : '') }}"
        id="country"
        name="country"
        :value="old('country', $paymentOptions->country ?? '')"
        type="text"
    />
    @error('country')
        <div class="mt-2 text-danger">{{ $message }}</div>
    @enderror
</div>

<!-- Postcode Field -->
<div class="mb-3">
    <x-base.form-label for="postcode">{{ $paymentOptions->getAttributeLabel('postcode') }}</x-base.form-label>
    <x-base.form-input
        class="w-full {{ ($errors->has('postcode') ? 'border-danger' : '') }}"
        id="postcode"
        name="postcode"
        :value="old('postcode', $paymentOptions->postcode ?? '')"
        type="text"
    />
    @error('postcode')
        <div class="mt-2 text-danger">{{ $message }}</div>
    @enderror
</div>

<!-- Email Field -->
<div class="mb-3">
    <x-base.form-label for="email">{{ $paymentOptions->getAttributeLabel('email') }}</x-base.form-label>
    <x-base.form-input
        class="w-full {{ ($errors->has('email') ? 'border-danger' : '') }}"
        id="email"
        name="email"
        :value="old('email', $paymentOptions->email ?? '')"
        type="email"
    />
    @error('email')
        <div class="mt-2 text-danger">{{ $message }}</div>
    @enderror
</div>

<!-- Data Field -->
<div class="mb-3">
    <x-base.form-label for="data">{{ $paymentOptions->getAttributeLabel('data') }}</x-base.form-label>
    <x-base.form-textarea
        class="w-full {{ ($errors->has('data') ? 'border-danger' : '') }}"
        id="data"
        name="data"
        rows="5"
    >{{ old('data', $paymentOptions->data ?? '') }}</x-base.form-textarea>
    @error('data')
        <div class="mt-2 text-danger">{{ $message }}</div>
    @enderror
</div>

<!-- Currency Field -->
<div class="mb-3">
    <x-base.form-label for="currency">{{ $paymentOptions->getAttributeLabel('currency') }}</x-base.form-label>
    <x-base.form-input
        class="w-full {{ ($errors->has('currency') ? 'border-danger' : '') }}"
        id="currency"
        name="currency"
        :value="old('currency', $paymentOptions->currency ?? '')"
        type="text"
    />
    @error('currency')
        <div class="mt-2 text-danger">{{ $message }}</div>
    @enderror
</div>

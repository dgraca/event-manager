<!-- Business Entity Name Field -->
<div class="mb-3">
    <x-base.form-label :tw-merge="false" for="business_entity_name">{{ $paymentOption->getAttributeLabel('business_entity_name') }}</x-base.form-label>
    <x-base.form-input
        :tw-merge="false"
        class="w-full {{ ($errors->has('business_entity_name') ? 'border-danger' : '') }}"
        wire:model="business_entity_name"
        type="text"
    />
    @error('business_entity_name')
        <div class="mt-2 text-danger">{{ $message }}</div>
    @enderror
</div>

<!-- Vat Field -->
<div class="mb-3">
    <x-base.form-label :tw-merge="false" for="vat">{{ $paymentOption->getAttributeLabel('vat') }}</x-base.form-label>
    <x-base.form-input
        :tw-merge="false"
        class="w-full {{ ($errors->has('vat') ? 'border-danger' : '') }}"
        wire:model="vat"
        type="text"
    />
    @error('vat')
        <div class="mt-2 text-danger">{{ $message }}</div>
    @enderror
</div>

<!-- Address Field -->
<div class="mb-3">
    <x-base.form-label :tw-merge="false" for="address">{{ $paymentOption->getAttributeLabel('address') }}</x-base.form-label>
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
    <x-base.form-label :tw-merge="false" for="location">{{ $paymentOption->getAttributeLabel('location') }}</x-base.form-label>
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

<!-- Postcode Field -->
<div class="mb-3">
    <x-base.form-label :tw-merge="false" for="postcode">{{ $paymentOption->getAttributeLabel('postcode') }}</x-base.form-label>
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

<!-- Country Field -->
<div class="mb-3">
    <x-base.form-label :tw-merge="false" for="country">{{ $paymentOption->getAttributeLabel('country') }}</x-base.form-label>
    <x-base.form-input
        :tw-merge="false"
        class="w-full {{ ($errors->has('country') ? 'border-danger' : '') }}"
        wire:model="country"
        type="text"
        readonly
    />
    @error('country')
        <div class="mt-2 text-danger">{{ $message }}</div>
    @enderror
</div>

<!-- Email Field -->
<div class="mb-3">
    <x-base.form-label :tw-merge="false" for="email">{{ $paymentOption->getAttributeLabel('email') }}</x-base.form-label>
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

{{--<!-- Phone Field -->--}}
{{--<div class="mb-3">--}}
{{--    <x-base.form-label :tw-merge="false" for="phone">{{ $paymentOption->getAttributeLabel('phone') }}</x-base.form-label>--}}
{{--    <x-base.form-input--}}
{{--        :tw-merge="false"--}}
{{--        class="w-full {{ ($errors->has('phone') ? 'border-danger' : '') }}"--}}
{{--        wire:model="phone"--}}
{{--        type="text"--}}
{{--    />--}}
{{--    @error('phone')--}}
{{--    <div class="mt-2 text-danger">{{ $message }}</div>--}}
{{--    @enderror--}}
{{--</div>--}}

{{-- Phone Field --}}
<div class="mb-3">
    <x-base.form-label
        :tw-merge="false"
        for="phone">{{ \App\Models\PaymentOption::getAttributeLabelStatic('phone') }}
    </x-base.form-label>
    <x-base.form-phone
        :tw-merge="true"
        id="phone"
        name="phone"
        wire:model="phone"
        placeholder="{{ \App\Models\PaymentOption::getAttributeLabelStatic('phone') }}"
        class="w-full"
    />
</div>


<!-- Currency Field -->
<div class="mb-3">
    <x-base.form-label :tw-merge="false" for="currency">{{ $paymentOption->getAttributeLabel('currency') }}</x-base.form-label>
    <x-base.form-input
        :tw-merge="false"
        class="w-full {{ ($errors->has('currency') ? 'border-danger' : '') }}"
        wire:model="currency"
        type="text"
        readonly
    />
    @error('currency')
        <div class="mt-2 text-danger">{{ $message }}</div>
    @enderror
</div>

<!-- Data that is payment related - Banking transfer and paypal -->
<hr class="h-px my-8 my-8 bg-gray-200 border-0 dark:bg-gray-700" />

<!-- Paypal Email Field -->
<div class="mb-3">
    <x-base.form-label :tw-merge="false" for="json.paypal_email">{{ $paymentOption->getNonDBLabelStatic('paypal_email') }}</x-base.form-label>
    <x-base.form-input
        :tw-merge="false"
        class="w-full {{ ($errors->has('json.paypal_email') ? 'border-danger' : '') }}"
        wire:model="json.paypal_email"
        type="email"
    />
    @error('json.paypal_email')
    <div class="mt-2 text-danger">{{ $message }}</div>
    @enderror
</div>

<!-- Account Holder Field -->
<div class="mb-3">
    <x-base.form-label :tw-merge="false" for="json.account_holder">{{ $paymentOption->getNonDBLabelStatic('account_holder') }}</x-base.form-label>
    <x-base.form-input
        :tw-merge="false"
        class="w-full {{ ($errors->has('json.account_holder') ? 'border-danger' : '') }}"
        wire:model="json.account_holder"
        type="text"
    />
    @error('json.account_holder')
    <div class="mt-2 text-danger">{{ $message }}</div>
    @enderror
</div>

<!-- Bank Entity Field -->
<div class="mb-3">
    <x-base.form-label :tw-merge="false" for="json.bank_entity">{{ $paymentOption->getNonDBLabelStatic('bank_entity') }}</x-base.form-label>
    <x-base.form-input
        :tw-merge="false"
        class="w-full {{ ($errors->has('json.bank_entity') ? 'border-danger' : '') }}"
        wire:model="json.bank_entity"
        type="text"
    />
    @error('json.bank_entity')
    <div class="mt-2 text-danger">{{ $message }}</div>
    @enderror
</div>

<!-- Bank Country Field -->
<div class="mb-3">
    <x-base.form-label :tw-merge="false" for="json.bank_country">{{ $paymentOption->getNonDBLabelStatic('bank_country') }}</x-base.form-label>
    <x-base.form-input
        :tw-merge="false"
        class="w-full {{ ($errors->has('json.bank_country') ? 'border-danger' : '') }}"
        wire:model="json.bank_country"
        type="text"
    />
    @error('json.bank_country')
    <div class="mt-2 text-danger">{{ $message }}</div>
    @enderror
</div>

<!-- BIC/SWIFT Field -->
<div class="mb-3">
    <x-base.form-label :tw-merge="false" for="json.bic_swift">{{ $paymentOption->getNonDBLabelStatic('bic_swift') }}</x-base.form-label>
    <x-base.form-input
        :tw-merge="false"
        class="w-full {{ ($errors->has('json.bic_swift') ? 'border-danger' : '') }}"
        wire:model="json.bic_swift"
        type="text"
    />
    @error('json.bic_swift')
    <div class="mt-2 text-danger">{{ $message }}</div>
    @enderror
</div>

<!-- IBAN Field -->
<div class="mb-3">
    <x-base.form-label :tw-merge="false" for="json.iban">{{ $paymentOption->getNonDBLabelStatic('iban') }}</x-base.form-label>
    <x-base.form-input
        :tw-merge="false"
        class="w-full {{ ($errors->has('json.iban') ? 'border-danger' : '') }}"
        wire:model="json.iban"
        type="text"
    />
    @error('json.iban')
    <div class="mt-2 text-danger">{{ $message }}</div>
    @enderror
</div>

@pushOnce('scripts')
    <script>
        document.addEventListener('livewire:initialized', () => {
            Livewire.hook('request', ({ uri, options, payload, respond, succeed, fail }) => {
                succeed(({ status, json }) => {
                    setTimeout(() => {
                        window.applyTailwindMerge();
                    }, 100);
                })
            })
        });
    </script>
@endpushOnce

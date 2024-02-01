<!-- Event Session Ticket Id Field -->
<div class="mb-3">
    <x-base.form-label for="event_session_ticket_id">{{ $accessTickets->getAttributeLabel('event_session_ticket_id') }}</x-base.form-label>
    <x-base.form-input
        class="w-full {{ ($errors->has('event_session_ticket_id') ? 'border-danger' : '') }}"
        id="event_session_ticket_id"
        name="event_session_ticket_id"
        :value="old('event_session_ticket_id', $accessTickets->event_session_ticket_id ?? '')"
        type="number"
        step="1"
    />
    @error('event_session_ticket_id')
        <div class="mt-2 text-danger">{{ $message }}</div>
    @enderror
</div>

<!-- User Id Field -->
<div class="mb-3">
    <x-base.form-label for="user_id">{{ $accessTickets->getAttributeLabel('user_id') }}</x-base.form-label>
    <x-base.form-input
        class="w-full {{ ($errors->has('user_id') ? 'border-danger' : '') }}"
        id="user_id"
        name="user_id"
        :value="old('user_id', $accessTickets->user_id ?? '')"
        type="number"
        step="1"
    />
    @error('user_id')
        <div class="mt-2 text-danger">{{ $message }}</div>
    @enderror
</div>

<!-- Payment Option Id Field -->
<div class="mb-3">
    <x-base.form-label for="payment_option_id">{{ $accessTickets->getAttributeLabel('payment_option_id') }}</x-base.form-label>
    <x-base.form-input
        class="w-full {{ ($errors->has('payment_option_id') ? 'border-danger' : '') }}"
        id="payment_option_id"
        name="payment_option_id"
        :value="old('payment_option_id', $accessTickets->payment_option_id ?? '')"
        type="number"
        step="1"
    />
    @error('payment_option_id')
        <div class="mt-2 text-danger">{{ $message }}</div>
    @enderror
</div>

<!-- Code Field -->
<div class="mb-3">
    <x-base.form-label for="code">{{ $accessTickets->getAttributeLabel('code') }}</x-base.form-label>
    <x-base.form-input
        class="w-full {{ ($errors->has('code') ? 'border-danger' : '') }}"
        id="code"
        name="code"
        :value="old('code', $accessTickets->code ?? '')"
        type="text"
    />
    @error('code')
        <div class="mt-2 text-danger">{{ $message }}</div>
    @enderror
</div>

<!-- Name Field -->
<div class="mb-3">
    <x-base.form-label for="name">{{ $accessTickets->getAttributeLabel('name') }}</x-base.form-label>
    <x-base.form-input
        class="w-full {{ ($errors->has('name') ? 'border-danger' : '') }}"
        id="name"
        name="name"
        :value="old('name', $accessTickets->name ?? '')"
        type="text"
    />
    @error('name')
        <div class="mt-2 text-danger">{{ $message }}</div>
    @enderror
</div>

<!-- Email Field -->
<div class="mb-3">
    <x-base.form-label for="email">{{ $accessTickets->getAttributeLabel('email') }}</x-base.form-label>
    <x-base.form-input
        class="w-full {{ ($errors->has('email') ? 'border-danger' : '') }}"
        id="email"
        name="email"
        :value="old('email', $accessTickets->email ?? '')"
        type="email"
    />
    @error('email')
        <div class="mt-2 text-danger">{{ $message }}</div>
    @enderror
</div>

<!-- Phone Field -->
<div class="mb-3">
    <x-base.form-label for="phone">{{ $accessTickets->getAttributeLabel('phone') }}</x-base.form-label>
    <x-base.form-input
        class="w-full {{ ($errors->has('phone') ? 'border-danger' : '') }}"
        id="phone"
        name="phone"
        :value="old('phone', $accessTickets->phone ?? '')"
        type="text"
    />
    @error('phone')
        <div class="mt-2 text-danger">{{ $message }}</div>
    @enderror
</div>

<!-- Description Field -->
<div class="mb-3">
    <x-base.form-label for="description">{{ $accessTickets->getAttributeLabel('description') }}</x-base.form-label>
    <x-base.form-textarea
        class="w-full {{ ($errors->has('description') ? 'border-danger' : '') }}"
        id="description"
        name="description"
        rows="5"
    >{{ old('description', $accessTickets->description ?? '') }}</x-base.form-textarea>
    @error('description')
        <div class="mt-2 text-danger">{{ $message }}</div>
    @enderror
</div>

<!-- Tickets Count Field -->
<div class="mb-3">
    <x-base.form-label for="tickets_count">{{ $accessTickets->getAttributeLabel('tickets_count') }}</x-base.form-label>
    <x-base.form-input
        class="w-full {{ ($errors->has('tickets_count') ? 'border-danger' : '') }}"
        id="tickets_count"
        name="tickets_count"
        :value="old('tickets_count', $accessTickets->tickets_count ?? '')"
        type="number"
        step="1"
    />
    @error('tickets_count')
        <div class="mt-2 text-danger">{{ $message }}</div>
    @enderror
</div>

<!-- Approved Field -->
<div class="mb-3">
    <x-base.form-input
        id="approved_hidden"
        name="approved"
        :value="0"
        type="hidden"
    />
    <x-base.form-check>
        <x-base.form-check.input
            class="{{ ($errors->has('approved') ? 'border-danger' : '') }}"
            id="approved"
            name="approved"
            :value="1"
            :checked="old('approved', $accessTickets->approved ?? '') == 1"
            type="checkbox"
        />
        <x-base.form-check.label for="approved">{{ $accessTickets->getAttributeLabel('approved') }}</x-base.form-check.label>
    </x-base.form-check>
    @error('approved')
        <div class="mt-2 text-danger">{{ $message }}</div>
    @enderror
</div>

<!-- Status Field -->
<div class="mb-3">
    <x-base.form-label for="status">{{ $accessTickets->getAttributeLabel('status') }}</x-base.form-label>
    <x-base.form-select
        class="w-full {{ ($errors->has('status') ? 'border-danger' : '') }}"
        id="status"
        name="status"
        :value="old('status', $accessTickets->status ?? '')"
        type="text"
    >
        <option >{{ __('Select an option') }}</option>
        @foreach(\App\Models\AccessTickets::getStatusArray() as $key => $label)
        <option value="{{ $key }}" {{ old('status', $accessTickets->status ?? '') == $key ? 'selected' : '' }}>{{ $label }}</option>
        @endforeach
    </x-base.form-select>
    @error('status')
        <div class="mt-2 text-danger">{{ $message }}</div>
    @enderror
</div>

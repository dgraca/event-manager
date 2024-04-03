<!-- Event Id Field -->
{{--<div class="mb-3">--}}
{{--    <x-base.form-label for="event_id">{{ $eventSession->getAttributeLabel('event_id') }}</x-base.form-label>--}}
{{--    <x-base.form-input--}}
{{--            class="w-full {{ ($errors->has('event_id') ? 'border-danger' : '') }}"--}}
{{--            id="event_id"--}}
{{--            name="event_id"--}}
{{--            :value="old('event_id', $eventSession->event_id ?? '')"--}}
{{--            type="number"--}}
{{--            step="1"--}}
{{--    />--}}
{{--    @error('event_id')--}}
{{--    <div class="mt-2 text-danger">{{ $message }}</div>--}}
{{--    @enderror--}}
{{--</div>--}}

<!-- Name Field -->
<div class="mb-3">
    <x-base.form-label for="name">{{ $eventSession->getAttributeLabel('name') }}</x-base.form-label>
    <x-base.form-input
            class="w-full {{ ($errors->has('name') ? 'border-danger' : '') }}"
            id="name"
            name="name"
            :value="old('name', $eventSession->name ?? '')"
            type="text"
    />
    @error('name')
    <div class="mt-2 text-danger">{{ $message }}</div>
    @enderror
</div>

<!-- Slug Field -->
{{--<div class="mb-3">--}}
{{--    <x-base.form-label for="slug">{{ $eventSession->getAttributeLabel('slug') }}</x-base.form-label>--}}
{{--    <x-base.form-input--}}
{{--            class="w-full {{ ($errors->has('slug') ? 'border-danger' : '') }}"--}}
{{--            id="slug"--}}
{{--            name="slug"--}}
{{--            :value="old('slug', $eventSession->slug ?? '')"--}}
{{--            type="text"--}}
{{--    />--}}
{{--    @error('slug')--}}
{{--    <div class="mt-2 text-danger">{{ $message }}</div>--}}
{{--    @enderror--}}
{{--</div>--}}

<!-- Description Field -->
<div class="mb-3">
    <x-base.form-label for="description">{{ $eventSession->getAttributeLabel('description') }}</x-base.form-label>
    <x-base.form-textarea
            class="w-full {{ ($errors->has('description') ? 'border-danger' : '') }}"
            id="description"
            name="description"
            rows="5"
    >{{ old('description', $eventSession->description ?? '') }}</x-base.form-textarea>
    @error('description')
    <div class="mt-2 text-danger">{{ $message }}</div>
    @enderror
</div>

<!-- Max Capacity Field -->
<div class="mb-3">
    <x-base.form-label for="max_capacity">{{ $eventSession->getAttributeLabel('max_capacity') }}</x-base.form-label>
    <x-base.form-input
            class="w-full {{ ($errors->has('max_capacity') ? 'border-danger' : '') }}"
            id="max_capacity"
            name="max_capacity"
            :value="old('max_capacity', $eventSession->max_capacity ?? '')"
            type="number"
            step="1"
    />
    @error('max_capacity')
    <div class="mt-2 text-danger">{{ $message }}</div>
    @enderror
</div>

<!-- Start Date Field -->
<div class="mb-3">
    <x-base.form-label for="start_date">{{ $eventSession->getAttributeLabel('start_date') }}</x-base.form-label>
    <x-base.input-group
            class="flatpickr"
            data-wrap="true"
            data-enable-time="false"
            data-date-format='Y-m-d'
            data-time_24hr='true'
            data-minute-increment='1'
            inputGroup
    >
        <x-base.input-group.text class="cursor-pointer" title="{{ __('Toggle') }}" data-toggle>
            <x-base.lucide
                    class="h-5 w-5"
                    icon="Calendar"
            />
        </x-base.input-group.text>
        <x-base.flatpickr
                class="{{ ($errors->has('start_date') ? 'border-danger' : '') }} [&[readonly]]:bg-white"
                id="start_date"
                name="start_date"
                :value="old('start_date', $eventSession->start_date ?? '')"
                data-input
        />
        <x-base.input-group.text class="cursor-pointer" title="{{ __('Clear') }}" data-clear>
            <x-base.lucide
                    class="h-5 w-5 "
                    icon="x"
            />
        </x-base.input-group.text>
    </x-base.input-group>
    @error('start_date')
    <div class="mt-2 text-danger">{{ $message }}</div>
    @enderror
</div>

<!-- End Date Field -->
<div class="mb-3">
    <x-base.form-label for="end_date">{{ $eventSession->getAttributeLabel('end_date') }}</x-base.form-label>
    <x-base.input-group
            class="flatpickr"
            data-wrap="true"
            data-enable-time="false"
            data-date-format='Y-m-d'
            data-time_24hr='true'
            data-minute-increment='1'
            inputGroup
    >
        <x-base.input-group.text class="cursor-pointer" title="{{ __('Toggle') }}" data-toggle>
            <x-base.lucide
                    class="h-5 w-5"
                    icon="Calendar"
            />
        </x-base.input-group.text>
        <x-base.flatpickr
                class="{{ ($errors->has('end_date') ? 'border-danger' : '') }} [&[readonly]]:bg-white"
                id="end_date"
                name="end_date"
                :value="old('end_date', $eventSession->end_date ?? '')"
                data-input
        />
        <x-base.input-group.text class="cursor-pointer" title="{{ __('Clear') }}" data-clear>
            <x-base.lucide
                    class="h-5 w-5 "
                    icon="x"
            />
        </x-base.input-group.text>
    </x-base.input-group>
    @error('end_date')
    <div class="mt-2 text-danger">{{ $message }}</div>
    @enderror
</div>

<!-- Rrule Field -->
<div class="mb-3">
    <x-base.form-label for="rrule">{{ $eventSession->getAttributeLabel('rrule') }}</x-base.form-label>
    <x-base.form-textarea
            class="w-full {{ ($errors->has('rrule') ? 'border-danger' : '') }}"
            id="rrule"
            name="rrule"
            rows="5"
    >{{ old('rrule', $eventSession->rrule ?? '') }}</x-base.form-textarea>
    @error('rrule')
    <div class="mt-2 text-danger">{{ $message }}</div>
    @enderror
</div>

<!-- Type Field -->
<div class="mb-3">
    <x-base.form-label for="type">{{ $eventSession->getAttributeLabel('type') }}</x-base.form-label>
    <x-base.form-input
            class="w-full {{ ($errors->has('type') ? 'border-danger' : '') }}"
            id="type"
            name="type"
            :value="old('type', $eventSession->type ?? '')"
            type="number"
            step="1"
    />
    @error('type')
    <div class="mt-2 text-danger">{{ $message }}</div>
    @enderror
</div>

<!-- Status Field -->
<div class="mb-3">
    <x-base.form-label for="status">{{ $eventSession->getAttributeLabel('status') }}</x-base.form-label>
    <x-base.form-select
            class="w-full {{ ($errors->has('status') ? 'border-danger' : '') }}"
            id="status"
            name="status"
            :value="old('status', $eventSession->status ?? '')"
            type="text"
    >
        <option>{{ __('Select an option') }}</option>
        @foreach(\App\Models\EventSession::getStatusArray() as $key => $label)
            <option value="{{ $key }}" {{ old('status', $eventSession->status ?? '') == $key ? 'selected' : '' }}>{{ $label }}</option>
        @endforeach
    </x-base.form-select>
    @error('status')
    <div class="mt-2 text-danger">{{ $message }}</div>
    @enderror
</div>

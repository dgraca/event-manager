<!-- Entity Id Field -->
<div class="mb-3">
    <x-base.form-label for="entity_id">{{ $events->getAttributeLabel('entity_id') }}</x-base.form-label>
    <x-base.form-input
        class="w-full {{ ($errors->has('entity_id') ? 'border-danger' : '') }}"
        id="entity_id"
        name="entity_id"
        :value="old('entity_id', $events->entity_id ?? '')"
        type="number"
        step="1"
    />
    @error('entity_id')
        <div class="mt-2 text-danger">{{ $message }}</div>
    @enderror
</div>

<!-- Venue Id Field -->
<div class="mb-3">
    <x-base.form-label for="venue_id">{{ $events->getAttributeLabel('venue_id') }}</x-base.form-label>
    <x-base.form-input
        class="w-full {{ ($errors->has('venue_id') ? 'border-danger' : '') }}"
        id="venue_id"
        name="venue_id"
        :value="old('venue_id', $events->venue_id ?? '')"
        type="number"
        step="1"
    />
    @error('venue_id')
        <div class="mt-2 text-danger">{{ $message }}</div>
    @enderror
</div>

<!-- Name Field -->
<div class="mb-3">
    <x-base.form-label for="name">{{ $events->getAttributeLabel('name') }}</x-base.form-label>
    <x-base.form-input
        class="w-full {{ ($errors->has('name') ? 'border-danger' : '') }}"
        id="name"
        name="name"
        :value="old('name', $events->name ?? '')"
        type="text"
    />
    @error('name')
        <div class="mt-2 text-danger">{{ $message }}</div>
    @enderror
</div>

<!-- Slug Field -->
<div class="mb-3">
    <x-base.form-label for="slug">{{ $events->getAttributeLabel('slug') }}</x-base.form-label>
    <x-base.form-input
        class="w-full {{ ($errors->has('slug') ? 'border-danger' : '') }}"
        id="slug"
        name="slug"
        :value="old('slug', $events->slug ?? '')"
        type="text"
    />
    @error('slug')
        <div class="mt-2 text-danger">{{ $message }}</div>
    @enderror
</div>

<!-- Description Field -->
<div class="mb-3">
    <x-base.form-label for="description">{{ $events->getAttributeLabel('description') }}</x-base.form-label>
    <x-base.form-textarea
        class="w-full {{ ($errors->has('description') ? 'border-danger' : '') }}"
        id="description"
        name="description"
        rows="5"
    >{{ old('description', $events->description ?? '') }}</x-base.form-textarea>
    @error('description')
        <div class="mt-2 text-danger">{{ $message }}</div>
    @enderror
</div>

<!-- Scheduled Start Field -->
<div class="mb-3">
    <x-base.form-label for="scheduled_start">{{ $events->getAttributeLabel('scheduled_start') }}</x-base.form-label>
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
            class="{{ ($errors->has('scheduled_start') ? 'border-danger' : '') }} [&[readonly]]:bg-white"
            id="scheduled_start"
            name="scheduled_start"
            :value="old('scheduled_start', $events->scheduled_start ?? '')"
            data-input
        />
        <x-base.input-group.text class="cursor-pointer" title="{{ __('Clear') }}" data-clear>
            <x-base.lucide
                class="h-5 w-5 "
                icon="x"
            />
        </x-base.input-group.text>
    </x-base.input-group>
    @error('scheduled_start')
        <div class="mt-2 text-danger">{{ $message }}</div>
    @enderror
</div>

<!-- Scheduled End Field -->
<div class="mb-3">
    <x-base.form-label for="scheduled_end">{{ $events->getAttributeLabel('scheduled_end') }}</x-base.form-label>
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
            class="{{ ($errors->has('scheduled_end') ? 'border-danger' : '') }} [&[readonly]]:bg-white"
            id="scheduled_end"
            name="scheduled_end"
            :value="old('scheduled_end', $events->scheduled_end ?? '')"
            data-input
        />
        <x-base.input-group.text class="cursor-pointer" title="{{ __('Clear') }}" data-clear>
            <x-base.lucide
                class="h-5 w-5 "
                icon="x"
            />
        </x-base.input-group.text>
    </x-base.input-group>
    @error('scheduled_end')
        <div class="mt-2 text-danger">{{ $message }}</div>
    @enderror
</div>

<!-- Start Date Field -->
<div class="mb-3">
    <x-base.form-label for="start_date">{{ $events->getAttributeLabel('start_date') }}</x-base.form-label>
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
            :value="old('start_date', $events->start_date ?? '')"
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
    <x-base.form-label for="end_date">{{ $events->getAttributeLabel('end_date') }}</x-base.form-label>
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
            :value="old('end_date', $events->end_date ?? '')"
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

<!-- Registration Note Field -->
<div class="mb-3">
    <x-base.form-label for="registration_note">{{ $events->getAttributeLabel('registration_note') }}</x-base.form-label>
    <x-base.form-textarea
        class="w-full {{ ($errors->has('registration_note') ? 'border-danger' : '') }}"
        id="registration_note"
        name="registration_note"
        rows="5"
    >{{ old('registration_note', $events->registration_note ?? '') }}</x-base.form-textarea>
    @error('registration_note')
        <div class="mt-2 text-danger">{{ $message }}</div>
    @enderror
</div>

<!-- Pre-Approval Field -->
<div class="mb-3">
    <x-base.form-input
        id="pre-approval_hidden"
        name="pre-approval"
        :value="0"
        type="hidden"
    />
    <x-base.form-check>
        <x-base.form-check.input
            class="{{ ($errors->has('pre-approval') ? 'border-danger' : '') }}"
            id="pre-approval"
            name="pre-approval"
            :value="1"
            :checked="old('pre-approval', $events->pre_approval ?? '') == 1"
            type="checkbox"
        />
        <x-base.form-check.label for="pre-approval">{{ $events->getAttributeLabel('pre-approval') }}</x-base.form-check.label>
    </x-base.form-check>
    @error('pre-approval')
        <div class="mt-2 text-danger">{{ $message }}</div>
    @enderror
</div>

<!-- Max Capacity Field -->
<div class="mb-3">
    <x-base.form-label for="max_capacity">{{ $events->getAttributeLabel('max_capacity') }}</x-base.form-label>
    <x-base.form-input
        class="w-full {{ ($errors->has('max_capacity') ? 'border-danger' : '') }}"
        id="max_capacity"
        name="max_capacity"
        :value="old('max_capacity', $events->max_capacity ?? '')"
        type="number"
        step="1"
    />
    @error('max_capacity')
        <div class="mt-2 text-danger">{{ $message }}</div>
    @enderror
</div>

<!-- Type Field -->
<div class="mb-3">
    <x-base.form-label for="type">{{ $events->getAttributeLabel('type') }}</x-base.form-label>
    <x-base.form-input
        class="w-full {{ ($errors->has('type') ? 'border-danger' : '') }}"
        id="type"
        name="type"
        :value="old('type', $events->type ?? '')"
        type="number"
        step="1"
    />
    @error('type')
        <div class="mt-2 text-danger">{{ $message }}</div>
    @enderror
</div>

<!-- Status Field -->
<div class="mb-3">
    <x-base.form-label for="status">{{ $events->getAttributeLabel('status') }}</x-base.form-label>
    <x-base.form-select
        class="w-full {{ ($errors->has('status') ? 'border-danger' : '') }}"
        id="status"
        name="status"
        :value="old('status', $events->status ?? '')"
        type="text"
    >
        <option >{{ __('Select an option') }}</option>
        @foreach(\App\Models\Events::getStatusArray() as $key => $label)
        <option value="{{ $key }}" {{ old('status', $events->status ?? '') == $key ? 'selected' : '' }}>{{ $label }}</option>
        @endforeach
    </x-base.form-select>
    @error('status')
        <div class="mt-2 text-danger">{{ $message }}</div>
    @enderror
</div>

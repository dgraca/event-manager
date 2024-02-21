<!-- Entity Id Field -->
{{--<div class="mb-3">--}}
{{--    <x-base.form-label for="entity_id">{{ $event->getAttributeLabel('entity_id') }}</x-base.form-label>--}}
{{--    <x-base.form-input--}}
{{--        class="w-full {{ ($errors->has('entity_id') ? 'border-danger' : '') }}"--}}
{{--        id="entity_id"--}}
{{--        name="entity_id"--}}
{{--        :value="old('entity_id', $event->entity_id ?? '')"--}}
{{--        type="number"--}}
{{--        step="1"--}}
{{--    />--}}
{{--    @error('entity_id')--}}
{{--        <div class="mt-2 text-danger">{{ $message }}</div>--}}
{{--    @enderror--}}
{{--</div>--}}

<!-- Venue Id Field -->
{{--<div class="mb-3">--}}
{{--    <x-base.form-label for="venue_id">{{ $event->getAttributeLabel('venue_id') }}</x-base.form-label>--}}
{{--    <x-base.form-input--}}
{{--        class="w-full {{ ($errors->has('venue_id') ? 'border-danger' : '') }}"--}}
{{--        id="venue_id"--}}
{{--        name="venue_id"--}}
{{--        :value="old('venue_id', $event->venue_id ?? '')"--}}
{{--        type="number"--}}
{{--        step="1"--}}
{{--    />--}}
{{--    @error('venue_id')--}}
{{--        <div class="mt-2 text-danger">{{ $message }}</div>--}}
{{--    @enderror--}}
{{--</div>--}}

<!-- Entity field - dropdown to select user's entities -->
<div class="mb-3">
    <x-base.form-label :tw-merge="false" for="entity">{{ $event->getAttributeLabel('entity_id') }}</x-base.form-label>
    <x-base.form-select
        :tw-merge="false"
        class="w-full {{ ($errors->has('status') ? 'border-danger' : '') }}"
        wire:model="entity_id"
        type="text"
    >
        <option >{{ __('Select an option') }}</option>
        @foreach(auth()->user()->entity as $entity)
            <option wire:key="event-entity-{{$entity->id}}" value="{{ $entity->id }}" {{ old('entity', $event->entity_id ?? '') == $entity->id ? 'selected' : '' }}>
                {{ $entity->name }}
            </option>
        @endforeach
    </x-base.form-select>
</div>

<!-- Name Field -->
<div class="mb-3">
    <x-base.form-label :tw-merge="false" for="name">{{ $event->getAttributeLabel('name') }}</x-base.form-label>
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

<!-- Slug Field -->
{{--<div class="mb-3">--}}
{{--    <x-base.form-label for="slug">{{ $event->getAttributeLabel('slug') }}</x-base.form-label>--}}
{{--    <x-base.form-input--}}
{{--        class="w-full {{ ($errors->has('slug') ? 'border-danger' : '') }}"--}}
{{--        id="slug"--}}
{{--        name="slug"--}}
{{--        :value="old('slug', $event->slug ?? '')"--}}
{{--        type="text"--}}
{{--    />--}}
{{--    @error('slug')--}}
{{--        <div class="mt-2 text-danger">{{ $message }}</div>--}}
{{--    @enderror--}}
{{--</div>--}}

<!-- Description Field -->
<div class="mb-3">
    <x-base.form-label :tw-merge="false" for="description">{{ $event->getAttributeLabel('description') }}</x-base.form-label>
    <x-base.form-textarea
        :tw-merge="false"
        class="w-full {{ ($errors->has('description') ? 'border-danger' : '') }}"
        wire:model="description"
        rows="5"
    />
    @error('description')
        <div class="mt-2 text-danger">{{ $message }}</div>
    @enderror
</div>

<div class="flex flex-row items-center justify-between gap-2">
    <!-- Scheduled Start Field -->
    <div class="w-full mb-3" wire:ignore>
        <x-base.form-label :tw-merge="false" for="scheduled_start">{{ $event->getAttributeLabel('scheduled_start') }}</x-base.form-label>
        <x-base.input-group
            class="flatpickr"
            data-wrap="true"
            data-enable-time="false"
            data-date-format='Y-m-d'
            data-time_24hr='true'
            data-minute-increment='1'
            inputGroup
        >
            <x-base.input-group.text :tw-merge="false" class="cursor-pointer" title="{{ __('Toggle') }}" data-toggle>
                <x-base.lucide
                    :tw-merge="false"
                    class="h-5 w-5"
                    icon="Calendar"
                />
            </x-base.input-group.text>
            <x-base.flatpickr
                class="{{ ($errors->has('scheduled_start') ? 'border-danger' : '') }} [&[readonly]]:bg-white"
                wire:model="scheduled_start"
                data-input
            />
            <x-base.input-group.text :tw-merge="false" class="cursor-pointer" title="{{ __('Clear') }}" data-clear>
                <x-base.lucide
                    :tw-merge="false"
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
    <div class="w-full mb-3" wire:ignore>
        <x-base.form-label :tw-merge="false" for="scheduled_end">{{ $event->getAttributeLabel('scheduled_end') }}</x-base.form-label>
        <x-base.input-group
            class="flatpickr"
            data-wrap="true"
            data-enable-time="false"
            data-date-format='Y-m-d'
            data-time_24hr='true'
            data-minute-increment='1'
            inputGroup
        >
            <x-base.input-group.text :tw-merge="false" class="cursor-pointer" title="{{ __('Toggle') }}" data-toggle>
                <x-base.lucide
                    :tw-merge="false"
                    class="h-5 w-5"
                    icon="Calendar"
                />
            </x-base.input-group.text>
            <x-base.flatpickr
                class="{{ ($errors->has('scheduled_end') ? 'border-danger' : '') }} [&[readonly]]:bg-white"
                wire:model="scheduled_end"
                data-input
            />
            <x-base.input-group.text :tw-merge="false" class="cursor-pointer" title="{{ __('Clear') }}" data-clear>
                <x-base.lucide
                    :tw-merge="false"
                    class="h-5 w-5 "
                    icon="x"
                />
            </x-base.input-group.text>
        </x-base.input-group>
        @error('scheduled_end')
        <div class="mt-2 text-danger">{{ $message }}</div>
        @enderror
    </div>
</div>

<div class="flex flex-row items-center justify-between gap-2">
    <!-- Start Date Field -->
    <div class="w-full mb-3" wire:ignore>
        <x-base.form-label :tw-merge="false" for="start_date">{{ $event->getAttributeLabel('start_date') }}</x-base.form-label>
        <x-base.input-group
            class="flatpickr"
            data-wrap="true"
            data-enable-time="false"
            data-date-format='Y-m-d'
            data-time_24hr='true'
            data-minute-increment='1'
            inputGroup
        >
            <x-base.input-group.text :tw-merge="false" class="cursor-pointer" title="{{ __('Toggle') }}" data-toggle>
                <x-base.lucide
                    :tw-merge="false"
                    class="h-5 w-5"
                    icon="Calendar"
                />
            </x-base.input-group.text>
            <x-base.flatpickr
                class="{{ ($errors->has('start_date') ? 'border-danger' : '') }} [&[readonly]]:bg-white"
                wire:model="start_date"
                data-input
            />
            <x-base.input-group.text :tw-merge="false" class="cursor-pointer" title="{{ __('Clear') }}" data-clear>
                <x-base.lucide
                    :tw-merge="false"
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
    <div class="w-full mb-3" wire:ignore>
        <x-base.form-label :tw-merge="false" for="end_date">{{ $event->getAttributeLabel('end_date') }}</x-base.form-label>
        <x-base.input-group
            class="flatpickr"
            data-wrap="true"
            data-enable-time="false"
            data-date-format='Y-m-d'
            data-time_24hr='true'
            data-minute-increment='1'
            inputGroup
        >
            <x-base.input-group.text :tw-merge="false" class="cursor-pointer" title="{{ __('Toggle') }}" data-toggle>
                <x-base.lucide
                    :tw-merge="false"
                    class="h-5 w-5"
                    icon="Calendar"
                />
            </x-base.input-group.text>
            <x-base.flatpickr
                class="{{ ($errors->has('end_date') ? 'border-danger' : '') }} [&[readonly]]:bg-white"
                wire:model="end_date"
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
</div>

<!-- Registration Note Field -->
<div class="mb-3">
    <x-base.form-label :tw-merge="false" for="registration_note">{{ $event->getAttributeLabel('registration_note') }}</x-base.form-label>
    <x-base.form-textarea
        :tw-merge="false"
        class="w-full {{ ($errors->has('registration_note') ? 'border-danger' : '') }}"
        wire:model="registration_note"
        rows="5"
    />
    @error('registration_note')
        <div class="mt-2 text-danger">{{ $message }}</div>
    @enderror
</div>

<!-- Pre-Approval Field -->
<div class="mb-3">
    <x-base.form-input
        :tw-merge="false"
        wire:model="pre-approval"
        type="hidden"
    />
    <x-base.form-check :tw-merge="false">
        <x-base.form-check.input
            :tw-merge="false"
            class="{{ ($errors->has('pre-approval') ? 'border-danger' : '') }}"
            wire:model="pre-approval"
            :value="1"
            type="checkbox"
        />
        <x-base.form-check.label :tw-merge="false" for="pre-approval">{{ $event->getAttributeLabel('pre-approval') }}</x-base.form-check.label>
    </x-base.form-check>
    @error('pre-approval')
        <div class="mt-2 text-danger">{{ $message }}</div>
    @enderror
</div>

<!-- Max Capacity Field -->
<div class="mb-3">
    <x-base.form-label :tw-merge="false" for="max_capacity">{{ $event->getAttributeLabel('max_capacity') }}</x-base.form-label>
    <x-base.form-input
        :tw-merge="false"
        class="w-full {{ ($errors->has('max_capacity') ? 'border-danger' : '') }}"
        wire:model="max_capacity"
        type="number"
        step="1"
    />
    @error('max_capacity')
        <div class="mt-2 text-danger">{{ $message }}</div>
    @enderror
</div>

<!-- Type Field -->
<div class="mb-3">
    <x-base.form-label :tw-merge="false" for="type">{{ $event->getAttributeLabel('type') }}</x-base.form-label>
    <x-base.form-input
        :tw-merge="false"
        class="w-full {{ ($errors->has('type') ? 'border-danger' : '') }}"
        wire:model="type"
        type="number"
        step="1"
    />
    @error('type')
        <div class="mt-2 text-danger">{{ $message }}</div>
    @enderror
</div>

<!-- Status Field -->
<div class="mb-3">
    <x-base.form-label :tw-merge="false" for="status">{{ $event->getAttributeLabel('status') }}</x-base.form-label>
    <x-base.form-select
        :tw-merge="false"
        class="w-full {{ ($errors->has('status') ? 'border-danger' : '') }}"
        wire:model="status"
        type="text"
    >
        <option >{{ __('Select an option') }}</option>
        @foreach(\App\Models\Event::getStatusArray() as $key => $label)
        <option wire:key="event-status-{{ $key }}" value="{{ $key }}" {{ old('status', $event->status ?? '') == $key ? 'selected' : '' }}>{{ $label }}</option>
        @endforeach
    </x-base.form-select>
    @error('status')
        <div class="mt-2 text-danger">{{ $message }}</div>
    @enderror
</div>
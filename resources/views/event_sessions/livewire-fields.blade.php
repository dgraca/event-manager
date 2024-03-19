{{--<!-- Event Id Field -->--}}
{{--<div class="mb-3">--}}
{{--    <x-base.form-label :tw-merge="false" for="event_id">{{ \App\Models\EventSession::getAttributeLabelStatic('event_id') }}</x-base.form-label>--}}
{{--    <x-base.form-input--}}
{{--        :tw-merge="false"--}}
{{--        class="w-full {{ ($errors->has('event_id') ? 'border-danger' : '') }}"--}}
{{--        id="event_id"--}}
{{--        name="event_id"--}}
{{--        :value="old('event_id', $session->event_id ?? '')"--}}
{{--        type="number"--}}
{{--        step="1"--}}
{{--    />--}}
{{--    @error('event_id')--}}
{{--        <div class="mt-2 text-danger">{{ $message }}</div>--}}
{{--    @enderror--}}
{{--</div>--}}

<!-- Name Field -->
<div class="mb-3">
    <x-base.form-label :tw-merge="false" for="name">{{ \App\Models\EventSession::getAttributeLabelStatic('name') }}</x-base.form-label>
    <x-base.form-input
            :tw-merge="false"
            class="w-full {{ ($errors->has('name') ? 'border-danger' : '') }}"
            wire:model.live="eventSessionForm.sessions.{{ $index }}.name"
            type="text"
    />
    @error('name')
    <div class="mt-2 text-danger">{{ $message }}</div>
    @enderror
</div>

{{--<!-- Slug Field -->--}}
{{--<div class="mb-3">--}}
{{--    <x-base.form-label :tw-merge="false" for="slug">{{ \App\Models\EventSession::getAttributeLabelStatic('slug') }}</x-base.form-label>--}}
{{--    <x-base.form-input--}}
{{--        :tw-merge="false"--}}
{{--        class="w-full {{ ($errors->has('slug') ? 'border-danger' : '') }}"--}}
{{--        id="slug"--}}
{{--        name="slug"--}}
{{--        :value="old('slug', $session->slug ?? '')"--}}
{{--        type="text"--}}
{{--    />--}}
{{--    @error('slug')--}}
{{--        <div class="mt-2 text-danger">{{ $message }}</div>--}}
{{--    @enderror--}}
{{--</div>--}}

<!-- Description Field -->
<div class="mb-3">
    <x-base.form-label :tw-merge="false"
                       for="description">{{ \App\Models\EventSession::getAttributeLabelStatic('description') }}</x-base.form-label>
    <x-base.form-textarea
            :tw-merge="false"
            class="w-full {{ ($errors->has('description') ? 'border-danger' : '') }}"
            wire:model.live="eventSessionForm.sessions.{{ $index }}.description"
            rows="5"
    >{{ old('description', $session->description ?? '') }}</x-base.form-textarea>
    @error('description')
    <div class="mt-2 text-danger">{{ $message }}</div>
    @enderror
</div>

<!-- Max Capacity Field -->
<div class="mb-3">
    <x-base.form-label :tw-merge="false"
                       for="max_capacity">{{ \App\Models\EventSession::getAttributeLabelStatic('max_capacity') }}</x-base.form-label>
    <x-base.form-input
            :tw-merge="false"
            class="w-full {{ ($errors->has('max_capacity') ? 'border-danger' : '') }}"
            wire:model.live="eventSessionForm.sessions.{{ $index }}.max_capacity"
            type="number"
            step="1"
    />
    @error('max_capacity')
    <div class="mt-2 text-danger">{{ $message }}</div>
    @enderror
</div>

<div class="flex flex-row items-center justify-between gap-2">
    <!-- Start Date Field -->
    <div class="w-full mb-3" wire:ignore>
        <x-base.form-label :tw-merge="false"
                           for="start_date">{{ \App\Models\EventSession::getAttributeLabelStatic('start_date') }}</x-base.form-label>
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
                    wire:model.live="eventSessionForm.sessions.{{ $index }}.start_date"
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
        <x-base.form-label :tw-merge="false"
                           for="end_date">{{ \App\Models\EventSession::getAttributeLabelStatic('end_date') }}</x-base.form-label>
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
                    wire:model.live="eventSessionForm.sessions.{{ $index }}.end_date"
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

<!-- Rrule Field -->
{{--<div class="mb-3">--}}
{{--    <x-base.form-label :tw-merge="false" for="rrule">{{ \App\Models\EventSession::getAttributeLabelStatic('rrule') }}</x-base.form-label>--}}
{{--    <x-base.form-textarea--}}
{{--        :tw-merge="false"--}}
{{--        class="w-full {{ ($errors->has('rrule') ? 'border-danger' : '') }}"--}}
{{--        id="rrule"--}}
{{--        name="rrule"--}}
{{--        rows="5"--}}
{{--    >{{ old('rrule', $session->rrule ?? '') }}</x-base.form-textarea>--}}
{{--    @error('rrule')--}}
{{--        <div class="mt-2 text-danger">{{ $message }}</div>--}}
{{--    @enderror--}}
{{--</div>--}}

<!-- Type Field -->
<div class="mb-3">
    <x-base.form-label :tw-merge="false" for="type">{{ \App\Models\EventSession::getAttributeLabelStatic('type') }}</x-base.form-label>
    <x-base.form-input
            :tw-merge="false"
            class="w-full {{ ($errors->has('type') ? 'border-danger' : '') }}"
            wire:model.live="eventSessionForm.sessions.{{ $index }}.type"
            type="number"
            step="1"
    />
    @error('type')
    <div class="mt-2 text-danger">{{ $message }}</div>
    @enderror
</div>

<!-- Status Field -->
<div class="mb-3">
    <x-base.form-label :tw-merge="false" for="status">{{ \App\Models\EventSession::getAttributeLabelStatic('status') }}</x-base.form-label>
    <x-base.form-select
            :tw-merge="false"
            class="w-full {{ ($errors->has('status') ? 'border-danger' : '') }}"
            wire:model.live="eventSessionForm.sessions.{{ $index }}.status"
            type="text"
    >
        <option>{{ __('Select an option') }}</option>
        @foreach(\App\Models\EventSession::getStatusArray() as $key => $label)
            <option value="{{ $key }}" {{ old('status', $session->status ?? '') == $key ? 'selected' : '' }}>{{ $label }}</option>
        @endforeach
    </x-base.form-select>
    @error('status')
    <div class="mt-2 text-danger">{{ $message }}</div>
    @enderror
</div>

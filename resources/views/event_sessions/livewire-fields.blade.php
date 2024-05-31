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
        class="w-full {{ ($errors->has('eventSessionForm.sessions.' . $index . '.name') ? 'border-danger' : '') }}"
        wire:model.live="eventSessionForm.sessions.{{ $index }}.name"
        type="text"
    />
    @error('eventSessionForm.sessions.' . $index . '.name')
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
            class="w-full {{ ($errors->has('eventSessionForm.sessions.' . $index . '.description') ? 'border-danger' : '') }}"
            wire:model.live="eventSessionForm.sessions.{{ $index }}.description"
            rows="5"
    >{{ old('description', $session->description ?? '') }}</x-base.form-textarea>
    @error('eventSessionForm.sessions.' . $index . '.description')
    <div class="mt-2 text-danger">{{ $message }}</div>
    @enderror
</div>

<!-- Max Capacity Field -->
<div class="mb-3">
    <x-base.form-label :tw-merge="false"
                       for="max_capacity">{{ \App\Models\EventSession::getAttributeLabelStatic('max_capacity') }}</x-base.form-label>
    <x-base.form-input
            :tw-merge="false"
            class="w-full {{ ($errors->has('eventSessionForm.sessions.' . $index . '.max_capacity') ? 'border-danger' : '') }}"
            wire:model.live="eventSessionForm.sessions.{{ $index }}.max_capacity"
            type="number"
            step="1"
    />
    @error('eventSessionForm.sessions.' . $index . '.max_capacity')
    <div class="mt-2 text-danger">{{ $message }}</div>
    @enderror
</div>

<div class="flex flex-row items-center justify-between gap-2">
    <!-- Start Date Field -->
    <div class="w-full mb-3" wire:ignore>
        <x-base.form-label :tw-merge="false"
                           for="start_date">{{ \App\Models\EventSession::getAttributeLabelStatic('start_date') }}</x-base.form-label>
        <x-base.input-group
                :tw-merge="false"
                class="flatpickr"
                data-wrap="true"
                data-enable-time="true"
                data-date-format='Y-m-d H:i'
                data-time_24hr='true'
                data-minute-increment='1'
                inputGroup
        >
            <x-base.input-group.text :tw-merge="false" class="cursor-pointer" title="{{ __('Toggle') }}" data-toggle>
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" icon-name="calendar" data-lucide="calendar" class="lucide lucide-calendar stroke-1.5 h-5 w-5"><rect x="3" y="4" width="18" height="18" rx="2" ry="2"></rect><line x1="16" y1="2" x2="16" y2="6"></line><line x1="8" y1="2" x2="8" y2="6"></line><line x1="3" y1="10" x2="21" y2="10"></line></svg>
            </x-base.input-group.text>
            <x-base.flatpickr
                    class="{{ ($errors->has('eventSessionForm.sessions.' . $index . '.start_date') ? 'border-danger' : '') }} [&[readonly]]:bg-white"
                    wire:model="eventSessionForm.sessions.{{ $index }}.start_date"
                    data-input
            />
            <x-base.input-group.text :tw-merge="false" class="cursor-pointer" title="{{ __('Clear') }}" data-clear>
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" icon-name="x" data-lucide="x" class="lucide lucide-x stroke-1.5 h-5 w-5"><line x1="18" y1="6" x2="6" y2="18"></line><line x1="6" y1="6" x2="18" y2="18"></line></svg>
            </x-base.input-group.text>
        </x-base.input-group>
    </div>

    <!-- End Date Field -->
    <div class="w-full mb-3" wire:ignore>
        <x-base.form-label :tw-merge="false"
                           for="end_date">{{ \App\Models\EventSession::getAttributeLabelStatic('end_date') }}</x-base.form-label>
        <x-base.input-group
                :tw-merge="false"
                class="flatpickr"
                data-wrap="true"
                data-enable-time="true"
                data-date-format='Y-m-d H:i'
                data-time_24hr='true'
                data-minute-increment='1'
                inputGroup
        >
            <x-base.input-group.text :tw-merge="false" class="cursor-pointer" title="{{ __('Toggle') }}" data-toggle>
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" icon-name="calendar" data-lucide="calendar" class="lucide lucide-calendar stroke-1.5 h-5 w-5"><rect x="3" y="4" width="18" height="18" rx="2" ry="2"></rect><line x1="16" y1="2" x2="16" y2="6"></line><line x1="8" y1="2" x2="8" y2="6"></line><line x1="3" y1="10" x2="21" y2="10"></line></svg>
            </x-base.input-group.text>
            <x-base.flatpickr
                    class="{{ ($errors->has('eventSessionForm.sessions.' . $index . '.end_date') ? 'border-danger' : '') }} [&[readonly]]:bg-white"
                    wire:model.live="eventSessionForm.sessions.{{ $index }}.end_date"
                    data-input
            />
            <x-base.input-group.text class="cursor-pointer" title="{{ __('Clear') }}" data-clear>
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" icon-name="x" data-lucide="x" class="lucide lucide-x stroke-1.5 h-5 w-5"><line x1="18" y1="6" x2="6" y2="18"></line><line x1="6" y1="6" x2="18" y2="18"></line></svg>
            </x-base.input-group.text>
        </x-base.input-group>
    </div>
</div>
@error('eventSessionForm.sessions.'. $index . '.start_date')
<div class="mb-6 text-danger">{{ $message }}</div>
@enderror

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
    <x-base.form-select
        :tw-merge="false"
        class="w-full {{ ($errors->has('eventSessionForm.sessions.' . $index . '.type') ? 'border-danger' : '') }}"
        wire:model.live="eventSessionForm.sessions.{{ $index }}.type"
        type="text"
    >
        <option>{{ __('Select an option') }}</option>
        @foreach(\App\Models\EventSession::getTypeArray() as $key => $label)
            <option value="{{ $key }}" {{ old('type', $session->type ?? '') == $key ? 'selected' : '' }}>{{ $label }}</option>
        @endforeach
    </x-base.form-select>
    @error('eventSessionForm.sessions.' . $index . '.type')
    <div class="mt-2 text-danger">{{ $message }}</div>
    @enderror
</div>

{{--<!-- Status Field -->--}}
{{--<div class="mb-3">--}}
{{--    <x-base.form-label :tw-merge="false" for="status">{{ \App\Models\EventSession::getAttributeLabelStatic('status') }}</x-base.form-label>--}}
{{--    <x-base.form-select--}}
{{--            :tw-merge="false"--}}
{{--            class="w-full {{ ($errors->has('eventSessionForm.sessions.' . $index . '.status') ? 'border-danger' : '') }}"--}}
{{--            wire:model.live="eventSessionForm.sessions.{{ $index }}.status"--}}
{{--            type="text"--}}
{{--    >--}}
{{--        <option>{{ __('Select an option') }}</option>--}}
{{--        @foreach(\App\Models\EventSession::getStatusArray() as $key => $label)--}}
{{--            <option value="{{ $key }}" {{ old('status', $session->status ?? '') == $key ? 'selected' : '' }}>{{ $label }}</option>--}}
{{--        @endforeach--}}
{{--    </x-base.form-select>--}}
{{--    @error('eventSessionForm.sessions.' . $index . '.status')--}}
{{--    <div class="mt-2 text-danger">{{ $message }}</div>--}}
{{--    @enderror--}}
{{--</div>--}}


@pushOnce('scripts')
    <script>
        document.addEventListener('livewire:initialized', () => {
            Livewire.hook('request', ({ uri, options, payload, respond, succeed, fail }) => {
                succeed(({ status, json }) => {
                    setTimeout(() => {
                        window.applyTailwindMerge();
                        window.flatpickrInit();
                    }, 100);
                })
            })

        });
    </script>
@endpushOnce

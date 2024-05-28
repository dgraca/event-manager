@if($event->getStatusArray()[$event->status] != __('Draft'))
    <!-- Buying page URL Field -->
    <div class="grid grid-cols-1 md:grid-cols-3">
        <dt class="font-medium md:col-span-1">{{ $event->getAttributeLabel('sales_url') }}</dt>
        <dd class="text-slate-500 dark:text-slate-300 md:col-span-2">
            <a href="{{ route('events.show_public', $event->slug) }}">{{ route('events.show_public', $event->slug) }}</a>
        </dd>
    </div>
    <div class="mt-5 w-full border-t border-slate-200/60 dark:border-darkmode-400 last-of-type:hidden"></div>
@endif
<!-- Validate access tickets URL Field -->
<div class="grid grid-cols-1 md:grid-cols-3">
    <dt class="font-medium md:col-span-1">{{ $event->getAttributeLabel('validate_tickets') }}</dt>
    <dd class="text-slate-500 dark:text-slate-300 md:col-span-2">
        <a href="{{ route('events.transactions', $event->slug) }}">{{ route('events.transactions', $event->slug) }}</a>
    </dd>
</div>
<div class="mt-5 w-full border-t border-slate-200/60 dark:border-darkmode-400 last-of-type:hidden"></div>

<!-- Entity Field -->
<div class="grid grid-cols-1 md:grid-cols-3">
    <dt class="font-medium md:col-span-1">{{ $event->entity->getAttributeLabel('Entity') }}</dt>
    <dd class="text-slate-500 dark:text-slate-300 md:col-span-2">{{ $event->entity->name }}</dd>
</div>
<div class="mt-5 w-full border-t border-slate-200/60 dark:border-darkmode-400 last-of-type:hidden"></div>



<!-- Venue Field -->
<div class="grid grid-cols-1 md:grid-cols-3">
    <dt class="font-medium md:col-span-1">{{ $event->venue->getAttributeLabel('Venue') }}</dt>
    <dd class="text-slate-500 dark:text-slate-300 md:col-span-2"><a href="/admin/venues/{{ $event->venue->id }}">{{ $event->venue->name }} ({{ $event->venue->address }})</a></dd>
</div>
<div class="mt-5 w-full border-t border-slate-200/60 dark:border-darkmode-400 last-of-type:hidden"></div>



<!-- Name Field -->
<div class="grid grid-cols-1 md:grid-cols-3">
    <dt class="font-medium md:col-span-1">{{ $event->getAttributeLabel('name') }}</dt>
    <dd class="text-slate-500 dark:text-slate-300 md:col-span-2">{{ $event->name }}</dd>
</div>
<div class="mt-5 w-full border-t border-slate-200/60 dark:border-darkmode-400 last-of-type:hidden"></div>



<!-- Slug Field -->
<div class="grid grid-cols-1 md:grid-cols-3">
    <dt class="font-medium md:col-span-1">{{ $event->getAttributeLabel('slug') }}</dt>
    <dd class="text-slate-500 dark:text-slate-300 md:col-span-2">{{ $event->slug }}</dd>
</div>
<div class="mt-5 w-full border-t border-slate-200/60 dark:border-darkmode-400 last-of-type:hidden"></div>



<!-- Description Field -->
<div class="grid grid-cols-1 md:grid-cols-3">
    <dt class="font-medium md:col-span-1">{{ $event->getAttributeLabel('description') }}</dt>
    <dd class="text-slate-500 dark:text-slate-300 md:col-span-2">{{ $event->description }}</dd>
</div>
<div class="mt-5 w-full border-t border-slate-200/60 dark:border-darkmode-400 last-of-type:hidden"></div>



<!-- Scheduled Start Field -->
<div class="grid grid-cols-1 md:grid-cols-3">
    <dt class="font-medium md:col-span-1">{{ $event->getAttributeLabel('scheduled_start') }}</dt>
    <dd class="text-slate-500 dark:text-slate-300 md:col-span-2">{{ $event->scheduled_start }}</dd>
</div>
<div class="mt-5 w-full border-t border-slate-200/60 dark:border-darkmode-400 last-of-type:hidden"></div>



<!-- Scheduled End Field -->
<div class="grid grid-cols-1 md:grid-cols-3">
    <dt class="font-medium md:col-span-1">{{ $event->getAttributeLabel('scheduled_end') }}</dt>
    <dd class="text-slate-500 dark:text-slate-300 md:col-span-2">{{ $event->scheduled_end }}</dd>
</div>
<div class="mt-5 w-full border-t border-slate-200/60 dark:border-darkmode-400 last-of-type:hidden"></div>



<!-- Start Date Field -->
<div class="grid grid-cols-1 md:grid-cols-3">
    <dt class="font-medium md:col-span-1">{{ $event->getAttributeLabel('start_date') }}</dt>
    <dd class="text-slate-500 dark:text-slate-300 md:col-span-2">{{ $event->start_date }}</dd>
</div>
<div class="mt-5 w-full border-t border-slate-200/60 dark:border-darkmode-400 last-of-type:hidden"></div>



<!-- End Date Field -->
<div class="grid grid-cols-1 md:grid-cols-3">
    <dt class="font-medium md:col-span-1">{{ $event->getAttributeLabel('end_date') }}</dt>
    <dd class="text-slate-500 dark:text-slate-300 md:col-span-2">{{ $event->end_date }}</dd>
</div>
<div class="mt-5 w-full border-t border-slate-200/60 dark:border-darkmode-400 last-of-type:hidden"></div>



<!-- Registration Note Field -->
<div class="grid grid-cols-1 md:grid-cols-3">
    <dt class="font-medium md:col-span-1">{{ $event->getAttributeLabel('registration_note') }}</dt>
    <dd class="text-slate-500 dark:text-slate-300 md:col-span-2">{{ $event->registration_note }}</dd>
</div>
<div class="mt-5 w-full border-t border-slate-200/60 dark:border-darkmode-400 last-of-type:hidden"></div>



<!-- Pre-Approval Field -->
<div class="grid grid-cols-1 md:grid-cols-3">
    <dt class="font-medium md:col-span-1">{{ $event->getAttributeLabel('pre-approval') }}</dt>
    <dd class="text-slate-500 dark:text-slate-300 md:col-span-2">
        @if($event->pre_approval)
            <x-base.lucide
                class="h-4 w-4 text-success"
                icon="check"
            />
        @else
            <x-base.lucide
                class="h-4 w-4 text-danger"
                icon="x"
            />
        @endif
    </dd>
</div>
<div class="mt-5 w-full border-t border-slate-200/60 dark:border-darkmode-400 last-of-type:hidden"></div>



{{--<!-- Max Capacity Field -->--}}
{{--<div class="grid grid-cols-1 md:grid-cols-3">--}}
{{--    <dt class="font-medium md:col-span-1">{{ $event->getAttributeLabel('max_capacity') }}</dt>--}}
{{--    <dd class="text-slate-500 dark:text-slate-300 md:col-span-2">{{ $event->max_capacity }}</dd>--}}
{{--</div>--}}
{{--<div class="mt-5 w-full border-t border-slate-200/60 dark:border-darkmode-400 last-of-type:hidden"></div>--}}



<!-- Type Field -->
{{--<div class="grid grid-cols-1 md:grid-cols-3">--}}
{{--    <dt class="font-medium md:col-span-1">{{ $event->getAttributeLabel('type') }}</dt>--}}
{{--    <dd class="text-slate-500 dark:text-slate-300 md:col-span-2">{{ $event->getTypeArray()[$event->type] }}</dd>--}}
{{--</div>--}}
{{--<div class="mt-5 w-full border-t border-slate-200/60 dark:border-darkmode-400 last-of-type:hidden"></div>--}}



<!-- Status Field -->
<div class="grid grid-cols-1 md:grid-cols-3">
    <dt class="font-medium md:col-span-1">{{ $event->getAttributeLabel('status') }}</dt>
    <dd class="text-slate-500 dark:text-slate-300 md:col-span-2">{{ $event->getStatusArray()[$event->status] }}</dd>
</div>
<div class="mt-5 w-full border-t border-slate-200/60 dark:border-darkmode-400 last-of-type:hidden"></div>




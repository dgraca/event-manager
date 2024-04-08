{{--<!-- Event Id Field -->--}}
{{--<div class="grid grid-cols-1 md:grid-cols-3">--}}
{{--    <dt class="font-medium md:col-span-1">{{ $tickets->getAttributeLabel('event_id') }}</dt>--}}
{{--    <dd class="text-slate-500 dark:text-slate-300 md:col-span-2">{{ $tickets->event_id }}</dd>--}}
{{--</div>--}}
{{--<div class="mt-5 w-full border-t border-slate-200/60 dark:border-darkmode-400 last-of-type:hidden"></div>--}}



{{--<!-- Zone Id Field -->--}}
{{--<div class="grid grid-cols-1 md:grid-cols-3">--}}
{{--    <dt class="font-medium md:col-span-1">{{ $tickets->getAttributeLabel('zone_id') }}</dt>--}}
{{--    <dd class="text-slate-500 dark:text-slate-300 md:col-span-2">{{ $tickets->zone_id }}</dd>--}}
{{--</div>--}}
{{--<div class="mt-5 w-full border-t border-slate-200/60 dark:border-darkmode-400 last-of-type:hidden"></div>--}}



<!-- Name Field -->
<div class="grid grid-cols-1 md:grid-cols-3">
    <dt class="font-medium md:col-span-1">{{ $tickets->getAttributeLabel('name') }}</dt>
    <dd class="text-slate-500 dark:text-slate-300 md:col-span-2">{{ $tickets->name }}</dd>
</div>
<div class="mt-5 w-full border-t border-slate-200/60 dark:border-darkmode-400 last-of-type:hidden"></div>



<!-- Description Field -->
<div class="grid grid-cols-1 md:grid-cols-3">
    <dt class="font-medium md:col-span-1">{{ $tickets->getAttributeLabel('description') }}</dt>
    <dd class="text-slate-500 dark:text-slate-300 md:col-span-2">{{ $tickets->description }}</dd>
</div>
<div class="mt-5 w-full border-t border-slate-200/60 dark:border-darkmode-400 last-of-type:hidden"></div>



<!-- Max Check In Field -->
<div class="grid grid-cols-1 md:grid-cols-3">
    <dt class="font-medium md:col-span-1">{{ $tickets->getAttributeLabel('max_check_in') }}</dt>
    <dd class="text-slate-500 dark:text-slate-300 md:col-span-2">{{ $tickets->max_check_in }}</dd>
</div>
<div class="mt-5 w-full border-t border-slate-200/60 dark:border-darkmode-400 last-of-type:hidden"></div>



<!-- Max Tickets Per Order Field -->
<div class="grid grid-cols-1 md:grid-cols-3">
    <dt class="font-medium md:col-span-1">{{ $tickets->getAttributeLabel('max_tickets_per_order') }}</dt>
    <dd class="text-slate-500 dark:text-slate-300 md:col-span-2">{{ $tickets->max_tickets_per_order }}</dd>
</div>
<div class="mt-5 w-full border-t border-slate-200/60 dark:border-darkmode-400 last-of-type:hidden"></div>



<!-- Price Field -->
<div class="grid grid-cols-1 md:grid-cols-3">
    <dt class="font-medium md:col-span-1">{{ $tickets->getAttributeLabel('price') }}</dt>
    <dd class="text-slate-500 dark:text-slate-300 md:col-span-2">{{ $tickets->price }}</dd>
</div>
<div class="mt-5 w-full border-t border-slate-200/60 dark:border-darkmode-400 last-of-type:hidden"></div>



<!-- Currency Field -->
<div class="grid grid-cols-1 md:grid-cols-3">
    <dt class="font-medium md:col-span-1">{{ $tickets->getAttributeLabel('currency') }}</dt>
    <dd class="text-slate-500 dark:text-slate-300 md:col-span-2">{{ $tickets->currency }}</dd>
</div>
<div class="mt-5 w-full border-t border-slate-200/60 dark:border-darkmode-400 last-of-type:hidden"></div>




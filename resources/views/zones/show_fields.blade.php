<!-- Venue Id Field -->
<div class="grid grid-cols-1 md:grid-cols-3">
    <dt class="font-medium md:col-span-1">{{ $zone->getAttributeLabel('venue_id') }}</dt>
    <dd class="text-slate-500 dark:text-slate-300 md:col-span-2">{{ $zone->venue_id }}</dd>
</div>
<div class="mt-5 w-full border-t border-slate-200/60 dark:border-darkmode-400 last-of-type:hidden"></div>



<!-- Name Field -->
<div class="grid grid-cols-1 md:grid-cols-3">
    <dt class="font-medium md:col-span-1">{{ $zone->getAttributeLabel('name') }}</dt>
    <dd class="text-slate-500 dark:text-slate-300 md:col-span-2">{{ $zone->name }}</dd>
</div>
<div class="mt-5 w-full border-t border-slate-200/60 dark:border-darkmode-400 last-of-type:hidden"></div>



<!-- Slug Field -->
<div class="grid grid-cols-1 md:grid-cols-3">
    <dt class="font-medium md:col-span-1">{{ $zone->getAttributeLabel('slug') }}</dt>
    <dd class="text-slate-500 dark:text-slate-300 md:col-span-2">{{ $zone->slug }}</dd>
</div>
<div class="mt-5 w-full border-t border-slate-200/60 dark:border-darkmode-400 last-of-type:hidden"></div>



<!-- Max Capacity Field -->
<div class="grid grid-cols-1 md:grid-cols-3">
    <dt class="font-medium md:col-span-1">{{ $zone->getAttributeLabel('max_capacity') }}</dt>
    <dd class="text-slate-500 dark:text-slate-300 md:col-span-2">{{ $zone->max_capacity }}</dd>
</div>
<div class="mt-5 w-full border-t border-slate-200/60 dark:border-darkmode-400 last-of-type:hidden"></div>




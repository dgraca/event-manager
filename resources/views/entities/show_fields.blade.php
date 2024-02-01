<!-- Name Field -->
<div class="grid grid-cols-1 md:grid-cols-3">
    <dt class="font-medium md:col-span-1">{{ $entity->getAttributeLabel('name') }}</dt>
    <dd class="text-slate-500 dark:text-slate-300 md:col-span-2">{{ $entity->name }}</dd>
</div>
<div class="mt-5 w-full border-t border-slate-200/60 dark:border-darkmode-400 last-of-type:hidden"></div>



<!-- Slug Field -->
<div class="grid grid-cols-1 md:grid-cols-3">
    <dt class="font-medium md:col-span-1">{{ $entity->getAttributeLabel('slug') }}</dt>
    <dd class="text-slate-500 dark:text-slate-300 md:col-span-2">{{ $entity->slug }}</dd>
</div>
<div class="mt-5 w-full border-t border-slate-200/60 dark:border-darkmode-400 last-of-type:hidden"></div>




@props(['formSelectSize' => null, 'twMerge' => true])
@aware(['formInline' => null])
@php
    //if is readonly, then disable it and add a hidden input side readonly is not allowed for select
    if($attributes['readonly']) {
        $attributes['disabled'] = true;
    }
@endphp

<select
    @if($twMerge) data-tw-merge @endif
    {{ $attributes->class(
            merge([
                'disabled:bg-slate-100 disabled:cursor-not-allowed disabled:dark:bg-darkmode-800/50',
                '[&[readonly]]:bg-slate-100 [&[readonly]]:cursor-not-allowed [&[readonly]]:dark:bg-darkmode-800/50',
                'transition duration-200 ease-in-out w-full text-sm border-slate-200 shadow-sm rounded-md py-2 px-3 pr-8 focus:ring-4 focus:ring-primary focus:ring-opacity-20 focus:border-primary focus:border-opacity-40 dark:bg-darkmode-800 dark:border-transparent dark:focus:ring-slate-700 dark:focus:ring-opacity-50',
                $formSelectSize == 'sm' ? 'text-xs py-1.5 pl-2 pr-8' : null,
                $formSelectSize == 'lg' ? 'text-lg py-1.5 pl-4 pr-8' : null,
                $formInline ? 'flex-1' : null,
                $attributes->whereStartsWith('class')->first(),
            ]),
        )->merge($attributes->whereDoesntStartWith('class')->getAttributes()) }}
>
    {{ $slot }}
</select>
@if($attributes['readonly'])
    <input type="hidden" name="{{ $attributes['name'] }}" value="{{ $attributes['value'] }}">
@endif

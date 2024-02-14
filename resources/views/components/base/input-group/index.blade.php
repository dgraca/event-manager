@props(['inputGroup' => null, 'twMerge' => true])

<div
    @if($twMerge) data-tw-merge @endif
    {{ $attributes->class(['flex'])->merge($attributes->whereDoesntStartWith('class')->getAttributes()) }}
>
    {{ $slot }}
</div>

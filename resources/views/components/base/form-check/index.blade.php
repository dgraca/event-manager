<div @props(['twMerge' => true])
    @if($twMerge) data-tw-merge @endif
    {{ $attributes->class(merge(['flex items-center', $attributes->whereStartsWith('class')->first()]))->merge($attributes->whereDoesntStartWith('class')->getAttributes()) }}
>{{ $slot }}</div>

<a class="-intro-x flex items-center pt-5" href="/">
    @if('amt')
        <img class="w-80" src="{{ asset('images/logo.png') }}" alt="{{ config('app.name') }}" />
    @else
        <img class="w-6" src="{{ asset('images/logo.png') }}" alt="{{ config('app.name') }}" />
        <span class="ml-3 text-lg text-white"> {{ config('app.name') }} </span>
    @endif
</a>

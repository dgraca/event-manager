@if (!empty($breadcrumbs))
    <!-- BEGIN: Breadcrumb -->
    <x-base.breadcrumb class="-intro-x mr-auto hidden sm:flex">
        @foreach ($breadcrumbs as $key => $breadcrumb)
            @if(!empty($breadcrumb->isHome))
                <x-base.breadcrumb.link :index="0" href="{{ $breadcrumb->url }}">
                    {{ $breadcrumb->title }}
                </x-base.breadcrumb.link>
            @else
                @if ($breadcrumb->url && !$loop->last)
                    <x-base.breadcrumb.link :index="$key" :active="false" href="{{ $breadcrumb->url }}">
                        {{ $breadcrumb->title }}
                    </x-base.breadcrumb.link>
                @else
                    <x-base.breadcrumb.link :index="$key" :active="true">
                        {{ $breadcrumb->title }}
                    </x-base.breadcrumb.link>
                @endif
            @endif
        @endforeach
    </x-base.breadcrumb>
    <!-- END: Breadcrumb -->
@endif

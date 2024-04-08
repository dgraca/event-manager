@verbatim<x-app-layout>@endverbatim
    @@section('breadcrumbs')
        @{{ Breadcrumbs::render('{!! $config->prefixes->getRoutePrefixWith('.') !!}{!! $config->modelNames->dashedPlural !!}.index') }}
    @@endsection
    @@once
        @@push('firstStyles')
            @@filamentStyles
        @@endpush
    @@endonce
    @@once
        @@push('scripts')
            @@filamentScripts
        @@endpush
    @@endonce
    <div class="intro-y mt-8 flex flex-col items-center sm:flex-row">
        <h2 class="mr-auto text-lg font-medium">@{{ __('{!! $config->modelNames->humanPlural !!}') }}</h2>
        <div class="mt-4 flex w-full sm:mt-0 sm:w-auto">
            @verbatim<x-base.button@endverbatim
                class="mr-2 shadow-md"
                variant="primary"
                href="@{{ route('{!! $config->prefixes->getRoutePrefixWith('.') !!}{!! $config->modelNames->dashedPlural !!}.create') }}"
                as="a"
            >
                @{{ __('Create {!! $config->modelNames->human !!}') }}
            @verbatim</x-base.button>@endverbatim
        </div>
    </div>
    <!-- BEGIN: HTML Table Data -->
    <div class="mt-8">
        {!! $table !!}
    </div>
@verbatim</x-app-layout>@endverbatim

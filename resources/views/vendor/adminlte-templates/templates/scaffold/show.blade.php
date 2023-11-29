@verbatim<x-app-layout>@endverbatim
    @@section('breadcrumbs')
        @{{ Breadcrumbs::render('{!! $config->prefixes->getRoutePrefixWith('.') !!}{!! $config->modelNames->dashedPlural !!}.show', ${!! $config->modelNames->camel !!}) }}
    @@endsection
    <div class="intro-y mt-8 flex flex-col items-center sm:flex-row">
        <h2 class="mr-auto text-lg font-medium">@{{ __('{!! $config->modelNames->human !!} Details') }}</h2>
        <div class="mt-4 flex w-full sm:mt-0 sm:w-auto">
            @verbatim<x-base.button@endverbatim
                class="mr-2 shadow-md ml-auto sm:ml-0"
                variant="primary"
                href="@{{ route('{!! $config->prefixes->getRoutePrefixWith('.') !!}{!! $config->modelNames->dashedPlural !!}.edit', ${!! $config->modelNames->camel !!}) }}"
                as="a"
                >
                @verbatim<x-base.lucide
                        class="mr-2 h-4 w-4"
                        icon="edit"
                    />@endverbatim @{{ __('Update') }}
            @verbatim</x-base.button>@endverbatim
            @verbatim<x-base.button
                class="shadow-md sm:ml-0"
                variant="danger"
                data-tw-toggle="modal"
                data-tw-target="#delete-modal"
                href="#"
                as="a"
            >
                <x-base.lucide
                    class="mr-2 h-4 w-4"
                    icon="trash"
                /> {{ __('Delete') }}
            </x-base.button>
            <x-base.dialog id="delete-modal" x-data>
                <x-base.dialog.panel>
                    <div class="p-5 text-center">
                        <x-base.lucide
                            class="mx-auto mt-3 h-16 w-16 text-danger"
                            icon="XCircle"
                        />
                        <div class="mt-5 text-3xl">{{ __('Are you sure?') }}</div>
                        <div class="mt-2 text-slate-500">
                            {{ __('Do you really want to delete these records?') }} <br />
                            {{ __('This process cannot be undone.') }}
                        </div>
                    </div>
                    <div class="px-5 pb-8 text-center">
                        <x-base.button
                            class="mr-1 w-24"
                            data-tw-dismiss="modal"
                            type="button"
                            variant="outline-secondary"
                        >
                            {{ __('Cancel') }}
                        </x-base.button>
                        <x-base.button
                            class="w-24"
                            type="button"
                            variant="danger"
                            @click="document.getElementById('delete-record-form').submit()"
                        >
                            {{ __('Delete') }}
                        </x-base.button>
                    </div>
                </x-base.dialog.panel>
            </x-base.dialog>@endverbatim
            <form method="POST" action="@{{ route('{!! $config->prefixes->getRoutePrefixWith('.') !!}{!! $config->modelNames->dashedPlural !!}.destroy', ${!!$config->modelNames->camel !!}) }}" id="delete-record-form">
                @@csrf
                @@method('DELETE')
            </form>
        </div>
    </div>
    <div class="intro-y box mt-3 p-5">
        <dl class="space-y-4">
            @@include('{{ $config->prefixes->getViewPrefixForInclude() }}{{ $config->modelNames->snakePlural }}.show_fields')
        </dl>
    </div>
@verbatim</x-app-layout>@endverbatim

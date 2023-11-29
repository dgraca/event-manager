<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="{{ \Illuminate\Support\Facades\Cookie::get('lightmode') }} scroll-smooth" dir="ltr">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <link rel="shortcut icon" href="/favicon/favicon.ico"/>
        <link rel="apple-touch-icon" sizes="57x57" href="/favicon/apple-icon-57x57.png">
        <link rel="apple-touch-icon" sizes="60x60" href="/favicon/apple-icon-60x60.png">
        <link rel="apple-touch-icon" sizes="72x72" href="/favicon/apple-icon-72x72.png">
        <link rel="apple-touch-icon" sizes="76x76" href="/favicon/apple-icon-76x76.png">
        <link rel="apple-touch-icon" sizes="114x114" href="/favicon/apple-icon-114x114.png">
        <link rel="apple-touch-icon" sizes="120x120" href="/favicon/apple-icon-120x120.png">
        <link rel="apple-touch-icon" sizes="144x144" href="/favicon/apple-icon-144x144.png">
        <link rel="apple-touch-icon" sizes="152x152" href="/favicon/apple-icon-152x152.png">
        <link rel="apple-touch-icon" sizes="180x180" href="/favicon/apple-icon-180x180.png">
        <link rel="icon" type="image/png" sizes="192x192"  href="/favicon/android-icon-192x192.png">
        <link rel="icon" type="image/png" sizes="32x32" href="/favicon/favicon-32x32.png">
        <link rel="icon" type="image/png" sizes="96x96" href="/favicon/favicon-96x96.png">
        <link rel="icon" type="image/png" sizes="16x16" href="/favicon/favicon-16x16.png">
        <link rel="manifest" href="/favicon/manifest.json">
        <meta name="msapplication-TileColor" content="#ffffff">
        <meta name="msapplication-TileImage" content="/favicon/ms-icon-144x144.png">
        <meta name="theme-color" content="#ffffff">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        @if(config('recaptchav3.enable'))
            {!! RecaptchaV3::initJs() !!}
        @endif

        @if (!empty($pageTitle))
            <title>{{ $pageTitle }}</title>
            <meta property="og:title" content="{{ $pageTitle }}" />
        @else
            <title>@yield('title', config('app.name', 'Laravel'))</title>
            <meta property="og:title" content="@yield('title', config('app.name', 'Laravel'))" />
        @endif

        <meta name="description" content="@yield('page_description', $pageDescription ?? 'O Observatório da Autoridade da Mobilidade e dos Transportes (AMT) disponibiliza, através deste portal, informação estatística sobre diversos modos de transportes em Portugal.')"/>
        <meta name="keywords" content="@yield('keywords', $pageKeywords ?? 'Observatório, AMT, Autoridade da Mobilidade e Transportes')"/>
        <meta property="og:url" content="@yield('public_url', $publicUrl ?? url()->current())" />
        <meta property="og:type" content="website" />
        <meta property="og:description" content="@yield('page_description', $pageDescription ?? 'O Observatório da Autoridade da Mobilidade e dos Transportes (AMT) disponibiliza, através deste portal, informação estatística sobre diversos modos de transportes em Portugal.')" />
        <meta property="og:image" content="@yield('share_image', $shareImageUrl ?? asset('images/logo_dark.png'))" />
        @if(false)
            <link rel="canonical" href="@yield('canonical', $pageCanonical ?? '')"/>
        @endif
        <x-cookie-consent-and-tracking></x-cookie-consent-and-tracking>
        @stack('firstStyles')

        @vite([
            //'node_modules/animate.css/animate.min.css',
            //'node_modules/tobii/dist/css/tobii.min.css',
            'node_modules/tiny-slider/dist/tiny-slider.css',
            'resources/tailwind-assets/scss/icons.scss',
            'resources/tailwind-assets/scss/app.scss'
        ])
        <!-- Styles -->
        @livewireStyles
        @stack('styles')
    </head>

    <body class="font-nunito text-base text-gray-primary dark:text-white bg-white dark:bg-slate-900 flex flex-col min-h-screen">
        <div class="flex-grow">
            <!-- Loader Start -->
            <!-- <div id="preloader">
                <div id="status">
                    <div class="spinner">
                        <div class="double-bounce1"></div>
                        <div class="double-bounce2"></div>
                    </div>
                </div>
            </div> -->
            <!-- Loader End -->
            {{-- @if(isset($showBgEffect) && $showBgEffect == true)
                <span class="fixed blur-[200px] lg:w-[600px] w-[400px] lg:h-[600px] h-[400px] rounded-full top-[10%] md:start-[10%] -start-[20%] bg-indigo-600/20"></span>
                <span class="fixed blur-[200px] lg:w-[600px] w-[400px] lg:h-[600px] h-[400px] rounded-full bottom-[10%] md:end-[10%] -end-[20%] bg-red-600/20"></span>
            @endif --}}
            @include('layouts.tailwind._navbar_center')
            {{-- @include('flash::message_tailwind') --}}
            @section('breadcrumbs')
            @show
            <x-frontend.notification-handler />
            {{ $slot }}
        </div>

        @include('layouts.tailwind._footer_transparent')

        @stack('firstScripts')
        @stack('vendors')
        {{-- não se pode meter tudo com o @vite porque mete <script type="module" e isto não funciona para todos os modulos porque estas variáveis precisam de ser globais --}}
        @if(false)
            <script src="{{ Vite::asset('node_modules/jarallax/dist/jarallax.min.js') }}"></script>
            <script src="{{ Vite::asset('node_modules/tobii/dist/js/tobii.min.js') }}"></script>
        @endif
        <script src="{{ Vite::asset('node_modules/tiny-slider/dist/min/tiny-slider.js') }}"></script>
        <script src="{{ Vite::asset('node_modules/feather-icons/dist/feather.min.js') }}"></script>
        @if(true)
            <script src="{{ Vite::asset('resources/tailwind-assets/js/plugins.init.js') }}"></script>
            <script src="{{ Vite::asset('resources/tailwind-assets/js/app.js') }}"></script>
        @else
            @vite([
                //'node_modules/wow.js/dist/wow.min.js',
                //'node_modules/tobii/dist/js/tobii.min.js',
                //'node_modules/tiny-slider/dist/min/tiny-slider.js',
                //'node_modules/feather-icons/dist/feather.min.js',
                //'resources/tailwind-assets/js/easy_background.js',
                'resources/tailwind-assets/js/plugins.init.js',
                'resources/tailwind-assets/js/app.js'
            ])
        @endif

        @livewireScripts
        @stack('scripts')

    </body>

</html>

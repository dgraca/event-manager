<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="{{ $darkMode == 'dark' ? 'dark' :  '' }}{{ $colorScheme != 'default' ? ' ' . $colorScheme : '' }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

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

        <title>{{ config('app.name', 'Laravel') }}</title>

        @if(false && config('recaptchav3.enable'))
            {!! RecaptchaV3::initJs() !!}
        @endif

        @if (!empty($pageTitle))
            <title>{{ $pageTitle }}</title>
            <meta property="og:title" content="{{ $pageTitle }}" />
        @else
            <title>@yield('title', config('app.name', 'Laravel'))</title>
            <meta property="og:title" content="@yield('title', config('app.name', 'Laravel'))" />
        @endif

        <meta name="description" content="@yield('page_description', $pageDescription ?? 'Page description')"/>
        <meta name="keywords" content="@yield('keywords', $pageKeywords ?? 'keywords here')"/>
        <meta property="og:url" content="@yield('public_url', $publicUrl ?? url()->current())" />
        <meta property="og:type" content="website" />
        <meta property="og:description" content="@yield('page_description', $pageDescription ?? '')" />
        <meta property="og:image" content="@yield('share_image', $shareImageUrl ?? asset('/assets-frontend/images/logo.png'))" />
        @if(false)
            <link rel="canonical" href="@yield('canonical', $pageCanonical ?? '')"/>
        @endif

        <x-cookie-consent-and-tracking></x-cookie-consent-and-tracking>

        @stack('firstStyles')

        <!-- Scripts -->
        @vite(['resources/css/app.css'])

        <!-- Styles -->
        @livewireStyles
        @stack('styles')
    </head>
    <body >
        <div class="py-2">
            <x-mobile-menu />
            <div class="mt-[4.7rem] flex md:mt-0">
                <x-side-menu />

                <!-- BEGIN: Content -->
                <div
                    class="md:max-w-auto min-h-screen min-w-0 max-w-full flex-1 rounded-[30px] bg-slate-100 px-4 pb-10 before:block before:h-px before:w-full before:content-[''] dark:bg-darkmode-700 md:px-[22px]">
                    <x-top-bar />
                    <x-notification-handler />
                    {{ $slot }}
                </div>
                <!-- END: Content -->
            </div>
        </div>
        @if(false)
            <x-notification-handler />
            <div class="font-sans text-gray-900 dark:text-gray-100 antialiased">
                {{ $slot }}
            </div>
        @endif
        @if(false)
            <div class="min-h-screen bg-gray-100 dark:bg-gray-900">
                @livewire('navigation-menu')

                <!-- Page Heading -->
                @if (isset($header))
                    <header class="bg-white dark:bg-gray-800 shadow">
                        <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                            {{ $header }}
                        </div>
                    </header>
                @endif

                <!-- Page Content -->
                <main>
                    {{ $slot }}
                </main>
            </div>
        @endif

        @stack('firstScripts')

        @vite('resources/js/app.js')
        <!-- BEGIN: Vendor JS Assets-->
        @stack('vendors')
        <!-- END: Vendor JS Assets-->

        @livewire('wire-elements-modal')
        @livewireScripts
        @stack('scripts')
    </body>
</html>

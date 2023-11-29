<x-guest-layout>
    <div @class([
        '-m-3 sm:-mx-8 p-3 sm:px-8 relative h-screen lg:overflow-hidden bg-primary xl:bg-white dark:bg-darkmode-800 xl:dark:bg-darkmode-600',
        'before:hidden before:xl:block before:content-[\'\'] before:w-[57%] before:-mt-[28%] before:-mb-[16%] before:-ml-[13%] before:absolute before:inset-y-0 before:left-0 before:transform before:rotate-[-4.5deg] before:bg-primary/20 before:rounded-[100%] before:dark:bg-darkmode-400',
        'after:hidden after:xl:block after:content-[\'\'] after:w-[57%] after:-mt-[20%] after:-mb-[13%] after:-ml-[13%] after:absolute after:inset-y-0 after:left-0 after:transform after:rotate-[-4.5deg] after:bg-primary after:rounded-[100%] after:dark:bg-darkmode-700',
    ])>
        <div class="container relative z-10 sm:px-10">
            <div class="block grid-cols-2 gap-4 xl:grid">
                <!-- BEGIN: Login Info -->
                <div class="hidden min-h-screen flex-col xl:flex">
                    <x-authentication-card-logo />
                    <div class="my-auto">
                        <img
                            class="-intro-x -mt-16 w-1/2"
                            src="{{ asset('images/illustration.svg') }}"
                            alt="{{ config('app.name') }}"
                        />
                        <div class="-intro-x mt-10 text-4xl font-medium leading-tight text-white">
                            A few more clicks to <br />
                            sign in to your account.
                        </div>
                        <div class="-intro-x mt-5 text-lg text-white text-opacity-70 dark:text-slate-400">
                            Developed with ❤️ by <a href="https://noop.pt" class="text-white underline">noop</a>
                        </div>
                    </div>
                </div>
                <!-- END: Login Info -->
                <!-- BEGIN: Login Form -->
                <div class="my-10 flex h-screen py-5 xl:my-0 xl:h-auto xl:py-0">
                    <div
                        class="mx-auto my-auto w-full rounded-md bg-white px-5 py-8 shadow-md dark:bg-darkmode-600 sm:w-3/4 sm:px-8 lg:w-2/4 xl:ml-20 xl:w-auto xl:bg-transparent xl:p-0 xl:shadow-none">
                        <form method="POST" action="{{ route('password.confirm') }}">
                            @csrf
                            <div class="intro-x mt-2 text-center text-slate-400 xl:text-left">
                                {{ __('This is a secure area of the application. Please confirm your password before continuing.') }}
                            </div>

                            <div class="intro-x mt-8">
                                <x-base.form-input
                                    class="intro-x block min-w-full px-4 py-3 xl:min-w-[350px] {{ ($errors->has('password') ? 'border-danger' : '') }}"
                                    type="password"
                                    id="password"
                                    name="password"
                                    placeholder="{{ __('Password') }}"
                                    required autofocus autocomplete="current-password"
                                />
                                @error('password')
                                    <div class="mt-2 text-danger">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="intro-x mt-5 text-center xl:mt-8 xl:text-left">
                                <x-base.button
                                    class="w-full px-4 py-3 align-top xl:mr-3 xl:w-32"
                                    variant="primary"
                                    type="submit"
                                >
                                    {{ __('Confirm') }}
                                </x-base.button>
                            </div>
                        </form>
                    </div>
                </div>
                <!-- END: Login Form -->
            </div>
        </div>
    </div>
    @if(false)
        <x-authentication-card>
            <x-slot name="logo">
                <x-authentication-card-logo />
            </x-slot>

            <div class="mb-4 text-sm text-gray-600 dark:text-gray-400">
                {{ __('This is a secure area of the application. Please confirm your password before continuing.') }}
            </div>

            <x-validation-errors class="mb-4" />

            <form method="POST" action="{{ route('password.confirm') }}">
                @csrf

                <div>
                    <x-label for="password" value="{{ __('Password') }}" />
                    <x-input id="password" class="block mt-1 w-full" type="password" name="password" required autocomplete="current-password" autofocus />
                </div>

                <div class="flex justify-end mt-4">
                    <x-button class="ml-4">
                        {{ __('Confirm') }}
                    </x-button>
                </div>
            </form>
        </x-authentication-card>
    @endif
</x-guest-layout>

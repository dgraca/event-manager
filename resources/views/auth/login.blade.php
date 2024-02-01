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
                        <form id="login-form" method="POST" action="{{ route('magic-login') }}">
                            @csrf
                            @if(config('recaptchav3.enable'))
                                {!! RecaptchaV3::field('login', 'g-recaptcha-response', true, 'login-form', "onClickRecaptcha") !!}
                            @endif
                            <h2 class="intro-x text-center text-2xl font-bold xl:text-left xl:text-3xl">
                                {{ __('Sign In') }}
                            </h2>
                            <div class="intro-x mt-2 text-center text-slate-400 xl:hidden">
                                A few more clicks to sign in to your account.
                            </div>

                            @if (session('status'))
                                @push('scripts')
                                    <script>
                                        window.onload = function() {
                                            toastShow('{{ session('status') }}', '', 'success');
                                        };
                                    </script>
                                @endpush
                            @endif
                            <div class="intro-x mt-8">
                                <x-base.form-input
                                    class="intro-x block min-w-full px-4 py-3 xl:min-w-[350px] {{ ($errors->has('email') ? 'border-danger' : '') }}"
                                    id="email"
                                    type="email"
                                    name="email"
                                    :value="old('email')"
                                    placeholder="{{ __('Email') }}"
                                />
                                @error('email')
                                    <div class="mt-2 text-danger">{{ $message }}</div>
                                @enderror

                                @error('g-recaptcha-response')
                                    <div class ="mt-2 text-danger">{{ $message }}</div>
                                @enderror
                                <x-base.form-input type="hidden" id="remember_me" name="remember" value="1"/>
                            </div>
                            <div class="intro-x mt-5 text-center xl:mt-8 xl:text-left">
                                <x-base.button
                                    class="w-full px-4 py-3 align-top xl:mr-3 xl:w-32"
                                    variant="primary"
                                    type="submit"
                                    :onclick="config('recaptchav3.enable') ? 'onClickRecaptcha(event)' : null"
                                >
                                    {{ __('Login') }}
                                </x-base.button>

                                @if (Route::has('register'))
                                    <x-base.button
                                        class="mt-3 w-full px-4 py-3 align-top xl:mt-0 xl:w-32"
                                        variant="outline-secondary"
                                        as="a"
                                        href="{{ route('magic-register') }}"
                                    >
                                        {{ __('Register') }}
                                    </x-base.button>
                                @endif
                            </div>
                            @if(false)
                                <div class="intro-x mt-10 text-center text-slate-600 dark:text-slate-500 xl:mt-24 xl:text-left">
                                    By signin up, you agree to our
                                    <a
                                        class="text-primary dark:text-slate-200"
                                        href=""
                                    >
                                        Terms and Conditions
                                    </a>
                                    &
                                    <a
                                        class="text-primary dark:text-slate-200"
                                        href=""
                                    >
                                        Privacy Policy
                                    </a>
                                </div>
                            @endif
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

            <x-validation-errors class="mb-4" />

            @if (session('status'))
                <div class="mb-4 font-medium text-sm text-green-600 dark:text-green-400">
                    {{ session('status') }}
                </div>
            @endif

            <form method="POST" action="{{ route('magic-login') }}">
                @csrf

                <div>
                    <x-label for="email" value="{{ __('Email') }}" />
                    <x-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus autocomplete="username" />
                </div>


                <div class="block mt-4">
                    <label for="remember_me" class="flex items-center">
                        <x-checkbox id="remember_me" name="remember" />
                        <span class="ml-2 text-sm text-gray-600 dark:text-gray-400">{{ __('Remember me') }}</span>
                    </label>
                </div>

                <div class="flex items-center justify-end mt-4">
                    <x-button class="ml-4">
                        {{ __('Log in') }}
                    </x-button>
                </div>
            </form>
        </x-authentication-card>
    @endif
</x-guest-layout>

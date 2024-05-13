<?php
// include '../resources/css/_tailwind_frontend.css';
/*
 * @var $sectorsCollection App\Models\Sector[]|Illuminate\Database\Eloquent\Collection
 * @var $themesCollection App\Models\Theme[]|Illuminate\Database\Eloquent\Collection
 * @var $updatedPostsCollection App\Models\Post[]|Illuminate\Database\Eloquent\Collection
 */
view()->share('pageTitle', __('Homepage'));
?>
<x-landing-layout>
    <!-- Start -->
    <section class="relative h-screen flex items-center justify-center text-center bg-gray-50 dark:bg-slate-800">
        <div class="container relative">
            <div class="grid grid-cols-1">
                <div class="title-heading text-center my-auto">
                    <div class="size-24 bg-indigo-600/5 text-indigo-600 rounded-full text-5xl flex align-middle justify-center items-center shadow-sm dark:shadow-gray-800 mx-auto">
                        <i class="uil uil-thumbs-up"></i>
                    </div>
                    <h1 class="mt-6 mb-8 md:text-5xl text-3xl font-bold">{{ __("Thank you") }}</h1>
                    <p class="text-slate-400 max-w-xl mx-auto">
                        {{ __("If the event is not pre-approved, you will receive an email with your tickets.") }}
                    </p>
                    <p class="text-slate-400 max-w-xl mx-auto">
                        {{ __("If it is pre-approved, you will receive an email with the tickets as soon as it gets approved.") }}
                    </p>
                </div>
            </div><!--end grid-->

            {{-- Shows the payment information if the user selected bank_transfer method --}}
            @if(isset($payment_info))
                <div class="mt-16 mb-32 grid grid-cols-1">
                    <div class="mb-32 sm:mb-0 title-heading text-center my-auto">
                        <div class="size-24 bg-indigo-600/5 text-indigo-600 rounded-full text-5xl flex align-middle justify-center items-center shadow-sm dark:shadow-gray-800 mx-auto">
                            <i class="uil uil-credit-card"></i>
                        </div>
                        <h1 class="mt-6 mb-8 md:text-5xl text-3xl font-bold">{{ __("Bank transfer information") }}</h1>
                        <p class="text-slate-400 max-w-xl mx-auto">
                            {{ __("Because you choose bank transfer, you must pay the total value and send an email with the proof of payment to the email listed below") }}
                        </p>
                        <ul>
                            @if(isset($payment_info['account_holder']))<li>{{ __('Account Holder') }}: {{ $payment_info['account_holder'] }}</li>@endif
                            @if(isset($payment_info['bank_entity']))<li>{{ __('Bank Entity') }}: {{ $payment_info['bank_entity'] }}</li>@endif
                            @if(isset($payment_info['bank_country']))<li>{{ __('Bank Country') }}: {{ $payment_info['bank_country'] }}</li>@endif
                            @if(isset($payment_info['bic_swift']))<li>{{ __('BIC/SWIFT') }}: {{ $payment_info['bic_swift'] }}</li>@endif
                            @if(isset($payment_info['iban']))<li>{{ __('IBAN') }}: {{ $payment_info['iban'] }}</li>@endif
                            <li>{{ __('Total') }}: {{ $total }} {{ $currency }}</li>
                        </ul>
                        <a href="mailto:{{ $email }}" class="text-indigo-600 hover:text-indigo-700">{{ $email }}</a>
                    </div>
                </div><!--end grid-->
            @endif
        </div><!--end container-->
    </section><!--end section-->
    <!-- End -->
</x-landing-layout>

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

    <!-- Start Hero -->
    <section class="relative table w-full py-36 lg:py-44">
        <div class="container relative">
            <div class="grid md:grid-cols-12 grid-cols-1 items-center mt-10 gap-[30px]">
                <div class="md:col-span-7">
                    <div class="me-6">
                        <h4 class="font-semibold lg:leading-normal leading-normal text-4xl lg:text-5xl mb-5 text-black dark:text-white">{{ __('Our Creativity Is Your') }}<span class="text-indigo-600"> {{ __('Success') }}</span></h4>
                        <p class="text-slate-400 text-lg max-w-xl">{{ __('An all-in-one management platform for live and online events') }}</p>
                        <div class="mt-6">
                            <a href="{{ route('login') }}" class="py-2 px-5 inline-block font-semibold tracking-wide border align-middle duration-500 text-base text-center bg-indigo-600 hover:bg-indigo-700 border-indigo-600 hover:border-indigo-700 text-white rounded-md me-2 mt-2"><i class="uil uil-arrow-up"></i> {{ __('Sign In') }}</a>
                        </div>
                    </div>
                </div><!--end col-->

                <div class="md:col-span-5">
                    <img src="/assets-frontend/images/illustrator/Startup_SVG.svg" alt="">
                </div><!--end col-->
            </div><!--end grid-->
        </div><!--end container-->
    </section><!--end section-->
    <!-- End Hero -->

    <!-- Start -->
    <section class="relative md:py-24 py-16 bg-gray-50 dark:bg-slate-800">
        <div class="container relative">
            <div class="grid lg:grid-cols-12 md:grid-cols-2 grid-cols-1 items-center mt-10 gap-[30px]">
                <div class="lg:col-span-5">
                    <img src="/assets-frontend/images/illustrator/SEO_SVG.svg" alt="">
                </div>
                <div class="lg:col-span-7">
                    <div class="lg:ms-10">
                        <h3 class="mb-6 md:text-3xl text-2xl md:leading-normal leading-normal font-semibold">{{ __('Change the way you manage your events') }}</h3>
                        <p class="text-slate-400 max-w-xl">{{ __('These are some of our features') }}</p>

                        <ul class="list-none text-slate-400 mt-4">
                            <li class="mb-1 flex"><i class="uil uil-check-circle text-indigo-600 text-xl me-2"></i> {{ __('Free') }}</li>
                            <li class="mb-1 flex"><i class="uil uil-check-circle text-indigo-600 text-xl me-2"></i> {{ __('In-platform tickets validation') }}</li>
                            <li class="mb-1 flex"><i class="uil uil-check-circle text-indigo-600 text-xl me-2"></i> {{ __('In-platform payment validation') }}</li>
                        </ul>
                    </div>
                </div>
            </div><!--end grid-->
        </div><!--end container-->
    </section><!--end section-->

    <div class="relative">
        <div class="shape absolute sm:-bottom-px -bottom-[2px] start-0 end-0 overflow-hidden z-1 text-gray-50 dark:text-slate-800">
            <svg class="w-full h-auto scale-[2.0] origin-top" viewBox="0 0 2880 250" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M720 125L2160 0H2880V250H0V125H720Z" fill="currentColor"></path>
            </svg>
        </div>
    </div>
    <!-- End -->
</x-landing-layout>

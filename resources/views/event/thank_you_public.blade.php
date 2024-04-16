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
        </div><!--end container-->
    </section><!--end section-->
    <!-- End -->
</x-landing-layout>

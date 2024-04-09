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
    <section class="relative table w-full py-36 lg:py-64 bg-[url('/assets-frontend/images/event/bg.jpg')] bg-no-repeat bg-center bg-cover">
        <div class="absolute inset-0 bg-gradient-to-t from-indigo-600/90 to-fuchsia-600/90"></div>
        <div class="container relative">
            <div class="grid md:grid-cols-12 grid-cols-1 items-center mt-10 gap-[30px]">
                <div class="lg:col-span-8 md:col-span-7 md:order-1 order-2">
                    <h5 class="text-xl text-white/60 mb-3">October 11, 2022</h5>
                    <h4 class="font-bold lg:leading-normal leading-normal text-4xl lg:text-5xl mb-5 text-white">{{ $event->name }}</h4>
                    <p class="text-white/60 text-lg max-w-xl">Launch your campaign and benefit from our expertise on designing and managing conversion centered Tailwind CSS v3.x html page.</p>

                    <div class="mt-8">
                        <a href="#ticket" class="py-2 px-5 inline-block font-semibold tracking-wide border align-middle duration-500 text-base text-center bg-indigo-600 hover:bg-indigo-700 border-indigo-600 hover:border-indigo-700 text-white rounded-md"><i class="uil uil-envelope"></i> Buy Ticket</a>
                    </div>
                </div>

                <div class="lg:col-span-4 md:col-span-5 md:text-center md:order-2 order-1">
                    <a href="#!" data-type="youtube" data-id="S_CGed6E610" class="lightbox lg:size-24 size-20 rounded-full shadow-lg dark:shadow-gray-800 inline-flex items-center justify-center bg-white hover:bg-indigo-600 text-indigo-600 hover:text-white duration-500 ease-in-out mx-auto">
                        <i class="mdi mdi-play inline-flex items-center justify-center text-3xl"></i>
                    </a>
                </div>
            </div><!--end grid-->
        </div><!--end container-->
    </section><!--end section-->
    <!-- End Hero -->

    <!-- Start -->
    <section class="relative md:py-24 py-16">
        <div class="container relative">
            <div class="grid md:grid-cols-12 grid-cols-1 items-center gap-[30px]">
                <div class="md:col-span-6">
                    <div class="grid grid-cols-12 gap-4 items-center">
                        <div class="col-span-7">
                            <div class="grid grid-cols-1 gap-4">
                                <img src="assets-frontend/images/event/1.jpg" class="shadow rounded-lg" alt="">
                            </div>
                        </div>

                        <div class="col-span-5">
                            <div class="grid grid-cols-1 gap-4">
                                <img src="assets-frontend/images/event/2.jpg" class="shadow rounded-lg" alt="">

                                <div class="size-28 bg-indigo-600/10 rounded-lg"></div>
                            </div>
                        </div>
                    </div>
                </div><!--end col-->

                <div class="md:col-span-6">
                    <div class="lg:ms-5">
                        <h6 class="text-indigo-600 text-sm font-bold uppercase mb-2">Outpace Your Competition</h6>
                        <h3 class="mb-4 md:text-3xl md:leading-normal text-2xl leading-normal font-semibold">Get access to the full <br> conference experience.</h3>

                        <p class="text-slate-400 max-w-xl mb-6">Get instant helpful resources about anything on the go, easily implement secure money transfer solutions, boost your daily efficiency, connect to other app users and create your own Techwind network, and much more with just a few taps. commodo consequat. Duis aute irure.</p>

                        <div class="flex mt-6">
                            <i class="uil uil-map-marker text-indigo-600 text-4xl me-4 mt-2"></i>
                            <div class="">
                                <h5 class="text-xl font-semibold mb-0">Location</h5>
                                <p class="text-slate-400 mt-2">C/54 Northwest Freeway, <br> Suite 558, Houston, <br> USA 485</p>
                            </div>
                        </div>

                        <div class="flex mt-6">
                            <i class="uil uil-clock text-indigo-600 text-4xl me-4 mt-2"></i>
                            <div class="">
                                <h5 class="text-xl font-semibold mb-0">Time</h5>
                                <p class="text-slate-400 mt-2">October 11, 2022 <br> 9:00A.M. - 12:00P.M.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div><!--end container-->

        <!-- Team -->
        <div class="container relative md:mt-24 mt-16">
            <div class="grid grid-cols-1 pb-8 text-center">
                <h6 class="text-indigo-600 text-sm font-bold uppercase mb-2">Event Speakers</h6>
                <h3 class="mb-4 md:text-3xl md:leading-normal text-2xl leading-normal font-semibold">Meet Our Speakers</h3>

                <p class="text-slate-400 max-w-xl mx-auto">Start working with Tailwind CSS that can provide everything you need to generate awareness, drive traffic, connect.</p>
            </div><!--end grid-->

            <div class="grid md:grid-cols-12 grid-cols-1 mt-8 gap-[30px]">
                <div class="lg:col-span-3 md:col-span-6">
                    <div class="group text-center">
                        <div class="relative inline-block mx-auto size-52 rounded-full overflow-hidden">
                            <img src="assets-frontend/images/client/04.jpg" class="" alt="">
                            <div class="absolute inset-0 bg-gradient-to-b from-transparent to-black size-52 rounded-full opacity-0 group-hover:opacity-100 duration-500"></div>

                            <ul class="list-none absolute start-0 end-0 -bottom-20 group-hover:bottom-5 duration-500">
                                <li class="inline"><a href="" class="size-8 inline-flex items-center justify-center tracking-wide align-middle duration-500 text-base text-center rounded-full border border-indigo-600 bg-indigo-600 hover:border-indigo-600 hover:bg-indigo-600 text-white"><i data-feather="facebook" class="size-4"></i></a></li>
                                <li class="inline"><a href="" class="size-8 inline-flex items-center justify-center tracking-wide align-middle duration-500 text-base text-center rounded-full border border-indigo-600 bg-indigo-600 hover:border-indigo-600 hover:bg-indigo-600 text-white"><i data-feather="instagram" class="size-4"></i></a></li>
                                <li class="inline"><a href="" class="size-8 inline-flex items-center justify-center tracking-wide align-middle duration-500 text-base text-center rounded-full border border-indigo-600 bg-indigo-600 hover:border-indigo-600 hover:bg-indigo-600 text-white"><i data-feather="linkedin" class="size-4"></i></a></li>
                            </ul><!--end icon-->
                        </div>

                        <div class="content mt-3">
                            <a href="" class="text-lg font-semibold hover:text-indigo-600 duration-500">Jack John</a>
                            <p class="text-slate-400">Speaker</p>
                        </div>
                    </div>
                </div>

                <div class="lg:col-span-3 md:col-span-6">
                    <div class="group text-center">
                        <div class="relative inline-block mx-auto size-52 rounded-full overflow-hidden">
                            <img src="assets-frontend/images/client/05.jpg" class="" alt="">
                            <div class="absolute inset-0 bg-gradient-to-b from-transparent to-black size-52 rounded-full opacity-0 group-hover:opacity-100 duration-500"></div>

                            <ul class="list-none absolute start-0 end-0 -bottom-20 group-hover:bottom-5 duration-500">
                                <li class="inline"><a href="" class="size-8 inline-flex items-center justify-center tracking-wide align-middle duration-500 text-base text-center rounded-full border border-indigo-600 bg-indigo-600 hover:border-indigo-600 hover:bg-indigo-600 text-white"><i data-feather="facebook" class="size-4"></i></a></li>
                                <li class="inline"><a href="" class="size-8 inline-flex items-center justify-center tracking-wide align-middle duration-500 text-base text-center rounded-full border border-indigo-600 bg-indigo-600 hover:border-indigo-600 hover:bg-indigo-600 text-white"><i data-feather="instagram" class="size-4"></i></a></li>
                                <li class="inline"><a href="" class="size-8 inline-flex items-center justify-center tracking-wide align-middle duration-500 text-base text-center rounded-full border border-indigo-600 bg-indigo-600 hover:border-indigo-600 hover:bg-indigo-600 text-white"><i data-feather="linkedin" class="size-4"></i></a></li>
                            </ul><!--end icon-->
                        </div>

                        <div class="content mt-3">
                            <a href="" class="text-lg font-semibold hover:text-indigo-600 duration-500">Krista John</a>
                            <p class="text-slate-400">Speaker</p>
                        </div>
                    </div>
                </div>

                <div class="lg:col-span-3 md:col-span-6">
                    <div class="group text-center">
                        <div class="relative inline-block mx-auto size-52 rounded-full overflow-hidden">
                            <img src="assets-frontend/images/client/06.jpg" class="" alt="">
                            <div class="absolute inset-0 bg-gradient-to-b from-transparent to-black size-52 rounded-full opacity-0 group-hover:opacity-100 duration-500"></div>

                            <ul class="list-none absolute start-0 end-0 -bottom-20 group-hover:bottom-5 duration-500">
                                <li class="inline"><a href="" class="size-8 inline-flex items-center justify-center tracking-wide align-middle duration-500 text-base text-center rounded-full border border-indigo-600 bg-indigo-600 hover:border-indigo-600 hover:bg-indigo-600 text-white"><i data-feather="facebook" class="size-4"></i></a></li>
                                <li class="inline"><a href="" class="size-8 inline-flex items-center justify-center tracking-wide align-middle duration-500 text-base text-center rounded-full border border-indigo-600 bg-indigo-600 hover:border-indigo-600 hover:bg-indigo-600 text-white"><i data-feather="instagram" class="size-4"></i></a></li>
                                <li class="inline"><a href="" class="size-8 inline-flex items-center justify-center tracking-wide align-middle duration-500 text-base text-center rounded-full border border-indigo-600 bg-indigo-600 hover:border-indigo-600 hover:bg-indigo-600 text-white"><i data-feather="linkedin" class="size-4"></i></a></li>
                            </ul><!--end icon-->
                        </div>

                        <div class="content mt-3">
                            <a href="" class="text-lg font-semibold hover:text-indigo-600 duration-500">Roger Jackson</a>
                            <p class="text-slate-400">Speaker</p>
                        </div>
                    </div>
                </div>

                <div class="lg:col-span-3 md:col-span-6">
                    <div class="group text-center">
                        <div class="relative inline-block mx-auto size-52 rounded-full overflow-hidden">
                            <img src="assets-frontend/images/client/07.jpg" class="" alt="">
                            <div class="absolute inset-0 bg-gradient-to-b from-transparent to-black size-52 rounded-full opacity-0 group-hover:opacity-100 duration-500"></div>

                            <ul class="list-none absolute start-0 end-0 -bottom-20 group-hover:bottom-5 duration-500">
                                <li class="inline"><a href="" class="size-8 inline-flex items-center justify-center tracking-wide align-middle duration-500 text-base text-center rounded-full border border-indigo-600 bg-indigo-600 hover:border-indigo-600 hover:bg-indigo-600 text-white"><i data-feather="facebook" class="size-4"></i></a></li>
                                <li class="inline"><a href="" class="size-8 inline-flex items-center justify-center tracking-wide align-middle duration-500 text-base text-center rounded-full border border-indigo-600 bg-indigo-600 hover:border-indigo-600 hover:bg-indigo-600 text-white"><i data-feather="instagram" class="size-4"></i></a></li>
                                <li class="inline"><a href="" class="size-8 inline-flex items-center justify-center tracking-wide align-middle duration-500 text-base text-center rounded-full border border-indigo-600 bg-indigo-600 hover:border-indigo-600 hover:bg-indigo-600 text-white"><i data-feather="linkedin" class="size-4"></i></a></li>
                            </ul><!--end icon-->
                        </div>

                        <div class="content mt-3">
                            <a href="" class="text-lg font-semibold hover:text-indigo-600 duration-500">Johnny English</a>
                            <p class="text-slate-400">Speaker</p>
                        </div>
                    </div>
                </div>
            </div><!--end grid-->
        </div><!--end container-->
        <!-- team -->
    </section><!--end section-->
    <!-- End -->

    <!-- Start CTA -->
    <section class="relative table w-full py-36 bg-[url('/assets-frontend/images/event/bg3.jpg')] bg-no-repeat bg-bottom bg-cover">
        <div class="absolute inset-0 bg-gradient-to-t from-indigo-600/90 to-fuchsia-600/90"></div>
        <div class="container relative">
            <div class="grid grid-cols-1 text-center">
                <div class="pb-8">
                    <h6 class="text-white/50 text-sm font-bold uppercase mb-2">Hurry up & Register</h6>
                    <h3 class="mb-4 md:text-3xl md:leading-normal text-2xl leading-normal font-semibold text-white">Not yet registered? <br> Hurry up!</h3>

                    <p class="text-white/50 max-w-xl mx-auto">Start working with Tailwind CSS that can provide everything you need to generate awareness, drive traffic, connect.</p>
                </div>

                <div id="countdown">
                    <ul class="count-down list-none inline-block text-white text-center mt-8">
                        <li id="days" class="text-[40px] leading-[110px] size-[130px] rounded-full shadow-md bg-white/10 backdrop-opacity-30 inline-block m-2"></li>
                        <li id="hours" class="text-[40px] leading-[110px] size-[130px] rounded-full shadow-md bg-white/10 backdrop-opacity-30 inline-block m-2"></li>
                        <li id="mins" class="text-[40px] leading-[110px] size-[130px] rounded-full shadow-md bg-white/10 backdrop-opacity-30 inline-block m-2"></li>
                        <li id="secs" class="text-[40px] leading-[110px] size-[130px] rounded-full shadow-md bg-white/10 backdrop-opacity-30 inline-block m-2"></li>
                        <li id="end" class="h1"></li>
                    </ul>
                </div>
            </div><!--end grid-->
        </div><!--end container-->
    </section><!--end section-->
    <!-- End CTA -->

    <!-- Start -->
    <section class="relative md:py-24 py-16">
        <div class="container relative">
            <div class="grid grid-cols-1 pb-8 text-center">
                <h3 class="mb-4 md:text-3xl md:leading-normal text-2xl leading-normal font-semibold">Event Schedules</h3>

                <p class="text-slate-400 max-w-xl mx-auto">Start working with Tailwind CSS that can provide everything you need to generate awareness, drive traffic, connect.</p>
            </div><!--end grid-->

            <div class="grid grid-cols-1 mt-8">
                <ul class="md:w-fit w-full mx-auto flex-wrap justify-center text-center p-3 bg-white dark:bg-slate-900 shadow dark:shadow-gray-800 rounded-md" id="myTab" data-tabs-toggle="#StarterContent" role="tablist">
                    <li role="presentation" class="md:inline-block block md:w-fit w-full">
                        <button class="px-6 py-2 font-semibold rounded-md w-full hover:text-indigo-600 duration-500" id="tuesday-tab" data-tabs-target="#tuesday" type="button" role="tab" aria-controls="tuesday" aria-selected="true">Tuesday</button>
                    </li>
                    <li role="presentation" class="md:inline-block block md:w-fit w-full">
                        <button class="px-6 py-2 font-semibold rounded-md w-full duration-500" id="wednesday-tab" data-tabs-target="#wednesday" type="button" role="tab" aria-controls="wednesday" aria-selected="false">Wednesday</button>
                    </li>
                    <li role="presentation" class="md:inline-block block md:w-fit w-full">
                        <button class="px-6 py-2 font-semibold rounded-md w-full duration-500" id="thursday-tab" data-tabs-target="#thursday" type="button" role="tab" aria-controls="thursday" aria-selected="false">Thursday</button>
                    </li>
                    <li role="presentation" class="md:inline-block block md:w-fit w-full">
                        <button class="px-6 py-2 font-semibold rounded-md w-full duration-500" id="friday-tab" data-tabs-target="#friday" type="button" role="tab" aria-controls="friday" aria-selected="false">Friday</button>
                    </li>
                </ul>

                <div id="StarterContent" class="mt-1">
                    <div class="" id="tuesday" role="tabpanel" aria-labelledby="tuesday-tab">
                        <div class="grid grid-cols-1">
                            <div class="relative overflow-x-auto block w-full bg-white dark:bg-slate-900">
                                <table class="w-full text-start">
                                    <tbody>
                                    <tr>
                                        <td class="text-center border-b border-gray-100 dark:border-gray-700 py-12 px-5 min-w-[200px] text-slate-400">09:00AM - 10:00AM</td>
                                        <td class="p-3 border-b border-gray-100 dark:border-gray-700 min-w-[540px] py-12 px-5">
                                            <div class="flex items-center">
                                                <img src="assets-frontend/images/event/eve-sch/1.jpg" class="rounded-full size-24 shadow-md dark:shadow-gray-700" alt="">

                                                <div class="ms-4">
                                                    <a href="" class="hover:text-indigo-600 text-lg font-semibold">Digital Conference Event Intro</a>
                                                    <p class="text-slate-400 mt-2">The most well-known dummy text is the 'Lorem Ipsum', which is said to have originated in the 16th century</p>
                                                </div>
                                            </div>
                                        </td>
                                        <td class="text-center border-b border-gray-100 dark:border-gray-700 py-12 px-5 min-w-[180px] text-slate-400">
                                            <span class="block">Speaker</span>
                                            <span class="block text-black dark:text-white text-md mt-1">Raymond Turner</span>
                                        </td>
                                        <td class="text-end border-b border-gray-100 dark:border-gray-700 py-12 px-5 min-w-[180px]">
                                            <a href="" class="relative inline-block tracking-wide align-middle text-base text-center border-none after:content-[''] after:absolute after:h-px after:w-0 hover:after:w-full after:end-0 hover:after:end-auto after:bottom-0 after:start-0 after:duration-500 font-medium hover:text-indigo-600 after:bg-indigo-600 duration-500 ease-in-out">Buy Ticket <i class="uil uil-arrow-right"></i></a>
                                        </td>
                                    </tr>

                                    <tr>
                                        <td class="text-center border-b border-gray-100 dark:border-gray-700 py-12 px-5 min-w-[200px] text-slate-400">10:30AM - 11:30AM</td>
                                        <td class="p-3 border-b border-gray-100 dark:border-gray-700 min-w-[540px] py-12 px-5">
                                            <div class="flex items-center">
                                                <img src="assets-frontend/images/event/eve-sch/2.jpg" class="rounded-full size-24 shadow-md dark:shadow-gray-700" alt="">

                                                <div class="ms-4">
                                                    <a href="" class="hover:text-indigo-600 text-lg font-semibold">Conference On User Interface</a>
                                                    <p class="text-slate-400 mt-2">The most well-known dummy text is the 'Lorem Ipsum', which is said to have originated in the 16th century</p>
                                                </div>
                                            </div>
                                        </td>
                                        <td class="text-center border-b border-gray-100 dark:border-gray-700 py-12 px-5 min-w-[180px] text-slate-400">
                                            <span class="block">Speaker</span>
                                            <span class="block text-black dark:text-white text-md mt-1">Cindy Morrison</span>
                                        </td>
                                        <td class="text-end border-b border-gray-100 dark:border-gray-700 py-12 px-5 min-w-[180px]">
                                            <a href="" class="relative inline-block tracking-wide align-middle text-base text-center border-none after:content-[''] after:absolute after:h-px after:w-0 hover:after:w-full after:end-0 hover:after:end-auto after:bottom-0 after:start-0 after:duration-500 font-medium hover:text-indigo-600 after:bg-indigo-600 duration-500 ease-in-out">Buy Ticket <i class="uil uil-arrow-right"></i></a>
                                        </td>
                                    </tr>

                                    <tr>
                                        <td class="text-center border-b border-gray-100 dark:border-gray-700 py-12 px-5 min-w-[200px] text-slate-400">12:00PM - 01:00PM</td>
                                        <td class="p-3 border-b border-gray-100 dark:border-gray-700 min-w-[540px] py-12 px-5">
                                            <div class="flex items-center">
                                                <img src="assets-frontend/images/event/eve-sch/3.jpg" class="rounded-full size-24 shadow-md dark:shadow-gray-700" alt="">

                                                <div class="ms-4">
                                                    <a href="" class="hover:text-indigo-600 text-lg font-semibold">Business World Event Intro</a>
                                                    <p class="text-slate-400 mt-2">The most well-known dummy text is the 'Lorem Ipsum', which is said to have originated in the 16th century</p>
                                                </div>
                                            </div>
                                        </td>
                                        <td class="text-center border-b border-gray-100 dark:border-gray-700 py-12 px-5 min-w-[180px] text-slate-400">
                                            <span class="block">Speaker</span>
                                            <span class="block text-black dark:text-white text-md mt-1">Vincent Adams</span>
                                        </td>
                                        <td class="text-end border-b border-gray-100 dark:border-gray-700 py-12 px-5 min-w-[180px]">
                                            <a href="" class="relative inline-block tracking-wide align-middle text-base text-center border-none after:content-[''] after:absolute after:h-px after:w-0 hover:after:w-full after:end-0 hover:after:end-auto after:bottom-0 after:start-0 after:duration-500 font-medium hover:text-indigo-600 after:bg-indigo-600 duration-500 ease-in-out">Buy Ticket <i class="uil uil-arrow-right"></i></a>
                                        </td>
                                    </tr>

                                    <tr>
                                        <td class="text-center border-b border-gray-100 dark:border-gray-700 py-12 px-5 min-w-[200px] text-slate-400">02:00PM - 03:00PM</td>
                                        <td class="p-3 border-b border-gray-100 dark:border-gray-700 min-w-[540px] py-12 px-5">
                                            <div class="flex items-center">
                                                <img src="assets-frontend/images/event/eve-sch/4.jpg" class="rounded-full size-24 shadow-md dark:shadow-gray-700" alt="">

                                                <div class="ms-4">
                                                    <a href="" class="hover:text-indigo-600 text-lg font-semibold">Business Conference for professional</a>
                                                    <p class="text-slate-400 mt-2">The most well-known dummy text is the 'Lorem Ipsum', which is said to have originated in the 16th century</p>
                                                </div>
                                            </div>
                                        </td>
                                        <td class="text-center border-b border-gray-100 dark:border-gray-700 py-12 px-5 min-w-[180px] text-slate-400">
                                            <span class="block">Speaker</span>
                                            <span class="block text-black dark:text-white text-md mt-1">Ana Heweit</span>
                                        </td>
                                        <td class="text-end border-b border-gray-100 dark:border-gray-700 py-12 px-5 min-w-[180px]">
                                            <a href="" class="relative inline-block tracking-wide align-middle text-base text-center border-none after:content-[''] after:absolute after:h-px after:w-0 hover:after:w-full after:end-0 hover:after:end-auto after:bottom-0 after:start-0 after:duration-500 font-medium hover:text-indigo-600 after:bg-indigo-600 duration-500 ease-in-out">Buy Ticket <i class="uil uil-arrow-right"></i></a>
                                        </td>
                                    </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>

                    <div class="hidden" id="wednesday" role="tabpanel" aria-labelledby="wednesday-tab">
                        <div class="grid grid-cols-1">
                            <div class="relative overflow-x-auto block w-full bg-white dark:bg-slate-900">
                                <table class="w-full text-start">
                                    <tbody>
                                    <tr>
                                        <td class="text-center border-b border-gray-100 dark:border-gray-700 py-12 px-5 min-w-[200px] text-slate-400">09:00AM - 10:00AM</td>
                                        <td class="p-3 border-b border-gray-100 dark:border-gray-700 min-w-[540px] py-12 px-5">
                                            <div class="flex items-center">
                                                <img src="assets-frontend/images/event/eve-sch/5.jpg" class="rounded-full size-24 shadow-md dark:shadow-gray-700" alt="">

                                                <div class="ms-4">
                                                    <a href="" class="hover:text-indigo-600 text-lg font-semibold">Digital Conference Event Intro</a>
                                                    <p class="text-slate-400 mt-2">The most well-known dummy text is the 'Lorem Ipsum', which is said to have originated in the 16th century</p>
                                                </div>
                                            </div>
                                        </td>
                                        <td class="text-center border-b border-gray-100 dark:border-gray-700 py-12 px-5 min-w-[180px] text-slate-400">
                                            <span class="block">Speaker</span>
                                            <span class="block text-black dark:text-white text-md mt-1">Raymond Turner</span>
                                        </td>
                                        <td class="text-end border-b border-gray-100 dark:border-gray-700 py-12 px-5 min-w-[180px]">
                                            <a href="" class="relative inline-block tracking-wide align-middle text-base text-center border-none after:content-[''] after:absolute after:h-px after:w-0 hover:after:w-full after:end-0 hover:after:end-auto after:bottom-0 after:start-0 after:duration-500 font-medium hover:text-indigo-600 after:bg-indigo-600 duration-500 ease-in-out">Buy Ticket <i class="uil uil-arrow-right"></i></a>
                                        </td>
                                    </tr>

                                    <tr>
                                        <td class="text-center border-b border-gray-100 dark:border-gray-700 py-12 px-5 min-w-[200px] text-slate-400">10:30AM - 11:30AM</td>
                                        <td class="p-3 border-b border-gray-100 dark:border-gray-700 min-w-[540px] py-12 px-5">
                                            <div class="flex items-center">
                                                <img src="assets-frontend/images/event/eve-sch/6.jpg" class="rounded-full size-24 shadow-md dark:shadow-gray-700" alt="">

                                                <div class="ms-4">
                                                    <a href="" class="hover:text-indigo-600 text-lg font-semibold">Conference On User Interface</a>
                                                    <p class="text-slate-400 mt-2">The most well-known dummy text is the 'Lorem Ipsum', which is said to have originated in the 16th century</p>
                                                </div>
                                            </div>
                                        </td>
                                        <td class="text-center border-b border-gray-100 dark:border-gray-700 py-12 px-5 min-w-[180px] text-slate-400">
                                            <span class="block">Speaker</span>
                                            <span class="block text-black dark:text-white text-md mt-1">Cindy Morrison</span>
                                        </td>
                                        <td class="text-end border-b border-gray-100 dark:border-gray-700 py-12 px-5 min-w-[180px]">
                                            <a href="" class="relative inline-block tracking-wide align-middle text-base text-center border-none after:content-[''] after:absolute after:h-px after:w-0 hover:after:w-full after:end-0 hover:after:end-auto after:bottom-0 after:start-0 after:duration-500 font-medium hover:text-indigo-600 after:bg-indigo-600 duration-500 ease-in-out">Buy Ticket <i class="uil uil-arrow-right"></i></a>
                                        </td>
                                    </tr>

                                    <tr>
                                        <td class="text-center border-b border-gray-100 dark:border-gray-700 py-12 px-5 min-w-[200px] text-slate-400">12:00PM - 01:00PM</td>
                                        <td class="p-3 border-b border-gray-100 dark:border-gray-700 min-w-[540px] py-12 px-5">
                                            <div class="flex items-center">
                                                <img src="assets-frontend/images/event/eve-sch/7.jpg" class="rounded-full size-24 shadow-md dark:shadow-gray-700" alt="">

                                                <div class="ms-4">
                                                    <a href="" class="hover:text-indigo-600 text-lg font-semibold">Business World Event Intro</a>
                                                    <p class="text-slate-400 mt-2">The most well-known dummy text is the 'Lorem Ipsum', which is said to have originated in the 16th century</p>
                                                </div>
                                            </div>
                                        </td>
                                        <td class="text-center border-b border-gray-100 dark:border-gray-700 py-12 px-5 min-w-[180px] text-slate-400">
                                            <span class="block">Speaker</span>
                                            <span class="block text-black dark:text-white text-md mt-1">Vincent Adams</span>
                                        </td>
                                        <td class="text-end border-b border-gray-100 dark:border-gray-700 py-12 px-5 min-w-[180px]">
                                            <a href="" class="relative inline-block tracking-wide align-middle text-base text-center border-none after:content-[''] after:absolute after:h-px after:w-0 hover:after:w-full after:end-0 hover:after:end-auto after:bottom-0 after:start-0 after:duration-500 font-medium hover:text-indigo-600 after:bg-indigo-600 duration-500 ease-in-out">Buy Ticket <i class="uil uil-arrow-right"></i></a>
                                        </td>
                                    </tr>

                                    <tr>
                                        <td class="text-center border-b border-gray-100 dark:border-gray-700 py-12 px-5 min-w-[200px] text-slate-400">02:00PM - 03:00PM</td>
                                        <td class="p-3 border-b border-gray-100 dark:border-gray-700 min-w-[540px] py-12 px-5">
                                            <div class="flex items-center">
                                                <img src="assets-frontend/images/event/eve-sch/8.jpg" class="rounded-full size-24 shadow-md dark:shadow-gray-700" alt="">

                                                <div class="ms-4">
                                                    <a href="" class="hover:text-indigo-600 text-lg font-semibold">Business Conference for professional</a>
                                                    <p class="text-slate-400 mt-2">The most well-known dummy text is the 'Lorem Ipsum', which is said to have originated in the 16th century</p>
                                                </div>
                                            </div>
                                        </td>
                                        <td class="text-center border-b border-gray-100 dark:border-gray-700 py-12 px-5 min-w-[180px] text-slate-400">
                                            <span class="block">Speaker</span>
                                            <span class="block text-black dark:text-white text-md mt-1">Ana Heweit</span>
                                        </td>
                                        <td class="text-end border-b border-gray-100 dark:border-gray-700 py-12 px-5 min-w-[180px]">
                                            <a href="" class="relative inline-block tracking-wide align-middle text-base text-center border-none after:content-[''] after:absolute after:h-px after:w-0 hover:after:w-full after:end-0 hover:after:end-auto after:bottom-0 after:start-0 after:duration-500 font-medium hover:text-indigo-600 after:bg-indigo-600 duration-500 ease-in-out">Buy Ticket <i class="uil uil-arrow-right"></i></a>
                                        </td>
                                    </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>

                    <div class="hidden" id="thursday" role="tabpanel" aria-labelledby="thursday-tab">
                        <div class="grid grid-cols-1">
                            <div class="relative overflow-x-auto block w-full bg-white dark:bg-slate-900">
                                <table class="w-full text-start">
                                    <tbody>
                                    <tr>
                                        <td class="text-center border-b border-gray-100 dark:border-gray-700 py-12 px-5 min-w-[200px] text-slate-400">09:00AM - 10:00AM</td>
                                        <td class="p-3 border-b border-gray-100 dark:border-gray-700 min-w-[540px] py-12 px-5">
                                            <div class="flex items-center">
                                                <img src="assets-frontend/images/event/eve-sch/9.jpg" class="rounded-full size-24 shadow-md dark:shadow-gray-700" alt="">

                                                <div class="ms-4">
                                                    <a href="" class="hover:text-indigo-600 text-lg font-semibold">Digital Conference Event Intro</a>
                                                    <p class="text-slate-400 mt-2">The most well-known dummy text is the 'Lorem Ipsum', which is said to have originated in the 16th century</p>
                                                </div>
                                            </div>
                                        </td>
                                        <td class="text-center border-b border-gray-100 dark:border-gray-700 py-12 px-5 min-w-[180px] text-slate-400">
                                            <span class="block">Speaker</span>
                                            <span class="block text-black dark:text-white text-md mt-1">Raymond Turner</span>
                                        </td>
                                        <td class="text-end border-b border-gray-100 dark:border-gray-700 py-12 px-5 min-w-[180px]">
                                            <a href="" class="relative inline-block tracking-wide align-middle text-base text-center border-none after:content-[''] after:absolute after:h-px after:w-0 hover:after:w-full after:end-0 hover:after:end-auto after:bottom-0 after:start-0 after:duration-500 font-medium hover:text-indigo-600 after:bg-indigo-600 duration-500 ease-in-out">Buy Ticket <i class="uil uil-arrow-right"></i></a>
                                        </td>
                                    </tr>

                                    <tr>
                                        <td class="text-center border-b border-gray-100 dark:border-gray-700 py-12 px-5 min-w-[200px] text-slate-400">10:30AM - 11:30AM</td>
                                        <td class="p-3 border-b border-gray-100 dark:border-gray-700 min-w-[540px] py-12 px-5">
                                            <div class="flex items-center">
                                                <img src="assets-frontend/images/event/eve-sch/10.jpg" class="rounded-full size-24 shadow-md dark:shadow-gray-700" alt="">

                                                <div class="ms-4">
                                                    <a href="" class="hover:text-indigo-600 text-lg font-semibold">Conference On User Interface</a>
                                                    <p class="text-slate-400 mt-2">The most well-known dummy text is the 'Lorem Ipsum', which is said to have originated in the 16th century</p>
                                                </div>
                                            </div>
                                        </td>
                                        <td class="text-center border-b border-gray-100 dark:border-gray-700 py-12 px-5 min-w-[180px] text-slate-400">
                                            <span class="block">Speaker</span>
                                            <span class="block text-black dark:text-white text-md mt-1">Cindy Morrison</span>
                                        </td>
                                        <td class="text-end border-b border-gray-100 dark:border-gray-700 py-12 px-5 min-w-[180px]">
                                            <a href="" class="relative inline-block tracking-wide align-middle text-base text-center border-none after:content-[''] after:absolute after:h-px after:w-0 hover:after:w-full after:end-0 hover:after:end-auto after:bottom-0 after:start-0 after:duration-500 font-medium hover:text-indigo-600 after:bg-indigo-600 duration-500 ease-in-out">Buy Ticket <i class="uil uil-arrow-right"></i></a>
                                        </td>
                                    </tr>

                                    <tr>
                                        <td class="text-center border-b border-gray-100 dark:border-gray-700 py-12 px-5 min-w-[200px] text-slate-400">12:00PM - 01:00PM</td>
                                        <td class="p-3 border-b border-gray-100 dark:border-gray-700 min-w-[540px] py-12 px-5">
                                            <div class="flex items-center">
                                                <img src="assets-frontend/images/event/eve-sch/11.jpg" class="rounded-full size-24 shadow-md dark:shadow-gray-700" alt="">

                                                <div class="ms-4">
                                                    <a href="" class="hover:text-indigo-600 text-lg font-semibold">Business World Event Intro</a>
                                                    <p class="text-slate-400 mt-2">The most well-known dummy text is the 'Lorem Ipsum', which is said to have originated in the 16th century</p>
                                                </div>
                                            </div>
                                        </td>
                                        <td class="text-center border-b border-gray-100 dark:border-gray-700 py-12 px-5 min-w-[180px] text-slate-400">
                                            <span class="block">Speaker</span>
                                            <span class="block text-black dark:text-white text-md mt-1">Vincent Adams</span>
                                        </td>
                                        <td class="text-end border-b border-gray-100 dark:border-gray-700 py-12 px-5 min-w-[180px]">
                                            <a href="" class="relative inline-block tracking-wide align-middle text-base text-center border-none after:content-[''] after:absolute after:h-px after:w-0 hover:after:w-full after:end-0 hover:after:end-auto after:bottom-0 after:start-0 after:duration-500 font-medium hover:text-indigo-600 after:bg-indigo-600 duration-500 ease-in-out">Buy Ticket <i class="uil uil-arrow-right"></i></a>
                                        </td>
                                    </tr>

                                    <tr>
                                        <td class="text-center border-b border-gray-100 dark:border-gray-700 py-12 px-5 min-w-[200px] text-slate-400">02:00PM - 03:00PM</td>
                                        <td class="p-3 border-b border-gray-100 dark:border-gray-700 min-w-[540px] py-12 px-5">
                                            <div class="flex items-center">
                                                <img src="assets-frontend/images/event/eve-sch/12.jpg" class="rounded-full size-24 shadow-md dark:shadow-gray-700" alt="">

                                                <div class="ms-4">
                                                    <a href="" class="hover:text-indigo-600 text-lg font-semibold">Business Conference for professional</a>
                                                    <p class="text-slate-400 mt-2">The most well-known dummy text is the 'Lorem Ipsum', which is said to have originated in the 16th century</p>
                                                </div>
                                            </div>
                                        </td>
                                        <td class="text-center border-b border-gray-100 dark:border-gray-700 py-12 px-5 min-w-[180px] text-slate-400">
                                            <span class="block">Speaker</span>
                                            <span class="block text-black dark:text-white text-md mt-1">Ana Heweit</span>
                                        </td>
                                        <td class="text-end border-b border-gray-100 dark:border-gray-700 py-12 px-5 min-w-[180px]">
                                            <a href="" class="relative inline-block tracking-wide align-middle text-base text-center border-none after:content-[''] after:absolute after:h-px after:w-0 hover:after:w-full after:end-0 hover:after:end-auto after:bottom-0 after:start-0 after:duration-500 font-medium hover:text-indigo-600 after:bg-indigo-600 duration-500 ease-in-out">Buy Ticket <i class="uil uil-arrow-right"></i></a>
                                        </td>
                                    </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>

                    <div class="hidden" id="friday" role="tabpanel" aria-labelledby="friday-tab">
                        <div class="grid grid-cols-1">
                            <div class="relative overflow-x-auto block w-full bg-white dark:bg-slate-900">
                                <table class="w-full text-start">
                                    <tbody>
                                    <tr>
                                        <td class="text-center border-b border-gray-100 dark:border-gray-700 py-12 px-5 min-w-[200px] text-slate-400">09:00AM - 10:00AM</td>
                                        <td class="p-3 border-b border-gray-100 dark:border-gray-700 min-w-[540px] py-12 px-5">
                                            <div class="flex items-center">
                                                <img src="assets-frontend/images/event/eve-sch/5.jpg" class="rounded-full size-24 shadow-md dark:shadow-gray-700" alt="">

                                                <div class="ms-4">
                                                    <a href="" class="hover:text-indigo-600 text-lg font-semibold">Digital Conference Event Intro</a>
                                                    <p class="text-slate-400 mt-2">The most well-known dummy text is the 'Lorem Ipsum', which is said to have originated in the 16th century</p>
                                                </div>
                                            </div>
                                        </td>
                                        <td class="text-center border-b border-gray-100 dark:border-gray-700 py-12 px-5 min-w-[180px] text-slate-400">
                                            <span class="block">Speaker</span>
                                            <span class="block text-black dark:text-white text-md mt-1">Raymond Turner</span>
                                        </td>
                                        <td class="text-end border-b border-gray-100 dark:border-gray-700 py-12 px-5 min-w-[180px]">
                                            <a href="" class="relative inline-block tracking-wide align-middle text-base text-center border-none after:content-[''] after:absolute after:h-px after:w-0 hover:after:w-full after:end-0 hover:after:end-auto after:bottom-0 after:start-0 after:duration-500 font-medium hover:text-indigo-600 after:bg-indigo-600 duration-500 ease-in-out">Buy Ticket <i class="uil uil-arrow-right"></i></a>
                                        </td>
                                    </tr>

                                    <tr>
                                        <td class="text-center border-b border-gray-100 dark:border-gray-700 py-12 px-5 min-w-[200px] text-slate-400">10:30AM - 11:30AM</td>
                                        <td class="p-3 border-b border-gray-100 dark:border-gray-700 min-w-[540px] py-12 px-5">
                                            <div class="flex items-center">
                                                <img src="assets-frontend/images/event/eve-sch/6.jpg" class="rounded-full size-24 shadow-md dark:shadow-gray-700" alt="">

                                                <div class="ms-4">
                                                    <a href="" class="hover:text-indigo-600 text-lg font-semibold">Conference On User Interface</a>
                                                    <p class="text-slate-400 mt-2">The most well-known dummy text is the 'Lorem Ipsum', which is said to have originated in the 16th century</p>
                                                </div>
                                            </div>
                                        </td>
                                        <td class="text-center border-b border-gray-100 dark:border-gray-700 py-12 px-5 min-w-[180px] text-slate-400">
                                            <span class="block">Speaker</span>
                                            <span class="block text-black dark:text-white text-md mt-1">Cindy Morrison</span>
                                        </td>
                                        <td class="text-end border-b border-gray-100 dark:border-gray-700 py-12 px-5 min-w-[180px]">
                                            <a href="" class="relative inline-block tracking-wide align-middle text-base text-center border-none after:content-[''] after:absolute after:h-px after:w-0 hover:after:w-full after:end-0 hover:after:end-auto after:bottom-0 after:start-0 after:duration-500 font-medium hover:text-indigo-600 after:bg-indigo-600 duration-500 ease-in-out">Buy Ticket <i class="uil uil-arrow-right"></i></a>
                                        </td>
                                    </tr>

                                    <tr>
                                        <td class="text-center border-b border-gray-100 dark:border-gray-700 py-12 px-5 min-w-[200px] text-slate-400">12:00PM - 01:00PM</td>
                                        <td class="p-3 border-b border-gray-100 dark:border-gray-700 min-w-[540px] py-12 px-5">
                                            <div class="flex items-center">
                                                <img src="assets-frontend/images/event/eve-sch/7.jpg" class="rounded-full size-24 shadow-md dark:shadow-gray-700" alt="">

                                                <div class="ms-4">
                                                    <a href="" class="hover:text-indigo-600 text-lg font-semibold">Business World Event Intro</a>
                                                    <p class="text-slate-400 mt-2">The most well-known dummy text is the 'Lorem Ipsum', which is said to have originated in the 16th century</p>
                                                </div>
                                            </div>
                                        </td>
                                        <td class="text-center border-b border-gray-100 dark:border-gray-700 py-12 px-5 min-w-[180px] text-slate-400">
                                            <span class="block">Speaker</span>
                                            <span class="block text-black dark:text-white text-md mt-1">Vincent Adams</span>
                                        </td>
                                        <td class="text-end border-b border-gray-100 dark:border-gray-700 py-12 px-5 min-w-[180px]">
                                            <a href="" class="relative inline-block tracking-wide align-middle text-base text-center border-none after:content-[''] after:absolute after:h-px after:w-0 hover:after:w-full after:end-0 hover:after:end-auto after:bottom-0 after:start-0 after:duration-500 font-medium hover:text-indigo-600 after:bg-indigo-600 duration-500 ease-in-out">Buy Ticket <i class="uil uil-arrow-right"></i></a>
                                        </td>
                                    </tr>

                                    <tr>
                                        <td class="text-center border-b border-gray-100 dark:border-gray-700 py-12 px-5 min-w-[200px] text-slate-400">02:00PM - 03:00PM</td>
                                        <td class="p-3 border-b border-gray-100 dark:border-gray-700 min-w-[540px] py-12 px-5">
                                            <div class="flex items-center">
                                                <img src="assets-frontend/images/event/eve-sch/8.jpg" class="rounded-full size-24 shadow-md dark:shadow-gray-700" alt="">

                                                <div class="ms-4">
                                                    <a href="" class="hover:text-indigo-600 text-lg font-semibold">Business Conference for professional</a>
                                                    <p class="text-slate-400 mt-2">The most well-known dummy text is the 'Lorem Ipsum', which is said to have originated in the 16th century</p>
                                                </div>
                                            </div>
                                        </td>
                                        <td class="text-center border-b border-gray-100 dark:border-gray-700 py-12 px-5 min-w-[180px] text-slate-400">
                                            <span class="block">Speaker</span>
                                            <span class="block text-black dark:text-white text-md mt-1">Ana Heweit</span>
                                        </td>
                                        <td class="text-end border-b border-gray-100 dark:border-gray-700 py-12 px-5 min-w-[180px]">
                                            <a href="" class="relative inline-block tracking-wide align-middle text-base text-center border-none after:content-[''] after:absolute after:h-px after:w-0 hover:after:w-full after:end-0 hover:after:end-auto after:bottom-0 after:start-0 after:duration-500 font-medium hover:text-indigo-600 after:bg-indigo-600 duration-500 ease-in-out">Buy Ticket <i class="uil uil-arrow-right"></i></a>
                                        </td>
                                    </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div><!--end container-->
    </section><!--end section-->
    <!-- End -->

    <!-- Start CTA -->
    <section class="relative table w-full py-36 bg-[url('/assets-frontend/images/event/bg2.jpg')] bg-no-repeat bg-center bg-cover">
        <div class="absolute inset-0 bg-gradient-to-t from-indigo-600/90 to-fuchsia-600/90"></div>
        <div class="container relative">
            <div class="grid grid-cols-1 text-center">
                <a href="#!" data-type="youtube" data-id="S_CGed6E610" class="lightbox size-20 rounded-full shadow-lg dark:shadow-gray-800 inline-flex items-center justify-center bg-white dark:bg-slate-900 text-indigo-600 mx-auto mb-12">
                    <i class="mdi mdi-play inline-flex items-center justify-center text-2xl"></i>
                </a>

                <h3 class="mb-4 md:text-3xl md:leading-normal text-2xl leading-normal font-semibold text-white">Let's Make Something Together</h3>

                <p class="text-white/80 max-w-xl mx-auto">The Biggest Event Ever</p>


            </div><!--end grid-->
        </div><!--end container-->
    </section><!--end section-->
    <!-- End CTA -->

    <!-- Start -->
    <section class="relative md:py-24 py-16" id="ticket">
        <div class="container relative">
            <div class="grid lg:grid-cols-12 grid-cols-1 items-center gap-[30px]">
                <div class="lg:col-span-5">
                    <div class="lg:text-start text-center">
                        <h6 class="text-indigo-600 text-sm font-bold uppercase mb-2">Secure Your Place Now</h6>

                        <h3 class="mb-4 md:text-3xl md:leading-normal text-2xl leading-normal font-semibold">This event is for you. <br> Buy tickets now!</h3>

                        <p class="text-slate-400 max-w-xl mx-auto">Start working with Tailwind CSS that can provide everything you need to generate awareness, drive traffic, connect.</p>
                    </div>
                </div><!--end col-->

                <div class="lg:col-span-7 mt-8 lg:mt-0">
                    <div class="lg:ms-8">
                        <div class="grid md:grid-cols-2 grid-cols-1 md:gap-0 gap-[30px]">
                            <div class="group border-b-[3px] dark:border-gray-700 relative shadow dark:shadow-gray-800 rounded-md md:scale-110 z-3 bg-white dark:bg-slate-900">
                                <div class="p-6 py-8">
                                    <h6 class="font-bold uppercase mb-5 text-indigo-600">Personal</h6>

                                    <div class="flex mb-5">
                                        <span class="text-xl font-semibold">$</span>
                                        <span class="price text-4xl font-semibold mb-0">09</span>
                                        <span class="text-xl font-semibold self-end mb-1">/event</span>
                                    </div>

                                    <ul class="list-none text-slate-400">
                                        <li class="mb-1 flex"><i class="uil uil-check-circle text-indigo-600 text-xl me-2"></i> Full Access</li>
                                        <li class="mb-1 flex"><i class="uil uil-check-circle text-indigo-600 text-xl me-2"></i> Source Files</li>
                                        <li class="mb-1 flex"><i class="uil uil-check-circle text-indigo-600 text-xl me-2"></i> Free Appointments</li>
                                        <li class="mb-1 flex"><i class="uil uil-check-circle text-indigo-600 text-xl me-2"></i> Enhanced Security</li>
                                    </ul>
                                    <a href="" class="py-2 px-5 inline-block font-semibold tracking-wide border align-middle duration-500 text-base text-center bg-indigo-600 hover:bg-indigo-700 border-indigo-600 hover:border-indigo-700 text-white rounded-md mt-5">Get Started</a>
                                </div>
                            </div>

                            <div class="group border-b-[3px] dark:border-gray-700 relative shadow dark:shadow-gray-800 rounded-md z-2 bg-gray-50 dark:bg-slate-800">
                                <div class="p-6 py-8 md:ps-10">
                                    <h6 class="font-bold uppercase mb-5 text-indigo-600">Business</h6>

                                    <div class="flex mb-5">
                                        <span class="text-xl font-semibold">$</span>
                                        <span class="price text-4xl font-semibold mb-0">149</span>
                                        <span class="text-xl font-semibold self-end mb-1">/event</span>
                                    </div>

                                    <ul class="list-none text-slate-400">
                                        <li class="mb-1 flex"><i class="uil uil-check-circle text-indigo-600 text-xl me-2"></i> Full Access</li>
                                        <li class="mb-1 flex"><i class="uil uil-check-circle text-indigo-600 text-xl me-2"></i> Source Files</li>
                                        <li class="mb-1 flex"><i class="uil uil-check-circle text-indigo-600 text-xl me-2"></i> Free Appointments</li>
                                        <li class="mb-1 flex"><i class="uil uil-check-circle text-indigo-600 text-xl me-2"></i> Enhanced Security</li>
                                    </ul>
                                    <a href="" class="py-2 px-5 inline-block font-semibold tracking-wide border align-middle duration-500 text-base text-center bg-indigo-600 hover:bg-indigo-700 border-indigo-600 hover:border-indigo-700 text-white rounded-md mt-5">Try it Now</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div><!--end col-->
            </div><!--end grid-->
        </div><!--end container-->

        <div class="container relative md:mt-24 mt-16">
            <div class="grid md:grid-cols-12 grid-cols-1 items-center">
                <div class="md:col-span-6">
                    <h6 class="text-indigo-600 text-sm font-bold uppercase mb-2">Blogs</h6>
                    <h3 class="mb-4 md:text-3xl md:leading-normal text-2xl leading-normal font-semibold">Reads Our Latest <br> News & Blog</h3>
                </div>

                <div class="md:col-span-6">
                    <p class="text-slate-400 max-w-xl">Start working with Techwind that can provide everything you need to generate awareness, drive traffic, connect.</p>
                </div>
            </div><!--end grid-->

            <div class="grid grid-cols-1 lg:grid-cols-3 md:grid-cols-2 mt-8 gap-[30px]">
                <div class="blog relative rounded-md shadow dark:shadow-gray-800 overflow-hidden">
                    <img src="assets-frontend/images/blog/01.jpg" alt="">

                    <div class="content p-6">
                        <a href="blog-detail.html" class="title h5 text-lg font-medium hover:text-indigo-600 duration-500 ease-in-out">Design your apps in your own way</a>
                        <p class="text-slate-400 mt-3">The phrasal sequence of the is now so that many campaign and benefit</p>

                        <div class="mt-4">
                            <a href="blog-detail.html" class="relative inline-block tracking-wide align-middle text-base text-center border-none after:content-[''] after:absolute after:h-px after:w-0 hover:after:w-full after:end-0 hover:after:end-auto after:bottom-0 after:start-0 after:duration-500 font-normal hover:text-indigo-600 after:bg-indigo-600 duration-500 ease-in-out">Read More <i class="uil uil-arrow-right"></i></a>
                        </div>
                    </div>
                </div>

                <div class="blog relative rounded-md shadow dark:shadow-gray-800 overflow-hidden">
                    <img src="assets-frontend/images/blog/02.jpg" alt="">

                    <div class="content p-6">
                        <a href="blog-detail.html" class="title h5 text-lg font-medium hover:text-indigo-600 duration-500 ease-in-out">How apps is changing the IT world</a>
                        <p class="text-slate-400 mt-3">The phrasal sequence of the is now so that many campaign and benefit</p>

                        <div class="mt-4">
                            <a href="blog-detail.html" class="relative inline-block tracking-wide align-middle text-base text-center border-none after:content-[''] after:absolute after:h-px after:w-0 hover:after:w-full after:end-0 hover:after:end-auto after:bottom-0 after:start-0 after:duration-500 font-normal hover:text-indigo-600 after:bg-indigo-600 duration-500 ease-in-out">Read More <i class="uil uil-arrow-right"></i></a>
                        </div>
                    </div>
                </div>

                <div class="blog relative rounded-md shadow dark:shadow-gray-800 overflow-hidden">
                    <img src="assets-frontend/images/blog/03.jpg" alt="">

                    <div class="content p-6">
                        <a href="blog-detail.html" class="title h5 text-lg font-medium hover:text-indigo-600 duration-500 ease-in-out">Smartest Applications for Business</a>
                        <p class="text-slate-400 mt-3">The phrasal sequence of the is now so that many campaign and benefit</p>

                        <div class="mt-4">
                            <a href="blog-detail.html" class="relative inline-block tracking-wide align-middle text-base text-center border-none after:content-[''] after:absolute after:h-px after:w-0 hover:after:w-full after:end-0 hover:after:end-auto after:bottom-0 after:start-0 after:duration-500 font-normal hover:text-indigo-600 after:bg-indigo-600 duration-500 ease-in-out">Read More <i class="uil uil-arrow-right"></i></a>
                        </div>
                    </div>
                </div>
            </div><!--end grid-->
        </div><!--end container-->
    </section><!--end section-->
    <!-- End -->
    <!-- End -->
</x-landing-layout>

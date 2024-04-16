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
    <section class="relative table w-full py-36 bg-center bg-no-repeat bg-cover" style="background-image: url({{ asset('assets-frontend/images/event/bg3.jpg') }})">
        <div class="absolute inset-0 bg-black opacity-75"></div>
        <div class="container relative">
            <div class="grid grid-cols-1 pb-8 text-center mt-10">
                <h3 class="md:text-4xl text-3xl md:leading-normal tracking-wide leading-normal font-medium text-white">{{ $event->name }}</h3>

                @if($event->description)
                    <p class="mt-5 text-slate-200 w-full mx-auto">{{ $event->description }}</p>
                @endif
            </div><!--end grid-->
        </div><!--end container-->

        <div class="absolute text-center z-10 bottom-5 start-0 end-0 mx-3">
            <ul class="tracking-[0.5px] mb-0 inline-block">
                <li class="inline-block uppercase text-[16px] font-bold duration-500 ease-in-out text-white">{{ $event->start_date->format('Y-m-d') }}</li>
                <li class="inline-block text-base text-white/50 mx-0.5 ltr:rotate-0 rtl:rotate-180"><i class="uil uil-angle-right-b"></i></li>
                <li class="inline-block uppercase text-[16px] font-bold duration-500 ease-in-out text-white">{{ $event->start_date->format('Y-m-d') }}</li>
            </ul>
        </div>
    </section><!--end section-->
    <div class="relative">
        <div class="shape absolute sm:-bottom-px -bottom-[2px] start-0 end-0 overflow-hidden z-1 text-white dark:text-slate-900">
            <svg class="w-full h-auto scale-[2.0] origin-top" viewBox="0 0 2880 48" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M0 48H1437.5H2880V0H2160C1442.5 52 720 0 720 0H0V48Z" fill="currentColor"></path>
            </svg>
        </div>
    </div>
    <!-- End Hero -->

    <!-- Start Section for SECTIONS-->
    <section class="relative md:pt-24 pt-16">
        <div class="container relative">
            <div class="grid grid-cols-1 lg:grid-cols-3 md:grid-cols-2 gap-[30px]">
                <div class="text-center px-6 mt-6">
                    @if($event->venue->phone || $event->venue->mobile)
                        <div class="size-20 bg-indigo-600/5 text-indigo-600 rounded-xl text-3xl flex align-middle justify-center items-center shadow-sm dark:shadow-gray-800 mx-auto">
                            <i class="uil uil-phone"></i>
                        </div>
                        <div class="content mt-7">
                            <h5 class="title h5 text-xl font-medium">Phone</h5>
                            @if($event->venue->phone)
                                <div class="mt-5">
                                    <a href="tel:{{ $event->venue->phone }}" class="relative inline-block font-semibold tracking-wide align-middle text-base text-center border-none after:content-[''] after:absolute after:h-px after:w-0 hover:after:w-full after:end-0 hover:after:end-auto after:bottom-0 after:start-0 after:duration-500 text-indigo-600 hover:text-indigo-600 after:bg-indigo-600 duration-500 ease-in-out">{{ $event->venue->phone }}</a>
                                </div>
                            @endif
                            @if($event->venue->mobile)
                                <div class="mt-2">
                                    <a href="tel:{{ $event->venue->mobile }}" class="relative inline-block font-semibold tracking-wide align-middle text-base text-center border-none after:content-[''] after:absolute after:h-px after:w-0 hover:after:w-full after:end-0 hover:after:end-auto after:bottom-0 after:start-0 after:duration-500 text-indigo-600 hover:text-indigo-600 after:bg-indigo-600 duration-500 ease-in-out">{{ $event->venue->mobile }}</a>
                                </div>
                            @endif
                        </div>
                    @endif
                </div>

                <div class="text-center px-6 mt-6">
                    <div class="size-20 bg-indigo-600/5 text-indigo-600 rounded-xl text-3xl flex align-middle justify-center items-center shadow-sm dark:shadow-gray-800 mx-auto">
                        <i class="uil uil-map-marker"></i>
                    </div>

                    <div class="content mt-7">
                        <h5 class="title h5 text-xl font-medium">Location</h5>
                        <p class="text-slate-400 mt-5">{{ $event->venue->name }}</p>
                        <p class="text-slate-400 -mt-2">{{ $event->venue->address }}, {{ $event->venue->location }} - {{ $event->venue->postcode }}</p>
                    </div>
                </div>

                @if($event->venue->email)
                    <div class="text-center px-6 mt-6">
                        <div class="size-20 bg-indigo-600/5 text-indigo-600 rounded-xl text-3xl flex align-middle justify-center items-center shadow-sm dark:shadow-gray-800 mx-auto">
                            <i class="uil uil-envelope"></i>
                        </div>

                        <div class="content mt-7">
                            <h5 class="title h5 text-xl font-medium">Email</h5>
                            <div class="mt-5">
                                <a href="mailto:{{ $event->venue->email }}" class="relative inline-block font-semibold tracking-wide align-middle text-base text-center border-none after:content-[''] after:absolute after:h-px after:w-0 hover:after:w-full after:end-0 hover:after:end-auto after:bottom-0 after:start-0 after:duration-500 text-indigo-600 hover:text-indigo-600 after:bg-indigo-600 duration-500 ease-in-out">{{ $event->venue->email }}</a>
                            </div>
                        </div>
                    </div>
                @endif
            </div><!--end grid-->
        </div><!--end container-->
    </section><!--end section-->
    <!-- End Section-->

    <!-- Start -->
    <section class="relative md:py-12 py-8">
        <div class="container relative">
            <div class="mt-4 -mb-4 grid grid-cols-1 pb-8 text-center">
                <h3 class="md:text-3xl md:leading-normal text-2xl leading-normal font-semibold">{{ __('Sessions') }}</h3>
            </div><!--end grid-->

            <form method="POST" action="{{ route('access-tickets.store') }}">
                @csrf

                <div class="grid grid-cols-1">
                    <div class="mt-1 mb-12">
                        <div class="grid grid-cols-1">
                            <div class="relative overflow-x-auto bg-white dark:bg-slate-900">
                                <table class="w-full text-start">
                                    <tbody>
                                    @foreach($sessionTickets as $sessionTicket)
                                        <tr wire:key="{{ $sessionTicket->id }}">
                                            <td class="text-center border-b border-gray-100 dark:border-gray-700 py-12 px-5 min-w-[200px] text-slate-400">
                                                {{ $sessionTicket->eventSession->start_date->format('Y-m-d') }}<br />
                                                <i class="uil uil-angle-right-b"></i><br />
                                                {{ $sessionTicket->eventSession->end_date->format('Y-m-d') }}
                                            </td>
                                            <td class="p-3 border-b border-gray-100 dark:border-gray-700 min-w-[540px] py-12 px-5">
                                                <div class="flex items-center">
                                                    <div class="ms-4">
                                                        <p class="text-lg font-semibold">{{ $sessionTicket->eventSession->name }}</p>
                                                        @if($sessionTicket->eventSession->description)
                                                            <p class="text-slate-400 -mt-2">{{ $sessionTicket->eventSession->description }}</p>
                                                        @endif
                                                    </div>
                                                </div>
                                            </td>
                                            <td class="text-center border-b border-gray-100 dark:border-gray-700 py-12 px-5 min-w-[180px] text-slate-400">
                                                <span class="block">{{ $sessionTicket->ticket->name }}</span>
                                                <span class="block text-black dark:text-white text-md mt-1">{{ $sessionTicket->ticket->price }} ({{ $sessionTicket->ticket->currency }})</span>
                                            </td>
                                            @if($sessionTicket->isSoldOut)
                                                <td class="text-center border-b border-gray-100 dark:border-gray-700 py-12 px-5 min-w-[180px]">
                                                    <p class="text-lg font-semibold tracking-wider">SOLD OUT</p>
                                                </td>
                                            @else
                                                <td class="text-center border-b border-gray-100 dark:border-gray-700 py-12 px-5 min-w-[180px]">
                                                    <input name="tickets[{{ $sessionTicket->id }}]" type="number" class="w-20 h-10 border bg-transparent border-primary dark:border-primary rounded-md text-center" value="{{ old('tickets[' . $sessionTicket->id . ']', 0) }}" min="0" max="{{ $sessionTicket->ticket->max_tickets_per_order > 0 ? $sessionTicket->ticket->max_tickets_per_order : 99 }}">
                                                </td>
                                            @endif
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                                @error('tickets')
                                    <div class="mt-2 text-red-500">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                    </div>
                </div>
                <div class="flex flex-col gap-4 mb-24 xl:mb-32">
                    <h1 class="my-4 text-center tracking-wide font-semibold text-lg">{{ __('Billing information') }}</h1>
                    <div class="flex flex-row items-center justify-between gap-4">
                        <div class="mb-3 w-full flex flex-col">
                            <x-base.form-label :tw-merge="false"
                                               for="description">{{ \App\Models\EventSession::getAttributeLabelStatic('name') }}</x-base.form-label>
                            <input value="{{ old('name', '') }}" name="name" type="text" placeholder="{{ \App\Models\EventSession::getAttributeLabelStatic('name') }}" class="w-full h-10 bg-transparent border border-primary dark:border-primary rounded-md p-2" required>
                            @error('name')
                                <div class="mt-2 text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="mb-3 w-full flex flex-col">
                            <x-base.form-label :tw-merge="false"
                                               for="description">{{ \App\Models\Venue::getAttributeLabelStatic('email') }}</x-base.form-label>
                            <input value="{{ old('email', '') }}" name="email" type="email" placeholder="{{ \App\Models\Venue::getAttributeLabelStatic('email') }}" class="w-full h-10 bg-transparent border border-primary dark:border-primary rounded-md p-2" required>
                        </div>
                    </div>
                    <div class="w-full flex flex-col justify-between">
                        <x-base.form-label :tw-merge="false"
                                           for="phone">{{ \App\Models\Venue::getAttributeLabelStatic('phone') }}</x-base.form-label>
                        <x-base.form-phone value="{{ old('phone', '') }}" id="phone" name="phone" placeholder="{{ \App\Models\Venue::getAttributeLabelStatic('phone') }}" class="w-1/2 h-10 bg-transparent border border-primary dark:border-primary rounded-md p-2" />
                    </div>
                    <div class="flex flex-col items-end">
                        <input type="hidden" name="event_id" value="{{ $event->id }}">
                        <x-frontend.button type="submit" class=" w-1/2 hover:text-indigo-600 after:bg-indigo-600 duration-500 ease-in-out">{{ __('Buy tickets') }}</x-frontend.button>
                    </div>
                </div>
            </form>
        </div><!--end container-->
    </section><!--end section-->
</x-landing-layout>

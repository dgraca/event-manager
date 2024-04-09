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
                        <h4 class="font-semibold lg:leading-normal leading-normal text-4xl lg:text-5xl mb-5 text-black dark:text-white">Our Creativity Is Your <span class="text-indigo-600">Success</span></h4>
                        <p class="text-slate-400 text-lg max-w-xl">Launch your campaign and benefit from our expertise on designing and managing conversion centered Tailwind CSS v3.x html page.</p>

                        <div class="mt-6">
                            <a href="/" class="py-2 px-5 inline-block font-semibold tracking-wide border align-middle duration-500 text-base text-center bg-indigo-600 hover:bg-indigo-700 border-indigo-600 hover:border-indigo-700 text-white rounded-md me-2 mt-2"><i class="uil uil-envelope"></i> Get Started</a>
                            <a href="/" class="py-2 px-5 inline-block font-semibold tracking-wide border align-middle duration-500 text-base text-center bg-transparent hover:bg-indigo-600 border-indigo-600 text-indigo-600 hover:text-white rounded-md mt-2"><i class="uil uil-book-alt"></i> Documentation</a>
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

    <!-- Business Partner -->
    <section class="py-6 border-t border-b border-gray-100 dark:border-gray-700">
        <div class="container relative">
            <div class="grid md:grid-cols-6 grid-cols-2 justify-center gap-[30px]">
                <div class="mx-auto py-4">
                    <img src="/assets-frontend/images/client/amazon.svg" class="h-6" alt="">
                </div>

                <div class="mx-auto py-4">
                    <img src="/assets-frontend/images/client/google.svg" class="h-6" alt="">
                </div>

                <div class="mx-auto py-4">
                    <img src="/assets-frontend/images/client/lenovo.svg" class="h-6" alt="">
                </div>

                <div class="mx-auto py-4">
                    <img src="/assets-frontend/images/client/paypal.svg" class="h-6" alt="">
                </div>

                <div class="mx-auto py-4">
                    <img src="/assets-frontend/images/client/shopify.svg" class="h-6" alt="">
                </div>

                <div class="mx-auto py-4">
                    <img src="/assets-frontend/images/client/spotify.svg" class="h-6" alt="">
                </div>
            </div><!--end grid-->
        </div><!--end container-->
    </section><!--end section-->
    <!-- Business Partner -->

    <!-- Start -->
    <section class="relative md:py-24 py-16 bg-gray-50 dark:bg-slate-800">
        <div class="container relative">
            <div class="grid grid-cols-1 pb-8 text-center">
                <h3 class="mb-6 md:text-3xl text-2xl md:leading-normal leading-normal font-semibold">How It Work ?</h3>

                <p class="text-slate-400 max-w-xl mx-auto">Start working with Tailwind CSS that can provide everything you need to generate awareness, drive traffic, connect.</p>
            </div><!--end grid-->

            <div class="grid lg:grid-cols-12 md:grid-cols-2 grid-cols-1 items-center mt-10 gap-[30px]">
                <div class="lg:col-span-5">
                    <img src="/assets-frontend/images/illustrator/SEO_SVG.svg" alt="">
                </div>
                <div class="lg:col-span-7">
                    <div class="lg:ms-10">
                        <h3 class="mb-6 md:text-3xl text-2xl md:leading-normal leading-normal font-semibold">Change the way you build websites</h3>
                        <p class="text-slate-400 max-w-xl">You can combine all the Techwind templates into a single one, you can take a component from the Application theme and use it in the Website.</p>

                        <ul class="list-none text-slate-400 mt-4">
                            <li class="mb-1 flex"><i class="uil uil-check-circle text-indigo-600 text-xl me-2"></i> Digital Marketing Solutions for Tomorrow</li>
                            <li class="mb-1 flex"><i class="uil uil-check-circle text-indigo-600 text-xl me-2"></i> Our Talented & Experienced Marketing Agency</li>
                            <li class="mb-1 flex"><i class="uil uil-check-circle text-indigo-600 text-xl me-2"></i> Create your own skin to match your brand</li>
                        </ul>

                        <div class="mt-4">
                            <a href="/" class="relative inline-block font-semibold tracking-wide align-middle text-base text-center border-none after:content-[''] after:absolute after:h-px after:w-0 hover:after:w-full after:end-0 hover:after:end-auto after:bottom-0 after:start-0 after:duration-500 text-indigo-600 hover:text-indigo-600 after:bg-indigo-600 duration-500 ease-in-out">Find Out More <i class="uil uil-angle-right-b align-middle"></i></a>
                        </div>
                    </div>
                </div>
            </div><!--end grid-->
        </div><!--end container-->

        <div class="container relative md:mt-24 mt-16">
            <div class="grid lg:grid-cols-12 md:grid-cols-2 grid-cols-1 items-center mt-10 gap-[30px]">
                <div class="lg:col-span-5 md:order-2 order-1">
                    <div class="lg:ms-10">
                        <div class="bg-white dark:bg-slate-900 p-6 rounded-md shadow dark:shadow-gray-800">
                            <img src="/assets-frontend/images/illustrator/Mobile_notification_SVG.svg" alt="">

                            <div class="mt-8">
                                <form>
                                    <div class="grid grid-cols-1">
                                        <div class="mb-5">
                                            <label class="form-label font-medium">Your Name : <span class="text-red-600">*</span></label>
                                            <div class="form-icon relative mt-2">
                                                <i data-feather="user" class="size-4 absolute top-3 start-4"></i>
                                                <input type="text" class="form-input ps-12 w-full py-2 px-3 h-10 bg-transparent dark:bg-slate-900 dark:text-slate-200 rounded outline-none border border-gray-200 focus:border-indigo-600 dark:border-gray-800 dark:focus:border-indigo-600 focus:ring-0" placeholder="Name" name="name" required="">
                                            </div>
                                        </div>

                                        <div class="mb-5">
                                            <label class="form-label font-medium">Your Email : <span class="text-red-600">*</span></label>
                                            <div class="form-icon relative mt-2">
                                                <i data-feather="mail" class="size-4 absolute top-3 start-4"></i>
                                                <input type="email" class="form-input ps-12 w-full py-2 px-3 h-10 bg-transparent dark:bg-slate-900 dark:text-slate-200 rounded outline-none border border-gray-200 focus:border-indigo-600 dark:border-gray-800 dark:focus:border-indigo-600 focus:ring-0" placeholder="Email" name="email" required="">
                                            </div>
                                        </div>

                                        <div class="mb-5">
                                            <label class="form-label font-medium">Enter Password : <span class="text-red-600">*</span></label>
                                            <div class="form-icon relative mt-2">
                                                <i data-feather="key" class="size-4 absolute top-3 start-4"></i>
                                                <input type="password" class="form-input ps-12 w-full py-2 px-3 h-10 bg-transparent dark:bg-slate-900 dark:text-slate-200 rounded outline-none border border-gray-200 focus:border-indigo-600 dark:border-gray-800 dark:focus:border-indigo-600 focus:ring-0" placeholder="Password" required="">
                                            </div>
                                        </div>

                                        <div class="">
                                            <button class="py-2 px-5 inline-block tracking-wide border align-middle duration-500 text-base text-center bg-indigo-600 hover:bg-indigo-700 border-indigo-600 hover:border-indigo-700 text-white rounded-md w-full">Download</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="lg:col-span-7 md:order-1 order-2">
                    <h3 class="mb-6 md:text-3xl text-2xl md:leading-normal leading-normal font-semibold">Speed up your development <br> with <span class="text-indigo-600">Techwind.</span></h3>
                    <p class="text-slate-400 max-w-xl">You can combine all the Techwind templates into a single one, you can take a component from the Application theme and use it in the Website.</p>

                    <ul class="list-none text-slate-400 mt-4">
                        <li class="mb-1 flex"><i class="uil uil-check-circle text-indigo-600 text-xl me-2"></i> Digital Marketing Solutions for Tomorrow</li>
                        <li class="mb-1 flex"><i class="uil uil-check-circle text-indigo-600 text-xl me-2"></i> Our Talented & Experienced Marketing Agency</li>
                        <li class="mb-1 flex"><i class="uil uil-check-circle text-indigo-600 text-xl me-2"></i> Create your own skin to match your brand</li>
                    </ul>

                    <div class="mt-4">
                        <a href="/" class="relative inline-block font-semibold tracking-wide align-middle text-base text-center border-none after:content-[''] after:absolute after:h-px after:w-0 hover:after:w-full after:end-0 hover:after:end-auto after:bottom-0 after:start-0 after:duration-500 text-indigo-600 hover:text-indigo-600 after:bg-indigo-600 duration-500 ease-in-out">Find Out More <i class="uil uil-angle-right-b align-middle"></i></a>
                    </div>
                </div>
            </div><!--end grid-->
        </div><!--end container-->
    </section><!--end section-->
    <!-- End -->

    <!-- Start -->
    <section class="relative md:py-24 py-16">
        <div class="container relative">
            <div class="grid grid-cols-1 pb-8 text-center">
                <h6 class="mb-4 text-base font-medium text-indigo-600">We believe in building each other and hence</h6>
                <h3 class="mb-6 md:text-3xl text-2xl md:leading-normal leading-normal font-semibold">Work with some amazing partners</h3>

                <p class="text-slate-400 max-w-xl mx-auto">Start working with Tailwind CSS that can provide everything you need to generate awareness, drive traffic, connect.</p>
            </div><!--end grid-->

            <div class="grid relative grid-cols-1 mt-8">
                <div class="tiny-two-item">
                    <div class="tiny-slide">
                        <div class="lg:flex p-6 lg:p-0 relative rounded-md shadow dark:shadow-gray-800 overflow-hidden m-2">
                            <img class="size-24 lg:w-48 lg:h-auto lg:rounded-none rounded-full mx-auto" src="/assets-frontend/images/client/01.jpg" alt="" width="384" height="512">
                            <div class="pt-6 lg:p-6 text-center lg:text-start space-y-4">
                                <p class="text-base text-slate-400"> " It seems that only fragments of the original text remain in the Lorem Ipsum texts used today. " </p>

                                <div>
                                    <span class="text-indigo-600 block mb-1">Thomas Israel</span>
                                    <span class="text-slate-400 text-sm dark:text-white/60 block">Staff Engineer, Algolia</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="tiny-slide">
                        <div class="lg:flex p-6 lg:p-0 relative rounded-md shadow dark:shadow-gray-800 overflow-hidden m-2">
                            <img class="size-24 lg:w-48 lg:h-auto lg:rounded-none rounded-full mx-auto" src="/assets-frontend/images/client/02.jpg" alt="" width="384" height="512">
                            <div class="pt-6 lg:p-6 text-center lg:text-start space-y-4">
                                <p class="text-base text-slate-400"> " The most well-known dummy text is the 'Lorem Ipsum', which is said to have originated in the 16th century. " </p>

                                <div>
                                    <span class="text-indigo-600 block mb-1">Carl Oliver</span>
                                    <span class="text-slate-400 text-sm dark:text-white/60 block">Staff Engineer, Algolia</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="tiny-slide">
                        <div class="lg:flex p-6 lg:p-0 relative rounded-md shadow dark:shadow-gray-800 overflow-hidden m-2">
                            <img class="size-24 lg:w-48 lg:h-auto lg:rounded-none rounded-full mx-auto" src="/assets-frontend/images/client/03.jpg" alt="" width="384" height="512">
                            <div class="pt-6 lg:p-6 text-center lg:text-start space-y-4">
                                <p class="text-base text-slate-400"> " One disadvantage of Lorum Ipsum is that in Latin certain letters appear more frequently than others. " </p>

                                <div>
                                    <span class="text-indigo-600 block mb-1">Barbara McIntosh</span>
                                    <span class="text-slate-400 text-sm dark:text-white/60 block">Staff Engineer, Algolia</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="tiny-slide">
                        <div class="lg:flex p-6 lg:p-0 relative rounded-md shadow dark:shadow-gray-800 overflow-hidden m-2">
                            <img class="size-24 lg:w-48 lg:h-auto lg:rounded-none rounded-full mx-auto" src="/assets-frontend/images/client/04.jpg" alt="" width="384" height="512">
                            <div class="pt-6 lg:p-6 text-center lg:text-start space-y-4">
                                <p class="text-base text-slate-400"> " Thus, Lorem Ipsum has only limited suitability as a visual filler for German texts. " </p>

                                <div>
                                    <span class="text-indigo-600 block mb-1">Jill Webb</span>
                                    <span class="text-slate-400 text-sm dark:text-white/60 block">Staff Engineer, Algolia</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="tiny-slide">
                        <div class="lg:flex p-6 lg:p-0 relative rounded-md shadow dark:shadow-gray-800 overflow-hidden m-2">
                            <img class="size-24 lg:w-48 lg:h-auto lg:rounded-none rounded-full mx-auto" src="/assets-frontend/images/client/05.jpg" alt="" width="384" height="512">
                            <div class="pt-6 lg:p-6 text-center lg:text-start space-y-4">
                                <p class="text-base text-slate-400"> " One disadvantage of Lorum Ipsum is that in Latin certain letters appear more frequently than others. " </p>

                                <div>
                                    <span class="text-indigo-600 block mb-1">Barbara McIntosh</span>
                                    <span class="text-slate-400 text-sm dark:text-white/60 block">Staff Engineer, Algolia</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="tiny-slide">
                        <div class="lg:flex p-6 lg:p-0 relative rounded-md shadow dark:shadow-gray-800 overflow-hidden m-2">
                            <img class="size-24 lg:w-48 lg:h-auto lg:rounded-none rounded-full mx-auto" src="/assets-frontend/images/client/06.jpg" alt="" width="384" height="512">
                            <div class="pt-6 lg:p-6 text-center lg:text-start space-y-4">
                                <p class="text-base text-slate-400"> " Thus, Lorem Ipsum has only limited suitability as a visual filler for German texts. " </p>

                                <div>
                                    <span class="text-indigo-600 block mb-1">Jill Webb</span>
                                    <span class="text-slate-400 text-sm dark:text-white/60 block">Staff Engineer, Algolia</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div><!--end grid-->
        </div><!--end container-->

        <div class="container relative md:mt-24 mt-16">
            <div class="grid lg:grid-cols-12 grid-cols-1 items-center gap-[30px]">
                <div class="lg:col-span-5">
                    <div class="lg:text-start text-center">
                        <h3 class="mb-6 md:text-3xl text-2xl md:leading-normal leading-normal font-semibold">Our Comfortable Rates</h3>

                        <p class="text-slate-400 max-w-xl mx-auto">Start working with Tailwind CSS that can provide everything you need to generate awareness, drive traffic, connect.</p>

                        <div class="mt-6">
                            <a href="/" class="py-2 px-5 inline-block font-semibold tracking-wide border align-middle duration-500 text-base text-center bg-indigo-600 hover:bg-indigo-700 border-indigo-600 hover:border-indigo-700 text-white rounded-md me-2 mt-2"><i class="uil uil-master-card"></i> Subscribe Now</a>
                        </div>
                    </div>
                </div><!--end col-->

                <div class="lg:col-span-7 mt-8 lg:mt-0">
                    <div class="lg:ms-8">
                        <div class="grid md:grid-cols-2 grid-cols-1 md:gap-0 gap-[30px]">
                            <div class="group border-b-[3px] dark:border-gray-700 relative shadow dark:shadow-gray-800 rounded-md md:scale-110 z-3 bg-white dark:bg-slate-900">
                                <div class="p-6 py-8">
                                    <h6 class="font-bold uppercase mb-5 text-indigo-600">Starter</h6>

                                    <div class="flex mb-5">
                                        <span class="text-xl font-semibold">$</span>
                                        <span class="price text-4xl font-semibold mb-0">39</span>
                                        <span class="text-xl font-semibold self-end mb-1">/mo</span>
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
                                    <h6 class="font-bold uppercase mb-5 text-indigo-600">Professional</h6>

                                    <div class="flex mb-5">
                                        <span class="text-xl font-semibold">$</span>
                                        <span class="price text-4xl font-semibold mb-0">59</span>
                                        <span class="text-xl font-semibold self-end mb-1">/mo</span>
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
    </section><!--end section-->
    <div class="relative">
        <div class="shape absolute sm:-bottom-px -bottom-[2px] start-0 end-0 overflow-hidden z-1 text-gray-50 dark:text-slate-800">
            <svg class="w-full h-auto scale-[2.0] origin-top" viewBox="0 0 2880 250" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M720 125L2160 0H2880V250H0V125H720Z" fill="currentColor"></path>
            </svg>
        </div>
    </div>
    <!-- End -->

    <!-- Start -->
    <section class="relative md:py-24 py-16 bg-gray-50 dark:bg-slate-800">
        <div class="container relative">
            <div class="grid md:grid-cols-2 grid-cols-1 gap-[30px]">
                <div class="flex">
                    <i data-feather="help-circle" class="fea icon-ex-md text-indigo-600 me-3"></i>
                    <div class="flex-1">
                        <h5 class="mb-2 text-xl font-semibold">How our <span class="text-indigo-600">Techwind</span> work ?</h5>
                        <p class="text-slate-400">Due to its widespread use as filler text for layouts, non-readability is of great importance: human perception is tuned to recognize certain patterns and repetitions in texts.</p>
                    </div>
                </div>

                <div class="flex">
                    <i data-feather="help-circle" class="fea icon-ex-md text-indigo-600 me-3"></i>
                    <div class="flex-1">
                        <h5 class="mb-2 text-xl font-semibold"> What is the main process open account ?</h5>
                        <p class="text-slate-400">If the distribution of letters and 'words' is random, the reader will not be distracted from making a neutral judgement on the visual impact</p>
                    </div>
                </div>

                <div class="flex">
                    <i data-feather="help-circle" class="fea icon-ex-md text-indigo-600 me-3"></i>
                    <div class="flex-1">
                        <h5 class="mb-2 text-xl font-semibold"> How to make unlimited data entry ?</h5>
                        <p class="text-slate-400">Furthermore, it is advantageous when the dummy text is relatively realistic so that the layout impression of the final publication is not compromised.</p>
                    </div>
                </div>

                <div class="flex">
                    <i data-feather="help-circle" class="fea icon-ex-md text-indigo-600 me-3"></i>
                    <div class="flex-1">
                        <h5 class="mb-2 text-xl font-semibold"> Is <span class="text-indigo-600">Techwind</span> safer to use with my account ?</h5>
                        <p class="text-slate-400">The most well-known dummy text is the 'Lorem Ipsum', which is said to have originated in the 16th century. Lorem Ipsum is composed in a pseudo-Latin language which more or less corresponds to 'proper' Latin.</p>
                    </div>
                </div>
            </div><!--end grid-->
        </div><!--end container-->

        <div class="container relative md:mt-24 mt-16 md:mb-12">
            <div class="grid grid-cols-1 text-center">
                <h3 class="mb-6 md:text-3xl text-2xl md:leading-normal leading-normal font-semibold">Have Question ? Get in touch!</h3>

                <p class="text-slate-400 max-w-xl mx-auto">Start working with Tailwind CSS that can provide everything you need to generate awareness, drive traffic, connect.</p>

                <div class="mt-6">
                    <a href="/" class="py-2 px-5 inline-block font-semibold tracking-wide border align-middle duration-500 text-base text-center bg-indigo-600 hover:bg-indigo-700 border-indigo-600 hover:border-indigo-700 text-white rounded-md mt-4"><i class="uil uil-phone"></i> Contact us</a>
                </div>
            </div><!--end grid-->
        </div><!--end container-->
    </section><!--end section-->
    <!-- End -->
</x-landing-layout>

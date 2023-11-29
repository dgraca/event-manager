<!-- Footer Start -->
<footer class="footer bg-primary relative text-slate-400">
    <div class="container relative">
        <div class="grid grid-cols-12">
            <div class="col-span-12">
                <div class="pt-[60px] pb-[40px]  px-0">
                    <div class="grid md:grid-cols-12 grid-cols-1 ">

                        {{-- Logos --}}
                        <div class="lg:col-span-4 col-span-12 lg:flex flex-col justify-between h-auto lg:h-full">
                            <a class="logo" href="{{ route('home') }}">
                                <img class="w-72 md:w-96 lg:pr-2 pr-4" src="{{ asset('images/logo.png') }}" alt="{{ config('app.name') }}" />
                            </a>

                            <div class="hidden lg:flex lg:flex-col lg:justify-end">
                                <a class="logo" href="https://www.amt-autoridade.pt/amt/projetos-cofinanciados/" target="_blank">
                                    <img class="w-96" src="{{ asset('images/footer_icons.svg') }}" alt="{{ config('app.name') }}" />
                                </a>
                            </div>
                        </div>

                        {{-- col 2 --}}
                        <div class="lg:block hidden lg:col-span-2">
                        </div>

                        {{-- Information --}}
                        <div class="pt-2 md:pt-0 pl-6 lg:col-span-3 md:col-span-6 col-span-12 text-white">
                            <h5 class="tracking-[1px] font-semibold uppercase">{{ __('Information') }}
                            </h5>
                            <ul class="list-none footer-list mt-6">
                                @foreach($bottomMenus as $bottomMenu)
                                    @php
                                        $bottomMenuTranslated = $bottomMenu->getLang(app()->getLocale());
                                    @endphp
                                    <li class="{{ $loop->first ? '' : 'mt-2' }}">
                                        <a href="{{ $bottomMenuTranslated->url }}"
                                            class="hover:text-gray-300 dark:text-slate-300 dark:hover:text-slate-400 duration-500 ease-in-out">
                                            {{ $bottomMenuTranslated->title }}
                                        </a>
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                        <!--end col-->

                        {{-- Contacts --}}
                        <div class="pt-12 md:pt-0 pl-6 lg:col-span-3 md:col-span-6 col-span-12 text-white">
                            <h5 class="tracking-[1px] font-semibold uppercase">{{ __('Contacts') }}
                            </h5>
                            <ul class="list-none footer-list mt-6">
                                <li>
                                    <a href="{{ '#' }}"
                                        class="hover:text-gray-300 dark:text-slate-300 dark:hover:text-slate-400 duration-500 ease-in-out font-semibold">
                                        {{ __('Address') }}:
                                    </a>
                                    <span class="font-extralight">
                                        {{ 'Palácio Coimbra, Rua de Santa Apolónia, n.º 53, 1100-468 Lisboa' }}
                                    </span>

                                </li>
                                <li class="mt-3">
                                    <a href="tel:{{ '351211025800' }}"
                                        class=" hover:text-gray-300 dark:text-slate-300 dark:hover:text-slate-400 duration-500 ease-in-out font-semibold">
                                        {{ __('Phone') }}:
                                        <span class="font-extralight">
                                            {{ '351 211 025 800' }}
                                        </span>
                                    </a>
                                </li>
                                <li class="mt-3">
                                    <a href="mailto:{{ 'geral@amt-autoridade.pt' }}"
                                        class=" hover:text-gray-300 dark:text-slate-300 dark:hover:text-slate-400 duration-500 ease-in-out font-semibold">
                                        {{ __('Email AMT') }}:
                                        <span class="font-extralight">
                                            {{ 'geral@amt-autoridade.pt' }}
                                        </span>
                                    </a>

                                </li>
                                <li class="mt-3">
                                    <a href="mailto:{{ 'observatorio@amt-autoridade.pt' }}"
                                        class=" hover:text-gray-300 dark:text-slate-300 dark:hover:text-slate-400 duration-500 ease-in-out font-semibold">
                                        {{ __('Email Observatório') }}:
                                        <span class="font-extralight">
                                            {{ 'observatorio@amt-autoridade.pt' }}
                                        </span>
                                    </a>
                                </li>
                            </ul>
                        </div><!--end col-->

                        <div class="block mt-8 lg:hidden col-span-12">
                            <a class="logo " href="https://www.amt-autoridade.pt/amt/projetos-cofinanciados/" target="_blank">
                                <img class="w-96 " src="{{ asset('images/footer_icons.svg') }}"
                                    alt="{{ config('app.name') }}" />
                            </a>
                        </div>
                    </div>
                    <!--end col-->
                </div><!--end grid-->
            </div><!--end col-->
        </div><!--end grid-->
    </div><!--end container-->

</footer><!--end footer-->
<!-- Footer End -->

<!-- Back to top -->
<a href="#" onclick="topFunction()" id="back-to-top"
    class="back-to-top fixed hidden text-lg rounded-full z-10 bottom-5 end-5 h-9 w-9 text-center bg-secondary text-white leading-9">
    <i class="uil uil-arrow-up"></i>
</a>
<!-- Back to top -->





<!-- Switcher -->
{{-- <div class="fixed top-[30%] -right-2 z-50">
    <span class="relative inline-block rotate-90">
        <input type="checkbox" class="checkbox opacity-0 absolute" id="chk" {{ \Illuminate\Support\Facades\Cookie::get('darkmode') === 'true' ? 'checked' : '' }}/>
        <label class="label bg-slate-900 dark:bg-white shadow dark:shadow-gray-800 cursor-pointer rounded-full flex justify-between items-center p-1 w-14 h-8" for="chk">
            <i class="uil uil-moon text-[20px] text-yellow-500"></i>
            <i class="uil uil-sun text-[20px] text-yellow-500"></i>
            <span class="ball bg-white dark:bg-slate-900 rounded-full absolute top-[2px] left-[2px] w-7 h-7"></span>
        </label>
    </span>
</div> --}}
<!-- Switcher -->

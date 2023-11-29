
<!-- Start Navbar -->
<nav id="topnav" class="defaultscroll fixed is-sticky nav-sticky">
    <div class="border-b hidden lg:block " id="languagebar">
        <div class="lg:container flex justify-end">
            <select class="border-none text-gray-400 font-light focus:ring-0"
                    x-data="{}"
                    x-on:change="window.location.href = $event.target.value">
                @foreach(LaravelLocalization::getSupportedLocales() as $localeCode => $properties)
                    <option value="{{ LaravelLocalization::getLocalizedURL($localeCode, null, [], true) }}" {{ app()->getLocale() == $localeCode ? 'selected' : '' }}>
                        {{ $langOptions[strtoupper($localeCode)] }}
                    </option>
                @endforeach
            </select>

        </div>
    </div>

    <div class="lg:container relative">
        <!-- Logo container-->
        <a class="logo" href="{{ route('home') }}">
            {{-- <img src="/assets-frontend/images/logo-dark.png" class="inline-block dark:hidden" alt="{{ config('app.name', 'Laravel') }}">
            <img src="/assets-frontend/images/logo-light.png" class="hidden dark:inline-block" alt="{{ config('app.name', 'Laravel') }}"> --}}
            <img class="w-60 pt-0 md:pt-3 pl-2" src="{{ asset('images/logo_dark.png') }}" alt="{{ config('app.name') }}" />
            <!-- use img with svg for svg logo -->
        </a>

        <div class="menu-extras pr-4">
            <div class="menu-item">
                <!-- Mobile menu toggle-->
                <a class="navbar-toggle" id="isToggle" onclick="toggleMenu()">
                    <div class="lines">
                        <span></span>
                        <span></span>
                        <span></span>
                    </div>
                </a>
                <!-- End mobile menu toggle-->
            </div>
        </div>

        <ul class="buy-button list-none mb-0 lg:hidden md:hidden">
            <li class="inline mb-0">
                <a href="#" class="h-9 w-9 inline-flex items-center justify-center tracking-wide align-middle duration-500 text-base text-center rounded-full bg-indigo-600 hover:bg-indigo-700 border border-indigo-600 hover:border-indigo-700 text-white">
                    {{ \App\Facades\HelperMethods::getLang() }}
                </a>
            </li>
        </ul>

        <div id="navigation">
            <!-- Navigation Menu-->
            <ul class="navigation-menu items-center ">
                @foreach($topMenus as $topMenu)
                    @php
                        // Parse the URL to get the path
                        $urlPath = parse_url($topMenu->url, PHP_URL_PATH);
                        $urlPathLocalized = parse_url(\Mcamara\LaravelLocalization\Facades\LaravelLocalization::localizeUrl($urlPath), PHP_URL_PATH);;
                        //dd($urlPath, $urlPathLocalized, request()->is($urlPath), request()->is($urlPathLocalized));
                        // Compare the path of the current request with the path from the menu item URL
                        $isActive = request()->is($urlPath) || request()->is(ltrim($urlPath, '/')) || request()->is($urlPathLocalized) || request()->is(ltrim($urlPathLocalized, '/'));
                        $submenus = $topMenu->childMenus->where('status', \App\Models\Menu::STATUS_ACTIVE)->count() > 0 ? $topMenu->childMenus->where('status', \App\Models\Menu::STATUS_ACTIVE) : null;
                        $topMenuTranslated = $topMenu->getLang(app()->getLocale());
                    @endphp
                    @if(!empty($submenus))
                        <li class="has-submenu parent-menu-item {{ $isActive ? 'active' : '' }}">
                            <a href="javascript:void(0)">{{ $topMenuTranslated->title }}</a><span class="menu-arrow"></span>
                            <ul class="submenu">
                                @foreach($submenus as $submenu)
                                    @php
                                        $submenuTranslated = $submenu->getLang(app()->getLocale());
                                    @endphp
                                    <li class="{{ $isActive ? 'active' : '' }}">
                                        <a href="{{ $submenuTranslated->url }}"
                                           class="sub-menu-item {{ $isActive ? 'active' : '' }}">{{ $submenuTranslated->title }}</a>
                                    </li>
                                @endforeach
                            </ul>
                        </li>
                    @else
                        <li class="{{ $isActive ? 'active' : '' }}">
                            <a href="{{ $topMenuTranslated->url }}"
                               class="sub-menu-item {{ $isActive ? 'active' : '' }}">{{ $topMenuTranslated->getLang(app()->getLocale())->title }}</a>
                        </li>
                    @endif
                @endforeach
                <!--Login button Start-->

                <li>
                    <a href="{{ route('dashboard') }}" class="">

                        <svg width="42" height="42" viewBox="0 0 42 42" fill="none"
                            xmlns="http://www.w3.org/2000/svg">
                            <circle cx="21" cy="21" r="20.75" fill="#F7F7FC" stroke="#F7F7FC"
                                stroke-width="0.5" />
                            <path
                                d="M21.0008 22.5125C23.8195 22.5125 26.1227 20.2094 26.1227 17.3906C26.1227 14.5719 23.8195 12.2344 21.0008 12.2344C18.182 12.2344 15.8789 14.5375 15.8789 17.3562C15.8789 20.175 18.182 22.5125 21.0008 22.5125ZM21.0008 13.4375C23.1664 13.4375 24.9195 15.1906 24.9195 17.3562C24.9195 19.5219 23.1664 21.275 21.0008 21.275C18.8352 21.275 17.082 19.5219 17.082 17.3562C17.082 15.225 18.8352 13.4375 21.0008 13.4375Z"
                                fill="#241E4C" />
                            <path
                                d="M31.3472 28.7002C28.4941 26.2596 24.816 24.9189 21.0004 24.9189C17.1847 24.9189 13.5066 26.2596 10.6535 28.7002C10.3785 28.9064 10.3441 29.2846 10.5847 29.5596C10.791 29.8002 11.1691 29.8346 11.4441 29.6283C14.091 27.3939 17.4941 26.1564 21.0347 26.1564C24.5754 26.1564 27.9785 27.3939 30.6254 29.6283C30.7285 29.7314 30.866 29.7658 31.0035 29.7658C31.1754 29.7658 31.3472 29.6971 31.4504 29.5596C31.6566 29.2846 31.6222 28.9064 31.3472 28.7002Z"
                                fill="#241E4C" />
                        </svg>

                    </a>
                </li>

                <!--Login button End-->
            </ul><!--end navigation menu-->
        </div>
        <!--end navigation-->
    </div><!--end container-->
    @if(true && count($warningMessages))
        <x-frontend.warning-handler :warningMessages="$warningMessages" />
    @endif
</nav><!--end header-->
<!-- End Navbar -->


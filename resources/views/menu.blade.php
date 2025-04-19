<header class="menu container-xlg">
    <div class="menu--top">
        <div class="menu--top-container">
            <ul class="menu--social">
                <li><a href="https://www.instagram.com/future__leaders_/" target="_blank" rel="noopener noreferrer"><img
                            src="{{ asset('assets/icons/social/instagram.svg') }}" alt="instagram"></a></li>
                <li><a href="https://t.me/futureleadre" target="_blank" rel="noopener noreferrer"><img
                            src="{{ asset('assets/icons/social/telegram.svg') }}" alt="telegram"></a></li>
            </ul>

            <div class="menu--top-settings">
                <div class="theme--switcher">
                    <label for="checkbox_theme" class="theme-switch-label">Dark Mode</label>
                    <label id="theme-switch" class="theme-switch switch" for="checkbox_theme">
                        <input type="checkbox" id="checkbox_theme">
                        <span class="slider round"></span>
                    </label>
                </div>

                <div class="menu--lang">
                    @php
                        $current_url = parse_url(LaravelLocalization::getNonLocalizedURL(Request::url()));
                    @endphp
                    <span class="menu--lang-current">{{ LaravelLocalization::getCurrentLocale() }} <img
                            src="{{ asset('assets/icons/menu_arrow.svg') }}"></span>
                    <ul class="menu--lang-dropdown hide">
                        <li><a href="{{ url('/fr' . $current_url['path']) }}"
                                class="menu--lang-dropdown-active">Français</a>
                        </li>
                        <li><a href="{{ LaravelLocalization::getLocalizedURL('en') }}">English</a></li>
                        <li><a href="{{ LaravelLocalization::getLocalizedURL('ar') }}">العربية</a></li>
                    </ul>
                </div>
            </div>
        </div>
        <hr class="menu--top-hr" />
    </div>

    <div class="menu--nav">
        <div class="menu--nav-container">
            <a href="/" class="menu--nav-logo"><img src="{{ asset('assets/images/logo.png') }}"
                    alt="Future leaders logo"></a>
            <div class="menu--nav-links">
                <ul class="menu--nav-links-default">
                    <li><a href="#calendar">{{ __('menu.calendar') }}</a></li>
                    <li><a href="#pricing">{{ __('menu.pricing') }}</a></li>
                    <li><a href="#about">{{ __('menu.about') }}</a></li>
                    <li><a href="#services">{{ __('menu.our_services') }}</a></li>
                    {{-- <li><a href="#team">{{ __('menu.our_team') }}</a></li> --}}
                    <li><a href="#faq">{{ __('menu.faq') }}</a></li>
                    <li><a href="#pricing1">{{ __('Consultation') }}</a></li>
                    <li>
                        @auth
                            {{-- @if (Auth::user()->is_admin) --}}
                                <a href="{{ route('dashboard') }}">{{ __('menu.dashboard') }}</a>
                            {{-- @else
                                <a href="{{ route('logout') }}"
                                    onclick="event.preventDefault(); document.getElementById('logout-form').submit();">{{ __('menu.logout') }}</a>
                                <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                    style="display: none;">
                                    @csrf
                                </form>
                            @endif --}}
                        @else
                            <a href="{{ route('login') }}">{{ __('menu.login') }}</a>
                        @endauth
                    </li>

                </ul>
                {{-- <a href="#contact" class="menu--nav-links-cta">{{ __('menu.contact') }}</a> --}}
            </div>
            <div class="menu--burger">
                <span><img src="{{ asset('assets/icons/burger.svg') }}" alt="menu burger"></span>
            </div>
        </div>
    </div>

    <div id="myNav" class="overlay">
        <a href="javascript:void(0)" class="closebtn">&times;</a>
        <div class="overlay-content">
            <a href="#calendar">{{ __('menu.calendar') }}</a>
            <a href="#pricing">{{ __('menu.pricing') }}</a>
            <a href="#about">{{ __('menu.about') }}</a>
            <a href="#services">{{ __('menu.our_services') }}</a>
            {{-- <a href="#team">{{ __('menu.our_team') }}</a> --}}
            <a href="#faq">{{ __('menu.faq') }}</a>
            <a href="#pricing1">{{ __('menu.Consultation') }}</a>
            <a href="#contact">{{ __('menu.contact') }}</a>
            @auth
                {{-- @if (Auth::user()->is_admin) --}}
                    <a href="{{ route('dashboard') }}">{{ __('menu.dashboard') }}</a>
                {{-- @else
                    <a href="{{ route('logout') }}"
                        onclick="event.preventDefault(); document.getElementById('logout-form').submit();">{{ __('menu.logout') }}</a>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        @csrf
                    </form>
                @endif --}}
            @else
                <a href="{{ route('login') }}">{{ __('menu.login') }}</a>
            @endauth

            <div class="theme--switcher">
                <label for="checkbox_theme" class="theme-switch-label theme-switch-label_mobile">Dark Mode</label>
                <label id="theme-switch" class="theme-switch switch" for="checkbox_theme">
                    <input type="checkbox" id="checkbox_theme">
                    {{-- <span class="slider round"></span> --}}
                </label>
            </div>


            <ul>
                @php
                    $current_lang = LaravelLocalization::getCurrentLocale();
                @endphp
                <li><a href="{{ url('/fr' . $current_url['path']) }}"
                        class="{{ $current_lang === 'fr' ? 'active' : ' ' }}">FR</a></li>
                <li><a href="{{ LaravelLocalization::getLocalizedURL('en') }}"
                        class="{{ $current_lang === 'en' ? 'active' : ' ' }}">EN</a></li>
                <li><a href="{{ LaravelLocalization::getLocalizedURL('ar') }}"
                        class="{{ $current_lang === 'ar' ? 'active' : ' ' }}">AR</a></li>
            </ul>
        </div>
    </div>

</header>

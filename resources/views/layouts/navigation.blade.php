<nav x-data="{open:false}" class="c-nav">
    <div class="c-nav__primary">
        <div class="c-nav__logo">
            <a href="{{ route('home') }}">
                <img src="favicon.ico" alt="logo">
            </a>
        </div>
        <div class="c-nav__links">
            <div class="c-nav__links--left">
                <x-nav-link :href="route('home')" :active="request()->routeIs('home')">
                    {{ __('Home') }}
                </x-nav-link>
                <x-nav-link :href="route('gallery')" :active="request()->routeIs('gallery')">
                    {{ __('Gallery') }}
                </x-nav-link>
            </div>
            <div class="c-nav__links--right">
                @if (Route::has('login'))
                @auth
                <x-dropdown-profile>
                    <x-slot name="trigger">
                        <img src="{{ Auth::user()->profile_picture }}" alt="profile picture" class="c-profilePicture">
                    </x-slot>
                    <x-slot name="content">
                        <x-dropdown-profile-link :href="route('dashboard')" class="">
                            {{ __('Dashboard') }}
                        </x-dropdown-profile-link>

                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <x-dropdown-profile-link :href="route('logout')" onclick="event.preventDefault(); this.closest('form').submit();" class="c-button c-button__primary">
                                {{ __('Log Out') }}
                            </x-dropdown-profile-link>
                        </form>
                    </x-slot>
                </x-dropdown-profile>
                @else
                <a href="{{ route('login') }}" class="c-button c-button__primary">Login</a>
                @if (Route::has('register'))
                <a href="{{ route('register') }}" class="c-button c-button__secondary">Register</a>
                @endif
                @endauth
                @endif
            </div>
        </div>

        <!-- Hamburger -->
        <div class="c-nav__hamburger">
            <button @click="open = ! open" class="">
                <div :class="{'c-nav__hamburger-line--top': open, '': ! open}" class="c-nav__hamburger-line "></div>
                <div :class="{'c-nav__hamburger-line--middle': open, '': ! open}" class="c-nav__hamburger-line "></div>
                <div :class="{'c-nav__hamburger-line--bottom': open, '': ! open}" class="c-nav__hamburger-line "></div>
            </button>
        </div>
    </div>

    <div class="c-nav__mobile" :class="{'c-nav__mobile--block': open, 'c-nav__mobile--hidden': ! open}">
        @auth
        <img src="{{ Auth::user()->profile_picture }}" alt="profile picture" class="c-profilePicture">
        @endauth
        <x-nav-link :href="route('home')" :active="request()->routeIs('home')">
            {{ __('Home') }}
        </x-nav-link>
        @if (Route::has('login'))
        @auth

        <x-nav-link :href="route('dashboard')" :active="request()->routeIs('dashboard')">
            {{ __('Dashboard') }}
        </x-nav-link>

        <form method="POST" action="{{ route('logout') }}">
            @csrf
            <x-nav-link :href="route('logout')" onclick="event.preventDefault(); this.closest('form').submit();" class="c-button c-button__primary">
                {{ __('Log Out') }}
            </x-nav-link>
        </form>

        @else
        <a href="{{ route('login') }}" class="c-button c-button__primary">Login</a>
        @if (Route::has('register'))
        <a href="{{ route('register') }}" class="c-button c-button__secondary">Register</a>
        @endif
        @endauth
        @endif

    </div>
</nav>

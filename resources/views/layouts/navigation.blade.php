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
            </div>
            <div class="c-nav__links--right">
                @if (Route::has('login'))
                @auth
                <x-dropdown align="left">
                    <x-slot name="trigger">
                        <img src="{{ Auth::user()->profile_picture }}" alt="profile picture" class="c-profilePicture">
                    </x-slot>
                    <x-slot name="content">
                        <x-dropdown-link :href="route('dashboard')" class="">
                            {{ __('Dashboard') }}
                        </x-dropdown-link>

                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <x-dropdown-link :href="route('logout')" onclick="event.preventDefault(); this.closest('form').submit();" class="c-button c-button__primary">
                                {{ __('Log Out') }}
                            </x-dropdown-link>
                        </form>
                    </x-slot>
                </x-dropdown>
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
                <svg class="h-6 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                    <path :class="{'hidden': open, 'inline-flex': ! open }" class="inline-flex" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                    <path :class="{'hidden': ! open, 'inline-flex': open }" class="hidden" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                </svg>
            </button>
        </div>
    </div>

    <div class="c-nav__mobile" :class="{'c-nav__mobile--block': open, 'c-nav__mobile--hidden': ! open}">
        <x-nav-link :href="route('home')" :active="request()->routeIs('home')">
            {{ __('Home') }}
        </x-nav-link>
        @if (Route::has('login'))
        @auth
        <img src="{{ Auth::user()->profile_picture }}" alt="profile picture" class="c-profilePicture">

        <x-nav-link :href="route('dashboard')" :active="request()->routeIs('dashboard')">
            {{ __('Dashboard') }}
        </x-nav-link>

        <form method="POST" action="{{ route('logout') }}">
            @csrf
            <x-dropdown-link :href="route('logout')" onclick="event.preventDefault(); this.closest('form').submit();" class="c-button c-button__primary">
                {{ __('Log Out') }}
            </x-dropdown-link>
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

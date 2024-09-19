<nav class="relative z-50 w-full h-24 select-none" x-data="{ showMenu: false }">
    <div
        class="container relative flex flex-wrap items-center justify-between h-24 px-6 mx-auto overflow-hidden font-medium border-b border-gray-200 md:overflow-visible lg:justify-center sm:px-4 md:px-2 lg:px-0">
        <div class="flex items-center justify-start w-1/4 h-full pr-4">
            <a href="{{ route('web.home') }}"
                class="flex items-center py-4 space-x-2 font-extrabold text-gray-900 md:py-0">
                {{-- <span class="flex items-center justify-center w-8 h-8 text-white bg-gray-900 rounded-full">
                    <svg class="w-auto h-5 -translate-y-px" viewBox="0 0 69 66" fill="none"
                        xmlns="http://www.w3.org/2000/svg">
                        <path
                            d="m31.2 12.2-3.9 12.3-13.4.5-13.4.5 10.7 7.7L21.8 41l-3.9 12.1c-2.2 6.7-3.8 12.4-3.6 12.5.2.2 5-3 10.6-7.1 5.7-4.1 10.9-7.2 11.5-6.8.6.4 5.3 3.8 10.5 7.5 5.2 3.8 9.6 6.6 9.8 6.4.2-.2-1.4-5.8-3.6-12.5l-3.9-12.2 8.5-6.2c14.7-10.6 14.8-9.6-.4-9.7H44.2L40 12.5C37.7 5.6 35.7 0 35.5 0c-.3 0-2.2 5.5-4.3 12.2Z"
                            fill="currentColor" />
                    </svg>
                </span> --}}
                <span>QRShare</span>
            </a>
        </div>
        <div class="top-0 left-0 items-start hidden w-full h-full p-4 text-sm bg-gray-900 bg-opacity-50 md:items-center md:w-3/4 md:absolute lg:text-base md:bg-transparent md:p-0 md:relative md:flex"
            :class="{ 'flex fixed': showMenu, 'hidden': !showMenu }">
            <div
                class="flex-col w-full h-auto overflow-hidden bg-white rounded-lg md:bg-transparent md:overflow-visible md:rounded-none md:relative md:flex md:flex-row">
                <a href="#_"
                    class="inline-flex items-center w-auto h-16 px-6 text-xl font-black leading-none text-gray-900 md:hidden">
                    <span>QRShare</span>
                </a>
                <div
                    class="flex flex-col items-start justify-center w-full space-x-6 text-center lg:space-x-8 md:w-2/3 md:mt-0 md:flex-row md:items-center">
                    <x-base.navigation-menu-link href="{{ route('web.home') }}"
                        :active="request()->routeIs('web.home')">Home</x-base.navigation-menu-link>
                    <x-base.navigation-menu-link href="{{ route('web.cards') }}"
                        :active="request()->routeIs('web.cards')">Cartões</x-base.navigation-menu-link>
                    <x-base.navigation-menu-link href="{{ route('web.cards.create') }}" :active="request()->routeIs('web.cards.create')">Criar
                        cartão</x-base.navigation-menu-link>
                    <x-base.navigation-menu-link href="{{ route('web.contact') }}"
                        :active="request()->routeIs('web.contact')">Contato</x-base.navigation-menu-link>
                </div>
                <div
                    class="flex flex-col items-start justify-end w-full pt-4 md:items-center md:w-1/3 md:flex-row md:py-0">
                    @auth
                        {{-- <a href="{{ url('/dashboard') }}"
                            class="rounded-md px-3 py-2 text-black ring-1 ring-transparent transition hover:text-black/70 focus:outline-none focus-visible:ring-[#FF2D20] dark:text-white dark:hover:text-white/80 dark:focus-visible:ring-white">
                            Dashboard
                        </a> --}}
                        <form method="POST" action="{{ route('logout') }}" x-data>
                            @csrf

                            <x-dropdown-link href="{{ route('logout') }}" @click.prevent="$root.submit();">
                                {{ __('Log Out') }}
                            </x-dropdown-link>
                        </form>
                    @else
                        <a href="{{ route('login') }}"
                            class="w-full px-6 py-2 mr-0 text-gray-700 md:px-3 md:mr-2 lg:mr-3 md:w-auto">Entrar</a>
                        @if (Route::has('register'))
                            <a href="{{ route('register') }}"
                                class="inline-flex items-center w-full px-5 px-6 py-3 text-sm font-medium leading-4 text-white bg-gray-900 whitespace-nowrap md:w-auto md:rounded-full hover:bg-gray-800 focus:outline-none md:focus:ring-2 focus:ring-0 focus:ring-offset-2 focus:ring-gray-800">
                                Criar conta
                            </a>
                        @endif

                    @endauth
                </div>
            </div>
        </div>
        <div @click="showMenu = !showMenu"
            class="absolute right-0 flex flex-col items-center items-end justify-center w-10 h-10 bg-white rounded-full cursor-pointer md:hidden hover:bg-gray-100">
            <svg class="w-6 h-6 text-gray-700" x-show="!showMenu" fill="none" stroke-linecap="round"
                stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" stroke="currentColor">
                <path d="M4 6h16M4 12h16M4 18h16"></path>
            </svg>
            <svg class="w-6 h-6 text-gray-700" x-show="showMenu" fill="none" stroke="currentColor"
                viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" style="display: none;">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12">
                </path>
            </svg>
        </div>
    </div>
</nav>

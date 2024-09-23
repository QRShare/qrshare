<header class="absolute inset-x-0 top-0 z-50" x-data="{ isOpen: false }">
    <nav class="container flex items-center justify-between py-6 mx-auto" aria-label="Global">
        <div class="flex lg:flex-1">
            <x-base.logo type='light' />
        </div>
        <div class="flex lg:hidden">
            <button type="button" @click="isOpen = !isOpen"
                class="-m-2.5 inline-flex items-center justify-center rounded-md p-2.5 text-gray-400">
                <span class="sr-only">Open main menu</span>
                <svg class="w-6 h-6 text-white" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"
                    aria-hidden="true">
                    <path stroke-linecap="round" stroke-linejoin="round"
                        d="M3.75 6.75h16.5M3.75 12h16.5m-16.5 5.25h16.5" />
                </svg>
        </div>
        <div class="hidden lg:flex lg:gap-x-12">
            <x-base.navigation-menu-link type='base' href="{{ route('web.home') }}"
                :active="request()->routeIs('web.home')">
                Home
            </x-base.navigation-menu-link>
            <x-base.navigation-menu-link type='base' href="{{ route('web.cards') }}"
                :active="request()->routeIs('web.cards')">
                Cartões
            </x-base.navigation-menu-link>
            <x-base.navigation-menu-link type='base' href="{{ route('web.cards.create') }}"
                :active="request()->routeIs('web.cards.create')">
                Criar cartão
            </x-base.navigation-menu-link>
            <x-base.navigation-menu-link type='base' href="{{ route('web.contact') }}"
                :active="request()->routeIs('web.contact')">
                Contato
            </x-base.navigation-menu-link>
        </div>
        <div class="hidden lg:flex lg:flex-1 lg:justify-end">
            @auth
            <form method="POST" action="{{ route('logout') }}" class="flex items-center justify-center" x-data>
                @csrf

                <a href="{{ route('logout') }}"
                    class="rounded-md px-3 py-2 text-black ring-1 ring-transparent transition hover:text-black/70 focus:outline-none focus-visible:ring-[#FF2D20] dark:text-white dark:hover:text-white/80 dark:focus-visible:ring-white"
                    @click.prevent="$root.submit();">
                    {{ __('Log Out') }}
                </a>
            </form>
            @else
            <a href="{{ route('login') }}"
                class="w-full px-6 py-2 mr-0 text-white md:px-3 md:mr-2 lg:mr-3 md:w-auto">Entrar</a>
            @if (Route::has('register'))
            <a href="{{ route('register') }}"
                class="inline-flex items-center w-full px-5 px-6 py-3 text-sm font-medium leading-4 text-white bg-gray-900 whitespace-nowrap md:w-auto md:rounded-full hover:bg-gray-800 focus:outline-none md:focus:ring-2 focus:ring-0 focus:ring-offset-2 focus:ring-gray-800">
                Criar conta
            </a>
            @endif

            @endauth
        </div>
    </nav>

    <!-- Mobile menu, show/hide based on menu open state. -->
    <div class="lg:hidden" role="dialog" aria-modal="true" x-show="isOpen" @click.away="isOpen = false">
        <!-- Background backdrop, show/hide based on slide-over state. -->
        <div class="fixed inset-0 z-50"></div>
        <div
            class="fixed inset-y-0 right-0 z-50 w-full px-6 py-6 overflow-y-auto bg-white sm:max-w-sm sm:ring-1 sm:ring-white/10">
            <div class="flex items-center justify-between">
                <div class="flex lg:flex-1">
                    <x-base.logo type='rainbow' />
                </div>
                <button type="button" @click="isOpen = !isOpen" class="-m-2.5 rounded-md p-2.5 text-gray-400">
                    <span class="sr-only">Close menu</span>
                    <svg class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"
                        aria-hidden="true">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>
            <div class="flow-root mt-6">
                <div class="-my-6 divide-y divide-gray-500/25">
                    <div class="flex flex-col py-6 space-y-2">
                        <x-base.navigation-menu-link type='rainbow' class="py-2 text-2xl text-neutral-950"
                            href="{{ route('web.home') }}" :active="request()->routeIs('web.home')">
                            Home
                        </x-base.navigation-menu-link>
                        <x-base.navigation-menu-link type='rainbow' class="py-2 text-2xl text-neutral-950"
                            href="{{ route('web.cards') }}" :active="request()->routeIs('web.cards')">
                            Cartões
                        </x-base.navigation-menu-link>
                        <x-base.navigation-menu-link type='rainbow' class="py-2 text-2xl text-neutral-950"
                            href="{{ route('web.cards.create') }}" :active="request()->routeIs('web.cards.create')">
                            Criar cartão
                        </x-base.navigation-menu-link>
                        <x-base.navigation-menu-link type='rainbow' class="py-2 text-2xl text-neutral-950"
                            href="{{ route('web.contact') }}" :active="request()->routeIs('web.contact')">
                            Contato
                        </x-base.navigation-menu-link>
                    </div>
                    <div class="flex flex-col py-6 space-y-2">
                        @auth
                        <form method="POST" action="{{ route('logout') }}" class="flex items-center justify-center"
                            x-data>
                            @csrf

                            <a href="{{ route('logout') }}"
                                class="rounded-md px-3 py-2 text-black ring-1 ring-transparent transition hover:text-black/70 focus:outline-none focus-visible:ring-[#FF2D20]"
                                @click.prevent="$root.submit();">
                                {{ __('Log Out') }}
                            </a>
                        </form>
                        @else
                        <a href="{{ route('login') }}"
                            class="py-2 text-sm font-normal leading-6 text-center transition-all duration-300 rounded-full hover:bg-neutral-100 text-neutral-950 md:w-auto">Entrar</a>
                        @if (Route::has('register'))
                        <a href="{{ route('register') }}"
                            class="inline-flex items-center justify-center w-full px-5 py-3 text-sm font-medium leading-4 text-center text-white bg-gray-900 rounded-full whitespace-nowrap md:w-auto hover:bg-gray-800 focus:outline-none md:focus:ring-2 focus:ring-0 focus:ring-offset-2 focus:ring-gray-800">
                            Criar conta
                        </a>
                        @endif
                        @endauth
                    </div>
                </div>
            </div>
        </div>
    </div>
</header>
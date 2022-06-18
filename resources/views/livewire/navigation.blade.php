<style>
    #navigation-menu{
        height: calc(100vh - 4rem);
    }
</style>


<header class="bg-trueGray-700 sticky top-0">
    <div class="container flex items-center h-16">
        <a
            class="flex flex-col items-center justify-center px-4 bg-white bg-opacity-25 text-white cursor-pointer font-semibold h-full">
            <svg class="h-6 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                <path class="inline-flex" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M4 6h16M4 12h16M4 18h16" />
            </svg>
            <span>Categorias</span>
        </a>

        {{-- <a href="/" class="mx-6">
            
            <x-jet-application-mark class="block h-9 w-auto"/>
        </a> --}}

        {{-- hacemo llamado al componente buscador --}}
        @livewire('buscador')

        
        <div class="mx-6 relative">
            {{-- con auth nos mostrara solo cuando iniciemos sesion --}}
            @auth

                <x-jet-dropdown align="right" width="48">
                    <x-slot name="trigger">
                        <button class="flex text-sm border-2 border-transparent rounded-full focus:outline-none focus:border-gray-300 transition">
                            <img class="h-8 w-8 rounded-full object-cover" src="{{ Auth::user()->profile_photo_url }}" alt="{{ Auth::user()->name }}" />
                        </button>
                        
                    </x-slot>

                    <x-slot name="content">
                        <!-- Account Management -->
                        <div class="block px-4 py-2 text-xs text-gray-400">
                            {{ __('Manage Account') }}
                        </div>

                        <x-jet-dropdown-link href="{{ route('profile.show') }}">
                            {{ __('Profile') }}
                        </x-jet-dropdown-link>


                        <div class="border-t border-gray-100"></div>

                        <!-- Authentication -->
                        <form method="POST" action="{{ route('logout') }}" x-data>
                            @csrf

                            <x-jet-dropdown-link href="{{ route('logout') }}"
                                    @click.prevent="$root.submit();">
                                {{ __('Log Out') }}
                            </x-jet-dropdown-link>
                        </form>
                    </x-slot>
                </x-jet-dropdown>

            @else
                
                <x-jet-dropdown>
                    
                    <x-slot name="trigger">
                        <i class="fas fa-user-circle text-white text-3xl cursor-pointer"></i>
                    </x-slot>

                    <x-slot name="content">

                        <x-jet-dropdown-link href="{{ route('login') }}">
                            {{ __('login') }}
                        </x-jet-dropdown-link>

                        <x-jet-dropdown-link href="{{ route('register') }}">
                            {{ __('Register') }}
                        </x-jet-dropdown-link>

                    </x-slot>

                </x-jet-dropdown>

            @endauth

        
        </div>

    </div>

    <nav id="navigation-menu" class="absolute w-full">
        <div class="w-full">
            <ul class="bg-trueGray-700 bg-opacity-75 flex justify-around">
                @foreach ($categorias as $categoria)
                    <li class="text-white hover:text-opacity-60 py-2">
                        <a href="" class="py-2 px-4 text-sm flex items-center">
                            {{ $categoria->nombre }}
                        </a>
                    </li>
                @endforeach
            </ul>
        </div>
    </nav>
</header>

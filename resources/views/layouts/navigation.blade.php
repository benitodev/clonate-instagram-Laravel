<nav x-data="{ open: false }" class="bg-white border-b border-gray-100">
    <!-- Primary Navigation Menu -->
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between h-16">
            <div class="flex justify-between ">
                <!-- Logo -->
                <div class="flex-shrink-0 flex items-center">
                    <a href="{{ route('index') }}">
                        <x-application-logo class="block h-10 w-auto fill-current text-gray-600" />
                    </a>
                </div>

                <!-- Navigation Links -->



                @guest
                <div class="hidden space-x-8 sm:-my-px sm:ml-10 sm:flex">
                    <x-nav-link :href="route('index')" :active="request()->routeIs('index')">
                        {{ __('Are you new?') }}
                    </x-nav-link>
                </div>
                @endguest

            </div>

            <section id="searchCancel" style="display:none; z-index:10; position:absolute; top:0; left:0; width:100%; height:100%; ">

            </section>

            <div class="flex items-center  relative" style="z-index:20;">

                <span class="mr-2"><img class="w-4 h-4" src="{{asset('img/loupe.png')}}" alt=""></span>

                <input id="search" class="search    focus:ring-transparent"  style="background: #fafafa; border: solid 1px #dbdbdb" type="text" autocapitalize="none" placeholder="Search">


                 <span class="rhombus"></span>
                <div id="results">


                </div>
            </div>

            <!-- Settings Dropdown -->
            <div class="hidden sm:flex  sm:items-center sm:ml-6">
                <x-dropdown align="right" width="48">
                    <x-slot name="trigger" class="justify-between">


                        @auth
                        <button id="profile-icon" class="flex items-center text-sm font-medium text-gray-500 hover:text-gray-700 hover:border-gray-300 focus:outline-none focus:text-gray-700 focus:border-gray-300 transition duration-150 ease-in-out">

                            <img class="inline object-cover w-10 h-10 rounded-full mr-3" src="{{asset(auth()->user()->image)}}" alt="Profile image"/>

                        </button>
                        @endauth


                        @guest
                             <button class="flex items-center mr-7 text-sm font-medium text-gray-500 hover:text-gray-700 hover:border-gray-300 focus:outline-none focus:text-gray-700 focus:border-gray-300 transition duration-150 ease-in-out">
                                 <a href="{{route('login')}}">Login</a>
                             </button>


                             <button class="flex items-center text-sm font-medium text-gray-500 hover:text-gray-700 hover:border-gray-300 focus:outline-none focus:text-gray-700 focus:border-gray-300 transition duration-150 ease-in-out">
                                 <a href="{{route('register')}}">Register</a>
                             </button>
                        @endguest
                    </x-slot>

                      @auth
                    <x-slot name="content">

                          <!-- Configuration -->
                        <x-dropdown-link :href="route('profile')" >
                              {{ __('Profile') }}
                          </x-dropdown-link>

                          <!-- My profile -->
                        <x-dropdown-link href="http://instagram.open/nick/{{auth()->user()->nick}}" >
                              {{ __('My photos') }}
                          </x-dropdown-link>

                          <x-dropdown-link href="http://instagram.open/image/create" >
                              {{ __('Upload Image') }}
                          </x-dropdown-link>
                          <!--  Log out -->
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf

                            <x-dropdown-link :href="route('logout')"
                                    onclick="event.preventDefault();
                                                this.closest('form').submit();">
                                {{ __('Log Out') }}
                            </x-dropdown-link>
                        </form>
                    </x-slot>
                    @endauth
                </x-dropdown>
            </div>




                <!-- Start responsive -->

            <!-- Hamburger -->
            <div class="-mr-2 flex items-center sm:hidden">
                <button @click="open = ! open" class="inline-flex items-center justify-center p-2 rounded-md text-gray-400 hover:text-gray-500 hover:bg-gray-100 focus:outline-none focus:bg-gray-100 focus:text-gray-500 transition duration-150 ease-in-out">
                    <svg class="h-6 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                        <path :class="{'hidden': open, 'inline-flex': ! open }" class="inline-flex" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                        <path :class="{'hidden': ! open, 'inline-flex': open }" class="hidden" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>
        </div>
    </div>

    <!-- Responsive Navigation Menu -->
    <div :class="{'block': open, 'hidden': ! open}" class="hidden sm:hidden">
        <div class="pt-2 pb-3 space-y-1">
            <x-responsive-nav-link :href="route('dashboard')" :active="request()->routeIs('dashboard')">
                {{ __('Dashboard') }}
            </x-responsive-nav-link>
        </div>

        <!-- Responsive Settings Options -->
        <div class=" pb-1 border-t border-gray-200">
            <div class="px-4" style="background-color: rgb(241 191 255 / 89%)">



                @auth
                <div class="font-medium text-base text-gray-800">{{ Auth::user()->name }}</div>
                <div class="font-medium text-sm text-gray-500">{{ Auth::user()->email }}</div>
                @endauth

            </div>

             @auth
            <div class="mt-3 space-y-1">
                <!-- Profile -->
                <x-responsive-nav-link :href="route('profile')">
                        {{ __('Profile') }}
                    </x-responsive-nav-link>

                <!-- Authentication -->
                <form method="POST" action="{{ route('logout') }}">
                    @csrf

                    <x-responsive-nav-link :href="route('logout')"
                            onclick="event.preventDefault();
                                        this.closest('form').submit();">
                        {{ __('Log Out') }}
                    </x-responsive-nav-link>
                </form>
            </div>
             @endauth
        </div>
    </div>
</nav>

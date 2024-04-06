<nav class="fixed z-30 w-full bg-white border-b border-gray-200 ">
    <div class="px-3 py-3 lg:px-5 lg:pl-3">
        <div class="flex items-center justify-between">
            <div class="flex items-center justify-start">
                <button id="toggleSidebarMobile" aria-expanded="true" aria-controls="sidebar"
                    class="p-2 text-gray-600 rounded cursor-pointer lg:hidden hover:text-gray-900 hover:bg-gray-100 focus:bg-gray-100 ">
                    <svg id="toggleSidebarMobileHamburger" class="w-6 h-6" fill="currentColor" viewBox="0 0 20 20"
                        xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd"
                            d="M3 5a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 10a1 1 0 011-1h6a1 1 0 110 2H4a1 1 0 01-1-1zM3 15a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1z"
                            clip-rule="evenodd"></path>
                    </svg>
                    <svg id="toggleSidebarMobileClose" class="hidden w-6 h-6" fill="currentColor" viewBox="0 0 20 20"
                        xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd"
                            d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
                            clip-rule="evenodd"></path>
                    </svg>
                </button>
                <a href="{{ '/' }}" class="flex ml-2 md:mr-24">
                    <span class="self-center text-xl font-uber_bold sm:text-2xl whitespace-nowrap ">Car rent</span>
                </a>

            </div>
            <div class="flex items-center">

                <!-- Search mobile -->
                <button id="toggleSidebarMobileSearch" type="button"
                    class="p-2 text-gray-500 rounded-lg lg:hidden hover:text-gray-900 hover:bg-gray-100 ">
                    <span class="sr-only">Search</span>
                    <!-- Search icon -->
                    <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd"
                            d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z"
                            clip-rule="evenodd"></path>
                    </svg>
                </button>
                <!-- Notifications -->
                <button type="button" data-dropdown-toggle="notification-dropdown"
                    class="p-2 text-gray-500  hover:text-gray-900 hover:bg-gray-100 border rounded-lg">
                    @auth
                    <p class=" text-gray-500 font-semibold flex flex-row items-center gap-1"><span><svg width="1em"
                                height="1em" viewBox="0 0 24 24" fill="none">
                                <title>Person</title>
                                <path fill-rule="evenodd" clip-rule="evenodd"
                                    d="M17.5 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0ZM3 20c0-3.3 2.7-6 6-6h6c3.3 0 6 2.7 6 6v3H3v-3Z"
                                    fill="currentColor"></path>
                            </svg></span> {{ Auth::user()->nama }}</p>
                    @endauth
                </button>
                <!-- Dropdown menu -->
                <div class="z-20 hidden max-w-sm my-4 overflow-hidden text-base list-none bg-gray-50 divide-y divide-gray-100 rounded shadow-lg "
                    id="notification-dropdown">
                    <form action="{{route('logout')}}" method="POST">
                        <div class="  w-full">
                            @csrf
                            <button
                                class="flex items-center p-2 text-base text-white rounded-lg bg-red-600 hover:bg-red-700 group w-full">
                                <ion-icon name="log-out"
                                    class="w-6 h-6 text-white transition duration-75 group-hover:text-white ">
                                </ion-icon>
                                <span class="ml-3 font-uber_medium" sidebar-toggle-item>Logout</span>
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</nav>
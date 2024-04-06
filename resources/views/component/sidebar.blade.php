<div class="flex pt-16 overflow-hidden bg-gray-50 ">
    <aside id="sidebar"
        class="fixed top-0 left-0 z-20 flex flex-col flex-shrink-0 hidden w-64 h-full pt-16 font-normal duration-75 lg:flex transition-width"
        aria-label="Sidebar">
        <div class="relative flex flex-col flex-1 min-h-0 pt-0 bg-white border-r border-gray-200 ">
            <div class="flex flex-col flex-1 pt-5 pb-4 overflow-y-auto">
                <div class="flex-1 px-3 space-y-1 bg-white divide-y divide-gray-200 ">
                    <ul class="pb-2 space-y-2">
                        <li>
                            <form action="#" method="GET" class="lg:hidden">
                                <label for="mobile-search" class="sr-only ">Search</label>
                                <div class="relative">
                                    <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                                        <svg class="w-5 h-5 text-gray-500" fill="currentColor" viewBox="0 0 20 20"
                                            xmlns="http://www.w3.org/2000/svg">
                                            <path fill-rule="evenodd"
                                                d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z"
                                                clip-rule="evenodd"></path>
                                        </svg>
                                    </div>
                                    <input type="text" id="locations" name="search" id="mobile-search"
                                        class="bg-[#eeeeee] border-0 mb-2 text-black placeholder-gray-500 rounded-lg focus:ring-black  focus:border-[1.5px] focus:border-black block focus:outline-none w-full p-2.5 pl-10 "
                                        placeholder="Search">
                                </div>
                            </form>
                        </li>
                        <li>
                            <a href="{{route('dashboard')}}"
                                class="flex items-center p-2 text-base text-gray-900 rounded-lg hover:bg-gray-100 group ">
                                <ion-icon name="planet"
                                    class="w-8 h-8 text-black transition duration-75 group-hover:text-gray-900 ">
                                </ion-icon>
                                <span class="ml-3 " sidebar-toggle-item>Dashboard</span>
                            </a>
                        </li>


                        <li>
                            <a href="{{route('dashboard.manajemen')}}"
                                class="flex items-center p-2 text-base text-gray-900 rounded-lg hover:bg-gray-100 group">

                                <img src=" {{Vite::asset('resources/image/fleet-management.png')}}" alt=""
                                    class="w-8 h-8 text-gray-500 transition duration-75 group-hover:text-gray-900">
                                <span class="ml-3 " sidebar-toggle-item>Manajemen Mobil</span>
                            </a>
                        </li>

                        <li>
                            <a href="{{route('dashboard.rental')}}"
                                class="flex items-center p-2 text-base text-gray-900 rounded-lg hover:bg-gray-100 group">
                                <img src=" {{Vite::asset('resources/image/car-rental.png')}}" alt=""
                                    class="w-8 h-8 text-gray-500 transition duration-75 group-hover:text-gray-900">
                                <span class="ml-3 " sidebar-toggle-item>Rental Mobil</span>
                            </a>
                        </li>

                        <li>
                            <a href="{{route('dashboard.return')}}"
                                class="flex items-center p-2 text-base text-gray-900 rounded-lg hover:bg-gray-100 group">
                                <img src=" {{Vite::asset('resources/image/return.png')}}" alt=""
                                    class="w-8 h-8 text-gray-500 transition duration-75 group-hover:text-gray-900">
                                <span class="ml-3 " sidebar-toggle-item>Pengembalian Mobil</span>
                            </a>
                        </li>


                    </ul>
                    </li>

                </div>
            </div>

        </div>
    </aside>
    <div class="fixed inset-0 z-10 hidden bg-gray-900/50 " id="sidebarBackdrop"></div>
    <div id="main-content" class="relative w-full h-full overflow-y-auto bg-gray-50 lg:ml-64 ">
        <main>

        </main>

    </div>

</div>
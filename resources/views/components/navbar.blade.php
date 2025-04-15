<nav class=" pl-5 md:pr-8 pr-6 py-3 px-1 bg-putih dark:bg-gray-900  fixed left-0 right-0 top-0 z-50 duration-300 transition-colors">
    <div class="flex flex-wrap justify-between items-center">
        <div class="flex justify-start items-center">
            <button data-drawer-target="drawer-navigation" data-drawer-toggle="drawer-navigation"
                aria-controls="drawer-navigation"
                class="p-2 mr-2 text-gray-600 rounded-lg cursor-pointer md:hidden hover:text-gray-900 hover:bg-gray-100 focus:bg-gray-100 dark:focus:bg-gray-700 focus:ring-2 focus:ring-gray-100 dark:focus:ring-gray-700 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white">
                <svg aria-hidden="true" class="w-6 h-6" fill="currentColor" viewBox="0 0 20 20"
                    xmlns="http://www.w3.org/2000/svg">
                    <path fill-rule="evenodd"
                        d="M3 5a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 10a1 1 0 011-1h6a1 1 0 110 2H4a1 1 0 01-1-1zM3 15a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1z"
                        clip-rule="evenodd"></path>
                </svg>
                <svg aria-hidden="true" class="hidden w-6 h-6" fill="currentColor" viewBox="0 0 20 20"
                    xmlns="http://www.w3.org/2000/svg">
                    <path fill-rule="evenodd"
                        d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
                        clip-rule="evenodd"></path>
                </svg>
                <span class="sr-only">Toggle sidebar</span>
            </button>
            <a href="/dashboard" class="flex items-center justify-between mr-12">
                {{-- <img src="/img/" class="mr-3 h-7 " alt="Flowbite Logo" /> --}}
                <span
                    class="self-center text-sm md:text-xl font-semibold whitespace-nowrap text-orens dark:text-lime-400">
                    <marquee class="w-48 md:w-96">Sistem Pendataan Warga Desa Watidal-Kec.Tanimbar Utara-Kab.Kepulauan
                        Tanimbar</marquee>
                </span>
            </a>
        </div>

        <div class="flex items-center lg:order-2">


            <button id="dropdownAvatarNameButton" data-dropdown-toggle="dropdownAvatarName"
                class="flex items-center text-sm  font-medium text-gray-900 rounded-lg duration-100 my-1 hover:text-orens dark:hover:text-hijau md:me-0 focus:ring-4 focus:ring-gray-100 dark:focus:ring-gray-700 dark:text-white"
                type="button">
                <span class="sr-only">Open user menu</span>
                <svg class="w-2.5 h-2.5 me-1 mt-1 hidden md:block " aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                    viewBox="0 0 10 6">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="m1 1 4 4 4-4" />
                </svg>
                <h2 class="hidden md:block ">{{ auth()->user()->name }}</h2>
                <img class="w-8 h-8  ms-2 rounded-full" src="https://cdn-icons-png.flaticon.com/512/2919/2919906.png"
                    alt="user photo">

            </button>

            <!-- Dropdown menu -->
            <div id="dropdownAvatarName"
                class="z-10 hidden bg-white divide-y divide-gray-100 rounded-lg shadow w-44 dark:bg-gray-700 dark:divide-gray-600">
                <div class="px-4 py-3 text-sm text-gray-900 dark:text-white">
                    <div class="font-medium ">{{ auth()->user()->status_user }}</div>
                    <div class="truncate">{{ auth()->user()->email }}</div>
                </div>
                <ul class="py-2 text-sm text-gray-700 dark:text-gray-200"
                    aria-labelledby="dropdownInformdropdownAvatarNameButtonationButton">
                    <li>
                        <a href="{{ route('profile.edit') }}"
                            class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">My
                            Profile</a>
                    </li>
                    <li>
                        <a href="{{ route('tentang-sistem') }}"
                            class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">
                        Tentang Sistem</a>
                    </li>

                </ul>

                <div class="py-2">
                    <form action="/logout" method="POST">
                        @csrf
                        <button
                            class="w-full text-left block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 dark:hover:bg-gray-600 dark:text-gray-200 dark:hover:text-white">Logout</button>
                    </form>
                </div>
            </div>

        </div>
    </div>
</nav>

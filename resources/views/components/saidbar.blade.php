<!-- Sidebar -->

<aside
    class="fixed top-0 left-0 z-40 w-56 h-screen pt-14 transition-transform -translate-x-full bg-white md:translate-x-0 dark:bg-gray-800 dark:border-gray-700 duration-300"
    aria-label="Sidenav" id="drawer-navigation">
    <div class="flex flex-col justify-between h-full overflow-y-auto py-5 px-0 bg-white dark:bg-gray-900 duration-300 transition">
        <div>
            <ul class="space-y-4 md:pt-0">
                <li class="flex justify-start items-center pt-2">
                    <x-saidbar-link :href="route('dashboard')" :active="request()->routeIs('dashboard')">
                        <!-- Conditional icon -->
                        @if (Request::is('dashboard'))
                            <!-- Full icon for active state -->
                            <svg class="w-5 h-5 text-orens dark:text-hijau" aria-hidden="true"
                                xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor"
                                viewBox="0 0 24 24">
                                <path fill-rule="evenodd"
                                    d="M11.293 3.293a1 1 0 0 1 1.414 0l6 6 2 2a1 1 0 0 1-1.414 1.414L19 12.414V19a2 2 0 0 1-2 2h-3a1 1 0 0 1-1-1v-3h-2v3a1 1 0 0 1-1 1H7a2 2 0 0 1-2-2v-6.586l-.293.293a1 1 0 0 1-1.414-1.414l2-2 6-6Z"
                                    clip-rule="evenodd" />
                            </svg>
                        @else
                            <svg class="w-5 h-5 text-gray-600 dark:text-white" aria-hidden="true"
                                xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none"
                                viewBox="0 0 24 24">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                    stroke-width="2"
                                    d="m4 12 8-8 8 8M6 10.5V19a1 1 0 0 0 1 1h3v-3a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1v3h3a1 1 0 0 0 1-1v-8.5" />
                            </svg>
                        @endif
                    </x-saidbar-link>
                    <a href="/dashboard">
                        <span
                            class="{{ Request::is('dashboard') ? 'text-orens dark:text-hijau' : 'dark:text-putih' }} text-base text-gray-400 pl-1.5 hover:text-orens dark:hover:text-hijau">
                            Dashboard
                        </span>
                    </a>
                </li>

                <li class="flex justify-start items-center pt-3">
                    <x-saidbar-link :href="route('warga')" :active="request()->routeIs('warga*')">
                        <svg class="{{ Request::is('warga*') ? 'text-orens dark:text-hijau' : 'dark:text-putih' }} w-5 h-5 text-gray-600"
                            aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                            fill="none" viewBox="0 0 24 24">
                            <path stroke="currentColor" stroke-linecap="round" stroke-width="2"
                                d="M4.5 17H4a1 1 0 0 1-1-1 3 3 0 0 1 3-3h1m0-3.05A2.5 2.5 0 1 1 9 5.5M19.5 17h.5a1 1 0 0 0 1-1 3 3 0 0 0-3-3h-1m0-3.05a2.5 2.5 0 1 0-2-4.45m.5 13.5h-7a1 1 0 0 1-1-1 3 3 0 0 1 3-3h3a3 3 0 0 1 3 3 1 1 0 0 1-1 1Zm-1-9.5a2.5 2.5 0 1 1-5 0 2.5 2.5 0 0 1 5 0Z" />
                        </svg>
                    </x-saidbar-link>
                    <a href="/warga">
                        <span
                            class="{{ Request::is('warga*') ? 'text-orens dark:text-hijau' : 'dark:text-putih' }} text-base text-gray-400 pl-1.5 hover:text-orens dark:hover:text-lime-400">Warga</span>
                    </a>
                </li>
                <li class="flex justify-start items-center pt-3">
                    <x-saidbar-link :href="route('kartu-keluarga.index')" :active="request()->routeIs('kartu-keluarga*')">
                        <svg class="{{ Request::is('kartu-keluarga*') ? 'text-orens dark:text-hijau' : 'dark:text-putih' }} w-5 h-5 text-gray-600 "
                            aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                            fill="none" viewBox="0 0 24 24">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M15 9h3m-3 3h3m-3 3h3m-6 1c-.306-.613-.933-1-1.618-1H7.618c-.685 0-1.312.387-1.618 1M4 5h16a1 1 0 0 1 1 1v12a1 1 0 0 1-1 1H4a1 1 0 0 1-1-1V6a1 1 0 0 1 1-1Zm7 5a2 2 0 1 1-4 0 2 2 0 0 1 4 0Z" />
                        </svg>
                    </x-saidbar-link>
                    <a href="/kartu-keluarga">
                        <span
                            class="{{ Request::is('kartu-keluarga*') ? 'text-orens dark:text-hijau' : 'dark:text-putih' }} text-base text-gray-400 pl-1.5 hover:text-orens dark:hover:text-hijau">Kartu
                            Keluarga</span>
                    </a>
                </li>
                <li class="flex justify-start items-center pt-3">
                    <x-saidbar-link :href="route('mutasi.index')" :active="request()->routeIs('mutasi*')">
                        <svg class="{{ Request::is('mutasi*') ? 'text-orens dark:text-hijau' : 'dark:text-putih' }} w-5 h-5 text-gray-600 "
                            aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                            fill="none" viewBox="0 0 24 24">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M15.041 13.862A4.999 4.999 0 0 1 17 17.831V21M7 3v3.169a5 5 0 0 0 1.891 3.916M17 3v3.169a5 5 0 0 1-2.428 4.288l-5.144 3.086A5 5 0 0 0 7 17.831V21M7 5h10M7.399 8h9.252M8 16h8.652M7 19h10" />
                        </svg>

                    </x-saidbar-link>
                    <a href="/mutasi"
                        class="{{ Request::is('mutasi*') ? 'text-orens dark:text-hijau' : 'dark:text-putih' }} text-base text-gray-400  pl-1.5 hover:text-orens dark:hover:text-lime-400">
                        Mutasi
                    </a>
                </li>


            </ul>
            <ul class="pt-5 mt-5 space-y-2 border-t border-gray-200 dark:border-gray-700">
                <!-- Additional navigation items can go here -->
                <li class="flex justify-start items-center pt-0">
                    <x-saidbar-link :href="route('users.index')" :active="request()->routeIs('users*')">
                        <svg class="{{ Request::is('users*') ? 'text-orens dark:text-hijau' : 'dark:text-putih' }} w-5 h-5 text-gray-600 "
                            aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                            fill="none" viewBox="0 0 24 24">
                            <path stroke="currentColor" stroke-linecap="round" stroke-width="2"
                                d="M16 19h4a1 1 0 0 0 1-1v-1a3 3 0 0 0-3-3h-2m-2.236-4a3 3 0 1 0 0-4M3 18v-1a3 3 0 0 1 3-3h4a3 3 0 0 1 3 3v1a1 1 0 0 1-1 1H4a1 1 0 0 1-1-1Zm8-10a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z" />
                        </svg>


                    </x-saidbar-link>
                    <a href="/users">
                        <span
                            class="{{ Request::is('users*') ? 'text-orens dark:text-hijau' : 'dark:text-putih ' }} text-base text-gray-400 pl-1.5 hover:text-orens dark:hover:text-lime-400">Users</span>
                    </a>
                </li>
                <li class="flex justify-start items-center pt-0">
                    <x-saidbar-link :href="route('profile-desa')" :active="request()->routeIs('profile-desa')">
                        <svg class="{{ Request::is('profile-desa') ? 'text-orens dark:text-hijau' : 'dark:text-putih' }} w-5 h-5 text-gray-600 "
                            aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                            fill="none" viewBox="0 0 24 24">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M7 6H5m2 3H5m2 3H5m2 3H5m2 3H5m11-1a2 2 0 0 0-2-2h-2a2 2 0 0 0-2 2M7 3h11a1 1 0 0 1 1 1v16a1 1 0 0 1-1 1H7a1 1 0 0 1-1-1V4a1 1 0 0 1 1-1Zm8 7a2 2 0 1 1-4 0 2 2 0 0 1 4 0Z" />
                        </svg>
                    </x-saidbar-link>
                    <a href="/profile-desa">
                        <span
                            class="{{ Request::is('profile-desa') ? 'text-orens dark:text-hijau' : 'dark:text-putih ' }} text-base text-gray-400 pl-1.5 hover:text-orens dark:hover:text-lime-400">Profile
                            desa</span>
                    </a>
                </li>
                {{-- <li class="flex justify-start items-center pt-0">
                    <x-saidbar-link :href="route('tentang-sistem')" :active="request()->routeIs('tentang-sistem')">
                        <svg class="{{ Request::is('tentang-sistem') ? 'text-orens dark:text-hijau' : 'dark:text-putih' }} w-5 h-5 text-gray-600 "
                            aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                            fill="none" viewBox="0 0 24 24">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M7 6H5m2 3H5m2 3H5m2 3H5m2 3H5m11-1a2 2 0 0 0-2-2h-2a2 2 0 0 0-2 2M7 3h11a1 1 0 0 1 1 1v16a1 1 0 0 1-1 1H7a1 1 0 0 1-1-1V4a1 1 0 0 1 1-1Zm8 7a2 2 0 1 1-4 0 2 2 0 0 1 4 0Z" />
                        </svg>
                    </x-saidbar-link>
                    <a href="{{ route('tentang-sistem') }}">
                        <span
                            class="{{ Request::is('tentang-sistem') ? 'text-orens dark:text-hijau' : 'dark:text-putih ' }} text-base text-gray-400 pl-1.5 hover:text-orens dark:hover:text-lime-400">Tentang Sistem</span>
                    </a>
                </li> --}}
            </ul>

        </div>
        <div class="mt-auto">
            <form action="/logout" method="POST">
                @csrf
                <button type="submit"
                    class=" flex items-center ml-8 p-2 text-base font-medium text-gray-900 rounded-lg transition duration-75 hover:bg-gray-100 dark:hover:bg-gray-700 dark:text-white group">
                    <svg class="flex-shrink-0 w-6 h-6 text-hitam dark:text-white" aria-hidden="true"
                        xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none"
                        viewBox="0 0 24 24">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M4 12h12m-12 0 4-4m-4 4 4 4M15 4h2a3 3 0 0 1 3 3v10a3 3 0 0 1-3 3h-2" />
                    </svg>

                    <span class="ml-1"></span>
                </button>
            </form>
        </div>
    </div>
</aside>

<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    {{-- <div class="py-5 text-gray-900 dark:text-white text-4xl flex flex-wrap justify-center md:justify-start mx-auto sm:px-6 lg:px-8">
        <h2 class="font-normal ">Selamat datang kembali <span class="font-medium">{{ auth()->user()->name }}</span> </h2>
    </div> --}}

    <div class="py-8">
        <div class=" flex flex-wrap justify-center md:justify-start mx-auto sm:px-6 lg:px-8">
            <div
                class="relative w-full md:w-1/2 xl:w-1/3 md:mx-2 mx-8 px-4 mb-6 py-6 bg-white shadow-lg rounded-xl dark:bg-gray-900 hover:scale-105 duration-300">
                <p class="text-md font-semibold text-gray-700 border-b border-gray-200 w-max dark:text-white">
                    Statistics Warga
                </p>
                <div class="flex items-end my-6 space-x-2">
                    <p class="md:text-4xl text-2xl font-bold text-black dark:text-white">
                        {{ $jumlah_warga }}
                    </p>
                    <span class="flex items-center text-xl font-bold text-green-500">
                        Warga
                    </span>
                </div>
                <div class="dark:text-white">
                    <div
                        class="flex items-center justify-between pb-2 mb-2 space-x-12 text-sm border-b border-gray-200 md:space-x-24">
                        <p>
                            Jumlah Laki-Laki
                        </p>
                        <div class="flex items-end text-xs">
                            {{ $jumlah_warga_l }}
                        </div>
                    </div>
                    <div
                        class="flex items-center justify-between pb-2 mb-2 space-x-12 text-sm border-b border-gray-200 md:space-x-24">
                        <p>
                            Jumlah Perempuan
                        </p>
                        <div class="flex items-end text-xs">
                            {{ $jumlah_warga_p }}
                        </div>
                    </div>
                    <div
                        class="flex items-center justify-between pb-2 mb-2 space-x-12 text-sm border-b border-gray-200 md:space-x-24">
                        <p>
                            Warga di bawah 17 tahun
                        </p>
                        <div class="flex items-end text-xs">
                            {{ $jumlah_warga_kd_17 }}
                        </div>
                    </div>
                    <div class="flex items-center justify-between space-x-12 text-sm md:space-x-24">
                        <p>
                            Warga di Atas 17 tahun
                        </p>
                        <div class="flex items-end text-xs">
                            {{ $jumlah_warga_ld_17 }}
                        </div>
                    </div>
                </div>
            </div>
            <div
                class="relative w-full md:w-1/2 xl:w-1/3 md:mx-2 mx-8 px-4 mb-6 py-6 bg-white shadow-lg rounded-xl dark:bg-gray-900 hover:scale-105 duration-300">
                <p class="text-md font-semibold text-gray-700 border-b border-gray-200 w-max dark:text-white">
                    Statistics Mutasi
                </p>
                <div class="flex items-end my-6 space-x-2">
                    <p class="md:text-4xl text-2xl font-bold text-black dark:text-white">
                        {{ $jumlah_mutasi }}
                    </p>
                    <span class="flex items-center text-xl font-bold text-green-500">
                        Mutasi
                    </span>
                </div>
                <div class="dark:text-white">
                    <div
                        class="flex items-center justify-between pb-2 mb-2 space-x-12 text-sm border-b border-gray-200 md:space-x-24">
                        <p>
                            Jumlah Laki-Laki
                        </p>
                        <div class="flex items-end text-xs">
                            {{ $jumlah_mutasi_l }}
                        </div>
                    </div>
                    <div
                        class="flex items-center justify-between pb-2 mb-2 space-x-12 text-sm border-b border-gray-200 md:space-x-24">
                        <p>
                            Jumlah Perempuan
                        </p>
                        <div class="flex items-end text-xs">
                            {{ $jumlah_mutasi_p }}
                        </div>
                    </div>
                    <div
                        class="flex items-center justify-between pb-2 mb-2 space-x-12 text-sm border-b border-gray-200 md:space-x-24">
                        <p>
                            Warga di bawah 17 tahun
                        </p>
                        <div class="flex items-end text-xs">
                            {{ $jumlah_mutasi_kd_17 }}
                        </div>
                    </div>
                    <div class="flex items-center justify-between space-x-12 text-sm md:space-x-24">
                        <p>
                            Warga di Atas 17 tahun
                        </p>
                        <div class="flex items-end text-xs">
                            {{ $jumlah_mutasi_ld_17 }}
                        </div>
                    </div>
                </div>
            </div>


            <div
                class="relative w-full md:w-1/2 xl:w-1/3 md:mx-2 mx-8 px-4 p-6 overflow-hidden  bg-white shadow-lg rounded-xl  dark:bg-gray-900 hover:scale-105 duration-300">
                <p class="text-md font-semibold text-gray-900 dark:text-white">
                    Statistics kartu keluarga
                </p>
                <div class="flex items-center justify-between my-4 dark:text-gray-900 text-white rounded">
                    <span class="p-2 bg-gray-500 dark:bg-white rounded-lg">
                        <svg aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                            fill="currentColor" viewBox="0 0 24 24">
                            <path fill-rule="evenodd"
                                d="M4 4a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h16a2 2 0 0 0 2-2V6a2 2 0 0 0-2-2H4Zm10 5a1 1 0 0 1 1-1h3a1 1 0 1 1 0 2h-3a1 1 0 0 1-1-1Zm0 3a1 1 0 0 1 1-1h3a1 1 0 1 1 0 2h-3a1 1 0 0 1-1-1Zm0 3a1 1 0 0 1 1-1h3a1 1 0 1 1 0 2h-3a1 1 0 0 1-1-1Zm-8-5a3 3 0 1 1 6 0 3 3 0 0 1-6 0Zm1.942 4a3 3 0 0 0-2.847 2.051l-.044.133-.004.012c-.042.126-.055.167-.042.195.006.013.02.023.038.039.032.025.08.064.146.155A1 1 0 0 0 6 17h6a1 1 0 0 0 .811-.415.713.713 0 0 1 .146-.155c.019-.016.031-.026.038-.04.014-.027 0-.068-.042-.194l-.004-.012-.044-.133A3 3 0 0 0 10.059 14H7.942Z"
                                clip-rule="evenodd" />
                        </svg>
                    </span>
                    <div class="flex flex-col items-start w-full ml-2 justify-evenly">
                        <p class="text-lg text-gray-900 dark:text-white">
                            {{ $jumlah_kartu_keluarga }}
                        </p>
                        <p class="text-sm text-gray-900 dark:text-white">
                            Kartu keluarga
                        </p>
                    </div>
                </div>
                <div class="flex items-center justify-between dark:text-gray-900 text-white  rounded">
                    <span class="p-2 bg-gray-500 dark:bg-white rounded-lg">
                        <svg aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                            fill="none" viewBox="0 0 24 24">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M3 15v4m6-6v6m6-4v4m6-6v6M3 11l6-5 6 5 5.5-5.5" />
                        </svg>
                    </span>
                    <div class="flex flex-col items-start w-full ml-2 justify-evenly">
                        <p class="text-lg text-gray-900 dark:text-white">
                            {{ $rata2_anggota }}
                        </p>
                        <p class="text-sm text-gray-900 dark:text-white">
                            Rata-rata orang per kartu keluarga
                        </p>
                    </div>
                </div>

            </div>

        </div>

    </div>





</x-app-layout>

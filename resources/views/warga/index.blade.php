<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Data Warga') }}
        </h2>
    </x-slot>

    <div class="py-8">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 ">
            <div
                class="bg-white dark:bg-gray-900 overflow-hidden shadow-sm sm:rounded-lg transition-colors duration-300">
                <div class="p-4 text-gray-900 dark:text-gray-100">
                    <div class="felx">
                        {{-- {{ __("You're logged in!") }} --}}
                        <div class="flex">
                            <a href="{{ route('warga.create') }}"
                                class=" mr-6 text-white  bg-orens hover:bg-orens/80 focus:ring-4 focus:outline-none focus:ring-orens/50 font-medium rounded-lg text-sm px-5 py-2.5 text-center inline-flex items-center dark:text-gray-900 dark:bg-hijau dark:hover:bg-hijau/80 dark:focus:ring-hijau/40 me-2 mb-2 ">
                                <svg class="w-5 h-5 text-putih dark:text-gray-900" aria-hidden="true"
                                    xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none"
                                    viewBox="0 0 24 24">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                        stroke-width="2"
                                        d="M16 12h4m-2 2v-4M4 18v-1a3 3 0 0 1 3-3h4a3 3 0 0 1 3 3v1a1 1 0 0 1-1 1H5a1 1 0 0 1-1-1Zm8-10a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z" />
                                </svg>
                                Tambah</a>
                            {{-- <a href="{{ route('warga.cetak-pdf') }}"
                            class="bg-blue-500 hover:bg-blue-500/80 flex justify-center  text-white font-medium rounded-lg text-sm px-5 py-2.5 text-center me-2 mb-2">
                            <svg class="w-5 h-5 mr-1 text-putih dark:text-white" aria-hidden="true"
                                xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none"
                                viewBox="0 0 24 24">
                                <path stroke="currentColor" stroke-linejoin="round" stroke-width="2"
                                    d="M16.444 18H19a1 1 0 0 0 1-1v-5a1 1 0 0 0-1-1H5a1 1 0 0 0-1 1v5a1 1 0 0 0 1 1h2.556M17 11V5a1 1 0 0 0-1-1H8a1 1 0 0 0-1 1v6h10ZM7 15h10v4a1 1 0 0 1-1 1H8a1 1 0 0 1-1-1v-4Z" />
                            </svg>
                            Cetak PDF
                        </a> --}}
                            <a href="{{ route('warga.export-csv') }}"
                                class="bg-green-500 hover:bg-green-500/80 flex justify-center  text-white font-medium rounded-lg text-sm px-5 py-2.5 text-center me-2 mb-2">
                                <svg class="w-5 h-5 mr-1 text-putih dark:text-white" aria-hidden="true"
                                    xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none"
                                    viewBox="0 0 24 24">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                        stroke-width="2"
                                        d="M5 10V7.914a1 1 0 0 1 .293-.707l3.914-3.914A1 1 0 0 1 9.914 3H18a1 1 0 0 1 1 1v6M5 19v1a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1v-1M10 3v4a1 1 0 0 1-1 1H5m2.665 9H6.647A1.647 1.647 0 0 1 5 15.353v-1.706A1.647 1.647 0 0 1 6.647 12h1.018M16 12l1.443 4.773L19 12m-6.057-.152-.943-.02a1.34 1.34 0 0 0-1.359 1.22 1.32 1.32 0 0 0 1.172 1.421l.536.059a1.273 1.273 0 0 1 1.226 1.718c-.2.571-.636.754-1.337.754h-1.13" />
                                </svg>
                                Export to CSV
                            </a>
                            {{-- <a href="{{ route('warga.export-excel') }}"
                            class="bg-green-500 hover:bg-green-500/80 flex justify-center  text-white font-medium rounded-lg text-sm px-5 py-2.5 text-center me-2 mb-2">
                            <svg class="w-5 h-5 mr-1 text-putih dark:text-white" aria-hidden="true"
                                xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none"
                                viewBox="0 0 24 24">
                                <path stroke="currentColor" stroke-linejoin="round" stroke-width="2"
                                    d="M16.444 18H19a1 1 0 0 0 1-1v-5a1 1 0 0 0-1-1H5a1 1 0 0 0-1 1v5a1 1 0 0 0 1 1h2.556M17 11V5a1 1 0 0 0-1-1H8a1 1 0 0 0-1 1v6h10ZM7 15h10v4a1 1 0 0 1-1 1H8a1 1 0 0 1-1-1v-4Z" />
                            </svg>
                            Export to EXCEL
                        </a> --}}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    @if (session('success'))
        <x-alert-success :message="session('success')" />
    @endif


    <div class="py-8">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 ">
            <div
                class="bg-white dark:bg-gray-900 overflow-hidden shadow-sm sm:rounded-lg transition-colors duration-300">
                <div class="flex flex-col items-center md:flex-row md:justify-between md:px-5">
                    <h1 class="text-2xl font-semibold mt-6 ml-3 dark:text-putih">Tabel warga </h1>
                    <form>
                        <div class=" pt-5 bg-white dark:bg-gray-900">
                            <label for="search" class="sr-only">Search</label>
                            <div class="relative mt-1">
                                <div
                                    class="absolute inset-y-0 rtl:inset-r-0 start-0 flex items-center ps-3 pointer-events-none">
                                    <svg class="w-4 h-4 text-gray-500 dark:text-gray-400" aria-hidden="true"
                                        xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                            stroke-width="2" d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z" />
                                    </svg>
                                </div>
                                <input type="text" id="search" name="search"
                                    class="block pt-2 ps-10 text-sm text-gray-900 border border-gray-300 rounded-lg w-64 bg-gray-50 focus:ring-gray-300 focus:border-gray-200 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                    placeholder="Search.." value="{{ old('search', request('search')) }}">
                            </div>
                        </div>
                    </form>
                </div>
                <div class="relative overflow-x-auto shadow-md sm:rounded-lg">

                    <div class="p-4 text-gray-900 dark:text-gray-100">
                        <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
                            <thead
                                class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                                <tr>
                                    <th class="py-2 px-4">NIK</th>
                                    <th class="py-2 px-4">NAMA</th>
                                    <th class="py-2 px-4">Umur</th>
                                    <th class="py-2 px-4">PENDIDIKAN</th>
                                    <th class="py-2 px-4">PEKERJAAN</th>
                                    <th class="py-2 px-4">STATUS</th>
                                    <th class="py-2 px-4">ACTION</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($wargas as $warga)
                                    <tr id="list" class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                                        <td class="py-2 px-4">{{ $warga->nik_warga }}</td>
                                        <td class="py-2 px-4">{{ $warga->nama_warga }}</td>
                                        <td class="px-2 py-4 whitespace-nowrap">
                                            @php
                                                $tanggal_lahir = new DateTime($warga->tanggal_lahir_warga);
                                                $umur = $tanggal_lahir->diff(now())->y; // Mendapatkan selisih dalam tahun dengan tanggal sekarang
                                                echo $umur, ' Tahun';
                                            @endphp
                                        </td>
                                        <td class="py-2 px-4">{{ $warga->pendidikan_terakhir_warga }}</td>
                                        <td class="py-2 px-4">{{ $warga->pekerjaan_warga }}</td>
                                        <td class="py-2 px-4">{{ $warga->status_warga }}</td>
                                        <td class="px-6 py-4 relative">
                                            <button id="dropdownDefaultButton-{{ $warga->id_warga }}"
                                                data-dropdown-toggle="dropdownAction-{{ $warga->id_warga }}"
                                                class="p-2 hover:text-gray-300" type="button"><svg
                                                    class="w-6 h-6 text-gray-800 dark:text-white" aria-hidden="true"
                                                    xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                    fill="none" viewBox="0 0 24 24">
                                                    <path stroke="currentColor" stroke-linecap="round" stroke-width="2"
                                                        d="M12 6h.01M12 12h.01M12 18h.01" />
                                                </svg>

                                            </button>
                                            <!-- Dropdown menu -->
                                            <div id="dropdownAction-{{ $warga->id_warga }}"
                                                class="z-10 hidden bg-white divide-y divide-gray-100 rounded-lg shadow w-36 dark:bg-gray-700 absolute">
                                                <ul class="py-2 text-sm text-gray-700 dark:text-gray-200"
                                                    aria-labelledby="dropdownDefaultButton-{{ $warga->id_warga }}">
                                                    <li>
                                                        <a href="{{ route('warga.show', $warga->id_warga) }}"
                                                            class="flex px-4 py-2 text-cyan-500 hover:bg-gray-100 dark:hover:bg-gray-600 "><svg
                                                                class="w-5 h-5 mr-1 text-cyan-500 E" aria-hidden="true"
                                                                xmlns="http://www.w3.org/2000/svg" width="24"
                                                                height="24" fill="none" viewBox="0 0 24 24">
                                                                <path stroke="currentColor" stroke-width="2"
                                                                    d="M21 12c0 1.2-4.03 5-9 5s-9-4.8-9-6c0-1.2 4.03-6 9-6s9 4.8 9 6Z" />
                                                                <path stroke="currentColor" stroke-width="2"
                                                                    d="M15 12a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z" />
                                                            </svg>
                                                            Detail</a>
                                                    </li>
                                                    <li>
                                                        <a href="{{ route('warga.edit', $warga->id_warga) }}"
                                                            class=" flex px-4 py-2 text-amber-400 hover:bg-gray-100 dark:hover:bg-gray-600 ">
                                                            <svg class="w-5 h-5 mr-1 text-amber-400 "
                                                                aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                                                width="24" height="24" fill="none"
                                                                viewBox="0 0 24 24">
                                                                <path stroke="currentColor" stroke-linecap="square"
                                                                    stroke-linejoin="round" stroke-width="2"
                                                                    d="M7 19H5a1 1 0 0 1-1-1v-1a3 3 0 0 1 3-3h1m4-6a3 3 0 1 1-6 0 3 3 0 0 1 6 0Zm7.441 1.559a1.907 1.907 0 0 1 0 2.698l-6.069 6.069L10 19l.674-3.372 6.07-6.07a1.907 1.907 0 0 1 2.697 0Z" />
                                                            </svg>
                                                            Edit</a>
                                                    </li>
                                                    <li>
                                                        <a href="{{ route('mutasi.mutasi', $warga->id_warga) }}"
                                                            class=" flex px-4 py-2 text-green-400 hover:bg-gray-100 dark:hover:bg-gray-600 ">
                                                            <svg class="w-5 h-5 text-green-400" aria-hidden="true"
                                                                xmlns="http://www.w3.org/2000/svg" width="24"
                                                                height="24" fill="none" viewBox="0 0 24 24">
                                                                <path stroke="currentColor" stroke-linecap="round"
                                                                    stroke-linejoin="round" stroke-width="2"
                                                                    d="M15.041 13.862A4.999 4.999 0 0 1 17 17.831V21M7 3v3.169a5 5 0 0 0 1.891 3.916M17 3v3.169a5 5 0 0 1-2.428 4.288l-5.144 3.086A5 5 0 0 0 7 17.831V21M7 5h10M7.399 8h9.252M8 16h8.652M7 19h10" />
                                                            </svg>

                                                            Mutasi</a>
                                                    </li>
                                                    <li>
                                                        <button
                                                            onclick="showModal('{{ route('warga.destroy', $warga->id_warga) }}')"
                                                            class="w-full flex px-4 py-2 text-red-500 hover:bg-gray-100 text-left dark:hover:bg-gray-600">
                                                            <svg class="w-5 h-5 mr-1 text-red-500" aria-hidden="true"
                                                                xmlns="http://www.w3.org/2000/svg" width="24"
                                                                height="24" fill="none" viewBox="0 0 24 24">
                                                                <path stroke="currentColor" stroke-linecap="round"
                                                                    stroke-linejoin="round" stroke-width="2"
                                                                    d="M5 7h14m-9 3v8m4-8v8M10 3h4a1 1 0 0 1 1 1v3H9V4a1 1 0 0 1 1-1ZM6 7h12v13a1 1 0 0 1-1 1H7a1 1 0 0 1-1-1V7Z" />
                                                            </svg>
                                                            Hapus</button>
                                                    </li>
                                                </ul>
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                                <!-- Tambahkan baris lain sesuai kebutuhan -->
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="px-6 pb-6 text-center justify-center">
                    {{-- Include pagination component --}}
                    @include('components.pagination', ['paginator' => $wargas])
                </div>

            </div>

        </div>
    </div>

    <div class="py-3">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 ">
            <div class="bg-white dark:bg-gray-900 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-4 text-gray-900 dark:text-gray-100">
                    <div class="delay-[100ms] duration-[400ms] taos:translate-y-[100%] taos:invisible"
                        data-taos-offset="300">
                        <div
                            class="relative p-4 overflow-hidden text-gray-700 bg-white shadow-lg rounded-xl w-60 md:w-72 dark:bg-gray-800 dark:text-gray-100">
                            <div class="w-full">
                                <p class="mb-4 text-2xl font-light text-gray-700 dark:text-white">
                                    Statistics
                                </p>
                                <div class="flex items-center justify-between text-sm text-gray-400">
                                    <p>
                                        Total Warga
                                    </p>
                                    <p>
                                        {{ $totalWarga }}
                                    </p>
                                </div>
                                <div class="w-full h-2 mb-4 bg-green-100 rounded-full">
                                    <div
                                        class="w-full h-full text-xs text-center text-white bg-green-400 rounded-full">
                                    </div>
                                </div>
                                <div class="flex items-center justify-between text-sm text-gray-400">
                                    <p>
                                        Jumlah Laki-laki
                                    </p>
                                    <p>
                                        {{ $jumlahLakiLaki }}
                                    </p>
                                </div>
                                <div class="w-full h-2 mb-4 bg-blue-100 rounded-full">
                                    <div class="w-1/2 h-full text-xs text-center text-white bg-blue-400 rounded-full">
                                    </div>
                                </div>
                                <div class="flex items-center justify-between text-sm text-gray-400">
                                    <p>
                                        Jumlah Perempuan
                                    </p>
                                    <p>
                                        {{ $jumlahPerempuan }}
                                    </p>
                                </div>
                                <div class="w-full h-2 mb-4 bg-pink-100 rounded-full">
                                    <div class="w-1/2 h-full text-xs text-center text-white bg-pink-400 rounded-full">
                                    </div>
                                </div>
                                <div class="flex items-center justify-between text-sm text-gray-400">
                                    <p>
                                        Warga di bawah 17 tahun
                                    </p>
                                    <p>
                                        {{ $wargaDiBawah17 }}
                                    </p>
                                </div>
                                <div class="w-full h-2 mb-4 bg-yellow-50 rounded-full">
                                    <div
                                        class="w-1/3 h-full text-xs text-center text-white bg-yellow-400 rounded-full">
                                    </div>
                                </div>
                                <div class="flex items-center justify-between text-sm text-gray-400">
                                    <p>
                                        Warga di atas 17 tahun
                                    </p>
                                    <p>
                                        {{ $wargaDiAtas17 }}
                                    </p>
                                </div>
                                <div class="w-full h-2 bg-purple-100 rounded-full">
                                    <div
                                        class="w-2/3 h-full text-xs text-center text-white bg-purple-400 rounded-full">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>



    <!-- Confirmation Modal -->
    <div id="confirmationModal"
        class="fixed inset-0 z-50 flex items-center justify-center hidden bg-black bg-opacity-50">
        <div class="w-64 p-4 m-auto bg-white shadow-lg rounded-2xl dark:bg-gray-800">
            <div class="w-full h-full text-center">
                <div class="flex flex-col justify-between h-full">
                    <svg width="40" height="40" class="w-12 h-12 m-auto mt-4 text-red-500"
                        fill="currentColor" viewBox="0 0 1792 1792" xmlns="http://www.w3.org/2000/svg">
                        <path
                            d="M704 1376v-704q0-14-9-23t-23-9h-64q-14 0-23 9t-9 23v704q0 14 9 23t23 9h64q14 0 23-9t9-23zm256 0v-704q0-14-9-23t-23-9h-64q-14 0-23 9t-9 23v704q0 14 9 23t23 9h64q14 0 23-9t9-23zm256 0v-704q0-14-9-23t-23-9h-64q-14 0-23 9t-9 23v704q0 14 9 23t23 9h64q14 0 23-9t9-23zm-544-992h448l-48-117q-7-9-17-11h-317q-10 2-17 11zm928 32v64q0 14-9 23t-23 9h-96v948q0 83-47 143.5t-113 60.5h-832q-66 0-113-58.5t-47-141.5v-952h-96q-14 0-23-9t-9-23v-64q0-14 9-23t23-9h309l70-167q15-37 54-63t79-26h320q40 0 79 26t54 63l70 167h309q14 0 23 9t9 23z">
                        </path>
                    </svg>
                    <p class="mt-4 text-xl font-bold text-gray-800 dark:text-gray-200">
                        Hapus Data Warga
                    </p>
                    <p class="px-6 py-2 text-xs text-gray-600 dark:text-gray-400">
                        Apakah Anda yakin ingin menghapus data warga ini?
                    </p>
                    <div class="flex items-center justify-between w-full gap-4 mt-8">
                        <form id="deleteForm" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit"
                                class="py-2 px-4  bg-red-600 hover:bg-red-700 focus:ring-red-500 focus:ring-offset-indigo-200 text-white w-full transition ease-in duration-200 text-center text-base font-semibold shadow-md focus:outline-none focus:ring-2 focus:ring-offset-2  rounded-lg">
                                Hapus
                            </button>
                        </form>
                        <button id="cancelDelete" type="button"
                            class="py-2 px-4  bg-white hover:bg-gray-100 focus:ring-indigo-500 focus:ring-offset-indigo-200 text-indigo-500  w-full transition ease-in duration-200 text-center text-base font-semibold shadow-md focus:outline-none focus:ring-2 focus:ring-offset-2  rounded-lg">
                            Batal
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        const onSearch = () => {
            const input = document.querySelector("#search");
            const filter = input.value.toUpperCase();
            const rows = document.querySelectorAll("#list");

            rows.forEach(row => {
                const text = row.textContent.toUpperCase();
                row.style.display = text.includes(filter) ? "" : "none";
            });
        };

        document.addEventListener("DOMContentLoaded", () => {
            const searchInput = document.querySelector("#search");
            searchInput.addEventListener("input", onSearch);
        });
    </script>

</x-app-layout>

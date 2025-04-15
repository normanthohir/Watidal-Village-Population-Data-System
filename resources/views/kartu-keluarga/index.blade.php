<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Kartu Keluarga') }}
        </h2>
    </x-slot>

    @if (session('success'))
        <x-alert-success :message="session('success')" />
    @endif

    <div class="py-8">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 ">
            <div class="bg-white dark:bg-gray-900 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-4 text-gray-900 dark:text-gray-100">
                    {{-- {{ __("You're logged in!") }} --}}
                    <div class="flex">
                        <a href="{{ route('kartu-keluarga.create') }}"
                            class=" mr-6 text-white  bg-orens hover:bg-orens/80 focus:ring-4 focus:outline-none focus:ring-orens/50 font-medium rounded-lg text-sm px-5 py-2.5 text-center inline-flex items-center dark:text-gray-900 dark:bg-hijau dark:hover:bg-hijau/80 dark:focus:ring-hijau/40 me-2 mb-2 ">
                            <svg class="w-5 h-5 text-putih dark:text-gray-900" aria-hidden="true"
                                xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none"
                                viewBox="0 0 24 24">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                    stroke-width="2"
                                    d="M16 12h4m-2 2v-4M4 18v-1a3 3 0 0 1 3-3h4a3 3 0 0 1 3 3v1a1 1 0 0 1-1 1H5a1 1 0 0 1-1-1Zm8-10a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z" />
                            </svg>
                            Tambah
                        </a>
                        <a href="{{ route('kartu-keluarga.export-csv') }}"
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

                        {{-- <a href="{{ route('warga.cetak-pdf') }}"
                            class="bg-blue-500 hover:bg-blue-500/80 flex justify-center  text-white font-medium rounded-lg text-sm px-5 py-2.5 text-center me-2 mb-2">
                            <svg class="w-5 h-5 mr-1 text-putih dark:text-white" aria-hidden="true"
                                xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none"
                                viewBox="0 0 24 24">
                                <path stroke="currentColor" stroke-linejoin="round" stroke-width="2"
                                    d="M16.444 18H19a1 1 0 0 0 1-1v-5a1 1 0 0 0-1-1H5a1 1 0 0 0-1 1v5a1 1 0 0 0 1 1h2.556M17 11V5a1 1 0 0 0-1-1H8a1 1 0 0 0-1 1v6h10ZM7 15h10v4a1 1 0 0 1-1 1H8a1 1 0 0 1-1-1v-4Z" />
                            </svg>
                            Cetak
                        </a> --}}
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="py-6">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 ">
            <div class="bg-white dark:bg-gray-900 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="flex flex-col items-center md:flex-row md:justify-between md:px-5">
                    <h1 class="text-2xl font-semibold mt-6 ml-3 dark:text-putih">Tabel Kartu Kelearga </h1>
                    <form action="{{ route('kartu-keluarga.index') }}" method="GET">
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
                        <table class="w-full  text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
                            <thead
                                class="whitespace-nowrap text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                                <tr>
                                    <th scope="col" class="px-6 py-3">
                                        Nomor KK
                                    </th>
                                    <th scope="col" class="px-6 py-3">
                                        Kepala Keluarga
                                    </th>
                                    <th scope="col" class="px-6 py-3">
                                        Nik Kepala
                                    </th>
                                    <th scope="col" class="px-6 py-3">
                                        Jml. Anggota
                                    </th>
                                    <th scope="col" class="px-6 py-3">
                                        Alamat
                                    </th>
                                    <th scope="col" class="px-6 py-3">
                                        RT
                                    </th>
                                    <th scope="col" class="px-6 py-3">
                                        RW
                                    </th>
                                    <th scope="col" class="px-6 py-3">
                                        Action
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($kartukeluargas as $kartu)
                                    <tr id="list" class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                                        <th scope="row"
                                            class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                            {{ $kartu->nomor_keluarga }}
                                        </th>
                                        <td class="px-6 py-4">
                                            {{ $kartu->kepalaKeluarga->nama_warga }}
                                        </td>
                                        <td class="px-6 py-4">
                                            {{ $kartu->kepalaKeluarga->nik_warga }}
                                        </td>
                                        <td class="px-6 py-4 text-center">
                                            <!-- Logika untuk menghitung jumlah anggota keluarga -->
                                            {{ DB::table('warga_has_kartu_keluarga')->where('id_keluarga', $kartu->id_keluarga)->count() }}

                                        </td>
                                        <td class="px-6 py-4">
                                            {{ $kartu->alamat_keluarga }}
                                        </td>
                                        <td class="px-6 py-4">
                                            {{ $kartu->rt_keluarga }}
                                        </td>
                                        <td class="px-6 py-4">
                                            {{ $kartu->rw_keluarga }}
                                        </td>

                                        <td class="px-6 py-4">
                                            <button id="dropdownDefaultButton-{{ $kartu->id_keluarga }}"
                                                data-dropdown-toggle="dropdownAction-{{ $kartu->id_keluarga }}"
                                                class="p-2 hover:text-gray-300" type="button"><svg
                                                    class="w-6 h-6 text-gray-800 dark:text-white" aria-hidden="true"
                                                    xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                    fill="none" viewBox="0 0 24 24">
                                                    <path stroke="currentColor" stroke-linecap="round"
                                                        stroke-width="2" d="M12 6h.01M12 12h.01M12 18h.01" />
                                                </svg>

                                            </button>
                                            <!-- Dropdown menu -->
                                            <div id="dropdownAction-{{ $kartu->id_keluarga }}"
                                                class="z-10 hidden bg-white divide-y divide-gray-100 rounded-lg shadow w-36 dark:bg-gray-700 absolute">
                                                <ul class="py-2 text-sm text-gray-700 dark:text-gray-200"
                                                    aria-labelledby="dropdownDefaultButton-{{ $kartu->id_keluarga }}">
                                                    <li>
                                                        <a href="{{ route('kartu-keluarga.show', $kartu->id_keluarga) }}"
                                                            class="flex px-4 py-2 text-cyan-500 hover:bg-gray-100 dark:hover:bg-gray-600 "><svg
                                                                class="w-5 h-5 mr-1 text-cyan-500 E"
                                                                aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                                                width="24" height="24" fill="none"
                                                                viewBox="0 0 24 24">
                                                                <path stroke="currentColor" stroke-width="2"
                                                                    d="M21 12c0 1.2-4.03 5-9 5s-9-4.8-9-6c0-1.2 4.03-6 9-6s9 4.8 9 6Z" />
                                                                <path stroke="currentColor" stroke-width="2"
                                                                    d="M15 12a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z" />
                                                            </svg>
                                                            Detail</a>
                                                    </li>
                                                    <li>
                                                        <a href="{{ route('kartu-keluarga.edit', $kartu->id_keluarga) }}"
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
                                                        <a href="{{ route('kartu-keluarga.add-anggota', $kartu->id_keluarga) }}"
                                                            class=" flex px-4 py-2 text-green-400 hover:bg-gray-100 dark:hover:bg-gray-600 ">
                                                            <svg class="w-6 h-6 text-green-400 mr-1 "
                                                                aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                                                width="24" height="24" fill="none"
                                                                viewBox="0 0 24 24">
                                                                <path stroke="currentColor" stroke-linecap="round"
                                                                    stroke-linejoin="round" stroke-width="2"
                                                                    d="M15 9h3m-3 3h3m-3 3h3m-6 1c-.306-.613-.933-1-1.618-1H7.618c-.685 0-1.312.387-1.618 1M4 5h16a1 1 0 0 1 1 1v12a1 1 0 0 1-1 1H4a1 1 0 0 1-1-1V6a1 1 0 0 1 1-1Zm7 5a2 2 0 1 1-4 0 2 2 0 0 1 4 0Z" />
                                                            </svg>

                                                            Edit Keluarga</a>
                                                    </li>
                                                    <li>
                                                        <button
                                                            onclick="showModal('{{ route('kartu-keluarga.destroy', $kartu->id_keluarga) }}')"
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
                            </tbody>
                        </table>
                    </div>
                </div>

                <div class="px-6 pb-6 text-center justify-center">
                    @include('components.pagination', ['paginator' => $kartukeluargas])
                </div>

            </div>
        </div>
    </div>

    <div class="py-4">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 ">
            <div class="bg-white dark:bg-gray-900 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-4 text-gray-900 dark:text-gray-100">
                    <p class="text-md font-semibold" >Total Kartu Keluarga = {{ $totalkk }}</p>
                </div>
            </div>
        </div>
    </div>

    <!-- Confirmation Modal -->
    <div id="confirmationModal"
        class="fixed inset-0 z-50 hidden flex items-center justify-center  bg-black bg-opacity-50">
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
                        Hapus Data Kartu Keluarga
                    </p>
                    <p class="px-6 py-2 text-xs text-gray-600 dark:text-gray-400">
                        Apakah Anda yakin ingin menghapus data keluarga ini?
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

<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Tambah Anggota Keluarga') }}
        </h2>
    </x-slot>

    @if (session('success'))
        <x-alert-success :message="session('success')" />
    @endif

    <div class="py-8">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-900 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <table class="w-full text-base text-left rtl:text-right text-gray-500 dark:text-gray-400">
                        <tr class="bg-gray-100 dark:bg-gray-800 py-3">
                            <th scope="col" class="px-2 py-2">Nomor Kartu Keluarga</th>
                            <td scope="col" class="">:</td>
                            <td scope="col" class="px-2 py-2">{{ $kartuKeluarga->nomor_keluarga }}</td>
                        </tr>
                        <tr class="bg-white dark:bg-gray-900 py-3">
                            <th scope="col" class="px-2 py-2">Kepala Keluarga</th>
                            <td>:</td>
                            <td scope="col" class="px-2 py-2">{{ $kartuKeluarga->kepalaKeluarga->nama_warga }}</td>
                        </tr>
                        <tr class="bg-gray-100 dark:bg-gray-800 py-3">
                            <th scope="col" class="px-2 py-2">NIK Kepala Keluarga</th>
                            <td>:</td>
                            <td scope="col" class="px-2 py-2">{{ $kartuKeluarga->kepalaKeluarga->nik_warga }}</td>
                        </tr>
                    </table>


                    <h2 class="text-2xl font-semibold mb-3 mt-6">Daftar Nama Warga </h2>
                    <form action="{{ route('kartu-keluarga.add-anggota', ['id' => $kartuKeluarga->id_keluarga]) }}"
                        method="POST">
                        @csrf
                        <div class="mb-4 grid grid-cols-7 gap-4 items-start">
                            <label for="id_warga"
                                class="text-sm mt-2 font-medium text-gray-700 dark:text-gray-300 md:col-span-1 col-span-2">Pilih
                                Warga:</label>
                            <div class="md:col-span-6 col-span-5">
                                <input type="text" id="searchInput" oninput="filterOptions()"
                                    placeholder="Cari nama atau NIK..."
                                    class="block w-full py-2 px-3 border border-gray-300 bg-white dark:bg-gray-700 dark:text-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                                <select name="id_warga" id="id_warga" required
                                    class="block w-full py-2 px-3 mt-2 border border-gray-300 bg-white dark:bg-gray-700 dark:text-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                                    <option value="" disabled selected>- Warga -</option>
                                    @foreach ($wargas->sortBy('nama_warga') as $warga)
                                        @if (
                                            !$kartuKeluarga->anggota->contains('id_warga', $warga->id_warga) &&
                                                $warga->id_warga != $kartuKeluarga->id_kepala_keluarga)
                                            <option value="{{ $warga->id_warga }}">{{ $warga->nama_warga }} |
                                                {{ $warga->nik_warga }}</option>
                                        @endif
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <script>
                            const selectElement = document.getElementById('id_warga');
                            const options = selectElement.getElementsByTagName('option');

                            function filterOptions() {
                                const inputValue = document.getElementById('searchInput').value.trim().toLowerCase();

                                for (let i = 0; i < options.length; i++) {
                                    const optionText = options[i].textContent.toLowerCase();
                                    const optionValue = options[i].getAttribute('value');

                                    if (optionValue === null || optionValue === '') {
                                        continue; // Skip if option has no value attribute
                                    }

                                    if (optionText.includes(inputValue)) {
                                        options[i].style.display = 'block';
                                    } else {
                                        options[i].style.display = 'none';
                                    }
                                }
                            }

                            // Event listener untuk memanggil fungsi filter saat input berubah
                            document.getElementById('searchInput').addEventListener('input', filterOptions);
                        </script>

                        <div class="flex justify-start">
                            <button type="submit"
                                class="mt-3 text-white  bg-orens font-semibold hover:bg-orens/80 focus:ring-4 focus:outline-none focus:ring-orens/50 rounded-lg text-sm px-3 py-2.5 text-center inline-flex items-center dark:text-gray-900 dark:bg-hijau dark:hover:bg-hijau/80 dark:focus:ring-hijau/40 me-2 mb-2">
                                <svg class="w-5 h-5 text-putih dark:text-hitam" aria-hidden="true"
                                    xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none"
                                    viewBox="0 0 24 24">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                        stroke-width="2" d="M5 12h14m-7 7V5" />
                                </svg>
                                Tambah Anggota
                            </button>
                        </div>
                    </form>
                </div>
            </div>
            <div class=" py-3 mt-11 bg-white dark:bg-gray-900 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="py-3 px-5 text-gray-900 dark:text-gray-100">
                    <h2 class=" pb-5 text-hitam dark:text-putih text-lg font-semibold">Data Anggota Kartu Keluarga</h2>
                    <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
                        <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
                            <thead
                                class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                                <tr>
                                    <th scope="col" class="px-6 py-3">
                                        Nik
                                    </th>
                                    <th scope="col" class="px-6 py-3">
                                        Nama
                                    </th>
                                    <th scope="col" class="px-6 py-3">
                                        Umur
                                    </th>
                                    <th scope="col" class="px-6 py-3">
                                        Tempat Lahir
                                    </th>
                                    <th scope="col" class="px-6 py-3">
                                        Pendidikan
                                    </th>
                                    <th scope="col" class="px-6 py-3">
                                        Pekerjaan
                                    </th>
                                    <th scope="col" class="px-6 py-3">
                                        Status
                                    </th>
                                    <th scope="col" class="px-6 py-3">
                                        Action
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($kartuKeluarga->anggota as $anggota)
                                    <tr
                                        class="odd:bg-white odd:dark:bg-gray-900 even:bg-gray-50 even:dark:bg-gray-800 border-b dark:border-gray-700">
                                        <th scope="row"
                                            class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                            {{ $anggota->nik_warga }}
                                        </th>
                                        <td class="px-6 py-4">
                                            {{ $anggota->nama_warga }}
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            @php
                                                $tanggal_lahir = new DateTime($anggota->tanggal_lahir_warga);
                                                $umur = $tanggal_lahir->diff(now())->y; // Mendapatkan selisih dalam tahun dengan tanggal sekarang
                                                echo $umur, ' Tahun';
                                            @endphp
                                        </td>
                                        <td class="px-6 py-4">
                                            {{ $anggota->tempat_lahir_warga }}
                                        </td>
                                        <td class="px-6 py-4">
                                            {{ $anggota->pendidikan_terakhir_warga }}
                                        </td>
                                        <td class="px-6 py-4">
                                            {{ $anggota->pekerjaan_warga }}
                                        </td>
                                        <td class="px-6 py-4">
                                            {{ $anggota->status_warga }}
                                        </td>
                                        <td class="px-6 py-4 flex justify-center ">
                                            <a href="/warga/show/{{ $anggota->id_warga }}"
                                                class="w-full flex px-1 py-1 rounded-sm text-blue-500 hover:bg-gray-100 text-left dark:hover:bg-gray-950 transition duration-300">
                                                <svg class="w-5 h-5 text-blue-500" aria-hidden="true"
                                                    xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                    fill="none" viewBox="0 0 24 24">
                                                    <path stroke="currentColor" stroke-linecap="round"
                                                        stroke-linejoin="round" stroke-width="2"
                                                        d="M10 3v4a1 1 0 0 1-1 1H5m8 7.5 2.5 2.5M19 4v16a1 1 0 0 1-1 1H6a1 1 0 0 1-1-1V7.914a1 1 0 0 1 .293-.707l3.914-3.914A1 1 0 0 1 9.914 3H18a1 1 0 0 1 1 1Zm-5 9.5a2.5 2.5 0 1 1-5 0 2.5 2.5 0 0 1 5 0Z" />
                                                </svg>
                                                Detail</a>
                                            <span class="text-hitam dark:text-putih px-1">|</span>
                                            <button
                                                onclick="showModal('{{ route('kartu-keluarga.delete-anggota', ['id' => $kartuKeluarga->id_keluarga, 'id_warga' => $anggota->id_warga]) }}')"
                                                class="w-full flex px-1 py-1 rounded-sm text-red-500 hover:bg-gray-100 text-left dark:hover:bg-gray-950 transition duration-300">
                                                <svg class="w-5 h-5 text-red-500" aria-hidden="true"
                                                    xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                    fill="none" viewBox="0 0 24 24">
                                                    <path stroke="currentColor" stroke-linecap="round"
                                                        stroke-linejoin="round" stroke-width="2"
                                                        d="M5 7h14m-9 3v8m4-8v8M10 3h4a1 1 0 0 1 1 1v3H9V4a1 1 0 0 1 1-1ZM6 7h12v13a1 1 0 0 1-1 1H7a1 1 0 0 1-1-1V7Z" />
                                                </svg>
                                                Hapus
                                            </button>
                                            {{-- <form
                                                action="{{ route('kartu-keluarga.delete-anggota', ['id' => $kartuKeluarga->id_keluarga, 'id_warga' => $anggota->id_warga]) }}"
                                                method="POST"
                                                onsubmit="return confirm('Apakah Anda yakin ingin menghapus anggota ini?');">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit"
                                                    class="text-sm text-red-600 hover:underline font-medium">Hapus</button>
                                            </form> --}}
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
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
                    <svg width="40" height="40" class="w-12 h-12 m-auto mt-4 text-indigo-500"
                        fill="currentColor" viewBox="0 0 1792 1792" xmlns="http://www.w3.org/2000/svg">
                        <path
                            d="M704 1376v-704q0-14-9-23t-23-9h-64q-14 0-23 9t-9 23v704q0 14 9 23t23 9h64q14 0 23-9t9-23zm256 0v-704q0-14-9-23t-23-9h-64q-14 0-23 9t-9 23v704q0 14 9 23t23 9h64q14 0 23-9t9-23zm256 0v-704q0-14-9-23t-23-9h-64q-14 0-23 9t-9 23v704q0 14 9 23t23 9h64q14 0 23-9t9-23zm-544-992h448l-48-117q-7-9-17-11h-317q-10 2-17 11zm928 32v64q0 14-9 23t-23 9h-96v948q0 83-47 143.5t-113 60.5h-832q-66 0-113-58.5t-47-141.5v-952h-96q-14 0-23-9t-9-23v-64q0-14 9-23t23-9h309l70-167q15-37 54-63t79-26h320q40 0 79 26t54 63l70 167h309q14 0 23 9t9 23z">
                        </path>
                    </svg>
                    <p class="mt-4 text-xl font-bold text-gray-800 dark:text-gray-200">
                        Hapus Data Anggota Keluarga
                    </p>
                    <p class="px-6 py-2 text-xs text-gray-600 dark:text-gray-400">
                        Apakah Anda yakin ingin menghapus data anggota keluarga ini?
                    </p>
                    <div class="flex items-center justify-between w-full gap-4 mt-8">
                        <form id="deleteForm" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit"
                                class="py-2 px-4  bg-indigo-600 hover:bg-indigo-700 focus:ring-indigo-500 focus:ring-offset-indigo-200 text-white w-full transition ease-in duration-200 text-center text-base font-semibold shadow-md focus:outline-none focus:ring-2 focus:ring-offset-2  rounded-lg">
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
</x-app-layout>

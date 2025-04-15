<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Detail Kartu Keluarga') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white dark:bg-gray-800 border-b border-gray-200 dark:border-gray-700">
                    <div class="flex justify-end">
                        <a href="{{ route('kartu-keluarga.cetak-detail-pdf', ['id' => $kartu_keluarga->id_keluarga]) }}"
                            class="bg-blue-500 hover:bg-blue-500/80 flex justify-center  text-white font-medium rounded-lg text-sm px-4 py-2 text-center me-2 mb-2">
                            <svg class="w-5 h-5 mr-1 text-putih dark:text-white" aria-hidden="true"
                                xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none"
                                viewBox="0 0 24 24">
                                <path stroke="currentColor" stroke-linejoin="round" stroke-width="2"
                                    d="M16.444 18H19a1 1 0 0 0 1-1v-5a1 1 0 0 0-1-1H5a1 1 0 0 0-1 1v5a1 1 0 0 0 1 1h2.556M17 11V5a1 1 0 0 0-1-1H8a1 1 0 0 0-1 1v6h10ZM7 15h10v4a1 1 0 0 1-1 1H8a1 1 0 0 1-1-1v-4Z" />
                            </svg>
                            Cetak PDF
                        </a>
                    </div>
                    {{-- Section A: Data Pribadi --}}
                    <h3 class="text-lg font-medium text-gray-900 dark:text-gray-300 mb-2">A. Data Pribadi</h3>
                    <table class="min-w-full divide-y divide-gray-200 dark:divide-gray-700">
                        <tbody>
                            <tr class="bg-gray-50 dark:bg-gray-700">
                                <th
                                    class="px-6 py-4 text-left text-xs font-medium text-gray-500 dark:text-gray-300 uppercase tracking-wider">
                                    Nomor Kartu Keluarga</th>
                                <td class="px-6 py-4 text-sm text-gray-900 dark:text-gray-300">:</td>
                                <td class="px-6 py-4 text-sm text-gray-900 dark:text-gray-300">
                                    {{ $kartu_keluarga->nomor_keluarga }}</td>
                            </tr>
                            <tr class="bg-white dark:bg-gray-800">
                                <th
                                    class="px-6 py-4 text-left text-xs font-medium text-gray-500 dark:text-gray-300 uppercase tracking-wider">
                                    Kepala Keluarga</th>
                                <td class="px-6 py-4 text-sm text-gray-900 dark:text-gray-300">:</td>
                                <td class="px-6 py-4 text-sm text-gray-900 dark:text-gray-300">
                                    {{ $kartu_keluarga->kepalaKeluarga->nama_warga }}</td>
                            </tr>
                            <tr class="bg-gray-50 dark:bg-gray-700">
                                <th
                                    class="px-6 py-4 text-left text-xs font-medium text-gray-500 dark:text-gray-300 uppercase tracking-wider">
                                    NIK Kepala Keluarga</th>
                                <td class="px-6 py-4 text-sm text-gray-900 dark:text-gray-300">:</td>
                                <td class="px-6 py-4 text-sm text-gray-900 dark:text-gray-300">
                                    {{ $kartu_keluarga->kepalaKeluarga->nik_warga }}</td>
                            </tr>
                        </tbody>
                    </table>

                    {{-- Section B: Data Alamat --}}
                    <h3 class="text-lg font-medium text-gray-900 dark:text-gray-300 mt-8 mb-2">B. Data Alamat</h3>
                    <table class="min-w-full divide-y divide-gray-200 dark:divide-gray-700">
                        <tbody>
                            <tr class="bg-gray-50 dark:bg-gray-700">
                                <th
                                    class="px-6 py-4 text-left text-xs font-medium text-gray-500 dark:text-gray-300 uppercase tracking-wider">
                                    Alamat</th>
                                <td class="px-6 py-4 text-sm text-gray-900 dark:text-gray-300">:</td>
                                <td class="px-6 py-4 text-sm text-gray-900 dark:text-gray-300">
                                    {{ $kartu_keluarga->alamat_keluarga }}</td>
                            </tr>
                            <tr class="bg-white dark:bg-gray-800">
                                <th
                                    class="px-6 py-4 text-left text-xs font-medium text-gray-500 dark:text-gray-300 uppercase tracking-wider">
                                    RT</th>
                                <td class="px-6 py-4 text-sm text-gray-900 dark:text-gray-300">:</td>
                                <td class="px-6 py-4 text-sm text-gray-900 dark:text-gray-300">
                                    {{ $kartu_keluarga->rt_keluarga }}</td>
                            </tr>
                            <tr class="bg-gray-50 dark:bg-gray-700">
                                <th
                                    class="px-6 py-4 text-left text-xs font-medium text-gray-500 dark:text-gray-300 uppercase tracking-wider">
                                    RW</th>
                                <td class="px-6 py-4 text-sm text-gray-900 dark:text-gray-300">:</td>
                                <td class="px-6 py-4 text-sm text-gray-900 dark:text-gray-300">
                                    {{ $kartu_keluarga->rw_keluarga }}</td>
                            </tr>
                            <tr class="bg-white dark:bg-gray-800">
                                <th
                                    class="px-6 py-4 text-left text-xs font-medium text-gray-500 dark:text-gray-300 uppercase tracking-wider">
                                    Desa/Kelurahan</th>
                                <td class="px-6 py-4 text-sm text-gray-900 dark:text-gray-300">:</td>
                                <td class="px-6 py-4 text-sm text-gray-900 dark:text-gray-300">
                                    {{ $kartu_keluarga->desa_kelurahan_keluarga }}</td>
                            </tr>
                            <tr class="bg-gray-50 dark:bg-gray-700">
                                <th
                                    class="px-6 py-4 text-left text-xs font-medium text-gray-500 dark:text-gray-300 uppercase tracking-wider">
                                    Kecamatan</th>
                                <td class="px-6 py-4 text-sm text-gray-900 dark:text-gray-300">:</td>
                                <td class="px-6 py-4 text-sm text-gray-900 dark:text-gray-300">
                                    {{ $kartu_keluarga->kecamatan_keluarga }}</td>
                            </tr>
                            <tr class="bg-white dark:bg-gray-800">
                                <th
                                    class="px-6 py-4 text-left text-xs font-medium text-gray-500 dark:text-gray-300 uppercase tracking-wider">
                                    Kabupaten/Kota</th>
                                <td class="px-6 py-4 text-sm text-gray-900 dark:text-gray-300">:</td>
                                <td class="px-6 py-4 text-sm text-gray-900 dark:text-gray-300">
                                    {{ $kartu_keluarga->kabupaten_kota_keluarga }}</td>
                            </tr>
                            <tr class="bg-gray-50 dark:bg-gray-700">
                                <th
                                    class="px-6 py-4 text-left text-xs font-medium text-gray-500 dark:text-gray-300 uppercase tracking-wider">
                                    Provinsi</th>
                                <td class="px-6 py-4 text-sm text-gray-900 dark:text-gray-300">:</td>
                                <td class="px-6 py-4 text-sm text-gray-900 dark:text-gray-300">
                                    {{ $kartu_keluarga->provinsi_keluarga }}</td>
                            </tr>
                            <tr class="bg-white dark:bg-gray-800">
                                <th
                                    class="px-6 py-4 text-left text-xs font-medium text-gray-500 dark:text-gray-300 uppercase tracking-wider">
                                    Kode Pos</th>
                                <td class="px-6 py-4 text-sm text-gray-900 dark:text-gray-300">:</td>
                                <td class="px-6 py-4 text-sm text-gray-900 dark:text-gray-300">
                                    {{ $kartu_keluarga->kode_pos_keluarga }}</td>
                            </tr>
                        </tbody>
                    </table>

                    {{-- Section C: Data Aplikasi --}}
                    <h3 class="text-lg font-medium text-gray-900 dark:text-gray-300 mt-8 mb-2">C. Data Aplikasi</h3>
                    <table class="min-w-full divide-y divide-gray-200 dark:divide-gray-700">
                        <tbody>
                            <tr class="bg-gray-50 dark:bg-gray-700">
                                <th
                                    class="px-6 py-4 text-left text-xs font-medium text-gray-500 dark:text-gray-300 uppercase tracking-wider">
                                    Diinput oleh</th>
                                <td class="px-6 py-4 text-sm text-gray-900 dark:text-gray-300">:</td>
                                <td class="px-6 py-4 text-sm text-gray-900 dark:text-gray-300">
                                    {{ $kartu_keluarga->user->name }}</td>
                            </tr>
                            <tr class="bg-white dark:bg-gray-800">
                                <th
                                    class="px-6 py-4 text-left text-xs font-medium text-gray-500 dark:text-gray-300 uppercase tracking-wider">
                                    Diinput</th>
                                <td class="px-6 py-4 text-sm text-gray-900 dark:text-gray-300">:</td>
                                <td class="px-6 py-4 text-sm text-gray-900 dark:text-gray-300">
                                    {{ $kartu_keluarga->created_at->format('d-m-Y H:i:s') }}</td>
                            </tr>
                            <tr class="bg-gray-50 dark:bg-gray-700">
                                <th
                                    class="px-6 py-4 text-left text-xs font-medium text-gray-500 dark:text-gray-300 uppercase tracking-wider">
                                    Diperbaharui</th>
                                <td class="px-6 py-4 text-sm text-gray-900 dark:text-gray-300">:</td>
                                <td class="px-6 py-4 text-sm text-gray-900 dark:text-gray-300">
                                    {{ $kartu_keluarga->updated_at->format('d-m-Y H:i:s') }}</td>
                            </tr>
                        </tbody>
                    </table>

                    {{-- Section D: Data Anggota Kartu Keluarga --}}
                    <h3 class="text-lg font-medium text-gray-900 dark:text-gray-300 mt-8 mb-2">D. Data Anggota Kartu Keluarga
                    </h3>
                    <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
                        <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
                            <thead
                                class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                                <tr>
                                    <th class="px-6 py-3 whitespace-nowrap">
                                        #</th>
                                    <th class="px-6 py-3 whitespace-nowrap">
                                        NIK</th>
                                    <th class="px-6 py-3 whitespace-nowrap">
                                        Nama Warga</th>
                                    <th class="px-6 py-3 whitespace-nowrap">
                                        Tempat Lahir</th>
                                    <th class="px-6 py-3 whitespace-nowrap">
                                        Lahir</th>
                                    <th class="px-6 py-3 whitespace-nowrap">
                                        Pendidikan</th>
                                    <th class="px-6 py-3 whitespace-nowrap">
                                        Pekerjaan</th>
                                    <th class="px-6 py-3 whitespace-nowrap">
                                        Kawin</th>
                                    <th class="px-6 py-3 whitespace-nowrap">
                                        Status</th>
                                    <th class="px-6 py-3 whitespace-nowrap">
                                        Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($kartu_keluarga->anggota as $index => $anggota)
                                    <tr class="odd:bg-white odd:dark:bg-gray-900 even:bg-gray-50 even:dark:bg-gray-800 border-b dark:border-gray-700">
                                        <td
                                            class="px-6 py-4 whitespace-nowrap">
                                            {{ $index + 1 }}</td>
                                        <td
                                            class="px-6 py-4 whitespace-nowrap">
                                            {{ $anggota->nik_warga }}</td>
                                        <td
                                            class="px-6 py-4 whitespace-nowrap">
                                            {{ $anggota->nama_warga }}</td>
                                        <td
                                            class="px-6 py-4 whitespace-nowrap">
                                            {{ $anggota->tempat_lahir_warga }}</td>
                                        <td
                                            class="px-6 py-4 whitespace-nowrap">
                                            {{ $anggota->tanggal_lahir_warga != '0000-00-00' ? date('d-m-Y', strtotime($anggota->tanggal_lahir_warga)) : '' }}
                                        </td>
                                        <td
                                            class="px-6 py-4 whitespace-nowrap">
                                            {{ $anggota->pendidikan_terakhir_warga }}</td>
                                        <td
                                            class="px-6 py-4 whitespace-nowrap">
                                            {{ $anggota->pekerjaan_warga }}</td>
                                        <td
                                            class="px-6 py-4 whitespace-nowrap">
                                            {{ $anggota->status_perkawinan_warga }}</td>
                                        <td
                                            class="px-6 py-4 whitespace-nowrap">
                                            {{ $anggota->status_warga }}</td>
                                        <td>
                                            
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>

                    </div>
                </div>
            </div>
        </div>
</x-app-layout>

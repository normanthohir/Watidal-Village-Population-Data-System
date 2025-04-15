<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Detail Warga') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg transition-colors duration-300">
                <div class="p-6 bg-white dark:bg-gray-900 border-b border-gray-200 dark:border-gray-700">
                    <div class="flex justify-end">
                        <a href="{{ route('warga.cetak-detail-pdf', ['id' => $warga->id_warga]) }}"
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
                                    NIK</th>
                                <td class="px-6 py-4 text-sm text-gray-900 dark:text-gray-300">:</td>
                                <td class="px-6 py-4 text-sm text-gray-900 dark:text-gray-300">
                                    {{ $warga->nik_warga }}</td>
                            </tr>
                            <tr class="bg-white dark:bg-gray-800">
                                <th
                                    class="px-6 py-4 text-left text-xs font-medium text-gray-500 dark:text-gray-300 uppercase tracking-wider">
                                    Nama</th>
                                <td class="px-6 py-4 text-sm text-gray-900 dark:text-gray-300">:</td>
                                <td class="px-6 py-4 text-sm text-gray-900 dark:text-gray-300">
                                    {{ $warga->nama_warga }}</td>
                            </tr>
                            <tr class="bg-gray-50 dark:bg-gray-700">
                                <th
                                    class="px-6 py-4 text-left text-xs font-medium text-gray-500 dark:text-gray-300 uppercase tracking-wider">
                                    Tempat Lahir</th>
                                <td class="px-6 py-4 text-sm text-gray-900 dark:text-gray-300">:</td>
                                <td class="px-6 py-4 text-sm text-gray-900 dark:text-gray-300">
                                    {{ $warga->tempat_lahir_warga }}</td>
                            </tr>
                            <tr class="bg-white dark:bg-gray-800">
                                <th
                                    class="px-6 py-4 text-left text-xs font-medium text-gray-500 dark:text-gray-300 uppercase tracking-wider">
                                    Tanggal Lahir</th>
                                <td class="px-6 py-4 text-sm text-gray-900 dark:text-gray-300">:</td>
                                <td class="px-6 py-4 text-sm text-gray-900 dark:text-gray-300">
                                    {{ $warga->tanggal_lahir_warga }}</td>
                            </tr>
                            <tr class="bg-gray-50 dark:bg-gray-700">
                                <th
                                    class="px-6 py-4 text-left text-xs font-medium text-gray-500 dark:text-gray-300 uppercase tracking-wider">
                                    Jenis Kelamin</th>
                                <td class="px-6 py-4 text-sm text-gray-900 dark:text-gray-300">:</td>
                                <td class="px-6 py-4 text-sm text-gray-900 dark:text-gray-300">
                                    @if ($warga->jenis_kelamin_warga === 'L')
                                        Laki-laki
                                    @else
                                        @if ($warga->jenis_kelamin_warga === 'P')
                                            Perempuan
                                        @endif
                                    @endif
                                </td>
                            </tr>
                            <tr class="bg-white dark:bg-gray-800">
                                <th
                                    class="px-6 py-4 text-left text-xs font-medium text-gray-500 dark:text-gray-300 uppercase tracking-wider">
                                    Alamat KTP</th>
                                <td class="px-6 py-4 text-sm text-gray-900 dark:text-gray-300">:</td>
                                <td class="px-6 py-4 text-sm text-gray-900 dark:text-gray-300">
                                    {{ $warga->alamat_ktp_warga }}</td>
                            </tr>
                            <tr class="bg-gray-50 dark:bg-gray-700">
                                <th
                                    class="px-6 py-4 text-left text-xs font-medium text-gray-500 dark:text-gray-300 uppercase tracking-wider">
                                    Alamat</th>
                                <td class="px-6 py-4 text-sm text-gray-900 dark:text-gray-300">:</td>
                                <td class="px-6 py-4 text-sm text-gray-900 dark:text-gray-300">
                                    {{ $warga->alamat_warga }}</td>
                            </tr>
                            <tr class="bg-white dark:bg-gray-800">
                                <th
                                    class="px-6 py-4 text-left text-xs font-medium text-gray-500 dark:text-gray-300 uppercase tracking-wider">
                                    Desa/Kelurahan</th>
                                <td class="px-6 py-4 text-sm text-gray-900 dark:text-gray-300">:</td>
                                <td class="px-6 py-4 text-sm text-gray-900 dark:text-gray-300">
                                    {{ $warga->desa_kelurahan_warga }}</td>
                            </tr>
                            <tr class="bg-gray-50 dark:bg-gray-700">
                                <th
                                    class="px-6 py-4 text-left text-xs font-medium text-gray-500 dark:text-gray-300 uppercase tracking-wider">
                                    Kecamatan</th>
                                <td class="px-6 py-4 text-sm text-gray-900 dark:text-gray-300">:</td>
                                <td class="px-6 py-4 text-sm text-gray-900 dark:text-gray-300">
                                    {{ $warga->kecamatan_warga }}</td>
                            </tr>
                            <tr class="bg-white dark:bg-gray-800">
                                <th
                                    class="px-6 py-4 text-left text-xs font-medium text-gray-500 dark:text-gray-300 uppercase tracking-wider">
                                    Kabupaten/Kota</th>
                                <td class="px-6 py-4 text-sm text-gray-900 dark:text-gray-300">:</td>
                                <td class="px-6 py-4 text-sm text-gray-900 dark:text-gray-300">
                                    {{ $warga->kabupaten_kota_warga }}</td>
                            </tr>
                            <tr class="bg-gray-50 dark:bg-gray-700">
                                <th
                                    class="px-6 py-4 text-left text-xs font-medium text-gray-500 dark:text-gray-300 uppercase tracking-wider">
                                    Provinsi</th>
                                <td class="px-6 py-4 text-sm text-gray-900 dark:text-gray-300">:</td>
                                <td class="px-6 py-4 text-sm text-gray-900 dark:text-gray-300">
                                    {{ $warga->provinsi_warga }}</td>
                            </tr>
                            <tr class="bg-white dark:bg-gray-800">
                                <th
                                    class="px-6 py-4 text-left text-xs font-medium text-gray-500 dark:text-gray-300 uppercase tracking-wider">
                                    RT</th>
                                <td class="px-6 py-4 text-sm text-gray-900 dark:text-gray-300">:</td>
                                <td class="px-6 py-4 text-sm text-gray-900 dark:text-gray-300">
                                    {{ $warga->rt_warga }}</td>
                            </tr>
                            <tr class="bg-gray-50 dark:bg-gray-700">
                                <th
                                    class="px-6 py-4 text-left text-xs font-medium text-gray-500 dark:text-gray-300 uppercase tracking-wider">
                                    RW</th>
                                <td class="px-6 py-4 text-sm text-gray-900 dark:text-gray-300">:</td>
                                <td class="px-6 py-4 text-sm text-gray-900 dark:text-gray-300">
                                    {{ $warga->rw_warga }}</td>
                            </tr>
                            <tr class="bg-white dark:bg-gray-800">
                                <th
                                    class="px-6 py-4 text-left text-xs font-medium text-gray-500 dark:text-gray-300 uppercase tracking-wider">
                                    Agama</th>
                                <td class="px-6 py-4 text-sm text-gray-900 dark:text-gray-300">:</td>
                                <td class="px-6 py-4 text-sm text-gray-900 dark:text-gray-300">
                                    {{ $warga->agama_warga }}</td>
                            </tr>
                            <tr class="bg-gray-50 dark:bg-gray-700">
                                <th
                                    class="px-6 py-4 text-left text-xs font-medium text-gray-500 dark:text-gray-300 uppercase tracking-wider">
                                    Pendidikan Terakhir</th>
                                <td class="px-6 py-4 text-sm text-gray-900 dark:text-gray-300">:</td>
                                <td class="px-6 py-4 text-sm text-gray-900 dark:text-gray-300">
                                    {{ $warga->pendidikan_terakhir_warga }}</td>
                            </tr>
                            <tr class="bg-white dark:bg-gray-800">
                                <th
                                    class="px-6 py-4 text-left text-xs font-medium text-gray-500 dark:text-gray-300 uppercase tracking-wider">
                                    Pekerjaan</th>
                                <td class="px-6 py-4 text-sm text-gray-900 dark:text-gray-300">:</td>
                                <td class="px-6 py-4 text-sm text-gray-900 dark:text-gray-300">
                                    {{ $warga->pekerjaan_warga }}</td>
                            </tr>
                            <tr class="bg-gray-50 dark:bg-gray-700">
                                <th
                                    class="px-6 py-4 text-left text-xs font-medium text-gray-500 dark:text-gray-300 uppercase tracking-wider">
                                    Status Perkawinan</th>
                                <td class="px-6 py-4 text-sm text-gray-900 dark:text-gray-300">:</td>
                                <td class="px-6 py-4 text-sm text-gray-900 dark:text-gray-300">
                                    {{ $warga->status_perkawinan_warga }}</td>
                            </tr>
                            <tr class="bg-white dark:bg-gray-800">
                                <th
                                    class="px-6 py-4 text-left text-xs font-medium text-gray-500 dark:text-gray-300 uppercase tracking-wider">
                                    Status</th>
                                <td class="px-6 py-4 text-sm text-gray-900 dark:text-gray-300">:</td>
                                <td class="px-6 py-4 text-sm text-gray-900 dark:text-gray-300">
                                    {{ $warga->status_warga }}</td>
                            </tr>

                            
                        </tbody>
                    </table>
                    {{-- {-- Section C: Data Aplikasi --}}
                    <h3 class="text-lg font-medium text-gray-900 dark:text-gray-300 mt-16 mb-2">B. Data Aplikasi</h3>
                    <table class="min-w-full divide-y divide-gray-200 dark:divide-gray-700">
                        <tbody>
                            <tr class="bg-gray-50 dark:bg-gray-700">
                                <th
                                    class="px-6 py-4 text-left text-xs font-medium text-gray-500 dark:text-gray-300 uppercase tracking-wider">
                                    Diinput oleh</th>
                                <td class="px-6 py-4 text-sm text-gray-900 dark:text-gray-300">:</td>
                                <td class="px-6 py-4 text-sm text-gray-900 dark:text-gray-300">
                                    {{ $warga->user->name }}</td>
                            </tr>
                            <tr class="bg-white dark:bg-gray-800">
                                <th
                                    class="px-6 py-4 text-left text-xs font-medium text-gray-500 dark:text-gray-300 uppercase tracking-wider">
                                    Diinput</th>
                                <td class="px-6 py-4 text-sm text-gray-900 dark:text-gray-300">:</td>
                                <td class="px-6 py-4 text-sm text-gray-900 dark:text-gray-300">
                                    {{ $warga->created_at->format('d-m-Y H:i:s') }}</td>
                            </tr>
                            <tr class="bg-gray-50 dark:bg-gray-700">
                                <th
                                    class="px-6 py-4 text-left text-xs font-medium text-gray-500 dark:text-gray-300 uppercase tracking-wider">
                                    Diperbaharui</th>
                                <td class="px-6 py-4 text-sm text-gray-900 dark:text-gray-300">:</td>
                                <td class="px-6 py-4 text-sm text-gray-900 dark:text-gray-300">
                                    {{ $warga->updated_at->format('d-m-Y H:i:s') }}</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>

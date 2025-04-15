<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight transition-colors duration-300">
            {{ __('Detail Data Mutasi') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 ">
            <div class="bg-white dark:bg-gray-900 overflow-hidden shadow-lg sm:rounded-lg transition-all duration-300 transform ">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-6">
                        <div class="mb-4">
                            <strong>NIK:</strong> <span class="block text-lg">{{ $mutasi->nik_mutasi }}</span>
                        </div>
                        <div class="mb-4">
                            <strong>Nama:</strong> <span class="block text-lg">{{ $mutasi->nama_mutasi }}</span>
                        </div>
                        <div class="mb-4">
                            <strong>Tempat Lahir:</strong> <span class="block text-lg">{{ $mutasi->tempat_lahir_mutasi }}</span>
                        </div>
                        <div class="mb-4">
                            <strong>Tanggal Lahir:</strong> <span class="block text-lg">{{ $mutasi->tanggal_lahir_mutasi }}</span>
                        </div>
                        <div class="mb-4">
                            <strong>Jenis Kelamin:</strong> <span class="block text-lg">{{ $mutasi->jenis_kelamin_mutasi }}</span>
                        </div>
                        <div class="mb-4">
                            <strong>Alamat KTP:</strong> <span class="block text-lg">{{ $mutasi->alamat_ktp_mutasi }}</span>
                        </div>
                        <div class="mb-4">
                            <strong>Alamat:</strong> <span class="block text-lg">{{ $mutasi->alamat_mutasi }}</span>
                        </div>
                        <div class="mb-4">
                            <strong>Desa/Kelurahan:</strong> <span class="block text-lg">{{ $mutasi->desa_kelurahan_mutasi }}</span>
                        </div>
                        <div class="mb-4">
                            <strong>Kecamatan:</strong> <span class="block text-lg">{{ $mutasi->kecamatan_mutasi }}</span>
                        </div>
                        <div class="mb-4">
                            <strong>Kabupaten/Kota:</strong> <span class="block text-lg">{{ $mutasi->kabupaten_kota_mutasi }}</span>
                        </div>
                        <div class="mb-4">
                            <strong>Provinsi:</strong> <span class="block text-lg">{{ $mutasi->provinsi_mutasi }}</span>
                        </div>
                        <div class="mb-4">
                            <strong>RT:</strong> <span class="block text-lg">{{ $mutasi->rt_mutasi }}</span>
                        </div>
                        <div class="mb-4">
                            <strong>RW:</strong> <span class="block text-lg">{{ $mutasi->rw_mutasi }}</span>
                        </div>
                        <div class="mb-4">
                            <strong>Agama:</strong> <span class="block text-lg">{{ $mutasi->agama_mutasi }}</span>
                        </div>
                        <div class="mb-4">
                            <strong>Pendidikan Terakhir:</strong> <span class="block text-lg">{{ $mutasi->pendidikan_terakhir_mutasi }}</span>
                        </div>
                        <div class="mb-4">
                            <strong>Pekerjaan:</strong> <span class="block text-lg">{{ $mutasi->pekerjaan_mutasi }}</span>
                        </div>
                        <div class="mb-4">
                            <strong>Status Perkawinan:</strong> <span class="block text-lg">{{ $mutasi->status_perkawinan_mutasi }}</span>
                        </div>
                        <div class="mb-4">
                            <strong>Status:</strong> <span class="block text-lg">{{ $mutasi->status_mutasi }}</span>
                        </div>
                    </div>
                    <div class="mt-6">
                        <a href="{{ route('mutasi.index') }}" class="inline-flex items-center px-4 py-2 bg-blue-500 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-blue-700 active:bg-blue-900 focus:outline-none focus:border-blue-900 focus:ring ring-blue-300 transition ease-in-out duration-150">
                            Back to List
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>

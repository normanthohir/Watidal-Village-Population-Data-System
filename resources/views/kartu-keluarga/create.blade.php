<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Tambah Kartu Keluarga') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <form action="{{ route('kartu-keluarga.store') }}" method="POST">
            <div class="md:flex max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class=" md:w-5/6 p-6 bg-white dark:bg-gray-800 overflow-hidden shadow-md sm:rounded-lg">
                    @csrf
                    <h3 class="text-lg font-medium text-gray-900 dark:text-gray-300">A. Data Pribadi</h3>
                    <div class="mt-4">
                        <x-input-label for="nomor_keluarga" :value="__('Nomor Kartu Keluarga')" />
                        <x-text-input id="nomor_keluarga" class="block mt-1 w-full" type="text" name="nomor_keluarga"
                            :value="old('nomor_keluarga')" />
                        <x-input-error :messages="$errors->get('nomor_keluarga')" class="mt-2" />
                    </div>
                    <div class="mt-4">
                        <x-input-label for="id_kepala_keluarga" :value="__('ID Kepala Keluarga')" />
                        <select id="id_kepala_keluarga" name="id_kepala_keluarga"
                            class="block mt-1 w-full border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm">
                            <option value="" selected disabled>- pilih -</option>
                            @foreach ($data_warga as $warga)
                                <option value="{{ $warga->id_warga }}"
                                    {{ old('id_kepala_keluarga') == $warga->id_warga ? 'selected' : '' }}>
                                    {{ $warga->nama_warga }} (NIK: {{ $warga->nik_warga }})
                                </option>
                            @endforeach
                        </select>
                        <x-input-error :messages="$errors->get('id_kepala_keluarga')" class="mt-2" />
                    </div>

                    <h3 class="text-lg font-medium text-gray-900 dark:text-gray-300 mt-8">B. Data Alamat</h3>
                    <div class="mt-4">
                        <x-input-label for="alamat_keluarga" :value="__('Alamat:')" />
                        <textarea id="alamat_keluarga" name="alamat_keluarga"
                            class="block mt-1 w-full h-20 resize-none border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm">{{ old('alamat_keluarga') }}</textarea>
                        <x-input-error :messages="$errors->get('alamat_keluarga')" class="mt-2" />
                    </div>
                    <div class="mt-4">
                        <x-input-label for="desa_kelurahan_keluarga" :value="__('Desa/Kelurahan')" />
                        <x-text-input id="desa_kelurahan_keluarga" class="block mt-1 w-full" type="text"
                            name="desa_kelurahan_keluarga" :value="old('nomor_keluarga')" />
                        <x-input-error :messages="$errors->get('desa_kelurahan_keluarga')" class="mt-2" />
                    </div>
                    <div class="mt-4">
                        <x-input-label for="kecamatan_keluarga" :value="__('Kecamatan')" />
                        <x-text-input id="kecamatan_keluarga" class="block mt-1 w-full" type="text"
                            name="kecamatan_keluarga" :value="old('nomor_keluarga')" />
                        <x-input-error :messages="$errors->get('kecamatan_keluarga')" class="mt-2" />
                    </div>
                    <div class="mt-4">
                        <x-input-label for="kabupaten_kota_keluarga" :value="__('Kabupaten/Kota')" />
                        <x-text-input id="kabupaten_kota_keluarga" class="block mt-1 w-full" type="text"
                            name="kabupaten_kota_keluarga" :value="old('nomor_keluarga')" />
                        <x-input-error :messages="$errors->get('kabupaten_kota_keluarga')" class="mt-2" />
                    </div>
                    <div class="mt-4">
                        <x-input-label for="provinsi_keluarga" :value="__('Provinsi')" />
                        <x-text-input id="provinsi_keluarga" class="block mt-1 w-full" type="text"
                            name="provinsi_keluarga" :value="old('provinsi_keluarga')" />
                        <x-input-error :messages="$errors->get('provinsi_keluarga')" class="mt-2" />
                    </div>
                    {{-- <div class="mt-4">
                            <x-input-label for="negara_keluarga" :value="__('Negara')" />
                            <x-text-input id="negara_keluarga" class="block mt-1 w-full" type="text" name="negara_keluarga" value="{{ Auth::user()->negara_user }}"  />
                        </div> --}}
                    <div class="mt-4">
                        <x-input-label for="rt_keluarga" :value="__('RT')" />
                        <x-text-input id="rt_keluarga" class="block mt-1 w-full" type="text" name="rt_keluarga"
                            :value="old('rt_keluarga')" />
                        <x-input-error :messages="$errors->get('rt_keluarga')" class="mt-2" />
                    </div>
                    <div class="mt-4">
                        <x-input-label for="rw_keluarga" :value="__('RW')" />
                        <x-text-input id="rw_keluarga" class="block mt-1 w-full" type="text" name="rw_keluarga"
                            :value="old('rw_keluarga')" />
                        <x-input-error :messages="$errors->get('rw_keluarga')" class="mt-2" />
                    </div>
                    <div class="mt-4">
                        <x-input-label for="kode_pos_keluarga" :value="__('Kode Pos')" />
                        <x-text-input id="kode_pos_keluarga" class="block mt-1 w-full" type="text"
                            name="kode_pos_keluarga" :value="old('kode_pos_keluarga')" />
                        <x-input-error :messages="$errors->get('kode_pos_keluarga')" class="mt-2" />
                    </div>
                </div>
                <div class="md:w-2/6">
                    <div class="md:mt-5 mt-2  md:ml-0 flex items-center justify-center">
                        <button type="submit"
                            class="text-white bg-gradient-to-r shadow-lg hover:bg-gradient-to-br shadow-orens/50 dark:shadow-hijau/50 bg-orens hover:bg-orens/80 focus:ring-4 focus:outline-none focus:ring-orens/50 font-medium rounded-lg text-sm px-5 py-2.5 text-center inline-flex items-center dark:bg-hijau dark:text-hitam dark:hover:bg-hijau/80 dark:focus:ring-hijau/40 me-2 mb-2 ">Simpan</button>

                        <a href="{{ route('kartu-keluarga.index') }}"
                            class="text-white bg-gradient-to-r shadow-lg hover:bg-gradient-to-br shadow-gray-500/50 bg-gray-500 hover:bg-gray-500/80 focus:ring-4 focus:outline-none focus:ring-gray-500/50 font-medium rounded-lg text-sm px-5 py-2.5 text-center inline-flex items-center dark:hover:bg-gray-500/80 dark:focus:ring-gray-500/40 me-2 mb-2 ">
                            Kembali
                        </a>
                    </div>
                </div>
            </div>
        </form>
    </div>

</x-app-layout>

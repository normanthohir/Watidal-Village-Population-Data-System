<x-app-layout>
    {{-- <x-auth-card> --}}
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Tambah data Warga') }}
        </h2>
    </x-slot>

    <div class="py-6 ">
        <form method="POST" action="{{ route('warga.store') }}">
            <div class=" md:flex max-w-7xl mx-auto sm:px-2 lg:px-8">
                <div class="md:w-5/6 bg-white dark:bg-gray-900 overflow-hidden shadow-sm sm:rounded-lg px-14 pt-8 pb-6 transition-colors duration-300">
                    @csrf

                    <!-- NIK -->
                    <div>
                        <x-input-label for="nik_warga" :value="__('NIK:')" />
                        <x-text-input id="nik_warga" class="block mt-1 w-full" type="text" name="nik_warga"
                            :value="old('nik_warga')" autofocus />
                        <x-input-error :messages="$errors->get('nik_warga')" class="mt-2" />
                    </div>

                    <!-- Nama -->
                    <div class="mt-4">
                        <x-input-label for="nama_warga" :value="__('Nama:')" />

                        <x-text-input id="nama_warga" class="block mt-1 w-full" type="text" name="nama_warga"
                            :value="old('nama_warga')" />
                        <x-input-error :messages="$errors->get('nama_warga')" class="mt-2" />
                    </div>

                    <!-- Tempat Lahir -->
                    <div class="mt-4">
                        <x-input-label for="tempat_lahir_warga" :value="__('Tempat Lahir:')" />

                        <x-text-input id="tempat_lahir_warga" class="block mt-1 w-full" type="text"
                            name="tempat_lahir_warga" :value="old('tempat_lahir_warga')" />
                        <x-input-error :messages="$errors->get('tempat_lahir_warga')" class="mt-2" />
                    </div>

                    <!-- Tanggal Lahir -->
                    <div class="mt-4">
                        <x-input-label for="tanggal_lahir_warga" :value="__('Tanggal Lahir:')" />

                        <x-text-input id="tanggal_lahir_warga" class="block mt-1 w-full" type="date"
                            name="tanggal_lahir_warga" :value="old('tanggal_lahir_warga')" />
                        <x-input-error :messages="$errors->get('tanggal_lahir_warga')" class="mt-2" />
                    </div>
                    <!-- Jenis Kelamin -->
                    <div class="mt-4">
                        <x-input-label for="jenis_kelamin_warga" :value="__('Jenis Kelamin:')" />

                        <select id="jenis_kelamin_warga" name="jenis_kelamin_warga"
                            class="block mt-1 w-full border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm">
                            <option selected>Pilih Jenis Kelmain</option>
                            <option class="p-3" value="L"
                                {{ old('jenis_kelamin_warga') == 'L' ? 'selected' : '' }}>Laki-laki
                            </option>
                            <option class="p-3" value="P"
                                {{ old('jenis_kelamin_warga') == 'P' ? 'selected' : '' }}>Perempuan
                            </option>
                        </select>
                    </div>

                    <!-- Alamat KTP -->
                    <div class="mt-4">
                        <x-input-label for="alamat_ktp_warga" :value="__('Alamat KTP:')" />
                        <textarea id="alamat_ktp_warga" name="alamat_ktp_warga"
                            class="block mt-1 w-full h-20 resize-none border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm">{{ old('alamat_ktp_warga') }}</textarea>
                        <x-input-error :messages="$errors->get('alamat_ktp_warga')" class="mt-2" />
                    </div>

                    <!-- Alamat -->
                    <div class="mt-4">
                        <x-input-label for="alamat_warga" :value="__('Alamat:')" />
                        <textarea id="alamat_warga" name="alamat_warga"
                            class="block mt-1 w-full h-20 resize-none border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm">{{ old('alamat_warga') }}</textarea>
                        <x-input-error :messages="$errors->get('alamat_warga')" class="mt-2" />
                    </div>

                    <!-- Desa/Kelurahan -->
                    <div class="mt-4">
                        <x-input-label for="desa_kelurahan_warga" :value="__('Desa/Kelurahan:')" />

                        <x-text-input id="desa_kelurahan_warga" class="block mt-1 w-full" type="text"
                            name="desa_kelurahan_warga" :value="old('desa_kelurahan_warga')" />
                        <x-input-error :messages="$errors->get('desa_kelurahan_warga')" class="mt-2" />
                    </div>

                    <!-- Kecamatan -->
                    <div class="mt-4">
                        <x-input-label for="kecamatan_warga" :value="__('Kecamatan:')" />

                        <x-text-input id="kecamatan_warga" class="block mt-1 w-full" type="text"
                            name="kecamatan_warga" :value="old('kecamatan_warga')" />
                        <x-input-error :messages="$errors->get('kecamatan_warga')" class="mt-2" />
                    </div>

                    <!-- Kabupaten/Kota -->
                    <div class="mt-4">
                        <x-input-label for="kabupaten_kota_warga" :value="__('Kabupaten/Kota:')" />
                        <x-text-input id="kabupaten_kota_warga" class="block mt-1 w-full" type="text"
                            name="kabupaten_kota_warga" :value="old('kabupaten_kota_warga')" />
                        <x-input-error :messages="$errors->get('kabupaten_kota_warga')" class="mt-2" />
                    </div>

                    <!-- Provinsi -->
                    <div class="mt-4">
                        <x-input-label for="provinsi_warga" :value="__('Provinsi:')" />

                        <x-text-input id="provinsi_warga" class="block mt-1 w-full" type="text" name="provinsi_warga"
                            :value="old('provinsi_warga')" />
                        <x-input-error :messages="$errors->get('provinsi_warga')" class="mt-2" />
                    </div>

                    <!-- RT -->
                    <div class="mt-4">
                        <x-input-label for="rt_warga" :value="__('RT:')" />

                        <x-text-input id="rt_warga" class="block mt-1 w-full" type="text" name="rt_warga"
                            :value="old('rt_warga')" />
                        <x-input-error :messages="$errors->get('rt_warga')" class="mt-2" />
                    </div>

                    <!-- RW -->
                    <div class="mt-4">
                        <x-input-label for="rw_warga" :value="__('RW:')" />

                        <x-text-input id="rw_warga" class="block mt-1 w-full" type="text" name="rw_warga"
                            :value="old('rw_warga')" />
                        <x-input-error :messages="$errors->get('rw_warga')" class="mt-2" />
                    </div>

                    <!-- Agama -->
                    <div class="mt-4">
                        <x-input-label for="agama_warga" :value="__('Agama:')" />

                        <x-text-input id="agama_warga" class="block mt-1 w-full" type="text" name="agama_warga"
                            :value="old('agama_warga')" />
                        <x-input-error :messages="$errors->get('agama_warga')" class="mt-2" />
                    </div>

                    <!-- Pendidikan Terakhir -->
                    <div class="mt-4">
                        <x-input-label for="pendidikan_terakhir_warga" :value="__('Pendidikan Terakhir:')" />

                        <x-text-input id="pendidikan_terakhir_warga" class="block mt-1 w-full" type="text"
                            name="pendidikan_terakhir_warga" :value="old('pendidikan_terakhir_warga')" />
                        <x-input-error :messages="$errors->get('pendidikan_terakhir_warga')" class="mt-2" />
                    </div>

                    <!-- Pekerjaan -->
                    <div class="mt-4">
                        <x-input-label for="pekerjaan_warga" :value="__('Pekerjaan:')" />

                        <x-text-input id="pekerjaan_warga" class="block mt-1 w-full" type="text"
                            name="pekerjaan_warga" :value="old('pekerjaan_warga')" />
                        <x-input-error :messages="$errors->get('pekerjaan_warga')" class="mt-2" />
                    </div>

                    <!-- Status Perkawinan -->
                    <div class="mt-4">
                        <x-input-label for="status_perkawinan_warga" :value="__('Status Perkawinan:')" />

                        <select id="status_perkawinan_warga" name="status_perkawinan_warga"
                            class="block mt-1 w-full border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm">
                            <option selected>Pilih Status Perkawinan</option>
                            <option value="Belum Kawin"
                                {{ old('status_perkawinan_warga') == 'Belum Kawin' ? 'selected' : '' }}>Belum Kawin
                            </option>
                            <option value="Kawin" {{ old('status_perkawinan_warga') == 'Kawin' ? 'selected' : '' }}>
                                Kawin
                            </option>
                        </select>
                        @error('status_perkawinan_warga')
                            <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>
                    <!-- Status -->
                    <div class="mt-4">
                        <x-input-label for="status_warga" :value="__('Status:')" />

                        <x-text-input id="status_warga" class="block mt-1 w-full" type="text" name="status_warga"
                            :value="old('status_warga')" />
                        <x-input-error :messages="$errors->get('status_warga')" class="mt-2" />
                    </div>
                </div>
                <div class="md:w-2/6">
                    <div class="md:mt-5 mt-2  md:ml-0 flex items-center justify-center">
                        <button type="submit"
                            class="text-white bg-gradient-to-r shadow-lg hover:bg-gradient-to-br shadow-orens/50 dark:shadow-hijau/50 bg-orens hover:bg-orens/80 focus:ring-4 focus:outline-none focus:ring-orens/50 font-medium rounded-lg text-sm px-5 py-2.5 text-center inline-flex items-center dark:bg-hijau dark:text-hitam dark:hover:bg-hijau/80 dark:focus:ring-hijau/40 me-2 mb-2 ">Simpan</button>

                        <a href="{{ route('warga') }}"
                            class="text-white bg-gradient-to-r shadow-lg hover:bg-gradient-to-br shadow-gray-500/50 bg-gray-500 hover:bg-gray-500/80 focus:ring-4 focus:outline-none focus:ring-gray-500/50 font-medium rounded-lg text-sm px-5 py-2.5 text-center inline-flex items-center dark:hover:bg-gray-500/80 dark:focus:ring-gray-500/40 me-2 mb-2 ">
                            Kembali
                        </a>
                    </div>
                </div>
            </div>
        </form>
    </div>

</x-app-layout>

<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Edit User') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <form action="{{ route('users.update', $user->id) }}" method="POST">
            @method('PUT')
            @csrf
            <div class="md:flex max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="md:w-5/6 p-6 bg-white dark:bg-gray-800 overflow-hidden shadow-md sm:rounded-lg transition-colors duration-300">
                    <h3 class="text-lg font-medium text-gray-900 dark:text-gray-300">A. Data Pribadi</h3>

                    <div class="mt-4">
                        <x-input-label for="name" :value="__('Nama')" />
                        <x-text-input id="name" class="block mt-1 w-full" type="text" name="name" :value="$user->name" required autofocus />
                        <x-input-error :messages="$errors->get('name')" class="mt-2" />
                    </div>

                    <div class="mt-4">
                        <x-input-label for="email" :value="__('Email')" />
                        <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="$user->email" required />
                        <x-input-error :messages="$errors->get('email')" class="mt-2" />
                    </div>

                    <div class="mt-4">
                        <x-input-label for="password" :value="__('Password (kosongkan jika tidak ingin mengubah)')" />
                        <x-text-input id="password" class="block mt-1 w-full" type="password" name="password" />
                        <x-input-error :messages="$errors->get('password')" class="mt-2" />
                    </div>

                    <div class="mt-4">
                        <x-input-label for="password_confirmation" :value="__('Konfirmasi Password')" />
                        <x-text-input id="password_confirmation" class="block mt-1 w-full" type="password" name="password_confirmation" />
                        <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
                    </div>

                    <div class="mt-4">
                        <x-input-label for="username" :value="__('Usernmae')" />
                        <x-text-input id="username" class="block mt-1 w-full" type="text" name="username" :value="$user->username" required />
                        <x-input-error :messages="$errors->get('username')" class="mt-2" />
                    </div>

                    <div class="mt-4">
                        <x-input-label for="keterangan_user" :value="__('Keterangan')" />
                        <textarea id="keterangan_user" name="keterangan_user" class="block mt-1 w-full h-20 resize-none border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm">{{ $user->keterangan_user }}</textarea>
                        <x-input-error :messages="$errors->get('keterangan_user')" class="mt-2" />
                    </div>

                    <div class="mt-4">
                        <x-input-label for="status_user" :value="__('Status')" />
                        <select id="status_user" name="status_user" class="block mt-1 w-full border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm" required>
                            <option value="admin" @if($user->status_user === 'admin') selected @endif>Admin</option>
                            <option value="rt" @if($user->status_user === 'rt') selected @endif>RT</option>
                            <option value="rw" @if($user->status_user === 'rw') selected @endif>RW</option>
                            <option value="user" @if($user->status_user === 'user') selected @endif>User</option>
                        </select>
                        <x-input-error :messages="$errors->get('status_user')" class="mt-2" />
                    </div>

                    <h3 class="text-lg font-medium text-gray-900 dark:text-gray-300 mt-8">B. Data Alamat</h3>

                    <div class="mt-4">
                        <x-input-label for="desa_kelurahan_user" :value="__('Desa/Kelurahan')" />
                        <x-text-input id="desa_kelurahan_user" class="block mt-1 w-full" type="text" name="desa_kelurahan_user" :value="$user->desa_kelurahan_user" />
                        <x-input-error :messages="$errors->get('desa_kelurahan_user')" class="mt-2" />
                    </div>

                    <div class="mt-4">
                        <x-input-label for="kecamatan_user" :value="__('Kecamatan')" />
                        <x-text-input id="kecamatan_user" class="block mt-1 w-full" type="text" name="kecamatan_user" :value="$user->kecamatan_user" />
                        <x-input-error :messages="$errors->get('kecamatan_user')" class="mt-2" />
                    </div>

                    <div class="mt-4">
                        <x-input-label for="kabupaten_kota_user" :value="__('Kabupaten/Kota')" />
                        <x-text-input id="kabupaten_kota_user" class="block mt-1 w-full" type="text" name="kabupaten_kota_user" :value="$user->kabupaten_kota_user" />
                        <x-input-error :messages="$errors->get('kabupaten_kota_user')" class="mt-2" />
                    </div>

                    <div class="mt-4">
                        <x-input-label for="provinsi_user" :value="__('Provinsi')" />
                        <x-text-input id="provinsi_user" class="block mt-1 w-full" type="text" name="provinsi_user" :value="$user->provinsi_user" />
                        <x-input-error :messages="$errors->get('provinsi_user')" class="mt-2" />
                    </div>

                    <div class="mt-4">
                        <x-input-label for="rt_user" :value="__('RT')" />
                        <x-text-input id="rt_user" class="block mt-1 w-full" type="text" name="rt_user" :value="$user->rt_user" />
                        <x-input-error :messages="$errors->get('rt_user')" class="mt-2" />
                    </div>

                    <div class="mt-4">
                        <x-input-label for="rw_user" :value="__('RW')" />
                        <x-text-input id="rw_user" class="block mt-1 w-full" type="text" name="rw_user" :value="$user->rw_user" />
                        <x-input-error :messages="$errors->get('rw_user')" class="mt-2" />
                    </div>
                </div>
                <div class="md:w-2/6">
                    <div class="md:mt-5 mt-2 md:ml-0 flex items-center justify-center">
                        <button type="submit" class="text-white bg-gradient-to-r shadow-lg hover:bg-gradient-to-br shadow-orens/50 dark:shadow-hijau/50 bg-orens hover:bg-orens/80 focus:ring-4 focus:outline-none focus:ring-orens/50 font-medium rounded-lg text-sm px-5 py-2.5 text-center inline-flex items-center dark:bg-hijau dark:text-hitam dark:hover:bg-hijau/80 dark:focus:ring-hijau/40 me-2 mb-2">
                            Perbaharui
                        </button>
                        <a href="{{ route('users.index') }}" class="text-white bg-gradient-to-r shadow-lg hover:bg-gradient-to-br shadow-gray-500/50 bg-gray-500 hover:bg-gray-500/80 focus:ring-4 focus:outline-none focus:ring-gray-500/50 font-medium rounded-lg text-sm px-5 py-2.5 text-center inline-flex items-center dark:hover:bg-gray-500/80 dark:focus:ring-gray-500/40 me-2 mb-2">
                            Kembali
                        </a>
                    </div>
                </div>
            </div>
        </form>
    </div>
</x-app-layout>

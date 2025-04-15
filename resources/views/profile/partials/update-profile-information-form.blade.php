<section>
    <header>
        <h2 class="text-lg font-medium text-gray-900 dark:text-gray-100">
            {{ __('Informasi Profil') }}
        </h2>

        <p class="mt-1 text-sm text-gray-600 dark:text-gray-400">
            {{ __("Perbarui informasi profil dan alamat email akun Anda.") }}
        </p>
    </header>

    <form id="send-verification" method="post" action="{{ route('verification.send') }}">
        @csrf
    </form>

    <form method="post" action="{{ route('profile.update') }}" class="mt-6 space-y-6">
        @csrf
        @method('patch')

        <div>
            <x-input-label for="name" :value="__('Nama')" />
            <x-text-input id="name" name="name" type="text" class="mt-1 block w-full" :value="old('name', $user->name)" required autofocus autocomplete="name" />
            <x-input-error class="mt-2" :messages="$errors->get('name')" />
        </div>

        <div>
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" name="email" type="email" class="mt-1 block w-full" :value="old('email', $user->email)" required autocomplete="username" />
            <x-input-error class="mt-2" :messages="$errors->get('email')" />

            @if ($user instanceof \Illuminate\Contracts\Auth\MustVerifyEmail && ! $user->hasVerifiedEmail())
                <div>
                    <p class="text-sm mt-2 text-gray-800 dark:text-gray-200">
                        {{ __('Alamat email Anda belum terverifikasi.') }}

                        <button form="send-verification" class="underline text-sm text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-gray-100 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 dark:focus:ring-offset-gray-800">
                            {{ __('Klik di sini untuk mengirim ulang email verifikasi.') }}
                        </button>
                    </p>

                    @if (session('status') === 'verification-link-sent')
                        <p class="mt-2 font-medium text-sm text-green-600 dark:text-green-400">
                            {{ __('Tautan verifikasi baru telah dikirim ke alamat email Anda.') }}
                        </p>
                    @endif
                </div>
            @endif
        </div>

        <div>
            <x-input-label for="username" :value="__('Username')" />
            <x-text-input id="username" name="username" type="text" class="mt-1 block w-full" :value="old('username', $user->username)" autocomplete="username" />
            <x-input-error class="mt-2" :messages="$errors->get('username')" />
        </div>
        <div>
            <x-input-label for="keterangan_user" :value="__('Keterangan')" />
            <x-text-input id="keterangan_user" name="keterangan_user" type="text" class="mt-1 block w-full" :value="old('keterangan_user', $user->keterangan_user)" autocomplete="keterangan_user" />
            <x-input-error class="mt-2" :messages="$errors->get('keterangan_user')" />
        </div>

        {{-- <div>
            <x-input-label for="status_user" :value="__('Status')" />
            <x-text-input id="status_user" name="status_user" type="text" class="mt-1 block w-full" :value="old('status_user', $user->status_user)" autocomplete="status_user" disa/>
            <x-input-error class="mt-2" :messages="$errors->get('status_user')" />
        </div> --}}

        <div>
            <x-input-label for="desa_kelurahan_user" :value="__('Desa/Kelurahan')" />
            <x-text-input id="desa_kelurahan_user" name="desa_kelurahan_user" type="text" class="mt-1 block w-full" :value="old('desa_kelurahan_user', $user->desa_kelurahan_user)" autocomplete="desa_kelurahan_user" />
            <x-input-error class="mt-2" :messages="$errors->get('desa_kelurahan_user')" />
        </div>

        <div>
            <x-input-label for="kecamatan_user" :value="__('Kecamatan')" />
            <x-text-input id="kecamatan_user" name="kecamatan_user" type="text" class="mt-1 block w-full" :value="old('kecamatan_user', $user->kecamatan_user)" autocomplete="kecamatan_user" />
            <x-input-error class="mt-2" :messages="$errors->get('kecamatan_user')" />
        </div>

        <div>
            <x-input-label for="kabupaten_kota_user" :value="__('Kabupaten/Kota')" />
            <x-text-input id="kabupaten_kota_user" name="kabupaten_kota_user" type="text" class="mt-1 block w-full" :value="old('kabupaten_kota_user', $user->kabupaten_kota_user)" autocomplete="kabupaten_kota_user" />
            <x-input-error class="mt-2" :messages="$errors->get('kabupaten_kota_user')" />
        </div>

        <div>
            <x-input-label for="provinsi_user" :value="__('Provinsi')" />
            <x-text-input id="provinsi_user" name="provinsi_user" type="text" class="mt-1 block w-full" :value="old('provinsi_user', $user->provinsi_user)" autocomplete="provinsi_user" />
            <x-input-error class="mt-2" :messages="$errors->get('provinsi_user')" />
        </div>

        <div>
            <x-input-label for="rt_user" :value="__('RT')" />
            <x-text-input id="rt_user" name="rt_user" type="text" class="mt-1 block w-full" :value="old('rt_user', $user->rt_user)" autocomplete="rt_user" />
            <x-input-error class="mt-2" :messages="$errors->get('rt_user')" />
        </div>

        <div>
            <x-input-label for="rw_user" :value="__('RW')" />
            <x-text-input id="rw_user" name="rw_user" type="text" class="mt-1 block w-full" :value="old('rw_user', $user->rw_user)" autocomplete="rw_user" />
            <x-input-error class="mt-2" :messages="$errors->get('rw_user')" />
        </div>

        <div class="flex items-center gap-4">
            <x-primary-button>{{ __('Simpan') }}</x-primary-button>

            @if (session('status') === 'profile-updated')
                <p
                    x-data="{ show: true }"
                    x-show="show"
                    x-transition
                    x-init="setTimeout(() => show = false, 2000)"
                    class="text-sm text-gray-600 dark:text-gray-400"
                >{{ __('Disimpan.') }}</p>
            @endif
        </div>
    </form>
</section>

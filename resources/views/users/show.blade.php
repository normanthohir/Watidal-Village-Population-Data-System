<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Detail User') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg transition-colors duration-300">
                <div class="p-6 bg-white dark:bg-gray-800 border-b border-gray-200 dark:border-gray-700">
                    {{-- Section A: Data Pribadi --}}
                    <h3 class="text-lg font-medium text-gray-900 dark:text-gray-300 mb-2">A. Data Pribadi</h3>
                    <table class="min-w-full divide-y divide-gray-200 dark:divide-gray-700">
                        <tbody>
                            <tr class="bg-white dark:bg-gray-800">
                                <th class="px-6 py-4 text-left text-xs font-medium text-gray-500 dark:text-gray-300 uppercase tracking-wider">
                                    Nama</th>
                                <td class="px-6 py-4 text-sm text-gray-900 dark:text-gray-300">:</td>
                                <td class="px-6 py-4 text-sm text-gray-900 dark:text-gray-300">
                                    {{ $user->name }}</td>
                            </tr>
                            <tr class="bg-gray-50 dark:bg-gray-700">
                                <th class="px-6 py-4 text-left text-xs font-medium text-gray-500 dark:text-gray-300 uppercase tracking-wider">
                                    Email</th>
                                <td class="px-6 py-4 text-sm text-gray-900 dark:text-gray-300">:</td>
                                <td class="px-6 py-4 text-sm text-gray-900 dark:text-gray-300">
                                    {{ $user->email }}</td>
                            </tr>
                            <tr class="bg-white dark:bg-gray-800">
                                <th class="px-6 py-4 text-left text-xs font-medium text-gray-500 dark:text-gray-300 uppercase tracking-wider">
                                    Username</th>
                                <td class="px-6 py-4 text-sm text-gray-900 dark:text-gray-300">:</td>
                                <td class="px-6 py-4 text-sm text-gray-900 dark:text-gray-300">
                                    {{ $user->username }}</td>
                            </tr>
                            <tr class="bg-gray-50 dark:bg-gray-700">
                                <th class="px-6 py-4 text-left text-xs font-medium text-gray-500 dark:text-gray-300 uppercase tracking-wider">
                                    Role</th>
                                <td class="px-6 py-4 text-sm text-gray-900 dark:text-gray-300">:</td>
                                <td class="px-6 py-4 text-sm text-gray-900 dark:text-gray-300">
                                    {{ $user->status_user }}</td>
                            </tr>
                            <tr class="bg-white dark:bg-gray-800">
                                <th class="px-6 py-4 text-left text-xs font-medium text-gray-500 dark:text-gray-300 uppercase tracking-wider">
                                    Keterangan</th>
                                <td class="px-6 py-4 text-sm text-gray-900 dark:text-gray-300">:</td>
                                <td class="px-6 py-4 text-sm text-gray-900 dark:text-gray-300">
                                    {{ $user->keterangan_user }}</td>
                            </tr>
                            <tr class="bg-gray-50 dark:bg-gray-700">
                                <th class="px-6 py-4 text-left text-xs font-medium text-gray-500 dark:text-gray-300 uppercase tracking-wider">
                                    Status</th>
                                <td class="px-6 py-4 text-sm text-gray-900 dark:text-gray-300">:</td>
                                <td class="px-6 py-4 text-sm text-gray-900 dark:text-gray-300">
                                    {{ $user->status_user }}</td>
                            </tr>
                            <tr class="bg-white dark:bg-gray-800">
                                <th class="px-6 py-4 text-left text-xs font-medium text-gray-500 dark:text-gray-300 uppercase tracking-wider">
                                    Desa/Kelurahan User</th>
                                <td class="px-6 py-4 text-sm text-gray-900 dark:text-gray-300">:</td>
                                <td class="px-6 py-4 text-sm text-gray-900 dark:text-gray-300">
                                    {{ $user->desa_kelurahan_user }}</td>
                            </tr>
                            <tr class="bg-gray-50 dark:bg-gray-700">
                                <th class="px-6 py-4 text-left text-xs font-medium text-gray-500 dark:text-gray-300 uppercase tracking-wider">
                                    Kecamatan User</th>
                                <td class="px-6 py-4 text-sm text-gray-900 dark:text-gray-300">:</td>
                                <td class="px-6 py-4 text-sm text-gray-900 dark:text-gray-300">
                                    {{ $user->kecamatan_user }}</td>
                            </tr>
                            <tr class="bg-white dark:bg-gray-800">
                                <th class="px-6 py-4 text-left text-xs font-medium text-gray-500 dark:text-gray-300 uppercase tracking-wider">
                                    Kabupaten/Kota User</th>
                                <td class="px-6 py-4 text-sm text-gray-900 dark:text-gray-300">:</td>
                                <td class="px-6 py-4 text-sm text-gray-900 dark:text-gray-300">
                                    {{ $user->kabupaten_kota_user }}</td>
                            </tr>
                            <tr class="bg-gray-50 dark:bg-gray-700">
                                <th class="px-6 py-4 text-left text-xs font-medium text-gray-500 dark:text-gray-300 uppercase tracking-wider">
                                    Provinsi User</th>
                                <td class="px-6 py-4 text-sm text-gray-900 dark:text-gray-300">:</td>
                                <td class="px-6 py-4 text-sm text-gray-900 dark:text-gray-300">
                                    {{ $user->provinsi_user }}</td>
                            </tr>
                            <tr class="bg-white dark:bg-gray-800">
                                <th class="px-6 py-4 text-left text-xs font-medium text-gray-500 dark:text-gray-300 uppercase tracking-wider">
                                    RT User</th>
                                <td class="px-6 py-4 text-sm text-gray-900 dark:text-gray-300">:</td>
                                <td class="px-6 py-4 text-sm text-gray-900 dark:text-gray-300">
                                    {{ $user->rt_user }}</td>
                            </tr>
                            <tr class="bg-gray-50 dark:bg-gray-700">
                                <th class="px-6 py-4 text-left text-xs font-medium text-gray-500 dark:text-gray-300 uppercase tracking-wider">
                                    RW User</th>
                                <td class="px-6 py-4 text-sm text-gray-900 dark:text-gray-300">:</td>
                                <td class="px-6 py-4 text-sm text-gray-900 dark:text-gray-300">
                                    {{ $user->rw_user }}</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>

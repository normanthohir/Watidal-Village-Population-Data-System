<?php

use App\Http\Controllers\KartukeluargaController;
use App\Http\Controllers\MutasiController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\WargaController;
use App\Http\Middleware\AdminMiddleware;
use App\Models\KartuKeluarga;
use App\Models\Mutasi;
use App\Models\Warga;
use App\Models\WargaHasKartuKeluarga;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    // Fetch data from database
    $jumlah_warga = Warga::count();
    $jumlah_warga_l = Warga::where('jenis_kelamin_warga', 'L')->count();
    $jumlah_warga_p = Warga::where('jenis_kelamin_warga', 'P')->count();
    $jumlah_warga_ld_17 = Warga::whereDate('tanggal_lahir_warga', '<=', now()->subYears(17))->count();
    $jumlah_warga_kd_17 = Warga::whereDate('tanggal_lahir_warga', '>', now()->subYears(17))->count();

    $jumlah_kartu_keluarga = KartuKeluarga::count();
    $jumlah_anggota_keluarga = WargaHasKartuKeluarga::count(); // Menggunakan pivot table

    if ($jumlah_kartu_keluarga > 0) {
        $rata2_anggota = $jumlah_anggota_keluarga / $jumlah_kartu_keluarga;
    } else {
        $rata2_anggota = 0; // Jika tidak ada kartu keluarga, rata-rata adalah 0
    }
    // Membulatkan rata-rata anggota keluarga menjadi 2 desimal
    $rata2_anggota = number_format($rata2_anggota, 2);

    $jumlah_mutasi = Mutasi::count();
    $jumlah_mutasi_l = Mutasi::where('jenis_kelamin_mutasi', 'L')->count();
    $jumlah_mutasi_p = Mutasi::where('jenis_kelamin_mutasi', 'P')->count();
    $jumlah_mutasi_ld_17 = Mutasi::whereDate('tanggal_lahir_mutasi', '<=', now()->subYears(17))->count();
    $jumlah_mutasi_kd_17 = Mutasi::whereDate('tanggal_lahir_mutasi', '>', now()->subYears(17))->count();


    if (auth()->check()) {
        return view('dashboard', compact(
            'jumlah_warga',
            'jumlah_warga_l',
            'jumlah_warga_p',
            'jumlah_warga_ld_17',
            'jumlah_warga_kd_17',
            'jumlah_kartu_keluarga',
            'jumlah_anggota_keluarga',
            'rata2_anggota',
            'jumlah_mutasi',
            'jumlah_mutasi_l',
            'jumlah_mutasi_p',
            'jumlah_mutasi_ld_17',
            'jumlah_mutasi_kd_17',
        ));
    } else {
        return redirect()->route('login');
    }
});

// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth', 'verified'])->name('dashboard');

Route::get('/dashboard', function () {
    // Fetch data from database
    $jumlah_warga = Warga::count();
    $jumlah_warga_l = Warga::where('jenis_kelamin_warga', 'L')->count();
    $jumlah_warga_p = Warga::where('jenis_kelamin_warga', 'P')->count();
    $jumlah_warga_ld_17 = Warga::whereDate('tanggal_lahir_warga', '<=', now()->subYears(17))->count();
    $jumlah_warga_kd_17 = Warga::whereDate('tanggal_lahir_warga', '>', now()->subYears(17))->count();

    $jumlah_kartu_keluarga = KartuKeluarga::count();
    $jumlah_anggota_keluarga = WargaHasKartuKeluarga::count(); // Menggunakan pivot table

    if ($jumlah_kartu_keluarga > 0) {
        $rata2_anggota = $jumlah_anggota_keluarga / $jumlah_kartu_keluarga;
    } else {
        $rata2_anggota = 0; // Jika tidak ada kartu keluarga, rata-rata adalah 0
    }
    // Membulatkan rata-rata anggota keluarga menjadi 2 desimal
    $rata2_anggota = number_format($rata2_anggota, 2);

    $jumlah_mutasi = Mutasi::count();
    $jumlah_mutasi_l = Mutasi::where('jenis_kelamin_mutasi', 'L')->count();
    $jumlah_mutasi_p = Mutasi::where('jenis_kelamin_mutasi', 'P')->count();
    $jumlah_mutasi_ld_17 = Mutasi::whereDate('tanggal_lahir_mutasi', '<=', now()->subYears(17))->count();
    $jumlah_mutasi_kd_17 = Mutasi::whereDate('tanggal_lahir_mutasi', '>', now()->subYears(17))->count();

    return view('dashboard', compact(
        'jumlah_warga',
        'jumlah_warga_l',
        'jumlah_warga_p',
        'jumlah_warga_ld_17',
        'jumlah_warga_kd_17',
        'jumlah_kartu_keluarga',
        'jumlah_anggota_keluarga',
        'rata2_anggota',
        'jumlah_mutasi',
        'jumlah_mutasi_l',
        'jumlah_mutasi_p',
        'jumlah_mutasi_ld_17',
        'jumlah_mutasi_kd_17',
    ));
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware(['auth', 'verified'])->group(function () {
    // warga
    Route::get('/warga', [WargaController::class, 'index'])->name('warga');
    Route::get('/warga/create', [WargaController::class, 'create'])->name('warga.create');
    Route::post('/warga', [WargaController::class, 'store'])->name('warga.store');
    Route::get('/warga/{id}/edit', [WargaController::class, 'edit'])->name('warga.edit');
    Route::put('/warga/{id}', [WargaController::class, 'update'])->name('warga.update');
    Route::get('/warga/show/{id}', [WargaController::class, 'show'])->name('warga.show');
    Route::delete('/warga/{id}', [WargaController::class, 'destroy'])->name('warga.destroy');
    Route::get('/warga/cetak-pdf', [WargaController::class, 'cetakPdf'])->name('warga.cetak-pdf');
    Route::get('/warga/{id}/cetak-detail-pdf', [WargaController::class, 'cetakdetailPdf'])->name('warga.cetak-detail-pdf');
    Route::get('/warga/export-csv', [WargaController::class, 'exportCsv'])->name('warga.export-csv');
    Route::get('/warga/export-excel', [WargaController::class, 'exportExcel'])->name('warga.export-excel');


    // kartu keluarga
    Route::get('/kartu-keluarga', [KartukeluargaController::class, 'index'])->name('kartu-keluarga.index');
    Route::get('/kartu-keluarga/create', [KartukeluargaController::class, 'create'])->name('kartu-keluarga.create');
    Route::post('/kartu-keluarga', [KartukeluargaController::class, 'store'])->name('kartu-keluarga.store');
    Route::get('/kartu-keluarga/{id}/edit', [KartukeluargaController::class, 'edit'])->name('kartu-keluarga.edit');
    Route::put('/kartu-keluarga/{id}', [KartukeluargaController::class, 'update'])->name('kartu-keluarga.update');
    Route::get('/kartu-keluarga/show/{id}', [KartukeluargaController::class, 'show'])->name('kartu-keluarga.show');
    Route::delete('/kartu-keluarga/{id}', [KartukeluargaController::class, 'destroy'])->name('kartu-keluarga.destroy');
    Route::get('/kartu-keluarga/{id}/cetak-detail-pdf', [KartukeluargaController::class, 'cetakdetailPdf'])->name('kartu-keluarga.cetak-detail-pdf');
    Route::get('/kartu-keluarga/export-csv', [KartuKeluargaController::class, 'exportCsv'])->name('kartu-keluarga.export-csv');

    Route::get('/kartu-keluarga/{id}/anggota', [KartuKeluargaController::class, 'showMembers'])->name('kartu-keluarga.anggota');
    Route::post('/kartu-keluarga/{id}/anggota', [KartuKeluargaController::class, 'addMember'])->name('kartu-keluarga.add-anggota');
    Route::delete('/kartu-keluarga/{id}/anggota/{id_warga}', [KartukeluargaController::class, 'deleteAnggota'])->name('kartu-keluarga.delete-anggota');

    // mutasi
    Route::get('/mutasi', [MutasiController::class, 'index'])->name('mutasi.index');
    Route::get('/mutasi/{id}', [MutasiController::class, 'show'])->name('mutasi.show');
    Route::delete('/mutasi/{id}', [MutasiController::class, 'destroy'])->name('mutasi.destroy');
    Route::get('/mutasi/mutasi/{id}', [MutasiController::class, 'mutasi'])->name('mutasi.mutasi');
    // Route::get('/mutasi/export-csv', [MutasiController::class, 'exportCsv'])->name('mutasi.export-csv');
    Route::get('/mutasis/export-csv', [MutasiController::class, 'exportCsv'])->name('mutasi.export-csv');
    

    // users
    Route::get('/users', [UserController::class, 'index'])->name('users.index');
    Route::get('/users/create', [UserController::class, 'create'])->name('users.create')->middleware(AdminMiddleware::class);
    Route::post('/users', [UserController::class, 'store'])->name('users.store')->middleware(AdminMiddleware::class);
    Route::get('/users/show/{id}', [UserController::class, 'show'])->name('users.show');
    Route::get('/users/{id}/edit', [UserController::class, 'edit'])->name('users.edit')->middleware(AdminMiddleware::class);
    Route::put('/users/{id}', [UserController::class, 'update'])->name('users.update')->middleware(AdminMiddleware::class);
    Route::delete('/users/{id}', [UserController::class, 'destroy'])->name('users.destroy')->middleware(AdminMiddleware::class);


    Route::get('/profile-desa', function () {
        return view('profile-desa');
    })->name('profile-desa');

    Route::get('/tentang-sistem', function () {
        return view('tentang-sistem');
    })->name('tentang-sistem');

    // Route::get('/mutasi', function () {
    //     return view('mutasi');
    // })->name('mutasi');


});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::fallback(function () {
    return view('errors.404');
});
// pdf
require __DIR__ . '/auth.php';

<?php

namespace App\Http\Controllers;

use App\Models\Warga;
use App\Models\Mutasi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Symfony\Component\HttpFoundation\StreamedResponse;

class MutasiController extends Controller
{
    // Method untuk menampilkan semua data mutasi
    public function index(Request $request)
    {
        // Ambil nilai pencarian dari query string
        $search = $request->input('search');

        // Query data warga dengan pagination
        $mutasis = Mutasi::query()->with('user');

        // Jika ada pencarian, filter berdasarkan NIK_warga, nama_warga, atau status_warga
        if ($search) {
            $mutasis->where('nik_mutasi', 'LIKE', "%$search%")
                ->orWhere('nama_mutasi', 'LIKE', "%$search%")
                ->orWhere('status_mutasi', 'LIKE', "%$search%");
        }

        $mutasis = $mutasis->paginate(10);

        $totalMutasi = Mutasi::count();
        $jumlahLakiLaki = Mutasi::where('jenis_kelamin_mutasi', 'L')->count();
        $jumlahPerempuan = Mutasi::where('jenis_kelamin_mutasi', 'P')->count();

        // Use julianday function to calculate age
        $wargaDiBawah17 = Mutasi::whereRaw("(julianday('now') - julianday(tanggal_lahir_mutasi)) / 365.25 < 17")->count();
        $wargaDiAtas17 = Mutasi::whereRaw("(julianday('now') - julianday(tanggal_lahir_mutasi)) / 365.25 >= 17")->count();


        return view('mutasi.index', compact('mutasis','totalMutasi', 'jumlahLakiLaki', 'jumlahPerempuan', 'wargaDiBawah17', 'wargaDiAtas17'));
    }

    // Method untuk menampilkan detail data mutasi
    public function show($id)
    {
        $mutasi = Mutasi::find($id);
        if ($mutasi) {
            return view('mutasi.show', compact('mutasi'));
        } else {
            return redirect()->route('mutasi.index')->with('error', 'Data Mutasi tidak ditemukan.');
        }
    }

    // Method untuk menghapus data mutasi
    public function destroy($id)
    {
        $mutasi = Mutasi::find($id);
        if ($mutasi) {
            $mutasi->delete();
            return redirect()->route('mutasi.index')->with('success', 'Data Mutasi berhasil dihapus.');
        } else {
            return redirect()->route('mutasi.index')->with('error', 'Data Mutasi tidak ditemukan.');
        }
    }
    
    public function mutasi($id)
    {
        // Cari record warga
        $warga = Warga::find($id);

        if ($warga) {
            // Periksa apakah nik_mutasi sudah ada di tabel mutasis
            $existingMutasi = Mutasi::where('nik_mutasi', $warga->nik_warga)->first();
            if ($existingMutasi) {
                return redirect()->route('warga')->with('error', 'Warga sudah bermutasi sebelumnya.');
            }

            // Buat record Mutasi baru
            $mutasi = new Mutasi();
            $mutasi->nik_mutasi = $warga->nik_warga;
            $mutasi->nama_mutasi = $warga->nama_warga;
            $mutasi->tempat_lahir_mutasi = $warga->tempat_lahir_warga;
            $mutasi->tanggal_lahir_mutasi = $warga->tanggal_lahir_warga;
            $mutasi->jenis_kelamin_mutasi = $warga->jenis_kelamin_warga;
            $mutasi->alamat_ktp_mutasi = $warga->alamat_ktp_warga;
            $mutasi->alamat_mutasi = $warga->alamat_warga;
            $mutasi->desa_kelurahan_mutasi = $warga->desa_kelurahan_warga;
            $mutasi->kecamatan_mutasi = $warga->kecamatan_warga;
            $mutasi->kabupaten_kota_mutasi = $warga->kabupaten_kota_warga;
            $mutasi->provinsi_mutasi = $warga->provinsi_warga;
            $mutasi->rt_mutasi = $warga->rt_warga;
            $mutasi->rw_mutasi = $warga->rw_warga;
            $mutasi->agama_mutasi = $warga->agama_warga;
            $mutasi->pendidikan_terakhir_mutasi = $warga->pendidikan_terakhir_warga;
            $mutasi->pekerjaan_mutasi = $warga->pekerjaan_warga;
            $mutasi->status_perkawinan_mutasi = $warga->status_perkawinan_warga;
            $mutasi->status_mutasi = 'Mutasi'; // Anda bisa mengatur ini sesuai kebutuhan
            $mutasi->id_user = $warga->id_user;

            // Simpan record Mutasi
            $mutasi->save();

            // Hapus record dari tabel pivot
            $warga->kartuKeluargas()->detach();

            // Hapus record Warga
            $warga->delete();

            return redirect()->route('warga')->with('success', 'Warga telah bermutasi.');
        } else {
            return redirect()->route('warga')->with('error', 'Warga tidak ditemukan.');
        }
    }

    public function exportCsv()
    {
        Log::info('Export CSV function called');
        
        try {
            $mutasis = Mutasi::select('nik_mutasi', 'nama_mutasi', 'tempat_lahir_mutasi', 'tanggal_lahir_mutasi', 'jenis_kelamin_mutasi', 'alamat_ktp_mutasi', 'alamat_mutasi', 'desa_kelurahan_mutasi', 'kecamatan_mutasi', 'kabupaten_kota_mutasi', 'provinsi_mutasi', 'rt_mutasi', 'rw_mutasi', 'agama_mutasi', 'pendidikan_terakhir_mutasi', 'pekerjaan_mutasi', 'status_perkawinan_mutasi', 'status_mutasi', 'created_at', 'updated_at')->get();

            $response = new StreamedResponse(function () use ($mutasis) {
                $file = fopen('php://output', 'w');

                // Header kolom CSV
                fputcsv($file, [
                    'NIK', 'Nama', 'Tempat Lahir', 'Tanggal Lahir', 'Jenis Kelamin', 'Alamat KTP', 'Alamat', 'Desa/Kelurahan', 'Kecamatan', 'Kabupaten/Kota', 'Provinsi', 'RT', 'RW', 'Agama', 'Pendidikan Terakhir', 'Pekerjaan', 'Status Perkawinan', 'Status', 'Dibuat', 'Diperbaharui'
                ]);

                // Isi data warga
                foreach ($mutasis as $mutasi) {
                    fputcsv($file, [
                        $mutasi->nik_mutasi,
                        $mutasi->nama_mutasi,
                        $mutasi->tempat_lahir_mutasi,
                        $mutasi->tanggal_lahir_mutasi,
                        ($mutasi->jenis_kelamin_mutasi === 'L') ? 'Laki-laki' : 'Perempuan',
                        $mutasi->alamat_ktp_mutasi,
                        $mutasi->alamat_mutasi,
                        $mutasi->desa_kelurahan_mutasi,
                        $mutasi->kecamatan_mutasi,
                        $mutasi->kabupaten_kota_mutasi,
                        $mutasi->provinsi_mutasi,
                        $mutasi->rt_mutasi,
                        $mutasi->rw_mutasi,
                        $mutasi->agama_mutasi,
                        $mutasi->pendidikan_terakhir_mutasi,
                        $mutasi->pekerjaan_mutasi,
                        $mutasi->status_perkawinan_mutasi,
                        $mutasi->status_mutasi,
                        $mutasi->created_at,
                        $mutasi->updated_at,
                    ]);
                }

                fclose($file);
            });

            // Header untuk file CSV
            $response->headers->set('Content-Type', 'text/csv');
            $response->headers->set('Content-Disposition', 'attachment; filename="data-mutasi.csv"');
            
            Log::info('CSV response prepared');
            
            return $response;
        } catch (\Exception $e) {
            Log::error('Error exporting CSV: ' . $e->getMessage());
            return response()->json(['error' => 'Failed to export CSV'], 500);
        }
    }
}

<?php

namespace App\Http\Controllers;

use App\Exports\WargaExport;
use PDF;
use App\Models\Warga;
use Illuminate\Http\Request;
use Dompdf\Dompdf;
use Dompdf\Options;
use Illuminate\Http\Response;
use Maatwebsite\Excel\Facades\Excel;
use Symfony\Component\HttpFoundation\StreamedResponse;

class WargaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function cetakPdf()
    {
        $wargas = Warga::all(); // Ganti dengan query sesuai kebutuhan Anda

        $pdf = new Dompdf();
        $pdf->loadHtml(view('warga.cetak-pdf', compact('wargas'))->render());

        // (Optional) Atur ukuran dan orientasi dokumen
        $pdf->setPaper('A4', 'portrait');

        // Render PDF (optional)
        $pdf->render();

        // Download file PDF ke pengguna
        return $pdf->stream('data-warga.pdf');
    }

    // app/Http/Controllers/WargaController.php



    public function index(Request $request)
    {
        // Ambil nilai pencarian dari query string
        $search = $request->input('search');

        // Query data warga dengan pagination
        $wargas = Warga::query()->with('user');

        // Jika ada pencarian, filter berdasarkan NIK_warga, nama_warga, atau status_warga
        if ($search) {
            $wargas->where('nik_warga', 'LIKE', "%$search%")
                ->orWhere('nama_warga', 'LIKE', "%$search%")
                ->orWhere('status_warga', 'LIKE', "%$search%");
        }

        // Ambil data warga dengan pagination (misalnya, 10 item per halaman)
        $wargas = $wargas->paginate(10);

        $totalWarga = Warga::count();
        $jumlahLakiLaki = Warga::where('jenis_kelamin_warga', 'L')->count();
        $jumlahPerempuan = Warga::where('jenis_kelamin_warga', 'P')->count();

        // Use julianday function to calculate age
        $wargaDiBawah17 = Warga::whereRaw("(julianday('now') - julianday(tanggal_lahir_warga)) / 365.25 < 17")->count();
        $wargaDiAtas17 = Warga::whereRaw("(julianday('now') - julianday(tanggal_lahir_warga)) / 365.25 >= 17")->count();

        return view('warga.index', compact('wargas', 'totalWarga', 'jumlahLakiLaki', 'jumlahPerempuan', 'wargaDiBawah17', 'wargaDiAtas17'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('warga.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validasi data yang dikirimkan melalui formulir
        $validatedData = $request->validate([
            'nik_warga' => 'required|string|max:255|unique:wargas,nik_warga',
            'nama_warga' => 'required|string|max:255',
            'tempat_lahir_warga' => 'required|string|max:255',
            'tanggal_lahir_warga' => 'required|date',
            'jenis_kelamin_warga' => 'required|in:L,P', // Assuming L for Laki-laki and P for Perempuan
            'alamat_ktp_warga' => 'required|string|max:255',
            'alamat_warga' => 'required|string|max:255',
            'desa_kelurahan_warga' => 'required|string|max:255',
            'kecamatan_warga' => 'required|string|max:255',
            'kabupaten_kota_warga' => 'required|string|max:255',
            'provinsi_warga' => 'required|string|max:255',
            'rt_warga' => 'required|string|max:10',
            'rw_warga' => 'required|string|max:10',
            'agama_warga' => 'required|string|max:255',
            'pendidikan_terakhir_warga' => 'required|string|max:255',
            'pekerjaan_warga' => 'required|string|max:255',
            'status_perkawinan_warga' => 'required|string|max:255',
            'status_warga' => 'required|string|max:255',
        ]);

        $validatedData['id_user'] = auth()->id();

        // Simpan data baru ke dalam database
        Warga::create($validatedData);

        // Redirect ke halaman index atau halaman lain sesuai kebutuhan
        return redirect()->route('warga')->with('success', 'Data warga berhasil ditambahkan.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        // Cari data warga berdasarkan ID
        $warga = Warga::findOrFail($id);

        // Kembalikan view dengan data warga
        return view('warga.show', compact('warga'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        // Cari data warga berdasarkan ID
        $warga = Warga::findOrFail($id);

        // Kembalikan view dengan data warga
        return view('warga.edit', compact('warga'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'nik_warga' => 'required|string|max:255',
            'nama_warga' => 'required|string|max:255',
            'alamat_warga' => 'nullable|string', // Sesuaikan dengan validasi untuk field lain
            // Tambahkan validasi untuk field lain sesuai kebutuhan
        ]);

        $warga = Warga::findOrFail($id);
        $warga->update($request->all());

        return redirect()->route('warga')->with('success', 'Data warga berhasil diperbarui.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        // Cari dan hapus data warga
        $warga = Warga::findOrFail($id);
        $warga->delete();

        // Redirect ke halaman index dengan pesan sukses
        return redirect()->route('warga')->with('success', 'Data warga berhasil dihapus.');
    }

    public function cetakdetailPdf($id)
    {
        // Cari data warga berdasarkan ID
        $warga = Warga::findOrFail($id);

        // Inisialisasi objek Dompdf
        $pdf = new Dompdf();

        // Load HTML dari view 'warga.pdf' dengan data yang sudah diproses
        $pdf->loadHtml(view('warga.cetak-detail-pdf', compact('warga'))->render());

        // Atur ukuran dan orientasi dokumen
        $pdf->setPaper('A4', 'portrait');

        // Render PDF
        $pdf->render();

        // Mengambil output PDF sebagai string
        $output = $pdf->output();

        // Mengirim output PDF ke browser untuk diunduh
        return response($output, 200)
            ->header('Content-Type', 'application/pdf')
            ->header('Content-Disposition', 'attachment; filename="detail_warga_' . $warga->nik_warga . '.pdf"');
    }

    public function exportCsv()
    {
        // Ambil data warga dari database
        $wargas = Warga::select('nik_warga', 'nama_warga', 'tempat_lahir_warga', 'tanggal_lahir_warga', 'jenis_kelamin_warga', 'alamat_ktp_warga', 'alamat_warga', 'desa_kelurahan_warga', 'kecamatan_warga', 'kabupaten_kota_warga', 'provinsi_warga', 'rt_warga', 'rw_warga', 'agama_warga', 'pendidikan_terakhir_warga', 'pekerjaan_warga', 'status_perkawinan_warga', 'status_warga', 'created_at', 'updated_at')
            ->get();

        // Buat StreamedResponse
        $response = new StreamedResponse(function () use ($wargas) {
            $file = fopen('php://output', 'w');

            // Header kolom CSV
            fputcsv($file, [
                'NIK', 'Nama', 'Tempat Lahir', 'Tanggal Lahir', 'Jenis Kelamin', 'Alamat KTP', 'Alamat', 'Desa/Kelurahan', 'Kecamatan', 'Kabupaten/Kota', 'Provinsi', 'RT', 'RW', 'Agama', 'Pendidikan Terakhir', 'Pekerjaan', 'Status Perkawinan', 'Status', 'Dibuat', 'Diperbaharui'
            ]);

            // Isi data warga
            foreach ($wargas as $warga) {
                fputcsv($file, [
                    $warga->nik_warga,
                    $warga->nama_warga,
                    $warga->tempat_lahir_warga,
                    $warga->tanggal_lahir_warga,
                    ($warga->jenis_kelamin_warga === 'L') ? 'Laki-laki' : 'Perempuan',
                    $warga->alamat_ktp_warga,
                    $warga->alamat_warga,
                    $warga->desa_kelurahan_warga,
                    $warga->kecamatan_warga,
                    $warga->kabupaten_kota_warga,
                    $warga->provinsi_warga,
                    $warga->rt_warga,
                    $warga->rw_warga,
                    $warga->agama_warga,
                    $warga->pendidikan_terakhir_warga,
                    $warga->pekerjaan_warga,
                    $warga->status_perkawinan_warga,
                    $warga->status_warga,
                    $warga->created_at,
                    $warga->updated_at,
                ]);
            }

            fclose($file);
        });

        // Header untuk file CSV
        $response->headers->set('Content-Type', 'text/csv');
        $response->headers->set('Content-Disposition', 'attachment; filename="data-warga.csv"');

        return $response;
    }

    public function exportExcel()
    {
        return Excel::download(new WargaExport, 'data-warga.xlsx');
    }
}

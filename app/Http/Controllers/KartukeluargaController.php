<?php

namespace App\Http\Controllers;

use App\Models\KartuKeluarga;
use App\Models\Warga;
use App\Models\WargaHasKartuKeluarga;
use Carbon\Carbon;
use Dompdf\Dompdf;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Response;
class KartuKeluargaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        // Ambil nilai pencarian dari query string
        $search = $request->input('search');

        // Query data kartu keluarga dengan pagination
        $kartukeluargas = KartuKeluarga::query()->with('user');

        if ($search) {
            $kartukeluargas->where('nomor_keluarga', 'LIKE', "%$search%")
                ->orWhereHas('kepalaKeluarga', function ($query) use ($search) {
                    $query->where('nama_warga', 'LIKE', "%$search%")
                        ->orWhere('nomor_keluarga', 'LIKE', "%$search%");
                });
        }

        // Ambil data kartu keluarga dengan pagination (misalnya, 10 item per halaman)
        $kartukeluargas = $kartukeluargas->paginate(10);
        $totalkk = KartuKeluarga::count();

        // Kembalikan data dalam bentuk view dengan data yang telah difilter dan dipaginasi
        return view('kartu-keluarga.index', compact('kartukeluargas', 'totalkk'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $data_warga = Warga::all();
        return view('kartu-keluarga.create', compact('data_warga'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'nomor_keluarga' => 'required|string|max:255',
            'id_kepala_keluarga' => 'required|exists:wargas,id_warga',
            'alamat_keluarga' => 'required|string',
            'desa_kelurahan_keluarga' => 'required|string|max:255',
            'kecamatan_keluarga' => 'required|string|max:255',
            'kabupaten_kota_keluarga' => 'required|string|max:255',
            'provinsi_keluarga' => 'required|string|max:255',
            'rt_keluarga' => 'required|string|max:255',
            'rw_keluarga' => 'required|string|max:255',
            'kode_pos_keluarga' => 'nullable|string|max:255',
        ]);

        $validatedData['id_user'] = auth()->id();

        // Simpan data baru ke dalam database
        KartuKeluarga::create($validatedData);

        return redirect()->route('kartu-keluarga.index')->with('success', 'Kartu Keluarga berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        // Mengambil data kartu keluarga berdasarkan $id
        $kartu_keluarga = KartuKeluarga::findOrFail($id);


        // Mengirim data ke view
        return view('kartu-keluarga.show', [
            'kartu_keluarga' => $kartu_keluarga,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        // Mengambil data kartu keluarga berdasarkan $id
        $kartu_keluarga = KartuKeluarga::findOrFail($id);

        // Mengambil data warga untuk dropdown kepala keluarga
        $data_warga = Warga::all();

        // Mengirim data ke view edit
        return view('kartu-keluarga.edit', compact('kartu_keluarga', 'data_warga'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'nomor_keluarga' => 'required|string|max:255',
            'id_kepala_keluarga' => 'required|exists:wargas,id_warga',
            'alamat_keluarga' => 'required|string',
            'desa_kelurahan_keluarga' => 'required|string|max:255',
            'kecamatan_keluarga' => 'required|string|max:255',
            'kabupaten_kota_keluarga' => 'required|string|max:255',
            'provinsi_keluarga' => 'required|string|max:255',
            'rt_keluarga' => 'required|string|max:255',
            'rw_keluarga' => 'required|string|max:255',
            'kode_pos_keluarga' => 'nullable|string|max:255',
        ]);

        // Update data kartu keluarga berdasarkan $id
        KartuKeluarga::findOrFail($id)->update($validatedData);

        return redirect()->route('kartu-keluarga.index')->with('success', 'Kartu Keluarga berhasil diperbarui');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        // Hapus data kartu keluarga berdasarkan $id
        KartuKeluarga::findOrFail($id)->delete();

        return redirect()->route('kartu-keluarga.index')->with('success', 'Kartu Keluarga berhasil dihapus');
    }

    public function showMembers($id)
    {
        $kartuKeluarga = KartuKeluarga::with('anggota')->findOrFail($id);

        // Ambil semua warga yang belum menjadi anggota kartu keluarga ini
        $anggotaIds = $kartuKeluarga->anggota->pluck('id_warga')->toArray();

        $wargas = Warga::whereNotIn('id_warga', $anggotaIds)
            ->where('id_warga', '!=', $kartuKeluarga->id_kepala_keluarga)
            ->get();

        // Debugging: Uncomment the line below to debug $wargas
        // dd($wargas);

        return view('kartu-keluarga.anggota', compact('kartuKeluarga', 'wargas'));
    }

    public function addMember(Request $request, $id)
    {
        $request->validate([
            'id_warga' => 'required|exists:wargas,id_warga',
        ]);

        $kartuKeluarga = KartuKeluarga::findOrFail($id);
        $kartuKeluarga->anggota()->attach($request->id_warga);

        return redirect()->route('kartu-keluarga.anggota', $id)->with('success', 'Anggota berhasil ditambahkan.');
    }

    public function deleteAnggota($id, $id_warga)
    {
        // Menghapus data anggota dari pivot table berdasarkan ID
        $anggota = WargaHasKartuKeluarga::where('id_keluarga', $id)->where('id_warga', $id_warga)->firstOrFail();
        $anggota->delete();

        // Redirect kembali ke halaman detail kartu keluarga
        return redirect()->back()->with('success', 'Anggota berhasil dihapus.');
    }

    public function cetakdetailPdf($id)
    {
        // Cari data  berdasarkan ID
        $kartu_keluarga = KartuKeluarga::findOrFail($id);

        // Inisialisasi objek Dompdf
        $pdf = new Dompdf();

        // Load HTML dari view 'warga.pdf' dengan data yang sudah diproses
        $pdf->loadHtml(view('kartu-keluarga.cetak-detail-pdf', compact('kartu_keluarga'))->render());

        // Atur ukuran dan orientasi dokumen
        $pdf->setPaper('A4', 'portrait');

        // Render PDF
        $pdf->render();

        // Mengambil output PDF sebagai string
        $output = $pdf->output();

        // Mengirim output PDF ke browser untuk diunduh
        return response($output, 200)
            ->header('Content-Type', 'application/pdf')
            ->header('Content-Disposition', 'attachment; filename="nomor_KK' . $kartu_keluarga->nomor_keluarga . '.pdf"');
    }

    public function exportCsv()
    {
        $kartukeluargas = KartuKeluarga::with('kepalaKeluarga')->get();

        $filename = "kartu_keluarga_" . date('Ymd') . ".csv";
        $handle = fopen($filename, 'w+');
        fputcsv($handle, ['Nomor KK', 'Kepala Keluarga', 'Nik Kepala', 'Jml. Anggota', 'Alamat', 'RT', 'RW']);

        foreach ($kartukeluargas as $kartu) {
            // Menghitung jumlah anggota keluarga
            $jumlahAnggota = DB::table('warga_has_kartu_keluarga')
                ->where('id_keluarga', $kartu->id_keluarga)
                ->count();

            fputcsv($handle, [
                $kartu->nomor_keluarga,
                $kartu->kepalaKeluarga->nama_warga,
                $kartu->kepalaKeluarga->nik_warga,
                $jumlahAnggota,
                $kartu->alamat_keluarga,
                $kartu->rt_keluarga,
                $kartu->rw_keluarga,
            ]);
        }

        fclose($handle);

        return Response::download($filename, $filename, [
            'Content-Type' => 'text/csv',
        ])->deleteFileAfterSend(true);
    }

}

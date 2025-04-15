<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <title>Data Warga</title>
    <style>
        /* CSS styling */
        body {
            font-family: Arial, sans-serif;
            font-size: 6px
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 1rem;
        }

        th,
        td {
            border: 1px solid #ccc;
            padding: 0.5rem;
            text-align: left;
        }

        th {
            background-color: #f0f0f0;
        }
    </style>
</head>

<body>
    <h2>Data Warga</h2>
    <table>
        <thead>
            <tr>
                <th>No</th>
                <th>NIK</th>
                <th>Nama</th>
                <th>Tempat Lahir</th>
                <th>Tanggal Lahir</th>
                <th>Jenis Kelamin</th>
                <th>Alamat KTP</th>
                <th>Alamat</th>
                <th>Agama</th>
                <th>Pendidikan Terakhir</th>
                <th>Pekerjaan</th>
                <th>Status Perkawinan</th>
                <th>Status</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($wargas as $index => $warga)
                <tr>
                    <td>{{ $index + 1 }}</td>
                    <td>{{ $warga->nik_warga }}</td>
                    <td>{{ $warga->nama_warga }}</td>
                    <td>{{ $warga->tempat_lahir_warga }}</td>
                    <td>{{ $warga->tanggal_lahir_warga }}</td>
                    <td>{{ $warga->jenis_kelamin_warga }}</td>
                    <td>{{ $warga->alamat_ktp_warga }}</td>
                    <td>{{ $warga->alamat_warga }}/{{ $warga->desa_kelurahan_warga }}/{{ $warga->kecamatan_warga }}{{ $warga->kabupaten_kota_warga }}/{{ $warga->provinsi_warga }}/{{ $warga->rt_warga }}/{{ $warga->rw_warga }}
                    </td>
                   
                    <td>{{ $warga->agama_warga }}</td>
                    <td>{{ $warga->pendidikan_terakhir_warga }}</td>
                    <td>{{ $warga->pekerjaan_warga }}</td>
                    <td>{{ $warga->status_perkawinan_warga }}</td>
                    <td>{{ $warga->status_warga }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>

</html>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Warga-{{ $warga->nik_warga }}</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            line-height: 1.6;
            margin: 0;
        }

        /* .container {
            max-width: 800px;
            margin: auto;
            padding: 20px;
            border: 1px solid #ccc;
            border-radius: 5px;
        } */

        .header {
            text-align: center;
            margin-bottom: 20px;
        }

        .header h2 {
            margin: 0;
            padding: 0;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        th, td {
            border: 1px solid #ccc;
            padding: 8px;
            text-align: left;
        }

        th {
            background-color: #f2f2f2;
            font-weight: bold;
        }

        .title {
            font-size: 20px;
            font-weight: bold;
            margin-bottom: 10px;
        }

        .section {
            margin-top: 20px;
        }
    </style>
</head>

<body>

    <div class="container">
        <div class="header">
            <h2>Detail Warga Desa Watidal-Kec.Tanimbar Utara-Kab.Kepulauan Tanimbar</h2>
        </div>

        <div class="section">
            <h3 class="title">A. Data Pribadi</h3>
            <table>
                <tbody>
                    <tr>
                        <th>NIK</th>
                        <td>{{ $warga->nik_warga }}</td>
                    </tr>
                    <tr>
                        <th>Nama</th>
                        <td>{{ $warga->nama_warga }}</td>
                    </tr>
                    <tr>
                        <th>Tempat Lahir</th>
                        <td>{{ $warga->tempat_lahir_warga }}</td>
                    </tr>
                    <tr>
                        <th>Tanggal Lahir</th>
                        <td>{{ date('d F Y', strtotime($warga->tanggal_lahir_warga)) }}</td>
                    </tr>
                    <tr>
                        <th>Jenis Kelamin</th>
                        <td>{{ $warga->jenis_kelamin_warga === 'L' ? 'Laki-laki' : 'Perempuan' }}</td>
                    </tr>
                    <tr>
                        <th>Alamat KTP</th>
                        <td>{{ $warga->alamat_ktp_warga }}</td>
                    </tr>
                    <tr>
                        <th>Alamat</th>
                        <td>{{ $warga->alamat_warga }}</td>
                    </tr>
                    <tr>
                        <th>Desa/Kelurahan</th>
                        <td>{{ $warga->desa_kelurahan_warga }}</td>
                    </tr>
                    <tr>
                        <th>Kecamatan</th>
                        <td>{{ $warga->kecamatan_warga }}</td>
                    </tr>
                    <tr>
                        <th>Kabupaten/Kota</th>
                        <td>{{ $warga->kabupaten_kota_warga }}</td>
                    </tr>
                    <tr>
                        <th>Provinsi</th>
                        <td>{{ $warga->provinsi_warga }}</td>
                    </tr>
                    <tr>
                        <th>RT</th>
                        <td>{{ $warga->rt_warga }}</td>
                    </tr>
                    <tr>
                        <th>RW</th>
                        <td>{{ $warga->rw_warga }}</td>
                    </tr>
                    <tr>
                        <th>Agama</th>
                        <td>{{ $warga->agama_warga }}</td>
                    </tr>
                    <tr>
                        <th>Pendidikan Terakhir</th>
                        <td>{{ $warga->pendidikan_terakhir_warga }}</td>
                    </tr>
                    <tr>
                        <th>Pekerjaan</th>
                        <td>{{ $warga->pekerjaan_warga }}</td>
                    </tr>
                    <tr>
                        <th>Status Perkawinan</th>
                        <td>{{ $warga->status_perkawinan_warga }}</td>
                    </tr>
                    <tr>
                        <th>Status</th>
                        <td>{{ $warga->status_warga }}</td>
                    </tr>
                </tbody>
            </table>
        </div>

        <div class="section">
            <h3 class="title">B. Data Aplikasi</h3>
            <table>
                <tbody>
                    <tr>
                        <th>Diinput oleh</th>
                        <td>{{ $warga->user->name }}</td>
                    </tr>
                    <tr>
                        <th>Diinput</th>
                        <td>{{ $warga->created_at->format('d-m-Y H:i:s') }}</td>
                    </tr>
                    <tr>
                        <th>Diperbaharui</th>
                        <td>{{ $warga->updated_at->format('d-m-Y H:i:s') }}</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>

</body>

</html>

<!DOCTYPE html>
<html>

<head>
    <style>
        body {
            font-family: Arial, Helvetica, sans-serif;
        }

        table {
            border-collapse: collapse;
            width: 100%;
        }

        th,
        td {
            font-size: 10;
            text-align: left;
            padding: 3px;
        }


        .header {
            font-size: 24px;
            font-weight: bold;
            margin-bottom: 20px;
            text-align: center;
        }

        .header-info {
            font-size: 16px;
            font-weight: bold;
            margin-bottom: 10px;
        }

        .header-label {
            font-weight: bold;
        }

        .signature {
            margin-top: 20px;
            text-align: center;
        }

        .signature-label {
            font-weight: bold;
        }

        .signature-name {
            font-weight: bold;
        }

        .signature-image {
            margin-top: 10px;
            display: block;
            margin-left: auto;
            margin-right: auto;
            width: 100px;
        }

        .table-wrapper {
            width: 48%;
        }
    </style>
</head>

<body>

    <div class="container" style="margin-left: -1rem">
        <div class="header">KARTU KELUARGA</div>
        <div class="header-info">No KK. {{ $kartu_keluarga->nomor_keluarga }}</div>

        <div style="display: flex; justify-content: space-between; margin-bottom: 13px;">
            <div class="table-wrapper">
                <table>
                    <tr>
                        <th>Nama Kepala Keluarga</th>
                        <td>:</td>
                        <td>{{ $kartu_keluarga->kepalaKeluarga->nama_warga }}</td>
                    </tr>
                    <tr>
                        <th>Alamat</th>
                        <td>:</td>
                        <td>{{ $kartu_keluarga->alamat_keluarga }}</td>
                    </tr>
                    <tr>
                        <th>RT/RW</th>
                        <td>:</td>
                        <td>{{ $kartu_keluarga->rt_keluarga }}/{{ $kartu_keluarga->rw_keluarga }}</td>
                    </tr>
                    <tr>
                        <th>Desa/Kelurahan</th>
                        <td>:</td>
                        <td>{{ $kartu_keluarga->desa_kelurahan_keluarga }}</td>
                    </tr>
                </table>
            </div>
            <div class="table-wrapper">
                <table>
                    <tr>
                        <th>KECAMATAN</th>
                        <td>:</td>
                        <td>{{ $kartu_keluarga->kecamatan_keluarga }}</td>
                    </tr>
                    <tr>
                        <th>Kabupaten/Kota</th>
                        <td>:</td>
                        <td>{{ $kartu_keluarga->kabupaten_kota_keluarga }}</td>
                    </tr>
                    <tr>
                        <th>Kode Pos</th>
                        <td>:</td>
                        <td>{{ $kartu_keluarga->kode_pos_keluarga }}</td>

                    </tr>
                    <tr>
                        <th>Provinsi</th>
                        <td>:</td>
                        <td>{{ $kartu_keluarga->provinsi_keluarga }}</td>
                    </tr>
                </table>
            </div>
        </div>


        <table border="3" >
            <thead>
                <tr>
                    <th>No.</th>
                    <th>Nama Lengkap</th>
                    <th>NIK</th>
                    <th>Jenis Kelamin</th>
                    <th>Tempat Lahir</th>
                    <th>Tanggal Lahir</th>
                    <th>Agama</th>
                    <th>Pendidikan</th>
                    <th>Jenis Pekerjaan</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($kartu_keluarga->anggota as $index => $anggota)
                <tr>
                    <td>{{ $index + 1 }}</td>
                    <td>{{ $anggota->nama_warga }}</td>
                    <td>{{ $anggota->nik_warga }}</td>
                    <td>
                        @if ($anggota->jenis_kelamin_warga === 'L')
                            Laki-laki
                        @elseif ($anggota->jenis_kelamin_warga === 'P')
                            Perempuan
                        @endif
                    </td>
                    <td>{{ $anggota->tempat_lahir_warga }}</td>
                    <td>{{ $anggota->tanggal_lahir_warga != '0000-00-00' ? date('d-m-Y', strtotime($anggota->tanggal_lahir_warga)) : '' }}</td>
                    <td>{{ $anggota->agama_warga }}</td>
                    <td>{{ $anggota->pendidikan_terakhir_warga }}</td>
                    <td>{{ $anggota->pekerjaan_warga }}</td>
                </tr>
            @endforeach
              
            </tbody>
        </table>

        <div class="" style="margin-top: 1cm ; width: 60%">
            <table>
                <tr>
                    <th style="font-size: 18px; border-bottom:2px; ">Data Aplikasi</th>
                </tr>
                <tr>
                    <th>Di input oleh </th>
                    <td>:</td>
                    <td>{{ $kartu_keluarga->user->name }}</td>
                </tr>
                <tr>
                    <th>Di input</th>
                    <td>:</td>
                    <td>{{ $kartu_keluarga->created_at->format('d-m-Y H:i:s') }}</td>
                </tr>
                <tr>
                    <th>Di perbaharui</th>
                    <td>:</td>
                    <td>{{ $kartu_keluarga->updated_at->format('d-m-Y H:i:s') }}</td>
                </tr>
            </table>
        </div>

    </div>

</body>

</html>


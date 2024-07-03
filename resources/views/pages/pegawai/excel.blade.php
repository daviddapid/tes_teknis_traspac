<!DOCTYPE html>
<html lang="en">

<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <meta http-equiv="X-UA-Compatible" content="ie=edge">
   <title>template cetak excel</title>
   <style>
      * {
         font-family: sans-serif
      }

      .text-center {
         text-align: center;
      }

      thead tr {
         background-color: red;
      }

      tbody td img {
         width: 200px;
         height: 80px;
         object-fit: contain;
      }
   </style>
</head>

<body>
   <table>
      <thead>
         <tr>
            <th class="text-center">foto</th>
            <th class="text-center">nip</th>
            <th class="text-center">nama</th>
            <th class="text-center">tempat lahir</th>
            <th class="text-center">tgl lahir</th>
            <th class="text-center">alamat</th>
            <th class="text-center">tempat tugas</th>
            <th class="text-center">no hp</th>
            <th class="text-center">npwp</th>
            <th class="text-center">unit kerja</th>
            <th class="text-center">eselon</th>
            <th class="text-center">golongan</th>
            <th class="text-center">agama</th>
            <th class="text-center">jabatan</th>
            <th class="text-center">jenis kelamin</th>
         </tr>
      </thead>
      <tbody>
         @foreach ($pegawais as $p)
         @endforeach
         <tr>
            {{-- <td><img class="img-td" src="{{ $p->foto }}" alt="foto"></td> --}}
            <td>{{ $p->nip }}</td>
            <td>{{ $p->nama }}</td>
            <td>{{ $p->tempat_lahir }}</td>
            <td>{{ $p->tgl_lahir }}</td>
            <td>{{ $p->alamat }}</td>
            <td>{{ $p->tempat_tugas }}</td>
            <td class="text-nowrap">{{ $p->no_hp }}</td>
            <td>{{ $p->npwp }}</td>
            <td>{{ $p->unitKerja->nama }}</td>
            <td>{{ $p->eselon->tingkat }}</td>
            <td>{{ $p->golongan->tingkat . '/' . $p->golongan->tipe }}</td>
            <td>{{ $p->agama->nama }}</td>
            <td>{{ $p->jabatan->nama }}</td>
            <td>{{ $p->jenisKelamin->nama }}</td>
         </tr>
      </tbody>
   </table>
</body>

</html>

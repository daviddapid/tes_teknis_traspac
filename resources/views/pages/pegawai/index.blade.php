@extends('layouts.main')
@section('nav-pegawai', 'open')
@section('nav-pegawai-index', 'open active')

@push('heads')
   <style>
      .img-td {
         width: 120px;
         object-fit: contain;
         height: 60px;
      }
   </style>
@endpush
@section('content')
   <div class="d-flex justify-content-between align-items-center mb-4">
      <h4 class="fw-bold mb-0">DATA PEGAWAI</h4>
      <div>
         <a class="btn btn-primary" href="{{ route('pegawai.create') }}">Tambah Data Pegawai</a>
      </div>
   </div>
   <div class="card">
      <div class="card-header">
         <form id="form-filter" action="{{ route('pegawai.index') }}" method="get">
            <div class="d-flex justify-content-between">
               <div class="d-flex align-items-center gap-3">
                  <div class="badge bg-label-primary fs-6 mb-0">
                     total data
                     <span class="badge bg-primary mb-0">{{ $total_pegawai }}</span>
                  </div>
                  <div class="d-flex align-items-center gap-3">
                     <select class="form-select" id="per_page" name="paginate" style="width: fit-content">
                        <option value="10" @selected((int) ($params->paginate ?? null) == 10)>tampilkan: 10</option>
                        <option value="30" @selected((int) ($params->paginate ?? null) == 30)>tampilkan: 30</option>
                        <option value="50" @selected((int) ($params->paginate ?? null) == 50)>tampilkan: 50</option>
                        <option value="70" @selected((int) ($params->paginate ?? null) == 70)>tampilkan: 70</option>
                        <option value="80" @selected((int) ($params->paginate ?? null) == 80)>tampilkan: 80</option>
                        <option value="90" @selected((int) ($params->paginate ?? null) == 90)>tampilkan: 90</option>
                        <option value="100" @selected((int) ($params->paginate ?? null) == 100)>tampilkan: 100</option>
                        <option value="semua" @selected(($params->paginate ?? null) == 'semua')>tampilkan: semua</option>
                     </select>
                  </div>
               </div>
               <div class="d-flex gap-1">
                  <a class="btn btn-success text-white" data-bs-toggle="modal" data-bs-target="#modal-cetak">cetak Excel</a>
                  <a class="btn btn-secondary" href="{{ route('pegawai.index') }}">Reset</a>
                  <button class="btn btn-info" form="form-filter" type="submit">Filter</button>
               </div>
            </div>
            <div class="row mt-2">
               <div class="col-lg-6">
                  <div>
                     <label class="form-label mb-1" for="jabatan">jabatan</label>
                     <select class="select2 form-select" id="jabatans" name="jabatan_id">
                        <option value="" disabled selected></option>
                        @foreach ($jabatans as $j)
                           <option value="{{ $j->id }}" @selected((int) ($params->jabatan_id ?? 0) == $j->id)>{{ $j->nama }}</option>
                        @endforeach
                     </select>
                  </div>

               </div>
               <div class="col-lg-6">
                  <div>
                     <label class="form-label mb-1" for="unit_kerja">unit kerja</label>
                     <select class="select2 form-select" id="unit_kerjas" name="unit_kerja_id">
                        <option value="" disabled selected></option>
                        @foreach ($unit_kerjas as $uk)
                           <option value="{{ $uk->id }}" @selected((int) ($params->unit_kerja_id ?? 0) == $uk->id)>{{ $uk->nama }}</option>
                        @endforeach
                     </select>
                  </div>
               </div>
            </div>
            <div class="row mt-2">
               <div class="col-md-3">
                  <div class="mb-2">
                     <label class="form-label mb-1" for="nama">nama</label>
                     <input class="form-control" id="nama" name="nama" type="text" value="{{ $params->nama ?? null }}"
                        placeholder="nama">
                  </div>
               </div>
               <div class="col-md-3">
                  <div class="mb-2">
                     <label class="form-label mb-1" for="tempat_lahir">tempat lahir</label>
                     <input class="form-control" id="tempat_lahir" name="tempat_lahir" type="text"
                        value="{{ $params->tempat_lahir ?? null }}" placeholder="tempat_lahir">
                  </div>
               </div>
               <div class="col-md-3">
                  <div class="mb-2">
                     <label class="form-label mb-1" for="tgl_lahir">tgl lahir</label>
                     <input class="form-control" id="tgl_lahir" name="tgl_lahir" type="date"
                        value="{{ $params->tgl_lahir ?? null }}" placeholder="tgl_lahir">
                  </div>
               </div>
               <div class="col-md-3">
                  <div class="mb-2">
                     <label class="form-label mb-1" for="alamat">alamat</label>
                     <input class="form-control" id="alamat" name="alamat" type="text" value="{{ $params->alamat ?? null }}"
                        placeholder="alamat">
                  </div>
               </div>
            </div>

            <div class="row mt-2">
               <div class="col-md-3">
                  <div>
                     <label class="form-label mb-1" for="nip">nip</label>
                     <input class="form-control" id="nip" name="nip" type="text" value="{{ $params->nip ?? null }}"
                        placeholder="nip">
                  </div>
               </div>
               <div class="col-md-3">
                  <div>
                     <label class="form-label mb-1" for="tempat_tugas">tempat tugas</label>
                     <input class="form-control" id="tempat_tugas" name="tempat_tugas" type="text"
                        value="{{ $params->tempat_tugas ?? null }}" placeholder="tempat_tugas">
                  </div>
               </div>
               <div class="col-md-3">
                  <div>
                     <label class="form-label mb-1" for="no_hp">no hp</label>
                     <input class="form-control" id="no_hp" name="no_hp" type="text"
                        value="{{ $params->no_hp ?? null }}" placeholder="no_hp">
                  </div>
               </div>
               <div class="col-md-3">
                  <div>
                     <label class="form-label mb-1" for="npwp">npwp</label>
                     <input class="form-control" id="npwp" name="npwp" type="text"
                        value="{{ $params->npwp ?? null }}" placeholder="npwp">
                  </div>
               </div>
            </div>
            <div class="row mt-2">
               <div class="col-md-3">
                  <div>
                     <label class="form-label mb-1" for="jenis_kelamin">jenis kelamin</label>
                     <select class="select2 form-select" id="jenis_kelamin" name="jenis_kelamin_id">
                        <option value="" disabled selected></option>
                        @foreach ($jenis_kelamins as $j)
                           <option value="{{ $j->id }}" @selected((int) ($params->jenis_kelamin_id ?? 0) == $j->id)>{{ $j->nama }}</option>
                        @endforeach
                     </select>
                  </div>

               </div>
               <div class="col-md-3">
                  <div>
                     <label class="form-label mb-1" for="eselon">eselon</label>
                     <select class="select2 form-select" id="eselon" name="eselon_id" style="min-width: 100px">
                        <option value="" disabled selected></option>
                        @foreach ($eselons as $e)
                           <option value="{{ $e->id }}" @selected((int) ($params->eselon_id ?? 0) == $e->id)>{{ $e->tingkat }}</option>
                        @endforeach
                     </select>
                  </div>
               </div>
               <div class="col-md-3">
                  <div>
                     <label class="form-label mb-1" for="golongan">golongan</label>
                     <select class="select2 form-select" id="golongan" name="golongan_id">
                        <option value="" disabled selected></option>
                        @foreach ($golongans as $key => $items)
                           <optgroup label="tingkat {{ $key }}">
                              @foreach ($items as $item)
                                 <option value="{{ $item->id }}" @selected((int) ($params->golongan_id ?? 0) == $item->id)>
                                    {{ $item->tingkat }}/{{ $item->tipe }}</option>
                              @endforeach
                           </optgroup>
                        @endforeach
                     </select>
                  </div>
               </div>
               <div class="col-md-3">
                  <div class="">
                     <label class="form-label mb-1" for="agama">agama</label>
                     <select class="select2 form-select" id="agama" name="agama_id">
                        <option value="" disabled selected></option>
                        @foreach ($agamas as $a)
                           <option value="{{ $a->id }}" @selected((int) ($params->agama_id ?? 0) == $a->id)>{{ $a->nama }}</option>
                        @endforeach
                     </select>
                  </div>
               </div>
            </div>
         </form>
      </div>
      <div class="table-responsive">
         <table class="table-bordered table">
            <thead>
               <tr>
                  <th class="text-center">action</th>
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
                  <tr>
                     <td>
                        <div class="d-flex align-items-center gap-2">
                           <a class="btn btn-warning p-2" href="{{ route('pegawai.edit', $p) }}"><i class='bx bx-edit'></i></a>
                           <button class="btn btn-danger p-2" data-bs-toggle="modal" data-bs-target="#modal-delete"
                              onclick="handleDelete({{ $p }}, '{{ route('pegawai.destroy', $p->id) }}')">
                              <i class='bx bx-trash'></i>
                           </button>
                        </div>
                     </td>
                     <td><img class="img-td" src="{{ $p->foto }}" alt="foto"></td>
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
               @endforeach
            </tbody>
         </table>
      </div>
      <div class="mt-3 px-3">
         @if (isset($params->paginate) && $params->paginate != 'semua')
            {{ $pegawais->links() }}
         @elseif(!isset($params->paginate))
            {{ $pegawais->links() }}
         @endif
      </div>
   </div>
   <!-- Modal excel -->
   <div class="modal fade" id="modal-cetak" aria-labelledby="exampleModalLabel" aria-hidden="true" tabindex="-1">
      <div class="modal-dialog modal-dialog-centered">
         <div class="modal-content">
            <div class="modal-header">
               <h1 class="modal-title fs-5" id="exampleModalLabel">Cetak Excel</h1>
               <button class="btn-close" data-bs-dismiss="modal" type="button" aria-label="Close"></button>
            </div>
            <div class="modal-body">
               data yang dicetak akan relatif terhadap data yang tampil saat ini di tabel, jadi pastikan anda telah memfilter data
               yang ingin dicetak dengan menginputkan apa saja yang ingin difilter lalu menekan tombol filter
            </div>
            <div class="modal-footer">
               <button class="btn btn-secondary" data-bs-dismiss="modal" type="button">Close</button>
               <a class="btn btn-success text-white" href="{{ route('pegawai.cetak', (array) $params) }}">Cetak Excel</a>
            </div>
         </div>
      </div>
   </div>
   <!-- Modal delete -->
   <div class="modal fade" id="modal-delete" aria-labelledby="exampleModalLabel" aria-hidden="true" tabindex="-1">
      <div class="modal-dialog modal-dialog-centered">
         <div class="modal-content">
            <div class="modal-header">
               <h1 class="modal-title fs-5" id="exampleModalLabel">Hapus Data</h1>
               <button class="btn-close" data-bs-dismiss="modal" type="button" aria-label="Close"></button>
            </div>
            <div class="modal-body">
               <form id="form-delete" method="POST">
                  @csrf
                  @method('delete')
                  apa anda yakin menghapus data pegawai ini: <b id="delete-nama"></b>
               </form>
            </div>
            <div class="modal-footer">
               <button class="btn btn-secondary" data-bs-dismiss="modal" type="button">Close</button>
               <button class="btn btn-danger" form="form-delete" type="submit">Hapus</button>
            </div>
         </div>
      </div>
   </div>
@endsection
@push('scripts')
   <script>
      $(document).ready(function() {
         $('.select2-filter-options').select2({
            theme: 'bootstrap-5',
         });
      });

      function handleDelete(pegawai, url) {
         $('#delete-nama').text(pegawai.nama);
         $('#form-delete').attr('action', url);
      }
   </script>
@endpush

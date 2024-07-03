@extends('layouts.main')
@section('nav-pegawai', 'open')
@section('nav-pegawai-create', 'open active')
@section('content')
   <a class="d-flex align-items-center mb-4 gap-1 text-black" href="{{ route('pegawai.index') }}">
      <i class='bx bx-left-arrow-alt fs-4'></i>
      <h4 class="mb-0">Kembali</h4>
   </a>
   <div class="card">
      <div class="card-header d-flex justify-content-between align-items-center mb-0">
         <h4 class="mb-0">Tambah Data Pegawai</h4>
         <div><button class="btn btn-primary" form="form-create" type="submit">Simpan</button></div>
      </div>
      <div class="card-body">
         <form id="form-create" method="post" enctype="multipart/form-data">
            @csrf
            <div class="row">
               {{-- form biodata --}}
               <div class="col-md-6">
                  <div class="rounded border p-3">
                     <h5 class="fw-bold">BIODATA</h5>
                     <div class="mb-3">
                        <label class="form-label" for="foto">foto pegawai</label>
                        <input class="dropify form-control" name="foto" data-height="110"
                           data-allowed-file-extensions="pdf png jpg jpeg psd webp" type="file" value="{{ old('foto') }}"
                           required>
                     </div>
                     <div class="mb-3">
                        <label class="form-label" for="nama">nama</label>
                        <input class="form-control" id="nama" name="nama" type="text" value="{{ old('nama') }}"
                           required>
                        @error('nama')
                           <small class="text-danger">{{ $message }}</small>
                        @enderror
                     </div>
                     <div class="mb-3">
                        <label class="form-label" for="tgl_lahir">tgl lahir</label>
                        <input class="form-control" id="tgl_lahir" name="tgl_lahir" type="date" value="{{ old('tgl_lahir') }}"
                           required>
                        @error('tgl_lahir')
                           <small class="text-danger">{{ $message }}</small>
                        @enderror
                     </div>
                     <div class="mb-3">
                        <label class="form-label" for="tempat_lahir">tempat lahir</label>
                        <input class="form-control" id="tempat_lahir" name="tempat_lahir" type="text"
                           value="{{ old('tempat_lahir') }}" required>
                        @error('tempat_lahir')
                           <small class="text-danger">{{ $message }}</small>
                        @enderror
                     </div>
                     <div class="mb-3">
                        <label class="form-label" for="alamat">alamat</label>
                        <input class="form-control" id="alamat" name="alamat" type="text" value="{{ old('alamat') }}"
                           required>
                        @error('alamat')
                           <small class="text-danger">{{ $message }}</small>
                        @enderror
                     </div>
                     <div class="mb-3">
                        <label class="form-label" for="agama_id">agama</label>
                        <select class="select2 form-select" id="agama_id" name="agama_id" value="{{ old('agama_id') }}" required>
                           <option value="" selected disabled></option>
                           @foreach ($agamas as $a)
                              <option value="{{ $a->id }}" @selected(old('agama_id') == $a->id)>{{ $a->nama }}</option>
                           @endforeach
                        </select>
                        @error('agama_id')
                           <small class="text-danger">{{ $message }}</small>
                        @enderror
                     </div>
                     <div class="mb-3">
                        <label class="form-label" for="jenis_kelamin_id">jenis kelamin</label>
                        <select class="select2 form-select" id="jenis_kelamin_id" name="jenis_kelamin_id"
                           value="{{ old('jenis_kelamin_id') }}" required>
                           <option value="" selected disabled></option>
                           @foreach ($jenis_kelamins as $j)
                              <option value="{{ $j->id }}" @selected(old('jenis_kelamin_id') == $j->id)>{{ $j->nama }}</option>
                           @endforeach
                        </select>
                        @error('jenis_kelamin_id')
                           <small class="text-danger">{{ $message }}</small>
                        @enderror
                     </div>

                  </div>
               </div>
               {{-- end form biodata --}}

               {{-- form detail kepegawaian --}}
               <div class="col-md-6">
                  <div class="rounded border p-3">
                     <h5 class="fw-bold">DETAIL KEPEGAWAIAN</h5>

                     <div class="mb-3">
                        <label class="form-label" for="unit_kerja_id">unit kerja</label>
                        <select class="select2 form-select" id="unit_kerja_id" name="unit_kerja_id"
                           value="{{ old('unit_kerja_id') }}" required>
                           <option value="" selected disabled></option>
                           @foreach ($unit_kerjas as $u)
                              <option value="{{ $u->id }}" @selected(old('unit_kerja_id') == $u->id)>{{ $u->nama }}</option>
                           @endforeach
                        </select>
                        @error('unit_kerja_id')
                           <small class="text-danger">{{ $message }}</small>
                        @enderror
                     </div>
                     <div class="mb-3">
                        <label class="form-label" for="jabatan_id">jabatan</label>
                        <select class="select2 form-select" id="jabatan_id" name="jabatan_id" value="{{ old('jabatan_id') }}"
                           required>
                           <option value="" selected disabled></option>
                           @foreach ($jabatans as $j)
                              <option value="{{ $j->id }}" @selected(old('jabatan_id') == $j->id)>{{ $j->nama }}</option>
                           @endforeach
                        </select>
                        @error('jabatan_id')
                           <small class="text-danger">{{ $message }}</small>
                        @enderror
                     </div>
                     <div class="mb-3">
                        <label class="form-label" for="golongan_id">golongan</label>
                        <select class="select2 form-select" id="golongan_id" name="golongan_id" value="{{ old('golongan_id') }}"
                           required>
                           <option value="" disabled selected></option>
                           @foreach ($golongans as $key => $items)
                              <optgroup label="tingkat {{ $key }}">
                                 @foreach ($items as $item)
                                    <option value="{{ $item->id }}" @selected(old('golongan_id') == $item->id)>
                                       {{ $item->tingkat }}/{{ $item->tipe }}</option>
                                 @endforeach
                              </optgroup>
                           @endforeach
                        </select>
                        @error('golongan_id')
                           <small class="text-danger">{{ $message }}</small>
                        @enderror
                     </div>
                     <div class="mb-3">
                        <label class="form-label" for="eselon_id">eselon</label>
                        <select class="select2 form-select" id="eselon_id" name="eselon_id" value="{{ old('eselon_id') }}"
                           required>
                           <option value="" selected disabled></option>
                           @foreach ($eselons as $e)
                              <option value="{{ $e->id }}" @selected(old('eselon_id') == $e->id)>{{ $e->tingkat }}</option>
                           @endforeach
                        </select>
                        @error('eselon_id')
                           <small class="text-danger">{{ $message }}</small>
                        @enderror
                     </div>
                     <div class="mb-3">
                        <label class="form-label" for="nip">nip</label>
                        <input class="form-control" id="nip" name="nip" type="text" value="{{ old('nip') }}"
                           required>
                        @error('nip')
                           <small class="text-danger">{{ $message }}</small>
                        @enderror
                     </div>
                     <div class="mb-3">
                        <label class="form-label" for="npwp">npwp</label>
                        <input class="form-control" id="npwp" name="npwp" type="text" value="{{ old('npwp') }}"
                           required>
                        @error('npwp')
                           <small class="text-danger">{{ $message }}</small>
                        @enderror
                     </div>
                     <div class="mb-3">
                        <label class="form-label" for="tempat_tugas">tempat tugas</label>
                        <input class="form-control" id="tempat_tugas" name="tempat_tugas" type="text"
                           value="{{ old('tempat_tugas') }}" required>
                        @error('tempat_tugas')
                           <small class="text-danger">{{ $message }}</small>
                        @enderror
                     </div>
                     <div class="mb-3">
                        <label class="form-label" for="no_hp">no hp</label>
                        <input class="form-control" id="no_hp" name="no_hp" type="text" value="{{ old('no_hp') }}"
                           required>
                        @error('no_hp')
                           <small class="text-danger">{{ $message }}</small>
                        @enderror
                     </div>
                  </div>
               </div>
               {{-- end form detail kepegawaian --}}
            </div>
         </form>
      </div>
   </div>
@endsection

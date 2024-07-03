@extends('layouts.main')
@section('nav-master', 'open')
@section('nav-master-eselon', 'open active')

{{-- terakhir sampai crud eselon belom kelar --}}
@section('content')
   <div class="d-flex justify-content-between align-items-center mb-4">
      <h4 class="fw-bold mb-0">DATA ESELON</h4>
      <div>
         <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modal-create">Tambah Data Eselon</button>
      </div>
   </div>
   <div class="card">
      <div class="card-header"></div>
      <div class="card-body">
         <table class="table-bordered table">
            <thead>
               <tr>
                  <th>no</th>
                  <th>Tingkat</th>
                  <th>action</th>
               </tr>
            </thead>
            <tbody>
               @foreach ($eselons as $item)
                  <tr>
                     <td class="fit-center">{{ $loop->iteration }}</td>
                     <td>{{ $item->tingkat }}</td>
                     <td class="fit-center">
                        <button class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#modal-edit"
                           onclick="handleEdit({{ $item }},'{{ route('eselon.update', $item) }}')">Edit</button>
                        <button class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#modal-delete"
                           onclick="handleDelete({{ $item }},'{{ route('eselon.destroy', $item) }}')">Delete</button>
                     </td>
                  </tr>
               @endforeach
            </tbody>
         </table>
      </div>
   </div>
   <!-- Modal create -->
   <div class="modal fade" id="modal-create" aria-labelledby="exampleModalLabel" aria-hidden="true" tabindex="-1">
      <div class="modal-dialog modal-dialog-centered">
         <div class="modal-content">
            <div class="modal-header">
               <h1 class="modal-title fs-5" id="exampleModalLabel">Tambah Data</h1>
               <button class="btn-close" data-bs-dismiss="modal" type="button" aria-label="Close"></button>
            </div>
            <div class="modal-body">
               <form id="form-create" method="POST" action="{{ route('eselon.store') }}">
                  @csrf
                  <div class="mb-3">
                     <label class="form-label" for="nama">nama</label>
                     <input class="form-control" name="tingkat" type="text" required>
                  </div>
               </form>
            </div>
            <div class="modal-footer">
               <button class="btn btn-secondary" data-bs-dismiss="modal" type="button">Close</button>
               <button class="btn btn-primary" form="form-create" type="submit">Tambah</button>
            </div>
         </div>
      </div>
   </div>
   <!-- Modal edit -->
   <div class="modal fade" id="modal-edit" aria-labelledby="exampleModalLabel" aria-hidden="true" tabindex="-1">
      <div class="modal-dialog modal-dialog-centered">
         <div class="modal-content">
            <div class="modal-header">
               <h1 class="modal-title fs-5" id="exampleModalLabel">Edit Data</h1>
               <button class="btn-close" data-bs-dismiss="modal" type="button" aria-label="Close"></button>
            </div>
            <div class="modal-body">
               <form id="form-edit" method="POST">
                  @method('put')
                  @csrf
                  <div class="mb-3">
                     <label class="form-label" for="tingkat-edit">nama</label>
                     <input class="form-control" id="tingkat-edit" name="tingkat" type="text">
                  </div>
               </form>
            </div>
            <div class="modal-footer">
               <button class="btn btn-secondary" data-bs-dismiss="modal" type="button">Close</button>
               <button class="btn btn-warning" form="form-edit" type="submit">Update</button>
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
                  @method('delete')
                  @csrf
                  <span>apa anda yakin akan menghapus data ini: <b id="item-delete"></b></span>
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
      function handleEdit(eselon, url) {
         $('#form-edit').attr('action', url);
         $('#tingkat-edit').val(eselon.tingkat);
      }

      function handleDelete(eselon, url) {
         $('#form-delete').attr('action', url);
         $('#item-delete').text(eselon.tingkat);
      }
   </script>
@endpush

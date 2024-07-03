<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

class UpdatePegawaiRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return Auth::check();
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'nip' => 'numeric|max_digits:255|unique:pegawais,nip,' . request('pegawai')->id,
            'nama' => 'max:255',
            'tempat_lahir' => 'max:255',
            'alamat' => 'max:255',
            'tgl_lahir' => 'date',
            'tempat_tugas' => 'max:255',
            'no_hp' => 'numeric|max_digits:255|',
            'npwp' => 'numeric|max_digits:255|unique:pegawais,nip,' . request('pegawai')->id,
            'unit_kerja_id' => 'integer',
            'eselon_id' => 'integer',
            'golongan_id' => 'integer',
            'agama_id' => 'integer',
            'jabatan_id' => 'integer',
            'jenis_kelamin_id' => 'integer',
            // 'foto' => 'nullable|image|max:5000'
            'foto' => 'max:5000'
        ];
    }
    protected function failedValidation(Validator $validator)
    {
        alert('Gagal', 'Gagal Menambah data baru, pastikan semua input valid', 'error');
    }
}

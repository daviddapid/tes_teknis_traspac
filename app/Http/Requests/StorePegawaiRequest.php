<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

class StorePegawaiRequest extends FormRequest
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
            'nip' => 'required|numeric|max_digits:255|unique:pegawais',
            'nama' => 'required|max:255',
            'tempat_lahir' => 'required|max:255',
            'alamat' => 'required|max:255',
            'tgl_lahir' => 'required|date',
            'tempat_tugas' => 'required|max:255',
            'no_hp' => 'required|numeric|max_digits:255',
            'npwp' => 'required|numeric|max_digits:255|unique:pegawais',
            'unit_kerja_id' => 'required|integer',
            'eselon_id' => 'required|integer',
            'golongan_id' => 'required|integer',
            'agama_id' => 'required|integer',
            'jabatan_id' => 'required|integer',
            'jenis_kelamin_id' => 'required|integer',
            'foto' => 'required|image|max:5000'
        ];
    }
    protected function failedValidation(Validator $validator)
    {
        alert('Gagal', 'Gagal Menambah data baru, pastikan semua input valid', 'error');
    }
}

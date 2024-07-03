<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class UpdateJenisKelaminRequest extends FormRequest
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
            'nama' => 'required|unique:jenis_kelamins,nama,' . request('jenis_kelamin')->id
        ];
    }
    protected function prepareForValidation(): void
    {
        $this->merge([
            'nama' => Str::title($this->nama),
        ]);
    }
    protected function failedValidation(Validator $validator)
    {
        alert('Gagal', 'data : ' . $this->nama . ' telah ada', 'error');
    }
}

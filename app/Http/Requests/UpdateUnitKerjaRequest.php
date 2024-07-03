<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class UpdateUnitKerjaRequest extends FormRequest
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
            'nama' => 'max:255|unique:unit_kerjas,nama,' . request('unit_kerja')->id
        ];
    }
    protected function prepareForValidation(): void
    {
        $this->merge([
            'nama' => Str::upper($this->nama),
        ]);
    }
    protected function failedValidation(Validator $validator)
    {
        alert('Gagal', 'unit kerja : ' . $this->nama . ' telah ada', 'error');
    }
}
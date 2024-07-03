<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

class UpdateEselonRequest extends FormRequest
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
            'tingkat' => 'max:255|unique:eselons,tingkat,' . request('eselon')->id
        ];
    }
    protected function failedValidation(Validator $validator)
    {
        alert('Gagal', 'eselon tingkat: ' . $this->tingkat . ' telah ada', 'error');
    }
}
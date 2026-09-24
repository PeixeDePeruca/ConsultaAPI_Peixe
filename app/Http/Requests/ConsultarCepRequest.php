<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;
use Override;

class ConsultarCepRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    #[Override]
    public function prepareForValidation()
    {
        $this->merge([
            'cep' => preg_replace('/\D/', '', (string) $this->input('cep')),
        ]);
        
    }

    public function rules(): array
    {
        return [
            'cep' => ['required', 'digits:8']
        ];
    }
}

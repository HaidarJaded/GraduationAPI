<?php

namespace App\Http\Requests\Customers;

use Illuminate\Foundation\Http\FormRequest;

class CreateCustomerRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'name' => 'required|string|alpha',
            'last_name' => 'required|string|alpha',
            'national_id' => 'required|string|size:11|unique:customers,national_id,NULL,id,client_id,' . $this->input('client_id'),
            'client_id' => 'required|exists:clients,id',
            'phone' => 'required|string|size:10',
            'email' => 'required|email',
            'devices_count' => 'integer|min:0',
        ];
    }
}
<?php

namespace App\Http\Requests\Clients;

use Illuminate\Foundation\Http\FormRequest;

class UpdateClientRequest extends FormRequest
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
            'center_name' => 'string|alpha|filled',
            'phone' => 'nullable|string|filled',
            'devices_count' => 'nullable|integer|filled',
            'email' => 'string|unique:clients|filled',
            'name' => 'string|filled|alpha',
            'last_name' => 'string|filled|alpha',
            'rule_id' => 'nullable|exists:rules,id|filled',
            'email_verified_at' => 'nullable|date|filled',
            'password' => 'string|filled',
            'address' => 'string|filled',
        ];
    }
}

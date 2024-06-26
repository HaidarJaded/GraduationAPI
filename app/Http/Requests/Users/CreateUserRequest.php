<?php

namespace App\Http\Requests\Users;

use Illuminate\Validation\Rules;
use App\Rules\UniqueEmailAcrossTables;
use Illuminate\Foundation\Http\FormRequest;

class CreateUserRequest extends FormRequest
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
            'email' => ['required', 'email', 'string', new UniqueEmailAcrossTables],
            'name' => [
                'required',
                'max:20',
                'min:2',
                'string',
            ],
            'last_name' => [
                'required',
                'max:20',
                'min:2',
                'string',
            ],
            'password' => [
                'required',
                'confirmed',
                Rules\Password::defaults()
            ],
            'password_confirmation' => 'required',
            'rule_id' => [
                'integer',
                'required',
                'numeric',
                'exists:rules,id'
            ],
            'phone' => [
                'max:10',
                'min:10'
            ]
        ];
    }
}

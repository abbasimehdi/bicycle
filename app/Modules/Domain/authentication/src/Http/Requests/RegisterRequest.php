<?php

namespace Bicycle\Modules\Domain\Authentication\Http\Requests;

use Selfofficename\Modules\Domain\Authentication\Rules\EmailValidation;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class RegisterRequest extends FormRequest
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
            "name"        => "required|min:3|max:32",
            "email"       => [
                "required",
                "min:7",
                "max:64",
                Rule::unique('users', 'email'),
                new EmailValidation()
            ],
            "mobile"       => [
                "required",
                "min:11",
                "max:11",
                Rule::unique('users', 'mobile'),
            ],
            "password"    => "required|min:6|max:16"
        ];
    }
}

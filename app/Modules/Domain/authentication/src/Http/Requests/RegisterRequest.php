<?php

namespace Bicycle\Modules\Domain\Authentication\Http\Requests;

use Bicycle\Modules\Domain\Authentication\Models\Schemas\Constants\AuthConstants;
use Bicycle\Modules\Domain\Authentication\Rules\EmailValidation;
use Illuminate\Contracts\Validation\ValidationRule;
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
     * @return array<string, ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            AuthConstants::NAME        => "required|min:3|max:32",
            AuthConstants::EMAIL       => [
                "required",
                "min:7",
                "max:64",
                Rule::unique('users', 'email'),
                new EmailValidation()
            ],
            AuthConstants::USERNAME    => "required|unique:users|min:3|max:16",
            AuthConstants::PASSWORD    => "required|min:6|max:16"
        ];
    }
}

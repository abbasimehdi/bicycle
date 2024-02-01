<?php

namespace Bicycle\Modules\Domain\Authentication\Http\Requests;

use Bicycle\Modules\Domain\Authentication\Models\Schemas\Constants\AuthConstants;
use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;

class LoginRequest extends FormRequest
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
            AuthConstants::EMAIL    => "required|min:7|max:64|exists:users,email",
            AuthConstants::PASSWORD => "required|min:6|max:16"
        ];
    }
}

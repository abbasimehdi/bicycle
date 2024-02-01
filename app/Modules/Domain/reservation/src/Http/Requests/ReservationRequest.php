<?php

namespace Bicycle\Modules\Domain\Reservation\Http\Requests;

use Bicycle\Modules\Domain\Reservation\Models\Schemas\Constants\ReservationConstants;
use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;

class ReservationRequest extends FormRequest
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
            ReservationConstants::START_DATE => 'required|date',
            ReservationConstants::END_DATE   => 'required|date',
            ReservationConstants::COUNT      => 'required|integer',
        ];
    }
}

<?php

namespace App\Rules;

use App\Models\Schmas\Constants\BaseConstants;
use Illuminate\Contracts\Translation\Translator;
use Illuminate\Contracts\Validation\Rule;
use Illuminate\Foundation\Application;

class CheckStringIsValid implements Rule
{
    /**
     * @param $attribute
     * @param $value
     * @return bool
     */
    public function passes($attribute, $value): bool
    {
        return (bool)preg_match(BaseConstants::STRING_REGEX, $value);
    }

    /**
     * @return Application|array|string|Translator|null
     */
    public function message(): Application|array|string|Translator|null
    {
        return __('text.string-error');
    }
}

<?php

namespace Selfofficename\Modules\Domain\Authentication\Rules;

use Illuminate\Contracts\Translation\Translator;
use Illuminate\Contracts\Validation\Rule;
use Illuminate\Foundation\Application;
use Selfofficename\Modules\Core\Models\Schemas\Constants\BaseConstants;
use Selfofficename\Modules\Domain\Authentication\Models\Schemas\Constants\AuthConstants;

class EmailValidation implements Rule
{
    /**
     * @param $attribute
     * @param $value
     * @return bool
     */
    public function passes($attribute, $value): bool
    {
        return (bool)preg_match(AuthConstants::EMAIL_REGEX, $value);
    }

    /**
     * @return Application|array|string|Translator|null
     */
    public function message(): Application|array|string|Translator|null
    {
        return __('The email field must be a valid email address');
    }
}

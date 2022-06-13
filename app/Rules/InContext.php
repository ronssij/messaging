<?php

namespace App\Rules;

use App\Models\Context;
use Illuminate\Contracts\Validation\Rule;
use Illuminate\Support\Str;

class InContext implements Rule
{
    /**
     * Determine if the validation rule passes.
     *
     * @param  string  $attribute
     * @param  mixed  $value
     * @return bool
     */
    public function passes($attribute, $value)
    {
        $strings = Str::of(preg_replace('/[^a-zA-Z0-9 ]+/', "", $value))->lower()->split('/[\s,]+/')->toArray();

        return Context::whereIn('context', $strings)->exists();
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return 'Sorry I don\'t understand.';
    }
}

<?php

namespace App\Rules;

use App\Models\Table;
use Closure;
use Illuminate\Contracts\Validation\ValidationRule;

class TableIsAvailable implements ValidationRule
{
    /**
     * Run the validation rule.
     *
     * @param  \Closure(string, ?string=): \Illuminate\Translation\PotentiallyTranslatedString  $fail
     */
    public function validate(string $attribute, mixed $value, Closure $fail): void
    {
    $table = Table::where('table_number', $value)->first();


        if ($table->status !== 'available') {
            $fail('The selected table is not available.');
        }
    }
}

<?php
/**
 *  app/Validators/PasswordValidator.php
 *
 * Date-Time: 10.06.21
 * Time: 14:18
 * @author Vito Makhatadze <vitomaxatadze@gmail.com>
 */

namespace App\Validators;

use Illuminate\Support\Facades\Hash;

/**
 * Class PasswordValidator
 * @package App\Validators
 */
class PasswordValidator
{
    /**
     * @param $attribute
     * @param $value
     * @param $parameters
     * @param $validator
     *
     * @return bool
     */
    public function validate($attribute, $value, $parameters, $validator): bool
    {
        return Hash::check($value, optional(auth()->user())->password);
    }
}
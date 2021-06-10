<?php

namespace App\Rules;

use App\Models\Coupon;
use Illuminate\Contracts\Validation\Rule;

class ValidCoupon implements Rule
{
    protected ?Coupon $coupon;

    protected  $message;

    /**
     * Create a new rule instance.
     *
     * @return void
     */
    public function __construct(?Coupon $coupon)
    {
        $this->coupon = $coupon;
    }

    /**
     * Determine if the validation rule passes.
     *
     * @param string $attribute
     * @param mixed $value
     *
     * @return bool
     */
    public function passes($attribute, $value): bool
    {
        $this->coupon = Coupon::where('code', $value)->first();


        if (!$this->coupon) {
            $this->fail('Coupon not found.');
            return false;
        }
        if ($this->coupon->hasExpired()) {
            $this->fail('Coupon expired.');
            return false;
        }
        return true;
    }

    /**
     * @param $message
     *
     * @return false
     */
    protected function fail($message): bool
    {
        $this->message = $message;
        return false;

    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message(): string
    {
        return $this->message;
    }
}

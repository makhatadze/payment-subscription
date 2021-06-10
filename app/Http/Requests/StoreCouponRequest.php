<?php
/**
 *  app/Http/Requests/StoreCouponRequest.php
 *
 * Date-Time: 10.06.21
 * Time: 14:54
 * @author Vito Makhatadze <vitomaxatadze@gmail.com>
 */
namespace App\Http\Requests;

use App\Models\Coupon;
use App\Rules\ValidCoupon;
use Illuminate\Foundation\Http\FormRequest;

/**
 * Class StoreCouponRequest
 * @package App\Http\Requests
 */
class StoreCouponRequest extends FormRequest
{

    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'coupon' => [
                'required',
                new ValidCoupon($this->getCouponModel())
            ]
        ];
    }

    /**
     * @return mixed
     */
    public function getCouponModel()
    {
        return Coupon::where('code',$this->coupon)->first();
    }
}

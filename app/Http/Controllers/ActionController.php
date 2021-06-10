<?php
/**
 *  app/Http/Controllers/ActionController.php
 *
 * Date-Time: 10.06.21
 * Time: 14:00
 * @author Vito Makhatadze <vitomaxatadze@gmail.com>
 */
namespace App\Http\Controllers;

use App\Models\Coupon;
use App\Rules\CurrentPassword;
use App\Rules\ValidCoupon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

/**
 * Class ActionController
 * @package App\Http\Controllers
 */
class ActionController extends Controller
{
    /**
     * ActionController constructor.
     */
    public function __construct()
    {
        $this->middleware(['auth']);
    }


    /**
     * @param \Illuminate\Http\Request $request
     *
     * @return mixed
     * @throws \Illuminate\Validation\ValidationException
     */
    public function action(Request $request) {
        $user = $request->user();

        $coupon = Coupon::where('code',$request->coupon)->first();

        $this->validate($request,[
            'coupon' => [
                'required',
                new ValidCoupon($coupon)
            ]
        ]);

        return back()->withStatus('Passed');
    }
}

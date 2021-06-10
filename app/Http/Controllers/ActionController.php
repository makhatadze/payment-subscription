<?php
/**
 *  app/Http/Controllers/ActionController.php
 *
 * Date-Time: 10.06.21
 * Time: 14:00
 * @author Vito Makhatadze <vitomaxatadze@gmail.com>
 */
namespace App\Http\Controllers;

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

        $this->validate($request,[
            'password' => [
                'required',
                'current_password'
            ]
        ]);

        return back()->withStatus('Passed');
    }
}

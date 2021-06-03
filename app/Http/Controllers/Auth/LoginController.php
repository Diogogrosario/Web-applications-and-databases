<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use App\Models\Category;
use Illuminate\Http\Request;  
use Illuminate\Support\Facades\DB;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = '/';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    public function getUser(Request $request){
        return $request->user();
    }

    public function home() {
        return redirect('login');
    }

    public function login(Request $request)
    {
        if(Auth::attempt($request->only('email', 'password')))
        {
            if(Auth::user()->isBanned())
            {
                Auth::logout();
                return redirect('/login')->with(['banned'=>'Account Is Banned.']);
            }

            $unauth_cart = session('cart');
            if($unauth_cart != NULL && count($unauth_cart) != 0) {
                foreach($unauth_cart as $item_id => $quantity) {
                    DB::select('call add_to_cart(?,?,?)', array(Auth::user()["user_id"], $item_id, $quantity));
                }
            }

            $request->session()->regenerate();
        }
        else
            return redirect('/login')->with(["unknownAccount"=>'Incorrect User Or Password!']);

        return redirect('/login');
    }
    
    public function show()
    {
        $categories = Category::all()->sortBy("category_id");
        return view('auth.login')->with('categories', $categories);
    }
}

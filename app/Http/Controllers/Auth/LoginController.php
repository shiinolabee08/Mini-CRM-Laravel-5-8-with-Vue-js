<?php

namespace App\Http\Controllers\Auth;

use Auth;
use JWTAuth;
use App\User;
use Illuminate\Http\Request;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

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
    protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    public function authenticate(Request $request)
    {
        $this->validate($request, [
            'email'    => 'required|email',
            'password' => 'required|min:8',
        ]);

        $credentials = $request->only('email','password');
        
        if(list($user,$token) = $this->attempt($credentials)){
            return response()->json(compact('user', 'token'));
        }else{
            return response()->json(['success' => false]);
        }
        
    }    

    public function unlink(Request $request)
    {
        Auth::logout();
    }

    private function attempt(array $credentials = [])
    {   
        $user = User::where( 'email', trim($credentials['email']) )->first();
        
        if( $user ){

            if ( JWTAuth::attempt($credentials)) {
                
                Auth::login($user);
                $token = uniqid();
                // $token = JWTAuth::fromUser($user);

                return array($user,$token);
            }        
            
        }
        
        return false;
    }
}

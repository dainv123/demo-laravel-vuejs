<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Carbon\Carbon;

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

    public function login(Request $request)
    {
        $credentials = request(['email', 'password']);
        if(!Auth::attempt($credentials))
            return response()->json([
                'message' => 'Unauthorized'
            ], 401);

        $user = $request->user();

        $user->tokens->load('client')->filter(function ($token) { 
            return $token->client->personal_access_client && ! $token->revoked; 
        })->values();

        
        $tokenResult = $user->createToken('Personal Access Token');
        $token = $tokenResult->token;
        
        $token->save();
        $g_token = $tokenResult->accessToken;
        
        // return view('admin.index', compact('g_token'));
        return redirect('/home')->with('g_token', $g_token);
    }
    
    public function user(Request $request)
    {
        return response()->json($request->user());
    }
}

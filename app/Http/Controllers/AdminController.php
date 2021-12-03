<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Cookie;
use App\Models\User;
use Validator;


class AdminController extends Controller
{
    /**
     * Create a new AuthController instance.
     *
     * @return void
     */
    public function __construct() {
        $this->middleware('auth:admin', ['except' => ['login', 'register']]);
        Auth::shouldUse('admin');
    }

    /**
     * Get a JWT via given credentials.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function login(Request $request){
    	$validator = Validator::make($request->all(), [
            'email' => 'required|email',
            'password' => 'required|string|min:6',
        ]);

        if ($validator->fails()) {
            return response()->json(['error' => 'Validation failed, please make sure the details provided are accurate.'], 422);
        }

        if (! $token = Auth::attempt($validator->validated())) {
            return response()->json(['error' => 'User does not exist or is not authorised to see content.'], 401);
        }

        $ttl = ($request->remember_me) ? env('JWT_REMEMBER_ME_TTL') : env('JWT_TTL'); 

        $cookie = cookie('jwt', $token, $ttl);

        return $this->createNewToken()->withCookie($cookie);

        //return redirect('/');
    }

    /**
     * Register a User.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function register(Request $request) {
        $validator = Validator::make($request->all(), [
            'firstname' => 'required|string|between:2,100',
            'lastname' => 'required|string|between:2,100',
            'email' => 'required|string|email|max:100|unique:users',
            'password' => 'required|string|confirmed|min:6',
        ]);

        if($validator->fails()){
            return response()->json(['error' => 'Information entered is incorrect and registration was unsuccessful.'], 400);
        }

        $user = User::create(array_merge(
                    $validator->validated(),
                    [
                        'user_role_id' => 1,
                        'password' => Hash::make($request->password)
                    ]
                ));

        return response()->json([
            'message' => 'User successfully registered',
            'user' => $user
        ], 201);

        //return redirect('/login');
    }


    /**
     * Log the user out (Invalidate the token).
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function logout() {
        $cookie = Cookie::forget('jwt');
        Auth::logout();
        return response()->json(['message' => 'User successfully signed out'])->withCookie($cookie);
    }

    /**
     * Refresh a token.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function refresh(Request $request) {
        if($request->cookie('jwt')) {
            $cookie = cookie('jwt', Auth::refresh(), env('JWT_TTL'));
            return $this->createNewToken()->withCookie($cookie);
        }
    }

    /**
     * Get the authenticated User.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function userProfile() {
        return response()->json(Auth::user());
    }

    /**
     * Get the token array structure.
     *
     * @param  string $token
     *
     * @return \Illuminate\Http\JsonResponse
     */
    protected function createNewToken(){
        return response()->json([
            'message' => 'Success'
        ]);
    }

}
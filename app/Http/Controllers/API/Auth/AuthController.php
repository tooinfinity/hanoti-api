<?php

namespace App\Http\Controllers\API\Auth;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;


class AuthController extends Controller
{
  public function __construct()
  {

    $this->middleware('jwt',['except' => ['login']]);
  }

  public function register(Request $request)
  {
    $user = User::create([
        'name' => $request->name,
        'email' => $request->email,
        'password' => bcrypt($request->password),
      ]);
      
      $token = auth()->login($user);

      return $this->respondWithToken($token);
  }

  public function login()
  {
      $credentials = request(['email', 'password']);

      if (! $token = auth()->attempt($credentials)) {
          return response()->json(['error' => 'Unauthorized'], 401);
      }

      return $this->respondWithToken($token);
  }

  public function getUser()
  {
    if (auth()->check()) {
        $user = auth()->user();
        return response()->json(['user' => $user],200);
    }
  }

  public function logout()
  {
      auth()->logout();

      return response()->json(['message' => 'Successfully logged out']);
  }

  protected function respondWithToken($token)
  {
      return response()->json([
          'access_token' => $token,
          'token_type'   => 'bearer',
          'expires_in'   => auth()->factory()->getTTL() * 60
      ]);
  }
}
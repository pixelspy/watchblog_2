<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Lcobucci\JWT\Parser;
use App\User;

class AuthentificationController extends Controller
{

    public function signup(Request $request) {
        $this->validate($request, [
            'firstname' => 'required',
            'lastname' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required'
        ]);
        $user = new User([
            'firstname' => $request->input('firstname'),
            'lastname' => $request->input('lastname'),
            'email' => $request->input('email'),
            'password' => bcrypt($request->input('password')),
        ]);
        $user->save();
        return response()->json([
            'message' => 'Successfully created user'
        ], 201);
    }
    
    public function login(Request $request) {
      $user = User::where('email', $request->email)->first();

      if ($user) {
        if ($request->password == $user->password) {
          $token = $user->createToken('Laravel Password Grant Client')->accessToken;
          $response = ['token' => $token];
          return response($response, 200);
        } else {
          $response = 'Password incorrect';
          return response($response, 422);
        }
      } else {
        $response = 'User doesn\'t exist';
        return response($response, 422);
      }
    }

    public function logout(Request $request) {
        $value = $request->bearerToken();
        $id = (new Parser())->parse($value)->getHeader('jti');
        $token = $request->user()->tokens->find($id);
        $token->revoke();

        $response = 'You have been successfully logged out!';
        return response($response, 200);
    }
}

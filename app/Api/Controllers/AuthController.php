<?php

namespace App\Api\Controllers;

use App\Api\Transformers\UserTransformer;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Tymon\JWTAuth\Exceptions\JWTException;
use JWTAuth;

class AuthController extends BaseController
{

    /*public function authenticate(Request $request)
    {
        $user = User::where('email',$request->input('email'))
            ->orWhere('password',$request->input('password'))
            ->first();
        if (! $user){
            return json_encode('账号或者密码错误');
        }
        $token = JWTAuth::fromUser($user);
        try{
            if (! $token ){
                return json_encode(['error' => 'token_not_provided'],401);
            }
        }catch (JWTException $exception){
            return json_encode(['error' => 'not create token'], 500);
        }

        return json_encode($token);
    }*/

    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => 'required|string|max:255',
            'phone' => 'required|integer',
            'password' => 'required|string|min:6' //|confirmed'
        ]);
    }

    protected function create(array $data)
    {
        return User::create([
            'name' => $data['name'],
            'phone' => $data['phone'],
            'password' => bcrypt($data['password']),
        ]);
    }

    public function register(Request $request)
    {
        $this->validator($request->all())->validate();

        $user = $this->create($request->all());
        $token = JWTAuth::fromUser($user);
        return ["token" => $token];
    }

    public function authenticate(Request $request)
    {
        $credentials = $request->only('phone', 'password');
        try {
            if (! $token = JWTAuth::attempt($credentials)) {
                return response()->json(['error' => 'invalid_credentials'], 401);
            }
        } catch (JWTException $e) {
            return response()->json(['error' => 'could_not_create_token'], 500);
        }
        $user = User::where('phone', $credentials['phone'])->first();
        $userTransform = new UserTransformer();
        return [ $userTransform->transform($user),'token' => $token];
    }
}
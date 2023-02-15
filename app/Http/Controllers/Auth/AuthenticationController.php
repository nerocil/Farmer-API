<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\OnUserAttemptLoginRequest;
use App\Models\User;
use Hash;
use Illuminate\Http\JsonResponse;
use Illuminate\Validation\ValidationException;
use Request;

class AuthenticationController extends Controller
{


    /**
     * @throws ValidationException
     */
    function onUserAttemptLogin(OnUserAttemptLoginRequest $onUserAttemptLoginRequest):JsonResponse
    {


        $user = User::where('email', $onUserAttemptLoginRequest->get('email'))->first();

        if (! $user || ! Hash::check($onUserAttemptLoginRequest->get('password'), $user->password)) {
            throw ValidationException::withMessages([
                'email' => ['Either User name or password is incorrect.'],
            ]);
        }


        return response()->json([
            'email' => $user->email,
            'token' => $user->createToken($onUserAttemptLoginRequest->get('device_name')??"device_name")->plainTextToken,
            'first_name' => $user->first_name,
            'last_name' => $user->last_name,
            'gender' => $user->gender,
        ]);
    }



    //todo here
    public function onUserAttemptLogout(): JsonResponse
    {
        $user = auth()->user();

        if (Request::get('option') == 'all'){
            // Revoke all tokens...
            $user->tokens()->delete();
        }else{
            // Revoke the token that was used to authenticate the current request...
            Request::user()->currentAccessToken()->delete();
        }
        return response()->json(["message" => "success logout"]);
    }

}

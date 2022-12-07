<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rules\Password;

class UserAuthController extends Controller
{
    // register new user
    public function register(Request $request)
    {
        $validator = $this->validateRequest($request);
        if ($validator->fails()) {
            return response()->json([
                'token' => null,
                'user' => null
            ]);
        }
        $data = [
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password)
        ];
        // create new user
        $user = User::create($data);
        return response()->json([
            'token' => $user->createToken(time())->plainTextToken,
            'user' => $user
        ]);
    }

    // user login
    public function login(Request $request)
    {
        $user = User::where('email', $request->email)->first();
        if (isset($user)) {
            if (Hash::check($request->password, $user->password)) {
                $token = $user->createToken(time());
                return response()->json([
                    'token' => $token->plainTextToken,
                    'user' => $user
                ]);
            }
        }
        return response()->json([
            'token' => null,
            'user' => null
        ]);
    }

    // delete account
    public function removeAccount(Request $request)
    {
        User::where('id', $request->id)->delete();
        return response()->json(['message' => 'Account was succesfully removed']);
    }

    // validate user request
    private function validateRequest($request)
    {
        return Validator::make($request->all(), [
            'name' => 'required',
            'email' => 'required',
            'password' => Password::min(8)->mixedCase()->numbers()->symbols()
        ]);
    }
}

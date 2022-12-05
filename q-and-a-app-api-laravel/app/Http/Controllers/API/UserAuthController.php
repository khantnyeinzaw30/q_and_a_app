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
                'message' => 'Password is not strong enough!',
                'status' => 'not ok'
            ]);
        }
        $data = [
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password)
        ];
        // create new user
        $user = User::create($data);
        if ($user) {
            return response()->json([
                'token' => $user->createToken(time())->plainTextToken,
                'status' => 'ok'
            ]);
        } else {
            return response()->json(['token' => null, 'status' => 'not ok']);
        }
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

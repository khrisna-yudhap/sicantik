<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;
use Illuminate\Support\Facades\Hash;
use App\Http\Resources\UserDetailResource;
use Illuminate\Http\Response;


class AuthController extends Controller
{

    public function index()
    {
        return view('login', [
            "title" => "Login Page - SiCantik Admin Panel"
        ]);
    }

    public function login(Request $request)
    {
        $request->validate(
            [
                'email' => 'required|email',
                'password' => 'required',

            ],
            [
                'email.required' => 'Email wajib diisi.',
                'email.email' => 'Harap masukan email yang valid.',
                'password.required' => 'Password tidak boleh kosong.',
            ]
        );

        $credentials = [
            'email' => $request->email,
            'password' => $request->password,

        ];

        if (Auth::attempt($credentials)) {
            return redirect()->route('index');
        } else {
            return redirect('/login')->withErrors('Email atau password yang anda masukan salah.')->withInput();
        }
    }


    public function logout()
    {
        Auth()->guard('web')->logout();
        return redirect()->route('login');
    }

    // API Auth
    public function loginUser(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        $user = User::where('email', $request->email)->first();

        if (!$user || !Hash::check($request->password, $user->password)) {
            throw ValidationException::withMessages([
                'email' => ['The provided credentials are incorrect.'],
            ]);
        }

        $token = $user->createToken($request->email)->plainTextToken;

        return response()->json(
            [
                'messages' => "Successfully Login",
                'data' => [
                    'token' => $token,
                    'user_data' => new UserDetailResource($user),

                ],
            ],
            Response::HTTP_OK
        );
    }

    public function logoutUser(Request $request)
    {
        auth('sanctum')->user()->currentAccessToken()->delete();

        return response()->json([
            'messages' => "Sign Out Successfully",
        ], Response::HTTP_OK);
    }

    public function getUserLogin()
    {
        $userData = auth('sanctum')->user();

        return new UserDetailResource($userData);
    }
}

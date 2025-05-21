<?php

namespace App\Http\Controllers;

use App\Services\User\HospitalService;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\Hash;

class CustomAuthController extends Controller
{

    /* Process the logout request */
    public function logout(Request $request)
    {
        \auth()->guard('web')->logout();

        Cookie::queue(Cookie::forget('user_token'));

        return redirect()->route('login')->with(['message' => 'Kamu telah logout!']);
    }

    public function login()
    {
        return view('auth.login');
    }

    /* Process the logout request */
    public function loginPost(Request $request)
    {

        $user = User::where([
            'username' => $request->username,
        ])
            ->whereIn('level', ['admin', 'staff', 'pimpinan'])
            ->first();

        if (!$user) {
            return redirect()->route('login')->with(['message' => 'User tidak ada!']);
        }

        if ($user->status == 'blocked') {
            return redirect()->route('login')->with(['message' => 'User telah diblokir!']);
        }

        if ($user->status == 'inactive') {
            return redirect()->route('login')->with(['message' => 'User tidak aktif!']);
        }

        if (Hash::check($request->password, $user->password)) {
            Cookie::queue(Cookie::forever("user_token", Hash::make($request->email . time())));

            \auth()->guard('web')->login($user);

            return redirect()->route('hospital.index')->with(['message' => 'Login berhasil!']);
        }

        return redirect()->route('login')->with(['message' => 'Username / password salah!']);
    }

}

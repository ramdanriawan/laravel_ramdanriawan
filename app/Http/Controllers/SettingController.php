<?php

namespace App\Http\Controllers;


use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class SettingController
{
    public function editUser()
    {
        $data['user'] = auth()->guard('web')->user();

        return view('setting.edit_user', $data);
    }

    public function updateUser(Request $request, User $user)
    {
        if ($request->password == '' || !isset($request->password)) {
            $user->update([
                'username' => $request->username,
                'email' => $request->email,
            ]);
        } else {
            $user->update([
                'username' => $request->username,
                'email' => $request->email,
                'password' => Hash::make($request->password)
            ]);
        }

        auth()->guard('web')->loginUsingId(1);

        return redirect()->route('setting.editUser')->with(['message' => 'Berhasil mengupdate user', 'success' => true]);
    }

}

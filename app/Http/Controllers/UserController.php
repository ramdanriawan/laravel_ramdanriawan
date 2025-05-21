<?php

namespace App\Http\Controllers;

use App\ModelData\UserSaveModelData;
use App\ModelData\UserUpdateModelData;
use App\Services\Email\EmailServiceImpl;
use App\Services\User\HospitalService;
use App\User;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Application|Factory|View
     */
    public function index()
    {
        //

        return view('user.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Application|Factory|View
     */
    public function create()
    {

        return view('user.create');

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return RedirectResponse
     */
    public function store(Request $request)
    {
        $userSaveModelData = new UserSaveModelData(
            $request->username,
            $request->email,
            $request->name,
            $request->file('profilePicture'),
            $request->password,
            $request->level,
        );

        HospitalService::save(
            $request,
            $userSaveModelData,
            auth()->guard('web')->user()
        );

        return redirect()->route('user.index')->with('success', 'Data added!');

    }

    /**
     * Display the specified resource.
     *
     * @param User $user
     * @return Response
     */
    public function show(User $user)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param User $user
     * @return Application|Factory|View
     */
    public function edit(User $user)
    {
        //
        $data['data'] = $user;

        return view('user.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param User $user
     * @return RedirectResponse
     */
    public function update(Request $request, User $user)
    {
        $userSaveModelData = new UserUpdateModelData(
            $request->email,
            $request->name,
            $request->file('profilePicture'),
            $request->password,
            $request->status,
        );

        HospitalService::update(
            $request,
            $userSaveModelData,
            $user,
            auth()->guard('web')->user()
        );

        return redirect()->route('user.index')->with('success', 'Data updated!');
    }

    public function confirmResetPasswordLink(Request $request, $code)
    {
        $user = User::where(['reset_password_code' => $request->code])->first();

        if (!$user) {
            return "Code not exists / expired";
        }

        $resetPasswordResult = EmailServiceImpl::confirmResetPasswordLink($user);

        if(!$resetPasswordResult) {
            return "Code not exists / expired";
        }

        return "Password has been reset";
    }
}

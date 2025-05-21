<?php

namespace App\Http\Controllers\Api\Web;

use App\Http\Controllers\Controller;
use App\Services\ServiceImpl\User\UserServiceImpl;
use App\User;
use Illuminate\Http\Request;

class UserWebController extends Controller
{

    public function dataTable(Request $request)
    {
        $data = UserServiceImpl::findAll(
            $request->length,
            $request->start,
            'name',
            $request->search['value'],
            $request->order[0]['column'],
            $request->order[0]['dir'],
            auth()->guard('web')->user()
        );

        foreach ($data as $item) {
            $deleteApiUrl = url(route('api.v1.web.user.delete', ['user' => $item->id, "redirectBack" => true]));
            $editUrl = url(route('user.edit', ['user' => $item->id]));

            if ($item->isCanDelete) {

                $item->action = "<a href='$deleteApiUrl' class='btn btn-xs btn-danger' onclick='return confirm(\"Are u sure?\")'>Delete</a>&nbsp;";
            }

            $item->action .= "<a href='$editUrl' class='btn btn-xs btn-info'>Edit</a>&nbsp;";
        }

        return response()->json([
            'draw' => $request->draw,
            'recordsTotal' => User::count(),
            'recordsFiltered' => count($data) ? User::count() : count($data),
            'data' => $data
        ]);
    }

    public function delete(User $user, Request $request)
    {
        UserServiceImpl::delete($user);

        if ($request->redirectBack) {

            return redirect()->back();
        }

        return null;
    }

    public function updateStatus(Request $request, User $user)
    {
        $user->update([
            'status' => $request->status
        ]);

        UserServiceImpl::addOrUpdateFirebaseDocument(UserServiceImpl::findOne($user->id, auth()->guard('web')->user()));

        return redirect()->back();
    }
}

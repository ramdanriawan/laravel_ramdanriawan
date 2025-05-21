<?php

namespace App\Services\ServiceImpl\User;

use Carbon\Carbon;


use App\User;
use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use stdClass;

class UserServiceImpl implements UserService
{
    private static $withRelations = [];
    private static $withCount = [];
    public static $columnOrder = [
        'id',
        'username',
        'email',
        'name',
        'profilePicture',
        'password',
        'level',
        'status',
        'rememberToken',
        'createdAt',
        'updatedAt',
    ];

    public static function findAll($length, $start, $columnToSearch, $search, $columnOrderName, $columnOrderDir, Model|Authenticatable $user)
    {
        if (empty($search) && !$start) {

            $data = User::limit($length);
        } else {

            $data = User::limit($length)->offset($start);
        }

        $data->with(self::$withRelations);
        $data->withCount(self::$withCount);

        $data->where($columnToSearch, 'like', '%' . $search . '%');

        $data->orderBy(self::$columnOrder[$columnOrderName] ?? $columnOrderName, $columnOrderDir);

        $data = $data->get();

        foreach ($data as $item) {
            $item = self::addAttributes($item, $user);
        }

        return $data;
    }


    // parameter user belum saya pakai
    static function addAttributes(User|Builder|Model|array $item, User|Authenticatable|Model $user): User|Model|stdClass
    {
        if (is_array($item)) {
            $item = json_decode(json_encode($item));
        }
        $item->isAdmin = $item->level == 'admin';

        $item->createdAtHuman = Carbon::parse($item->created_at)->diffForHumans();
        $item->updatedAtHuman = Carbon::parse($item->updated_at)->diffForHumans();

        $item->isUserCanLogin = $item->status != 'blocked' && $item->status != 'inactive';

        $item->userCanLoginReason = null;

        if ($item->status == 'blocked') {

            $item->userCanLoginReason = "U are blocked";
        }

        if ($item->status == 'inactive') {

            $item->userCanLoginReason = "Inactive account";
        }

        if ($item->profilePicture) {

            $item->profilePictureUrl = url("profilePicture/" . $item->profilePicture);
        } else {
            $item->profilePictureUrl = url("img/noImage.jpg");

        }

        return $item;
    }


    public static function delete(User $user)
    {
        DB::transaction(function () use ($user) {

            $user->delete();
        });
    }
}

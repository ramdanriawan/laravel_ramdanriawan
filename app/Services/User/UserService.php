<?php

namespace App\Services\User;

use Carbon\Carbon;


use App\User;
use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use stdClass;

interface UserService
{
    public static function findAll($length, $start, $columnToSearch, $search, $columnOrderName, $columnOrderDir, Model|Authenticatable $user);

    // parameter user belum saya pakai
    static function addAttributes(User|Builder|Model|array $item, User|Authenticatable|Model $user): User|Model|stdClass;

    public static function delete(User $user);
}

<?php


namespace App\Services\Email;


use App\User;

use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Model;

interface EmailService
{

    public static function sendResetPasswordLink($newPassword, User|Model|Authenticatable|\stdClass $user);

    public static function confirmResetPasswordLink(User|Model|Authenticatable|\stdClass $user);
}

<?php

namespace App\Models;

use App\Models\TenagaKesehatan;
use App\User;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class NotificationSetting extends Authenticatable
{
    use Notifiable;

    protected $table = 'notification_settings';

    public $timestamps = false;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $guarded = [

    ];

    protected $casts = [
        'is_show_ticket' => 'bool',
        'is_show_berita' => 'bool',
        'is_show_pengumuman' => 'bool'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}

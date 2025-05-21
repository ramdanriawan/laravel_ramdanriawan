<?php

namespace App\Http\Controllers;


use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class WebsocketController
{

    public function websocket()
    {
        return view("websocket.index");
    }

}

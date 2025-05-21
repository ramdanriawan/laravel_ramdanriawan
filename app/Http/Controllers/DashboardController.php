<?php

namespace App\Http\Controllers;

use App\Models\Pengumuman;
use DateInterval;
use DatePeriod;
use DateTime;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index(Request $request)
    {
        $data = [];

        return view("dashboard/index", $data);
    }
}

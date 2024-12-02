<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Shop;
use App\Models\Reservation;

class OwnerController extends Controller
{
    public function dashboard()
    {
        return view('owner.dashboard');
    }

    public function manageShops(Request $request)
    {
        // 店舗情報の管理処理
    }
}

<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use App\Models\Mobil;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class DashboardController extends Controller
{
    //
    public function index()
    {
        $mobil = Mobil::count();
        $admin = User::where('role_as', '1')->count();
        $user = User::where('role_as', '0')->count();
        return view('admin.dashboard', compact('mobil', 'admin', 'user'));
    }
}

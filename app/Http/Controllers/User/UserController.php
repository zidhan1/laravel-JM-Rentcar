<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Mobil;

class UserController extends Controller
{
    //
    public function cars()
    {
        $data = Mobil::all();
        return view('user.cars', compact('data'));
    }
}

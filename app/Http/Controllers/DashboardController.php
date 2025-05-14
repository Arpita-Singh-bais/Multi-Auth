<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardController
{
    //
    public function userIndex()
    {
        return view('user.dashboard');
    }

    public function adminIndex()
    {
        return view('admin.dashboard');
    }
}

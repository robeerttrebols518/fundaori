<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\User;
use App\Http\Models\Product;

class DashboardController extends Controller
{
    public function __Construct(){
        $this->middleware('auth');
        $this->middleware('user.status');
        $this->middleware('user.permissions');
        $this->middleware('isadmin');
    }

    public function getDashboard(){
        $users = User::count();
        $data = [
            'users' => $users
        ];
        return view('admin.home', $data);
    }

}

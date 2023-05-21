<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class AdminHomeController extends Controller
{
    //

    
    public function index(){
        $admin=Auth::guard('admin')->user();
        return view('admin.adminDashboard');
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\Complain;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class PageController extends Controller
{
    public function hello(){
        $user=Auth::user();
        $id=1;
        $complain=Complain::findorFail($id);
        dd($user->id,$complain);
        
    }
}

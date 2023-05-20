<?php

namespace App\Http\Controllers;

use App\Models\Complain;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class PageController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function deleteIndex(){
        $complains=Complain::all();
        $user=Auth::user();
        $uid=$user->id;
        return view('user.delete.compDeleteIndex',compact('complains','uid'));
    }

    public function delete(string $id){
        $complain=Complain::findorFail($id); 
        // dd($complain);       
        $user=Auth::user();
        $uid=$user->id;
        return view('user.delete.compDelete',compact('complain','uid'));
    }
}

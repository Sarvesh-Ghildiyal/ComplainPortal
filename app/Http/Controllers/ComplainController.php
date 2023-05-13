<?php

namespace App\Http\Controllers;

use App\Models\Complain;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ComplainController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function complain_form(){
        return view('complains.submitComp');
    }
    public function feedback_view(){
        $complains=Complain::all();
        $user=Auth::user();
        $uid=$user->id;
        return view('complains.remarkView',compact('complains','uid'));
    }

    public function submit_complain(Request $request)
    {
        // dd($request->all());
        $request->validate([
            'department'=>'required',
            'room_no'=>'required',
            'reported_by'=>'required',
            'requested_by'=>'required',
            'description'=>'required|max:255 ',
        ]);

        //Getting user data
        $user=Auth::user();

        // //Saving complain to the database
        // $complain=new Complain();
        // $complain->user_id=$user->id;
        // $complain->department=$request->input('department');
        // $complain->room_no=$request->input('room_no');
        // $complain->reported_by=$request->input('reported_by');
        // $complain->requested_by=$request->input('requested_by');
        // $complain->description=$request->input('description');
        // $complain->save();
        
        $input=$request->all();
        $user->complains()->create($input);
        return redirect()->route('home');
    }
    
    public function index()
    {
        //
        $complains=Complain::all();
        $user=Auth::user();
        $uid=$user->id;
        return view('user.compIndex',compact('complains','uid'));

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('user.compCreate');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        // dd($request->all());
        $request->validate([
            'department'=>'required',
            'room_no'=>'required',
            'reported_by'=>'required',
            'requested_by'=>'required',
            'description'=>'required|max:255 ',
        ]);

        //Getting user data
        $user=Auth::user();

        //saving data to database
        $input=$request->all();
        $user->complains()->create($input);
        return redirect()->route('home');

        // //Saving complain to the database
        // $complain=new Complain();
        // $complain->user_id=$user->id;
        // $complain->department=$request->input('department');
        // $complain->room_no=$request->input('room_no');
        // $complain->reported_by=$request->input('reported_by');
        // $complain->requested_by=$request->input('requested_by');
        // $complain->description=$request->input('description');
        // $complain->save();
        
    }

    /**
     * Display the specified resource.
     */
    // public function show(string $id)
    // {
    //     //
    //     $complain=Complain::findorFail($id);
    //     $user=Auth::user();
    //     return view('complains.complainView',compact('complain','user'));
    // }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
        $complain=Complain::find($id);
        return view('user.compEdit',compact('complain'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
        $complain=Complain::findorFail($id);
        // dd($complain);
        $request->validate([
            'department'=>'required',
            'room_no'=>'required',
            'reported_by'=>'required',
            'requested_by'=>'required',
            'description'=>'required|max:255 ',
        ]);
       
        $complain->department=$request->input('department');
        $complain->room_no=$request->input('room_no');
        $complain->reported_by=$request->input('reported_by');
        $complain->requested_by=$request->input('requested_by');
        $complain->description=$request->input('description');
        $complain->save();

        return redirect()->route('home');
        
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
        $complain=Complain::findorFail($id);
        $complain->delete();
        return redirect()->back();
    }

    public function no_complain(){
        return view('user.noComplain');
    }

    public function EditIndex(){
        $complains=Complain::all();
        $user=Auth::user();
        $uid=$user->id;
        return view('user.compEditIndex',compact('complains','uid'));
    }
}

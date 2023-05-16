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
        return view('user.compEditIndex',compact('complains','uid'));

    }

    //Creating new complain
    
    public function create()
    {
        //
        $user=Auth::user();
        $user_name=$user->name;
        return view('user.compCreate',compact('user_name'));
    }

        //saving it to database
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
        return redirect()->route('home')->with('success','post created');

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
    //willl be directed to show method through
    // compViewIndex display and will make a sexy page for it
    // public function show(string $id)
    // {
    //     //
    //     $complain=Complain::findorFail($id);
    //     $user=Auth::user();
    //     return view('user.view.complainView',compact('complain','user'));
    // }

    /**
     * Show the form for editing the specified resource.
     */
    public function editIndex(){
        $complains=Complain::all();
        $user=Auth::user();
        $uid=$user->id;
        return view('user.edit.compEditIndex',compact('complains','uid'));
    }

    public function edit(string $id)
    {
        //
        $complain=Complain::find($id);
        return view('user.edit.compEdit',compact('complain'));
    }

        //Saving changes to database
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

        return redirect()->route('home')->with('success','Changes Updated');
        
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
        $complain=Complain::findorFail($id);
        $complain->delete();
        return view('user.delete.compDeleteIndex')->with('success','Complain Deleted');
    }

    //method to generate view
    //when ther are no complains registered by user
    public function no_complain(){
        return view('user.noComplain');
    }

    // public function EditIndex(){
    //     // $complains=Complain::all();
    //     // $user=Auth::user();
    //     // $uid=$user->id;
    //     // return view('user.compEditIndex',compact('complains','uid'));
    //     dd('hello');
    // }

    

    //Complain Viw function
    public function viewIndex(){
        return view('user.view.compViewIndex');
    }


    //Complain Status Functions
    public function statusIndex(){
        $complains=Complain::all();
        $user=Auth::user();
        $uid=$user->id;
        return view('user.status.compStatusIndex',compact('complains','uid'));
    }

    public function filterIndex(string $status){
            
        $complains=Complain::all();
        $user=Auth::user();
        $uid=$user->id;

        if($status==0){
              return view('user.status.compOpenStatus',compact('status','complains','uid'));
        }
        
        else{
            return view('user.status.compCloseStatus',compact('status','complains','uid'));   
        }

    }
}

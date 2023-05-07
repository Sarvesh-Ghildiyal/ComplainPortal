<?php

namespace App\Http\Controllers;

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
    public function feedback_form(){
        return view('complains.submitComp');
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
        return ('hello');
    }
    
    public function index()
    {
        dd('hello');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
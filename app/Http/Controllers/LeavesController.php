<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Leave;
use App\Models\LeaveStatus;
use App\Models\LeaveState;

class LeavesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('leave.index')->with('leaves', Leave::all());
        // $leaves = Leave::all();
        // return $leaves;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('leave.create')
        ->with('statuses', LeaveStatus::all())
        ->with('states', LeaveState::all());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Leave::create([
            'StartingDate'=> $request->StartingDate,
            'EndingDate' => $request->EndingDate,
            'user_id'=>auth()->user()->id,
            'leave_statuses_id' => 1,
            'leave_states_id' => 2
        ]);
        //return $request->all();

        return redirect('/dashboard')->withStatus(__('Application was submitted. You will receive a notification once the admin responds to it'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Leave $leaf)
    {
       return $leaf;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function leaveApplications(){
        
        return view('leave.applications')->with('leaveapps', Leave::all());
    }
}

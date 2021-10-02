<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\LeaveRequest;
use App\Models\Leave;
use App\Models\LeaveStatus;
use App\Models\LeaveState;
use Illuminate\Support\Carbon;
use DateTime;

class LeavesController extends Controller
{
    // public function __construct(){
    //     $this->middleware('admin', ['except' => 'create']);
    // }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('leave.index')
        ->with('Statuses', LeaveStatus::all())
        ->with('leaveapps', Leave::all());
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
    public function store(LeaveRequest $request)
    { 
        //getting date from the leave app form
        $fdate = $request->StartingDate;
        $tdate = $request->EndingDate;
        //converting to datetime
        $datetime1 = new DateTime($fdate);
        $datetime2 = new DateTime($tdate);
        //the diff between starting and ending
        $interval = $datetime1->diff($datetime2);
        $days = $interval->format('%a');
        $days = +$days;
        //check if a user has applied already
        $user = Leave::where('user_id', auth()->user()->id)->first();
        if($user === null){
            if($days === 15){
                Leave::create([
                    'StartingDate'=> $request->StartingDate,
                    'EndingDate' => $request->EndingDate,
                    'user_id'=>auth()->user()->id,
                    'leave_statuses_id' => 1,
                    'leave_states_id' => 2
                ]); 
                return redirect('/dashboard')->withStatus(__('Application was submitted. You will receive a notification once the admin responds to it'));
            }
            else{
                return back()->withError('Leave days should be 15 days, not more or less.');
            }
        }
        else{
            return back()->withError(' You cannot apply for leave more than once.'); 
        }
        
        
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
        $app = Leave::findOrFail($id);
        $app->leave_statuses_id = $request->leave_statuses_id;
        $AdditionalDays = $request->AdditionalDays;
        $newdate = Carbon::parse($app->EndingDate)->addDays($AdditionalDays);
        $app->EndingDate = $newdate;
        
        $app->update();
        return back()->withStatus(__('Action completed successfully'));

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

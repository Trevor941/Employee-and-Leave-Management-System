<?php

namespace App\Http\Controllers;


use App\Http\Requests\UserRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Carbon;
use App\Models\MaritalStatus;
use App\Models\Department;
use App\Models\Gender;
use App\Models\User;
use App\Notifications\NewUserCreated;

class UserController extends Controller
{
    
    /**
     * Display a listing of the users
     *
     * @param  \App\Models\User  $model
     * @return \Illuminate\View\View
     */
    public function index(User $model)
    {
        return view('users.index', ['users' => $model->paginate(15)]);
    }


    public function create(){
        return view('users.create');
        // ->with('maritalStatus', MaritalStatus::all())
        // ->with('genders', Gender::all())
        // ->with('departments', Department::all());
    }

    public function edit(User $user){

        return view('users.edit')
        ->with('user', $user)
         ->with('maritalStatus', MaritalStatus::all())
        ->with('genders', Gender::all())
        ->with('departments', Department::all());
    }

    public function store(Request $request){
         User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
             'role_id' => 2,
             'phone'=> '',
             'gender_id'=>1,
            'position'=> '',
             'DOB' => Carbon::now(),
             'marital_status_id'=> 1,
              'department_id'=>3,
         ]);
         auth()->user()->notify(new NewUserCreated());
         return back()->withStatus(__('New user successfully created.'));
    }


public function update(Request $request, User $user){
    $user->update($request->all());
    return back()->withStatus(__('User updated successfully'));
}

    public function destroy(User $user){
        
         $user->delete();
         return back()->withStatus(__('User was deleted successfully'));
    }

    public function trashedUsers(){
        $trashedUsers = User::onlyTrashed()->get();
        return view('users.trashedUsers', compact('trashedUsers'));
    }

    public function restoreUser($id){
        $user = User::where('id', $id)->withTrashed()->first();
         $user->restore();
         return redirect('/user')->withStatus(__('User restored successfully'));
    }

    public function deletePermanently($id){
        $user = User::where('id', $id)->withTrashed()->first();
        $user->forceDelete();
        return redirect('/user')->withStatus(__('User Deleted permanently'));
    }

    public function notifications(){
        //mark all as read

        //read all notifications
    }

}

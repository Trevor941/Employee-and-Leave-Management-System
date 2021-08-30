<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileRequest;
use App\Http\Requests\PasswordRequest;
use Illuminate\Support\Facades\Hash;
use App\Models\MaritalStatus;
use App\Models\Department;
use App\Models\Gender;
class ProfileController extends Controller
{
    /**
     * Show the form for editing the profile.
     *
     * @return \Illuminate\View\View
     */
    public function edit()
    {
        return view('profile.edit')
        ->with('maritalStatus', MaritalStatus::all())
        ->with('genders', Gender::all())
        ->with('departments', Department::all());
       
    }

    /**
     * Update the profile
     *
     * @param  \App\Http\Requests\ProfileRequest  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(ProfileRequest $request)
    {
        
        // if($request->hasFile('image')){
        //     $image = $request->file('image');
        //      $imageName = time().'.'.$image->extension();
        //      $image->move(public_path('images'), $imageName);
        //      auth()->user()->profilepic = $imageName;
        //     }
        //     auth()->user()->update($request->all());
           
            $image = $request->image;
           // if($request->hasFile('image')){
            list($type, $image) = explode(';', $image);
            list(, $image)      = explode(',', $image);
            $image = base64_decode($image);
            $image_name= time().'.png';
            $path = public_path('upload/'.$image_name);
            auth()->user()->profilepic = $image_name;
            file_put_contents($path, $image);
           // }
            
            auth()->user()->update($request->all());
       return back()->withStatus(__('Profile successfully updated.'));
    }

    /**
     * Change the password
     *
     * @param  \App\Http\Requests\PasswordRequest  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function password(PasswordRequest $request)
    {
        auth()->user()->update(['password' => Hash::make($request->get('password'))]);

        return back()->withPasswordStatus(__('Password successfully updated.'));
    }
}

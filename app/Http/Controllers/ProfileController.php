<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileUpdateRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use App\Models\User;

class ProfileController extends Controller
{
    /**
     * Display the user's profile form.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\View\View
     */
    public function edit(Request $request)
    {
        return view('profile.edit', [
            'user' => $request->user(),
        ]);
    }

    /**
     * Update the user's profile information.
     *
     * @param  \App\Http\Requests\ProfileUpdateRequest  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(ProfileUpdateRequest $request)
    {
        $request->user()->fill($request->validated());

        if ($request->user()->isDirty('email')) {
            $request->user()->email_verified_at = null;
        }

        $request->user()->save();

        return Redirect::route('profile.edit')->with('status', 'profile-updated');
    }

    /**
     * Delete the user's account.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(Request $request)
    {
        $request->validateWithBag('userDeletion', [
            'password' => ['required', 'current-password'],
        ]);

        $user = $request->user();

        Auth::logout();

        $user->delete();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return Redirect::to('/');
    }

    public function email_confirmation(){
        return view('front-pages/email_confirmation');
    }

    public function ShowProfile(){

        if(Auth::user()->updated_profile == 0){
            return redirect()->route('update-detail');
        }
        
        if(Auth::user()->registered_course == 0 ){
            return redirect()->route('register-courses');
        }

        return view('back-pages/profile');

    }

    public function ShowUpdateDetail(){
        $student = Auth::user();
        return view('back-pages/update-detail', compact('student'));
    }

    public function SaveUpdateDetail(Request $request){
        $user_id = Auth::user()->id ;
        $validatedData = $request->validate([
            'name' => ['required'],
            'email' => ['required'],
            'dob' => ['required'],
            'phone_number' => ['required'],
            'address' => ['required'],
            'parents_name' => ['required'],
            'parents_phone_number' => ['required'],
            'parents_address' => ['required'],
            
        ],
        [
            'dob.required' => 'Date of birth is required',
        ]);

        $user = User::find($user_id);

        $user->name = $request->name;
        $user->email= $request-> email;
        $user->dob= $request-> dob;
        $user->phone_number = trim($request->phone_number , '_');
        $user->address = $request->address;
        $user->parents_name = $request->parents_name;
        $user->parents_phone_number = trim($request->parents_phone_number, '_');
        $user->parents_address = $request->parents_address;
        $user->updated_profile = 1; 
        $user->updated_at = now(); 
        $user->save();

        return redirect()->route('register-courses');

    }
}

<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
// use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Auth;
use App\Models\Staff;
class StaffLoginController extends Controller
{
    // use Auth;

    protected $redirectTo = '/staff/home';

    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    public function guard()
    {
        return Auth::guard('staff');
    }

    public function login(Request $request)
    {

        $credentials = $request->only(['email', 'password']);

        if (Auth::guard('staff')->attempt($credentials)) {
            $staff = Staff::where('email', $request->email)->first();
            Auth::login($staff);
            return redirect()->intended('staff/profile');
        } else {
            return redirect()->back()->withErrors('Credentials does not valid with our record.');
        }

    
        // $token = $teacher->createToken('teacher_token')->plainTextToken;
    
        // return response()->json(['token' => $token], 200);

    }

    public function logout(){
        if(Auth::guard('staff')->check()) // this means that the admin was logged in.
        {
            Auth::guard('staff')->logout();
            return redirect()->route('staff.login');
        }
    }
    public function showLoginForm()
    {
        return view('front-pages/login-staff');
    }
}

<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileUpdateRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use App\Models\User;
use App\Models\Bill;
use App\Models\Staff;
use App\Models\StudentAttendance;
use App\Models\Attendance;
use App\Models\student_subject;
use App\Models\SubjectTeacher;
use App\Models\Subject;
use App\Models\Test;
use Illuminate\Support\Facades\DB;

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

    public function UpdateProfile(Request $request){
        $user_id = Auth::user()->id ;
        $validatedData = $request->validate([
            'name' => ['required'],
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
        // dd($user);
        $user->name = $request->name;
        $user->dob= $request-> dob;
        $user->phone_number = trim($request->phone_number , '_');
        $user->address = $request->address;
        $user->parents_name = $request->parents_name;
        $user->parents_phone_number = trim($request->parents_phone_number, '_');
        $user->parents_address = $request->parents_address;
        // $user->updated_profile = 1; 
        $user->updated_at = now(); 
        $user->save();

        return back()->with('message', 'Successfully updated your profile');

    }   
    
    public function ShowCourses() {
        $user_id = Auth::user()->id ;

        $data = Subject::join('student_subjects' , 'student_subjects.subject_id', '=' ,'subjects.id')
                ->join('subject_teachers' , 'subject_teachers.subject_id' , '=' , 'subjects.id')
                ->join('staff' , 'subject_teachers.teacher_id' , '=' , 'staff.id')
                ->where('student_subjects.student_id' ,'=' , $user_id)
                ->select('subjects.name as subject_name', 'staff.name', 'subjects.id')
                ->get('subjects.name' , 'staff.name','subjects.id');

        // return $data;
        return view('back-pages/courses', compact('data'));
    }

    public function ShowAttendance($subject_id){
        $user_id = Auth::user()->id ;

        $attendances = Attendance::join('student_attendances', 'attendances.id', '=', 'student_attendances.attendance_id')
        ->where([
            ['subject_id', $subject_id],
            ['student_id', $user_id]
        ])
        ->select('attendances.title', 'attendances.start_date', 'attendances.end_date' , 'student_attendances.id as student_attendance_id' ,'student_attendances.updated_at as clocked_in')
        ->orderBy('student_attendances.created_at' , 'desc')
        ->paginate(5);
        // ->get();    
        $subject_id = Subject::find($subject_id);
        return view('back-pages/courses-attendance' , compact('attendances' , 'subject_id'));

    }

    public function SignAttendance($attendance_id) {
        StudentAttendance::where('id', $attendance_id)
        ->update(
            [
            'updated_at' => now(),
            ]
        );

        return back()->with('success', 'Successfully clocked in.');
    }

    public function ShowTest($subject_id){
        $user_id = Auth::user()->id ;
    
        $tests = Test::join('student_tests', 'tests.id' , '=' , 'student_tests.test_id')
        ->where([
            ['subject_id', $subject_id],
            ['student_id', $user_id]
        ])
        ->select('student_tests.marks', 'tests.title', 'student_tests.created_at')
        ->orderBy('student_tests.created_at' , 'desc')
        ->paginate(5);

        // dd(json_encode($tests));
        $subject_id = Subject::find($subject_id);


        return view('back-pages/courses-test' , compact('subject_id' , 'tests'));
    }

    public function ShowTimetable(){
        $user_id = Auth::user()->id ;

        $timetables = student_subject::join('subjects' , 'subjects.id' ,'=' , 'student_subjects.subject_id')
        ->where('student_subjects.student_id' , $user_id)->get();

        // return $timetables;

        return view('back-pages/timetable', compact('timetables'));
    }

    public function ShowPayment(){
        $user_id = Auth::user()->id;

        $data = Bill::where('student_id',$user_id)
        ->orderBy('created_at' , 'desc')
        ->paginate(5);
        // dd(json_encode($data));
        return view('back-pages/billing' , compact('data'));
    }
}

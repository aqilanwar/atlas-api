<?php

namespace App\Http\Controllers;

use App\Models\Staff;
use App\Models\Subject;
use App\Models\SubjectTeacher;
use App\Models\Attendance;
use App\Models\StudentAttendance;
use App\Models\StudentTest;
use App\Models\student_subject;
use App\Models\Test;

use Illuminate\Http\Request;
use App\Http\Requests\Auth\LoginRequest;
use Auth;
class StaffController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    // public function __construct(){
    //     $this->middleware('auth:staff');
    // }

    public function index()
    {
        // dd(Auth::guard('staff')->user()->name);
        return view('back-pages/staff.profile');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function ShowCourses() {
        
        $user_id = Auth::guard('staff')->user()->id ;

        $data = Subject::join('subject_teachers' , 'subject_teachers.subject_id' , '=' , 'subjects.id')
                ->join('staff' , 'subject_teachers.teacher_id' , '=' , 'staff.id')
                ->where('subject_teachers.teacher_id' ,'=' , $user_id)
                ->select('subjects.name as subject_name', 'staff.name', 'subjects.id')
                ->get('subjects.name' , 'staff.name','subjects.id');
                

        foreach($data as $dat){
            $totalStudent = student_subject::where('subject_id' , $dat->id)->count();
            // echo json_encode($totalStudent);
            $dat->total_student = $totalStudent;
        }
        // dd(json_encode($data));
        return view('back-pages/staff.courses', compact('data'));

    }

    public function ShowAttendancePage($id)
    {   
        $data = Subject::find($id); 
        $attendance = Attendance::where('subject_id' , $id)->get();
        return view('back-pages/staff.courses-attendance' , compact('data','attendance'));
    }
    public function CreateAttendance(Request $request)
    {   
        $request->validate([
            'title' => 'required',
            'start_date' => 'required|date|before:end_date',
            'end_date' => 'required|date',
        ]);

        $attendance_id = Attendance::insertGetId([
            'title' => $request->title,
            'subject_id' => $request->subject_id,
            'start_date' => $request->start_date,
            'end_date' => $request->end_date,
            'created_at' => now(),
        ]);

        // dd($attendance_id);

        $students = student_subject::select('student_id')->where('subject_id' , $request->subject_id)->get();
        // dd($students);
        foreach($students as $student){
            StudentAttendance::create([
                'attendance_id' => $attendance_id,
                'student_id' => $student->student_id,
                'created_at' => now(),
            ]);
        }

        return back()->with('success', 'Attendance has been created successfully!');
    }

    public function ViewAttendance($subjectId, $attendanceId)
    {   
        $data = StudentAttendance::join('students' , 'students.id' , '=' , 'student_attendances.student_id')
        ->where('student_attendances.attendance_id' ,'=' , $attendanceId)
        ->select('student_attendances.updated_at as clocked_in', 'students.name')
        ->get();  
        // echo json_encode($data);
        $subjectId = Subject::find($subjectId); 
        $attendanceId = Attendance::find($attendanceId);
            // dd(json_encode($attendanceId));
        return view('back-pages/staff.courses-view-attendance' , compact('data', 'subjectId' , 'attendanceId' ));
    }


    public function ShowTestPage($id)
    {   
        $data = Subject::find($id); 
        $tests = Test::where('subject_id' , $id)->get();
        // dd(json_encode($tests));
        return view('back-pages/staff.courses-test', compact('data' , 'tests'));
    }

    public function CreateTest(Request $request)
    {   
        $request->validate([
            'title' => 'required',
        ]);

        $test_id = Test::insertGetId([
            'title' => $request->title,
            'subject_id' => $request->subject_id,
            'created_at' => now(),
        ]);

        // dd($attendance_id);

        $students = student_subject::select('student_id')->where('subject_id' , $request->subject_id)->get();
        // dd(json_encode($students));
        foreach($students as $student){
            StudentTest::create([
                'test_id' => $test_id,
                'student_id' => $student->student_id,
                'created_at' => now(),
            ]);
        }

        return back()->with('success', 'Test has been created successfully!');
    }

    public function ViewTest($subjectId, $testId)
    {   
        $data = StudentTest::join('students' , 'students.id' , '=' , 'student_tests.student_id')
        ->where('student_tests.test_id' ,'=' , $testId)
        ->select('student_tests.updated_at as updated_at', 'students.name' , 'student_tests.marks' ,'student_tests.id as student_test_id')
        ->get();  
        // echo json_encode($data);
        $subjectId = Subject::find($subjectId);
        $testId = Test::find($testId);
            // dd(json_encode($attendanceId));
        return view('back-pages/staff.courses-view-test' , compact('data', 'subjectId' , 'testId' ));
    }

    public function UpdateTest(Request $request){
        $request->student_test_id ;
        StudentTest::find($request->student_test_id)
        ->update([
            'marks' => $request->marks,
        ]);

        return back()->with('success', 'Test marks has been updated !');

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(LoginRequest $request)
    {
        
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Staff  $staff
     * @return \Illuminate\Http\Response
     */
    public function show(Staff $staff)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Staff  $staff
     * @return \Illuminate\Http\Response
     */
    public function edit(Staff $staff)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Staff  $staff
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Staff $staff)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Staff  $staff
     * @return \Illuminate\Http\Response
     */
    public function destroy(Staff $staff)
    {
        //
    }
}

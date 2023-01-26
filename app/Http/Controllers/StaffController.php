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
use App\Models\Bill;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;

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
    public function ShowTimetable(){
        $user_id = Auth::guard('staff')->user()->id ;

        $timetables = SubjectTeacher::join('subjects' , 'subjects.id' ,'=' , 'subject_teachers.subject_id')
        ->where('subject_teachers.teacher_id' , $user_id)->get();

        return view('back-pages/staff.timetable', compact('timetables'));
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
            StudentAttendance::insert([
                'attendance_id' => $attendance_id,
                'student_id' => $student->student_id,
                'created_at' => now(),
                'updated_at' => null,
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

    public function AdminCourse(){
                
        $data = Subject::join('subject_teachers' , 'subject_teachers.subject_id' , '=' , 'subjects.id')
                ->join('staff' , 'subject_teachers.teacher_id' , '=' , 'staff.id')
                // ->where('subject_teachers.teacher_id' ,'=' , 'subject.teacher_id')
                ->select('subjects.name as subject_name', 'staff.name', 'subjects.id')
                ->get('subjects.name' , 'staff.name','subjects.id');
                

        foreach($data as $dat){
            $totalStudent = student_subject::where('subject_id' , $dat->id)->count();
            // echo json_encode($totalStudent);
            $dat->total_student = $totalStudent;
        }

        $teachers = Staff::where('is_admin', 0)->get();


        // return $data;
        // dd();
        return view('back-pages/admin.courses', compact('data' ,'teachers'));
    }

    public function AdminCreateCourse(Request $request){
        $subject_id = Subject::insertGetId([
            'name' => $request->name,
            'price' => $request->price,
            'time' => $request->time,
            'day' => $request->day,
            'created_at' => now(),
        ]);

        SubjectTeacher::insert([
            'teacher_id' => $request->teacher_id,
            'subject_id' => $subject_id,
        ]);
        return back()->with('success', 'Course successfully added !');

    }
    // 2. /view course
    // -edit course (name,price)
    // -display teacher, and all student.
    // -delete course
    
    public function AdminViewCourse($subject_id){
        $teachers = Subject::join('subject_teachers' , 'subject_teachers.subject_id' , '=' , 'subjects.id')
        ->join('staff' , 'subject_teachers.teacher_id' , '=' , 'staff.id')
        ->where('subject_teachers.subject_id' ,'=' , $subject_id)
        ->select('subjects.name as subject_name', 'staff.name', 'subjects.id', 'staff.email' ,'staff.phone_number')
        ->get('subjects.name' , 'staff.name','subjects.id' ,'staff.email' ,'staff.phone_number' )
        ->first(); 

        // $teachers = $teachers->first();
        // return $teachers;
        $students = User::join('student_subjects' , 'student_subjects.student_id','=', 'students.id' )
                    ->where('student_subjects.subject_id' ,$subject_id)
                    ->paginate(5);
        // return ($teachers);
        $subject = Subject::find($subject_id);
        $data = Staff::where('is_admin', 0)->get();

        return view('back-pages/admin.courses-view', compact('teachers', 'students' ,'subject', 'data'));
    }

    public function AdminUpdateCourse(Request $request){
        Subject::find($request->sub)
        ->update([
            'name' => $request->name,
            'price'=> $request->price,
            'time' => $request->time,
            'day' => $request->day,
            'updated_at' => now(),
        ]);

        $data = SubjectTeacher::where('subject_id', $request->sub)
        ->update([
            'teacher_id' => $request->teacher_id,
            'subject_id' => $request->sub,
        ]);
        // return $data;
        return back()->with('success', 'Course successfully updated !');

    }

    public function AdminDeleteCourse(Request $request){
        $subject_id = $request->sub;
        Subject::where('id' , $subject_id)->delete();
        student_subject::where('subject_id', $subject_id)->delete();
        SubjectTeacher::where('subject_id' , $subject_id)->delete();
        return redirect()->route('admin.courses')->with('success', 'Course succesfully deleted !');
    }

    public function AdminTeacher(){
        $teachers = Staff::where('is_admin', 0)
        ->orderBy('created_at' , 'desc')
        ->paginate(5);

        $subjects = Subject::all();
        return view('back-pages/admin.teacher', compact('teachers' , 'subjects'));
    }

    public function AdminCreateTeacher(Request $request){
        $data = Staff::insert([
            'name' => $request->name,
            'email' => $request->email,
            'phone_number' => $request->phone_number,
            'dob' => $request->dob,
            'address' => $request->address,
            'password' => Hash::make('password'),
            'created_at' => now(),
        ]);
        // dd($data);
        // return redirect('staff.profile');
        return back()->with('success', 'Teacher has been added successfully!');
    }

    public function AdminDeleteTeacher(Request $request){
        //
    }

    public function AdminPayment(){
        $bills = Bill::distinct()->pluck('title');
        // return $bills;
        return view('back-pages/admin.payment-list' , compact('bills'));
    }
    // public function AdminPayment(){
    //     $bills = Bill::join('students' , 'students.id' , '=' , 'bills.student_id')
    //     // ->where('bills.title' , 'January 2023')
    //     ->select('students.name as student_name', 'students.email', 'bills.id' ,'bills.invoice_id' ,'bills.receipt_id' ,'bills.title')
    //     ->paginate(10);
    //     // return $titles;
    //     return view('back-pages/admin.payment' , compact('bills'));
    // }
    public function AdminPaymentTitle($bill_title){
        // $bill_title = 'February 2023';
        // $titles = Bill::distinct()->pluck('title');
        $bills = Bill::join('students' , 'students.id' , '=' , 'bills.student_id')
        ->where('bills.title' , $bill_title)
        ->select('students.name as student_name', 'students.email', 'bills.id' ,'bills.invoice_id' ,'bills.receipt_id' ,'bills.title' ,'bills.created_at' ,'bills.id')
        ->paginate(10);
        // return $bills;
        return view('back-pages/admin.payment' , compact('bills' , 'bill_title'));
    }

    public function AdminDeleteInvoice(Request $request){
        Bill::find($request->invoice_id)
        ->delete();
        return back()->with('success', 'Invoice has been deleted!');
    }

    public function AdminStudent(){
        $students = User::select('email' , 'name' , 'id')->paginate(10);
        // return $students;
        return view('back-pages/admin.student', compact('students'));
    }

    public function AdminDeleteStudent(Request $request){
        $student_email = $request->student_email ;
        $id = User::where('email' , $student_email )->first();
        $student_id = $id->id;
        // //Remove subject
        $remove_subject = student_subject::where('student_id' , $student_id)->delete();

        // //Remove attendance
        $remove_attendance = StudentAttendance::where('student_id' , $student_id)->delete();

        // //Remove test
        $remove_test = StudentTest::where('student_id' , $student_id)->delete();

        //remove user 
        $users = DB::table('students')->delete($student_id);
        return back()->with('success', 'Student has been deleted!');
    }


    public function UpdateProfile(Request $request){
        $user_id = Auth::guard('staff')->user()->id ;

        $user = Staff::find($user_id);
        // dd($user);
        $user->name = $request->name;
        $user->dob= $request-> dob;
        $user->phone_number = trim($request->phone_number , '_');
        $user->address = $request->address;
        // $user->updated_profile = 1; 
        $user->updated_at = now(); 
        $user->save();

        return back()->with('success', 'Successfully updated your profile');

    }   
}


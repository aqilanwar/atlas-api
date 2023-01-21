<?php

namespace App\Http\Controllers;

use App\Models\Bill;
use App\Models\Subject;
use App\Models\student_subject;
use App\Models\User;
use Illuminate\Http\Request;
use Auth;
use Stripe;

class BillController extends Controller
{
    public function SubmitPayment(Request $request){

        $student_id = Auth::user()->id; 
        $subjects = Subject::whereIn('id', $request->selected_subject)->get();
        $total = Subject::whereIn('id', $request->selected_subject)->sum('price');  
        
        foreach($subjects as $subject){
            $student_subject = new student_subject;
            $student_subject->student_id = $student_id;
            $student_subject->subject_id = $subject->id ;
            $student_subject->created_at = now();
            $student_subject->updated_at = null;
            $student_subject->save();
        }

        $student_is_registered = User::find($student_id);
        $student_is_registered->registered_course = 1;
        $student_is_registered->save();
    }
}
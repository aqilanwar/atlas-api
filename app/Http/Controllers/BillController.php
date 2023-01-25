<?php

namespace App\Http\Controllers;

use App\Models\Bill;
use App\Models\Subject;
use App\Models\student_subject;
use App\Models\User;
use Illuminate\Http\Request;
use Auth;
use Stripe;
use Illuminate\Support\Facades\Storage;

// use App\Models\Invoice;
use PDF;
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

    public function CreateInvoice(){
        
        $student_id = 1; 
        $student = User::find($student_id);
        $data = Subject::join('student_subjects' , 'student_subjects.subject_id', '=' ,'subjects.id')
        ->where('student_subjects.student_id' ,'=' , $student_id)
        ->select('subjects.name as subject_name', 'subjects.price')
        ->get();

        // dd(json_encode($student));
        $timestamp = now()->timestamp;
        $pdf = PDF::loadView('invoice-pdf', compact('data' , 'student' ,'timestamp'));
        // for($i=0; $i<10 ; $i++){
        //     echo json_encode($timestamp. '<br>');
        // }
        // dd($timestamp);
        $file = Storage::put('public/pdf/invoice/'.$timestamp.'.pdf', $pdf->output());
        return Storage::url($file);
        // return $pdf->download('test.pdf');
        
        return view('invoice-pdf' , compact('data' , 'student' , 'timestamp'));
    }

    public function CreateReceipt(){
        
        $student_id = 1; 
        $student = User::find($student_id);
        $data = Subject::join('student_subjects' , 'student_subjects.subject_id', '=' ,'subjects.id')
        ->where('student_subjects.student_id' ,'=' , $student_id)
        ->select('subjects.name as subject_name', 'subjects.price')
        ->get();

        // dd(json_encode($student));
        $timestamp = now()->timestamp;
        $pdf = PDF::loadView('invoice-pdf', compact('data' , 'student' ,'timestamp'));
        // for($i=0; $i<10 ; $i++){
        //     echo json_encode($timestamp. '<br>');
        // }
        // dd($timestamp);
        $file = Storage::put('public/pdf/invoice/'.$timestamp.'.pdf', $pdf->output());
        return Storage::url($file);
        // return $pdf->download('test.pdf');
        
        return view('invoice-pdf' , compact('data' , 'student' , 'timestamp'));
    }
}
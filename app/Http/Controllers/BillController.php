<?php

namespace App\Http\Controllers;

use App\Models\Bill;
use App\Models\Subject;
use App\Models\student_subject;
use App\Models\User;
use Illuminate\Http\Request;
use Auth;
use Stripe;
use Carbon\Carbon;

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

        return redirect()->route('profile')->with('message', 'You have successfully registered as Atlas Tuition Center student ! Thank you for choosing us.');
    }

    public function CreateInvoice(){
        
        $student_id = 1; 
        $student = User::find($student_id);
        $data = Subject::join('student_subjects' , 'student_subjects.subject_id', '=' ,'subjects.id')
        ->where('student_subjects.student_id' ,'=' , $student_id)
        ->select('subjects.name as subject_name', 'subjects.price')
        ->get();

        $now = Carbon::now()->addMonth();
        $billing_date = $now->format('F Y');
        
        $invoice_id = now()->addMonth()->timestamp;
        // dd(json_encode($data->sum('price') ));
        $create_bill = Bill::insertGetId([
             'title' =>  $billing_date ,
             'date' => $now,
             'total' => $data->sum('price') ,
             'invoice_id' => $invoice_id,
             'receipt_id' => null,
             'status' => null,
             'paid_at' => null,
             'student_id' => $student_id,
             'created_at' => now(),
        ]);

        $invoice = Bill::find($create_bill);
        // dd(json_encode($invoice));

        $pdf = PDF::loadView('invoice-pdf', compact('data' , 'student' ,'invoice'));

        $file = Storage::put('public/pdf/invoice/'.$invoice_id.'.pdf', $pdf->output());
        // return Storage::url($file);
        // return $pdf->download('test.pdf');
        
        return view('invoice-pdf' , compact('data' , 'student' , 'invoice'));
    }

    public function CreateReceipt(){
        
        $student_id = 1; 
        $student = User::find($student_id);
        $data = Subject::join('student_subjects' , 'student_subjects.subject_id', '=' ,'subjects.id')
        ->where('student_subjects.student_id' ,'=' , $student_id)
        ->select('subjects.name as subject_name', 'subjects.price')
        ->get();

        $timestamp = now()->timestamp;
        dd(json_encode($timestamp));
        $pdf = PDF::loadView('invoice-pdf', compact('data' , 'student' ,'timestamp'));

        $file = Storage::put('public/pdf/invoice/'.$timestamp.'.pdf', $pdf->output());

        return view('invoice-pdf' , compact('data' , 'student' , 'timestamp'));
    }

    public function MakePayment($invoice_id){
        $student_id = Auth::user()->id ;

        if (Bill::where('invoice_id', $invoice_id)->exists()) {
            $invoice = Bill::where('invoice_id', $invoice_id)->first();
            $subjects = Subject::join('student_subjects' , 'student_subjects.subject_id', '=' ,'subjects.id')
            ->where('student_subjects.student_id' ,'=' , $student_id)
            ->select('subjects.name as subject_name', 'subjects.price')
            ->get();            
            // dd(json_encode($invoice));
        }else{
            abort(404);
        }

        return view('back-pages/make-payment' , compact('subjects' , 'invoice'));
    }

    public function AttemptPayment($invoice_id){
        $student_id = Auth::user()->id;
        $receipt_id = now()->timestamp;
        
        Bill::where('invoice_id', $invoice_id)
        ->update([
            'paid_at' => now(),
            'receipt_id' => $receipt_id,
            'status' => 'Paid',
            'updated_at' => now(),
        ]);

        $student = User::find($student_id);
        $data = Subject::join('student_subjects' , 'student_subjects.subject_id', '=' ,'subjects.id')
        ->where('student_subjects.student_id' ,'=' , $student_id)
        ->select('subjects.name as subject_name', 'subjects.price')
        ->get();

        $invoice = Bill::where('invoice_id',$invoice_id)->first();

        $pdf = PDF::loadView('receipt-pdf', compact('data' , 'student' ,'invoice'));
        $file = Storage::put('public/pdf/receipt/'.$receipt_id.'.pdf', $pdf->output());
        return redirect()->route('payment')->with('success', 'Invoice ID : '.$invoice_id .' have successfully paid !');


    }
}
<?php

namespace App\Http\Controllers;

use App\Models\Subject;
use Illuminate\Http\Request;
use Auth;

class SubjectController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function FirstTimeRegister()
    {
        $is_registered = Auth::user()->registered_course ; 
        if($is_registered == 0){
            $subjects = Subject::all();
            return view('back-pages/register-subjects' , compact('subjects'));
        }else{
            return redirect()->route('profile');
        }
    }

    /**
     * Get selected subject from register subject form and return to payment gateway.
     *
     * @return \Illuminate\Http\Response
     */

    
    public function RedirectPaymentPage(Request $request)
    {
        if (!empty( $request->selected_courses) ){
            $subjects = Subject::whereIn('id', $request->selected_courses)->get();
            $total = Subject::whereIn('id', $request->selected_courses)->sum('price');
            return view('back-pages/payment-page' , compact('total' , 'subjects'));

        }
        return back()->with('error', 'Please select course.');
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

    
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Subject  $subject
     * @return \Illuminate\Http\Response
     */
    public function show(Subject $subject)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Subject  $subject
     * @return \Illuminate\Http\Response
     */
    public function edit(Subject $subject)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Subject  $subject
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Subject $subject)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Subject  $subject
     * @return \Illuminate\Http\Response
     */
    public function destroy(Subject $subject)
    {
        //
    }
}

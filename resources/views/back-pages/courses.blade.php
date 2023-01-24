@extends('back-layouts/master')
@section('page', 'Courses')
@section('content')

    <div class="flex-lg-row-fluid ms-lg-10 ">
        <!--begin::List Widget 4-->
        <div class="card mb-5 mb-xl-10">
            <!--begin::Header-->
            <div class="card-header align-items-center border-0 mt-5">
                <h3 class="card-title align-items-start flex-column">
                    <span class="fw-bolder text-dark fs-2"> <a href="{{ route('courses') }}">Courses</a></span>
                    <span class="text-gray-400 mt-2 fw-bold fs-6">List of all courses enrolled</span>
                </h3>
            </div>
            <!--end::Header-->
            <!--begin::Body-->

            @foreach ($data as $subject)                
            <div class="card-body pt-1">
                <!--begin::Item-->
                <div class="d-flex flex-stack item-border-hover px-3 py-2 ms-n4 mb-3">
                    <!--begin::Section-->
                    <div class="d-flex align-items-center">
                        <!--begin::Symbol-->
                        <div class="symbol symbol-40px symbol-circle me-4">
                            <img src="/assets/media/avatars/150-26.jpg" alt="">
                        </div>
                        <!--end::Symbol-->
                        <!--begin::Title-->
                        <div class="ps-1 mb-1">
                            <a href="#" class="fs-5 text-gray-800 text-hover-primary fw-boldest">{{ $subject->subject_name }}</a>
                            <div class="text-gray-400 fw-bold">{{ $subject->name }}</div>
                        </div>
                        <!--end::Title-->
                    </div>
                    <!--end::Section-->
                    <!--begin::Label-->
                    <span class="badge rounded-pill fs-7 fw-boldest">
                        
                        <a href="{{ route('courses-attendance', $subject->id)}}" class="btn btn-success my-2">Attendance</a>
                        <!--end::Button-->                                <!--begin::Button-->
                        <a href="{{ route('courses-test', $subject->id)}}" class="btn btn-danger my-2">View Test</a>
                            <!--end::Button--></span>
                    <!--end::Label-->
                </div>
                <!--end::Item-->

            </div>
            @endforeach
            <!--end::Body-->
        </div>
        <!--end::List Widget 4-->
    </div>
@endsection

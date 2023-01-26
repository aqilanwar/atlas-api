@extends('back-layouts-staff/master')
@section('page', 'Student')
@section('content')

    <div class="flex-lg-row-fluid ms-lg-10 ">
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif
        <!--begin::Table Widget 1-->
        <div class="card mb-5 mb-xl-10">
            <!--begin::Header-->
            <div class="card-header border-0 pt-5 pb-3">
                <!--begin::Card title-->
                <h3 class="card-title align-items-start flex-column">
                    <span class="fw-bolder text-dark fs-2">Manage Student</span>
                </h3>
            </div>
            <!--end::Header-->
            <!--begin::Body-->
            <div class="card-body py-0">
                
                @if($students->isEmpty())
                <div class="bg-grey">
                    <div class="text-center mt-3 mb-9 container">
                        <img src="{{ asset('back-assets/media/svg/empty.png') }}" style="width:40%" class="img-fluid">
                        <h1 class="mt-3 text-primary">Currently empty :( </h1>
                    </div>
                </div>
                @else
                <!--begin::Table-->
                <div class="table-responsive">
                    <table class="table align-middle table-row-bordered table-row-dashed gy-5 table-hover" id="kt_table_widget_1">
                        <!--begin::Table body-->
                        <tbody>
                            <!--begin::Table row-->
                            <tr class="text-start text-gray-400 fw-boldest fs-7 text-uppercase">
                                <th class="text-start px-0">No</th>
                                <th class="min-w-200px px-0">Name</th>
                                <th class="min-w-125px">Email / Phone Number</th>
                                <th class="min-w-125px">Created At</th>
                                <th class="text-end pe-2 min-w-70px">Action</th>
                            </tr>
                            <!--end::Table row-->
                            <!--begin::Table row-->
                            @foreach ($students as $key=>$student)                               
                            <tr>
                                <!--begin::Author=-->
                                <td class="p-0">
                                    <div class="d-flex align-items-center">
                                        <div class="ps-3">
                                            <a 
                                                class="text-gray-800 fw-boldest fs-5 text-hover-primary mb-1">
                                                {{ $students->firstItem() + $key }}.
                                            </a>
                                            {{-- <span class="text-gray-400 fw-bold d-block">Bilik 199</span> --}}
                                        </div>
                                    </div>
                                </td>
                                <!--end::Author=-->
                                <!--begin::Progress=-->
                                <td >
                                    <div class="ps-3">
                                        <a 
                                            class="text-gray-800 fw-boldest fs-5 text-hover-primary mb-1">
                                            {{ $student->name }}
                                        </a>
                                        {{-- <span class="text-gray-400 fw-bold d-block">Bilik 199</span> --}}
                                    </div>
                                </td>
                                <td >
                                    <div class="ps-3">
                                        <a 
                                        class="text-gray-800 fw-boldest fs-5 text-hover-primary mb-1">
                                        {{-- {{ $test->title }} --}}
                                         {{ $student->email }}
                                    </a>
                                    <span class="text-gray-400 fw-bold d-block">
                                        {{ $student->phone_number }}
                                    </span>
                                    </div>
                                </td>
                                <td >
                                    <div class="ps-3">
                                        <a class="text-gray-800 fw-boldest fs-5 text-hover-primary mb-1">
                                            {{ date('d F Y', strtotime($student->created_at)) }}

                                        </a>
                                    </div>
                                </td>
                                <td>
                                    <a href="" data-bs-toggle="modal" data-bs-target="#delete-{{ $student->id }}"  class="btn btn-danger align-self-center float-end">Remove</a>
                                </td>
                            </tr>
                            @endforeach
                            <!--end::Table row-->
                            
                            
                        </tbody>
                        <!--end::Table body-->
                    </table>

                    <div class="card-footer">
                        {{ $students->links() }}
                    </div>
                </div>
                <!--end::Table-->

                @endif
            </div>
            <!--end::Body-->
        </div>
        <!--end::Table Widget 1-->

    </div>
@endsection
@section('update-profile')
        		<!--begin::Modal - Edit Profile-->
                @foreach ($students as $student)            
                <div class="modal fade" id="delete-{{ $student->id }}" tabindex="-1" aria-hidden="true">
                    <!--begin::Modal dialog-->
                    <div class="modal-dialog mw-650px">
                        <!--begin::Modal content-->
                        <div class="modal-content">
                            <!--begin::Modal header-->
                            <div class="modal-header pb-0 border-0 justify-content-end">
                                <!--begin::Close-->
                                <div class="btn btn-sm btn-icon btn-active-color-primary" data-bs-dismiss="modal">
                                    <!--begin::Svg Icon | path: icons/duotune/arrows/arr061.svg-->
                                    <span class="svg-icon svg-icon-1">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                            <rect opacity="0.5" x="6" y="17.3137" width="16" height="2" rx="1" transform="rotate(-45 6 17.3137)" fill="black" />
                                            <rect x="7.41422" y="6" width="16" height="2" rx="1" transform="rotate(45 7.41422 6)" fill="black" />
                                        </svg>
                                    </span>
                                    <!--end::Svg Icon-->
                                </div>
                                <!--end::Close-->
                            </div>
                            <!--begin::Modal header-->
                            <!--begin::Modal body-->
                            <div class="modal-body scroll-y mx-5 mx-xl-18 pt-0 pb-15">
                                <form action="{{ route('admin.delete.student') }}" method="POST">
                                    @csrf
                                    <!--begin::Heading-->
                                    <div class="text-center mb-13">
                                        <!--begin::Title-->
                                        <h1 class="mb-3">Delete student</h1>
                                        <input type="hidden" name="student_email" value="{{ $student->email }}">
                                        <!--end::Title-->
                                    </div>
                                    <h2 class="text-center text-danger">Are you sure to remove this student?</h2>
                                    <div class="container p-5">
                                        <div class="row">
                                            <h3 class="text-right">
                                                Name : {{ $student->name }}
                                            </h3>
                                        </div>
                                        <div class="row">
                                            <h3 class="text-right">
                                                Email : {{ $student->email }}
                                            </h3>
                                        </div>
                                    </div>
                                    <br>
                                    <br>
        
                                    <div class="text-center">
                                        <button type="submit" class="btn btn-lg btn-light-danger">Delete this student</button>
                                    </div>

                                    <!--end::Wrapper-->
                                </form>
                                
                            </div>
                            <!--end::Modal body-->
                        </div>
                        <!--end::Modal content-->
                    </div>
                    <!--end::Modal dialog-->
                </div>
                @endforeach
                <!--end::Modal - Edit Profile-->
@endsection



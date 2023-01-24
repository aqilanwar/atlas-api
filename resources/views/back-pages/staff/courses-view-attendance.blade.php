@extends('back-layouts-staff/master')
@section('page', 'Courses')
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

        {{-- <div class="alert alert-danger" role="alert">
            This is a danger alert with <a href="#" class="alert-link">an example link</a>. Give it a click if you like.
          </div> --}}
        <!--begin::Table Widget 1-->
        <div class="card mb-5 mb-xl-10">
            <!--begin::Header-->
            <div class="card-header border-0 pt-5 pb-3">
                <!--begin::Card title-->
                <h3 class="card-title align-items-start flex-column">
                    <span class="fw-bolder text-dark fs-2"> <a href="{{ route('staff.courses') }}">Courses</a></span>
                    <span class="text-gray-400 mt-2 fw-bold fs-6">
                        <a href="{{ route('staff.attendance' ,$subjectId) }}">Attendance</a> / 
                        <a href="{{ route('staff.view.attendance' ,['subject_id' => $subjectId , 'attendance_id' => $attendanceId->id]) }}">{{ $attendanceId->title }}</a>

                     </span>
                </h3>

                <!--end::Card title-->
                <!--begin::Action-->
                {{-- <a href="#" class="btn btn-primary align-self-center" data-bs-toggle="modal"
                    data-bs-target="#kt_modal_edit_profile">+ Create Attendance</a> --}}
                <!--end::Action-->
            </div>
            <!--end::Header-->
            <!--begin::Body-->
            <div class="card-body py-0">
                <!--begin::Table-->
                <div class="table-responsive">
                    <table class="table align-middle table-row-bordered table-row-dashed gy-5 table-hover" id="kt_table_widget_1">
                        <!--begin::Table body-->
                        <tbody>
                            <!--begin::Table row-->
                            <tr class="text-start text-gray-400 fw-boldest fs-7 text-uppercase">
                                <th class="min-w-200px px-0">No.</th>
                                <th class="min-w-200px px-0">Name</th>
                                {{-- <th class="min-w-125px">Name</th> --}}
                                <th class="min-w-125px">Attendance</th>
                                {{-- <th class="text-end pe-2 min-w-70px">Action</th> --}}
                            </tr>
                            <!--end::Table row-->
                            <!--begin::Table row-->
                            @php 
                                $i=1;
                            @endphp
                            @foreach ($data as $student)                                
                            <tr>
                                
                                <!--begin::Author=-->
                                <td class="p-0">
                                    <div class="d-flex align-items-center">
                                        <div>
                                            <a 
                                                class="text-gray-800 fw-boldest fs-5 text-hover-primary mb-1">
                                                {{ $i++ }}
                                            </a>
                                            {{-- <span class="text-gray-400 fw-bold d-block">Created at : {{ $attend->created_at }}</span> --}}
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
                                    </div>
                                </td>
                                <td >
                                    <div class="ps-3">
                                        <a 
                                            class="text-gray-800 fw-boldest fs-5 text-hover-primary mb-1">
                                            @if ($student->clocked_in == 0)
                                            <span class="badge rounded-pill bg-danger fs-7 fw-boldest">
                                                Missing
                                            </span>
                                            @else
                                            <span class="badge rounded-pill bg-success fs-7 fw-boldest">
                                                Attend
                                            </span>
                                            @endif
                                        </a>
                                    </div>
                                </td>
                            </tr>
                            @endforeach
                            <!--end::Table row-->

                        </tbody>
                        <!--end::Table body-->
                    </table>
                </div>
                <!--end::Table-->
            </div>
            <!--end::Body-->
        </div>
        <!--end::Table Widget 1-->

    </div>
@endsection

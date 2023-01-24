@extends('back-layouts/master')
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
        <!--begin::Table Widget 1-->
        <div class="card mb-5 mb-xl-10">
            <!--begin::Header-->
            <div class="card-header border-0 pt-5 pb-3">
                <!--begin::Card title-->
                <h3 class="card-title align-items-start flex-column">
                    <span class="fw-bolder text-dark fs-2"> <a href="{{ route('courses') }}">Courses</a></span>
                    <span class="text-gray-400 mt-2 fw-bold fs-6">Attendance / {{ $subject_id->name }}</span>
                </h3>
                <!--end::Card title-->

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
                                <th class="text-start px-0">No</th>
                                <th class="min-w-200px px-0">Title</th>
                                <th class="min-w-125px">Date</th>
                                <th class="min-w-70px">Attendance</th>
                                <th class="text-end pe-2 min-w-70px">Action</th>
                            </tr>
                            <!--end::Table row-->
                            <!--begin::Table row-->
                            @php
                                $i=1;
                            @endphp
                            @foreach ($attendances as $key=>$attendance)                               
                            <tr>
                                <!--begin::Author=-->
                                <td class="p-0">
                                    <div class="d-flex align-items-center">
                                        <div class="ps-3">
                                            <a 
                                                class="text-gray-800 fw-boldest fs-5 text-hover-primary mb-1">
                                                {{ $attendances->firstItem() + $key }}.
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
                                            {{ $attendance->title }}
                                        </a>
                                        {{-- <span class="text-gray-400 fw-bold d-block">Bilik 199</span> --}}
                                    </div>
                                </td>
                                <td >
                                    <div class="ps-3">
                                        <a 
                                            class="text-gray-800 fw-boldest fs-5 text-hover-primary mb-1">
                                            {{ date('d F Y', strtotime($attendance->start_date)) }}

                                        </a>
                                        <span class="text-gray-400 fw-bold d-block">{{ date('h:i a', strtotime($attendance->start_date))}} - {{ date('h:i a', strtotime($attendance->end_date)) }}</span>
                                    </div>
                                </td>

                                @if (is_null($attendance->clocked_in))                                    
                                    <td class="pe-0 text-center d-flex align-items-center">
                                        <div class="ps-3">
                                            <span class="badge rounded-pill bg-danger fs-7 fw-boldest">
                                                Missing
                                            </span>
                                        </div>
                                    </td>
                                @else
                                    <td class="pe-0 text-center d-flex align-items-center">
                                        <div class="ps-3">
                                            <span class="badge rounded-pill bg-success fs-7 fw-boldest">
                                                Attend
                                            </span>
                                        </div>
                                    </td>                                    
                                @endif  
                                
                                <!--end::Company=-->
                                 @if (is_null($attendance->clocked_in))
                                 <td class="text-end pe-2 min-w-70px">
                                    <span class="form-check form-check-custom form-check-solid" style="float: right;">
                                        <input class="form-check-input" onchange="window.location.href='{{ route('courses-sign-attendance' , $attendance->student_attendance_id) }}'" type="checkbox" name="attend"/>
                                    </span>
                                </td>                                     
                                 @else                                     
                                 <td class="text-end pe-2 min-w-70px">
                                     <span class="form-check form-check-custom form-check-solid" style="float: right;">
                                         <input class="form-check-input" value="{{ $attendance->student_attendance_id }}" type="checkbox" name="attend" checked disabled/>
                                     </span>
                                 </td>
                                 @endif   
                            </tr>
                            @endforeach
                            <!--end::Table row-->
                            
                            
                        </tbody>
                        <!--end::Table body-->
                    </table>
                    <div class="card-footer">
                        {{ $attendances->links() }}
                    </div>
                </div>
                <!--end::Table-->
            </div>
            <!--end::Body-->
        </div>
        <!--end::Table Widget 1-->

    </div>
@endsection

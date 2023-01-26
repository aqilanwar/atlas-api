@extends('back-layouts-staff/master')
@section('page', 'Timetable')
@section('content')

    <div class="flex-lg-row-fluid ms-lg-10 ">

        <div class="card mb-5 mb-xl-10">
            <!--begin::Header-->
            <div class="card-header align-items-center border-0 mt-5">
                <h3 class="card-title align-items-start flex-column">
                    <span class="fw-bolder text-dark fs-2"> <a href="{{ route('timetable') }}">Timetable</a></span>
                    <span class="text-gray-400 mt-2 fw-bold fs-6">List of schedule for your courses that you teach </span>
                </h3>

            </div>
            <div class="card-body py-0">
                <!--begin::Table-->
                <div class="table-responsive">
                    <table class="table align-middle table-row-bordered table-row-dashed gy-5 table-hover" id="kt_table_widget_1">
                        <!--begin::Table body-->
                        <tbody>
                            <!--begin::Table row-->
                            <tr class="text-start text-gray-400 fw-boldest fs-7 text-uppercase">
                                <th class="text-start px-0">No</th>
                                <th class="min-w-200px px-0">Subject</th>
                                <th class="min-w-125px">Time</th>
                            </tr>
                            <!--end::Table row-->
                            <!--begin::Table row-->
                            @php
                                $i=1;
                            @endphp
                            @foreach ($timetables as $timetable)                               
                            <tr>
                                <!--begin::Author=-->
                                <td class="p-0">
                                    <div class="d-flex align-items-center">
                                        <div class="ps-3">
                                            <a 
                                                class="text-gray-800 fw-boldest fs-5 text-hover-primary mb-1">
                                                {{ $i++ }}.
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
                                        {{ $timetable->name }}
                                    </a>
                                    {{-- <span class="text-gray-400 fw-bold d-block">Bilik 199</span> --}}
                                </div>
                            </td>
                            <td class="pe-2 min-w-70px">
                                <div class="ps-3">
                                    <a 
                                        class="text-gray-800 fw-boldest fs-5 text-hover-primary mb-1">
                                        {{ $timetable->time }} - {{ $timetable->day }}
                                    </a>
                                </div>
                            </td>                                        
                             @endforeach
                            <!--end::Table row-->
                            
                            
                        </tbody>
                        <!--end::Table body-->
                    </table>
              
                </div>
                <!--end::Table-->
            </div>
            <!--end::Header-->
            <!--begin::Body-->

            <!--end::Body-->
        </div>
        <!--end::List Widget 4-->
    </div>
@endsection

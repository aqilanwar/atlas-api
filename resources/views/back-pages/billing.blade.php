@extends('back-layouts/master')
@section('page', 'Billing')
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
                    <span class="fw-bolder text-dark fs-2"> <a href="{{ route('courses') }}">Billing</a></span>
                    <span class="text-gray-400 mt-2 fw-bold fs-6">List of bill</span>
                </h3>
                <!--end::Card title-->

            </div>
            <!--end::Header-->
            <!--begin::Body-->

            {{-- @if($tests->isEmpty()) --}}
            <div class="bg-grey">
                <div class="text-center mt-3 mb-9 container">
                    <img src="{{ asset('back-assets/media/svg/empty.png') }}" style="width:40%" class="img-fluid">
                    <h1 class="mt-3 text-primary">Currently empty :( </h1>
                </div>
            </div>
            {{-- @else --}}
            <div class="card-body py-0">
                <!--begin::Table-->
                <div class="table-responsive">
                    <table class="table align-middle table-row-bordered table-row-dashed gy-5 table-hover" id="kt_table_widget_1">
                        <!--begin::Table body-->
                        <tbody>
                            <!--begin::Table row-->
                            <tr class="text-start text-gray-400 fw-boldest fs-7 text-uppercase">
                                <th class="text-start px-0">No</th>
                                <th class="min-w-200px px-0">Billing</th>
                                <th class="min-w-125px">Created At</th>
                                <th class="text-end pe-2 min-w-70px">Status</th>
                                <th class="text-end pe-2 min-w-70px">Action</th>
                            </tr>
                            <!--end::Table row-->
                            <!--begin::Table row-->
    
                            {{-- @foreach ($tests as $key=>$test)                                --}}
                            <tr>
                                <!--begin::Author=-->
                                <td class="p-0">
                                    <div class="d-flex align-items-center">
                                        <div class="ps-3">
                                            <a 
                                                class="text-gray-800 fw-boldest fs-5 text-hover-primary mb-1">
                                                {{-- {{ $tests->firstItem() + $key }}. --}}
                                                1
                                            </a>
                                            
                                        </div>
                                    </div>
                                </td>
                                <!--end::Author=-->
                                <!--begin::Progress=-->

                            <td >
                                <div class="ps-3">
                                    <a 
                                        class="text-gray-800 fw-boldest fs-5 text-hover-primary mb-1">
                                        {{-- {{ $test->title }} --}}
                                        Billing : January 2023
                                    </a>
                                    <span class="text-gray-400 fw-bold d-block">
                                        <a href="">Reference Id : 2023923992</a>
                                        </span>
                                </div>
                            </td>
                            <td class="pe-2 min-w-70px">
                                <div class="ps-3">
                                    <a 
                                        class="text-gray-800 fw-boldest fs-5 text-hover-primary mb-1">
                                        {{ date('d F Y h:i a', strtotime(now())) }}
                                    </a>
                                    {{-- <span class="text-gray-400 fw-bold d-block">Paid at : 2023923992</span> --}}

                                </div>
                            </td>                                        
                                <!--end::Company=-->
                                <td class="text-end pe-2 min-w-70px">
                                    <div class="ps-3">
                                        <a 
                                            class="text-gray-800 fw-boldest fs-5 text-hover-primary mb-1">
                                            {{-- @if (is_null($test->marks)) --}}
                                                <span class="badge rounded-pill bg-danger fs-7 fw-boldest">
                                                    Not paid
                                                </span>
                                            {{-- @else --}}
                                                {{-- <span class="badge rounded-pill bg-success fs-7 fw-boldest">
                                                    Paid
                                                </span>
                                                <span class="badge rounded-pill bg-warning fs-7 fw-boldest">
                                                    Pending
                                                </span> --}}
                                            {{-- @endif --}}
                                        </a>
                                    </div>
                                </td>       
                                
                                <td class="text-end pe-2 min-w-70px">
                                    <div class="ps-3">
                                        <a href="" class="btn btn-primary">Make payment</a>

                                    </div>
                                </td>       
                                
                                
    
                            {{-- @endforeach --}}
                            <!--end::Table row-->
                            
                            
                        </tbody>
                        <!--end::Table body-->
                    </table>
                    <div class="card-footer">
                        {{-- {{ $tests->links() }} --}}
                    </div>
                </div>
                <!--end::Table-->
            </div>

            {{-- @endif --}}
            <!--end::Body-->
        </div>
        <!--end::Table Widget 1-->

    </div>
@endsection

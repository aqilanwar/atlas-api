@extends('back-layouts/master')
@section('page', 'Payment')
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
                    <span class="fw-bolder text-dark fs-2"> <a href="{{ route('courses') }}">Payment</a></span>
                    <span class="text-gray-400 mt-2 fw-bold fs-6">List of tuition fee</span>
                </h3>
                <!--end::Card title-->

            </div>
            <!--end::Header-->
            <!--begin::Body-->
            <div class="card-body py-0">
                @if($data->isEmpty())
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
                                <th class="min-w-200px px-0">Billing</th>
                                <th class="min-w-125px">Created At</th>
                                <th class="text-end pe-2 min-w-70px">Status</th>
                                <th class="text-end pe-2 min-w-70px">Action</th>
                            </tr>
                            <!--end::Table row-->
                            <!--begin::Table row-->
    
                            @foreach ($data as $key=>$bill)                               
                            <tr>
                                <!--begin::Author=-->
                                <td class="p-0">
                                    <div class="d-flex align-items-center">
                                        <div class="ps-3">
                                            <a 
                                                class="text-gray-800 fw-boldest fs-5 text-hover-primary mb-1">
                                                {{ $data->firstItem() + $key }}.
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
                                        Billing : {{ $bill->title }}
                                    </a>
                                    <span class="text-gray-400 fw-bold d-block">
                                        <a href="{{ asset('storage/pdf/invoice/' . $bill->invoice_id .'.pdf' ) }}">Invoice Id : {{ $bill->invoice_id }}</a>
                                    </span>
                                </div>
                            </td>
                            <td class="pe-2 min-w-70px">
                                <div class="ps-3">
                                    <a 
                                        class="text-gray-800 fw-boldest fs-5 text-hover-primary mb-1">
                                        {{ date('d F Y h:i a', strtotime($bill->created_at)) }}
                                    </a>

                                </div>
                            </td>                                        
                                <!--end::Company=-->
                                <td class="text-end pe-2 min-w-70px">
                                    <div class="ps-3">
                                        <a 
                                            class="text-gray-800 fw-boldest fs-5 text-hover-primary mb-1">
                                            @if (is_null($bill->receipt_id))
                                                <span class="badge rounded-pill bg-danger fs-7 fw-boldest">
                                                    Not paid
                                                </span>
                                            @else
                                                <span class="badge rounded-pill bg-success fs-7 fw-boldest">
                                                    Paid
                                                </span>
                                            @endif
                                        </a>
                                    </div>
                                </td>       
                                @if (is_null($bill->receipt_id))
                                    <td class="text-end pe-2 min-w-70px">
                                        <div class="ps-3">
                                            <a href="{{ route('make-payment' , $bill->invoice_id) }}" class="btn btn-primary">Make payment</a>
                                        </div>
                                    </td>       
                                @else
                                    <td class="text-end pe-2 min-w-70px">
                                        <div class="ps-3">
                                            <a href="{{ asset('storage/pdf/receipt/' . $bill->receipt_id .'.pdf' ) }}" class="btn btn-success">View Receipt</a>
                                        </div>
                                    </td>                                         
                                @endif
                            @endforeach
                            <!--end::Table row-->
                            
                            
                        </tbody>
                        <!--end::Table body-->
                    </table>
                    <div class="card-footer">
                        {{ $data->links() }}
                    </div>
                </div>
                @endif
                <!--end::Table-->
            </div>

            {{-- @endif --}}
            <!--end::Body-->
        </div>
        <!--end::Table Widget 1-->

    </div>
@endsection


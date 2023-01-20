@extends('back-layouts/unverified')
@section('page', 'Courses')
@section('title', 'Payment')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-7">
                <!--begin::details View-->
                <div class="card mt-10">
                    <!--begin::Card header-->
                    <div class="card-header">
                        <!--begin::Card title-->
                        <div class="card-title m-0">
                            <h3 class="fw-bolder m-0">Thank you for registering to Atlas Tuition Center !</h3>
                        </div>
                        <!--end::Card title-->
                    </div>


                    <!--begin::Card header-->
                    <!--begin::Card body-->
                    <div class="card-body p-9">
                        <div class="row mb-8">
                            <h4 class="fw-bolder text-center">Select your payment method : </h4>
                        </div>
                        @if (session()->has('error'))
                            <div class="alert alert-danger">
                                {{ session()->get('error') }}
                            </div>
                        @endif
                        <!--begin::Row-->
                        <div class="col">
                            <div class="row mb-7">
                                <!--begin::Label-->
                                <label class="col-lg-4 fw-bold"> Card Holder
                                    <span class="required"></span>
                                </label>
                                <!--end::Label-->
                                <!--begin::Col-->
                                <div class="col-lg-8">
                                    <!--begin::Input-->
                                    <input type="text" class="form-control form-control-lg form-control-solid"
                                        name="name" placeholder="" value="" />
                                    <!--end::Input-->
                                </div>
                                <!--end::Col-->
                            </div>
                            <div class="col">
                                <div class="row mb-7">
                                    <!--begin::Label-->
                                    <label class="col-lg-4 fw-bold"> Card Number
                                        <span class="required"></span>
                                    </label>
                                    <!--end::Label-->
                                    <!--begin::Col-->
                                    <div class="col-lg-8">
                                        <!--begin::Input-->
                                        <input type="text" class="form-control form-control-lg form-control-solid"
                                            name="card_number" placeholder="" value=""  data-inputmask-mask="9999 9999 9999 9999"/>
                                        <!--end::Input-->
                                    </div>
                                    <!--end::Col-->
                                </div>
                            </div>
                            <div class="col">
                                <div class="row mb-7">
                                    <!--begin::Label-->
                                    <label class="col-lg-4 fw-bold"> CVV
                                        <span class="required"></span>
                                    </label>
                                    <!--end::Label-->
                                    <!--begin::Col-->
                                    <div class="col-lg-8">
                                        <!--begin::Input-->
                                        <input type="text" class="form-control form-control-lg form-control-solid"
                                            name="cvv" placeholder="" value="" data-inputmask-mask="999" />
                                        <!--end::Input-->
                                    </div>
                                    <!--end::Col-->
                                </div>
                            </div>
                            <div class="col">
                                <div class="row mb-7">
                                    <!--begin::Label-->
                                    <label class="col-lg-4 fw-bold"> Card Expire (MM/YYYY)
                                        <span class="required"></span>
                                    </label>
                                    <!--end::Label-->
                                    <!--begin::Col-->
                                    <div class="col-lg-8">
                                        <!--begin::Input-->
                                        <input type="text" class="form-control form-control-lg form-control-solid"
                                            name="cex" placeholder="" value="" data-inputmask-alias="datetime" data-inputmask-inputformat="mm/yyyy" />
                                        <!--end::Input-->
                                    </div>
                                    <!--end::Col-->
                                </div>
                            </div>
                        </div>
                        <!--end::Row-->
                        <button type="button" class="btn btn-lg btn-primary float-end" data-kt-stepper-action="next"
                            onClick="getSelectedCourses()">Pay now
                            <!--begin::Svg Icon | path: icons/duotune/arrows/arr064.svg-->
                            <span class="svg-icon svg-icon-3 ms-1 me-0">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                    fill="none">
                                    <rect opacity="0.5" x="18" y="13" width="13" height="2"
                                        rx="1" transform="rotate(-180 18 13)" fill="black" />
                                    <path
                                        d="M15.4343 12.5657L11.25 16.75C10.8358 17.1642 10.8358 17.8358 11.25 18.25C11.6642 18.6642 12.3358 18.6642 12.75 18.25L18.2929 12.7071C18.6834 12.3166 18.6834 11.6834 18.2929 11.2929L12.75 5.75C12.3358 5.33579 11.6642 5.33579 11.25 5.75C10.8358 6.16421 10.8358 6.83579 11.25 7.25L15.4343 11.4343C15.7467 11.7467 15.7467 12.2533 15.4343 12.5657Z"
                                        fill="black" />
                                </svg>
                            </span>
                            <!--end::Svg Icon-->
                        </button>

                    </div>
                    <!--end::Card body-->
                </div>
                <!--end::details View-->
            </div>
            <div class="col-md-5">
                <!--begin::details View-->
                <div class="card mt-10">
                    <!--begin::Card header-->
                    <div class="card-header">
                        <!--begin::Card title-->
                        <div class="card-title m-0">
                            <h3 class="fw-bolder m-0">Selected courses : </h3>
                        </div>
                        <!--end::Card title-->
                    </div>


                    <!--begin::Card header-->
                    <!--begin::Card body-->
                    <div class="card-body p-9">
                        @if (session()->has('error'))
                            <div class="alert alert-danger">
                                {{ session()->get('error') }}
                            </div>
                        @endif
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th scope="col" class="fw-bolder">Courses</th>
                                    <th scope="col" class="fw-bolder">Price</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($subjects as $subject)
                                    <tr>
                                        <td>
                                            <div class="row">
                                                <!--begin::Label-->
                                                <label class="col fw-bold mx-3">{{ $subject->name }}</label>
                                                <!--end::Label-->
                                            </div>
                                            <!--end::Row-->
                                        </td>
                                        <td>
                                            <div class="row">
                                                <!--begin::Label-->
                                                <label class="col fw-bold" id="subject-{{ $subject->id }}"
                                                    value="{{ $subject->price }}"> RM {{ $subject->price }}</label>
                                                <!--end::Label-->
                                            </div>
                                            <!--end::Row-->
                                        </td>
                                    </tr>
                                @endforeach
                                <tr>
                                    <td>
                                        <div class="row">
                                            <!--begin::Label-->
                                            <label class="col fw-bold mx-3 text-danger">Total : </label>
                                            <!--end::Label-->
                                        </div>
                                        <!--end::Row-->
                                    </td>
                                    <td>
                                        <div class="row">
                                            <!--begin::Label-->
                                            <label class="col fw-bold text-danger">RM {{ $total }}.00</label>
                                            <!--end::Label-->
                                        </div>
                                        <!--end::Row-->
                                    </td>
                                </tr>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <!--end::Card body-->
                </div>
                <!--end::details View-->
            </div>

        </div>
    </div>

@endsection

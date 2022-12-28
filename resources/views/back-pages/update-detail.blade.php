@extends('back-layouts/unverified')
@section('page', 'Courses')
@section('title', 'Update Detail')

@section('content')
    <!--begin::Content-->
    <div class="flex-lg-row-fluid ms-lg-10 mt-10">
        <!--begin::details View-->
        <div class="card mb-5 mb-xl-10" id="kt_profile_details_view">
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
                    <h4 class="fw-bolder">Please complete the details below before proceed : </h4>
                </div>
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
               
                <form class="mx-1 mx-md-4" method="POST" action="{{ route('update-detail.save') }}">
                    @csrf
                    <!--begin::Row-->
                    <div class="row mb-7">
                        <!--begin::Label-->
                        <label class="col-lg-4 fw-bold"> Full Name
                            <span class="required"></span>
                        </label>
                        <!--end::Label-->
                        <!--begin::Col-->
                        <div class="col-lg-8">
                            <!--begin::Input-->
                            <input type="text" class="form-control form-control-lg form-control-solid" name="name"
                                placeholder="" value="{{$student->name}}" />
                            <!--end::Input-->
                        </div>
                        <!--end::Col-->
                    </div>
                    <!--end::Row-->

                    <!--begin::Row-->
                    <div class="row mb-7">
                        <!--begin::Label-->
                        <label class="col-lg-4 fw-bold"> Email address
                            <span class="required"></span>
                        </label>
                        <!--end::Label-->
                        <!--begin::Col-->
                        <div class="col-lg-8">
                            <!--begin::Input-->
                            <input type="email" class="form-control form-control-lg form-control-solid" name="email"
                                placeholder="" value="{{$student->email}}" />
                            <!--end::Input-->
                        </div>
                        <!--end::Col-->
                    </div>
                    <!--end::Row-->

                    <!--begin::Row-->
                    <div class="row mb-7">
                        <!--begin::Label-->
                        <label class="col-lg-4 fw-bold"> Date of birth
                            <span class="required"></span>
                        </label>
                        <!--end::Label-->
                        <!--begin::Col-->
                        <div class="col-lg-8">
                            <!--begin::Input-->
                            <input type="date" class="form-control form-control-lg form-control-solid" name="dob"
                                placeholder="" value="{{ old('dob') }}" />
                            <!--end::Input-->
                        </div>
                        <!--end::Col-->
                    </div>
                    <!--end::Row-->

                    <!--begin::Row-->
                    <div class="row mb-7">
                        <!--begin::Label-->
                        <label class="col-lg-4 fw-bold"> Phone number
                            <span class="required"></span>
                        </label>
                        <!--end::Label-->
                        <!--begin::Col-->
                        <div class="col-lg-8">
                            <!--begin::Input-->
                            <input type="text" class="form-control form-control-lg form-control-solid"
                            placeholder="Enter your phone number" data-inputmask-mask="+609999999999" name="phone_number"  value="{{ old('phone_number') }}" />
                            <!--end::Input-->
                        </div>
                        <!--end::Col-->
                    </div>
                    <!--end::Row-->

                    <!--begin::Row-->
                    <div class="row mb-7">
                        <!--begin::Label-->
                        <label class="col-lg-4 fw-bold"> Address
                            <span class="required"></span>
                        </label>
                        <!--end::Label-->
                        <!--begin::Col-->
                        <div class="col-lg-8">
                            <!--begin::Input-->
                            <input type="text" class="form-control form-control-lg form-control-solid" name="address"
                                placeholder="Enter your address" value="{{ old('title') }}" />
                            <!--end::Input-->
                        </div>
                        <!--end::Col-->
                    </div>
                    <!--end::Row-->

                    <!--begin::Row-->
                    <div class="row mb-7">
                        <!--begin::Label-->
                        <label class="col-lg-4 fw-bold"> Parent's name
                            <span class="required"></span>
                        </label>
                        <!--end::Label-->
                        <!--begin::Col-->
                        <div class="col-lg-8">
                            <!--begin::Input-->
                            <input type="text" class="form-control form-control-lg form-control-solid" name="parents_name"
                                placeholder="Enter parent's name" value="{{$student->parents_name}}" />
                            <!--end::Input-->
                        </div>
                        <!--end::Col-->
                    </div>
                    <!--end::Row-->

                    <!--begin::Row-->
                    <div class="row mb-7">
                        <!--begin::Label-->
                        <label class="col-lg-4 fw-bold"> Parent's phone number
                            <span class="required"></span>
                        </label>
                        <!--end::Label-->
                        <!--begin::Col-->
                        <div class="col-lg-8">
                            <!--begin::Input-->
                            <input type="text" class="form-control form-control-lg form-control-solid" name="parents_phone_number"
                                data-inputmask-mask="+609999999999" placeholder="Enter parent's phone number"value="{{$student->parents_phone_number}}" />
                            <!--end::Input-->
                        </div>
                        <!--end::Col-->
                    </div>
                    <!--end::Row-->

                    <!--begin::Row-->
                    <div class="row mb-7">
                        <!--begin::Label-->
                        <label class="col-lg-4 fw-bold"> Parent's address
                            <span class="required"></span>
                        </label>
                        <!--end::Label-->
                        <!--begin::Col-->
                        <div class="col-lg-8">
                            <!--begin::Input-->
                            <input type="text" class="form-control form-control-lg form-control-solid" name="parents_address"
                                placeholder="Enter parent's address" value=""/>
                            <!--end::Input-->
                        </div>
                        <!--end::Col-->
                    </div>
                    <!--end::Row-->
                    <button type="submit" class="btn btn-lg btn-primary float-end">Save</button>
                </form>
            </div>
            <!--end::Card body-->
        </div>
        <!--end::details View-->

    </div>
    <!--end::Content-->
@endsection

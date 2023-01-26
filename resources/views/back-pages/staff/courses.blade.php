@extends('back-layouts-staff/master')
@section('page', 'Courses')
@section('content')
<div class="flex-lg-row-fluid ms-lg-10 ">
    <!--begin::List Widget 4-->
    <div class="card mb-5 mb-xl-10">
        <!--begin::Header-->
        <div class="card-header align-items-center border-0 mt-5">
            <h3 class="card-title align-items-start flex-column">
                <span class="fw-bolder text-dark fs-2"> <a href="{{ route('staff.courses') }}">Courses</a></span>
                <span class="text-gray-400 mt-2 fw-bold fs-6">List of all courses you teach </span>
            </h3>
            <div class="card-toolbar">
                <!--begin::Menu-->
                <button type="button" class="btn btn-sm btn-icon btn-icon-primary btn-active-light-primary me-n3"
                    data-kt-menu-trigger="click" data-kt-menu-placement="bottom-end">
                    <!--begin::Svg Icon | path: icons/duotune/general/gen024.svg-->
                    <span class="svg-icon svg-icon-2">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24px" height="24px" viewBox="0 0 24 24">
                            <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                <rect x="5" y="5" width="5" height="5" rx="1"
                                    fill="#000000" />
                                <rect x="14" y="5" width="5" height="5" rx="1"
                                    fill="#000000" opacity="0.3" />
                                <rect x="5" y="14" width="5" height="5" rx="1"
                                    fill="#000000" opacity="0.3" />
                                <rect x="14" y="14" width="5" height="5" rx="1"
                                    fill="#000000" opacity="0.3" />
                            </g>
                        </svg>
                    </span>
                    <!--end::Svg Icon-->
                </button>
                <!--begin::Menu 3-->
                <div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-800 menu-state-bg-light-primary fw-bold w-200px py-3"
                    data-kt-menu="true">
                    <!--begin::Heading-->
                    <div class="menu-item px-3">
                        <div class="menu-content text-muted pb-2 px-3 fs-7 text-uppercase">Payments</div>
                    </div>
                    <!--end::Heading-->
                    <!--begin::Menu item-->
                    <div class="menu-item px-3">
                        <a href="#" class="menu-link px-3">Create Invoice</a>
                    </div>
                    <!--end::Menu item-->
                    <!--begin::Menu item-->
                    <div class="menu-item px-3">
                        <a href="#" class="menu-link flex-stack px-3">Create Payment
                            <i class="fas fa-exclamation-circle ms-2 fs-7" data-bs-toggle="tooltip"
                                title="Specify a target name for future usage and reference"></i></a>
                    </div>
                    <!--end::Menu item-->
                    <!--begin::Menu item-->
                    <div class="menu-item px-3">
                        <a href="#" class="menu-link px-3">Generate Bill</a>
                    </div>
                    <!--end::Menu item-->
                    <!--begin::Menu item-->
                    <div class="menu-item px-3" data-kt-menu-trigger="hover" data-kt-menu-placement="right-end">
                        <a href="#" class="menu-link px-3">
                            <span class="menu-title">Subscription</span>
                            <span class="menu-arrow"></span>
                        </a>
                        <!--begin::Menu sub-->
                        <div class="menu-sub menu-sub-dropdown w-175px py-4">
                            <!--begin::Menu item-->
                            <div class="menu-item px-3">
                                <a href="#" class="menu-link px-3">Plans</a>
                            </div>
                            <!--end::Menu item-->
                            <!--begin::Menu item-->
                            <div class="menu-item px-3">
                                <a href="#" class="menu-link px-3">Billing</a>
                            </div>
                            <!--end::Menu item-->
                            <!--begin::Menu item-->
                            <div class="menu-item px-3">
                                <a href="#" class="menu-link px-3">Statements</a>
                            </div>
                            <!--end::Menu item-->
                            <!--begin::Menu separator-->
                            <div class="separator my-2"></div>
                            <!--end::Menu separator-->
                            <!--begin::Menu item-->
                            <div class="menu-item px-3">
                                <div class="menu-content px-3">
                                    <!--begin::Switch-->
                                    <label class="form-check form-switch form-check-custom form-check-solid">
                                        <!--begin::Input-->
                                        <input class="form-check-input w-30px h-20px" type="checkbox" value="1"
                                            checked="checked" name="notifications" />
                                        <!--end::Input-->
                                        <!--end::Label-->
                                        <span class="form-check-label text-muted fs-6">Recuring</span>
                                        <!--end::Label-->
                                    </label>
                                    <!--end::Switch-->
                                </div>
                            </div>
                            <!--end::Menu item-->
                        </div>
                        <!--end::Menu sub-->
                    </div>
                    <!--end::Menu item-->
                    <!--begin::Menu item-->
                    <div class="menu-item px-3 my-1">
                        <a href="#" class="menu-link px-3">Settings</a>
                    </div>
                    <!--end::Menu item-->
                </div>
                <!--end::Menu 3-->
                <!--end::Menu-->
            </div>
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
                    {{-- <div class="symbol symbol-40px symbol-circle me-4">
                        <img src="/assets/media/avatars/150-26.jpg" alt="">
                    </div> --}}
                    <!--end::Symbol-->
                    <!--begin::Title-->
                    <div class="ps-1 mb-1">
                        <a class="fs-5 text-gray-800 text-hover-primary fw-boldest">{{ $subject->subject_name }}</a>
                        <div class="text-gray-400 fw-bold">Total student : {{ $subject->total_student }}</div>
                    </div>
                    <!--end::Title-->
                </div>
                <!--end::Section-->
                <!--begin::Label-->
                <span class="badge rounded-pill fs-7 fw-boldest">
                    
                    <a href="{{ route('staff.attendance', $subject->id)}}" class="btn btn-success my-2">Manage Attendance</a>
                    <!--end::Button-->                           
                    <a href="{{ route('staff.test', $subject->id)}}" class="btn btn-danger my-2">Manage Quiz/Test</a>

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

@extends('back-layouts-staff/master')
@section('page', 'Profile')
@section('content')
    <!--begin::Content-->
    <div class="flex-lg-row-fluid ms-lg-10">
        @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif
        <!--begin::details View-->
        <div class="card mb-5 mb-xl-10" id="kt_profile_details_view">
            <!--begin::Card header-->
            <div class="card-header cursor-pointer">
                <!--begin::Card title-->
                <div class="card-title m-0">
                    <h3 class="fw-bolder m-0">Profile Details</h3>
                </div>
                <!--end::Card title-->
                <!--begin::Action-->
                <a href="#" class="btn btn-primary align-self-center" data-bs-toggle="modal"
                    data-bs-target="#kt_modal_edit_profile">Edit Profile</a>
                <!--end::Action-->
            </div>

            <!--begin::Card header-->
            <!--begin::Card body-->
            <div class="card-body p-9">
                <!--begin::Row-->
                <div class="row mb-7">
                    <!--begin::Label-->
                    <label class="col-lg-4 fw-bold text-muted">Full Name</label>
                    <!--end::Label-->
                    <!--begin::Col-->
                    <div class="col-lg-8">
                        <span class="fw-bolder fs-6 text-dark">{{ Auth::guard('staff')->user()->name }}</span>
                    </div>
                    <!--end::Col-->
                </div>
                <!--end::Row-->
                <!--begin::Input group-->
                <div class="row mb-7">
                    <!--begin::Label-->
                    <label class="col-lg-4 fw-bold text-muted">Contact Phone</label>
                    <!--end::Label-->
                    <!--begin::Col-->
                    <div class="col-lg-8 d-flex align-items-center">
                        <span class="fw-bolder fs-6 me-2">{{  Auth::guard('staff')->user()->phone_number }}</span>
                    </div>
                    <!--end::Col-->
                </div>
                <!--end::Input group-->
                <!--begin::Input group-->
                <div class="row mb-7">
                    <!--begin::Label-->
                    <label class="col-lg-4 fw-bold text-muted">Date of Birth</label>
                    <!--end::Label-->
                    <!--begin::Col-->
                    <div class="col-lg-8">
                        <span class="fw-bolder fs-6 text-dark">{{  Auth::guard('staff')->user()->dob }}</span>
                    </div>
                    <!--end::Col-->
                </div>
                <!--end::Input group-->

                <!--begin::Input group-->
                <div class="row mb-7">
                    <!--begin::Label-->
                    <label class="col-lg-4 fw-bold text-muted">Email</label>
                    <!--end::Label-->
                    <!--begin::Col-->
                    <div class="col-lg-8">
                        <span class="fw-bolder fs-6 text-dark">{{  Auth::guard('staff')->user()->email }}</span>
                    </div>
                    <!--end::Col-->
                </div>
                <!--end::Input group-->

                <!--begin::Input group-->
                <div class="row mb-7">
                    <!--begin::Label-->
                    <label class="col-lg-4 fw-bold text-muted">Address</label>
                    <!--end::Label-->
                    <!--begin::Col-->
                    <div class="col-lg-8">
                        <span class="fw-bolder fs-6 text-dark">{{  Auth::guard('staff')->user()->address }}</span>
                    </div>
                    <!--end::Col-->
                </div>
                <!--end::Input group-->

            </div>

            <!--end::Card body-->
        </div>
        <!--end::details View-->

    </div>
    <!--end::Content-->
@endsection

@section('update-profile')
		<!--begin::Modal - Edit Profile-->
		<div class="modal fade" id="kt_modal_edit_profile" tabindex="-1" aria-hidden="true">
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
                        <form action="{{ route('staff.update.profile') }}" method="POST">
                            @csrf
                            <!--begin::Heading-->
                            <div class="text-center mb-13">
                                <!--begin::Title-->
                                <h1 class="mb-3">Update your profile</h1>
                                <!--end::Title-->
                            </div>
                            <!--end::Heading-->
                            <div class="separator d-flex flex-center mb-8">
                            </div>
                            <!--start::Input fills-->
                            <label for="form-control">Full Name : </label>
                            <input class="form-control form-control-solid mb-8" name="name" value="{{ Auth::guard('staff')->user()->name  }}" placeholder="Enter your full name">
                            <!--end::Input fills-->

                            <!--start::Input fills-->
                            <label for="form-control">Phone number : </label>
                            <input class="form-control form-control-solid mb-8" name="phone_number" value="{{ Auth::guard('staff')->user()->phone_number  }}" placeholder="Enter your phone number">
                            <!--end::Input fills-->
    
                            <!--start::Input fills-->
                            <label for="form-control">Date of birth : </label>
                            <input class="form-control form-control-solid mb-8" type="date" name="dob" value="{{ Auth::guard('staff')->user()->dob  }}" placeholder="Enter date of birth">
                            <!--end::Input fills-->
    
                            <!--start::Input fills-->
                            <label for="form-control">Address: </label>
                            <input class="form-control form-control-solid mb-8" name="address" value="{{ Auth::guard('staff')->user()->address  }}"placeholder="Enter your address">
                            <!--end::Input fills-->
    
    
                            <!--begin::Wrapper-->
                            <div class="float-end">
                                <button type="submit" class="btn btn-lg btn-light-primary">Save</button>
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
		<!--end::Modal - Edit Profile-->
@endsection

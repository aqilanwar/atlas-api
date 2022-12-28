@extends('back-layouts/unverified')
@section('page' , 'Courses')

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
                                                    <input type="text" class="form-control form-control-lg form-control-solid" name="name" placeholder="" value="" />
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
                                                    <input type="text" class="form-control form-control-lg form-control-solid" name="name" placeholder="" value="" />
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
                                                    <input type="date" class="form-control form-control-lg form-control-solid" name="name" placeholder="" value="" />
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
                                                    <input type="text" class="form-control form-control-lg form-control-solid" data-inputmask-mask="+609999999999" name="name" placeholder="" value="" />
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
                                                    <input type="text" class="form-control form-control-lg form-control-solid" name="name" placeholder="" value="" />
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
                                                    <input type="text" class="form-control form-control-lg form-control-solid" name="name" placeholder="" value="" />
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
                                                    <input type="text" class="form-control form-control-lg form-control-solid" name="name"  data-inputmask-mask="+609999999999" placeholder="" value="" />
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
                                                    <input type="text" class="form-control form-control-lg form-control-solid" name="name" placeholder="" value="" />
                                                    <!--end::Input-->
												</div>
												<!--end::Col-->
											</div>
											<!--end::Row-->
                                            <button type="button" class="btn btn-lg btn-primary float-end" data-kt-stepper-action="next">Continue
                                                <!--begin::Svg Icon | path: icons/duotune/arrows/arr064.svg-->
                                                <span class="svg-icon svg-icon-3 ms-1 me-0">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                                        <rect opacity="0.5" x="18" y="13" width="13" height="2" rx="1" transform="rotate(-180 18 13)" fill="black" />
                                                        <path d="M15.4343 12.5657L11.25 16.75C10.8358 17.1642 10.8358 17.8358 11.25 18.25C11.6642 18.6642 12.3358 18.6642 12.75 18.25L18.2929 12.7071C18.6834 12.3166 18.6834 11.6834 18.2929 11.2929L12.75 5.75C12.3358 5.33579 11.6642 5.33579 11.25 5.75C10.8358 6.16421 10.8358 6.83579 11.25 7.25L15.4343 11.4343C15.7467 11.7467 15.7467 12.2533 15.4343 12.5657Z" fill="black" />
                                                    </svg>
                                                </span>
                                                <!--end::Svg Icon--></button>

										</div>
										<!--end::Card body-->
									</div>
									<!--end::details View-->

								</div>
								<!--end::Content-->   
@endsection
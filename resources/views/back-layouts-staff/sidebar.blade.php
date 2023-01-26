								<!--begin::Sidebar-->
								<div class="flex-column flex-lg-row-auto w-100 w-xl-325px mb-10">
									<!--begin::Card-->
									<div class="card card-flush" data-kt-sticky="true" data-kt-sticky-name="account-navbar" data-kt-sticky-offset="{default: false, xl: '80px'}" data-kt-sticky-width="{lg: '250px', xl: '325px'}" data-kt-sticky-left="auto" data-kt-sticky-top="90px" data-kt-sticky-animation="false" data-kt-sticky-zindex="95">
										<!--begin::Card header-->
										<div class="card-header justify-content-end">
	
										</div>
										<!--end::Card header-->
										<!--begin::Card body-->
										<div class="card-body pt-0 p-10">
											<!--begin::Summary-->
											<div class="d-flex flex-center flex-column mb-10">
												<!--begin::Avatar-->
												<div class="symbol mb-3 symbol-100px symbol-circle">
													<img alt="Pic" src="{{ asset('back-assets/media/profile-pic/default.jpg') }}" />
												</div>
												<!--end::Avatar-->
												<!--begin::Name-->
												<a href="#" class="fs-2 text-gray-800 text-hover-primary fw-bolder mb-1">{{ Auth::guard('staff')->user()->name }}</a>
												<!--end::Name-->
												<!--begin::Position-->
												@if(Auth::guard('staff')->user()->is_admin == 0)
												<div class="fs-6 fw-bold text-gray-400 mb-2">Teacher</div>
												@else
												<div class="fs-6 fw-bold text-gray-400 mb-2">Admin</div>

												@endif
												<!--end::Position-->
												<!--begin::Actions-->
												{{-- <div class="d-flex flex-center">
													<a href="#" class="btn btn-sm btn-light-primary py-2 px-4 fw-bolder me-2" data-kt-drawer-show="true" data-kt-drawer-target="#kt_drawer_chat">Update profile picture</a>
												</div> --}}
												<!--end::Actions-->
											</div>
											<!--end::Summary-->
											<!--begin::Menu-->
											<ul class="menu menu-column menu-pill menu-title-gray-700 menu-bullet-gray-300 menu-state-bg menu-state-bullet-primary fw-bolder fs-5 mb-10">
												<!--begin::Menu item-->

												@if(Auth::guard('staff')->user()->is_admin == 0)
													<li class="menu-item mb-1">
														<!--begin::Menu link-->
														<a class="menu-link px-6 py-4 {{ Route::is('staff.profile') ? 'active' : '' }}" href="{{ route('staff.profile')}}">
															<span class="menu-bullet">
																<span class="bullet"></span>
															</span>
															<span class="menu-title">Profile</span>
														</a>
														<!--end::Menu link-->
													</li>
													<!--end::Menu item-->
													<!--begin::Menu item-->
													<li class="menu-item mb-1">
														<!--begin::Menu link-->
														<a class="menu-link px-6 py-4 {{ Route::is('staff.courses' , 'staff.attendance' , 'staff.view.attendance' ,'staff.test' , 'staff.view.test' ) ? 'active' : '' }}" href="{{ route('staff.courses')}}">
															<span class="menu-bullet">
																<span class="bullet"></span>
															</span>
															<span class="menu-title">Courses</span>
														</a>
														<!--end::Menu link-->
													</li>
													<!--end::Menu item-->
													<!--begin::Menu item-->
													<li class="menu-item mb-1">
														<!--begin::Menu link-->
														<a class="menu-link px-6 py-4 {{ Route::is('staff.timetable') ? 'active' : '' }}" href="{{ route('staff.timetable')}}">
															<span class="menu-bullet">
																<span class="bullet"></span>
															</span>
															<span class="menu-title">Timetable</span>
														</a>
														<!--end::Menu link-->
													</li>
													<!--end::Menu item-->
												@else

												<li class="menu-item mb-1">
													<!--begin::Menu link-->
													<a class="menu-link px-6 py-4 {{ Route::is('staff.profile') ? 'active' : '' }}" href="{{ route('staff.profile')}}">
														<span class="menu-bullet">
															<span class="bullet"></span>
														</span>
														<span class="menu-title">Profile</span>
													</a>
													<!--end::Menu link-->
												</li>
												<!--end::Menu item-->
												<!--begin::Menu item-->
												<li class="menu-item mb-1">
													<!--begin::Menu link-->
													<a class="menu-link px-6 py-4 {{ Route::is('admin.courses' , 'admin.view.courses') ? 'active' : '' }}" href="{{ route('admin.courses')}}">
														<span class="menu-bullet">
															<span class="bullet"></span>
														</span>
														<span class="menu-title">Manage Courses</span>
													</a>
													<!--end::Menu link-->
												</li>
												<!--end::Menu item-->
												<!--begin::Menu item-->
												<li class="menu-item mb-1">
													<!--begin::Menu link-->
													<a class="menu-link px-6 py-4 {{ Route::is('admin.teacher') ? 'active' : '' }}" href="{{ route('admin.teacher')}}">
														<span class="menu-bullet">
															<span class="bullet"></span>
														</span>
														<span class="menu-title">Manage Teacher</span>
													</a>
													<!--end::Menu link-->
												</li>
												<!--end::Menu item-->

												<!--begin::Menu item-->
												<li class="menu-item mb-1">
													<!--begin::Menu link-->
													<a class="menu-link px-6 py-4 {{ Route::is('admin.payment' ,'admin.payment.title') ? 'active' : '' }}" href="{{ route('admin.payment')}}">
														<span class="menu-bullet">
															<span class="bullet"></span>
														</span>
														<span class="menu-title">Manage Payment</span>
													</a>
													<!--end::Menu link-->
												</li>
												<!--end::Menu item-->

												<!--begin::Menu item-->
												<li class="menu-item mb-1">
													<!--begin::Menu link-->
													<a class="menu-link px-6 py-4 {{ Route::is('admin.student') ? 'active' : '' }}" href="{{ route('admin.student')}}">
														<span class="menu-bullet">
															<span class="bullet"></span>
														</span>
														<span class="menu-title">Manage Student</span>
													</a>
													<!--end::Menu link-->
												</li>
												<!--end::Menu item-->

												@endif
											</ul>
											<!--end::Menu-->
										</div>
										<!--end::Card body-->
									</div>
									<!--end::Card-->
								</div>
								<!--end::Sidebar-->
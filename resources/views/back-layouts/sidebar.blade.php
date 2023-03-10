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
													<img alt="Pic" src="{{ asset('back-assets/media/profile-pic/default.jpg')  }}" />
												</div>
												<!--end::Avatar-->
												<!--begin::Name-->
												<a href="#" class="fs-2 text-gray-800 text-hover-primary fw-bolder mb-1">{{ Auth::user()->name }}</a>
												<!--end::Name-->
												<!--begin::Position-->

												<div class="fs-6 fw-bold text-gray-400 mb-2">Student</div>
												<!--end::Position-->
							
											</div>
											<!--end::Summary-->
											<!--begin::Menu-->
											<ul class="menu menu-column menu-pill menu-title-gray-700 menu-bullet-gray-300 menu-state-bg menu-state-bullet-primary fw-bolder fs-5 mb-10">
												<!--begin::Menu item-->
												<li class="menu-item mb-1">
													<!--begin::Menu link-->
													<a class="menu-link px-6 py-4 {{ Route::is('profile') ? 'active' : '' }}" href="{{ route('profile')}}">
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
													<a class="menu-link px-6 py-4 {{ Route::is('courses' ,'courses-attendance' ,'courses-test') ? 'active' : '' }}" href="{{ route('courses')}}">
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
													<a class="menu-link px-6 py-4 {{ Route::is('timetable') ? 'active' : '' }}" href="{{ route('timetable') }}">
														<span class="menu-bullet">
															<span class="bullet"></span>
														</span>
														<span class="menu-title">Timetable</span>
													</a>
													<!--end::Menu link-->
												</li>
												<!--end::Menu item-->
												<!--begin::Menu item-->
												<li class="menu-item mb-1">
													<!--begin::Menu link-->
													<a class="menu-link px-6 py-4 {{ Route::is('payment') ? 'active' : '' }}" href="{{ route('payment') }}">
														<span class="menu-bullet">
															<span class="bullet"></span>
														</span>
														<span class="menu-title">Payment</span>
													</a>
													<!--end::Menu link-->
												</li>
												<!--end::Menu item-->
		
											</ul>
											<!--end::Menu-->
										</div>
										<!--end::Card body-->
									</div>
									<!--end::Card-->
								</div>
								<!--end::Sidebar-->
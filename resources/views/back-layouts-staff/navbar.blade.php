
    <!--begin::Header-->
    <div id="kt_header" class="header align-items-stretch" data-kt-sticky="true" data-kt-sticky-name="header"
        data-kt-sticky-offset="{default: '200px', lg: '300px'}">
        <!--begin::Container-->
        <div class="container-xxl d-flex align-items-center">
            <!--begin::Heaeder menu toggle-->
            <div class="d-flex align-items-center d-lg-none ms-n2 me-3" title="Show aside menu">
                <div class="btn btn-icon btn-custom w-30px h-30px w-md-40px h-md-40px" id="kt_header_menu_mobile_toggle">
                    <!--begin::Svg Icon | path: icons/duotune/abstract/abs015.svg-->
                    <span class="svg-icon svg-icon-2x">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                            fill="none">
                            <path
                                d="M21 7H3C2.4 7 2 6.6 2 6V4C2 3.4 2.4 3 3 3H21C21.6 3 22 3.4 22 4V6C22 6.6 21.6 7 21 7Z"
                                fill="black" />
                            <path opacity="0.3"
                                d="M21 14H3C2.4 14 2 13.6 2 13V11C2 10.4 2.4 10 3 10H21C21.6 10 22 10.4 22 11V13C22 13.6 21.6 14 21 14ZM22 20V18C22 17.4 21.6 17 21 17H3C2.4 17 2 17.4 2 18V20C2 20.6 2.4 21 3 21H21C21.6 21 22 20.6 22 20Z"
                                fill="black" />
                        </svg>
                    </span>
                    <!--end::Svg Icon-->
                </div>
            </div>
            <!--end::Heaeder menu toggle-->
            <!--begin::Header Logo-->
            <div class="header-logo me-5 me-md-10 flex-grow-1 flex-lg-grow-0">
                <a href="{{ route('staff.profile') }}">
                    <img alt="Logo" src="{{ asset('assets/img/logo.png') }}" class="h-15px h-lg-50px" />
                </a>
            </div>
            <!--end::Header Logo-->
            <!--begin::Wrapper-->
            <div class="d-flex align-items-stretch justify-content-between flex-lg-grow-1">
                <!--begin::Navbar-->
                <div class="d-flex align-items-stretch" id="kt_header_nav">
                </div>
                <!--end::Navbar-->
                <!--begin::Topbar-->
                <div class="d-flex align-items-stretch flex-shrink-0">
                    <!--begin::Toolbar wrapper-->
                    <div class="topbar d-flex align-items-stretch flex-shrink-0">
                        <!--begin::User-->
                        <div class="d-flex align-items-center ms-1 ms-lg-3" id="kt_header_user_menu_toggle">
                            <!--begin::Menu wrapper-->
                            <div class="cursor-pointer symbol symbol-30px symbol-md-40px" data-kt-menu-trigger="click"
                                data-kt-menu-attach="parent" data-kt-menu-placement="bottom-end">
                                <img alt="Pic" src="{{ asset('back-assets/media/profile-pic/default.jpg')  }}" />
                            </div>
                            <!--begin::Menu-->
                            <div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-800 menu-state-bg menu-state-primary fw-bold py-4 fs-6 w-275px"
                                data-kt-menu="true">
                                <!--begin::Menu item-->
                                <div class="menu-item px-3">
                                    <div class="menu-content d-flex align-items-center px-3">
                                        <!--begin::Avatar-->
                                        <div class="symbol symbol-50px me-5">
                                            <img alt="Logo"
                                                src="{{ asset('back-assets/media/profile-pic/default.jpg') }}" />
                                        </div>
                                        <!--end::Avatar-->
                                        <!--begin::Username-->
                                        <div class="d-flex flex-column">
                                            <div class="fw-bolder d-flex align-items-center fs-5">{{ Auth::guard('staff')->user()->name }}</div>
                                                                                     
                                            <a href="#"
                                                class="fw-bold text-muted text-hover-primary fs-7">{{ Auth::guard('staff')->user()->email }}</a>
                                        </div>
                                        <!--end::Username-->
                                    </div>
                                </div>
                                <!--end::Menu item-->
                                <!--begin::Menu separator-->
                                <div class="separator my-2"></div>
                                <!--end::Menu separator-->
                                <!--begin::Menu item-->
                                <div class="menu-item px-5">
                                    <a href="{{ route('staff.profile') }}" class="menu-link px-5">Profile</a>
                                </div>
                                <!--end::Menu item-->
                   
                                <!--begin::Menu item-->
                                <div class="menu-item px-5">
                                    <a href="{{ route('staff.logout') }}" class="menu-link px-5">Sign Out</a>
                                </div>
                                <!--end::Menu item-->

                            </div>
                            <!--end::Menu-->
                            <!--end::Menu wrapper-->
                        </div>
                        <!--end::User -->
                        <!--begin::Aside mobile toggle-->
                        <!--end::Aside mobile toggle-->
                    </div>
                    <!--end::Toolbar wrapper-->
                </div>
                <!--end::Topbar-->
            </div>
            <!--end::Wrapper-->
        </div>
        <!--end::Container-->
    </div>
    <!--end::Header-->

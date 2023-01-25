@extends('back-layouts-staff/master')
@section('page', 'Courses')
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

    <!--begin::List Widget 4-->
    <div class="card mb-5 mb-xl-10">
        <!--begin::Header-->
        <div class="card-header align-items-center border-0 mt-5">
            <h3 class="card-title align-items-start flex-column">
                <span class="fw-bolder text-dark fs-2"> <a href="{{ route('staff.courses') }}">Courses</a></span>
                <span class="text-gray-400 mt-2 fw-bold fs-6">List of all courses available </span>
            </h3>
            <div class="card-toolbar">
                <!--begin::Menu-->
                <a href="#" class="btn btn-primary align-self-center" data-bs-toggle="modal"
                    data-bs-target="#kt_modal_edit_profile">+ Add new course</a>
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
                    <div class="symbol symbol-40px symbol-circle me-4">
                        <img src="/assets/media/avatars/150-26.jpg" alt="">
                    </div>
                    <!--end::Symbol-->
                    <!--begin::Title-->
                    <div class="ps-1 mb-1">
                        <a class="fs-5 text-gray-800 text-hover-primary fw-boldest">{{ $subject->subject_name }}</a>
                        <div class="text-gray-400 fw-bold">Teacher : {{ $subject->name }}</div>
                        <div class="text-gray-400 fw-bold">Total student : {{ $subject->total_student }}</div>
                    </div>
                    <!--end::Title-->
                </div>
                <!--end::Section-->
                <!--begin::Label-->
                <span class="badge rounded-pill fs-7 fw-boldest">
                    
                    <a href="{{ route('admin.view.courses' , $subject->id) }}" class="btn btn-success my-2">Manage Course</a>
                    <!--end::Button-->                           
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
                        <form action="{{ route('admin.create.courses') }}" method="POST">
                            @csrf
                            <!--begin::Heading-->
                            <div class="text-center mb-13">
                                <!--begin::Title-->
                                <h1 class="mb-3">Create new course</h1>
                                <!--end::Title-->
                            </div>
                            <!--end::Heading-->
                            <div class="separator d-flex flex-center mb-8">
                            </div>
                            <!--start::Input fills-->
                            <label for="form-control">Name: </label>
                            <input class="form-control form-control-solid mb-8" name="name" value="" placeholder="Enter course name" required>
                            <!--end::Input fills-->
    
                            <!--start::Input fills-->
                            <label for="form-control">Price : </label>
                            <input class="form-control form-control-solid mb-8" name="price" value="" placeholder="Enter price (RM)" required>
                            <!--end::Input fills-->
    
                            <!--start::Input fills-->
                            <label for="form-control">Time : </label>
                            <select name="time" class="form-select form-control-solid mb-8" required>
                                <option value="">Select Time</option>
                                <option value="08:00 AM - 10:00 AM">08:00 AM - 10:00 AM</option>
                                <option value="10:00 AM - 12:00 PM">10:00 AM - 12:00 PM</option>
                                <option value="12:00 PM - 02:00 PM">12:00 PM - 02:00 PM</option>
                                <option value="02:00 PM - 04:00 PM">02:00 PM - 04:00 PM</option>
                                <option value="04:00 PM - 06:00 PM">04:00 PM - 06:00 PM</option>
                                <option value="06:00 PM - 08:00 PM">06:00 PM - 08:00 PM</option>
                                <option value="08:00 PM - 10:00 PM">08:00 PM - 10:00 PM</option>
                                <option value="10:00 PM - 12:00 AM">10:00 PM - 12:00 AM</option>
                            </select>                            
                            <!--end::Input fills-->

                            <!--start::Input fills-->
                            <label for="form-control">Day : </label>
                            <select name="day" class="form-select form-control-solid mb-8" required>
                                <option value="">Select Day</option>
                                <option value="Sunday">Sunday</option>
                                <option value="Monday">Monday</option>
                                <option value="Tuesday">Tuesday</option>
                                <option value="Wednesday">Wednesday</option>
                                <option value="Thursday">Thursday</option>
                                <option value="Friday">Friday</option>
                                <option value="Saturday">Saturday</option>
                            </select>                            
                            <!--end::Input fills-->

                            <!--start::Input fills-->
                            <label for="form-control">Select Teacher : </label>
                            <select name="teacher_id" class="form-select form-control-solid mb-8" required>
                                <option value="">Select Teacher</option>
                                @foreach  ($teachers as $teacher)
                                    <option value="{{ $teacher->id }}">{{ $teacher->name }} - {{ $teacher->email }}</option>
                                @endforeach
                            </select>                            
                            <!--end::Input fills-->
    
                            
                            <!--begin::Wrapper-->
                            <div class="float-end">
                                <button type="submit" class="btn btn-lg btn-light-primary">Create</button>
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

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

        {{-- <div class="alert alert-danger" role="alert">
            This is a danger alert with <a href="#" class="alert-link">an example link</a>. Give it a click if you like.
          </div> --}}
        <!--begin::Table Widget 1-->
        <div class="card mb-5 mb-xl-10">
            <!--begin::Header-->
            <div class="card-header border-0 pt-5 pb-3">
                <!--begin::Card title-->
                <h3 class="card-title align-items-start flex-column">
                    <span class="fw-bolder text-dark fs-2"> <a href="{{ route('admin.courses') }}">Courses</a></span>
                    <span class="text-gray-400 mt-2 fw-bold fs-6">
                        <a >Courses</a> 
                        /
                        <a>{{ $subject->name }}</a> 
                    </span>
                    </span>
                </h3>

                <!--end::Card title-->
                <!--begin::Action-->
                <div class="card-toolbar">
                    <a href="#" class="btn btn-danger align-self-center m-3" data-bs-toggle="modal"
                        data-bs-target="#delete_course">Delete Course</a>
                    <!--begin::Menu-->
                    <a href="#" class="btn btn-primary align-self-center" data-bs-toggle="modal"
                        data-bs-target="#kt_modal_edit_profile">Update Course</a>
                    <!--end::Menu-->
                </div>
                <!--end::Action-->
            </div>
            <!--end::Header-->
            <!--begin::Body-->
            <div class="card-body py-0">
                <h4>Teacher Detail</h4>
                <!--begin::Table-->
                <div class="table-responsive">
                    <table class="table align-middle table-row-bordered table-row-dashed gy-5 table-hover" id="kt_table_widget_1">
                        <!--begin::Table body-->
                        <tbody>
                            <!--begin::Table row-->
                            <tr class="text-start text-gray-400 fw-boldest fs-7 text-uppercase">
                                <th class="text-start px-0">No</th>
                                <th class="min-w-200px px-0">Name</th>
                                <th class="min-w-200px px-0">Phone Number</th>
                            </tr>
                            <!--end::Table row-->

                            <tr>    
                                <!--begin::Author=-->
                                <td class="p-0">
                                    <a 
                                    class="text-gray-800 fw-boldest fs-5 text-hover-primary mb-1">
                                        1.
                                    </a>
                                </td>
                                <!--end::Author=-->
                                <!--begin::Progress=-->
                                <td>
                                    <a class="text-gray-800 fw-boldest fs-5 text-hover-primary mb-1">
                                            {{ $teachers->name}} </a>
                                </td>
                                <td>
                                    <a class="text-gray-800 fw-boldest fs-5 text-hover-primary mb-1">
                                            {{ $teachers->phone_number}} </a>
                                </td>
                            </tr>
                            <!--begin::Table row-->
                            <!--end::Table row-->
                        </tbody>
                        <!--end::Table body-->
                    </table>

                    <table class="table align-middle table-row-bordered table-row-dashed gy-5 table-hover mt-3" id="kt_table_widget_1">
                        <!--begin::Table body-->
                        <h4>Student Detail</h4>
                        <tbody>
                            
                            <!--begin::Table row-->
                            <tr class="text-start text-gray-400 fw-boldest fs-7 text-uppercase">
                                <th class="min-w-200px px-0">No.</th>
                                <th class="min-w-200px px-0">Name</th>
                                <th class="min-w-200px px-0">Phone Number</th>
                            </tr>
                            <!--end::Table row-->
                            @foreach ($students as $key=>$student)                                
                            <tr>
                                <!--begin::Author=-->
                                <td class="p-0">
                                    <div class="d-flex align-items-center">
                                        <div class="ps-3">
                                            <a 
                                                class="text-gray-800 fw-boldest fs-5 text-hover-primary mb-1">
                                                {{ $students->firstItem() + $key }}.
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
                                            {{ $student->name}}
                                        </a>
                                    </div>
                                </td>
                                <td>
                                    <div class="ps-3">
                                        <a 
                                            class="text-gray-800 fw-boldest fs-5 text-hover-primary mb-1">
                                            {{ $student->phone_number}}
                                        </a>                                  
                                    </div>
                                </td>
                            </tr>
                            @endforeach
                            <!--begin::Table row-->
                            <!--end::Table row-->
                        </tbody>
                        <!--end::Table body-->
                    </table>
                    <div class="card-footer">
                        {{ $students->links() }}
                    </div>

                </div>
                <!--end::Table-->
            </div>
            <!--end::Body-->
        </div>
        <!--end::Table Widget 1-->

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
                        <form action="{{ route('admin.update.courses') }}" method="POST">
                            @csrf
                            <!--begin::Heading-->
                            <div class="text-center mb-13">
                                <!--begin::Title-->
                                <h1 class="mb-3">Update course</h1>
                                <!--end::Title-->
                            </div>
                            <!--end::Heading-->
                            <div class="separator d-flex flex-center mb-8">
                            </div>
                            <!--start::Input fills-->
                            <input type="hidden" name="sub" value="{{ $subject->id }}">
                            <label for="form-control">Name: </label>
                            <input class="form-control form-control-solid mb-8" name="name" value="{{ $subject->name }}" placeholder="Enter course name" required>
                            <!--end::Input fills-->
    
                            <!--start::Input fills-->
                            <label for="form-control">Price : </label>
                            <input class="form-control form-control-solid mb-8" name="price" value="{{ $subject->price }}" placeholder="Enter price (RM)" required>
                            <!--end::Input fills-->
    
                            <!--start::Input fills-->
                            <label for="form-control">Time : </label>
                            <select name="time" class="form-select form-control-solid mb-8" required>
                                <option value="">Select Time</option>
                                <option value="08:00 AM - 10:00 AM" {{ $subject->time == "08:00 AM - 10:00 AM" ? 'selected' : '' }}>08:00 AM - 10:00 AM</option>
                                <option value="10:00 AM - 12:00 PM" {{ $subject->time == "10:00 AM - 12:00 PM" ? 'selected' : '' }}>10:00 AM - 12:00 PM</option>
                                <option value="12:00 PM - 02:00 PM" {{ $subject->time == "12:00 PM - 02:00 PM" ? 'selected' : '' }}>12:00 PM - 02:00 PM</option>
                                <option value="02:00 PM - 04:00 PM" {{ $subject->time == "02:00 PM - 04:00 PM" ? 'selected' : '' }}>02:00 PM - 04:00 PM</option>
                                <option value="04:00 PM - 06:00 PM" {{ $subject->time == "04:00 PM - 06:00 PM" ? 'selected' : '' }}>04:00 PM - 06:00 PM</option>
                                <option value="06:00 PM - 08:00 PM" {{ $subject->time == "06:00 PM - 08:00 PM" ? 'selected' : '' }}>06:00 PM - 08:00 PM</option>
                                <option value="08:00 PM - 10:00 PM" {{ $subject->time == "08:00 PM - 10:00 PM" ? 'selected' : '' }}>08:00 PM - 10:00 PM</option>
                                <option value="10:00 PM - 12:00 AM" {{ $subject->time == "10:00 PM - 12:00 AM" ? 'selected' : '' }}>10:00 PM - 12:00 AM</option>
                            </select>                            
                            <!--end::Input fills-->

                            <!--start::Input fills-->
                            <label for="form-control">Day : </label>
                            <select name="day" class="form-select form-control-solid mb-8" required>
                                <option value="">Select Day</option>
                                <option value="Sunday" {{ $subject->day == "Sunday" ? 'selected' : '' }}>Sunday</option>
                                <option value="Monday" {{ $subject->day == "Monday" ? 'selected' : '' }}>Monday</option>
                                <option value="Tuesday" {{ $subject->day == "Tuesday" ? 'selected' : '' }}>Tuesday</option>
                                <option value="Wednesday" {{ $subject->day == "Wednesday" ? 'selected' : '' }}>Wednesday</option>
                                <option value="Thursday" {{ $subject->day == "Thursday" ? 'selected' : '' }}>Thursday</option>
                                <option value="Friday" {{ $subject->day == "Friday" ? 'selected' : '' }}>Friday</option>
                                <option value="Saturday" {{ $subject->day == "Saturday" ? 'selected' : '' }}>Saturday</option>
                            </select>                           
                            <!--end::Input fills-->

                            <!--start::Input fills-->
                            <label for="form-control">Select Teacher : </label>
                            <select name="teacher_id" class="form-select form-control-solid mb-8" required>
                                <option value="">Select Teacher</option>
                                @foreach($data as $item)
                                    <option value="{{ $item->id }}" {{ $item->id == $subject->teacher_id ? 'selected' : '' }}>{{ $item->name }} - {{ $item->email }}</option>
                                @endforeach
                            </select>                            
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
		<!--begin::Modal - Edit Profile-->
		<div class="modal fade" id="delete_course" tabindex="-1" aria-hidden="true">
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
                        <form action="{{ route('admin.delete.courses') }}" method="POST">
                            @csrf
                            <!--begin::Heading-->
                            <div class="text-center mb-13">
                                <!--begin::Title-->
                                <h1 class="mb-3">Delete course</h1>
                                <input type="hidden" name="sub" value="{{ $subject->id }}">
                                <!--end::Title-->
                            </div>
                            <h2 class="text-center text-danger">Are you sure to delete this course?</h2>
                            {{-- <h5 class="text-center text-danger">This will remove every student in this course and teacher.</h5> --}}
                            <!--begin::Wrapper-->
                            <br>
                            <br>

                            <div class="text-center mt-4">
                                <button type="submit" class="btn btn-lg btn-light-danger">Delete this course</button>
                            </div>
                            <div class="float-end">
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

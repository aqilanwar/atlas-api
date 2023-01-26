@extends('back-layouts-staff/master')
@section('page', 'Teacher')
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
        <!--begin::Table Widget 1-->
        <div class="card mb-5 mb-xl-10">
            <!--begin::Header-->
            <div class="card-header border-0 pt-5 pb-3">
                <!--begin::Card title-->
                <h3 class="card-title align-items-start flex-column">
                    <span class="fw-bolder text-dark fs-2">Manage Teacher</span>
                </h3>
                <a href="#" class="btn btn-primary align-self-center" data-bs-toggle="modal"
                data-bs-target="#create_teacher">+ Add new teacher</a>
                <!--end::Card title-->

            </div>
            <!--end::Header-->
            <!--begin::Body-->
            <div class="card-body py-0">
                
                @if($teachers->isEmpty())
                <div class="bg-grey">
                    <div class="text-center mt-3 mb-9 container">
                        <img src="{{ asset('back-assets/media/svg/empty.png') }}" style="width:40%" class="img-fluid">
                        <h1 class="mt-3 text-primary">Currently empty :( </h1>
                    </div>
                </div>
                @else
                <!--begin::Table-->
                <div class="table-responsive">
                    <table class="table align-middle table-row-bordered table-row-dashed gy-5 table-hover" id="kt_table_widget_1">
                        <!--begin::Table body-->
                        <tbody>
                            <!--begin::Table row-->
                            <tr class="text-start text-gray-400 fw-boldest fs-7 text-uppercase">
                                <th class="text-start px-0">No</th>
                                <th class="min-w-200px px-0">Name</th>
                                <th class="min-w-125px">Email / Phone Number</th>
                                <th class="min-w-125px">Created At</th>
                                <th class="text-end pe-2 min-w-70px">Action</th>
                            </tr>
                            <!--end::Table row-->
                            <!--begin::Table row-->
                            @foreach ($teachers as $key=>$teacher)                               
                            <tr>
                                <!--begin::Author=-->
                                <td class="p-0">
                                    <div class="d-flex align-items-center">
                                        <div class="ps-3">
                                            <a 
                                                class="text-gray-800 fw-boldest fs-5 text-hover-primary mb-1">
                                                {{ $teachers->firstItem() + $key }}.
                                            </a>
                                            {{-- <span class="text-gray-400 fw-bold d-block">Bilik 199</span> --}}
                                        </div>
                                    </div>
                                </td>
                                <!--end::Author=-->
                                <!--begin::Progress=-->
                                <td >
                                    <div class="ps-3">
                                        <a 
                                            class="text-gray-800 fw-boldest fs-5 text-hover-primary mb-1">
                                            {{ $teacher->name }}
                                        </a>
                                        {{-- <span class="text-gray-400 fw-bold d-block">Bilik 199</span> --}}
                                    </div>
                                </td>
                                <td >
                                    <div class="ps-3">
                                        <a 
                                        class="text-gray-800 fw-boldest fs-5 text-hover-primary mb-1">
                                        {{-- {{ $test->title }} --}}
                                         {{ $teacher->email }}
                                    </a>
                                    <span class="text-gray-400 fw-bold d-block">
                                        {{ $teacher->phone_number }}
                                    </span>
                                    </div>
                                </td>
                                <td >
                                    <div class="ps-3">
                                        <a class="text-gray-800 fw-boldest fs-5 text-hover-primary mb-1">
                                            {{ date('d F Y', strtotime($teacher->created_at)) }}

                                        </a>
                                    </div>
                                </td>
                                <td>
                                    <a href="" data-bs-toggle="modal" data-bs-target="#delete_teacher_{{$teacher->id}}"  class="btn btn-danger align-self-center float-end">Remove</a>
                                </td>
                            </tr>
                            @endforeach
                            <!--end::Table row-->
                            
                            
                        </tbody>
                        <!--end::Table body-->
                    </table>

                    <div class="card-footer">
                        {{ $teachers->links() }}
                    </div>
                </div>
                <!--end::Table-->

                @endif
            </div>
            <!--end::Body-->
        </div>
        <!--end::Table Widget 1-->

    </div>
@endsection
@section('update-profile')
		<!--begin::Modal - Edit Profile-->
		<div class="modal fade" id="create_teacher" tabindex="-1" aria-hidden="true">
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
                        <form action="{{ route('admin.create.teacher') }}" method="POST">
                            @csrf
                            <!--begin::Heading-->
                            <div class="text-center mb-13">
                                <!--begin::Title-->
                                <h1 class="mb-3">Add new teacher</h1>
                                <!--end::Title-->
                            </div>
                            <!--end::Heading-->
                            <div class="separator d-flex flex-center mb-8">
                            </div>
                            <!--start::Input fills-->
                            <label for="form-control">Name: </label>
                            <input class="form-control form-control-solid mb-8" name="name" value="{{ old('name') }}" placeholder="Enter teacher name" required>
                            <!--end::Input fills-->
    
                            <!--start::Input fills-->
                            <label for="form-control">Email : </label>
                            <input class="form-control form-control-solid mb-8" name="email" type="email" value="{{ old('email') }}" placeholder="Enter email" required>
                            <!--end::Input fills-->
    
                            <!--start::Input fills-->
                            <label for="form-control">Phone Number : </label>
                            <input class="form-control form-control-solid mb-8" name="phone_number" value="{{ old('phone_number') }}" placeholder="Enter phone number" required>
                            <!--end::Input fills-->
    
                            <!--start::Input fills-->
                            <label for="form-control">Date of birth :  </label>
                            <input class="form-control form-control-solid mb-8" name="dob" type="date" value="{{ old('date') }}" placeholder="Enter date of birth" required>
                            <!--end::Input fills-->
    
                            <!--start::Input fills-->
                            <label for="form-control">Address :  </label>
                            <input class="form-control form-control-solid mb-8" name="address" value="{{ old('address') }}" placeholder="Enter address" required>
                            <!--end::Input fills-->
    
                            <!--start::Input fills-->
                            <label for="form-control">Teach course : </label>
                            <select name="time" class="form-select form-control-solid mb-8" required>
                                <option value="">Select Course</option>
                                @foreach ($subjects as $subject)
                                    <option value="{{ $subject->id }}">{{ $subject->name }} - [{{ $subject->day }}  {{ $subject->time }}]</option>
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
        		<!--begin::Modal - Edit Profile-->
                @foreach ($teachers as $teacher)            
                <div class="modal fade" id="delete_teacher_{{ $teacher->id }}" tabindex="-1" aria-hidden="true">
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
                                <form action="{{ route('admin.delete.teacher') }}" method="POST">
                                    @csrf
                                    <!--begin::Heading-->
                                    <div class="text-center mb-13">
                                        <!--begin::Title-->
                                        <h1 class="mb-3">Delete teacher</h1>
                                        <input type="hidden" name="teacher_id" value="{{ $teacher->id }}">
                                        <!--end::Title-->
                                    </div>
                                    <h2 class="text-center text-danger">Are you sure to remove this teacher?</h2>
                                    <div class="container p-5">
                                        <div class="row">
                                            <h3 class="text-right">
                                                Name : {{ $teacher->name }}
                                            </h3>
                                        </div>
                                        <div class="row">
                                            <h3 class="text-right">
                                                Email : {{ $teacher->email }}
                                            </h3>
                                        </div>
                                    </div>
                                    <br>
                                    <br>
        
                                    <div class="text-center">
                                        <button type="submit" class="btn btn-lg btn-light-danger">Delete this teacher</button>
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
                @endforeach
                <!--end::Modal - Edit Profile-->
@endsection



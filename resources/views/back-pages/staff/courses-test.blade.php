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
                    <span class="fw-bolder text-dark fs-2"> <a href="{{ route('staff.courses') }}">Courses</a></span>
                    <span class="text-gray-400 mt-2 fw-bold fs-6">
                        <a >Test</a> 
                        /
                        <a href="{{ route('staff.test' , $data->id) }}">{{ $data->name }}</a> 
                    </span>
                    </span>
                </h3>

                <!--end::Card title-->
                <!--begin::Action-->
                <a href="#" class="btn btn-primary align-self-center" data-bs-toggle="modal"
                    data-bs-target="#kt_modal_edit_profile">+ Create Test</a>
                <!--end::Action-->
            </div>
            <!--end::Header-->
            <!--begin::Body-->
            <div class="card-body py-0">
                <!--begin::Table-->
                <div class="table-responsive">
                    <table class="table align-middle table-row-bordered table-row-dashed gy-5 table-hover" id="kt_table_widget_1">
                        <!--begin::Table body-->
                        <tbody>
                            <!--begin::Table row-->
                            <tr class="text-start text-gray-400 fw-boldest fs-7 text-uppercase">
                                <th class="min-w-200px px-0">No.</th>
                                <th class="min-w-200px px-0">Title</th>
                                <th class="min-w-125px">Created at</th>
                                <th class="text-end pe-2 min-w-70px">Action</th>
                            </tr>
                            <!--end::Table row-->
                            <!--begin::Table row-->
                            @php
                                $i=1;
                            @endphp
                            @foreach ($tests as $test)                                
                            <tr>
                                <!--begin::Author=-->
                                <td class="p-0">
                                    <div class="d-flex align-items-center">
                                        <div class="ps-3">
                                            <a 
                                                class="text-gray-800 fw-boldest fs-5 text-hover-primary mb-1">
                                                {{ $i++ }}
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
                                            {{ $test->title}}
                                        </a>

                                    </div>
                                </td>
                                <td >
                                    <div class="ps-3">
                                        <a 
                                            class="text-gray-800 fw-boldest fs-5 text-hover-primary mb-1">
                                            {{ date('d F Y h:i a', strtotime($test->created_at)) }}
                                        </a>                                  
                                    </div>
                                </td>

                                <!--end::Company=-->

                                <td class="pe-0">
                                    <a href="{{ route('staff.view.test' , ['subject_id' => $data->id , 'test_id' => $test->id])}}" class="btn btn-primary align-self-center"
                                    >View</a>
                
                                </td>
                            </tr>
                            @endforeach
                            <!--end::Table row-->

                        </tbody>
                        <!--end::Table body-->
                    </table>
                </div>
                <!--end::Table-->
            </div>
            <!--end::Body-->
        </div>
        <!--end::Table Widget 1-->

    </div>
@endsection

@section('create-attendance')
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
                        <form action="{{ route('create-test') }}" method="POST">
                            @csrf
                            <!--begin::Heading-->
                            <div class="text-center mb-13">
                                <!--begin::Title-->
                                <h1 class="mb-3">Create Test</h1>
                                <!--end::Title-->
                            </div>
                            <!--end::Heading-->
                            <div class="separator d-flex flex-center mb-8">
                            </div>
                            <!--start::Input fills-->
                            <label for="form-control">Subject: </label>
                            <input class="form-control form-control-solid mb-8" name="subject_name" value="{{ $data->name }}" placeholder="Enter subject" readonly>
                            <input type="hidden" name="subject_id" value="{{ $data->id }}">
                            <!--end::Input fills-->

                            <label for="form-control">Title: </label>
                            <input class="form-control form-control-solid mb-8" name="title" value="{{ old('title') }}" placeholder="Enter title" required >
                            <!--end::Input fills-->
    
                            <!--begin::Wrapper-->
                            <div class="float-end">
                                <button type="submit" class="btn btn-lg btn-light-primary">Create Test</button>
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


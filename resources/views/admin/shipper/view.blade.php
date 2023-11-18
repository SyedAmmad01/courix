{{-- Extends layout --}}
@extends('layouts.admin')
@section('page_title', 'View Shipper')
{{-- Content --}}
@section('content')

    <div class="card-body">
        <div class="row p-4 bg-light" style="margin-left: 0.1rem; margin-right: 0.1rem;">
            <div class="card card-custom example example-compact w-100">
                <div class="card-body">
                    <div class="row p-4 bg-light">
                        <div class="card card-custom example example-compact w-100">
                            <div class="row">
                                <div class="col-12">
                                    <div class="d-md-flex justify-content-between">
                                        <div class="profile-header-img">
                                            <img id="imgEmpProfile" src="{{ asset('/user/user-photo.png') }}" alt=""
                                                width="150px;" height="150px;">
                                        </div>

                                        <div class="col-5">
                                            <h2 id="name" class="mt-0 m-b-10 text-black">{{ $shippers->company_name }}
                                            </h2>
                                            <p class="m-b-10 text-black"><i
                                                    class="fas fa-lg fa-fw fa-mobile-alt text-dark"></i><span
                                                    id="mobile_phone"
                                                    class="text-black f-s-14"></span>&nbsp;{{ $shippers->contact_office_1 }}
                                            </p>
                                            <p class="m-b-10 text-black"><i
                                                    class="fas fa-lg fa-fw fa-envelope text-dark"></i><span id="work_email"
                                                    class="text-black f-s-14"></span>
                                                &nbsp;{{ $shippers->shipper_email }}</p>
                                            <div>
                                                <a href="{{ route('admin.shipper.edit', ['id' => $shippers->id]) }}"
                                                    class="btn btn-warning btn-sm text-dark"><i
                                                        class="far fa-fw fa-edit text-dark"></i>
                                                    Edit Info</a>
                                            </div>
                                        </div>

                                        <div style="border-right: 1px dashed #333;">
                                        </div>

                                        &nbsp; &nbsp; &nbsp;
                                        <div class="col-5">
                                            <h4 id="" class="mt-0 m-b-10 text-black m-t-5">Shipper Code</h4>
                                            <p class="m-b-10 text-black"><i
                                                    class="fab fa-lg fa-fw fa-slack-hash text-dark"></i><span id=""
                                                    class="text-primary font-weight-bold f-s-14">&nbsp;{{ $shippers->shipper_code }}</span>
                                            </p>
                                        </div>
                                    </div>
                                </div>

                            </div>


                        </div>
                        <div class="container-fluid">
                            <div class="row">
                                <div class="col-12">
                                    <div class="card mb-3">
                                        <div class="card-body"
                                            style="background:linear-gradient(to bottom, #4d4d4d 0%, #f0c497 100%);">
                                            <div class="heading">
                                                <h2 class="card-title text-light text-center">
                                                    <strong>Basic Information</strong>
                                                </h2>
                                            </div>
                                            {{-- First Row Start --}}
                                            <div class="row mt-5 mb-5">
                                                <div class="col-xl-12">
                                                    <div class="card r border-0 sln-bg">
                                                        <div class="card-header f-w-600">
                                                            <h5>Shipper Information</h5>
                                                        </div>
                                                        <div class="card-body card-body custom-shadow bg-white custom-radius"
                                                            id="cont_personal_information">
                                                            <div class="row">
                                                                <div class="form-group col-3  m-b-10">
                                                                    <label
                                                                        class="text-lg-left col-lg-12 col-form-label">Company
                                                                        Name</label>
                                                                    <label id="driving_license"
                                                                        class="text-lg-left col-lg-12 col-form-label text-primary font-weight-bold p-t-0">{{ $shippers->company_name }}</label>
                                                                </div>
                                                                <div class="form-group col-3  m-b-10">
                                                                    <label
                                                                        class="text-lg-left col-lg-12 col-form-label">Owner/
                                                                        Manager Name</label>
                                                                    <label id="other_id"
                                                                        class="text-lg-left col-lg-12 col-form-label text-primary font-weight-bold p-t-0">{{ $shippers->manager_name }}</label>
                                                                </div>
                                                                <div class="form-group col-3  m-b-10">
                                                                    <label
                                                                        class="text-lg-left col-lg-12 col-form-label">Shipper
                                                                        Email</label>
                                                                    <label id="birthday"
                                                                        class="text-lg-left col-lg-12 col-form-label text-primary font-weight-bold p-t-0">{{ $shippers->shipper_email }}</label>
                                                                </div>
                                                                <div class="form-group col-3  m-b-10">
                                                                    <label
                                                                        class="text-lg-left col-lg-12 col-form-label">Contact
                                                                        Office 1</label>
                                                                    <label id="gender"
                                                                        class="text-lg-left col-lg-12 col-form-label text-primary font-weight-bold p-t-0">{{ $shippers->contact_office_1 }}</label>
                                                                </div>
                                                                <div class="form-group col-3  m-b-10">
                                                                    <label
                                                                        class="text-lg-left col-lg-12 col-form-label">Contact
                                                                        Office 2</label>
                                                                    <label id="nationality_Name"
                                                                        class="text-lg-left col-lg-12 col-form-label text-primary font-weight-bold p-t-0">{{ $shippers->contact_office_2 }}</label>
                                                                </div>
                                                                <div class="form-group col-3  m-b-10">
                                                                    <label
                                                                        class="text-lg-left col-lg-12 col-form-label">Trade
                                                                        License No</label>
                                                                    <label id="marital_status"
                                                                        class="text-lg-left col-lg-12 col-form-label text-primary font-weight-bold p-t-0">{{ $shippers->trade_license_no }}</label>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            {{-- First Row End --}}
                                            {{-- Second Row Start --}}
                                            <div class="row mt-5 mb-5">
                                                <div class="col-xl-12 m-t-30">
                                                    <div class="card  border-0 bg-orange-transparent-1">
                                                        <div class="card-header f-w-600">
                                                            <h5>Contact Person Information</h5>
                                                        </div>
                                                        @foreach ($contact_persons as $person)
                                                        <div id=""
                                                            class="card-body card-body custom-shadow bg-white custom-radius">
                                                            <div class="row">
                                                                <div class="form-group col-3  m-b-10">
                                                                    <label
                                                                        class="text-lg-left col-lg-12 col-form-label">Name</label>
                                                                    <label id=""
                                                                        class="text-lg-left col-lg-12 col-form-label text-primary font-weight-bold p-t-0">{{ $person->name}}</label>
                                                                </div>
                                                                <div class="form-group col-3  m-b-10">
                                                                    <label
                                                                        class="text-lg-left col-lg-12 col-form-label">Designation</label>
                                                                    <label id=""
                                                                        class="text-lg-left col-lg-12 col-form-label text-primary font-weight-bold p-t-0">{{ $person->designation}}</label>
                                                                </div>
                                                                <div class="form-group col-3  m-b-10">
                                                                    <label
                                                                        class="text-lg-left col-lg-12 col-form-label">Email</label>
                                                                    <label id=""
                                                                        class="text-lg-left col-lg-12 col-form-label text-primary font-weight-bold p-t-0">{{ $person->email}}</label>
                                                                </div>

                                                                <div class="form-group col-3  m-b-10">
                                                                    <label
                                                                        class="text-lg-left col-lg-12 col-form-label">Contact No 1</label>
                                                                    <label id=""
                                                                        class="text-lg-left col-lg-12 col-form-label text-primary font-weight-bold p-t-0">{{ $person->contactoffice1}}</label>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        @endforeach
                                                    </div>
                                                </div>
                                            </div>
                                            {{-- Secoond Row End --}}
                                            {{-- Third Row Start --}}
                                            <div class="row mt-5 mb-5">
                                                <div class="col-xl-12 m-t-30">
                                                    <div class="card  border-0 bg-orange-transparent-1">
                                                        <div class="card-header f-w-600">
                                                            <h5>Shipper's Driver Information</h5>
                                                        </div>
                                                        @if ($drivers == '')
                                                            <div id="cont_job_details"
                                                                class="card-body card-body custom-shadow bg-white custom-radius">
                                                                <div class="row">
                                                                    <div class="form-group col-3  m-b-10">
                                                                        <label
                                                                            class="text-lg-left col-lg-12 col-form-label">Name</label>
                                                                        <label id="job_title_Name"
                                                                            class="text-lg-left col-lg-12 col-form-label text-primary font-weight-bold p-t-0"></label>
                                                                    </div>
                                                                    <div class="form-group col-3  m-b-10">
                                                                        <label
                                                                            class="text-lg-left col-lg-12 col-form-label">Code</label>
                                                                        <label id="employment_status_Name"
                                                                            class="text-lg-left col-lg-12 col-form-label text-primary font-weight-bold p-t-0"></label>
                                                                        <label id="employment_status_Name"
                                                                            class="text-lg-left col-lg-12 col-form-label text-primary font-weight-bold p-t-0"></label>
                                                                    </div>
                                                                    <div class="form-group col-3  m-b-10">
                                                                        <label
                                                                            class="text-lg-left col-lg-12 col-form-label">Mobile</label>
                                                                        <label id="department_Name"
                                                                            class="text-lg-left col-lg-12 col-form-label text-primary font-weight-bold p-t-0"></label>
                                                                    </div>

                                                                    <div class="form-group col-3  m-b-10">
                                                                        <label
                                                                            class="text-lg-left col-lg-12 col-form-label">Zone</label>
                                                                        <label id="department_Name"
                                                                            class="text-lg-left col-lg-12 col-form-label text-primary font-weight-bold p-t-0"></label>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        @else
                                                            <div id="cont_job_details"
                                                                class="card-body card-body custom-shadow bg-white custom-radius">
                                                                <div class="row">
                                                                    <div class="form-group col-3  m-b-10">
                                                                        <label
                                                                            class="text-lg-left col-lg-12 col-form-label">Name</label>
                                                                        <label id="job_title_Name"
                                                                            class="text-lg-left col-lg-12 col-form-label text-primary font-weight-bold p-t-0">{{ $drivers->employee_name }}</label>
                                                                    </div>
                                                                    <div class="form-group col-3  m-b-10">
                                                                        <label
                                                                            class="text-lg-left col-lg-12 col-form-label">Code</label>
                                                                        <label id="employment_status_Name"
                                                                            class="text-lg-left col-lg-12 col-form-label text-primary font-weight-bold p-t-0"><a
                                                                                href="#">Driver :
                                                                            </a>{{ $drivers->driver_code }}</label>
                                                                        <label id="employment_status_Name"
                                                                            class="text-lg-left col-lg-12 col-form-label text-primary font-weight-bold p-t-0"><a
                                                                                href="#">Employee :
                                                                            </a>{{ $drivers->driver_code }}</label>
                                                                    </div>
                                                                    <div class="form-group col-3  m-b-10">
                                                                        <label
                                                                            class="text-lg-left col-lg-12 col-form-label">Mobile</label>
                                                                        <label id="department_Name"
                                                                            class="text-lg-left col-lg-12 col-form-label text-primary font-weight-bold p-t-0">{{ $drivers->employee_mobile }}</label>
                                                                    </div>

                                                                    <div class="form-group col-3  m-b-10">
                                                                        <label
                                                                            class="text-lg-left col-lg-12 col-form-label">Zone</label>
                                                                        <label id="department_Name"
                                                                            class="text-lg-left col-lg-12 col-form-label text-primary font-weight-bold p-t-0">{{ $drivers->zone_name }}</label>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        @endif

                                                    </div>
                                                </div>
                                            </div>
                                            {{-- Third Row End --}}
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>


@endsection

{{-- Scripts Section --}}
@section('page-scripts')
    <script src="{{ asset('js/pages/widgets.js') }}" type="text/javascript"></script>
@endsection

{{-- Extends layout --}}
@extends('layouts.admin')
@section('page_title', 'View Employee')
{{-- Content --}}
@section('content')
    <div class="card-body">
        <div class="row p-4 bg-light" style="margin-left: 0.1rem; margin-right: 0.1rem;">
            <div class="card card-custom example example-compact w-100">
                <div class="container mt-5 mb-5">
                    <div class="row">
                        <div class="col-12">
                            <div class="d-md-flex justify-content-between">
                                <div class="profile-header-img mb-3 mb-md-0">
                                    <img id="imgEmpProfile" src="{{ asset('/user/user-photo.png') }}" alt=""
                                        width="150px;" height="150px;">
                                </div>

                                <div class="col-5">
                                    <h2 id="name" class="mt-0 m-b-10 text-black">{{ $employees->emp_first_name }}
                                        {{ $employees->emp_middle_name }} {{ $employees->emp_last_name }}</h2>
                                    <p class="m-b-10 text-black"><i
                                            class="fas fa-lg fa-fw fa-mobile-alt text-dark"></i><span id="mobile_phone"
                                            class="text-black f-s-14"></span>&nbsp;{{ $employees->mobile }}</p>
                                    <p class="m-b-10 text-black"><i class="fas fa-lg fa-fw fa-envelope text-dark"></i><span
                                            id="work_email"
                                            class="text-black f-s-14"></span>&nbsp;{{ $employees->work_email }}</p>
                                    <div>
                                        <a href="{{ route('admin.employee.edit', ['id' => $employees->id]) }}"
                                            class="btn btn-warning btn-sm text-dark"><i
                                                class="far fa-fw fa-edit text-dark"></i>Edit Info</a>
                                    </div>
                                </div>

                                <div style="border-right: 1px dashed #333;">
                                </div>

                                &nbsp; &nbsp; &nbsp;
                                <div class="col-5">
                                    <h4 id="" class="mt-0 m-b-10 text-black m-t-5">Shipper Code</h4>
                                    <p class="m-b-10 text-black"><i
                                            class="fab fa-lg fa-fw fa-slack-hash text-dark"></i><span id=""
                                            class="text-primary font-weight-bold f-s-14">&nbsp;{{ $employees->emp_code }}</span>
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
                                <div class="card-body" style="background: linear-gradient(to bottom,#fa3 0,#e68600 100%);">
                                    <div class="heading">
                                        <h2 class="card-title text-dark text-center">
                                            <strong>Basic Information</strong>
                                        </h2>
                                    </div>
                                    {{-- First Row Start --}}
                                    <div class="row mt-5 mb-5">
                                        <div class="col-xl-12">
                                            <div class="card r border-0 sln-bg">
                                                <div class="card-header f-w-600">
                                                    <h3>Personal Information</h3>
                                                </div>
                                                <div class="card-body card-body custom-shadow bg-white custom-radius"
                                                    id="cont_personal_information">
                                                    <div class="row">
                                                        <div class="form-group col-3  m-b-10">
                                                            <label class="text-lg-left col-lg-12 col-form-label">Driving
                                                                License No</label>
                                                            <label id="driving_license"
                                                                class="text-lg-left col-lg-12 col-form-label text-primary font-weight-bold p-t-0">{{ $employees->driving_liscense_no }}</label>
                                                        </div>
                                                        <div class="form-group col-3  m-b-10">
                                                            <label class="text-lg-left col-lg-12 col-form-label">Other
                                                                ID</label>
                                                            <label id="other_id"
                                                                class="text-lg-left col-lg-12 col-form-label text-primary font-weight-bold p-t-0">{{ $employees->other_id }}</label>
                                                        </div>
                                                        <div class="form-group col-3  m-b-10">
                                                            <label class="text-lg-left col-lg-12 col-form-label">Date of
                                                                Birth</label>
                                                            <label id="birthday"
                                                                class="text-lg-left col-lg-12 col-form-label text-primary font-weight-bold p-t-0">{{ $employees->dob }}</label>
                                                        </div>
                                                        <div class="form-group col-3  m-b-10">
                                                            <label
                                                                class="text-lg-left col-lg-12 col-form-label">Gender</label>
                                                            <label id="gender"
                                                                class="text-lg-left col-lg-12 col-form-label text-primary font-weight-bold p-t-0">{{ $employees->gender }}</label>
                                                        </div>
                                                        <div class="form-group col-3  m-b-10">
                                                            <label
                                                                class="text-lg-left col-lg-12 col-form-label">Nationality</label>
                                                            <label id="nationality_Name"
                                                                class="text-lg-left col-lg-12 col-form-label text-primary font-weight-bold p-t-0">{{ $employees->nationality_name }}</label>
                                                        </div>
                                                        <div class="form-group col-3  m-b-10">
                                                            <label class="text-lg-left col-lg-12 col-form-label">Marital
                                                                Status</label>
                                                            <label id="marital_status"
                                                                class="text-lg-left col-lg-12 col-form-label text-primary font-weight-bold p-t-0">{{ $employees->marital_status }}</label>
                                                        </div>
                                                        <div class="form-group col-3  m-b-10">
                                                            <label class="text-lg-left col-lg-12 col-form-label">Joined
                                                                Date</label>
                                                            <label id="joined_date"
                                                                class="text-lg-left col-lg-12 col-form-label text-primary font-weight-bold p-t-0">{{ $employees->joined_date }}</label>
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
                                                    <h3>Contact Information</h3>
                                                </div>
                                                <div id="cont_contact_information"
                                                    class="card-body card-body custom-shadow bg-white custom-radius">
                                                    <div class="row">
                                                        <div class="form-group col-3  m-b-10">
                                                            <label class="text-lg-left col-lg-12 col-form-label">Address
                                                                Line 1</label>
                                                            <label id="address1"
                                                                class="text-lg-left col-lg-12 col-form-label text-primary font-weight-bold p-t-0">{{ $employees->address_line_1 }}</label>
                                                        </div>
                                                        <div class="form-group col-3  m-b-10">
                                                            <label class="text-lg-left col-lg-12 col-form-label">Address
                                                                Line 2</label>
                                                            <label id="address2"
                                                                class="text-lg-left col-lg-12 col-form-label text-primary font-weight-bold p-t-0">{{ $employees->address_line_2 }}</label>
                                                        </div>
                                                        <div class="form-group col-3  m-b-10">
                                                            <label
                                                                class="text-lg-left col-lg-12 col-form-label">City</label>
                                                            <label id="city"
                                                                class="text-lg-left col-lg-12 col-form-label text-primary font-weight-bold p-t-0">{{ $employees->city }}</label>
                                                        </div>
                                                        <div class="form-group col-3  m-b-10">
                                                            <label
                                                                class="text-lg-left col-lg-12 col-form-label">Country</label>
                                                            <label id="country_Name"
                                                                class="text-lg-left col-lg-12 col-form-label text-primary font-weight-bold p-t-0">{{ $employees->country_name }}</label>
                                                        </div>
                                                        <div class="form-group col-3  m-b-10">
                                                            <label class="text-lg-left col-lg-12 col-form-label">Postal/Zip
                                                                Code</label>
                                                            <label id="postal_code"
                                                                class="text-lg-left col-lg-12 col-form-label text-primary font-weight-bold p-t-0">{{ $employees->zip_code }}</label>
                                                        </div>
                                                        <div class="form-group col-3  m-b-10">
                                                            <label class="text-lg-left col-lg-12 col-form-label">Home
                                                                Phone</label>
                                                            <label id="home_phone"
                                                                class="text-lg-left col-lg-12 col-form-label text-primary font-weight-bold p-t-0">{{ $employees->phone }}</label>
                                                        </div>
                                                        <div class="form-group col-3  m-b-10">
                                                            <label class="text-lg-left col-lg-12 col-form-label">Work
                                                                Phone</label>
                                                            <label id="work_phone"
                                                                class="text-lg-left col-lg-12 col-form-label text-primary font-weight-bold p-t-0">{{ $employees->mobile }}</label>
                                                        </div>
                                                        <div class="form-group col-3  m-b-10">
                                                            <label class="text-lg-left col-lg-12 col-form-label">Private
                                                                Email</label>
                                                            <label id="private_email"
                                                                class="text-lg-left col-lg-12 col-form-label text-primary font-weight-bold p-t-0">{{ $employees->private_email }}</label>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    {{-- Secoond Row End --}}
                                    {{-- Third Row Start --}}
                                    <div class="row mt-5 mb-5">
                                        <div class="col-xl-12 m-t-30">
                                            <div class="card  border-0 bg-orange-transparent-1">
                                                <div class="card-header f-w-600">
                                                    <h3>Job Details</h3>
                                                </div>
                                                <div id="cont_job_details"
                                                    class="card-body card-body custom-shadow bg-white custom-radius">
                                                    <div class="row">
                                                        <div class="form-group col-3  m-b-10">
                                                            <label class="text-lg-left col-lg-12 col-form-label">Job
                                                                Title</label>
                                                            <label id="job_title_Name"
                                                                class="text-lg-left col-lg-12 col-form-label text-primary font-weight-bold p-t-0">{{ $employees->title_name }}</label>
                                                        </div>
                                                        <div class="form-group col-3  m-b-10">
                                                            <label class="text-lg-left col-lg-12 col-form-label">Employment
                                                                Status</label>
                                                            <label id="employment_status_Name"
                                                                class="text-lg-left col-lg-12 col-form-label text-primary font-weight-bold p-t-0">{{ $employees->status_name }}</label>
                                                        </div>
                                                        <div class="form-group col-3  m-b-10">
                                                            <label
                                                                class="text-lg-left col-lg-12 col-form-label">Department</label>
                                                            <label id="department_Name"
                                                                class="text-lg-left col-lg-12 col-form-label text-primary font-weight-bold p-t-0">{{ $employees->department_name }}</label>
                                                        </div>
                                                    </div>
                                                </div>
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
@endsection

{{-- Scripts Section --}}
@section('page-scripts')
    <script src="{{ asset('js/pages/widgets.js') }}" type="text/javascript"></script>
@endsection

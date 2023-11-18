<?php
$allStpes = [
    [
        'stpe' => 1,
        'title' => 'Personal Info',
        'description' => 'Name, Address, Nationalty, Passport, Number and DOB',
    ],
    [
        'stpe' => 2,
        'title' => 'Enter your Contact Info',
        'description' => 'Email and Phone no. is required',
    ],
    [
        'stpe' => 3,
        'title' => 'Job Details',
        'description' => 'Job title, Department, Joined date,',
    ],
    [
        'stpe' => 4,
        'title' => 'Authentication',
        'description' => 'username, Password and User Role,',
    ],
];
$isCurrentStep = 1;
?>

{{-- Extends layout --}}
@extends('layouts.admin')
@section('page_title', 'Edit Employee')
<meta name="csrf-token" content="{{ csrf_token() }}">
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
<link href="{{ asset('css/wizard.css') }}" rel="stylesheet" id="bootstrap-css">
{{-- Content --}}
@section('content')
    <div class="card-body">
        <div>
            <div class="row p-4 bg-light" style="margin-left: 0.1rem; margin-right: 0.1rem;">
                <div class="card card-custom example example-compact w-100">
                    <div class="card-body">
                        <div class="row mb-2 text-right">
                            <div class="col-12">
                                <span class="pull-right"><a id="btnAllShippers"
                                        href="{{ route('admin.employee.all_employees') }}"
                                        class="btn btn-warning btn-sm text-dark"><i
                                            class="fab fa-lg fa-fw fa-rebel text-dark"></i>All Employee</a></span>
                            </div>
                        </div>
                        <ul class="progressbar">
                            @foreach ($allStpes as $item)
                                <li id="tab-{{ $item['stpe'] }}" onclick="onNextTab({{ $item['stpe'] }})"
                                    class="step-box-deactive">
                                    <a style="cursor: pointer;">
                                        <div id="tab-circel-{{ $item['stpe'] }}" class="step-count step-deactive-circel">
                                            <p>{{ $item['stpe'] }}</p>
                                        </div>
                                        <div class="step-box">
                                            <h4
                                                style="{{ $isCurrentStep == $item['stpe'] ? 'color: #fff !important;' : 'color:rgb(100, 100, 100) !important;' }}">
                                                {{ $item['title'] }}</h4>
                                            <p
                                                style="{{ $isCurrentStep == $item['stpe'] ? 'color: #d1d1d1 !important;' : 'color:rgb(100, 100, 100) !important;' }}">
                                                {{ $item['description'] }}</p>
                                        </div>
                                    </a>
                                </li>
                            @endforeach
                        </ul>
                        <div>
                            <form class="needs-validation" id="editemployee" novalidate>
                                <div class="row p-4 bg-light d-flex setup-content" id="step-1">
                                    <div class="col-4 text-center">
                                        <div class="form-group">
                                            <input type="hidden" name="id" id="id"
                                                value="{{ $employees->id }}">
                                            @if ($employees->emp_image)
                                                @php
                                                    $image = asset('/employee_images/' . $employees->emp_image);
                                                @endphp
                                            @else
                                                @php
                                                    $image = asset('/user/user-photo.png');
                                                @endphp
                                            @endif
                                            <img id="blah" alt="your image" class="img-thumbnail" alt="4.5cm X 3.5cm"
                                                src="{{ $image }}" data-holder-rendered="true"
                                                style="width: 211px; height: 209px; pointer-events: none;" />
                                        </div>
                                        <div id="divUploadedFile" class="row p-t-25 ">
                                            <div class="col-sm-12 pull-right text-right">
                                                <div class="col-sm-12">
                                                    <a href="#"
                                                        class="btn btn-yellow btn-lg fileinput-button col-lg-12 p-t-5 p-b-5"
                                                        style="position:relative;overflow:hidden; color: #212529;
                                                background-color: #fc0;
                                                border-color: #fc0;
                                                -webkit-box-shadow: 0;
                                                box-shadow: 0;
                                                position:relative !important;overflow:hidden !important;">
                                                        <span class="d-inline-block align-items-center text-left">
                                                            <i class="fa fa-fw fa-upload fa-1x mr-3"
                                                                style="color: #111"></i>
                                                            <span class="d-inline mb-n1"><b>Add files...</b></span>
                                                            <input
                                                                style=" position: absolute !important;
                                                    top: 0 !important;
                                                    right: 0 !important;
                                                    margin: 0 !important;
                                                    opacity: 0 !important;
                                                    filter: opacity(0);
                                                    overflow: visible !important;
                                                    transform: translate(-300px, 0) scale(4) !important;
                                                    font-size: 23px !important;
                                                    direction: ltr !important;
                                                    cursor: pointer !important;"
                                                                input type="file" id="emp_image" name="emp_image"
                                                                onchange="document.getElementById('blah').src = window.URL.createObjectURL(this.files[0])">
                                                            {{-- type="file" name="UploadedFile" class="uploadInput" id="UploadedFile" > --}}
                                                        </span>
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="bg-light col-8">
                                        <div class="row">
                                            <div class="col-4">
                                                <div class="form-group m-b-10">
                                                    <label class="text-lg-right col-form-label">Employee Code <span
                                                            class="text-danger">*</span></label>
                                                    <div class="input-group m-b-10">
                                                        <div class="input-group-prepend"><span class="input-group-text"><i
                                                                    class="fa fa-calendar"></i></span></div>
                                                        <input type="text" id="emp_code" name="emp_code"
                                                            value="{{ $employees->emp_code }}" placeholder="Employee Code"
                                                            data-parsley-group="step-1" data-parsley-required="true"
                                                            class="form-control" readonly>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-4">
                                                <div class="form-group  m-b-10">
                                                    <label class="text-lg-right col-form-label">Employee First Name <span
                                                            class="text-danger">*</span></label>
                                                    <div class="input-group m-b-10">
                                                        <div class="input-group-prepend"><span class="input-group-text"><i
                                                                    class="fa fa-user"></i></span></div>
                                                        <input type="text" name="emp_first_name" id="emp_first_name"
                                                            value="{{ $employees->emp_first_name }}"
                                                            placeholder="Employee First Name" data-parsley-group="step-1"
                                                            data-parsley-required="true" class="form-control">
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-4">
                                                <div class="form-group  m-b-10">
                                                    <label class=" text-lg-right col-form-label">Employee Middle Name
                                                    </label>
                                                    <div class="input-group m-b-10">
                                                        <div class="input-group-prepend"><span class="input-group-text">
                                                                <i class="fa fa-user"></i></span></div>
                                                        <input type="text" name="emp_middle_name" id="emp_middle_name"
                                                            value="{{ $employees->emp_middle_name }}"
                                                            placeholder="Employee Middle Name" data-parsley-group="step-1"
                                                            class="form-control">
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-4">
                                                <div class="form-group m-b-10">
                                                    <label class=" text-lg-right col-form-label">Employee Last Name <span
                                                            class="text-danger">*</span></label>
                                                    <div class="input-group m-b-10">
                                                        <div class="input-group-prepend"><span class="input-group-text"><i
                                                                    class="fa fa-user"></i></span></div>
                                                        <input type="text" name="emp_last_name" id="emp_last_name"
                                                            value="{{ $employees->emp_last_name }}"
                                                            placeholder="Employee Last Name" data-parsley-group="step-1"
                                                            data-parsley-required="true" class="form-control">
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-4">
                                                <div class="form-group m-b-10">
                                                    <label class="text-lg-right col-form-label">Date of Birth <span
                                                            class="text-danger">*</span></label>

                                                    <div class="input-group m-b-10">
                                                        <div class="input-group-prepend"><span class="input-group-text"><i
                                                                    class="fa fa-calendar"></i></span></div>
                                                        <input id="dob" name="dob" type="date"
                                                            data-parsley-group="step-1" value="{{ $employees->dob }}"
                                                            data-parsley-required="true" class="form-control">
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-4">
                                                <div class="form-group m-b-10">
                                                    <label class="text-lg-right col-form-label">Marital Status<span
                                                            class="text-danger">*</span></label>
                                                    <div class="input-group m-b-10">
                                                        <div class="input-group-prepend"><span class="input-group-text"><i
                                                                    class="fa fa-heart"></i></span></div>
                                                        <select class="form-control kt-select2 select2"
                                                            id="marital_status" name="marital_status" style="width:80%;">
                                                            <option value="" selected disabled>Please Select
                                                                Marital
                                                                Status</option>
                                                            <option value="Single"
                                                                {{ $employees->marital_status == 'Single' ? 'selected' : '' }}>
                                                                Single
                                                            </option>
                                                            <option value="Married"
                                                                {{ $employees->marital_status == 'Married' ? 'selected' : '' }}>
                                                                Married
                                                            </option>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-4">
                                                <div class="form-group  m-b-10">
                                                    <label class=" text-lg-right col-form-label">Gender <span
                                                            class="text-danger">*</span></label>
                                                    <div class="pt-3">
                                                        <div class="form-check">
                                                            <input class="form-check-input" type="radio" name="gender"
                                                                id="maleRadio" value="Male"
                                                                {{ $employees->gender === 'Male' ? 'checked' : '' }}>
                                                            <label for="maleRadio">Male</label>
                                                            &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
                                                            <input class="form-check-input" type="radio" name="gender"
                                                                id="femaleRadio" value="Female"
                                                                {{ $employees->gender === 'Female' ? 'checked' : '' }}>
                                                            <label for="femaleRadio">Female</label>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>


                                            <div class="col-4">
                                                <div class="form-group m-b-10">
                                                    <label class="text-lg-right col-form-label">Nationalty<span
                                                            class="text-danger">*</span></label>
                                                    <div class="input-group m-b-10">
                                                        <div class="input-group-prepend"><span class="input-group-text"><i
                                                                    class="fa fa-flag"></i></span></div>
                                                        <select class="form-control kt-select2 select2" name="nationality"
                                                            id="nationality" style="width:80%;">
                                                            <option value="" disabled selected>Please Select
                                                                Nationalty</option>
                                                            @foreach ($fetch_countrys as $key)
                                                                @if ($key->id == $employees->nationality)
                                                                    @php
                                                                        $sell = 'selected';
                                                                    @endphp
                                                                @else
                                                                    @php
                                                                        $sell = '';
                                                                    @endphp
                                                                @endif
                                                                <option value="{{ $key->id }}" {{ $sell }}>
                                                                    {{ $key->name }}</option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-4">
                                                <div class="form-group m-b-10">
                                                    <label class="text-lg-right col-form-label">Passport Number<span
                                                            class="text-danger">*</span></label>
                                                    <div class="input-group m-b-10">
                                                        <div class="input-group-prepend"><span class="input-group-text"><i
                                                                    class="fa fa-edit"></i></span></div>
                                                        <input id="passport_number" name="passport_number" type="text"
                                                            value="{{ $employees->passport_number }}"
                                                            data-parsley-group="step-1" class="form-control"
                                                            placeholder="Passport Number">
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-4">
                                                <div class="form-group m-b-10">
                                                    <label class="text-lg-right col-form-label">Passport Expiry Date
                                                        <span class="text-danger">*</span></label>
                                                    <div class="input-group m-b-10">
                                                        <div class="input-group-prepend"><span class="input-group-text"><i
                                                                    class="fa fa-calendar"></i></span></div>
                                                        <input id="passport_expiry_date" name="passport_expiry_date"
                                                            type="date" value="{{ $employees->passport_expiry_date }}"
                                                            data-parsley-group="step-1" data-parsley-required="true"
                                                            class="form-control">
                                                    </div>
                                                </div>
                                            </div>


                                            <div class="col-4">
                                                <div class="form-group m-b-10">
                                                    <label class="text-lg-right col-form-label">Immigration
                                                        Status<span class="text-danger">*</span></label>
                                                    <div class="input-group m-b-10">
                                                        <div class="input-group-prepend"><span class="input-group-text"><i
                                                                    class="fa fa-flag"></i></span></div>
                                                        <select class="form-control kt-select2 select2"
                                                            name="immigration_status" id="immigration_status" style="width:80%;">
                                                            <option value="" disabled selected>Please Select
                                                                Immigration Status
                                                            </option>
                                                            <option value="Citizen"
                                                                {{ $employees->immigration_status == 'Citizen' ? 'selected' : '' }}>
                                                                Citizen
                                                            </option>
                                                            <option value="Dependent Pass Holder"
                                                                {{ $employees->immigration_status == 'Dependent Pass Holder' ? 'selected' : '' }}>
                                                                Dependent Pass Holder</option>
                                                            <option value="Permanent Resident"
                                                                {{ $employees->immigration_status == 'Permanent Resident' ? 'selected' : '' }}>
                                                                Permanent Resident</option>
                                                            <option value="Work Permit Holder"
                                                                {{ $employees->immigration_status == 'Work Permit Holder' ? 'selected' : '' }}>
                                                                Work Permit Holder</option>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-4">
                                                <div class="form-group m-b-10">
                                                    <label class="text-lg-right col-form-label">Immigration Expiry
                                                        Date
                                                        <span class="text-danger">*</span></label>
                                                    <div class="input-group m-b-10">
                                                        <div class="input-group-prepend"><span class="input-group-text"><i
                                                                    class="fa fa-calendar"></i></span></div>
                                                        <input id="immigration_expiry_date" name="immigration_expiry_date"
                                                            type="date"
                                                            value="{{ $employees->immigration_expiry_date }}"
                                                            data-parsley-group="step-1" data-parsley-required="true"
                                                            class="form-control">
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-4">
                                                <div class="form-group m-b-10">
                                                    <label class="text-lg-right col-form-label">Emirates ID<span
                                                            class="text-danger">*</span></label>
                                                    <div class="input-group m-b-10">
                                                        <div class="input-group-prepend"><span class="input-group-text"><i
                                                                    class="fa fa-edit"></i></span></div>
                                                        <input id="emirates_id" name="emirates_id" type="text"
                                                            value="{{ $employees->emirates_id }}"
                                                            data-parsley-group="step-1" class="form-control"
                                                            placeholder="Emirates ID">
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-4">
                                                <div class="form-group m-b-10">
                                                    <label class="text-lg-right col-form-label">Other ID<span
                                                            class="text-danger">*</span></label>
                                                    <div class="input-group m-b-10">
                                                        <div class="input-group-prepend"><span class="input-group-text"><i
                                                                    class="fa fa-edit"></i></span></div>
                                                        <input id="other_id" name="other_id" type="text"
                                                            data-parsley-group="step-1"
                                                            value="{{ $employees->other_id }}" class="form-control"
                                                            placeholder="Other ID">
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-4">
                                                <div class="form-group m-b-10">
                                                    <label class="text-lg-right col-form-label">Driving License NO
                                                        <span class="text-danger">*</span></label>
                                                    <div class="input-group m-b-10">
                                                        <div class="input-group-prepend"><span class="input-group-text"><i
                                                                    class="fa fa-edit"></i></span></div>
                                                        <input id="driving_liscense_no" name="driving_liscense_no"
                                                            type="text" value="{{ $employees->driving_liscense_no }}"
                                                            data-parsley-group="step-1" class="form-control"
                                                            placeholder="Driving License NO">
                                                    </div>
                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                    <br>
                                    <div class="row">
                                        <div class="col-10">
                                        </div>
                                        <div class="col-2">
                                            <div class="btn-group mr-2 sw-btn-group" role="group">
                                                <button class="btn btn-secondary btn-sm sw-btn-prev" onclick="backStep(1)"
                                                    value="previous" type="button">Previous</button>
                                                &nbsp;&nbsp;&nbsp;
                                                <button class="btn btn-secondary btn-sm sw-btn-next" id="stepOne"
                                                    type="button">Next</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row p-4 bg-light d-flex setup-content displayNone" id="step-2">
                                    <div class="col-lg-12">
                                        <div class="row">
                                            <div class="col-6 mb-8">
                                                <div class="form-group m-b-10">
                                                    <label class="text-lg-right col-form-label">Phone<span
                                                            class="text-danger">*</span></label>
                                                    <div class="input-group m-b-10">
                                                        <div class="input-group-prepend"><span class="input-group-text"><i
                                                                    class="fa fa-phone"></i></span></div>
                                                        <input type="number" id="phone" name="phone"
                                                            value="{{ $employees->phone }}" placeholder="Phone"
                                                            data-parsley-group="step-2" data-parsley-required="true"
                                                            class="form-control" required>
                                                        <span class="text-danger invalid-feedback">Phone is
                                                            Required<span>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-6 mb-8">
                                                <div class="form-group m-b-10">
                                                    <label class="text-lg-right col-form-label">City<span
                                                            class="text-danger">*</span></label>
                                                    <div class="input-group m-b-10">
                                                        <div class="input-group-prepend"><span class="input-group-text"><i
                                                                    class="fa fa-location"></i></span></div>
                                                        <input type="text" id="city" name="city"
                                                            value="{{ $employees->city }}" placeholder="City"
                                                            data-parsley-group="step-2" data-parsley-required="true"
                                                            class="form-control">
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-6 mb-8">
                                                <div class="form-group m-b-10">
                                                    <label class="text-lg-right col-form-label">Mobile
                                                        Phone<span class="text-danger">*</span></label>
                                                    <div class="input-group m-b-10">
                                                        <div class="input-group-prepend"><span class="input-group-text"><i
                                                                    class="fa fa-phone"></i></span></div>
                                                        <input type="number" id="mobile" name="mobile"
                                                            value="{{ $employees->mobile }}" placeholder="Mobile Phone"
                                                            data-parsley-group="step-2" data-parsley-required="true"
                                                            class="form-control">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-lg-6">
                                                <div class="form-group m-b-10">
                                                    <label class="text-lg-right col-form-label">Country<span
                                                            class="text-danger">*</span></label>
                                                    <div class="input-group m-b-10">
                                                        <div class="input-group-prepend"><span class="input-group-text"><i
                                                                    class="fa fa-flag"></i></span></div>
                                                        <select class="form-control select2" name="country"
                                                            id="country" style="width:80%;">
                                                            <option value="" disabled selected>Please
                                                                Select Country
                                                            </option>
                                                            @foreach ($fetch_countrys as $key)
                                                                @if ($key->id == $employees->country)
                                                                    @php
                                                                        $sell = 'selected';
                                                                    @endphp
                                                                @else
                                                                    @php
                                                                        $sell = '';
                                                                    @endphp
                                                                @endif
                                                                <option value="{{ $key->id }}" {{ $sell }}>
                                                                    {{ $key->name }}</option>
                                                            @endforeach
                                                            {{-- @foreach ($fetch_countrys as $key)
                                                            @if (old('country') == $key->id)
                                                                <option value="{{ $key->id }}" selected>{{ $key->name }}
                                                                </option>
                                                            @else
                                                                <option value="{{ $key->id }}">{{ $key->name }}</option>
                                                            @endif
                                                        @endforeach --}}
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-6 mb-8">
                                                <div class="form-group m-b-10">
                                                    <label class="text-lg-right col-form-label">Emergency
                                                        Phone<span class="text-danger">*</span></label>
                                                    <div class="input-group m-b-10">
                                                        <div class="input-group-prepend"><span class="input-group-text"><i
                                                                    class="fa fa-phone"></i></span></div>
                                                        <input type="number" id="emergency_phone" name="emergency_phone"
                                                            value="{{ $employees->emergency_phone }}"
                                                            placeholder="Emergency Phone" data-parsley-group="step-2"
                                                            data-parsley-required="true" class="form-control">
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-6 mb-8">
                                                <div class="form-group m-b-10">
                                                    <label class="text-lg-right col-form-label">Zip Code<span
                                                            class="text-danger">*</span></label>
                                                    <div class="input-group m-b-10">
                                                        <div class="input-group-prepend"><span class="input-group-text"><i
                                                                    class="fa fa-location"></i></span></div>
                                                        <input type="text" id="zip_code" name="zip_code"
                                                            value="{{ $employees->zip_code }}"
                                                            placeholder="Emergency Phone" data-parsley-group="step-2"
                                                            data-parsley-required="true" class="form-control">
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-6 mb-8">
                                                <div class="form-group m-b-10">
                                                    <label class="text-lg-right col-form-label">Work Email<span
                                                            class="text-danger">*</span></label>
                                                    <div class="input-group m-b-10">
                                                        <div class="input-group-prepend"><span class="input-group-text"><i
                                                                    class="fa fa-envelope"></i></span></div>
                                                        <input type="text" id="work_email" name="work_email"
                                                            value="{{ $employees->work_email }}" placeholder="Work Email"
                                                            data-parsley-group="step-2" data-parsley-required="true"
                                                            class="form-control">
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-6 mb-8">
                                                <div class="form-group m-b-10">
                                                    <label class="text-lg-right col-form-label">Address Line
                                                        1<span class="text-danger">*</span></label>
                                                    <div class="input-group m-b-10">
                                                        <div class="input-group-prepend"><span class="input-group-text"><i
                                                                    class="fa fa-home"></i></span></div>
                                                        <input type="text" id="address_line_1" name="address_line_1"
                                                            value="{{ $employees->address_line_1 }}"
                                                            placeholder="Address Line 1" data-parsley-group="step-2"
                                                            data-parsley-required="true" class="form-control">
                                                    </div>
                                                </div>
                                            </div>


                                            <div class="col-6 mb-8">
                                                <div class="form-group m-b-10">
                                                    <label class="text-lg-right col-form-label">Private
                                                        Email<span class="text-danger">*</span></label>
                                                    <div class="input-group m-b-10">
                                                        <div class="input-group-prepend"><span class="input-group-text"><i
                                                                    class="fa fa-envelope"></i></span></div>
                                                        <input type="text" id="private_email" name="private_email"
                                                            value="{{ $employees->private_email }}"
                                                            placeholder="Private Email" data-parsley-group="step-2"
                                                            data-parsley-required="true" class="form-control">
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-6 mb-8">
                                                <div class="form-group m-b-10">
                                                    <label class="text-lg-right col-form-label">Address Line
                                                        2<span class="text-danger">*</span></label>
                                                    <div class="input-group m-b-10">
                                                        <div class="input-group-prepend"><span class="input-group-text"><i
                                                                    class="fa fa-home"></i></span></div>
                                                        <input type="text" id="address_line_2" name="address_line_2"
                                                            value="{{ $employees->address_line_2 }}"
                                                            placeholder="Address Line 2" data-parsley-group="step-2"
                                                            data-parsley-required="true" class="form-control">
                                                    </div>
                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                    <br>
                                    <div class="row">
                                        <div class="col-10">
                                        </div>
                                        <div class="col-2">
                                            <div class="btn-group mr-2 sw-btn-group" role="group">
                                                <button class="btn btn-secondary btn-sm sw-btn-prev" onclick="backStep(2)"
                                                    value="previous" type="button">Previous</button>
                                                &nbsp;&nbsp;&nbsp;
                                                <button class="btn btn-secondary btn-sm sw-btn-next" id="steptwo"
                                                    type="button">Next</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row p-4 bg-light d-flex setup-content displayNone" id="step-3">
                                    <div class="col-lg-12">
                                        <div class="row">
                                            <div class="col-lg-4">
                                                <div class="form-group m-b-10">
                                                    <label class="text-lg-right col-form-label">Job Title<span
                                                            class="text-danger">*</span></label>
                                                    <div class="input-group m-b-10">
                                                        <div class="input-group-prepend"><span class="input-group-text"><i
                                                                    class="fa fa-briefcase"></i></span></div>
                                                        <select class="form-control select2" name="job_title"
                                                            id="job_title" style="width:70%;">
                                                            <option value="" disabled selected>Please
                                                                Select Job
                                                                Title</option>
                                                            @foreach ($fetch_job_titles as $key)
                                                                @if ($key->id == $employees->job_title)
                                                                    @php
                                                                        $sell = 'selected';
                                                                    @endphp
                                                                @else
                                                                    @php
                                                                        $sell = '';
                                                                    @endphp
                                                                @endif
                                                                <option value="{{ $key->id }}" {{ $sell }}>
                                                                    {{ $key->name }}</option>
                                                            @endforeach
                                                        </select>
                                                        <button class="btn btn-md btn-success" id=""
                                                            type="button" href="javascript:void(0);" data-toggle="modal"
                                                            data-target="#AddJoBTitleModal"
                                                            style="background-color: #4cd964; border-color: #4cd964;">
                                                            <i class="fa fa-md fa-plus"></i>
                                                        </button>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-lg-4">
                                                <div class="form-group m-b-10">
                                                    <label class="text-lg-right col-form-label">Department<span
                                                            class="text-danger">*</span></label>
                                                    <div class="input-group m-b-10">
                                                        <div class="input-group-prepend"><span class="input-group-text"><i
                                                                    class="fa fa-link"></i></span></div>
                                                        <select class="form-control select2" name="department"
                                                            id="department" style="width:80%;">
                                                            <option value="" disabled selected>Please
                                                                Select
                                                                Department</option>
                                                            @foreach ($fetch_departments as $key)
                                                                @if ($key->id == $employees->department)
                                                                    @php
                                                                        $sell = 'selected';
                                                                    @endphp
                                                                @else
                                                                    @php
                                                                        $sell = '';
                                                                    @endphp
                                                                @endif
                                                                <option value="{{ $key->id }}" {{ $sell }}>
                                                                    {{ $key->name }}</option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-lg-4">
                                                <div class="form-group m-b-10">
                                                    <label class="text-lg-right col-form-label">Confirmation
                                                        Date</label>
                                                    <div class="input-group m-b-10">
                                                        <div class="input-group-prepend"><span class="input-group-text"><i
                                                                    class="fa fa-calendar"></i></span></div>
                                                        <input id="confirm_date" name="confirm_date" type="date"
                                                            value="{{ $employees->confirm_date }}"
                                                            data-parsley-group="step-1" data-parsley-required="true"
                                                            class="form-control">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-lg-4">
                                                <div class="form-group m-b-10">
                                                    <label class="text-lg-right col-form-label">Employment
                                                        Status<span class="text-danger">*</span></label>
                                                    <div class="input-group m-b-10">
                                                        <div class="input-group-prepend"><span class="input-group-text"><i
                                                                    class="fa fa-flag"></i></span></div>
                                                        <select class="form-control select2" id="emp_status"
                                                            name="emp_status" style="width:80%;">
                                                            <option value="" disabled selected>Please
                                                                Select
                                                                Employment Status
                                                            </option>
                                                            @foreach ($fetch_employee_status as $key)
                                                                @if ($key->id == $employees->emp_status)
                                                                    @php
                                                                        $sell = 'selected';
                                                                    @endphp
                                                                @else
                                                                    @php
                                                                        $sell = '';
                                                                    @endphp
                                                                @endif
                                                                <option value="{{ $key->id }}" {{ $sell }}>
                                                                    {{ $key->name }}</option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-lg-4">
                                                <div class="form-group m-b-10">
                                                    <label class="text-lg-right col-form-label">Joined
                                                        Date</label>
                                                    <span class="text-danger">*</span>
                                                    <div class="input-group m-b-10">
                                                        <div class="input-group-prepend"><span class="input-group-text"><i
                                                                    class="fa fa-calendar"></i></span></div>
                                                        <input id="joined_date" name="joined_date" type="date"
                                                            data-parsley-group="step-1" data-parsley-required="true"
                                                            value="{{ $employees->joined_date }}" class="form-control">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-lg-4">
                                                <div class="form-group m-b-10">
                                                    <label class="text-lg-right col-form-label">Termination
                                                        Date</label>
                                                    <div class="input-group m-b-10">
                                                        <div class="input-group-prepend"><span class="input-group-text"><i
                                                                    class="fa fa-calendar"></i></span></div>
                                                        <input id="termination_date" name="termination_date"
                                                            type="date" value="{{ $employees->termination_date }}"
                                                            data-parsley-group="step-1" data-parsley-required="true"
                                                            class="form-control">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <br>
                                    <div class="row">
                                        <div class="col-10">
                                        </div>
                                        <div class="col-2">
                                            <div class="btn-group mr-2 sw-btn-group" role="group">
                                                <button class="btn btn-secondary btn-sm sw-btn-prev" onclick="backStep(3)"
                                                    value="previous" type="button">Previous</button>
                                                &nbsp;&nbsp;&nbsp;
                                                <button class="btn btn-secondary btn-sm sw-btn-next" id="stepThree"
                                                    type="button">Next</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row p-4 bg-light d-flex setup-content displayNone" id="step-4">
                                    <div class="col-lg-10">
                                        <div class="row">
                                            <div class="col-lg-3">
                                                <div class="form-group m-b-10">
                                                    <label class="text-lg-right col-form-label">User name
                                                        <span class="text-danger">*</span>
                                                    </label>
                                                    <div class="input-group m-b-10">
                                                        <div class="input-group-prepend"><span class="input-group-text"><i
                                                                    class="fa fa-user"></i></span></div>
                                                        <input id="user_name" name="user_name" type="text"
                                                            value="{{ $employees->user_name }}"
                                                            data-parsley-group="step-1" data-parsley-required="true"
                                                            class="form-control" placeholder="User Name">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-lg-3">
                                                <div class="form-group m-b-10">
                                                    <label class="text-lg-right col-form-label">Passowrd
                                                        <span class="text-danger">*</span>
                                                    </label>
                                                    <div class="input-group m-b-10">
                                                        <input id="password" name="password" type="password"
                                                            data-parsley-group="step-1" data-parsley-required="true"
                                                            class="form-control" placeholder="Enter Passowrd"
                                                            value="{{ $employees->password }}">
                                                        <div class="input-group-prepend"><button class="btn btn-secondary"
                                                                type="button" onclick="show()">
                                                                <i class="fa fa-eye"></i>
                                                            </button></div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-lg-3">
                                                <div class="form-group m-b-10">
                                                    <label class="text-lg-right col-form-label">Confirm
                                                        Password
                                                        <span class="text-danger">*</span>
                                                    </label>
                                                    <div class="input-group m-b-10">
                                                        <input id="confirm_password" name="confirm_password"
                                                            type="password" data-parsley-group="step-1"
                                                            data-parsley-required="true" class="form-control"
                                                            placeholder="Enter Confirm Password"
                                                            value="{{ $employees->confirm_password }}">
                                                        <div class="input-group-prepend"> <button
                                                                class="btn btn-secondary" type="button"
                                                                onclick="myFunction()">
                                                                <i class="fa fa-eye"></i>
                                                            </button></div>


                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-lg-3">
                                                <div class="form-group m-b-10">
                                                    <label class="text-lg-right col-form-label">User Roles<span
                                                            class="text-danger">*</span></label>
                                                    <div class="input-group m-b-10">
                                                        <div class="input-group-prepend"><span class="input-group-text"><i
                                                                    class="fa fa-user"></i></span></div>
                                                        <select class="form-control select2" id="user_role"
                                                            name="user_role" style="width:80%;">
                                                            <option value="" disabled selected>Please
                                                                Select User
                                                                Roles</option>
                                                            @foreach ($fetch_user_roles as $key)
                                                                @if ($key->id == $employees->user_role)
                                                                    @php
                                                                        $sell = 'selected';
                                                                    @endphp
                                                                @else
                                                                    @php
                                                                        $sell = '';
                                                                    @endphp
                                                                @endif
                                                                <option value="{{ $key->id }}" {{ $sell }}>
                                                                    {{ $key->name }}</option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-2">
                                        <div class="form-group  m-b-10">
                                            <label class=" text-lg-right col-form-label">User Status <span
                                                    class="text-danger">*</span></label>
                                            <br>
                                            <label class="switch">
                                                <input type="checkbox" id="user_status"
                                                    data-parsley-multiple="user_status" name="user_status"
                                                    {{ $employees->user_status === 'on' ? 'checked' : '' }}>
                                                <div class="slider round">
                                                    <span class="on" data-value="on">Enable</span>
                                                    <span class="off" data-value="off">Disable</span>
                                                </div>
                                            </label>

                                        </div>
                                    </div>

                                    <div class="row mb-5">
                                        <div class="col-lg-12 btnRow">
                                            <button id="resetButton" name="btnClearAll" type="button"
                                                class="btn btn-danger btn-sm pull-right">
                                                <i class="fa fa-md fa-eraser"></i> Clear
                                            </button>
                                            <div class="btn-group pull-right dropup m-r-5 m-b-5" style="margin-left:5px;">
                                                <button class="btn btn-primary btn-sm" id="btnSaveGeneralInfo"
                                                    name="btnSubmit" style="background-color: #007aff;"
                                                    type="submit">Save</button>
                                                <a href="javascript:void(0);" data-toggle="dropdown"
                                                    class="btn btn-primary dropdown-toggle" aria-expanded="false"
                                                    style="background-color: #007aff;"><b class="caret"></b></a>
                                                <div class="dropdown-menu dropdown-menu-right" style="">
                                                    <button class="dropdown-item" id="btnSaveGeneralInfoNext"
                                                        type="submit">Save and
                                                        Next</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <br>
                                    <div class="row">
                                        <div class="col-10">
                                        </div>
                                        <div class="col-2">
                                            <div class="btn-group mr-2 sw-btn-group" role="group">
                                                <button class="btn btn-secondary btn-sm sw-btn-prev" onclick="backStep(4)"
                                                    value="previous" type="button">Previous</button>
                                                &nbsp;&nbsp;&nbsp;
                                                <button class="btn btn-secondary btn-sm sw-btn-next disabled"
                                                    id="stepOne" type="button">Next</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


    {{-- Add Job Modal  --}}
    @include('admin.modal.add_job_title')
    {{-- Add Job Modal --}}
@endsection

@section('page-scripts')
    <script type="text/javascript">
        $(document).ready(function() {
            onNextTab(1);
            $(".select2").select2();
            $("#stepOne").on("click", function() {
                $("#step-1").addClass("d-none");
                $("#step-2").removeClass("d-none");
                $(".select2").select2();
                onNextTab(2)
            });
            $("#steptwo").on("click", function() {
                $("#step-1").addClass("d-none");
                $("#step-2").addClass("d-none");
                $("#step-3").removeClass("d-none");
                $(".select2").select2();
                onNextTab(3)
            });
            $("#stepThree").on("click", function() {
                $("#step-1").addClass("d-none");
                $("#step-2").addClass("d-none");
                $("#step-3").addClass("d-none");
                $("#step-4").removeClass("d-none");
                $(".select2").select2();
                onNextTab(4)
            });
        });

        function backStep(step) {
            if (step == 1) {
                onNextTab(1);
                $("#step-1").removeClass("d-none");
                $("#step-2").addClass("d-none");
                $("#step-3").addClass("d-none");
            } else if (step == 2) {
                onNextTab(2);
                $("#step-1").removeClass("d-none");
                $("#step-2").addClass("d-none");
                $("#step-3").addClass("d-none");
            } else if (step == 3) {
                onNextTab(3);
                $("#step-1").addClass("d-none");
                $("#step-2").removeClass("d-none");
                $("#step-3").addClass("d-none");
            } else if (step == 4) {
                onNextTab(4);
                $("#step-1").addClass("d-none");
                $("#step-2").addClass("d-none");
                $("#step-3").removeClass("d-none");
                $("#step-4").addClass("d-none");
            }
        }

        function onNextTab(step) {
            if (step == 1) {
                $("#step-1").removeClass("d-none");
                $("#step-2").addClass("d-none");
                $("#step-3").addClass("d-none");
                $("#step-4").addClass("d-none");
                $(".select2").select2();
                $(`#tab-${step}`).removeClass("step-box-deactive");
                $(`#tab-circel-${step}`).removeClass("step-deactive-circel");
                $(`#tab-2`).addClass("step-box-deactive");
                $(`#tab-circel-2`).addClass("step-deactive-circel");
                $(`#tab-3`).addClass("step-box-deactive");
                $(`#tab-circel-3`).addClass("step-deactive-circel");
                $(`#tab-4`).addClass("step-box-deactive");
                $(`#tab-circel-4`).addClass("step-deactive-circel");
                $(`#tab-${step}`).addClass("step-box-active");
                $(`#tab-circel-${step}`).addClass("step-active-circel");
            } else if (step == 2) {
                $("#step-1").addClass("d-none");
                $("#step-2").removeClass("d-none");
                $("#step-3").addClass("d-none");
                $("#step-4").addClass("d-none");
                $(".select2").select2();
                $(`#tab-1`).addClass("step-box-deactive");
                $(`#tab-circel-1`).addClass("step-deactive-circel");
                $(`#tab-3`).addClass("step-box-deactive");
                $(`#tab-circel-3`).addClass("step-deactive-circel");
                $(`#tab-4`).addClass("step-box-deactive");
                $(`#tab-circel-4`).addClass("step-deactive-circel");
                $(`#tab-${step}`).removeClass("step-box-deactive");
                $(`#tab-circel-${step}`).removeClass("step-deactive-circel");
                $(`#tab-${step}`).addClass("step-box-active");
                $(`#tab-circel-${step}`).addClass("step-active-circel");
            } else if (step == 3) {
                $("#step-1").addClass("d-none");
                $("#step-2").addClass("d-none");
                $("#step-3").removeClass("d-none");
                $("#step-4").addClass("d-none");
                $("#step-5").addClass("d-none");
                $(".select2").select2();
                $(`#tab-1`).addClass("step-box-deactive");
                $(`#tab-circel-1`).addClass("step-deactive-circel");
                $(`#tab-2`).addClass("step-box-deactive");
                $(`#tab-circel-2`).addClass("step-deactive-circel");
                $(`#tab-4`).addClass("step-box-deactive");
                $(`#tab-circel-4`).addClass("step-deactive-circel");
                $(`#tab-${step}`).removeClass("step-box-deactive");
                $(`#tab-circel-${step}`).removeClass("step-deactive-circel");
                $(`#tab-${step}`).addClass("step-box-active");
                $(`#tab-circel-${step}`).addClass("step-active-circel");
            } else if (step == 4) {
                $("#step-1").addClass("d-none");
                $("#step-2").addClass("d-none");
                $("#step-3").addClass("d-none");
                $("#step-4").removeClass("d-none");
                $(".select2").select2();
                $(`#tab-1`).addClass("step-box-deactive");
                $(`#tab-circel-1`).addClass("step-deactive-circel");
                $(`#tab-2`).addClass("step-box-deactive");
                $(`#tab-circel-2`).addClass("step-deactive-circel");
                $(`#tab-3`).addClass("step-box-deactive");
                $(`#tab-circel-3`).addClass("step-deactive-circel");
                $(`#tab-${step}`).removeClass("step-box-deactive");
                $(`#tab-circel-${step}`).removeClass("step-deactive-circel");
                $(`#tab-${step}`).addClass("step-box-active");
                $(`#tab-circel-${step}`).addClass("step-active-circel");

            }
        }


        function show() {
            var x = document.getElementById("password");
            if (x.type === "password") {
                x.type = "text";
            } else {
                x.type = "password";
            }
        }


        function myFunction() {
            var x = document.getElementById("confirm_password");
            if (x.type === "password") {
                x.type = "text";
            } else {
                x.type = "password";
            }
        }



        $(document).ready(function() {
            $("#editemployee").on("submit", function(e) {
                e.preventDefault();

                var formData = new FormData();
                formData.append('_token', '{{ csrf_token() }}');
                formData.append('id', $("#id").val());
                formData.append('emp_code', $("#emp_code").val());
                formData.append('emp_first_name', $("#emp_first_name").val());
                formData.append('emp_middle_name', $("#emp_middle_name").val());
                formData.append('emp_last_name', $("#emp_last_name").val());
                formData.append('dob', $("#dob").val());
                formData.append('marital_status', $("#marital_status").val());
                formData.append('gender', $("input[name='gender']:checked").val());
                formData.append('nationality', $("#nationality").val());
                formData.append('passport_number', $("#passport_number").val());
                formData.append('passport_expiry_date', $("#passport_expiry_date").val());
                formData.append('immigration_status', $("#immigration_status").val());
                formData.append('immigration_expiry_date', $("#immigration_expiry_date").val());
                formData.append('emirates_id', $("#emirates_id").val());
                formData.append('emp_image', $('input[name="emp_image"]')[0].files[0]);
                formData.append('other_id', $("#other_id").val());
                formData.append('driving_liscense_no', $("#driving_liscense_no").val());
                formData.append('phone', $("#phone").val());
                formData.append('mobile', $("#mobile").val());
                formData.append('emergency_phone', $("#emergency_phone").val());
                formData.append('work_email', $("#work_email").val());
                formData.append('private_email', $("#private_email").val());
                formData.append('city', $("#city").val());
                formData.append('country', $("#country").val());
                formData.append('zip_code', $("#zip_code").val());
                formData.append('address_line_1', $("#address_line_1").val());
                formData.append('address_line_2', $("#address_line_2").val());
                formData.append('job_title', $("#job_title").val());
                formData.append('department', $("#department").val());
                formData.append('confirm_date', $("#confirm_date").val());
                formData.append('emp_status', $("#emp_status").val());
                formData.append('joined_date', $("#joined_date").val());
                formData.append('termination_date', $("#termination_date").val());
                formData.append('user_name', $("#user_name").val());
                formData.append('password', $("#password").val());
                formData.append('confirm_password', $("#confirm_password").val());
                formData.append('user_role', $("#user_role").val());
                formData.append('user_status', $("#user_status").is(":checked") ? "on" : "off");

                $.ajax({
                    type: "POST",
                    url: "{{ route('admin.employee.update') }}",
                    data: formData,
                    processData: false,
                    contentType: false,
                    success: function(data) {
                        if (data) {
                            alert('Employee Updated Successfully');
                            location.reload(true);
                        }
                    },
                    error: function(data, textStatus, errorThrown) {
                        alert('Employee Updated Unsuccessfully');
                        console.log(data);
                    },
                });
            });
        });

        $(document).ready(function() {
            $("#resetButton").click(function() {
                $("#editemployee")[1].reset();
            });

            (function() {
                'use strict'
                var forms = document.querySelectorAll('.needs-validation')
                Array.prototype.slice.call(forms)
                    .forEach(function(form) {
                        form.addEventListener('submit', function(event) {
                            if (!form.checkValidity()) {
                                event.preventDefault()
                                event.stopPropagation()
                            }
                            form.classList.add('was-validated')
                        }, false)
                    })
            })();
        });
    </script>
@endsection

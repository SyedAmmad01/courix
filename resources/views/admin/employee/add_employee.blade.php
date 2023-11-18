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
@section('page_title', 'Add Employee')
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
<link href="{{ asset('css/wizard.css') }}" rel="stylesheet" id="bootstrap-css">
{{-- Content --}}
@section('content')
    <div class="card-body">
        <div class="row p-4 bg-light" style="margin-left: 0.1rem; margin-right: 0.1rem;">
            <div class="card card-custom example example-compact w-100">
                <div class="card-body">
                    <div class="row mb-2 text-right">
                        <div class="col-12">
                            <span class="pull-right"><a id="btnAllShippers"
                                    href="{{ route('admin.employee.all_employees') }}"
                                    class="btn btn-warning btn-sm text-dark"><i
                                        class="fab fa-lg fa-fw fa-rebel text-dark"></i>&nbsp;All Employee</a></span>
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
                        <form class="needs-validation" id="addemployee" novalidate>
                            <div class="row p-4 bg-light d-flex setup-content" id="step-1">
                                <div class="col-4 text-center">
                                    <div class="form-group">
                                        <img id="blah" alt="your image" class="img-thumbnail" alt="4.5cm X 3.5cm"
                                            src="{{ asset('/user/user-photo.png') }}" data-holder-rendered="true"
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
                                                        <i class="fa fa-fw fa-upload fa-1x mr-3" style="color: #111"></i>
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
                                                <label class="text-lg-right col-form-label">Employee Code<span
                                                        class="text-danger">*</span></label>
                                                <div class="input-group m-b-10">
                                                    <div class="input-group-prepend"><span class="input-group-text"><i
                                                                class="fa fa-calendar"></i></span></div>
                                                    <input type="text" id="emp_code" name="emp_code"
                                                        placeholder="Employee Code" value="EMP000{{ $employee_code }}"
                                                        data-parsley-group="step-1" data-parsley-required="true"
                                                        class="form-control" required readonly>
                                                    <span class="text-danger invalid-feedback">Employee Code is
                                                        Required<span>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-4">
                                            <div class="form-group  m-b-10">
                                                <label class="text-lg-right col-form-label">Employee First Name<span
                                                        class="text-danger">*</span></label>
                                                <div class="input-group m-b-10">
                                                    <div class="input-group-prepend"><span class="input-group-text"><i
                                                                class="fa fa-user"></i></span></div>
                                                    <input type="text" name="emp_first_name" id="emp_first_name"
                                                        placeholder="Employee First Name" data-parsley-group="step-1"
                                                        data-parsley-required="true" class="form-control" required>
                                                    <span class="text-danger invalid-feedback">Employee First Name is
                                                        Required<span>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-4">
                                            <div class="form-group  m-b-10">
                                                <label class=" text-lg-right col-form-label">Employee Middle Name </label>
                                                <div class="input-group m-b-10">
                                                    <div class="input-group-prepend"><span class="input-group-text">
                                                            <i class="fa fa-user"></i></span></div>
                                                    <input type="text" name="emp_middle_name" id="emp_middle_name"
                                                        placeholder="Employee Middle Name" data-parsley-group="step-1"
                                                        class="form-control" required>
                                                    <span class="text-danger invalid-feedback">Employee Middle Name is
                                                        Required<span>
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
                                                        placeholder="Employee Last Name" data-parsley-group="step-1"
                                                        data-parsley-required="true" class="form-control" required>
                                                    <span class="text-danger invalid-feedback">Employee Last Name is
                                                        Required<span>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-4">
                                            <div class="form-group m-b-10">
                                                <label class="text-lg-right col-form-label">Date of Birth<span
                                                        class="text-danger">*</span></label>

                                                <div class="input-group m-b-10">
                                                    <div class="input-group-prepend"><span class="input-group-text"><i
                                                                class="fa fa-calendar"></i></span></div>
                                                    <input id="dob" name="dob" type="date"
                                                        data-parsley-group="step-1" data-parsley-required="true"
                                                        class="form-control" required>
                                                    <span class="text-danger invalid-feedback">Date of Birth is
                                                        Required<span>
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
                                                    <div class="flex-grow-1">
                                                        <select class="form-select rounded-start-0 select2"
                                                            name="marital_status" id="marital_status"
                                                            data-placeholder="Please Select Marital
                                                            Status"
                                                            required>
                                                            <option></option>
                                                            <option value="Single">Single</option>
                                                            <option value="Married">Married</option>
                                                        </select>
                                                    </div>
                                                    <span class="text-danger invalid-feedback">Marital Status is
                                                        Required<span>
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
                                                            id="" value="Male" required>
                                                        <label>Male</label>
                                                        &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
                                                        <input class="form-check-input" type="radio" name="gender"
                                                            id="" value="Female" required>
                                                        <label>Female</label>
                                                        <span class="text-danger invalid-feedback">Marital Status is
                                                            Required<span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-4">
                                            <div class="form-group m-b-10">
                                                <label class="text-lg-right col-form-label">Nationality<span
                                                        class="text-danger">*</span></label>
                                                <div class="input-group m-b-10">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text"><i class="fas fa-flag"></i></span>
                                                    </div>
                                                    <div class="flex-grow-1">
                                                        <select class="form-select select2" name="nationality"
                                                            id="nationality" data-placeholder="Please Select Nationality"
                                                            style="width:100%;" required>
                                                            <option></option>
                                                            @foreach ($fetch_countrys as $key)
                                                                @if (old('nationality') == $key->id)
                                                                    <option value="{{ $key->id }}" selected>
                                                                        {{ $key->name }}
                                                                    </option>
                                                                @else
                                                                    <option value="{{ $key->id }}">
                                                                        {{ $key->name }}
                                                                    </option>
                                                                @endif
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                    <span class="text-danger invalid-feedback">Nationalty is
                                                        Required</span>
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
                                                        data-parsley-group="step-1" class="form-control"
                                                        placeholder="Passport Number">
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-4">
                                            <div class="form-group m-b-10">
                                                <label class="text-lg-right col-form-label">Passport Expiry Date <span
                                                        class="text-danger">*</span></label>
                                                <div class="input-group m-b-10">
                                                    <div class="input-group-prepend"><span class="input-group-text"><i
                                                                class="fa fa-calendar"></i></span></div>
                                                    <input id="passport_expiry_date" name="passport_expiry_date"
                                                        type="date" data-parsley-group="step-1"
                                                        data-parsley-required="true" class="form-control">
                                                </div>
                                            </div>
                                        </div>


                                        <div class="col-4">
                                            <div class="form-group">
                                                <label for="immigration_status"
                                                    class="text-lg-right col-form-label">Immigration Status<span
                                                        class="text-danger">*</span></label>
                                                <div class="input-group">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text"><i class="fa fa-flag"></i></span>
                                                    </div>
                                                    <select class="form-select select2" name="immigration_status"
                                                        id="immigration_status"
                                                        data-placeholder="Please Select Immigration Status"
                                                        style="width:80%;">
                                                        <option></option>
                                                        <option value="Citizen">Citizen</option>
                                                        <option value="Dependent Pass Holder">Dependent Pass Holder
                                                        </option>
                                                        <option value="Permanent Resident">Permanent Resident</option>
                                                        <option value="Work Permit Holder">Work Permit Holder</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>


                                        <div class="col-4">
                                            <div class="form-group m-b-10">
                                                <label class="text-lg-right col-form-label">Immigration Expiry Date <span
                                                        class="text-danger">*</span></label>
                                                <div class="input-group m-b-10">
                                                    <div class="input-group-prepend"><span class="input-group-text"><i
                                                                class="fa fa-calendar"></i></span></div>
                                                    <input id="immigration_expiry_date" name="immigration_expiry_date"
                                                        type="date" data-parsley-group="step-1"
                                                        data-parsley-required="true" class="form-control">
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
                                                        data-parsley-group="step-1" class="form-control"
                                                        placeholder="Other ID">
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-4">
                                            <div class="form-group m-b-10">
                                                <label class="text-lg-right col-form-label">Driving License NO <span
                                                        class="text-danger">*</span></label>
                                                <div class="input-group m-b-10">
                                                    <div class="input-group-prepend"><span class="input-group-text"><i
                                                                class="fa fa-edit"></i></span></div>
                                                    <input id="driving_liscense_no" name="driving_liscense_no"
                                                        type="text" data-parsley-group="step-1" class="form-control"
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
                            <div class="row p-4 bg-light d-flex setup-content d-none" id="step-2">
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
                                                        placeholder="Phone" data-parsley-group="step-2"
                                                        data-parsley-required="true" class="form-control" required>
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
                                                        placeholder="City" data-parsley-group="step-2"
                                                        data-parsley-required="true" class="form-control">
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-6 mb-8">
                                            <div class="form-group m-b-10">
                                                <label class="text-lg-right col-form-label">Mobile Phone<span
                                                        class="text-danger">*</span></label>
                                                <div class="input-group m-b-10">
                                                    <div class="input-group-prepend"><span class="input-group-text"><i
                                                                class="fa fa-phone"></i></span></div>
                                                    <input type="number" id="mobile" name="mobile"
                                                        placeholder="Mobile Phone" data-parsley-group="step-2"
                                                        data-parsley-required="true" class="form-control">
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-lg-6">
                                            <div class="form-group m-b-10">
                                                <label class="text-lg-right col-form-label">Country<span
                                                        class="text-danger">*</span></label>
                                                <div class="input-group">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text"><i class="fa fa-flag"></i></span>
                                                    </div>
                                                    <select class="form-select select2" name="country" id="country"
                                                        data-placeholder="Please Select Country" style="width:92%;"
                                                        required>
                                                        <option></option>
                                                        @foreach ($fetch_countrys as $key)
                                                            @if (old('country') == $key->id)
                                                                <option value="{{ $key->id }}" selected>
                                                                    {{ $key->name }}
                                                                </option>
                                                            @else
                                                                <option value="{{ $key->id }}">{{ $key->name }}
                                                                </option>
                                                            @endif
                                                        @endforeach
                                                    </select>
                                                    <span class="text-danger invalid-feedback">Country is Required<span>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-6 mb-8">
                                            <div class="form-group m-b-10">
                                                <label class="text-lg-right col-form-label">Emergency Phone<span
                                                        class="text-danger">*</span></label>
                                                <div class="input-group m-b-10">
                                                    <div class="input-group-prepend"><span class="input-group-text"><i
                                                                class="fa fa-phone"></i></span></div>
                                                    <input type="number" id="emergency_phone" name="emergency_phone"
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
                                                        placeholder="Work Email" data-parsley-group="step-2"
                                                        data-parsley-required="true" class="form-control">
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-6 mb-8">
                                            <div class="form-group m-b-10">
                                                <label class="text-lg-right col-form-label">Address Line 1<span
                                                        class="text-danger">*</span></label>
                                                <div class="input-group m-b-10">
                                                    <div class="input-group-prepend"><span class="input-group-text"><i
                                                                class="fa fa-home"></i></span></div>
                                                    <input type="text" id="address_line_1" name="address_line_1"
                                                        placeholder="Address Line 1" data-parsley-group="step-2"
                                                        data-parsley-required="true" class="form-control">
                                                </div>
                                            </div>
                                        </div>


                                        <div class="col-6 mb-8">
                                            <div class="form-group m-b-10">
                                                <label class="text-lg-right col-form-label">Private Email<span
                                                        class="text-danger">*</span></label>
                                                <div class="input-group m-b-10">
                                                    <div class="input-group-prepend"><span class="input-group-text"><i
                                                                class="fa fa-envelope"></i></span></div>
                                                    <input type="text" id="private_email" name="private_email"
                                                        placeholder="Private Email" data-parsley-group="step-2"
                                                        data-parsley-required="true" class="form-control">
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-6 mb-8">
                                            <div class="form-group m-b-10">
                                                <label class="text-lg-right col-form-label">Address Line 2<span
                                                        class="text-danger">*</span></label>
                                                <div class="input-group m-b-10">
                                                    <div class="input-group-prepend"><span class="input-group-text"><i
                                                                class="fa fa-home"></i></span></div>
                                                    <input type="text" id="address_line_2" name="address_line_2"
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
                            <div class="row p-4 bg-light d-flex setup-content d-none" id="step-3">
                                <div class="col-lg-12">
                                    <div class="row">
                                        <div class="col-lg-4">
                                            <div class="form-group m-b-10">
                                                <label class="text-lg-right col-form-label">Job Title<span
                                                        class="text-danger">*</span></label>
                                                <div class="input-group">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text"><i
                                                                class="fa fa-briefcase"></i></span>
                                                    </div>
                                                    <select class="form-select select2" name="job_title" id="job_title"
                                                        data-placeholder="Please Select Job Title" style="width:70%;"
                                                        required>
                                                        <option></option>
                                                        @foreach ($fetch_job_titles as $key)
                                                            @if (old('job_title') == $key->id)
                                                                <option value="{{ $key->id }}" selected>
                                                                    {{ $key->name }}
                                                                </option>
                                                            @else
                                                                <option value="{{ $key->id }}">{{ $key->name }}
                                                                </option>
                                                            @endif
                                                        @endforeach
                                                    </select>
                                                    <button class="btn btn-md btn-success" id="" type="button"
                                                        href="javascript:void(0);" data-toggle="modal"
                                                        data-target="#AddJoBTitleModal"
                                                        style="background-color: #4cd964; border-color: #4cd964;">
                                                        <i class="fa fa-md fa-plus"></i>
                                                    </button>
                                                    <span class="text-danger invalid-feedback">Job Title is Required<span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-4">
                                            <div class="form-group m-b-10">
                                                <label class="text-lg-right col-form-label">Department<span
                                                        class="text-danger">*</span></label>
                                                <div class="input-group">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text"><i class="fa fa-link"></i></span>
                                                    </div>
                                                    <select class="form-control select2" name="department" id="department"
                                                        data-placeholder="Please Select Department" style="width:80%;"
                                                        required>
                                                        <option></option>
                                                        @foreach ($fetch_departments as $key)
                                                            @if (old('department') == $key->id)
                                                                <option value="{{ $key->id }}" selected>
                                                                    {{ $key->name }}
                                                                </option>
                                                            @else
                                                                <option value="{{ $key->id }}">{{ $key->name }}
                                                                </option>
                                                            @endif
                                                        @endforeach
                                                    </select>
                                                    <span class="text-danger invalid-feedback">Department is Required<span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-4">
                                            <div class="form-group m-b-10">
                                                <label class="text-lg-right col-form-label">Confirmation Date</label>
                                                <div class="input-group m-b-10">
                                                    <div class="input-group-prepend"><span class="input-group-text"><i
                                                                class="fa fa-calendar"></i></span></div>
                                                    <input id="confirm_date" name="confirm_date" type="date"
                                                        data-parsley-group="step-3" data-parsley-required="true"
                                                        class="form-control">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-4">
                                            <div class="form-group m-b-10">
                                                <label class="text-lg-right col-form-label">Employment Status<span
                                                        class="text-danger">*</span></label>
                                                <div class="input-group">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text"><i class="fa fa-flag"></i></span>
                                                    </div>
                                                    <select class="form-select select2" name="emp_status" id="emp_status"
                                                        data-placeholder="Please Select Employment" style="width:88%;"
                                                        required>
                                                        <option></option>
                                                        @foreach ($fetch_employee_status as $key)
                                                            @if (old('emp_status') == $key->id)
                                                                <option value="{{ $key->id }}" selected>
                                                                    {{ $key->name }}
                                                                </option>
                                                            @else
                                                                <option value="{{ $key->id }}">{{ $key->name }}
                                                                </option>
                                                            @endif
                                                        @endforeach
                                                    </select>
                                                    <span class="text-danger invalid-feedback">Employment Status is
                                                        Required<span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-4">
                                            <div class="form-group m-b-10">
                                                <label class="text-lg-right col-form-label">Joined Date</label>
                                                <span class="text-danger">*</span>
                                                <div class="input-group m-b-10">
                                                    <div class="input-group-prepend"><span class="input-group-text"><i
                                                                class="fa fa-calendar"></i></span></div>
                                                    <input id="joined_date" name="joined_date" type="date"
                                                        data-parsley-group="step-3" data-parsley-required="true"
                                                        class="form-control">
                                                    <span class="text-danger invalid-feedback">Joined Date is
                                                        Required<span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-4">
                                            <div class="form-group m-b-10">
                                                <label class="text-lg-right col-form-label">Termination Date</label>
                                                <div class="input-group m-b-10">
                                                    <div class="input-group-prepend"><span class="input-group-text"><i
                                                                class="fa fa-calendar"></i></span></div>
                                                    <input id="termination_date" name="termination_date" type="date"
                                                        data-parsley-group="step-3" data-parsley-required="true"
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
                            <div class="row p-4 bg-light d-flex setup-content d-none" id="step-4">
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
                                                        class="form-control" placeholder="Enter Passowrd">
                                                    <div class="input-group-prepend"> <button class="btn btn-secondary"
                                                            type="button" onclick="show()">
                                                            <i class="fa fa-eye"></i>
                                                        </button></div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-3">
                                            <div class="form-group m-b-10">
                                                <label class="text-lg-right col-form-label">Confirm Password
                                                    <span class="text-danger">*</span>
                                                </label>
                                                <div class="input-group m-b-10">
                                                    <input id="confirm_password" name="confirm_password" type="password"
                                                        data-parsley-group="step-1" data-parsley-required="true"
                                                        class="form-control" placeholder="Enter Confirm Password">
                                                    <div class="input-group-prepend"> <button class="btn btn-secondary"
                                                            type="button" onclick="myFunction()">
                                                            <i class="fa fa-eye"></i>
                                                        </button></div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-3">
                                            <div class="form-group m-b-10">
                                                <label class="text-lg-right col-form-label">User Roles<span
                                                        class="text-danger">*</span></label>
                                                <div class="input-group">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text"><i class="fa fa-user"></i></span>
                                                    </div>
                                                    <select class="form-select select2" name="user_role" id="user_role"
                                                        data-placeholder="Please Select User Roles" style="width:80%;"
                                                        required>
                                                        <option></option>
                                                        @foreach ($fetch_user_roles as $key)
                                                            @if (old('user_role') == $key->id)
                                                                <option value="{{ $key->id }}" selected>
                                                                    {{ $key->name }}
                                                                </option>
                                                            @else
                                                                <option value="{{ $key->id }}">{{ $key->name }}
                                                                </option>
                                                            @endif
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
                                            <input type="checkbox" id="user_status" data-parsley-multiple="user_status"
                                                name="user_status">
                                            <div class="slider round">
                                                <span class="on" value="1">Enable</span>
                                                <span class="off" value="0">Disable</span>
                                            </div>
                                        </label>
                                    </div>
                                </div>

                                <div class="row mb-5">
                                    <div class="col-lg-12 btnRow">
                                        <button id="resetButton" name="btnClearAll" type="button"
                                            class="btn btn-danger pull-right btn-sm">
                                            <i class="fa fa-md fa-eraser"></i> Clear
                                        </button>
                                        <div class="btn-group pull-right dropup m-r-5 m-b-5" style="margin-left:5px;">
                                            <button class="btn btn-primary btn-sm" id="btnSaveGeneralInfo"
                                                name="btnSubmit" style="background-color: #007aff;"
                                                type="submit">Save</button>
                                            <a href="#" data-toggle="dropdown"
                                                class="btn btn-primary dropdown-toggle" aria-expanded="false"
                                                style="background-color: #007aff;"><b class="caret"></b></a>
                                            <div class="dropdown-menu dropdown-menu-right" style="">
                                                <button class="dropdown-item" id="btnSaveGeneralInfoNext"
                                                    type="submit">Save and
                                                    Next</button>
                                                {{-- <a href="javascript:;" id="btnSaveGeneralInfoNext" class="dropdown-item">Save and
                                                    Next</a> --}}
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
                                            <button class="btn btn-secondary btn-sm sw-btn-next disabled" id="stepOne"
                                                type="button">Next</button>
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
            $("#resetButton").click(function() {
                $("#addemployee")[0].reset();
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

        $("#addemployee").on("submit", function(e) {
            e.preventDefault();
            var _token = '{{ csrf_token() }}';
            var emp_code = $("#emp_code").val();
            var emp_first_name = $("#emp_first_name").val();
            var emp_middle_name = $("#emp_middle_name").val();
            var emp_last_name = $("#emp_last_name").val();
            var dob = $("#dob").val();
            var marital_status = $("#marital_status").val();
            var gender = $("input[name='gender']:checked").val();
            var nationality = $("#nationality").val();
            var passport_number = $("#passport_number").val();
            var passport_expiry_date = $("#passport_expiry_date").val();
            var immigration_status = $("#immigration_status").val();
            var immigration_expiry_date = $("#immigration_expiry_date").val();
            var emirates_id = $("#emirates_id").val();
            var emp_image = $('input[name="emp_image"]')[0].files[0];
            var other_id = $("#other_id").val();
            var driving_liscense_no = $("#driving_liscense_no").val();
            var phone = $("#phone").val();
            var mobile = $("#mobile").val();
            var emergency_phone = $("#emergency_phone").val();
            var work_email = $("#work_email").val();
            var private_email = $("#private_email").val();
            var city = $("#city").val();
            var country = $("#country").val();
            var zip_code = $("#zip_code").val();
            var address_line_1 = $("#address_line_1").val();
            var address_line_2 = $("#address_line_2").val();
            var job_title = $("#job_title").val();
            var department = $("#department").val();
            var confirm_date = $("#confirm_date").val();
            var emp_status = $("#emp_status").val();
            var joined_date = $("#joined_date").val();
            var termination_date = $("#termination_date").val();
            var user_name = $("#user_name").val();
            var password = $("#password").val();
            var confirm_password = $("#confirm_password").val();
            var user_role = $("#user_role").val();
            var user_status = $("#user_status").is(":checked") ? "1" : "0";

            var formData = new FormData();
            formData.append('_token', _token);
            formData.append('emp_code', emp_code);
            formData.append('emp_first_name', emp_first_name);
            formData.append('emp_middle_name', emp_middle_name);
            formData.append('emp_last_name', emp_last_name);
            formData.append('dob', dob);
            formData.append('marital_status', marital_status);
            formData.append('gender', gender);
            formData.append('nationality', nationality);
            formData.append('passport_number', passport_number);
            formData.append('passport_expiry_date', passport_expiry_date);
            formData.append('immigration_status', immigration_status);
            formData.append('immigration_expiry_date', immigration_expiry_date);
            formData.append('emirates_id', emirates_id);
            formData.append('emp_image', emp_image);
            formData.append('other_id', other_id);
            formData.append('driving_liscense_no', driving_liscense_no);
            formData.append('phone', phone);
            formData.append('mobile', mobile);
            formData.append('emergency_phone', emergency_phone);
            formData.append('work_email', work_email);
            formData.append('private_email', private_email);
            formData.append('city', city);
            formData.append('country', country);
            formData.append('zip_code', zip_code);
            formData.append('address_line_1', address_line_1);
            formData.append('address_line_2', address_line_2);
            formData.append('job_title', job_title);
            formData.append('department', department);
            formData.append('confirm_date', confirm_date);
            formData.append('emp_status', emp_status);
            formData.append('joined_date', joined_date);
            formData.append('termination_date', termination_date);
            formData.append('user_name', user_name);
            formData.append('password', password);
            formData.append('confirm_password', confirm_password);
            formData.append('user_role', user_role);
            formData.append('user_status', user_status);

            $.ajax({
                type: "POST",
                url: "{{ route('admin.employee.save') }}",
                data: formData,
                processData: false,
                contentType: false,
                success: function(data) {
                    if (data) {
                        alert('Employee Added Successfully');
                        location.reload(true);
                    }
                },
                error: function(data, textStatus, errorThrown) {
                    alert('Employee Added Unsuccessfully');
                },
            });
        });
    </script>
@endsection

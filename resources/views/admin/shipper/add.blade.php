<?php
$allSteps = [
    [
        'step' => 1,
        'title' => 'Shipper Information',
        'description' => 'Code, Email, Compnay, Manager Name and License #',
    ],
    [
        'step' => 2,
        'title' => 'Shippers Contact',
        'description' => 'Name, Designation, Email and Contact no.',
    ],
    [
        'step' => 3,
        'title' => 'Shippers Files(s)',
        'description' => 'Choose Shippers Files',
    ],
    [
        'step' => 4,
        'title' => 'Shippers Details',
        'description' => 'Person, Driver and',
    ],
    [
        'step' => 5,
        'title' => 'System Authentication',
        'description' => 'User Authentication',
    ],
];
$isCurrentStep = 1;
?>
{{-- Extends layout --}}
@extends('layouts.admin')
@section('page_title', 'Add Shipper')
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
                    <ul class="progressbar">
                        @foreach ($allSteps as $item)
                            <li id="tab-{{ $item['step'] }}" onclick="onNextTab({{ $item['step'] }})"
                                class="step-box-deactive">
                                <a style="cursor: pointer;">
                                    <div id="tab-circel-{{ $item['step'] }}" class="step-count step-deactive-circel">
                                        <p>{{ $item['step'] }}</p>
                                    </div>
                                    <div class="step-box">
                                        <h4
                                            style="{{ $isCurrentStep == $item['step'] ? 'color: #fff !important;' : 'color:rgb(100, 100, 100) !important;' }}">
                                            {{ $item['title'] }}</h4>
                                        <p
                                            style="{{ $isCurrentStep == $item['step'] ? 'color: #d1d1d1 !important;' : 'color:rgb(100, 100, 100) !important;' }}">
                                            {{ $item['description'] }}</p>
                                    </div>
                                </a>
                            </li>
                        @endforeach
                    </ul>
                    <div>
                        <form class="needs-validation" id="addshipper" novalidate>
                            <div class="row p-4 bg-light d-flex setup-content" id="step-1">
                                <div class="card card-custom example example-compact">
                                    <h1 class="card-title font-weight-bold" style="margin-left: 32rem;">
                                        Shipper Information
                                    </h1>
                                    <br>
                                    <br>
                                    <div class="row" style="margin-left:68rem; margin-bottom:1rem;">
                                        <a href="{{ route('admin.shipper.index') }}"
                                            class="btn btn-warning btn-sm text-dark"><i
                                                class="fab fa-lg fa-fw fa-rebel text-dark"></i>&nbsp;All
                                            Shippers</a>
                                    </div>
                                    <div class="row">
                                        <div class="col-4" style="padding-left: 12%; padding-top:2%;">
                                            <div class="form-group">
                                                <img id="blah" alt="your image" class="img-thumbnail"
                                                    alt="4.5cm X 3.5cm" src="{{ asset('/user/user-photo.png') }}"
                                                    data-holder-rendered="true"
                                                    style="width: 211px; height: 209px; pointer-events: none;" />
                                            </div>
                                            <div>
                                                <div id="divUploadedFile" class="row p-t-25 ">
                                                    <div class="col-sm-12 pull-right text-right">
                                                        <div class="col-sm-12">
                                                            <a href="#"
                                                                class="btn btn-warning btn-sm text-dark fileinput-button col-lg-12 p-t-5 p-b-5">
                                                                <span class="d-inline-block align-items-center text-left">
                                                                    <i class="fa fa-fw fa-upload fa-1x mr-3"
                                                                        style="color: #111"></i>
                                                                    <span class="d-inline mb-n1"><b>Add files...</b></span>
                                                                    <input
                                                                        style="position: absolute !important;
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
                                                                        input type="file" id="shipper_image"
                                                                        name="shipper_image"
                                                                        onchange="document.getElementById('blah').src = window.URL.createObjectURL(this.files[0])">
                                                                    {{-- type="file" name="UploadedFile" class="uploadInput" id="UploadedFile" > --}}
                                                                </span>
                                                            </a>
                                                        </div>
                                                    </div>
                                                </div>
                                                {{-- <input type="file"
                                            onchange="document.getElementById('blah').src = window.URL.createObjectURL(this.files[0])"> --}}
                                            </div>
                                        </div>
                                        <div class="col-8">
                                            <div class="row">
                                                <div class="col-lg-4">
                                                    <div class="form-group">
                                                        <label class="text-lg-right col-form-label">Shipper Code <span
                                                                class="text-danger">*</span></label>
                                                        <div class="input-group m-b-10">
                                                            <div class="input-group-prepend"><span
                                                                    class="input-group-text"><i
                                                                        class="fa fa-pen-to-square"></i></span></div>
                                                            <input type="text" id="shipper_code" name="shipper_code"
                                                                placeholder="Shipper Code" data-parsley-group="step-1"
                                                                data-parsley-required="true" class="form-control"
                                                                value="SH000{{ $shipper_code }}" readonly>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-lg-4">
                                                    <div class="form-group">
                                                        <label class=" text-lg-right col-form-label">Company Name <span
                                                                class="text-danger">*</span></label>
                                                        <div class="input-group m-b-10">
                                                            <div class="input-group-prepend"><span
                                                                    class="input-group-text"><i
                                                                        class="fa fa-user"></i></span></div>
                                                            <input type="text" name="company_name" id="company_name"
                                                                placeholder="Company Name" data-parsley-group="step-1"
                                                                data-parsley-required="true"
                                                                class="form-control txtValidate" required>
                                                            <span class="text-danger invalid-feedback">Comapny Name is
                                                                Required<span>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-lg-4">
                                                    <div class="form-group">
                                                        <label class=" text-lg-right col-form-label">Owner/Manager Name
                                                            <span class="text-danger">*</span></label>
                                                        <div class="input-group m-b-10">
                                                            <div class="input-group-prepend"><span
                                                                    class="input-group-text"><i
                                                                        class="fa fa-user"></i></span></div>
                                                            <input type="text" name="manager_name" id="manager_name"
                                                                placeholder="Owner/ Manager Name"
                                                                data-parsley-group="step-1" data-parsley-required="true"
                                                                class="form-control txtValidate" required>
                                                            <span class="text-danger invalid-feedback">Owner/Manager Name
                                                                is
                                                                Required<span>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-lg-4">
                                                    <div class="form-group">
                                                        <label class="text-lg-right col-form-label">Shipper Email<span
                                                                class="text-danger">*</span></label>
                                                        <div class="input-group m-b-10">
                                                            <div class="input-group-prepend"><span
                                                                    class="input-group-text"><i
                                                                        class="fa fa-envelope"></i></span></div>
                                                            <input type="email" name="shipper_email" id="shipper_email"
                                                                placeholder="Shipper Email" data-parsley-group="step-1"
                                                                class="form-control">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-lg-4">
                                                    <div class="form-group">
                                                        <label class=" text-lg-right col-form-label">Contact Office 1 <span
                                                                class="text-danger">*</span></label>
                                                        <div class="input-group m-b-10">
                                                            <div class="input-group-prepend"><span
                                                                    class="input-group-text"><i
                                                                        class="fa fa-mobile"></i></span></div>
                                                            <input type="number" name="contact_office_1"
                                                                id="contact_office_1" placeholder="Contact Office 1"
                                                                data-parsley-group="step-1" data-parsley-required="true"
                                                                class="form-control txtValidate" required>
                                                            <span class="text-danger invalid-feedback">Contact Office 1 is
                                                                Required<span>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-lg-4">
                                                    <div class="form-group">
                                                        <label class=" text-lg-right col-form-label">Contact Office 2<span
                                                                class="text-danger">*</span></label>
                                                        <div class="input-group m-b-10">
                                                            <div class="input-group-prepend"><span
                                                                    class="input-group-text"><i
                                                                        class="fa fa-mobile"></i></span></div>
                                                            <input type="number" name="contact_office_2"
                                                                id="contact_office_2" placeholder="Contact Office 1"
                                                                data-parsley-group="step-1" class="form-control">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-lg-4">
                                                    <div class="form-group">
                                                        <label class=" text-lg-right col-form-label">Trade License No<span
                                                                class="text-danger">*</span></label>
                                                        <div class="input-group m-b-10">
                                                            <div class="input-group-prepend"><span
                                                                    class="input-group-text"><i
                                                                        class="fa fa-pen-to-square"></i></span></div>
                                                            <input type="text" name="trade_license_no"
                                                                id="trade_license_no" placeholder="Trade License No"
                                                                data-parsley-group="step-1" class="form-control">
                                                        </div>
                                                    </div>
                                                </div>


                                                <div class="col-lg-4">
                                                    <div class="form-group m-b-10">
                                                        <label class="text-lg-right col-form-label">Country <span
                                                                class="text-danger">*</span></label>
                                                        <div class="input-group m-b-10">
                                                            <div class="input-group-prepend"><span
                                                                    class="input-group-text"><i
                                                                        class="fa fa-globe"></i></span></div>
                                                            <select class="form-control kt-select2 select2" name="country"
                                                                id="country" onchange="fun()" required
                                                                style="width:80%;">
                                                                <option value="" disabled selected>Please Select
                                                                    Country
                                                                </option>
                                                                @foreach ($fetch_countrys as $key)
                                                                    @if (old('country') == $key->id)
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
                                                            <span class="text-danger invalid-feedback">Country is
                                                                Required<span>
                                                        </div>
                                                    </div>
                                                </div>



                                                <div class="col-lg-4">
                                                    <div class="form-group m-b-10">
                                                        <label class="text-lg-right col-form-label">City<span
                                                                class="text-danger">*</span></label>
                                                        <div class="input-group m-b-10">
                                                            <div class="input-group-prepend"><span
                                                                    class="input-group-text"><i
                                                                        class="fa fa-globe"></i></span></div>
                                                            <select class="form-control kt-select2 select2" id="city"
                                                                name="city" required style="width:80%;">
                                                                <option value="" disabled selected>Please Select City
                                                                </option>
                                                            </select>
                                                            <span class="text-danger invalid-feedback">City is
                                                                Required<span>
                                                        </div>
                                                    </div>
                                                </div>


                                                <div class="col-lg-4">
                                                    <div class="form-group m-b-10">
                                                        <label class="text-lg-right col-form-label">Area<span
                                                                class="text-danger">*</span></label>
                                                        <div class="input-group m-b-10">
                                                            <div class="input-group-prepend"><span
                                                                    class="input-group-text"><i
                                                                        class="fa fa-globe"></i></span></div>
                                                            <select class="form-control kt-select2 select2" id="area"
                                                                name="area" required style="width:80%;">
                                                                <option value="" disabled selected>Please Select Area
                                                                </option>
                                                            </select>
                                                            <span class="text-danger invalid-feedback">Area is
                                                                Required<span>
                                                        </div>
                                                    </div>
                                                </div>


                                                <div class="col-lg-4">
                                                    <div class="form-group">
                                                        <label class=" text-lg-right col-form-label">Street Address<span
                                                                class="text-danger">*</span></label>
                                                        <div class="input-group m-b-10">
                                                            <div class="input-group-prepend"><span
                                                                    class="input-group-text"><i
                                                                        class="fa fa-globe"></i></span></div>
                                                            <input type="text" name="street_address"
                                                                id="street_address" placeholder="Street Address"
                                                                data-parsley-group="step-1" class="form-control"
                                                                data-parsley-required="true" required>
                                                            <span class="text-danger invalid-feedback">Street Address is
                                                                Required<span>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="col-lg-4">
                                                    <div class="form-group  m-b-10">
                                                        <label class=" text-lg-right col-form-label">Is Volumetric
                                                            Weight<span class="text-danger">*</span></label>
                                                        <br>
                                                        <label class="switch">
                                                            <input type="checkbox" id="volumetric_weight"
                                                                data-parsley-multiple="volumetric_weight"
                                                                name="volumetric_weight">
                                                            <div class="slider round">
                                                                <span class="on" data-value="on">Enable</span>
                                                                <span class="off" data-value="off">Disable</span>
                                                            </div>
                                                        </label>
                                                    </div>
                                                </div>

                                            </div>
                                        </div>


                                    </div>
                                </div>

                                <div class="row mt-5">
                                    <div class="col-10">
                                    </div>
                                    <div class="col-2">
                                        <div class="btn-group mr-2 sw-btn-group" role="group"><button
                                                class="btn btn-secondary btn-sm sw-btn-prev" onclick="backStep(1)"
                                                value="previous" type="button">Previous</button>
                                            &nbsp;&nbsp;&nbsp;
                                            <button class="btn btn-secondary btn-sm sw-btn-next" id="stepOne"
                                                type="button">Next</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row p-4 bg-light d-flex setup-content d-none" id="step-2">
                                <div class="card card-custom example example-compact">
                                    <h2 class="card-title" style="margin-left: 32rem;">
                                        Add Person or Link Person(s)
                                    </h2>
                                    <br>
                                    <br>
                                    <div class="row">
                                        <div class="col-4" id="innerFormContainer"
                                            style="padding-left: 8%; padding-top:2%;">
                                            <h5>Add a New Contact Person</h5>
                                            <div class="row">
                                                <div class="form-group">
                                                    <label class=" text-lg-right col-form-label">Name<span
                                                            class="text-danger">*</span></label>
                                                    <div class="input-group m-b-10">
                                                        <div class="input-group-prepend"><span class="input-group-text"><i
                                                                    class="fa fa-user"></i></span></div>
                                                        <input type="text" name="name" id="name"
                                                            placeholder="Name" data-parsley-group="step-1"
                                                            data-parsley-required="true" class="form-control txtValidate">
                                                    </div>
                                                </div>



                                                <div class="form-group">
                                                    <label class=" text-lg-right col-form-label">Designation<span
                                                            class="text-danger">*</span></label>
                                                    <div class="input-group m-b-10">
                                                        <div class="input-group-prepend"><span class="input-group-text"><i
                                                                    class="fa fa-user"></i></span></div>
                                                        <input type="text" name="designation" id="designation"
                                                            placeholder="Designation" data-parsley-group="step-1"
                                                            data-parsley-required="true" class="form-control txtValidate">
                                                    </div>
                                                </div>



                                                <div class="form-group">
                                                    <label class="text-lg-right col-form-label">Email<span
                                                            class="text-danger">*</span></label>
                                                    <div class="input-group m-b-10">
                                                        <div class="input-group-prepend"><span class="input-group-text"><i
                                                                    class="fa fa-envelope"></i></span></div>
                                                        <input type="email" name="email" id="email"
                                                            placeholder="Shipper Email" data-parsley-group="step-1"
                                                            class="form-control">
                                                    </div>
                                                </div>


                                                <div class="form-group">
                                                    <label class=" text-lg-right col-form-label">Contact Office 1<span
                                                            class="text-danger">*</span></label>
                                                    <div class="input-group m-b-10">
                                                        <div class="input-group-prepend"><span class="input-group-text"><i
                                                                    class="fa fa-mobile"></i></span></div>
                                                        <input type="number" name="contactoffice1" id="contactoffice1"
                                                            placeholder="Contact Office 1" data-parsley-group="step-1"
                                                            data-parsley-required="true" class="form-control txtValidate">
                                                    </div>
                                                </div>

                                                <div class="form-group">
                                                    <label class=" text-lg-right col-form-label">Contact Office 2<span
                                                            class="text-danger">*</span></label>
                                                    <div class="input-group m-b-10">
                                                        <div class="input-group-prepend"><span class="input-group-text"><i
                                                                    class="fa fa-mobile"></i></span></div>
                                                        <input type="number" name="contactoffice2" id="contactoffice2"
                                                            placeholder="Contact Office 2" data-parsley-group="step-1"
                                                            data-parsley-required="true" class="form-control txtValidate">
                                                    </div>
                                                </div>

                                                <div class="row mt-5 mb-5">
                                                    <div class="col-4">
                                                        <button class="btn btn-success btn-sm" type="button"
                                                            onclick="addInnerForm()"><i
                                                                class="fas fa-md fa-fw fa-plus"></i>Add
                                                            Contact Person</button>
                                                    </div>

                                                    <div class="col-4">

                                                    </div>

                                                    <div class="col-4">
                                                        <button class="btn btn-danger btn-sm" id="clear"
                                                            type="button"><i class="fas fa-lg fa-fw fa-eraser"></i>
                                                            Clear</button>
                                                    </div>
                                                </div>


                                            </div>
                                        </div>

                                        <div class="col-8" style="padding-left: 8%; padding-top:2%;">
                                            <h5>Shipper's Contact Person(s)</h5>
                                            <div class="body">
                                                <div class="table-responsive check-all-parent">
                                                    <table class="table table-hover m-b-0 c_list myDataTable">
                                                        <thead>
                                                            <tr>
                                                                <th> Name </th>
                                                                <th> Designation </th>
                                                                <th> Email </th>
                                                                <th> Contact No 1 </th>
                                                                <th> Contact No 2</th>
                                                                <th> Action </th>
                                                            </tr>
                                                        </thead>
                                                        <tbody id="preview">
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                        </div>



                                    </div>
                                </div>
                                <div class="row mt-5">
                                    <div class="col-10">
                                    </div>
                                    <div class="col-2">
                                        <div class="btn-group mr-2 sw-btn-group" role="group"><button
                                                class="btn btn-secondary btn-sm sw-btn-prev" onclick="backStep(2)"
                                                value="previous" type="button">Previous</button>
                                            &nbsp;&nbsp;&nbsp;
                                            <button class="btn btn-secondary btn-sm sw-btn-next" id="steptwo"
                                                type="button">Next</button>
                                        </div>

                                    </div>
                                </div>


                            </div>
                            <div class="row p-4 bg-light d-flex setup-content d-none" id="step-3">
                                <div class="card card-custom example example-compact w-100">
                                    <h2 class="card-title" style="margin-left: 32rem;">
                                        Shipper File(s)
                                    </h2>
                                    <br>
                                    <br>
                                    <div class="row">
                                        <div class="col-12" style="padding-left: 5%; padding-top:2%;">
                                            <div class="model_button mb-5 text-right">
                                                <a type="button" href="javascript:void(0);"
                                                    class="btn btn-success btn-sm" data-toggle="modal"
                                                    data-target="#AddShipperModal"><i class="fa fa-plus"></i>Add
                                                    File</a>
                                            </div>
                                            <div class="body">
                                                <div class="table-responsive check-all-parent">
                                                    <table class="table table-hover m-b-0 c_list myDataTable">
                                                        <thead>
                                                            <tr>
                                                                <th> File Name </th>
                                                                <th> Action </th>
                                                            </tr>
                                                        </thead>
                                                        <tbody id="review">
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="row mt-5">
                                    <div class="col-10">
                                    </div>
                                    <div class="col-2">
                                        <div class="btn-group mr-2 sw-btn-group text-right" role="group">
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
                                <div class="card card-custom example example-compact w-100">
                                    <h2 class="card-title" style="margin-left: 32rem;">
                                        Shipper Details
                                    </h2>
                                    <div class="container-fluid">
                                        <div class="row">
                                            <div class="col-6">
                                                <h5>Shipper's Sales Person</h5>
                                                <div class="form-group">
                                                    <label class="text-lg-right col-form-label">Employee<span
                                                            class="text-danger">*</span></label>
                                                    <div class="input-group-prepend"><span class="input-group-text"><i
                                                                class="fa fa-user"></i></span>
                                                        <select class="form-control kt-select2 select2" id="employee"
                                                            name="employee">
                                                            <option value="" disabled selected>Please Select Employee
                                                            </option>
                                                            @foreach ($fetch_employees as $key)
                                                                @if (old('employee') == $key->id)
                                                                    <option value="{{ $key->id }}" selected>
                                                                        {{ $key->emp_code }} | {{ $key->emp_first_name }}
                                                                    </option>
                                                                @else
                                                                    <option value="{{ $key->id }}">
                                                                        {{ $key->emp_code }} |
                                                                        {{ $key->emp_first_name }}
                                                                    </option>
                                                                @endif
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                </div>

                                            </div>
                                            <div class="col-6">
                                                <h5>Shipper's Driver</h5>
                                                <div class="form-group">
                                                    <label class="text-lg-right col-form-label">Driver<span
                                                            class="text-danger">*</span></label>
                                                    <div class="input-group-prepend"><span class="input-group-text"><i
                                                                class="fa fa-car"></i></span>
                                                        <select class="form-control kt-select2 select2" id="driver"
                                                            name="driver">
                                                            <option value="" disabled selected>Please Select Driver
                                                            </option>
                                                            @foreach ($fetch_drivers as $key)
                                                                @if (old('driver') == $key->id)
                                                                    <option value="{{ $key->id }}" selected>
                                                                        {{ $key->driver_code }} |
                                                                        {{ $key->employee_name }}
                                                                    </option>
                                                                @else
                                                                    <option value="{{ $key->id }}">
                                                                        {{ $key->driver_code }} |
                                                                        {{ $key->employee_name }}
                                                                    </option>
                                                                @endif
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                </div>


                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="row mt-5">
                                    <div class="col-10">
                                    </div>
                                    <div class="col-2">
                                        <div class="btn-group mr-2 sw-btn-group" role="group"><button
                                                class="btn btn-secondary btn-sm sw-btn-prev" onclick="backStep(4)"
                                                value="previous" type="button">Previous</button>
                                            &nbsp;&nbsp;&nbsp;
                                            <button class="btn btn-secondary btn-sm sw-btn-next" id="stepFour"
                                                type="button">Next</button>
                                        </div>

                                    </div>
                                </div>


                            </div>
                            <div class="row p-4 bg-light d-flex setup-content d-none" id="step-5">
                                <div class="card card-custom example example-compact w-100">
                                    <h2 class="card-title" style="margin-left: 32rem;">
                                        System Authentication
                                    </h2>
                                    <div class="container-fluid">
                                        <div class="row">
                                            <div class="col-3">
                                                <div class="form-group">
                                                    <label class="text-lg-right col-form-label">User Name<span
                                                            class="text-danger">*</span></label>
                                                    <div class="input-group-prepend"><span class="input-group-text"><i
                                                                class="fa fa-user"></i></span>
                                                        <input type="text" name="user_name" id="user_name"
                                                            placeholder="User Name" data-parsley-group="step-1"
                                                            data-parsley-required="true" class="form-control txtValidate">
                                                    </div>
                                                </div>

                                            </div>


                                            <div class="col-3">
                                                <div class="form-group">
                                                    <label class="text-lg-right col-form-label">Password<span
                                                            class="text-danger">*</span></label>
                                                    <div class="input-group-prepend"><span class="input-group-text"><i
                                                                class="fa fa-lock"></i></span>
                                                        <input type="password" name="password" id="password"
                                                            placeholder="Password" data-parsley-group="step-1"
                                                            data-parsley-required="true" class="form-control txtValidate">
                                                    </div>
                                                </div>

                                            </div>

                                            <div class="col-3">
                                                <div class="form-group">
                                                    <label class="text-lg-right col-form-label">Confirm Password<span
                                                            class="text-danger">*</span></label>
                                                    <div class="input-group-prepend"><span class="input-group-text"><i
                                                                class="fa fa-lock"></i></span>
                                                        <input type="password" name="confirm_password"
                                                            id="confirm_password" placeholder="Confirm Password"
                                                            data-parsley-group="step-1" data-parsley-required="true"
                                                            class="form-control txtValidate">
                                                    </div>
                                                </div>

                                            </div>

                                            <div class="col-3">
                                                <div class="form-group m-b-10">
                                                    <label class=" text-lg-right col-form-label">Status<span
                                                            class="text-danger">*</span></label>
                                                    <br>
                                                    <label class="switch">
                                                        <input type="checkbox" id="status"
                                                            data-parsley-multiple="status" name="status">
                                                        <div class="slider round">
                                                            <span class="on" data-value="on">Enable</span>
                                                            <span class="off" data-value="off">Disable</span>
                                                        </div>
                                                    </label>
                                                </div>
                                            </div>
                                        </div>



                                        <div class="row mb-5">
                                            <div class="col-lg-12 btnRow">
                                                <button id="resetButton" name="btnClearAll" type="button"
                                                    class="btn btn-danger btn-sm">
                                                    <i class="fa fa-md fa-eraser"></i>Clear
                                                </button>

                                                <div class="btn-group pull-right dropup m-r-5 m-b-5"
                                                    style="margin-left:5px;">
                                                    <button class="btn btn-primary btn-sm text-light" type="submit"
                                                        value="Submit"
                                                        style="color: #fff; background-color: #007aff; border-color: #007aff; -webkit-box-shadow: 0; box-shadow: 0;"><i
                                                            class="fa fa-file"></i>Save Shipper</button>
                                                </div>
                                            </div>
                                        </div>

                                    </div>

                                </div>

                                <div class="row mt-5">
                                    <div class="col-10">
                                    </div>
                                    <div class="col-2">
                                        <div class="btn-group mr-2 sw-btn-group" role="group"><button
                                                class="btn btn-secondary btn-sm sw-btn-prev" onclick="backStep(5)"
                                                value="previous" type="button">Previous</button>
                                            &nbsp;&nbsp;&nbsp;
                                            <button class="btn btn-secondary btn-sm sw-btn-next disabled" id="StepFive"
                                                type="button" value="">Next</button>
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


    <!-- Add Modal -->
    @include('admin.modal.add_shipper_files')
    <!-- Add Modal -->

    <!-- Delete Modal -->
    @include('admin.modal.delete_contact_person')
    <!-- Delete Modal -->

    <!-- Delete Shipper Files Modal -->
    @include('admin.modal.delete_shipper_files')
    <!-- Delete Shipper Files Modal -->
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
            $("#stepFour").on("click", function() {
                $("#step-1").addClass("d-none");
                $("#step-2").addClass("d-none");
                $("#step-3").addClass("d-none");
                $("#step-4").addClass("d-none");
                $("#step-5").removeClass("d-none");
                $(".select2").select2();
                onNextTab(5)
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
            } else if (step == 5) {
                onNextTab(5);
                $("#step-1").addClass("d-none");
                $("#step-2").addClass("d-none");
                $("#step-3").addClass("d-none");
                $("#step-4").removeClass("d-none");
                $("#step-5").addClass("d-none");
            }
        }

        function onNextTab(step) {
            if (step == 1) {
                $("#step-1").removeClass("d-none");
                $("#step-2").addClass("d-none");
                $("#step-3").addClass("d-none");
                $("#step-4").addClass("d-none");
                $("#step-5").addClass("d-none");
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
                $(`#tab-5`).addClass("step-box-deactive");
                $(`#tab-circel-5`).addClass("step-deactive-circel");
                $(`#tab-${step}`).addClass("step-box-active");
                $(`#tab-circel-${step}`).addClass("step-active-circel");
            } else if (step == 2) {
                $("#step-1").addClass("d-none");
                $("#step-2").removeClass("d-none");
                $("#step-3").addClass("d-none");
                $("#step-4").addClass("d-none");
                $("#step-5").addClass("d-none");
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
                $(`#tab-5`).addClass("step-box-deactive");
                $(`#tab-circel-5`).addClass("step-deactive-circel");
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
                $(`#tab-5`).addClass("step-box-deactive");
                $(`#tab-circel-5`).addClass("step-deactive-circel");
                $(`#tab-${step}`).removeClass("step-box-deactive");
                $(`#tab-circel-${step}`).removeClass("step-deactive-circel");
                $(`#tab-${step}`).addClass("step-box-active");
                $(`#tab-circel-${step}`).addClass("step-active-circel");
            } else if (step == 4) {
                $("#step-1").addClass("d-none");
                $("#step-2").addClass("d-none");
                $("#step-3").addClass("d-none");
                $("#step-4").removeClass("d-none");
                $("#step-5").addClass("d-none");
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
                $(`#tab-5`).addClass("step-box-deactive");
                $(`#tab-circel-5`).addClass("step-deactive-circel");
                $(`#tab-${step}`).removeClass("step-box-deactive");
                $(`#tab-circel-${step}`).removeClass("step-deactive-circel");
                $(`#tab-${step}`).addClass("step-box-active");
                $(`#tab-circel-${step}`).addClass("step-active-circel");

            } else if (step == 5) {
                $("#step-1").addClass("d-none");
                $("#step-2").addClass("d-none");
                $("#step-3").addClass("d-none");
                $("#step-4").addClass("d-none");
                $("#step-5").removeClass("d-none");
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
                $(`#tab-4`).addClass("step-box-deactive");
                $(`#tab-circel-4`).addClass("step-deactive-circel");
                $(`#tab-${step}`).removeClass("step-box-deactive");
                $(`#tab-circel-${step}`).removeClass("step-deactive-circel");
                $(`#tab-${step}`).addClass("step-box-active");
                $(`#tab-circel-${step}`).addClass("step-active-circel");

            }
        }


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



        $("#addshipper").on("submit", function(e) {
            e.preventDefault()
            // var csrfToken = $('meta[name="csrf-token"]').attr('content');
            var _token = '{{ csrf_token() }}';
            var shipper_code = $("#shipper_code").val();
            var company_name = $("#company_name").val();
            var manager_name = $("#manager_name").val();
            var shipper_email = $("#shipper_email").val();
            var contact_office_1 = $("#contact_office_1").val();
            var contact_office_2 = $("#contact_office_2").val();
            var trade_license_no = $("#trade_license_no").val();
            var country = $("#country").val();
            var volumetric_weight = $("#volumetric_weight").is(":checked") ? "on" : "off";
            var city = $("#city").val();
            var area = $("#area").val();
            var street_address = $("#street_address").val();
            var shipper_image = $('input[name="shipper_image"]')[0].files[0];
            var employee = $("#employee").val();
            var driver = $("#driver").val();
            var user_name = $("#user_name").val();
            var password = $("#password").val();
            var confirm_password = $("#confirm_password").val();
            var status = $("#status").is(":checked") ? "on" : "off";


            var formData = new FormData();
            formData.append('_token', _token);
            formData.append('shipper_code', shipper_code);
            formData.append('company_name', company_name);
            formData.append('manager_name', manager_name);
            formData.append('shipper_email', shipper_email);
            formData.append('contact_office_1', contact_office_1);
            formData.append('contact_office_2', contact_office_2);
            formData.append('trade_license_no', trade_license_no);
            formData.append('country', country);
            formData.append('volumetric_weight', volumetric_weight);
            formData.append('city', city);
            formData.append('area', area);
            formData.append('street_address', street_address);
            formData.append('shipper_image', shipper_image);
            formData.append('employee', employee);
            formData.append('driver', driver);
            formData.append('user_name', user_name);
            formData.append('password', password);
            formData.append('confirm_password', confirm_password);
            formData.append('status', status);

            $.ajax({
                type: "POST",
                url: "{{ route('admin.shipper.save') }}",
                data: formData,
                processData: false,
                contentType: false,
                success: function(data) {
                    if (data) {
                        alert('Shipper Added Successfully');
                        location.reload(true);
                    }
                },
                error: function(data, textStatus, errorThrown) {
                    // console.log(data);
                    alert('Shipper Added Unsuccessfully');
                },
            });
        });


        jQuery(document).ready(function() {
            jQuery('#city').change(function() {
                let cid = jQuery(this).val();
                jQuery.ajax({
                    url: "{{ route('admin.shipper.getcity') }}",
                    type: 'post',
                    data: 'cid=' + cid + '&_token={{ csrf_token() }}',
                    success: function(result) {
                        // console.log(result);
                        jQuery('#area').html(result);

                    }

                });
            });
        });

        function fun() {
            var id = $('#country :selected').val();
            // alert(class_id);
            $.ajax({
                headers: {
                    'X-CSRF-TOKEN': "{{ csrf_token() }}",
                },
                url: "{{ route('admin.shipper.getarea') }}",
                type: "POST",
                data: {
                    // session_id : session_id,
                    id: id,
                },
                success: function(response) {
                    // alert(response);
                    // console.log(response.id);
                    // $('#p_id').val(response.id);
                    $('#city').html(response);

                    // $('#modal-default').modal('show');
                }
            });

        }

        $(document).ready(function() {
            $('.myDataTable').DataTable();
            $("#resetButton").click(function() {
                $("#addshipper")[0].reset();
            });

            $("#clear").click(function() {
                $("#innerFormContainer input").val("");
            });

        });


        let innerFormCounter = 1;

        function addInnerForm() {
            const innerFormContainer = document.getElementById('innerFormContainer');

            const innerForm = document.createElement('form');
            innerForm.id = `innerForm${innerFormCounter}`;
            innerForm.classList.add('innerForm');

            // Your AJAX logic here
            var _token = '{{ csrf_token() }}';
            var name = $("#name").val();
            var designation = $("#designation").val();
            var email = $("#email").val();
            var contactoffice1 = $("#contactoffice1").val();
            var contactoffice2 = $("#contactoffice2").val();

            var formData = new FormData();
            formData.append('_token', _token);
            formData.append('name', name);
            formData.append('designation', designation);
            formData.append('email', email);
            formData.append('contactoffice1', contactoffice1);
            formData.append('contactoffice2', contactoffice2);

            $.ajax({
                type: "POST",
                url: "{{ url('/admin/contact_person/contact_person_save') }}",
                data: formData,
                processData: false,
                contentType: false,
                success: function(response) {
                    if (response.status === 'success') {
                        alert('Contact Person Added Successfully');
                        $("#innerFormContainer input").val("");
                        // location.reload(true);
                    } else {
                        alert('Contact Person Added Unsuccessfully');
                    }
                },
                error: function(xhr, textStatus, errorThrown) {
                    alert('Contact Person Added Unsuccessfully');
                }
            });

            innerFormContainer.appendChild(innerForm);

            innerFormCounter++;

            $.ajax({
                headers: {
                    'X-CSRF-TOKEN': "{{ csrf_token() }}",
                },
                url: "{{ route('admin.contact_person.add_get') }}",
                type: "POST",
                data: {},
                success: function(response) {
                    var responseData = response;
                    var html = "";

                    responseData.forEach((item) => {
                html += `<tr>
                <td>${item.name}</td>
                <td>${item.designation}</td>
                <td>${item.email}</td>
                <td>${item.contactoffice1}</td>
                <td>${item.contactoffice2}</td>
                <td style="display:flex;">
                    <button type="button" class="delete-btn btn btn-danger btn-sm fa fa-trash"
                        data-contactperson-id="${item.id}" data-toggle="modal"
                        data-target="#contactpersondeleteModal"></button>
                </td>
            </tr>`;
                    });

                    document.getElementById('preview').innerHTML = html;

                    $(document).on('click', '.delete-btn', function() {
                        var contactPersonId = $(this).data('contactperson-id');
                        $('#confirmDeleteBtn').off('click');

                        $('#confirmDeleteBtn').click(function() {
                            var token = $('meta[name="csrf-token"]').attr('content');

                            $.ajax({
                                url: 'admin/shipment/logs/delete/' + contactPersonId,
                                type: 'DELETE',
                                data: {
                                    _token: token,
                                    id: contactPersonId,
                                },
                                success: function(data) {
                                    if (data) {
                                        alert(
                                            'Contact Person Deleted Successfully'
                                        );
                                        $('#contactpersondeleteModal').modal(
                                            'hide');
                                        $('.modal-backdrop').remove();

                                        // Remove the deleted contact person from the table without reloading the page
                                        $(`.delete-btn[data-contactperson-id="${contactPersonId}"]`)
                                            .closest('tr').remove();
                                    }
                                },
                                error: function(data, textStatus, errorThrown) {
                                    alert('Contact Person Deleted Unsuccessfully');
                                },
                            });
                        });

                        $('#contactpersondeleteModal').modal('show');
                    });
                }
            });

        }


        function all_files() {
            $.ajax({
                headers: {
                    'X-CSRF-TOKEN': "{{ csrf_token() }}",
                },
                url: "{{ route('admin.shipper_files.add_get') }}",
                type: "POST",
                data: {},
                success: function(response) {
                    var responseData = response;
                    var html = "";

                    responseData.forEach((item) => {
                        html += `<tr>
                    <td>${item.file_name}</td>
                    <td style="display:flex;">
                        <button type="button" class="btn btn-primary btn-sm fa fa-eye"
                            style="background-color: #007aff;" onclick="showImage('${item.myfile}')"></button>
                        &nbsp;
                        <button type="button" class="files-delete-btn btn btn-danger btn-sm fa fa-trash"
                            data-shipperfile-id="${item.id}" data-toggle="modal"
                            data-target="#shipperfilesdeleteModal"></button>
                    </td>
                </tr>`;
                    });

                    document.getElementById('review').innerHTML = html;

                    $(document).on('click', '.files-delete-btn', function() {
                        var shipperfileId = $(this).data('shipperfile-id');
                        $('#ShipperDeleteBtn').off('click');

                        $('#ShipperDeleteBtn').click(function() {
                            var token = $('meta[name="csrf-token"]').attr('content');

                            $.ajax({
                                url: '/admin/shipper_files/delete/' + shipperfileId,
                                type: 'DELETE',
                                data: {
                                    _token: token,
                                    id: shipperfileId,
                                },
                                success: function(data) {
                                    if (data) {
                                        alert('Shipper File Deleted Successfully');
                                        $('#shipperfilesdeleteModal').modal('hide');
                                        $('.modal-backdrop').remove();

                                        // Remove the deleted file from the table without reloading the page
                                        $(`.files-delete-btn[data-shipperfile-id="${shipperfileId}"]`)
                                            .closest('tr').remove();
                                    }
                                },
                                error: function(data, textStatus, errorThrown) {
                                    alert('Shipper File Deleted Unsuccessfully');
                                },
                            });
                        });

                        $('#shipperfilesdeleteModal').modal('show');
                    });
                }
            });
        }

        function showImage(imageUrl) {
            var baseUrl = "http://127.0.0.1:8000/shipper_files_images/";
            var imageUrl = baseUrl + imageUrl;
            window.open(imageUrl, "_blank");
        }
    </script>
@endsection

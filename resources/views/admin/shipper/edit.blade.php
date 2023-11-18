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
@section('page_title', 'Edit Shipper')
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
                        <form class="forms-sample" id="editshipper">
                            <div class="row p-4 bg-light d-flex setup-content" id="step-1">
                                <div class="card card-custom example example-compact">
                                    <h2 class="card-title" style="margin-left: 32rem;">
                                        Shipper Information
                                    </h2>
                                    <br>
                                    <br>
                                    <div class="row" style="margin-left:68rem; margin-bottom:1rem;">
                                        <a href="{{ route('admin.shipper.index') }}" class="btn btn-yellow"
                                            style="
                                    color: #212529;
                                    background-color: #fc0;
                                    border-color: #fc0;
                                    -webkit-box-shadow: 0;
                                    box-shadow: 0;"><i
                                                class="fab fa-lg fa-fw fa-rebel text-dark"></i>All
                                            Shippers</a>
                                    </div>
                                    <div class="row">
                                        <div class="col-4" style="padding-left: 12%; padding-top:2%;">
                                            <div class="form-group">
                                                <input type="hidden" name="id" id="id"
                                                    value="{{ $shippers->id }}" onblur="get()">
                                                @if ($shippers->shipper_image)
                                                    @php
                                                        $image = asset('/shipper_images/' . $shippers->shipper_image);
                                                    @endphp
                                                @else
                                                    @php
                                                        $image = asset('/user/user-photo.png');
                                                    @endphp
                                                @endif
                                                <img id="blah" alt="your image" class="img-thumbnail"
                                                    alt="4.5cm X 3.5cm" src="{{ $image }}"
                                                    data-holder-rendered="true"
                                                    style="width: 211px; height: 209px; pointer-events: none;" />
                                            </div>
                                            <div>
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
                                                                        class="fa fa-calendar-days"></i></span></div>
                                                            <input type="text" id="shipper_code" name="shipper_code"
                                                                placeholder="Shipper Code" data-parsley-group="step-1"
                                                                data-parsley-required="true" class="form-control"
                                                                value="{{ $shippers->shipper_code }}" readonly>
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
                                                                class="form-control txtValidate"
                                                                value="{{ $shippers->company_name }}">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-lg-4">
                                                    <div class="form-group">
                                                        <label class=" text-lg-right col-form-label">Owner/ Manager Name
                                                            <span class="text-danger">*</span></label>
                                                        <div class="input-group m-b-10">
                                                            <div class="input-group-prepend"><span
                                                                    class="input-group-text"><i
                                                                        class="fa fa-user"></i></span></div>
                                                            <input type="text" name="manager_name" id="manager_name"
                                                                placeholder="Owner/ Manager Name"
                                                                data-parsley-group="step-1" data-parsley-required="true"
                                                                class="form-control txtValidate"
                                                                value="{{ $shippers->manager_name }}">
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
                                                                class="form-control"
                                                                value="{{ $shippers->shipper_email }}">
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
                                                                class="form-control txtValidate"
                                                                value="{{ $shippers->contact_office_1 }}">
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
                                                                data-parsley-group="step-1" class="form-control"
                                                                value="{{ $shippers->contact_office_2 }}">
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
                                                                data-parsley-group="step-1" class="form-control"
                                                                value="{{ $shippers->trade_license_no }}">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-lg-4">
                                                    <div class="form-group">
                                                        <label class="text-lg-right col-form-label">Country <span
                                                                class="text-danger">*</span></label>
                                                        <div class="input-group-prepend"><span class="input-group-text"><i
                                                                    class="fa fa-globe"></i></span>
                                                            <select class="form-control kt-select2 select2" id="country"
                                                                name="country" onchange="fun()">
                                                                <option value="" disabled selected>Please Select
                                                                    Country
                                                                </option>
                                                                @foreach ($fetch_countrys as $key)
                                                                    @if ($key->id == $shippers->country)
                                                                        @php
                                                                            $sell = 'selected';
                                                                        @endphp
                                                                    @else
                                                                        @php
                                                                            $sell = '';
                                                                        @endphp
                                                                    @endif
                                                                    <option value="{{ $key->id }}"
                                                                        {{ $sell }}>
                                                                        {{ $key->name }}</option>
                                                                @endforeach
                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="col-lg-4">
                                                    <div class="form-group">
                                                        <label class="text-lg-right col-form-label">City <span
                                                                class="text-danger">*</span></label>
                                                        <div class="input-group-prepend"><span class="input-group-text"><i
                                                                    class="fa fa-globe"></i></span>
                                                            <select class="form-control kt-select2 select2" id="city"
                                                                name="city">
                                                                <option value="" disabled selected>Please Select City
                                                                </option>
                                                                @foreach ($fetch_citys as $key)
                                                                    @if ($key->id == $shippers->city)
                                                                        @php
                                                                            $sell = 'selected';
                                                                        @endphp
                                                                    @else
                                                                        @php
                                                                            $sell = '';
                                                                        @endphp
                                                                    @endif
                                                                    <option value="{{ $key->id }}"
                                                                        {{ $sell }}>
                                                                        {{ $key->name }}</option>
                                                                @endforeach
                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="col-lg-4">
                                                    <div class="form-group">
                                                        <label class="text-lg-right col-form-label">Area<span
                                                                class="text-danger">*</span></label>
                                                        <div class="input-group-prepend"><span class="input-group-text"><i
                                                                    class="fa fa-globe"></i></span>
                                                            <select class="form-control kt-select2 select2" id="area"
                                                                name="area">
                                                                <option value="" disabled selected>Please Select Area
                                                                </option>
                                                                @foreach ($fetch_areas as $key)
                                                                    @if ($key->id == $shippers->area)
                                                                        @php
                                                                            $sell = 'selected';
                                                                        @endphp
                                                                    @else
                                                                        @php
                                                                            $sell = '';
                                                                        @endphp
                                                                    @endif
                                                                    <option value="{{ $key->id }}"
                                                                        {{ $sell }}>
                                                                        {{ $key->name }}</option>
                                                                @endforeach
                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="col-lg-4">
                                                    <div class="form-group">
                                                        <label class=" text-lg-right col-form-label">Street Address <span
                                                                class="text-danger">*</span></label>
                                                        <div class="input-group m-b-10">
                                                            <div class="input-group-prepend"><span
                                                                    class="input-group-text"><i
                                                                        class="fa fa-globe"></i></span></div>
                                                            <input type="text" name="street_address"
                                                                id="street_address" placeholder="Street Address"
                                                                data-parsley-group="step-1" class="form-control"
                                                                data-parsley-required="true"
                                                                value="{{ $shippers->street_address }}">
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
                                                                name="volumetric_weight"
                                                                {{ $shippers->volumetric_weight === 'on' ? 'checked' : '' }}>
                                                            <div class="slider round">
                                                                <span class="on" data-value="on"></span>
                                                                <span class="off" data-value="off"></span>
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
                                                            onclick="addInnerForm({{ $shippers->id }})"><i
                                                                class="fas fa-md fa-fw fa-plus"></i>Add
                                                            Contact Person</button>
                                                    </div>

                                                    <div class="col-4">
                                                    </div>

                                                    <div class="col-4">
                                                        <button class="btn btn-danger btn-sm" id="clear1"
                                                            type="button"><i class="fas fa-lg fa-fw fa-eraser"></i>
                                                            Clear</button>
                                                    </div>

                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-4 d-none" id="UpdateFormContainer"
                                            style="padding-left: 8%; padding-top:2%;">
                                            <h5>Add a New Contact Person</h5>
                                            <div class="row">
                                                <div class="form-group">
                                                    <label class=" text-lg-right col-form-label">Name<span
                                                            class="text-danger">*</span></label>
                                                    <div class="input-group m-b-10">
                                                        <div class="input-group-prepend"><span class="input-group-text"><i
                                                                    class="fa fa-user"></i></span></div>
                                                        <input type="text" name="name" id="cp_name"
                                                            placeholder="Name" data-parsley-group="step-1"
                                                            data-parsley-required="true" class="form-control txtValidate">
                                                        <input type="hidden" id="cp_id" name="id">
                                                        <input type="hidden" id="cp_shipper_id" name="shipper_id">
                                                    </div>
                                                </div>



                                                <div class="form-group">
                                                    <label class=" text-lg-right col-form-label">Designation<span
                                                            class="text-danger">*</span></label>
                                                    <div class="input-group m-b-10">
                                                        <div class="input-group-prepend"><span class="input-group-text"><i
                                                                    class="fa fa-user"></i></span></div>
                                                        <input type="text" name="designation" id="cp_designation"
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
                                                        <input type="email" name="email" id="cp_email"
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
                                                        <input type="number" name="contactoffice1"
                                                            id="cp_contactoffice1" placeholder="Contact Office 1"
                                                            data-parsley-group="step-1" data-parsley-required="true"
                                                            class="form-control txtValidate">
                                                    </div>
                                                </div>

                                                <div class="form-group">
                                                    <label class=" text-lg-right col-form-label">Contact Office 2<span
                                                            class="text-danger">*</span></label>
                                                    <div class="input-group m-b-10">
                                                        <div class="input-group-prepend"><span class="input-group-text"><i
                                                                    class="fa fa-mobile"></i></span></div>
                                                        <input type="number" name="contactoffice2"
                                                            id="cp_contactoffice2" placeholder="Contact Office 2"
                                                            data-parsley-group="step-1" data-parsley-required="true"
                                                            class="form-control txtValidate">
                                                    </div>
                                                </div>

                                                <div class="row mt-5 mb-5">
                                                    <div class="col-5">
                                                        <button class="btn btn-success btn-sm" type="button"
                                                            onclick="UpdateInnerForm({{ json_encode($contact_person) }})">
                                                            <i class="fas fa-md fa-fw fa-plus"></i>Update Contact Person
                                                        </button>
                                                    </div>

                                                    <div class="col-4">
                                                    </div>

                                                    <div class="col-3">
                                                        <button class="btn btn-danger btn-sm" id="clear2"
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
                                                    <table class="table table-hover m-b-0 c_list" id="myDataTable">
                                                        <thead>
                                                            <tr>
                                                                <th>Name</th>
                                                                <th>Designation</th>
                                                                <th>Email</th>
                                                                <th>Contact No 1</th>
                                                                <th>Contact No 2</th>
                                                                <th>Action</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody id="preview">
                                                            @if ($contact_person->isNotEmpty())
                                                                {{-- @dump($contact_person); --}}
                                                                @foreach ($contact_person as $person)
                                                                    <tr>
                                                                        <td>{{ $person->name }}</td>
                                                                        <td>{{ $person->designation }}</td>
                                                                        <td>{{ $person->email }}</td>
                                                                        <td>{{ $person->contactoffice1 }}</td>
                                                                        <td>{{ $person->contactoffice2 }}</td>
                                                                        <td style="display:flex;">
                                                                            <button type="button"
                                                                                class="btn btn-primary btn-sm fa fa-edit"
                                                                                style="background-color: #007aff;"
                                                                                data-contactperson-id="{{ $person->id }}"
                                                                                data-toggle="modal" data-target="#"
                                                                                onclick="myFunction()"></button>
                                                                            &nbsp;
                                                                            <button type="button"
                                                                                class="delete-btn btn btn-danger btn-sm fa fa-trash"
                                                                                data-contactperson-id="{{ $person->id }}"
                                                                                data-toggle="modal"
                                                                                data-target="#contactpersondeleteModal"></button>
                                                                        </td>
                                                                    </tr>
                                                                @endforeach
                                                            @else
                                                                <tr>
                                                                    <td colspan="6">No Contact Persons Available.</td>
                                                                </tr>
                                                            @endif
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
                                                    data-target="#EditAddShipperModal"><i class="fa fa-plus"></i>Add
                                                    File</a>
                                            </div>
                                            <div class="body">
                                                <div class="table-responsive check-all-parent">
                                                    <table class="table table-hover m-b-0 c_list" id="Table">
                                                        <thead>
                                                            <tr>
                                                                <th> File Name </th>
                                                                <th> Action </th>
                                                            </tr>
                                                        </thead>
                                                        <tbody id="review">
                                                            @if ($shipper_files->isNotEmpty())
                                                                {{-- @dump($contact_person); --}}
                                                                @foreach ($shipper_files as $files)
                                                                    <tr>
                                                                        <td>{{ $files->file_name }}</td>
                                                                        <td style="display:flex;">
                                                                            <button type="button"
                                                                                class="btn btn-primary btn-sm fa fa-eye"
                                                                                style="background-color: #007aff;"
                                                                                onclick="showImage('{{ $files->myfile }}')"></button>
                                                                            &nbsp;
                                                                            <a href="javascript:void(0);"
                                                                                id="show-employee" data-toggle="modal"
                                                                                data-target="#FilesEditShipperModal"
                                                                                data-url="{{ url('/admin/shipper_files/edit/' . $files->id) }}"
                                                                                class="btn btn-primary btn-sm fa fa-edit"
                                                                                type="button"
                                                                                style="background-color: #007aff;
                                                                            border-color: #007aff;">
                                                                            </a>
                                                                            &nbsp;
                                                                            <button type="button"
                                                                                class="files-delete-btn btn btn-danger btn-sm fa fa-trash"
                                                                                data-shipperfile-id="{{ $files->id }}"
                                                                                data-toggle="modal"
                                                                                data-target="#shipperfilesdeleteModal"></button>
                                                                        </td>
                                                                    </tr>
                                                                @endforeach
                                                            @else
                                                                <tr>
                                                                    <td colspan="6" class="text-center">No Files
                                                                        Available.
                                                                    </td>
                                                                </tr>
                                                            @endif
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
                                                class="btn btn-secondary btn-sm sw-btn-prev" onclick="backStep(3)"
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
                                                            @foreach ($fetch_employees as $key)
                                                                @if ($key->id == $shippers->employee)
                                                                    @php
                                                                        $sell = 'selected';
                                                                    @endphp
                                                                @else
                                                                    @php
                                                                        $sell = '';
                                                                    @endphp
                                                                @endif
                                                                <option value="{{ $key->id }}" {{ $sell }}>
                                                                    {{ $key->emp_first_name }}</option>
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
                                                            @foreach ($fetch_drivers as $key)
                                                                @if ($key->id == $shippers->driver)
                                                                    @php
                                                                        $sell = 'selected';
                                                                    @endphp
                                                                @else
                                                                    @php
                                                                        $sell = '';
                                                                    @endphp
                                                                @endif
                                                                <option value="{{ $key->id }}" {{ $sell }}>
                                                                    {{ $key->employee_name }}</option>
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
                                                    <label class="text-lg-right col-form-label">Username <span
                                                            class="text-danger">*</span></label>
                                                    <div class="input-group-prepend"><span class="input-group-text"><i
                                                                class="fa fa-user"></i></span>
                                                        <input type="text" name="user_name" id="user_name"
                                                            placeholder="Company Name" data-parsley-group="step-1"
                                                            data-parsley-required="true" class="form-control txtValidate"
                                                            value="{{ $shippers->user_name }}">
                                                    </div>
                                                </div>

                                            </div>


                                            <div class="col-3">
                                                <div class="form-group">
                                                    <label class="text-lg-right col-form-label">Password <span
                                                            class="text-danger">*</span></label>
                                                    <div class="input-group-prepend"><span class="input-group-text"><i
                                                                class="fa fa-lock"></i></span>
                                                        <input type="password" name="password" id="password"
                                                            placeholder="Company Name" data-parsley-group="step-1"
                                                            data-parsley-required="true" class="form-control txtValidate"
                                                            value="{{ $shippers->password }}">
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
                                                            id="confirm_password" placeholder="Company Name"
                                                            data-parsley-group="step-1" data-parsley-required="true"
                                                            class="form-control txtValidate"
                                                            value="{{ $shippers->confirm_password }}">
                                                    </div>
                                                </div>

                                            </div>

                                            <div class="col-3">
                                                <div class="form-group  m-b-10">
                                                    <label class=" text-lg-right col-form-label">Status<span
                                                            class="text-danger">*</span></label>
                                                    <br>
                                                    <label class="switch">
                                                        <input type="checkbox" id="status"
                                                            data-parsley-multiple="status" name="status"
                                                            {{ $shippers->status === 'on' ? 'checked' : '' }}>
                                                        <div class="slider round">
                                                            <span class="on" data-value="on">Enable</span>
                                                            <span class="off" data-value="off">Disable</span>
                                                        </div>
                                                    </label>
                                                </div>
                                            </div>
                                        </div>


                                        <div class="row mb-5" style="margin-left: 57rem;">
                                            <button class="btn btn-primary text-light" type="submit" value="Submit"
                                                style="color: #fff;
                                    background-color: #007aff;
                                    border-color: #007aff;
                                    -webkit-box-shadow: 0;
                                    box-shadow: 0;"><i
                                                    class="fa fa-file"></i>Update Shipper</button>
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
                                            <button class="btn btn-secondary btn-sm sw-btn-next disabled" id="stepFive"
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





    <!-- Edit Add Modal -->
    @include('admin.modal.edit_add_shipper_files')
    <!-- Edit Add Modal -->

    <!-- Edit  Modal -->
    @include('admin.modal.files_edit_shipper')
    <!-- Edit  Modal -->

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

        $(document).ready(function() {
            $("#editshipper").on("submit", function(e) {
                e.preventDefault();

                var formData = new FormData();
                formData.append('_token', '{{ csrf_token() }}');
                formData.append('id', $("#id").val());
                formData.append('shipper_code', $("#shipper_code").val());
                formData.append('company_name', $("#company_name").val());
                formData.append('manager_name', $("#manager_name").val());
                formData.append('shipper_email', $("#shipper_email").val());
                formData.append('contact_office_1', $("#contact_office_1").val());
                formData.append('contact_office_2', $("#contact_office_2").val());
                formData.append('trade_license_no', $("#trade_license_no").val());
                formData.append('country', $("#country").val());
                formData.append('volumetric_weight', $("#volumetric_weight").is(":checked") ? "on" : "off");
                formData.append('city', $("#city").val());
                formData.append('area', $("#area").val());
                formData.append('street_address', $("#street_address").val());
                formData.append('shipper_image', $('input[name="shipper_image"]')[0].files[0]);
                formData.append('employee', $("#employee").val());
                formData.append('driver', $("#driver").val());
                formData.append('user_name', $("#user_name").val());
                formData.append('password', $("#password").val());
                formData.append('confirm_password', $("#confirm_password").val());
                formData.append('status', $("#status").is(":checked") ? "on" : "off");

                $.ajax({
                    type: "POST",
                    url: "{{ route('admin.shipper.update') }}",
                    data: formData,
                    processData: false,
                    contentType: false,
                    success: function(data) {
                        if (data) {
                            alert('Shipper Updated Successfully');
                            location.reload(true);
                        }
                    },
                    error: function(data, textStatus, errorThrown) {
                        alert('Shipper Updated Unsuccessfully');
                        console.log(data);
                    },
                });
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

        let innerFormCounter = 1;

        function addInnerForm(shipper_id) {
            const innerFormContainer = document.getElementById('innerFormContainer');

            const innerForm = document.createElement('form');
            innerForm.id = `innerForm${innerFormCounter}`;
            innerForm.classList.add('innerForm');

            var _token = '{{ csrf_token() }}';
            var name = $("#name").val();
            var designation = $("#designation").val();
            var email = $("#email").val();
            var contactoffice1 = $("#contactoffice1").val();
            var contactoffice2 = $("#contactoffice2").val();

            var formData = new FormData();
            formData.append('_token', _token);
            formData.append('shipper_id', shipper_id);
            formData.append('name', name);
            formData.append('designation', designation);
            formData.append('email', email);
            formData.append('contactoffice1', contactoffice1);
            formData.append('contactoffice2', contactoffice2);

            $.ajax({
                type: "POST",
                url: "{{ url('/admin/contact_person/edit_save') }}",
                data: formData,
                processData: false,
                contentType: false,
                success: function(response) {
                    if (response.status === 'success') {
                        alert('Contact Person Added Successfully');
                        $("#innerFormContainer input").val("");

                        innerFormContainer.appendChild(innerForm);
                        innerFormCounter++;


                    } else {
                        alert('Contact Person Added Unsuccessfully');
                    }
                },
                error: function(xhr, textStatus, errorThrown) {
                    alert('Contact Person Added Unsuccessfully');
                }
            });

            $.ajax({
                headers: {
                    'X-CSRF-TOKEN': _token,
                },
                url: "{{ route('admin.contact_person.get_values') }}",
                type: "POST",
                data: {
                    id: shipper_id,
                },
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
                                    <button type="button" class="btn btn-primary btn-sm fa fa-edit" style="background-color: #007aff;"
                                        data-contactperson-id="${item.id}" data-toggle="modal"
                                        data-target="#" onclick="myFunction()"></button>
                                        &nbsp;
                                        <button type="button" class="delete-btn btn btn-danger btn-sm fa fa-trash"
                                        data-contactperson-id="${item.id}" data-toggle="modal"
                                        data-target="#contactpersondeleteModal"></button>
                                </td>
                            </tr>`;
                    });

                    var previewElement = document.getElementById('preview');
                    if (previewElement) {
                        previewElement.innerHTML = html;
                    }
                }
            });

        }

        $(document).on('click', '.delete-btn', function() {
            var contactPersonId = $(this).data('contactperson-id');
            $('#confirmDeleteBtn').off('click');

            $('#confirmDeleteBtn').click(function() {
                var token = $('meta[name="csrf-token"]').attr('content');

                $.ajax({
                    url: '/admin/contact_person/delete/' + contactPersonId,
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

        function myFunction() {
            var id = $(event.target).data('contactperson-id');
            $('#innerFormContainer').addClass('d-none');
            $('#UpdateFormContainer').removeClass('d-none');
            $.ajax({
                headers: {
                    'X-CSRF-TOKEN': "{{ csrf_token() }}",
                },
                url: "{{ route('admin.contact_person.edit_values') }}",
                type: "POST",
                data: {
                    // session_id : session_id,
                    id: id,
                },
                success: function(response) {
                    // console.log(response);
                    // console.log(response.id);
                    $('#cp_id').val(response.id);
                    $('#cp_shipper_id').val(response.shipper_id);
                    $('#cp_name').val(response.name);
                    $('#cp_designation').val(response.designation);
                    $('#cp_email').val(response.email);
                    $('#cp_contactoffice1').val(response.contactoffice1);
                    $('#cp_contactoffice2').val(response.contactoffice2);
                    // $('#subject_id').html(response);

                    // $('#modal-default').modal('show');
                }
            });
        }

        let outerFormCounter = 1;

        function UpdateInnerForm(contact_person, shipper_id) {
            const UpdateFormContainer = document.getElementById('UpdateFormContainer');

            const innerForm = document.createElement('form');
            innerForm.id = `innerForm${outerFormCounter}`;
            innerForm.classList.add('innerForm');

            var _token = '{{ csrf_token() }}';
            var id = $("#cp_id").val();
            var shipper_id = $("#cp_shipper_id").val();
            var name = $("#cp_name").val();
            var designation = $("#cp_designation").val();
            var email = $("#cp_email").val();
            var contactoffice1 = $("#cp_contactoffice1").val();
            var contactoffice2 = $("#cp_contactoffice2").val();

            var formData = new FormData();
            formData.append('_token', _token);
            formData.append('cp_id', id);
            formData.append('cp_shipper_id', shipper_id);
            formData.append('cp_name', name);
            formData.append('cp_designation', designation);
            formData.append('cp_email', email);
            formData.append('cp_contactoffice1', contactoffice1);
            formData.append('cp_contactoffice2', contactoffice2);

            $.ajax({
                type: "POST",
                url: "{{ url('/admin/contact_person/update') }}",
                data: formData,
                processData: false,
                contentType: false,
                success: function(response) {
                    if (response.status === 'success') {
                        alert('Contact Person Updated Successfully');
                        $("#UpdateFormContainer input").val("");

                        UpdateFormContainer.appendChild(innerForm);
                        outerFormCounter++;
                    } else {
                        alert('Error: Failed to update Contact Person');
                    }
                },
                error: function(xhr, status, error) {
                    console.error(error);
                    alert('Error: Failed to update Contact Person');
                }
            });

            $.ajax({
                headers: {
                    'X-CSRF-TOKEN': _token,
                },
                url: "{{ route('admin.contact_person.get_values') }}",
                type: "POST",
                data: {
                    id: shipper_id,
                },
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
                                    <button type="button" class="btn btn-primary btn-sm fa fa-edit" style="background-color: #007aff;"
                                        data-contactperson-id="${item.id}" data-toggle="modal"
                                        data-target="#" onclick="myFunction()"></button>
                                        &nbsp;
                                        <button type="button" class="delete-btn btn btn-danger btn-sm fa fa-trash"
                                        data-contactperson-id="${item.id}" data-toggle="modal"
                                        data-target="#contactpersondeleteModal"></button>
                                </td>
                            </tr>`;
                    });

                    var previewElement = document.getElementById('preview');
                    if (previewElement) {
                        previewElement.innerHTML = html;
                    }
                }
            });
        }

        $(document).ready(function() {
            $("#clear1").click(function() {
                $("#innerFormContainer input").val("");
            });

            $("#clear2").click(function() {
                $("#UpdateFormContainer input").val("");
            });

        });

        function all_files() {
            var id = $('#id').val();
            $.ajax({
                headers: {
                    'X-CSRF-TOKEN': "{{ csrf_token() }}",
                },
                url: "{{ route('admin.shipper_files.get') }}",
                type: "POST",
                data: {
                    id: id,
                },
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
                        <a href="javascript:void(0);" id="show-employee"
                                                                    data-toggle="modal"
                                                                    data-target="#FilesEditShipperModal"
                                                                    data-url="{{ url('/shipper_files/edit/') }}${item.id}"
                                                                    class="btn btn-primary btn-sm fa fa-edit"
                                                                    type="button"
                                                                    style="background-color: #007aff;
                                                                    border-color: #007aff;">
                                                                </a>
                        &nbsp;
                        <button type="button" class="files-delete-btn btn btn-danger btn-sm fa fa-trash"
                            data-shipperfile-id="${item.id}" data-toggle="modal"
                            data-target="#shipperfilesdeleteModal"></button>
                    </td>
                </tr>`;
                    });

                    document.getElementById('review').innerHTML = html;
                }
            });
        }

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

        function showImage(imageUrl) {
            var baseUrl = "http://127.0.0.1:8000/shipper_files_images/";
            var imageUrl = baseUrl + imageUrl;
            window.open(imageUrl, "_blank");
        }

        $("body").on("click", "#show-employee", function() {
            var candidateURL = $(this).data('url');
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $.get(candidateURL, function(data) {
                console.log(data);
                $('#FilesEditShipperModal').modal('show');
                $('#s-id').val(data.id);
                $('#s-shipper_id').val(data.shipper_id);
                $('#s-file_name').val(data.file_name);
                $('#s-name_file').val(data.myfile);
                // $('#s-uploadfile').val(data.myfile);
            });
        });
        $('.close_modal').click(function() {
            $('#FilesEditShipperModal').modal('hide');
        });
    </script>
@endsection

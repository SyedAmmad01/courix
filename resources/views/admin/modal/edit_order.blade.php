    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.min.js"></script>
    <script src="https://momentjs.com/downloads/moment.js"></script>
    <link href="{{ asset('css/wizard.css') }}" rel="stylesheet" id="bootstrap-css">
    <?php
    $allSteps = [
        [
            'step' => 1,
            'title' => 'Basic Details',
        ],
        [
            'step' => 2,
            'title' => 'Shippers Information',
        ],
        [
            'step' => 3,
            'title' => 'Reciptient Information',
        ],
        [
            'step' => 4,
            'title' => 'Shipment Items',
        ],
    ];
    $isCurrentStep = 1;
    ?>

    <div class="modal fade bd-example-modal-xl w-100" id="editorder" tabindex="-1" aria-labelledby="myLargeModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-xl">
            <div class="modal-content">
                <form class="needs-validation" id="EditOrderForm" novalidate>
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel" style="font-weight: bold;">Edit Order</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="card-body">
                            <ul class="progressbar">
                                @foreach ($allSteps as $item)
                                    <li id="tab-{{ $item['step'] }}" onclick="onNextTab({{ $item['step'] }})"
                                        class="step-box-deactive">
                                        <a style="cursor: pointer;">
                                            <div id="tab-circel-{{ $item['step'] }}"
                                                class="step-count step-deactive-circel">
                                                <p>{{ $item['step'] }}</p>
                                            </div>
                                            <div class="step-box">
                                                <h4
                                                    style="{{ $isCurrentStep == $item['step'] ? 'color: #fff !important;' : 'color:rgb(100, 100, 100) !important;' }}">
                                                    {{ $item['title'] }}</h4>
                                            </div>
                                        </a>
                                    </li>
                                @endforeach
                            </ul>
                            <div class="row p-4 bg-light d-flex setup-content" id="step-1">
                                <div class="card card-custom example example-compact w-100">
                                    <div class="row" style="margin-left: 40rem;">
                                        <h2>Basic Details</h2>
                                    </div>
                                    <div class="row ml-2 mr-2">
                                        <div class="col-md-6">
                                            <div class="mb-3">
                                                {{-- <input type="text" id="" name="id" class="u-id"> --}}
                                                {{-- <input type="text" id="EditOrderModalContent"
                                                    name="EditOrderModalContent" readonly>
                                                <input type="text" id="co_id" name="id" readonly> --}}
                                                <input type="hidden" id="s-id" name="id" readonly>
                                                <label class=" text-lg-right col-form-label">Shipper<span
                                                        class="text-danger">*</span></label>
                                                <div class="input-group m-b-10">
                                                    <div class="input-group-prepend"><span class="input-group-text"><i
                                                                class="fa fa-user"></i></span></div>
                                                    <select class="form-control u-shipper_code" id=""
                                                        name="shipper">
                                                        <option value="" selected disabled>Please Select Shipper
                                                        </option>
                                                        @foreach ($fetch_shippers as $key)
                                                            <option value="{{ $key->id }}">
                                                                {{ $key->shipper_code }}|{{ $key->company_name }}|{{ $key->contact_office_1 }}
                                                            </option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>


                                            <div class="mb-3">
                                                <label class="text-lg-right col-form-label">Order Date <span
                                                        class="text-danger">*</span></label>
                                                <div class="input-group m-b-10">
                                                    <div class="input-group-prepend"><span class="input-group-text">
                                                            <i class="fas fa-lg fa-fw  fa-calendar-alt"></i></span>
                                                    </div>
                                                    <input type="date" name="order_date" id=""
                                                        data-parsley-group="step-1" data-parsley-required="true"
                                                        class="form-control u-order_date txtValidate">
                                                </div>
                                            </div>

                                            <div class="mb-3">
                                                <label class=" text-lg-right col-form-label">Shipment Status<span
                                                        class="text-danger">*</span></label>
                                                <div class="input-group m-b-10">
                                                    <div class="input-group-prepend"><span class="input-group-text">
                                                            <i class="fas fa-lg fa-fw  fa-flag-checkered"></i></span>
                                                    </div>
                                                    <select class="form-control u-status_id" id=""
                                                        name="shipment_status">
                                                        <option value="" selected disabled>Please Select Shipment
                                                            Status</option>
                                                        @foreach ($fetch_status as $key)
                                                            <option value="{{ $key->id }}">{{ $key->name }}
                                                            </option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>

                                            <div class="mb-3">
                                                <label class="text-lg-right col-form-label">Barcode<span
                                                        class="text-danger">*</span></label>
                                                <div class="input-group m-b-10">
                                                    <div class="input-group-prepend"><span class="input-group-text">
                                                            <i class="fas fa-lg fa-fw fa-barcode"></i></span></div>
                                                    <input type="text" name="" id=""
                                                        placeholder="Barcode" data-parsley-group="step-1"
                                                        data-parsley-required="true" class="form-control u-barcode txtValidate">
                                                </div>
                                            </div>

                                            <div class="mb-3">
                                                <label class="text-lg-right col-form-label">Remarks<span
                                                        class="text-danger">*</span></label>
                                                <div class="input-group m-b-10">
                                                    <div class="input-group-prepend"><span class="input-group-text">
                                                            <i class="fas fa-lg fa-fw fa-quote-left"></i></span></div>
                                                    <input type="text" name="instruction" id=""
                                                        placeholder="Remarks" data-parsley-group="step-1"
                                                        data-parsley-required="true"
                                                        class="form-control u-instruction txtValidate">
                                                </div>
                                            </div>


                                            <div class="mb-3">
                                                <label class="text-lg-right col-form-label">Description<span
                                                        class="text-danger">*</span></label>
                                                <div class="input-group m-b-10">
                                                    <div class="input-group-prepend"><span class="input-group-text">
                                                            <i class="fas fa-lg fa-fw fa-edit"></i></span></div>
                                                    <input type="text" name="description" id=""
                                                        placeholder="Description" data-parsley-group="step-1"
                                                        data-parsley-required="true"
                                                        class="form-control u-description txtValidate">
                                                </div>
                                            </div>



                                        </div>
                                        <div class="col-md-6">
                                            <div class="mb-3 ">
                                                <label class=" text-lg-right col-form-label">Driver<span
                                                        class="text-danger">*</span></label>
                                                <div class="input-group m-b-10">
                                                    <div class="input-group-prepend"><span class="input-group-text"><i
                                                                class="fa fa-user"></i></span></div>
                                                    <select class="form-control u-driver_id" id=""
                                                        name="driver" disabled>
                                                        <option value="" selected disabled>Please Select Driver
                                                        </option>
                                                        @foreach ($fetch_drivers as $key)
                                                            <option value="{{ $key->id }}">
                                                                {{ $key->driver_code }}|{{ $key->employee_name }}
                                                            </option>
                                                        @endforeach
                                                    </select>

                                                </div>
                                            </div>



                                            <div class="mb-3">
                                                <label class=" text-lg-right col-form-label">Service Type<span
                                                        class="text-danger">*</span></label>
                                                <div class="input-group m-b-10">
                                                    <div class="input-group-prepend"><span class="input-group-text">
                                                            <i class="fas fa-lg fa-fw  fa-flag-checkered"></i></span>
                                                    </div>
                                                    <select class="form-control u-service_type" id=""
                                                        name="service_type">
                                                        <option value="" selected disabled>Please Select Service
                                                            Type</option>
                                                        <option value="NDD">NDD - Next Day Delivery</option>
                                                        <option value="SDD">SDD - Same Day Delivery</option>
                                                        <option value="ODA">ODA - Out Of Service Area</option>
                                                        <option value="RS">RS - Return Service</option>
                                                    </select>
                                                </div>
                                            </div>

                                            <div class="mb-3">
                                                <label class="text-lg-right col-form-label">Reference Number
                                                    (Optional)<span class="text-danger">*</span></label>
                                                <div class="input-group m-b-10">
                                                    <div class="input-group-prepend"><span class="input-group-text">
                                                            <i class="fab fa-lg fa-fw fa-slack-hash"></i></span></div>
                                                    <input type="text" name="reference_number" id=""
                                                        placeholder="Reference Number(Optional)"
                                                        data-parsley-group="step-1" data-parsley-required="true"
                                                        class="form-control u-reference_number txtValidate">
                                                </div>
                                            </div>

                                            <div class="mb-3">
                                                <label class="text-lg-right col-form-label">COD<span
                                                        class="text-danger">*</span></label>
                                                <div class="input-group m-b-10">
                                                    <div class="input-group-prepend"><span class="input-group-text">
                                                            <i class="far fa-lg fa-fw  fa-money-bill-alt"></i></span>
                                                    </div>
                                                    <input type="number" name="cod" id=""
                                                        placeholder="COD" data-parsley-group="step-1"
                                                        data-parsley-required="true"
                                                        class="form-control u-cod txtValidate" readonly>

                                                </div>
                                            </div>

                                            <div class="mb-3">
                                                <label class="text-lg-right col-form-label">Service Charges<span
                                                        class="text-danger">*</span></label>
                                                <div class="input-group m-b-10">
                                                    <div class="input-group-prepend"><span class="input-group-text">
                                                            <i class="fab fa-lg fa-fw fa-slack-hash"></i></span></div>
                                                    <input type="number" name="service_charges" id=""
                                                        placeholder="Service Charges" data-parsley-group="step-1"
                                                        data-parsley-required="true"
                                                        class="form-control u-service_charges txtValidate" readonly>
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
                                                type="button" value="">Next</button>
                                        </div>

                                    </div>
                                </div>



                            </div>
                            <div class="row p-4 bg-light d-flex setup-content displayNone" id="step-2">
                                <div class="card card-custom example example-compact w-100">
                                    <div class="row" style="margin-left: 40rem;">
                                        <h2>Shipper Information</h2>
                                    </div>
                                    <div class="row ml-2 mr-2">
                                        <div class="col-md-6">
                                            <div class="mb-3">
                                                <label class=" text-lg-right col-form-label">Shipper Name<span
                                                        class="text-danger">*</span></label>
                                                <div class="input-group m-b-10">
                                                    <div class="input-group-prepend"><span class="input-group-text"><i
                                                                class="fa fa-user"></i></span></div>
                                                    <input type="text" name="shipper_name" id=""
                                                        placeholder="Shipper Name" data-parsley-group="step-2"
                                                        data-parsley-required="true"
                                                        class="form-control u-shipper_name txtValidate" readonly>
                                                </div>
                                            </div>
                                            <div class="mb-3">
                                                <label class="text-lg-right col-form-label">Shipper Code<span
                                                        class="text-danger">*</span></label>
                                                <div class="input-group m-b-10">
                                                    <div class="input-group-prepend"><span class="input-group-text">
                                                            <i class="fa fa-user"></i></span></div>
                                                    <input type="text" name="shipper_name" id=""
                                                        placeholder="Shipper Code" data-parsley-group="step-2"
                                                        data-parsley-required="true"
                                                        class="form-control u-s_code txtValidate" readonly>

                                                </div>
                                            </div>

                                            <div class="mb-3">
                                                <label class=" text-lg-right col-form-label">Contact Office 1<span
                                                        class="text-danger">*</span></label>
                                                <div class="input-group m-b-10">
                                                    <div class="input-group-prepend"><span class="input-group-text">
                                                            <i class="fa fa-phone"></i></span>
                                                    </div>
                                                    <input type="text" name="contact_office_1" id=""
                                                        placeholder="Contact Office 1" data-parsley-group="step-2"
                                                        data-parsley-required="true"
                                                        class="form-control u-contact_office_1 txtValidate" readonly>
                                                </div>
                                            </div>

                                            <div class="mb-3">
                                                <label class="text-lg-right col-form-label">Contact Office 2<span
                                                        class="text-danger">*</span></label>
                                                <div class="input-group m-b-10">
                                                    <div class="input-group-prepend"><span class="input-group-text">
                                                            <i class="fa fa-phone"></i></span></div>
                                                    <input type="text" name="contact_office_2" id=""
                                                        placeholder="Contact Office 2" data-parsley-group="step-2"
                                                        data-parsley-required="true"
                                                        class="form-control u-contact_office_2 txtValidate" readonly>
                                                </div>
                                            </div>





                                        </div>
                                        <div class="col-md-6">
                                            <div class="mb-3 ">
                                                <label class=" text-lg-right col-form-label">Country<span
                                                        class="text-danger">*</span></label>
                                                <div class="input-group m-b-10">
                                                    <div class="input-group-prepend"><span class="input-group-text">
                                                            <i class="fas fa-lg fa-fw  fa-flag"></i></span></div>
                                                    <select class="form-control u-shipper_country" id=""
                                                        name="shipper_country" disabled>
                                                        @foreach ($fetch_countrys as $key)
                                                            <option value="{{ $key->id }}">{{ $key->name }}
                                                            </option>
                                                        @endforeach
                                                    </select>

                                                </div>
                                            </div>



                                            <div class="mb-3">
                                                <label class=" text-lg-right col-form-label">City<span
                                                        class="text-danger">*</span></label>
                                                <div class="input-group m-b-10">
                                                    <div class="input-group-prepend"><span class="input-group-text">
                                                            <i class="fas fa-lg fa-fw  fa-flag"></i></span>
                                                    </div>
                                                    <select class="form-control u-shipper_city" id=""
                                                        name="shipper_city" disabled>
                                                        @foreach ($cities as $key)
                                                            <option value="{{ $key->id }}">{{ $key->name }}
                                                            </option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>

                                            <div class="mb-3">
                                                <label class="text-lg-right col-form-label">Area<span
                                                        class="text-danger">*</span></label>
                                                <div class="input-group m-b-10">
                                                    <div class="input-group-prepend"><span class="input-group-text">
                                                            <i class="fas fa-lg fa-fw  fa-flag"></i></span></div>
                                                    <select class="form-control u-shipper_area" id=""
                                                        name="shipper_area" disabled>
                                                        @foreach ($fetch_areas as $key)
                                                            <option value="{{ $key->id }}">{{ $key->name }}
                                                            </option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>

                                            <div class="mb-3">
                                                <label class="text-lg-right col-form-label">Street<span
                                                        class="text-danger">*</span></label>
                                                <div class="input-group m-b-10">
                                                    <div class="input-group-prepend"><span class="input-group-text">
                                                            <i class="fas fa-lg fa-fw m-r-10 fa-road"></i></span></div>
                                                    <input type="text" name="shipper_address" id=""
                                                        placeholder="Street" data-parsley-group="step-2"
                                                        data-parsley-required="true"
                                                        class="form-control u-shipper_address txtValidate" readonly>
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
                                                type="button" value="">Next</button>
                                        </div>

                                    </div>
                                </div>


                            </div>
                            <div class="row p-4 bg-light d-flex setup-content displayNone" id="step-3">
                                <div class="card card-custom example example-compact w-100">
                                    <div class="row" style="margin-left: 40rem;">
                                        <h2>Recipient Information</h2>
                                    </div>
                                    <div class="row" style="margin-left: 45rem;">
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" value=""
                                                id="myCheck" onclick="myFunction()">
                                            <label class="form-check-label" for="flexCheckChecked">
                                                Is Manual Address
                                            </label>
                                        </div>
                                    </div>
                                    <div class="row ml-2 mr-2">
                                        <div class="col-md-6">
                                            <div class="mb-3">
                                                <label class=" text-lg-right col-form-label">Recipient Name<span
                                                        class="text-danger">*</span></label>
                                                <div class="input-group m-b-10">
                                                    <div class="input-group-prepend"><span class="input-group-text"><i
                                                                class="fa fa-user"></i></span></div>
                                                    <input type="text" name="reciver_name" id=""
                                                        placeholder="Shipper Name" data-parsley-group="step-3"
                                                        data-parsley-required="true"
                                                        class="form-control u-reciver_name txtValidate">
                                                </div>
                                            </div>
                                            <div class="mb-3">
                                                <label class="text-lg-right col-form-label">Mobile<span
                                                        class="text-danger">*</span></label>
                                                <div class="input-group m-b-10">
                                                    <div class="input-group-prepend"><span class="input-group-text">
                                                            <i class="fa fa-user"></i></span></div>
                                                    <input type="text" name="mobile_1" id=""
                                                        placeholder="Shipper Code" data-parsley-group="step-3"
                                                        data-parsley-required="true"
                                                        class="form-control u-mobile_1 txtValidate">

                                                </div>
                                            </div>

                                            <div class="mb-3">
                                                <label class=" text-lg-right col-form-label">Mobile 2<span
                                                        class="text-danger">*</span></label>
                                                <div class="input-group m-b-10">
                                                    <div class="input-group-prepend"><span class="input-group-text">
                                                            <i class="fa fa-phone"></i></span>
                                                    </div>
                                                    <input type="text" name="mobile_2" id=""
                                                        placeholder="Contact Office 1" data-parsley-group="step-3"
                                                        data-parsley-required="true"
                                                        class="form-control u-mobile_2 txtValidate">
                                                </div>
                                            </div>

                                            <div class="mb-3">
                                                <label class="text-lg-right col-form-label">LandLine<span
                                                        class="text-danger">*</span></label>
                                                <div class="input-group m-b-10">
                                                    <div class="input-group-prepend"><span class="input-group-text">
                                                            <i class="fa fa-phone"></i></span></div>
                                                    <input type="text" name="" id=""
                                                        placeholder="LandLine" data-parsley-group="step-3"
                                                        data-parsley-required="true" class="form-control txtValidate">
                                                </div>
                                            </div>

                                            <div class="mb-3">
                                                <label class="text-lg-right col-form-label">Delivery Code<span
                                                        class="text-danger">*</span></label>
                                                <div class="input-group m-b-10">
                                                    <div class="input-group-prepend"><span class="input-group-text">
                                                            <i class="fa fa-truck"></i></span></div>
                                                    <input type="text" name="" id=""
                                                        placeholder="Delivery Code" data-parsley-group="step-3"
                                                        data-parsley-required="true"
                                                        class="form-control u-delivery_code txtValidate">
                                                </div>
                                            </div>

                                        </div>

                                        <div class="col-md-6 hid" style="display:;">

                                            <div class="mb-3">
                                                <label class=" text-lg-right col-form-label">Country<span
                                                        class="text-danger">*</span></label>
                                                <div class="input-group m-b-10">
                                                    <div class="input-group-prepend"><span class="input-group-text">
                                                            <i class="fas fa-lg fa-fw  fa-flag"></i></span></div>
                                                    <select class="form-control u-reciver_country" id=""
                                                        name="reciver_country" readonly>
                                                        @foreach ($fetch_countrys as $key)
                                                            <option value="{{ $key->id }}">{{ $key->name }}
                                                            </option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>



                                            <div class="mb-3">
                                                <label class=" text-lg-right col-form-label">City<span
                                                        class="text-danger">*</span></label>
                                                <div class="input-group m-b-10">
                                                    <div class="input-group-prepend"><span class="input-group-text">
                                                            <i class="fas fa-lg fa-fw  fa-flag"></i></span>
                                                    </div>
                                                    <select class="form-control u-reciver_city" id=""
                                                        name="reciver_city" readonly>
                                                        @foreach ($cities as $key)
                                                            <option value="{{ $key->id }}">{{ $key->name }}
                                                            </option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>

                                            <div class="mb-3">
                                                <label class="text-lg-right col-form-label">Area<span
                                                        class="text-danger">*</span></label>
                                                <div class="input-group m-b-10">
                                                    <div class="input-group-prepend"><span class="input-group-text">
                                                            <i class="fas fa-lg fa-fw  fa-flag"></i></span></div>
                                                    <select class="form-control u-reciver_area" id=""
                                                        name="reciver_area" readonly>
                                                        @foreach ($fetch_areas as $key)
                                                            <option value="{{ $key->id }}">{{ $key->name }}
                                                            </option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>

                                            <div class="mb-3">
                                                <label class="text-lg-right col-form-label">Street<span
                                                        class="text-danger">*</span></label>
                                                <div class="input-group m-b-10">
                                                    <div class="input-group-prepend"><span class="input-group-text">
                                                            <i class="fas fa-lg fa-fw m-r-10 fa-road"></i></span></div>
                                                    <input type="text" name="reciver_address" id=""
                                                        placeholder="Street" data-parsley-group="step-3"
                                                        data-parsley-required="true"
                                                        class="form-control u-reciver_address txtValidate">
                                                </div>
                                            </div>



                                        </div>

                                        <div class="col-md-6 hide" style="display: none;">
                                            <div class="mb-3 ">
                                                <div class="form-group">
                                                    <label class="text-lg-right col-form-label"><span
                                                            class="text-danger"></span></label>
                                                    <div class="input-group m-b-10">

                                                        <textarea placeholder="Type Here" id="" name="" rows="" cols="40"></textarea>
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
                                                class="btn btn-secondary btn-sm sw-btn-prev" onclick="backStep(3)"
                                                value="previous" type="button">Previous</button>
                                            &nbsp;&nbsp;&nbsp;
                                            <button class="btn btn-secondary btn-sm sw-btn-next" id="stepThree"
                                                type="button" value="">Next</button>
                                        </div>

                                    </div>
                                </div>


                            </div>
                            <div class="row p-4 bg-light d-flex setup-content displayNone" id="step-4">
                                <div class="card card-custom example example-compact w-100">
                                    <div class="row" style="margin-left: 40rem;">
                                        <h2>Shipment Items</h2>
                                    </div>
                                    <div class="row ml-2 mr-2">
                                        <div class="col-md-6">

                                            <div class="mb-3">
                                                <label class=" text-lg-right col-form-label">No. of Pieces<span
                                                        class="text-danger">*</span></label>
                                                <div class="input-group m-b-10">
                                                    <div class="input-group-prepend"><span class="input-group-text">
                                                            <i class="fas fa-lg fa-fw fa-cubes"></i></span></div>
                                                    <input type="text" name="no_of_peices" id="u-no_of_peices"
                                                        placeholder="No. of Pieces" data-parsley-group="step-4"
                                                        data-parsley-required="true"
                                                        class="form-control u-no_of_peices txtValidate"
                                                        onblur="generateFields()">
                                                </div>
                                            </div>

                                            <div class="mb-3">
                                                <input type="text" name="details_of_products[]"
                                                    id="details_of_products" data-parsley-group="step-4"
                                                    data-parsley-required="true"
                                                    class="form-control u-details_of_products txtValidate">
                                            </div>

                                        </div>

                                        <div class="col-md-6">

                                            <div class="mb-3" style="margin-top: 5rem;">
                                                <div class="form-check">
                                                    <input class="form-check-input" type="checkbox" value=""
                                                        id="Check" onclick="box()">
                                                    <label class="form-check-label" for="flexCheckChecked">
                                                        Use specific COD.
                                                    </label>
                                                </div>
                                            </div>

                                            <div class="mb-3">
                                                <input type="text" name="cod_peice[]" id="cod_peice"
                                                    placeholder="" data-parsley-group="step-4"
                                                    data-parsley-required="true"
                                                    class="form-control u-cod_peice txtValidate" readonly>
                                            </div>

                                        </div>

                                        <div id="fieldContainer" style="margin-top:-2rem !important;">
                                        </div>

                                    </div>

                                    <div class="row mb-5">
                                        <div class="col-sm-10">

                                        </div>
                                        <div class="col-sm-2 mt-5">
                                            <div class="button">
                                                <button type="submit" class="btn btn-success">SUBMIT</button>
                                                {{-- <a id="" href="javascript:void(0)" class="btn btn-success">SUBMIT</a> --}}
                                            </div>
                                        </div>

                                    </div>

                </form>
            </div>
            <div class="row mt-5">
                <div class="col-10">
                </div>
                <div class="col-2">
                    <div class="btn-group mr-2 sw-btn-group" role="group"><button
                            class="btn btn-secondary btn-sm sw-btn-prev" onclick="backStep(4)" value="previous"
                            type="button">Previous</button>
                        &nbsp;&nbsp;&nbsp;
                        <button class="btn btn-secondary btn-sm sw-btn-next disabled" id="stepFour" type="button"
                            value="">Next</button>
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
    </div>


    <script type="text/javascript">
        function myFunction() {
            var checkBox = document.getElementById("myCheck");
            if (checkBox.checked == true) {
                $(".hid").css("display", "none");
                $(".hide").css("display", "block");
            } else {
                $(".hid").css("display", "block");
                $(".hide").css("display", "none");
            }
        }

        $(document).ready(function() {
            onNextTab(1);
            $(".select2").select2();
            $("#stepOne").on("click", function() {
                $("#step-1").addClass("displayNone");
                $("#step-2").removeClass("displayNone");
                $(".select2").select2();
                onNextTab(2)
            });
            $("#steptwo").on("click", function() {
                $("#step-1").addClass("displayNone");
                $("#step-2").addClass("displayNone");
                $("#step-3").removeClass("displayNone");
                $(".select2").select2();
                onNextTab(3)
            });
            $("#stepThree").on("click", function() {
                $("#step-1").addClass("displayNone");
                $("#step-2").addClass("displayNone");
                $("#step-3").addClass("displayNone");
                $("#step-4").removeClass("displayNone");
                $(".select2").select2();
                onNextTab(4)
            });
        });

        function backStep(step) {
            if (step == 1) {
                onNextTab(1);
                $("#step-1").removeClass("displayNone");
                $("#step-2").addClass("displayNone");
                $("#step-3").addClass("displayNone");
            } else if (step == 2) {
                onNextTab(2);
                $("#step-1").removeClass("displayNone");
                $("#step-2").addClass("displayNone");
                $("#step-3").addClass("displayNone");
            } else if (step == 3) {
                onNextTab(3);
                $("#step-1").addClass("displayNone");
                $("#step-2").removeClass("displayNone");
                $("#step-3").addClass("displayNone");
            } else if (step == 4) {
                onNextTab(4);
                $("#step-1").addClass("displayNone");
                $("#step-2").addClass("displayNone");
                $("#step-3").removeClass("displayNone");
                $("#step-4").addClass("displayNone");
            }
        }

        function onNextTab(step) {
            if (step == 1) {
                $("#step-1").removeClass("displayNone");
                $("#step-2").addClass("displayNone");
                $("#step-3").addClass("displayNone");
                $("#step-4").addClass("displayNone");
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
                $("#step-1").addClass("displayNone");
                $("#step-2").removeClass("displayNone");
                $("#step-3").addClass("displayNone");
                $("#step-4").addClass("displayNone");
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
                $("#step-1").addClass("displayNone");
                $("#step-2").addClass("displayNone");
                $("#step-3").removeClass("displayNone");
                $("#step-4").addClass("displayNone");
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
                $("#step-1").addClass("displayNone");
                $("#step-2").addClass("displayNone");
                $("#step-3").addClass("displayNone");
                $("#step-4").removeClass("displayNone");
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


        // document.getElementById('search_button').addEventListener('click', function(event) {
        //     // Show or open your modal here (you may need to trigger it as per your framework/library)

        //     // Stop event propagation to prevent unintended behavior
        //     event.stopPropagation();

        //     // Now call the generateFields function
        //     generateFields();

        // });

        function generateFields() {
            // alert('hellow');
            var count = parseInt(document.getElementById('u-no_of_peices').value);
            var container = document.getElementById('fieldContainer');

            // Clear existing fields
            while (container.firstChild) {
                container.firstChild.remove();
            }

            // Generate and append new fields based on the count
            for (var i = 1; i <= count; i++) {
                // Create the parent row div
                var rowDiv = document.createElement('div');
                rowDiv.className = 'row';
                rowDiv.style.marginTop = '-6rem!important;';

                // Create the first col-6 div
                var colDiv1 = document.createElement('div');
                colDiv1.className = 'col-6';

                // Create the first form-group div
                var formGroupDiv1 = document.createElement('div');
                formGroupDiv1.className = 'form-group';

                // Create the first label
                var label1 = document.createElement('label');
                label1.className = 'text-lg-right col-form-label';

                // Create the first input-group div
                var inputGroupDiv1 = document.createElement('div');
                inputGroupDiv1.className = 'input-group m-b-10';

                // Create the first input
                var input1 = document.createElement('input');
                input1.type = 'text';
                input1.name = 'details_of_products[]';
                input1.placeholder = 'Tell Us About Price';
                input1.className = 'form-control u-details_of_products';

                inputGroupDiv1.appendChild(input1);
                formGroupDiv1.appendChild(label1);
                formGroupDiv1.appendChild(inputGroupDiv1);
                colDiv1.appendChild(formGroupDiv1);
                rowDiv.appendChild(colDiv1);

                // Create the second col-6 div
                var colDiv2 = document.createElement('div');
                colDiv2.className = 'col-6';

                // Create the second form-group div
                var formGroupDiv2 = document.createElement('div');
                formGroupDiv2.className = 'form-group';

                // Create the second label
                var label2 = document.createElement('label');
                label2.className = 'text-lg-right col-form-label';

                // Create the second input-group div
                var inputGroupDiv2 = document.createElement('div');
                inputGroupDiv2.className = 'input-group m-b-10';

                var input2 = document.createElement('input');
                input2.type = 'text';
                input2.name = 'cod_peice[]';
                input2.placeholder = 'COD';
                input2.className = 'form-control u-cod_peice';
                // input2.readOnly = true; // Set readonly attribute by default


                inputGroupDiv2.appendChild(input2);
                formGroupDiv2.appendChild(label2);
                formGroupDiv2.appendChild(inputGroupDiv2);
                colDiv2.appendChild(formGroupDiv2);
                rowDiv.appendChild(colDiv2);

                container.appendChild(rowDiv);
            }
        }


        function box() {
            var checkBox = document.getElementById("Check");
            var codInputs = document.getElementsByClassName("u-cod_peice");

            for (var i = 0; i < codInputs.length; i++) {
                var readInput = codInputs[i];
                readInput.readOnly = !checkBox.checked;
            }
        }

        $("#EditOrderForm").on("submit", function(e) {
            e.preventDefault()

            // var csrfToken = $('meta[name="csrf-token"]').attr('content');
            var _token = '{{ csrf_token() }}';
            var id = $(".s-id").val();
            var driver_id = $(".u-driver_id").val();
            var barcode = $(".u-barcode").val();
            var reference_number = $(".u-reference_number").val();
            var order_date = $(".u-order_date").val();
            var service_type = $(".u-service_type").val();
            var shipper_code = $(".u-shipper_code").val();
            var shipper_name = $(".u-shipper_name").val();
            var contact_office_1 = $(".u-contact_office_1").val();
            var reciver_name = $(".u-reciver_name").val();
            var mobile_1 = $(".u-mobile_1").val();
            var mobile_2 = $(".u-mobile_2").val();
            var cod = $(".u-cod").val();
            var service_charges = $(".u-service_charges").val();
            var instruction = $(".u-instruction").val();
            var description = $(".u-description").val();
            var reciver_country = $(".u-reciver_country").val();
            var reciver_city = $(".u-reciver_city").val();
            var reciver_area = $(".u-reciver_area").val();
            var reciver_street_address = $(".u-reciver_address").val();
            var delivery_code = $(".u-delivery_code").val();
            var no_of_peices = $(".u-no_of_peices").val();
            var details_of_productsArray = $("textarea[name='details_of_products[]']")
                .map(function() {
                    return $(this).val();
                })
                .get();
            var cod_peiceArray = $("input[name='cod_peice[]']")
                .map(function() {
                    return $(this).val();
                })
                .get();


            var formData = new FormData();
            formData.append('_token', _token);
            formData.append('id', id);
            formData.append('driver_id', driver_id);
            formData.append('barcode', barcode);
            formData.append('reference_number', reference_number);
            formData.append('order_date', order_date);
            formData.append('service_type', service_type);
            formData.append('shipper_code', shipper_code);
            formData.append('shipper_name', shipper_name);
            formData.append('contact_office_1', contact_office_1);
            formData.append('reciver_name', reciver_name);
            formData.append('mobile_1', mobile_1);
            formData.append('mobile_2', mobile_2);
            formData.append('cod', cod);
            formData.append('service_charges', service_charges);
            formData.append('instruction', instruction);
            formData.append('description', description);
            formData.append('country', reciver_country);
            formData.append('city', reciver_city);
            formData.append('area', reciver_area);
            formData.append('street_address', reciver_street_address);
            formData.append('delivery_code', delivery_code);
            formData.append('no_of_peices', no_of_peices);
            for (var i = 0; i < details_of_productsArray.length; i++) {
                formData.append('details_of_products[]', details_of_productsArray[i]);
                formData.append('cod_peice[]', cod_peiceArray[i]);
            }

            $.ajax({
                type: "POST",
                url: "{{ route('admin.shipment.update_order') }}",
                data: formData,
                processData: false,
                contentType: false,
                success: function(response) {
                    // $('#changelocation').modal('hide'); // Hide the modal
                    alert('Order Updated Successfully');
                    // location.reload(true);

                    // Reset all input fields
                    $("#EditOrderForm")[0].reset();
                },
                error: function(xhr, textStatus, errorThrown) {
                    alert('Order Updated Unsuccessfully');
                }
            });
        });
    </script>

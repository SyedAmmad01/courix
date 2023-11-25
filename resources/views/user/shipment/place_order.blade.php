@extends('layouts.front')
@section('page_title', 'Place Order Page')
@section('content')
    <style>
        /* Add custom styles for the stepper */
        .stepper {
            list-style-type: none;
            margin: 0;
            padding: 0;
        }

        .step {
            margin-bottom: 20px;
            padding: 20px;
            border: 1px solid #ccc;
            border-radius: 10px;
            background-color: #f7f7f7;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
            transition: background-color 0.3s, box-shadow 0.3s;
        }

        .step:hover {
            background-color: #f2f2f2;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        .step-title {
            font-size: 18px;
            font-weight: bold;
            cursor: pointer;
            color: #333;
        }

        .step-actions {
            margin-top: 20px;
            text-align: left;
        }

        /* Add custom styles for form inputs and labels */
        .md-form {
            position: relative;
        }

        .md-form input[type="text"],
        .md-form input[type="password"] {
            border: 1px solid #ccc;
            border-radius: 5px;
            padding: 10px;
            width: 100%;
            font-size: 14px;
            transition: border-color 0.2s ease-in-out;
        }

        .md-form input[type="text"]:focus,
        .md-form input[type="password"]:focus {
            border-color: #007bff;
        }

        .md-form label {
            position: absolute;
            top: -15px;
            left: 10px;
            background-color: #f7f7f7;
            padding: 0 5px;
            font-size: 14px;
            color: #777;
        }

        /* Add custom styles for buttons */
        .btn {
            display: inline-block;
            border: none;
            border-radius: 5px;
            padding: 10px 20px;
            font-size: 14px;
            cursor: pointer;
            text-align: center;
            text-decoration: none;
            outline: none;
            transition: background-color 0.2s ease-in-out;
        }

        .btn-primary {
            background-color: #007bff;
            color: #fff;
        }

        .btn-primary:hover {
            background-color: #0056b3;
        }

        /* Custom styles for active and done steps */
        .step.done {
            /* background-color: #e5ffe5; */
        }

        .step.active {
            background-color: #e5f3ff;
        }

        /* Additional custom styles */
        .row {
            margin-bottom: 20px;
        }

        .text-red {
            color: #ff0000;
        }
    </style>
    <h1 class="card-title mt-5" style="margin-left: 1rem;"><i class="fas fa-fw fa-cube fa-sm text-dark"></i>
        Place Order
    </h1>
    <div class="card-body">
        <div>
            <div class="row p-4 bg-light" style="margin-left: 0.1rem; margin-right: 0.1rem;">
                <div class="card card-custom example example-compact w-100">
                    <hr>
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-md-12">
                                <form class="forms-sample" id="place_order">
                                    <ul class="stepper linear focused" id="custom-validation">
                                        <!-- Step 1: Sender Information -->
                                        <li class="step">
                                            <div data-step-label="Step-1" class="step-title waves-effect waves-dark">Step 1:
                                                Sender Information</div>
                                            <div class="step-new-content" style="display: none;">
                                                <input type="text" name="tracking_number" id="tracking_number" value="{{ $tracking_number }}">
                                                <!-- Step-1 content goes here -->
                                                <br>
                                                <div class="row">
                                                    <div class="col-3 mt-4">
                                                        <div class="form-group">
                                                            <label class="text-lg-right col-form-label"><span
                                                                    class="text-danger"></span></label>
                                                            <div class="form-check">
                                                                <input class="form-check-input" type="checkbox"
                                                                    value="" id="Check" onclick="box()">
                                                                <label class="form-check-label" for="flexCheckDefault">
                                                                    Choose Default Details
                                                                </label>
                                                            </div>
                                                        </div>
                                                    </div>

                                                </div>

                                                <div class="row" id="sender_information" style="display: none;">
                                                    <div class="container">
                                                        <div class="row">
                                                            <div class="col-4 mt-4">
                                                                <div class="form-group">
                                                                    <label class="text-lg-right col-form-label">Pickup On
                                                                        <span class="text-danger">*</span></label>
                                                                    <div class="input-group m-b-10">
                                                                        <input type="date" id="order_date"
                                                                            name="order_date" value="<?php echo date('Y-m-d'); ?>"
                                                                            class="form-control">
                                                                    </div>
                                                                </div>
                                                            </div>


                                                            <div class="col-4 mt-4">
                                                                <div class="form-group">
                                                                    <label class="text-lg-right col-form-label">Sender Name
                                                                        <span class="text-danger">*</span></label>
                                                                    <div class="input-group m-b-10">
                                                                        <input type="text" id="shipper_name"
                                                                            name="shipper_name"
                                                                            value="{{ $shippers->company_name }}"
                                                                            placeholder="Sender Name" class="form-control">
                                                                    </div>
                                                                </div>
                                                            </div>


                                                            <div class="col-4 mt-4">
                                                                <div class="form-group">
                                                                    <label class="text-lg-right col-form-label">Mobile<span
                                                                            class="text-danger">*</span></label>
                                                                    <div class="input-group m-b-10">
                                                                        <input type="phone" id="contact_office_1"
                                                                            name="contact_office_1"
                                                                            value="{{ $shippers->contact_office_1 }}"
                                                                            placeholder="Mobile" class="form-control">
                                                                    </div>
                                                                </div>
                                                            </div>


                                                            <div class="col-12 mt-4">
                                                                <div class="form-group">
                                                                    <label class="text-lg-right col-form-label">Sender Full
                                                                        Address
                                                                        <span class="text-danger">*</span></label>
                                                                    <div class="input-group m-b-10">
                                                                        <input type="text" id="" name=""
                                                                            placeholder="Sender Full Address"
                                                                            class="form-control">
                                                                    </div>
                                                                </div>
                                                            </div>

                                                        </div>
                                                    </div>

                                                </div>
                                                <!-- ... Step-1 content ... -->
                                                <div class="step-actions">
                                                    <button id="continue-step-1"
                                                        class="waves-effect waves-dark btn btn-sm btn-primary">CONTINUE</button>
                                                </div>
                                            </div>
                                        </li>

                                        <!-- Step 2: Another Step -->
                                        <li class="step">
                                            <div data-step-label="Step-2" class="step-title waves-effect waves-dark">Step 2:
                                                Receiver Information</div>
                                            <div class="step-new-content" style="display: none;">
                                                <!-- Step-2 content goes here -->
                                                <br>
                                                <div class="row">
                                                    <!-- Step-2 form inputs go here -->
                                                    <div class="container">
                                                        <div class="row">
                                                            <div class="col-4 mt-4">
                                                                <div class="form-group">
                                                                    <label class="text-lg-right col-form-label">Recipient
                                                                        Name
                                                                        <span class="text-danger">*</span></label>
                                                                    <div class="input-group m-b-10">
                                                                        <input type="text" id="reciver_name"
                                                                            name="reciver_name" placeholder="Recipient Name"
                                                                            class="form-control">
                                                                        <input type="hidden" id="awb_number"
                                                                            name="awb_number" value="{{ $random_no }}">
                                                                    </div>
                                                                </div>
                                                            </div>


                                                            <div class="col-4 mt-4">
                                                                <div class="form-group">
                                                                    <label class="text-lg-right col-form-label">Mobile
                                                                        <span class="text-danger">*</span></label>
                                                                    <div class="input-group m-b-10">
                                                                        <input type="tel" id="mobile_1"
                                                                            name="mobile_1" placeholder="Mobile"
                                                                            class="form-control">
                                                                        <input type="hidden" id="shipper_code"
                                                                            name="shipper_code"
                                                                            value="{{ $shippers->id }}">
                                                                    </div>
                                                                </div>
                                                            </div>


                                                            <div class="col-4 mt-4">
                                                                <div class="form-group">
                                                                    <label class="text-lg-right col-form-label">Phone<span
                                                                            class="text-danger">*</span></label>
                                                                    <div class="input-group m-b-10">
                                                                        <input type="tel" id="mobile_2"
                                                                            name="mobile_2" placeholder="Phone"
                                                                            class="form-control">
                                                                    </div>
                                                                </div>
                                                            </div>


                                                            <div class="col-4 mt-4">
                                                                <div class="form-group">
                                                                    <label class="text-lg-right col-form-label">Country
                                                                        <span class="text-danger">*</span></label>
                                                                    <div class="input-group m-b-10">
                                                                        <select class="form-control" id="country"
                                                                            name="country">
                                                                            <option value="" selected disabled
                                                                                hidden>Please Select Country</option>
                                                                            <option value="AD">Abu Dhabi</option>
                                                                            <option value="D">Dubai</option>
                                                                            <option value="S">Sharjah</option>
                                                                            <option value="A">Ajman</option>
                                                                            <option value="AA">Al Ain</option>
                                                                            <option value="F">Fujeriah</option>
                                                                            <option value="UAQ">Um Al Qwain</option>
                                                                            <option value="RAK">Ras Al Khaimah</option>
                                                                            <option value="OOSA">Out Of Service Area
                                                                            </option>
                                                                            <option value="AA50">Abu Dhabi 50</option>
                                                                            <option value="AA50">Al Ain 50</option>
                                                                        </select>
                                                                    </div>
                                                                </div>
                                                            </div>

                                                            <div class="col-4 mt-4">
                                                                <div class="form-group">
                                                                    <label class="text-lg-right col-form-label">City
                                                                        <span class="text-danger">*</span></label>
                                                                    <div class="input-group m-b-10">
                                                                        <select class="form-control" id="city"
                                                                            name="city">
                                                                            <option value="" selected disabled
                                                                                hidden>Please Select City</option>
                                                                            <option value="AD">Abu Dhabi</option>
                                                                            <option value="D">Dubai</option>
                                                                            <option value="S">Sharjah</option>
                                                                            <option value="A">Ajman</option>
                                                                            <option value="AA">Al Ain</option>
                                                                            <option value="F">Fujeriah</option>
                                                                            <option value="UAQ">Um Al Qwain</option>
                                                                            <option value="RAK">Ras Al Khaimah</option>
                                                                            <option value="OOSA">Out Of Service Area
                                                                            </option>
                                                                            <option value="AA50">Abu Dhabi 50</option>
                                                                            <option value="AA50">Al Ain 50</option>
                                                                        </select>
                                                                    </div>
                                                                </div>
                                                            </div>

                                                            <div class="col-4 mt-4">
                                                                <div class="form-group">
                                                                    <label class="text-lg-right col-form-label">Area
                                                                        <span class="text-danger">*</span></label>
                                                                    <div class="input-group m-b-10">
                                                                        <select class="form-control" id="area"
                                                                            name="area">
                                                                            <option value="" selected disabled
                                                                                hidden>Please Select Area</option>
                                                                            <option value="AD">Abu Dhabi</option>
                                                                            <option value="D">Dubai</option>
                                                                            <option value="S">Sharjah</option>
                                                                            <option value="A">Ajman</option>
                                                                            <option value="AA">Al Ain</option>
                                                                            <option value="F">Fujeriah</option>
                                                                            <option value="UAQ">Um Al Qwain</option>
                                                                            <option value="RAK">Ras Al Khaimah</option>
                                                                            <option value="OOSA">Out Of Service Area
                                                                            </option>
                                                                            <option value="AA50">Abu Dhabi 50</option>
                                                                            <option value="AA50">Al Ain 50</option>
                                                                        </select>
                                                                    </div>
                                                                </div>
                                                            </div>

                                                            <div class="col-6 mt-4">
                                                                <div class="form-group">
                                                                    <label class="text-lg-right col-form-label">Street
                                                                        Address
                                                                        <span class="text-danger">*</span></label>
                                                                    <div class="input-group m-b-10">
                                                                        <input type="text" id="street_address"
                                                                            name="street_address"
                                                                            placeholder="Street Address"
                                                                            class="form-control">
                                                                    </div>
                                                                </div>
                                                            </div>


                                                        </div>
                                                    </div>
                                                </div>
                                                <!-- ... Step-2 content ... -->
                                                <div class="step-actions">
                                                    <button id="continue-step-2"
                                                        class="waves-effect waves-dark btn btn-sm btn-primary">CONTINUE</button>
                                                </div>
                                            </div>
                                        </li>

                                        <!-- Step 3: Next Step -->
                                        <li class="step">
                                            <div data-step-label="Step-3" class="step-title waves-effect waves-dark">Step
                                                3: Pakage Information</div>
                                            <div class="step-new-content" style="display: none;">
                                                <!-- Step-3 content goes here -->
                                                <br>
                                                <div class="row">
                                                    <!-- Step-3 form inputs go here -->
                                                    <div class="container">
                                                        <div class="row">
                                                            <div class="col-6 mt-4">
                                                                <div class="form-group">
                                                                    <label class="text-lg-right col-form-label">Service
                                                                        Type
                                                                        <span class="text-danger">*</span></label>
                                                                    <div class="input-group m-b-10">
                                                                        <select class="form-control" id="service_type"
                                                                            name="service_type">
                                                                            <option value="" selected disabled
                                                                                hidden>Please Select Service Type</option>
                                                                            <option value="NDD">Next Day Delivery
                                                                            </option>
                                                                            <option value="SDD">Same Day Delivery
                                                                            </option>
                                                                            <option value="ODA">Out Of Service Area
                                                                            </option>
                                                                            <option value="RS">Return Service</option>
                                                                        </select>
                                                                    </div>
                                                                </div>
                                                            </div>


                                                            <div class="col-6 mt-4">
                                                                <div class="form-group">
                                                                    <label class="text-lg-right col-form-label">Actual
                                                                        Weight kg
                                                                        <span class="text-danger">*</span></label>
                                                                    <div class="input-group m-b-10">
                                                                        <input type="number" id="actual_weight"
                                                                            name="actual_weight"
                                                                            placeholder="Actual Weight kg"
                                                                            class="form-control">
                                                                    </div>
                                                                </div>
                                                            </div>


                                                            <div class="col-6 mt-4">
                                                                <div class="form-group">
                                                                    <label class="text-lg-right col-form-label">Shipper
                                                                        Referecne<span class="text-danger">*</span></label>
                                                                    <div class="input-group m-b-10">
                                                                        <input type="number" id="reference_number"
                                                                            name="reference_number"
                                                                            placeholder="Shipper Referecne"
                                                                            class="form-control">
                                                                    </div>
                                                                </div>
                                                            </div>


                                                            <div class="col-6 mt-4">
                                                                <div class="form-group">
                                                                    <label class="text-lg-right col-form-label">Cash on
                                                                        Delivery<span class="text-danger">*</span></label>
                                                                    <div class="input-group m-b-10">
                                                                        <input type="number" id=""
                                                                            name="" placeholder="Cash on Delivery"
                                                                            class="form-control">
                                                                    </div>
                                                                </div>
                                                            </div>

                                                            <div class="col-6 mt-4">
                                                                <div class="form-group">
                                                                    <label class="text-lg-right col-form-label">Instruction
                                                                        (Optional)<span
                                                                            class="text-danger">*</span></label>
                                                                    <div class="input-group m-b-10">
                                                                        <input type="text" id="instruction"
                                                                            name="instruction"
                                                                            placeholder="Instruction (Optional)"
                                                                            class="form-control">
                                                                    </div>
                                                                </div>
                                                            </div>

                                                            <div class="col-6 mt-4">
                                                                <div class="form-group">
                                                                    <label class="text-lg-right col-form-label">Description
                                                                        (Optional)
                                                                        <span class="text-danger">*</span></label>
                                                                    <div class="input-group m-b-10">
                                                                        <input type="text" id="description"
                                                                            name="description"
                                                                            placeholder="Description (Optional)"
                                                                            class="form-control">
                                                                    </div>
                                                                </div>
                                                            </div>

                                                            <div class="col-6 mt-4">
                                                                <div class="form-group">
                                                                    <label class="text-lg-right col-form-label">Service
                                                                        Charges
                                                                        <span class="text-danger">*</span></label>
                                                                    <div class="input-group m-b-10">
                                                                        <input type="number" id="service_charges"
                                                                            name="service_charges"
                                                                            placeholder="Service Charges"
                                                                            class="form-control">
                                                                    </div>
                                                                </div>
                                                            </div>

                                                            <div class="col-6 mt-4">
                                                                <div class="form-group">
                                                                    <label
                                                                        class="text-lg-right col-form-label">delivery_code
                                                                        <span class="text-danger">*</span></label>
                                                                    <div class="input-group m-b-10">
                                                                        <input type="number" id="delivery_code"
                                                                            name="delivery_code"
                                                                            value="{{ $last }}"
                                                                            placeholder="Delivery Code"
                                                                            class="form-control">
                                                                    </div>
                                                                </div>
                                                            </div>

                                                            <div class="col-6 mt-4">
                                                                <div class="form-group">
                                                                    <label class="text-lg-right col-form-label">No. Of
                                                                        Pieces (Enter number between 1 - 20)
                                                                        <span class="text-danger">*</span></label>
                                                                    <div class="input-group m-b-10">
                                                                        <input type="number" id="no_of_peices"
                                                                            name="no_of_peices"
                                                                            placeholder="Street Address"
                                                                            class="form-control">
                                                                    </div>
                                                                </div>
                                                            </div>

                                                            <div class="col-6 mt-4">
                                                            </div>

                                                            <div class="col-6 mt-4">
                                                                <div class="form-group">
                                                                    <label class="text-lg-right col-form-label">Tell us
                                                                        about 1st Piece...
                                                                        <span class="text-danger">*</span></label>
                                                                    <div class="input-group m-b-10">
                                                                        <textarea placeholder="Tell us about 1st price" id="details_of_products" name="details_of_products[]" rows="3"
                                                                            cols="40"></textarea>
                                                                    </div>
                                                                </div>
                                                            </div>

                                                            <div class="col-6 mt-4">
                                                                <div class="form-group">
                                                                    <label class="text-lg-right col-form-label">
                                                                        <span class="text-danger">*</span></label>
                                                                    <div class="input-group m-b-10">
                                                                        <input type="text" id="cod_peice"
                                                                            name="cod_peice[]" placeholder="COD"
                                                                            data-parsley-group="step-1"
                                                                            data-parsley-required="true"
                                                                            class="form-control">
                                                                    </div>
                                                                </div>
                                                            </div>



                                                            <div id="fieldContainer">
                                                            </div>

                                                        </div>
                                                    </div>
                                                </div>
                                                <!-- ... Step-3 content ... -->
                                                <div class="step-actions">
                                                    <button id="continue-step-3"
                                                        class="waves-effect waves-dark btn btn-sm btn-primary">CONTINUE</button>
                                                </div>
                                            </div>
                                        </li>

                                        <!-- Step 4: Review and Submit -->
                                        <li class="step">
                                            <div data-step-label="Step-4" class="step-title waves-effect waves-dark">Step
                                                4: Complete & Finish</div>
                                            <div class="step-new-content" style="display: none;">
                                                <!-- Step-4 content goes here -->
                                                <!-- ... Step-4 content ... -->
                                                <div class="step-actions">
                                                </div>
                                            </div>
                                        </li>
                                    </ul>
                                    <button type="submit" value="submit"
                                        class="waves-effect waves-dark btn btn-sm btn-success">SUBMIT</button>
                                </form>
                                <br>
                                <div class="row" id="airways_buttons" style="display: none;">
                                    <div class="container-fluid">
                                        <div class="row">
                                            <div class="col-3">
                                                <a href="javascript:void(0);" data-toggle="modal"
                                                    data-target="#print_airways_bills" type="button"
                                                    class="btn btn-xs btn-primary">Print Airways
                                                    Bill</a>
                                            </div>
                                            <div class="col-3">
                                                <a href="javascript:void(0);" data-toggle="modal" data-target=""
                                                    type="button"
                                                    class="btn btn-xs btn-danger">New Place Order
                                                </a>
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

    {{-- Select Airways Bills Modal --}}

    @include('user.modals.add_print_airways_bills')

    {{-- Select Airways Bills Modal --}}

@endsection

@section('page-scripts')
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            const stepTitlesContainer = document.getElementById("custom-validation");
            const stepTitles = stepTitlesContainer.querySelectorAll(".step-title");

            stepTitlesContainer.addEventListener("click", function(event) {
                if (event.target.classList.contains("step-title")) {
                    const clickedStepTitle = event.target;
                    const stepContent = clickedStepTitle.nextElementSibling;

                    // Hide all step contents
                    const stepContents = document.querySelectorAll(".step-new-content");
                    stepContents.forEach(function(stepContent) {
                        stepContent.style.display = "none";
                    });

                    // Show the clicked step content
                    stepContent.style.display = "block";
                }
            });



            // Add click event listener to "CONTINUE" buttons for each step
            const continueButtons = document.querySelectorAll(".step-actions button");
            continueButtons.forEach(function(button, index) {
                button.addEventListener("click", function(event) {
                    event.preventDefault();
                    const nextStepIndex = index + 1;
                    const nextStepContent = stepTitlesContainer.querySelectorAll(
                        ".step-new-content")[nextStepIndex];
                    if (nextStepContent) {
                        // Hide all step contents
                        const stepContents = document.querySelectorAll(".step-new-content");
                        stepContents.forEach(function(stepContent) {
                            stepContent.style.display = "none";
                        });

                        // Show the next step content
                        nextStepContent.style.display = "block";
                    }
                });
            });
        });

        function box() {
            var checkBox = document.getElementById("Check");
            if (checkBox.checked) {
                $("#sender_information").css("display", "block");
            } else {
                $("#sender_information").css("display", "none");
            }
        }

        $("#place_order").on("submit", function(e) {
            e.preventDefault()
            var _token = '{{ csrf_token() }}';
            var awb_number = $("#awb_number").val();
            var reference_number = $("#reference_number").val();
            var order_date = $("#order_date").val();
            var service_type = $("#service_type").val();
            var shipper_code = $("#shipper_code").val();
            var shipper_name = $("#shipper_name").val();
            var contact_office_1 = $("#contact_office_1").val();
            var reciver_name = $("#reciver_name").val();
            var mobile_1 = $("#mobile_1").val();
            var mobile_2 = $("#mobile_2").val();
            var cod = $("#cod").val();
            var service_charges = $("#service_charges").val();
            var instruction = $("#instruction").val();
            var description = $("#description").val();
            var country = $("#country").val();
            var city = $("#city").val();
            var area = $("#area").val();
            var street_address = $("#street_address").val();
            var delivery_code = $("#delivery_code").val();
            var actual_weight = $("#actual_weight").val();
            var is_fragile = $("#is_fragile").is(":checked") ? "on" : "off";
            var no_of_peices = $("#no_of_peices").val();
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
            formData.append('awb_number', awb_number);
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
            formData.append('country', country);
            formData.append('city', city);
            formData.append('area', area);
            formData.append('street_address', street_address);
            formData.append('delivery_code', delivery_code);
            formData.append('actual_weight', actual_weight);
            formData.append('is_fragile', is_fragile);
            formData.append('no_of_peices', no_of_peices);
            for (var i = 0; i < details_of_productsArray.length; i++) {
                formData.append('details_of_products[]', details_of_productsArray[i]);
                formData.append('cod_peice[]', cod_peiceArray[i]);
            }

            $.ajax({
                type: "POST",
                url: "{{ route('user.shipment.save') }}",
                data: formData,
                processData: false,
                contentType: false,
                success: function(data) {
                    if (data) {
                        alert('Shipment Added Successfully');
                        $("#airways_buttons").css("display", "block");
                        // location.reload(true);
                    }
                },
                error: function(data, textStatus, errorThrown) {

                    alert('Shipment Added Unsuccessfully');
                },
            });
        });


        document.getElementById('no_of_peices').addEventListener('input', function() {
            var count = parseInt(this.value);
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
                rowDiv.style.marginTop = '6rem!important;';

                // Create the first col-3 div
                var colDiv1 = document.createElement('div');
                colDiv1.className = 'col-6';

                // Create the first form-group div
                var formGroupDiv1 = document.createElement('div');
                formGroupDiv1.className = 'form-group';

                // Create the first label
                var label1 = document.createElement('label');
                label1.className = 'text-lg-right col-form-label';
                var labelSpan1 = document.createElement('span');
                labelSpan1.className = 'text-danger';

                // Create the first input-group div
                var inputGroupDiv1 = document.createElement('div');
                inputGroupDiv1.className = 'input-group m-b-10';

                // Create the first text area
                var textarea1 = document.createElement('textarea');
                textarea1.name = 'details_of_products[]';
                textarea1.placeholder = 'Tell us about 1st price';
                textarea1.className = 'form-control';

                inputGroupDiv1.appendChild(textarea1);
                formGroupDiv1.appendChild(label1);
                formGroupDiv1.appendChild(inputGroupDiv1);
                colDiv1.appendChild(formGroupDiv1);
                rowDiv.appendChild(colDiv1);

                // Create the second col-3 div
                var colDiv2 = document.createElement('div');
                colDiv2.className = 'col-6';

                // Create the second form-group div
                var formGroupDiv2 = document.createElement('div');
                formGroupDiv2.className = 'form-group';

                // Create the second label
                var label2 = document.createElement('label');
                label2.className = 'text-lg-right col-form-label';
                var labelSpan2 = document.createElement('span');
                labelSpan2.className = 'text-danger';

                // Create the second input-group div
                var inputGroupDiv2 = document.createElement('div');
                inputGroupDiv2.className = 'input-group m-b-10';

                // Create the second input
                var input2 = document.createElement('input');
                input2.type = 'text';
                input2.name = 'cod_peice[]';
                input2.placeholder = 'COD';
                input2.className = 'form-control';

                inputGroupDiv2.appendChild(input2);
                formGroupDiv2.appendChild(label2);
                formGroupDiv2.appendChild(inputGroupDiv2);
                colDiv2.appendChild(formGroupDiv2);
                rowDiv.appendChild(colDiv2);

                container.appendChild(rowDiv);
            }
        });
    </script>
@endsection

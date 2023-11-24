    {{-- Extends layout --}}
    @extends('layouts.admin')
    @section('page_title', 'Create Shipment')
    {{-- Content --}}
    @section('content')
        <div class="card-body">
            <div class="row p-4 bg-light" style="margin-left: 0.1rem; margin-right: 0.1rem;">
                <div class="card card-custom example example-compact w-100">
                    <div class="card-body">
                        <form class="forms-sample" id="place_order">
                            <input type="hidden" name="tracking_number" id="tracking_number" value="{{ $tracking_number }}"> 
                            <div class="container-fluid">
                                <div class="row">
                                    <div class="col-12">
                                        <div class="row mb-5">
                                            <div class="col-3">
                                                <div class="form-group">
                                                    <label class="text-lg-right col-form-label">AWB Number<span
                                                            class="text-danger">*</span></label>
                                                    <div class="input-group m-b-10">
                                                        <div class="input-group-prepend"><span class="input-group-text"><i
                                                                    class="fa-brands fa-rebel"></i></span></div>
                                                        <input type="text" id="awb_number" name="awb_number"
                                                            placeholder="AWB Number" class="form-control">
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-3">
                                                <div class="form-group">
                                                    <label class="text-lg-right col-form-label">Reference Number
                                                        (Optional)<span class="text-danger">*</span></label>
                                                    <div class="input-group m-b-10">
                                                        <div class="input-group-prepend"><span class="input-group-text"><i
                                                                    class="fa-solid fa-hashtag"></i></span></div>
                                                        <input type="text" id="reference_number" name="reference_number"
                                                            placeholder="Reference Number" class="form-control">
                                                    </div>
                                                </div>
                                            </div>


                                            <div class="col-3">
                                                <div class="form-group">
                                                    <label class="text-lg-right col-form-label">Order Date<span
                                                            class="text-danger">*</span></label>
                                                    <div class="input-group m-b-10">
                                                        <div class="input-group-prepend"><span class="input-group-text"><i
                                                                    class="fa fa-calendar-days"></i></span></div>
                                                        <input type="date" id="order_date" name="order_date"
                                                            class="form-control">
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-3">
                                                <div class="form-group">
                                                    <label class="text-lg-right col-form-label">Service Type<span
                                                            class="text-danger">*</span></label>
                                                    <div class="input-group m-b-10">
                                                        <div class="input-group-prepend"><span class="input-group-text"><i
                                                                    class="fa-solid fa-hashtag"></i></span></div>
                                                        <select class="form-control kt-select2 select2" id="service_type"
                                                            name="service_type" style="width:80%;">
                                                            <option value="NDD">NDD - Next Day Delivery </option>
                                                            <option value="SDD">SDD - Same Day Delivery </option>
                                                            <option value="ODA">ODA - Out Of Service Area</option>
                                                            <option value="RS">RS - Return Service</option>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-3">
                                                <div class="form-group">
                                                    <label class="text-lg-right col-form-label">Shipper Code<span
                                                            class="text-danger">*</span></label>
                                                    <div class="input-group m-b-10">
                                                        <div class="input-group-prepend"><span class="input-group-text"><i
                                                                    class="fa-solid fa-hashtag"></i></span></div>
                                                        <select class="form-control kt-select2 select2" id="shipper_code"
                                                            name="shipper_code" onchange="myFunction()" style="width:80%;">
                                                            <option value="" disabled selected>Please Select Shipper
                                                                Code
                                                            </option>
                                                            @foreach ($fetch_shippers as $key)
                                                                @if (old('shipper_code') == $key->id)
                                                                    <option value="{{ $key->id }}" selected>
                                                                        {{ $key->shipper_code }}|{{ $key->company_name }}|{{ $key->contact_office_1 }}
                                                                    </option>
                                                                @else
                                                                    <option value="{{ $key->id }}">
                                                                        {{ $key->shipper_code }}|{{ $key->company_name }}|{{ $key->contact_office_1 }}
                                                                    </option>
                                                                @endif
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-3">
                                                <div class="form-group">
                                                    <label class="text-lg-right col-form-label">Shipper Name<span
                                                            class="text-danger">*</span></label>
                                                    <div class="input-group m-b-10">
                                                        <div class="input-group-prepend"><span class="input-group-text"><i
                                                                    class="fa-solid fa-hashtag"></i></span></div>
                                                        <input type="text" id="shipper_name" name="shipper_name"
                                                            placeholder="Shipper Name" class="form-control" readonly>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-3">
                                                <div class="form-group">
                                                    <label class="text-lg-right col-form-label">Contact Office 1<span
                                                            class="text-danger">*</span></label>
                                                    <div class="input-group m-b-10">
                                                        <div class="input-group-prepend"><span class="input-group-text"><i
                                                                    class="fa fa-phone"></i></span></div>
                                                        <input type="number" id="contact_office_1"
                                                            name="contact_office_1" placeholder="Contact Office 1"
                                                            class="form-control" readonly>
                                                    </div>
                                                </div>
                                            </div>


                                            <div class="col-3">
                                                <div class="form-group">
                                                    <label class="text-lg-right col-form-label">Account Name<span
                                                            class="text-danger">*</span></label>
                                                    <div class="input-group m-b-10">
                                                        <div class="input-group-prepend"><span class="input-group-text">
                                                                <i class="fa fa-user"></i></span></div>
                                                        <input type="text" id="account_name" name="account_name"
                                                            placeholder="Account Name" class="form-control">
                                                    </div>
                                                </div>
                                            </div>


                                        </div>

                                        <hr>
                                        <div class="row mb-5">
                                            <div class="col-3">
                                                <div class="form-group">
                                                    <label class="text-lg-right col-form-label">Receiver Name<span
                                                            class="text-danger">*</span></label>
                                                    <div class="input-group m-b-10">
                                                        <div class="input-group-prepend"><span class="input-group-text"><i
                                                                    class="fa fa-user"></i></span></div>
                                                        <input type="text" id="reciver_name" name="reciver_name"
                                                            placeholder="Receiver Name" class="form-control">
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-3">
                                                <div class="form-group">
                                                    <label class="text-lg-right col-form-label">Mobile 1 <span
                                                            class="text-danger">*</span></label>
                                                    <div class="input-group m-b-10">
                                                        <div class="input-group-prepend"><span class="input-group-text"><i
                                                                    class="fa fa-phone"></i></span></div>
                                                        <input type="text" id="mobile_1" name="mobile_1"
                                                            placeholder="Mobile 1" class="form-control">
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-6">
                                                <div class="form-group">
                                                    <label class="text-lg-right col-form-label">Mobile 2 (Optional)<span
                                                            class="text-danger">*</span></label>
                                                    <div class="input-group m-b-10">
                                                        <div class="input-group-prepend"><span class="input-group-text"><i
                                                                    class="fa fa-phone"></i></span></div>
                                                        <input type="text" id="mobile_2" name="mobile_2"
                                                            placeholder="Mobile 2" class="form-control">
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-3">
                                                <div class="form-group">
                                                    <label class="text-lg-right col-form-label">COD<span
                                                            class="text-danger">*</span></label>
                                                    <div class="input-group m-b-10">
                                                        <div class="input-group-prepend"><span class="input-group-text">
                                                                <i class="fa-solid fa-hashtag"></i></span></div>
                                                        <input type="text" id="cod" name="cod"
                                                            placeholder="COD" class="form-control">
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-3">
                                                <div class="form-group">
                                                    <label class="text-lg-right col-form-label">Service Charges<span
                                                            class="text-danger">*</span></label>
                                                    <div class="input-group m-b-10">
                                                        <div class="input-group-prepend"><span class="input-group-text">
                                                                <i class="fa-solid fa-hashtag"></i></span></div>
                                                        <input type="text" id="service_charges" name="service_charges"
                                                            placeholder="Service Charges" class="form-control">
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-3">
                                                <div class="form-group">
                                                    <label class="text-lg-right col-form-label">Instruction<span
                                                            class="text-danger">*</span></label>
                                                    <div class="input-group m-b-10">
                                                        <div class="input-group-prepend"><span class="input-group-text">
                                                                <i class="fa fa-quote-left"></i></span>
                                                        </div>
                                                        <input type="text" id="instruction" name="instruction"
                                                            placeholder="Instruction" class="form-control">
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-3">
                                                <div class="form-group">
                                                    <label class="text-lg-right col-form-label">Description<span
                                                            class="text-danger">*</span></label>
                                                    <div class="input-group m-b-10">
                                                        <div class="input-group-prepend"><span class="input-group-text">
                                                                <i class="fa fa-quote-left"></i></span>
                                                        </div>
                                                        <input type="text" id="description" name="description"
                                                            placeholder="Description" class="form-control">
                                                    </div>
                                                </div>
                                            </div>


                                        </div>

                                        <hr>

                                        <div class="row mb-5">
                                            <div class="col-3">
                                                <div class="form-group">
                                                    <label class="text-lg-right col-form-label">Country<span
                                                            class="text-danger">*</span></label>
                                                    <div class="input-group m-b-10">
                                                        <div class="input-group-prepend"><span class="input-group-text">
                                                                <i class="fa fa-location-arrow"></i></span>
                                                        </div>
                                                        <select class="form-control kt-select2 select2" id="country"
                                                            name="country" onchange="fun()" style="width:70%;">
                                                            <option value="" disabled selected>Please Select Country
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
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-3">
                                                <div class="form-group">
                                                    <label class="text-lg-right col-form-label">City<span
                                                            class="text-danger">*</span></label>
                                                    <div class="input-group m-b-10">
                                                        <div class="input-group-prepend"><span class="input-group-text">
                                                                <i class="fa fa-location-arrow"></i></span>
                                                        </div>
                                                        <select class="form-control kt-select2 select2" id="city"
                                                            name="city" style="width:70%;" onchange="get_rates()">
                                                            <option value="" disabled selected>Please Select City
                                                            </option>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-3">
                                                <div class="form-group">
                                                    <label class="text-lg-right col-form-label">Area<span
                                                            class="text-danger">*</span></label>
                                                    <div class="input-group m-b-10">
                                                        <div class="input-group-prepend"><span class="input-group-text">
                                                                <i class="fa fa-location-arrow"></i></span>
                                                        </div>
                                                        <select class="form-control kt-select2 select2" id="area"
                                                            name="area" style="width:70%;">
                                                            <option value="" disabled selected>Please Select Area
                                                            </option>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-3">
                                                <div class="form-group">
                                                    <label class="text-lg-right col-form-label">Street Address <span
                                                            class="text-danger">*</span></label>
                                                    <div class="input-group m-b-10">
                                                        <div class="input-group-prepend"><span class="input-group-text">
                                                                <i class="fa fa-location-arrow"></i></span>
                                                        </div>
                                                        <input type="text" id="street_address" name="street_address"
                                                            placeholder="Street Address" class="form-control">
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-3">
                                                <div class="form-group">
                                                    <label class="text-lg-right col-form-label">Delivery Code<span
                                                            class="text-danger">*</span></label>
                                                    <div class="input-group m-b-10">
                                                        <div class="input-group-prepend"><span class="input-group-text">
                                                                <i class="fa fa-truck"></i></span></div>
                                                        <input type="text" id="delivery_code" name="delivery_code"
                                                            value="{{ $last }}" placeholder="Delivery Code"
                                                            class="form-control">
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-3">
                                                <div class="form-group">
                                                    <label class="text-lg-right col-form-label">Actual Weight <span
                                                            class="text-danger">*</span></label>
                                                    <div class="input-group m-b-10">
                                                        <div class="input-group-prepend"><span class="input-group-text">
                                                                <i class="fa-solid fa-hashtag"></i></span></div>
                                                        <input type="text" id="actual_weight" name="actual_weight"
                                                            placeholder="Actual Weight" class="form-control"
                                                            onblur="get_weight()">
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-3 mt-4">
                                                <div class="form-group">
                                                    <label class="text-lg-right col-form-label"><span
                                                            class="text-danger"></span></label>
                                                    <div class="input-group m-b-10">
                                                        <div class="form-check">
                                                            <input class="form-check-input" type="checkbox"
                                                                value="" name="is_fragile" id="is_fragile">
                                                            <label class="form-check-label" for="flexCheckDefault">
                                                                Is Fragile
                                                            </label>
                                                        </div>
                                                    </div>
                                                </div>


                                            </div>

                                        </div>

                                        <hr>

                                        <div class="row mb-5 mt-5 ml-1">
                                            <div class="col-3">
                                                <div class="form-group">
                                                    <label class="text-lg-right col-form-label">No. of Pieces<span
                                                            class="text-danger">*</span></label>
                                                    <div class="input-group m-b-10">
                                                        <div class="input-group-prepend"><span class="input-group-text"><i
                                                                    class="fa fa-cubes"></i></span></div>
                                                        <input type="number" id="no_of_peices" name="no_of_peices"
                                                            placeholder="No. of Pieces" data-parsley-group="step-1"
                                                            data-parsley-required="true" class="form-control"
                                                            min="1" max="10" value="1">
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-3 mt-4">
                                                <div class="form-group">
                                                    <label class="text-lg-right col-form-label"><span
                                                            class="text-danger"></span></label>
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="checkbox" value=""
                                                            id="Check" onclick="box()">
                                                        <label class="form-check-label" for="flexCheckDefault">
                                                            Use specific COD
                                                        </label>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-6 mt-5">
                                                <div class="form-group mt-5 ml-5 buttons" style="display:none;">
                                                    <h1 class="fw-bolder text-success">Save Successfully</h1>
                                                </div>
                                            </div>



                                            <div class="col-3">
                                                <div class="form-group">
                                                    <label class="text-lg-right col-form-label"><span
                                                            class="text-danger"></span></label>
                                                    <div class="input-group m-b-10">
                                                        <textarea placeholder="Tell us about 1st price" id="details_of_products" name="details_of_products[]" rows="3"
                                                            cols="40"></textarea>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-3">
                                                <div class="form-group">
                                                    <label class="text-lg-right col-form-label"><span
                                                            class="text-danger"></span></label>
                                                    <div class="input-group m-b-10">
                                                        <input type="text" id="cod_peice" name="cod_peice[]"
                                                            placeholder="COD" data-parsley-group="step-1"
                                                            data-parsley-required="true" class="form-control" readonly>
                                                    </div>
                                                </div>
                                            </div>


                                            {{-- <div class="col-4" style="margin-top:27px;">
                                                <div class="form-group">
                                                    <button class="btn btn-primary btn-sm" type="submit"
                                                        value="Submit">Confirm</button>
                                                        <div class="row">

                                                        <button class="btn btn-primary btn-sm" type="submit"
                                                        value="Submit">Confirm</button>

                                                        <button class="btn btn-primary btn-sm" type="submit"
                                                        value="Submit">Confirm</button>

                                                        </div>
                                                </div>



                                            </div> --}}




                                            <div class="col-2" style="margin-top:27px;">
                                                <div class="form-group">
                                                    <button class="btn btn-primary btn-sm" type="submit"
                                                        value="Submit">Confirm</button>
                                                </div>
                                            </div>

                                            <div class="col-2 buttons" style="margin-top:27px; display:none;">
                                                <div class="form-group">
                                                    <a href="{{ route('admin.shipment.print_awb') }}"
                                                    class="btn btn-primary btn-sm" title="Print" type="button" id="">Print AWB</a>
                                                    {{-- <button class="btn btn-primary btn-sm" type="submit"
                                                        value="">Print AWB</button> --}}
                                                </div>
                                            </div>


                                            <div class="col-2 buttons" style="margin-top:27px; display:none;">
                                                <div class="form-group">
                                                    <button class="btn btn-warning btn-sm text-dark" id="refreshButton"
                                                        type="button">Place New Order</button>
                                                </div>
                                            </div>





                                        </div>

                                    </div>

                                    <div id="fieldContainer" style="margin-top:-2rem !important;">
                                    </div>

                                </div>
                            </div>
                    </div>
                    </form>
                </div>
            </div>
        </div>
    @endsection

    @section('page-scripts')
        <script src="{{ asset('js/pages/widgets.js') }}" type="text/javascript"></script>
        <script>
            function box() {
                var checkBox = document.getElementById("Check");
                if (checkBox.checked == true) {
                    $("#cod_peice").removeAttr('readonly');
                } else {
                    $("#cod_peice").attr('readonly', 'readonly');
                }
            }


            $(document).ready(function() {
                $(".select2").select2();
            });

            $("#place_order").on("submit", function(e) {
                e.preventDefault()
                var _token = '{{ csrf_token() }}';
                var tracking_number = $("#tracking_number").val();
                var awb_number = $("#awb_number").val();
                var reference_number = $("#reference_number").val();
                var order_date = $("#order_date").val();
                var service_type = $("#service_type").val();
                var shipper_code = $("#shipper_code").val();
                var shipper_name = $("#shipper_name").val();
                var contact_office_1 = $("#contact_office_1").val();
                var account_name = $("#account_name").val();
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
                formData.append('tracking_number', tracking_number);
                formData.append('awb_number', awb_number);
                formData.append('reference_number', reference_number);
                formData.append('order_date', order_date);
                formData.append('service_type', service_type);
                formData.append('shipper_code', shipper_code);
                formData.append('shipper_name', shipper_name);
                formData.append('contact_office_1', contact_office_1);
                formData.append('account_name', account_name);
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
                    url: "{{ route('admin.shipment.save') }}",
                    data: formData,
                    processData: false,
                    contentType: false,
                    success: function(data) {
                        if (data) {
                            alert('Shipment Added Successfully');
                            // location.reload(true);
                            $('#place_order')[0].reset();
                            $(".buttons").css("display", "block");
                        }
                    },
                    error: function(data, textStatus, errorThrown) {
                        alert('Shipment Added Unsuccessfully');
                    },
                });
            });

            jQuery(document).ready(function() {
                jQuery('#city').change(function() {
                    let cid = jQuery(this).val();
                    jQuery.ajax({
                        url: "{{ route('admin.shipment.getcity') }}",
                        type: 'post',
                        data: 'cid=' + cid + '&_token={{ csrf_token() }}',
                        success: function(result) {

                            jQuery('#area').html(result);

                        }

                    });
                });
            });

            function fun() {
                var id = $('#country :selected').val();
                $.ajax({
                    headers: {
                        'X-CSRF-TOKEN': "{{ csrf_token() }}",
                    },
                    url: "{{ route('admin.shipment.getarea') }}",
                    type: "POST",
                    data: {
                        id: id,
                    },
                    success: function(response) {
                        $('#city').html(response);
                    }
                });
            }

            function myFunction() {
                var id = $('#shipper_code').val();
                // alert(id);
                $.ajax({
                    headers: {
                        'X-CSRF-TOKEN': "{{ csrf_token() }}",
                    },
                    url: "{{ route('admin.shipment.get_name') }}",
                    type: "POST",
                    data: {
                        id: id,
                    },
                    success: function(response) {
                        // console.log(response);
                        $('#shipper_name').val(response.company_name);
                        $('#contact_office_1').val(response.contact_office_1);
                    }
                });
            }


            // document.getElementById('no_of_peices').addEventListener('input', function() {
            //     var count = parseInt(this.value);
            //     var container = document.getElementById('fieldContainer');

            //     // Clear existing fields
            //     while (container.firstChild) {
            //         container.firstChild.remove();
            //     }

            //     // Generate and append new fields based on the count
            //     for (var i = 1; i <= count; i++) {
            //         // Create the parent row div
            //         var rowDiv = document.createElement('div');
            //         rowDiv.className = 'row';
            //         rowDiv.style.marginTop = '-6rem!important;';

            //         // Create the first col-3 div
            //         var colDiv1 = document.createElement('div');
            //         colDiv1.className = 'col-3';

            //         // Create the first form-group div
            //         var formGroupDiv1 = document.createElement('div');
            //         formGroupDiv1.className = 'form-group';

            //         // Create the first label
            //         var label1 = document.createElement('label');
            //         label1.className = 'text-lg-right col-form-label';
            //         var labelSpan1 = document.createElement('span');
            //         labelSpan1.className = 'text-danger';

            //         // Create the first input-group div
            //         var inputGroupDiv1 = document.createElement('div');
            //         inputGroupDiv1.className = 'input-group m-b-10';

            //         // Create the first text area
            //         var textarea1 = document.createElement('textarea');
            //         textarea1.name = 'details_of_products[]';
            //         textarea1.placeholder = 'Tell us about 1st price';
            //         textarea1.className = 'form-control';

            //         inputGroupDiv1.appendChild(textarea1);
            //         formGroupDiv1.appendChild(label1);
            //         formGroupDiv1.appendChild(inputGroupDiv1);
            //         colDiv1.appendChild(formGroupDiv1);
            //         rowDiv.appendChild(colDiv1);

            //         // Create the second col-3 div
            //         var colDiv2 = document.createElement('div');
            //         colDiv2.className = 'col-3';

            //         // Create the second form-group div
            //         var formGroupDiv2 = document.createElement('div');
            //         formGroupDiv2.className = 'form-group';

            //         // Create the second label
            //         var label2 = document.createElement('label');
            //         label2.className = 'text-lg-right col-form-label';
            //         var labelSpan2 = document.createElement('span');
            //         labelSpan2.className = 'text-danger';

            //         // Create the second input-group div
            //         var inputGroupDiv2 = document.createElement('div');
            //         inputGroupDiv2.className = 'input-group m-b-10';

            //         // Create the second input
            //         var input2 = document.createElement('input');
            //         input2.type = 'text';
            //         input2.name = 'cod_peice[]';
            //         input2.placeholder = 'COD';
            //         input2.className = 'form-control';

            //         inputGroupDiv2.appendChild(input2);
            //         formGroupDiv2.appendChild(label2);
            //         formGroupDiv2.appendChild(inputGroupDiv2);
            //         colDiv2.appendChild(formGroupDiv2);
            //         rowDiv.appendChild(colDiv2);

            //         container.appendChild(rowDiv);
            //     }
            // });


            document.getElementById('no_of_peices').addEventListener('input', function() {
                var count = parseInt(this.value);
                var container = document.getElementById('fieldContainer');
                var codSum = 0; // Initialize the sum variable

                // Clear existing fields
                while (container.firstChild) {
                    container.firstChild.remove();
                }

                // Generate and append new fields based on the count
                for (var i = 2; i <= count; i++) {
                    // Create the parent row div
                    var rowDiv = document.createElement('div');
                    rowDiv.className = 'row';
                    rowDiv.style.marginTop = '-6rem!important;';

                    // Create the first col-3 div
                    var colDiv1 = document.createElement('div');
                    colDiv1.className = 'col-3';

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
                    colDiv2.className = 'col-3';

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

                    // Create an event listener for each 'cod_peice[]' input field to update the sum
                    input2.addEventListener('input', function() {
                        codSum = 0; // Reset the sum
                        var codInputs = document.getElementsByName('cod_peice[]');

                        // Iterate through all 'cod_peice[]' input fields and update the sum
                        for (var j = 0; j < codInputs.length; j++) {
                            var value = parseInt(codInputs[j].value) ||
                                0; // Get the value as an integer, default to 0 if not a number
                            codSum += value;
                        }

                        // Update the 'cod' input field with the new sum
                        document.getElementById('cod').value = codSum;
                    });
                }
            });


            // Get references to the input fields
            const codPeiceInput = document.getElementById("cod_peice");
            const codInput = document.getElementById("cod");

            // Add an event listener to the codPeiceInput to update the codInput value
            codPeiceInput.addEventListener("input", function() {
                codInput.value = codPeiceInput.value;
            });


        function get_rates() {
        var service_type = $('#service_type').val();
        var shipper_id = $('#shipper_code').val();
        var city_id = $('#city').val();
        $.ajax({
        headers: {
        'X-CSRF-TOKEN': "{{ csrf_token() }}",
        },
        url: "{{ route('admin.shipment.get_rates') }}",
        type: "POST",
        data: {
        // id: id,
        service_type: service_type,
        shipper_id: shipper_id,
        city_id: city_id,
        },
        success: function(response) {
        // console.log(response);
        if (response.city_rate) {
        $('#service_charges').val(response.city_rate);
        }
        if (response.city_oda_rate) {
        $('#service_charges').val(response.city_oda_rate);
        }
        if (response.city_rto_rate) {
        $('#service_charges').val(response.city_rto_rate);
        }
        }
        });
        }

        function get_weight() {
        var actual_weight = $('#actual_weight').val();
        var service_type = $('#service_type').val();
        var shipper_id = $('#shipper_code').val();
        var city_id = $('#city').val();
        var service_charges = $('#service_charges').val();
        $.ajax({
        headers: {
        'X-CSRF-TOKEN': "{{ csrf_token() }}",
        },
        url: "{{ route('admin.shipment.get_weight') }}",
        type: "POST",
        data: {
        // id: id,
        actual_weight: actual_weight,
        service_type: service_type,
        shipper_id: shipper_id,
        city_id: city_id,
        service_charges: service_charges,
        },
        success: function(response) {
        // console.log(response);
        if (response !== null) {
        $('#service_charges').val(response);
        }
        }
        });
        }

        // Get a reference to the refresh button
        const refreshButton = document.getElementById('refreshButton');

        // Add a click event listener to the button
        refreshButton.addEventListener('click', function() {
        // Reload the current page
        location.reload();
        });
        </script>
    @endsection

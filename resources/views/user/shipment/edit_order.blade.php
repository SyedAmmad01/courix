@extends('layouts.front')
@section('page_title', 'Edit Order Page')
@section('content')

<h1 class="card-title mt-5" style="margin-left: 1rem;"><i class="fas fa-fw fa-cube fa-sm text-dark"></i>
    Edit Order
</h1>
{{-- <div class="card-body">
    <div>
        <div class="row p-4 bg-light" style="margin-left: 0.1rem; margin-right: 0.1rem;">
            <div class="card card-custom example example-compact w-100">
                <div class="container-fluid">
                </div>
            </div>
        </div>
    </div>
</div> --}}
<div class="card-body">
    <div>
        <div class="row p-4 bg-light" style="margin-left: 0.1rem; margin-right: 0.1rem;">
            <div class="card card-custom example example-compact w-100">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-12">
                            <form class="forms-sample" id="get_order">
                                <div class="row mb-5">
                                    <div class="col-3">
                                        <div class="form-group">
                                            <label class="text-lg-right col-form-label">Tracking No / Barcode<span
                                                    class="text-danger">*</span></label>
                                            <div class="input-group m-b-10">
                                                <div class="input-group-prepend"><span class="input-group-text">
                                                        <i class="fas fa-lg fa-fw fa-barcode"></i></span></div>
                                                <input type="text" id="barcode" name="barcode" placeholder="123..."
                                                    class="form-control">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-9" style="margin-top: 38px;">
                                        <div class="form-group">
                                            <button type="submit" class="btn btn-primary btn-sm"
                                                style="background-color:#007aff;">
                                                Search</button>
                                        </div>
                                    </div>

                                </div>
                            </form>

                            <form class="forms-sample" id="edit_order">
                                <div class="row mb-5">
                                    <div class="col-3">
                                        <div class="form-group">
                                            <label class="text-lg-right col-form-label">Shipper Ref <span
                                                    class="text-danger">*</span></label>
                                            <div class="input-group m-b-10">
                                                <div class="input-group-prepend"><span class="input-group-text">
                                                        <i class="fab fa-lg fa-fw fa-slack-hash"></i></span></div>
                                                <input type="text" id="s-awb_number" name="awb_number"
                                                    placeholder="BarCode" class="form-control">
                                                <input type="hidden" id="s-id" name="id">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-3">
                                        <div class="form-group">
                                            <label class="text-lg-right col-form-label">Reference Number (Optional)<span
                                                    class="text-danger">*</span></label>
                                            <div class="input-group m-b-10">
                                                <div class="input-group-prepend"><span class="input-group-text">
                                                        <i class="fab fa-lg fa-fw fa-slack-hash"></i></span></div>
                                                <input type="text" id="s-reference_number" name="reference_number"
                                                    placeholder="(Optional)" class="form-control">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-3">
                                        <div class="form-group">
                                            <label class="text-lg-right col-form-label">Order Date<span
                                                    class="text-danger">*</span></label>
                                            <div class="input-group m-b-10">
                                                <div class="input-group-prepend"><span class="input-group-text">
                                                        <i class="fas fa-lg fa-fw  fa-calendar-alt"></i></span></div>
                                                <input type="date" id="s-order_date" name="order_date" placeholder=""
                                                    class="form-control">
                                            </div>
                                        </div>
                                    </div>



                                    <div class="col-3">
                                        <div class="form-group">
                                            <label class="text-lg-right col-form-label">Service Type<span
                                                    class="text-danger">*</span></label>
                                            <div class="input-group m-b-10">
                                                <div class="input-group-prepend"><span class="input-group-text">
                                                        <i class="fas fa-lg fa-fw  fa-flag-checkered"></i></span></div>
                                                <select class="form-control kt-select2 select2" id="s-service_type"
                                                    name="service_type">
                                                    <option value="" disabled selected>Please Select Service Type
                                                    </option>
                                                    <option value="NDD">NDD - Next Day Delivery </option>
                                                    <option value="SDD">SDD - Same Day Delivery</option>
                                                    <option value="ODA">ODA - Out Of Services Area</option>
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
                                                <div class="input-group-prepend"><span class="input-group-text">
                                                        <i class="fab fa-lg fa-fw fa-slack-hash"></i></span></div>
                                                <select class="form-control kt-select2 select2" id="s-shipper_code"
                                                    name="shipper_code" onchange="myFunction()">
                                                    <option value="" disabled selected>Please Select Shipper Code
                                                    </option>
                                                </select>

                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-3">
                                        <div class="form-group">
                                            <label class="text-lg-right col-form-label">Shipper Name<span
                                                    class="text-danger">*</span></label>
                                            <div class="input-group m-b-10">
                                                <div class="input-group-prepend"><span class="input-group-text">
                                                        <i class="fas fa-lg fa-fw fa-user"></i></span></div>
                                                <input type="text" id="s-shipper_name" name="shipper_name"
                                                    placeholder="Shipper Name" class="form-control" readonly>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-3">
                                        <div class="form-group">
                                            <label class="text-lg-right col-form-label">Contact Office 1<span
                                                    class="text-danger">*</span></label>
                                            <div class="input-group m-b-10">
                                                <div class="input-group-prepend"><span class="input-group-text">
                                                        <i class="fas fa-lg fa-fw m-r-10 fa-mobile-alt"></i></span>
                                                </div>
                                                <input type="text" id="s-contact_office_1" name="contact_office_1"
                                                    placeholder="Mobile" class="form-control" readonly>
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
                                                <input type="text" id="s-reciver_name" name="reciver_name"
                                                    placeholder="Receiver Name" class="form-control">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-3">
                                        <div class="form-group">
                                            <label class="text-lg-right col-form-label">Mobile 1 <span
                                                    class="text-danger">*</span></label>
                                            <div class="input-group m-b-10">
                                                <div class="input-group-prepend"><span class="input-group-text">
                                                        <i class="fas fa-lg fa-fw m-r-10 fa-mobile-alt"></i></span>
                                                </div>
                                                <input type="text" id="s-mobile_1" name="mobile_1"
                                                    placeholder="Mobile 1" class="form-control">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-6">
                                        <div class="form-group">
                                            <label class="text-lg-right col-form-label">Mobile 2 (Optional)<span
                                                    class="text-danger">*</span></label>
                                            <div class="input-group m-b-10">
                                                <div class="input-group-prepend"><span class="input-group-text">
                                                        <i class="fas fa-lg fa-fw m-r-10 fa-mobile-alt"></i></span>
                                                </div>
                                                <input type="text" id="s-mobile_2" name="mobile_2"
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
                                                <input type="text" id="s-cod" name="cod"
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
                                                <input type="text" id="s-service_charges" name="service_charges"
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
                                                        <i class="fab fa-lg fa-fw fa fa-quote-left"></i></span></div>
                                                <input type="text" id="s-instruction" name="instruction"
                                                    placeholder="Instruction (Optional)" class="form-control">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-3">
                                        <div class="form-group">
                                            <label class="text-lg-right col-form-label">Description<span
                                                    class="text-danger">*</span></label>
                                            <div class="input-group m-b-10">
                                                <div class="input-group-prepend"><span class="input-group-text">
                                                        <i class="fab fa-lg fa-fw fa fa-quote-left"></i></span></div>
                                                <input type="text" id="s-description" name="description"
                                                    placeholder="Description (Optional)" class="form-control">
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
                                                        <i class="fas fa-lg fa-fw  fa-globe"></i></span></div>
                                                <select class="form-control kt-select2 select2" id="s-country"
                                                    name="country" onchange="fun()">
                                                    <option value="" disabled selected>Please Select Country
                                                    </option>

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
                                                        <i class="fas fa-lg fa-fw fa-map-marker-alt"></i></span></div>
                                                <select class="form-control kt-select2 select2" id="s-city"
                                                    name="city">
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
                                                        <i class="fas fa-lg fa-fw fa-map-marker-alt"></i></span></div>
                                                <select class="form-control kt-select2 select2" id="s-area"
                                                    name="area">
                                                    <option value="" disabled selected>Please Select Area
                                                    </option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-3">
                                        <div class="form-group">
                                            <label class="text-lg-right col-form-label">Street Address<span
                                                    class="text-danger">*</span></label>
                                            <div class="input-group m-b-10">
                                                <div class="input-group-prepend"><span class="input-group-text">
                                                        <i class="fas fa-lg fa-fw  fa-street-view"></i></span></div>
                                                <input type="text" id="s-street_address" name="street_address"
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
                                                        <i class="fab fa-lg fa-fw fa fa-truck"></i></span></div>
                                                <input type="text" id="s-delivery_code" name="delivery_code"
                                                    placeholder="Delivery Code" class="form-control">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-3">
                                        <div class="form-group">
                                            <label class="text-lg-right col-form-label">Actual Weight<span
                                                    class="text-danger">*</span></label>
                                            <div class="input-group m-b-10">
                                                <div class="input-group-prepend"><span class="input-group-text">
                                                        <i class="fab fa-lg fa-fw fa-slack-hash"></i></span></div>
                                                <input type="text" id="s-actual_weight" name="actual_weight"
                                                    placeholder="Actual Weight" class="form-control">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-3">
                                        <div class="form-group">
                                            <label class="text-lg-right col-form-label">Chargeable Weight<span
                                                    class="text-danger">*</span></label>
                                            <div class="input-group m-b-10">
                                                <div class="input-group-prepend"><span class="input-group-text">
                                                        <i class="fab fa-lg fa-fw fa-slack-hash"></i></span></div>
                                                <input type="text" id="" name=""
                                                    placeholder="Chargeable Weight" class="form-control">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-3 mt-4">
                                        <div class="form-group">
                                            <label class="text-lg-right col-form-label"><span
                                                    class="text-danger"></span></label>
                                            <div class="input-group m-b-10">
                                                <div class="form-check">
                                                    <input class="form-check-input" type="checkbox" value=""
                                                        id="s-is_fragile">
                                                    <label class="form-check-label" for="flexCheckDefault">
                                                        Is Fragile
                                                    </label>
                                                </div>
                                            </div>
                                        </div>


                                    </div>


                                </div>

                                <hr>
                                <div class="row mb-5 ml-1">
                                    <div class="col-3">
                                        <div class="form-group">
                                            <label class="text-lg-right col-form-label">No. of Pieces<span
                                                    class="text-danger">*</span></label>
                                            <div class="input-group m-b-10">
                                                <div class="input-group-prepend"><span class="input-group-text"><i
                                                            class="fas fa-lg fa-fw fa-cubes"></i></span></div>
                                                <input type="text" id="s-no_of_peices" name="no_of_peices"
                                                    placeholder="No. of Pieces" data-parsley-group="step-1"
                                                    data-parsley-required="true" class="form-control">
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

                                    <div class="col-6">
                                        <div class="form-group">
                                            <label class="text-lg-right col-form-label"><span
                                                    class="text-danger"></span></label>
                                        </div>
                                    </div>

                                    <div class="col-3">
                                        <div class="form-group">
                                            <label class="text-lg-right col-form-label"><span
                                                    class="text-danger"></span></label>
                                            <div class="input-group m-b-10">
                                                <textarea placeholder="Tell us about 1st price" id="s-details_of_products" name="details_of_products" rows="2"
                                                    cols="40"></textarea>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-3">
                                        <div class="form-group">
                                            <label class="text-lg-right col-form-label"><span
                                                    class="text-danger"></span></label>
                                            <div class="input-group m-b-10">
                                                <input type="text" id="s-cod_peice" name="cod_peice"
                                                    placeholder="COD" data-parsley-group="step-1"
                                                    data-parsley-required="true" class="form-control" readonly>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-6 mt-4">
                                        <div class="form-group">
                                            <button type="submit" class="btn btn-secondary btn-sm"
                                                style="margin-top: 15px;">Confirm</button>
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
</div>


@endsection

@section('page-scripts')
@endsection

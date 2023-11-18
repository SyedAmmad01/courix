<meta name="csrf-token" content="{{ csrf_token() }}" />
<script src="https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.min.js"></script>
<script src="https://momentjs.com/downloads/moment.js"></script>
<!-- Modal-->
<div class="modal fade bd-example-modal-lg" id="exampleModal" tabindex="-1" role="dialog"
    aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h2 class="modal-title" id="exampleModalLabel"><i class="fas fa-solid fa-car text-dark fa-lg"></i>&nbsp; Add Shipper Address Book</h2>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-4">
                        <div class="mb-3">
                            <label class=" text-lg-right col-form-label">Name<span
                                    class="text-danger">*</span></label>
                            <div class="input-group m-b-10">
                                <div class="input-group-prepend"><span class="input-group-text"><i class="fas fa-lg fa-fw fa-user"></i></span></div>
                                <input type="text" name="shipper_code" id="shipper_code"
                                    placeholder="Name" data-parsley-group="step-1"
                                    data-parsley-required="true" class="form-control txtValidate">
                            </div>
                        </div>
                    </div>

                    <div class="col-4">
                        <div class="mb-3">
                            <label class=" text-lg-right col-form-label">Email<span
                                    class="text-danger">*</span></label>
                            <div class="input-group m-b-10">
                                <div class="input-group-prepend"><span class="input-group-text"><i class="fas fa-lg fa-fw fa-user"></i></span></div>
                                <input type="text" name="shipper_code" id="shipper_code" placeholder="Email"
                                    data-parsley-group="step-1" data-parsley-required="true"
                                    class="form-control txtValidate">
                            </div>
                        </div>
                    </div>

                    <div class="col-4">
                        <div class="mb-3">
                            <label class=" text-lg-right col-form-label">Phone<span
                                    class="text-danger">*</span></label>
                            <div class="input-group m-b-10">
                                <div class="input-group-prepend"><span class="input-group-text"><i class="fas fa-lg fa-fw fa-mobile-alt"></i></span></div>
                                <input type="text" name="shipper_code" id="shipper_code"
                                    placeholder="Phone" data-parsley-group="step-1"
                                    data-parsley-required="true" class="form-control txtValidate">
                            </div>
                        </div>

                    </div>

                </div>

                <div class="row">
                    <div class="col-6">
                        <div class="mb-3">
                            <label class=" text-lg-right col-form-label">Mobile<span
                                    class="text-danger">*</span></label>
                            <div class="input-group m-b-10">
                                <div class="input-group-prepend"><span class="input-group-text">
                                    <i class="fas fa-lg fa-fw fa-mobile-alt"></i></span></div>
                                <input type="text" name="shipper_code" id="shipper_code" placeholder="Mobile"
                                    data-parsley-group="step-1" data-parsley-required="true"
                                    class="form-control txtValidate">
                            </div>
                        </div>
                    </div>

                    <div class="col-6">
                        <div class="mb-3">
                            <label class=" text-lg-right col-form-label">Mobile 2<span
                                    class="text-danger">*</span></label>
                            <div class="input-group m-b-10">
                                <div class="input-group-prepend"><span class="input-group-text">
                                    <i class="fas fa-lg fa-fw fa-mobile-alt"></i></span></div>
                                <input type="text" name="shipper_code" id="shipper_code" placeholder="Mobile 2"
                                    data-parsley-group="step-1" data-parsley-required="true"
                                    class="form-control txtValidate">
                            </div>
                        </div>
                    </div>


                </div>

                <div class="row">
                    <div class="col-4">
                        <div class="mb-3">
                            <label class=" text-lg-right col-form-label">Choose Country<span
                                    class="text-danger">*</span></label>
                            <div class="input-group m-b-10">
                                <div class="input-group-prepend"><span class="input-group-text"><i class="fas fa-lg fa-fw fa-map-marker-alt"></i></span></div>
                                <input type="text" name="shipper_code" id="shipper_code" placeholder=""
                                    data-parsley-group="step-1" data-parsley-required="true"
                                    class="form-control txtValidate">
                            </div>
                        </div>
                    </div>

                    <div class="col-4">
                        <div class="mb-3">
                            <label class=" text-lg-right col-form-label">City<span
                                    class="text-danger">*</span></label>
                            <div class="input-group m-b-10">
                                <div class="input-group-prepend"><span class="input-group-text"><i class="fas fa-lg fa-fw fa-map-marker-alt"></i></span></div>
                                <input type="text" name="shipper_code" id="shipper_code" placeholder=""
                                    data-parsley-group="step-1" data-parsley-required="true"
                                    class="form-control txtValidate">
                            </div>
                        </div>
                    </div>

                    <div class="col-4">
                        <div class="mb-3">
                            <label class=" text-lg-right col-form-label">Area<span
                                    class="text-danger">*</span></label>
                            <div class="input-group m-b-10">
                                <div class="input-group-prepend"><span class="input-group-text"><i class="fas fa-lg fa-fw fa-map-marker-alt"></i></span></div>
                                <input type="text" name="shipper_code" id="shipper_code" placeholder=""
                                    data-parsley-group="step-1" data-parsley-required="true"
                                    class="form-control txtValidate">
                            </div>
                        </div>
                    </div>


                </div>


            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-light-primary font-weight-bold"
                    data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary font-weight-bold">Add</button>
            </div>
        </div>
    </div>
</div>

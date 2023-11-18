<meta name="csrf-token" content="{{ csrf_token() }}" />
<script src="https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.min.js"></script>
<script src="https://momentjs.com/downloads/moment.js"></script>

<div class="modal fade bd-example-modal-lg" id="quickadd" tabindex="-1" aria-labelledby="myLargeModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            {{-- action="{{ route('user.candidate.save') }}" method="post" --}}
            <form class="needs-validation" id="quickadd" novalidate>
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel" style="font-weight: bold;">Shipper Register</h5>
                    {{-- <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button> --}}
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label class=" text-lg-right col-form-label">Shipper Code<span
                                        class="text-danger">*</span></label>
                                <div class="input-group m-b-10">
                                    <div class="input-group-prepend"><span class="input-group-text"><i
                                                class="fa fa-user"></i></span></div>
                                    <input type="text" name="shipper_code" id="shipper_code"
                                        placeholder="Shipper Code" data-parsley-group="step-1"
                                        data-parsley-required="true" class="form-control txtValidate"
                                        value="SH000{{ $shipper_code }}" readonly>
                                </div>
                            </div>

                            <div class="mb-3 ">
                                <label class=" text-lg-right col-form-label">Last Name <span
                                        class="text-danger">*</span></label>
                                <div class="input-group m-b-10">
                                    <div class="input-group-prepend"><span class="input-group-text"><i
                                                class="fa fa-user"></i></span></div>
                                    <input type="text" name="manager_name" id="manager_name" placeholder="Last Name"
                                        data-parsley-group="step-1" data-parsley-required="true"
                                        class="form-control txtValidate">
                                </div>
                            </div>


                            <div class="mb-3 city" style="display: none;">
                                <label class="text-lg-right col-form-label">City <span
                                        class="text-danger">*</span></label>
                                <div class="input-group m-b-10">
                                    <div class="input-group-prepend"><span class="input-group-text"><i
                                                class="fa fa-globe"></i></span></div>
                                    <select class="form-control city" id="city" name="city">
                                        <option value="" disabled selected>Please Select City</option>

                                    </select>
                                </div>
                            </div>

                            <div class="mb-3 street_address" style="display: none;">
                                <label class=" text-lg-right col-form-label">Street Address<span
                                        class="text-danger">*</span></label>
                                <div class="input-group m-b-10">
                                    <div class="input-group-prepend"><span class="input-group-text"><i
                                                class="fa fa-phone"></i></span></div>
                                    <input type="text" name="street_address" id="street_address"
                                        placeholder="Street Address" data-parsley-group="step-1"
                                        data-parsley-required="true" class="form-control txtValidate street_address">
                                </div>
                            </div>



                            <div class="mb-3">
                                <label class=" text-lg-right col-form-label">Mobile <span
                                        class="text-danger">*</span></label>
                                <div class="input-group m-b-10">
                                    <div class="input-group-prepend"><span class="input-group-text"><i
                                                class="fa fa-mobile"></i></span></div>
                                    <input type="number" name="contact_office_1" id="contact_office_1"
                                        placeholder="Mobile " data-parsley-group="step-1" data-parsley-required="true"
                                        class="form-control txtValidate">
                                </div>
                            </div>

                            <div class="mb-3">
                                <label class="text-lg-right col-form-label">Password<span
                                        class="text-danger">*</span></label>
                                <div class="input-group m-b-10">
                                    <div class="input-group-prepend"><span class="input-group-text"><i
                                                class="fa fa-lock"></i></span></div>
                                    <input type="password" name="password" id="password" placeholder="Password"
                                        data-parsley-group="step-1" data-parsley-required="true"
                                        class="form-control txtValidate">
                                </div>
                            </div>





                        </div>
                        <div class="col-md-6">

                            <div class="mb-3">
                                <label class=" text-lg-right col-form-label">First Name<span
                                        class="text-danger">*</span></label>
                                <div class="input-group m-b-10">
                                    <div class="input-group-prepend"><span class="input-group-text"><i
                                                class="fa fa-user"></i></span></div>
                                    <input type="text" name="company_name" id="company_name"
                                        placeholder="First Name" data-parsley-group="step-1"
                                        data-parsley-required="true" class="form-control txtValidate">
                                </div>
                            </div>

                            <div class="mb-3">
                                <label class=" text-lg-right col-form-label">Country<span
                                        class="text-danger">*</span></label>
                                <div class="input-group m-b-10">
                                    <div class="input-group-prepend"><span class="input-group-text"><i
                                                class="fa fa-globe"></i></span></div>
                                    <select class="form-control country" id="country" name="country"
                                        onchange="fun()">
                                        <option value="" disabled selected>Please Select Country</option>
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

                                </div>
                            </div>


                            <div class="mb-3 area" style="display: none;">
                                <label class="text-lg-right col-form-label">Area<span
                                        class="text-danger">*</span></label>
                                <div class="input-group m-b-10">
                                    <div class="input-group-prepend"><span class="input-group-text"><i
                                                class="fa fa-globe"></i></span></div>
                                    <select class="form-control" id="area" name="area">
                                        <option value="" disabled selected>Please Select Area</option>
                                    </select>
                                </div>
                            </div>


                            <div class="mb-3">
                                <label class=" text-lg-right col-form-label">Email<span
                                        class="text-danger">*</span></label>
                                <div class="input-group m-b-10">
                                    <div class="input-group-prepend"><span class="input-group-text"><i
                                                class="fa fa-phone"></i></span></div>
                                    <input type="text" name="shipper_email" id="shipper_email"
                                        placeholder="Email" data-parsley-group="step-1" data-parsley-required="true"
                                        class="form-control txtValidate">
                                </div>
                            </div>

                            <div class="mb-3">
                                <label class="text-lg-right col-form-label">Rate<span
                                        class="text-danger">*</span></label>
                                <div class="input-group m-b-10">
                                    <div class="input-group-prepend"><span class="input-group-text"><i
                                                class="fa fa-lock"></i></span></div>
                                    <input type="number" name="txtShipperName" id="txtShipperName"
                                        placeholder="Rates" data-parsley-group="step-1" data-parsley-required="true"
                                        class="form-control txtValidate">
                                </div>
                            </div>

                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6 weight" style="display:none;">
                            <div class="mb-3">
                                <label class="text-lg-right col-form-label">Default Weight<span
                                        class="text-danger">*</span></label>
                                <div class="input-group m-b-10">
                                    <div class="input-group-prepend"><span class="input-group-text"><i
                                                class="fa fa-lock"></i></span></div>
                                    <input type="text" name="" id="" placeholder="Default Weight"
                                        data-parsley-group="step-1" data-parsley-required="true"
                                        class="form-control txtValidate">
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 weight" style="display:none;">
                            <div class="mb-3 ">
                                <label class=" text-lg-right col-form-label">Additional Charges<span
                                        class="text-danger">*</span></label>
                                <div class="input-group m-b-10">
                                    <div class="input-group-prepend"><span class="input-group-text"><i
                                                class="fa fa-lock"></i></span></div>
                                    <input type="text" name="" id=""
                                        placeholder="Additional Charges" data-parsley-group="step-1"
                                        data-parsley-required="true" class="form-control txtValidate">
                                </div>
                            </div>

                        </div>
                    </div>


                    <div class="mb-3">
                        <label class=" text-lg-right col-form-label">Is Volumetric Weight<span
                                class="text-danger">*</span></label>
                        <br>
                        <label class="switch">
                            <input type="checkbox" id="volumetric_weight" data-parsley-multiple="volumetric_weight"
                                name="volumetric_weight">
                            <div class="slider round">
                                <span class="on">Enable</span>
                                <span class="off">Disable</span>
                            </div>
                        </label>
                    </div>



                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-dark btn-sm" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary btn-sm">Register</button>
                </div>
            </form>
        </div>
    </div>
</div>

<script>
    $(document).ready(function() {
        $(".select2").select2();
    });


    $(document).ready(function() {
        var isCityVisible = false;

        $(".country").change(function() {
            isCityVisible = !isCityVisible;

            if (isCityVisible) {
                $(".city").css("display", "block");
            } else {
                $(".city").css("display", "none");
            }
        });
    });


    $(document).ready(function() {
        var isAreaVisible = false;

        $("#city").change(function() {
            isAreaVisible = !isAreaVisible;

            if (isAreaVisible) {
                $(".area").css("display", "block");
            } else {
                $(".area").css("display", "none");
            }
        });
    });


    $(document).ready(function() {
        var isStreetAddessVisible = false;

        $("#area").change(function() {
            isStreetAddessVisible = !isStreetAddessVisible;

            if (isStreetAddessVisible) {
                $(".street_address").css("display", "block");
            } else {
                $(".street_address").css("display", "none");
            }
        });
    });

    $(document).ready(function() {
        $("#volumetric_weight").change(function() {
            var isAreaVisible = $(this).is(":checked");
            if (isAreaVisible) {
                $(".weight").css("display", "block");
            } else {
                $(".weight").css("display", "none");
            }
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

    $("#quickadd").on("submit", function(e) {
        e.preventDefault()
        // var csrfToken = $('meta[name="csrf-token"]').attr('content');
        var _token = '{{ csrf_token() }}';
        var shipper_code = $("#shipper_code").val();
        var company_name = $("#company_name").val();
        var manager_name = $("#manager_name").val();
        var shipper_email = $("#shipper_email").val();
        var contact_office_1 = $("#contact_office_1").val();
        var country = $("#country").val();
        var volumetric_weight = $("#volumetric_weight").is(":checked") ? "on" : "off";
        var city = $("#city").val();
        var area = $("#area").val();
        var street_address = $("#street_address").val();
        var password = $("#password").val();


        var formData = new FormData();
        formData.append('_token', _token);
        formData.append('shipper_code', shipper_code);
        formData.append('company_name', company_name);
        formData.append('manager_name', manager_name);
        formData.append('shipper_email', shipper_email);
        formData.append('contact_office_1', contact_office_1);
        formData.append('country', country);
        formData.append('volumetric_weight', volumetric_weight);
        formData.append('city', city);
        formData.append('area', area);
        formData.append('street_address', street_address);
        formData.append('password', password);

        $.ajax({
            type: "POST",
            url: "{{ route('admin.shipper.quick_add') }}",
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
</script>

<meta name="csrf-token" content="{{ csrf_token() }}" />
<script src="https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.min.js"></script>
<script src="https://momentjs.com/downloads/moment.js"></script>

<div class="modal fade bd-example-modal-lg" id="changeofrates" tabindex="-1" aria-labelledby="myLargeModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel" style="font-weight: bold;">Change Rates Of <span
                        id="s-shipper_code" class="text-muted"></span> | <span id="s-company_name"
                        class="text-muted"></span></h5>
            </div>
            <form class="needs-validation" id="changeofrates" novalidate>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-4">
                            <div class="mb-3">
                                <input type="hidden" id="s-id" name="">
                                <label class=" text-lg-right col-form-label">Default rate for Cities<span
                                        class="text-danger">*</span></label>
                                <div class="input-group m-b-10">
                                    <div class="input-group-prepend"><span class="input-group-text"><i
                                                class="far fa-lg fa-fw fa-money-bill-alt"></i></span></div>
                                    <input type="text" name="shipper_code" id="city_rate"
                                        placeholder="Default rate for Cities" data-parsley-group="step-1"
                                        data-parsley-required="true" class="form-control txtValidate" value="30">
                                </div>
                            </div>
                        </div>

                        <div class="col-4">
                            <div class="mb-3">
                                <label class=" text-lg-right col-form-label">Default Weight<span
                                        class="text-danger">*</span></label>
                                <div class="input-group m-b-10">
                                    <div class="input-group-prepend"><span class="input-group-text"><i
                                                class="far fa-lg fa-fw fa-money-bill-alt"></i></span></div>
                                    <input type="text" name="shipper_code" id="weight"
                                        placeholder="Default Weight" data-parsley-group="step-1"
                                        data-parsley-required="true" class="form-control txtValidate" value="2">
                                </div>
                            </div>
                        </div>

                        <div class="col-4">
                            <div class="mb-3">
                                <label class=" text-lg-right col-form-label">Default Additional Charges<span
                                        class="text-danger">*</span></label>
                                <div class="input-group m-b-10">
                                    <div class="input-group-prepend"><span class="input-group-text"><i
                                                class="far fa-lg fa-fw fa-money-bill-alt"></i></span></div>
                                    <input type="text" name="shipper_code" id="additional_charges"
                                        placeholder="Default Additional Charges" data-parsley-group="step-1"
                                        data-parsley-required="true" class="form-control txtValidate" value="10">
                                </div>
                            </div>

                        </div>

                    </div>

                    <div class="row">
                        <div class="col-12 text-right">
                            <button type="submit" class="btn btn-primary btn-sm text-light">Set Default</button>
                        </div>
                    </div>
            </form>

            <hr>
            <form class="needs-validation" id="ratesofchange" novalidate>
                <div class="row">
                    <div class="col-12">
                        <div class="mb-3">
                            <label class="text-lg-right col-form-label">City<span class="text-danger">*</span></label>
                            <div class="input-group m-b-10">
                                <div class="input-group-prepend"><span class="input-group-text"><i
                                            class="fa fa-globe"></i></span></div>
                                <select class="form-control citys" id="citys" name="citys" onchange="rates()">
                                    <option value="" disabled selected>Please Select City</option>
                                    @foreach ($fetch_citys as $key)
                                        @if (old('city') == $key->id)
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

                <div class="row">
                    <div class="col-4">
                        <div class="mb-3">
                            <label class=" text-lg-right col-form-label">City Rate<span
                                    class="text-danger">*</span></label>
                            <div class="input-group m-b-10">
                                <div class="input-group-prepend"><span class="input-group-text"><i
                                            class="far fa-lg fa-fw fa-money-bill-alt"></i></span></div>
                                <input type="text" name="shipper_code" id="city_rates" placeholder="City Rate"
                                    data-parsley-group="step-1" data-parsley-required="true"
                                    class="form-control txtValidate" value="30">
                            </div>
                        </div>
                    </div>

                    <div class="col-4">
                        <div class="mb-3">
                            <label class=" text-lg-right col-form-label">Weight<span
                                    class="text-danger">*</span></label>
                            <div class="input-group m-b-10">
                                <div class="input-group-prepend"><span class="input-group-text"><i
                                            class="far fa-lg fa-fw fa-money-bill-alt"></i></span></div>
                                <input type="text" name="shipper_code" id="city_weight" placeholder="Weight"
                                    data-parsley-group="step-1" data-parsley-required="true"
                                    class="form-control txtValidate" value="2">
                            </div>
                        </div>
                    </div>

                    <div class="col-4">
                        <div class="mb-3">
                            <label class=" text-lg-right col-form-label">Additional Charges<span
                                    class="text-danger">*</span></label>
                            <div class="input-group m-b-10">
                                <div class="input-group-prepend"><span class="input-group-text"><i
                                            class="far fa-lg fa-fw fa-money-bill-alt"></i></span></div>
                                <input type="text" name="shipper_code" id="city_additional_charges"
                                    placeholder="Additional Charges" data-parsley-group="step-1"
                                    data-parsley-required="true" class="form-control txtValidate" value="10">
                            </div>
                        </div>

                    </div>

                </div>

        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-dark btn-sm" data-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-primary btn-sm text-light">Save</button>
        </div>
        </form>
    </div>
</div>
</div>


<script>
    $(document).ready(function() {
        $(".select2").select2();
    });

    $("#changeofrates").on("submit", function(e) {
        e.preventDefault()
        // var csrfToken = $('meta[name="csrf-token"]').attr('content');
        var _token = '{{ csrf_token() }}';
        var id = $("#s-id").val();
        var city_rate = $("#city_rate").val();
        var weight = $("#weight").val();
        var additional_charges = $("#additional_charges").val();

        var formData = new FormData();
        formData.append('_token', _token);
        formData.append('s-id', id);
        formData.append('city_rate', city_rate);
        formData.append('weight', weight);
        formData.append('additional_charges', additional_charges);

        $.ajax({
            type: "POST",
            url: "{{ route('admin.shipper.rates_save') }}",
            data: formData,
            processData: false,
            contentType: false,
            success: function(data) {
                if (data) {
                    alert('Rates Added Successfully');
                    // location.reload(true);
                }
            },
            error: function(data, textStatus, errorThrown) {
                // console.log(data);
                alert('Rates Added Unsuccessfully');
            },
        });
    });

    $("#ratesofchange").on("submit", function(e) {
        e.preventDefault()
        // var csrfToken = $('meta[name="csrf-token"]').attr('content');
        var _token = '{{ csrf_token() }}';
        var id = $("#s-id").val();
        var city_id = $("#citys").val();
        var city_rates = $("#city_rates").val();
        var city_weight = $("#city_weight").val();
        var city_additional_charges = $("#city_additional_charges").val();

        var formData = new FormData();
        formData.append('_token', _token);
        formData.append('s-id', id);
        formData.append('citys', city_id);
        formData.append('city_rates', city_rates);
        formData.append('city_weight', city_weight);
        formData.append('city_additional_charges', city_additional_charges);

        $.ajax({
            type: "POST",
            url: "{{ route('admin.shipper.rates_city_save') }}",
            data: formData,
            processData: false,
            contentType: false,
            success: function(data) {
                if (data) {
                    alert('Rates Added Successfully');
                    // location.reload(true);
                }
            },
            error: function(data, textStatus, errorThrown) {
                // console.log(data);
                alert('Rates Added Unsuccessfully');
            },
        });
    });

    // function rates() {
    //     var shipper_id = $('#s-id').val();
    //     var city_id = $('#citys').val();
    //     // alert(id);
    //     $.ajax({
    //         headers: {
    //             'X-CSRF-TOKEN': "{{ csrf_token() }}",
    //         },
    //         url: "{{ route('admin.shipper.get_name') }}",
    //         type: "POST",
    //         data: {
    //             shipper_id: shipper_id,
    //             city_id: city_id,
    //         },
    //         success: function(response) {
    //             // console.log(response);
    //             $('#city_rates').val(response.city_rate);
    //             $('#city_weight').val(response.weight);
    //             $('#city_additional_charges').val(response.additional_charges);
    //         }
    //     });
    // }

    function rates() {
        var shipper_id = $('#s-id').val();
        var city_id = $('#citys').val();
        // alert(id);
        $.ajax({
            headers: {
                'X-CSRF-TOKEN': "{{ csrf_token() }}",
            },
            url: "{{ route('admin.shipper.get_name') }}",
            type: "POST",
            data: {
                shipper_id: shipper_id,
                city_id: city_id,
            },
            success: function(response) {
                // Check if response has data
                if (response) {
                    $('#city_rates').val(response.city_rate);
                    $('#city_weight').val(response.weight);
                    $('#city_additional_charges').val(response.additional_charges);
                } else {
                    // If response is empty, set input fields to null
                    $('#city_rates').val(null);
                    $('#city_weight').val(null);
                    $('#city_additional_charges').val(null);
                }
            }
        });
    }
</script>

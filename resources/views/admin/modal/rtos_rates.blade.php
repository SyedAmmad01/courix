<meta name="csrf-token" content="{{ csrf_token() }}" />
<script src="https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.min.js"></script>
<script src="https://momentjs.com/downloads/moment.js"></script>

<div class="modal fade bd-example-modal-lg" id="rtos_rates" tabindex="-1" aria-labelledby="myLargeModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel" style="font-weight: bold;">Change Rto Rate Of <span
                        id="e-shipper_code" class="text-muted"></span> | <span id="e-company_name"
                        class="text-muted"></span></h5>
            </div>
            <div class="modal-body">
                <form class="needs-validation" id="rtos_charges" novalidate>
                    <div class="row">
                        <div class="col-4">
                            <div class="mb-3">
                                <input type="hidden" id="e-id" name="">
                                <label class=" text-lg-right col-form-label">Default Rto Rate for Cities<span
                                        class="text-danger">*</span></label>
                                <div class="input-group m-b-10">
                                    <div class="input-group-prepend"><span class="input-group-text"><i
                                                class="far fa-lg fa-fw fa-money-bill-alt"></i></span></div>
                                    <input type="text" name="shipper_code" id="e-city_rto_rate"
                                        placeholder="Default Rto Rate for Cities" data-parsley-group="step-1"
                                        data-parsley-required="true" class="form-control txtValidate" value="10">
                                </div>
                            </div>
                        </div>

                        <div class="col-4" style="margin-top: 3.5rem;">
                            <button type="submit" class="btn btn-primary btn-sm text-light">Set Default</button>
                        </div>
                    </div>
                </form>

                <hr>
                <form class="needs-validation" id="charges_rtos" novalidate>
                    <div class="row">
                        <div class="col-4">
                            <div class="mb-3">
                                <label class="text-lg-right col-form-label">City<span
                                        class="text-danger">*</span></label>
                                <div class="input-group m-b-10">
                                    <div class="input-group-prepend"><span class="input-group-text"><i
                                                class="fa fa-globe"></i></span></div>
                                    <select class="form-control citys" id="e-citys" name="citys" onchange="rtos()">
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

                        <div class="col-4">
                            <div class="mb-3">
                                <label class=" text-lg-right col-form-label">City Rto Rate<span
                                        class="text-danger">*</span></label>
                                <div class="input-group m-b-10">
                                    <div class="input-group-prepend"><span class="input-group-text"><i
                                                class="far fa-lg fa-fw fa-money-bill-alt"></i></span></div>
                                    <input type="text" name="shipper_code" id="e-city_rtos"
                                        placeholder="City Rto Rate" data-parsley-group="step-1"
                                        data-parsley-required="true" class="form-control txtValidate">
                                </div>
                            </div>
                        </div>

                        <div class="col-4" style="margin-top: 3.5rem;">
                            <button type="submit" class="btn btn-primary btn-sm text-light">Save</button>
                        </div>
                    </div>
                </form>

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-dark" data-dismiss="modal">Close</button>
            </div>

        </div>
    </div>
</div>


<script>
    $(document).ready(function() {
        $(".select2").select2();
    });

    $("#rtos_charges").on("submit", function(e) {
        e.preventDefault()
        // var csrfToken = $('meta[name="csrf-token"]').attr('content');
        var _token = '{{ csrf_token() }}';
        var id = $("#e-id").val();
        var city_rto_rate = $("#e-city_rto_rate").val();


        var formData = new FormData();
        formData.append('_token', _token);
        formData.append('e-id', id);
        formData.append('e-city_rto_rate', city_rto_rate);

        $.ajax({
            type: "POST",
            url: "{{ route('admin.shipper.add_rtos_rate') }}",
            data: formData,
            processData: false,
            contentType: false,
            success: function(data) {
                if (data) {
                    alert('Rtos Rate Added Successfully');
                    // location.reload(true);
                }
            },
            error: function(data, textStatus, errorThrown) {
                // console.log(data);
                alert('Rtos Rate Added Unsuccessfully');
            },
        });
    });

    $("#charges_rtos").on("submit", function(e) {
        e.preventDefault()
        // var csrfToken = $('meta[name="csrf-token"]').attr('content');
        var _token = '{{ csrf_token() }}';
        var id = $("#e-id").val();
        var citys = $("#e-citys").val();
        var city_rto_rate = $("#e-city_rtos").val();


        var formData = new FormData();
        formData.append('_token', _token);
        formData.append('e-id', id);
        formData.append('e-citys', citys);
        formData.append('e-city_rtos', city_rto_rate);

        $.ajax({
            type: "POST",
            url: "{{ route('admin.shipper.add_rtos_city_save') }}",
            data: formData,
            processData: false,
            contentType: false,
            success: function(data) {
                if (data) {
                    alert('Rtos Rate Added Successfully');
                    // location.reload(true);
                }
            },
            error: function(data, textStatus, errorThrown) {
                // console.log(data);
                alert('Rtos Rate Added Unsuccessfully');
            },
        });
    });

    function rtos() {
        var shipper_id = $('#e-id').val();
        var city_id = $('#e-citys').val();
        // alert(id);
        $.ajax({
            headers: {
                'X-CSRF-TOKEN': "{{ csrf_token() }}",
            },
            url: "{{ route('admin.shipper.get_rtos_name') }}",
            type: "POST",
            data: {
                shipper_id: shipper_id,
                city_id: city_id,
            },
            success: function(response) {
                // Check if response has data
                if (response) {
                    $('#e-city_rtos').val(response.city_rto_rate);
                } else {
                    // If response is empty, set input fields to null
                    $('#e-city_rtos').val(null);
                }
            }
        });
    }
</script>

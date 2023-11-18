<meta name="csrf-token" content="{{ csrf_token() }}" />
<script src="https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.min.js"></script>
<script src="https://momentjs.com/downloads/moment.js"></script>

<div class="modal fade bd-example-modal-lg" id="oda_rates" tabindex="-1" aria-labelledby="myLargeModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel" style="font-weight: bold;">Change ODA Rate Of <span
                        id="sh-shipper_code" class="text-muted"></span> | <span id="sh-company_name"
                        class="text-muted"></span></h5>
            </div>
            <div class="modal-body">
                <form class="needs-validation" id="oda_charges" novalidate>
                    <div class="row">
                        <div class="col-4">
                            <div class="mb-3">
                                <input type="hidden" id="sh-id" name="">
                                <label class=" text-lg-right col-form-label">Default ODA Rate for Cities<span
                                        class="text-danger">*</span></label>
                                <div class="input-group m-b-10">
                                    <div class="input-group-prepend"><span class="input-group-text"><i
                                                class="far fa-lg fa-fw fa-money-bill-alt"></i></span></div>
                                    <input type="text" name="shipper_code" id="sh-city_oda_rate"
                                        placeholder="Default ODA Rate for Cities" data-parsley-group="step-1"
                                        data-parsley-required="true" class="form-control txtValidate">
                                </div>
                            </div>
                        </div>

                        <div class="col-4" style="margin-top: 3.5rem;">
                            <button type="submit" class="btn btn-primary btn-sm">Set Default</button>
                        </div>
                    </div>
                </form>

                <hr>

                <form class="needs-validation" id="charges_oda" novalidate>
                    <div class="row">
                        <div class="col-4">
                            <div class="mb-3">
                                <label class="text-lg-right col-form-label">City<span
                                        class="text-danger">*</span></label>
                                <div class="input-group m-b-10">
                                    <div class="input-group-prepend"><span class="input-group-text"><i
                                                class="fa fa-globe"></i></span></div>
                                    <select class="form-control kt-select2 citys" id="sh-citys" name="citys"
                                        onchange="oda()">
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
                                <label class=" text-lg-right col-form-label">City ODA Rate<span
                                        class="text-danger">*</span></label>
                                <div class="input-group m-b-10">
                                    <div class="input-group-prepend"><span class="input-group-text"><i
                                                class="far fa-lg fa-fw fa-money-bill-alt"></i></span></div>
                                    <input type="text" name="shipper_code" id="sh-city_oda"
                                        placeholder="City Rto Rate" data-parsley-group="step-1"
                                        data-parsley-required="true" class="form-control txtValidate" value="30">
                                </div>
                            </div>
                        </div>

                        <div class="col-4" style="margin-top: 3.5rem;">
                            <button type="submit" class="btn btn-primary btn-sm">Save</button>
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

    $("#oda_charges").on("submit", function(e) {
        e.preventDefault();

        var _token = '{{ csrf_token() }}';
        var shipperId = $("#sh-id").val();
        var cityOdaRate = $("#sh-city_oda_rate").val();

        var formData = new FormData();
        formData.append('_token', _token);
        formData.append('sh-id', shipperId);
        formData.append('sh-city_oda_rate', cityOdaRate); // Use 'e-city_rto_rate' to match your PHP code

        $.ajax({
            type: "POST",
            url: "{{ route('admin.shipper.oda_rate') }}",
            data: formData,
            processData: false,
            contentType: false,
            success: function(data) {
                if (data) {
                    alert('ODA Rate Added Successfully');
                    // location.reload(true);
                }
            },
            error: function(data, textStatus, errorThrown) {
                console.log(data); // Check the console for error details
                alert('ODA Rate Added Unsuccessfully');
            },
        });
    });

    $("#charges_oda").on("submit", function(e) {
        e.preventDefault()
        // var csrfToken = $('meta[name="csrf-token"]').attr('content');
        var _token = '{{ csrf_token() }}';
        var id = $("#sh-id").val();
        var citys = $("#sh-citys").val();
        var city_oda_rate = $("#sh-city_oda").val();


        var formData = new FormData();
        formData.append('_token', _token);
        formData.append('sh-id', id);
        formData.append('sh-citys', citys);
        formData.append('sh-city_oda', city_oda_rate);

        $.ajax({
            type: "POST",
            url: "{{ route('admin.shipper.add_oda_city_save') }}",
            data: formData,
            processData: false,
            contentType: false,
            success: function(data) {
                if (data) {
                    alert('ODA Rate Added Successfully');
                    // location.reload(true);
                }
            },
            error: function(data, textStatus, errorThrown) {
                // console.log(data);
                alert('ODA Rate Added Unsuccessfully');
            },
        });
    });

    function oda() {
        var shipper_id = $('#sh-id').val();
        var city_id = $('#sh-citys').val();
        // alert(id);
        $.ajax({
            headers: {
                'X-CSRF-TOKEN': "{{ csrf_token() }}",
            },
            url: "{{ route('admin.shipper.get_oda_name') }}",
            type: "POST",
            data: {
                shipper_id: shipper_id,
                city_id: city_id,
            },
            success: function(response) {
                // Check if response has data
                if (response) {
                    $('#sh-city_oda').val(response.city_oda_rate);
                } else {
                    // If response is empty, set input fields to null
                    $('#sh-city_oda').val(null);
                }
            }
        });
    }
</script>

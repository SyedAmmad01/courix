<meta name="csrf-token" content="{{ csrf_token() }}" />
<script src="https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.min.js"></script>
<script src="https://momentjs.com/downloads/moment.js"></script>

<form class="needs-validation" id="LocationChangeForm" novalidate>
    <div class="modal fade bd-example-modal-lg" id="changelocation" tabindex="-1" aria-labelledby="myLargeModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel" style="font-weight: bold;">Change Location</h5>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-6">
                            <div class="form-group">
                                <label class=" text-lg-right col-form-label">Country<span
                                        class="text-danger">*</span></label>
                                <div class="input-group m-b-10">
                                    <div class="input-group-prepend"><span class="input-group-text"><i
                                                class="fas fa-lg fa-fw fa-globe"></i></span></div>
                                    <select class="form-control" id="country" name="country" onchange="fun()"
                                        style="width:70%;">
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
                                    <input type="hidden" id="c-id" name="id">
                                </div>
                            </div>
                        </div>

                        <div class="col-6">
                            <div class="form-group">
                                <label class="text-lg-right col-form-label">City<span
                                        class="text-danger">*</span></label>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i
                                                class="fas fa-lg fa-fw fa-building"></i></span>
                                    </div>
                                    <select class="form-control" id="city" name="city" style="width:70%;">
                                        <option value="" disabled selected>Please Select City
                                        </option>
                                    </select>
                                </div>
                            </div>
                        </div>

                        <div class="col-6">
                            <div class="form-group">
                                <label class=" text-lg-right col-form-label">Area<span
                                        class="text-danger">*</span></label>
                                <div class="input-group m-b-10">
                                    <div class="input-group-prepend"><span class="input-group-text"><i
                                                class="fas fa-lg fa-fw fa-map-marker-alt"></i></span></div>
                                    <input type="text" name="area" id="area" placeholder="Area"
                                        class="form-control txtValidate" required>
                                        <span class="text-danger invalid-feedback">Area is
                                            Required<span>
                                </div>
                            </div>
                        </div>

                        <div class="col-6">
                            <div class="form-group">
                                <label class=" text-lg-right col-form-label">Street Address<span
                                        class="text-danger">*</span></label>
                                <div class="input-group m-b-10">
                                    <div class="input-group-prepend"><span class="input-group-text"><i
                                                class="fas fa-lg fa-fw fa-street-view"></i></span></div>
                                    <input type="text" name="street_address" id="street_address"
                                        placeholder="Street Address" class="form-control txtValidate" required>
                                        <span class="text-danger invalid-feedback">Street Address is
                                            Required<span>
                                </div>
                            </div>
                        </div>

                        <div class="col-6">
                            <div class="form-group">
                                <label class=" text-lg-right col-form-label">Services Charges<span
                                        class="text-danger">*</span></label>
                                <div class="input-group m-b-10">
                                    <div class="input-group-prepend"><span class="input-group-text"><i
                                                class="far fa-lg fa-fw fa-money-bill-alt"></i></span></div>
                                    <input type="text" name="service_charges" id="service_charges"
                                        placeholder="Services Charges" class="form-control txtValidate" required>
                                        <span class="text-danger invalid-feedback">Services Charges is
                                            Required<span>
                                </div>
                            </div>
                        </div>


                        <div class="col-6">
                            <div class="form-group">
                                <label class=" text-lg-right col-form-label">Instruction<span
                                        class="text-danger">*</span></label>
                                <div class="input-group m-b-10">
                                    <div class="input-group-prepend"><span class="input-group-text"><i
                                                class="fas fa-lg fa-fw m-r-10 fa-quote-left"></i></span></div>
                                    <input type="text" name="instruction" id="instruction" placeholder="Instruction"
                                        class="form-control txtValidate">
                                </div>
                            </div>
                        </div>

                    </div>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger btn-sm" data-dismiss="modal" class="location_close" data-dismiss="modal" aria-label="Close">Cancel</button>
                    <button type="submit" class="btn btn-primary btn-sm">Confirm</button>
                </div>
            </div>
        </div>
    </div>
</form>


<script>
    $(document).ready(function() {
        $(".select2").select2();
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

    (function() {
        'use strict'
        var forms = document.querySelectorAll('.needs-validation')
        Array.prototype.slice.call(forms)
            .forEach(function(form) {
                form.addEventListener('submit', function(event) {
                    if (!form.checkValidity()) {
                        event.preventDefault()
                        event.stopPropagation()
                    }
                    form.classList.add('was-validated')
                }, false)
            })
    })();

    $("#LocationChangeForm").on("submit", function(e) {
        e.preventDefault()
        // var csrfToken = $('meta[name="csrf-token"]').attr('content');
        var _token = '{{ csrf_token() }}';
        var id = $("#c-id").val();
        var country = $("#country").val();
        var city = $("#city").val();
        var area = $("#area").val();
        var street_address = $("#street_address").val();
        var service_charges = $("#service_charges").val();
        var instruction = $("#instruction").val();

        var formData = new FormData();
        formData.append('_token', _token);
        formData.append('id', id);
        formData.append('country', country);
        formData.append('city', city);
        formData.append('area', area);
        formData.append('street_address', street_address);
        formData.append('service_charges', service_charges);
        formData.append('instruction', instruction);

        $.ajax({
            type: "POST",
            url: "{{ route('admin.shipment.update_location') }}",
            data: formData,
            processData: false,
            contentType: false,
            success: function(response) {
                // $('#changelocation').modal('hide'); // Hide the modal
                alert('Location Updated Successfully');
                // location.reload(true);

                // Reset all input fields
                $("#LocationChangeForm")[0].reset();
            },
            error: function(xhr, textStatus, errorThrown) {
                alert('Location Updated Unsuccessfully');
            }
        });
    });
</script>

<meta name="csrf-token" content="{{ csrf_token() }}" />
<script src="https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.min.js"></script>
<script src="https://momentjs.com/downloads/moment.js"></script>
<!-- Modal-->
<div class="modal fade" id="assign_to_third_party" tabindex="-1" role="dialog"aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h2 class="modal-title" id="exampleModalLabel">Assign To Third Party</h2>
            </div>
            <form class="needs-validation" id="BatchAssignToThirdPartyForm" novalidate>
                <div class="modal-body">
                    <input type="hidden" id="batchAssignToThirdPartyModalContent"
                        name="batchAssignToThirdPartyModalContent" readonly>
                    <input type="hidden" id="attp_id" name="id" readonly>
                    <div class="row">
                        <div class="col-12">
                            <div class="mb-3">
                                <label class=" text-lg-right col-form-label">Tracking No<span
                                        class="text-danger">*</span></label>
                                <div class="input-group m-b-10">
                                    <input type="text" class="form-control" id="attp_tracking">
                                </div>
                            </div>
                        </div>

                        <div class="col-12">
                            <div class="mb-3">
                                <label class=" text-lg-right col-form-label">Company Name<span
                                        class="text-danger">*</span></label>
                                <div class="input-group m-b-10">
                                    <select class="form-control" id="attp_company">
                                        <option value="" selected disabled>Please Select Company</option>
                                        @foreach ($fetch_company as $key)
                                            <option value="{{ $key->id }}">{{ $key->company_name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>

                        <div class="col-12">
                            <div class="mb-3">
                                <label class=" text-lg-right col-form-label">Delivery Date<span
                                        class="text-danger">*</span></label>
                                <div class="input-group m-b-10">
                                    <input type="date" class="form-control" id="attp_date">
                                </div>
                            </div>
                        </div>

                        <div class="col-12">
                            <div class="mb-3">
                                <label class=" text-lg-right col-form-label">Select Driver<span
                                        class="text-danger">*</span></label>
                                <div class="input-group m-b-10">
                                    <select class="form-control" id="attp_driver_id">
                                        <option value="" selected disabled>Please Select Driver</option>
                                        @foreach ($fetch_drivers as $key)
                                            <option value="{{ $key->id }}">
                                                {{ $key->driver_code }}|{{ $key->employee_name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger font-weight-bold" id="resetAssignToThirdPartyButton"
                        name="btnClearAll">Clear</button>
                    <button type="button" class="btn btn-warning font-weight-bold"
                        data-dismiss="modal">Dismiss</button>
                    <button type="submit" class="btn btn-primary font-weight-bold">Submit</button>
                </div>
            </form>
        </div>
    </div>
</div>
<script>
    $(document).ready(function() {
        $("#resetAssignToThirdPartyButton").click(function() {
            $("#BatchAssignToThirdPartyForm")[0].reset();
        });

        $("#BatchAssignToThirdPartyForm").on("submit", function(e) {
            e.preventDefault();

            var _token = '{{ csrf_token() }}';
            var id = $("#attp_id").val();
            var company = $("#attp_company").val();
            var delivery_date = $("#attp_date").val();
            var driver_id = $("#attp_driver_id").val();

            var formData = new FormData();
            formData.append('_token', _token);
            formData.append('id', id);
            formData.append('company', company);
            formData.append('date', delivery_date);
            formData.append('driver_id', driver_id);

            $.ajax({
                type: "POST",
                url: "{{ route('admin.shipment.batch_assign_to_third_party') }}",
                data: formData,
                processData: false,
                contentType: false,
                success: function(response) {
                    alert('Assign To Third Party Added Successfully');
                    // location.reload(true);
                    $("#BatchAssignToThirdPartyForm")[0].reset();
                    data();
                },
                error: function(xhr, textStatus, errorThrown) {
                    alert('An error occurred. Please try again.'); // Alert for AJAX error
                }
            });
        });

    });
</script>

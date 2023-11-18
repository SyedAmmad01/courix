<meta name="csrf-token" content="{{ csrf_token() }}" />
<script src="https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.min.js"></script>
<script src="https://momentjs.com/downloads/moment.js"></script>
<!-- Modal-->
<div class="modal fade" id="update_service_charges" tabindex="-1" role="dialog"aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h2 class="modal-title" id="exampleModalLabel">Service Charges Update</h2>
            </div>
            <form class="needs-validation" id="BatchServiceForm" novalidate>
                <div class="modal-body">
                    <input type="hidden" id="batchServiceModalContent" name="batchServiceModalContent" readonly>
                    <input type="hidden" id="s_id" name="id" readonly>
                    <div class="row">
                        <div class="col-12">
                            <div class="mb-3">
                                <label class=" text-lg-right col-form-label">Tracking No<span
                                        class="text-danger">*</span></label>
                                <div class="input-group m-b-10">
                                    <input type="text" class="form-control" id="s_tracking" name="reference_number">
                                </div>
                            </div>
                        </div>

                        <div class="col-12">
                            <div class="mb-3">
                                <label class=" text-lg-right col-form-label">Service Charges<span
                                        class="text-danger">*</span></label>
                                <div class="input-group m-b-10">
                                    <input type="text" class="form-control" id="s_service_charges"
                                        name="service_charges">
                                </div>
                            </div>
                        </div>


                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger font-weight-bold" id="resetServiceButton"
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
        $("#resetServiceButton").click(function() {
            $("#BatchServiceForm")[0].reset();
        });


        $("#BatchServiceForm").on("submit", function(e) {
            e.preventDefault();

            var _token = '{{ csrf_token() }}';
            var id = $("#s_id").val();
            var service_charges = $("#s_service_charges").val();

            var formData = new FormData();
            formData.append('_token', _token);
            formData.append('s_id', id);
            formData.append('s_service_charges', service_charges);

            $.ajax({
                type: "POST",
                url: "{{ route('admin.shipment.batch_service_charges_update') }}",
                data: formData,
                processData: false,
                contentType: false,
                success: function(response) {
                    alert('Batch Service Charges Updated Successfully');
                    // location.reload(true);
                    $("#BatchServiceForm")[0].reset();
                    data();
                },
                error: function(xhr, textStatus, errorThrown) {
                    alert('An error occurred. Please try again.'); // Alert for AJAX error
                }
            });
        });

    });
</script>

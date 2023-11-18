<meta name="csrf-token" content="{{ csrf_token() }}" />
<script src="https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.min.js"></script>
<script src="https://momentjs.com/downloads/moment.js"></script>
<!-- Modal-->
<div class="modal fade" id="batch_inscan" tabindex="-1" role="dialog"aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h2 class="modal-title" id="exampleModalLabel">Batch InScan</h2>
            </div>
            <form class="needs-validation" id="BatchInscanForm" novalidate>
                <div class="modal-body">
                    <input type="hidden" id="batchInscanModalContent" name="batchInscanModalContent" readonly>
                    <input type="hidden" id="i_id" name="id" readonly>
                    <div class="row">
                        <div class="col-12">
                            <div class="mb-3">
                                <label class=" text-lg-right col-form-label">Tracking No<span
                                        class="text-danger">*</span></label>
                                <div class="input-group m-b-10">
                                    <input type="text" class="form-control" id="i_tracking" name="reference_number">
                                </div>
                            </div>
                        </div>

                        <div class="col-12">
                            <div class="mb-3">
                                <label class=" text-lg-right col-form-label">Select Warehouse<span
                                        class="text-danger">*</span></label>
                                <div class="input-group m-b-10">
                                    <select class="form-control" id="i_warehouse" name="warehouse">
                                        <option value="" selected disabled>Please Select Warehouse</option>
                                        <option value="WH00002 | Courix - AUH">WH00002 | Courix - AUH</option>
                                        <option value="WH00001 | Courix - H/O">WH00001 | Courix - H/O</option>
                                    </select>
                                </div>
                            </div>
                        </div>

                        <div class="col-12">
                            <div class="mb-3">
                                <label class=" text-lg-right col-form-label">Select Rack<span
                                        class="text-danger">*</span></label>
                                <div class="input-group m-b-10">
                                    <select class="form-control" id="i_rack" name="rack">
                                        <option value="" selected disabled>Please Select Rack</option>
                                    </select>
                                </div>
                            </div>
                        </div>

                        <div class="col-12">
                            <div class="mb-3">
                                <label class=" text-lg-right col-form-label">Select Driver<span
                                        class="text-danger">*</span></label>
                                <div class="input-group m-b-10">
                                    <select class="form-control" id="i_driver_id" name="driver_id">
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
                    <button type="button" class="btn btn-danger font-weight-bold" id="resetInscanButton"
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
        $("#resetInscanButton").click(function() {
            $("#BatchInscanForm")[0].reset();
        });


        $("#BatchInscanForm").on("submit", function(e) {
            e.preventDefault();

            var _token = '{{ csrf_token() }}';
            var id = $("#i_id").val();
            var warehouse = $("#i_warehouse").val();
            var rack = $("#i_rack").val();
            var driver = $("#i_driver_id").val();

            var formData = new FormData();
            formData.append('_token', _token);
            formData.append('i_id', id);
            formData.append('i_warehouse', warehouse);
            formData.append('i_rack', rack);
            formData.append('i_driver_id', driver);

            $.ajax({
                type: "POST",
                url: "{{ route('admin.shipment.batch_inscan_update') }}",
                data: formData,
                processData: false,
                contentType: false,
                success: function(response) {
                    alert(response.message)
                    $("#BatchInscanForm")[0].reset();
                    data();
                    // alert('Batch InScan Updated Successfully');
                    // location.reload(true);
                },
                error: function(xhr, textStatus, errorThrown) {
                    alert('An error occurred. Please try again.'); // Alert for AJAX error
                }
            });
        });

    });
</script>

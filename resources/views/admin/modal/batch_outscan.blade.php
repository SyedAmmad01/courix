<meta name="csrf-token" content="{{ csrf_token() }}" />
<script src="https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.min.js"></script>
<script src="https://momentjs.com/downloads/moment.js"></script>
<!-- Modal-->
<div class="modal fade" id="batch_outscan" tabindex="-1" role="dialog"aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h2 class="modal-title" id="exampleModalLabel">Batch OutScan</h2>
            </div>
            <form class="needs-validation" id="BatchOutscanForm" novalidate>
                <div class="modal-body">
                    <input type="hidden" id="batchOutscanModalContent" name="batchOutscanModalContent" readonly>
                    <input type="hidden" id="o_id" name="id" readonly>
                    <div class="row">
                        <div class="col-12">
                            <div class="mb-3">
                                <label class=" text-lg-right col-form-label">Tracking No<span
                                        class="text-danger">*</span></label>
                                <div class="input-group m-b-10">
                                    <input type="text" class="form-control" id="o_tracking" name="reference_number">
                                </div>
                            </div>
                        </div>

                        <div class="col-12">
                            <div class="mb-3">
                                <label class=" text-lg-right col-form-label">Delivery Date<span
                                        class="text-danger">*</span></label>
                                <div class="input-group m-b-10">
                                    <input type="date" class="form-control" id="o_order_date" name="order_date"  value="<?php echo date('Y-m-d'); ?>">
                                </div>
                            </div>
                        </div>

                        <div class="col-12">
                            <div class="mb-3">
                                <label class=" text-lg-right col-form-label">Select Driver<span
                                        class="text-danger">*</span></label>
                                <div class="input-group m-b-10">
                                    <select class="form-control" id="o_driver_id" name="driver_id">
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
                    <button type="button" class="btn btn-danger font-weight-bold" id="resetoutscanButton"
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
        $("#resetoutscanButton").click(function() {
            $("#BatchOutscanForm")[0].reset();
        });


        $("#BatchOutscanForm").on("submit", function(e) {
            e.preventDefault();

            var _token = '{{ csrf_token() }}';
            var id = $("#o_id").val();
            var date = $("#o_order_date").val();
            var driver = $("#o_driver_id").val();

            var formData = new FormData();
            formData.append('_token', _token);
            formData.append('o_id', id);
            formData.append('o_order_date', date);
            formData.append('o_driver_id', driver);

            $.ajax({
                type: "POST",
                url: "{{ route('admin.shipment.batch_outscan_update') }}",
                data: formData,
                processData: false,
                contentType: false,
                success: function(response) {
                    alert(response.message);
                    // alert('Batch OutScan Updated Successfully');
                    // location.reload(true);
                    $("#BatchOutscanForm")[0].reset();
                    data();
                },
                error: function(xhr, textStatus, errorThrown) {
                    alert('An error occurred. Please try again.'); // Alert for AJAX error
                }
            });
        });

    });
</script>

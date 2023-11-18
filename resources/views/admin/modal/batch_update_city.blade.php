<meta name="csrf-token" content="{{ csrf_token() }}" />
<script src="https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.min.js"></script>
<script src="https://momentjs.com/downloads/moment.js"></script>
<!-- Modal-->
<div class="modal fade" id="batch_update_city" tabindex="-1" role="dialog"aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h2 class="modal-title" id="exampleModalLabel">City Update</h2>
            </div>
            <form class="needs-validation" id="BatchCityUpdateForm" novalidate>
                <div class="modal-body">
                    <input type="hidden" id="batchCityUpdateModalContent" name="batchCityUpdateModalContent" readonly>
                    <input type="hidden" id="c_id" name="id" readonly>
                    <div class="row">
                        <div class="col-12">
                            <div class="mb-3">
                                <label class=" text-lg-right col-form-label">Tracking No<span
                                        class="text-danger">*</span></label>
                                <div class="input-group m-b-10">
                                    <input type="text" class="form-control" id="c_tracking" name="reference_number">
                                </div>
                            </div>
                        </div>

                        <div class="col-12">
                            <div class="mb-3">
                                <label class=" text-lg-right col-form-label">City<span
                                        class="text-danger">*</span></label>
                                <div class="input-group m-b-10">
                                    <select class="form-control" id="c_city" name="city">
                                        <option value="" selected disabled>Please Select City</option>
                                        @foreach ($cities as $key)
                                            <option value="{{ $key->id }}">{{ $key->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>


                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger font-weight-bold" id="resetCityButton"
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
        $("#resetCityButton").click(function() {
            $("#BatchCityUpdateForm")[0].reset();
        });

        $("#BatchCityUpdateForm").on("submit", function(e) {
            e.preventDefault();

            var _token = '{{ csrf_token() }}';
            var id = $("#c_id").val();
            var city = $("#c_city").val();

            var formData = new FormData();
            formData.append('_token', _token);
            formData.append('c_id', id);
            formData.append('c_city', city);

            $.ajax({
                type: "POST",
                url: "{{ route('admin.shipment.batch_city_update') }}",
                data: formData,
                processData: false,
                contentType: false,
                success: function(response) {
                    alert('Batch City Updated Successfully');
                    $("#BatchCityUpdateForm")[0].reset();
                    data();
                    // location.reload(true);
                },
                error: function(xhr, textStatus, errorThrown) {
                    alert('An error occurred. Please try again.'); // Alert for AJAX error
                }
            });
        });

    });
</script>

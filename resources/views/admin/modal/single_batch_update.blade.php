<meta name="csrf-token" content="{{ csrf_token() }}" />
<script src="https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.min.js"></script>
<script src="https://momentjs.com/downloads/moment.js"></script>

<!-- Modal-->
<div class="modal fade" id="single_batch_update" tabindex="-1" role="dialog"aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h2 class="modal-title" id="exampleModalLabel">Batch Update</h2>
            </div>
            <form class="needs-validation" id="SingleBatchUpdateForm" novalidate>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-12">
                            <div class="mb-3">
                                <label class="text-lg-right col-form-label">Tracking No<span
                                        class="text-danger">*</span></label>
                                <div class="input-group m-b-10">
                                    <input type="hidden" id="u_id"  readonly>
                                    <input type="text" class="form-control" id="u_tracking" name="reference_number">
                                </div>
                            </div>
                        </div>

                        <div class="col-12">
                            <div class="mb-3">
                                <label class=" text-lg-right col-form-label">Shipment Status<span
                                        class="text-danger">*</span></label>
                                <div class="input-group m-b-10">
                                    <select class="form-control" id="u_status" name="status">
                                        <option value="" disabled selected>Please Select Status</option>
                                        @foreach ($status as $key)
                                            <option value="{{ $key->id }}">{{ $key->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>

                        <div class="col-12">
                            <div class="mb-3">
                                <label class=" text-lg-right col-form-label">Comments<span
                                        class="text-danger">*</span></label>
                                <div class="input-group m-b-10">
                                    <textarea name="comments" id="u_comments" cols="100" rows="3"></textarea>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger font-weight-bold" id="resetButton"
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
        $("#resetButton").click(function() {
            $("#SingleBatchUpdateForm")[0].reset();
        });


        $("#SingleBatchUpdateForm").on("submit", function(e) {
            e.preventDefault();

            var _token = '{{ csrf_token() }}';
            var id = $("#u_id").val();
            var status = $("#u_status").val();
            var comments = $("#u_comments").val();

            var formData = new FormData();
            formData.append('_token', _token);
            formData.append('u_id', id);
            formData.append('u_status', status);
            formData.append('u_comments', comments);

            $.ajax({
                type: "POST",
                url: "{{ route('admin.shipment.single_batch_update') }}",
                data: formData,
                processData: false,
                contentType: false,
                success: function(response) {
                    alert('Batch Updated Successfully');
                    search_bar()
                    // location.reload(true);
                },
                error: function(xhr, textStatus, errorThrown) {
                    alert('An error occurred. Please try again.'); // Alert for AJAX error
                }
            });
        });
    });
</script>

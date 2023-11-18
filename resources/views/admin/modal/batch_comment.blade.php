<meta name="csrf-token" content="{{ csrf_token() }}" />
<script src="https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.min.js"></script>
<script src="https://momentjs.com/downloads/moment.js"></script>
<!-- Modal-->
<div class="modal fade" id="batch_comment" tabindex="-1" role="dialog"aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h2 class="modal-title" id="exampleModalLabel">Batch Comment</h2>
            </div>
            <form class="needs-validation" id="BatchCommentForm" novalidate>
                <div class="modal-body">
                    <input type="hidden" id="batchCommentModalContent" name="batchCommentModalContent" readonly>
                    <input type="hidden" id="co_id" name="id" readonly>
                    <div class="row">
                        <div class="col-12">
                            <div class="mb-3">
                                <label class=" text-lg-right col-form-label">Tracking No<span
                                        class="text-danger">*</span></label>
                                <div class="input-group m-b-10">
                                    <input type="text" class="form-control" id="co_tracking" name="reference_number">
                                </div>
                            </div>
                        </div>


                        <div class="col-12">
                            <div class="mb-3">
                                <label class=" text-lg-right col-form-label">Comments<span
                                        class="text-danger">*</span></label>
                                <div class="input-group m-b-10">
                                    <textarea name="comments" id="co_comments" cols="100" rows="3"></textarea>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger font-weight-bold" id="resetCommentButton"
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
        $("#resetCommentButton").click(function() {
            $("#BatchCommentForm")[0].reset();
        });


        $("#BatchCommentForm").on("submit", function(e) {
            e.preventDefault();

            var _token = '{{ csrf_token() }}';
            var id = $("#co_id").val();
            var comment = $("#co_comments").val();

            var formData = new FormData();
            formData.append('_token', _token);
            formData.append('co_id', id);
            formData.append('co_comments', comment);

            $.ajax({
                type: "POST",
                url: "{{ route('admin.shipment.batch_comment_update') }}",
                data: formData,
                processData: false,
                contentType: false,
                success: function(response) {
                    alert('Batch Comment Updated Successfully');
                    // location.reload(true);
                    $("#BatchCommentForm")[0].reset();
                    data();
                },
                error: function(xhr, textStatus, errorThrown) {
                    alert('An error occurred. Please try again.'); // Alert for AJAX error
                }
            });
        });

    });
</script>

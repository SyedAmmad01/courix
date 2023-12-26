<meta name="csrf-token" content="{{ csrf_token() }}" />
<script src="https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.min.js"></script>
<script src="https://momentjs.com/downloads/moment.js"></script>
<!-- Modal-->
<div class="modal fade" id="UpdateDeliveryJobsModal" tabindex="-1" role="dialog"aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h2 class="modal-title" id="exampleModalLabel">Update Job Code </h2>
            </div>
            <form class="needs-validation" id="editForm" novalidate>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-12">
                            <div class="mb-3">
                                <input type="text" id="e-id" name="id">
                                <label class=" text-lg-right col-form-label">Job Code<span
                                        class="text-danger">*</span></label>
                                <div class="input-group m-b-10">
                                    <div class="input-group-prepend"><span class="input-group-text">
                                        <i class="fas fa-lg fa-fw  fa-calendar-alt"></i></span></div>
                                <input type="text" id="" name="" class="form-control">
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary font-weight-bold">Update</button>
                </div>
            </form>
        </div>
    </div>
</div>
<script>
    $(document).ready(function() {
        $("#editForm").on("submit", function(e) {
            e.preventDefault();
            var formData = new FormData();
            formData.append('_token', '{{ csrf_token() }}');
            formData.append('id', $("#s-id").val());
            formData.append('jobstatus', $("#s-job_status").val());
            $.ajax({
                type: "POST",
                url: "{{ route('admin.dispatch.update_order') }}",
                data: formData,
                processData: false,
                contentType: false,
                success: function(response) {
                    if (response.status === 'success') {
                        alert('Order Updated Successfully');
                        get_orders();
                        // location.reload(true);
                    } else {
                        alert('Order Updated Unsuccessfully');
                    }
                },
                error: function(xhr, textStatus, errorThrown) {
                    alert('Order Updated Unsuccessfully');
                    // console.log(xhr);
                }
            });
        });
    });
</script>

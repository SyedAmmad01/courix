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
            <form class="form-sample" id="UdpateJobCodeForm">
                <div class="modal-body">
                    <div class="row">
                        <div class="col-12">
                            <div class="mb-3">
                                <input type="hidden" id="update_id" name="update_id">
                                <input type="text" id="u_id" name="id">
                                <label class=" text-lg-right col-form-label">Job Code<span
                                        class="text-danger">*</span></label>
                                <div class="input-group m-b-10">
                                    <div class="input-group-prepend"><span class="input-group-text">
                                        <i class="fas fa-lg fa-fw  fa-calendar-alt"></i></span></div>
                                <input type="text" id="u_job_code" name="job_code" class="form-control">
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
        $("#UdpateJobCodeForm").on("submit", function(e) {
            e.preventDefault();
            var formData = new FormData();
            formData.append('_token', '{{ csrf_token() }}');
            formData.append('id', $("#u_id").val());
            formData.append('job_code', $("#u_job_code").val());
            $.ajax({
                type: "POST",
                url: "{{ route('admin.dispatch.update_job_code') }}",
                data: formData,
                processData: false,
                contentType: false,
                success: function(response) {
                    if (response.status === 'success') {
                        alert('Job Code Updated Successfully');
                        // var id = $('#u_id').val('');
                        var search_box = $('#search_box').val();
                        if(search_box == null){
                            get_orders();
                        }
                        else{
                            search_bar();
                        }
                        document.getElementById("UdpateJobCodeForm").reset();
                        // location.reload(true);
                    } else {
                        alert('Job Code Updated Unsuccessfully');
                    }
                },
                error: function(xhr, textStatus, errorThrown) {
                    alert('Job Code Updated Unsuccessfully');
                    // console.log(xhr);
                }
            });
        });
    });
</script>

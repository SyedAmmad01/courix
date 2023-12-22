<meta name="csrf-token" content="{{ csrf_token() }}" />
<script src="https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.min.js"></script>
<script src="https://momentjs.com/downloads/moment.js"></script>
<!-- Modal-->
<div class="modal fade" id="EditDeliveryJobsModal" tabindex="-1" role="dialog"aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h2 class="modal-title" id="exampleModalLabel">Update Status</h2>
            </div>
            <form class="needs-validation" id="" novalidate>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-12">
                            <div class="mb-3">
                                <label class=" text-lg-right col-form-label">Delivery Job Status<span
                                        class="text-danger">*</span></label>
                                <div class="input-group m-b-10">
                                    <select class="form-control" id="job_status" name="job_status">
                                        <option value="" selected disabled>Please Select Job Status</option>
                                        <option value="1">Created</option>
                                        <option value="2">Started</option>
                                        <option value="3">Delivered</option>
                                    </select>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary font-weight-bold">Save</button>
                </div>
            </form>
        </div>
    </div>
</div>
<script>

</script>

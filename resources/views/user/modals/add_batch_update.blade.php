<meta name="csrf-token" content="{{ csrf_token() }}" />
<script src="https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.min.js"></script>
<script src="https://momentjs.com/downloads/moment.js"></script>
<!-- Modal-->
<div class="modal fade" id="add_batch_update" tabindex="-1" role="dialog"aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h2 class="modal-title" id="exampleModalLabel">Batch Update</h2>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-12">
                        <div class="mb-3">
                            <label class=" text-lg-right col-form-label">Tracking No<span
                                    class="text-danger">*</span></label>
                            <div class="input-group m-b-10">

                            </div>
                        </div>
                    </div>

                    <div class="col-12">
                        <div class="mb-3">
                            <label class=" text-lg-right col-form-label">Shipment Status<span
                                    class="text-danger">*</span></label>
                            <div class="input-group m-b-10">
                                <select class="form-control" id="" name="">

                                </select>
                            </div>
                        </div>
                    </div>

                    <div class="col-12">
                        <div class="mb-3">
                            <label class=" text-lg-right col-form-label">Comments<span
                                    class="text-danger">*</span></label>
                            <div class="input-group m-b-10">
                                <select class="form-control" id="" name="">

                                </select>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary font-weight-bold">Submit</button>
                <button type="button" class="btn btn-danger font-weight-bold" data-dismiss="modal">Dismiss</button>
                <button type="button" class="btn btn-danger font-weight-bold" data-dismiss="modal">Clear</button>
            </div>
        </div>
    </div>
</div>

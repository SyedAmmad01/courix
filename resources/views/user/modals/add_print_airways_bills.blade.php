<meta name="csrf-token" content="{{ csrf_token() }}" />
<script src="https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.min.js"></script>
<script src="https://momentjs.com/downloads/moment.js"></script>
<!-- Modal-->
<div class="modal fade" id="print_airways_bills" tabindex="-1" role="dialog"aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h2 class="modal-title" id="exampleModalLabel">Select Airways Bills Label Type</h2>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-12">
                        <div class="mb-3">
                            <label class=" text-lg-right col-form-label">Select Airways Bill Label Type<span
                                    class="text-danger">*</span></label>
                            <div class="input-group m-b-10">
                                <select class="form-control" id="" name="">
                                    <option value="" selected disabled hidden>Please Select Service Type</option>
                                    <option value="1">AWBZ Label
                                    </option>
                                    <option value="2">AWBZ 4X6 Label
                                    </option>
                                </select>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary font-weight-bold">Print</button>
                <button type="button" class="btn btn-danger font-weight-bold"
                    data-dismiss="modal">Cancel</button>
            </div>
        </div>
    </div>
</div>

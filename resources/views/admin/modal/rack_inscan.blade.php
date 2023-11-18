<meta name="csrf-token" content="{{ csrf_token() }}" />
<script src="https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.min.js"></script>
<script src="https://momentjs.com/downloads/moment.js"></script>

<div class="modal fade" id="rack_inscan_modal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Select Rack</h5>
                {{-- <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"></button> --}}
            </div>
            <div class="modal-body">
                <form action="">
                    <div class="form-group">
                        <label class="text-lg-right col-form-label">Rack Number<span class="text-danger">*</span></label>
                        <div class="input-group m-b-10">
                            <div class="input-group-prepend"><span class="input-group-text"><i
                                class="fas fa-lg fa-fw fa-plus"></i></span></div>
                            <select class="form-control kt-select2 select2" id="" name="param">
                                <option value="">Please Select Rack</option>
                            </select>
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary" style="background-color:#007aff;">Save</button>
            </div>
        </div>
    </div>
</div>
<script>
    $(document).ready(function() {
        $(".select2").select2();
    });
</script>

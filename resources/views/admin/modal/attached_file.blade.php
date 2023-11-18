<meta name="csrf-token" content="{{ csrf_token() }}" />
<script src="https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.min.js"></script>
<script src="https://momentjs.com/downloads/moment.js"></script>

<div class="modal fade bd-example-modal-lg" id="attached_file" tabindex="-1" aria-labelledby="myLargeModalLabel"
    aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel" style="font-weight: bold;">Upload Shipment File's</h5>
            </div>
            <form class="needs-validation" id="ShipmentFile" novalidate>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-12">
                            <div class="form-group">
                                <label class="text-lg-right col-form-label">File Name<span
                                        class="text-danger">*</span></label>
                                <div class="input-group m-b-10">
                                    <div class="input-group-prepend"><span class="input-group-text"><i
                                                class="fa fa-hashtag"></i></span></div>
                                    <input type="text" name="file_name" id="file_name" placeholder="File Name"
                                        class="form-control txtValidate">
                                    <input type="hidden" id="a-id" name="id">
                                </div>
                            </div>
                        </div>

                        <div class="col-12">
                            <div class="form-group">
                                <label class="text-lg-right col-form-label">Selected File<span
                                        class="text-danger">*</span></label>
                                <div class="input-group">
                                    <div class="input-group-prepend"><span class="input-group-text"><i
                                                class="fas fa-lg fa-fw fa-user"></i></span></div>
                                    <input type="text" name="" id="name_file" class="form-control" readonly>
                                    <input type="file" name="myfile" id="selectedfile" class="form-control"
                                        style="display: none;">
                                </div>
                            </div>
                        </div>


                        <div class="col-12">
                            <div class="form-group">
                                <label class="text-lg-right col-form-label">File Type<span
                                        class="text-danger">*</span></label>
                                <div class="input-group m-b-10">
                                    <div class="input-group-prepend"><span class="input-group-text"><i
                                                class="fas fa-lg fa-fw fa-user"></i></span></div>
                                    <select class="form-control" id="file_type" name="file_type" style="width:80%;">
                                        <option value="POD">Proof Of Delivery</option>
                                        <option value="POP">Proof Of Pickup</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row mt-5 mb-5">
                    <div class="col-9">

                    </div>

                    <div class="col-3">
                        <button type="button" class="btn btn-warning btn-sm" id="browserBtn"><i
                                class="fa fa-upload"></i>
                            Browser</button>
                    </div>

                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-warning btn-sm" data-dismiss="modal" class="attached_close" data-dismiss="modal" aria-label="Close">Dismiss</button>
                    <button type="submit" class="btn btn-primary btn-sm">Confirm</button>
                </div>
            </form>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.min.js"></script>
<script>
    $(document).ready(function() {
        $('#browserBtn').click(function() {
            $('#selectedfile').click();
        });

        $('#selectedfile').change(function() {
            var name_file = $(this).val().split('\\').pop();
            $('#name_file').val(name_file);
        });

        $('#name_file').on('keydown paste', function(e) {
            e.preventDefault();
        });

        $("#ShipmentFile").on("submit", function(e) {
            e.preventDefault();
            var _token = $('meta[name="csrf-token"]').attr('content');
            var id = $("#a-id").val();
            var file_name = $("#file_name").val();
            var myfile = $('input[name="myfile"]')[0].files[0];
            var file_type = $("#file_type").val();

            var formData = new FormData();
            formData.append('_token', _token);
            formData.append('id', id);
            formData.append('file_name', file_name);
            formData.append('myfile', myfile);
            formData.append('file_type', file_type);

            $.ajax({
                type: "POST",
                url: "{{ url('/admin/shipment_files/shipment_files_save') }}",
                data: formData,
                processData: false,
                contentType: false,
                success: function(data) {
                    if (data) {
                        alert('File Added Successfully');
                        // location.reload(true);
                    }
                },
                error: function(xhr, textStatus, errorThrown) {
                    alert('File Added Unsuccessfully');
                }
            });
        });
    });
</script>

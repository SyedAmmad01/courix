<meta name="csrf-token" content="{{ csrf_token() }}" />
<script src="https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.min.js"></script>
<script src="https://momentjs.com/downloads/moment.js"></script>
{{-- <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css"> --}}

<div class="modal fade" id="EditAddShipperModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Add Shipper Files</h5>
            </div>
            <form class="forms-sample" id="EditAddShipperFile">
                @if (empty($shippers))
                @else
                    @php
                        $shipperId = $shippers->id;
                    @endphp
                @endif
                <input type="hidden" id="shipper_id" name="shipper_id" value="{{ $shipperId ?? '' }}">
                <div class="modal-body">
                    <div class="form-group">
                        <label class=" text-lg-right col-form-label">File Name<span class="text-danger">*</span></label>
                        <div class="input-group m-b-10">
                            <div class="input-group-prepend"><span class="input-group-text"><i
                                        class="fa fa-hashtag"></i></span></div>
                            <input type="text" name="file_name" id="file_name" placeholder="File Name"
                                class="form-control txtValidate">
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="text-lg-right col-form-label">Select File<span
                                class="text-danger">*</span></label>
                        <div class="input-group m-b-10">
                            <input type="text" name="" id="name_file" class="form-control" readonly>
                            <input type="file" name="myfile" id="uploadfile" class="form-control"
                                style="display: none;">
                        </div>
                        <br>
                        <button type="button" class="btn btn-warning" id="browserBtn"><i class="fa fa-upload"></i>
                            Browser</button>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-warning" data-dismiss="modal">Dismiss</button>
                    <button type="submit" class="btn btn-primary" value="submit" style="background-color:#0062cc;"
                        onblur="all_files()">Submit</button>
                </div>
            </form>
        </div>
    </div>
</div>


<script src="https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.min.js"></script>
<script>
    $(document).ready(function() {
        $('#browserBtn').click(function() {
            $('#uploadfile').click();
        });

        $('#uploadfile').change(function() {
            var name_file = $(this).val().split('\\').pop();
            $('#name_file').val(name_file);
        });

        $('#name_file').on('keydown paste', function(e) {
            e.preventDefault();
        });

        $("#EditAddShipperFile").on("submit", function(e) {
            e.preventDefault();
            var _token = $('meta[name="csrf-token"]').attr('content');
            var shipper_id = $("#shipper_id").val();
            var file_name = $("#file_name").val();
            var myfile = $('input[name="myfile"]')[0].files[0];

            var formData = new FormData();
            formData.append('_token', _token);
            formData.append('shipper_id', shipper_id);
            formData.append('file_name', file_name);
            formData.append('myfile', myfile);

            $.ajax({
                type: "POST",
                url: "{{ url('/shipper_files/eidt_add_shipper_files_save') }}",
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

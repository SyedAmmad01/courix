<meta name="csrf-token" content="{{ csrf_token() }}" />
<script src="https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.min.js"></script>
<script src="https://momentjs.com/downloads/moment.js"></script>
{{-- <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css"> --}}

<div class="modal fade" id="AddJoBTitleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Add Job Title</h5>
            </div>
            <div class="modal-body">
                <form class="forms-sample" id="Jobtitle">
                    <div class="form-group">
                        <label class=" text-lg-right col-form-label">Job Title<span class="text-danger">*</span></label>
                        <div class="input-group m-b-10">
                            <div class="input-group-prepend"><span class="input-group-text"><i
                                        class="fas fa-lg fa-fw fa-money-bill-alt"></i></span></div>
                            <input type="text" name="name" id="name" placeholder="Job Title"
                                class="form-control">
                        </div>
                    </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-warning" data-dismiss="modal">Disniss</button>
                <button type="submit" class="btn btn-primary" value="submit">Save</button>
            </div>
            </form>
        </div>
    </div>
</div>



<script src="https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.min.js"></script>
<script>
    $(document).ready(function() {
        $("#Jobtitle").on("submit", function(e) {
            e.preventDefault();
            var _token = $('meta[name="csrf-token"]').attr('content');
            var name = $("#name").val();

            var formData = new FormData();
            formData.append('_token', _token);
            formData.append('name', name);

            $.ajax({
                type: "POST",
                url: "{{ url('/admin/employee/job_title') }}",
                data: formData,
                processData: false,
                contentType: false,
                success: function(data) {
                    if (data) {
                        alert('Job Title Added Successfully');
                        // location.reload(true);
                    }
                },
                error: function(xhr, textStatus, errorThrown) {
                    alert('Job Title Added Unsuccessfully');
                }
            });
        });
    });
</script>

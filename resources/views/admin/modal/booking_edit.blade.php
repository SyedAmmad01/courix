<meta name="csrf-token" content="{{ csrf_token() }}" />
<script src="https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.min.js"></script>
<script src="https://momentjs.com/downloads/moment.js"></script>
{{-- <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css"> --}}

<div class="modal fade" id="EditBookingModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Edit Booking</h5>
            </div>
            <div class="modal-body">
                <form class="forms-sample" id="editbooking">
                    <div class="row">
                        <div class="col-12">
                            <div class="form-group">
                                <label class=" text-lg-right col-form-label">Select Shipper<span
                                        class="text-danger">*</span></label>
                                <div class="input-group m-b-10">
                                    <div class="input-group-prepend"><span class="input-group-text"><i
                                                class="fab fa-lg fa-fw fa-rebel"></i></span></div>
                                    <input type="hidden" name="id" id="b-id">
                                    <select class="form-control" id="b-shipper" name="shipper">
                                        <option value="" disabled selected>Please Select Option
                                        </option>
                                        @foreach ($fetch_shippers as $key)
                                            @if (old('shipper') == $key->id)
                                                <option value="{{ $key->id }}" selected>
                                                    {{ $key->shipper_code }}|{{ $key->company_name }}|{{ $key->contact_office_1 }}
                                                </option>
                                            @else
                                                <option value="{{ $key->id }}">
                                                    {{ $key->shipper_code }}|{{ $key->company_name }}|{{ $key->contact_office_1 }}
                                                </option>
                                            @endif
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>

                        <div class="col-12">
                            <div class="form-group">
                                <label class=" text-lg-right col-form-label">Count<span
                                        class="text-danger">*</span></label>
                                <div class="input-group m-b-10">
                                    <div class="input-group-prepend"><span class="input-group-text"><i
                                                class="fab fa-lg fa-fw fa-rebel"></i></span></div>
                                    <input type="text" name="count" id="b-count" placeholder="Count"
                                        class="form-control txtValidate">
                                </div>
                            </div>
                        </div>

                        <div class="col-6">
                            <div class="form-group">
                                <label class=" text-lg-right col-form-label">Barcode Start<span
                                        class="text-danger">*</span></label>
                                <div class="input-group m-b-10">
                                    <div class="input-group-prepend"><span class="input-group-text"><i
                                                class="fas fa-lg fa-fw fa-barcode"></i></span></div>
                                    <input type="text" name="barcode_start" id="b-barcode_start"
                                        placeholder="Barcode Start" class="form-control txtValidate">
                                </div>
                            </div>
                        </div>

                        <div class="col-6">
                            <div class="form-group">
                                <label class=" text-lg-right col-form-label">Barcode End<span
                                        class="text-danger">*</span></label>
                                <div class="input-group m-b-10">
                                    <div class="input-group-prepend"><span class="input-group-text"><i
                                                class="fas fa-lg fa-fw fa-barcode"></i></span></div>
                                    <input type="text" name="barcode_end" id="b-barcode_end"
                                        placeholder="Employee Name" class="form-control txtValidate">
                                </div>
                            </div>
                        </div>


                    </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-warning" data-dismiss="modal">Disniss</button>
                <button type="submit" class="btn btn-primary" value="submit" style="background-color:#007aff;">Save</button>
            </div>
            </form>
        </div>
    </div>
</div>



<script>
    var isOther = false;
    $(document).ready(function() {
        $("#editbooking").on("submit", function(e) {
            e.preventDefault()
            // var csrfToken = $('meta[name="csrf-token"]').attr('content');
            var _token = '{{ csrf_token() }}';
            var id = $("#b-id").val();
            var shipper = $("#b-shipper").val();
            var barcode_start = $("#b-barcode_start").val();
            var barcode_end = $("#b-barcode_end").val();
            var count = $("#b-count").val();


            var formData = new FormData();
            formData.append('_token', _token);
            formData.append('id', id);
            formData.append('shipper', shipper);
            formData.append('barcode_start', barcode_start);
            formData.append('barcode_end', barcode_end);
            formData.append('count', count);


            $.ajax({
                type: "POST",
                url: "{{ route('admin.shipper.booking_update') }}",
                data: formData,
                processData: false,
                contentType: false,
                success: function(data) {
                    if (data) {
                        alert('Booking Updated Successfully');
                        location.reload(true);
                    }
                },
                error: function(data, textStatus, errorThrown) {
                    // console.log(data);
                    alert('Booking Updated Unsuccessfully');
                },
            });
        });
    });
</script>

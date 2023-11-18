<meta name="csrf-token" content="{{ csrf_token() }}" />
<script src="https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.min.js"></script>
<script src="https://momentjs.com/downloads/moment.js"></script>

<div class="modal fade" id="create_zone_modal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Create Zone</h5>
                {{-- <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"></button> --}}
            </div>
            <div class="modal-body">
                <form class="forms-sample" id="create_zone">
                    <div class="form-group">
                        <label class="text-lg-right col-form-label">City<span class="text-danger">*</span></label>
                        <div class="input-group m-b-10">
                            <div class="input-group-prepend"><span class="input-group-text"><i
                                        class="fas fa-lg fa-fw fa-flag-checkered"></i></span></div>
                            <select class="form-control kt-select2 select2" id="city" name="city">
                                <option value="" disabled selected>Please Select City</option>
                                @foreach ($fetch_citys as $key)
                                    @if (old('city') == $key->id)
                                        <option value="{{ $key->id }}" selected>
                                            {{ $key->name }}
                                        </option>
                                    @else
                                        <option value="{{ $key->id }}">{{ $key->name }}
                                        </option>
                                    @endif
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="text-lg-right col-form-label">Zone <span class="text-danger">*</span></label>
                        <div class="input-group m-b-10">
                            <div class="input-group-prepend"><span class="input-group-text"><i
                                        class="fas fa-lg fa-fw fa-plus"></i></span></div>
                            <input type="text" id="zone_name" name="zone_name" placeholder="Zone Name"
                                class="form-control">
                        </div>
                    </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary" style="background-color:#007aff;"
                    value="submit">Save</button>
            </div>
            </form>
        </div>
    </div>
</div>

<script>
    $(document).ready(function() {
        $(".select2").select2();

        $("#create_zone").on("submit", function(e) {
            e.preventDefault()
            // var csrfToken = $('meta[name="csrf-token"]').attr('content');
            var _token = '{{ csrf_token() }}';
            var city = $("#city").val();
            var zone_name = $("#zone_name").val();

            var formData = new FormData();
            formData.append('_token', _token);
            formData.append('city', city);
            formData.append('zone_name', zone_name);

            $.ajax({
                type: "POST",
                url: "{{ route('pages.shipment.zone_save') }}",
                data: formData,
                processData: false,
                contentType: false,
                success: function(data) {
                    if (data) {
                        alert('Zone Added Successfully');
                        location.reload(true);
                    }
                },
                error: function(data, textStatus, errorThrown) {
                    // console.log(data);
                    alert('Zone Added Unsuccessfully');
                },
            });
        });
    });
</script>

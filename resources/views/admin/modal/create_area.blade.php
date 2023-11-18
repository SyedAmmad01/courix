<meta name="csrf-token" content="{{ csrf_token() }}" />
<script src="https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.min.js"></script>
<script src="https://momentjs.com/downloads/moment.js"></script>

<div class="modal fade" id="create_area_modal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Create Area</h5>
                {{-- <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"></button> --}}
            </div>
            <div class="modal-body" style="display: block;" id="show">
                <form class="forms-sample" id="create_area">
                    <div class="row">
                        <div class="col-12 text-right">
                            <button type="button" class="btn btn-primary hold" style="background-color:#007aff;">Edit
                                Area</button>
                            <button type="button" class="btn btn-primary relise" style="background-color:#007aff;">Add
                                Area</button>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="text-lg-right col-form-label">Zone Name<span class="text-danger">*</span></label>
                        <div class="input-group m-b-10">
                            <div class="input-group-prepend"><span class="input-group-text"><i
                                        class="fas fa-lg fa-fw fa-flag-checkered"></i></span></div>
                            <select class="form-control select2" id="zone" name="zone_name">
                                <option value="" disabled selected>Please Select Zone</option>
                                @foreach ($fetch_zones as $key)
                                    @if (old('zone_name') == $key->id)
                                        <option value="{{ $key->id }}" selected>
                                            {{ $key->zone_name }}
                                        </option>
                                    @else
                                        <option value="{{ $key->id }}">{{ $key->zone_name }}
                                        </option>
                                    @endif
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="text-lg-right col-form-label">Area Name<span class="text-danger">*</span></label>
                        <div class="input-group m-b-10">
                            <div class="input-group-prepend"><span class="input-group-text"><i
                                        class="fas fa-lg fa-fw fa-flag-checkered"></i></span></div>
                            <input type="text" id="area_name" name="area_name" placeholder="Area Name"
                                class="form-control">
                        </div>
                    </div>

                    <div class="form-group hidden" style="display: none;">
                        <label class="text-lg-right col-form-label">New Name<span class="text-danger">*</span></label>
                        <div class="input-group m-b-10">
                            <div class="input-group-prepend"><span class="input-group-text"><i
                                        class="fas fa-lg fa-fw fa-plus"></i></span></div>
                            <input type="text" id="new_name" name="new_name" placeholder="New Name"
                                class="form-control">
                        </div>
                    </div>


            </div>
            <div class="modal-footer" style="display: block;" id="button">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary" style="background-color:#007aff;"
                    value="submit">Save</button>
            </div>
            </form>

            <div class="modal-body hidden" style="display: none;">
                <form class="forms-sample" id="update_area">
                    <div class="row">
                        <div class="col-12 text-right">
                            <button type="button" class="btn btn-primary hold" style="background-color:#007aff;">Edit
                                Area</button>
                            <button type="button" class="btn btn-primary relise" style="background-color:#007aff;">Add
                                Area</button>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="text-lg-right col-form-label">Zone Name<span class="text-danger">*</span></label>
                        <div class="input-group m-b-10">
                            <div class="input-group-prepend"><span class="input-group-text"><i
                                        class="fas fa-lg fa-fw fa-flag-checkered"></i></span></div>
                            <select class="form-control select2" id="zones" name="zone_name">
                                <option value="" disabled selected>Please Select Zone</option>
                                @foreach ($fetch_zones as $key)
                                    @if (old('zone_name') == $key->id)
                                        <option value="{{ $key->id }}" selected>
                                            {{ $key->zone_name }}
                                        </option>
                                    @else
                                        <option value="{{ $key->id }}">{{ $key->zone_name }}
                                        </option>
                                    @endif
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="text-lg-right col-form-label">Area Name<span class="text-danger">*</span></label>
                        <div class="input-group m-b-10">
                            <div class="input-group-prepend"><span class="input-group-text"><i
                                        class="fas fa-lg fa-fw fa-flag-checkered"></i></span></div>
                            <select class="form-control select2" id="area" name="area_name">
                                <option value="" disabled selected>Please Select Zone</option>
                                @foreach ($fetch_zoneareas as $key)
                                    @if (old('area_name') == $key->area_name)
                                        <option value="{{ $key->area_name }}" selected>
                                            {{ $key->area_name }}
                                        </option>
                                    @else
                                        <option value="{{ $key->area_name }}">{{ $key->area_name }}
                                        </option>
                                    @endif
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <div class="form-group hidden" style="display: none;">
                        <label class="text-lg-right col-form-label">New Name<span class="text-danger">*</span></label>
                        <div class="input-group m-b-10">
                            <div class="input-group-prepend"><span class="input-group-text"><i
                                        class="fas fa-lg fa-fw fa-plus"></i></span></div>
                            <input type="text" id="new" name="new_name" placeholder="New Name"
                                class="form-control">
                        </div>
                    </div>


            </div>
            <div class="modal-footer hidden" style="display: none;">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary" style="background-color:#007aff;"
                    value="submit">Confirm</button>
            </div>
            </form>




        </div>
    </div>
</div>
<script>
    $(document).ready(function() {
        $(".select2").select2();

        var alertNumber = 1;
        $(".hold").click(function() {
            // alert(alertNumber);
            alertNumber = 1 - alertNumber;
            if (Number(alertNumber) == 1) {
                $(".hidden").css("display", "block");
                $("#show").css("display", "none");
                $("#button").css("display", "none");
            }
        });

        var show = 0;
        $(".relise").click(function() {
            // alert(alertNumber);
            show = 1 - show;
            if (Number(show) == 0) {
                $(".hidden").css("display", "none");
                $("#show").css("display", "block");
                $("#button").css("display", "block");
            }
        });


        $("#create_area").on("submit", function(e) {
            e.preventDefault()
            // var csrfToken = $('meta[name="csrf-token"]').attr('content');
            var _token = '{{ csrf_token() }}';
            var zone = $("#zone").val();
            var area_name = $("#area_name").val();

            var formData = new FormData();
            formData.append('_token', _token);
            formData.append('zone_name', zone);
            formData.append('area_name', area_name);

            $.ajax({
                type: "POST",
                url: "{{ route('pages.shipment.zone_area_save') }}",
                data: formData,
                processData: false,
                contentType: false,
                success: function(data) {
                    if (data) {
                        alert('Area Added Successfully');
                        location.reload(true);
                    }
                },
                error: function(data, textStatus, errorThrown) {
                    // console.log(data);
                    alert('Area Added Unsuccessfully');
                },
            });
        });


        $("#update_area").on("submit", function(e) {
            e.preventDefault();
            var formData = new FormData();
            formData.append('_token', '{{ csrf_token() }}');
            formData.append('zone_name', $("#zones").val());
            formData.append('area_name', $("#area").val());
            formData.append('new_name', $("#new").val());

            $.ajax({
                type: "POST",
                url: "{{ route('pages.shipment.zone_area_update') }}",
                data: formData,
                processData: false,
                contentType: false,
                success: function(data) {
                    if (data) {
                        alert('Area Updated Successfully');
                        location.reload(true);
                    }
                },
                error: function(data, textStatus, errorThrown) {
                    alert('Area Updated Unsuccessfully');
                    console.log(data);
                },
            });
        });

        $("#area").change(function() {
            var selectedValue = $(this).val();
            $("#new").val(selectedValue);
        });

    });
</script>

<meta name="csrf-token" content="{{ csrf_token() }}" />
<script src="https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.min.js"></script>
<script src="https://momentjs.com/downloads/moment.js"></script>

<div class="modal fade bd-example-modal-lg" id="ContactPersonShowModalEdit" tabindex="-1" aria-labelledby="myLargeModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            {{-- action="{{ route('user.candidate.save') }}" method="post" --}}
            <form class="needs-validation" id="editForm" novalidate>
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel" style="font-weight: bold;">Edit Driver</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-6">
                            <div class="form-group">
                                <label class=" text-lg-right col-form-label">Driver Code<span
                                        class="text-danger">*</span></label>
                                <div class="input-group m-b-10">
                                    <div class="input-group-prepend"><span class="input-group-text"><i
                                                class="fa fa-hashtag"></i></span></div>
                                    <input type="text" name="driver_code" id="d-driver_code"
                                        placeholder="Driver Code" class="form-control txtValidate" readonly>
                                    <input type="hidden" name="id" id="d-id">
                                </div>
                            </div>
                        </div>

                        <div class="col-6">
                            <div class="form-group">
                                <label class=" text-lg-right col-form-label">Employee Code<span
                                        class="text-danger">*</span></label>
                                <div class="input-group m-b-10">
                                    <div class="input-group-prepend"><span class="input-group-text"><i
                                                class="fa fa-hashtag"></i></span></div>
                                    <input type="text" id="d-employee_code" placeholder="Employee Code"
                                        class="form-control txtValidate" readonly>
                                    <input type="hidden" name="employee_code" id="d-emp_code">
                                </div>
                            </div>
                        </div>

                        <div class="col-6">
                            <div class="form-group">
                                <label class=" text-lg-right col-form-label">Employee Name<span
                                        class="text-danger">*</span></label>
                                <div class="input-group m-b-10">
                                    <div class="input-group-prepend"><span class="input-group-text"><i
                                                class="fas fa-lg fa-fw fa-user"></i></span></div>
                                    <input type="text" name="employee_name" id="d-employee_name"
                                        placeholder="Employee Name" class="form-control txtValidate" readonly>
                                </div>
                            </div>
                        </div>


                    </div>

                    <div class="row">
                        <div class="col-4">
                            <div class="form-group">
                                <label class=" text-lg-right col-form-label">Employee Mobile<span
                                        class="text-danger">*</span></label>
                                <div class="input-group m-b-10">
                                    <div class="input-group-prepend"><span class="input-group-text"><i
                                                class="fas fa-lg fa-fw fa-mobile-alt"></i></span></div>
                                    <input type="text" name="employee_mobile" id="d-employee_mobile"
                                        placeholder="Employee Name" class="form-control txtValidate" readonly>
                                </div>
                            </div>
                        </div>

                        <div class="col-4">
                            <div class="form-group">
                                <label class=" text-lg-right col-form-label">City<span
                                        class="text-danger">*</span></label>
                                <div class="input-group m-b-10">
                                    <div class="input-group-prepend"><span class="input-group-text"><i
                                                class="fas fa-lg fa-fw fa-map-marker-alt"></i></span></div>
                                    <select class="form-control kt-select2 select2 citys" id="d-city" name="city"
                                        required>
                                        @foreach ($fetch_citys as $key)
                                            @if (old('city') == $key->id)
                                                <option value="{{ $key->id }}" selected>{{ $key->name }}
                                                </option>
                                            @else
                                                <option value="{{ $key->id }}">{{ $key->name }}</option>
                                            @endif
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>

                        <div class="col-4">
                            <div class="form-group">
                                <label class=" text-lg-right col-form-label">Zone(s)<span
                                        class="text-danger">*</span></label>
                                <div class="input-group m-b-10">
                                    <div class="input-group-prepend"><span class="input-group-text"><i
                                                class="fas fa-lg fa-fw fa-map-marker-alt"></i></span></div>
                                    <select class="form-control kt-select2 select2 zones" id="d-zones"
                                        name="zones" required>
                                        @foreach ($fetch_zones as $key)
                                            @if (old('zones') == $key->id)
                                                <option value="{{ $key->id }}" selected>{{ $key->zone_name }}
                                                </option>
                                            @else
                                                <option value="{{ $key->id }}">{{ $key->zone_name }}</option>
                                            @endif
                                        @endforeach
                                    </select>
                                    <span class="text-danger invalid-feedback">Zones is Required<span>
                                </div>
                            </div>
                        </div>


                    </div>

                    <div class="row mt-5">
                        <div class="col-12">
                            <div class="heading">
                                <h4>System Authentication<h4>
                            </div>
                        </div>

                    </div>

                    <hr>

                    <div class="row">
                        <div class="col-4">
                            <div class="form-group">
                                <label class=" text-lg-right col-form-label">App Username<span
                                        class="text-danger">*</span></label>
                                <div class="input-group m-b-10">
                                    <div class="input-group-prepend"><span class="input-group-text"><i
                                                class="fas fa-lg fa-fw fa-user"></i></span></div>
                                    <input type="text" name="app_username" id="d-app_username"
                                        placeholder="App Username" class="form-control txtValidate">
                                </div>
                            </div>
                        </div>

                        <div class="col-4">
                            <div class="form-group">
                                <label class=" text-lg-right col-form-label">App Password<span
                                        class="text-danger">*</span></label>
                                <div class="input-group m-b-10">
                                    <div class="input-group-prepend"><span class="input-group-text"><i
                                                class="fas fa-lg fa-fw fa-lock"></i></span></div>
                                    <input type="password" name="app_password" id="d-app_password"
                                        placeholder="App Password" class="form-control txtValidate">
                                </div>
                            </div>
                        </div>

                        <div class="col-4">
                            <div class="form-group">
                                <label class=" text-lg-right col-form-label">App Confirm Password<span
                                        class="text-danger">*</span></label>
                                <div class="input-group m-b-10">
                                    <div class="input-group-prepend"><span class="input-group-text"><i
                                                class="fas fa-lg fa-fw fa-lock"></i></span></div>
                                    <input type="password" name="app_confirm_password" id="d-app_confirm_password"
                                        placeholder="App Confirm Password" class="form-control txtValidate">
                                </div>
                            </div>
                        </div>


                    </div>

                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn text-light" style="background-color:#0062cc;">Add
                        Driver</button>
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                </div>
            </form>
        </div>
    </div>
</div>

<script>
    $(document).ready(function() {

        $("#editForm").on("submit", function(e) {
            e.preventDefault();
            var formData = new FormData();
            formData.append('_token', '{{ csrf_token() }}');
            formData.append('id', $("#d-id").val());
            formData.append('driver_code', $("#d-driver_code").val());
            formData.append('employee_code', $("#d-emp_code").val());
            formData.append('employee_name', $("#d-employee_name").val());
            formData.append('employee_mobile', $("#d-employee_mobile").val());
            formData.append('city', $("#d-city").val());
            formData.append('zones', $("#d-zones").val());
            formData.append('app_username', $("#d-app_username").val());
            formData.append('app_password', $("#d-app_password").val());
            formData.append('app_confirm_password', $("#d-app_confirm_password").val());
            $.ajax({
                type: "POST",
                url: "{{ route('pages.driver.update') }}",
                data: formData,
                processData: false,
                contentType: false,
                success: function(response) {
                    if (response.status === 'success') {
                        alert('Employee Updated Successfully');
                        location.reload(true);
                    } else {
                        alert('Employee Updated Unsuccessfully');
                    }
                },
                error: function(xhr, textStatus, errorThrown) {
                    alert('Employee Updated Unsuccessfully');
                    // console.log(xhr);
                }
            });
        });
    });


</script>

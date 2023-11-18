<meta name="csrf-token" content="{{ csrf_token() }}" />
<script src="https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.min.js"></script>
<script src="https://momentjs.com/downloads/moment.js"></script>

<div class="modal fade bd-example-modal-lg" id="adddriver" tabindex="-1" aria-labelledby="myLargeModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            {{-- action="{{ route('user.candidate.save') }}" method="post" --}}
            <form class="needs-validation" id="addForm" novalidate>
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel" style="font-weight: bold;">Add Driver</h5>
                    {{-- <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button> --}}
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
                                    <input type="text" name="driver_code" id="driver_code" placeholder="Driver Code"
                                        value="DR00{{ $driver_code }}" class="form-control txtValidate" readonly>
                                        <input type="hidden" id="status" name="status" value="1">
                                </div>
                            </div>
                        </div>

                        <div class="col-6">
                            <div class="form-group">
                                <label class=" text-lg-right col-form-label">Employee Code<span
                                        class="text-danger">*</span></label>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="fa fa-hashtag"></i></span>
                                    </div>
                                    <select class="form-control kt-select2" name="employee_code" id="employee_code"
                                        onchange="myFunction()">
                                        <option value="" disabled selected>Please Select Employee</option>
                                        @foreach ($fetch_employees as $key)
                                            @if (old('employee_code') == $key->id)
                                                <option value="{{ $key->id }}" selected>{{ $key->emp_code }} |
                                                    {{ $key->emp_first_name }}
                                                </option>
                                            @else
                                                <option value="{{ $key->id }}">{{ $key->emp_code }} |
                                                    {{ $key->emp_first_name }}</option>
                                            @endif
                                        @endforeach
                                    </select>
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
                                    <input type="text" name="employee_name" id="employee_name" id="emp_middle_name"
                                        id="emp_last_name" placeholder="Employee Name" class="form-control txtValidate"
                                        readonly>
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
                                    <input type="text" name="employee_mobile" id="employee_mobile"
                                        placeholder="Employee Mobile" class="form-control txtValidate" readonly>
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
                                    <select class="form-control kt-select2" id="city" name="city"
                                        required>
                                        <option value="" disabled selected>Please Select City</option>
                                        @foreach ($fetch_citys as $key)
                                            @if (old('city') == $key->id)
                                                <option value="{{ $key->id }}" selected>{{ $key->name }}
                                                </option>
                                            @else
                                                <option value="{{ $key->id }}">{{ $key->name }}</option>
                                            @endif
                                        @endforeach
                                    </select>
                                    <span class="text-danger invalid-feedback">City is Required<span>
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
                                    <select class="form-control" id="zones" name="zones"
                                        required>
                                        <option value="" disabled selected>Please Select Zone</option>
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
                                    <input type="text" name="app_username" id="app_username"
                                        placeholder="App Username" class="form-control txtValidate" required>
                                    <span class="text-danger invalid-feedback">App Username is Required<span>
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
                                    <input type="password" name="app_password" id="app_password"
                                        placeholder="App Password" class="form-control txtValidate" required>
                                    <span class="text-danger invalid-feedback">App Password is Required<span>
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
                                    <input type="password" name="app_confirm_password" id="app_confirm_password"
                                        placeholder="App Confirm Password" class="form-control txtValidate" required>
                                    <span class="text-danger invalid-feedback">App Confirm Password is Required<span>
                                </div>
                            </div>
                        </div>


                    </div>

                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary btn-sm">Add Driver</button>
                    <button type="button" class="btn btn-danger btn-sm" data-dismiss="modal">Close</button>
                </div>
            </form>
        </div>
    </div>
</div>


<script>
    $(document).ready(function() {
        $(".select2").select2();
    });

    (function() {
        'use strict'
        var forms = document.querySelectorAll('.needs-validation')
        Array.prototype.slice.call(forms)
            .forEach(function(form) {
                form.addEventListener('submit', function(event) {
                    if (!form.checkValidity()) {
                        event.preventDefault()
                        event.stopPropagation()
                    }
                    form.classList.add('was-validated')
                }, false)
            })
    })();

    function myFunction() {
        var id = $('#employee_code').val();
        // alert(id);
        $.ajax({
            headers: {
                'X-CSRF-TOKEN': "{{ csrf_token() }}",
            },
            url: "{{ route('admin.driver.get_name') }}",
            type: "POST",
            data: {
                id: id,
            },
            success: function(response) {
                // console.log(response);
                var fullName = response.emp_first_name + ' ' + response.emp_middle_name + ' ' + response
                    .emp_last_name;
                $('#employee_name').val(fullName);
                $('#employee_mobile').val(response.mobile);
            }
        });
    }


    $(document).ready(function() {
        $("#addForm").on("submit", function(e) {
            e.preventDefault()
            // var csrfToken = $('meta[name="csrf-token"]').attr('content');
            var _token = '{{ csrf_token() }}';
            var driver_code = $("#driver_code").val();
            var employee_code = $("#employee_code").val();
            var employee_name = $("#employee_name").val();
            var employee_mobile = $("#employee_mobile").val();
            var city = $("#city").val();
            var zones = $("#zones").val();
            var status = $("#status").val();
            var app_username = $("#app_username").val();
            var app_password = $("#app_password").val();
            var app_confirm_password = $("#app_confirm_password").val();

            var formData = new FormData();
            formData.append('_token', _token);
            formData.append('driver_code', driver_code);
            formData.append('employee_code', employee_code);
            formData.append('employee_name', employee_name);
            formData.append('employee_mobile', employee_mobile);
            formData.append('city', city);
            formData.append('zones', zones);
            formData.append('status', status);
            formData.append('app_username', app_username);
            formData.append('app_password', app_password);
            formData.append('app_confirm_password', app_confirm_password);

            $.ajax({
                type: "POST",
                url: "{{ route('admin.driver.save') }}",
                data: formData,
                processData: false,
                contentType: false,
                success: function(response) {
                    if (response.status === 'success') {
                        alert('Driver Added Successfully');
                        location.reload(true);
                    } else {
                        alert('Driver Added Unsuccessfully');
                    }
                },
                error: function(xhr, textStatus, errorThrown) {
                    alert('Driver Added Unsuccessfully');
                }
            });
        });

    });

    jQuery(document).ready(function() {
        jQuery('#city').change(function() {
            let cid = jQuery(this).val();
            jQuery.ajax({
                url: "{{ route('admin.driver.getarea') }}",
                type: 'post',
                data: 'cid=' + cid + '&_token={{ csrf_token() }}',
                success: function(result) {
                    // console.log(result);
                    jQuery('#zones').html(result);

                }

            });
        });
    });
</script>

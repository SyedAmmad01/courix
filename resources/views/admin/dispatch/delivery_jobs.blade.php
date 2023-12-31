{{-- Extends layout --}}
@extends('layouts.admin')
@section('page_title', ' Delivery Jobs')
{{-- Content --}}
@section('content')
    <div class="card-body">
        <div class="row p-4 bg-light" style="margin-left: 0.1rem; margin-right: 0.1rem;">
            <div class="card card-custom example example-compact w-100">
                <h2 class="card-title ml-4">
                    Delivery Jobs
                </h2>
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-12">
                            <div class="row">
                                <div class="col-9">
                                </div>
                                <div class="col-3" style="margin-top: 45px;">
                                    <div class="form-group">
                                        <button type="button" class="btn btn-danger btn-sm">Batch Delete</button>
                                        <button type="button" class="btn btn-primary btn-sm">Transfer</button>
                                    </div>
                                </div>
                            </div>

                            <form class="forms-sample" id="get_orders">
                                <div class="row">
                                    <div class="col-4">
                                        <div class="form-group">
                                            <label class="text-lg-right col-form-label">From Date<span
                                                    class="text-danger">*</span></label>
                                            <div class="input-group m-b-10">
                                                <div class="input-group-prepend"><span class="input-group-text">
                                                        <i class="fas fa-lg fa-fw  fa-calendar-alt"></i></span></div>
                                                <input type="date" id="from_date" name="from_date" class="form-control">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-4">
                                        <div class="form-group">
                                            <label class="text-lg-right col-form-label">To Date<span
                                                    class="text-danger">*</span></label>
                                            <div class="input-group m-b-10">
                                                <div class="input-group-prepend"><span class="input-group-text">
                                                        <i class="fas fa-lg fa-fw  fa-calendar-alt"></i></span></div>
                                                <input type="date" id="to_date" name="to_date" class="form-control">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-4">
                                        <div class="form-group">
                                            <label class="text-lg-right col-form-label">Driver<span
                                                    class="text-danger">*</span></label>
                                            <div class="input-group m-b-10">
                                                <div class="input-group-prepend"><span class="input-group-text">
                                                        <i class="fas fa-lg fa-fw fa-user"></i></span></div>
                                                <select class="form-control kt-select2 select2" id="driver"
                                                    name="driver" style="width:86%;">
                                                    <option value="" disabled selected>Please Select Driver
                                                    </option>
                                                    @foreach ($fetch_drivers as $key)
                                                        @if (old('driver') == $key->id)
                                                            <option value="{{ $key->id }}" selected>
                                                                {{ $key->driver_code }} |
                                                                {{ $key->employee_name }}
                                                            </option>
                                                        @else
                                                            <option value="{{ $key->id }}">
                                                                {{ $key->driver_code }} |
                                                                {{ $key->employee_name }}
                                                            </option>
                                                        @endif
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                    </div>


                                </div>

                                <div class="row">
                                    <div class="col-4">
                                        <div class="form-group">
                                            <label class="text-lg-right col-form-label">City<span
                                                    class="text-danger">*</span></label>
                                            <div class="input-group m-b-10">
                                                <div class="input-group-prepend"><span class="input-group-text">
                                                        <i class="fas fa-lg fa-fw fa-building"></i></span></div>
                                                <select class="form-control kt-select2 city" id="city" name="city"
                                                    style="width:80%;">
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
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-4">
                                        <div class="form-group">
                                            <label class="text-lg-right col-form-label">Zones<span
                                                    class="text-danger">*</span></label>
                                            <div class="input-group m-b-10">
                                                <div class="input-group-prepend"><span class="input-group-text">
                                                        <i class="fas fa-lg fa-fw fa-map-marker-alt"></i></span></div>
                                                <select class="form-control" id="zones" name="zones">
                                                    <option value="" disabled selected>Please Select Zone</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-4">
                                        <div class="form-group">
                                            <label class="text-lg-right col-form-label">Areas<span
                                                    class="text-danger">*</span></label>
                                            <div class="input-group m-b-10">
                                                <div class="input-group-prepend"><span class="input-group-text">
                                                        <i class="fas fa-lg fa-fw fa-street-view"></i></span></div>
                                                <select class="form-control kt-select2" id="area" name="area">
                                                    <option value="" disabled selected>Please Select Area</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>




                                    <div class="col-4 mt-5">
                                        <div class="form-group">
                                            <button type="submit" class="btn btn-primary btn-sm">Search</button>
                                        </div>
                                    </div>


                                </div>





                            </form>

                            <div class="row">
                                <div class="col-4" style="margin-top: 45px;">
                                    <div class="form-group">
                                        <button type="button" class="btn btn-primary btn-sm hold"><i
                                                class="fa fa-spinner"></i>Load</button>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-6">
                                    </div>
                                    <div class="col-6" style="margin-top: 45px;">

                                        <div class="form-group">

                                            <a type="button" href="javascript:void(0);" data-toggle="modal"
                                                class="btn btn-danger btn-sm" data-target="#UpdateDeliveryJobsModal"
                                                id="Update_Delivery_Jobs_Modal_link">
                                                <i class="fa-solid fa-pen-to-square"></i>Update Job Code
                                                Label</a>

                                            <a type="button" href="javascript:void(0);" class="btn btn-success btn-sm"
                                                onclick="pdfexport(selectedIDs)"><i class="fa-solid fa-truck"></i>PDf
                                                Report</a>

                                            <a type="button" href="javascript:void(0);" class="btn btn-primary btn-sm"
                                                onclick="exportToExcel(selectedIDs)"><i
                                                    class="fa-solid fa-truck"></i>Export To Excel</a>
                                        </div>

                                    </div>
                                </div>

                            </div>


                            <div class="row hidden" style="display:none;">
                                <div class="col-12" style="margin-top: 45px;">
                                    <div class="form-group">
                                        <input type="text" id="search_box" name="search_box" placeholder="Search"
                                            class="form-control" onblur="search_bar()">
                                    </div>
                                </div>
                            </div>
                            <hr>


                            <div class="row">
                                <div class="col-12">
                                    <h3>Unverified Shipments</h3>
                                </div>
                                <div class="col-12">
                                    <div class="body">
                                        <div class="table-responsive check-all-parent">
                                            <table class="table table-hover m-b-0 c_list myDataTable" id="">
                                                <thead>
                                                    <tr>
                                                        <th> Tracking NO </th>
                                                        <th> Barcode </th>
                                                        <th> Shipper Name </th>
                                                        <th> Driver Name </th>
                                                        <th> Location To </th>
                                                        <th> Recipient Name </th>
                                                        <th> Recipient Name </th>
                                                        <th> Tracking Status </th>

                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <tr>
                                                        <td></td>
                                                        <td></td>
                                                        <td></td>
                                                        <td></td>
                                                        <td></td>
                                                        <td></td>
                                                        <td></td>
                                                        <td></td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <br>
                            <br>
                            <div class="row">
                                <div class="col-12">
                                    <h3>Out for delivery</h3>
                                </div>
                                <div class="col-12">
                                    <div class="body">
                                        <div class="table-responsive check-all-parent">
                                            <table class="table table-hover m-b-0 c_list myDataTable" id="">
                                                <thead>
                                                    <tr>
                                                        <th>
                                                            <input class="check-all" type="checkbox" name="checkbox">
                                                        </th>
                                                        <th> Job Code </th>
                                                        <th> Tracking No </th>
                                                        <th> Shipper Ref </th>
                                                        <th> Area </th>
                                                        <th> Receipent Address </th>
                                                        <th> Job Status </th>
                                                        <th> Shipment Status </th>
                                                        <th> Action </th>

                                                    </tr>
                                                </thead>
                                                <tbody id="preview">
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- Delivery Jobs Update Status Modal --}}
    @include('admin.modal.edit_delivery_jobs')
    {{-- Delivery Jobs Update Status Modal --}}

    {{-- Delivery Jobs Delete Data Modal --}}
    @include('admin.modal.delete_delivery_jobs')
    {{-- Delivery Jobs Delete Data Modal --}}

    {{-- Delivery Jobs Update Status Modal --}}
    @include('admin.modal.update_jobcode_delivery_jobs')
    {{-- Delivery Jobs Update Status Modal --}}

@endsection
{{-- Scripts Section --}}
@section('page-scripts')
    <script src="{{ asset('js/pages/widgets.js') }}" type="text/javascript"></script>
    <script>
        $(document).ready(function() {
            $(".select2").select2();

            var alertNumber = 1;
            $(".hold").click(function() {
                // alert(alertNumber);
                alertNumber = 1 - alertNumber;
                if (Number(alertNumber) == 1) {
                    $(".hidden").css("display", "block");
                } else {
                    $(".hidden").css("display", "none");
                }
            });
        });

        $(document).ready(function() {
            $('.myDataTable').DataTable();
        });

        jQuery(document).ready(function() {
            jQuery('#city').change(function() {
                let cid = jQuery(this).val();
                jQuery.ajax({
                    url: "{{ route('admin.dispatch.getarea') }}",
                    type: 'post',
                    data: 'cid=' + cid + '&_token={{ csrf_token() }}',
                    success: function(result) {
                        // console.log(result);
                        jQuery('#zones').html(result);

                    }

                });
            });
        });

        jQuery(document).ready(function() {
            jQuery('#city').change(function() {
                let cid = jQuery(this).val();
                jQuery.ajax({
                    url: "{{ route('admin.dispatch.getcity') }}",
                    type: 'post',
                    data: 'cid=' + cid + '&_token={{ csrf_token() }}',
                    success: function(result) {
                        // console.log(result);
                        jQuery('#area').html(result);

                    }

                });
            });
        });

        $("#get_orders").on("submit", function(e) {
            e.preventDefault();
            var from_date = $('#from_date').val();
            var to_date = $('#to_date').val();
            var driver_id = $('#driver').val();
            var city_id = $('#city').val();
            var area_id = $('#area').val();
            var zones_id = $('#zones').val();
            $.ajax({
                headers: {
                    'X-CSRF-TOKEN': "{{ csrf_token() }}",
                },
                url: "{{ route('admin.dispatch.get_orders') }}",
                type: "POST",
                data: {
                    from_date: from_date,
                    to_date: to_date,
                    driver_id: driver_id,
                    city_id: city_id,
                    area_id: area_id,
                    zones_id: zones_id,
                },
                success: function(response) {
                    // console.log(response);
                    var responseData = response;
                    var html = "";
                    responseData.forEach((item) => {
                        // Check the job_code value and display corresponding status
                        var statusText = "";
                        if (item.job_status == 1) {
                            statusText = "Created";
                        } else if (item.job_status == 2) {
                            statusText = "Started";
                        } else if (item.job_status == 3) {
                            statusText = "Delivered";
                        }
                        html += `<tr>
                            <td><input class="checkbox-tick checkbox" type="checkbox" name="checkbox" value="${item.id}"></td>
                            <td>${item.job_code}</td>
                            <td>${item.tracking_number}</td>
                            <td>${item.reference_number}</td>
                            <td>${item.area_name}</td>
                            <td>${item.country_name},${item.city_name},${item.area_name},${item.street_address}</td>
                            <td>${statusText}</td>
                            <td>${item.status_name}</td>
                            <td><span style="display:flex;">
                                <a href="javascript:void(0);" id="show-employee" data-toggle="modal"
                                        data-target="#EditDeliveryJobsModal"
                                        data-url="{{ url('admin/dispatch/edit/${item.id}') }}"
                                        class="btn btn-primary btn-sm fa fa-edit" type="button" style="background-color: #007aff;
                                        border-color: #007aff;">
                                    </a>
                                    &nbsp;
                                <button class="delete-btn btn btn-danger btn-sm fa fa-trash"
                                    data-driver-id="" data-toggle="modal"
                                    data-target="#DeleteDeliveryJobsModal"></button>
                                &nbsp;
                            </td>
                        </tr>`;
                    });

                    var previewElement = document.getElementById('preview');
                    if (previewElement) {
                        previewElement.innerHTML = html;
                    }
                }
            });
        });

        function get_orders() {
            var from_date = $('#from_date').val();
            var to_date = $('#to_date').val();
            var driver_id = $('#driver').val();
            var city_id = $('#city').val();
            var area_id = $('#area').val();
            var zones_id = $('#zones').val();
            $.ajax({
                headers: {
                    'X-CSRF-TOKEN': "{{ csrf_token() }}",
                },
                url: "{{ route('admin.dispatch.get_orders') }}",
                type: "POST",
                data: {
                    from_date: from_date,
                    to_date: to_date,
                    driver_id: driver_id,
                    city_id: city_id,
                    area_id: area_id,
                    zones_id: zones_id,
                },
                success: function(response) {
                    // console.log(response);
                    var responseData = response;
                    var html = "";
                    responseData.forEach((item) => {
                        // Check the job_code value and display corresponding status
                        var statusText = "";
                        if (item.job_status == 1) {
                            statusText = "Created";
                        } else if (item.job_status == 2) {
                            statusText = "Started";
                        } else if (item.job_status == 3) {
                            statusText = "Delivered";
                        }
                        html += `<tr>
                            <td><input class="checkbox-tick checkbox" type="checkbox" name="checkbox" value="${item.id}"></td>
                            <td>${item.job_code}</td>
                            <td>${item.tracking_number}</td>
                            <td>${item.reference_number}</td>
                            <td>${item.area_name}</td>
                            <td>${item.country_name},${item.city_name},${item.area_name},${item.street_address}</td>
                            <td>${statusText}</td>
                            <td>${item.status_name}</td>
                            <td><span style="display:flex;">
                                <a href="javascript:void(0);" id="show-employee" data-toggle="modal"
                                        data-target="#EditDeliveryJobsModal"
                                        data-url="{{ url('admin/dispatch/edit/${item.id}') }}"
                                        class="btn btn-primary btn-sm fa fa-edit" type="button" style="background-color: #007aff;
                                        border-color: #007aff;">
                                    </a>
                                    &nbsp;
                                <button class="delete-btn btn btn-danger btn-sm fa fa-trash"
                                    data-driver-id="" data-toggle="modal"
                                    data-target="#DeleteDeliveryJobsModal"></button>
                                &nbsp;
                            </td>
                        </tr>`;
                    });

                    var previewElement = document.getElementById('preview');
                    if (previewElement) {
                        previewElement.innerHTML = html;
                    }
                }
            });
        }


        function search_bar() {
            var id = $('#search_box').val();
            // alert(id);
            $.ajax({
                headers: {
                    'X-CSRF-TOKEN': "{{ csrf_token() }}",
                },
                url: "{{ route('admin.dispatch.search_bar') }}",
                type: "POST",
                data: {
                    id: id,
                    // name: name,
                },
                success: function(response) {
                    // console.log(response);
                    var responseData = response;
                    var html = "";
                    responseData.forEach((item) => {
                        // Check the job_code value and display corresponding status
                        var statusText = "";
                        if (item.job_status == 1) {
                            statusText = "Created";
                        } else if (item.job_status == 2) {
                            statusText = "Started";
                        } else if (item.job_status == 3) {
                            statusText = "Delivered";
                        }
                        html += `<tr>
                            <td><input class="checkbox-tick checkbox" type="checkbox" name="checkbox" value="${item.id}"></td>
                            <td>${item.job_code}</td>
                            <td>${item.tracking_number}</td>
                            <td>${item.reference_number}</td>
                            <td>${item.area_name}</td>
                            <td>${item.country_name},${item.city_name},${item.area_name},${item.street_address}</td>
                            <td>${statusText}</td>
                            <td>${item.status_name}</td>
                            <td><span style="display:flex;">
                                <a href="javascript:void(0);" id="show-employee" data-toggle="modal"
                                        data-target="#EditDeliveryJobsModal"
                                        data-url="{{ url('admin/dispatch/edit/${item.id}') }}"
                                        class="btn btn-primary btn-sm fa fa-edit" type="button" style="background-color: #007aff;
                                        border-color: #007aff;">
                                    </a>
                                    &nbsp;
                                <button class="delete-btn btn btn-danger btn-sm fa fa-trash"
                                    data-driver-id="" data-toggle="modal"
                                    data-target="#DeleteDeliveryJobsModal"></button>
                                &nbsp;
                            </td>
                        </tr>`;
                    });

                    var previewElement = document.getElementById('preview');
                    if (previewElement) {
                        previewElement.innerHTML = html;
                    }
                }
            });

        }





        $("body").on("click", "#show-employee", function() {
            var candidateURL = $(this).data('url');
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $.get(candidateURL, function(data) {
                // console.log(data);
                var fullName = data.emp_code + ' | ' + data.emp_first_name;
                $('#EditDeliveryJobsModal').modal('show');
                $('#s-id').val(data.id);
            });
        });
        $('.close_modal').click(function() {
            $('#driverShowModalEdit').modal('hide');
        });


        // // // Array to hold selected checkbox IDs
        // var selectedIDs = [];

        // // Checkbox click event handler using event delegation
        // $(document).on('change', '.checkbox', function() {
        //     var id = $(this).val();
        //     // alert(id);
        //     if (this.checked) {
        //         selectedIDs.push(id);
        //     } else {
        //         var index = selectedIDs.indexOf(id);
        //         if (index !== -1) {
        //             selectedIDs.splice(index, 1);
        //         }
        //     }
        // });

        function exportToExcel(selectedIDs) {
            // alert(selectedIDs);
            // Send an AJAX request to get data
            $.ajax({
                headers: {
                    'X-CSRF-TOKEN': "{{ csrf_token() }}",
                },
                url: "{{ route('admin.dispatch.exportToExcel') }}",
                type: "POST",
                data: {
                    id: selectedIDs,
                },
                xhrFields: {
                    responseType: 'blob' // This is important for handling binary data
                },
                success: function(response, status, xhr) {
                    const blob = response;
                    const fileName = 'ExportExcel.xlsx';

                    // Trigger the download using FileSaver.js
                    saveAs(blob, fileName);
                },
                error: function(xhr, textStatus, error) {
                    // Handle AJAX error
                    console.error("Export failed:", error);
                    // Add user-friendly error handling here
                }
            });
        }


        // $('#Update_Delivery_Jobs_Modal_link').on('click', function() {
        //     const reviewElement = document.getElementById('update_id');
        //     reviewElement.value = (selectedIDs.length > 0) ?
        //         selectedIDs.join(',') :
        //         '';

        //     // Send AJAX request
        //     $.ajax({
        //         headers: {
        //             'X-CSRF-TOKEN': "{{ csrf_token() }}",
        //         },
        //         url: "{{ route('admin.dispatch.edit_job_code') }}",
        //         type: "POST",
        //         data: {
        //             id: selectedIDs,
        //         },
        //         success: function(response) {
        //             console.log(response);
        //             // Extract the array of reference numbers from the response
        //             const idNumbers = response.map(item => item.id);

        //             // Join the reference numbers into a single string
        //             const combinedIdNumbers = idNumbers.join(',');

        //             // Set the value of the input fields
        //             $('#u_id').val(combinedIdNumbers);
        //             // $('#u_status').val(response[0].status);
        //             // $('#u_comments').val(response[0].comments);

        //             // Open the modal
        //             $('#UpdateDeliveryJobsModal').modal('show');
        //         }
        //     });
        // });


        function pdfexport(selectedIDs) {
            // alert(selectedIDs);
            // Send an AJAX request to get data
            $.ajax({
                headers: {
                    'X-CSRF-TOKEN': "{{ csrf_token() }}",
                },
                url: "{{ route('admin.dispatch.pdf_export') }}",
                type: "POST",
                data: {
                    id: selectedIDs,
                },
                xhrFields: {
                    responseType: 'blob' // This is important for handling binary data
                },
                success: function(response, status, xhr) {
                    const blob = response;
                    const fileName = 'deliveryjobs.pdf'; // Specify the desired file name

                    // Trigger the download using FileSaver.js
                    saveAs(blob, fileName);
                },
                error: function(xhr, textStatus, error) {
                    // Handle AJAX error
                    console.error("Export failed:", error);
                    // Add user-friendly error handling here
                }
            });
        }


        // changes of code


        // Array to hold selected checkbox IDs
        var selectedIDs = [];

        // Checkbox click event handler using event delegation
        $(document).on('change', '.checkbox', function() {
            var id = $(this).val();
            if (this.checked) {
                selectedIDs.push(id);
            } else {
                var index = selectedIDs.indexOf(id);
                if (index !== -1) {
                    selectedIDs.splice(index, 1);
                }
            }
        });

        // Update Delivery Jobs Modal click event handler
        $('#Update_Delivery_Jobs_Modal_link').on('click', function() {
            const reviewElement = document.getElementById('update_id');
            reviewElement.value = (selectedIDs.length > 0) ? selectedIDs.join(',') : '';

            // Send AJAX request
            $.ajax({
                headers: {
                    'X-CSRF-TOKEN': "{{ csrf_token() }}",
                },
                url: "{{ route('admin.dispatch.edit_job_code') }}",
                type: "POST",
                data: {
                    id: selectedIDs,
                },
                success: function(response) {
                    // Extract the array of reference numbers from the response
                    const idNumbers = response.map(item => item.id);

                    // Join the reference numbers into a single string
                    const combinedIdNumbers = idNumbers.join(',');

                    // Set the value of the input fields
                    $('#u_id').val(combinedIdNumbers);
                    // $('#u_status').val(response[0].status);
                    // $('#u_comments').val(response[0].comments);

                    // Open the modal
                    $('#UpdateDeliveryJobsModal').modal('show');

                    // Reset the array after handling the response
                    selectedIDs = [];
                },
                error: function(error) {
                    // Handle the error, if needed
                    console.error("Error in AJAX request:", error);
                }
            });
        });


        // changes of code
    </script>
@endsection

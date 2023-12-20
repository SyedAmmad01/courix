{{-- Extends layout --}}
@extends('layouts.admin')
@section('page_title', 'Shipment Tracking')
{{-- <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script> --}}
{{-- Content --}}
@section('content')
    <div class="container-fluid">
        <div class="col-12">
            <div class="row mb-5 mt-5 justify-content-between">
                <div class="col-9">
                    <h2 class="card-title">
                        Shipment Tracking
                    </h2>
                </div>
                <div class="col-3 d-flex align-items-center">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item"><a href="#">Shipments</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Shipment
                                Tracking</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>
    <div class="card-body">
        <div class="row p-4 bg-light" style="margin-left: 0.1rem; margin-right: 0.1rem;">
            <div class="card card-custom example example-compact w-100">
                <div class="card-body">
                    <div class="container-fluid">
                        <div class="row mt-5 mb-5">
                            <div class="col-12">
                                <div class="row">
                                    <div class="col-5">
                                        <form class="forms-sample" id="search">
                                            <div class="form-group">
                                                <div class="input-group">
                                                    <input type="text" id="tracking_number" name="tracking_number"
                                                        placeholder="123.." class="form-control"
                                                        style="border-radius:20px;">
                                                    &nbsp;
                                                    <button type="submit" class="btn btn-primary btn-sm"
                                                        style="border-radius:20px;"><i
                                                            class="fa fa-magnifying-glass"></i>Search</button>
                                                </div>
                                            </div>
                                        </form>
                                    </div>




                                    <div class="col-7 buttons" style="display:none;">

                                        <a href="javascript:void(0);" id="edit_button" data-toggle="modal" type="button"
                                            class="btn btn-primary btn-sm"><i class="fa fa-edit"></i>Edit
                                            Order</a>

                                        &nbsp;
                                        <a href="javascript:void(0);" id="attached_file_button" data-toggle="modal"
                                            data-target="#attached_file" type="button" class="btn btn-warning btn-sm"><i
                                                class="fa fa-plus"></i>Attach File</a>

                                        &nbsp;
                                        <a href="javascript:void(0);" id="change_location_button" data-toggle="modal"
                                            data-target="#changelocation" type="button" class="btn btn-warning btn-sm"><i
                                                class="fa fa-location-crosshairs"></i>Change Location</a>

                                        &nbsp;
                                        <form action="{{ route('admin.shipment.tracking_print_airways_bills') }}"
                                            method="POST" enctype="multipart/form-data" class="d-inline">
                                            @csrf
                                            <input type="hidden" name="id" id="id" class="s-id">
                                            <button type="submit" class="btn btn-success btn-sm"><i
                                                    class="fa fa-print"></i>Print Airway Bill</button>
                                        </form>
                                        &nbsp;
                                    </div>
                                </div>
                            </div>





                        </div>
                    </div>
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-12">
                                <div class="card mb-3">
                                    <div class="card-body"
                                        style="background: linear-gradient(to bottom, #4d4d4d 0%, #f0c497 100%);">
                                        <div class="heading">
                                            <h2 class="card-title text-light text-center">
                                                <strong style="font-weight:800;">Your # <span
                                                        id="s-reference_number"></span>
                                                    is <span id="s-status"
                                                        style="color:white; background-color:orange; border-radius: 5px;"></span>&nbsp;<span
                                                        class="s-updated_at"></span></strong>
                                            </h2>
                                        </div>
                                        {{-- First Row Start --}}
                                        <div class="row">
                                            <div class="col-6 mb-5">
                                                <div class="card">
                                                    <div class="card-body">
                                                        <div class="row">
                                                            <div class="col-6">
                                                                <h6>Sender<p>(Shipper)</p>
                                                                </h6>
                                                                <strong><span id="s-shipper_name"></span></strong>
                                                                &nbsp;
                                                                &nbsp;
                                                                <strong>
                                                                    <span id="s-shipper_address"></span>,
                                                                    <span id="s-shipper_area"></span>,
                                                                    <span id="s-shipper_city"></span>,
                                                                    <span id="s-shipper_country"></span>
                                                                </strong>
                                                                &nbsp;
                                                                <strong><span id="s-shippers_contact"></span></strong>
                                                            </div>
                                                            <div class="col-6">
                                                                <h6>Receiver<p>(Recipient)</p>
                                                                </h6>
                                                                <strong><span id="s-reciver_name"></span></strong>
                                                                &nbsp;
                                                                &nbsp;
                                                                <strong><span id="s-reciver_address"></span>,<span
                                                                        id="s-reciver_area"></span>,<span
                                                                        id="s-reciver_city"></span>,<span
                                                                        id="s-reciver_country"></span></strong>
                                                                &nbsp;
                                                                <strong><span id="s-mobile_1"></span></strong>
                                                            </div>
                                                        </div>

                                                        <div class="row">
                                                            <div class="col-12">
                                                                <div class="body">
                                                                    <div class="table-responsive check-all-parent">
                                                                        <table class="table myDataTable">
                                                                            <thead>
                                                                                <tr>
                                                                                    <th> QTY </th>
                                                                                    <th> DESCRIPTION </th>
                                                                                    <th> PRICE </th>
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


                                            <div class="col-6 mb-5">
                                                <div class="card">
                                                    <div class="card-body">
                                                        <div class="row">
                                                            <div class="col-12">
                                                                <form class="needs-validation" id="TrackingHistoryComment"
                                                                    novalidate>
                                                                    <div class="form-group">
                                                                        <div class="input-group">
                                                                            <input type="hidden" name="id"
                                                                                class="s-id">
                                                                            <input type="text" id="t-comments"
                                                                                name="t-comments"
                                                                                placeholder="Write a comment"
                                                                                class="form-control"
                                                                                style="border-radius: 20px;">
                                                                            &nbsp;
                                                                            <button type="submit"
                                                                                class="btn btn-primary btn-sm"
                                                                                style="border-radius: 20px;">Comment</button>
                                                                        </div>
                                                                    </div>
                                                                </form>
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-6 mb-5">
                                                                <h5>Tracking History</h5>
                                                            </div>
                                                        </div>
                                                        <div class="row" id="logs"
                                                            style="max-height: 300px; overflow-y: auto;">
                                                            <!-- The logs will be dynamically added here using JavaScript -->
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                        </div>
                                        {{-- First Row End --}}
                                        {{-- Second Row Start --}}
                                        <div class="row">
                                            <div class="col-6 mb-5">
                                                <div class="card">
                                                    <div class="card-body ml-3">
                                                        <div class="row">
                                                            <div class="form-group">
                                                                <label
                                                                    class="text-lg-right col-form-label"><strong>Driver:</strong></label>
                                                                &nbsp;
                                                                <strong><span id="s-driver_code"></span>|<span
                                                                        id="s-driver_name"></span>|<span
                                                                        id="s-employee_mobile"></span></strong>
                                                            </div>
                                                        </div>

                                                        <div class="row">
                                                            <div class="form-group">
                                                                <label class="text-lg-right col-form-label"><strong>Created
                                                                        On :</strong></label>
                                                                <strong><span class="s-created_at"></span></strong>
                                                                <strong>By</strong>
                                                            </div>
                                                        </div>

                                                        <div class="row">
                                                            <div class="form-group">
                                                                <label class="text-lg-right col-form-label"><strong>Updated
                                                                        On :</strong></label>
                                                                <strong><span class="s-updated_at"></span></strong>
                                                                <strong>By</strong>
                                                            </div>
                                                        </div>

                                                        <div class="row">
                                                            <div class="form-group">
                                                                <label class="text-lg-right col-form-label"><strong>Total
                                                                        COD:</strong></label>
                                                                <strong><span id="s-cod"></span></strong>
                                                            </div>
                                                        </div>

                                                        <div class="row">
                                                            <div class="form-group">
                                                                <label class="text-lg-right col-form-label"><strong>Zone
                                                                        :</strong></label>
                                                            </div>
                                                        </div>

                                                        <div class="row">
                                                            <div class="form-group">
                                                                <label class="text-lg-right col-form-label"><strong>Remarks
                                                                        :</strong></label>
                                                                <strong><span id="s-instruction"></span></strong>

                                                            </div>
                                                        </div>

                                                        <div class="row">
                                                            <div class="form-group">
                                                                <label class="text-lg-right col-form-label"><strong>Description
                                                                        :</strong></label>
                                                                <strong><span id="s-description"></span></strong>

                                                            </div>
                                                        </div>

                                                        <div class="row">
                                                            <div class="form-group">
                                                                <label class="text-lg-right col-form-label"><strong>Fragile
                                                                        :</strong></label>
                                                            </div>
                                                        </div>

                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-6 mb-5">
                                                <div class="card">
                                                    <div class="card-body ml-3">
                                                        <div class="row">
                                                            <div class="form-group">
                                                                <label class="text-lg-right col-form-label"><strong>Driver
                                                                        Paid Date :</strong></label>
                                                            </div>
                                                        </div>

                                                        <div class="row">
                                                            <div class="form-group">
                                                                <label class="text-lg-right col-form-label"><strong>Driver
                                                                        Paid Status :
                                                                    </strong></label>
                                                            </div>
                                                        </div>

                                                        <div class="row">
                                                            <div class="form-group">
                                                                <label class="text-lg-right col-form-label"><strong>Invoice
                                                                        Number :</strong></label>
                                                                <strong>By</strong>
                                                            </div>
                                                        </div>

                                                        <div class="row">
                                                            <div class="form-group">
                                                                <label class="text-lg-right col-form-label"><strong>Customer
                                                                        Paid Status:</strong></label>
                                                            </div>
                                                        </div>

                                                        <div class="row">
                                                            <div class="form-group">
                                                                <label class="text-lg-right col-form-label"><strong>Service
                                                                        Charges :</strong></label>
                                                            </div>
                                                        </div>

                                                        <div class="row">
                                                            <div class="form-group">
                                                                <label class="text-lg-right col-form-label"><strong>
                                                                    </strong></label>
                                                            </div>
                                                        </div>

                                                        <div class="row">
                                                            <div class="form-group">
                                                                <label class="text-lg-right col-form-label"><strong>
                                                                    </strong></label>
                                                            </div>
                                                        </div>

                                                        <div class="row">
                                                            <div class="form-group">
                                                                <label class="text-lg-right col-form-label"><strong>
                                                                    </strong></label>
                                                            </div>
                                                        </div>

                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        {{-- Secoond Row End --}}
                                        {{-- Third Row Start --}}
                                        <div class="row">
                                            <div class="col-6 mb-5">
                                                <div class="card">
                                                    <div class="card-body">
                                                        <div class="row">
                                                            <div class="col-12">
                                                                <div class="body">
                                                                    <div class="table-responsive check-all-parent">
                                                                        <table class="table myDataTable">
                                                                            <thead>
                                                                                <tr>
                                                                                    <th> File Name </th>
                                                                                    <th> Action </th>
                                                                                </tr>
                                                                            </thead>
                                                                            <tbody id="review">
                                                                            </tbody>
                                                                        </table>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-6 mb-5">
                                                <div class="card">
                                                    <div class="card-body">
                                                        <div class="row">
                                                            <form id="InternalRemarksHistoryComment"
                                                                class="needs-validation" novalidate>
                                                                <div class="col-12">
                                                                    <div class="form-group">
                                                                        <div class="input-group">
                                                                            <input type="hidden" name="id"
                                                                                class="s-id">
                                                                            <input type="text" id="i-remarks"
                                                                                name="remarks"
                                                                                placeholder="Write a comment"
                                                                                class="form-control"
                                                                                style="border-radius:20px;">
                                                                            &nbsp;
                                                                            <button type="submit"
                                                                                class="btn btn-primary btn-sm"
                                                                                style="border-radius:20px;">Comment</button>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </form>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-6 mb-5">
                                                                <h5>Internal remarks history</h5>
                                                            </div>

                                                        </div>
                                                        <div class="row" id="remarks"
                                                            style="max-height: 300px; overflow-y: auto;">
                                                            <!-- The remarks will be dynamically added here using JavaScript -->
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-12 mb-5 hidden" style="display: none;">
                                                <div class="card">
                                                    <div class="card-body">
                                                        <div class="row">
                                                            <div class="col-12">
                                                                <div class="body">
                                                                    <div class="table-responsive check-all-parent">
                                                                        <table class="table myDataTable">
                                                                            <thead>
                                                                                <tr>
                                                                                    <th> Tracking No </th>
                                                                                    <th> Barcode </th>
                                                                                    <th> Shipper </th>
                                                                                    <th> Job Code </th>
                                                                                    <th> COD </th>
                                                                                    <th> Service Charges </th>
                                                                                    <th> Paid By </th>
                                                                                    <th> Status </th>
                                                                                    <th> Pay Status </th>
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
                                                                                    <td></td>
                                                                                </tr>
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
                                        {{-- Third Row End --}}
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- Edit Modal --}}
    @include('admin.modal.edit_order');
    {{-- Edit Modal --}}

    {{-- Attached File Modal --}}
    @include('admin.modal.attached_file');
    {{-- Attached File Modal --}}

    {{-- Change Location Modal --}}
    @include('admin.modal.change_location');
    {{-- Change Location Modal --}}

    {{-- Delete Logs  Modal --}}
    @include('admin.modal.delete_logs');
    {{-- Delete Logs Modal --}}



@endsection

@section('page-scripts')
    <script src="{{ asset('js/pages/widgets.js') }}" type="text/javascript"></script>
    <script>
        $(document).ready(function() {
            $('.alert').alert();
        });

        $("#search").on("submit", function(e) {
            e.preventDefault()
            var id = $('#tracking_number').val();
            $('.myDataTable').DataTable();
            $(".hidden").css("display", "block");
            $(".buttons").css("display", "block");
            // alert(id);
            $.ajax({
                headers: {
                    'X-CSRF-TOKEN': "{{ csrf_token() }}",
                },
                url: "{{ route('admin.shipment.get_search') }}",
                type: "POST",
                data: {
                    id: id,
                },
                success: function(response) {
                    if (response == null) {
                        alert("Data is not found.");
                        return;
                    } else {
                        updateShipmentFilesTable(response)

                        updateTrackingHistoryTable(response)

                        updateInternalRemarksHistoryTable(response)

                        var fullName = response.emp_first_name + ' ' + response.emp_middle_name + ' ' +
                            response
                            .emp_last_name;
                        // Assuming response.updated_at is in ISO 8601 format
                        const updatedDate = new Date(response.updated_at);
                        const createdDate = new Date(response.created_at);

                        // Format the date and time
                        const formattedDate = updatedDate.toLocaleDateString();
                        const formattedTime = updatedDate.toLocaleTimeString();

                        const Dateformatted = createdDate.toLocaleDateString();
                        const Timeformatted = createdDate.toLocaleTimeString();

                        // Update the content of the element with id "s-updated_at"
                        // $('#employee_name').val(fullName);
                        $('.s-id').val(response.id);
                        $('#s-reference_number').html(response.reference_number);
                        $('#s-status').html(response.status_name);
                        $('.s-updated_at').html(formattedDate + ' ' + formattedTime);
                        $('.s-created_at').html(Dateformatted + ' ' + Timeformatted);
                        $('#s-shipper_name').html(response.shipper_name);
                        $('#s-shippers_contact').html(response.shipper_contact);
                        $('#s-reciver_name').html(response.reciver_name);
                        $('#s-shipper_country').html(response.shipper_country_name);
                        $('#s-shipper_city').html(response.shipper_city_name);
                        $('#s-shipper_area').html(response.shipper_area_name);
                        $('#s-shipper_address').html(response.shipper_address);
                        $('#s-reciver_country').html(response.shipment_country_name);
                        $('#s-reciver_city').html(response.shipment_city_name);
                        $('#s-reciver_area').html(response.shipment_area_name);
                        $('#s-reciver_address').html(response.street_address);
                        $('#s-mobile_1').html(response.mobile_1);
                        $('#s-driver_name').html(response.employee_name);
                        $('#s-employee_mobile').html(response.employee_mobile);
                        $('#s-driver_code').html(response.driver_code);
                        $('#s-cod').html(response.cod);
                        $('#s-instruction').html(response.instruction);
                        $('#s-description').html(response.description);

                        var responseData = response;
                        var html = "";
                        // console.log(responseData);

                        if (Array.isArray(responseData)) {
                            responseData.forEach((item) => {});
                        } else {
                            var detailsValues = responseData.details_of_products.split(',');
                            var codPieceValues = responseData.cod_peice.split(',');

                            if (detailsValues.length === codPieceValues.length) {
                                for (var i = 0; i < detailsValues.length; i++) {
                                    var index = i + 1;
                                    html += `<tr>
                                <td>${index}</td>
                                <td>${detailsValues[i]}</td>
                                <td>${codPieceValues[i]}</td>
                                </tr>`;
                                }
                            } else {
                                console.log("Number of details and cod piece values do not match.");
                            }
                        }
                        document.getElementById('preview').innerHTML = html;

                        // Function to update shipment files table
                        function updateShipmentFilesTable(response) {
                            var html = "";

                            response.shipment_files.forEach((file) => {
                                html += `<tr>
                                <td>${file.file_name}</td>
                                <td><button type="button" class="btn btn-primary btn-sm fa fa-eye" onclick="showImage('${file.selected_file}')"></button></td>
                            </tr>`;
                            });

                            var reviewElement = document.getElementById('review');
                            if (reviewElement) {
                                reviewElement.innerHTML = html;
                            }
                        }
                    }
                }
            });
        });





        function updateTrackingHistoryTable(response) {
            const logsElement = document.getElementById('logs');

            if (!logsElement || !response || !response.logs || !Array.isArray(response.logs)) {
                console.error("Invalid response or logs data.");
                return;
            }

            const html = response.logs.map((log) => {
                const updatedDate = new Date(log.updated_at);
                const formattedDate = updatedDate.toLocaleDateString();
                const formattedTime = updatedDate.toLocaleTimeString();

                let statusText = "";

                // if (log.status == null) {
                //     statusText = `Comment: ${log.comments} by ${log.name}`; // Include comment and name
                // } else if (log.status !== null) {
                //     statusText = `Status changed to: ${log.status_name} by ${log.name}`; // Include status and name
                // }

                if (log.status == null) {
                    statusText = log.name ?
                        `Comment: ${log.comments} by ${log.name}` :
                        `Comment: ${log.comments} by ${log.driver_name || 'Unknown Driver'}`;
                } else if (log.status !== null) {
                    statusText =
                        `Status changed to: ${log.status_name} by ${log.name || log.driver_name || 'Unknown Driver'}`;
                }

                return `
                <div class="col-12 mb-5">
                <div class="alert alert-primary alert-dismissible fade show" role="alert">
                <strong class="text-dark">${formattedDate} ${formattedTime}</strong>
                &nbsp;
                ${statusText}
                <button type="button" class="btn btn-danger btn-sm rounded-circle fa fa-xmark delete-btn" data-logs-id="${log.id}" data-toggle="modal" data-target="#logsdeleteModal"></button>
                </div>
                </div>`;
            }).join('');

            logsElement.innerHTML = html;
        }


        function updateInternalRemarksHistoryTable(response) {
            const remarksElement = document.getElementById('remarks');

            if (!remarksElement || !response || !response.remarks || !Array.isArray(response.remarks)) {
                console.error("Invalid response or remarks data.");
                return;
            }

            const html = response.remarks.map((remarks) => {
                const updatedDate = new Date(remarks.updated_at);
                const formattedDate = updatedDate.toLocaleDateString();
                const formattedTime = updatedDate.toLocaleTimeString();

                return `
                    <div class="col-12 mb-5">
                    <div class="alert alert-primary alert-dismissible fade show" role="alert">
                    <strong class="text-dark">${formattedDate} ${formattedTime}</strong>
                    &nbsp;
                    remarks : <strong class="text-dark">${remarks.remarks}</strong> by ${remarks.name}
                    <button type="button" class="btn btn-danger btn-sm rounded-circle fa fa-xmark delete-btn" data-logs-id="${remarks.id}" data-toggle="modal" data-target="#logsdeleteModal"></button>
                    </div>
                    </div>`;
            }).join('');

            remarksElement.innerHTML = html;
        }

        // Define the comments function
        function comments() {
            var id = $('.s-id').val();
            $.ajax({
                headers: {
                    'X-CSRF-TOKEN': "{{ csrf_token() }}",
                },
                url: "{{ route('admin.shipment.get_comments') }}",
                type: "POST",
                data: {
                    id: id,
                },
                success: function(response) {
                    // console.log(response);
                    var html = response.map((log) => {
                        const updatedDate = new Date(log.updated_at);
                        const formattedDate = updatedDate.toLocaleDateString();
                        const formattedTime = updatedDate.toLocaleTimeString();

                        let statusText = "";

                        // if (log.status == null) {
                        //     statusText = `Comment: ${log.comments} by ${log.name}`;
                        // } else if (log.status !== null) {
                        //     statusText = `Status changed to: ${log.status_name} by ${log.name}`;
                        // }

                        if (log.status == null) {
                            statusText = log.name ?
                                `Comment: ${log.comments} by ${log.name}` :
                                `Comment: ${log.comments} by ${log.driver_name || 'Unknown Driver'}`;
                        } else if (log.status !== null) {
                            statusText =
                                `Status changed to: ${log.status_name} by ${log.name || log.driver_name || 'Unknown Driver'}`;
                        }

                        return `
                        <div class="col-12 mb-5">
                            <div class="alert alert-primary alert-dismissible fade show" role="alert">
                                <strong class="text-dark">${formattedDate} ${formattedTime}</strong>
                                &nbsp;
                                ${statusText}
                                <button type="button" class="btn btn-danger btn-sm rounded-circle fa fa-xmark delete-btn" data-logs-id="${log.id}" data-toggle="modal" data-target="#logsdeleteModal"></button>
                            </div>
                        </div>`;
                    }).join('');

                    var logsElement = document.getElementById('logs');
                    logsElement.innerHTML = html;
                }
            });
        }

        // Add comments on form submission
        $("#TrackingHistoryComment").on("submit", function(e) {
            e.preventDefault();

            var _token = '{{ csrf_token() }}';
            var id = $(".s-id").val();
            var comments = $("#t-comments").val();

            var formData = new FormData();
            formData.append('_token', _token);
            formData.append('id', id);
            formData.append('comments', comments);

            $.ajax({
                type: "POST",
                url: "{{ route('admin.shipment.tracking_comments') }}",
                data: formData,
                processData: false,
                contentType: false,
                success: function(response) {
                    alert('Comment Added Successfully');
                    // Call the comments function to refresh logs
                },
                error: function(xhr, textStatus, errorThrown) {
                    alert('An error occurred. Please try again.'); // Alert for AJAX error
                }
            });
            callCommentsWithInterval();
        });


        // Define the comments function
        function remarks() {
            var id = $('.s-id').val();
            $.ajax({
                headers: {
                    'X-CSRF-TOKEN': "{{ csrf_token() }}",
                },
                url: "{{ route('admin.shipment.get_remarks') }}",
                type: "POST",
                data: {
                    id: id,
                },
                success: function(response) {
                    // console.log(response);
                    var html = response.map((remarks) => {
                        const updatedDate = new Date(remarks.updated_at);
                        const formattedDate = updatedDate.toLocaleDateString();
                        const formattedTime = updatedDate.toLocaleTimeString();

                        return `
                        <div class="col-12 mb-5">
                    <div class="alert alert-primary alert-dismissible fade show" role="alert">
                    <strong class="text-dark">${formattedDate} ${formattedTime}</strong>
                    &nbsp;
                    remarks : <strong class="text-dark">${remarks.remarks}</strong> by ${remarks.name}
                    <button type="button" class="btn btn-danger btn-sm rounded-circle fa fa-xmark delete-btn" data-logs-id="${remarks.id}" data-toggle="modal" data-target="#logsdeleteModal"></button>
                    </div>
                    </div>`;
                    }).join('');

                    var remarksElement = document.getElementById('remarks');
                    remarksElement.innerHTML = html;
                }
            });
        }

        // Add remarks on form submission
        $("#InternalRemarksHistoryComment").on("submit", function(e) {
            e.preventDefault();

            var _token = '{{ csrf_token() }}';
            var id = $(".s-id").val();
            var remarks = $("#i-remarks").val();

            var formData = new FormData();
            formData.append('_token', _token);
            formData.append('id', id);
            formData.append('remarks', remarks);

            $.ajax({
                type: "POST",
                url: "{{ route('admin.shipment.tracking_remarks') }}",
                data: formData,
                processData: false,
                contentType: false,
                success: function(response) {
                    alert('Remarks Added Successfully');
                    // Call the comments function to refresh logs
                },
                error: function(xhr, textStatus, errorThrown) {
                    alert('An error occurred. Please try again.'); // Alert for AJAX error
                }
            });
            callremarksWithInterval();
        });

        $("#edit_button").on("click", function() {
            var id = $('#tracking_number').val();
            $.ajax({
                headers: {
                    'X-CSRF-TOKEN': "{{ csrf_token() }}",
                },
                url: "{{ route('admin.shipment.get_search') }}",
                type: "POST",
                data: {
                    id: id,
                },
                success: function(response) {
                    // console.log(response);
                    $('#editorder').modal('show'); // Show the modal
                    $('.u-id').val(response.id);
                    $('.u-reference_number').val(response.reference_number);
                    $('.u-barcode').val(response.barcode);
                    $('.u-status').val(response.status_name);
                    $('.u-status_id').val(response.status);
                    $('.u-order_date').val(response.order_date);
                    $('.u-shipper_code').val(response.shipper_code);
                    $('.u-shippers_contact').val(response.shipper_contact);
                    $('.u-reciver_name').val(response.reciver_name);
                    $('.u-shipper_country').val(response.shipper_country);
                    $('.u-shipper_city').val(response.shipper_city);
                    $('.u-shipper_area').val(response.shipper_area);
                    $('.u-shipper_address').val(response.shipper_address);
                    $('.u-reciver_country').val(response.country);
                    $('.u-reciver_city').val(response.city);
                    $('.u-reciver_area').val(response.area);
                    $('.u-reciver_address').val(response.street_address);
                    $('.u-mobile_1').val(response.mobile_1);
                    $('.u-driver_id').val(response.driver_id);
                    $('.u-employee_mobile').val(response.employee_mobile);
                    $('.u-driver_code').val(response.driver_code);
                    $('.u-cod').val(response.cod);
                    $('.u-instruction').val(response.instruction);
                    $('.u-description').val(response.description);
                    $('.u-shipper_name').val(response.shipper_name);
                    $('.u-s_code').val(response.s_code);
                    $('.u-service_charges').val(response.service_charges);
                    $('.u-contact_office_1').val(response.contact_office_1);
                    $('.u-mobile_2').val(response.mobile_2);
                    $('.u-no_of_peices').val(response.no_of_peices);
                    $('.u-service_type').val(response.service_type);
                    $('.u-delivery_code').val(response.delivery_code);
                    // $('.u-details_of_products').val(response.details_of_products);
                    // $('.u-cod_peice').val(response.cod_peice);

                    var detailsArray = response.details_of_products.split(',').map(item => item.trim());
                    var codArray = response.cod_peice.split(',').map(item => item.trim());

                    $('.u-details_of_products').each(function(index, element) {
                        $(element).val(detailsArray[index]);
                    });

                    $('.u-cod_peice').each(function(index, element) {
                        $(element).val(codArray[index]);
                    });

                }
            });
        });

        // Close the modal when the close button is clicked
        $('.close').click(function() {
            $('#editorder').modal('hide'); // Hide the modal
        });

        $("#attached_file_button").on("click", function() {
            var id = $('#tracking_number').val();
            $.ajax({
                headers: {
                    'X-CSRF-TOKEN': "{{ csrf_token() }}",
                },
                url: "{{ route('admin.shipment.get_search') }}",
                type: "POST",
                data: {
                    id: id,
                },
                success: function(response) {
                    // console.log(response);
                    $('#attached_file').modal('show'); // Show the modal
                    $('#a-id').val(response.id);
                }
            });
        });

        // Close the modal when the close button is clicked
        $('.attached_close').click(function() {
            $('#attached_file').modal('hide'); // Hide the modal
        });

        $("#change_location_button").on("click", function() {
            var id = $('#tracking_number').val();
            $.ajax({
                headers: {
                    'X-CSRF-TOKEN': "{{ csrf_token() }}",
                },
                url: "{{ route('admin.shipment.get_search') }}",
                type: "POST",
                data: {
                    id: id,
                },
                success: function(response) {
                    // console.log(response);
                    $('#changelocation').modal('show'); // Show the modal
                    $('#c-id').val(response.id);
                }
            });
        });

        // Close the modal when the close button is clicked
        $('.location_close').click(function() {
            $('#changelocation').modal('hide'); // Hide the modal
        });

        function showImage(imageUrl) {
            var baseUrl = "http://127.0.0.1:8000/shippment_files_images/";
            var imageUrl = baseUrl + imageUrl;
            window.open(imageUrl, "_blank");
        }

        $(document).on('click', '.delete-btn', function() {
            var logsId = $(this).data('logs-id');
            var confirmDeleteBtn = $('#confirmDeleteBtn');

            // Set up the click event for the confirm delete button within the modal
            confirmDeleteBtn.off('click').on('click', function() {
                var token = $('meta[name="csrf-token"]').attr('content');

                $.ajax({
                    url: '/admin/shipment/logs/delete/' + logsId,
                    type: 'DELETE',
                    data: {
                        _token: token,
                        id: logsId,
                    },
                    success: function(data) {
                        if (data) {
                            alert('Log Deleted Successfully');
                            $('#logsdeleteModal').modal('hide'); // Use Bootstrap's hide method
                            // No need to remove modal backdrop manually
                            $(`.delete-btn[data-logs-id="${logsId}"]`).closest('.col-12')
                                .remove();
                        }
                    },
                    error: function(data, textStatus, errorThrown) {
                        alert('Log Deleted Unsuccessfully');
                    },
                });
            });

            // Show the modal
            $('#logsdeleteModal').modal('show');
        });

        $('#logsdeleteModal').on('hidden.bs.modal', function() {
            console.log('Modal hidden event triggered.');
            $('.modal-backdrop').remove();
        });

        function callCommentsWithInterval() {
            comments(); // Call the function immediately
            // setInterval(comments, 5000); // Call the function every 5000 milliseconds (5 seconds)
        }

        function callremarksWithInterval() {
            remarks(); // Call the function immediately
            // setInterval(comments, 5000); // Call the function every 5000 milliseconds (5 seconds)
        }
    </script>
@endsection

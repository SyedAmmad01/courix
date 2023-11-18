{{-- Extends layout --}}
@extends('layouts.admin')
@section('page_title', 'All Shipment Audit')
{{-- Content --}}
@section('content')
    <div class="card-body">
        <div class="row p-4 bg-light" style="margin-left: 0.1rem; margin-right: 0.1rem;">
            <div class="card card-custom example example-compact w-100">
                <h2 class="card-title ml-4">
                    Shipment Audits
                </h2>
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-12">
                            <div class="row">
                                <div class="col-3">
                                    <div class="form-group">
                                        <label class="text-lg-right col-form-label">Tracking No / Barcode<span
                                                class="text-danger">*</span></label>
                                        <div class="input-group m-b-10">
                                            <div class="input-group-prepend"><span class="input-group-text">
                                                    <i class="fas fa-lg fa-fw fa-barcode"></i></span></div>
                                            <input type="text" id="search" placeholder="123..." class="form-control">
                                        </div>
                                    </div>
                                </div>

                                <div class="col-9" style="margin-top: 45px;">
                                    <div class="form-group">
                                        <button type="button" class="btn btn-primary btn-sm"
                                            onclick="get_data()">Search</button>
                                    </div>
                                </div>

                            </div>

                            <hr>

                            <div class="row">
                                <div class="col-12">
                                    <div class="body">
                                        <div class="table-responsive check-all-parent">
                                            <table class="table table-hover m-b-0 c_list" id="myDataTable">
                                                <thead>
                                                    <tr>
                                                        <th> Tracking No. </th>
                                                        <th> Recipent Name </th>
                                                        <th> Description </th>
                                                        <th> Cost of Goods </th>
                                                        <th> Shipment Date </th>
                                                        <th> Area Name </th>
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
@endsection

<!-- View Shipments Modal -->
@include('admin.modal.shipment_view')
<!-- View Shipments Modal  -->

{{-- Scripts Section --}}
@section('page-scripts')
    <script src="{{ asset('js/pages/widgets.js') }}" type="text/javascript"></script>
    <script>
        $(document).ready(function() {
            $('#myDataTable').DataTable();
        });

        function get_data() {
            var id = $('#search').val();
            // var name = $('#search').val();
            // alert(id);
            $.ajax({
                headers: {
                    'X-CSRF-TOKEN': "{{ csrf_token() }}",
                },
                url: "{{ route('admin.shipment.get_tracking') }}",
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
                        html += `<tr>
                                <td>${item.reference_number}</td>
                                <td>${item.reciver_name}</td>
                                <td>${item.description}</td>
                                <td>${item.cod !== null ? `${item.cod}.00` : ''}</td>
                                <td>${item.order_date}</td>
                                <td>${item.area_name}</td>
                                <td><a id="show-shipment" value="${item.id}" data-url="/admin/shipment/shipment_view/${item.id}" type="button" href="javascript:void(0);" class="btn btn-warning btn-xs fa fa-user margin-left-5" title="View User Profile"></td>
                            </tr>`;
                    });

                    var previewElement = document.getElementById('preview');
                    if (previewElement) {
                        previewElement.innerHTML = html;
                    }
                }
            });

        }


        $('body').on('click', '#show-shipment', function() {
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        var shipmentURL = $(this).data('url');
        $.get(shipmentURL, function(data) {
            // Assuming that your data object contains the relevant shipment information.
            $('#ShipmentViewModal').modal('show');

            // console.log(data);
            // Populate the modal fields with data

            var updated_atNew = data.changedColumns.updated_at && data.changedColumns.updated_at["new"];
            var updated_atOld = data.changedColumns.updated_at && data.changedColumns.updated_at["old"];

            var areaNew = data.changedColumns.area && data.changedColumns.area["new"];
            var areaOld = data.changedColumns.area && data.changedColumns.area["old"];

            var shipperNew = data.changedColumns.shipper_name && data.changedColumns.shipper_name["new"];
            var shipperOld = data.changedColumns.shipper_name && data.changedColumns.shipper_name["old"];

            var statusNew = data.changedColumns.status && data.changedColumns.status["new"];
            var statusOld = data.changedColumns.status && data.changedColumns.status["old"];


            // Function to format a date-time string

            // Original date-time string

            // Remove 'T' and milliseconds part
            const formattedDateTimeString = updated_atNew.replace('T', ' ').split('.')[0];

            const formattedDateTimeOldString = updated_atOld.replace('T', ' ').split('.')[0];
            // console.log(formattedDateTimeString); // Output: "2023-10-25 09:40:56"



            const sCreatedBy = data.shipmentLogs.created_at.replace('T', ' ').split('.')[0];
            const sUpdatedBy = data.shipmentLogs.updated_at.replace('T', ' ').split('.')[0];


            if (formattedDateTimeString !== undefined) {
            $('#s-new-time-date').html(formattedDateTimeString);
            } else {
            // Handle the case where the required data is missing
            $('#s-new-time-date').text('');
            }

            if (formattedDateTimeOldString !== undefined) {
            $('#s-old-time-date').html(formattedDateTimeOldString);
            } else {
            // Handle the case where the required data is missing
            $('#s-old-time-date').text('');
            }

            if (areaNew !== undefined) {
            $('#s-new-area').html(areaNew);
            } else {
            // Handle the case where the required data is missing
            $('#s-new-area').text('');
            }

            if (areaOld !== undefined) {
            $('#s-old-area').html(areaOld);
            } else {
            // Handle the case where the required data is missing
            $('#s-old-area').text('');
            }

            if (shipperNew !== undefined) {
            $('#s-new-shipper_name').html(shipperNew);
            } else {
            // Handle the case where the required data is missing
            $('#s-new-shipper_name').text('');
            }

            if (shipperOld !== undefined) {
            $('#s-old-shipper_name').html(shipperOld);
            } else {
            // Handle the case where the required data is missing
            $('#s-old-shipper_name').text('');
            }

            if (statusNew !== undefined) {
            $('#s-new-status').html(statusNew);
            } else {
            // Handle the case where the required data is missing
            $('#s-new-status').text('');
            }

            if (statusOld !== undefined) {
            $('#s-old-status').html(statusOld);
            } else {
            // Handle the case where the required data is missing
            $('#s-old-status').text('');
            }

            $('#s-reciver-name').text(data.shipmentLogs.reciver_name);
            $('#s-service-charges').text(data.shipmentLogs.service_charges);
            $('#s-remarks').text(data.shipmentLogs.instruction);
            $('#s-cod').text(data.shipmentLogs.cod);
            $('#s-mobile').text(data.shipmentLogs.contact_office_1);
            $('#s-description').text(data.shipmentLogs.description);
            $('#s-area').text(data.shipmentLogs.area_name);
            $('#s-qty').text(data.shipmentLogs.no_of_peices);
            $('#s-driver-id').text(data.shipmentLogs.employee_name);
            $('#s-address').text(data.shipmentLogs.street_address + ' , ' + data.shipmentLogs.area_name + ' , ' + data.shipmentLogs.city_name + ' , ' + data.shipmentLogs.country_name);
            $('#s-created-by').text(sCreatedBy);
            $('#s-updated-by').text(sUpdatedBy);
        });
    });





    </script>
@endsection

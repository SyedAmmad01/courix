{{-- Extends layout --}}
@extends('layouts.admin')
@section('page_title', 'Update Status')
{{-- Content --}}
@section('content')
    <div class="card-body">
        <div class="row p-4 bg-light" style="margin-left: 0.1rem; margin-right: 0.1rem;">
            <div class="card card-custom example example-compact w-100">
                <h2 class="card-title ml-4">
                    Update Status
                </h2>
                <div class="row ml-2">
                    <div class="col-8">
                        <div class="form-group">
                            <div class="input-group">
                                <input type="text" id="search" name="search" placeholder="123.." class="form-control"
                                    style="border-radius:20px;" onblur="search_bar()">
                                &nbsp;
                                <button type="button" class="btn btn-primary btn-sm" style="border-radius:20px;"><i
                                        class="fa fa-magnifying-glass"></i>Search</button>
                                <input type="hidden" id="id" name="id" class="form-control">
                                <input type="hidden" id="tracking_no" name="tracking_no" class="form-control">
                            </div>
                        </div>
                    </div>

                    <div class="col-4">
                        <div class="form-group">
                            <div class="input-group">
                                <div class="dropdown">
                                    <button class="btn btn-secondary" data-kt-menu-trigger="click"
                                        data-kt-menu-placement="bottom-end">Action
                                    </button>
                                    <!--begin::Menu 3-->
                                    <div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-800 menu-state-bg-light-secondary fw-bold w-200px py-3"
                                        data-kt-menu="true">
                                        <!--begin::Menu item-->
                                        <div class="menu-item px-3">
                                            <a href="javascript:void(0);" class="menu-link px-3"
                                                onclick="singleexportToExcel()">Export To Excel</a>
                                            <a href="javascript:void(0);" class="menu-link px-3">AWBZ Label</a>
                                            <a href="javascript:void(0);" class="menu-link px-3" data-toggle="modal"
                                                data-target="#single_batch_update" onclick="get()">Batch Update</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-12">
                            <div class="body">
                                <div class="table-responsive check-all-parent">
                                    <table class="table table-hover m-b-0 c_list" id="myDataTable">
                                        <thead>
                                            <tr>
                                                <th> Tracking No </th>
                                                <th> ShipperRef </th>
                                                <th> ShipperName </th>
                                                <th> Driver Name </th>
                                                <th> LocationTo </th>
                                                <th> ReceiverName </th>
                                                <th> CostOfGoods </th>
                                                <th> Delivery Date </th>
                                                <th> STATUS </th>
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

    <!-- Single Order Update Modal -->
    @include('admin.modal.single_batch_update')
    <!-- Single Order Update Modal -->

@endsection
{{-- Scripts Section --}}
@section('page-scripts')
    <script src="{{ asset('js/pages/widgets.js') }}" type="text/javascript"></script>
    <script>
        $(document).ready(function() {
            $('#myDataTable').DataTable();
        });

        function search_bar() {
            var id = $('#search').val();
            // var name = $('#search').val();
            // alert(id);
            $.ajax({
                headers: {
                    'X-CSRF-TOKEN': "{{ csrf_token() }}",
                },
                url: "{{ route('admin.shipment.update_status_search_bar') }}",
                type: "POST",
                data: {
                    id: id,
                    // name: name,
                },
                success: function(response) {
                    if (response.id == null) {
                        alert("Data is not found.");
                        $("#preview").empty();
                        return;
                    } else {
                        // console.log(response.reference_number);
                        var responseData = response;
                        var html = "";
                        html += `<tr>
                                <td>${responseData.awb_number}</td>
                                <td>${responseData.reference_number}</td>
                                <td>${responseData.shipper_name}</td>
                                <td>${responseData.employee_name}</td>
                                <td>${responseData.street_address}</td>
                                <td>${responseData.reciver_name}</td>
                                <td>${responseData.cod}.00</td>
                                <td>${responseData.order_date}</td>
                                <td>${responseData.status_name}</td>
                            </tr>`;

                        var previewElement = document.getElementById('preview');
                        if (previewElement) {
                            previewElement.innerHTML = html;
                        }
                        var inputField = document.getElementById("id");
                        inputField.value = response.id;

                        var inputField1 = document.getElementById("tracking_no");
                        inputField1.value = response.reference_number;
                    }

                }
            });
        }

        function get() {
            var id = $('#id').val();
            var tracking_no = $('#tracking_no').val();
            $('#u_id').val(id); // Set the value in the modal input
            $('#u_tracking').val(tracking_no); // Set the value in the modal input
        }

        function singleexportToExcel() {
            var id = $('#id').val();
            // Send an AJAX request to get data
            $.ajax({
                headers: {
                    'X-CSRF-TOKEN': "{{ csrf_token() }}",
                },
                url: "{{ route('admin.shipment.singleexportToExcel') }}",
                type: "POST",
                data: {
                    id: id,
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
    </script>
@endsection

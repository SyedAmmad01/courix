{{-- Extends layout --}}
@extends('layouts.admin')
@section('page_title', 'Place Order By Uploading')
{{-- Content --}}
@section('content')
    {{-- @dd($processedData); --}}
    <div class="card-body">
        <div class="row p-4 bg-light" style="margin-left: 0.1rem; margin-right: 0.1rem;">
            <div class="card card-custom example example-compact w-100">
                <h2 class="card-title">
                    Place Order By Uploading
                </h2>
                <div class="row">
                    <div class="col-10">
                        <div class="form-group">
                            <label class="text-lg-right col-form-label">Shipper Code<span class="text-danger">*</span></label>
                            <div class="input-group m-b-10">
                                <div class="input-group-prepend"><span class="input-group-text">
                                        <i class="fa fa-hashtag"></i></span></div>
                                <select class="form-control kt-select2 select2" id="shipper_code" name="shipper_code"
                                    style="width:80%;">
                                    <option value="" disabled selected>Please Select Shipper
                                        Code
                                    </option>
                                    @foreach ($fetch_shippers as $key)
                                        @if (old('shipper_code') == $key->id)
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


                    <div class="col-2" style="margin-top: 4%;">
                        <div class="form-group">
                            <a type="button" href="{{ route('admin.shipment.place_order') }}"
                                class="btn btn-primary btn-sm">Place Single Order</a>
                        </div>
                    </div>

                </div>

                <br>

                <div class="row">
                    <div class="col-6">
                        <div class="form-group">
                            <a type="button" href="javascript:void(0);" class="btn btn-primary btn-sm" data-toggle="modal"
                                data-target="#uploadshipmentsmodal">Import</a>
                            &nbsp;
                            <a type="button" href="javascript:void(0);" class="btn btn-link f-s-14" style="cursor:pointer"
                                onclick="download_sample_excel()"><i class="fa fa-download"></i>Download Sample</a>
                        </div>
                    </div>

                    <div class="col-3">
                    </div>

                    <div class="col-3 d-none" id="buttons">
                        <div class="form-group">
                            <a type="button" href="javascript:void(0);" class="btn btn-primary btn-sm"
                                onclick="get_data()">Confirm / PlaceOrders</a>
                            &nbsp;
                            <a type="button" href="javascript:void(0);" class="btn btn-danger btn-sm"
                                onclick="clearPreview()">Clear</a>
                        </div>
                    </div>
                </div>
                <hr>

                <div class="container-fluid">
                    <div class="row">
                        <div class="col-12">
                            <div class="body">
                                <div class="table-responsive check-all-parent">
                                    <table class="table table-hover m-b-0 c_list" id="myDataTable">
                                        <thead>
                                            <tr>
                                                <th> Service Type </th>
                                                <th> Recipient Name </th>
                                                <th> COD </th>
                                                <th> Mobile Number </th>
                                                <th> Shipper Ref </th>
                                                <th> Area Name </th>
                                                <th> Address/Country </th>
                                                <th> Instructions </th>
                                                <th> NOP </th>
                                                <th> Account Name </th>
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

    {{-- Add Modal --}}
    @include('admin.modal.upload_shipments')
    {{-- Add Modal --}}


@endsection

@section('page-scripts')
    <script src="{{ asset('js/pages/widgets.js') }}" type="text/javascript"></script>
    <script>
        $(document).ready(function() {
            $(".select2").select2();
            $('#myDataTable').DataTable();
        });

        function download_sample_excel() {
            // Send an AJAX request to get data
            $.ajax({
                headers: {
                    'X-CSRF-TOKEN': "{{ csrf_token() }}",
                },
                url: "{{ route('admin.shipment.download_sample_excel') }}",
                type: "POST",
                data: {
                    // id: selectedIDs,
                },
                xhrFields: {
                    responseType: 'blob' // This is important for handling binary data
                },
                success: function(response, status, xhr) {
                    const blob = response;
                    const fileName = 'sample-operation.xlsx';

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


        function get_data() {
            if (validateForm()) {
                const formData = prepareFormData();
                sendAjaxRequest(formData);
            }
        }

        function validateForm() {
            const shipperCode = $("#shipper_code").val();
            const fileInput = $("#selected_file")[0].files[0];

            if (!shipperCode) {
                showError("Please select shipper.");
                return false;
            }

            if (!fileInput) {
                showError("Please select a valid Excel file.");
                return false;
            }

            return true;
        }

        function prepareFormData() {
            const formData = new FormData();
            formData.append("_token", $('meta[name="csrf-token"]').attr("content"));
            formData.append("selected_file", $("#selected_file")[0].files[0]);
            formData.append("shipperCode", $("#shipper_code").val());
            return formData;
        }

        function sendAjaxRequest(formData) {
            $.ajax({
                type: "POST",
                url: "{{ route('admin.shipment.save_shipments') }}",
                data: formData,
                processData: false,
                contentType: false,
                success: function(response) {
                    handleSuccess(response);
                    alert("Data Added Successfully");
                    clearPreview();
                },
                error: function(xhr, textStatus, errorThrown) {
                    handleError("An error occurred: " + errorThrown);
                },
            });
        }

        function clearPreview() {
            $("#preview").html('');
        }

        function showError(message) {
            // Implement your error handling logic here
        }

        function handleSuccess(response) {
            // Implement your success handling logic here
        }

        function handleError(errorMessage) {
            // Implement your error handling logic here
        }
    </script>
@endsection

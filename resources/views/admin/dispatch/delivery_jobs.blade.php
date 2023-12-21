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

                            <form class="forms-sample" id="get_orders" novalidate>

                                <div class="row">
                                    <div class="col-4">
                                        <div class="form-group">
                                            <label class="text-lg-right col-form-label">From Date<span
                                                    class="text-danger">*</span></label>
                                            <div class="input-group m-b-10">
                                                <div class="input-group-prepend"><span class="input-group-text">
                                                        <i class="fas fa-lg fa-fw  fa-calendar-alt"></i></span></div>
                                                <input type="date" id="" name="" placeholder=""
                                                    class="form-control">
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
                                                <input type="date" id="" name="" placeholder=""
                                                    class="form-control">
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
                                                    name="driver" style="width:80%;">
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
                                                <select class="form-control" id="zones" name="zones" required>
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
                                                <select class="form-control kt-select2" id="area" name="area"
                                                    required>
                                                    <option value="" disabled selected>Please Select Area</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>



                                    <div class="col-4">
                                        <div class="form-group">
                                            <button type="button" class="btn btn-primary btn-sm hold"><i
                                                class="fa fa-spinner"></i>Load</button>
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
                                    <div class="col-7">
                                    </div>
                                    <div class="col-5" style="margin-top: 45px;">
                                        <div class="form-group">
                                            <button type="button" class="btn btn-danger btn-sm"><i
                                                    class="fa-solid fa-pen-to-square"></i>Update Job Code</button>
                                            <button type="button" class="btn btn-success btn-sm"><i
                                                    class="fa-solid fa-truck"></i>PDf Report</button>
                                            <button type="button" class="btn btn-primary btn-sm"><i
                                                    class="fa-solid fa-truck"></i>Excel Report</button>
                                        </div>
                                    </div>
                                </div>

                            </div>


                            <div class="row hidden" style="display:none;">
                                <div class="col-12" style="margin-top: 45px;">
                                    <div class="form-group">
                                        <input type="text" id="" name="" placeholder="Search"
                                            class="form-control ">
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
                                                <tbody>
                                                    <tr>
                                                        <td><input class="checkbox-tick" type="checkbox" name="checkbox">
                                                        </td>
                                                        <td></td>
                                                        <td></td>
                                                        <td></td>
                                                        <td></td>
                                                        <td></td>
                                                        <td></td>
                                                        <td></td>
                                                        <td><span style="display:flex;">
                                                                <a id="" href=""
                                                                    class="btn btn-primary  btn-sm fa fa-edit"></a>
                                                                &nbsp;
                                                                <a id="" href=""
                                                                    class="btn btn-danger   btn-sm fa fa-trash"></a></span>
                                                        </td>
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
        </div>
    </div>
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

        function get_data() {
            var created_from_date = $('#created_from_date').val();
            var created_to_date = $('#created_to_date').val();
            var id = $('#cities').val();
            var shipper_id = $('#shipper').val();
            $.ajax({
                headers: {
                    'X-CSRF-TOKEN': "{{ csrf_token() }}",
                },
                url: "{{ route('admin.shipment.get_orders') }}",
                type: "POST",
                data: {
                    created_from_date: created_from_date,
                    created_to_date: created_to_date,
                    id: id,
                    shipper_id: shipper_id,
                },
                success: function(response) {
                    // console.log(response);
                    var responseData = response;
                    var html = "";

                    responseData.forEach((item) => {
                        html += `<tr>
                                <td><input type="checkbox"  class="checkbox" value="${item.id}" name="checkbox[]"></td>
                                <td><a href="javascript:void(0);" id="show-employee" data-toggle="modal" data-target="${item.id ? '{{ route('admin.shipment.get_edit_orders', ['id' => "' + item.id + '"]) }}' : ''}  onclick="comments(${item.id})">${item.tracking_number}
                                    <br>
                                    ${item.awb_number}
                                    <br>
                                    ${item.reference_number}
                                    </a></td>
                                <td></td>
                                <td>${item.shipper_name}</td>
                                <td>${item.driver_id === null
                                ? '<span></span>'
                                : `<span>${item.employee_name}</span>&nbsp;<span>${item.employee_mobile}</span>`
                                }</td>
                                <td>${item.city_name}</td>
                                <td>${item.reciver_name}
                                <span>${item.mobile_1}</span>
                                </td>
                                <td>${item.instruction}</td>
                                <td></td>
                                <td>${item.account_name}</td>
                                <td>${item.service_charges !== null ? `${item.service_charges}.00` : ''}</td>
                                <td></td>
                                <td>${item.order_date}</td>
                                <td>${item.delivery_attempt}</td>
                                <td>${item.status_name}</td>
                                <td></td>
                                <td></td>
                                <td></td>
                            </tr>`;
                    });

                    var previewElement = document.getElementById('preview');
                    if (previewElement) {
                        previewElement.innerHTML = html;
                    }
                }
            });

        }
    </script>
@endsection

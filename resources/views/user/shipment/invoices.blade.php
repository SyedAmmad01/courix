@extends('layouts.front')
@section('page_title', 'Invoices Page')
{{-- Content --}}
@section('content')
    <style>
        .nav.nav-tabs .nav-item {
            width: 14rem;
        }

        /* width */
        /* ::-webkit-scrollbar {
                                                                                    width: 5px;

                                                                                } */

        /* Track */
        /* ::-webkit-scrollbar-track {
                                                                                    box-shadow: inset 0 0 5px grey;
                                                                                    border-radius: 10px;

                                                                                } */

        /* Handle */
        /* ::-webkit-scrollbar-thumb {
                                                                                    background: #f0c497;
                                                                                    border-radius: 10px;


                                                                                } */

        /* Handle on hover */
        /* ::-webkit-scrollbar-thumb:hover {
                                                                                    background: #f0c497;

                                                                                } */

        .btn-default {
            color: #212529;
            background-color: #fff;
            border-color: #d5d5d5;
            -webkit-box-shadow: 0;
            box-shadow: 0;
        }

        .nav-tabs .nav-link {
            color: white;
        }

        .nav-tabs .nav-link.active {
            background-color: #f0c497;
            color: black;
        }

        .nav-tabs .nav-link.active :hover {
            color: black;
        }

        .nav {
            flex-wrap: nowrap !important;
        }

        .badge {
            font-size: 75%;
            font-weight: 600;
            display: inline-block;
            min-width: 10px;
            padding: 3px 7px;
            color: black;
            text-align: center;
            white-space: nowrap;
            vertical-align: middle;
            background-color: white;
            -webkit-border-radius: 12px;
            border-radius: 12px;
        }
    </style>

    <div class="card-body">
        <div class="row p-4 bg-light" style="margin-left: 0.1rem; margin-right: 0.1rem;">
            <div class="card card-custom example example-compact w-100">
                <div class="row ml-2">
                    <div class="col-8">
                        <div class="form-group">
                            <div class="input-group">
                                <input type="text" id="" name="" placeholder="Search" class="form-control">
                                <div class="input-group-append">
                                    {{-- <div><button class="hold">Click me!</button></div> --}}
                                    <button class="btn btn-secondary hold" type="button">
                                        <i class="fas fa-lg fa-filter"></i>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-4">
                        <div class="form-group">
                            <div class="input-group">
                                <div class="dropdown">
                                    <button class="btn btn-secondary dropdown-toggle btn-sm mt-1" type="button"
                                        id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true"
                                        aria-expanded="false">
                                        Action
                                    </button>
                                    <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                        <a class="dropdown-item" href="#">Action</a>
                                        <a class="dropdown-item" href="#">Another action</a>
                                        <a class="dropdown-item" href="#">Something else here</a>
                                    </div>
                                    &nbsp;
                                    <button type="button" class="btn btn-secondary btn-sm mt-1">Manifest</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="container-fluid mt-5 hidden" style="display:none;">
                    <div class="row">
                        <div class="col-3">
                            <div class="form-group">
                                <label class="text-lg-right col-form-label">Created From Date<span
                                        class="text-danger">*</span></label>
                                <div class="input-group m-b-10">
                                    <input type="date" id="" name="" class="form-control">
                                </div>
                            </div>

                        </div>

                        <div class="col-3">
                            <div class="form-group">
                                <label class="text-lg-right col-form-label">Created To Date<span
                                        class="text-danger">*</span></label>
                                <div class="input-group m-b-10">
                                    <input type="date" id="" name="" class="form-control">
                                </div>
                            </div>

                        </div>

                        <div class="col-3">
                            <div class="form-group">
                                <label class="text-lg-right col-form-label">Updated From<span
                                        class="text-danger">*</span></label>
                                <div class="input-group m-b-10">
                                    <input type="date" id="" name="" class="form-control">
                                </div>
                            </div>

                        </div>

                        <div class="col-3">
                            <div class="form-group">
                                <label class="text-lg-right col-form-label">Updated To<span
                                        class="text-danger">*</span></label>
                                <div class="input-group m-b-10">
                                    <input type="date" id="" name="" class="form-control">
                                </div>
                            </div>

                        </div>

                        <div class="col-3">
                            <div class="form-group">
                                <label class="text-lg-right col-form-label">Cities<span class="text-danger">*</span></label>
                                <div class="input-group m-b-10">
                                    {{-- <input type="text" id="" name="" class="form-control"> --}}
                                    <select class="form-control" id="" name="param">
                                        <option value="AD">Abu Dhabi</option>
                                        <option value="D">Dubai</option>
                                        <option value="S">Sharjah</option>
                                        <option value="A">Ajman</option>
                                        <option value="AA">Al Ain</option>
                                        <option value="F">Fujeriah</option>
                                        <option value="UAQ">Um Al Qwain</option>
                                        <option value="RAK">Ras Al Khaimah</option>
                                        <option value="OOSA">Out Of Service Area</option>
                                        <option value="AA50">Abu Dhabi 50</option>
                                        <option value="AA50">Al Ain 50</option>
                                    </select>
                                </div>
                            </div>

                        </div>

                        <div class="col-3">
                            <div class="form-group">
                                <label class="text-lg-right col-form-label">Status<span
                                        class="text-danger">*</span></label>
                                <div class="input-group m-b-10">
                                    {{-- <input type="text" id="" name="" class="form-control"> --}}
                                    <select class="form-control" id="" name="param">
                                        <option value="Order Placed">Order Placed
                                        </option>
                                        <option value="Received at Hubs">Received at Hubs</option>
                                        <option value="In OPS">In OPS</option>
                                        <option value="Out Of Delivery">Out Of Delivery
                                        </option>
                                        <option value="Delivered">Delivered</option>
                                        <option value="Replaced">Replaced</option>
                                        <option value="Out for delivery 1">Out for delivery 1
                                        </option>
                                        <option value="Out for delivery 2">Out for delivery 2</option>
                                        <option value="Out for delivery 3">Out for delivery 3</option>
                                        <option value="Cancelled">Cancelled</option>
                                        <option value="Location Changed">Location Changed
                                        </option>
                                        <option value="Future Delivery">Future Delivery</option>
                                        <option value="Mobile Not Answered">Mobile Not Answered</option>
                                        <option value="Shipment FWD to OPS">Shipment FWD to OPS</option>
                                        <option value="Wrong Item">Wrong Item</option>
                                        <option value="To Be Picked Up">To Be Picked Up</option>
                                        <option value="Lost">Lost</option>
                                        <option value="Damaged">Damaged</option>
                                        <option value="Returned to Origin">Returned to Origin
                                        </option>
                                        <option value="Return Attempt">Return Attempt</option>
                                        <option value="Customer Refused">Customer Refused</option>
                                        <option value="Send To CSA">Send To CSA</option>
                                        <option value="Recived in CSA">Recived in CSA</option>
                                        <option value="Collected">Collected</option>
                                        <option value="Shipper Cancelled">Shipper Cancelled</option>
                                        <option value="Customer not Available">Customer not Available</option>
                                        <option value="Mobile Switched Off">Mobile Switched Off</option>
                                        <option value="Cash Not Ready">Cash Not Ready</option>
                                        <option value="Shipment Return to Hub">Shipment Return to Hub</option>
                                        <option value="Received at CSA ">Received at CSA</option>
                                        <option value="FWD to CSA">FWD to CSA</option>
                                        <option value="CSA Calling">CSA Calling</option>
                                        <option value="Bad Address">Bad Address</option>
                                        <option value="Schedule for Tomorrow">Schedule for Tomorrow</option>
                                        <option value="Shipment on Hold">Shipment on Hold</option>
                                        <option value="Out Of Service Area">Out Of Service Area</option>
                                        <option value="Received at Hub - AUH">Received at Hub - AUH</option>
                                        <option value="Forwarded to final destination">Forwarded to final destination
                                        </option>
                                        <option value="Customer did not order">Customer did not order</option>
                                        <option value="Wrong Contact Number">Wrong Contact Number</option>
                                        <option value="Only Pm Delivery">Only Pm Delivery</option>
                                        <option value="Assigned to Courier">Assigned to Courier</option>
                                        <option value="In Transit">In Transit</option>
                                    </select>
                                </div>
                            </div>

                        </div>

                    </div>
                    <hr>

                    <div class="row text-left">
                        <div class="col-10">

                        </div>

                        <div class="col-2">
                            <button type="button" class="btn btn-danger btn-sm">Clear</button>
                            &nbsp;
                            <button type="button" class="btn btn-primary btn-sm"
                                style="background-color:#007aff;">Submit</button>
                        </div>
                    </div>

                </div>
            </div>
        </div>

    </div>

    <div class="card-body" style="margin-bottom: 200px;">
        <div class="row p-4 bg-light" style="margin-left: 0.1rem; margin-right: 0.1rem;">
            <div class="card card-custom example example-compact w-100">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-12">
                            <div class="body">
                                <div class="table-responsive check-all-parent">
                                    <table class="table table-hover m-b-0 c_list myDataTable">
                                        <thead>
                                            <tr>
                                                <th>
                                                    <input class="check-all" type="checkbox" name="checkbox">
                                                </th>
                                                <th> Invoice No </th>
                                                <th> City </th>
                                                <th> Invoice Date </th>
                                                <th> Amount </th>
                                                <th> Received </th>
                                                <th> Status </th>
                                                <th> Action </th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td><input class="checkbox-tick" type="checkbox" name="checkbox">
                                                </td>
                                                <td>011072023000002
                                                </td>
                                                <td>Ajman</td>
                                                <td>11-Jul-2023</td>
                                                <td>4499.00</td>
                                                <td>4499.00</td>
                                                <td>Paid</td>
                                                <td style="display: flex;">
                                                    <a href="#" class="btn btn-info" style="padding: 0.30rem 0.8rem; font-size: 0.75rem;"><i class="fas fa-print"></i></a>
                                                    &nbsp;
                                                    <a href="#" class="btn btn-warning" style="padding: 0.30rem 0.8rem; font-size: 0.75rem;"><i class="fa fa-file"></i></a>
                                                </td>
                                            </tr>

                                            <tr>
                                                <td><input class="checkbox-tick" type="checkbox" name="checkbox">
                                                </td>
                                                <td>011072023000002
                                                </td>
                                                <td>Ajman</td>
                                                <td>11-Jul-2023</td>
                                                <td>4499.00</td>
                                                <td>4499.00</td>
                                                <td>Paid</td>
                                                <td style="display: flex;">
                                                    <a href="#" class="btn btn-info" style="padding: 0.30rem 0.8rem; font-size: 0.75rem;"><i class="fas fa-print"></i></a>
                                                    &nbsp;
                                                    <a href="#" class="btn btn-warning" style="padding: 0.30rem 0.8rem; font-size: 0.75rem;"><i class="fa fa-file"></i></a>
                                                </td>
                                            </tr>

                                            <tr>
                                                <td><input class="checkbox-tick" type="checkbox" name="checkbox">
                                                </td>
                                                <td>011072023000002
                                                </td>
                                                <td>Ajman</td>
                                                <td>11-Jul-2023</td>
                                                <td>4499.00</td>
                                                <td>4499.00</td>
                                                <td>Paid</td>
                                                <td style="display: flex;">
                                                    <a href="#" class="btn btn-info" style="padding: 0.30rem 0.8rem; font-size: 0.75rem;"><i class="fas fa-print"></i></a>
                                                    &nbsp;
                                                    <a href="#" class="btn btn-warning" style="padding: 0.30rem 0.8rem; font-size: 0.75rem;"><i class="fa fa-file"></i></a>
                                                </td>
                                            </tr>


                                            <tr>
                                                <td><input class="checkbox-tick" type="checkbox" name="checkbox">
                                                </td>
                                                <td>011072023000002
                                                </td>
                                                <td>Ajman</td>
                                                <td>11-Jul-2023</td>
                                                <td>4499.00</td>
                                                <td>4499.00</td>
                                                <td>Paid</td>
                                                <td style="display: flex;">
                                                    <a href="#" class="btn btn-info" style="padding: 0.30rem 0.8rem; font-size: 0.75rem;"><i class="fas fa-print"></i></a>
                                                    &nbsp;
                                                    <a href="#" class="btn btn-warning" style="padding: 0.30rem 0.8rem; font-size: 0.75rem;"><i class="fa fa-file"></i></a>
                                                </td>
                                            </tr>


                                            <tr>
                                                <td><input class="checkbox-tick" type="checkbox" name="checkbox">
                                                </td>
                                                <td>011072023000002
                                                </td>
                                                <td>Ajman</td>
                                                <td>11-Jul-2023</td>
                                                <td>4499.00</td>
                                                <td>4499.00</td>
                                                <td>Paid</td>
                                                <td style="display: flex;">
                                                    <a href="#" class="btn btn-info" style="padding: 0.30rem 0.8rem; font-size: 0.75rem;"><i class="fas fa-print"></i></a>
                                                    &nbsp;
                                                    <a href="#" class="btn btn-warning" style="padding: 0.30rem 0.8rem; font-size: 0.75rem;"><i class="fa fa-file"></i></a>
                                                </td>
                                            </tr>


                                            <tr>
                                                <td><input class="checkbox-tick" type="checkbox" name="checkbox">
                                                </td>
                                                <td>011072023000002
                                                </td>
                                                <td>Ajman</td>
                                                <td>11-Jul-2023</td>
                                                <td>4499.00</td>
                                                <td>4499.00</td>
                                                <td>Paid</td>
                                                <td style="display: flex;">
                                                    <a href="#" class="btn btn-info" style="padding: 0.30rem 0.8rem; font-size: 0.75rem;"><i class="fas fa-print"></i></a>
                                                    &nbsp;
                                                    <a href="#" class="btn btn-warning" style="padding: 0.30rem 0.8rem; font-size: 0.75rem;"><i class="fa fa-file"></i></a>
                                                </td>
                                            </tr>


                                            <tr>
                                                <td><input class="checkbox-tick" type="checkbox" name="checkbox">
                                                </td>
                                                <td>011072023000002
                                                </td>
                                                <td>Ajman</td>
                                                <td>11-Jul-2023</td>
                                                <td>4499.00</td>
                                                <td>4499.00</td>
                                                <td>Paid</td>
                                                <td style="display: flex;">
                                                    <a href="#" class="btn btn-info" style="padding: 0.30rem 0.8rem; font-size: 0.75rem;"><i class="fas fa-print"></i></a>
                                                    &nbsp;
                                                    <a href="#" class="btn btn-warning" style="padding: 0.30rem 0.8rem; font-size: 0.75rem;"><i class="fa fa-file"></i></a>
                                                </td>
                                            </tr>



                                            <tr>
                                                <td><input class="checkbox-tick" type="checkbox" name="checkbox">
                                                </td>
                                                <td>011072023000002
                                                </td>
                                                <td>Ajman</td>
                                                <td>11-Jul-2023</td>
                                                <td>4499.00</td>
                                                <td>4499.00</td>
                                                <td>Paid</td>
                                                <td style="display: flex;">
                                                    <a href="#" class="btn btn-info" style="padding: 0.30rem 0.8rem; font-size: 0.75rem;"><i class="fas fa-print"></i></a>
                                                    &nbsp;
                                                    <a href="#" class="btn btn-warning" style="padding: 0.30rem 0.8rem; font-size: 0.75rem;"><i class="fa fa-file"></i></a>
                                                </td>
                                            </tr>


                                            <tr>
                                                <td><input class="checkbox-tick" type="checkbox" name="checkbox">
                                                </td>
                                                <td>011072023000002
                                                </td>
                                                <td>Ajman</td>
                                                <td>11-Jul-2023</td>
                                                <td>4499.00</td>
                                                <td>4499.00</td>
                                                <td>Paid</td>
                                                <td style="display: flex;">
                                                    <a href="#" class="btn btn-info" style="padding: 0.30rem 0.8rem; font-size: 0.75rem;"><i class="fas fa-print"></i></a>
                                                    &nbsp;
                                                    <a href="#" class="btn btn-warning" style="padding: 0.30rem 0.8rem; font-size: 0.75rem;"><i class="fa fa-file"></i></a>
                                                </td>
                                            </tr>


                                            <tr>
                                                <td><input class="checkbox-tick" type="checkbox" name="checkbox">
                                                </td>
                                                <td>011072023000002
                                                </td>
                                                <td>Ajman</td>
                                                <td>11-Jul-2023</td>
                                                <td>4499.00</td>
                                                <td>4499.00</td>
                                                <td>Paid</td>
                                                <td style="display: flex;">
                                                    <a href="#" class="btn btn-info" style="padding: 0.30rem 0.8rem; font-size: 0.75rem;"><i class="fas fa-print"></i></a>
                                                    &nbsp;
                                                    <a href="#" class="btn btn-warning" style="padding: 0.30rem 0.8rem; font-size: 0.75rem;"><i class="fa fa-file"></i></a>
                                                </td>
                                            </tr>


                                            <tr>
                                                <td><input class="checkbox-tick" type="checkbox" name="checkbox">
                                                </td>
                                                <td>011072023000002
                                                </td>
                                                <td>Ajman</td>
                                                <td>11-Jul-2023</td>
                                                <td>4499.00</td>
                                                <td>4499.00</td>
                                                <td>Paid</td>
                                                <td style="display: flex;">
                                                    <a href="#" class="btn btn-info" style="padding: 0.30rem 0.8rem; font-size: 0.75rem;"><i class="fas fa-print"></i></a>
                                                    &nbsp;
                                                    <a href="#" class="btn btn-warning" style="padding: 0.30rem 0.8rem; font-size: 0.75rem;"><i class="fa fa-file"></i></a>
                                                </td>
                                            </tr>


                                            <tr>
                                                <td><input class="checkbox-tick" type="checkbox" name="checkbox">
                                                </td>
                                                <td>011072023000002
                                                </td>
                                                <td>Ajman</td>
                                                <td>11-Jul-2023</td>
                                                <td>4499.00</td>
                                                <td>4499.00</td>
                                                <td>Paid</td>
                                                <td style="display: flex;">
                                                    <a href="#" class="btn btn-info" style="padding: 0.30rem 0.8rem; font-size: 0.75rem;"><i class="fas fa-print"></i></a>
                                                    &nbsp;
                                                    <a href="#" class="btn btn-warning" style="padding: 0.30rem 0.8rem; font-size: 0.75rem;"><i class="fa fa-file"></i></a>
                                                </td>
                                            </tr>


                                            <tr>
                                                <td><input class="checkbox-tick" type="checkbox" name="checkbox">
                                                </td>
                                                <td>011072023000002
                                                </td>
                                                <td>Ajman</td>
                                                <td>11-Jul-2023</td>
                                                <td>4499.00</td>
                                                <td>4499.00</td>
                                                <td>Paid</td>
                                                <td style="display: flex;">
                                                    <a href="#" class="btn btn-info" style="padding: 0.30rem 0.8rem; font-size: 0.75rem;"><i class="fas fa-print"></i></a>
                                                    &nbsp;
                                                    <a href="#" class="btn btn-warning" style="padding: 0.30rem 0.8rem; font-size: 0.75rem;"><i class="fa fa-file"></i></a>
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
    </script>
@endsection

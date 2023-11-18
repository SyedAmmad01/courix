{{-- Extends layout --}}
@extends('layouts.admin')
@section('page_title', 'Shipment Pickup Request')
{{-- Content --}}
@section('content')
<style>
    .nav.nav-tabs .nav-item {
        width: 14rem;
    }

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
                <h2 class="card-title ml-4">
                    Shipment Pickup Request
                </h2>
                <div class="row ml-2">
                    <div class="col-12">
                        <div class="form-group">
                            <div class="input-group">
                                <input type="text" id="" name="" placeholder="Search"
                                    class="form-control">
                                <div class="input-group-append">
                                    {{-- <div><button class="hold">Click me!</button></div> --}}
                                    <button class="btn btn-secondary hold" type="button">
                                        <i class="fas fa-lg fa-filter"></i>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
                <div class="container-fluid mt-5 hidden" style="display:none;">
                    <div class="row">
                        <div class="col-6">
                            <div class="heading text-center">
                                <h4>From<h4>
                            </div>
                            <div class="form-group">
                                <label class="text-lg-right col-form-label">PickUp Date<span
                                        class="text-danger">*</span></label>
                                <div class="input-group m-b-10">
                                    <input type="date" id="" name="" placeholder=""
                                        class="form-control">
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="text-lg-right col-form-label">PickUp Time<span
                                        class="text-danger">*</span></label>
                                <div class="input-group m-b-10">
                                    <input type="time" id="" name="" placeholder=""
                                        class="form-control">
                                </div>
                            </div>

                        </div>

                        <div class="col-6">
                            <div class="heading text-center">
                                <h4>To<h4>
                            </div>

                            <div class="form-group">
                                <label class="text-lg-right col-form-label">PickUp Date<span
                                        class="text-danger">*</span></label>
                                <div class="input-group m-b-10">
                                    <input type="date" id="" name="" placeholder=""
                                        class="form-control">
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="text-lg-right col-form-label">PickUp Time<span
                                        class="text-danger">*</span></label>
                                <div class="input-group m-b-10">
                                    <input type="time" id="" name="" placeholder=""
                                        class="form-control">

                                </div>
                            </div>


                        </div>

                        <div class="row mt-5">
                            <div class="col-10">
                                <div class="form-group">
                                </div>
                            </div>
                            <div class="col-2">
                                <div class="form-group">
                                    <button type="button" class="btn btn-danger btn-sm" style="">Clear</button>
                                    &nbsp;
                                    <button type="button" class="btn btn-primary btn-sm">Submit</button>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
                <div class="container-fluid mt-5">
                    <div class="row">
                        <div class="col-12">
                            <div class="card-body">
                                <!-- Tab links -->
                                <ul class="nav nav-tabs" role="tablist"
                                    style="background-color:#4d4d4d; border-radius:5px; overflow-x: scroll; overflow-y: scroll; display: -webkit-box;">
                                    {{-- border-radius:5px; height:4rem; font-size:9px; overflow-x: scroll; overflow-y: hidden;width: 100% --}}
                                    <li class="nav-item">
                                        <a class="nav-link active" data-toggle="tab" href="#tabs-1"
                                            role="tab"><strong>All</strong><span
                                                class="badge text-black">0</span></a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" data-toggle="tab" href="#tabs-2"
                                            role="tab"><strong>Unassigned</strong><span
                                                class="badge text-black">0</span></a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" data-toggle="tab" href="#tabs-3"
                                            role="tab"><strong>Assigned</strong><span
                                                class="badge text-black">0</span></a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" data-toggle="tab" href="#tabs-4"
                                            role="tab"><strong>Driver Received</strong><span
                                                class="badge text-black">0</span></a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" data-toggle="tab" href="#tabs-5"
                                            role="tab"><strong>Completed</strong><span
                                                class="badge text-black">0</span></a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" data-toggle="tab" href="#tabs-6"
                                            role="tab"><strong>Cancelled</strong><span
                                                class="badge text-black">0</span></a>
                                    </li>
                                </ul><!-- Tab panes -->
                                <div class="tab-content">
                                    <div class="tab-pane active" id="tabs-1" role="tabpanel">
                                        <br>
                                        <div class="container-fluid">
                                            <div class="row">
                                                <div class="col-12">
                                                    <div class="body">
                                                        <div class="table-responsive check-all-parent">
                                                            <table class="table table-hover m-b-0 c_list myDataTable">
                                                                <thead>
                                                                    <tr>
                                                                        <th> Tracking No Reference </th>
                                                                        <th> Shipper Code </th>
                                                                        <th> Shipper Name </th>
                                                                        <th> Sender Name </th>
                                                                        <th> Driver Code </th>
                                                                        <th> Driver Name </th>
                                                                        <th> Pickup Date </th>
                                                                        <th> Pickup Time </th>
                                                                        <th> Status </th>
                                                                        <th> Job Status </th>
                                                                        <th> Full Address </th>
                                                                        <th> Action </th>
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
                                    <div class="tab-pane" id="tabs-2" role="tabpanel">
                                        <br>
                                        <div class="container-fluid">
                                            <div class="row">
                                                <div class="col-12">
                                                    <div class="body">
                                                        <div class="table-responsive check-all-parent">
                                                            <table class="table table-hover m-b-0 c_list myDataTable">
                                                                <thead>
                                                                    <tr>
                                                                        <th> Tracking No Reference </th>
                                                                        <th> Shipper Code </th>
                                                                        <th> Shipper Name </th>
                                                                        <th> Sender Name </th>
                                                                        <th> Driver Code </th>
                                                                        <th> Driver Name </th>
                                                                        <th> Pickup Date </th>
                                                                        <th> Pickup Time </th>
                                                                        <th> Status </th>
                                                                        <th> Job Status </th>
                                                                        <th> Full Address </th>
                                                                        <th> Action </th>
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
                                    <div class="tab-pane" id="tabs-3" role="tabpanel">
                                        <br>
                                        <div class="container-fluid">
                                            <div class="row">
                                                <div class="col-12">
                                                    <div class="body">
                                                        <div class="table-responsive check-all-parent">
                                                            <table class="table table-hover m-b-0 c_list myDataTable">
                                                                <thead>
                                                                    <tr>
                                                                        <th> Tracking No Reference </th>
                                                                        <th> Shipper Code </th>
                                                                        <th> Shipper Name </th>
                                                                        <th> Sender Name </th>
                                                                        <th> Driver Code </th>
                                                                        <th> Driver Name </th>
                                                                        <th> Pickup Date </th>
                                                                        <th> Pickup Time </th>
                                                                        <th> Status </th>
                                                                        <th> Job Status </th>
                                                                        <th> Full Address </th>
                                                                        <th> Action </th>
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

                                    <div class="tab-pane" id="tabs-4" role="tabpanel">
                                        <br>
                                        <div class="container-fluid">
                                            <div class="row">
                                                <div class="col-12">
                                                    <div class="body">
                                                        <div class="table-responsive check-all-parent">
                                                            <table class="table table-hover m-b-0 c_list myDataTable">
                                                                <thead>
                                                                    <tr>
                                                                        <th> Tracking No Reference </th>
                                                                        <th> Shipper Code </th>
                                                                        <th> Shipper Name </th>
                                                                        <th> Sender Name </th>
                                                                        <th> Driver Code </th>
                                                                        <th> Driver Name </th>
                                                                        <th> Pickup Date </th>
                                                                        <th> Pickup Time </th>
                                                                        <th> Status </th>
                                                                        <th> Job Status </th>
                                                                        <th> Full Address </th>
                                                                        <th> Action </th>
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

                                    <div class="tab-pane" id="tabs-5" role="tabpanel">
                                        <br>
                                        <div class="container-fluid">
                                            <div class="row">
                                                <div class="col-12">
                                                    <div class="body">
                                                        <div class="table-responsive check-all-parent">
                                                            <table class="table table-hover m-b-0 c_list myDataTable">
                                                                <thead>
                                                                    <tr>
                                                                        <th> Tracking No Reference </th>
                                                                        <th> Shipper Code </th>
                                                                        <th> Shipper Name </th>
                                                                        <th> Sender Name </th>
                                                                        <th> Driver Code </th>
                                                                        <th> Driver Name </th>
                                                                        <th> Pickup Date </th>
                                                                        <th> Pickup Time </th>
                                                                        <th> Status </th>
                                                                        <th> Job Status </th>
                                                                        <th> Full Address </th>
                                                                        <th> Action </th>
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

                                    <div class="tab-pane" id="tabs-6" role="tabpanel">
                                        <br>
                                        <div class="container-fluid">
                                            <div class="row">
                                                <div class="col-12">
                                                    <div class="body">
                                                        <div class="table-responsive check-all-parent">
                                                            <table class="table table-hover m-b-0 c_list myDataTable">
                                                                <thead>
                                                                    <tr>
                                                                        <th> Tracking No Reference </th>
                                                                        <th> Shipper Code </th>
                                                                        <th> Shipper Name </th>
                                                                        <th> Sender Name </th>
                                                                        <th> Driver Code </th>
                                                                        <th> Driver Name </th>
                                                                        <th> Pickup Date </th>
                                                                        <th> Pickup Time </th>
                                                                        <th> Status </th>
                                                                        <th> Job Status </th>
                                                                        <th> Full Address </th>
                                                                        <th> Action </th>
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
                        </div>
                    </div>
                </div>
                <div class="container-fluid mt-5">
                    <div class="row">
                        <div class="col-12">
                            <div class="card-body">
                                <div class="heading">
                                    <h4><i class="fas fa-lg fa-fw fa-taxi text-dark"></i>&nbsp;Driver Location</h4>
                                </div>
                                <hr>
                                <div class="col-12">
                                    <!--Google map-->
                                    <div class="google_map_area mt-2 mb-2 ml-3 mr-2">
                                        <iframe class="map"
                                            src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d115579.9515049569!2d55.16953355544885!3d25.090356924905966!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3e5f4346e65f5365%3A0x6beb0d2d1c50af17!2sDubai%2C%20United%20Arab%20Emirates!5e0!3m2!1sen!2sus!4v1622504052093!5m2!1sen!2sus"
                                            width="900" height="600"
                                            style="border:0;" allowfullscreen=""
                                            loading="lazy"
                                            referrerpolicy="no-referrer-when-downgrade"></iframe>
                                    </div>
                                    <!--Google map-->
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

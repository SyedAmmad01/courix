<meta name="csrf-token" content="{{ csrf_token() }}" />
<script src="https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.min.js"></script>
<script src="https://momentjs.com/downloads/moment.js"></script>
<link href="{{ asset('css/allshipment.css') }}" rel="stylesheet" id="bootstrap-css">
<style>
    .modal-body {
        font-weight: 700;
    }
</style>
<div class="modal fade bd-example-modal-xl" id="allshipment" tabindex="-1" aria-labelledby="myLargeModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-body text-light"
                style="background-image: linear-gradient(180deg, #4d4d4d 50%, #fff 50%); height:50%;">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-12">
                            <div class="row">
                                <div class="col-3">
                                    <div class="tracking-info">
                                        <span>TRACKING :</span>
                                        <span id="o-tracking_number"></span>
                                        <span id="copy" class="fa fa-copy pl-1 pointer"
                                            onclick="JSCommon.CopyToClipboard('#o-reference_number')"></span>
                                        <br>
                                        <span>Shipper Ref :</span>
                                        <span id="o-awb_number"></span>
                                        <span id="BarCode"></span>
                                    </div>
                                </div>

                                <div class="col-3">
                                    <div class="row">
                                        <div class="col-sm-2 text-center">
                                            <div class="item-icon tag-5">
                                                <i class="fa fa-lg fa-plus-circle"></i>
                                            </div>
                                        </div>
                                        <div class="col-sm-10 item-detail">
                                            <div class="item-detail">
                                                <span class="info-label">In Scan:</span>
                                                <span id="o-created_at"></span>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-3">
                                    <div class="row">
                                        <div class="col-sm-2 text-center">
                                            <div class="item-icon tag-5">
                                                <i class="fa fa-lg fa-arrow-circle-up"></i>
                                            </div>
                                        </div>
                                        <div class="col-sm-10 item-detail">
                                            <div class="item-detail">
                                                <span class="info-label">Airway Created On:</span>
                                                <span id="o-airway_created_at"></span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-9"></div>

                                <div class="col-3">
                                    <div class="row justify-content-end pr-3">
                                        <div class="col-sm-10 pr-0">
                                            <div class="customer-details text-right">
                                                <span class="customer-label">COURIER COMPANY/DRIVER</span>
                                                <br>
                                                <span class="driver-name text-uppercase" id="o-driver_code"></span>
                                            </div>
                                        </div>
                                        <div class="col-sm-2 text-center">
                                            <div class="box-icon-for-Model tag-2-for-Model bg-color text-uppercase">
                                                FE
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>


                            <div class="row">
                                <div class="col-6">
                                </div>

                                <div class="col-6 mt-5">
                                    <div class="row">
                                        <div class="col-sm-4">
                                        </div>
                                        <div class="col-sm-4">
                                            <form action="{{route('admin.shipment.operation_print_airways')}}" method="POST" enctype="multipart/form-data" class="d-inline" id="exportForm">
                                                @csrf
                                                <div class="form-group">
                                                    <div class="input-group">
                                                        <div class="dropdown">
                                                            <input type="hidden" id="id" name="id" class="s-id">
                                                            <select class="form-select btn-lg"
                                                                style="background-color:#4d4d4d; color:#fff;" name="pab_options" onchange="submitForm()">
                                                                <option selected disabled>AWBZ Labels</option>
                                                                <option value="1" class="menu-item">AWBZ Label</option>
                                                                <option value="2"class="menu-item">AWBZ 4x6 Label</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                        {{-- <div class="col-sm-4">
                                            <div class="form-group">
                                                <div class="input-group">
                                                    <div class="dropdown">
                                                        <button class="btn btn-lg" data-kt-menu-trigger="click"
                                                            data-kt-menu-placement="bottom-end"
                                                            style="background-color:#4d4d4d; color:#fff;">AWBZ Labels
                                                        </button>
                                                        <!--begin::Menu 3-->
                                                        <div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-800 menu-state-bg-light-secondary fw-bold w-200px py-3"
                                                            data-kt-menu="true">
                                                            <!--begin::Menu item-->
                                                            <div class="menu-item px-3">
                                                                <a href="#" class="menu-link px-3">Export To
                                                                    Excel</a>
                                                                <a href="#" class="menu-link px-3">Export To Excel
                                                                    with Details</a>
                                                            </div>

                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div> --}}
                                        <div class="col-sm-4">
                                            <a href="javascript:void(0);" id="open_edit_modal_button" data-toggle="modal"
                                                class="btn btn-sm" type="button"
                                                style="background-color: #4d4d4d; color:#fff;">EDIT ORDER</a>
                                        </div>
                                    </div>
                                </div>
                            </div>


                            <div class="row mt-5">
                                <div class="col-12">
                                    <!-- Tab links -->
                                    <ul class="nav nav-tabs" role="tablist" style="background-color:#4d4d4d;">
                                        <li class="nav-item">
                                            <a class="nav-link active" data-toggle="tab" href="#tabs-10"
                                                role="tab"><strong>BRIEF</strong></a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" data-toggle="tab" href="#tabs-11"
                                                role="tab"><strong>HISTORY</strong></a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" data-toggle="tab" href="#tabs-12"
                                                role="tab"><strong>REMARKS</strong></a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" data-toggle="tab" href="#tabs-13"
                                                role="tab"><strong>MAP</strong></a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" data-toggle="tab" href="#tabs-14"
                                                role="tab"><strong>POR</strong></a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" data-toggle="tab" href="#tabs-15"
                                                role="tab"><strong>SIGNATURE</strong></a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" data-toggle="tab" href="#tabs-16"
                                                role="tab"><strong>DELIVERY JOBS</strong></a>
                                        </li>
                                    </ul>
                                    <div class="tab-content">
                                        <div class="tab-pane active" id="tabs-10" role="tabpanel">
                                            <br>
                                            <div class="container-fluid">
                                                <div class="row">
                                                    <div class="col-6 mb-2">
                                                        <div class="card">
                                                            <div class="card-body text-dark">
                                                                <input type="hidden" id="reference_number" name="reference_number" class="s-reference_number">
                                                                <div class="row">
                                                                    <div class="col-lg-4">
                                                                        <div href="javascript:void(0);"
                                                                            class="pull-left">
                                                                            <div
                                                                                class="custom-media-object rounded-corner bg-orange">
                                                                                <span class="font-white">AS</span>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-lg-8 font-weight-bold">
                                                                        <div class="">
                                                                            <div class="email-from text-inverse">
                                                                                <span
                                                                                    class="text-uppercase">Sender</span>
                                                                                <br>
                                                                                <span class="text-uppercase"
                                                                                    id="o-shipper_name"></span>
                                                                            </div>
                                                                            <div class="email-to">
                                                                                <span id="o-contact_office_1"></span>
                                                                            </div>
                                                                        </div>
                                                                        &nbsp;
                                                                        <div class="row p-t-10">
                                                                            <div class="col-lg-3">
                                                                                <div class="email-user bg-blue">
                                                                                    <span class="text-white"><i
                                                                                            class="fas fa-home fa-fw"></i></span>
                                                                                </div>
                                                                            </div>
                                                                            <div class="col-lg-9 font-weight-light">
                                                                                <div class="email-to">
                                                                                    <span id="o-sender_address"></span>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="col-6 mb-2">
                                                        <div class="card">
                                                            <div class="card-body text-dark">
                                                                <div class="row">
                                                                    <div class="col-lg-4">
                                                                        <div href="javascript:;" class="pull-left">
                                                                            <div
                                                                                class="custom-media-object rounded-corner bg-info">
                                                                                <span class="font-white">SP</span>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-lg-8 font-weight-bold">
                                                                        <div class="media-body">
                                                                            <div class="email-from text-inverse">
                                                                                <span
                                                                                    class="text-uppercase">RECIPIENT</span>
                                                                                <br>
                                                                                <span class="text-uppercase"
                                                                                    id="o-reciver_name"></span>
                                                                            </div>
                                                                            <div class="email-to">
                                                                                <span id="o-mobile_1"></span>
                                                                            </div>
                                                                        </div>
                                                                        &nbsp;
                                                                        <div class="row p-t-10">
                                                                            <div class="col-lg-3">
                                                                                <div class="email-user bg-blue">
                                                                                    <span class="text-white"><i
                                                                                            class="fas fa-briefcase fa-fw"></i></span>
                                                                                </div>
                                                                            </div>
                                                                            <div class="col-lg-9 font-weight-light">
                                                                                <div class="email-to">
                                                                                    <span
                                                                                        id="o-reciver_address"></span>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-6 mb-2" style="font-size: 10px;">
                                                        <div class="card">
                                                            <h5 class="card-title text-center text-dark">ITEM DETAILS
                                                            </h5>
                                                            <div class="card-body text-dark">
                                                                <div class="row">
                                                                    <div class="col-lg-5">
                                                                        <div class="row">
                                                                            <div class="col-lg-4">
                                                                                <div class="email-user bg-grey">
                                                                                    <span class="text-white "><i
                                                                                            class="fas f-s-10 fa-lg fa-fw  fa-gift text-yellow"></i></span>
                                                                                </div>
                                                                            </div>
                                                                            <div class="col-lg-8 icon-text">
                                                                                <div class="email-to">
                                                                                    <span>Weight Category</span>
                                                                                    <br>
                                                                                    <span
                                                                                        class="font-weight-bold text-uppercase"
                                                                                        id="o-actual_weight"></span>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-lg-3 p-0">
                                                                    </div>

                                                                    <div class="col-lg-4 p-0">
                                                                        <div class="row">
                                                                            <div class="col-lg-4 p-l-7">
                                                                                <div class="email-user bg-blue">
                                                                                    <span
                                                                                        class="text-white"><span>24</span></span>
                                                                                </div>
                                                                            </div>
                                                                            <div class="col-lg-8 icon-text">
                                                                                <div class="email-to">
                                                                                    <span>Service Type</span>
                                                                                    <br>
                                                                                    <span
                                                                                        class="text-uppercase text-lime-darker"
                                                                                        id="o-service_type"></span>
                                                                                </div>
                                                                            </div>

                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="row mt-5">
                                                                    <div class="col-lg-6">
                                                                        <div class="row">
                                                                            <div class="col-lg-4">
                                                                                <div class="email-user bg-green">
                                                                                    <span class="text-white"><i
                                                                                            class="fab f-s-20 fa-lg fa-fw fa-apple"></i></span>
                                                                                </div>
                                                                            </div>
                                                                            <div class="col-lg-8">
                                                                                <div class="email-to">
                                                                                    <span>Received Via :</span>
                                                                                    <br>
                                                                                    <span
                                                                                        class="text-uppercase text-green-darker"
                                                                                        id="ItemReceivedVia">Operations</span>
                                                                                </div>
                                                                            </div>
                                                                            <div class="col-lg-12">
                                                                                <div class="email-to">
                                                                                    <span>Item Descriotion / Special
                                                                                        Instructions :</span>
                                                                                    <br>
                                                                                </div>
                                                                                <div class="row" id="changes">
                                                                                </div>
                                                                            </div>

                                                                        </div>
                                                                    </div>
                                                                    <div class="col-lg-6">
                                                                        <div class="row pl-5">
                                                                            <div class="col-lg-4">
                                                                                <div class="email-user bg-red">
                                                                                    <span class="text-white"><i
                                                                                            class="fas f-s-20 fa-lg fa-fw  fa-dollar-sign"></i></span>
                                                                                </div>
                                                                            </div>
                                                                            <div class="col-lg-8">
                                                                                <div class="email-to">
                                                                                    <span>Item Value</span>
                                                                                    <br>
                                                                                    <span
                                                                                        class="font-weight-bold text-uppercase"
                                                                                        id="o-cod"></span>
                                                                                </div>
                                                                            </div>
                                                                            <div class="col-lg-12">
                                                                                <div class="email-to">
                                                                                    <span>No Of Pieces</span>
                                                                                    <br>
                                                                                    <span
                                                                                        class="font-weight-bold text-uppercase"
                                                                                        id="o-no_of_peices"></span>
                                                                                </div>
                                                                            </div>

                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-6 mb-2" style="font-size: 10px;">
                                                        <div class="card">
                                                            <h5 class="card-title text-center text-dark">PAYMENT INFO
                                                            </h5>
                                                            <div class="card-body text-dark">
                                                                <div class="row">
                                                                    <div class="col-lg-6">
                                                                        <div class="row">
                                                                            <div class="col-lg-2">
                                                                                <div class="email-user bg-grey">
                                                                                    <span class="text-white"><i
                                                                                            class="far f-s-20 fa-lg fa-fw  fa-money-bill-alt text-teal-darker"></i></span>
                                                                                </div>
                                                                            </div>
                                                                            <div class="col-lg-10 m-t-n-6 pt-2">
                                                                                <div class="email-to">
                                                                                    <span>Payment Method</span>
                                                                                    <br>
                                                                                    <span
                                                                                        class="text-uppercase  text-aqua-lighter"
                                                                                        id="PaymentMethod">N/A</span>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-lg-6">
                                                                        <div class="row">
                                                                            <div class="col-lg-2">
                                                                                <div class="email-user bg-orange">
                                                                                    <span class="text-white"><span
                                                                                            class="">AS</span></span>
                                                                                </div>
                                                                            </div>

                                                                            <div class="col-lg-10 m-t-n-6 pt-2">
                                                                                <div class="email-to">
                                                                                    <span>Service Charge Paid By</span>
                                                                                    <br>
                                                                                    <span
                                                                                        class="font-weight-bold text-uppercase"
                                                                                        id="PaymentServiceChergesPaidBy">Shipper</span>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-lg-12 p-0 m-l-4">
                                                                        <div
                                                                            class="email-to col-lg-8 p-t-20 pull-left">
                                                                            <span class="font-weight-bold">PUBLIC
                                                                                SERVICE FEE</span><span
                                                                                class="pull-right font-weight-bold pl-5"
                                                                                id="PublicServiceFee">14</span>

                                                                        </div>

                                                                        <div class="col-lg-12 p-t-20 text-right">
                                                                            <div class="email-to">
                                                                                <span
                                                                                    class="font-weight-bold">TOTAL</span>
                                                                                <br>
                                                                                <span
                                                                                    class="font-weight-bold text-uppercase"
                                                                                    id="CashOnDeliveryTotal">50
                                                                                    AED</span>
                                                                            </div>
                                                                        </div>


                                                                    </div>
                                                                    <div class="col-lg-12 p-0  m-l-4">
                                                                        <div
                                                                            class="email-to col-lg-8 p-t-20 pull-left">
                                                                            <span class="font-weight-bold">CASH ON
                                                                                DELIVERY </span><span
                                                                                class="pull-right font-weight-bold text-uppercase pl-5"
                                                                                id="CashOnDelivery">50</span>
                                                                        </div>
                                                                        <div class="col-lg-12 p-t-20 text-right">
                                                                            <div class="email-to">
                                                                                <span
                                                                                    class="font-weight-bold">TOTAL</span>
                                                                                <br>
                                                                                <span
                                                                                    class="font-weight-bold text-uppercase"
                                                                                    id="PublicServiceFeeTotal">14</span>
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
                                        <div class="tab-pane" id="tabs-11" role="tabpanel">
                                            <br>
                                            <div class="container-fluid">
                                                <div class="row">
                                                    <div class="col-12 mb-2">
                                                        <div class="card">
                                                            <div class="card-body text-dark">
                                                                <div class="row">
                                                                    <div class="col-lg-10 printableArea">
                                                                        <!-- begin tab-content -->
                                                                        <div class="tab-content p-0">
                                                                            <!-- begin #profile-post tab -->
                                                                            <div class="tab-pane fade show active"
                                                                                id="profile-post">
                                                                                <!-- begin timeline -->
                                                                                <ul class="timeline"
                                                                                    id="ulShipmentStatusTracking">
                                                                                    <li
                                                                                        ng-repeat="item in retailer_history">
                                                                                        <div class="timeline-time">
                                                                                            <span
                                                                                                class="date"></span>
                                                                                        </div>
                                                                                        <div class="timeline-body">
                                                                                            <div
                                                                                                class="timeline-header">
                                                                                                <span></span>
                                                                                            </div>
                                                                                            <div class="row"
                                                                                                id="logs"
                                                                                                style="max-height: 300px; overflow-y: auto;">
                                                                                            </div>
                                                                                        </div>
                                                                                    </li>
                                                                                </ul>
                                                                                <!-- end timeline -->
                                                                            </div>
                                                                            <br>
                                                                            <form class="needs-validation"
                                                                                id="TrackingHistoryComment" novalidate>
                                                                                <div class="row">
                                                                                    <div class="col-sm-11">
                                                                                        <input type="hidden"
                                                                                            id=""
                                                                                            name="id"
                                                                                            class="s-id">
                                                                                        <input type="text"
                                                                                            class="form-control"
                                                                                            placeholder="Please write your comments here..."
                                                                                            id="t-comments"
                                                                                            name="t-comments">
                                                                                    </div>
                                                                                    <div class="col-sm-1">
                                                                                        <button type="submit"
                                                                                            class="btn btn-success pull-right">Post</button>
                                                                                    </div>
                                                                                </div>
                                                                            </form>
                                                                        </div>
                                                                        <!-- end tab-content -->
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="tab-pane" id="tabs-12" role="tabpanel">
                                            <br>
                                            <div class="container-fluid">
                                                <div class="row">
                                                    <div class="col-12 mb-2">
                                                        <div class="card">
                                                            <div class="card-body text-dark">
                                                                <div class="row">
                                                                    <div class="col-lg-10 printableArea">
                                                                        <!-- begin tab-content -->
                                                                        <div class="tab-content p-0">
                                                                            <!-- begin #profile-post tab -->
                                                                            <div class="tab-pane fade show active"
                                                                                id="profile-post">
                                                                                <!-- begin timeline -->
                                                                                <ul class="timeline"
                                                                                    id="ulShipmentStatusTracking">
                                                                                    <li
                                                                                        ng-repeat="item in retailer_history">
                                                                                        <div class="timeline-time">
                                                                                            <span
                                                                                                class="date"></span>
                                                                                        </div>
                                                                                        <div class="timeline-body">
                                                                                            <div
                                                                                                class="timeline-header">
                                                                                                <span></span>
                                                                                            </div>
                                                                                            <div class="row"
                                                                                                id="remarks"
                                                                                                style="max-height: 300px; overflow-y: auto;">
                                                                                                <!-- The remarks will be dynamically added here using JavaScript -->
                                                                                            </div>
                                                                                        </div>
                                                                                    </li>
                                                                                </ul>
                                                                                <!-- end timeline -->
                                                                            </div>
                                                                            <br>
                                                                            <form class="needs-validation"
                                                                                id="InternalRemarksHistoryComment"
                                                                                novalidate>
                                                                                <div class="row">
                                                                                    <div class="col-sm-11">
                                                                                        <input type="hidden"
                                                                                            id=""
                                                                                            name="id"
                                                                                            class="s-id">
                                                                                        <input type="text"
                                                                                            class="form-control"
                                                                                            placeholder="Please write your remarks here..."
                                                                                            id="i-remarks"
                                                                                            name="i-remarks">
                                                                                    </div>
                                                                                    <div class="col-sm-1">
                                                                                        <button type="submit"
                                                                                            class="btn btn-success pull-right">Post</button>
                                                                                    </div>
                                                                                </div>
                                                                            </form>
                                                                        </div>
                                                                        <!-- end tab-content -->
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="tab-pane" id="tabs-13" role="tabpanel">
                                            <br>
                                            <div class="container-fluid">
                                                <div class="row">
                                                    <div class="col-12 mb-2">
                                                        <div class="card">
                                                            <div class="card-body text-dark">
                                                                <div class="row">
                                                                    <!--Google map-->
                                                                    <div class="google_map_area mt-2 mb-2 ml-2 mr-2">
                                                                        <iframe class="map"
                                                                            src="https://maps.google.com/maps?q=manhatan&t=&z=13&ie=UTF8&iwloc=&output=embed"
                                                                            width="920" height="400"
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
                                        <div class="tab-pane" id="tabs-14" role="tabpanel">
                                            <br>
                                            <div class="container-fluid">
                                                <div class="row">
                                                    <div class="col-12 mb-2">
                                                        <div class="card">
                                                            <div class="card-body text-dark">
                                                                <div class="row">
                                                                    <div class="col-12">
                                                                        <label class="font-weight-bold">Proof of
                                                                            Return</label>
                                                                    </div>
                                                                </div>
                                                                <div class="row">
                                                                    <div class="col-6">
                                                                        <a href=""><img
                                                                                class="imgfixPor w-100 "
                                                                                src="https://saveabandonedbabies.org/wp-content/uploads/2015/08/default.png"></a>
                                                                    </div>

                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="tab-pane" id="tabs-15" role="tabpanel">
                                            <br>
                                            <div class="container-fluid">
                                                <div class="row">
                                                    <div class="col-6 mb-2">
                                                        <div class="card">
                                                            <div class="card-body text-dark">
                                                                <div class="row">
                                                                    <div class="col-lg-12">
                                                                        <label class="font-weight-bold">Proof of
                                                                            Pickup</label>
                                                                        <br>
                                                                        <label>Order photo</label>
                                                                        <div class="col-6">
                                                                            <img class="imgfix"
                                                                                src="https://saveabandonedbabies.org/wp-content/uploads/2015/08/default.png"
                                                                                width="300" height="200">
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="col-6 mb-2">
                                                        <div class="card">
                                                            <div class="card-body text-dark">
                                                                <div class="row">
                                                                    <div class="col-lg-12">
                                                                        <label class="font-weight-bold">Proof of
                                                                            Delivery</label>
                                                                        <br>
                                                                        <label>Order photo</label>
                                                                        <div class="row" id="images">
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>

                                                </div>
                                            </div>
                                        </div>
                                        <div class="tab-pane" id="tabs-16" role="tabpanel">
                                            <br>
                                            <div class="container-fluid">
                                                <div class="row">
                                                    <div class="col-12 mb-2">
                                                        <div class="card">
                                                            <div class="card-body text-dark">
                                                                <div class="row">
                                                                    <div class="col-lg-10 printableArea">
                                                                        <div class="tab-content p-0">
                                                                            <!-- begin #profile-post tab -->
                                                                            <ul class="timeline "
                                                                                id="ulShipmentDeliveryJobs">
                                                                                <li
                                                                                    ng-repeat="item in retailer_history">
                                                                                    <div class="timeline-time"><span
                                                                                            class="date">1st Apr
                                                                                            2023</span></div>
                                                                                    <div class="timeline-icon"><a
                                                                                            href="javascript:;">&nbsp;</a>
                                                                                    </div>
                                                                                    <div class="timeline-body">
                                                                                        <div class="timeline-header">
                                                                                            <span>In Hands: <span
                                                                                                    class="font-italic font-weight-bold">M
                                                                                                    Umar
                                                                                                    Nawaz</span></span>
                                                                                        </div>
                                                                                    </div>
                                                                                </li>
                                                                            </ul>
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
</div>
</div>

{{-- Edit Modal --}}
@include('admin.modal.operation_edit_order');
{{-- Edit Modal --}}

<script>
    // $("#open_modal_button").on("click", function() {
    //     $('#operationeditorder').modal('show'); // Show the modal
    // });

    // // Close the modal when the close button is clicked
    // $('.close').click(function() {
    //     $('#operationeditorder').modal('hide'); // Hide the modal
    // });

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
                get_comments();
                // Reset form fields
                document.getElementById("TrackingHistoryComment").reset();
                // Call the comments function to refresh logs
            },
            error: function(xhr, textStatus, errorThrown) {
                alert('An error occurred. Please try again.'); // Alert for AJAX error
            }
        });
    });

    // Define the comments function
    function get_comments() {
        // alert('function called');
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

                    if (log.status == null) {
                        statusText = `Comment: ${log.comments} by ${log.name}`;
                    } else if (log.status !== null) {
                        statusText = `Status changed to: ${log.status_name} by ${log.name}`;
                    }

                    return `
                        <div class="col-12 mb-5">
                            <div>
                                <strong class="text-dark">${formattedDate} ${formattedTime}</strong>
                                &nbsp;
                                ${statusText}
                            </div>
                        </div>`;
                }).join('');

                var logsElement = document.getElementById('logs');
                logsElement.innerHTML = html;
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
                get_remarks();
                // Reset form fields
                document.getElementById("InternalRemarksHistoryComment").reset();
                // Call the comments function to refresh logs
            },
            error: function(xhr, textStatus, errorThrown) {
                alert('An error occurred. Please try again.'); // Alert for AJAX error
            }
        });
    });

    // Define the comments function
    function get_remarks() {
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
                    <div>
                    <strong class="text-dark">${formattedDate} ${formattedTime}</strong>
                    &nbsp;
                    remarks : <strong class="text-dark">${remarks.remarks}</strong> by ${remarks.name}
                    </div>
                    </div>`;
                }).join('');

                var remarksElement = document.getElementById('remarks');
                remarksElement.innerHTML = html;
            }
        });
    }

    // $(document).on('click', '.images-delete-btn', function() {
    //     var shipmentimageId = $(this).data('shipmentimage-id');
    //     $('#imagesDeleteBtn').off('click');

    //     $('#imagesDeleteBtn').click(function() {
    //         var token = $('meta[name="csrf-token"]').attr('content');

    //         $.ajax({
    //             url: '/admin/shipment/delete/{id}' + shipmentimageId,
    //             type: 'DELETE',
    //             data: {
    //                 _token: token,
    //                 id: shipmentimageId,
    //             },
    //             success: function(data) {
    //                 if (data) {
    //                     alert('Images Deleted Successfully');
    //                     $('#shipmentimagesdeleteModal').modal('hide');
    //                     $('.modal-backdrop').remove();

    //                     // Remove the deleted file from the table without reloading the page
    //                     $(`.files-delete-btn[data-shipperfile-id="${shipmentimageId}"]`)
    //                         .closest('div').remove();
    //                 }
    //             },
    //             error: function(data, textStatus, errorThrown) {
    //                 alert('Images Deleted Unsuccessfully');
    //             },
    //         });
    //     });

    //     $('#shipmentimagesdeleteModal').modal('show');
    // });

    $(document).on('click', '.images-delete-btn', function() {
        // Get the shipment image ID from the clicked button
        var shipmentimageId = $(this).data('shipmentimage-id');

        // Show the delete confirmation modal
        $('#shipmentimagesdeleteModal').modal('show');

        // Handle the image deletion when the confirmation button is clicked
        $('#imagesDeleteBtn').off('click').on('click', function() {
            // Close the modal
            $('#shipmentimagesdeleteModal').modal('hide');
            $('.modal-backdrop').remove();

            // Send an AJAX request to delete the image
            deleteShipmentImage(shipmentimageId);
        });
    });

    function deleteShipmentImage(shipmentimageId) {
        // Prepare the CSRF token
        var token = $('meta[name="csrf-token"]').attr('content');

        // Construct the URL for deleting the image
        var deleteUrl = `/admin/shipment/delete/${shipmentimageId}`;

        // Send an AJAX request to delete the image
        $.ajax({
            url: deleteUrl,
            type: 'DELETE',
            data: {
                _token: token,
                id: shipmentimageId,
            },
            success: function(data) {
                if (data) {
                    alert('Image Deleted Successfully');

                    // Remove the deleted file from the table without reloading the page
                    $(`div[data-shipmentimage-id="${shipmentimageId}"]`).remove();

                } else {
                    alert('Image Deletion Failed');
                }
            },
            error: function(data, textStatus, errorThrown) {
                alert('Image Deletion Failed');
            },
        });
    }

    function submitForm() {
        document.getElementById('exportForm').submit();
    }

    $("#open_edit_modal_button").on("click", function() {
            var id = $('.s-reference_number').val();
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
                    // console.log(response);
                    $('#operationeditorder').modal('show'); // Show the modal
                    $('.e-id').val(response.id);
                    $('.e-reference_number').val(response.reference_number);
                    $('.e-barcode').val(response.barcode);
                    $('.e-status').val(response.status_name);
                    $('.e-status_id').val(response.status);
                    $('.e-order_date').val(response.order_date);
                    $('.e-shipper_code').val(response.shipper_code);
                    $('.e-shippers_contact').val(response.shipper_contact);
                    $('.e-reciver_name').val(response.reciver_name);
                    $('.e-shipper_country').val(response.shipper_country);
                    $('.e-shipper_city').val(response.shipper_city);
                    $('.e-shipper_area').val(response.shipper_area);
                    $('.e-shipper_address').val(response.shipper_address);
                    $('.e-reciver_country').val(response.country);
                    $('.e-reciver_city').val(response.city);
                    $('.e-reciver_area').val(response.area);
                    $('.e-reciver_address').val(response.street_address);
                    $('.e-mobile_1').val(response.mobile_1);
                    $('.e-driver_id').val(response.driver_id);
                    $('.e-employee_mobile').val(response.employee_mobile);
                    $('.e-driver_code').val(response.driver_code);
                    $('.e-cod').val(response.cod);
                    $('.e-instruction').val(response.instruction);
                    $('.e-description').val(response.description);
                    $('.e-shipper_name').val(response.shipper_name);
                    $('.e-s_code').val(response.s_code);
                    $('.e-service_charges').val(response.service_charges);
                    $('.e-contact_office_1').val(response.contact_office_1);
                    $('.e-mobile_2').val(response.mobile_2);
                    $('.e-no_of_peices').val(response.no_of_peices);
                    $('.e-service_type').val(response.service_type);
                    $('.e-delivery_code').val(response.delivery_code);
                    // $('.u-details_of_products').val(response.details_of_products);
                    // $('.u-cod_peice').val(response.cod_peice);

                    var detailsArray = response.details_of_products.split(',').map(item => item.trim());
                    var codArray = response.cod_peice.split(',').map(item => item.trim());

                    $('.e-details_of_products').each(function(index, element) {
                        $(element).val(detailsArray[index]);
                    });

                    $('.e-cod_peice').each(function(index, element) {
                        $(element).val(codArray[index]);
                    });

                }
            });
        });

    // Close the modal when the close button is clicked
    $('.close').click(function() {
        $('#operationeditorder').modal('hide'); // Hide the modal
    });


</script>


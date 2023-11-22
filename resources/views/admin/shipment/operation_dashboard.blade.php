    {{-- Extends layout --}}
    @extends('layouts.admin')
    @section('page_title', 'Shipment Dashboard')
    {{-- Content --}}
    @section('content')
        <style>
            .nav.nav-tabs .nav-item {
                width: 14rem;
            }

            /* width */
            ::-webkit-scrollbar {
                width: 5px;

            }

            /* Track */
            ::-webkit-scrollbar-track {
                box-shadow: inset 0 0 5px grey;
                border-radius: 10px;

            }

            /* Handle */
            ::-webkit-scrollbar-thumb {
                background: #f0c497;
                border-radius: 10px;


            }

            /* Handle on hover */
            ::-webkit-scrollbar-thumb:hover {
                background: #f0c497;

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
                    <h2 class="card-title ml-5">
                        All Shipments
                    </h2>
                    <br>
                    <div class="row ml-2">
                        <div class="col-8">
                            <div class="form-group">
                                <div class="input-group">
                                    {{-- <input type="text" id="" name="" class="s-id"> --}}
                                    <input type="text" id="search" name="search" placeholder="Search"
                                        class="form-control" onblur="search_bar()">
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
                                        <button class="btn btn-light" data-kt-menu-trigger="click"
                                            data-kt-menu-placement="bottom-end">Action
                                        </button>
                                        <!--begin::Menu 3-->
                                        <div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-800 menu-state-bg-light-secondary fw-bold w-200px py-3"
                                            data-kt-menu="true">
                                            <!--begin::Menu item-->
                                            <div class="menu-item px-3">
                                                <a href="javascript:void(0);" class="menu-link px-3"
                                                    onclick="exportToExcel(selectedIDs)">Export To Excel</a>
                                                <a href="javascript:void(0);" class="menu-link px-3" onclick="detailsexportToExcel(selectedIDs)">Export To Excel with Details</a>
                                                <a href="javascript:void(0);" data-toggle="modal" class="menu-link px-3"
                                                    data-target="#print_airways_bills" id="print_airways_bills_link">AWBZ Label</a>
                                                <a href="javascript:void(0);" data-toggle="modal" class="menu-link px-3"
                                                    data-target="#batch_update" id="batch_update_link">Batch Update</a>
                                                <a href="javascript:void(0);" data-toggle="modal" class="menu-link px-3"
                                                    data-target="#batch_update_city" id="batch_city_update_link">Batch
                                                    Update City</a>
                                                <a href="javascript:void(0);" data-toggle="modal" class="menu-link px-3"
                                                    data-target="#batch_delete" id="batch_delete_link">Batch Delete </a>
                                                <a href="javascript:void(0);" data-toggle="modal" class="menu-link px-3"
                                                    data-target="#batch_outscan" id="batch_outscan_link">Batch OutScan</a>
                                                <a href="javascript:void(0);" data-toggle="modal" class="menu-link px-3"
                                                    data-target="#batch_inscan" id="batch_inscan_link">Batch InScan</a>
                                                <a href="javascript:void(0);" data-toggle="modal" class="menu-link px-3"
                                                    data-target="#batch_comment" id="batch_comment_link">Batch Comment</a>
                                                <a href="javascript:void(0);" id="batch_assign_to_third_party_link"
                                                    data-toggle="modal" class="menu-link px-3"
                                                    data-target="#assign_to_third_party">Assign To Third Party</a>
                                                <a href="javascript:void(0);" data-toggle="modal" class="menu-link px-3"
                                                    data-target="#unassign_to_third_party">Un-Assign To Third Party</a>
                                                <a href="javascript:void(0);" data-toggle="modal" class="menu-link px-3"
                                                    data-target="#update_service_charges" id="batch_service_link">Update
                                                    Service Charges</a>
                                            </div>
                                        </div>
                                        &nbsp;
                                        <a href="{{ route('admin.shipment.get_manifest') }}"
                                            class="btn btn-primary btn-sm" title="Print" type="button" id="printButton">Download Manifest</a>
                                        {{-- <button type="button" class="btn btn-primary btn-sm">Download Manifest</button> --}}
                                    </div>
                                </div>
                            </div>

                        </div>

                        <div class="container-fluid mt-5 hidden" style="display:none;">
                            <form class="forms-sample" id="get_orders">
                                <div class="row">
                                    <div class="col-10">
                                        <div class="form-group">
                                            <label class="text-lg-right col-form-label"> <span
                                                    class="text-danger"></span></label>
                                        </div>
                                    </div>

                                    <div class="col-2">
                                        <div class="form-group  m-b-10">
                                            <label class=" text-lg-right col-form-label">Domestic Shipments<span
                                                    class="text-danger">*</span></label>
                                            <label class="switch">
                                                <input type="checkbox" id="onoff-Active"
                                                    data-parsley-multiple="onoff-Active">
                                                <div class="slider round">
                                                    <span class="on"></span>
                                                    <span class="off"></span>
                                                </div>
                                            </label>
                                        </div>

                                    </div>

                                    <div class="col-6">
                                        <div class="form-group">
                                            <label class="text-lg-right col-form-label">Created From Date<span
                                                    class="text-danger">*</span></label>
                                            <div class="input-group m-b-10">
                                                <input type="date" id="created_from_date" name="created_from_date"
                                                    class="form-control">
                                            </div>
                                        </div>

                                    </div>

                                    <div class="col-6">
                                        <div class="form-group">
                                            <label class="text-lg-right col-form-label">Created To Date<span
                                                    class="text-danger">*</span></label>
                                            <div class="input-group m-b-10">
                                                <input type="date" id="created_to_date" name="created_to_date"
                                                    class="form-control">
                                            </div>
                                        </div>

                                    </div>

                                    <div class="col-6">
                                        <div class="form-group">
                                            <label class="text-lg-right col-form-label">Delivery Date<span
                                                    class="text-danger">*</span></label>
                                            <div class="input-group m-b-10">
                                                <input type="date" id="delivery_date" name="delivery_date"
                                                    class="form-control">
                                            </div>
                                        </div>

                                    </div>

                                    <div class="col-6">
                                        <div class="form-group">
                                            <label class="text-lg-right col-form-label">Delivery To Date<span
                                                    class="text-danger">*</span></label>
                                            <div class="input-group m-b-10">
                                                <input type="date" id="delivery_to_date" name="delivery_to_date"
                                                    class="form-control">
                                            </div>
                                        </div>

                                    </div>

                                    <div class="col-4">
                                        <div class="form-group">
                                            <label class="text-lg-right col-form-label">Cities<span
                                                    class="text-danger">*</span></label>
                                            <div class="input-group m-b-10">
                                                {{-- <input type="text" id="" name="" class="form-control"> --}}
                                                <select class="select2" name="cities[]" id="cities"
                                                    multiple="multiple" style="width:100%;" onchange="fun()">
                                                    @foreach ($cities as $key)
                                                        <option value="{{ $key->id }}">{{ $key->name }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>

                                    </div>

                                    <div class="col-4">
                                        <div class="form-group">
                                            <label class="text-lg-right col-form-label">Zone<span
                                                    class="text-danger">*</span></label>
                                            <div class="input-group m-b-10">
                                                <select class="select2" name="zones[]" id="zones"
                                                    multiple="multiple" style="width:100%;">
                                                </select>
                                            </div>
                                        </div>

                                    </div>

                                    <div class="col-4">
                                        <div class="form-group">
                                            <label class="text-lg-right col-form-label">Supplier<span
                                                    class="text-danger">*</span></label>
                                            <div class="input-group m-b-10">
                                                <select class="select2" name="supplier[]" id="supplier"
                                                    multiple="multiple" style="width:100%;">
                                                </select>
                                            </div>
                                        </div>

                                    </div>

                                    <div class="col-4">
                                        <div class="form-group">
                                            <label class="text-lg-right col-form-label">Shipper<span
                                                    class="text-danger">*</span></label>
                                            <div class="input-group m-b-10">
                                                <select class="select2" name="shipper[]" id="shipper"
                                                    multiple="multiple" style="width:100%;">
                                                    @foreach ($fetch_shippers as $key)
                                                        <option value="{{ $key->id }}">
                                                            {{ $key->shipper_code }}|{{ $key->company_name }}|{{ $key->contact_office_1 }}
                                                        </option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>

                                    </div>

                                    <div class="col-4">
                                        <div class="form-group">
                                            <label class="text-lg-right col-form-label">Driver<span
                                                    class="text-danger">*</span></label>
                                            <div class="input-group m-b-10">
                                                <select class="select2" name="driver[]" id="driver"
                                                    multiple="multiple" style="width:100%;">
                                                    @foreach ($fetch_drivers as $key)
                                                        <option value="{{ $key->id }}">
                                                            {{ $key->driver_code }}|{{ $key->employee_name }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>

                                    </div>

                                    <div class="col-4">
                                        <div class="form-group">
                                            <label class="text-lg-right col-form-label">Pick Up Driver<span
                                                    class="text-danger">*</span></label>
                                            <div class="input-group m-b-10">
                                                <select class="select2" name="pick_up_driver[]" id="pick_up_driver"
                                                    multiple="multiple" style="width:100%;">
                                                    @foreach ($fetch_drivers as $key)
                                                        <option value="{{ $key->id }}">
                                                            {{ $key->driver_code }}|{{ $key->employee_name }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>

                                    </div>

                                    <div class="col-4">
                                        <div class="form-group">
                                            <label class="text-lg-right col-form-label">Status<span
                                                    class="text-danger">*</span></label>
                                            <div class="input-group m-b-10">
                                                <select class="select2" name="status[]" id="status"
                                                    multiple="multiple" style="width:100%;">
                                                    @foreach ($fetch_status as $key)
                                                        <option value="{{ $key->id }}">{{ $key->name }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>

                                    </div>

                                    <div class="col-4">
                                        <div class="form-group">
                                            <label class="text-lg-right col-form-label">Warehouse<span
                                                    class="text-danger">*</span></label>
                                            <div class="input-group m-b-10">
                                                <select class="select2" name="warehouse[]" id="warehouse"
                                                    multiple="multiple" style="width:100%;">
                                                    <option value="WH00002 | Courix - AUH">WH00002 | Courix - AUH</option>
                                                    <option value="WH00001 | Courix - H/O">WH00001 | Courix - H/O</option>
                                                </select>
                                            </div>
                                        </div>

                                    </div>


                                    <div class="col-4">
                                        <div class="form-group">
                                            <label class="text-lg-right col-form-label">Rack<span
                                                    class="text-danger">*</span></label>
                                            <div class="input-group m-b-10">
                                                <select class="select2" name="rack[]" id="rack"
                                                    multiple="multiple" style="width:100%;">
                                                </select>
                                            </div>
                                        </div>

                                    </div>

                                    <div class="col-4">
                                        <div class="form-group">
                                            <label class="text-lg-right col-form-label">Delivery Attempt<span
                                                    class="text-danger">*</span></label>
                                            <div class="input-group m-b-10">
                                                <select class="select2" name="delivery_attempt[]" id="delivery_attempt"
                                                    multiple="multiple" style="width:100%;">
                                                </select>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                                <hr>
                                <div class="row">
                                    <div class="col-10">
                                    </div>
                                    <div class="col-2">
                                        <button type="button" class="btn btn-danger btn-sm">Clear</button>
                                        &nbsp;
                                        <button type="button" class="btn btn-primary btn-sm"
                                            onclick="get_data()">Submit</button>
                                    </div>

                                </div>
                            </form>
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
                                                    role="tab"><strong>All SHIPMENT</strong><span
                                                        class="badge text-black">{{ $shipments_counts }}</span></a>
                                            </li>
                                            <li class="nav-item">
                                                <a class="nav-link" data-toggle="tab" href="#tabs-2"
                                                    role="tab"><strong>TO
                                                        BE PICKED UP</strong><span class="badge text-black">{{ $to_be_picked }}</span></a>
                                            </li>
                                            <li class="nav-item">
                                                <a class="nav-link" data-toggle="tab" href="#tabs-3"
                                                    role="tab"><strong>PICKED UP</strong><span
                                                        class="badge text-black">{{ $picked_up }}</span></a>
                                            </li>
                                            <li class="nav-item">
                                                <a class="nav-link" data-toggle="tab" href="#tabs-4"
                                                    role="tab"><strong>TO
                                                        BE DELIVERED</strong><span class="badge text-black">{{ $to_be_delivered }}</span></a>
                                            </li>
                                            <li class="nav-item">
                                                <a class="nav-link" data-toggle="tab" href="#tabs-5"
                                                    role="tab"><strong>DELIVERED</strong><span
                                                        class="badge text-black">{{ $delivered }}</span></a>
                                            </li>
                                            <li class="nav-item">
                                                <a class="nav-link" data-toggle="tab" href="#tabs-6"
                                                    role="tab"><strong>LOST
                                                        & DAMAGES</strong><span class="badge text-black">{{ $lost_damages }}</span></a>
                                            </li>
                                            <li class="nav-item">
                                                <a class="nav-link" data-toggle="tab" href="#tabs-7"
                                                    role="tab"><strong>TO
                                                        BE RETURNED</strong><span class="badge text-black">{{ $returned }}</span></a>
                                            </li>
                                            <li class="nav-item">
                                                <a class="nav-link" data-toggle="tab" href="#tabs-8"
                                                    role="tab"><strong>RTOS</strong><span
                                                        class="badge text-black">{{ $cancelled }}</span></a>
                                            </li>
                                            <li class="nav-item">
                                                <a class="nav-link" data-toggle="tab" href="#tabs-9"
                                                    role="tab"><strong>CANCELED</strong><span
                                                        class="badge text-black">{{ $rtos }}</span></a>
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
                                                                    <table id="example"
                                                                        class="table table-bordered myDataTable">
                                                                        <thead>
                                                                            <tr>
                                                                                <th scope="col">
                                                                                    <input type="checkbox" id="selectAll">
                                                                                </th>
                                                                                <th scope="col"> Tracking No Reference
                                                                                </th>
                                                                                <th scope="col"> Courier </th>
                                                                                <th scope="col"> Shipper </th>
                                                                                <th scope="col"> Driver </th>
                                                                                <th scope="col"> Location To </th>
                                                                                <th scope="col"> Receiver </th>
                                                                                <th scope="col"> Remarks </th>
                                                                                <th scope="col"> Internal Remarks </th>
                                                                                <th scope="col"> Account Name</th>
                                                                                <th scope="col"> Service Charges </th>
                                                                                <th scope="col"> CostOfGoods </th>
                                                                                <th scope="col"> Delivery Date </th>
                                                                                <th scope="col"> Delievery Attempt </th>
                                                                                <th scope="col"> STATUS </th>
                                                                                <th scope="col"> ThirdParty Status </th>
                                                                                <th scope="col"> TP Delivery Date </th>
                                                                                <th scope="col"> Tp Remarks </th>
                                                                            </tr>
                                                                        </thead>
                                                                        <tbody id="preview">
                                                                            @if ($shipments->isNotEmpty())
                                                                                @foreach ($shipments as $ship)
                                                                                    <tr>
                                                                                        <td><input type="checkbox"
                                                                                                name="checkbox[]"
                                                                                                class="checkbox"
                                                                                                value="{{ $ship->id }}">
                                                                                        </td>
                                                                                        <td>
                                                                                            <a href="javascript:void(0);"
                                                                                                id="show-employee"
                                                                                                data-toggle="modal"
                                                                                                data-target=""
                                                                                                data-url="{{ route('admin.shipment.get_edit_orders', ['id' => $ship->id]) }}"
                                                                                                onclick="comments({{ $ship->id }})">{{ $ship->reference_number }}
                                                                                            </a>
                                                                                        </td>
                                                                                        <td></td>
                                                                                        <td>{{ $ship->shipper_name }}</td>
                                                                                        <td>
                                                                                            @if ($ship->driver_id == null)
                                                                                                <span></span>
                                                                                            @else
                                                                                                <span>{{ $ship->employee_name }}</span>
                                                                                                &nbsp;
                                                                                                <span>{{ $ship->employee_mobile }}</span>
                                                                                            @endif
                                                                                        </td>
                                                                                        <td>{{ $ship->city_name }}</td>
                                                                                        <td>{{ $ship->reciver_name }}
                                                                                            <span>{{ $ship->mobile_1 }}</span>
                                                                                        </td>
                                                                                        <td>{{ $ship->instruction }}</td>
                                                                                        <td></td>
                                                                                        <td>{{ $ship->account_name }}</td>
                                                                                        <td>
                                                                                            @if($ship->service_charges == null)
                                                                                            @else
                                                                                            {{ $ship->service_charges }}.00
                                                                                            @endif
                                                                                        </td>
                                                                                        <td></td>
                                                                                        <td>{{ $ship->order_date }}</td>
                                                                                        <td>{{ $ship->delivery_attempt }}</td>
                                                                                        <td>{{ $ship->status_name }}</td>
                                                                                        <td></td>
                                                                                        <td></td>
                                                                                        <td></td>
                                                                                    </tr>
                                                                                @endforeach
                                                                            @else
                                                                                <tr>
                                                                                    <td colspan="6">No Shipments
                                                                                        Available.</td>
                                                                                </tr>
                                                                            @endif
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
                                                                    <table id="example"
                                                                        class="table table-bordered myDataTable">
                                                                        <thead>
                                                                            <tr>
                                                                                <th scope="col">
                                                                                    <input type="checkbox" id="selectAll">
                                                                                </th>
                                                                                <th scope="col"> Tracking No Reference
                                                                                </th>
                                                                                <th scope="col"> Courier </th>
                                                                                <th scope="col"> Shipper </th>
                                                                                <th scope="col"> Driver </th>
                                                                                <th scope="col"> Location To </th>
                                                                                <th scope="col"> Receiver </th>
                                                                                <th scope="col"> Remarks </th>
                                                                                <th scope="col"> Internal Remarks </th>
                                                                                <th scope="col"> Account Name</th>
                                                                                <th scope="col"> Service Charges </th>
                                                                                <th scope="col"> CostOfGoods </th>
                                                                                <th scope="col"> Delivery Date </th>
                                                                                <th scope="col"> Delievery Attempt </th>
                                                                                <th scope="col"> STATUS </th>
                                                                                <th scope="col"> ThirdParty Status </th>
                                                                                <th scope="col"> TP Delivery Date </th>
                                                                                <th scope="col"> Tp Remarks </th>
                                                                            </tr>
                                                                        </thead>
                                                                        <tbody>
                                                                            @if ($shipments_to_picked_up->isNotEmpty())
                                                                                @foreach ($shipments_to_picked_up as $picked_up)
                                                                                    <tr>
                                                                                        <td><input type="checkbox"
                                                                                                name="checkbox[]"
                                                                                                class="checkbox"
                                                                                                value="{{ $picked_up->id }}">
                                                                                        </td>
                                                                                        <td>
                                                                                            <a href="javascript:void(0);"
                                                                                                id="show-employee"
                                                                                                data-toggle="modal"
                                                                                                data-target=""
                                                                                                data-url="{{ route('admin.shipment.get_edit_orders', ['id' => $picked_up->id]) }}"
                                                                                                onclick="comments({{ $picked_up->id }})">{{ $picked_up->reference_number }}
                                                                                            </a>
                                                                                        </td>
                                                                                        <td></td>
                                                                                        <td>{{ $picked_up->shipper_name }}</td>
                                                                                        <td>
                                                                                            @if ($picked_up->driver_id == null)
                                                                                                <span></span>
                                                                                            @else
                                                                                                <span>{{ $picked_up->employee_name }}</span>
                                                                                                &nbsp;
                                                                                                <span>{{ $picked_up->employee_mobile }}</span>
                                                                                            @endif
                                                                                        </td>
                                                                                        <td>{{ $picked_up->city_name }}</td>
                                                                                        <td>{{ $picked_up->reciver_name }}
                                                                                            <span>{{ $picked_up->mobile_1 }}</span>
                                                                                        </td>
                                                                                        <td>{{ $picked_up->instruction }}</td>
                                                                                        <td></td>
                                                                                        <td>{{ $picked_up->account_name }}</td>
                                                                                        <td>
                                                                                            @if($picked_up->service_charges == null)
                                                                                            @else
                                                                                            {{ $picked_up->service_charges }}.00
                                                                                            @endif
                                                                                        </td>
                                                                                        <td></td>
                                                                                        <td>{{ $picked_up->order_date }}</td>
                                                                                        <td>{{ $picked_up->delivery_attempt }}</td>
                                                                                        <td>{{ $picked_up->status_name }}</td>
                                                                                        <td></td>
                                                                                        <td></td>
                                                                                        <td></td>
                                                                                    </tr>
                                                                                @endforeach
                                                                            @else
                                                                                <tr>
                                                                                    <td colspan="6">No Shipments
                                                                                        Available.</td>
                                                                                </tr>
                                                                            @endif
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
                                                                    <table id="example"
                                                                        class="table table-bordered myDataTable">
                                                                        <thead>
                                                                            <tr>
                                                                                <th scope="col">
                                                                                    <input type="checkbox" id="selectAll">
                                                                                </th>
                                                                                <th scope="col"> Tracking No Reference
                                                                                </th>
                                                                                <th scope="col"> Courier </th>
                                                                                <th scope="col"> Shipper </th>
                                                                                <th scope="col"> Driver </th>
                                                                                <th scope="col"> Location To </th>
                                                                                <th scope="col"> Receiver </th>
                                                                                <th scope="col"> Remarks </th>
                                                                                <th scope="col"> Internal Remarks </th>
                                                                                <th scope="col"> Account Name</th>
                                                                                <th scope="col"> Service Charges </th>
                                                                                <th scope="col"> CostOfGoods </th>
                                                                                <th scope="col"> Delivery Date </th>
                                                                                <th scope="col"> Delievery Attempt </th>
                                                                                <th scope="col"> STATUS </th>
                                                                                <th scope="col"> ThirdParty Status </th>
                                                                                <th scope="col"> TP Delivery Date </th>
                                                                                <th scope="col"> Tp Remarks </th>
                                                                            </tr>
                                                                        </thead>
                                                                        <tbody>
                                                                            @if ($shipments_picked_up->isNotEmpty())
                                                                                @foreach ($shipments_picked_up as $shipments_picked)
                                                                                    <tr>
                                                                                        <td><input type="checkbox"
                                                                                                name="checkbox[]"
                                                                                                class="checkbox"
                                                                                                value="{{ $shipments_picked->id }}">
                                                                                        </td>
                                                                                        <td>
                                                                                            <a href="javascript:void(0);"
                                                                                                id="show-employee"
                                                                                                data-toggle="modal"
                                                                                                data-target=""
                                                                                                data-url="{{ route('admin.shipment.get_edit_orders', ['id' => $shipments_picked->id]) }}"
                                                                                                onclick="comments({{ $shipments_picked->id }})">{{ $shipments_picked->reference_number }}
                                                                                            </a>
                                                                                        </td>
                                                                                        <td></td>
                                                                                        <td>{{ $shipments_picked->shipper_name }}</td>
                                                                                        <td>
                                                                                            @if ($shipments_picked->driver_id == null)
                                                                                                <span></span>
                                                                                            @else
                                                                                                <span>{{ $shipments_picked->employee_name }}</span>
                                                                                                &nbsp;
                                                                                                <span>{{ $shipments_picked->employee_mobile }}</span>
                                                                                            @endif
                                                                                        </td>
                                                                                        <td>{{ $shipments_picked->city_name }}</td>
                                                                                        <td>{{ $shipments_picked->reciver_name }}
                                                                                            <span>{{ $shipments_picked->mobile_1 }}</span>
                                                                                        </td>
                                                                                        <td>{{ $shipments_picked->instruction }}</td>
                                                                                        <td></td>
                                                                                        <td>{{ $shipments_picked->account_name }}</td>
                                                                                        <td>
                                                                                            @if($shipments_picked->service_charges == null)
                                                                                            @else
                                                                                            {{ $shipments_picked->service_charges }}.00
                                                                                            @endif
                                                                                        </td>
                                                                                        <td></td>
                                                                                        <td>{{ $shipments_picked->order_date }}</td>
                                                                                        <td>{{ $shipments_picked->delivery_attempt }}</td>
                                                                                        <td>{{ $shipments_picked->status_name }}</td>
                                                                                        <td></td>
                                                                                        <td></td>
                                                                                        <td></td>
                                                                                    </tr>
                                                                                @endforeach
                                                                            @else
                                                                                <tr>
                                                                                    <td colspan="6">No Shipments
                                                                                        Available.</td>
                                                                                </tr>
                                                                            @endif
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
                                                        <div class="col-lg-12">
                                                            <div class="body">
                                                                <div class="table-responsive check-all-parent">
                                                                    <table id="example"
                                                                        class="table table-bordered myDataTable">
                                                                        <thead>
                                                                            <tr>
                                                                                <th scope="col">
                                                                                    <input type="checkbox" id="selectAll">
                                                                                </th>
                                                                                <th scope="col"> Tracking No Reference
                                                                                </th>
                                                                                <th scope="col"> Courier </th>
                                                                                <th scope="col"> Shipper </th>
                                                                                <th scope="col"> Driver </th>
                                                                                <th scope="col"> Location To </th>
                                                                                <th scope="col"> Receiver </th>
                                                                                <th scope="col"> Remarks </th>
                                                                                <th scope="col"> Internal Remarks </th>
                                                                                <th scope="col"> Account Name</th>
                                                                                <th scope="col"> Service Charges </th>
                                                                                <th scope="col"> CostOfGoods </th>
                                                                                <th scope="col"> Delivery Date </th>
                                                                                <th scope="col"> Delievery Attempt </th>
                                                                                <th scope="col"> STATUS </th>
                                                                                <th scope="col"> ThirdParty Status </th>
                                                                                <th scope="col"> TP Delivery Date </th>
                                                                                <th scope="col"> Tp Remarks </th>
                                                                            </tr>
                                                                        </thead>
                                                                        <tbody>
                                                                            @if ($shipments_to_be_delivered->isNotEmpty())
                                                                                @foreach ($shipments_to_be_delivered as $shipments_delivered)
                                                                                    <tr>
                                                                                        <td><input type="checkbox"
                                                                                                name="checkbox[]"
                                                                                                class="checkbox"
                                                                                                value="{{ $shipments_delivered->id }}">
                                                                                        </td>
                                                                                        <td>
                                                                                            <a href="javascript:void(0);"
                                                                                                id="show-employee"
                                                                                                data-toggle="modal"
                                                                                                data-target=""
                                                                                                data-url="{{ route('admin.shipment.get_edit_orders', ['id' => $shipments_delivered->id]) }}"
                                                                                                onclick="comments({{ $shipments_delivered->id }})">{{ $shipments_delivered->reference_number }}
                                                                                            </a>
                                                                                        </td>
                                                                                        <td></td>
                                                                                        <td>{{ $shipments_delivered->shipper_name }}</td>
                                                                                        <td>
                                                                                            @if ($shipments_delivered->driver_id == null)
                                                                                                <span></span>
                                                                                            @else
                                                                                                <span>{{ $shipments_delivered->employee_name }}</span>
                                                                                                &nbsp;
                                                                                                <span>{{ $shipments_delivered->employee_mobile }}</span>
                                                                                            @endif
                                                                                        </td>
                                                                                        <td>{{ $shipments_delivered->city_name }}</td>
                                                                                        <td>{{ $shipments_delivered->reciver_name }}
                                                                                            <span>{{ $shipments_delivered->mobile_1 }}</span>
                                                                                        </td>
                                                                                        <td>{{ $shipments_delivered->instruction }}</td>
                                                                                        <td></td>
                                                                                        <td>{{ $shipments_delivered->account_name }}</td>
                                                                                        <td>
                                                                                            @if($shipments_delivered->service_charges == null)
                                                                                            @else
                                                                                            {{ $shipments_delivered->service_charges }}.00
                                                                                            @endif
                                                                                        </td>
                                                                                        <td></td>
                                                                                        <td>{{ $shipments_delivered->order_date }}</td>
                                                                                        <td>{{ $shipments_delivered->delivery_attempt }}</td>
                                                                                        <td>{{ $shipments_delivered->status_name }}</td>
                                                                                        <td></td>
                                                                                        <td></td>
                                                                                        <td></td>
                                                                                    </tr>
                                                                                @endforeach
                                                                            @else
                                                                                <tr>
                                                                                    <td colspan="6">No Shipments
                                                                                        Available.</td>
                                                                                </tr>
                                                                            @endif
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
                                                        <div class="col-lg-12">
                                                            <div class="body">
                                                                <div class="table-responsive check-all-parent">
                                                                    <table id="example"
                                                                        class="table table-bordered myDataTable">
                                                                        <thead>
                                                                            <tr>
                                                                                <th scope="col">
                                                                                    <input type="checkbox" id="selectAll">
                                                                                </th>
                                                                                <th scope="col"> Tracking No Reference</th>
                                                                                <th scope="col"> Courier </th>
                                                                                <th scope="col"> Shipper </th>
                                                                                <th scope="col"> Driver </th>
                                                                                <th scope="col"> Location To </th>
                                                                                <th scope="col"> Receiver </th>
                                                                                <th scope="col"> Remarks </th>
                                                                                <th scope="col"> Internal Remarks </th>
                                                                                <th scope="col"> Account Name</th>
                                                                                <th scope="col"> Service Charges </th>
                                                                                <th scope="col"> CostOfGoods </th>
                                                                                <th scope="col"> Delivery Date </th>
                                                                                <th scope="col"> Delievery Attempt </th>
                                                                                <th scope="col"> STATUS </th>
                                                                                <th scope="col"> ThirdParty Status </th>
                                                                                <th scope="col"> TP Delivery Date </th>
                                                                                <th scope="col"> Tp Remarks </th>
                                                                            </tr>
                                                                        </thead>
                                                                        <tbody>
                                                                           {{-- @dd($ship_delivered); --}}
                                                                            @if ($ship_delivered->isNotEmpty())
                                                                                @foreach ($ship_delivered as $del)
                                                                                    <tr>
                                                                                        <td><input type="checkbox"
                                                                                                name="checkbox[]"
                                                                                                class="checkbox"
                                                                                                value="{{ $del->id }}">
                                                                                        </td>
                                                                                        <td>
                                                                                            <a href="javascript:void(0);"
                                                                                                id="show-employee"
                                                                                                data-toggle="modal"
                                                                                                data-target=""
                                                                                                data-url="{{ route('admin.shipment.get_edit_orders', ['id' => $del->id]) }}"
                                                                                                onclick="comments({{ $del->id }})">{{ $del->reference_number }}
                                                                                            </a>
                                                                                        </td>
                                                                                        <td></td>
                                                                                        <td>{{ $del->shipper_name }}</td>
                                                                                        <td>
                                                                                            @if ($del->driver_id == null)
                                                                                                <span></span>
                                                                                            @else
                                                                                                <span>{{ $del->employee_name }}</span>
                                                                                                &nbsp;
                                                                                                <span>{{ $del->employee_mobile }}</span>
                                                                                            @endif
                                                                                        </td>
                                                                                        <td>{{ $del->city_name }}</td>
                                                                                        <td>{{ $del->reciver_name }}
                                                                                            <span>{{ $del->mobile_1 }}</span>
                                                                                        </td>
                                                                                        <td>{{ $del->instruction }}</td>
                                                                                        <td></td>
                                                                                        <td>{{ $del->account_name }}</td>
                                                                                        <td>
                                                                                            @if($del->service_charges == null)
                                                                                            @else
                                                                                            {{ $del->service_charges }}.00
                                                                                            @endif
                                                                                        </td>
                                                                                        <td></td>
                                                                                        <td>{{ $del->order_date }}</td>
                                                                                        <td>{{ $del->delivery_attempt }}</td>
                                                                                        <td>{{ $del->status_name }}</td>
                                                                                        <td></td>
                                                                                        <td></td>
                                                                                        <td></td>
                                                                                    </tr>
                                                                                @endforeach
                                                                            @else
                                                                                <tr>
                                                                                    <td colspan="6">No Shipments
                                                                                        Available.</td>
                                                                                </tr>
                                                                            @endif
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
                                                        <div class="col-lg-12">
                                                            <div class="body">
                                                                <div class="table-responsive check-all-parent">
                                                                    <table id="example"
                                                                        class="table table-bordered myDataTable">
                                                                        <thead>
                                                                            <tr>
                                                                                <th scope="col">
                                                                                    <input type="checkbox" id="selectAll">
                                                                                </th>
                                                                                <th scope="col"> Tracking No Reference
                                                                                </th>
                                                                                <th scope="col"> Courier </th>
                                                                                <th scope="col"> Shipper </th>
                                                                                <th scope="col"> Driver </th>
                                                                                <th scope="col"> Location To </th>
                                                                                <th scope="col"> Receiver </th>
                                                                                <th scope="col"> Remarks </th>
                                                                                <th scope="col"> Internal Remarks </th>
                                                                                <th scope="col"> Account Name</th>
                                                                                <th scope="col"> Service Charges </th>
                                                                                <th scope="col"> CostOfGoods </th>
                                                                                <th scope="col"> Delivery Date </th>
                                                                                <th scope="col"> Delievery Attempt </th>
                                                                                <th scope="col"> STATUS </th>
                                                                                <th scope="col"> ThirdParty Status </th>
                                                                                <th scope="col"> TP Delivery Date </th>
                                                                                <th scope="col"> Tp Remarks </th>
                                                                            </tr>
                                                                        </thead>
                                                                        <tbody>
                                                                            @if ($shipments_lost_damages->isNotEmpty())
                                                                                @foreach ($shipments_lost_damages as $shipments_lost)
                                                                                    <tr>
                                                                                        <td><input type="checkbox"
                                                                                                name="checkbox[]"
                                                                                                class="checkbox"
                                                                                                value="{{ $shipments_lost->id }}">
                                                                                        </td>
                                                                                        <td>
                                                                                            <a href="javascript:void(0);"
                                                                                                id="show-employee"
                                                                                                data-toggle="modal"
                                                                                                data-target=""
                                                                                                data-url="{{ route('admin.shipment.get_edit_orders', ['id' => $shipments_lost->id]) }}"
                                                                                                onclick="comments({{ $shipments_lost->id }})">{{ $shipments_lost->reference_number }}
                                                                                            </a>
                                                                                        </td>
                                                                                        <td></td>
                                                                                        <td>{{ $shipments_lost->shipper_name }}</td>
                                                                                        <td>
                                                                                            @if ($shipments_lost->driver_id == null)
                                                                                                <span></span>
                                                                                            @else
                                                                                                <span>{{ $shipments_lost->employee_name }}</span>
                                                                                                &nbsp;
                                                                                                <span>{{ $shipments_lost->employee_mobile }}</span>
                                                                                            @endif
                                                                                        </td>
                                                                                        <td>{{ $shipments_lost->city_name }}</td>
                                                                                        <td>{{ $shipments_lost->reciver_name }}
                                                                                            <span>{{ $shipments_lost->mobile_1 }}</span>
                                                                                        </td>
                                                                                        <td>{{ $shipments_lost->instruction }}</td>
                                                                                        <td></td>
                                                                                        <td>{{ $shipments_lost->account_name }}</td>
                                                                                        <td>
                                                                                            @if($shipments_lost->service_charges == null)
                                                                                            @else
                                                                                            {{ $shipments_lost->service_charges }}.00
                                                                                            @endif
                                                                                        </td>
                                                                                        <td></td>
                                                                                        <td>{{ $shipments_lost->order_date }}</td>
                                                                                        <td>{{ $shipments_lost->delivery_attempt }}</td>
                                                                                        <td>{{ $shipments_lost->status_name }}</td>
                                                                                        <td></td>
                                                                                        <td></td>
                                                                                        <td></td>
                                                                                    </tr>
                                                                                @endforeach
                                                                            @else
                                                                                <tr>
                                                                                    <td colspan="6">No Shipments
                                                                                        Available.</td>
                                                                                </tr>
                                                                            @endif
                                                                        </tbody>
                                                                    </table>
                                                                </div>

                                                            </div>

                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="tab-pane" id="tabs-7" role="tabpanel">
                                                <br>
                                                <div class="container-fluid">
                                                    <div class="row">
                                                        <div class="col-lg-12">
                                                            <div class="body">
                                                                <div class="table-responsive check-all-parent">
                                                                    <table id="example"
                                                                        class="table table-bordered myDataTable">
                                                                        <thead>
                                                                            <tr>
                                                                                <th scope="col">
                                                                                    <input type="checkbox" id="selectAll">
                                                                                </th>
                                                                                <th scope="col"> Tracking No Reference
                                                                                </th>
                                                                                <th scope="col"> Courier </th>
                                                                                <th scope="col"> Shipper </th>
                                                                                <th scope="col"> Driver </th>
                                                                                <th scope="col"> Location To </th>
                                                                                <th scope="col"> Receiver </th>
                                                                                <th scope="col"> Remarks </th>
                                                                                <th scope="col"> Internal Remarks </th>
                                                                                <th scope="col"> Account Name</th>
                                                                                <th scope="col"> Service Charges </th>
                                                                                <th scope="col"> CostOfGoods </th>
                                                                                <th scope="col"> Delivery Date </th>
                                                                                <th scope="col"> Delievery Attempt </th>
                                                                                <th scope="col"> STATUS </th>
                                                                                <th scope="col"> ThirdParty Status </th>
                                                                                <th scope="col"> TP Delivery Date </th>
                                                                                <th scope="col"> Tp Remarks </th>
                                                                            </tr>
                                                                        </thead>
                                                                        <tbody>
                                                                            @if ($shipments_to_be_returned->isNotEmpty())
                                                                                @foreach ($shipments_to_be_returned as $shipments_returned)
                                                                                    <tr>
                                                                                        <td><input type="checkbox"
                                                                                                name="checkbox[]"
                                                                                                class="checkbox"
                                                                                                value="{{ $shipments_returned->id }}">
                                                                                        </td>
                                                                                        <td>
                                                                                            <a href="javascript:void(0);"
                                                                                                id="show-employee"
                                                                                                data-toggle="modal"
                                                                                                data-target=""
                                                                                                data-url="{{ route('admin.shipment.get_edit_orders', ['id' => $shipments_returned->id]) }}"
                                                                                                onclick="comments({{ $shipments_returned->id }})">{{ $shipments_returned->reference_number }}
                                                                                            </a>
                                                                                        </td>
                                                                                        <td></td>
                                                                                        <td>{{ $shipments_returned->shipper_name }}</td>
                                                                                        <td>
                                                                                            @if ($shipments_returned->driver_id == null)
                                                                                                <span></span>
                                                                                            @else
                                                                                                <span>{{ $shipments_returned->employee_name }}</span>
                                                                                                &nbsp;
                                                                                                <span>{{ $shipments_returned->employee_mobile }}</span>
                                                                                            @endif
                                                                                        </td>
                                                                                        <td>{{ $shipments_returned->city_name }}</td>
                                                                                        <td>{{ $shipments_returned->reciver_name }}
                                                                                            <span>{{ $shipments_returned->mobile_1 }}</span>
                                                                                        </td>
                                                                                        <td>{{ $shipments_returned->instruction }}</td>
                                                                                        <td></td>
                                                                                        <td>{{ $shipments_returned->account_name }}</td>
                                                                                        <td>
                                                                                            @if($shipments_returned->service_charges == null)
                                                                                            @else
                                                                                            {{ $shipments_returned->service_charges }}.00
                                                                                            @endif
                                                                                        </td>
                                                                                        <td></td>
                                                                                        <td>{{ $shipments_returned->order_date }}</td>
                                                                                        <td>{{ $shipments_returned->delivery_attempt }}</td>
                                                                                        <td>{{ $shipments_returned->status_name }}</td>
                                                                                        <td></td>
                                                                                        <td></td>
                                                                                        <td></td>
                                                                                    </tr>
                                                                                @endforeach
                                                                            @else
                                                                                <tr>
                                                                                    <td colspan="6">No Shipments
                                                                                        Available.</td>
                                                                                </tr>
                                                                            @endif
                                                                        </tbody>
                                                                    </table>
                                                                </div>

                                                            </div>

                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="tab-pane" id="tabs-8" role="tabpanel">
                                                <br>
                                                <div class="container-fluid">
                                                    <div class="row">
                                                        <div class="col-lg-12">
                                                            <div class="body">
                                                                <div class="table-responsive check-all-parent">
                                                                    <table id="example"
                                                                        class="table table-bordered myDataTable">
                                                                        <thead>
                                                                            <tr>
                                                                                <th scope="col">
                                                                                    <input type="checkbox" id="selectAll">
                                                                                </th>
                                                                                <th scope="col"> Tracking No Reference
                                                                                </th>
                                                                                <th scope="col"> Courier </th>
                                                                                <th scope="col"> Shipper </th>
                                                                                <th scope="col"> Driver </th>
                                                                                <th scope="col"> Location To </th>
                                                                                <th scope="col"> Receiver </th>
                                                                                <th scope="col"> Remarks </th>
                                                                                <th scope="col"> Internal Remarks </th>
                                                                                <th scope="col"> Account Name</th>
                                                                                <th scope="col"> Service Charges </th>
                                                                                <th scope="col"> CostOfGoods </th>
                                                                                <th scope="col"> Delivery Date </th>
                                                                                <th scope="col"> Delievery Attempt </th>
                                                                                <th scope="col"> STATUS </th>
                                                                                <th scope="col"> ThirdParty Status </th>
                                                                                <th scope="col"> TP Delivery Date </th>
                                                                                <th scope="col"> Tp Remarks </th>
                                                                            </tr>
                                                                        </thead>
                                                                        <tbody>
                                                                            @if ($shipments_cancelled->isNotEmpty())
                                                                                @foreach ($shipments_cancelled as $cancelled)
                                                                                    <tr>
                                                                                        <td><input type="checkbox"
                                                                                                name="checkbox[]"
                                                                                                class="checkbox"
                                                                                                value="{{ $cancelled->id }}">
                                                                                        </td>
                                                                                        <td>
                                                                                            <a href="javascript:void(0);"
                                                                                                id="show-employee"
                                                                                                data-toggle="modal"
                                                                                                data-target=""
                                                                                                data-url="{{ route('admin.shipment.get_edit_orders', ['id' => $cancelled->id]) }}"
                                                                                                onclick="comments({{ $cancelled->id }})">{{ $cancelled->reference_number }}
                                                                                            </a>
                                                                                        </td>
                                                                                        <td></td>
                                                                                        <td>{{ $cancelled->shipper_name }}</td>
                                                                                        <td>
                                                                                            @if ($cancelled->driver_id == null)
                                                                                                <span></span>
                                                                                            @else
                                                                                                <span>{{ $cancelled->employee_name }}</span>
                                                                                                &nbsp;
                                                                                                <span>{{ $cancelled->employee_mobile }}</span>
                                                                                            @endif
                                                                                        </td>
                                                                                        <td>{{ $cancelled->city_name }}</td>
                                                                                        <td>{{ $cancelled->reciver_name }}
                                                                                            <span>{{ $cancelled->mobile_1 }}</span>
                                                                                        </td>
                                                                                        <td>{{ $cancelled->instruction }}</td>
                                                                                        <td></td>
                                                                                        <td>{{ $cancelled->account_name }}</td>
                                                                                        <td>
                                                                                            @if($cancelled->service_charges == null)
                                                                                            @else
                                                                                            {{ $cancelled->service_charges }}.00
                                                                                            @endif
                                                                                        </td>
                                                                                        <td></td>
                                                                                        <td>{{ $cancelled->order_date }}</td>
                                                                                        <td>{{ $cancelled->delivery_attempt }}</td>
                                                                                        <td>{{ $cancelled->status_name }}</td>
                                                                                        <td></td>
                                                                                        <td></td>
                                                                                        <td></td>
                                                                                    </tr>
                                                                                @endforeach
                                                                            @else
                                                                                <tr>
                                                                                    <td colspan="6">No Shipments
                                                                                        Available.</td>
                                                                                </tr>
                                                                            @endif
                                                                        </tbody>
                                                                    </table>
                                                                </div>

                                                            </div>

                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="tab-pane" id="tabs-9" role="tabpanel">
                                                <br>
                                                <div class="container-fluid">
                                                    <div class="row">
                                                        <div class="col-lg-12">
                                                            <div class="body">
                                                                <div class="table-responsive check-all-parent">
                                                                    <table id="example"
                                                                        class="table table-bordered myDataTable">
                                                                        <thead>
                                                                            <tr>
                                                                                <th scope="col">
                                                                                    <input type="checkbox" id="selectAll">
                                                                                </th>
                                                                                <th scope="col"> Tracking No Reference
                                                                                </th>
                                                                                <th scope="col"> Courier </th>
                                                                                <th scope="col"> Shipper </th>
                                                                                <th scope="col"> Driver </th>
                                                                                <th scope="col"> Location To </th>
                                                                                <th scope="col"> Receiver </th>
                                                                                <th scope="col"> Remarks </th>
                                                                                <th scope="col"> Internal Remarks </th>
                                                                                <th scope="col"> Account Name</th>
                                                                                <th scope="col"> Service Charges </th>
                                                                                <th scope="col"> CostOfGoods </th>
                                                                                <th scope="col"> Delivery Date </th>
                                                                                <th scope="col"> Delievery Attempt </th>
                                                                                <th scope="col"> STATUS </th>
                                                                                <th scope="col"> ThirdParty Status </th>
                                                                                <th scope="col"> TP Delivery Date </th>
                                                                                <th scope="col"> Tp Remarks </th>
                                                                            </tr>
                                                                        </thead>
                                                                        <tbody>
                                                                            @if ($shipments_rtos->isNotEmpty())
                                                                                @foreach ($shipments_rtos as $rtos)
                                                                                    <tr>
                                                                                        <td><input type="checkbox"
                                                                                                name="checkbox[]"
                                                                                                class="checkbox"
                                                                                                value="{{ $rtos->id }}">
                                                                                        </td>
                                                                                        <td>
                                                                                            <a href="javascript:void(0);"
                                                                                                id="show-employee"
                                                                                                data-toggle="modal"
                                                                                                data-target=""
                                                                                                data-url="{{ route('admin.shipment.get_edit_orders', ['id' => $rtos->id]) }}"
                                                                                                onclick="comments({{ $rtos->id }})">{{ $rtos->reference_number }}
                                                                                            </a>
                                                                                        </td>
                                                                                        <td></td>
                                                                                        <td>{{ $rtos->shipper_name }}</td>
                                                                                        <td>
                                                                                            @if ($rtos->driver_id == null)
                                                                                                <span></span>
                                                                                            @else
                                                                                                <span>{{ $rtos->employee_name }}</span>
                                                                                                &nbsp;
                                                                                                <span>{{ $rtos->employee_mobile }}</span>
                                                                                            @endif
                                                                                        </td>
                                                                                        <td>{{ $rtos->city_name }}</td>
                                                                                        <td>{{ $rtos->reciver_name }}
                                                                                            <span>{{ $rtos->mobile_1 }}</span>
                                                                                        </td>
                                                                                        <td>{{ $rtos->instruction }}</td>
                                                                                        <td></td>
                                                                                        <td>{{ $rtos->account_name }}</td>
                                                                                        <td>
                                                                                            @if($rtos->service_charges == null)
                                                                                            @else
                                                                                            {{ $rtos->service_charges }}.00
                                                                                            @endif
                                                                                        </td>
                                                                                        <td></td>
                                                                                        <td>{{ $rtos->order_date }}</td>
                                                                                        <td>{{ $rtos->delivery_attempt }}</td>
                                                                                        <td>{{ $rtos->status_name }}</td>
                                                                                        <td></td>
                                                                                        <td></td>
                                                                                        <td></td>
                                                                                    </tr>
                                                                                @endforeach
                                                                            @else
                                                                                <tr>
                                                                                    <td colspan="6">No Shipments
                                                                                        Available.</td>
                                                                                </tr>
                                                                            @endif
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
                    </div>
                </div>
            </div>

            <!-- Add Modal -->
            @include('admin.modal.all_shipment')
            <!-- Add Modal -->

            <!-- Air Ways Bills Modal -->
            @include('admin.modal.print_airways_bills')
            <!-- Air Ways Bills Modal -->


            <!-- Batch Update Modal -->
            @include('admin.modal.batch_update')
            <!-- Batch Update Modal -->

            <!-- Batch Update City Modal -->
            @include('admin.modal.batch_delete')
            <!-- Batch Update City Modal -->

            <!-- Batch Update City Modal -->
            @include('admin.modal.batch_update_city')
            <!-- Batch Update City Modal -->


            <!-- Batch OutScan Modal -->
            @include('admin.modal.batch_outscan')
            <!-- Batch OutScan Modal -->


            <!-- Batch InScan Modal -->
            @include('admin.modal.batch_inscan')
            <!-- Batch InScan Modal -->


            <!-- Batch Comment Modal -->
            @include('admin.modal.batch_comment')
            <!-- Batch Comment Modal -->


            <!-- Assign To Third Party Modal -->
            @include('admin.modal.assign_to_third_party')
            <!-- Assign To Third Party Modal -->



            <!-- UnAssign To Third Party Modal -->
            @include('admin.modal.unassign_to_third_party')
            <!-- UnAssign To Third Party Modal -->


            <!-- Update Service Charges Modal -->
            @include('admin.modal.update_service_charges')
            <!-- Update Service Charges Modal -->

            <!-- Update Service Charges Modal -->
            @include('admin.modal.delete_shipment_images')
            <!-- Update Service Charges Modal -->


        @endsection

        {{-- Scripts Section --}}
        @section('page-scripts')
            <script src="https://cdnjs.cloudflare.com/ajax/libs/FileSaver.js/2.0.5/FileSaver.min.js"></script>
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
                    // Initialize DataTable
                    var table = $('.myDataTable').DataTable();

                    // Handle checkbox click to select rows
                    $('.myDataTable tbody').on('click', 'input[type="checkbox"]', function() {
                        var checkbox = $(this);
                        var row = checkbox.closest('tr');
                        if (checkbox.prop('checked')) {
                            row.addClass('selected');
                        } else {
                            row.removeClass('selected');
                        }
                    });

                    // Handle select all checkbox
                    $('#selectAll').on('click', function() {
                        var checkboxes = $('.myDataTable tbody input[type="checkbox"]');
                        checkboxes.prop('checked', this.checked);
                        checkboxes.each(function() {
                            var row = $(this).closest('tr');
                            if (this.checked) {
                                row.addClass('selected');
                            } else {
                                row.removeClass('selected');
                            }
                        });
                    });

                });

                function fun() {
                    var id = $('#cities :selected').val();
                    // alert(class_id);
                    $.ajax({
                        headers: {
                            'X-CSRF-TOKEN': "{{ csrf_token() }}",
                        },
                        url: "{{ route('admin.shipment.getzone') }}",
                        type: "POST",
                        data: {
                            // session_id : session_id,
                            id: id,
                        },
                        success: function(response) {
                            // alert(response);
                            // console.log(response);
                            // console.log(response.id);
                            // $('#p_id').val(response.id);
                            $('#zones').html(response);

                            // $('#modal-default').modal('show');
                        }
                    });

                }



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
                                <td><a href="javascript:void(0);" id="show-employee" data-toggle="modal" data-target="${item.id ? '{{ route('admin.shipment.get_edit_orders', ['id' => "' + item.id + '"]) }}' : ''}  onclick="comments(${item.id})">${item.reference_number}</a></td>
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


                function search_bar() {
                    var id = $('#search').val();
                    // var name = $('#search').val();
                    // alert(id);
                    $.ajax({
                        headers: {
                            'X-CSRF-TOKEN': "{{ csrf_token() }}",
                        },
                        url: "{{ route('admin.shipment.search_bar') }}",
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
                                <td><input type="checkbox" class="checkbox" value="${item.id}" name="checkbox[]"></td>
                                <td><a href="javascript:void(0);" id="show-employee" data-toggle="modal" data-target="${item.id ? '{{ route('admin.shipment.get_edit_orders', ['id' => "' + item.id + '"]) }}' : ''}  onclick="comments(${item.id})">${item.reference_number}</a></td>
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

                function data() {
                    $.ajax({
                        headers: {
                            'X-CSRF-TOKEN': "{{ csrf_token() }}",
                        },
                        url: "{{ route('admin.shipment.data') }}",
                        type: "POST",
                        success: function(response) {
                            // console.log(response);
                            var responseData = response;
                            var html = "";

                            responseData.forEach((item) => {
                                html += `<tr>
                                <td><input type="checkbox" class="checkbox" value="${item.id}" name="checkbox[]"></td>
                                <td><a href="javascript:void(0);" id="show-employee" data-toggle="modal" data-target="${item.id ? '{{ route('admin.shipment.get_edit_orders', ['id' => "' + item.id + '"]) }}' : ''}  onclick="comments(${item.id})">${item.reference_number}</a></td>
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


                // // Array to hold selected checkbox IDs
                var selectedIDs = [];

                // Checkbox click event handler using event delegation
                $(document).on('change', '.checkbox', function() {
                    var id = $(this).val();
                    // alert(id);
                    if (this.checked) {
                        selectedIDs.push(id);
                    } else {
                        var index = selectedIDs.indexOf(id);
                        if (index !== -1) {
                            selectedIDs.splice(index, 1);
                        }
                    }
                });

                // Menu item click event handler
                $('#batch_delete_link').on('click', function() {
                    const reviewElement = document.getElementById('batchDeleteModalContent');
                    reviewElement.value = (selectedIDs.length > 0) ?
                        selectedIDs.join(',') :
                        '';

                    // Open the modal
                    $('#batch_delete').modal('show');
                });

                $('#print_airways_bills_link').on('click', function() {
                    const reviewElement = document.getElementById('batchPrintAirwaysBillsModalContent');
                    reviewElement.value = (selectedIDs.length > 0) ?
                        selectedIDs.join(',') :
                        '';

                    // Send AJAX request
                    $.ajax({
                        headers: {
                            'X-CSRF-TOKEN': "{{ csrf_token() }}",
                        },
                        url: "{{ route('admin.shipment.get_update') }}",
                        type: "POST",
                        data: {
                            id: selectedIDs,
                        },
                        success: function(response) {
                            // console.log(response);
                            // Extract the array of reference numbers from the response
                            const idNumbers = response.map(item => item.id);
                            const referenceNumbers = response.map(item => item.reference_number);

                            // Join the reference numbers into a single string
                            const combinedIdNumbers = idNumbers.join(',');
                            const combinedReferenceNumbers = referenceNumbers.join(',');

                            // Set the value of the input fields
                            $('#pab_id').val(combinedIdNumbers);
                            $('#pab_tracking').val(combinedReferenceNumbers);
                            // $('#u_status').val(response[0].status);
                            // $('#u_comments').val(response[0].comments);

                            // Open the modal
                            $('#print_airways_bills').modal('show');
                        }
                    });
                });

                $('#batch_update_link').on('click', function() {
                    const reviewElement = document.getElementById('batchUpdateModalContent');
                    reviewElement.value = (selectedIDs.length > 0) ?
                        selectedIDs.join(',') :
                        '';

                    // Send AJAX request
                    $.ajax({
                        headers: {
                            'X-CSRF-TOKEN': "{{ csrf_token() }}",
                        },
                        url: "{{ route('admin.shipment.get_update') }}",
                        type: "POST",
                        data: {
                            id: selectedIDs,
                        },
                        success: function(response) {
                            // console.log(response);
                            // Extract the array of reference numbers from the response
                            const idNumbers = response.map(item => item.id);
                            const referenceNumbers = response.map(item => item.reference_number);

                            // Join the reference numbers into a single string
                            const combinedIdNumbers = idNumbers.join(',');
                            const combinedReferenceNumbers = referenceNumbers.join(',');

                            // Set the value of the input fields
                            $('#u_id').val(combinedIdNumbers);
                            $('#u_tracking').val(combinedReferenceNumbers);
                            // $('#u_status').val(response[0].status);
                            // $('#u_comments').val(response[0].comments);

                            // Open the modal
                            $('#batch_update').modal('show');
                        }
                    });
                });

                $('#batch_city_update_link').on('click', function() {
                    const reviewElement = document.getElementById('batchCityUpdateModalContent');
                    reviewElement.value = (selectedIDs.length > 0) ?
                        selectedIDs.join(',') :
                        '';

                    // Send AJAX request
                    $.ajax({
                        headers: {
                            'X-CSRF-TOKEN': "{{ csrf_token() }}",
                        },
                        url: "{{ route('admin.shipment.get_update') }}",
                        type: "POST",
                        data: {
                            id: selectedIDs,
                        },
                        success: function(response) {
                            // console.log(response);
                            // Extract the array of reference numbers from the response
                            const idNumbers = response.map(item => item.id);
                            const referenceNumbers = response.map(item => item.reference_number);

                            // Join the reference numbers into a single string
                            const combinedIdNumbers = idNumbers.join(',');
                            const combinedReferenceNumbers = referenceNumbers.join(',');

                            // Set the value of the input fields
                            $('#c_id').val(combinedIdNumbers);
                            $('#c_tracking').val(combinedReferenceNumbers);
                            // $('#u_status').val(response[0].status);
                            // $('#u_comments').val(response[0].comments);

                            // Open the modal
                            $('#batch_update_city').modal('show');
                        }
                    });
                });

                $('#batch_outscan_link').on('click', function() {
                    const reviewElement = document.getElementById('batchOutscanModalContent');
                    reviewElement.value = (selectedIDs.length > 0) ?
                        selectedIDs.join(',') :
                        '';

                    // Send AJAX request
                    $.ajax({
                        headers: {
                            'X-CSRF-TOKEN': "{{ csrf_token() }}",
                        },
                        url: "{{ route('admin.shipment.get_update') }}",
                        type: "POST",
                        data: {
                            id: selectedIDs,
                        },
                        success: function(response) {
                            // console.log(response);
                            // Extract the array of reference numbers from the response
                            const idNumbers = response.map(item => item.id);
                            const referenceNumbers = response.map(item => item.reference_number);

                            // Join the reference numbers into a single string
                            const combinedIdNumbers = idNumbers.join(',');
                            const combinedReferenceNumbers = referenceNumbers.join(',');

                            // Set the value of the input fields
                            $('#o_id').val(combinedIdNumbers);
                            $('#o_tracking').val(combinedReferenceNumbers);
                            // $('#u_status').val(response[0].status);
                            // $('#u_comments').val(response[0].comments);

                            // Open the modal
                            $('#batch_outscan').modal('show');
                        }
                    });
                });

                $('#batch_inscan_link').on('click', function() {
                    const reviewElement = document.getElementById('batchInscanModalContent');
                    reviewElement.value = (selectedIDs.length > 0) ?
                        selectedIDs.join(',') :
                        '';

                    // Send AJAX request
                    $.ajax({
                        headers: {
                            'X-CSRF-TOKEN': "{{ csrf_token() }}",
                        },
                        url: "{{ route('admin.shipment.get_update') }}",
                        type: "POST",
                        data: {
                            id: selectedIDs,
                        },
                        success: function(response) {
                            // console.log(response);
                            // Extract the array of reference numbers from the response
                            const idNumbers = response.map(item => item.id);
                            const referenceNumbers = response.map(item => item.reference_number);

                            // Join the reference numbers into a single string
                            const combinedIdNumbers = idNumbers.join(',');
                            const combinedReferenceNumbers = referenceNumbers.join(',');

                            // Set the value of the input fields
                            $('#i_id').val(combinedIdNumbers);
                            $('#i_tracking').val(combinedReferenceNumbers);
                            // $('#u_status').val(response[0].status);
                            // $('#u_comments').val(response[0].comments);

                            // Open the modal
                            $('#batch_inscan').modal('show');
                        }
                    });
                });

                $('#batch_comment_link').on('click', function() {
                    const reviewElement = document.getElementById('batchCommentModalContent');
                    reviewElement.value = (selectedIDs.length > 0) ?
                        selectedIDs.join(',') :
                        '';

                    // Send AJAX request
                    $.ajax({
                        headers: {
                            'X-CSRF-TOKEN': "{{ csrf_token() }}",
                        },
                        url: "{{ route('admin.shipment.get_update') }}",
                        type: "POST",
                        data: {
                            id: selectedIDs,
                        },
                        success: function(response) {
                            // console.log(response);
                            // Extract the array of reference numbers from the response
                            const idNumbers = response.map(item => item.id);
                            const referenceNumbers = response.map(item => item.reference_number);

                            // Join the reference numbers into a single string
                            const combinedIdNumbers = idNumbers.join(',');
                            const combinedReferenceNumbers = referenceNumbers.join(',');

                            // Set the value of the input fields
                            $('#co_id').val(combinedIdNumbers);
                            $('#co_tracking').val(combinedReferenceNumbers);
                            // $('#u_status').val(response[0].status);
                            // $('#u_comments').val(response[0].comments);

                            // Open the modal
                            $('#batch_comment').modal('show');
                        }
                    });
                });

                $('#batch_service_link').on('click', function() {
                    const reviewElement = document.getElementById('batchServiceModalContent');
                    reviewElement.value = (selectedIDs.length > 0) ?
                        selectedIDs.join(',') :
                        '';

                    // Send AJAX request
                    $.ajax({
                        headers: {
                            'X-CSRF-TOKEN': "{{ csrf_token() }}",
                        },
                        url: "{{ route('admin.shipment.get_update') }}",
                        type: "POST",
                        data: {
                            id: selectedIDs,
                        },
                        success: function(response) {
                            // console.log(response);
                            // Extract the array of reference numbers from the response
                            const idNumbers = response.map(item => item.id);
                            const referenceNumbers = response.map(item => item.reference_number);

                            // Join the reference numbers into a single string
                            const combinedIdNumbers = idNumbers.join(',');
                            const combinedReferenceNumbers = referenceNumbers.join(',');

                            // Set the value of the input fields
                            $('#s_id').val(combinedIdNumbers);
                            $('#s_tracking').val(combinedReferenceNumbers);
                            // $('#u_status').val(response[0].status);
                            // $('#u_comments').val(response[0].comments);

                            // Open the modal
                            $('#update_service_charges').modal('show');
                        }
                    });
                });

                $('#batch_assign_to_third_party_link').on('click', function() {
                    const reviewElement = document.getElementById('batchAssignToThirdPartyModalContent');
                    reviewElement.value = (selectedIDs.length > 0) ?
                        selectedIDs.join(',') :
                        '';
                    // Send AJAX request
                    $.ajax({
                        headers: {
                            'X-CSRF-TOKEN': "{{ csrf_token() }}",
                        },
                        url: "{{ route('admin.shipment.get_update') }}",
                        type: "POST",
                        data: {
                            id: selectedIDs,
                        },
                        success: function(response) {
                            // console.log(response);
                            // Extract the array of reference numbers from the response
                            const idNumbers = response.map(item => item.id);
                            const referenceNumbers = response.map(item => item.reference_number);

                            // Join the reference numbers into a single string
                            const combinedIdNumbers = idNumbers.join(',');
                            const combinedReferenceNumbers = referenceNumbers.join(',');

                            // Set the value of the input fields
                            $('#attp_id').val(combinedIdNumbers);
                            $('#attp_tracking').val(combinedReferenceNumbers);
                            // $('#u_status').val(response[0].status);
                            // $('#u_comments').val(response[0].comments);

                            // Open the modal
                            $('#assign_to_third_party').modal('show');
                        }
                    });
                });


                $("body").on("click", "#show-employee", function() {
                    var candidateURL = $(this).data('url');

                    // Use a consistent indentation level for better readability
                    $.ajaxSetup({
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        }
                    });

                    $.get(candidateURL, function(data) {
                        var fullName = data.driver_code + '|' + data.employee_name;
                        var sender_address =
                            `${data.shipper_country_name}, ${data.shipper_city_name}, ${data.shipper_area_name}`;
                        var receiver_address =
                            `${data.shipment_country_name}, ${data.shipment_city_name}, ${data.shipment_area_name}`;

                        $('#allshipment').modal('show');

                        // console.log(data);
                        $('.s-id').val(data.id);
                        $('.s-reference_number').val(data.reference_number);


                        // Use a single point of reference for accessing DOM elements
                        var modalElements = {
                            'o-id': data.id,
                            'o-driver_code': fullName,
                            'o-reference_number': data.reference_number,
                            'o-awb_number': data.awb_number,
                            'o-shipper_name': data.shipper_name,
                            'o-contact_office_1': data.contact_office_1,
                            'o-mobile_1': data.mobile_1,
                            'o-reciver_name': data.reciver_name,
                            'o-actual_weight': data.actual_weight,
                            'o-service_type': data.service_type,
                            'o-no_of_peices': data.no_of_peices,
                            'o-cod': data.cod,
                            'o-sender_address': sender_address,
                            'o-reciver_address': receiver_address
                        };

                        for (var key in modalElements) {
                            $('#' + key).html(modalElements[key]);
                        }

                        var responseData = data;

                        if (Array.isArray(responseData)) {
                            console.log("Response data is an array.");
                        } else {
                            var detailsValues = responseData.details_of_products.split(',');

                            // Trim any whitespace around each value
                            detailsValues = detailsValues.map(value => value.trim());

                            var codPieceValues = responseData.cod_peice.split(',');

                            if (detailsValues.length === codPieceValues.length) {
                                var productsHtml = "";
                                for (var i = 0; i < detailsValues.length; i++) {
                                    var index = i + 1;
                                    productsHtml += `
                                    <div class="product">
                                        <span class="index">${index}</span>
                                        &nbsp;
                                        <span class="details">${detailsValues[i]}</span>
                                        &nbsp;
                                        <span class="cod-piece">${codPieceValues[i]}</span>
                                    </div>`;
                                }

                                // Use jQuery to set the generated HTML content to the element with id "changes"
                                $('#changes').html(productsHtml);
                            } else {
                                console.log("Number of details and cod piece values do not match.");
                            }
                        }

                        // ... The rest of your code ...

                    });

                });

                $('.close_modal').click(function() {
                    $('#allshipment').modal('hide');
                });

                // Define the comments function
                function comments(id) {
                    var ShipId = id;
                    // alert(id);
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

                    $.ajax({
                        headers: {
                            'X-CSRF-TOKEN': "{{ csrf_token() }}",
                        },
                        url: "{{ route('admin.shipment.get_images') }}",
                        type: "POST",
                        data: {
                            id: id,
                        },
                        success: function(response) {
                            var imagesContainer = $('#images');
                            if (response[0] == null) {
                                var defaultImage = `
                                <div class="col-12 mt-2 mb-2">
                                    <div class="image-wrapper" style="position: relative;">
                                        <img class="imgfix"
                                            src="https://saveabandonedbabies.org/wp-content/uploads/2015/08/default.png"
                                            width="300" height="200">
                                    </div>
                                </div>
                            `;
                                imagesContainer.html(defaultImage);
                            } else {
                                var html = response.map(function(file) {
                                    return `
                                    <div class="col-12 mt-2 mb-2" data-shipmentimage-id="${file.id}">
                                        <div class="image-wrapper" style="position: relative;">
                                            <img class="imgfix"
                                                src="{{ asset('shippment_files_images') }}/${file.selected_file}"
                                                width="300" height="200">
                                                <button type="button" class="images-delete-btn btn btn-danger btn-sm fa fa-trash"
                                                data-shipmentimage-id="${file.id}" data-toggle="modal"
                                                data-target="#shipmentimagesdeleteModal" style="position: absolute; top: 10px; left: 250px;"></button>
                                        </div>
                                    </div>
                                `;
                                }).join('');
                                imagesContainer.html(html);
                            }
                        },
                        error: function(xhr, status, error) {
                            console.error(error);
                        }
                    });
                }


    function exportToExcel(selectedIDs) {
    // Send an AJAX request to get data
    $.ajax({
        headers: {
            'X-CSRF-TOKEN': "{{ csrf_token() }}",
        },
        url: "{{ route('admin.shipment.exportToExcel') }}",
        type: "POST",
        data: {
            id: selectedIDs,
        },
        xhrFields: {
            responseType: 'blob' // This is important for handling binary data
        },
        success: function (response, status, xhr) {
            const blob = response;
            const fileName = 'ExportExcel.xlsx';

            // Trigger the download using FileSaver.js
            saveAs(blob, fileName);
        },
        error: function (xhr, textStatus, error) {
            // Handle AJAX error
            console.error("Export failed:", error);
            // Add user-friendly error handling here
        }
    });
}

function detailsexportToExcel(selectedIDs) {
    // Send an AJAX request to get data
    $.ajax({
        headers: {
            'X-CSRF-TOKEN': "{{ csrf_token() }}",
        },
        url: "{{ route('admin.shipment.detailsexportToExcel') }}",
        type: "POST",
        data: {
            id: selectedIDs,
        },
        xhrFields: {
            responseType: 'blob' // This is important for handling binary data
        },
        success: function (response, status, xhr) {
            const blob = response;
            const fileName = 'ExportExcel.xlsx';

            // Trigger the download using FileSaver.js
            saveAs(blob, fileName);
        },
        error: function (xhr, textStatus, error) {
            // Handle AJAX error
            console.error("Export failed:", error);
            // Add user-friendly error handling here
        }
    });
}
            </script>
        @endsection

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
                                        <label class="text-lg-right col-form-label">Date<span
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
                                            <select class="form-control kt-select2 select2" id="" name="param"
                                                style="width: 80%;">
                                                <option value="DR0002 | Irfan Ullah Moula Din">DR0002 | Irfan Ullah
                                                    Moula Din
                                                </option>
                                                <option value="DR0003 | Mohsin Raza">DR0003 | Mohsin Raza</option>
                                                <option value="DR0004 | M Umer Nawaz">DR0004 | M Umer Nawaz</option>
                                                <option value="DR0005 | Hamid Hussain Mahar">DR0005 | Hamid Hussain
                                                    Mahar
                                                </option>
                                                <option value="DR0006 | Shazaib Hassan">DR0006 | Shazaib Hassan
                                                </option>
                                                <option value="DR0007 | Remote Driver">DR0007 | Remote Driver
                                                </option>
                                                <option value="DR0008 | Abid Nazir Nazir Ahmed">DR0008 | Abid Nazir
                                                    Nazir Ahmed
                                                </option>
                                                <option value="DR0009 | Azeem Javed">DR0009 | Azeem Javed</option>
                                                <option value="DR00010 | Uzair Fida">DR00010 | Uzair Fida</option>
                                                <option value="DR00011 | Ali Raza">DR00011 | Ali Raza</option>
                                                <option value="DR00012 | Night Shift Driver">DR00012 | Night Shift
                                                    Driver
                                                </option>
                                                <option value="DR00013 | Meesam M">DR00013 | Meesam M</option>
                                                <option value="DR00014 | Sikandar Hayat Sikandar">DR00014 | Sikandar
                                                    Hayat
                                                    Sikandar</option>
                                                <option value="DR00015 | Waqas Ahmed">DR00015 | Waqas Ahmed</option>
                                                <option value="DR00016 | Syed Waseem">DR00016 | Syed Waseem</option>
                                                <option value="DR00017 | Nadir Khan ">DR00017 | Nadir Khan </option>
                                                <option value="DR00018 | Umer Nasir">DR00018 | Umer Nasir</option>
                                                <option value="DR00019 | Sada Hussain">DR00019 | Sada Hussain
                                                </option>
                                                <option value="DR00020 | Muhammad Waqas AUH">DR00020 | Muhammad
                                                    Waqas AUH
                                                </option>
                                                <option value="DR00021 | Wajid Nawaz">DR00021 | Wajid Nawaz</option>
                                                <option value="DR00022 | M Zahid">DR00022 | M Zahid</option>
                                                <option value="DR00023 | Shoaib Ahmed">DR00023 | Shoaib Ahmed
                                                </option>
                                                <option value="DR00024 | M Usama">DR00024 | M Usama</option>
                                                <option value="DR00025 | Muhammad Qasim khalid Mehboob">DR00025 |
                                                    Muhammad
                                                    Qasim khalid Mehboob</option>
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
                                            <select class="form-control kt-select2 select2" id="" name="param"
                                                style="width: 80%;">
                                                <option value="">Abu Dhabi</option>
                                                <option value="">Dubai</option>
                                                <option value="">Sharjah</option>
                                                <option value="">Ajman</option>
                                                <option value="">Al Ain</option>
                                                <option value="">Fujeriah</option>
                                                <option value="">Um Al Qwain</option>
                                                <option value="">Ras Al Khaimah</option>
                                                <option value="">Out Of Service Area</option>
                                                <option value="">Abu Dhabi 50</option>
                                                <option value="">Al Ain 50</option>
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
                                            <select class="form-control kt-select2 select2" id="" name="param"
                                                style="width: 80%;">
                                                <option value="">Please Select Zone</option>
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
                                            <select class="form-control kt-select2 select2" id="" name="param"
                                                style="width: 80%;">
                                                <option value="">Please Select Areas</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>


                            </div>

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
                                            <button type="button" class="btn btn-danger btn-sm"><i class="fa-solid fa-pen-to-square"></i>Update Job Code</button>
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
    </script>
@endsection

{{-- Extends layout --}}
@extends('layouts.admin')
@section('page_title', ' Collection Jobs')
{{-- Content --}}
@section('content')
    <div class="card-body">
        <div class="row p-4 bg-light" style="margin-left: 0.1rem; margin-right: 0.1rem;">
            <div class="card card-custom example example-compact w-100">
                <h2 class="card-title ml-4">
                    Collection Jobs
                </h2>
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-12">
                            <div class="row" style="margin-left: 69rem;">
                                <div class="col-12" style="margin-top: 45px;">
                                    <div class="form-group">
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
                                            <select class="form-control kt-select2 select2" id=""
                                                name="param">
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
                                        <label class="text-lg-right col-form-label">Shipper<span
                                                class="text-danger">*</span></label>
                                        <div class="input-group m-b-10">
                                            <div class="input-group-prepend"><span class="input-group-text">
                                                    <i class="fas fa-lg fa-fw fa-user"></i></span></div>
                                            <select class="form-control kt-select2 select2" id=""
                                                name="param">
                                                <option value="SH00032 | Easy Deal Offers  | 05076768978">SH00032 | Easy
                                                    Deal
                                                    Offers | 05076768978</option>
                                                <option value="SH00031 | Venture Delights  | 0563084528">SH00031 |
                                                    Venture
                                                    Delights | 0563084528</option>
                                                <option value="SH00030 | E-Mart  | 0586062443">SH00030 | E-Mart |
                                                    0586062443
                                                </option>
                                                <option value="SH00029 | The 7th Avenue  | 0569563433">SH00029 | The 7th
                                                    Avenue
                                                    | 0569563433</option>
                                                <option value="SH00028 | Jetronics L.L.C  | 0589989090">SH00028 |
                                                    Jetronics
                                                    L.L.C | 0589989090</option>
                                                <option value="SH00027 | Everal UAE  | 526512699">SH00027 | Everal UAE |
                                                    526512699</option>
                                                <option value="SH00026 | Authentic Makeup By Aariana UAE  | 0506032006">
                                                    SH00026
                                                    | Authentic Makeup By Aariana UAE | 0506032006</option>
                                                <option value="SH00025 | Amina's Collection  | 0565793182">SH00025 |
                                                    Amina's
                                                    Collection | 0565793182</option>
                                                <option value="SH00024 | Future Networks  | 0507377290">SH00024 | Future
                                                    Networks | 0507377290</option>
                                                <option value="SH00023 | MSH ESTORE  | 0544036512">SH00023 | MSH ESTORE
                                                    |
                                                    0544036512</option>
                                            </select>

                                        </div>
                                    </div>
                                </div>

                                <div class="col-4">
                                    <div class="form-group">
                                        <label class="text-lg-right col-form-label">City<span
                                                class="text-danger">*</span></label>
                                        <div class="input-group m-b-10">
                                            <div class="input-group-prepend"><span class="input-group-text">
                                                    <i class="fas fa-lg fa-fw fa-flag"></i></span></div>
                                            <select class="form-control kt-select2 select2" id=""
                                                name="param">
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
                                        <label class="text-lg-right col-form-label">Status<span
                                                class="text-danger">*</span></label>
                                        <div class="input-group m-b-10">
                                            <div class="input-group-prepend"><span class="input-group-text">
                                                    <i class="fas fa-lg fa-fw fa-flag"></i></span></div>
                                            <select class="form-control kt-select2 select2" id=""
                                                name="param">
                                                <option value="">All</option>
                                                <option value="">Assigned</option>
                                                <option value="">Completed</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>


                            </div>
                            <div class="row">
                                <div class="col-4" style="margin-top: 45px;">
                                    <div class="form-group">
                                        <button type="button" class="btn btn-primary btn-sm"><i
                                                class="fa fa-spinner"></i>Load</button>
                                    </div>
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-12">
                                    <div class="body">
                                        <div class="table-responsive check-all-parent">
                                            <table class="table table-hover m-b-0 c_list myDataTable" id="">
                                                <thead>
                                                    <tr>
                                                        <th><input type="checkbox" id="" name=""
                                                                value=""></th>
                                                        <th> Sr </th>
                                                        <th> Shipper  </th>
                                                        <th> Driver </th>
                                                        <th> Total Collected </th>
                                                        <th> Manifest No </th>
                                                        <th> Job Status </th>
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
            $('.myDataTable').DataTable();
        });
    </script>
@endsection


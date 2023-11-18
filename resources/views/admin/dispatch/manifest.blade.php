{{-- Extends layout --}}
@extends('layouts.admin')
@section('page_title', 'Shipper Manifest')
{{-- Content --}}
@section('content')
    <div class="card-body">
        <div class="row p-4 bg-light" style="margin-left: 0.1rem; margin-right: 0.1rem;">
            <div class="card card-custom example example-compact w-100">
                <h2 class="card-title ml-4">
                    Shipper Manifest
                </h2>
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-12">
                            <div class="row">
                                <div class="col-3">
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

                                <div class="col-3">
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

                                <div class="col-3">
                                    <div class="form-group">
                                        <label class="text-lg-right col-form-label">Shipper<span
                                                class="text-danger">*</span></label>
                                        <div class="input-group m-b-10">
                                            <div class="input-group-prepend"><span class="input-group-text">
                                                    <i class="fas fa-lg fa-fw fa-user"></i></span></div>
                                            <select class="form-control kt-select2 select2" id="" name="param">
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

                                <div class="col-3">
                                    <div class="form-group">
                                        <label class="text-lg-right col-form-label">Driver<span
                                                class="text-danger">*</span></label>
                                        <div class="input-group m-b-10">
                                            <div class="input-group-prepend"><span class="input-group-text">
                                                    <i class="fas fa-lg fa-fw fa-building"></i></span></div>
                                            <select class="form-control kt-select2 select2" id="" name="param">
                                                <option value="">All</option>
                                                <option value="">Un-Finalized</option>
                                                <option value="">Mark Final For Today</option>
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
                                                        <th> Manifest NO. </th>
                                                        <th> Shipper Code </th>
                                                        <th> Shipper Name </th>
                                                        <th> Total Shipment</th>
                                                        <th> Status </th>
                                                        <th> Manifest Date </th>
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

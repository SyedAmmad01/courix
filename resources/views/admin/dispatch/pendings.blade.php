{{-- Extends layout --}}
@extends('layouts.admin')
@section('page_title', 'Collection Pendings')
{{-- Content --}}
@section('content')
    <div class="card-body">
        <div class="row p-4 bg-light" style="margin-left: 0.1rem; margin-right: 0.1rem;">
            <div class="card card-custom example example-compact w-100">
                <h2 class="card-title ml-4">
                    Collection Pendings
                </h2>
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-12">
                            <div class="row">
                                <div class="col-5">
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

                                <div class="col-5">
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

                                <div class="col-2" style="margin-top: 45px;">
                                    <div class="form-group">
                                        <button type="button" class="btn btn-primary btn-sm"><i class="fa fa-spinner"></i>Load</button>
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
                                                        <th> Shipper Name </th>
                                                        <th> Shipper Address </th>
                                                        <th> Total Shipment</th>
                                                        <th> Action </th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <tr>
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

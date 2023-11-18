@extends('layouts.front')
@section('page_title', 'Manifests Page')
@section('content')
<h1 class="card-title mt-5" style="margin-left: 1rem;"><i class="fas fa-fw fa-cube fa-sm text-dark"></i>
    Shipper Manifest
</h1>
    <div class="card-body">
        <div class="row p-4 bg-light" style="margin-left: 0.1rem; margin-right: 0.1rem;">
            <div class="card card-custom example example-compact w-100">
                    <div class="row">
                        <div class="col-12">
                            <div class="row">
                                <div class="col-3">
                                    <div class="form-group">
                                        <label class="text-lg-right col-form-label">Created From Date <span
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
                                        <label class="text-lg-right col-form-label">Created To Date<span
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
                                        <label class="text-lg-right col-form-label">Manifest Status<span
                                                class="text-danger">*</span></label>
                                        <div class="input-group m-b-10">
                                            <div class="input-group-prepend"><span class="input-group-text">
                                                    <i class="fas fa-lg fa-fw fa-building"></i></span></div>
                                            <select class="form-control kt-select2" id="" name="param">
                                                <option value="">All</option>
                                                <option value="">Un-Finalized</option>
                                                <option value="">Mark Final For Today</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-4" style="margin-top: 10px;">
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

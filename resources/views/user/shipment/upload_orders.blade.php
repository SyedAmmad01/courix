@extends('layouts.front')
@section('page_title', 'Upload Orders Page')
@section('content')
    <h1 class="card-title mt-5" style="margin-left: 1rem;">
        Place Order By Uploading
    </h1>
    <div class="card-body">
        <div>
            <div class="row p-4 bg-light" style="margin-left: 0.1rem; margin-right: 0.1rem;">
                <div class="card card-custom example example-compact w-100">
                    <div class="container">
                        <div class="row">
                            <div class="col-sm-2 col-md-1">
                                <button class="btn btn-primary btn-sm btn-block" type="button">Import</button>
                            </div>
                            <div class="col-sm-4 col-md-2 mt-2 mt-md-0">
                                <a id="" class="btn btn-primary btn-sm btn-block" href="#" target="_blank"
                                    style="cursor:pointer"><i class="fa fa-download"></i>Download Sample</a>
                            </div>
                            <div class="col-sm-4 col-md-2 mt-2 mt-md-0">
                                <a id="" class="btn btn-danger btn-sm btn-block" href="#" target="_blank"
                                    style="cursor:pointer"><i class="fa fa-download"></i>Country ISO Codes</a>
                            </div>
                            <div class="col-sm-4 col-md-2 mt-2 mt-md-0">
                                <a id="" class="btn btn-secondary btn-sm btn-block" href="#" target="_blank"
                                    style="cursor:pointer"><i class="fa fa-download"></i>City Codes</a>
                            </div>
                        </div>
                    </div>
                    <hr>
                    <div class="container">
                        <div class="row">
                            <div class="col-12">
                                <div class="body">
                                    <div class="table-responsive check-all-parent">
                                        <table class="table table-hover m-b-0 c_list" id="myDataTable">
                                            <thead>
                                                <tr>
                                                    <th> Service Type </th>
                                                    <th> Recipient Name </th>
                                                    <th> COD </th>
                                                    <th> Mobile Number </th>
                                                    <th> Shipper Ref </th>
                                                    <th> Area Name </th>
                                                    <th> Address/Country </th>
                                                    <th> Instructions </th>
                                                    <th> NOP </th>
                                                    <th> Weight </th>
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

@section('page-scripts')
<script src="{{ asset('js/pages/widgets.js') }}" type="text/javascript"></script>
        <script>
            $(document).ready(function() {
                $(".select2").select2();
                $('#myDataTable').DataTable();
            });
            </script>
@endsection

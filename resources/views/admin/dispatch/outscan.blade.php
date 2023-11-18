{{-- Extends layout --}}
@extends('layouts.admin')
@section('page_title', 'Outscan')
{{-- Content --}}
@section('content')
    <div class="card-body">
        <div class="row p-4 bg-light" style="margin-left: 0.1rem; margin-right: 0.1rem;">
            <div class="card card-custom example example-compact w-100">
                <h2 class="card-title ml-2 mr-2">
                    OutScan
                </h2>
                <div class="row ml-2 mr-2">
                    <div class="col-4">
                        <div class="form-group">
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
                            <div class="input-group m-b-10">
                                <div class="input-group-prepend"><span class="input-group-text">
                                        <i class="fas fa-lg fa-fw fa-user"></i></span></div>
                                <select class="form-control kt-select2 select2" id="" name="param" style="width:80%;">
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
                <hr>
                <div class="row ml-2 mr-2">
                    <div class="col-6">
                        <div class="form-group">
                            <div class="input-group">
                                <input type="text" id="" name="" placeholder="123.."
                                    class="form-control" style="border-radius:20px;">
                                &nbsp;
                                <button type="button" class="btn btn-primary btn-sm"
                                    style="border-radius:20px;"><i
                                        class="fas fa-lg fa-fw fa-sign-out-alt"></i>Outscan</button>
                            </div>
                        </div>
                    </div>

                    <div class="col-2">
                    </div>

                    <div class="col-4">
                        <div class="form-group">
                            <div class="input-group">
                                <button type="button" class="btn btn-primary btn-sm">
                                    <i class="fas fa-lg fa-fw fa-sign-in-alt"></i>Assign Shipment</button>

                                &nbsp;
                                <button type="button" class="btn btn-primary btn-sm">
                                    <i class="fas fa-lg fa-fw fa-sign-out-alt"></i>Print Job Code</button>
                            </div>
                        </div>
                    </div>

                </div>
                <div class="row ml-2 mr-2 mt-5">
                    <div class="col-10">
                    </div>

                    <div class="col-2">
                        <div class="form-group">
                            <button type="button" class="btn btn-primary btn-sm">
                                <i class="fas fa-lg fa-fw fa-truck"></i>PDF Report</button>
                        </div>
                    </div>

                </div>
                <div class="row ml-2 mr-2">
                    <div class="col-12">
                        <div class="body">
                            <div class="table-responsive check-all-parent">
                                <table class="table table-hover m-b-0 c_list myDataTable" id="">
                                    <thead>
                                        <tr>
                                            <th><input type="checkbox" class="from-check-input"></th>
                                            <th> Job Code </th>
                                            <th> Tracking No </th>
                                            <th> Shipper Ref </th>
                                            <th> Area </th>
                                            <th> Receipent Address </th>
                                            <th> Job Status </th>
                                            <th> Action </th>
                                            <th> jobID </th>

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
@endsection
{{-- Scripts Section --}}
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

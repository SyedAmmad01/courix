@extends('layouts.front')
@section('page_title', 'Address Book Page')
{{-- Content --}}
@section('content')
    <style>
        .nav.nav-tabs .nav-item {
            width: 14rem;
        }

        /* width */
        /* ::-webkit-scrollbar {
                                                                                                    width: 5px;

                                                                                                } */

        /* Track */
        /* ::-webkit-scrollbar-track {
                                                                                                    box-shadow: inset 0 0 5px grey;
                                                                                                    border-radius: 10px;

                                                                                                } */

        /* Handle */
        /* ::-webkit-scrollbar-thumb {
                                                                                                    background: #f0c497;
                                                                                                    border-radius: 10px;


                                                                                                } */

        /* Handle on hover */
        /* ::-webkit-scrollbar-thumb:hover {
                                                                                                    background: #f0c497;

                                                                                                } */

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
                <div class="row ml-2">
                    <div class="col-10">
                        <div class="form-group">
                            <div class="input-group">
                                <input type="text" id="" name="" placeholder="Search" class="form-control">
                                <div class="input-group-append">
                                    {{-- <div><button class="hold">Click me!</button></div> --}}
                                    <button class="btn btn-secondary hold" type="button">
                                        <i class="fas fa-lg fa-filter"></i>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-2">
                        <div class="form-group">
                            <div class="input-group">
                                <div class="dropdown">
                                      <button type="button" class="btn btn-primary btn-sm mt-1" data-toggle="modal" data-target="#exampleModal">
                                        Add
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="container-fluid mt-5 hidden" style="display:none;">
                    <div class="row">
                        <div class="col-4">
                            <div class="form-group">
                                <label class="text-lg-right col-form-label">Country<span
                                        class="text-danger">*</span></label>
                                <select class="form-control" id="" name="param">
                                    <option value="AD">Abu Dhabi</option>
                                    <option value="D">Dubai</option>
                                    <option value="S">Sharjah</option>
                                    <option value="A">Ajman</option>
                                    <option value="AA">Al Ain</option>
                                    <option value="F">Fujeriah</option>
                                    <option value="UAQ">Um Al Qwain</option>
                                    <option value="RAK">Ras Al Khaimah</option>
                                    <option value="OOSA">Out Of Service Area</option>
                                    <option value="AA50">Abu Dhabi 50</option>
                                    <option value="AA50">Al Ain 50</option>
                                </select>
                            </div>

                        </div>

                        <div class="col-4">
                            <div class="form-group">
                                <label class="text-lg-right col-form-label">City Name<span
                                        class="text-danger">*</span></label>
                                <div class="input-group m-b-10">
                                    <select class="form-control" id="" name="param">
                                    </select>
                                </div>
                            </div>

                        </div>

                        <div class="col-4">
                            <div class="form-group">
                                <label class="text-lg-right col-form-label">Area<span class="text-danger">*</span></label>
                                <div class="input-group m-b-10">
                                    <div class="input-group m-b-10">
                                        <input type="text" id="" name="" class="form-control">
                                    </div>
                                </div>
                            </div>

                        </div>

                    </div>
                    <hr>

                    <div class="row text-left">
                        <div class="col-10">

                        </div>

                        <div class="col-2">
                            <button type="button" class="btn btn-danger btn-sm">Clear</button>
                            &nbsp;
                            <button type="button" class="btn btn-primary btn-sm"
                                style="background-color:#007aff;">Submit</button>
                        </div>
                    </div>

                </div>
            </div>
        </div>

    </div>

    <div class="card-body" style="margin-bottom: 200px;">
        <div class="row p-4 bg-light" style="margin-left: 0.1rem; margin-right: 0.1rem;">
            <div class="card card-custom example example-compact w-100">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-12">
                            <div class="body">
                                <div class="table-responsive check-all-parent">
                                    <table class="table table-hover m-b-0 c_list myDataTable">
                                        <thead>
                                            <tr>
                                                <th> Name</th>
                                                <th> Email </th>
                                                <th> Phone </th>
                                                <th> Mobile </th>
                                                <th> Mobile 2 </th>
                                                <th> Country Name </th>
                                                <th> City Name </th>
                                                <th> Area Name</th>
                                                <th> Street Address </th>
                                                <th> Created Date </th>
                                                <th> Action </th>
                                            </tr>
                                        </thead>
                                        <tbody>

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

    <!-- Add Shipper Address Book Modal -->
    @include('user.modals.add_shipper_book_address')
    <!-- Add Shipper Address Book Modal -->

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

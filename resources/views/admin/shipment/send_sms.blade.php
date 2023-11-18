{{-- Extends layout --}}
@extends('layouts.admin')
@section('page_title', 'Send Sms')
{{-- Content --}}
@section('content')
    <div class="card-body">
        <div class="row p-4 bg-light" style="margin-left: 0.1rem; margin-right: 0.1rem;">
            <div class="card card-custom example example-compact w-100">
                <h2 class="card-title ml-4">
                    Send Sms View
                </h2>
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-12">
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
                                            <div class="input-group-prepend"><span class="input-group-text"><i
                                                        class="fas fa-lg fa-fw  fa-calendar-alt"></i></span></div>
                                            <input type="date" id="" name=""
                                                placeholder=""class="form-control">
                                        </div>
                                    </div>
                                </div>

                                <div class="col-4">
                                    <div class="form-group">
                                        <label class="text-lg-right col-form-label">Driver<span
                                                class="text-danger">*</span></label>
                                        <div class="input-group m-b-10">
                                            <div class="input-group-prepend"><span class="input-group-text"><i
                                                        class="fas fa-lg fa-fw  fa-flag-checkered"></i></span></div>
                                            <input type="text" id="" name="" placeholder="Driver"
                                                class="form-control">
                                        </div>
                                    </div>
                                </div>

                                <div class="col-4">
                                    <div class="form-group">
                                        <label class="text-lg-right col-form-label">City<span
                                                class="text-danger">*</span></label>
                                        <div class="input-group m-b-10">
                                            <div class="input-group-prepend"><span class="input-group-text">
                                                    <i class="fas fa-lg fa-fw  fa-flag-checkered"></i></span></div>
                                            <input type="text" id="" name="" placeholder="City"
                                                class="form-control">
                                        </div>
                                    </div>
                                </div>

                                <div class="col-4">
                                    <div class="form-group">
                                        <label class="text-lg-right col-form-label">Areas<span
                                                class="text-danger">*</span></label>
                                        <div class="input-group m-b-10">
                                            <div class="input-group-prepend"><span class="input-group-text"><i
                                                        class="fas fa-lg fa-fw  fa-flag-checkered"></i></span></div>
                                            <input type="text" id="" name="" placeholder="Areas"
                                                class="form-control">
                                        </div>
                                    </div>
                                </div>

                                <div class="col-4">
                                    <div class="form-group">
                                        <label class="text-lg-right col-form-label">Status<span
                                                class="text-danger">*</span></label>
                                        <div class="input-group m-b-10">
                                            <div class="input-group-prepend"><span class="input-group-text"><i
                                                        class="fas fa-lg fa-fw  fa-flag-checkered"></i></span></div>
                                            <input type="text" id="txtShipperCode" name="txtShipperCode"
                                                placeholder="Status" class="form-control">
                                        </div>
                                    </div>
                                </div>


                                <div class="col-4">
                                    <div class="form-group">
                                        <label class="text-lg-right col-form-label">Tracking No<span
                                                class="text-danger">*</span></label>
                                        <div class="input-group m-b-10">
                                            <div class="input-group-prepend"><span class="input-group-text"><i
                                                        class="fas fa-lg fa-fw fa-barcode"></i></span></div>
                                            <input type="text" id="txtShipperCode" name="txtShipperCode"
                                                placeholder="Tracking No" class="form-control">
                                        </div>
                                    </div>
                                </div>

                                <div class="col-8 mt-5">
                                    <div class="form-group" style="margin-top: 30px;">
                                        <button type="button" class="btn btn-primary btn-sm"><i class="fa fa-magnifying-glass"></i>Search</button>
                                    </div>
                                </div>

                            </div>

                            <hr>
                            <div class="row">
                                <div class="col-12">
                                    <div class="body">
                                        <div class="table-responsive check-all-parent">
                                            <table class="table table-hover m-b-0 c_list" id="myDataTable">
                                                <thead>
                                                    <tr>
                                                        <th><input class="check-all" type="checkbox" name="checkbox">
                                                        </th>
                                                        <th> Tracking No </th>
                                                        <th> Shipper </th>
                                                        <th> Cosignee </th>
                                                        <th> Mobile </th>
                                                        <th> Mobile 2 </th>
                                                        <th> Area </th>
                                                        <th> Cost </th>
                                                        <th> Status </th>
                                                        <th> Driver Mob </th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <hr>
                            <div class="row">
                                <div class="col-4">
                                    <label>SMS Text</label>
                                    <div class="row mt-5">
                                        <div class="col-3">
                                            <div class="form-check">
                                                <input class="form-check-input" type="radio" name="language" id="arabicRadio" checked>
                                                <label class="form-check-label" for="arabicRadio">
                                                    Arabic
                                                </label>
                                            </div>
                                        </div>
                                        <div class="col-3">
                                            <div class="form-check">
                                                <input class="form-check-input" type="radio" name="language" id="englishRadio">
                                                <label class="form-check-label" for="englishRadio">
                                                    English
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-6">
                                    <label>Select One</label>
                                    <div class="row mt-5">
                                        <div class="col-3">
                                            <div class="form-check">
                                                <input class="form-check-input" type="radio" name="recipientType" id="shipperRadio">
                                                <label class="form-check-label" for="shipperRadio">
                                                    Shipper
                                                </label>
                                            </div>
                                        </div>
                                        <div class="col-3">
                                            <div class="form-check">
                                                <input class="form-check-input" type="radio" name="recipientType" id="consigneeRadio" checked>
                                                <label class="form-check-label" for="consigneeRadio">
                                                    Consignee
                                                </label>
                                            </div>
                                        </div>
                                        <div class="col-3">
                                            <div class="form-check">
                                                <input class="form-check-input" type="radio" name="recipientType" id="consignee2Radio">
                                                <label class="form-check-label" for="consignee2Radio">
                                                    Consignee 2
                                                </label>
                                            </div>
                                        </div>
                                        {{-- <div class="col-3">
                                            <div class="form-check">
                                                <input class="form-check-input" type="radio" name=""
                                                    id="">
                                                <label class="form-check-label" for="flexRadioDefault1">
                                                    Shipper
                                                </label>
                                            </div>
                                        </div>
                                        <div class="col-3">
                                            <div class="form-check">
                                                <input class="form-check-input" type="radio" name=""
                                                    id="" checked>
                                                <label class="form-check-label" for="flexRadioDefault1">
                                                    Consignee
                                                </label>
                                            </div>
                                        </div>
                                        <div class="col-3">
                                            <div class="form-check">
                                                <input class="form-check-input" type="radio" name=""
                                                    id="">
                                                <label class="form-check-label" for="flexRadioDefault1">
                                                    Consignee 2
                                                </label>
                                            </div>
                                        </div> --}}
                                    </div>
                                </div>
                            </div>

                            <div class="row mt-3 mb-3">
                                <div class="col-xl-12">
                                    <textarea id="txtSmsText" class="form-control" rows="3" placeholder="Textarea">مندوبنا في الطريق إليكم لإستلام طلبكم للتواصل &lt;DRIVER_MOBILE&gt; </textarea>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-12 text-right">
                                    <div class="form-group">
                                        <button type="button" class="btn btn-primary btn-sm">
                                            <i class="fa fa-message"></i>Send SMS</button>
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
            $('#myDataTable').DataTable();
        });
    </script>
@endsection

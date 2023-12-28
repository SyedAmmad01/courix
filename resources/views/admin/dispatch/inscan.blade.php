{{-- Extends layout --}}
@extends('layouts.admin')
@section('page_title', 'Inscan')
{{-- Content --}}
@section('content')
    <div class="card-body">
        <div class="row p-4 bg-light" style="margin-left: 0.1rem; margin-right: 0.1rem;">
            <div class="card card-custom example example-compact w-100">
                <h2 class="card-title ml-2 mr-2">
                    InScan
                </h2>
                <div class="row ml-2 mr-2">
                    <div class="col-1">
                        <div class="form-group">
                            <label class="text-lg-right col-form-label">Driver<span class="text-danger">*</span></label>
                        </div>
                    </div>

                    <div class="col-5">
                        <div class="form-group">
                            <div class="input-group m-b-10">
                                {{-- <select class="form-control kt-select2 select2" id="" name="param">
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
                                </select> --}}
                                <select class="form-control kt-select2 select2" id="driver" name="driver"
                                    style="width:86%;">
                                    <option value="" disabled selected>Please Select Driver
                                    </option>
                                    @foreach ($fetch_drivers as $key)
                                        @if (old('driver') == $key->id)
                                            <option value="{{ $key->id }}" selected>
                                                {{ $key->driver_code }} |
                                                {{ $key->employee_name }}
                                            </option>
                                        @else
                                            <option value="{{ $key->id }}">
                                                {{ $key->driver_code }} |
                                                {{ $key->employee_name }}
                                            </option>
                                        @endif
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>

                    <div class="col-6">
                        <div class="row">
                            <div class="col-2">
                                <div class="form-group">
                                    <a href="javascript:void(0);" class="btn btn-primary btn-sm" data-toggle="modal"
                                        data-target="#rack_inscan_modal">Rack</a>
                                </div>
                            </div>
                            <div class="col-3">
                                <div class="form-group">
                                    <a href="javascript:void(0);" class="btn btn-primary btn-sm" data-toggle="modal"
                                        data-target="#warehouse_inscan_modal">Warehouse</a>
                                </div>
                            </div>
                            <div class="col-4">
                                <div class="form-group">
                                    <a href="javascript:void(0);" class="btn btn-primary btn-sm" data-toggle="modal"
                                        data-target="#delay_shipment_inscan_modal">Change Delivery Date</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <hr>
                <div class="row ml-2 mr-2">
                    <div class="col-6">
                        <div class="form-group">
                            <div class="input-group">
                                <input type="text" id="" name="" placeholder="123.." class="form-control"
                                    style="border-radius:20px;">
                                &nbsp;
                                <button type="button" class="btn btn-primary btn-sm" style="border-radius:20px;"><i
                                        class="fas fa-lg fa-fw fa-sign-out-alt"></i>Inscan</button>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="container-fluid mt-5">
                    <div class="row">
                        <div class="col-12">
                            <div class="card mb-3">
                                <div class="card-body"
                                    style="background: linear-gradient(to bottom, #4d4d4d 0%, #f0c497 100%);">
                                    <div class="heading">
                                        <h2 class="card-title text-light text-center">
                                            <strong>Your # is .</strong>
                                        </h2>
                                    </div>
                                    {{-- First Row Start --}}
                                    <div class="row">
                                        <div class="col-12 mb-5">
                                            <div class="card">
                                                <div class="card-body">
                                                    <div class="row">
                                                        <div class="col-6" style="border-right:1px dashed #FFC107">
                                                            <h6>Sender<span>(Shipper)</span>
                                                            </h6>
                                                        </div>



                                                        <div class="col-6">
                                                            <h6>Receiver<span>(Recipient)</span>
                                                            </h6>
                                                        </div>

                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    {{-- First Row End --}}
                                    {{-- Second Row Start --}}
                                    <div class="row">
                                        <div class="col-6 mb-5">
                                            <div class="card">
                                                <div class="card-body ml-3">
                                                    <div class="row">
                                                        <div class="form-group">
                                                            <label
                                                                class="text-lg-right col-form-label"><strong>Driver:</strong></label>
                                                        </div>
                                                    </div>

                                                    <div class="row">
                                                        <div class="form-group">
                                                            <label class="text-lg-right col-form-label"><strong>Created
                                                                    On :</strong></label>
                                                            <strong>By</strong>
                                                        </div>
                                                    </div>

                                                    <div class="row">
                                                        <div class="form-group">
                                                            <label class="text-lg-right col-form-label"><strong>Updated
                                                                    On :</strong></label>
                                                            <strong>By</strong>
                                                        </div>
                                                    </div>

                                                    <div class="row">
                                                        <div class="form-group">
                                                            <label class="text-lg-right col-form-label"><strong>Total
                                                                    COD:</strong></label>
                                                        </div>
                                                    </div>

                                                    <div class="row">
                                                        <div class="form-group">
                                                            <label class="text-lg-right col-form-label"><strong>Zone
                                                                    :</strong></label>
                                                        </div>
                                                    </div>

                                                    <div class="row">
                                                        <div class="form-group">
                                                            <label class="text-lg-right col-form-label"><strong>Remarks
                                                                    :</strong></label>
                                                        </div>
                                                    </div>

                                                    <div class="row">
                                                        <div class="form-group">
                                                            <label class="text-lg-right col-form-label"><strong>Description
                                                                    :</strong></label>

                                                        </div>
                                                    </div>



                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-6 mb-5">
                                            <div class="card">
                                                <div class="card-body ml-3">
                                                    <div class="row">
                                                        <div class="form-group">
                                                            <label class="text-lg-right col-form-label"><strong>Driver
                                                                    Paid Date :</strong></label>
                                                        </div>
                                                    </div>

                                                    <div class="row">
                                                        <div class="form-group">
                                                            <label class="text-lg-right col-form-label"><strong>Driver
                                                                    Paid Status :
                                                                </strong></label>
                                                        </div>
                                                    </div>

                                                    <div class="row">
                                                        <div class="form-group">
                                                            <label class="text-lg-right col-form-label"><strong>Invoice
                                                                    Number :</strong></label>
                                                            <strong>By</strong>
                                                        </div>
                                                    </div>

                                                    <div class="row">
                                                        <div class="form-group">
                                                            <label class="text-lg-right col-form-label"><strong>Customer
                                                                    Paid Status:</strong></label>
                                                        </div>
                                                    </div>

                                                    <div class="row">
                                                        <div class="form-group">
                                                            <label class="text-lg-right col-form-label"><strong>Service
                                                                    Charges :</strong></label>
                                                        </div>
                                                    </div>

                                                    <div class="row">
                                                        <div class="form-group">
                                                            <label class="text-lg-right col-form-label"><strong>
                                                                </strong></label>
                                                        </div>
                                                    </div>

                                                    <div class="row">
                                                        <div class="form-group">
                                                            <label class="text-lg-right col-form-label"><strong>
                                                                </strong></label>
                                                        </div>
                                                    </div>

                                                    <div class="row">
                                                        <div class="form-group">
                                                            <label class="text-lg-right col-form-label"><strong>
                                                                </strong></label>
                                                        </div>
                                                    </div>

                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    {{-- Secoond Row End --}}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    {{-- Rack Modal  --}}
    @include('admin.modal.rack_inscan');
    {{-- Rack Modal --}}

    {{-- Ware House Modal  --}}
    @include('admin.modal.ware_house_inscan');
    {{-- Ware House Modal --}}

    {{-- Ware House Modal  --}}
    @include('admin.modal.delay_shipment_inscan');
    {{-- Ware House Modal --}}

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

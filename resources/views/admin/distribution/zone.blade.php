{{-- Extends layout --}}
@extends('layout.default')
{{-- Content --}}
@section('content')
    <div class="card-body">
        <div>
            <div class="row p-4 bg-light">
                <div class="card card-custom example example-compact w-100">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-12">
                                <div class="row" style="margin-left: 57rem;">
                                    <div class="col-6" style="margin-top: 30px;">
                                        <div class="form-group">
                                            <a type="button" href="javascript:void(0);" class="btn btn-primary"
                                                style="background-color:#007aff;" data-toggle="modal"
                                                data-target="#create_zone_modal"><i class="fa fa-md fa-plus"></i>Create
                                                Zone</a>
                                        </div>
                                    </div>
                                    <div class="col-6" style="margin-top: 30px;">
                                        <div class="form-group">
                                            <a type="button" href="javascript:void(0);" class="btn btn-primary"
                                                style="background-color:#007aff;" data-toggle="modal"
                                                data-target="#create_area_modal"><i class="fa fa-md fa-plus"></i>Area</a>
                                        </div>
                                    </div>

                                </div>

                                <div class="row">
                                    <div class="col-6">
                                        <div class="form-group">
                                            <label class="text-lg-right col-form-label">Zone<span
                                                    class="text-danger">*</span></label>
                                            <div class="input-group m-b-10">
                                                <div class="input-group-prepend"><span class="input-group-text">
                                                        <i class="fab fa-lg fa-fw  fa-steam"></i></span></div>
                                                <select class="form-control kt-select2 select2" id=""
                                                    name="param">
                                                    <option value="" disabled selected>Please Select Zone</option>
                                                    @foreach ($fetch_zones as $key)
                                                        @if (old('zone_name') == $key->id)
                                                            <option value="{{ $key->id }}" selected>
                                                                {{ $key->zone_name }}
                                                            </option>
                                                        @else
                                                            <option value="{{ $key->id }}">{{ $key->zone_name }}
                                                            </option>
                                                        @endif
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="text-lg-right col-form-label">Empty list<span
                                                    class="text-danger">*</span></label>
                                            <div class="input-group m-b-10">
                                                <input type="text" id="" name="" placeholder="Filter"
                                                    class="form-control">
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-6">
                                                <div class="form-group">
                                                    <button type="button" class="btn btn-light btn-lg btn-block"><i
                                                            class="fa fa-arrow-right"></i><i
                                                            class="fa fa-arrow-right"></i></button>
                                                </div>
                                            </div>

                                            <div class="col-6">
                                                <div class="form-group">
                                                    <button type="button" class="btn btn-light btn-lg btn-block"><i
                                                            class="fa fa-arrow-right"></i></button>
                                                </div>
                                            </div>

                                            <select multiple="multiple"
                                                id="bootstrap-duallistbox-nonselected-list_duallistbox_Areas"
                                                class="form-control" name="duallistbox_Areas_helper1"
                                                style="height: 300px; width:95%; margin-left: 10px;"></select>

                                        </div>



                                    </div>

                                    <div class="col-6">
                                        <div class="form-group">
                                            <label class="text-lg-right col-form-label">Zone<span
                                                    class="text-danger">*</span></label>
                                            <div class="input-group m-b-10">
                                                <div class="input-group-prepend"><span class="input-group-text">
                                                        <i class="fab fa-lg fa-fw  fa-steam"></i></span></div>
                                                <select class="form-control kt-select2 select2" id=""
                                                    name="param">
                                                    <option value="" disabled selected>Please Select Zone</option>
                                                    @foreach ($fetch_zones as $key)
                                                        @if (old('zone_name') == $key->id)
                                                            <option value="{{ $key->id }}" selected>
                                                                {{ $key->zone_name }}
                                                            </option>
                                                        @else
                                                            <option value="{{ $key->id }}">{{ $key->zone_name }}
                                                            </option>
                                                        @endif
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="text-lg-right col-form-label">Empty list<span
                                                    class="text-danger">*</span></label>
                                            <div class="input-group m-b-10">
                                                <input type="text" id="" name="" placeholder="Filter"
                                                    class="form-control">
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-6">
                                                <div class="form-group">
                                                    <button type="button" class="btn btn-light btn-lg btn-block"><i
                                                            class="fa fa-arrow-left"></i><i
                                                            class="fa fa-arrow-left"></i></button>
                                                </div>
                                            </div>

                                            <div class="col-6">
                                                <div class="form-group">
                                                    <button type="button" class="btn btn-light btn-lg btn-block"><i
                                                            class="fa fa-arrow-left"></i></button>
                                                </div>
                                            </div>

                                            <select multiple="multiple ml-2 mr-2"
                                                id="bootstrap-duallistbox-nonselected-list_duallistbox_Areas"
                                                class="form-control" name="duallistbox_Areas_helper1"
                                                style="height: 300px; width:95%; margin-left: 18px;"></select>

                                        </div>

                                    </div>

                                    <hr>
                                    <div class="row" style="margin-left: 62rem;">
                                        <div class="col-6" style="margin-top: 30px;">
                                            <div class="form-group">
                                                <button type="button" class="btn btn-danger"><i
                                                        class="fa-sharp fa-solid fa-trash"></i>Reset All</button>
                                            </div>
                                        </div>
                                        <div class="col-6" style="margin-top: 30px;">
                                            <div class="form-group">
                                                <button type="button" class="btn btn-primary"
                                                    style="background-color:#007aff;"><i
                                                        class="fa-sharp fa-solid fa-file"></i>Save</button>
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
    </div>

    {{-- Create Zone Modal  --}}
    @include('modal.create_zone')
    {{-- Create Zone Modal --}}

    {{-- Create Area Modal  --}}
    @include('modal.create_area')
    {{-- Create Area Modal --}}
@endsection

{{-- Scripts Section --}}
@section('scripts')
    <script src="{{ asset('js/pages/widgets.js') }}" type="text/javascript"></script>
    <script>
        $(document).ready(function() {
            $(".select2").select2();
            $('.myDataTable').DataTable();
        });
    </script>
@endsection

{{-- Extends layout --}}
@extends('layouts.admin')
@section('page_title', 'Add Collection Without Reference')
{{-- Content --}}
@section('content')
    <div class="card-body">
        <div class="row p-4 bg-light" style="margin-left: 0.1rem; margin-right: 0.1rem;">
            <div class="card card-custom example example-compact w-100">
                <h2 class="card-title ml-4">
                    Add Collection Without Reference
                </h2>
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-12">
                            <div class="row">
                                <div class="col-3">
                                    <div class="form-group">
                                        <label class="text-lg-right col-form-label">Date<span
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
                                        <label class="text-lg-right col-form-label">Driver<span
                                                class="text-danger">*</span></label>
                                        <div class="input-group m-b-10">
                                            <select class="form-control kt-select2 select2" id="" name="">
                                                @foreach ($fetch_drivers as $key)
                                                    @if (old('driver') == $key->id)
                                                        <option value="{{ $key->id }}" selected>{{ $key->driver_code }} | {{ $key->employee_name }}
                                                        </option>
                                                    @else
                                                        <option value="{{ $key->id }}">{{ $key->driver_code }} | {{ $key->employee_name }}
                                                        </option>
                                                    @endif
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-6" style="margin-top: 45px;">
                                    <div class="form-group">
                                        <button type="button" class="btn btn-primary btn-sm"><i
                                                class="fa fa-spinner"></i>Load</button>
                                    </div>
                                </div>

                            </div>

                            <div class="row">
                                <div class="col-3">
                                    <div class="form-group">
                                        <label class="text-lg-right col-form-label">Barcode<span
                                                class="text-danger">*</span></label>
                                        <div class="input-group m-b-10">
                                            <div class="input-group-prepend"><span class="input-group-text">
                                                    <i class="fas fa-lg fa-fw fa-search"></i></span></div>
                                            <input type="text" id="" name="" placeholder="123..."
                                                class="form-control">
                                        </div>
                                    </div>
                                </div>


                                <div class="col-9" style="margin-top: 45px;">
                                    <div class="form-group">
                                        <button type="button" class="btn btn-primary btn-sm"><i
                                                class="fa fa-check"></i>Confirm</button>
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
                                                        <th> Sr # </th>
                                                        <th> Tracking No | Barcode </th>
                                                        <th> Date </th>
                                                        <th> Driver Name </th>
                                                        <th> Shipper Code </th>
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
            $('#myDataTable').DataTable();
            $(".select2").select2();
        });
    </script>
@endsection

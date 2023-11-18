@extends('layouts.front')
@section('page_title', 'Update Password Page')
@section('content')
    <h1 class="card-title mt-5" style="margin-left: 1rem;">
        Update Password
    </h1>
    <div class="card-body">
        <div>
            <div class="row p-4 bg-light" style="margin-left: 0.1rem; margin-right: 0.1rem;">
                <div class="card card-custom example example-compact w-100">
                    <div class="container">
                        <div class="row">
                            <div class="col-4">
                                <div class="form-group">
                                    <label class="text-lg-right col-form-label">Old Password<span
                                            class="text-danger">*</span></label>
                                    <div class="input-group m-b-10">
                                        <div class="input-group-prepend"><span class="input-group-text">
                                            <i class="fa fa-key fa-md fa-fw"></i></span></div>
                                        <input type="text" id="" name="" placeholder="Old Password"
                                            class="form-control">
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="text-lg-right col-form-label">New Password<span
                                            class="text-danger">*</span></label>
                                    <div class="input-group m-b-10">
                                        <div class="input-group-prepend"><span class="input-group-text">
                                            <i class="fa fa-key fa-md fa-fw"></i></span></div>
                                        <input type="text" id="" name="" placeholder="New Password"
                                            class="form-control">
                                    </div>
                                </div>


                                <div class="form-group">
                                    <label class="text-lg-right col-form-label">Confirm Password<span
                                            class="text-danger">*</span></label>
                                    <div class="input-group m-b-10">
                                        <div class="input-group-prepend"><span class="input-group-text">
                                            <i class="fa fa-key fa-md fa-fw"></i></span></div>
                                        <input type="text" id="" name="" placeholder="Confirm Password"
                                            class="form-control">
                                    </div>
                                </div>

                                <br>
                                <div class="form-group">
                                    <button type="button" class="btn btn-primary btn-sm"><i class="fas fa-md fa-save"></i>Update</button>
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


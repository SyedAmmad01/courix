@extends('layouts.front')
@section('page_title', 'Manage Profile Page')
@section('content')
    <h1 class="card-title mt-5" style="margin-left: 1rem;">
        Manage Profile
    </h1>
    <div class="card-body">
        <div>
            <div class="row p-4 bg-light" style="margin-left: 0.1rem; margin-right: 0.1rem;">
                <div class="card card-custom example example-compact w-100">
                    <div class="container">
                        <div class="row">
                            <div class="col-4">
                                <div class="form-group">
                                    <label class="text-lg-right col-form-label">Trade Name<span
                                            class="text-danger">*</span></label>
                                    <div class="input-group m-b-10">
                                        <div class="input-group-prepend"><span class="input-group-text">
                                            <i class="fa fa-user fa-md fa-fw"></i></span></div>
                                        <input type="text" id="" name="" placeholder="Trade Name"
                                            class="form-control">
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="text-lg-right col-form-label">Commercial Name<span
                                            class="text-danger">*</span></label>
                                    <div class="input-group m-b-10">
                                        <div class="input-group-prepend"><span class="input-group-text">
                                            <i class="fa fa-building fa-md fa-fw"></i></span></div>
                                        <input type="text" id="" name="" placeholder="Owner / Manager Name"
                                            class="form-control">
                                    </div>
                                </div>


                                <div class="form-group">
                                    <label class="text-lg-right col-form-label">Customer Support No<span
                                            class="text-danger">*</span></label>
                                    <div class="input-group m-b-10">
                                        <div class="input-group-prepend"><span class="input-group-text">
                                            <i class="fa fa-phone fa-md fa-fw"></i></span></div>
                                        <input type="text" id="" name="" placeholder="Customer Support No"
                                            class="form-control">
                                    </div>
                                </div>
                            </div>

                            <div class="col-4">

                            </div>

                            <div class="col-4">
                                <section class="">
                                    <div class="form-group mb-lg">
                                        <img id="imgProfile" class="img-thumbnail" alt="4.5cm X 3.5cm" src="{{ asset('front_assets')}}/assets/images/icons/sample.png" data-holder-rendered="true" style="width: 188px; height: 220px; pointer-events: none; border-radius:50%">
                                    </div>
                                    <br>
                                    <div class="row p-t-10 p-b-10">
                                        <div class="col-sm-7" id="divAdd">
                                            <div id="divUploadedFile">
                                                <form id="FormUpload" enctype="multipart/form-data" method="post">
                                                    <div class="col-sm-12">
                                                        <a href="#" class="btn btn-warning fileinput-button btn-sm col-lg-12 p-t-6 p-b-6" style="position:relative;overflow:hidden">
                                                            <span class="d-inline-block align-items-center text-left">
                                                                <i class="fa fa-fw fa-upload fa-1x mr-1"></i>
                                                                <span class=""><b>Add files..</b></span>
                                                                <input type="file" id="UploadedFile" name="UploadedFile" style="opacity:0;position:absolute;left:0;top:0;"
                                                                onchange="document.getElementById('imgProfile').src = window.URL.createObjectURL(this.files[0])">
                                                                {{-- <input type="file" name="UploadedFile" id="UploadedFile" style="opacity:0;position:absolute;left:0;top:0;"> --}}
                                                            </span>
                                                        </a>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                        <div class="col-sm-5 pl-0 ml-0" id="divRemove">
                                            <button id="btnDeleteImage" name="btnDeleteImage" class="btn btn-danger btn-sm" style="">
                                                <i class="fa fa-md fa-trash"></i> Remove
                                            </button>
                                        </div>
                                    </div>
                                    <br>
                                    <div class="row">
                                        <div class="col-sm-12">
                                            <button id="btnUpdateShipper" name="btnUpdateShipper" type="submit" tabindex="" class="btn btn-primary btn-sm pull-right" style="padding-right: 67px;padding-left: 66px;">
                                                <i class="fa fa-md fa-save"></i> Update
                                            </button>
                                        </div>
                                    </div>
                                </section>
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


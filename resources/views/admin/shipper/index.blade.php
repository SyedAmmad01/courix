{{-- Extends layout --}}
@extends('layouts.admin')
@section('page_title', 'All Shippers')
{{-- Content --}}
@section('content')
    <div class="card-body">
        <div class="row p-4 bg-light" style="margin-left: 0.1rem; margin-right: 0.1rem;">
            <div class="card card-custom example example-compact w-100">
                <div class="card-body">
                    <div class="container-fluid">
                        <div class="row text-right">
                            <div class="col-6">

                            </div>

                            <div class="col-6">
                                <a id="" type="button" href="javascript:void(0);" class="btn btn-danger btn-sm"
                                    data-toggle="modal" data-target="#quickadd"><i class="fas fa-lg fa-fw fa-plus"></i>Quick
                                    Add</a>

                                <a id="refreshButton" href="javascript:void(0)" class="btn btn-primary btn-sm"><i
                                        class="fas fa-lg fa-fw fa-spinner"></i>Load</a>


                                <a id="" href="{{ route('admin.shipper.add') }}" class="btn btn-primary btn-sm"><i
                                        class="fas fa-lg fa-fw fa-plus"></i>Add Shipper</a>


                                <a id="" href="{{route('admin.exportshippersToExcel')}}" class="btn btn-primary btn-sm"><i
                                    class="fas fa-lg fa-fw fa-file-excel"></i>Export to Excel</a>

                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-12">
                                <div class="body">
                                    <div class="table-responsive check-all-parent">
                                        <table class="table table-hover m-b-0 c_list myDataTable">
                                            <thead>
                                                <tr>
                                                    <th> Code </th>
                                                    <th> Name </th>
                                                    <th> Manager </th>
                                                    <th> Contact 1 </th>
                                                    <th> License No </th>
                                                    <th> Email </th>
                                                    <th> City </th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($shippers as $shipper)
                                                    <tr>
                                                        <td>{{ $shipper->shipper_code }}</td>
                                                        <td>{{ $shipper->company_name }}</td>
                                                        <td>{{ $shipper->manager_name }}</td>
                                                        <td>{{ $shipper->contact_office_1 }}</td>
                                                        <td>{{ $shipper->trade_license_no }}</td>
                                                        <td>{{ $shipper->shipper_email }}</td>
                                                        <td>{{ $shipper->name }}</td>
                                                    </tr>
                                                @endforeach
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

    <!-- Add Modal -->
    @include('admin.modal.quick_add_shipper')
    <!-- Add Modal -->

    <!-- Delete Modal -->
    @include('admin.modal.delete_shipper')
    <!-- Delete Modal -->
@endsection

@section('page-scripts')
    {{-- <script src="{{ asset('js/pages/widgets.js') }}" type="text/javascript"></script> --}}
    <script>
        $(document).ready(function() {
            $(".select2").select2();
            $('.myDataTable').DataTable();
        });

        // Get a reference to the refresh button
        const refreshButton = document.getElementById('refreshButton');

        // Add a click event listener to the button
        refreshButton.addEventListener('click', function () {
            // Reload the current page
            location.reload();
        });
    </script>
@endsection

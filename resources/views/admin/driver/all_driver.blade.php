{{-- Extends layout --}}
@extends('layouts.admin')
@section('page_title', 'All Drivers')
{{-- Content --}}
@section('content')
<div class="card-body">
    <div class="row p-4 bg-light" style="margin-left: 0.1rem; margin-right: 0.1rem;">
        <div class="card card-custom example example-compact w-100">
            <div class="card-body">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-10">
                        </div>
                        <div class="col-2">
                            <span class=""><a type="button" href="javascript:void(0);" class="btn btn-primary btn-sm"><i class="fas fa-lg fa-fw fa-plus" data-toggle="modal"
                                    data-target="#adddriver"></i>Add Driver</a></span>
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
                                                <th> Name </th>
                                                <th> Driver Code </th>
                                                <th> Employee Code </th>
                                                <th> Mobile </th>
                                                <th> Username </th>
                                                <th> Status </th>
                                                <th> Action </th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($drivers as $driver)
                                                <tr>
                                                    <td>{{ $driver->employee_name }}</td>
                                                    <td>{{ $driver->driver_code }}</td>
                                                    <td>{{ $driver->emp_code }}</td>
                                                    <td>{{ $driver->employee_mobile }}</td>
                                                    <td>{{ $driver->app_username }}</td>
                                                    <td>
                                                        @if ($driver->status == 1)
                                                        <a href="{{ route('admin.driver.status-update', $driver->id) }}"
                                                            class="btn btn-primary btn-sm">Active</a>
                                                    @elseif($driver->status == 0)
                                                        <a href="{{ route('admin.driver.status-update', $driver->id) }}"
                                                            class="btn btn-danger btn-sm">Deactive</a>
                                                    @endif
                                                    </td>
                                                    <td style="display: flex;">
                                                        <a href="javascript:void(0);" id="show-employee" data-toggle="modal"
                                                            data-target="#driverShowModalEdit"
                                                            data-url="{{ route('admin.driver.edit', ['id' => $driver->id]) }}"
                                                            class="btn btn-primary btn-sm fa fa-edit" type="button" style="background-color: #007aff;
                                                            border-color: #007aff;">
                                                        </a>

                                                        &nbsp;
                                                        <button class="delete-btn btn btn-danger btn-sm fa fa-trash"
                                                            data-driver-id="{{ $driver->id }}" data-toggle="modal"
                                                            data-target="#driverdeleteModal"></button>
                                                        &nbsp;
                                                    </td>
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
    @include('admin.modal.add_driver')
    <!-- Add Modal -->

    <!-- Edit Modal -->
    @include('admin.modal.edit_driver')
    <!-- Edit Modal -->

    <!-- Delete Modal -->
    @include('admin.modal.delete_driver')
    <!-- Delete Modal -->
@endsection

@section('page-scripts')
    <script>
        $(document).ready(function() {
            $('.myDataTable').DataTable();

            $("body").on("click", "#show-employee", function() {
                var candidateURL = $(this).data('url');
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });
                $.get(candidateURL, function(data) {
                    console.log(data);
                    var fullName = data.emp_code + ' | ' + data.emp_first_name;
                    $('#driverShowModalEdit').modal('show');
                    $('#d-id').val(data.id);
                    $('#d-driver_code').val(data.driver_code);
                    $('#d-employee_code').val(fullName);
                    $('#d-emp_code').val(data.employee_code);
                    $('#d-employee_name').val(data.employee_name);
                    $('#d-employee_mobile').val(data.employee_mobile);
                    $('#d-city').val(data.city);
                    $('#d-zones').val(data.zones);
                    $('#d-app_username').val(data.app_username);
                    $('#d-app_password').val(data.app_password);
                    $('#d-app_confirm_password').val(data.app_confirm_password);
                });
            });
            $('.close_modal').click(function() {
                $('#driverShowModalEdit').modal('hide');
            });

        });
    </script>
@endsection

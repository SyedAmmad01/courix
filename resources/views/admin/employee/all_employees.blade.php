{{-- Extends layout --}}
@extends('layouts.admin')
@section('page_title' , 'All Employees')
{{-- Content --}}
@section('content')
    <div class="card-body">
        <div>
            <div class="row p-4 bg-light" style="margin-left: 0.1rem; margin-right: 0.1rem;">
                <div class="card card-custom example example-compact w-100">
                    <div class="card-body">
                        <div class="container-fluid">
                            <div class="row">
                                <div class="col-10">
                                </div>
                                <div class="col-2">
                                    <span class=""><a id=""
                                            href="{{ route('admin.employee.add_employee') }}" class="btn btn-primary btn-sm"
                                            style="background-color: #007aff;"><i class="fas fa-lg fa-fw fa-plus"></i>Add
                                            Employee</a></span>
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
                                                        <th> Full Name </th>
                                                        <th> Mobile </th>
                                                        <th> Job Title </th>
                                                        <th> Email </th>
                                                        <th> Gender </th>
                                                        <th> Address </th>
                                                        <th> Action </th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @foreach ($employees as $employee)
                                                        <tr>
                                                            <td>{{ $employee->emp_code }}</td>
                                                            <td>{{ $employee->emp_first_name }}
                                                                {{ $employee->emp_middle_name }}
                                                                {{ $employee->emp_last_name }}</td>
                                                            <td>{{ $employee->mobile }}</td>
                                                            <td>{{ $employee->name }}</td>
                                                            <td>{{ $employee->work_email }}</td>
                                                            <td>{{ $employee->gender }}</td>
                                                            <td>{{ $employee->address_line_1 }}</td>
                                                            <td style="display: flex;">
                                                                <a href="{{ route('admin.employee.edit', ['id' => $employee->id]) }}"
                                                                    class="btn btn-primary btn-sm fa fa-edit"
                                                                    style="background-color: #007aff;"></a>
                                                                &nbsp;
                                                                <button class="delete-btn btn btn-danger btn-sm fa fa-trash"
                                                                    data-employee-id="{{ $employee->id }}"
                                                                    data-toggle="modal" data-target="#deleteModal"></button>
                                                                &nbsp;
                                                                <a href="{{ route('admin.employee.view_employees', ['id' => $employee->id]) }}"
                                                                    class="btn btn-warning  btn-sm fa fa-eye"></a>
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
    </div>

    <!-- Delete Modal -->
    @include('admin.modal.delete_employee')
    <!-- Delete Modal -->
@endsection

@section('page-scripts')
    <script>
        $(document).ready(function() {
            $('.myDataTable').DataTable();
        });
    </script>
@endsection

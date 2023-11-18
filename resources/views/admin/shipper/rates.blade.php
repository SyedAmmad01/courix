{{-- Extends layout --}}
@extends('layouts.admin')
@section('page_title', 'Shippers Rates')
{{-- Content --}}
@section('content')
    <div class="card-body">
        <div class="row p-4 bg-light" style="margin-left: 0.1rem; margin-right: 0.1rem;">
            <div class="card card-custom example example-compact w-100">
                <div class="card-body">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-12">
                                <div class="body">
                                    <div class="table-responsive check-all-parent">
                                        <table class="table table-hover m-b-0 c_list myDataTable">
                                            <thead>
                                                <tr>
                                                    <th> Shipper Code </th>
                                                    <th> Name </th>
                                                    <th> Action </th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($shippers as $shipper)
                                                    <tr>
                                                        <td>{{ $shipper->shipper_code }}</td>
                                                        <td>{{ $shipper->company_name }}</td>
                                                        <td>
                                                            <a href="javascript:void(0);" id="show-employee"
                                                                data-toggle="modal" data-target="#changeofrates"
                                                                data-url="{{ route('admin.shipper.rate', ['id' => $shipper->id]) }}"
                                                                class="btn btn-primary btn-sm" type="button">Rates
                                                            </a>

                                                            <a href="javascript:void(0);" id="employee"
                                                                data-toggle="modal" data-target="#rtos_rates"
                                                                data-url="{{ route('admin.shipper.rate', ['id' => $shipper->id]) }}"
                                                                class="btn btn-danger btn-sm" type="button">Rtos
                                                            </a>

                                                            <a href="javascript:void(0);" id="show"
                                                                data-toggle="modal" data-target="#oda_rates"
                                                                data-url="{{ route('admin.shipper.rate', ['id' => $shipper->id]) }}"
                                                                class="btn btn-warning btn-sm" type="button">ODA Rates
                                                            </a>
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

    <!-- Change Of Rate Modal -->
    @include('admin.modal.change_of_rates')
    <!-- Change Of Rate Modal -->

    <!-- Change Of Rtos Modal -->
    @include('admin.modal.rtos_rates')
    <!-- Change Of Rtos Modall -->

    <!-- Change Of Oda Modal -->
    @include('admin.modal.oda_rates')
    <!-- Change Of Oda Modall -->

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
                    $('#changeofrates').modal('show');
                    $('#s-id').val(data.id);
                    $('#s-shipper_code').html(data.shipper_code);
                    $('#s-company_name').html(data.company_name);
                    $('#s-manager_name').html(data.manager_name);
                });
            });
            $('.close_modal').click(function() {
                $('#changeofrates').modal('hide');
            });

            $("body").on("click", "#employee", function() {
                var candidateURL = $(this).data('url');
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });
                $.get(candidateURL, function(data) {
                    console.log(data);
                    $('#rtos_rates').modal('show');
                    $('#e-id').val(data.id);
                    $('#e-shipper_code').html(data.shipper_code);
                    $('#e-company_name').html(data.company_name);
                    $('#e-manager_name').html(data.manager_name);
                });
            });
            $('.close_modal').click(function() {
                $('#rtos_rates').modal('hide');
            });


            $("body").on("click", "#show", function() {
                var candidateURL = $(this).data('url');
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });
                $.get(candidateURL, function(data) {
                    console.log(data);
                    $('#oda_rates').modal('show');
                    $('#sh-id').val(data.id);
                    $('#sh-shipper_code').html(data.shipper_code);
                    $('#sh-company_name').html(data.company_name);
                    $('#sh-manager_name').html(data.manager_name);
                });
            });
            $('.close_modal').click(function() {
                $('#oda_rates').modal('hide');
            });
        });
    </script>
@endsection

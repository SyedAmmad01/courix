{{-- Extends layout --}}
@extends('layouts.admin')
@section('page_title', 'Create Booking')
{{-- Content --}}
@section('content')
    <div class="card-body">
        <div class="row p-4 bg-light" style="margin-left: 0.1rem; margin-right: 0.1rem;">
            <div class="card card-custom example example-compact w-100">
                <form class="forms-sample" id="create_booking">
                    <div class="row ml-2 mr-2">
                        <div class="col-12">
                            <div class="form-group">
                                <label class="text-lg-right col-form-label">Select Shipper
                                    <span class="text-danger">*</span></label>
                                <div class="input-group m-b-10">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text">
                                            <i class="fab fa-lg fa-fw fa-rebel"></i>
                                        </span>
                                    </div>
                                    <select class="form-control kt-select2 select2" id="shipper" name="shipper" style="width:95%;">
                                        <option value="" disabled selected>Please Select Option
                                        </option>
                                        @foreach ($fetch_shippers as $key)
                                            @if (old('shipper_code') == $key->id)
                                                <option value="{{ $key->id }}" selected>
                                                    {{ $key->shipper_code }}|{{ $key->company_name }}|{{ $key->contact_office_1 }}
                                                </option>
                                            @else
                                                <option value="{{ $key->id }}">
                                                    {{ $key->shipper_code }}|{{ $key->company_name }}|{{ $key->contact_office_1 }}
                                                </option>
                                            @endif
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                        </div>
                    </div>

                    <div class="row ml-2 mr-2">
                        <div class="col-4">
                            <div class="form-group {{ $errors->has('barcode_start') ? 'has-error' : '' }}">
                                <label class="text-lg-right col-form-label">Barcode Start
                                    <span class="text-danger">*</span>
                                </label>
                                <div class="input-group m-b-10">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text">
                                            <i class="fas fa-lg fa-fw fa-barcode"></i>
                                        </span>
                                    </div>
                                    <input type="text" id="barcode_start" name="barcode_start"
                                        placeholder="Barcode Start"
                                        class="form-control @error('barcode_start') is-invalid @enderror">
                                </div>
                                <span class="text-dark"
                                    id="barcode_start_error">{{ $errors->first('barcode_start') }}</span>
                            </div>
                        </div>



                        <div class="col-4">
                            <div class="form-group {{ $errors->has('barcode_end') ? 'has-error' : '' }}">
                                <label class="text-lg-right col-form-label">Barcode End
                                    <span class="text-danger">*</span>
                                </label>
                                <div class="input-group m-b-10">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text">
                                            <i class="fas fa-lg fa-fw fa-barcode"></i>
                                        </span>
                                    </div>
                                    <input type="text" id="barcode_end" name="barcode_end" placeholder="Barcode End"
                                        class="form-control @error('barcode_end') is-invalid @enderror">
                                </div>
                                <span class="text-dark" id="barcode_end_error">{{ $errors->first('barcode_end') }}</span>
                            </div>
                        </div>



                        <div class="col-4">
                            <div class="form-group">
                                <label class="text-lg-right col-form-label">Count<span class="text-danger">*</span></label>
                                <div class="input-group m-b-10">
                                    <div class="input-group-prepend"><span class="input-group-text"><i
                                                class="fab fa-lg fa-fw fa-rebel"></i></span></div>
                                    <input type="text" id="count" name="count" placeholder="Count"
                                        class="form-control">
                                </div>
                            </div>

                        </div>

                    </div>

                    <br>
                    <div class="row ml-2 mr-2">
                        <div class="col-10">
                        </div>

                        <div class="col-2">
                            <div class="form-group">
                                <button class="btn btn-primary btn-sm" type="submit" value="Submit"><i
                                        class="fa-solid fa-floppy-disk"></i>Create Booking</button>
                            </div>
                        </div>
                    </div>
                </form>

                <hr>
                <div class="container-fluid">
                    <div class="row ml-2 mr-2 mb-5">
                        <div class="col-12">
                            <div class="body">
                                <div class="table-responsive check-all-parent">
                                    <table class="table table-hover m-b-0 c_list" id="myDataTable">
                                        <thead>
                                            <tr>
                                                <th> Shipper Code </th>
                                                <th> Shipper Name </th>
                                                <th> Barcode Start </th>
                                                <th> Barcode End </th>
                                                <th> Count </th>
                                                <th> Action </th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($bookings as $booking)
                                                <tr>
                                                    <td>{{ $booking->shipper_code }}</td>
                                                    <td>{{ $booking->company_name }}</td>
                                                    <td>{{ $booking->barcode_start }}</td>
                                                    <td>{{ $booking->barcode_end }}</td>
                                                    <td>{{ $booking->count }}</td>
                                                    <td style="display: flex;">
                                                        <a href="{{ route('admin.shipment.booking_pdf', ['id' => $booking->id]) }}" class="btn btn-info btn-sm fa fa-print"
                                                            style="background-color: #5ac8fa; border-color: #5ac8fa;"></a>
                                                        &nbsp;
                                                        <a href="javascript:void(0);" id="show-employee" data-toggle="modal"
                                                            data-target="#EditBookingModal"
                                                            data-url="{{ route('admin.shipment.booking_edit', ['id' => $booking->id]) }}"
                                                            class="btn btn-primary btn-sm fa fa-edit" type="button"
                                                            style="background-color: #007aff;">
                                                        </a>
                                                        &nbsp;
                                                        <button class="delete-btn btn btn-danger btn-sm fa fa-trash"
                                                            data-booking-id="{{ $booking->id }}" data-toggle="modal"
                                                            data-target="#deleteBookingModal"></button>
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
    <!-- Edit Modal -->
    @include('admin.modal.booking_edit')
    <!-- Edit Modal -->

    <!-- Delete Modal -->
    @include('admin.modal.booking_delete')
    <!-- Delete Modal -->

@endsection

{{-- Scripts Section --}}
@section('page-scripts')
    <script src="{{ asset('js/pages/widgets.js') }}" type="text/javascript"></script>
    <script>
        $(document).ready(function() {
            $(".select2").select2();
            $('#myDataTable').DataTable();

        });

        $("body").on("click", "#show-employee", function() {
            var candidateURL = $(this).data('url');
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $.get(candidateURL, function(data) {
                // console.log(data);
                $('#EditBookingModal').modal('show');
                $('#b-id').val(data.id);
                $('#b-shipper').val(data.shipper);
                $('#b-barcode_start').val(data.barcode_start);
                $('#b-barcode_end').val(data.barcode_end);
                $('#b-count').val(data.count);
            });
        });
        $('.close_modal').click(function() {
            $('#EditBookingModal').modal('hide');
        });



        var barcodeStartInput = document.getElementById('barcode_start');
        var barcodeStartErrorContainer = document.getElementById('barcode_start_error');

        barcodeStartInput.addEventListener('input', function() {
            var value = this.value.trim();

            if (/^[A-Za-z]{7}$/.test(value)) {
                // Valid input
                this.classList.remove('is-invalid');
                this.classList.add('is-valid');
                barcodeStartErrorContainer.textContent = '';
            } else {
                // Invalid input
                this.classList.remove('is-valid');
                if (value.length === 0) {
                    barcodeStartErrorContainer.textContent = '';
                } else if (value.length > 7) {
                    this.classList.remove('is-invalid');
                    this.classList.add('is-valid');
                    barcodeStartErrorContainer.textContent = '';
                } else {
                    this.classList.add('is-invalid');
                    barcodeStartErrorContainer.textContent = 'Please enter at least 7 characters.';
                }
            }
        });

        var barcodeEndInput = document.getElementById('barcode_end');
        var barcodeEndErrorContainer = document.getElementById('barcode_end_error');

        barcodeEndInput.addEventListener('input', function() {
            var value = this.value.trim();

            if (/^[A-Za-z]{7}$/.test(value)) {
                // Valid input
                this.classList.remove('is-invalid');
                this.classList.add('is-valid');
                barcodeEndErrorContainer.textContent = '';
            } else {
                // Invalid input
                this.classList.remove('is-valid');
                if (value.length === 0) {
                    barcodeEndErrorContainer.textContent = '';
                } else if (value.length > 7) {
                    this.classList.remove('is-invalid');
                    this.classList.add('is-valid');
                    barcodeEndErrorContainer.textContent = '';
                } else {
                    this.classList.add('is-invalid');
                    barcodeEndErrorContainer.textContent = 'Please enter at least 7 characters.';
                }
            }
        });


        $("#create_booking").on("submit", function(e) {
            e.preventDefault()

            var _token = '{{ csrf_token() }}';
            var shipper = $("#shipper").val();
            var barcode_start = $("#barcode_start").val();
            var barcode_end = $("#barcode_end").val();
            var count = $("#count").val();

            var formData = new FormData();
            formData.append('_token', _token);
            formData.append('shipper', shipper);
            formData.append('barcode_start', barcode_start);
            formData.append('barcode_end', barcode_end);
            formData.append('count', count);

            $.ajax({
                type: "POST",
                url: "{{ route('admin.shipment.booking_save') }}",
                data: formData,
                processData: false,
                contentType: false,
                success: function(data) {
                    if (data) {
                        alert('Booking Added Successfully');
                        location.reload(true);
                    }
                },
                error: function(data, textStatus, errorThrown) {
                    alert('Booking Added Unsuccessfully');
                },
            });
        });
    </script>
@endsection

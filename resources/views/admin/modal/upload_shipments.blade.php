<meta name="csrf-token" content="{{ csrf_token() }}" />
<script src="https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.min.js"></script>
<script src="https://momentjs.com/downloads/moment.js"></script>


<div class="modal fade" id="uploadshipmentsmodal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <form class="needs-validation" id="importForm" novalidate>
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Place Order From Excel File</h5>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <div class="input-group m-b-10">
                            <input type="file" name="selected_file" id="selected_file" class="form-control"
                                accept=".xls, .xlsx">
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Load</button>
                </div>
            </form>
        </div>
    </div>
</div>

<script>
    $(document).ready(function(){
        // Use event delegation for the form submission
        $(document).on("submit", "#importForm", function(e) {
            e.preventDefault();

            const fileInput = $("#selected_file")[0].files[0];
            const shipperCode = $("#shipper_code").val();

            // Validate shipper code and file type
            if (!shipperCode) {
                showError("Please select shipper.");
                return;
            }

            if (!fileInput) {
                showError("Please select a valid Excel file.");
                return;
            }

            const formData = new FormData();
            formData.append("_token", $('meta[name="csrf-token"]').attr("content"));
            formData.append("selected_file", fileInput);
            formData.append("shipperCode", shipperCode);

            $.ajax({
                type: "POST",
                url: "{{ route('admin.shipment.import_shipments') }}",
                data: formData,
                processData: false,
                contentType: false,
                success: function(response) {
                    handleSuccess(response);
                    $('#buttons').removeClass('d-none');
                },
                error: function(xhr, textStatus, errorThrown) {
                    handleError("An error occurred: " + errorThrown);
                },
            });
        });

        // Function to handle success response
        function handleSuccess(response) {
            // showSuccess("Data Added Successfully");
            // Assuming you have a function called 'updateTable' to update your table with new data
            updateTable(response);
            $('#uploadshipmentsmodal').modal('hide');
        }

        // Function to display success message
        function showSuccess(message) {
            // You can customize how you want to display success messages (e.g., alert, modal, etc.)
            alert(message);
        }

        // Function to handle error response
        function handleError(message) {
            showError(message);
        }

        // Function to update the table with new data
        function updateTable(data) {
            var html = "";

            data.forEach((item) => {
                html += `<tr>
                        <td>${item.service_type}</td>
                        <td>${item.reciver_name}</td>
                        <td>${item.cod}</td>
                        <td>${item.contact_office_1}</td>
                        <td>${item.reference_number}</td>
                        <td>${item.area}</td>
                        <td>${item.country}</td>
                        <td>${item.instruction}</td>
                        <td>${item.no_of_peices}</td>
                        <td>${item.account_name}</td>
                    </tr>`;
            });

            var previewElement = document.getElementById('preview');
            if (previewElement) {
                previewElement.innerHTML = html;
            }
        }

        // Function to display error message
        function showError(message) {
            // You can customize how you want to display error messages (e.g., alert, modal, etc.)
            alert(message);
        }
    });
</script>

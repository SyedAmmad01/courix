<meta name="csrf-token" content="{{ csrf_token() }}" />
<script src="https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.min.js"></script>
<script src="https://momentjs.com/downloads/moment.js"></script>
<!-- Delete Modal-->
<div class="modal fade" id="batch_delete" tabindex="-1" role="dialog"aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h2 class="modal-title" id="exampleModalLabel">Delete Record</h2>
            </div>
            <div class="modal-body">
                <h5>Are you sure you want to delete this record?</h5>
                <input type="hidden" id="batchDeleteModalContent" readonly>
            </div>
            {{-- <input type="text" form="control" id="review"> --}}
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                <button type="button" class="btn btn-danger" id="confirmDeleteBtn">Delete</button>
            </div>
        </div>
    </div>
</div>

<!-- Delete Modal -->

<script>
    $(document).ready(function() {
        $('#confirmDeleteBtn').click(function() {
            var token = $('meta[name="csrf-token"]').attr('content');
            var ids = $('#batchDeleteModalContent')
                .val(); // Assuming this is a comma-separated list of IDs
            var idArray = ids.split(',').map(function(id) {
                return id.trim();
            });

            $.ajax({
                url: '/admin/shipment/delete',
                type: 'DELETE',
                data: {
                    _token: token,
                    ids: idArray, // Send the array of IDs
                },
                success: function(data) {
                    $('#batch_delete').modal('hide');
                    if (data.message) {
                        alert(data.message);
                        // location.reload(true);
                        data();
                    }
                },
                error: function(data, textStatus, errorThrown) {
                    alert('Error deleting orders');
                },
            });

        });
    });
</script>

<meta name="csrf-token" content="{{ csrf_token() }}" />
<script src="https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.min.js"></script>
<script src="https://momentjs.com/downloads/moment.js"></script>

<!-- Modal -->
<div class="modal fade bd-example-modal-lg" id="ShipmentViewModal" tabindex="-1" aria-labelledby="myLargeModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel" style="font-weight: bold;">Shipment Audit Information</h5>
                <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                <!--<button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>-->
            </div>
            <div class="modal-body">
                <div class="row mt-5">
                    <div class="col-md-4">
                        <h5 style="font-weight: bold;">Name</h5>
                        <br>
                        <p><strong>Updated On</strong> <span id=""></span></p>
                        <br>
                        <p><strong>Area Name</strong> <span id=""></span></p>
                        <br>
                        <p><strong>Shipper Name</strong> <span id=""></span></p>
                        <br>
                        <p><strong>Tracking Status</strong> <span id=""></span></p>
                        <br>
                        <p><strong>Invoice No</strong> <span id=""></span></p>
                        <br>
                        <p><strong>Driver Paid Status</strong> <span id=""></span></p>
                        <br>
                        <p><strong>Customer Paid Status</strong> <span id=""></span></p>
                    </div>
                    <div class="col-md-4">
                        <h5 style="font-weight: bold;">New Value</h5>
                        <br>
                        <p><strong></strong> <span id="s-new-time-date" style="color: #5ac8fa; font-size: 13px;
                            font-weight: bold;"></span></p>
                        <br>
                        <p><strong></strong> <span id="s-new-area" style="color: #5ac8fa; font-size: 13px;
                            font-weight: bold;"></span></p>
                        <br>
                        <p><strong></strong> <span id="s-new-shipper_name" style="color: #5ac8fa; font-size: 13px;
                            font-weight: bold;"></span></p>
                        <br>
                        <p><strong></strong> <span id="s-new-status" style="color: #5ac8fa; font-size: 13px;
                            font-weight: bold;"></span></p>
                        <br>
                        <p><strong></strong> <span id=""></span></p>
                        <br>
                        <p><strong></strong> <span id=""></span></p>
                        <br>
                        <p><strong></strong> <span id=""></span></p>
                    </div>
                    <div class="col-md-4">
                        <h5 style="font-weight: bold;">Old Value</h5>
                        <br>
                        <p><strong></strong> <span id="s-old-time-date" style="color: #5ac8fa; font-size: 13px;
                            font-weight: bold;"></span></p>
                        <br>
                        <p><strong></strong> <span id="s-old-area" style="color: #5ac8fa; font-size: 13px;
                            font-weight: bold;"></span></p>
                        <br>
                        <p><strong></strong> <span id="s-old-shipper_name" style="color: #5ac8fa; font-size: 13px;
                            font-weight: bold;"></span></p>
                        <br>
                        <p><strong></strong> <span id="s-old-status" style="color: #5ac8fa; font-size: 13px;
                            font-weight: bold;"></span></p>
                        <br>
                        <p><strong></strong> <span id=""></span></p>
                        <br>
                        <p><strong></strong> <span id=""></span></p>
                        <br>
                        <p><strong></strong> <span id=""></span></p>
                    </div>
                </div>

                <h5 class="modal-title" id="exampleModalLabel" style="font-weight: bold;">Shipment Audit Information</h5>
                <div class="row mt-5">
                    <div class="col-md-4">
                        <p><strong>Driver Name</strong>
                        <span id="s-driver-id" style="color: #5ac8fa; font-size: 13px; font-weight: bold;"></span>
                        </p>
                        <br>
                        <p><strong>Driver Paid Status</strong> <span id=""></span></p>
                        <br>
                        <p><strong>Invoice Number</strong> <span id=""></span></p>
                        <br>
                        <p><strong>Service Charges</strong>
                        <br>
                        <span id="s-service-charges" style="color: #5ac8fa; font-size: 13px; font-weight: bold;"></span>
                        </p>
                        <br>
                        <p><strong>Total COD</strong>
                        <br>
                        <span id="s-cod" style="color: #5ac8fa; font-size: 13px;
                            font-weight: bold;"></span>
                        </p>
                        <br>
                        <p><strong>Address</strong>
                        <br>
                        <span id="s-address" style="color: #5ac8fa; font-size: 13px;
                        font-weight: bold;"></span></p>
                        <br>
                        <p><strong>Description</strong>
                        <br>
                        <span id="s-description" style="color: #5ac8fa; font-size: 13px;
                            font-weight: bold;"></span>
                        </p>
                    </div>
                    <div class="col-md-4">
                        <p><strong>Recipent Name</strong>
                        <br>
                        <span id="s-reciver-name" style="color: #5ac8fa; font-size: 13px;
                            font-weight: bold;"></span>
                        </p>
                        <br>
                        <p><strong>Customer Paid Status</strong> <span id=""></span></p>
                        <br>
                        <p><strong>Updated On</strong>
                        <br>
                        <span id="s-updated-by" style="color: #5ac8fa; font-size: 13px;
                        font-weight: bold;"></span></p>
                        <br>
                        <p><strong>Remarks</strong>
                        <br>
                        <span id="s-remarks" style="color: #5ac8fa; font-size: 13px;
                            font-weight: bold;"></span>
                        </p>
                        <br>
                        <p><strong>Mobile</strong>
                        <br>
                        <span id="s-mobile" style="color: #5ac8fa; font-size: 13px;
                            font-weight: bold;"></span>
                        </p>
                    </div>
                    <div class="col-md-4">
                        <p><strong>Driver Paid Date</strong> <span id=""></span></p>
                        <br>
                        <p><strong>Created On</strong>
                        <br>
                        <span id="s-created-by" style="color: #5ac8fa; font-size: 13px;
                        font-weight: bold;"></span></p>
                        <br>
                        <p><strong>Updated By</strong> <span id=""></span></p>
                        <br>
                        <p><strong>Qty</strong>
                        <br>
                        <span id="s-qty" style="color: #5ac8fa; font-size: 13px;
                            font-weight: bold;"></span>
                        </p>
                        <br>
                        <p><strong>Area</strong>
                        <br>
                        <span id="s-area" style="color: #5ac8fa; font-size: 13px;
                            font-weight: bold;"></span>
                        </p>
                    </div>
                </div>

            </div>
            <div class="modal-footer">
                <!--<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>-->
            </div>
        </div>
    </div>
</div>

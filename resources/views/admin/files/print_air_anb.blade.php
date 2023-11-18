    <!DOCTYPE html>
    <html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>GetAirwayBillLabelByTrackingNos</title>
        <link rel="shortcut icon" href="{{ asset('admin_assets') }}/assets/images/icons/background.png" />
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    </head>
    <body onload="window.print();">
        @foreach ($shipments as $shipment)
        <div class="container">
            <div class="row">
                <div class="col-4" style="margin-top: 100px;">
                    <img src="{{ asset('admin_assets') }}/assets/images/icons/background.png">
                </div>

                <div class="col-8" style="margin-top: 120px;">
                    <div>{!! DNS1D::getBarcodeHTML("$shipment->barcode", 'C39', 2, 80) !!}</div>
                    <h5 style="margin-left: 120px; font-weight: bold;">{{ $shipment->reference_number }}</h5>
                </div>
            </div>

            <div class="row">
                <div class="col-4">
                    <a href="https://www.courix.ae/" style="text-decoration: none; color: black; font-weight: bold;">www.courix.ae</a>
                    <h6 style="font-weight: bold; font-size: 13px;">Customer Service :<span> +971 42239944</span></h6>
                    <h6 style="font-weight: bold; font-size: 13px;">Address :<span> Office No. 10, Umm Ramool Dubai, UAE</span></h6>
                    <h6 style="font-weight: bold;">Shipper Refrence :<span> {{ $shipment->reference_number }} </span></h6>
                </div>
                <div class="col-4">
                </div>
                <div class="col-4">
                    <h6 style="font-weight: bold; margin-top: 70px; margin-left: 240px; ">COD :<span> {{ $shipment->cod }}.00 </span></h6>
                </div>
            </div>


            <div class="row mb-5">
                <div class="col-12">
                <div class="card-group">
                <div class="card border-dark">
                    <div class="card-body">
                    <h6 style="font-weight: bold; font-size: 13px;">Shipper :<span> {{ $shipment->shipper_name }} </span></h6>
                    <h6 style="font-weight: bold; font-size: 13px;">Tel :<span> {{ $shipment->contact_office_1 }} </span></h6>
                    <h6 style="font-weight: bold; font-size: 13px;">Address :<span>  {{ $shipment->street_address }} , {{ $shipment->shipment_area_name }} , {{ $shipment->shipment_city_name }} , {{ $shipment->shipment_country_name }} </span></h6>
                    </div>
                </div>


                <div class="card border-dark">
                    <div class="card-body">
                    <h6 style="font-weight: bold; font-size: 13px;">Receiver :<span> {{ $shipment->reciver_name }}</span></h6>
                    <h6 style="font-weight: bold; font-size: 13px;">Mobile :<span> {{ $shipment->mobile_1 }}</span></h6>
                    <h6 style="font-weight: bold; font-size: 13px;">Area :<span> {{ $shipment->shipper_address }}</span></h6>
                    <h6 style="font-weight: bold; font-size: 13px;">Address :<span>  {{ $shipment->shipper_area_name }} , {{ $shipment->shipper_city_name }} , {{ $shipment->shipper_country_name }} </span></h6>
                    </div>
                </div>
                </div>

                <div class="card-group">
                <div class="card border-dark">
                    <div class="card-body">
                        <h6 style="font-weight: bold; font-size: 13px;">Description :<span> {{ $shipment->description }} </span></h6>
                    </div>
                </div>

                </div>

                <div class="card-group">
                <div class="card border-dark">
                    <div class="card-body">
                        <h6 style="font-weight: bold; font-size: 13px;">Instructions :<span> {{ $shipment->instruction }} </span></h6>
                    </div>
                </div>

                </div>

                <div class="card-group">
                <div class="card border-dark">
                    <div class="card-body">
                        <h6 style="font-weight: bold; font-size: 13px;">Ship Date :<span> {{ $shipment->order_date }} </span></h6>
                        <h6 style="font-weight: bold; font-size: 13px;">Service :<span>{{ $shipment->service_type }}</span></h6>
                    </div>
                </div>


                <div class="card border-dark">
                    <div class="card-body">
                        <h6 style="font-weight: bold; font-size: 13px;">Account No :<span> {{ $shipment->ship_code }}</span></h6>
                        <h6 style="font-weight: bold; font-size: 13px;">Weight :<span> {{ $shipment->actual_weight }}</span></h6>
                        <h6 style="font-weight: bold; font-size: 13px;">Number of Pcs :<span> {{ $shipment->no_of_peices }}</span></h6>
                    </div>
                </div>


                <div class="card border-dark">
                    <div class="card-body">
                        <h6 style="font-weight: bold; font-size: 13px;">Received By :<span> </span></h6>
                        <h6 style="font-weight: bold; font-size: 13px;">Name :<span> </span></h6>
                        <h6 style="font-weight: bold; font-size: 13px;">Date :<span> </span></h6>
                    </div>
                </div>


                <div class="card border-dark">
                    <div class="card-body">
                        <h6 style="font-weight: bold; font-size: 13px;">Receiver Name :<span> </span></h6>
                        <h6 style="font-weight: bold; font-size: 13px;">Date :<span> </span></h6>
                        <h6 style="font-weight: bold; font-size: 13px;">Account Name :<span>{{ $shipment->account_name }}</span></h6>
                    </div>
                </div>


                </div>


                </div>
            </div>

        <hr style="border: 2px solid black; font-weight: bold;">
        </div>

        @endforeach



    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
    </body>
    </html>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $title ?? 'Page Title' }}</title>
    <!-- Add any additional meta tags, stylesheets, or scripts here -->
</head>

<body>
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="body">
                    <div class="table-responsive check-all-parent">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>Job Code</th>
                                    <th>Tracking No</th>
                                    <th>Shipper Ref</th>
                                    <th>Area</th>
                                    <th>Recipient Address</th>
                                    <th>Job Status</th>
                                    <th>Shipment Status</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($shipments as $shipment)
                                @php
                                    if($shipment->job_status == 1){
                                        $status = 'Created';
                                    }
                                    elseif ($shipment->job_status == 2) {
                                        $status = 'Started';
                                    }
                                    elseif ($shipment->job_status == 3) {
                                        $status = 'Delivered';
                                    }
                                @endphp
                                <tr>
                                        <td>{{ $shipment->job_code }}</td>
                                        <td>{{ $shipment->tracking_number }}</td>
                                        <td>{{ $shipment->reference_number }}</td>
                                        <td>{{ $shipment->area_name }}</td>
                                        <td>{{ $shipment->shipment_country_name }},
                                            {{ $shipment->shipment_city_name }},
                                            {{ $shipment->shipment_area_name }}, {{ $shipment->street_address }}</td>
                                        <td>{{ $status }}</td>
                                        <td>{{ $shipment->status_name }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Add any additional scripts or closing tags here -->
</body>

</html>

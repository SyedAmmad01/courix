<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $title }}</title>
    <style>
        .page-break {
            page-break-before: always;
        }
        .container {
            margin-bottom: 200px; /* Adjust the margin as needed */
        }
    </style>
</head>
<body>
    {{-- Counter to keep track of records on a page --}}
    @php
        $recordsPerPage = 3;
        $recordCount = 0;
    @endphp

    {{-- Loop through each record collection --}}
    @foreach($records as $recordCollection)
        {{-- Output a page break if three records are already on the page --}}
        @if ($recordCount % $recordsPerPage == 0 && $recordCount > 0)
            <div class="page-break"></div>
        @endif

        {{-- Loop through each booking in the current record collection --}}
        @foreach($recordCollection as $booking)
            {{-- Display booking information --}}
            <div class="container">
                <div class="row">
                    <div class="col-6">
                        <h6>{{ $booking->shipper_code }}</h6>
                        <h6>{{ $booking->company_name }}</h6>
                        <h6>{{ $booking->zone_name }}</h6>
                    </div>
                    <div class="col-6">
                        <!-- Add any additional content for each booking's page if needed -->
                    </div>
                </div>
            </div>

            {{-- Increment the record counter --}}
            @php
                $recordCount++;
            @endphp
        @endforeach
    @endforeach
</body>
</html>

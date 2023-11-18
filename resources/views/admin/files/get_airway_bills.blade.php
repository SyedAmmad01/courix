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
	<style>
.box {
    position: relative; /* Make the .box a positioning context for the .rotated-text */
    background-color: lightgrey;
    border: 1px solid black;
    padding: 0.5rem; /* Adjust padding as needed */
    min-height: 21.3rem; /* Adjust the minimum height */
    width: 100px; /* Set your desired width */
}

.box1 {
/*    background-color: lightgrey;*/
    border: 1px solid black;
    padding: 0.5rem; /* Adjust padding as needed */
    min-height: 5rem; /* Adjust the minimum height */
}

.box2{
	/*    background-color: lightgrey;*/
    border: 1px solid black;
    padding: 0.5rem; /* Adjust padding as needed */
    min-height: 15.6rem; /* Adjust the minimum height */
}

.box3 {
    position: relative;
    background-color: lightgrey;
    border: 1px solid black;
    padding: 0.8rem;
    min-height: 20.6rem;
    width: 100px;
}

.box4 {
    position: relative;
    background-color: lightgrey;
    border: 1px solid black;
    padding: 0.5rem;
    min-height: 20.65rem;
    width: 100px;
}

.box4 {
    position: relative;
    background-color: lightgrey;
    border: 1px solid black;
    padding: 0.5rem;
    min-height: 20.65rem;
    width: 100px;
}

.box5 {
    position: relative;
    background-color: lightgrey;
    border: 1px solid black;
    padding: 0.5rem;
    min-height: 15.65rem;
    width: 100px;
}

.box6 {
    /* position: relative; */
    /* background-color: lightgrey; */
    border: 1px solid black;
    padding: 0.5rem;
    min-height: 20.65rem;
    /* width: 100px; */
}



.card1 {
    min-height: 20rem; /* Adjust the minimum height */
    width: 50px; /* Set your desired width */
}

.card2 {
    min-height: 10rem; /* Adjust the minimum height */
    width: 100px; /* Set your desired width */
}

.card3 {
    min-height: 20rem; /* Adjust the minimum height */
    width: 50px; /* Set your desired width */
}



.rotated-text {
    transform: rotate(270deg);
    font-size: 18px;
    position: absolute;
    top: 50%;
    left: -37%;
    /* transform: translate(-50%, -50%); */
}

.rotated-text1 {
    transform: rotate(90deg);
    top: 35%;
    left: -80%;
    padding-left: 50px;
    /* text-align: center; */
 }

.rotated-text2 {
    transform: rotate(-89deg);
    font-size: 18px;
    position: absolute;
    top: 45%;
    left: -53%;
    /* transform: translate(-50%, -50%); */
}


/* .outside {
    transform: rotate(450deg);
    position: absolute;
    top: 51%;
    left: 95%;
} */
.outside_2 {
    transform: rotate(450deg);
    position: absolute;
    top: 17%;
    left: 1055px;
    /* font-size: 10px; */
}
.outside_3 {
    transform: rotate(450deg);
    position: absolute;
    top: 6%;
    left: 1108px;
    /* font-size: 10px; */
}
.background-text {
    content: "Your Background Text";
    color: #D3D3D3;
    position: absolute;
    top: 0;
    left: 200px;
    right: 0px;
    bottom: 86px;
    display: flex;
    justify-content: center;
    align-items: center;
    font-size: 196px;
    transform: rotate(311deg);
}
.outside {
    position: absolute;
    top: 45%;
    left: 98%;
    width: 100px;
}

.reference {
    transform: rotate(450deg);
    width: 50%;
}

    </style>

@foreach ($shipments as $shipment)
<div class="container mt-5">
    <div class="row">
        <div class="col-12">
            <div class="outside">
                <h3 class="reference">
                    {{$shipment->reference_number}}
                </h3>
            </div>
        	{{-- <h3 class="outside">{{$lastShipment->reference_number}}</h3> --}}
        	<h3 class="outside_2">*{{$shipment->barcode}}*</h3>
        	<h2 class="outside_3">AWB</h2>
            <div class="card border-dark">
                <div class="card-body">
                    <div class="row">
                        <div class="col-4">
                            <img src="{{ asset('admin_assets') }}/assets/images/icons/background.png" alt="AWB Logo" width="100" height="70">
                            <h2 style="margin-left: 30px; margin-top: 30px;">AWB</h2>
                        </div>
                        <div class="col-4">
                            <div>{!! DNS1D::getBarcodeHTML("$shipment->barcode", 'C39', 2, 80) !!}</div>
                            <h2 style="margin-left: 80px;">{{$shipment->barcode}}</h2>
                        </div>
                    </div>
                </div>
            </div>

            @php
            if($shipment->city == 1){
                $last = 'AUH';
            }
            if($shipment->city == 2){
                $last = 'SHJ';
            }
            if($shipment->city == 3){
                $last = 'DXB';
            }
            if($shipment->city == 4){
                $last = 'AJM';
            }
            if($shipment->city == 5){
                $last = 'ALN';
            }
            if($shipment->city == 6){
                $last = 'FUJ';
            }
            if($shipment->city == 7){
                $last = 'UMQ';
            }
        @endphp

            <div class="card border-dark">
                <div class="card-body">
                    <div class="row">
                        <div class="col-6">
                            <p>Ref #</p>
                        </div>
                        <div class="col-6 text-right">
                            <p>{{$shipment->reference_number}}</p>
                        </div>
                    </div>
                </div>
            </div>


			<div class="card-group">
			    <div class="card1">
			        <div class="box">
			        	<p class="rotated-text">Shipper Details</p>
			        </div>
			    </div>
			    <div class="card">
			        <div class="row no-gutters">
			            <div class="col-3">
			                <div class="box1">
			                	<p class="text-center">Origin</p>
			                	<h5 class="text-center">{{$last}}</h5>
			                </div>
			            </div>
			            <div class="col-3">
			                <div class="box1">
			                	<p class="text-center">Destination</p>

                                @php
                                $cityCode = null;
                                if ($shipment->city !== null) {
                                    $city = DB::table('citys')->where('id', $shipment->city)->first();
                                    if ($city) {
                                        // Use a switch statement or associative array to set city codes.
                                        switch ($city->id) {
                                            case 1:
                                                $cityCode = 'AUH';
                                                break;
                                            case 2:
                                                $cityCode = 'SHJ';
                                                break;
                                            case 3:
                                                $cityCode = 'DXB';
                                                break;
                                            case 4:
                                                $cityCode = 'AJM';
                                                break;
                                            case 5:
                                                $cityCode = 'ALN';
                                                break;
                                            case 6:
                                                $cityCode = 'FUJ';
                                                break;
                                            case 7:
                                                $cityCode = 'UMQ';
                                                break;
                                            default:
                                                $cityCode = 'Unknown'; // Handle the case when the city ID doesn't match any of the cases.
                                        }
                                    }
                                }
                            @endphp

                            <h5 class="text-center">{{ $cityCode }}</h5>


			                </div>
			            </div>
			            <div class="col-3">
			                <div class="box1">
			                	<p class="text-center">Product</p>
			                	<h5 class="text-center">DOM / CDS</h5>
			                </div>
			            </div>
			            <div class="col-3">
			                <div class="box1">
			                	<p class="text-center">Services</p>
			                	<h5 class="text-center">{{$shipment->service_type}}</h5>
			                </div>
			            </div>

			            <!-- New Lines -->

			            <div class="col-4">
			                <div class="box1">
			                <p class="text-left">Description of goods</p>
			                </div>
			            </div>

			            <div class="col-4">
			                <div class="box1">
			                <p class="text-left">Payment ACC</p>
			                </div>
			            </div>

			            <div class="col-4">
			                <div class="box1"></div>
			            </div>

			            <!-- New Lines -->


			            <!-- New Lines -->

			            <div class="col-12">
			                <div class="box1">
			                <p class="text-left">Iphone
			                </p>
			            </div>
			            </div>

			            <!-- New Lines -->


			            <!-- New Lines -->

			            <div class="col-4">
			                <div class="box1">
			                <p class="text-center">GoodsOrigin</p>
			                <h5 class="text-center">{{$last}}</h5>
			                </div>
			            </div>

			            <div class="col-4">
			                <div class="box1">
			                <p class="text-center">COD Value</p>
			                <h5 class="text-center">{{$shipment->cod}}.00/-.00/-</h5>
			                </div>
			            </div>

			            <div class="col-4">
			                <div class="box1">
			                <p class="text-center">PCs</p>
			                <h5 class="text-center">{{$shipment->no_of_peices}}</h5>
			                </div>
			            </div>

			            <!-- New Lines -->




			        </div>
			    </div>
			</div>


			<div class="card-group">
			    <div class="card1">
			        <div class="box4">
			        	<p class="rotated-text">Shipper Details</p>
			        </div>
			    </div>
			    <div class="card">
			        <div class="row no-gutters">
			            <div class="col-4">
			                <div class="box1">
                                @php
                                $shippers = null;
                                if ($shipment->shipper_code !== null) {
                                $shippers = DB::table('shippers')->where('id', $shipment->shipper_code)->first();
                                }
                                @endphp
                                <p class="text-center">Account # {{ $shippers ? $shippers->shipper_code : 'Unknown Shipper' }}</p>
			                </div>
			            </div>
			            <div class="col-4">
			                <div class="box1">
			                	<p class="text-center">PickupDate</p>
			                </div>
			            </div>
			            <div class="col-4">
			                <div class="box1">
			                	<p class="text-center">{{$shipment->order_date}}</p>
			                </div>
			            </div>


			            <!-- New Lines -->

			            <div class="col-12">
			                <div class="box2">
			               	<div class="row">
			               		<div class="col-3">
			               			<h6>Name</h6>
			               			<h6>Address</h6>
			               			<br>
			               			<h6>City</h6>
			               			<h6>Tel</h6>
			               			<h6>Ref2</h6>
			               		</div>

			               		<div class="col-9">
                                    <h5>{{ $shippers ? $shippers->company_name : 'Unknown Shipper' }}</h5>
                                    @php
                                        $country = DB::table('countrys')->where('id', $shippers->country)->first();
                                        $city = DB::table('citys')->where('id', $shippers->city)->first();
                                        $area = DB::table('areas')->where('id', $shippers->area)->first();
                                    @endphp
			               			<h5>{{ $shippers ? $shippers->street_address : 'Unknown Address' }} , {{ $area ? $area->name : 'Unknown Area' }} , {{ $city ? $city->name : 'Unknown City' }} , {{ $country ? $country->name : 'Unknown Country' }}</h5>
			               			<h5>{{ $city ? $city->name : 'Unknown City' }}</h5>
			               			<h5>{{ $shippers ? $shippers->contact_office_1 : 'Unknown Shipper' }}</h5>
			               			<h5></h5>
			               		</div>
			               	</div>
			            </div>
			            </div>

			            <!-- New Lines -->



			        </div>
			    </div>


			    <div class="card2">
			        <div class="box3">
                        <div class="rotated-text1 mb-3">{!! DNS1D::getBarcodeHTML("$shipment->reference_number", 'C93' ,1  ,50 ) !!}</div>
			        </div>
			    </div>
			</div>


			<div class="card-group">
			    <div class="card1">
			        <div class="box4">
			        	<p class="rotated-text2">Consignce Details</p>
			        </div>
			    </div>
			    <div class="card">
			        <div class="row no-gutters">
			            <div class="col-12">
			            	<h3 class="inside background-text">{{ $last }}</h3>
			                <div class="box6">
			                	<div class="row">
			                		<div class="col-3">
			                			<h6>Name</h6>
			                			<h6>Address</h6>
			                			<h6>Area</h6>
			                			<h6>City</h6>
			                			<h6>Tel1</h6>
			                			<h6>Tel2</h6>
			                		</div>

			                		<div class="col-9">
                                        <h5>{{$shipment->reciver_name}}</h5>
                                        @php
                                        $country_reciver = DB::table('countrys')->where('id', $shipment->country)->first();
                                        $city_reciver = DB::table('citys')->where('id', $shipment->city)->first();
                                        $area_reciver = DB::table('areas')->where('id', $shipment->area)->first();
                                        @endphp
                                        <h5>{{ $shippers ? $shipment->street_address : 'Unknown Address' }} , {{ $area_reciver ? $area_reciver->name : 'Unknown Area' }} , {{ $city_reciver ? $city_reciver->name : 'Unknown City' }} , {{ $country_reciver ? $country_reciver->name : 'Unknown Country' }}</h5>
			                			 <h5>{{ $area_reciver ? $area_reciver->name : 'Unknown Area' }}</h5>
			                			 <h5>{{ $city_reciver ? $city_reciver->name : 'Unknown City' }}</h5>
			                			 <h5>{{$shipment->mobile_1}}</h5>
			                			 <h5>{{$shipment->mobile_2}}</h5>
			                		</div>
			                	</div>
			                </div>
			            </div>
			        </div>
			    </div>
			</div>

			<div class="card">
			        <div class="row no-gutters">
			            <div class="col-12">
			                <div class="box1">
			                	<div class="row">
			                		<div class="col-3">
			                			<h6>Remarks</h6>
			                			<h6>Account</h6>
			                			<h6>Reference</h6>
			                			<h6>Printed</h6>
			                		</div>

			                		<div class="col-6">
			                			 <h5>{{$shipment->instruction}}</h5>
			                			 <h5>{{$shipment->account_name}}</h5>
			                			 <h5>{{$shipment->reference_number}}</h5>
			                			 <h5>{{ $current_time }}</h5>
			                		</div>

			                		<div class="col-3">
			                			<br>
			                			<br>
			                			<br>
			                			<h6>0</h6>
			                			<h6></h6>
			                		</div>

			                	</div>
			                </div>
			            </div>
			        </div>
			</div>


				<div class="row">
					<div class="col-12">
					<div class="text-center">
						<p><a href="https://www.courix.ae/" style="text-decoration: none; color: black;">www.courix.ae</a></p>
					</div>
				</div>
			</div>

        </div>
    </div>
</div>
@endforeach

<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
</body>
</html>

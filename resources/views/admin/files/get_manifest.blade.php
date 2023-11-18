<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>GetManifest</title>
    <link rel="shortcut icon" href="{{ asset('admin_assets') }}/assets/images/icons/background.png" />
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
</head>
<body onload="window.print();">

	<div class="container">
		<div class="row">
			<div class="col-3" style="margin-top: 100px;">
				<img src="{{ asset('admin_assets') }}/assets/images/icons/background.png">
			</div>

			<div class="col-6" style="margin-top: 120px;">
                <h3 style="margin-left: 180px; font-weight: bold;">Manifest</h3>
			</div>

            <div class="col-3" style="margin-top: 100px;">
                <img src="{{ asset('admin_assets') }}/assets/images/icons/barcode.png" width="250px;" height="100px;">
                <h5 style="margin-left: 50px; font-weight: bold;">M20231007938</h5>
            </div>
		</div>



       <hr style="border: 2px solid black; font-weight: bold;">

       <div class="row">
        <div class="col-4" >
            <h6 style="font-weight: bold;">From <span> Demo </span></h6>
            <h6 style="font-weight: bold;">Driver <span>  </span></h6>
        </div>

        <div class="col-4" >
            <h6 style="font-weight: bold;">To <span>  </span></h6>
            <h6 style="font-weight: bold;">Courier <span>  </span></h6>
        </div>

        <div class="col-4" >
            <h6 style="font-weight: bold;">Time <span> {{ $current_time }} </span></h6>
            <h6 style="font-weight: bold;">Quantity <span> 1 </span></h6>
        </div>
       </div>

       <hr style="border: 2px solid black; font-weight: bold;">

       <div class="row">
        <div class="col-4" >
            <h6 style="font-weight: bold;">Tracking No <span>&nbsp; &nbsp; &nbsp; &nbsp; Description </span></h6>
        </div>

        <div class="col-4" >
            <h6 style="font-weight: bold;">Service Type <span>  </span></h6>
        </div>

        <div class="col-4" >
            <h6 style="font-weight: bold;">Total Collectables <span>&nbsp; &nbsp; &nbsp; &nbsp; Barcode </span></h6>
        </div>
       </div>


       <hr style="border: 2px solid black; font-weight: bold;">

       <div class="row">
        <div class="col-4 mt-4">
            <h6 style="font-weight: bold;">786966647296 <span>&nbsp; &nbsp; &nbsp; &nbsp; Iphone </span></h6>
        </div>

        <div class="col-4 mt-4">
            <h6 style="font-weight: bold;">Next Day Delivery <span>&nbsp; &nbsp; &nbsp; &nbsp; 100.00 </span></h6>
        </div>

        <div class="col-4 ">
            <img src="{{ asset('admin_assets') }}/assets/images/icons/barcode.png" width="250px;" height="100px;">
        </div>
       </div>

       <hr style="border: 2px solid black; font-weight: bold;">




    <div class="row" style="margin-bottom:300px;">
        <div class="col-2" >
            <h6 style="font-weight: bold;">Sent By :</h6>
            &nbsp;
            <h6 style="font-weight: bold;">Date : </h6>
            &nbsp;
            <h6 style="font-weight: bold;">Signature :</h6>
        </div>

        <div class="col-4">
           <hr style="border: 1px solid black; font-weight: bold;">
           &nbsp;
           <hr style="border: 1px solid black; font-weight: bold;">
           &nbsp;
           <hr style="border: 1px solid black; font-weight: bold;">
        </div>


        <div class="col-2" >
            <h6 style="font-weight: bold;">Sent By :</h6>
            &nbsp;
            <h6 style="font-weight: bold;">Date :</h6>
            &nbsp;
            <h6 style="font-weight: bold;">Signature :</h6>
        </div>

        <div class="col-4">
           <hr style="border: 1px solid black; font-weight: bold;">
           &nbsp;
           <hr style="border: 1px solid black; font-weight: bold;">
           &nbsp;
           <hr style="border: 1px solid black; font-weight: bold;">
        </div>

       </div>

       <hr style="border: 2px solid black; font-weight: bold;">

       <div class="row">

        <div class="col-6">
            <p>Address :<span> Office No. 10, Umm Ramool Dubai, UAE </span></p>
        </div>

        <div class="col-3">
            <p>Website : <a href="https://www.courix.ae/" style="text-decoration: none; color: black;">www.courix.ae</a></p>
        </div>

        <div class="col-3">
            <p>Printed : <span>{{ $current_date }}</span></p>
            <p>Page<span>1/1</span></p>
        </div>

       </div>

       </div>

<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
</body>
</html>

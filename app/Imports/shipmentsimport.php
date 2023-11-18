<?php


namespace App\Imports;

use App\Models\logs;
use App\Models\OrderInscan;
use App\Models\OrderStatus;
use App\Models\Shipment;
use Illuminate\Support\Facades\Validator;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log; // Import the Log facade
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Request;

class shipmentsimport implements ToModel, WithHeadingRow
{

    private $shipperCode;

    public function __construct($shipperCode)
    {
        $this->shipperCode = $shipperCode;
    }

    public function model(array $row)
    {

    // dd($row);
    $get = DB::table('shippers')->where('id' , $this->shipperCode)->first();
    // dd($get);
    $currentDateTime = now(); // Get the current date and time.
    $currentDate = date('Y-m-d');
    $country = DB::table('countrys')->where('name', 'LIKE', '%' . $row['countrycode'] . '%')->first();
    $city = DB::table('citys')->where('name', 'LIKE', '%' . $row['citycode'] . '%')->first();
    $area = DB::table('areas')->where('name', 'LIKE', '%' . $row['area'] . '%')->first();
    // dd($currentDateTime);
    $data = [
        'awb_number' => $row['shipperref'],
        'reference_number' => $row['shipperref'],
        'order_date' => $currentDate,
        'service_type' => $row['servicetype'],
        'shipper_code' => $this->shipperCode,
        'shipper_name' => $get->company_name,
        'contact_office_1' => $row['mobilenumber'],
        'account_name' => $row['accountname'],
        'reciver_name' => $row['receivername'],
        'cod' => $row['cod'],
        'instruction' => $row['instructions'],
        'description' => $row['description'],
        'country' => $country->id,
        'city' => $city->id,
        'area' => $area->id,
        'street_address' => $row['address'],
        'no_of_peices' => $row['pcs'],
        'status' => 2,
        'inscan' => 1,
        'outscan' => 0,
        'delivery_attempt' => 0,
        'created_at' => $currentDateTime,
        'updated_at' => $currentDateTime,

    ];

    DB::table('shipments')->insert($data);

    // Create the first log entry
    $logs = new logs;
    $logs->shipment_id = $this->shipperCode;
    $logs->status_type = 1;
    $logs->status = 1;
    $logs->auth_id = Auth::user()->id;
    $logs->save();

    // Create the second log entry with a different status value
    $logs = new logs;
    $logs->shipment_id = $this->shipperCode;
    $logs->status_type = 1;
    $logs->status = 2;  // Change the status value
    $logs->auth_id = Auth::user()->id;
    $logs->save();

    // Create the Order Status first entry
    $OrderStatus = new OrderStatus;
    $OrderStatus->shipment_id = $this->shipperCode;
    $OrderStatus->status = 1;  // Change the status value
    $OrderStatus->auth_id = Auth::user()->id;
    $OrderStatus->save();


    // Create the Order Status second entry
    $OrderStatus = new OrderStatus;
    $OrderStatus->shipment_id = $this->shipperCode;
    $OrderStatus->status = 2;  // Change the status value
    $OrderStatus->auth_id = Auth::user()->id;
    $OrderStatus->save();

    // Create the Order Status second entry
    $OrderInscan = new OrderInscan;
    $OrderInscan->shipment_id = $this->shipperCode;
    $OrderInscan->auth_id = Auth::user()->id;
    $OrderInscan->save();

    }

    }

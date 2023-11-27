<?php

namespace App\Http\Controllers\User;

use App\Models\Shipment;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Booking;
use App\Models\Shipper;
use App\Models\OrderInscan;
use App\Models\logs;
use App\Models\OrderStatus;
use App\Models\ShipmentLogs;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class ShipmentController extends Controller
{
    public function place_order_page(Request $request)
    {
        $page_title = 'Place Order';
        $page_description = 'Shipment / Place Order';
        $userId = Auth::id();
        $shippers = Shipper::where('id', $userId)->first();
        $countrys = DB::table('countrys')->get();
        $random = rand(000000000000, 9999999999);
        $last = Shipment::latest('id')->first();
        $tracking_number = Shipment::latest('id')->first();
        if ($last == null) {
            $last = 1;
        } else {
            $last = $last->id + 1;
        }
        if ($tracking_number == null) {
            $tracking_number = 1;
        } else {
            $tracking_number = $tracking_number->id + 1;
        }
        $data = array(
            'page_title' => $page_title,
            'page_description' =>  $page_description,
            'shippers' => $shippers,
            'random_no' => $random,
            'last' => $last,
            'tracking_number' => $tracking_number,
            'fetch_countrys' => $countrys,
        );
        // dd($data);
        return view('user.shipment.place_order')->with($data);
    }

    public function getcity(Request $request)
    {
        $sections = DB::table('areas')->where('city_id', $request->cid)->orderby('id', 'asc')->get();
        $html = '<option value="" selected disabled>Please Select Area</option>';
        foreach ($sections as $section) {
            $html .= '<option value="' . $section->id . '">' . $section->name . '</option>';
        }
        return $html;
    }

    public function getarea(Request $request)
    {
        $get_data =  DB::table('citys')->where('country_id', $request->id)
            ->get();
        $html = '<option value="" selected disabled>Please Select City</option>';
        foreach ($get_data as $class) {
            $html .= '<option value="' . $class->id . '">' . $class->name . '</option>';
        }
        return $html;
    }


    public function save(Request $request)
    {
        dd($request->all());
        $lastShipment = Shipment::orderBy('id', 'desc')->first();
        if ($lastShipment) {
        $lastBarcode = $lastShipment->barcode;  // Get the last inserted barcode
        } else {
        // Handle the case where there are no records in the 'Shipment' table.
        $lastBarcode = null; // Initialize $lastBarcode to null if no records exist.
        }

        if ($lastBarcode === null) {
        $lastBarcode = 1000000000; // Set an initial value if no barcode is found.
        } else {
        $lastBarcode += 1; // Increment the last barcode by 1.
        }
        // Now, $lastBarcode contains the next available barcode.

        $shipments = new Shipment();
        $shipments->barcode = $lastBarcode;
        $shipments->awb_number = $request->input('awb_number');
        $shipments->tracking_number = $request->input('tracking_number');
        $shipments->reference_number = $request->input('reference_number');
        $shipments->order_date = $request->input('order_date');
        $shipments->service_type = $request->input('service_type');
        $shipments->shipper_code = $request->input('shipper_code');
        $shipments->shipper_name = $request->input('shipper_name');
        $shipments->contact_office_1 = $request->input('contact_office_1');
        $shipments->account_name = $request->input('account_name');
        $shipments->reciver_name = $request->input('reciver_name');
        $shipments->mobile_1 = $request->input('mobile_1');
        $shipments->mobile_2 = $request->input('mobile_2');
        $shipments->cod = $request->input('cod');
        $shipments->service_charges = $request->input('service_charges');
        $shipments->instruction = $request->input('instruction');
        $shipments->description = $request->input('description');
        $shipments->country = $request->input('country');
        $shipments->city = $request->input('city');
        $shipments->area = $request->input('area');
        $shipments->street_address = $request->input('street_address');
        $shipments->delivery_code = $request->input('delivery_code');
        $shipments->actual_weight = $request->input('actual_weight');
        $shipments->is_fragile = $request->input('is_fragile');
        $shipments->no_of_peices = $request->input('no_of_peices');
        $shipments->inscan = 1;
        $shipments->outscan = 0;
        $shipments->status = 2;
        $shipments->delivery_attempt = 0;
        $detailsOfProducts = $request->input('details_of_products');
        if (is_array($detailsOfProducts)) {
            $shipments->details_of_products = implode(',', $detailsOfProducts);
        }
        $codPeice = $request->input('cod_peice');
        if (is_array($codPeice)) {
            $shipments->cod_peice = implode(',', $codPeice);
        }
        // $shipments->details_of_products = $request->input('details_of_products');
        // $shipments->cod_peice = $request->input('cod_peice');
        // $shipments->save();

        // Shipments logs Save
        $shipment_logs = new ShipmentLogs();
        $shipment_logs->barcode = $lastBarcode;
        $shipment_logs->awb_number = $request->input('awb_number');
        $shipment_logs->tracking_number = $request->input('tracking_number');
        $shipment_logs->reference_number = $request->input('reference_number');
        $shipment_logs->order_date = $request->input('order_date');
        $shipment_logs->service_type = $request->input('service_type');
        $shipment_logs->shipper_code = $request->input('shipper_code');
        $shipment_logs->shipper_name = $request->input('shipper_name');
        $shipment_logs->contact_office_1 = $request->input('contact_office_1');
        $shipment_logs->account_name = $request->input('account_name');
        $shipment_logs->reciver_name = $request->input('reciver_name');
        $shipment_logs->mobile_1 = $request->input('mobile_1');
        $shipment_logs->mobile_2 = $request->input('mobile_2');
        $shipment_logs->cod = $request->input('cod');
        $shipment_logs->service_charges = $request->input('service_charges');
        $shipment_logs->instruction = $request->input('instruction');
        $shipment_logs->description = $request->input('description');
        $shipment_logs->country = $request->input('country');
        $shipment_logs->city = $request->input('city');
        $shipment_logs->area = $request->input('area');
        $shipment_logs->street_address = $request->input('street_address');
        $shipment_logs->delivery_code = $request->input('delivery_code');
        $shipment_logs->actual_weight = $request->input('actual_weight');
        $shipment_logs->is_fragile = $request->input('is_fragile');
        $shipment_logs->no_of_peices = $request->input('no_of_peices');
        $shipment_logs->inscan = 1;
        $shipment_logs->outscan = 0;
        $shipment_logs->status = 2;
        $shipment_logs->delivery_attempt = 0;
        $detailsOfProducts = $request->input('details_of_products');
        if (is_array($detailsOfProducts)) {
            $shipment_logs->details_of_products = implode(',', $detailsOfProducts);
        }
        $codPeice = $request->input('cod_peice');
        if (is_array($codPeice)) {
            $shipment_logs->cod_peice = implode(',', $codPeice);
        }
        // $shipments->details_of_products = $request->input('details_of_products');
        // $shipments->cod_peice = $request->input('cod_peice');
        // $shipment_logs->save();
        // Shipments logs Save

        $shipmentId = $shipments->id;

        // Create the first log entry
        $logs = new logs;
        $logs->shipment_id = $shipmentId;
        $logs->status_type = 1;
        $logs->status = 1;
        $logs->auth_id = Auth::user()->id;
        // $logs->save();

        // Create the second log entry with a different status value
        $logs = new logs;
        $logs->shipment_id = $shipmentId;
        $logs->status_type = 1;
        $logs->status = 2;  // Change the status value
        $logs->auth_id = Auth::user()->id;
        // $logs->save();

        // Create the Order Status first entry
        $OrderStatus = new OrderStatus;
        $OrderStatus->shipment_id = $shipmentId;
        $OrderStatus->status = 1;  // Change the status value
        $OrderStatus->auth_id = Auth::user()->id;
        // $OrderStatus->save();


        // Create the Order Status second entry
        $OrderStatus = new OrderStatus;
        $OrderStatus->shipment_id = $shipmentId;
        $OrderStatus->status = 2;  // Change the status value
        $OrderStatus->auth_id = Auth::user()->id;
        // $OrderStatus->save();

        // Create the Order Status second entry
        $OrderInscan = new OrderInscan;
        $OrderInscan->shipment_id = $shipmentId;
        $OrderInscan->auth_id = Auth::user()->id;
        // $OrderInscan->save();

        return redirect()->back();

        // $shipments = new Shipment;
        // $shipments->awb_number = $request->input('awb_number');
        // $shipments->reference_number = $request->input('reference_number');
        // $shipments->order_date = $request->input('order_date');
        // $shipments->service_type = $request->input('service_type');
        // $shipments->shipper_code = $request->input('shipper_code');
        // $shipments->shipper_name = $request->input('shipper_name');
        // $shipments->contact_office_1 = $request->input('contact_office_1');
        // $shipments->reciver_name = $request->input('reciver_name');
        // $shipments->mobile_1 = $request->input('mobile_1');
        // $shipments->mobile_2 = $request->input('mobile_2');
        // $shipments->cod = $request->input('cod');
        // $shipments->service_charges = $request->input('service_charges');
        // $shipments->instruction = $request->input('instruction');
        // $shipments->description = $request->input('description');
        // $shipments->country = $request->input('country');
        // $shipments->city = $request->input('city');
        // $shipments->area = $request->input('area');
        // $shipments->street_address = $request->input('street_address');
        // $shipments->delivery_code = $request->input('delivery_code');
        // $shipments->actual_weight = $request->input('actual_weight');
        // $shipments->is_fragile = $request->input('is_fragile');
        // $shipments->no_of_peices = $request->input('no_of_peices');
        // $shipments->status = 2;
        // $detailsOfProducts = $request->input('details_of_products');
        // if (is_array($detailsOfProducts)) {
        //     $shipments->details_of_products = implode(',', $detailsOfProducts);
        // }
        // $codPeice = $request->input('cod_peice');
        // if (is_array($codPeice)) {
        //     $shipments->cod_peice = implode(',', $codPeice);
        // }
        // // $shipments->details_of_products = $request->input('details_of_products');
        // // $shipments->cod_peice = $request->input('cod_peice');
        // $shipments->save();
        // return redirect()->back();
    }
    public function edit_order_page(Request $request)
    {
        return view('user.shipment.edit_order');
    }

    public function upload_orders_page(Request $request)
    {
        return view('user.shipment.upload_orders');
    }

    public function shipments_page(Request $request)
    {
        $page_title = 'All Shipments';
        $page_description = 'Shipment / All Shipments';
        $userId = Auth::id();
        $shipments = Shipment::where('shipper_code' , $userId)->get();
        $shipments_counts = Shipment::where('shipper_code' , $userId)->count();
        $data = array(
            'page_title' => $page_title,
            'page_description' =>  $page_description,
            'shipments' =>  $shipments,
            'shipments_counts' => $shipments_counts,
        );
        return view('user.shipment.shipments')->with($data);
    }

    public function manifests_page(Request $request)
    {
        return view('user.shipment.manifests');
    }

    public function invoices_page(Request $request)
    {
        return view('user.shipment.invoices');
    }

    public function address_book_page(Request $request)
    {
        return view('user.shipment.address_book');
    }

    public function manage_profile_page(Request $request)
    {
        return view('user.shipment.manage_profile');
    }

    public function update_password_page(Request $request)
    {
        return view('user.shipment.update_password');
    }
}

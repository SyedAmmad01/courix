<?php

namespace App\Http\Controllers\Admin;

use App\Imports\shipmentsimport;
use App\Models\Shipment;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Area;
use App\Models\Booking;
use App\Models\CountBooking;
use App\Models\Shipper;
use App\Models\Driver;
use App\Models\logs;
use App\Models\ShipmentFile;
use App\Models\Rate;
use App\Models\OdaRates;
use App\Models\Rtos;
use App\Models\Company;
use App\Models\AssignToThirdParty;
use App\Models\OrderStatus;
use App\Models\OrderInscan;
use App\Models\OrderOutscan;
use App\Models\ShipmentLogs;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Maatwebsite\Excel\Facades\Excel;
use BaconQrCode\Encoder\QrCode;
use BaconQrCode\Renderer\ImageRenderer;
use BaconQrCode\Renderer\ImageRendererInterface;
use BaconQrCode\Renderer\RendererStyle\RendererStyle;
use BaconQrCode\Writer;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use PDF;




class ShipmentController extends Controller
{
    public function tracking(Request $request)
    {
        $page_title = 'Tracking';
        $page_description = 'Shipment / Tracking';
        $cities = DB::table('citys')->get();
        $shippers = Shipper::get();
        $drivers = Driver::where('status', 1)->get();
        $status = DB::table('status')->get();
        $countrys = DB::table('countrys')->get();
        $areas = DB::table('areas')->get();
        $data = array(
            'page_title' => $page_title,
            'page_description' => $page_description,
            'cities' => $cities,
            'fetch_shippers' => $shippers,
            'fetch_drivers' => $drivers,
            'fetch_status' => $status,
            'fetch_countrys' => $countrys,
            'fetch_areas' => $areas,
        );

        return view('admin.shipment.tracking')->with($data);
    }

    public function place_order(Request $request)
    {
        $page_title = 'Place Order';
        $page_description = 'Shipment / Place Order';
        $countrys = DB::table('countrys')->get();
        $shippers = Shipper::get();
        $last = Shipment::latest('id')->first();
        if ($last == null) {
            $last = 1;
        } else {
            $last = $last->id + 1;
        }
        $data = array(
            'page_title' => $page_title,
            'page_description' =>  $page_description,
            'fetch_countrys' => $countrys,
            'fetch_shippers' => $shippers,
            'last' => $last,
        );
        return view('admin.shipment.place_order')->with($data);
    }

    public function get_rates(Request $request)
    {
        if ($request->service_type === "NDD") {
            $get_data = Rate::where('shipper_id', $request->shipper_id)
                ->where('city_id', $request->city_id)->select('city_rate')
                ->first();
        }
        if ($request->service_type === "SDD") {
            $get_data = Rate::where('shipper_id', $request->shipper_id)
                ->where('city_id', $request->city_id)->select('city_rate')
                ->first();
        }
        if ($request->service_type === "ODA") {
            $get_data = OdaRates::where('shipper_id', $request->shipper_id)
                ->where('city_id', $request->city_id)->select('city_oda_rate')
                ->first();
        }
        if ($request->service_type === "RS") {
            $get_data = Rtos::where('shipper_id', $request->shipper_id)
                ->where('city_id', $request->city_id)->select('city_rto_rate')
                ->first();
        }
        // dd($get_data); // This line remains unchanged

        return $get_data ?? null;
    }

    public function get_weight(Request $request)
    {
        $rate = Rate::where('shipper_id', $request->shipper_id)->where('city_id', $request->city_id)->first();
        // dd($rate->weight);

        $count = $request->actual_weight - $rate->weight; // Calculate the count directly
        $data = Rate::where('shipper_id', $request->shipper_id)
            ->where('city_id', $request->city_id)
            ->first();

        if ($data) {
            $additionalCharges = $data->additional_charges;
            $serviceCharges = $request->service_charges;
            $get = $additionalCharges * $count;
            $get_data = $get + $serviceCharges;

            if ($request->service_type === "NDD" || $request->service_type === "SDD" || $request->service_type === "ODA" || $request->service_type === "RS") {
                return $get_data;
            }
        }
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

    public function get_name(Request $request)
    {
        $get_data = Shipper::where('id', $request->id)->select('company_name', 'contact_office_1')->first();
        return $get_data;
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
        $shipments->save();

        // Shipments logs Save
        $shipment_logs = new ShipmentLogs();
        $shipment_logs->barcode = $lastBarcode;
        $shipment_logs->awb_number = $request->input('awb_number');
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
        $shipment_logs->save();
        // Shipments logs Save

        $shipmentId = $shipments->id;

        // Create the first log entry
        $logs = new logs;
        $logs->shipment_id = $shipmentId;
        $logs->status_type = 1;
        $logs->status = 1;
        $logs->auth_id = Auth::user()->id;
        $logs->save();

        // Create the second log entry with a different status value
        $logs = new logs;
        $logs->shipment_id = $shipmentId;
        $logs->status_type = 1;
        $logs->status = 2;  // Change the status value
        $logs->auth_id = Auth::user()->id;
        $logs->save();

        // Create the Order Status first entry
        $OrderStatus = new OrderStatus;
        $OrderStatus->shipment_id = $shipmentId;
        $OrderStatus->status = 1;  // Change the status value
        $OrderStatus->auth_id = Auth::user()->id;
        $OrderStatus->save();


        // Create the Order Status second entry
        $OrderStatus = new OrderStatus;
        $OrderStatus->shipment_id = $shipmentId;
        $OrderStatus->status = 2;  // Change the status value
        $OrderStatus->auth_id = Auth::user()->id;
        $OrderStatus->save();

        // Create the Order Status second entry
        $OrderInscan = new OrderInscan;
        $OrderInscan->shipment_id = $shipmentId;
        $OrderInscan->auth_id = Auth::user()->id;
        $OrderInscan->save();

        return redirect()->back();
    }

    public function print_awb(Request $request)
    {
        $lastShipment = Shipment::orderBy('id', 'desc')->first();

        date_default_timezone_set('Asia/Dubai');

        $current_time = date('d/m/Y h:i');
        // dd($lastShipment->barcode);

        $data = array(
            'lastShipment' => $lastShipment,
            'current_time' => $current_time,
        );

        return view('admin.files.awb')->with($data);
    }


    public function order_edit(Request $request)
    {
        // dd($request->all());
        $shipments = Shipment::where('reference_number', $request->tracking_no_barcode)->orWhere('barcode', $request->tracking_no_barcode)->first();
        // dd($shipments);
        $data = [
            'id' => $shipments ? $shipments->id : null,
            'awb_number' => $shipments ? $shipments->awb_number : null,
            'reference_number' => $shipments ? $shipments->reference_number : null,
            'order_date' => $shipments ? $shipments->order_date : null,
            'service_type' => $shipments ? $shipments->service_type : null,
            'shipper_code' => $shipments ? $shipments->shipper_code : null,
            'shipper_name' => $shipments ? $shipments->shipper_name : null,
            'contact_office_1' => $shipments ? $shipments->contact_office_1 : null,
            'account_name' => $shipments ? $shipments->account_name : null,
            'reciver_name' => $shipments ? $shipments->reciver_name : null,
            'mobile_1' => $shipments ? $shipments->mobile_1 : null,
            'mobile_2' => $shipments ? $shipments->mobile_2 : null,
            'cod' => $shipments ? $shipments->cod : null,
            'service_charges' => $shipments ? $shipments->service_charges : null,
            'instruction' => $shipments ? $shipments->instruction : null,
            'description' => $shipments ? $shipments->description : null,
            'country' => $shipments ? $shipments->country : null,
            'city' => $shipments ? $shipments->city : null,
            'area' => $shipments ? $shipments->area : null,
            'street_address' => $shipments ? $shipments->street_address : null,
            'delivery_code' => $shipments ? $shipments->delivery_code : null,
            'actual_weight' => $shipments ? $shipments->actual_weight : null,
            'is_fragile' => $shipments ? $shipments->is_fragile : null,
            'no_of_peices' => $shipments ? $shipments->no_of_peices : null,
            // 'details_of_products' => $shipments ? $shipments->details_of_products : null,
            // 'cod_peice' => $shipments ? $shipments->cod_peice : null,
            'details_of_products' => null,
            'cod_peice' => null,
        ];

        if ($shipments) {
            // Explode the comma-separated values into arrays
            $data['details_of_products'] = $shipments->details_of_products ? explode(',', $shipments->details_of_products) : null;
            $data['cod_peice'] = $shipments->cod_peice ? explode(',', $shipments->cod_peice) : null;
        }
        // dd($shipments);
        return response()->json($data);
    }


    public function upload_shipments(Request $request)
    {
        $page_title = 'Upload Shipments';
        $page_description = 'Shipment / Upload Shipments';
        $shippers = Shipper::get();
        $data = array(
            'fetch_shippers' => $shippers,
            'page_title' => $page_title,
            'page_description' => $page_description
        );
        return view('admin.shipment.upload_shipments')->with($data);
    }

    public function import_shipments(Request $request)
    {
    $request->validate([
        'selected_file' => 'required|mimes:xls,xlsx',
    ]);

    $file = $request->file('selected_file');

    $excelData = Excel::toArray([], $file);

    $data = $excelData[0];

    $processedData = [];


    for ($i = 1; $i < count($data); $i++) {
        $row = $data[$i];

        $rowData = [
        'reference_number' => $row[4],
        'service_type' => $row[0],
        'contact_office_1' => $row[3],
        'account_name' => $row[12],
        'reciver_name' => $row[1],
        'cod' => $row[2],
        'instruction' => $row[9],
        'description' => $row[10],
        'country' => $row[5],
        'city' => $row[6],
        'area' => $row[7],
        'street_address' => $row[8],
        'no_of_peices' => $row[11],
        ];

        $processedData[] = $rowData;
    }

    return $processedData;
    }

    public function save_shipments(Request $request)
    {
        $shipperCode = $request->input('shipperCode');
        Excel::import(new shipmentsimport($shipperCode), request()->file('selected_file'));
        return back();
    }


    public function create_booking(Request $request)
    {
        $page_title = 'Create Booking';
        $page_description = 'Shipment / Create Booking';
        $shippers = Shipper::get();
        $bookings = Booking::join('shippers', 'bookings.shipper', '=', 'shippers.id')->select('bookings.*', 'shippers.shipper_code', 'shippers.company_name', 'shippers.manager_name', 'shippers.shipper_email')->get();
        $data = array(
            'page_title' => $page_title,
            'page_description' =>  $page_description,
            'fetch_shippers' => $shippers,
            'bookings' => $bookings,
        );
        return view('admin.shipment.create_booking')->with($data);
    }

    public function booking_save(Request $request)
    {
        // dd($request->all());
        $bookings = new Booking;
        $bookings->shipper = $request->input('shipper');
        $bookings->barcode_start = $request->input('barcode_start');
        $bookings->barcode_end = $request->input('barcode_end');
        $bookings->count = $request->input('count');
        $bookings->save();

        return redirect()->back();
    }

    public function booking_edit($id)
    {
        $bookings = Booking::find($id);
        return response()->json($bookings);
    }

    public function booking_update(Request $request)
    {
        // dd($request->all());
        $bookings = Booking::find($request->id);
        $bookings->shipper = $request->input('shipper');
        $bookings->barcode_start = $request->input('barcode_start');
        $bookings->barcode_end = $request->input('barcode_end');
        $bookings->count = $request->input('count');
        $bookings->update();
        return redirect()->back();
    }

    public function booking_destroy(Request $request)
    {
        $bookings = Booking::find($request->id);
        if ($bookings) {
            $bookings->delete();
            return response()->json(['message' => 'Record deleted successfully']);
        }
        return response()->json(['message' => 'Record not found'], 404);
    }

    public function booking_pdf($id)
    {
            $booking = Booking::find($id);
            $records = []; // Initialize an empty array to store records

            for ($i = 0; $i < $booking->count; $i++) {
            $record = Booking::leftjoin('shippers', 'bookings.shipper', '=', 'shippers.id')
            ->leftjoin('drivers', 'shippers.driver', '=', 'drivers.id')
            ->leftjoin('zones', 'drivers.zones', '=', 'zones.id')
            ->select('shippers.shipper_code', 'shippers.company_name', 'zones.zone_name')
            ->where('bookings.id', $id)
            ->get();

            // Append the current record to the $records array
            $records[] = $record;
            }

            // Now $records contains all the records fetched in the loop
            $data = [
            'title' => 'Sample PDF',
            'content' => 'This is a sample PDF generated using Laravel and DomPDF.',
            'records' => $records,
            ];

            $pdf = PDF::loadView('admin.pdf.document', $data);

            return $pdf->download('bookingcodereport.pdf');


    }

    public function operation_print_airways(Request $request)
    {
        // dd($request->all());
        // Explode the IDs into an array
        // $u_ids = explode(',', $request->id);
        date_default_timezone_set('Asia/Dubai');
        $current_time = date('d/m/Y h:i');
        // dd($lastShipment->barcode);

        // Retrieve shipment data with left join and filtering
        $shipments = Shipment::select(
            'shipments.*',
            'shippers.company_name as shipper_name',
            'shippers.contact_office_1 as shipper_contact',
            'shipment_country.name AS shipment_country_name',
            'shipment_city.name AS shipment_city_name',
            'shipment_area.name AS shipment_area_name',
            'shipper_country.name AS shipper_country_name',
            'shipper_city.name AS shipper_city_name',
            'shipper_area.name AS shipper_area_name',
            'shipper.street_address as shipper_address',
            'shippers.shipper_code as ship_code',
            // 'shipper.country As shipper_country',
            // 'shipper.city As shipper_city',
            // 'shipper.area As shipper_area',
        )
            ->leftJoin('shippers', 'shipments.shipper_code', '=', 'shippers.id')
            ->leftJoin('shippers AS shipper', 'shipments.shipper_code', '=', 'shipper.id')
            ->leftJoin('countrys AS shipment_country', 'shipments.country', '=', 'shipment_country.id')
            ->leftJoin('citys AS shipment_city', 'shipments.city', '=', 'shipment_city.id')
            ->leftJoin('areas AS shipment_area', 'shipments.area', '=', 'shipment_area.id')
            ->leftJoin('countrys AS shipper_country', 'shipper.country', '=', 'shipper_country.id')
            ->leftJoin('citys AS shipper_city', 'shipper.city', '=', 'shipper_city.id')
            ->leftJoin('areas AS shipper_area', 'shipper.area', '=', 'shipper_area.id')
            ->where('shipments.id', $request->id)
            ->first();

            // dd($shipments);

        // Determine the view based on $request->pab_options
        $view = ($request->pab_options == 1) ? 'admin.files.operation_print_air_anb' : 'admin.files.operation_airway_bills';

        // Pass the results directly to the view
        return view($view, ['shipments' => $shipments , 'current_time' => $current_time]);
    }



    public function operation_dashboard(Request $request)
    {
        $page_title = 'Operation Dashboard';
        $page_description = 'Shipment / Operation Dashboard';
        $shipments = Shipment::join('citys', 'shipments.city', '=', 'citys.id')->join('status', 'shipments.status', '=', 'status.id')->leftJoin('drivers', 'shipments.driver_id', '=', 'drivers.id')->select('shipments.*', 'citys.name as city_name', 'status.name as status_name', 'drivers.employee_name', 'drivers.employee_mobile')->get();
        $shipments_to_picked_up = Shipment::join('citys', 'shipments.city', '=', 'citys.id')->join('status', 'shipments.status', '=', 'status.id')->leftJoin('drivers', 'shipments.driver_id', '=', 'drivers.id')->select('shipments.*', 'citys.name as city_name', 'status.name as status_name', 'drivers.employee_name', 'drivers.employee_mobile')->where('shipments.status', 16)->get();
        $to_be_picked = $shipments_to_picked_up->count();
        $shipments_picked_up = Shipment::join('citys', 'shipments.city', '=', 'citys.id')->join('status', 'shipments.status', '=', 'status.id')->leftJoin('drivers', 'shipments.driver_id', '=', 'drivers.id')->select('shipments.*', 'citys.name as city_name', 'status.name as status_name', 'drivers.employee_name', 'drivers.employee_mobile')->where('shipments.status', 16)->get();
        $picked_up = $shipments_picked_up->count();
        $shipments_to_be_delivered = Shipment::join('citys', 'shipments.city', '=', 'citys.id')->join('status', 'shipments.status', '=', 'status.id')->leftJoin('drivers', 'shipments.driver_id', '=', 'drivers.id')->select('shipments.*', 'citys.name as city_name', 'status.name as status_name', 'drivers.employee_name', 'drivers.employee_mobile')->where('shipments.status', 4)->get();
        $to_be_delivered = $shipments_to_be_delivered->count();
        $ship_delivered = Shipment::join('citys', 'shipments.city', '=', 'citys.id')->join('status', 'shipments.status', '=', 'status.id')->leftJoin('drivers', 'shipments.driver_id', '=', 'drivers.id')->select('shipments.*', 'citys.name as city_name', 'status.name as status_name', 'drivers.employee_name', 'drivers.employee_mobile')->where('shipments.status', 5)->get();
        $delivered = $ship_delivered->count();
        $shipments_lost_damages = Shipment::join('citys', 'shipments.city', '=', 'citys.id')->join('status', 'shipments.status', '=', 'status.id')->leftJoin('drivers', 'shipments.driver_id', '=', 'drivers.id')->select('shipments.*', 'citys.name as city_name', 'status.name as status_name', 'drivers.employee_name', 'drivers.employee_mobile')->whereIn('shipments.status', [17, 18])->get();
        $lost_damages = $shipments_lost_damages->count();
        $shipments_to_be_returned = Shipment::join('citys', 'shipments.city', '=', 'citys.id')->join('status', 'shipments.status', '=', 'status.id')->leftJoin('drivers', 'shipments.driver_id', '=', 'drivers.id')->select('shipments.*', 'citys.name as city_name', 'status.name as status_name', 'drivers.employee_name', 'drivers.employee_mobile')->whereIn('shipments.status', [19, 20])->get();
        $returned = $shipments_to_be_returned->count();
        $shipments_cancelled = Shipment::join('citys', 'shipments.city', '=', 'citys.id')->join('status', 'shipments.status', '=', 'status.id')->leftJoin('drivers', 'shipments.driver_id', '=', 'drivers.id')->select('shipments.*', 'citys.name as city_name', 'status.name as status_name', 'drivers.employee_name', 'drivers.employee_mobile')->where('shipments.status', 10)->get();
        $cancelled = $shipments_cancelled->count();
        $shipments_rtos = Shipment::join('citys', 'shipments.city', '=', 'citys.id')->join('status', 'shipments.status', '=', 'status.id')->leftJoin('drivers', 'shipments.driver_id', '=', 'drivers.id')->select('shipments.*', 'citys.name as city_name', 'status.name as status_name', 'drivers.employee_name', 'drivers.employee_mobile')->whereIn('shipments.status', [19, 20])->get();
        $rtos = $shipments_rtos->count();
        $shipments_counts = Shipment::count();
        $cities = DB::table('citys')->get();
        $shippers = Shipper::get();
        $drivers = Driver::where('status', 1)->get();
        $status = DB::table('status')->get();
        $countrys = DB::table('countrys')->get();
        $areas = DB::table('areas')->get();
        $company = Company::get();
        $data = array(
            'page_title' => $page_title,
            'page_description' =>  $page_description,
            'shipments' =>  $shipments,
            'shipments_counts' => $shipments_counts,
            'cities' => $cities,
            'fetch_shippers' => $shippers,
            'fetch_drivers' => $drivers,
            'fetch_status' => $status,
            'fetch_countrys' => $countrys,
            'fetch_areas' => $areas,
            'fetch_company' => $company,
            'shipments_to_picked_up' => $shipments_to_picked_up,
            'to_be_picked' => $to_be_picked,
            'shipments_picked_up' => $shipments_picked_up,
            'picked_up' => $picked_up,
            'shipments_to_be_delivered' => $shipments_to_be_delivered,
            'to_be_delivered' => $to_be_delivered,
            'ship_delivered' => $ship_delivered,
            'delivered' => $delivered,
            'shipments_lost_damages' => $shipments_lost_damages,
            'lost_damages' => $lost_damages,
            'shipments_to_be_returned' => $shipments_to_be_returned,
            'returned' => $returned,
            'shipments_cancelled' => $shipments_cancelled,
            'cancelled' => $cancelled,
            'shipments_rtos' => $shipments_rtos,
            'rtos' => $rtos,
        );
        // dd($data);
        return view('admin.shipment.operation_dashboard')->with($data);
    }




    public function get_manifest_download(Request $request)
    {
    date_default_timezone_set('Asia/Dubai');

    $current_time = date('h:i:s A m-d-Y');
    $current_date = date('d, F Y');

    return view('admin.files.get_manifest', [
        'current_date' => $current_date,
        'current_time' => $current_time,
    ]);
    }


    public function getzone(Request $request)
    {
        $get_data =  DB::table('zones')->where('city', $request->id)->get();
        $html = [];
        foreach ($get_data as $zone) {
            $html[] = '<option value="' . $zone->id . '">' . $zone->zone_name . '</option>';
        }
        return $html;
    }

    public function data(Request $request)
    {
        $get_data = Shipment::join('citys', 'shipments.city', '=', 'citys.id')
        ->join('status', 'shipments.status', '=', 'status.id')
        ->leftJoin('drivers', 'shipments.driver_id', '=', 'drivers.id')
        ->select(
        'shipments.*',
        'citys.name as city_name',
        'status.name as status_name',
        'drivers.employee_name',
        'drivers.employee_mobile'
        )->get();

        return $get_data;
    }

    public function search_bar(Request $request)
    {

        // dd($request->all());
        // ->where('shipper_name', 'LIKE', '%' . $request->name . '%')

        // $get_data = Shipment::where('reference_number', 'LIKE', '%' . $request->name . '%')->get();

        // dd($request->all());
        if (is_numeric($request->id)) {
            // $get_data = Shipment::where('reference_number', 'LIKE', '%' . $request->id . '%')->get();
            $get_data = Shipment::join('citys', 'shipments.city', '=', 'citys.id')
                ->join('status', 'shipments.status', '=', 'status.id')
                ->leftJoin('drivers', 'shipments.driver_id', '=', 'drivers.id')
                ->select(
                    'shipments.*',
                    'citys.name as city_name',
                    'status.name as status_name',
                    'drivers.employee_name',
                    'drivers.employee_mobile'
                )->where('reference_number', 'LIKE', '%' . $request->id . '%')->get();
        } else {
            $get_data = Shipment::join('citys', 'shipments.city', '=', 'citys.id')
                ->join('status', 'shipments.status', '=', 'status.id')
                ->leftJoin('drivers', 'shipments.driver_id', '=', 'drivers.id')
                ->select(
                    'shipments.*',
                    'citys.name as city_name',
                    'status.name as status_name',
                    'drivers.employee_name',
                    'drivers.employee_mobile'
                )->where('shipper_name', 'LIKE', '%' . $request->id . '%')->get();
            // $get_data = Shipment::where('shipper_name', 'LIKE', '%' . $request->id . '%')->get();
        }

        // dd($get_data);
        return $get_data;
    }

    public function get_orders(Request $request)
    {
        // Validate the input data before proceeding
        $validator = Validator::make($request->all(), [
            'created_from_date' => 'date',
            'created_to_date' => 'date|after_or_equal:created_from_date',
            'id' => 'array',
            'shipper_id' => 'array',
        ]);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 400);
        }

        // Convert date strings to Carbon instances
        $startDate = Carbon::parse($request->input('created_from_date'));
        $endDate = Carbon::parse($request->input('created_to_date'));
        $ids = $request->input('id');
        $shipperIds = $request->input('shipper_id');

        // Start building the query with necessary joins and selects
        $query = Shipment::query()
            ->leftJoin('citys', 'shipments.city', '=', 'citys.id')
            ->leftJoin('status', 'shipments.status', '=', 'status.id')
            ->leftJoin('drivers', 'shipments.driver_id', '=', 'drivers.id')
            ->select(
                'shipments.*',
                'citys.name as city_name',
                'status.name as status_name',
                'drivers.employee_name',
                'drivers.employee_mobile'
            );

        // dd($query);

        // Apply date filter if provided
        if ($startDate && $endDate) {
            $query->whereBetween('order_date', [$startDate, $endDate]);
        }

        // Apply 'id' filter if provided
        if ($ids) {
            $query->whereIn('shipments.city', $ids); // Specify the table alias or name
        }

        // Apply 'shipper_id' filter if provided
        if ($shipperIds) {
            $query->whereIn('shipments.shipper_code', $shipperIds); // Specify the table alias or name
        }

        // Execute the query and retrieve the data
        $data = $query->get();

        // dd($data);

        return $data;
    }

    public function destroy(Request $request)
    {
        $ids = $request->input('ids'); // Get the array of IDs from the request

        if (!empty($ids)) {
            $shipments = Shipment::whereIn('id', $ids)->get();

            if ($shipments->isEmpty()) {
                return response()->json(['message' => 'Records not found'], 404);
            }

            foreach ($shipments as $shipment) {
                $shipment->delete();
            }

            return response()->json(['message' => 'Records deleted successfully']);
        }

        return response()->json(['message' => 'No IDs provided for deletion'], 400);
    }

    public function get_update(Request $request)
    {
        $ids = $request->input('id', []); // Make sure 'id' is an array even if only one ID is provided
        $get_data = Shipment::whereIn('id', $ids)->select('id', 'reference_number', 'status', 'comments')->get();
        return $get_data;
    }

    public function batch_print_airways_bills(Request $request)
    {
        // Explode the IDs into an array
        $u_ids = explode(',', $request->id);
        date_default_timezone_set('Asia/Dubai');
        $current_time = date('d/m/Y h:i');
        // dd($lastShipment->barcode);

        // Retrieve shipment data with left join and filtering
        $shipments = Shipment::select(
            'shipments.*',
            'shippers.company_name as shipper_name',
            'shippers.contact_office_1 as shipper_contact',
            'shipment_country.name AS shipment_country_name',
            'shipment_city.name AS shipment_city_name',
            'shipment_area.name AS shipment_area_name',
            'shipper_country.name AS shipper_country_name',
            'shipper_city.name AS shipper_city_name',
            'shipper_area.name AS shipper_area_name',
            'shipper.street_address as shipper_address',
            'shippers.shipper_code as ship_code',
            // 'shipper.country As shipper_country',
            // 'shipper.city As shipper_city',
            // 'shipper.area As shipper_area',
        )
            ->leftJoin('shippers', 'shipments.shipper_code', '=', 'shippers.id')
            ->leftJoin('shippers AS shipper', 'shipments.shipper_code', '=', 'shipper.id')
            ->leftJoin('countrys AS shipment_country', 'shipments.country', '=', 'shipment_country.id')
            ->leftJoin('citys AS shipment_city', 'shipments.city', '=', 'shipment_city.id')
            ->leftJoin('areas AS shipment_area', 'shipments.area', '=', 'shipment_area.id')
            ->leftJoin('countrys AS shipper_country', 'shipper.country', '=', 'shipper_country.id')
            ->leftJoin('citys AS shipper_city', 'shipper.city', '=', 'shipper_city.id')
            ->leftJoin('areas AS shipper_area', 'shipper.area', '=', 'shipper_area.id')
            ->whereIn('shipments.id', $u_ids)
            ->get();

            // dd($shipments);

        // Determine the view based on $request->pab_options
        $view = ($request->pab_options == 1) ? 'admin.files.print_air_anb' : 'admin.files.get_airway_bills';

        // Pass the results directly to the view
        return view($view, ['shipments' => $shipments , 'current_time' => $current_time]);
    }


    public function tracking_print_airways_bills(Request $request)
    {
        // dd($request->all());
        date_default_timezone_set('Asia/Dubai');
        $current_time = date('d/m/Y h:i');
        // dd($lastShipment->barcode);

        // Retrieve shipment data with left join and filtering
        $shipments = Shipment::select(
            'shipments.*',
            'shippers.company_name as shipper_name',
            'shippers.contact_office_1 as shipper_contact',
            'shipment_country.name AS shipment_country_name',
            'shipment_city.name AS shipment_city_name',
            'shipment_area.name AS shipment_area_name',
            'shipper_country.name AS shipper_country_name',
            'shipper_city.name AS shipper_city_name',
            'shipper_area.name AS shipper_area_name',
            'shipper.street_address as shipper_address',
            'shippers.shipper_code as ship_code',
            // 'shipper.country As shipper_country',
            // 'shipper.city As shipper_city',
            // 'shipper.area As shipper_area',
        )
            ->leftJoin('shippers', 'shipments.shipper_code', '=', 'shippers.id')
            ->leftJoin('shippers AS shipper', 'shipments.shipper_code', '=', 'shipper.id')
            ->leftJoin('countrys AS shipment_country', 'shipments.country', '=', 'shipment_country.id')
            ->leftJoin('citys AS shipment_city', 'shipments.city', '=', 'shipment_city.id')
            ->leftJoin('areas AS shipment_area', 'shipments.area', '=', 'shipment_area.id')
            ->leftJoin('countrys AS shipper_country', 'shipper.country', '=', 'shipper_country.id')
            ->leftJoin('citys AS shipper_city', 'shipper.city', '=', 'shipper_city.id')
            ->leftJoin('areas AS shipper_area', 'shipper.area', '=', 'shipper_area.id')
            ->where('shipments.id', $request->id)
            ->first();

            // dd($shipments);

        // Determine the view based on $request->pab_options
        $view = 'admin.files.tracking_print_air_anb';

        // Pass the results directly to the view
        return view($view, ['shipments' => $shipments , 'current_time' => $current_time]);
    }

    public function batch_update(Request $request)
    {

        // dd($request->all());
        $u_ids = explode(',', $request->u_id); // Convert "1,2" to an array ['1', '2']

        $updatedShipments = [];
        $createdLogs = []; // To collect the created log entries

        foreach ($u_ids as $u_id) {
            $shipment = Shipment::find(trim($u_id)); // Trim to remove any leading/trailing spaces
            // dd($shipment);
            if ($shipment) {
                // Update shipment attributes
                $shipment->status = $request->input('u_status');
                $shipment->comments = $request->input('u_comments');
                $shipment->update();
                $updatedShipments[] = $shipment; // Collect updated shipments

                // Create a new log entry
                $logs = new logs();
                $logs->shipment_id = $shipment->id; // Use the ID of the updated shipment
                $logs->status_type = 1;
                $logs->status = $request->input('u_status');
                $logs->auth_id = Auth::user()->id;
                $logs->save();

                // Create the Order Status first entry
                $OrderStatus = new OrderStatus;
                $OrderStatus->shipment_id = $shipment->id;
                $OrderStatus->status = $request->input('u_status');
                $OrderStatus->auth_id = Auth::user()->id;
                $OrderStatus->save();

                $createdLogs[] = $logs; // Collect created log entries
            }
        }

        return redirect()->back();
    }


    public function batch_city_update(Request $request)
    {
        // dd($request->all());
        $c_ids = explode(',', $request->c_id); // Convert "1,2" to an array ['1', '2']

        $updatedShipments = [];

        foreach ($c_ids as $c_id) {
            $shipment = Shipment::find(trim($c_id)); // Trim to remove any leading/trailing spaces

            if ($shipment) {
                // $shipment->reference_number = $request->input('u_tracking');
                $shipment->city = $request->input('c_city');
                $shipment->update();
                $updatedShipments[] = $shipment; // Collect updated shipments
            }
        }

        // dd($updatedShipments); // Debug after the loop
        return redirect()->back();
    }


    public function batch_outscan_update(Request $request)
    {
        // dd($request->all());
        $o_ids = explode(',', $request->o_id); // Convert "1,2" to an array ['1', '2']

        $updatedShipments = [];

        foreach ($o_ids as $o_id) {
            $shipment = Shipment::find(trim($o_id)); // Trim to remove any leading/trailing spaces

            if ($shipment) {
                // Check if $shipment->inscan is equal to 1
                if ($shipment->outscan == 1) {
                    // Return a response indicating that inscan is equal to 1
                    return response()->json(['message' => 'Shipment is already outscan.']);
                } else {
                    // Update the shipment
                    $shipment->outscan = 1;
                    $shipment->driver_id = $request->input('o_driver_id');
                    $shipment->delivery_attempt = 1;
                    $shipment->status = 7;
                    $shipment->update(); // Save the updated shipment
                    $updatedShipments[] = $shipment; // Collect updated shipments

                    // Create the Order Status second entry
                    $OrderOutscan = new OrderOutscan;
                    $OrderOutscan->shipment_id = $shipment->id;
                    $OrderOutscan->auth_id = Auth::user()->id;
                    $OrderOutscan->order_date = $request->input('o_order_date');
                    $OrderOutscan->driver_id = $request->input('o_driver_id');
                    $OrderOutscan->save();

                    // Create the first log entry
                    $logs = new logs;
                    $logs->shipment_id = $shipment->id;
                    $logs->status_type = 1;
                    $logs->status = 7;
                    $logs->auth_id = Auth::user()->id;
                    $logs->save();

                    // Create the Order Status second entry
                    $OrderStatus = new OrderStatus;
                    $OrderStatus->shipment_id = $shipment->id;
                    $OrderStatus->status = 7;  // Change the status value
                    $OrderStatus->auth_id = Auth::user()->id;
                    $OrderStatus->save();
                }
            }
        }

        // Move this return statement outside of the loop to return a response after all shipments are processed
        return response()->json(['message' => 'Shipments processed successfully.', 'updated_shipments' => $updatedShipments]);
    }


    public function batch_inscan_update(Request $request)
    {

        $i_ids = explode(',', $request->i_id); // Convert "1,2" to an array ['1', '2']

        $updatedShipments = [];

        foreach ($i_ids as $i_id) {
            $shipment = Shipment::find(trim($i_id));

            if ($shipment) {
                // Check if $shipment->inscan is equal to 1
                if ($shipment->inscan == 1) {
                    // Return a response indicating that inscan is equal to 1
                    return response()->json(['message' => 'Shipment is already inscan.']);
                } else {
                    // Update the shipment
                    $shipment->inscan = 1;
                    $shipment->warehouse = $request->input('i_warehouse');
                    $shipment->rack = $request->input('i_rack');
                    $shipment->driver_id = $request->input('i_driver_id');
                    $shipment->update(); // Save the updated shipment
                    $updatedShipments[] = $shipment; // Collect updated shipments

                    // Create the Order Status second entry
                    $OrderInscan = new OrderInscan;
                    $OrderInscan->shipment_id = $shipment->id;
                    $OrderInscan->auth_id = Auth::user()->id;
                    $OrderInscan->warehouse = $request->input('i_warehouse');
                    $OrderInscan->rack = $request->input('i_rack');
                    $OrderInscan->driver_id = $request->input('i_driver_id');
                    $OrderInscan->save();
                }
            }
        }

        // Move this return statement outside of the loop to return a response after all shipments are processed
        return response()->json(['message' => 'Shipments processed successfully.', 'updated_shipments' => $updatedShipments]);
    }


    public function batch_comment_update(Request $request)
    {
        // dd($request->all());
        $co_ids = explode(',', $request->co_id); // Convert "1,2" to an array ['1', '2']

        $updatedShipments = [];

        foreach ($co_ids as $co_id) {
            $shipment = Shipment::find(trim($co_id)); // Trim to remove any leading/trailing spaces

            if ($shipment) {
                // dd($shipment);
                // $shipment->reference_number = $request->input('u_tracking');
                $shipment->comments = $request->input('co_comments');
                $shipment->update();
                $updatedShipments[] = $shipment; // Collect updated shipments
            }
        }

        // dd($updatedShipments); // Debug after the loop
        return redirect()->back();
    }

    public function batch_service_charges_update(Request $request)
    {
        // dd($request->all());
        $s_ids = explode(',', $request->s_id); // Convert "1,2" to an array ['1', '2']

        $updatedShipments = [];

        foreach ($s_ids as $s_id) {
            $shipment = Shipment::find(trim($s_id)); // Trim to remove any leading/trailing spaces

            if ($shipment) {
                // dd($shipment);
                // $shipment->reference_number = $request->input('u_tracking');
                $shipment->service_charges = $request->input('s_service_charges');
                $shipment->update();
                $updatedShipments[] = $shipment; // Collect updated shipments
            }
        }

        // dd($updatedShipments); // Debug after the loop
        return redirect()->back();
    }


    public function batch_assign_to_third_party(Request $request)
    {
        // dd($request->all());
        $s_ids = explode(',', $request->id);
        $addedAssignToThirdParty = [];
        foreach ($s_ids as $s_id) {
            // Check if a record with the given ID exists
            $check = AssignToThirdParty::where('id', $s_id)->first();
            // dd($check);
            if ($check) {
                $check->company_name = $request->input('company');
                $check->delivery_date = $request->input('date');
                $check->driver_id = $request->input('driver_id');
                $check->update();
                $addedAssignToThirdParty[] = $check;
            } else {
                // If the record doesn't exist, create a new one
                $assign = new AssignToThirdParty();
                $assign->shipment_id = $s_id;
                $assign->company_name = $request->input('company');
                $assign->delivery_date = $request->input('date');
                $assign->driver_id = $request->input('driver_id');
                $assign->save();
                $addedAssignToThirdParty[] = $assign;
            }
        }

        return redirect()->back();
    }



    public function get_edit_orders($id)
    {

        $shipments = Shipment::leftJoin('status', 'shipments.status', '=', 'status.id')
            ->leftJoin('shippers AS shipper', 'shipments.shipper_code', '=', 'shipper.id')
            ->leftJoin('countrys AS shipment_country', 'shipments.country', '=', 'shipment_country.id')
            ->leftJoin('citys AS shipment_city', 'shipments.city', '=', 'shipment_city.id')
            ->leftJoin('areas AS shipment_area', 'shipments.area', '=', 'shipment_area.id')
            ->leftJoin('countrys AS shipper_country', 'shipper.country', '=', 'shipper_country.id')
            ->leftJoin('citys AS shipper_city', 'shipper.city', '=', 'shipper_city.id')
            ->leftJoin('areas AS shipper_area', 'shipper.area', '=', 'shipper_area.id')
            ->leftJoin('drivers', 'shipments.driver_id', '=', 'drivers.id')
            ->select(
                'shipments.*',
                'status.name AS status_name',
                'shipper.street_address AS shipper_address',
                'shipper.contact_office_1 AS shipper_contact',
                'shipment_country.name AS shipment_country_name',
                'shipment_city.name AS shipment_city_name',
                'shipment_area.name AS shipment_area_name',
                'shipper_country.name AS shipper_country_name',
                'shipper_city.name AS shipper_city_name',
                'shipper_area.name AS shipper_area_name',
                'drivers.employee_name',
                'drivers.driver_code',
                'drivers.employee_mobile',
                'shipper.shipper_code As s_code',
                'shipper.country As shipper_country',
                'shipper.city As shipper_city',
                'shipper.area As shipper_area',
            )
            ->where('shipments.id', $id)->first();

        $shipments['logs'] = logs::leftJoin('admins', 'logs.auth_id', '=', 'admins.id')
            ->leftJoin('status', 'logs.status', '=', 'status.id')
            ->select('logs.*', 'admins.name', 'status.name AS status_name')
            ->where('shipment_id', $id)
            ->whereIn('status_type', [1, 2]) // Use whereIn to match multiple values
            ->get();

        $shipments['remarks'] = logs::leftJoin('admins', 'logs.auth_id', '=', 'admins.id')
            ->leftJoin('status', 'logs.status', '=', 'status.id')
            ->select('logs.*', 'admins.name', 'status.name AS status_name')
            ->where('shipment_id', $id)->whereIn('status_type', [3]) // Use whereIn to match multiple values
            ->get();

        // dd($shipments);
        return response()->json($shipments);
    }

    public function get_search(Request $request)
    {
        // dd($request->all());
        $get_data = Shipment::leftJoin('status', 'shipments.status', '=', 'status.id')
            ->leftJoin('shippers AS shipper', 'shipments.shipper_code', '=', 'shipper.id')
            ->leftJoin('countrys AS shipment_country', 'shipments.country', '=', 'shipment_country.id')
            ->leftJoin('citys AS shipment_city', 'shipments.city', '=', 'shipment_city.id')
            ->leftJoin('areas AS shipment_area', 'shipments.area', '=', 'shipment_area.id')
            ->leftJoin('countrys AS shipper_country', 'shipper.country', '=', 'shipper_country.id')
            ->leftJoin('citys AS shipper_city', 'shipper.city', '=', 'shipper_city.id')
            ->leftJoin('areas AS shipper_area', 'shipper.area', '=', 'shipper_area.id')
            ->leftJoin('drivers', 'shipments.driver_id', '=', 'drivers.id')
            ->select(
                'shipments.*',
                'status.name AS status_name',
                'shipper.street_address AS shipper_address',
                'shipper.contact_office_1 AS shipper_contact',
                'shipment_country.name AS shipment_country_name',
                'shipment_city.name AS shipment_city_name',
                'shipment_area.name AS shipment_area_name',
                'shipper_country.name AS shipper_country_name',
                'shipper_city.name AS shipper_city_name',
                'shipper_area.name AS shipper_area_name',
                'drivers.employee_name',
                'drivers.driver_code',
                'drivers.employee_mobile',
                'shipper.shipper_code As s_code',
                'shipper.country As shipper_country',
                'shipper.city As shipper_city',
                'shipper.area As shipper_area',
            )
            ->where('reference_number', $request->id)
            ->orWhere('awb_number', $request->id)
            ->firstOrFail();

        $get_data['shipment_files'] = ShipmentFile::where('shipment_id', $get_data->id)->get();

        $get_data['logs'] = logs::leftJoin('admins', 'logs.auth_id', '=', 'admins.id')
            ->leftJoin('status', 'logs.status', '=', 'status.id')
            ->select('logs.*', 'admins.name', 'status.name AS status_name')
            ->where('shipment_id', $get_data->id)
            ->whereIn('status_type', [1, 2]) // Use whereIn to match multiple values
            ->get();

        $get_data['remarks'] = logs::leftJoin('admins', 'logs.auth_id', '=', 'admins.id')
            ->leftJoin('status', 'logs.status', '=', 'status.id')
            ->select('logs.*', 'admins.name', 'status.name AS status_name')
            ->where('shipment_id', $get_data->id)->whereIn('status_type', [3]) // Use whereIn to match multiple values
            ->get();

        // dd($get_data['remarks']);

        return $get_data;
    }

    public function delete_logs(Request $request, $id)
    {
        // dd($request->all());
        $logs = logs::find($request->id);
        if ($logs) {
            $logs->delete();
            return response()->json(['message' => 'Record deleted successfully']);
        }
        return response()->json(['message' => 'Record not found'], 404);
    }

    public function tracking_comments(Request $request)
    {
        // dd($request->all());
        // Create the first log entry
        $logs = new logs;
        $logs->shipment_id = $request->id;
        $logs->status_type = 2;
        $logs->auth_id = Auth::user()->id;
        $logs->comments = $request->comments;
        $logs->save();
    }

    public function get_comments(Request $request)
    {
        $get_data = logs::leftJoin('admins', 'logs.auth_id', '=', 'admins.id')
            ->leftJoin('status', 'logs.status', '=', 'status.id')
            ->select('logs.*', 'admins.name', 'status.name AS status_name')
            ->where('shipment_id', $request->id)
            ->where(function ($query) {
                $query->where('status_type', 1)
                    ->orWhere('status_type', 2);
            })->get();

        return $get_data;
    }

    public function tracking_remarks(Request $request)
    {
        // dd($request->all());
        $remarks = new logs;
        $remarks->shipment_id = $request->id;
        $remarks->status_type = 3;
        $remarks->auth_id = Auth::user()->id;
        $remarks->remarks = $request->remarks;
        $remarks->save();
    }

    public function get_remarks(Request $request)
    {
        $get_data = logs::leftJoin('admins', 'logs.auth_id', '=', 'admins.id')
            ->leftJoin('status', 'logs.status', '=', 'status.id')
            ->select('logs.*', 'admins.name', 'status.name AS status_name')
            ->where('shipment_id', $request->id)
            ->where('status_type', 3) // Only retrieve records where status_type is 3
            ->get();

        return $get_data;
    }

    public function get_images(Request $request)
    {
        // dd($request->all());
        $get_data = ShipmentFile::where('shipment_id', $request->id)->get();
        return $get_data;
    }

    public function images_destroy(Request $request, $id)
    {
        // dd($request->all());
        $shipment_file = ShipmentFile::find($request->id);
        if ($shipment_file) {
            $shipment_file->delete();
            return response()->json(['message' => 'Record deleted successfully']);
        }
        return response()->json(['message' => 'Record not found'], 404);
    }

    public function update_location(Request $request)
    {
        // dd($request->all());
        $shipments = Shipment::find($request->id);
        $shipments->country = $request->input('country');
        $shipments->city = $request->input('city');
        $shipments->area = $request->input('area');
        $shipments->street_address = $request->input('street_address');
        $shipments->service_charges = $request->input('service_charges');
        $shipments->instruction = $request->input('instruction');
        $shipments->status = 11;
        $shipments->update();
        return redirect()->back();
    }

    public function update_order(Request $request)
    {
        // dd($request->all());
        $shipments = Shipment::find($request->id);
        $shipments->driver_id = $request->input('driver_id');
        $shipments->barcode = $request->input('barcode');
        $shipments->reference_number = $request->input('reference_number');
        $shipments->order_date = $request->input('order_date');
        $shipments->service_type = $request->input('service_type');
        $shipments->shipper_code = $request->input('shipper_code');
        $shipments->shipper_name = $request->input('shipper_name');
        $shipments->contact_office_1 = $request->input('contact_office_1');
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
        $shipments->no_of_peices = $request->input('no_of_peices');
        $detailsOfProducts = $request->input('details_of_products');
        if (is_array($detailsOfProducts)) {
            $shipments->details_of_products = implode(',', $detailsOfProducts);
        }
        $codPeice = $request->input('cod_peice');
        if (is_array($codPeice)) {
            $shipments->cod_peice = implode(',', $codPeice);
        }
        $shipments->update();
        return redirect()->back();
    }
    public function update_status(Request $request)
    {
        $page_title = 'Update Status';
        $page_description = 'Shipment / Update Status';
        $status = DB::table('status')->get();


        return view('admin.shipment.update_status', compact('page_title', 'page_description' , 'status'));
    }

    public function update_status_search_bar(Request $request)
    {

        if (is_numeric($request->id)) {
            $get_data = Shipment::join('citys', 'shipments.city', '=', 'citys.id')
                ->join('status', 'shipments.status', '=', 'status.id')
                ->leftJoin('drivers', 'shipments.driver_id', '=', 'drivers.id')
                ->select(
                    'shipments.*',
                    'citys.name as city_name',
                    'status.name as status_name',
                    'drivers.employee_name',
                    'drivers.employee_mobile'
                )->where('reference_number', 'LIKE', '%' . $request->id . '%')->first();
        } else {
            $get_data = Shipment::join('citys', 'shipments.city', '=', 'citys.id')
                ->join('status', 'shipments.status', '=', 'status.id')
                ->leftJoin('drivers', 'shipments.driver_id', '=', 'drivers.id')
                ->select(
                    'shipments.*',
                    'citys.name as city_name',
                    'status.name as status_name',
                    'drivers.employee_name',
                    'drivers.employee_mobile'
                )->where('shipper_name', 'LIKE', '%' . $request->id . '%')->first();
        }

        return $get_data;
    }

    public function single_batch_update(Request $request)
    {
    $shipment = Shipment::find($request->u_id); // Trim to remove any leading/trailing spaces

    // Check if the shipment exists
    if (!$shipment) {
        return redirect()->back()->with('error', 'Shipment not found.');
    }

    // Update shipment attributes
    $shipment->status = $request->input('u_status');
    $shipment->comments = $request->input('u_comments');
    $shipment->update();

    // Create a new log entry
    $logs = new Logs();
    $logs->shipment_id = $shipment->id; // Use the ID of the updated shipment
    $logs->status_type = 1;
    $logs->status = $request->input('u_status');
    $logs->auth_id = Auth::user()->id;
    $logs->save();

    // Create the Order Status first entry
    $orderStatus = new OrderStatus;
    $orderStatus->shipment_id = $shipment->id;
    $orderStatus->status = $request->input('u_status');
    $orderStatus->auth_id = Auth::user()->id;
    $orderStatus->save();

    return redirect()->back();
   }


    public function send_sms(Request $request)
    {
        $page_title = 'Send Sms';
        $page_description = 'Shipment / Send Sms';

        return view('admin.shipment.send_sms', compact('page_title', 'page_description'));
    }

    public function edit_place_order(Request $request)
    {
        $page_title = 'Edit Place Order';
        $page_description = 'Shipment / Edit Place Order';
        $shippers = Shipper::get();
        $countrys = DB::table('countrys')->get();
        $citys = DB::table('citys')->get();
        $areas = DB::table('areas')->get();
        $data = array(
            'page_title' => $page_title,
            'page_description' =>  $page_description,
            'fetch_shippers' =>  $shippers,
            'fetch_countrys' => $countrys,
            'fetch_citys' => $citys,
            'fetch_areas' => $areas,

        );
        return view('admin.shipment.edit_place_order')->with($data);
    }


    public function order_update(Request $request)
    {
        // dd($request->all());
        $shipments = Shipment::find($request->id);
        $shipments->awb_number = $request->input('awb_number');
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
        $detailsOfProducts = $request->input('details_of_products');
        if (is_array($detailsOfProducts)) {
            $shipments->details_of_products = implode(',', $detailsOfProducts);
        }
        $codPeice = $request->input('cod_peice');
        if (is_array($codPeice)) {
            $shipments->cod_peice = implode(',', $codPeice);
        }
        $shipments->update();


        // Shipments logs Save
        $shipment_logs = new ShipmentLogs();
        $shipment_logs->barcode = $shipments->barcode;
        $shipment_logs->awb_number = $request->input('awb_number');
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
            $shipments->details_of_products = implode(',', $detailsOfProducts);
        }
        $codPeice = $request->input('cod_peice');
        if (is_array($codPeice)) {
            $shipments->cod_peice = implode(',', $codPeice);
        }

        $shipment_logs->save();
        // Shipments logs Save


        return redirect()->back();
    }


    public function add_collection(Request $request)
    {
        $page_title = 'Add Collection';
        $page_description = 'Shipment / Add Collection';
        $drivers = Driver::where('status', 1)->get();
        $data = array(
            'page_title' => $page_title,
            'page_description' => $page_description,
            'fetch_drivers' => $drivers,
        );

        return view('admin.shipment.add_collection')->with($data);
    }

    public function shipment_audits(Request $request)
    {
        $page_title = 'Shipment Audits';
        $page_description = 'Shipment / Shipment Audits';

        return view('admin.shipment.all_shipment_audit', compact('page_title', 'page_description'));
    }

    public function get_tracking(Request $request)
    {
        $get_data = ShipmentLogs::leftJoin('areas', 'shipment_logs.area', '=', 'areas.id')->select('shipment_logs.*' , 'areas.name As area_name')->where('barcode' , $request->id)->orWhere('reference_number' , $request->id)->get();
        return $get_data;
    }

        public function shipment_view($id)
        {
            $shipmentLogs = ShipmentLogs::leftJoin('areas', 'shipment_logs.area', '=', 'areas.id')
            ->leftJoin('citys', 'shipment_logs.city', '=', 'citys.id')
            ->leftJoin('countrys', 'shipment_logs.country', '=', 'countrys.id')
            ->leftJoin('drivers', 'shipment_logs.driver_id', '=', 'drivers.id')
            ->select('shipment_logs.*', 'areas.name as area_name' , 'citys.name As city_name' , 'countrys.name As country_name' , 'drivers.employee_name')->findOrFail($id);

            // dd($shipmentLogs);

            // Find the corresponding Shipment record by barcode
            $shipment = Shipment::where('barcode', $shipmentLogs->barcode)->firstOrFail();

            // Initialize an array to store the columns with changed values
            $changedColumns = [];

            // Loop through the columns of ShipmentLogs and compare with Shipment
            foreach ($shipmentLogs->getAttributes() as $column => $value) {
                // Check if the column exists in Shipment and has a different value
                if (isset($shipment->$column) && $shipment->$column !== $value) {
                    $changedColumns[$column] = [
                        'old' => $value,
                        'new' => $shipment->$column,
                    ];
                }
            }

            return response()->json(['changedColumns' => $changedColumns , 'shipmentLogs' => $shipmentLogs]);
            // $changedColumns now contains the columns with changed values and their old and new values
        }


}

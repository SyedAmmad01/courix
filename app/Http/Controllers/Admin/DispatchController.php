<?php

namespace App\Http\Controllers\Admin;

use App\Models\Dispatch;
use App\Models\Driver;
use App\Models\Shipment;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Carbon\Carbon;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\IOFactory;
use PDF;



class DispatchController extends Controller
{
    public function delivery_jobs(Request $request)
    {

        $page_title = 'Delivery Jobs';
        $page_description = 'Dispatch / Delivery Jobs';
        $drivers = Driver::where('status', 1)->get();
        $citys = DB::table('citys')->get();
        $data = array(
            'page_title' => $page_title,
            'page_description' => $page_description,
            'fetch_drivers' => $drivers,
            'fetch_citys' => $citys,
        );
        return view('admin.dispatch.delivery_jobs')->with($data);
    }

    public function getarea(Request $request)
    {
        $zones = DB::table('zones')->where('city', $request->cid)->orderby('id', 'asc')->get();
        $html = '';
        $html = '<option value="" selected disabled>Please Select Zone</option>';
        foreach ($zones as $zone) {
            $html .= '<option value="' . $zone->id . '">' . $zone->zone_name . '</option>';
        }
        return $html;
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

    public function get_orders(Request $request)
    {
        // Validate the input data before proceeding
        $validator = Validator::make($request->all(), [
            'from_date' => 'date',
            'to_date' => 'date|after_or_equal:from_date',
            'driver_id' => 'required',
            'city_id' => 'required',
            'area_id' => 'required',
            'zones_id' => 'required',
        ]);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 400);
        }

        // Convert date strings to Carbon instances
        $startDate = Carbon::parse($request->input('from_date'));
        $endDate = Carbon::parse($request->input('to_date'));
        $driver_id = $request->input('driver_id');
        $city_id = $request->input('city_id');
        $area_id = $request->input('area_id');
        $zone_id = $request->input('zones_id');

        // Start building the query with necessary joins and selects
        $query = Shipment::query()
            ->leftJoin('citys', 'shipments.city', '=', 'citys.id')
            // ->leftJoin('citys', 'shipments.city', '=', 'citys.id')
            ->leftJoin('countrys', 'shipments.country', '=', 'countrys.id')
            ->leftJoin('areas', 'shipments.area', '=', 'areas.id')
            ->leftJoin('status', 'shipments.status', '=', 'status.id')
            ->leftJoin('drivers', 'shipments.driver_id', '=', 'drivers.id')
            ->select(
                'shipments.*',
                'citys.name as city_name',
                'countrys.name as country_name',
                'areas.name as area_name',
                'status.name as status_name',
                'drivers.employee_name',
                'drivers.employee_mobile'
            );

        // Apply date filter if provided
        if ($startDate && $endDate) {
            $query->whereDate('order_date', '>=', $startDate)
                ->whereDate('order_date', '<=', $endDate);
        }

        // Apply 'id' filter if provided
        if ($driver_id) {
            $query->whereIn('shipments.driver_id', (array)$driver_id);
        }

        // Apply 'shipper_id' filter if provided
        if ($city_id) {
            $query->whereIn('shipments.city', (array)$city_id);
        }

        if ($area_id) {
            $query->whereIn('shipments.area', (array)$area_id);
        }

        // Execute the query and retrieve the data
        $data = $query->get();

        if ($data->isEmpty()) {
            return response()->json(['message' => 'No records found.'], 404);
        }

        return $data;
    }

    public function edit_orders($id)
    {
        $shipments = Shipment::where('id', $id)->first();
        return response()->json($shipments);
    }


    public function update_order(Request $request)
    {
        $shipments = Shipment::find($request->id);
        $shipments->job_status = $request->input('jobstatus');
        $shipments->update();

        return response()->json(['status' => 'success']);
    }

    public function search_bar(Request $request)
    {
        // dd($request->all());
        if (is_numeric($request->id)) {
            $get_data = Shipment::leftJoin('citys', 'shipments.city', '=', 'citys.id')
                ->leftJoin('countrys', 'shipments.country', '=', 'countrys.id')
                ->leftJoin('areas', 'shipments.area', '=', 'areas.id')
                ->leftJoin('status', 'shipments.status', '=', 'status.id')
                ->leftJoin('drivers', 'shipments.driver_id', '=', 'drivers.id')
                ->select(
                    'shipments.*',
                    'citys.name as city_name',
                    'countrys.name as country_name',
                    'areas.name as area_name',
                    'status.name as status_name',
                    'drivers.employee_name',
                    'drivers.employee_mobile'
                )->where('reference_number', 'LIKE', '%' . $request->id . '%')->get();
        } else {
            $get_data = Shipment::leftJoin('citys', 'shipments.city', '=', 'citys.id')
                ->leftJoin('countrys', 'shipments.country', '=', 'countrys.id')
                ->leftJoin('areas', 'shipments.area', '=', 'areas.id')
                ->leftJoin('status', 'shipments.status', '=', 'status.id')
                ->leftJoin('drivers', 'shipments.driver_id', '=', 'drivers.id')
                ->select(
                    'shipments.*',
                    'citys.name as city_name',
                    'countrys.name as country_name',
                    'areas.name as area_name',
                    'status.name as status_name',
                    'drivers.employee_name',
                    'drivers.employee_mobile'
                )->where('shipper_name', 'LIKE', '%' . $request->id . '%')->get();
        }

        // dd($get_data);
        return $get_data;
    }


    public function exportToExcel(Request $request)
    {
        // dd($request->all());
        // Generate or fetch the Excel file
        $spreadsheet = new Spreadsheet();

        // Initialize row counter
        $row = 1;

        // Add column headers to the spreadsheet
        $sheet = $spreadsheet->getActiveSheet();
        $sheet->setCellValue('A1', 'Barcode');
        $sheet->setCellValue('B1', 'Tracking_No');
        $sheet->setCellValue('C1', 'ShipperName');
        $sheet->setCellValue('D1', 'LocationFrom');
        $sheet->setCellValue('E1', 'LocationTo');
        $sheet->setCellValue('F1', 'Remarks');
        $sheet->setCellValue('G1', 'JobCode');
        $sheet->setCellValue('H1', 'JobStatus');
        $sheet->setCellValue('I1', 'Recipient_Name');
        $sheet->setCellValue('J1', 'AccountName');
        $sheet->setCellValue('K1', 'RecipientMobile1');
        $sheet->setCellValue('L1', 'RecipientMobile2');
        $sheet->setCellValue('M1', 'ContactNo_Office1');
        $sheet->setCellValue('O1', 'ContactNo_Office2');
        $sheet->setCellValue('P1', 'CostOfGoods');
        $sheet->setCellValue('Q1', 'Shipment_Date');
        $sheet->setCellValue('R1', 'TrackingStatus');
        $sheet->setCellValue('S1', 'DriverName');
        $sheet->setCellValue('T1', 'LastUpdatedBy');
        $sheet->setCellValue('U1', 'LastUpdatedOn');
        $sheet->setCellValue('V1', 'Area');
        $sheet->setCellValue('W1', 'City');
        $sheet->setCellValue('X1', 'SalePersonName');
        $sheet->setCellValue('Y1', 'ServiceCharges');
        $sheet->setCellValue('Z1', 'JobCode');
        $sheet->setCellValue('AA1', 'DeliveryAttempts');
        $sheet->setCellValue('AB1', 'SerialNo');
        $sheet->setCellValue('AC1', 'No_Of_Pieces');
        $sheet->setCellValue('AD1', 'CreatedOn');
        $sheet->setCellValue('AE1', 'Description');
        $sheet->setCellValue('AF1', 'CSRemarks');
        $sheet->setCellValue('AG1', 'ShipmentRemarksInternal');
        $sheet->setCellValue('AH1', 'Courier');
        $sheet->setCellValue('AI1', 'ThirdPartyTrackingStatus');
        $sheet->setCellValue('AJ1', 'ThirdPartyShipmentDate');
        $sheet->setCellValue('AK1', 'ThirdPartyLastUpdateDateTime');
        $sheet->setCellValue('AL1', 'ThirdPartyRemarks');


        // Loop through the request IDs
        foreach ($request->id as $shipmentId) {
            // Fetch a single Shipment model instance based on the current ID
            $shipmentData = Shipment::leftJoin('status', 'shipments.status', '=', 'status.id')
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
                    'shipper.contact_office_1 As shipper_contact_1',
                    'shipper.contact_office_2 As shipper_contact_2'
                )->where('shipments.id',  $shipmentId)->first();

            // dd($shipmentData);

            if ($shipmentData) {
                // Increment the row counter
                $row++;

                $combinedAddress = $shipmentData->shipper_address . ', ' . $shipmentData->shipper_area_name . ', ' . $shipmentData->shipper_city_name . ', ' . $shipmentData->shipper_country_name;

                $shipAddress = $shipmentData->street_address . ', ' . $shipmentData->shipment_area_name . ', ' . $shipmentData->shipment_city_name . ', ' . $shipmentData->shipment_country_name;

                // Populate data from the Shipment model into the Excel file
                $sheet->setCellValue('A' . $row, $shipmentData->barcode);
                $sheet->setCellValue('B' . $row, $shipmentData->reference_number);
                $sheet->setCellValue('C' . $row, $shipmentData->shipper_name);
                $sheet->setCellValue('D' . $row, $combinedAddress);
                $sheet->setCellValue('E' . $row, $shipAddress);
                $sheet->setCellValue('F' . $row, $shipmentData->shipper_name);
                $sheet->setCellValue('G' . $row, $shipmentData->job_code);
                if ($shipmentData->job_status == 1) {
                    $text = 'Created';
                } elseif ($shipmentData->job_status == 2) {
                    $text = 'Started';
                } elseif ($shipmentData->job_status == 3) {
                    $text = 'Delivered';
                }
                $sheet->setCellValue('H' . $row, $text);
                $sheet->setCellValue('I' . $row, $shipmentData->reciver_name);
                $sheet->setCellValue('J' . $row, $shipmentData->account_name);
                $sheet->setCellValue('K' . $row, $shipmentData->mobile_1);
                $sheet->setCellValue('L' . $row, $shipmentData->mobile_2);
                $sheet->setCellValue('M' . $row, $shipmentData->cod);
                $sheet->setCellValue('N' . $row, $shipmentData->shipper_contact_1);
                $sheet->setCellValue('O' . $row, $shipmentData->shipper_contact_2);
                $sheet->setCellValue('P' . $row, $shipmentData->order_date);
                $sheet->setCellValue('Q' . $row, $shipmentData->status_name);
                $sheet->setCellValue('R' . $row, $shipmentData->employee_name);
                $sheet->setCellValue('S' . $row, null);
                $sheet->setCellValue('T' . $row, $shipmentData->updated_at);
                $sheet->setCellValue('U' . $row, null);
                $sheet->setCellValue('V' . $row, null);
                $sheet->setCellValue('W' . $row, null);
                $sheet->setCellValue('X' . $row, null);
                $sheet->setCellValue('Y' . $row, null);
                $sheet->setCellValue('Z' . $row, null);
                $sheet->setCellValue('AA' . $row, null);
                $sheet->setCellValue('AB' . $row, null);
                $sheet->setCellValue('AC' . $row, null);
                $sheet->setCellValue('AD' . $row, null);
                $sheet->setCellValue('AE' . $row, null);
                $sheet->setCellValue('AF' . $row, null);
                $sheet->setCellValue('AI' . $row, null);
                $sheet->setCellValue('AJ' . $row, null);
                $sheet->setCellValue('AK' . $row, null);
                $sheet->setCellValue('AL' . $row, null);
                $sheet->setCellValue('AM' . $row, null);
            }
        }



        // Adjust column width for column B (Shipment Name)
        $sheet->getColumnDimension('A')->setWidth(20);
        $sheet->getColumnDimension('B')->setWidth(30);
        $sheet->getColumnDimension('C')->setWidth(30);
        $sheet->getColumnDimension('D')->setWidth(80);
        $sheet->getColumnDimension('E')->setWidth(80);
        $sheet->getColumnDimension('F')->setWidth(25);
        $sheet->getColumnDimension('G')->setWidth(25);
        $sheet->getColumnDimension('H')->setWidth(25);
        $sheet->getColumnDimension('I')->setWidth(25);
        $sheet->getColumnDimension('J')->setWidth(25);
        $sheet->getColumnDimension('K')->setWidth(25);
        $sheet->getColumnDimension('L')->setWidth(25);
        $sheet->getColumnDimension('M')->setWidth(25);
        $sheet->getColumnDimension('N')->setWidth(25);
        $sheet->getColumnDimension('O')->setWidth(25);
        $sheet->getColumnDimension('P')->setWidth(25);
        $sheet->getColumnDimension('Q')->setWidth(25);
        $sheet->getColumnDimension('R')->setWidth(25);
        $sheet->getColumnDimension('S')->setWidth(25);
        $sheet->getColumnDimension('T')->setWidth(25);
        $sheet->getColumnDimension('U')->setWidth(25);
        $sheet->getColumnDimension('V')->setWidth(25);
        $sheet->getColumnDimension('W')->setWidth(25);
        $sheet->getColumnDimension('X')->setWidth(25);
        $sheet->getColumnDimension('Y')->setWidth(25);
        $sheet->getColumnDimension('Z')->setWidth(25);
        $sheet->getColumnDimension('AA')->setWidth(25);
        $sheet->getColumnDimension('AB')->setWidth(25);
        $sheet->getColumnDimension('AC')->setWidth(25);
        $sheet->getColumnDimension('AD')->setWidth(30);
        $sheet->getColumnDimension('AE')->setWidth(30);
        $sheet->getColumnDimension('AF')->setWidth(30);
        $sheet->getColumnDimension('AG')->setWidth(30);
        $sheet->getColumnDimension('AH')->setWidth(30);
        $sheet->getColumnDimension('AI')->setWidth(30);
        $sheet->getColumnDimension('AJ')->setWidth(30);
        $sheet->getColumnDimension('AK')->setWidth(30);
        $sheet->getColumnDimension('AL')->setWidth(30);
        $sheet->getColumnDimension('AM')->setWidth(30);




        // Create a temporary file to store the Excel data
        $tempFilePath = tempnam(sys_get_temp_dir(), 'excel_export');
        $writer = IOFactory::createWriter($spreadsheet, 'Xlsx');
        $writer->save($tempFilePath);

        // Return the Excel file as a downloadable response
        return response()->stream(
            function () use ($tempFilePath) {
                readfile($tempFilePath);
                unlink($tempFilePath); // Delete the temporary file after sending
            },
            200,
            [
                'Content-Type' => 'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet',
                'Content-Disposition' => 'attachment; filename="ExportExcel.xlsx"',
            ]
        );
    }

    // public function pdf_export(Request $request)
    // {
    //     $records = Shipment::leftJoin('status', 'shipments.status', '=', 'status.id')
    //         ->leftJoin('shippers AS shipper', 'shipments.shipper_code', '=', 'shipper.id')
    //         ->leftJoin('countrys AS shipment_country', 'shipments.country', '=', 'shipment_country.id')
    //         ->leftJoin('citys AS shipment_city', 'shipments.city', '=', 'shipment_city.id')
    //         ->leftJoin('areas AS shipment_area', 'shipments.area', '=', 'shipment_area.id')
    //         ->leftJoin('countrys AS shipper_country', 'shipper.country', '=', 'shipper_country.id')
    //         ->leftJoin('citys AS shipper_city', 'shipper.city', '=', 'shipper_city.id')
    //         ->leftJoin('areas AS shipper_area', 'shipper.area', '=', 'shipper_area.id')
    //         ->leftJoin('drivers', 'shipments.driver_id', '=', 'drivers.id')
    //         ->select(
    //             'shipments.*',
    //             'status.name AS status_name',
    //             'shipper.street_address AS shipper_address',
    //             'shipper.contact_office_1 AS shipper_contact',
    //             'shipment_country.name AS shipment_country_name',
    //             'shipment_city.name AS shipment_city_name',
    //             'shipment_area.name AS shipment_area_name',
    //             'shipper_country.name AS shipper_country_name',
    //             'shipper_city.name AS shipper_city_name',
    //             'shipper_area.name AS shipper_area_name',
    //             'drivers.employee_name',
    //             'drivers.driver_code',
    //             'drivers.employee_mobile',
    //             'shipper.shipper_code As s_code',
    //             'shipper.country As shipper_country',
    //             'shipper.city As shipper_city',
    //             'shipper.area As shipper_area',
    //             'shipper.contact_office_1 As shipper_contact_1',
    //             'shipper.contact_office_2 As shipper_contact_2'
    //         )->where('shipments.id',  $request->id)->get();

    //     $pdf = PDF::loadView('admin.pdf.deliveryjobs', $records);

    //     return $pdf->download('deliveryjobs.pdf');
    // }

    // public function pdf_export(Request $request)
    // {
    //     dd($request->all());
    //     $shipments = Shipment::find($request->id);
    //     $count = $shipments->count();
    //     $records = []; // Initialize an empty array to store records?

    //     for ($i = 0; $i < $count; $i++) {
    //         $record = Shipment::where('id',  $request->id)->get();

    //         // Append the current record to the $records array
    //         // $records[] = $record;
    //     }

    //     // Now $records contains all the records fetched in the loop
    //     $data = [
    //         'title' => 'Sample PDF',
    //         'content' => 'This is a sample PDF generated using Laravel and DomPDF.',
    //         'record' => $record,
    //     ];

    //     $pdf = PDF::loadView('admin.pdf.deliveryjobs', $data);

    //     return $pdf->download('deliveryjobs.pdf');
    // }

    public function pdf_export(Request $request)
    {
        // Get an array of IDs from the request
        $ids = $request->id;

        // Find shipments based on the array of IDs
        // $shipments = Shipment::whereIn('id', $ids)->get();

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
                'shipper.contact_office_1 As shipper_contact_1',
                'shipper.contact_office_2 As shipper_contact_2'
            )->whereIn('shipments.id',  $ids)->get();

        // Pass the shipments to the PDF view
        $data = [
            'title' => 'Sample PDF',
            'shipments' => $shipments,
        ];

        // Load the PDF view with the data
        $pdf = PDF::loadView('admin.pdf.deliveryjobs', $data);

        // Download the PDF
        return $pdf->download('deliveryjobs.pdf');
    }

    public function edit_job_code(Request $request)
    {
        $ids = $request->input('id', []); // Make sure 'id' is an array even if only one ID is provided
        $get_data = Shipment::whereIn('id', $ids)->select('id')->get();
        return $get_data;
    }

    // public function update_job_code(Request $request)
    // {
    //     dd($request->all());
    //     $shipments = Shipment::find($request->id);
    //     $shipments->job_code = $request->input('job_code');
    //     $shipments->update();

    //     return response()->json(['status' => 'success']);
    // }


    public function update_job_code(Request $request)
    {

        // dd($request->all());
        $u_ids = explode(',', $request->id); // Convert "1,2" to an array ['1', '2']
        // dd($u_ids);
        $updatedShipments = [];

        foreach ($u_ids as $u_id) {
            $shipment = Shipment::find(trim($u_id)); // Trim to remove any leading/trailing spaces
            // dd($shipment);
            if ($shipment) {
                // Update shipment attributes
                $shipment->job_code = $request->input('job_code');
                $shipment->update();
                $updatedShipments[] = $shipment; // Collect updated shipments
            }
        }

        return response()->json(['status' => 'success']);
    }


    public function inscan(Request $request)
    {
        $page_title = 'Inscan';
        $page_description = 'Dispatch / Inscan';
        $drivers = Driver::where('status', 1)->get();
        $data = array(
            'page_title' => $page_title,
            'page_description' => $page_description,
            'fetch_drivers' => $drivers,
        );
        return view('admin.dispatch.inscan')->with($data);
    }

    public function outscan(Request $request)
    {

        $page_title = 'Outscan';
        $page_description = 'Dispatch / Outscan';

        return view('admin.dispatch.outscan', compact('page_title', 'page_description'));
    }

    public function shipment_pickup(Request $request)
    {

        $page_title = 'Pick Up Request';
        $page_description = 'Dispatch / Pick Up Request';

        return view('admin.dispatch.pickup_req', compact('page_title', 'page_description'));
    }

    public function manifest(Request $request)
    {

        $page_title = 'Manifest';
        $page_description = 'Dispatch / Manifest';

        return view('admin.dispatch.manifest', compact('page_title', 'page_description'));
    }

    public function pendings(Request $request)
    {

        $page_title = 'Pending';
        $page_description = 'Dispatch / Pending';

        return view('admin.dispatch.pendings', compact('page_title', 'page_description'));
    }

    public function collection_jobs(Request $request)
    {

        $page_title = 'Collection Jobs';
        $page_description = 'Dispatch / Collection Jobs';

        return view('admin.dispatch.collection_jobs', compact('page_title', 'page_description'));
    }

    public function driver_location(Request $request)
    {

        $page_title = 'Driver Location';
        $page_description = 'Dispatch / Driver Location';

        return view('admin.dispatch.driver_location', compact('page_title', 'page_description'));
    }
}

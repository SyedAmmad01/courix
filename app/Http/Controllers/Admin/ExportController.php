<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Shipment;
use App\Models\OrderStatus;
use Illuminate\Http\Request;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
use App\Models\Shipper; // Replace with your model
use Symfony\Component\HttpFoundation\StreamedResponse;
use PhpOffice\PhpSpreadsheet\IOFactory;
use Symfony\Component\HttpFoundation\BinaryFileResponse;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;
use Illuminate\Support\Facades\DB;

class ExportController extends Controller
{
    public function exportShippersToExcel()
    {

        // Fetch your data here, for example, shippers
        $shippers = Shipper::leftJoin('countrys', 'shippers.country', '=', 'countrys.id')
            ->leftJoin('citys', 'shippers.city', '=', 'citys.id')
            ->leftJoin('areas', 'shippers.area', '=', 'areas.id')
            ->select('shippers.*', 'countrys.name As country_name', 'citys.name As city_name', 'areas.name As area_name')
            ->get();

        // Create a new Spreadsheet object
        $spreadsheet = new Spreadsheet();

        // Create a new worksheet
        $worksheet = $spreadsheet->getActiveSheet();

        // Add an image to the top of the Excel sheet
        $headerImage = public_path('/admin_assets/assets/images/icons/background.png'); // Use public_path to get the correct file path
        $drawing = new \PhpOffice\PhpSpreadsheet\Worksheet\Drawing();
        $drawing->setName('Header Image');
        $drawing->setDescription('Image');
        $drawing->setPath($headerImage);
        $drawing->setCoordinates('A1'); // Place the image in cell A1
        $drawing->setOffsetX(5); // Adjust X offset as needed
        $drawing->setOffsetY(5); // Adjust Y offset as needed
        $drawing->setWidth(500); // Adjust image width as needed
        $drawing->setHeight(100); // Adjust image height as needed
        $drawing->setWorksheet($worksheet);

        // Set custom column widths for all columns
        $customWidths = [
            'A' => 5, // Adjust the width of column A
            'B' => 10, // Adjust the width of column B
            'C' => 30, // Adjust the width of column C
            'D' => 50, // Adjust the width of column D
            'E' => 30, // Adjust the width of column E
            'F' => 20, // Adjust the width of column F
            'G' => 20, // Adjust the width of column G
            'H' => 20, // Adjust the width of column H
            'I' => 30, // Adjust the width of column I
            'J' => 20, // Adjust the width of column J
            'K' => 20, // Adjust the width of column K
            'L' => 20, // Adjust the width of column L
        ];

        foreach ($customWidths as $column => $width) {
            $worksheet->getColumnDimension($column)->setWidth($width);
        }

        // Set column headers starting from row 6
        $headers = [
            'Sr #',
            'Code',
            'Name',
            'Address',
            'Company',
            'License No',
            'ContactNo Office',
            'ContactNo Office2',
            'Email',
            'Created Date',
            'Updated Date',
            'Active',
        ];

        $startRow = 7; // Start headers from row 6

        // Populate column headers
        foreach ($headers as $index => $header) {
            $columnLetter = \PhpOffice\PhpSpreadsheet\Cell\Coordinate::stringFromColumnIndex($index + 1);
            $worksheet->setCellValueByColumnAndRow($index + 1, $startRow, $header);
        }

        // Populate data
        $row = $startRow + 1;
        foreach ($shippers as $shipper) {
            $address = $shipper->country_name . ', ' . $shipper->city_name . ', ' . $shipper->area_name;
            $data = [
                $shipper->id,
                $shipper->shipper_code,
                $shipper->manager_name,
                $address,
                $shipper->company_name,
                $shipper->trade_license_no,
                $shipper->contact_office_1,
                $shipper->contact_office_2,
                $shipper->shipper_email,
                $shipper->created_at,
                $shipper->updated_at,
                $shipper->status,
            ];
            $col = 1;
            foreach ($data as $value) {
                $worksheet->setCellValueByColumnAndRow($col, $row, $value);
                $col++;
            }
            $row++;
        }

        // Create a response
        $response = new StreamedResponse(function () use ($spreadsheet) {
            $writer = new Xlsx($spreadsheet);
            $writer->save('php://output');
        });

        // Set response headers
        $response->headers->set('Content-Type', 'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
        $response->headers->set('Content-Disposition', 'attachment;filename="ExportExcel.xlsx"');
        $response->headers->set('Cache-Control', 'max-age=0');

        return $response;
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
        $sheet->setCellValue('G1', 'Recipient_Name');
        $sheet->setCellValue('H1', 'AccountName');
        $sheet->setCellValue('I1', 'RecipientMobile1');
        $sheet->setCellValue('J1', 'RecipientMobile2');
        $sheet->setCellValue('K1', 'ContactNo_Office1');
        $sheet->setCellValue('L1', 'ContactNo_Office2');
        $sheet->setCellValue('M1', 'CostOfGoods');
        $sheet->setCellValue('N1', 'Shipment_Date');
        $sheet->setCellValue('O1', 'TrackingStatus');
        $sheet->setCellValue('P1', 'DriverName');
        $sheet->setCellValue('Q1', 'LastUpdatedBy');
        $sheet->setCellValue('R1', 'LastUpdatedOn');
        $sheet->setCellValue('S1', 'Area');
        $sheet->setCellValue('T1', 'City');
        $sheet->setCellValue('U1', 'SalePersonName');
        $sheet->setCellValue('V1', 'ServiceCharges');
        $sheet->setCellValue('W1', 'JobCode');
        $sheet->setCellValue('X1', 'DeliveryAttempts');
        $sheet->setCellValue('Y1', 'SerialNo');
        $sheet->setCellValue('Z1', 'No_Of_Pieces');
        $sheet->setCellValue('AA1', 'CreatedOn');
        $sheet->setCellValue('AB1', 'Description');
        $sheet->setCellValue('AC1', 'CSRemarks');
        $sheet->setCellValue('AD1', 'ShipmentRemarksInternal');
        $sheet->setCellValue('AE1', 'Courier');
        $sheet->setCellValue('AF1', 'ThirdPartyTrackingStatus');
        $sheet->setCellValue('AG1', 'ThirdPartyShipmentDate');
        $sheet->setCellValue('AH1', 'ThirdPartyLastUpdateDateTime');
        $sheet->setCellValue('AI1', 'ThirdPartyRemarks');


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
                $sheet->setCellValue('G' . $row, $shipmentData->reciver_name);
                $sheet->setCellValue('H' . $row, $shipmentData->account_name);
                $sheet->setCellValue('I' . $row, $shipmentData->mobile_1);
                $sheet->setCellValue('J' . $row, $shipmentData->mobile_2);
                $sheet->setCellValue('K' . $row, $shipmentData->cod);
                $sheet->setCellValue('L' . $row, $shipmentData->shipper_contact_1);
                $sheet->setCellValue('M' . $row, $shipmentData->shipper_contact_2);
                $sheet->setCellValue('N' . $row, $shipmentData->order_date);
                $sheet->setCellValue('O' . $row, $shipmentData->status_name);
                $sheet->setCellValue('P' . $row, $shipmentData->employee_name);
                $sheet->setCellValue('Q' . $row, null);
                $sheet->setCellValue('R' . $row, $shipmentData->updated_at);
                $sheet->setCellValue('S' . $row, null);
                $sheet->setCellValue('T' . $row, null);
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
                $sheet->setCellValue('AG' . $row, null);
                $sheet->setCellValue('AH' . $row, null);
                $sheet->setCellValue('AI' . $row, null);
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

    public function singleexportToExcel(Request $request)
    {
    // Get the shipment ID from the request
    $shipmentId = $request->input('id');

    // Generate or fetch the Excel file
    $spreadsheet = new Spreadsheet();

    // Add column headers to the spreadsheet
    $sheet = $spreadsheet->getActiveSheet();
    $sheet->setCellValue('A1', 'Barcode');
    $sheet->setCellValue('B1', 'Tracking_No');
    $sheet->setCellValue('C1', 'ShipperName');
    $sheet->setCellValue('D1', 'LocationFrom');
    $sheet->setCellValue('E1', 'LocationTo');
    $sheet->setCellValue('F1', 'Remarks');
    $sheet->setCellValue('G1', 'Recipient_Name');
    $sheet->setCellValue('H1', 'AccountName');
    $sheet->setCellValue('I1', 'RecipientMobile1');
    $sheet->setCellValue('J1', 'RecipientMobile2');
    $sheet->setCellValue('K1', 'ContactNo_Office1');
    $sheet->setCellValue('L1', 'ContactNo_Office2');
    $sheet->setCellValue('M1', 'CostOfGoods');
    $sheet->setCellValue('N1', 'Shipment_Date');
    $sheet->setCellValue('O1', 'TrackingStatus');
    $sheet->setCellValue('P1', 'DriverName');
    $sheet->setCellValue('Q1', 'LastUpdatedBy');
    $sheet->setCellValue('R1', 'LastUpdatedOn');
    $sheet->setCellValue('S1', 'Area');
    $sheet->setCellValue('T1', 'City');
    $sheet->setCellValue('U1', 'SalePersonName');
    $sheet->setCellValue('V1', 'ServiceCharges');
    $sheet->setCellValue('W1', 'JobCode');
    $sheet->setCellValue('X1', 'DeliveryAttempts');
    $sheet->setCellValue('Y1', 'SerialNo');
    $sheet->setCellValue('Z1', 'No_Of_Pieces');
    $sheet->setCellValue('AA1', 'CreatedOn');
    $sheet->setCellValue('AB1', 'Description');
    $sheet->setCellValue('AC1', 'CSRemarks');
    $sheet->setCellValue('AD1', 'ShipmentRemarksInternal');
    $sheet->setCellValue('AE1', 'Courier');
    $sheet->setCellValue('AF1', 'ThirdPartyTrackingStatus');
    $sheet->setCellValue('AG1', 'ThirdPartyShipmentDate');
    $sheet->setCellValue('AH1', 'ThirdPartyLastUpdateDateTime');
    $sheet->setCellValue('AI1', 'ThirdPartyRemarks');
    // ... (other headers)

    // Fetch a single Shipment model instance based on the ID
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
        )->where('shipments.id', $shipmentId)->first();

    if ($shipmentData) {

        $combinedAddress = $shipmentData->shipper_address . ', ' . $shipmentData->shipper_area_name . ', ' . $shipmentData->shipper_city_name . ', ' . $shipmentData->shipper_country_name;

        $shipAddress = $shipmentData->street_address . ', ' . $shipmentData->shipment_area_name . ', ' . $shipmentData->shipment_city_name . ', ' . $shipmentData->shipment_country_name;

        // Add data for the single shipment to the spreadsheet
        $sheet->setCellValue('A2' ,  $shipmentData->barcode);
        $sheet->setCellValue('B2' ,  $shipmentData->reference_number);
        $sheet->setCellValue('C2' ,  $shipmentData->shipper_name);
        $sheet->setCellValue('D2' ,  $combinedAddress);
        $sheet->setCellValue('E2' ,  $shipAddress);
        $sheet->setCellValue('F2' ,  $shipmentData->shipper_name);
        $sheet->setCellValue('G2' ,  $shipmentData->reciver_name);
        $sheet->setCellValue('H2' ,  $shipmentData->account_name);
        $sheet->setCellValue('I2' ,  $shipmentData->mobile_1);
        $sheet->setCellValue('J2' ,  $shipmentData->mobile_2);
        $sheet->setCellValue('K2' ,  $shipmentData->cod);
        $sheet->setCellValue('L2' ,  $shipmentData->shipper_contact_1);
        $sheet->setCellValue('M2' ,  $shipmentData->shipper_contact_2);
        $sheet->setCellValue('N2' ,  $shipmentData->order_date);
        $sheet->setCellValue('O2' ,  $shipmentData->status_name);
        $sheet->setCellValue('P2' ,  $shipmentData->employee_name);
        $sheet->setCellValue('Q2' ,  null);
        $sheet->setCellValue('R2' ,  $shipmentData->updated_at);
        $sheet->setCellValue('S2' ,  null);
        $sheet->setCellValue('T2' ,  null);
        $sheet->setCellValue('U2' ,  null);
        $sheet->setCellValue('V2' ,  null);
        $sheet->setCellValue('W2' ,  null);
        $sheet->setCellValue('X2' ,  null);
        $sheet->setCellValue('Y2' ,  null);
        $sheet->setCellValue('Z2' ,  null);
        $sheet->setCellValue('AA2' ,  null);
        $sheet->setCellValue('AB2' ,  null);
        $sheet->setCellValue('AC2' ,  null);
        $sheet->setCellValue('AD2' ,  null);
        $sheet->setCellValue('AE2' ,  null);
        $sheet->setCellValue('AF2' ,  null);
        $sheet->setCellValue('AG2' ,  null);
        $sheet->setCellValue('AH2' ,  null);
        $sheet->setCellValue('AI2' ,  null);
        // ... (other data)

        // Adjust column widths (if needed)
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
        // ...

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
    } else {
        // Handle the case where the shipment with the given ID was not found
        return response()->json(['error' => 'Shipment not found'], 404);
    }
    }


    public function detailsexportToExcel(Request $request)
    {
        // dd($request->all());
        // Generate or fetch the Excel file
        $spreadsheet = new Spreadsheet();

        // Initialize row counter
        $row = 1;

        // Add column headers to the spreadsheet
        $sheet = $spreadsheet->getActiveSheet();
        $sheet->setCellValue('A1', 'TrackingSecondLastStatus');
        $sheet->setCellValue('B1', 'TrackingThirdLastStatus');
        $sheet->setCellValue('C1', 'TrackingForthLastStatus');
        $sheet->setCellValue('D1', 'Barcode');
        $sheet->setCellValue('E1', 'Tracking_No');
        $sheet->setCellValue('F1', 'ShipperName');
        $sheet->setCellValue('G1', 'LocationFrom');
        $sheet->setCellValue('H1', 'LocationTo');
        $sheet->setCellValue('I1', 'Remarks');
        $sheet->setCellValue('J1', 'Recipient_Name');
        $sheet->setCellValue('K1', 'AccountName');
        $sheet->setCellValue('L1', 'RecipientMobile1');
        $sheet->setCellValue('M1', 'RecipientMobile2');
        $sheet->setCellValue('N1', 'ContactNo_Office1');
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

            // $latestStatuses = DB::table('order_statuses')->leftJoin('status', 'order_statuses.status', '=', 'status.id')->where('shipment_id', $shipmentId)->orderBy('order_statuses.id', 'desc')->take(4)->get();
            $latestStatuses = DB::table('order_statuses')->leftJoin('status', 'order_statuses.status', '=', 'status.id')->where('shipment_id', $shipmentId)->orderBy('order_statuses.id', 'desc')->take(3)->get();

            // dd($latestStatuses);

            // dd($shipmentData);

            if ($shipmentData) {
                // Increment the row counter
                $row++;

                $combinedAddress = $shipmentData->shipper_address . ', ' . $shipmentData->shipper_area_name . ', ' . $shipmentData->shipper_city_name . ', ' . $shipmentData->shipper_country_name;

                $shipAddress = $shipmentData->street_address . ', ' . $shipmentData->shipment_area_name . ', ' . $shipmentData->shipment_city_name . ', ' . $shipmentData->shipment_country_name;

                $columns = range('A', 'C');
                // Populate data from the Shipment model into the Excel file


                for ($i = 0; $i < count($latestStatuses); $i++) {
                    $column = $columns[$i];
                    $sheet->setCellValue($column . $row, $latestStatuses[$i]->name);
                }
                // $sheet->setCellValue('A' . $row, $latestStatuses[0]->name);
                // $sheet->setCellValue('B' . $row, $latestStatuses[1]->name);
                // $sheet->setCellValue('C' . $row, $latestStatuses[2]->name);
                $sheet->setCellValue('D' . $row, $shipmentData->barcode);
                $sheet->setCellValue('E' . $row, $shipmentData->reference_number);
                $sheet->setCellValue('F' . $row, $shipmentData->shipper_name);
                $sheet->setCellValue('G' . $row, $combinedAddress);
                $sheet->setCellValue('H' . $row, $shipAddress);
                $sheet->setCellValue('I' . $row, null);
                $sheet->setCellValue('J' . $row, $shipmentData->reciver_name);
                $sheet->setCellValue('K' . $row, $shipmentData->account_name);
                $sheet->setCellValue('L' . $row, $shipmentData->mobile_1);
                $sheet->setCellValue('M' . $row, $shipmentData->mobile_2);
                $sheet->setCellValue('N' . $row, $shipmentData->shipper_contact_1);
                $sheet->setCellValue('O' . $row, $shipmentData->shipper_contact_2);
                $sheet->setCellValue('P' . $row, $shipmentData->cod);
                $sheet->setCellValue('Q' . $row, $shipmentData->order_date);
                $sheet->setCellValue('R' . $row, $shipmentData->status_name);
                $sheet->setCellValue('S' . $row, $shipmentData->employee_name);
                $sheet->setCellValue('T' . $row, null);
                $sheet->setCellValue('U' . $row, null);
                $sheet->setCellValue('V' . $row, null);
                $sheet->setCellValue('W' . $row, null);
                $sheet->setCellValue('X' . $row, null);
                $sheet->setCellValue('Y' . $row, null);
                $sheet->setCellValue('Z' . $row, null);
                $sheet->setCellValue('AA' . $row, null);
                $sheet->setCellValue('AB' . $row, null);
                $sheet->setCellValue('AC' . $row, $shipmentData->created_at);
                $sheet->setCellValue('AD' . $row, null);
                $sheet->setCellValue('AE' . $row, null);
                $sheet->setCellValue('AF' . $row, null);
                $sheet->setCellValue('AG' . $row, null);
                $sheet->setCellValue('AH' . $row, null);
                $sheet->setCellValue('AI' . $row, null);
                $sheet->setCellValue('AJ' . $row, null);
                $sheet->setCellValue('AK' . $row, null);
                $sheet->setCellValue('AL' . $row, null);
            }
        }



        // Adjust column width for column B (Shipment Name)
        $sheet->getColumnDimension('A')->setWidth(30);
        $sheet->getColumnDimension('B')->setWidth(30);
        $sheet->getColumnDimension('C')->setWidth(30);
        $sheet->getColumnDimension('D')->setWidth(30);
        $sheet->getColumnDimension('E')->setWidth(30);
        $sheet->getColumnDimension('F')->setWidth(30);
        $sheet->getColumnDimension('G')->setWidth(80);
        $sheet->getColumnDimension('H')->setWidth(80);
        $sheet->getColumnDimension('I')->setWidth(30);
        $sheet->getColumnDimension('J')->setWidth(30);
        $sheet->getColumnDimension('K')->setWidth(30);
        $sheet->getColumnDimension('L')->setWidth(30);
        $sheet->getColumnDimension('M')->setWidth(30);
        $sheet->getColumnDimension('N')->setWidth(30);
        $sheet->getColumnDimension('O')->setWidth(30);
        $sheet->getColumnDimension('P')->setWidth(30);
        $sheet->getColumnDimension('Q')->setWidth(30);
        $sheet->getColumnDimension('R')->setWidth(30);
        $sheet->getColumnDimension('S')->setWidth(30);
        $sheet->getColumnDimension('T')->setWidth(30);
        $sheet->getColumnDimension('U')->setWidth(30);
        $sheet->getColumnDimension('V')->setWidth(30);
        $sheet->getColumnDimension('W')->setWidth(30);
        $sheet->getColumnDimension('X')->setWidth(30);
        $sheet->getColumnDimension('Y')->setWidth(30);
        $sheet->getColumnDimension('Z')->setWidth(30);
        $sheet->getColumnDimension('AA')->setWidth(30);
        $sheet->getColumnDimension('AB')->setWidth(30);
        $sheet->getColumnDimension('AC')->setWidth(30);
        $sheet->getColumnDimension('AD')->setWidth(30);
        $sheet->getColumnDimension('AE')->setWidth(30);
        $sheet->getColumnDimension('AF')->setWidth(30);
        $sheet->getColumnDimension('AG')->setWidth(30);
        $sheet->getColumnDimension('AH')->setWidth(30);
        $sheet->getColumnDimension('AI')->setWidth(30);
        $sheet->getColumnDimension('AJ')->setWidth(30);
        $sheet->getColumnDimension('AK')->setWidth(30);
        $sheet->getColumnDimension('AL')->setWidth(30);


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

    public function download_sample_excel(Request $request)
    {
        // Generate or fetch the Excel file
        $spreadsheet = new Spreadsheet();

        // Add column headers to the spreadsheet
        $sheet = $spreadsheet->getActiveSheet();
        $sheet->setCellValue('A1', 'ServiceType');
        $sheet->setCellValue('B1', 'ReceiverName');
        $sheet->setCellValue('C1', 'COD');
        $sheet->setCellValue('D1', 'MobileNumber');
        $sheet->setCellValue('E1', 'ShipperRef');
        $sheet->setCellValue('F1', 'CountryCode');
        $sheet->setCellValue('G1', 'CityCode');
        $sheet->setCellValue('H1', 'Area');
        $sheet->setCellValue('I1', 'Address');
        $sheet->setCellValue('J1', 'Instructions');
        $sheet->setCellValue('K1', 'Description');
        $sheet->setCellValue('L1', 'PCs');
        $sheet->setCellValue('M1', 'AccountName');

        // Apply bold font style to column headers
        $boldFontStyle = [
            'font' => [
                'bold' => true,
            ],
        ];

        $sheet->getStyle('A1:M1')->applyFromArray($boldFontStyle);

        // Add static data for 3 rows
        $staticData = [
            ['NDD', 'RecipientName2', '100', '1234567891', '654789357', 'United Arab Emirates', 'Abu Dhabi', 'Al Shawamekh 1', 'Street01', 'Remarks2', 'Mobile Cover', '2', 'ABC'],
            ['SDD', 'RecipientName4', '100', '1234567892', '654789357', 'United Arab Emirates', 'Abu Dhabi', 'Al Shawamekh 1', 'Street01', 'Remarks4', 'Samsung', '1', 'MNO'],
            ['SDD', 'RecipientName8', '100', '1234567893', '654789357', 'United Arab Emirates', 'Abu Dhabi', 'Al Shawamekh 1', 'Street01', 'Remarks8', 'Iphone', '3', 'XYZ'],
        ];

        $row = 2; // Start from row 2 to add static data
        foreach ($staticData as $data) {
            $col = 'A';
            foreach ($data as $value) {
                $sheet->setCellValue($col . $row, $value);
                $col++;
            }
            $row++;
        }

        // Adjust column width for all columns
        $columns = range('A', 'M');
        foreach ($columns as $column) {
            $sheet->getColumnDimension($column)->setWidth(30);
        }

        // Adjust column width for column B (Shipment Name)
        $sheet->getColumnDimension('A')->setWidth(20);
        $sheet->getColumnDimension('B')->setWidth(20);
        $sheet->getColumnDimension('C')->setWidth(20);
        $sheet->getColumnDimension('D')->setWidth(20);
        $sheet->getColumnDimension('E')->setWidth(20);
        $sheet->getColumnDimension('F')->setWidth(20);
        $sheet->getColumnDimension('G')->setWidth(20);
        $sheet->getColumnDimension('H')->setWidth(20);
        $sheet->getColumnDimension('I')->setWidth(20);
        $sheet->getColumnDimension('J')->setWidth(20);
        $sheet->getColumnDimension('K')->setWidth(20);
        $sheet->getColumnDimension('L')->setWidth(20);
        $sheet->getColumnDimension('M')->setWidth(20);

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
}

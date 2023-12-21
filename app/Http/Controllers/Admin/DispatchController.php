<?php

namespace App\Http\Controllers\Admin;

use App\Models\Dispatch;
use App\Models\Driver;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Carbon\Carbon;



class DispatchController extends Controller
{
    public function delivery_jobs(Request $request){

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
        dd($request->all());
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

    public function inscan(Request $request){

        $page_title = 'Inscan';
        $page_description = 'Dispatch / Inscan';

        return view('admin.dispatch.inscan', compact('page_title', 'page_description'));
    }

    public function outscan(Request $request){

        $page_title = 'Outscan';
        $page_description = 'Dispatch / Outscan';

        return view('admin.dispatch.outscan', compact('page_title', 'page_description'));

    }

    public function shipment_pickup(Request $request){

        $page_title = 'Pick Up Request';
        $page_description = 'Dispatch / Pick Up Request';

        return view('admin.dispatch.pickup_req', compact('page_title', 'page_description'));
    }

    public function manifest(Request $request){

        $page_title = 'Manifest';
        $page_description = 'Dispatch / Manifest';

        return view('admin.dispatch.manifest', compact('page_title', 'page_description'));
    }

    public function pendings(Request $request){

        $page_title = 'Pending';
        $page_description = 'Dispatch / Pending';

        return view('admin.dispatch.pendings', compact('page_title', 'page_description'));
    }

    public function collection_jobs(Request $request){

        $page_title = 'Collection Jobs';
        $page_description = 'Dispatch / Collection Jobs';

        return view('admin.dispatch.collection_jobs', compact('page_title', 'page_description'));
    }

    public function driver_location(Request $request){

        $page_title = 'Driver Location';
        $page_description = 'Dispatch / Driver Location';

        return view('admin.dispatch.driver_location', compact('page_title', 'page_description'));
    }
}


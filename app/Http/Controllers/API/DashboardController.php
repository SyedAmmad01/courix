<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\OrderOutscan;
use App\Models\Shipment;
use App\Models\logs;
use App\Models\ShipmentFile;
use App\Models\OrderStatus;
use App\Models\ShipmentLogs;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;



class DashboardController extends Controller
{
    public function allOrders()
    {
        $currentDate = Carbon::today();
        $user = Auth::guard('drivers')->user();
        $order_outscan = OrderOutscan::join('shipments', 'order_outscans.driver_id', '=', 'shipments.id')->select('shipments.*', 'order_outscans.id As order_id', 'order_outscans.shipment_id As order_shipment_id', 'order_outscans.auth_id As order_auth_id', 'order_outscans.order_date As order_order_date', 'order_outscans.driver_id As order_driver_id', 'order_outscans.deleted_at As order_deleted_at', 'order_outscans.created_at As order_created_at', 'order_outscans.updated_at As order_updated_at')->where('shipments.driver_id', $user->id)->whereDate('order_outscans.created_at', $currentDate)->get();
        $order_outscan_count = OrderOutscan::where('driver_id', $user->id)->whereDate('created_at', $currentDate)->count();
        $data = [
            'user' => $user,
            'order_outscan' => $order_outscan,
            'order_outscan_count' => $order_outscan_count,
        ];
        return response()->json($data, 200);
    }

    public function assigned_order(Request $request)
    {
        $currentDate = Carbon::today();
        $user = Auth::guard('drivers')->user();
        $order_assigned = OrderOutscan::join('shipments', 'order_outscans.driver_id', '=', 'shipments.driver_id')->select('shipments.*', 'order_outscans.id As order_id', 'order_outscans.shipment_id As order_shipment_id', 'order_outscans.auth_id As order_auth_id', 'order_outscans.order_date As order_order_date', 'order_outscans.driver_id As order_driver_id', 'order_outscans.deleted_at As order_deleted_at', 'order_outscans.created_at As order_created_at', 'order_outscans.updated_at As order_updated_at')->where('shipments.driver_id', $user->id)->whereDate('order_outscans.created_at', $currentDate)->where('shipments.status', 7)->get();
        $order_assigned_count = OrderOutscan::join('shipments', 'order_outscans.driver_id', '=', 'shipments.driver_id')->select('shipments.*', 'order_outscans.id As order_id', 'order_outscans.shipment_id As order_shipment_id', 'order_outscans.auth_id As order_auth_id', 'order_outscans.order_date As order_order_date', 'order_outscans.driver_id As order_driver_id', 'order_outscans.deleted_at As order_deleted_at', 'order_outscans.created_at As order_created_at', 'order_outscans.updated_at As order_updated_at')->where('shipments.driver_id', $user->id)->whereDate('order_outscans.created_at', $currentDate)->where('shipments.status', 7)->count();
        $data = [
            'user' => $user,
            'order_assigned' => $order_assigned,
            'order_assigned_count' => $order_assigned_count,
        ];
        return response()->json($data, 200);
    }

    public function order_proceed(Request $request, $id)
    {

        $currentDate = Carbon::today();
        $formattedDate = $currentDate->format('Y-m-d');
        $user = Auth::guard('drivers')->user();
        $shipments = Shipment::find($id);
        // Payment Method 1 Means Cash And 2 Means Card
        if ($request->payment_method == 1) {
            $shipments->status = $request->input('status');
            $shipments->payment_method = $request->input('payment_method');
        } else {
            $shipments->status = $request->input('status');
            $shipments->payment_method = $request->input('payment_method');
            $shipments->transition_id = $request->input('transition_id');
        }

        $shipment_logs = ShipmentLogs::find($id);
        if ($request->payment_method == 1) {
            $shipment_logs->status = $request->input('status');
            $shipment_logs->payment_method = $request->input('payment_method');
        } else {
            $shipment_logs->status = $request->input('status');
            $shipment_logs->payment_method = $request->input('payment_method');
            $shipment_logs->transition_id = $request->input('transition_id');
        }

        $logs = new logs;
        $logs->shipment_id = $id;
        $logs->status_type = 1;
        $logs->status = $request->input('status');
        $logs->driver_id = $user->id;
        $logs->comments = $request->comments;

        $OrderOutscan = OrderOutscan::where('shipment_id',  $id)->first();
        $OrderOutscan->shipment_id = $id;
        $OrderOutscan->order_date = $formattedDate;
        $OrderOutscan->driver_id = $user->id;


        // Create the Order Status second entry
        $OrderStatus = OrderStatus::where('shipment_id',  $id)->first();
        $OrderStatus->shipment_id = $id;
        $OrderStatus->status = $request->input('status');  // Change the status value


        if (!$request->hasFile('myfile')) {
            $shipmentfile = null;
            // You can add additional handling here if needed
            // (e.g., return a response, log a message, etc.)
        } else {
            $file = $request->file('myfile');
            $fileName_img = $file->getClientOriginalName();
            $destinationPath = public_path() . '/shippment_files_images';
            $file->move($destinationPath, $fileName_img);

            $shipmentfile = new ShipmentFile;
            $shipmentfile->shipment_id = $id;
            $shipmentfile->file_name = "File";
            $shipmentfile->selected_file = $fileName_img;
            $shipmentfile->file_type = "POD";

            $shipmentfile->save();
        }

        $OrderOutscan->update();
        $OrderStatus->update();
        $logs->save();
        $shipment_logs->update();
        $shipments->update();
        return response()->json(['message' => 'Order Updated Successfully', 'shipments' => $shipments, 'shipment_logs' => $shipment_logs, 'logs' => $logs, 'orderoutscan' => $OrderOutscan, 'orderstatus' => $OrderStatus], 200);
    }

    public function deliverdOrders()
    {
        $currentDate = Carbon::today();
        $user = Auth::guard('drivers')->user();
        $order_outscan = OrderOutscan::join('shipments', 'order_outscans.driver_id', '=', 'shipments.id')->select('shipments.*', 'order_outscans.id As order_id', 'order_outscans.shipment_id As order_shipment_id', 'order_outscans.auth_id As order_auth_id', 'order_outscans.order_date As order_order_date', 'order_outscans.driver_id As order_driver_id', 'order_outscans.deleted_at As order_deleted_at', 'order_outscans.created_at As order_created_at', 'order_outscans.updated_at As order_updated_at')->where('shipments.driver_id', $user->id)->whereDate('order_outscans.created_at', $currentDate)->where('shipments.status', 7)->get();
        $order_deliverd_count = OrderOutscan::join('shipments', 'order_outscans.driver_id', '=', 'shipments.id')->select('shipments.*', 'order_outscans.id As order_id', 'order_outscans.shipment_id As order_shipment_id', 'order_outscans.auth_id As order_auth_id', 'order_outscans.order_date As order_order_date', 'order_outscans.driver_id As order_driver_id', 'order_outscans.deleted_at As order_deleted_at', 'order_outscans.created_at As order_created_at', 'order_outscans.updated_at As order_updated_at')->where('shipments.driver_id', $user->id)->whereDate('order_outscans.created_at', $currentDate)->where('shipments.status', 7)->count();
        $data = [
            'user' => $user,
            'order_outscan' => $order_outscan,
            'order_deliverd_count' => $order_deliverd_count,
        ];

        return response()->json($data, 200);
    }

    public function collectionjobs(Request $request)
    {
        $currentDate = Carbon::today();
        $user = Auth::guard('drivers')->user();
        $collectionjobs = OrderOutscan::join('shipments', 'order_outscans.driver_id', '=', 'shipments.id')->select('shipments.*', 'order_outscans.id As order_id', 'order_outscans.shipment_id As order_shipment_id', 'order_outscans.auth_id As order_auth_id', 'order_outscans.order_date As order_order_date', 'order_outscans.driver_id As order_driver_id', 'order_outscans.deleted_at As order_deleted_at', 'order_outscans.created_at As order_created_at', 'order_outscans.updated_at As order_updated_at')->where('shipments.driver_id', $user->id)->whereDate('order_outscans.created_at', $currentDate)->where('shipments.status', 7)->get();
        $collectionjobs_count = $collectionjobs->count();
        $data = [
            'user' => $user,
            'collectionjobs' => $collectionjobs,
            'collectionjobs_count' => $collectionjobs_count,
        ];
        return response()->json($data, 200);
    }


    public function quick_delivery(Request $request)
    {
        $currentDate = Carbon::today();
        $user = Auth::guard('drivers')->user();
        $order_outscan = OrderOutscan::join('shipments', 'order_outscans.driver_id', '=', 'shipments.id')
            ->select('shipments.*', 'order_outscans.id As order_id', 'order_outscans.shipment_id As order_shipment_id', 'order_outscans.auth_id As order_auth_id', 'order_outscans.order_date As order_order_date', 'order_outscans.driver_id As order_driver_id', 'order_outscans.deleted_at As order_deleted_at', 'order_outscans.created_at As order_created_at', 'order_outscans.updated_at As order_updated_at')
            ->where('shipments.driver_id', $user->id)
            ->where('shipments.tracking_number', $request->tracking_number)
            ->whereDate('order_outscans.created_at', $currentDate)
            ->where('shipments.status', '!=', 5) // Exclude records where order status is 5
            ->get();
        // $order_outscan = OrderOutscan::join('shipments', 'order_outscans.driver_id', '=', 'shipments.id')->select('shipments.*', 'order_outscans.id As order_id', 'order_outscans.shipment_id As order_shipment_id', 'order_outscans.auth_id As order_auth_id', 'order_outscans.order_date As order_order_date', 'order_outscans.driver_id As order_driver_id', 'order_outscans.deleted_at As order_deleted_at', 'order_outscans.created_at As order_created_at', 'order_outscans.updated_at As order_updated_at')->where('shipments.driver_id', $user->id)->where('shipments.tracking_number', $request->tracking_number)->whereDate('order_outscans.created_at', $currentDate)->get();
        $data = [
            'user' => $user,
            'order_outscan' => $order_outscan,
        ];
        return response()->json($data, 200);
    }

    // public function attempt_order(Request $request)
    // {
    //     $currentDate = Carbon::today();
    //     $user = Auth::guard('drivers')->user();
    //     $attempt_order = OrderOutscan::join('shipments', 'order_outscans.driver_id', '=', 'shipments.driver_id')->select('order_outscans.id As order_id', 'order_outscans.shipment_id As order_shipment_id', 'order_outscans.auth_id As order_auth_id', 'order_outscans.order_date As order_order_date', 'order_outscans.driver_id As order_driver_id', 'order_outscans.deleted_at As order_deleted_at', 'order_outscans.created_at As order_created_at', 'order_outscans.updated_at As order_updated_at')->where('shipments.driver_id', $user->id)->where('shipments.status', '!=', 5)->whereDate('order_outscans.created_at', $currentDate)->get();
    //     $attempt_order_count = OrderOutscan::join('shipments', 'order_outscans.driver_id', '=', 'shipments.driver_id')->select('order_outscans.id As order_id', 'order_outscans.shipment_id As order_shipment_id', 'order_outscans.auth_id As order_auth_id', 'order_outscans.order_date As order_order_date', 'order_outscans.driver_id As order_driver_id', 'order_outscans.deleted_at As order_deleted_at', 'order_outscans.created_at As order_created_at', 'order_outscans.updated_at As order_updated_at')->where('shipments.driver_id', $user->id)->where('shipments.status', '!=', 5)->whereDate('order_outscans.created_at', $currentDate)->count();
    //     // $attempt_order_count = OrderOutscan::where('driver_id', $user->id)->whereDate('created_at', $currentDate)->count();
    //     $data = [
    //         // 'user' => $user,
    //         'attempt_order' => $attempt_order,
    //         'attempt_order_count' => $attempt_order_count,
    //     ];
    //     return response()->json($data, 200);

    // }

    public function attempt_order(Request $request)
{
    $currentDate = Carbon::today();
    $user = Auth::guard('drivers')->user();

    $attempt_order = OrderOutscan::join('shipments', 'order_outscans.shipment_id', '=', 'shipments.id')
        ->select('shipments.*' , 'order_outscans.id As order_id', 'order_outscans.shipment_id As order_shipment_id', 'order_outscans.auth_id As order_auth_id', 'order_outscans.order_date As order_order_date', 'order_outscans.driver_id As order_driver_id', 'order_outscans.deleted_at As order_deleted_at', 'order_outscans.created_at As order_created_at', 'order_outscans.updated_at As order_updated_at')
        ->where('shipments.driver_id', $user->id)
        ->where('shipments.status', '!=', 5)
        ->whereDate('order_outscans.created_at', $currentDate)
        ->distinct()
        ->get();

    $attempt_order_count = $attempt_order->count();

    $data = [
        'attempt_order' => $attempt_order,
        'attempt_order_count' => $attempt_order_count,
    ];

    return response()->json($data, 200);
}




}

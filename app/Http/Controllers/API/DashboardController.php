<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\OrderOutscan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;



class DashboardController extends Controller
{
    public function allOrders()
    {
    $currentDate = Carbon::today();
    $user = Auth::guard('drivers')->user();
    $order_outscan = OrderOutscan::join('shipments', 'order_outscans.driver_id', '=', 'shipments.id')->select('shipments.*' , 'order_outscans.id As order_id' , 'order_outscans.shipment_id As order_shipment_id' , 'order_outscans.auth_id As order_auth_id' , 'order_outscans.order_date As order_order_date' , 'order_outscans.driver_id As order_driver_id' , 'order_outscans.deleted_at As order_deleted_at' , 'order_outscans.created_at As order_created_at' , 'order_outscans.updated_at As order_updated_at')->where('shipments.driver_id', $user->id)->whereDate('order_outscans.created_at' , $currentDate)->get();
    $order_outscan_count = OrderOutscan::where('driver_id', $user->id)->whereDate('created_at', $currentDate)->count();
    $data = [
        'user' => $user,
        'order_outscan' => $order_outscan,
        'order_outscan_count' => $order_outscan_count,
    ];
    return response()->json($data, 200);

    }

    public function deliverdOrders()
    {
        $currentDate = Carbon::today();
        $user = Auth::guard('drivers')->user();
        $order_outscan = OrderOutscan::join('shipments', 'order_outscans.driver_id', '=', 'shipments.id')->select('shipments.*','order_outscans.id As order_id','order_outscans.shipment_id As order_shipment_id','order_outscans.auth_id As order_auth_id','order_outscans.order_date As order_order_date','order_outscans.driver_id As order_driver_id','order_outscans.deleted_at As order_deleted_at','order_outscans.created_at As order_created_at','order_outscans.updated_at As order_updated_at')->where('shipments.driver_id', $user->id)->whereDate('order_outscans.created_at', $currentDate)->where('shipments.status', 7)->get();
        $order_deliverd_count = OrderOutscan::join('shipments', 'order_outscans.driver_id', '=', 'shipments.id')->select('shipments.*','order_outscans.id As order_id','order_outscans.shipment_id As order_shipment_id','order_outscans.auth_id As order_auth_id','order_outscans.order_date As order_order_date','order_outscans.driver_id As order_driver_id','order_outscans.deleted_at As order_deleted_at','order_outscans.created_at As order_created_at','order_outscans.updated_at As order_updated_at')->where('shipments.driver_id', $user->id)->whereDate('order_outscans.created_at', $currentDate)->where('shipments.status', 7)->count();
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
        $order_outscan = OrderOutscan::join('shipments', 'order_outscans.driver_id', '=', 'shipments.id')->select('shipments.*','order_outscans.id As order_id','order_outscans.shipment_id As order_shipment_id','order_outscans.auth_id As order_auth_id','order_outscans.order_date As order_order_date','order_outscans.driver_id As order_driver_id','order_outscans.deleted_at As order_deleted_at','order_outscans.created_at As order_created_at','order_outscans.updated_at As order_updated_at')->where('shipments.driver_id', $user->id)->whereDate('order_outscans.created_at', $currentDate)->where('shipments.status', 7)->get();
        dd($order_outscan);
    }

}

<?php

namespace App\Http\Controllers\User;

use App\Models\Shipment;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Booking;
use App\Models\Shipper;
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
        );
        // dd($data);
        return view('user.shipment.place_order')->with($data);
    }

    public function save(Request $request)
    {
        $shipments = new Shipment;
        $shipments->awb_number = $request->input('awb_number');
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
        $shipments->actual_weight = $request->input('actual_weight');
        $shipments->is_fragile = $request->input('is_fragile');
        $shipments->no_of_peices = $request->input('no_of_peices');
        $shipments->status = 2;
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
        return redirect()->back();
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

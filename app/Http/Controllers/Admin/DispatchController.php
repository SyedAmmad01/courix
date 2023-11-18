<?php

namespace App\Http\Controllers\Admin;

use App\Models\Dispatch;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DispatchController extends Controller
{
    public function delivery_jobs(Request $request){

        $page_title = 'Delivery Jobs';
        $page_description = 'Dispatch / Delivery Jobs';

        return view('admin.dispatch.delivery_jobs', compact('page_title', 'page_description'));

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


<?php

namespace App\Http\Controllers\Admin;

use App\Models\ShipmentFile;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ShipmentFileController extends Controller
{
    public function shipment_files_save(Request $request)
    {
        // dd($request->all());
        if ($file = $request->hasFile('myfile')) {

            $file = $request->file('myfile');
            $fileName_img = $file->getClientOriginalName();
            $destinationPath = public_path() . '/shippment_files_images';
            $file->move($destinationPath, $fileName_img);
        } else {
            $fileName_img = null;
        }
        $shipmentfile = new ShipmentFile;
        $shipmentfile->shipment_id = $request->input('id');
        $shipmentfile->file_name = $request->input('file_name');
        $shipmentfile->selected_file = $fileName_img;
        $shipmentfile->file_type = $request->input('file_type');
        $shipmentfile->save();
        return redirect()->back();
    }

}


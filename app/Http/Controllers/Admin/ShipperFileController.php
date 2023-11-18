<?php

namespace App\Http\Controllers\Admin;

use App\Models\ShipperFile;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\ContactPerson;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;

class ShipperFileController extends Controller
{
    public function shipper_files_save(Request $request)
    {
        $last = DB::table('shippers')->latest('id')->first();
        if ($last) {
            $shipper_code = $last->id + 1;
        } else {
            $shipper_code = 1;
        }
        if ($file = $request->hasFile('myfile')) {

            $file = $request->file('myfile');
            $fileName_img = $file->getClientOriginalName();
            $destinationPath = public_path() . '/shipper_files_images';
            $file->move($destinationPath, $fileName_img);
        } else {
            $fileName_img = null;
        }
        $shipperfile = new ShipperFile;
        $shipperfile->shipper_id = $shipper_code;
        $shipperfile->file_name = $request->input('file_name');
        $shipperfile->myfile = $fileName_img;
        $shipperfile->save();
        return redirect()->back();
    }

    public function eidt_add_shipper_files_save(Request $request)
    {
        if ($file = $request->hasFile('myfile')) {

            $file = $request->file('myfile');
            $fileName_img = $file->getClientOriginalName();
            $destinationPath = public_path() . '/shipper_files_images';
            $file->move($destinationPath, $fileName_img);
        } else {
            $fileName_img = null;
        }
        $shipperfile = new ShipperFile;
        $shipperfile->shipper_id = $request->input('shipper_id');
        $shipperfile->file_name = $request->input('file_name');
        $shipperfile->myfile = $fileName_img;
        $shipperfile->save();
        return redirect()->back();
    }

    public function add_get(Request $request)
    {
        $last = DB::table('shippers')->latest('id')->first();
        $shipper_files = ShipperFile::latest('shipper_id')->get();
        if ($last) {
            $shipper_code = $last->id + 1;
        } else {
            $shipper_code = 1;
        }
        $get_data = ShipperFile::where('shipper_id', $shipper_code)->get();

        // dd($get_data);
        return $get_data;
    }
    public function get(Request $request)
    {
        $get_data = ShipperFile::where('shipper_id', $request->id)->get();
        return $get_data;
    }

    public function edit($id)
    {
        $shipper_file = ShipperFile::where('id', $id)->first();
        return response()->json($shipper_file);
    }

    public function update(Request $request)
    {
        $shipper_file = ShipperFile::find($request->id);
        if ($file = $request->hasFile('myfile')) {
            $destination = '/shipper_files_images/' . $request->myfile;
            if (File::exists($destination)) {
                File::delete($destination);
            }
            // dd($destination);
            $file = $request->file('myfile');
            $fileName_img = $file->getClientOriginalName();
            $destinationPath = public_path() . '/shipper_files_images/';
            $file->move($destinationPath, $fileName_img);
            $shipper_file->myfile = $fileName_img;
            // return redirect('/uploadfile');
        }
        $shipper_file->shipper_id = $request->input('shipper_id');
        $shipper_file->file_name = $request->input('file_name');
        $shipper_file->myfile = $fileName_img;

        if ($shipper_file->update()) {
            $shipper_file->update();
            return response()->json(['status' => 'success']);
        } else {
            return response()->json(['status' => 'error']);
        }
    }

    public function destroy(Request $request, $id)
    {
        $shipper_file = ShipperFile::find($request->id);
        if ($shipper_file) {
            $shipper_file->delete();
            return response()->json(['message' => 'Record deleted successfully']);
        }
        return response()->json(['message' => 'Record not found'], 404);
    }
}

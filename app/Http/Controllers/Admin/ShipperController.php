<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Shipper;
use App\Models\Driver;
use App\Models\ContactPerson;
use App\Models\ShipperFile;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Hash;

class ShipperController extends Controller
{
    public function index(Request $request)
    {
        $page_title = 'View Shippers';
        $page_description = 'Shippers / View Shippers';
        $shippers = Shipper::join('citys', 'shippers.city', '=', 'citys.id')->select('shippers.*', 'citys.name')->orderBy('shippers.id', 'desc')->get();
        $countrys = DB::table('countrys')->get();
        $citys = DB::table('citys')->get();
        $areas = DB::table('areas')->get();
        $last = DB::table('shippers')->latest('id')->first();
        $contact_person = ContactPerson::latest('shipper_id')->get();
        if ($last) {
            $shipper_code = $last->id + 1;
        } else {
            $shipper_code = 1;
        }
        $data = array(
            'page_title' => $page_title,
            'page_description' =>  $page_description,
            'shippers' => $shippers,
            'fetch_countrys' => $countrys,
            'fetch_citys' => $citys,
            'fetch_areas' => $areas,
            'shipper_code' => $shipper_code,
        );
        return view('admin.shipper.index')->with($data);
    }

    public function view_shippers_details(Request $request, $id)
    {

        $page_title = 'View Shippers Details';
        $page_description = 'Shippers / View Shippers Details';
        $shippers = Shipper::where('id', $id)->first();
        $drivers = Driver::leftjoin('zones', 'drivers.zones', '=', 'zones.id')->select('drivers.*', 'zones.zone_name')->where('drivers.id', $shippers->driver)->first();
        $contact_persons = ContactPerson::where('shipper_id', $id)->get();
        $data = array(
            'page_title' => $page_title,
            'page_description' =>  $page_description,
            'shippers' => $shippers,
            'drivers' => $drivers,
            'contact_persons' => $contact_persons,
        );
        // dd($data);
        return view('admin.shipper.view')->with($data);
    }

    public function add(Request $request)
    {
        $page_title = 'Add Shipper';
        $page_description = 'Shipper / Add Shipper';
        $countrys = DB::table('countrys')->get();
        $employees = DB::table('employees')->get();
        $drivers = DB::table('drivers')->where('status' , 1)->get();
        $last = DB::table('shippers')->latest('id')->first();
        $contact_person = ContactPerson::latest('shipper_id')->get();
        if ($last) {
            $shipper_code = $last->id + 1;
        } else {
            $shipper_code = 1;
        }
        $data = array(
            'page_title' => $page_title,
            'page_description' =>  $page_description,
            'fetch_countrys' => $countrys,
            'fetch_employees' => $employees,
            'fetch_drivers' => $drivers,
            'shipper_code' => $shipper_code,
        );
        return view('admin.shipper.add')->with($data);
    }
    public function save(Request $request)
    {
        // dd($request->all());
        if ($file = $request->hasFile('shipper_image')) {

            $file = $request->file('shipper_image');
            $fileName_img = $file->getClientOriginalName();
            $destinationPath = public_path() . '/shipper_images';
            $file->move($destinationPath, $fileName_img);
        } else {
            $fileName_img = null;
        }

        $shippers = new Shipper;
        $shippers->shipper_code = $request->input('shipper_code');
        $shippers->company_name = $request->input('company_name');
        $shippers->manager_name = $request->input('manager_name');
        $shippers->shipper_email = $request->input('shipper_email');
        $shippers->contact_office_1 = $request->input('contact_office_1');
        $shippers->contact_office_2 = $request->input('contact_office_2');
        $shippers->trade_license_no = $request->input('trade_license_no');
        $shippers->country = $request->input('country');
        $shippers->volumetric_weight = $request->input('volumetric_weight');
        $shippers->city = $request->input('city');
        $shippers->area = $request->input('area');
        $shippers->street_address = $request->input('street_address');
        $shippers->shipper_image = $fileName_img;
        $shippers->employee = $request->input('employee');
        $shippers->driver = $request->input('driver');
        $shippers->user_name = $request->input('user_name');
        $shippers->password = $request->input('password');
        $shippers->confirm_password = $request->input('confirm_password');
        $shippers->status = $request->input('status');
        $shippers->save();

        $users = new User;
        $users->name = $request->input('user_name');
        $users->email = $request->input('shipper_email');
        $users->password = Hash::make($request->input('password'));
        $users->user_status = $request->input('status');
        $users->save();
        return redirect()->back();
    }

    public function edit($id)
    {
        $page_title = 'Edit Shipper';
        $page_description = 'Shipper / Edit Shipper';
        $countrys = DB::table('countrys')->get();
        $citys = DB::table('citys')->get();
        $areas = DB::table('areas')->get();
        $employees = DB::table('employees')->get();
        $drivers = DB::table('drivers')->get();
        $shippers = Shipper::find($id);
        $contact_person = Contactperson::where('shipper_id', $id)->get();
        $shipper_files = ShipperFile::where('shipper_id', $id)->get();
        $data = array(
            'page_title' => $page_title,
            'page_description' =>  $page_description,
            'fetch_countrys' => $countrys,
            'fetch_citys' => $citys,
            'fetch_areas' => $areas,
            'fetch_employees' => $employees,
            'fetch_drivers' => $drivers,
            'shippers' => $shippers,
            'contact_person' => $contact_person,
            'shipper_files' => $shipper_files,
        );
        return view('admin.shipper.edit')->with($data);
    }

    public function update(Request $request)
    {
        $shippers = Shipper::find($request->id);
        if ($file = $request->hasFile('shipper_image')) {
            $destination = '/shipper_images/' . $request->image;
            if (File::exists($destination)) {
                File::delete($destination);
            }
            // dd($destination);
            $file = $request->file('shipper_image');
            $fileName_img = $file->getClientOriginalName();
            $destinationPath = public_path() . '/shipper_images/';
            $file->move($destinationPath, $fileName_img);
            $shippers->shipper_image = $fileName_img;
            // return redirect('/uploadfile');

        }
        $shippers->shipper_code = $request->input('shipper_code');
        $shippers->company_name = $request->input('company_name');
        $shippers->manager_name = $request->input('manager_name');
        $shippers->shipper_email = $request->input('shipper_email');
        $shippers->contact_office_1 = $request->input('contact_office_1');
        $shippers->contact_office_2 = $request->input('contact_office_2');
        $shippers->trade_license_no = $request->input('trade_license_no');
        $shippers->country = $request->input('country');
        $shippers->volumetric_weight = $request->input('volumetric_weight');
        $shippers->city = $request->input('city');
        $shippers->area = $request->input('area');
        $shippers->street_address = $request->input('street_address');
        $fileName_img;
        $shippers->employee = $request->input('employee');
        $shippers->driver = $request->input('driver');
        $shippers->user_name = $request->input('user_name');
        $shippers->password = $request->input('password');
        $shippers->confirm_password = $request->input('confirm_password');
        $shippers->status = $request->input('status');
        $shippers->update();

        $users = User::where('name', 'like', '%' . $request->user_name . '%')->first();
        $users->name = $request->input('user_name');
        $users->email = $request->input('shipper_email');
        $users->password = Hash::make($request->input('password'));
        $users->user_status = $request->input('status');
        $users->update();
        return redirect()->back();
    }

    public function destroy(Request $request)
    {
        $shippers = Shipper::find($request->id);
        if ($shippers) {
            $shippers->delete();
            return response()->json(['message' => 'Record deleted successfully']);
        }
        return response()->json(['message' => 'Record not found'], 404);
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

    public function quick_add(Request $request)
    {
        $shippers = new Shipper;
        $shippers->shipper_code = $request->input('shipper_code');
        $shippers->company_name = $request->input('company_name');
        $shippers->manager_name = $request->input('manager_name');
        $shippers->shipper_email = $request->input('shipper_email');
        $shippers->contact_office_1 = $request->input('contact_office_1');
        $shippers->country = $request->input('country');
        $shippers->volumetric_weight = $request->input('volumetric_weight');
        $shippers->city = $request->input('city');
        $shippers->area = $request->input('area');
        $shippers->street_address = $request->input('street_address');
        $shippers->confirm_password = $request->input('confirm_password');
        $shippers->save();
        return redirect()->back();
    }

}

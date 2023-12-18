<?php

namespace App\Http\Controllers\Admin;

use App\Models\Driver;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Employee;
use App\Models\Zone;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class DriverController extends Controller
{
    public function allDriver(Request $request)
    {
        $page_title = 'View Driver';
        $page_description = 'Driver / AllDriver';
        $drivers =  Driver::join('employees', 'drivers.employee_code', '=', 'employees.id')->select('drivers.*', 'employees.emp_code')->get();
        $employees =  Employee::get();
        $citys = DB::table('citys')->get();
        $zones = Zone::get();
        $last = DB::table('drivers')->latest('id')->first();
        if ($last) {
            $driver_code = $last->id + 1;
        } else {
            $driver_code = 1;
        }
        $data = array(
            'page_title' => $page_title,
            'page_description' =>  $page_description,
            'drivers' => $drivers,
            'driver_code' => $driver_code,
            'fetch_employees' => $employees,
            'fetch_citys' => $citys,
            'fetch_zones' => $zones,
        );
        return view('admin.driver.all_driver')->with($data);
    }

    public function get_name(Request $request)
    {
        $get_data = Employee::where('id', $request->id)->select('emp_first_name', 'emp_middle_name', 'emp_last_name', 'mobile')->first();
        return $get_data;
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

    public function save(Request $request)
    {
        // dd($request->all());
        $drivers = new Driver;
        $drivers->driver_code = $request->input('driver_code');
        $drivers->employee_code = $request->input('employee_code');
        $drivers->employee_name = $request->input('employee_name');
        $drivers->employee_mobile = $request->input('employee_mobile');
        $drivers->city = $request->input('city');
        $drivers->zones = $request->input('zones');
        $drivers->status = $request->input('status');
        $drivers->app_username = $request->input('app_username');
        $drivers->app_password = $request->input('app_password');
        $drivers->app_confirm_password = $request->input('app_confirm_password');
        $drivers->password = Hash::make($request->input('app_confirm_password'));

        $users = User::where('name', 'LIKE', '%' . $request->app_username . '%')->first();
        if ($users && Hash::check($request->app_password, $users->password)) {
            $drivers->save();
            return response()->json(['status' => 'success']);
        } else {
            return response()->json(['status' => 'error']);
        }
    }


    public function edit($id)
    {
        $drivers = Driver::join('employees', 'drivers.employee_code', '=', 'employees.id')
            ->select('drivers.*', 'employees.emp_code', 'employees.emp_first_name')
            ->where('drivers.id', $id)->first();
        return response()->json($drivers);
    }

    public function update(Request $request)
    {
        $drivers = Driver::find($request->id);
        $drivers->driver_code = $request->input('driver_code');
        $drivers->employee_code = $request->input('employee_code');
        $drivers->employee_name = $request->input('employee_name');
        $drivers->employee_mobile = $request->input('employee_mobile');
        $drivers->city = $request->input('city');
        $drivers->zones = $request->input('zones');
        $drivers->app_username = $request->input('app_username');
        $drivers->app_password = $request->input('app_password');
        $drivers->app_confirm_password = $request->input('app_confirm_password');
        $drivers->password = Hash::make($request->input('app_confirm_password'));

        $users = User::where('name', 'LIKE', '%' . $request->app_username . '%')->first();
        if ($users && Hash::check($request->app_password, $users->password)) {
            $drivers->update();
            return response()->json(['status' => 'success']);
        } else {
            return response()->json(['status' => 'error']);
        }
    }

    public function status_update($id)
    {
        //get product status with the help of product ID
        $driver = DB::table('drivers')
            ->select('status')
            ->where('id', '=', $id)
            ->first();

        //Check user status
        if ($driver->status == '1') {
            $status = '0';
        } else {
            $status = '1';
        }

        //update product status
        $values = array('status' => $status);
        DB::table('drivers')->where('id', $id)->update($values);

        session()->flash('msg', ' Status has been changed successfully.');
        return redirect()->back();
    }

    public function destroy(Request $request)
    {
        $drivers = Driver::find($request->id);
        if ($drivers) {
            $drivers->delete();
            return response()->json(['message' => 'Record deleted successfully']);
        }
        return response()->json(['message' => 'Record not found'], 404);
    }
}

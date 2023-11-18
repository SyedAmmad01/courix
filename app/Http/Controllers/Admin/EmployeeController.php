<?php

namespace App\Http\Controllers\Admin;

use App\Models\Employee;
use App\Models\User;
use App\Models\Admin;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Hash;

class EmployeeController extends Controller
{
    public function allEmployees(Request $request)
    {
        $page_title = 'All Employees';
        $page_description = 'Employees / All Employees';
        // $employees = Employee::orderBy('id', 'desc')->get();
        $employees = Employee::join('job_titles', 'employees.job_title', '=', 'job_titles.id')->select('employees.*' , 'job_titles.name')->orderBy('employees.id', 'desc')->get();
        $data = array(
            'page_title' => $page_title,
            'page_description' =>  $page_description,
            'employees' => $employees,
        );
        return view('admin.employee.all_employees')->with($data);
    }

    public function view_employees_details(Request $request, $id)
    {
        $page_title = 'View Employees Details';
        $page_description = 'Employees / View Employees';
        // $employees = Employee::where('id', $id)->first();
        $employees = Employee::leftJoin('job_titles', 'employees.job_title', '=', 'job_titles.id')
        ->leftJoin('employee_status', 'employees.emp_status', '=', 'employee_status.id')
        ->leftJoin('departments', 'employees.department', '=', 'departments.id')
        ->leftJoin('countrys as country', 'employees.country', '=', 'country.id')
        ->leftJoin('countrys as nationality', 'employees.nationality', '=', 'nationality.id')
        ->select('employees.*' , 'job_titles.name As title_name' , 'employee_status.name As status_name' , 'departments.name As department_name' , 'country.name As country_name' , 'nationality.name As nationality_name')
        ->where('employees.id', $id)
        ->first();
        $data = array(
            'page_title' => $page_title,
            'page_description' =>  $page_description,
            'employees' => $employees,
        );
        // dd($data);
        return view('admin.employee.view_employees')->with($data);
    }

    public function addEmployee(Request $request)
    {
        $page_title = 'Add Employee';
        $page_description = '';
        $countrys = DB::table('countrys')->get();
        $job_titles = DB::table('job_titles')->get();
        $departments = DB::table('departments')->get();
        $employee_status = DB::table('employee_status')->get();
        $user_roles = DB::table('user_roles')->get();
        $last = DB::table('employees')->latest('id')->first();
        if ($last) {
            $employee_code = $last->id + 1;
        } else {
            $employee_code = 1;
        }
        $data = array(
            'page_title' => $page_title,
            'fetch_countrys' => $countrys,
            'page_description' =>  $page_description,
            'fetch_job_titles' => $job_titles,
            'fetch_departments' => $departments,
            'fetch_employee_status' => $employee_status,
            'fetch_user_roles' => $user_roles,
            'employee_code' => $employee_code,
        );
        return view('admin.employee.add_employee')->with($data);
    }

    public function save(Request $request)
    {
        // dd($request->all());
        if ($file = $request->hasFile('emp_image')) {

            $file = $request->file('emp_image');
            $fileName_img = $file->getClientOriginalName();
            $destinationPath = public_path() . '/employee_images';
            $file->move($destinationPath, $fileName_img);
        } else {
            $fileName_img = null;
        }

        $employees = new Employee;
        $employees->emp_code = $request->input('emp_code');
        $employees->emp_first_name = $request->input('emp_first_name');
        $employees->emp_middle_name = $request->input('emp_middle_name');
        $employees->emp_last_name = $request->input('emp_last_name');
        $employees->dob = $request->input('dob');
        $employees->marital_status = $request->input('marital_status');
        $employees->gender = $request->input('gender');
        $employees->nationality = $request->input('nationality');
        $employees->passport_number = $request->input('passport_number');
        $employees->passport_expiry_date = $request->input('passport_expiry_date');
        $employees->immigration_status = $request->input('immigration_status');
        $employees->immigration_expiry_date = $request->input('immigration_expiry_date');
        $employees->emirates_id = $request->input('emirates_id');
        $employees->emp_image = $fileName_img;
        $employees->other_id = $request->input('other_id');
        $employees->driving_liscense_no = $request->input('driving_liscense_no');
        $employees->phone = $request->input('phone');
        $employees->mobile = $request->input('mobile');
        $employees->emergency_phone = $request->input('emergency_phone');
        $employees->work_email = $request->input('work_email');
        $employees->private_email = $request->input('private_email');
        $employees->city = $request->input('city');
        $employees->country = $request->input('country');
        $employees->zip_code = $request->input('zip_code');
        $employees->address_line_1 = $request->input('address_line_1');
        $employees->address_line_2 = $request->input('address_line_2');
        $employees->job_title = $request->input('job_title');
        $employees->department = $request->input('department');
        $employees->confirm_date = $request->input('confirm_date');
        $employees->emp_status = $request->input('emp_status');
        $employees->joined_date = $request->input('joined_date');
        $employees->termination_date = $request->input('termination_date');
        $employees->user_name = $request->input('user_name');
        $employees->password = $request->input('password');
        $employees->confirm_password = $request->input('confirm_password');
        $employees->user_role = $request->input('user_role');
        $employees->user_status = $request->input('user_status');
        $employees->save();

        $admins = new Admin;
        $admins->name = $request->input('user_name');
        $admins->email = $request->input('work_email');
        $admins->password = Hash::make($request->input('password'));
        $admins->user_role = $request->input('user_role');
        $admins->user_status = $request->input('user_status');
        $admins->save();
        return redirect()->back();
    }

    public function job_title_save(Request $request)
    {
        DB::table('job_titles')->insert([
            'name' => $request->name,
        ]);
        return redirect()->back();
    }

    public function edit($id)
    {
        $page_title = 'Edit  Employees';
        $page_description = 'Employees / Edit Employees';
        $countrys = DB::table('countrys')->get();
        $job_titles = DB::table('job_titles')->get();
        $departments = DB::table('departments')->get();
        $employee_status = DB::table('employee_status')->get();
        $user_roles = DB::table('user_roles')->get();
        $employees = Employee::find($id);
        $data = array(
            'page_title' => $page_title,
            'page_description' =>  $page_description,
            'employees' => $employees,
            'fetch_countrys' => $countrys,
            'fetch_job_titles' => $job_titles,
            'fetch_departments' => $departments,
            'fetch_employee_status' => $employee_status,
            'fetch_user_roles' => $user_roles,
        );
        return view('admin.employee.edit_employee')->with($data);
    }

    public function update(Request $request)
    {
        $employees = Employee::find($request->id);
        if ($request->hasFile('emp_image')) {
            $destination = '/employee_images/' . $request->image;
            if (File::exists($destination)) {
                File::delete($destination);
            }

            $file = $request->file('emp_image');
            $fileName_img = $file->getClientOriginalName();
            $destinationPath = public_path() . '/employee_images/';
            $file->move($destinationPath, $fileName_img);
            $employees->emp_image = $fileName_img;
        }

        $employees->emp_code = $request->input('emp_code');
        $employees->emp_first_name = $request->input('emp_first_name');
        $employees->emp_middle_name = $request->input('emp_middle_name');
        $employees->emp_last_name = $request->input('emp_last_name');
        $employees->dob = $request->input('dob');
        $employees->marital_status = $request->input('marital_status');
        $employees->gender = $request->input('gender');
        $employees->nationality = $request->input('nationality');
        $employees->passport_number = $request->input('passport_number');
        $employees->passport_expiry_date = $request->input('passport_expiry_date');
        $employees->immigration_status = $request->input('immigration_status');
        $employees->immigration_expiry_date = $request->input('immigration_expiry_date');
        $employees->emirates_id = $request->input('emirates_id');
        $fileName_img;
        $employees->other_id = $request->input('other_id');
        $employees->driving_liscense_no = $request->input('driving_liscense_no');
        $employees->phone = $request->input('phone');
        $employees->mobile = $request->input('mobile');
        $employees->emergency_phone = $request->input('emergency_phone');
        $employees->work_email = $request->input('work_email');
        $employees->private_email = $request->input('private_email');
        $employees->city = $request->input('city');
        $employees->country = $request->input('country');
        $employees->zip_code = $request->input('zip_code');
        $employees->address_line_1 = $request->input('address_line_1');
        $employees->address_line_2 = $request->input('address_line_2');
        $employees->job_title = $request->input('job_title');
        $employees->department = $request->input('department');
        $employees->confirm_date = $request->input('confirm_date');
        $employees->emp_status = $request->input('emp_status');
        $employees->joined_date = $request->input('joined_date');
        $employees->termination_date = $request->input('termination_date');
        $employees->user_name = $request->input('user_name');
        $employees->password = $request->input('password');
        $employees->confirm_password = $request->input('confirm_password');
        $employees->user_role = $request->input('user_role');
        $employees->user_status = $request->input('user_status');
        $employees->update();


        $admins = Admin::where('name', 'like', '%' . $request->user_name . '%')->first();
        $admins->name = $request->input('user_name');
        $admins->email = $request->input('work_email');
        $admins->password = Hash::make($request->input('password'));
        $admins->user_role = $request->input('user_role');
        $admins->user_status = $request->input('user_status');
        $admins->update();
        return redirect()->back();
    }

    public function destroy(Request $request)
    {
        $employees = Employee::find($request->id);
        if ($employees) {
            $employees->delete();
            return response()->json(['message' => 'Record deleted successfully']);
        }
        return response()->json(['message' => 'Record not found'], 404);
    }
}

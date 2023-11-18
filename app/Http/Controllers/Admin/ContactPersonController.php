<?php

namespace App\Http\Controllers\Admin;

use App\Models\ContactPerson;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ContactPersonController extends Controller
{
    public function contact_person_save(Request $request)
    {

        $last = DB::table('shippers')->latest('id')->first();
        if ($last) {
            $shipper_id = $last->id + 1;
        } else {
            $shipper_id = 1;
        }
        $contact_person = new ContactPerson;
        $contact_person->shipper_id = $shipper_id;
        $contact_person->name = $request->input('name');
        $contact_person->designation = $request->input('designation');
        $contact_person->email = $request->input('email');
        $contact_person->contactoffice1 = $request->input('contactoffice1');
        $contact_person->contactoffice2 = $request->input('contactoffice2');

        if ($contact_person->save()) {
            $contact_person->save();
            return response()->json(['status' => 'success']);
        } else {
            return response()->json(['status' => 'error']);
        }
    }

    public function add_get(Request $request)
    {
        $last = DB::table('shippers')->latest('id')->first();
        $contact_person = ContactPerson::latest('shipper_id')->get();
        if ($last) {
            $shipper_code = $last->id + 1;
        } else {
            $shipper_code = 1;
        }
        $get_data = ContactPerson::where('shipper_id', $shipper_code)->get();
        return $get_data;
    }

    public function destroy(Request $request, $id)
    {
        // dd($request->all());
        $contact_person = ContactPerson::find($request->id);
        if ($contact_person) {
            $contact_person->delete();
            return response()->json(['message' => 'Record deleted successfully']);
        }
        return response()->json(['message' => 'Record not found'], 404);
    }

    public function edit_save(Request $request)
    {
        $contact_person = new ContactPerson;
        $contact_person->shipper_id = $request->input('shipper_id');
        $contact_person->name = $request->input('name');
        $contact_person->designation = $request->input('designation');
        $contact_person->email = $request->input('email');
        $contact_person->contactoffice1 = $request->input('contactoffice1');
        $contact_person->contactoffice2 = $request->input('contactoffice2');

        if ($contact_person->save()) {
            $contact_person->save();
            return response()->json(['status' => 'success']);
        } else {
            return response()->json(['status' => 'error']);
        }
    }

    public function get_values(Request $request)
    {
        $get_data = ContactPerson::where('shipper_id', $request->id)->get();
        return $get_data;
    }

    public function edit_values(Request $request)
    {
        $get_data = ContactPerson::where('id', $request->id)->first();
        return $get_data;
    }

    public function update(Request $request)
    {
        $contact_person = ContactPerson::find($request->cp_id);
        $contact_person->shipper_id = $request->input('cp_shipper_id');
        $contact_person->name = $request->input('cp_name');
        $contact_person->designation = $request->input('cp_designation');
        $contact_person->email = $request->input('cp_email');
        $contact_person->contactoffice1 = $request->input('cp_contactoffice1');
        $contact_person->contactoffice2 = $request->input('cp_contactoffice2');

        if ($contact_person->update()) {
            $contact_person->update();
            return response()->json(['status' => 'success']);
        } else {
            return response()->json(['status' => 'error']);
        }
    }
}

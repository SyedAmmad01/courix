<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\OdaRates;
use App\Models\Rate;
use App\Models\Rtos;
use App\Models\Shipper;
use Illuminate\Support\Facades\DB;

class RateController extends Controller
{
    public function rates(Request $request)
    {
        $page_title = 'Shippers City Rate';
        $page_description = 'Shipper / Shippers City Rate';
        $shippers = Shipper::orderBy('id', 'asc')->get();
        $citys = DB::table('citys')->get();
        $data = array(
            'page_title' => $page_title,
            'page_description' =>  $page_description,
            'shippers' => $shippers,
            'fetch_citys' => $citys,
        );
        return view('admin.shipper.rates')->with($data);
    }

    public function rate($id)
    {
        $shippers = Shipper::find($id);
        return response()->json($shippers);
    }

    public function add_rates_all_cities(Request $request)
    {
        $citys = DB::table('citys')->get();
        $city_rate = $request->input('city_rate');
        $weight = $request->input('weight');
        $additional_charges = $request->input('additional_charges');

        foreach ($citys as $city) {
            $existingRate = Rate::where('shipper_id', $request->input('s-id'))
                ->where('city_id', $city->id)
                ->first();

            if ($existingRate) {
                // Update existing rate
                $existingRate->city_rate = $city_rate;
                $existingRate->weight = $weight;
                $existingRate->additional_charges = $additional_charges;
                $existingRate->update();
            } else {
                // Create a new rate
                $rates = new Rate;
                $rates->shipper_id = $request->input('s-id');
                $rates->city_id = $city->id;
                $rates->city_rate = $city_rate;
                $rates->weight = $weight;
                $rates->additional_charges = $additional_charges;
                $rates->save();
            }
        }

        return redirect()->back();
    }

    public function add_rates_city_wise(Request $request)
    {
        $shipper_id = $request->input('s-id');
        $city_id = $request->input('citys');
        $city_rate = $request->input('city_rates');
        $weight = $request->input('city_weight');
        $additional_charges = $request->input('city_additional_charges');

        $existingRate = Rate::where('shipper_id', $shipper_id)
            ->where('city_id', $city_id)
            ->first();

        if ($existingRate) {
            // Update existing rate
            $existingRate->city_rate = $city_rate;
            $existingRate->weight = $weight;
            $existingRate->additional_charges = $additional_charges;
            $existingRate->update();
        } else {
            // Create a new rate
            $rates = new Rate;
            $rates->shipper_id = $shipper_id;
            $rates->city_id = $city_id;
            $rates->city_rate = $city_rate;
            $rates->weight = $weight;
            $rates->additional_charges = $additional_charges;
            $rates->save();
        }

        return redirect()->back();
    }

    public function get_name(Request $request)
    {
        $get_data = Rate::where('shipper_id', $request->input('shipper_id'))
            ->where('city_id', $request->input('city_id'))->select('city_rate', 'weight', 'additional_charges')
            ->first();

        return $get_data;
        // if ($get_data) {
        //     return response()->json($get_data);
        // } else {
        //     return response()->json(['message' => 'Data not found'], 404);
        // }
    }

    public function add_rtos_rate(Request $request)
    {
        $citys = DB::table('citys')->get();
        $shipper_id = $request->input('e-id');
        $city_rate = $request->input('e-city_rto_rate');

        foreach ($citys as $city) {
            $existingRtos = Rtos::where('shipper_id', $shipper_id)
                ->where('city_id', $city->id)
                ->first();

            if ($existingRtos) {
                // Update existing Rtos
                $existingRtos->city_rto_rate = $city_rate;
                $existingRtos->update();
            } else {
                // Create a new Rtos
                $rates = new Rtos;
                $rates->shipper_id = $request->input('e-id');
                $rates->city_id = $city->id;
                $rates->city_rto_rate = $city_rate;
                $rates->save();
            }
        }

        return redirect()->back();
    }

    public function add_rtos_city_wise(Request $request)
    {
        // dd($request->all());
        $shipper_id = $request->input('e-id');
        $city_id = $request->input('e-citys');
        $city_rate = $request->input('e-city_rtos');

        $existingRtos = Rtos::where('shipper_id', $shipper_id)
            ->where('city_id', $city_id)
            ->first();

        if ($existingRtos) {
            // Update existing rate
            $existingRtos->city_id = $city_id;
            $existingRtos->city_rto_rate = $city_rate;
            $existingRtos->update();
        } else {
            // Create a new rate
            $rtos = new Rtos;
            $rtos->shipper_id = $shipper_id;
            $rtos->city_id = $city_id;
            $rtos->city_rto_rate = $city_rate;
            $rtos->save();
        }

        return redirect()->back();
    }

    public function get_rtos_name(Request $request)
    {
        // dd($request->all());
        $get_data = Rtos::where('shipper_id', $request->input('shipper_id'))
            ->where('city_id', $request->input('city_id'))->select('city_rto_rate')
            ->first();

        return $get_data;

        // if ($get_data) {
        //     return response()->json($get_data);
        // } else {
        //     return response()->json(['message' => 'Data not found'], 404);
        // }
    }

    public function oda_rate(Request $request)
    {
        // dd($request->all());
        $citys = DB::table('citys')->get();
        $shipper_id = $request->input('sh-id');
        $city_oda_rate = $request->input('sh-city_oda_rate');

        foreach ($citys as $city) {
            $existingOda = OdaRates::where('shipper_id', $shipper_id)
                ->where('city_id', $city->id)
                ->first();

            if ($existingOda) {
                // Update existing ODA rate
                $existingOda->city_oda_rate = $city_oda_rate;
                $existingOda->update();
            } else {
                // Create a new ODA rate
                $oda = new OdaRates;
                $oda->shipper_id = $request->input('sh-id');
                $oda->city_id = $city->id;
                $oda->city_oda_rate = $city_oda_rate;
                $oda->save();
            }
        }

        return redirect()->back();
    }

    public function add_oda_city_wise(Request $request)
    {
        // dd($request->all());
        $shipper_id = $request->input('sh-id');
        $city_id = $request->input('sh-citys');
        $city_rate = $request->input('sh-city_oda');

        $existingOda = OdaRates::where('shipper_id', $shipper_id)
            ->where('city_id', $city_id)
            ->first();

        if ($existingOda) {
            // Update existing rate
            $existingOda->city_id = $city_id;
            $existingOda->city_oda_rate = $city_rate;
            $existingOda->update();
        } else {
            // Create a new rate
            $oda = new OdaRates;
            $oda->shipper_id = $shipper_id;
            $oda->city_id = $city_id;
            $oda->city_oda_rate = $city_rate;
            $oda->save();
        }

        return redirect()->back();
    }

    public function get_oda_name(Request $request)
    {
        // dd($request->all());
        $get_data = OdaRates::where('shipper_id', $request->input('shipper_id'))
            ->where('city_id', $request->input('city_id'))->select('city_oda_rate')
            ->first();

        return $get_data;

        // if ($get_data) {
        //     return response()->json($get_data);
        // } else {
        //     return response()->json(['message' => 'Data not found'], 404);
        // }
    }
}

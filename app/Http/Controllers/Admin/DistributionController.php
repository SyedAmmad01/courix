<?php

namespace App\Http\Controllers\Admin;

use App\Models\Distribution;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Zone;
use App\Models\Zonearea;
use Illuminate\Support\Facades\DB;

class DistributionController extends Controller
{
    public function zone(Request $request)
    {
        $page_title = 'Zone';
        $page_description = 'Distribution / Zone';
        $citys = DB::table('citys')->get();
        $zones = DB::table('zones')->get();
        $zoneareas = DB::table('zoneareas')->get();
        $data = array(
            'page_title' => $page_title,
            'page_description' => $page_description,
            'fetch_citys' => $citys,
            'fetch_zones' => $zones,
            'fetch_zoneareas' => $zoneareas,
        );
        return view('admin.distribution.zone')->with($data);
    }

    public function zone_save(Request $request)
    {
        $zones = new Zone;
        $zones->city = $request->input('city');
        $zones->zone_name = $request->input('zone_name');
        $zones->save();
        return redirect()->back();
    }


    public function zone_area_save(Request $request)
    {
        $zoneareas = new Zonearea;
        $zoneareas->zone_name = $request->input('zone_name');
        $zoneareas->area_name = $request->input('area_name');
        $zoneareas->save();
        return redirect()->back();
    }

    public function zone_area_update(Request $request)
    {
        $zone_area = Zonearea::where('zone_name', $request->zone_name)
            ->where('area_name', 'like', '%' . $request->area_name . '%')
            ->get();
        foreach ($zone_area as $area) {
            $area->area_name = $request->new_name;
            $area->save();
        }
        return redirect()->back();
    }
}

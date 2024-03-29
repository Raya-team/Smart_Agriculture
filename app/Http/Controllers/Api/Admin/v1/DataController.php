<?php

namespace App\Http\Controllers\Api\Admin\v1;

use App\Http\Controllers\Controller;
use App\Models\Data;
use App\Models\Detail;
use App\Models\Filter;
use App\Models\Sensor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Carbon\Carbon;

class DataController extends Controller
{
    public function store(Request $request)
    {
        $this->DataTable($request);

        $filter = Filter::all(['name', 'id']);
        $sensors = Sensor::all(['serial', 'id']);

        if ($request->Lt && $request->Lg){
            $lat = $request->Lt; $lng = $request->Lg;
        }
        for ($i = 0 ; $i < $filter->count() ; $i++){
            $detail = new Detail();
            $sensor_id = $this->SearchSensors($request, $sensors, $detail);
            if (!$this->SearchSensors($request, $sensors, $detail)){continue;}
            if ($request->Lt && $request->Lg){
                $detail->location = "[{\"lat\":$lat,\"lng\":$lng}]";
            }else{
                $sensor_id = $this->SearchSensors($request, $sensors, $detail);
                $lastLoc = Detail::where('sensor_id', $sensor_id)->get()->last();
                $detail->location = $lastLoc->location;
            }
            $detail->filter_id = $filter[$i]['id'];
            $nameFilter = $filter[$i]['name'];
            if ($request->$nameFilter && $request->$nameFilter != "NAN" && $request->$nameFilter != null){
                $detail->value = $request->$nameFilter;
            } elseif ($request->$nameFilter == "NAN" || $request->$nameFilter == null) {
                $lastVal = Detail::where('sensor_id', $sensor_id)->where('filter_id', $detail->filter_id)->get()->last();
                if ($lastVal){
                    $detail->value = $lastVal->value;
                }else{
                    continue;
                }
            }else{
                continue;
            }
            $detail->save();
        }
        //$rand = rand(1000,9999) . Carbon::now()->microsecond . ".json";
        //Storage::put($rand, json_encode($request->all()));
        return response('Saved',201);
    }

    /**
     * @param Request $request
     * @param $sensors
     * @param $detail
     * @return bool
     */
    public function SearchSensors(Request $request, $sensors, $detail)
    {
        for ($j = 0; $j < $sensors->count(); $j++) {
            if ($sensors[$j]['serial'] == $request->ID) {
                if ($detail->sensor_id = $sensors[$j]['id'])
                {
                    return $sensors[$j]['id'];
                }
            }
        }
    }

    /**
     * @param Request $request
     */
    public function DataTable(Request $request)
    {
// Start TestTable
        $data = new Data();
        $data->data = $request->fullUrl();
        $data->save();
        //End TestTable
    }
}

<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Detail;
use App\Models\Filter;
use Illuminate\Http\Request;
use Morilog\Jalali\Jalalian;
use App\Rules\Security;

class ChartController extends Controller
{
    public function show(Request $request, $sensor)
    {
        $filters = Filter::all();

        if (request()->has('from') && request()->has('to') && request()->has('filter') && request()->has('period')) {
            $validated = $request->validate([
                'filter' => ['required', new Security()],
                'from' => ['required', new Security()],
                'to' => ['required', new Security()],
                'period' => ['required', new Security()]
            ]);
            $filter_selected = Filter::findOrFail($request->filter);
            $from = $this->convertNumbers($request->from);
            $a = Jalalian::fromFormat('Y/m/d', $from)->toCarbon();
            $to = $this->convertNumbers($request->to);
            $b = Jalalian::fromFormat('Y/m/d', $to)->toCarbon();
            switch ($request->period){
                case 'h' :
                    $details = $this->Hourly($request, $sensor, $a, $b);
                    break;
                case 'd' :
                    $details = $this->Daily($request, $sensor, $a, $b);
                    break;
                case 'm' :
                    $details = $this->Monthly($request, $sensor, $a, $b);
                    break;
                case 'y' :
                    $details = $this->Yearly($request, $sensor, $a, $b);
                    break;
                default :
                    $data = [];
                    $date = [];
                    $data = json_encode($data);
                    $date = json_encode($date);
                    return view('admin.chart.index', compact(['filters', 'filter_selected', 'sensor', 'data', 'date']));
            }

            $data = [];
            $date = [];
            foreach ($details as $key => $value){
                $detail = collect($value);
                $avg = round($detail->avg('value'),2);
                array_push($data, ["$key", $avg]);
                array_push($date, "$key");
            }
            $data = json_encode($data);
            $date = json_encode($date);

        }else {
            $filter_selected = null;
            $data = [];
            $date = [];
            $data = json_encode($data);
            $date = json_encode($date);
        }
//        return $request;


        return view('user.chart.index', compact(['filters', 'filter_selected', 'sensor', 'data', 'date']));
    }
    public function convertNumbers($srting,$toPersian=true)
    {
        $en_num = array('0','1','2','3','4','5','6','7','8','9','/');
        $fa_num = array('۰','۱','۲','۳','۴','۵','۶','۷','۸','۹','/');
        if( $toPersian ) return str_replace($fa_num, $en_num, $srting);
        else return str_replace($en_num, $fa_num, $srting);
    }
    /**
     * @param Request $request
     * @param $sensor
     * @param $a
     * @param $b
     * @return mixed
     */
    public function Daily(Request $request, $sensor, $a, $b)
    {
        $details = Detail::
        where('sensor_id', $sensor)->
        where('filter_id', $request->filter)->
        whereBetween('created_at', [$a, $b])->get(['id', 'value', 'created_at'])
            ->groupBy(function ($data) {
                return Jalalian::forge($data->created_at)->format('Y/m/d');
            });
        return $details;
    }

    /**
     * @param Request $request
     * @param $sensor
     * @param $a
     * @param $b
     * @return mixed
     */
    public function Monthly(Request $request, $sensor, $a, $b)
    {
        $details = Detail::
        where('sensor_id', $sensor)->
        where('filter_id', $request->filter)->
        whereBetween('created_at', [$a, $b])->get(['id', 'value', 'created_at'])
            ->groupBy(function ($data) {
                return Jalalian::forge($data->created_at)->format('Y/m');
            });
        return $details;
    }

    /**
     * @param Request $request
     * @param $sensor
     * @param $a
     * @param $b
     * @return mixed
     */
    public function Yearly(Request $request, $sensor, $a, $b)
    {
        $details = Detail::
        where('sensor_id', $sensor)->
        where('filter_id', $request->filter)->
        whereBetween('created_at', [$a, $b])->get(['id', 'value', 'created_at'])
            ->groupBy(function ($data) {
                return Jalalian::forge($data->created_at)->format('Y');
            });
        return $details;
    }

    /**
     * @param Request $request
     * @param $sensor
     * @param $a
     * @param $b
     * @return mixed
     */
    public function Hourly(Request $request, $sensor, $a, $b)
    {
        $details = Detail::
        where('sensor_id', $sensor)->
        where('filter_id', $request->filter)->
        whereBetween('created_at', [$a, $b])->get(['id', 'value', 'created_at'])
            ->groupBy(function ($data) {
                return Jalalian::forge($data->created_at)->format('Y/m/d H');
            });
        return $details;
    }
}

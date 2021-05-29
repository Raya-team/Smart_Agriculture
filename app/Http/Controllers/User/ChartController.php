<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Detail;
use App\Models\Filter;
use Illuminate\Http\Request;
use Morilog\Jalali\Jalalian;

class ChartController extends Controller
{
    public function show(Request $request, $sensor)
    {
        if (request()->has('from') && request()->has('to')) {
            $from = $this->convertNumbers($request->from);
            $a = Jalalian::fromFormat('Y/m/d', $from)->toCarbon();
            $to = $this->convertNumbers($request->to);
            $b = Jalalian::fromFormat('Y/m/d', $to)->toCarbon();
            $details = Detail::
            where('sensor_id', $sensor)->
            whereBetween('created_at' , [$a, $b])->get();
        }else{
            $details = Detail::where('sensor_id', $sensor)->get();
        }
        $filters = Filter::all();
        return view('user.chart.index', compact(['filters','details','sensor']));
    }
    public function convertNumbers($srting,$toPersian=true)
    {
        $en_num = array('0','1','2','3','4','5','6','7','8','9','/');
        $fa_num = array('۰','۱','۲','۳','۴','۵','۶','۷','۸','۹','/');
        if( $toPersian ) return str_replace($fa_num, $en_num, $srting);
        else return str_replace($en_num, $fa_num, $srting);
    }
}

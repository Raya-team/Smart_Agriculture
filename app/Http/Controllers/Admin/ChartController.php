<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Detail;
use App\Models\Filter;
use App\Models\Land;
use App\Models\Sensor;
use App\Rules\Security;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Morilog\Jalali\Jalalian;

class ChartController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request,$sensor)
    {
        if (request()->has('from') && request()->has('to') && request()->has('filter') && request()->has('period')) {
            $validated = $request->validate([
                'filter' => ['required', new Security()],
                'from' => ['required', new Security()],
                'to' => ['required', new Security()],
                'period' => ['required', new Security()]
            ]);
            $from = $this->convertNumbers($request->from);
            $a = Jalalian::fromFormat('Y/m/d', $from)->toCarbon();
            $to = $this->convertNumbers($request->to);
            $b = Jalalian::fromFormat('Y/m/d', $to)->toCarbon();
            $details = Detail::
            where('sensor_id', $sensor)->
            where('filter_id', $request->filter_id)->
            whereBetween('created_at' , [$a, $b])->get();
        }else
        {
            $details = null;
        }
        $filters = Filter::all();
        return view('admin.chart.index', compact(['filters','details','sensor']));
    }
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function convertNumbers($srting,$toPersian=true)
    {
        $en_num = array('0','1','2','3','4','5','6','7','8','9','/');
        $fa_num = array('۰','۱','۲','۳','۴','۵','۶','۷','۸','۹','/');
        if( $toPersian ) return str_replace($fa_num, $en_num, $srting);
        else return str_replace($en_num, $fa_num, $srting);
    }
}

<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\EditFilterRequst;
use App\Http\Requests\FilterRequest;
use App\Models\Filter;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class FilterController extends Controller
{
    /*
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $filters = Filter::all();
        return view('admin.filters.index', compact('filters'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.filters.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param FilterRequest $request
     * @param Filter $filter
     * @return \Illuminate\Http\Response
     */
    public function store(FilterRequest $request, Filter $filter)
    {
//        $color_num =  json_decode($request->colors);

//        if(count($color_num) == 5)
//        {
            $filter->name = $request->input('name');
            $filter->nickname = $request->input('nickname');
            $filter->index = $request->input('index');
//            $filter->min = $request->input('minimum');
//            $filter->max = $request->input('maximum');
//            $filter->colors = $request->input('colors');
            $filter->save();
            alert()->success('فیلتر با موفقیت ایجاد شد');
            return redirect(route('filters.index'));
//        } else {
//            Session::flash('colors', 'تعداد رنگ ها باید 5 تا باشد.');
//            return back();
//        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Filter $filter)
    {
        return view('admin.filters.edit',compact('filter'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(EditFilterRequst $request, Filter $filter)
    {
//        $color_num =  json_decode($request->colors);

//        if(count($color_num) == 5) {
            $filter->name = $request->input('name');
            $filter->nickname = $request->input('nickname');
            $filter->index = $request->input('index');
//            $filter->min = $request->input('min');
//            $filter->max = $request->input('max');
//            $filter->colors = $request->input('colors');
            $filter->save();
            alert()->success('فیلتر با موفقیت ویرایش شد');
            return redirect(route('filters.index'));
//        } else {
//            Session::flash('colors', 'تعداد رنگ ها باید 5 تا باشد.');
//            return back();
//        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Filter $filter
     * @return \Illuminate\Http\Response
     * @throws \Exception
     */
    public function destroy(Filter $filter)
    {
        $filter->delete();
        alert()->success('فیلتر با موفقیت حذف شد');
        return back();
    }
}

<?php

namespace App\Http\Controllers\Admin;

use App\Discount;
use App\Http\Controllers\Controller;
use Carbon\Carbon;
use Illuminate\Http\Request;

class DiscountController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.discounts.index')->withDiscounts(Discount::all());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.discounts.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'code'  => 'required|unique:discounts',
            'value' => 'required',
            'start' => 'required',
            'end'   => 'required'
        ]);

        $start_date = Carbon::createFromFormat("d M Y", $request->start)->startOfDay()->toDateTimeString();
        $end_date   = Carbon::createFromFormat("d M Y", $request->end)->endOfDay()->toDateTimeString();

        Discount::create([
            'code'  => $request->code,
            'value' => $request->value,
            'start' => $start_date,
            'end'   => $end_date
        ]);

        session()->flash('success', 'Discount Created Successfully');
        return redirect('/admin/discounts');
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
     * @param Discount $discount
     * @return \Illuminate\Http\Response
     */
    public function edit(Discount $discount)
    {
        return view('admin.discounts.edit', [
            'discount' => $discount
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param Discount $discount
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Discount $discount)
    {
        $request->validate([
            'code'  => 'required',
            'value' => 'required',
            'start' => 'required',
            'end'   => 'required'
        ]);

        $start_date = Carbon::createFromFormat("d M Y", $request->start)->startOfDay()->toDateTimeString();
        $end_date   = Carbon::createFromFormat("d M Y", $request->end)->endOfDay()->toDateTimeString();

        $discount->update([
            'code'  => $request->code,
            'value' => $request->value,
            'start' => $start_date,
            'end'   => $end_date
        ]);

        session()->flash('success', 'Discount Updated Successfully');
        return redirect('/admin/discounts/'. $discount->id . '/edit');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Discount $discount
     * @return \Illuminate\Http\Response
     * @throws \Exception
     */
    public function destroy(Discount $discount)
    {
        $discount->delete();

        session()->flash('success', 'Discount Deleted Successfully');
        return redirect('/admin/discounts');
    }
}

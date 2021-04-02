<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Meta;
use Illuminate\Http\Request;

class MetasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $metas = Meta::all();

        return view('admin.metas.index', [
            'metas' => $metas
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.metas.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Meta::create([
            'title'  => $request->title,
            'url'  => $request->url,
            'description'  => $request->description
        ]);

        session()->flash('success', 'Page Created Successfully.');
        return redirect('/admin/meta/seo');
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
     * @param Meta $seo
     * @return \Illuminate\Http\Response
     */
    public function edit(Meta $seo)
    {
        return view('admin.metas.edit', [
            'data' => $seo
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Meta $seo)
    {
        $seo->update([
            'title'  => $request->title,
            'url'  => $request->url,
            'description'  => $request->description
        ]);

        session()->flash('success', "{$seo->url} Updated Successfully.");
        return redirect('/admin/meta/seo');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Meta $seo
     * @return \Illuminate\Http\Response
     * @throws \Exception
     */
    public function destroy(Meta $seo)
    {
        $seo->delete();

        session()->flash('success', 'Page Meta Removed.');
        return redirect('/admin/meta/seo');
    }
}

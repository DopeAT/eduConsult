<?php

namespace App\Http\Controllers\Admin;

use App\Exports\NewsletterExport;
use App\Http\Controllers\Controller;
use App\Newsletter;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class NewsletterController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $newsletter = Newsletter::all();

        DB::table('newsletter')->where('is_new', '=', 1)->update(array('is_new' => 0));

        return view('admin.newsletter.index')->withData($newsletter);
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
     * @param Newsletter $newsletter
     * @return \Illuminate\Http\Response
     * @throws \Exception
     */
    public function destroy(Newsletter $newsletter)
    {
        $newsletter->delete();

        session()->flash('success', 'User Deleted!');
        return redirect('/admin/newsletter');
    }

    public function export(Request $request)
    {
        return (new NewsletterExport($request))->download('newsletter.xlsx');
    }
}

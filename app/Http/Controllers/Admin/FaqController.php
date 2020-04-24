<?php

namespace App\Http\Controllers\Admin;

use App\Faq;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class FaqController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $faqs = Faq::all();

        return view('admin.faqs.index')->withFaqs($faqs);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.faqs.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request)
    {

        $rules = [
            'question' => 'required',
            'answer'   => 'required'
        ];

        $request->validate($rules);

        Faq::create([
            'question' => $request->question,
            'answer'   => $request->answer
        ]);

        session()->flash('success', 'FAQ Added Successfully!');
        return redirect('/admin/faqs');
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
     * @param Faq $faq
     * @return \Illuminate\Http\Response
     */
    public function edit(Faq $faq)
    {
        return view('admin.faqs.edit')->withFaq($faq);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Faq $faq)
    {
        $rules = [
            'question' => 'required',
            'answer'   => 'required'
        ];

        $request->validate($rules);

        $faq->update([
            'question' => $request->question,
            'answer'   => $request->answer
        ]);

        session()->flash('success', 'FAQ Updated Successfully!');
        return redirect('/admin/faqs/' . $faq->id . '/edit');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Faq $faq
     * @return \Illuminate\Http\Response
     * @throws \Exception
     */
    public function destroy(Faq $faq)
    {
        $faq->delete();

        session()->flash('success', 'FAQ Deleted!');
        return redirect('/admin/faqs');
    }
}

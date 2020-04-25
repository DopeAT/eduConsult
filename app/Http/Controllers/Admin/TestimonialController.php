<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Testimonial;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class TestimonialController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $testimonials = Testimonial::all();

        return view('admin.testimonials.index', [
            'data' => $testimonials
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.testimonials.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $new_image = '';
        $testimonialsFolder = public_path().'/images/testimonials';

        if(!file_exists($testimonialsFolder)) {
            File::makeDirectory($testimonialsFolder, 0777, true, true);
        }

        if($request->hasFile('image')){

            $request->validate(['image' => 'image|mimes:jpeg,png,jpg',]);
            $image  = $request->file('image');
            $name   = 'testimonial_'.time();
            $new_image = $name. '.' . $image->getClientOriginalExtension();

            // Upload image
            $request->image->move($testimonialsFolder, $new_image);
        }

        Testimonial::create([
            'name'    => $request->name,
            'role'    => $request->role,
            'stars'   => $request->stars,
            'message' => $request->message,
            'image'   => $new_image
        ]);

        session()->flash('success', 'Testimonial Created Successfully.');
        return redirect('/admin/testimonials');
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
     * @param Testimonial $testimonial
     * @return \Illuminate\Http\Response
     */
    public function edit(Testimonial $testimonial)
    {
        return view('admin.testimonials.edit', [
            'data' => $testimonial
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Testimonial $testimonial)
    {
        $image = $testimonial->image;
        $testimonialsFolder = public_path().'/images/testimonials';

        if($request->hasFile('image')){

            $request->validate(['image' => 'image|mimes:jpeg,png,jpg',]);
            $image  = $request->file('image');
            $name   = 'testimonial_'.time();
            $new_image = $name. '.' . $image->getClientOriginalExtension();

            // Upload image
            $request->image->move($testimonialsFolder, $new_image);

            // remove old image
            File::delete($testimonialsFolder.'/'.$image);

            $image = $new_image;
        }

        $testimonial->update([
            'name'    => $request->name,
            'role'    => $request->role,
            'stars'   => $request->stars,
            'message' => $request->message,
            'image'   => $image
        ]);

        session()->flash('success', 'Testimonial Updated.');
        return redirect('/admin/testimonials');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Testimonial $testimonial)
    {
        $testimonial->delete();

        session()->flash('success', 'Testimonial Removed.');
        return redirect('/admin/testimonials');
    }
}

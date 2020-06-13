<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Service;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class ServiceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $services = Service::all();

        return view('admin.services.index', [
            'data' => $services
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.services.create');
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
        $servicesFolder = public_path().'/images/services';

        if(!file_exists($servicesFolder)) {
            File::makeDirectory($servicesFolder, 0777, true, true);
        }

        if($request->hasFile('image')){

            $request->validate(['image' => 'image|mimes:jpeg,png,jpg',]);
            $image  = $request->file('image');
            $name   = 'service_'.time();
            $new_image = $name. '.' . $image->getClientOriginalExtension();

            // Upload image
            $request->image->move($servicesFolder, $new_image);
        }

        Service::create([
            'name'    => $request->name,
            'slug'    => slug($request->name),
            'intro'   => $request->intro,
            'description' => $request->description,
            'title' => '',
            'meta'  => '',
            'header_image'   => $new_image
        ]);

        session()->flash('success', 'Service Created Successfully.');
        return redirect('/admin/services');
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
     * @param Service $service
     * @return \Illuminate\Http\Response
     */
    public function edit(Service $service)
    {
        return view('admin.services.edit', [
            'data' => $service
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param Service $service
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Service $service)
    {
        $image = $service->header_image;
        $servicesFolder = public_path().'/images/services';

        if($request->hasFile('image')){

            $request->validate(['image' => 'image|mimes:jpeg,png,jpg',]);
            $image  = $request->file('image');
            $name   = 'service_'.time();
            $new_image = $name. '.' . $image->getClientOriginalExtension();

            // Upload image
            $request->image->move($servicesFolder, $new_image);

            // remove old image
            File::delete($servicesFolder.'/'.$image);

            $image = $new_image;
        }

        $service->update([
            'name'    => $request->name,
            'intro'   => $request->intro,
            'description' => $request->description,
            'title' => '',
            'meta'  => '',
            'header_image' => $image
        ]);

        session()->flash('success', 'Service Updated.');
        return redirect('/admin/services');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Service $service
     * @return \Illuminate\Http\Response
     * @throws \Exception
     */
    public function destroy(Service $service)
    {
        $service->delete();

        session()->flash('success', 'Service Removed.');
        return redirect('/admin/services');
    }
}

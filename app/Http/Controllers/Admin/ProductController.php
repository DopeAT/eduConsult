<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Product;
use App\Service;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Product::all();

        return view('admin.products.index', [
            'data' => $products
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $services = Service::all();

        return view('admin.products.create', [
            'services' => $services
        ]);
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
        $productsFolder = public_path().'/images/products';

        if(!file_exists($productsFolder)) {
            File::makeDirectory($productsFolder, 0777, true, true);
        }

        if($request->hasFile('image')){

            $request->validate(['image' => 'image|mimes:jpeg,png,jpg',]);
            $image  = $request->file('image');
            $name   = 'product_'.time();
            $new_image = $name. '.' . $image->getClientOriginalExtension();

            // Upload image
            $request->image->move($productsFolder, $new_image);
        }

        $priceNew = $request->new;
        $priceEdit = isset($request->edit) ? $priceNew : $request->edit;

        Product::create([
            'name'  => $request->name,
            'slug'  => slug($request->name),
            'intro' => $request->intro,
            'body'  => $request->body,
            'title' => '',
            'meta'  => '',
            'header_image' => $new_image,
            'service_id'   => $request->service_id,
            'new'   => $priceNew,
            'edit'  => $priceEdit,
        ]);

        session()->flash('success', 'Product Created Successfully.');
        return redirect('/admin/products');
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
     * @param Product $product
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
        $services = Service::all();

        return view('admin.products.edit', [
            'data' => $product,
            'services' => $services
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Product $product)
    {
        $image = $product->image;
        $productsFolder = public_path().'/images/products';

        if($request->hasFile('image')){

            $request->validate(['image' => 'image|mimes:jpeg,png,jpg',]);
            $image  = $request->file('image');
            $name   = 'product_'.time();
            $new_image = $name. '.' . $image->getClientOriginalExtension();

            // Upload image
            $request->image->move($productsFolder, $new_image);

            // remove old image
            File::delete($productsFolder.'/'.$image);

            $image = $new_image;
        }

        $priceNew = $request->new;
        $priceEdit = isset($request->edit) ? $priceNew : $request->edit;

        $product->update([
            'name'  => $request->name,
            'slug'  => slug($request->name),
            'intro' => $request->intro,
            'body'  => $request->body,
            'title' => '',
            'meta'  => '',
            'header_image' => $image,
            'service_id'   => $request->service_id,
            'new'   => $priceNew,
            'edit'  => $priceEdit,
        ]);

        session()->flash('success', 'Product Updated.');
        return redirect('/admin/products');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Product $product
     * @return \Illuminate\Http\Response
     * @throws \Exception
     */
    public function destroy(Product $product)
    {
        $product->delete();

        session()->flash('success', 'Product Removed.');
        return redirect('/admin/products');
    }
}

<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Page;
use Illuminate\Http\Request;

class PagesController extends Controller
{

    public function index()
    {
        $pages = Page::all();

        return view('admin.pages.index', [
            'pages' => $pages
        ]);
    }

    public function create()
    {
        return view('admin.pages.create');
    }

    public function store(Request $request)
    {
        Page::create([
            'title'  => $request->title,
            'slug'  => slug($request->title),
            'body'  => $request->body
        ]);

        session()->flash('success', 'Page Created Successfully.');
        return redirect('/admin/pages');
    }

    public function show($id)
    {
        //
    }

    public function edit(Page $page)
    {
        return view('admin.pages.edit', [
            'data' => $page
        ]);
    }

    public function update(Request $request, Page $page)
    {
        $page->update([
            'title'  => $request->title,
            'slug'  => slug($request->title),
            'body'  => $request->body
        ]);

        session()->flash('success', "{$page->title} Updated Successfully.");
        return redirect('/admin/pages');
    }

    public function destroy($id)
    {
        //
    }
}

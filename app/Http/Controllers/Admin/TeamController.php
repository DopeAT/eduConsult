<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Team;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class TeamController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.team.index', [
            'team' => Team::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.team.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $new_image  = '';
        $teamFolder = public_path().'/images/team';

        if(!file_exists($teamFolder)) {
            File::makeDirectory($teamFolder, 0777, true, true);
        }

        if($request->hasFile('image')){

            $request->validate(['image' => 'image|mimes:jpeg,png,jpg',]);
            $image  = $request->file('image');
            $name   = 'team_member_'.time();
            $new_image = $name. '.' . $image->getClientOriginalExtension();

            // Upload image
            $request->image->move($teamFolder, $new_image);
        }

        Team::create([
            'name'       => $request->name,
            'profession' => $request->profession,
            'email'      => $request->email,
            'text'       => $request->text,
            'image'      => $new_image
        ]);

        session()->flash('success', 'Member Created Successfully.');
        return redirect('/admin/team');
    }

    /**
     * Display the specified resource.
     *
     * @param Team $team
     * @return void
     */
    public function show(Team $team)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Team $team
     * @return \Illuminate\Http\Response
     */
    public function edit(Team $team)
    {
        return view('admin.team.edit', [
            'member' => $team
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param Team $team
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Team $team)
    {
        $image = $team->image;
        $teamFolder = public_path().'/images/team';

        if($request->hasFile('image')){

            $request->validate(['image' => 'image|mimes:jpeg,png,jpg',]);
            $image  = $request->file('image');
            $name   = 'team_member_'.time();
            $new_image = $name. '.' . $image->getClientOriginalExtension();

            // Upload image
            $request->image->move($teamFolder, $new_image);

            // remove old image
            File::delete($teamFolder.'/'.$image);

            $image = $new_image;
        }

        $team->update([
            'name'       => $request->name,
            'profession' => $request->profession,
            'email'      => $request->email,
            'text'       => $request->text,
            'image'      => $image
        ]);

        session()->flash('success', 'Member Updated.');
        return redirect('/admin/team');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Team $team
     * @return \Illuminate\Http\Response
     * @throws \Exception
     */
    public function destroy(Team $team)
    {
        $team->delete();

        session()->flash('success', 'Member Removed.');
        return redirect('/admin/team');
    }
}

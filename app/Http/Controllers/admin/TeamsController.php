<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Admin\JobTitle;
use App\Models\Admin\Team;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Gate;


class TeamsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        Gate::authorize('teams');

        $teams = Team::paginate();
        return view('admin.teams.index',[
            'teams' => $teams,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        Gate::authorize('teams.create');

        $jobtitle = JobTitle::get();
        return view('admin.teams.create', [
            'team' => new Team(),
            'jobtitle' => $jobtitle,
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
        Gate::authorize('teams.create');

        $request->validate([
            'name'=>'required|max:255',
            'image' =>'nullable|mimes:jpg,jpeg,bmp,png|max:1024000'
        ]);
        
        $data = $request->except('image');

        $image = $request->file('image');

        if($image && $image->isValid()){
            $data['image']= $image->store('teams','public');
        }

        $team=Team::create($data);

        return redirect()->route('admin.teams.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        Gate::authorize('teams');

        $team = Team::findOrFail($id);

        return view('admin.teams.show', [
            'team' => $team,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        Gate::authorize('teams.edit');

        $jobtitle = JobTitle::get();
        $team = Team::findOrFail($id);
        return view('admin.teams.edit', [
            'team' => $team,
            'jobtitle' => $jobtitle
        ]);
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
        Gate::authorize('teams.edit');

        $team = Team::findOrFail($id);
        $request->validate([
            'name'=>'required|max:255',
            'image' =>'nullable|mimes:jpg,jpeg,bmp,png|max:1024000'
        ]);
        $old_image= $team->image;

        $data = $request->except('image');

        $image = $request->file('image');

        if($image && $image->isValid()){
            $data['image']= $image->store('teams','public');
        }
        $team->update($data);

        if($old_image && isset($date['image']))
        {
            Storage::disk('public')->delete($old_image);
        }
        return redirect()
        ->route('admin.teams.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Gate::authorize('teams.delete');
        $team = Team::findOrFail($id);
        $team->delete();
        if($team->image)
        {
            Storage::disk('public')->delete($team->image);
        }
        return redirect()
        ->route('admin.team.index');
    }
}

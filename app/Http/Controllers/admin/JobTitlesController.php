<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Admin\JobTitle;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;


class JobTitlesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        Gate::authorize('jobs');
        $jobtitles = JobTitle::paginate();
        return view('admin.jobtitles.index',[
            'jobtitles' => $jobtitles,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        Gate::authorize('jobs.create');
        return view('admin.jobtitles.create', [
            'jobtitle' => new JobTitle(),
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
        Gate::authorize('jobs.create');
        $request->validate([
            'job_title'=>'required|max:255',
        ]);
        $jobtitle = JobTitle::create( $request->all() );
        return redirect()->route('admin.jobtitles.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        Gate::authorize('jobs');
        $jobtitle = JobTitle::findOrFail($id);
        return view('admin.jobtitles.show', [
            'jobtitle' => $jobtitle,
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
        Gate::authorize('jobs.edit');
        $jobtitle = JobTitle::findOrFail($id);
        return view('admin.jobtitles.edit', [
            'jobtitle' => $jobtitle,
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
        Gate::authorize('jobs.edit');
        $jobtitle = JobTitle::findOrFail($id);
        $request->validate([
            'job_title'=>'required|max:255',
        ]);
        $jobtitle->update( $request->all() );
        return redirect()->route('admin.jobtitles.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Gate::authorize('jobs.delete');
        $jobtitle = JobTitle::findOrFail($id);
        $jobtitle->delete();
        return redirect()
        ->route('admin.jobtitles.index');
    }
}

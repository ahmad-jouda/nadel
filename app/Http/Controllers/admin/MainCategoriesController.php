<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Admin\MainCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Gate;


class MainCategoriesController extends Controller
{
    /*public function __construct()
    {
        $this->middleware('auth')->only('index');
        $this->middleware(UserType::class);
    }*/
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        Gate::authorize('maincategories');

        $maincategories = MainCategory::paginate();
        
        return view('admin.maincategories.index',[
            'maincategories' => $maincategories,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        Gate::authorize('maincategories.create');

        return view('admin.maincategories.create', [
            'maincategory' => new MainCategory(),
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
        Gate::authorize('maincategories.create');

        $request->validate([
            'name'=>'required|max:255',
            'image' =>'nullable|mimes:jpg,jpeg,bmp,png|max:1024000'
        ]);
        
        $data = $request->except('image');

        $image = $request->file('image');

        if($image && $image->isValid()){
            $data['image']= $image->store('mainCategories','public');
        }

        $data['user_id'] = Auth::id();

        $maincategory=MainCategory::create($data);

        return redirect()->route('admin.maincategories.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        Gate::authorize('maincategories');
        $maincategory = MainCategory::findOrFail($id);
    
        return view('admin.maincategories.show', [
            'maincategory' => $maincategory,
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
        Gate::authorize('maincategories.edit');
        $maincategory = MainCategory::findOrFail($id);
       
        return view('admin.maincategories.edit', [
            'maincategory' => $maincategory,
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
        Gate::authorize('maincategories.edit');

        $maincategory = MainCategory::findOrFail($id);
        $request->validate([
            'name'=>'required|max:255',
            'image' =>'nullable|mimes:jpg,jpeg,bmp,png|max:1024000'
        ]);
        $old_image= $maincategory->image;

        $data = $request->except('image');

        $image = $request->file('image');

        if($image && $image->isValid()){
            $data['image']= $image->store('mainCategories','public');
        }
        $maincategory->update($data);

        if($old_image && isset($date['image']))
        {
            Storage::disk('public')->delete($old_image);
        }
        return redirect()
        ->route('admin.maincategories.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Gate::authorize('maincategories.delete');
        $maincategory = MainCategory::findOrFail($id);
        $maincategory->delete();
        if($maincategory->image)
        {
            Storage::disk('public')->delete($maincategory->image);
        }
        return redirect()
        ->route('admin.maincategories.index');
    }
    

}

<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Admin\MainCategory;
use App\Models\Admin\Meal;
use App\Models\Admin\SubCategory;
use App\Models\Admin\Tag;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Gate;

class MealsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        Gate::authorize('meals');

        $meals = Meal::paginate();
        return view('admin.meals.index',[
            'meals' => $meals,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        Gate::authorize('meals.create');

        $maincategory = MainCategory::get();
        $subcategory = SubCategory::get();
        $tags = Tag::all();
        return view('admin.meals.create', [
            'subcategory' => $subcategory,
            'maincategory' => $maincategory,
            'meal' => new Meal,
            'tags' => $tags,
            'meal_tags' => ''
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
        Gate::authorize('meals.create');

        $request->validate([
            'name'=>'required|max:255',
            'image' =>'nullable|mimes:jpg,jpeg,bmp,png|max:1024000'
        ]);
        
        $data = $request->except('image');

        $image = $request->file('image');

        if($image && $image->isValid()){
            $data['image']= $image->store('meals','public');
        }

        $data['user_id'] = Auth::id();
        
        $meal=Meal::create($data);
        $this->saveTags($meal, $request);
        return redirect()->route('admin.meals.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        Gate::authorize('meals');
        $meal = Meal::findOrFail($id);

        return view('admin.meals.show', [
            'meal' => $meal,
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
        Gate::authorize('meals.edit');

        $meal = Meal::findOrFail($id);

        $subcategory = SubCategory::get();

        $maincategory = MainCategory::get();

        $tags = Tag::all();

        $meal_tags = implode( ', ', $meal->tags->pluck('name')->toArray() );

        return view('admin.meals.edit', [
            'meal' => $meal,
            'subcategory' => $subcategory,
            'maincategory' =>$maincategory,
            'tags' => $tags,
            'meal_tags' => $meal_tags,
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
        Gate::authorize('meals.edit');

        $meal = Meal::findOrFail($id);
        $request->validate([
            'name'=>'required|max:255',
            'image' =>'nullable|mimes:jpg,jpeg,bmp,png|max:1024000'
        ]);
        $old_image= $meal->image;

        $data = $request->except('image');
        
        $tags = $request->post('tags', []);

        $image = $request->file('image');

        if($image && $image->isValid()){
            $data['image']= $image->store('meals','public');
        }
        $meal->update($data);

        $this->saveTags($meal, $request);

        if($old_image && isset($date['image']))
        {
            Storage::disk('public')->delete($old_image);
        }
        return redirect()
        ->route('admin.meals.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Gate::authorize('meals.delete');

        $meal = Meal::findOrFail($id);
        $meal->delete();
        if($meal->image)
        {
            Storage::disk('public')->delete($meal->image);
        }
        return redirect()
        ->route('admin.meals.index');
    }

    protected function saveTags(Meal $meal, Request $request)
    {
        $tags = explode(',',  $request->post('tags'));

        $tag_ids = [];

        foreach ($tags as $name) {
            $name = strtolower(trim($name));
            $tag = Tag::where('name', $name)->first();
            if (!$tag) {
                $tag = Tag::create([
                    'name' => $name
                ]);
            }
            $tag_ids[] = $tag->id;
        }

        $meal->tags()->sync($tag_ids);
    }
}

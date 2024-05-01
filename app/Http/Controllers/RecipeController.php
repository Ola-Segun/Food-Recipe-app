<?php

namespace App\Http\Controllers;

use App\Models\Recipe;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use App\Http\Requests\RecipeFormRequest;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Validator;

class RecipeController extends Controller
{
    public function index()
    {
        return view('frontend.index',[
            'recipes' => Recipe::latest()->paginate(6)
        ]);
    } 

    public function show($id)
    {
        return view('frontend.show', [
            'recipe' => Recipe::find($id)
        ]);
    }

    public function create()
    {
        return view('frontend.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'recipe_name' => 'required',
            // 'slug' => 'required',
            'description' => 'required',
            'recipe_image' => 'nullable|image|mimes:jpeg,png,jpg,gif',
            'small_details' => 'required',
            'avg_cooking_time' => 'required',
            'ingredients' => 'required',
            'tools_needed' => 'required',
            'procedures' => 'required',
            'is_active' => 'sometimes',
        ]);
        
        $filename = '';
        $path = 'uploads/recipe_image/';

        if($request->has('recipe_image')){

            $file = $request->file('recipe_image');
            $extension = $file->getClientOriginalExtension();
            
            $filename = time().'.'.$extension;

            // dd($filename);
            $file->move($path, $filename);
        }

        // dd($path.$filename);

        Recipe::create([
            'recipe_name' => $request->recipe_name,
            // 'slug' => $request->slug,
            'description' => $request->description,
            'small_details' => $request->small_details,
            'avg_cooking_time' => $request->avg_cooking_time,
            'ingredients' => $request->ingredients,
            'tools_needed' => $request->tools_needed,
            'procedures' => $request->procedures,
            'is_active' => $request->is_active == true ? 1:0,
            'recipe_image' => $path.$filename,
        ]);

        // return redirect('/recipes')->with('status', 'Recipe Created Successfully');

        return Redirect::to('/recipes')->with('statuses', [
            [
                'message' => 'Recipe Created Successfully',
                'type' => 'success'
            ],
            // [
            //     'message' => 'Another message',
            //     'type' => 'info'
            // ],
            // Add more messages as needed
        ]);
    }

    public function edit(int $id)
    {
        $recipe = Recipe::findOrFail($id);
        return view('frontend.edit', compact('recipe'));
    }

    public function update(Request $request, int $id)
    {
        $request->validate([
            'recipe_name' => 'required',
            // 'slug' => 'required',
            'description' => 'required',
            'recipe_image' => 'nullable|image|mimes:jpeg,png,jpg,gif',
            'small_details' => 'required',
            'avg_cooking_time' => 'required',
            'ingredients' => 'required',
            'tools_needed' => 'required',
            'procedures' => 'required',
            'is_active' => 'sometimes',
        ]);

        $filename = '';
        $path = 'uploads/recipe_image/';

        $recipe = Recipe::findOrFail($id);

        if($request->has('recipe_image')){

            $file = $request->file('recipe_image');
            $extension = $file->getClientOriginalExtension();
            
            $filename = time().'.'.$extension;

            // dd($filename);
            $file->move($path, $filename);

            if(File::exists($recipe->recipe_image)){
                File::delete($recipe->recipe_image);
            }
        }

        $recipe->update([
            'recipe_name' => $request->recipe_name,
            // 'slug' => $request->slug,
            'description' => $request->description,
            'recipe_image' => $path.$filename,
            'small_details' => $request->small_details,
            'avg_cooking_time' => $request->avg_cooking_time,
            'ingredients' => $request->ingredients,
            'tools_needed' => $request->tools_needed,
            'procedures' => $request->procedures,
            'is_active' => $request->is_active == true ? 1:0,
        ]);

        // return redirect('/recipes')->with('status', 'Recipe Created Successfully');

        return Redirect::back()->with('statuses', [
            [
                'message' => 'Recipe Updated Successfully',
                'type' => 'success'
            ],
            // [
            //     'message' => 'Another message',
            //     'type' => 'info'
            // ],
            // Add more messages as needed
        ]);
    }

    public function destroy(int $id)
    {
        $recipe = Recipe::findOrFail($id);

        if(File::exists($recipe->recipe_image)){
            File::delete($recipe->recipe_image);
        }

        $recipe->delete();

        return redirect('/recipes')->with('statuses', [
            [
                'message' => 'Recipe Deleted Successfully',
                'type' => 'success'
            ],
        ]);
    }

}

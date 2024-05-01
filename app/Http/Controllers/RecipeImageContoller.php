<?php

namespace App\Http\Controllers;

use App\Models\Recipe;
use App\Models\RecipeImage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Validator;


class RecipeImageContoller extends Controller
{
    public function index(int $recipeId)
    {

        $recipe = Recipe::find($recipeId);
        $recipe_images = RecipeImage::where('recipe_id', $recipeId)->get();
        
        return view('recipe-image.index', compact('recipe', 'recipe_images'));
        // return view('recipe-image.index', [
        //     'recipe' => RecipeImage::findOrFail($recipeId),
        // ]);
    }

    // public function index()
    // {
    //     return view('recipe-image.index');
    // }

    public function store(Request $request, int $recipeId)
    {
        $request->validate([
            'recipe_images.*' => 'required|image|mimes:jpeg,png,jpg',
        ]);
    
        Recipe::findOrFail($recipeId);
    
        $imageData = []; // Initialize as an empty array
    
        if ($files = $request->file('recipe_images')) {
            foreach ($files as $file) {
                $extension = $file->getClientOriginalExtension();
                $filename = uniqid().'.'. $extension;
    
                $path = 'uploads/recipes/';
    
                $file->move($path, $filename);
    
                $imageData[] = [
                    'recipe_id' => $recipeId,
                    'recipe_images' => $path.$filename,
                ];
            }
        }
    
        // dd($imageData);
    
        RecipeImage::insert($imageData);
    
        // return redirect()->back()->with('status', 'success');
        return Redirect::to('recipes/'.$recipeId.'/upload')->with('statuses', [
            [
                'message' => 'Recipe images Added Successfully',
                'type' => 'success'
            ],
        ]);
    }

    public function destroy(int $recipeId)
    {
        $recipeImage = RecipeImage::findOrFail($recipeId);

        if(File::exists($recipeImage->recipe_image)){
            File::delete($recipeImage->recipe_image);
        }

        $recipeImage->delete();

        return redirect('/recipes-images/'.$recipeImage->id.'/upload')->with('statuses', [
            [
                'message' => 'Recipe Deleted Successfully',
                'type' => 'success'
            ],
        ]);
    }
    
}

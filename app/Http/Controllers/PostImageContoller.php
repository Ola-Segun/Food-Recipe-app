<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\PostImage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Validator;


class PostImageContoller extends Controller
{
    public function index(int $PostId)
    {

        $Post = Post::find($PostId);
        $Post_images = PostImage::where('Post_id', $PostId)->get();
        
        return view('Post-image.index', compact('Post', 'Post_images'));
        // return view('Post-image.index', [
        //     'Post' => PostImage::findOrFail($PostId),
        // ]);
    }

    // public function index()
    // {
    //     return view('Post-image.index');
    // }

    public function store(Request $request, int $PostId)
    {
        $request->validate([
            'Post_images.*' => 'required|image|mimes:jpeg,png,jpg',
        ]);
    
        Post::findOrFail($PostId);
    
        $imageData = []; // Initialize as an empty array
    
        if ($files = $request->file('Post_images')) {
            foreach ($files as $file) {
                $extension = $file->getClientOriginalExtension();
                $filename = uniqid().'.'. $extension;
    
                $path = 'uploads/posts/';
    
                $file->move($path, $filename);
    
                $imageData[] = [
                    'Post_id' => $PostId,
                    'Post_images' => $path.$filename,
                ];
            }
        }
    
        // dd($imageData);
    
        PostImage::insert($imageData);
    
        // return redirect()->back()->with('status', 'success');
        return Redirect::to('posts/'.$PostId.'/upload')->with('statuses', [
            [
                'message' => 'Post images Added Successfully',
                'type' => 'success'
            ],
        ]);
    }

    public function destroy(int $PostId)
    {
        $PostImage = PostImage::findOrFail($PostId);

        if(File::exists($PostImage->Post_image)){
            File::delete($PostImage->Post_image);
        }

        $PostImage->delete();

        return redirect('/Posts-images/'.$PostImage->id.'/upload')->with('statuses', [
            [
                'message' => 'Post Deleted Successfully',
                'type' => 'success'
            ],
        ]);
    }
    
}

<?php

namespace App\Http\Controllers;

use App\Models\Tag;
use App\Models\User;
use App\Models\Post;
use App\Models\Gallery;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class AdminController extends Controller
{
    // Home page
    public function index()
    {
        return view('admin.index',[
            'Posts' => Post::latest()->take(11)->get(),
            'users' => User::latest()->take(11)->get(),
            // 'filters' => request(['tag','search'])
        ]);
    }

    // Posts activities
    public function showPosts()
    {
        return view('admin.post-lists',[
            'Posts' => Post::latest()->get(),
            // 'filters' => request(['tag','search'])
        ]);
    }

    // User activities
    public function showUsers()
    {
        return view('admin.user-lists',[
            'users' => User::latest()->get(),
            // 'filters' => request(['tag','search'])
        ]);
    }

    // Gallery activites
    public function showGallery()
    {
        return view('admin.gallery',[
            'galleries' => Gallery::get(),
            // 'filters' => request(['tag','search'])
        ]);
    }

    public function imgDelete(int $id)
    {
        $image = Gallery::findOrFail($id);

        $image->delete();

        return Redirect::to('posts/admin/gallery')->with('message', [
            [
                'info' => 'Image Deleted Successfuly',
                'type' => 'success'
            ]
        ]);
    }

    
    public function showTags()
    {
        return view('admin.tags',[

            // Getting tags from Posts
            'tags' => Tag::get(),
            // 'filters' => request(['tag','search'])
        ]);
    }

    
    public function tagStore(Request $request)
    {
        // Validate the incoming request data
        $request->validate([
            'tag' => 'required|string|max:255', 
        ]);

        // Create the tag
        Tag::create([
            'tag' => $request->tag,
        ]);

        // Return a JSON response indicating success or failure
        return Redirect::to('/posts/admin/tags')->with('message', [
            [
                'info' => 'Tag added successfully',
                'type' => 'success',
            ],
        ]);
    }


    public function tagUpdate(Request $request, int $id)
    {
        $request->validate([
            'tag' => 'required'
        ]);
    
        $tag = Tag::findOrFail($id);
    
        $tag->update([
            'tag' => $request->tag,
        ]);

        return Redirect::back()->with('message', [
            [
                'info' => 'Tag updated successfully',
                'type' => 'success',
            ]
        ]);
        
    }

    public function tagDelete(int $id) 
    {
        $tag = Tag::findOrFail($id);

        $tag->delete();

        return Redirect::back()->with('message', [
            [
                'info' => 'Tag deleted successfully',
                'type' => 'success',
            ]
        ]);
    }
}

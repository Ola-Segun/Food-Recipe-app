<?php

namespace App\Http\Controllers;

use App\Models\Tag;
use App\Models\Post;
use App\Models\User;
use App\Models\Comment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use App\Http\Requests\PostFormRequest;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Validator;

class PostController extends Controller
{
    public function index()
    {
        return view('frontend.index',[
            // 'user' => User::get(),
            'Posts' => Post::where('is_active', true)->latest()->filter(request(['tag','search']))->paginate(4),
            'filters' => request(['tag','search'])
        ]);
    } 

    public function show($id)
    {
        return view('frontend.show', [
            'Post' => Post::find($id),
            // 'comments' => Post::find($id)->all()
        ]);
    }

    public function create()
    {
        return view('frontend.create',[
            'tags' => Tag::get(),
        ]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'Post_name' => 'required',
            // 'slug' => 'required',
            'description' => 'required',
            'Post_image' => 'nullable|image|mimes:jpeg,png,jpg,gif',
            'post_summary' => 'required',
            'tags' => 'required',
            'post_body' => 'required',
            'is_active' => 'sometimes',
        ]);
        
        $filename = '';
        $path = 'uploads/Post_image/';

        if($request->has('Post_image')){

            $file = $request->file('Post_image');
            $extension = $file->getClientOriginalExtension();
            
            $filename = time().'.'.$extension;

            // dd($filename);
            $file->move($path, $filename);
        }

        // dd($path.$filename);
        $id = Auth::id();
        Post::create([
            'user_id' => $id,
            'Post_name' => $request->Post_name,
            // 'slug' => $request->slug,
            'description' => $request->description,
            'post_summary' => $request->post_summary,
            'tags' => $request->tags,
            'post_body' => $request->post_body,
            // 'is_active' => $request->is_active == true ? 1:0,
            'is_active' => $request->has('is_active') ? ($request->is_active == true ? 0 : 1) : 1,
            'Post_image' => $path.$filename,
        ]);

        // return redirect('/Posts')->with('status', 'Post Created Successfully');

        return Redirect::to('/posts')->with('statuses', [
            [
                'message' => 'Post Created Successfully',
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
        $Post = Post::findOrFail($id);
        return view('frontend.edit', compact('Post'));
    }

    public function update(Request $request, int $id)
    {
        $request->validate([
            'Post_name' => 'required',
            // 'slug' => 'required',
            'description' => 'required',
            'Post_image' => 'nullable|image|mimes:jpeg,png,jpg,gif',
            'post_summary' => 'required',
            'tags' => 'required',
            'post_body' => 'required',
            'is_active' => 'sometimes',
        ]);

        $filename = '';
        $path = 'uploads/Post_image/';

        $Post = Post::findOrFail($id);

        if($request->has('Post_image')){

            $file = $request->file('Post_image');
            $extension = $file->getClientOriginalExtension();
            
            $filename = time().'.'.$extension;

            // dd($filename);
            $file->move($path, $filename);

            if(File::exists($Post->Post_image)){
                File::delete($Post->Post_image);
            }
        }

        $Post->update([
            'Post_name' => $request->Post_name,
            // 'slug' => $request->slug,
            'description' => $request->description,
            'Post_image' => $path.$filename,
            'post_summary' => $request->post_summary,
            'tags' => $request->tags,
            'post_body' => $request->post_body,
            'is_active' => $request->is_active == true ? 1:0,
        ]);

        // return redirect('/Posts')->with('status', 'Post Created Successfully');

        return Redirect::back()->with('statuses', [
            [
                'message' => 'Post Updated Successfully',
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
        $Post = Post::findOrFail($id);

        if(File::exists($Post->Post_image)){
            File::delete($Post->Post_image);
        }

        $Post->delete();

        return redirect('/Posts')->with('statuses', [
            [
                'message' => 'Post Deleted Successfully',
                'type' => 'success'
            ],
        ]);
    }

    public function MyPosts(int $user_id){
        return view('frontend.myPosts', [
            'user_id' => User::find($user_id),
            'Posts' => Post::all(),
        ]);
    }

}

<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class CommentController extends Controller
{
    public function store(Request $request, int $Post_id){

        $comment = new Comment();
        $comment->Post_id = $Post_id;
        $comment->content = request()->get('content');
        $comment->save();

        // $request->validate([
        //     'Post_id' => 'required',
        //     'comment-content' => 'required',
        // ]);


        // Comment::create([
        //     'Post_id' => $Post_id,
        //     'content' => $request->content,
        // ]);



        return Redirect::to('/posts/'.$Post_id.'/view')->with('statuses', [
            [
                'message' => 'Comment added Successfully',
                'type' => 'success'
            ],
        ]);
    }
}

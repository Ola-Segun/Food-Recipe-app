<?php

namespace App\Http\Controllers;

use App\Models\Gallery;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class GalleryController extends Controller
{
    public function index(){

        $gallery = Gallery::get();
        return view('gallery.index', [
            'gallery' => $gallery,
        ]);
    }


    public function create()
    {
        return view('gallery.create');
    }

    public function store(Request $request)
    {
        if($request->hasFile('file')){

            $uploadPath = "uploads/gallery/";
    
            $file = $request->file('file');
    
            $extention = $file->getClientOriginalExtension();
            $filename = uniqid().'.'.$extention;
            $file->move($uploadPath, $filename);
    
            $finalImageName = $uploadPath.$filename;
    
            Gallery::create([
                'image' => $finalImageName
            ]);
    
            return response()->json(['success' => 'Image Uploaded Successfully']);
        }
        else
        {
            return response()->json(['error' => 'File upload failed.']);
        }
    }

    public function destroy(int $id)
    {
        $gaImg = Gallery::findOrFail($id);

        if(File::exists($gaImg->image)){
            File::delete($gaImg->image);
        }

        $gaImg->delete();

        return redirect('posts/gallery')->with('statuses', [
            [
                'message' => 'Post Deleted Successfully',
                'type' => 'success'
            ],
        ]);
    }
}

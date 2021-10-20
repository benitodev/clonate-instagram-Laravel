<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\Image;
use App\Models\Like;
use App\Models\Save;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image as ImageFile;
class ImageController extends Controller
{
    public function create(){

        return view('image.create');
    }


    public function store(Request $request){

        $request->validate([
            'description' => 'required|string'
        ]);



        $file = $request->file('image');
        $fileName = time(). '-' .$file->getClientOriginalName()  ;
        $storage = storage_path() . "\app\public\images/";

        $rute = $storage . $fileName;
      //  dd($rute);
        ImageFile::make($file)->resize(null, 760, function($constraint){
            $constraint->aspectRatio();
        })->save($rute);


        $image = new Image();
        $id = auth()->user()->id;

        /* $uploadSucces = $request->file('image')->move($destinationPath, $fileName);*/


        $image->image_path = 'storage/images/' . $fileName;
        $image->description = $request->description;
        $image->user_id = $id;

        $image->save();

        return redirect()->route('index');


    }


    public function delete($image_id){

        $image = Image::where('id', $image_id)->first();

        //BEFORE ELIMINATE IMAGES WE'LL COMPROBATE
        $comment = Comment::where('image_id', $image_id)->delete();
        $like = Like::where('image_id', $image_id)->delete();
        $saved = Save::where('image_id', $image_id)->delete();


        $url = str_replace('storage', 'public', $image->image_path);
        $image->delete();


        Storage::delete($url);


        return redirect()->route('index');

    }
}

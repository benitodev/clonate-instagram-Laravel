<?php

namespace App\Http\Controllers;

use App\Models\Comment;

use Illuminate\Http\Request;

class CommentController extends Controller
{
    public function store(Request $request){
        $id_user = auth()->user()->id;
        $id_image = $request->input('id_image');
        $comment = $request->input('comment');

        $request->validate([
            'id_image' => ['required', 'integer'],
            'comment' => ['required', 'string']
        ]);

        $Comment = new Comment;

        $Comment->user_id = $id_user;
        $Comment->image_id = $id_image;
        $Comment->content = $comment;

        $Comment->save();


        return redirect()->route('index');
    }

    public function eliminate(Request $request){

        $id_image = $request->input('id_image');
        $id_comment = $request->input('id_comment');
           $request->validate([
            'id_image' => ['required', 'integer']
        ]);

        $delete = Comment::where('id', $id_comment)->where('image_id', $id_image)->delete();

        return redirect()->route('index');
    }
}


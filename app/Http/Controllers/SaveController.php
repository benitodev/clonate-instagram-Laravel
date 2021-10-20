<?php

namespace App\Http\Controllers;

use App\Models\Save;
use Illuminate\Http\Request;

class SaveController extends Controller
{
   public function save($image_id){
    $auth_id = auth()->user()->id;


    $isset_saved = Save::where('user_id', $auth_id)->where('image_id', (int) $image_id)->count();
    $saved = new Save();


    //person who saved the image
    $saved->user_id = $auth_id;
    //saved image
    $saved->image_id = (int) $image_id;
    $saved->save();

    if($isset_saved == 0){
        return response()->json(['saved' => $saved]);
    }else{
        $err_saved = 'Error al intentar guardar la imagen';
        return response()->json(['saved' => $err_saved] );
    }
   }


   public function remove($image_id){
        $auth_id = auth()->user()->id;

        $saved = Save::where('user_id', $auth_id)->where('image_id', $image_id)->delete();
        if ($saved) {
            return response()->json(['message' => $saved,
                                     'response' => true]);
        }else {
            return response()->json(['message' => 'no existe like',
                                     'response' => false]);
        }
   }
}

<?php

namespace App\Http\Controllers;

use App\Models\Follow;
use Illuminate\Http\Request;

class FollowController extends Controller
{
    public function follow($follow_id){
        $id_user = auth()->user()->id;
        $isset_follow = Follow::where('user_id', $id_user)->where('follow_id', (int) $follow_id)->count();

        $follow = new Follow();
        if($isset_follow == 0){
            $follow->user_id = $id_user;
            $follow->follow_id = (int)$follow_id;
            $follow->save();

            return response()->json(["follow" => $follow]);
        }else {
            $err_follow = "error al intentar crear el follow, ya lo tienes hecho";
            return response()->json(["follow" => $err_follow]);
        }
    }

    public function unfollow($follow_id){
        $id_user = auth()->user()->id;

        $unfollow = Follow::where('follow_id', (int)$follow_id)->where('user_id', $id_user)->delete();

        if ($unfollow->isEmpty()) {
            return response()->json(['unfollow' => $unfollow]);
        }else{
            $err_unfollow = "Error al intentar eliminar el follow";
            return response()->json(['unfollow' => $err_unfollow]);
        }
    }
}

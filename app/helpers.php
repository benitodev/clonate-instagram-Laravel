<?php

use App\Models\Save;

function ifSaved($image_id){
    $auth_id = auth()->user()->id;

    $saved = Save::where('user_id', $auth_id)->where('image_id', $image_id)->count();

    return $saved;
}

if (! function_exists('deleteComment')) {

    function deleteComment($comment, $owner){
        $auth_id = auth()->user()->id;

            //$comment->user->id;
        if ($auth_id == $comment || $auth_id == $owner) {
            $response = true;
            return $response;
        }
    }
}

?>

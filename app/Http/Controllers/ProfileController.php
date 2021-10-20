<?php

namespace App\Http\Controllers;

use App\Http\Requests\UpdateRequest;
use App\Models\Follow;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;

class ProfileController extends Controller


{
     public function index($user){
        $user_table = User::where('nick', $user)->get();

        $idAuth = auth()->user()->id;

        foreach ($user_table as $userr) {
            //people that user-profile follow (followed)
            $followed = Follow::where('user_id', $userr->id)->get();
            //comprobate if auth()->user() follow the user-profile
            $ifFollow = Follow::where('user_id', $idAuth)->where('follow_id', $userr->id)->get();
        }
        if ($user_table) {
                return view('profile.index', ['user' => $user, 'user_table' => $user_table , 'followed' => $followed, 'ifFollow' => $ifFollow]);
            }

   }


    public function configuration(){
        $image = auth()->user()->image;

        return view('profile.profile', compact('image'));
    }


   public function update(Request $request){

     $password = $request->input('password');

     $request->validate([
        'name' => 'required|string|max:255',
        'email' => 'required',
        //'password' => ['confirmed', Rules\Password::min(1)->letters()],
    ]);

        $id = auth()->user()->id;

        $user = User::find($id);
        $user->name = $request->name;
        $user->email = $request->email;
        $user->nick = $request->nick;
        $user->surname = $request->surname;

       if($password){
           $user->password = Hash::make($request->password);
        }

        if($request->hasFile('image')){
            $file = $request->file('image');
            $destinationPath = "storage/users/";
            $fileName = time() . '-' . $file->getClientOriginalName();
            $uploadSucces = $request->file('image')->move($destinationPath, $fileName);
            $user->image = $destinationPath . $fileName;


        }
        $user->save();
    return redirect()->route('profile')->with('message', 'Profile saved successfully');
   }


}

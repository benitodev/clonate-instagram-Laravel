<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;

class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('auth.register');
    }

    /**
     * Handle an incoming registration request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request)
    {


        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'nick' => ['required', 'string', 'max:255','unique:users'],
            'surname' => ['required', 'string', 'max:255'],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
        ]);

        $user = new User();


        $user->name = $request->name;
        $user->email = $request->email;
        $user->nick = $request->nick;
        $user->password =  Hash::make($request->password);
        $user->surname = $request->surname;

        if($request->hasFile('image')){
            $file = $request->file('image');
            $destinationPath = "storage/users/";
            $fileName = time() . '-' . $file->getClientOriginalName();
            $uploadSucces = $request->file('image')->move($destinationPath, $fileName);



            $user->image = $destinationPath . $fileName;
        }




        $user->save();



        event(new Registered($user));

        Auth::login($user);

        return redirect(RouteServiceProvider::HOME);
    }
}

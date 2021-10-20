<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

use function PHPUnit\Framework\isEmpty;

class SearchController extends Controller
{
   public function search(Request $request){

    $search = User::where('nick', 'like', $request->nick .'%')->take(6)->get();

    if (!$search->isEmpty()) {
        return view('search.profiles', ['search' => $search]);
    }else{
        return view('search.profiles', ['search' => 'No se encuentran resultados']);
    }
   }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Save extends Model
{
    use HasFactory;


    protected $table = 'saved';

     public function user(){
        return $this->belongsTo(User::class);
    }

     public function image(){
        return $this->belongsTo(Image::class);
    }
}

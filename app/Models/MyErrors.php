<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MyErrors extends Model
{
    use HasFactory;


    protected $fillable = ['error_message' , 'error_fix' , 'user_id' , 'lang_id'];

    public function user(){
        return $this->belongsTo(User::class , 'user_id');
    }

    public function langCoding(){
        return $this->belongsTo(LangCoding::class , 'lang_id');
    }
}

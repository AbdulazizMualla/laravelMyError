<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LangCoding extends Model
{
    use HasFactory;



    protected $fillable = ['lang_name'];

    public function myErrors(){
        return $this->hasOne(MyErrors::class , 'lang_id');
    }
}

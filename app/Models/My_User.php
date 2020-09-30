<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class My_User extends Model
{
    protected $table="my_user";
    use HasFactory;

    public function hobbies()
    {
        return $this->hasMany('App\Models\Hobbies');
    }

}

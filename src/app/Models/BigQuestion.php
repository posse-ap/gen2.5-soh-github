<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BigQuestion extends Model
{
    use HasFactory;

    public function questions(){
        return $this->hasMany('App\Models\Question');
    }

    public function getData(){
        $items = [
            'id' => $this->id,
            'pref_name' => $this->pref_name
        ];
        return $items;
    }

}

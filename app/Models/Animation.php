<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Animation extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'status',
        'slug',
    ];
    public function AnimationProduct(){
        return $this->hasMany('App\Models\Product');
    }
    public function AnimationHorizontal(){
        return $this->hasMany('App\Models\Horizontalmenu');
    }
}

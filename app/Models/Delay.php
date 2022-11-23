<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Delay extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'status',
        'slug',
    ];
    public function DelayProduct(){
        return $this->hasMany('App\Models\Product');
    }
    public function DelayHorizontal(){
        return $this->hasMany('App\Models\Horizontalmenu');
    }
}

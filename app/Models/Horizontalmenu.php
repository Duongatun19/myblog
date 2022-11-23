<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Horizontalmenu extends Model
{
    use HasFactory;
    protected $fillable = [
        'namemenu',
        'slugmenu',
        'idelement',
        'status',
        'animation_id',
       
    ];
    public function HorizontalProduct(){
        return $this->hasMany('App\Models\Product');
    }
    public function HozAnimation(){
        return $this->belongsTo('App\Models\Animation','animation_id','id');
    }

    public function HozDelay(){
        return $this->belongsTo('App\Models\Delay','delay_id','id');
    }

}

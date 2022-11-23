<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $fillable = [
        'titleproduct',
        'slugproduct',
        'noidung',
        'status',
        'category_id',
        'animation_id',
        'delay_id',
        'imgproduct',
        'link',
    ];
    public function ProductMenu(){
        return $this->belongsTo('App\Models\Horizontalmenu','category_id','id');
    }
    public function ProductAnimation(){
        return $this->belongsTo('App\Models\Animation','animation_id','id');
    }
    public function ProductDelay(){
        return $this->belongsTo('App\Models\Delay','delay_id','id');
    }
}

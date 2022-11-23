<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SubCategory extends Model
{
    use HasFactory;
    protected $fillable = [
        'subcategory',
        'slugsub',
        'parent_id',
        'status',
    ];
    public function ParentCategory(){
        return $this->belongsTo('App\Models\ParentCategory','parent_id','id');
    }

}

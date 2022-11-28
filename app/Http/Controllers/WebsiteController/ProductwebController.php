<?php

namespace App\Http\Controllers\WebsiteController;

use App\Http\Controllers\Controller;
use App\Models\Horizontalmenu;
use Illuminate\Http\Request;

use App\Models\Product;

class ProductwebController extends Controller
{
    public function info_product($id){
        $item = Product::find($id);
        return view('Website/info-product')->with(compact('item'));
    }
    public function list_category($id){
        $menu = Horizontalmenu::orderBy('id','desc')->where('status', '1')->get();
        $list_product = Product::orderBy('id','desc')->where('category_id', $id)->get();
        return view('Website/list-category')->with(compact('menu','list_product'));
    }
}

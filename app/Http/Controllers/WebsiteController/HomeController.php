<?php

namespace App\Http\Controllers\WebsiteController;

use App\Http\Controllers\Controller;
use App\Models\Banner;
use App\Models\Horizontalmenu;
use App\Models\Product;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function Home(){
        $banner = Banner::orderby('id', 'ASC')->where('status', '1')->get();
        $list_item_menu = Horizontalmenu::with('HozAnimation')->with('HozDelay')->where('status','1')->get();
        $product = Product::all();
        return view('Website/Home')->with(compact('banner','list_item_menu','product'));
    }
}

<?php

namespace App\Http\Controllers\WebsiteController;

use App\Http\Controllers\Controller;
use App\Models\Banner;
use App\Models\Horizontalmenu;
use App\Models\Product;
use GuzzleHttp\Handler\Proxy;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function Home()
    {
        $banner = Banner::orderby('id', 'ASC')->where('status', '1')->get();
        $list_item_menu = Horizontalmenu::with('HozAnimation')->with('HozDelay')->where('status', '1')->get();
        $hoz_1 = Horizontalmenu::where('id', '1')->get();
        $hoz_2 = Horizontalmenu::where('id', '2')->get();
        $hoz_3 = Horizontalmenu::where('id', '3')->get();
        $hoz_4 = Horizontalmenu::where('id', '4')->get();
        $hoz_5 = Horizontalmenu::where('id', '5')->get();
        $hoz_6 = Horizontalmenu::where('id', '6')->get();
        $hoz_7 = Horizontalmenu::where('id', '7')->get();
        $product_1 = Product::with('ProductMenu')->orderBy('id', 'desc')->where('category_id', '1')->where('status', '1')->get();
        $product_2 = Product::with('ProductMenu')->orderBy('id', 'desc')->where('category_id', '2')->where('status', '1')->get();
        $product_3 = Product::with('ProductMenu')->orderBy('id', 'desc')->where('category_id', '3')->where('status', '1')->get();
        $product_4 = Product::with('ProductMenu')->orderBy('id', 'desc')->where('category_id', '4')->where('status', '1')->get();
        $product_5 = Product::with('ProductMenu')->orderBy('id', 'desc')->where('category_id', '5')->where('status', '1')->get();
        $product_6 = Product::with('ProductMenu')->orderBy('id', 'desc')->where('category_id', '6')->where('status', '1')->get();
        $product_7 = Product::with('ProductMenu')->orderBy('id', 'desc')->where('category_id', '7')->where('status', '1')->get();
        return view('Website/Home')->with(compact('banner', 'list_item_menu', 'product_1', 'hoz_1','hoz_2','product_2', 'product_3', 'product_4', 'product_5', 'product_6', 'product_7','hoz_3','hoz_4','hoz_5','hoz_6','hoz_7'));
    }
    public function website(){
        $menu = Horizontalmenu::orderBy('id', 'desc')->where('status', '1')->get();
        return view('Website/website')->with(compact('menu'));
    }
    
}

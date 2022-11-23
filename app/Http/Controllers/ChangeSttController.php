<?php

namespace App\Http\Controllers;

use App\Models\Animation;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Horizontalmenu;
use App\Models\Banner;
use App\Models\Delay;

class ChangeSttController extends Controller
{
    public function ChangeStatusProduct(Request $request)
    {
        $status = Product::find($request->item_id);
        $status->status = $request->status;
        $status->save();
        return response()->json(['success' => 'Status Changed Successfully']);
    }
    public function changeStatus(Request $request)
    {
        $user = Horizontalmenu::find($request->item_id);
        $user->status = $request->status;
        $user->save();
        return response()->json(['success' => 'Status Changed Successfully']);
    }
    public function ChangeSttBanner(Request $request){
        $banner = Banner::find($request->item_id);
        $banner->status = $request->status;
        $banner->save();
        return response()->json(['success' => 'Status Changed Successfully']);
    }
    public function ChangeSttDelay(Request $request){
        $banner = Delay::find($request->item_id);
        $banner->status = $request->status;
        $banner->save();
        return response()->json(['success' => 'Status Changed Successfully']);
    }
    public function ChangeSttAnimation(Request $request){
        $banner = Animation::find($request->item_id);
        $banner->status = $request->status;
        $banner->save();
        return response()->json(['success' => 'Status Changed Successfully']);
    }
}

<?php

namespace App\Http\Controllers\AdminController;

use App\Http\Controllers\Controller;
use App\Http\Requests\HorizontalmenuRequest;
use Illuminate\Http\Request;
use App\Models\Horizontalmenu;
use App\Models\Animation;
use App\Models\Delay;

class HorizontalmenuController extends Controller
{
    public function ListHorizontal()
    {
        $items = Horizontalmenu::with('HozAnimation')->with('HozDelay')->get();
        return view('Admin/HorizontalmenuList')->with(compact('items'));
    }
    public function PageCreateHorizontal()
    {
        $animations = Animation::orderBy('id', 'DESC')->where('status', '1')->get();
        $delays = Delay::orderBy('id', 'DESC')->where('status','1')->get();
        return view('Admin/HorizontalmenuCreate')->with(compact('animations','delays'));
    }
    public function addhorizontalmenu(HorizontalmenuRequest $request)
    {
        $new = new Horizontalmenu();
        $new->namemenu = $request->namemenu;
        $new->slugmenu = $request->slugmenu;
        $new->idelement = $request->idelement;
        $new->animation_id = $request->animation_id;
        $new->delay_id = $request->delay_id;
        $new->status = $request->status;
        $new->save();
        return redirect()->route('ListHorizontal')->with('ok', 'Thêm Thành Công');
    }
    public function delete_horizontal($id)
    {
        $item = Horizontalmenu::find($id);
        $item->delete();
        return redirect()->route('ListHorizontal')->with('ok', 'Xoá thành công');
    }
    public function edit_horizontal($id)
    {   $animation = Animation::all();
        $delays = Delay::all();
        $item = Horizontalmenu::find($id);
        return view('Admin/HorizontalmenuEdit')->with(compact('item','animation','delays'));
    }
    public function update_horizontal_menu(HorizontalmenuRequest $request, $id)
    {
        $update_new = Horizontalmenu::find($id);
        $update_new->namemenu = $request->namemenu;
        $update_new->slugmenu = $request->slugmenu;
        $update_new->idelement = $request->idelement;
        $update_new->animation_id= $request->animation_id;
        $update_new->delay_id = $request->delay_id;
        $update_new->status = $request->status;
        $update_new->save();
        return redirect()->route('ListHorizontal')->with('ok', 'Cập Nhật Thành Công');
    }
  
}

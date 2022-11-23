<?php

namespace App\Http\Controllers\AdminController;

use App\Http\Controllers\Controller;
use App\Http\Requests\DelayRequest;
use App\Models\Delay;
use Illuminate\Http\Request;

class DelayController extends Controller
{
    public function ListDelay()
    {
        $delays = Delay::orderBy('id', 'DESC')->get();
        return view('Admin/DelayList')->with('delays', $delays);
    }
    public function PageDelayAdd()
    {
        return view('Admin/DelayCreate');
    }
    public function AddDelay(DelayRequest $request)
    {
        $item = new Delay();
        $item->name = $request->name;
        $item->slug = $request->slug;
        $item->status = $request->status;
        $item->save();
        return redirect()->route('ListDelay')->with('ok','Thêm Mới Thành Công');
    }
    public function delete_delay($id)
    {
        $item = Delay::find($id);
        $item->delete();
        return redirect()->route('ListDelay');
    }
    public function edit_delay($id){
        $item = Delay::find($id);
        return view('Admin/DelayEdit')->with(compact('item'));
    }
    public function update_delay(DelayRequest $request, $id){
        $item= Delay::find($id);
        $item->name= $request->name;
        $item ->slug = $request->slug;
        $item->status=$request->status;
        $item->save();
        return redirect()->route('ListDelay')->with('ok', 'Cập Nhật Thành Công');
    }
}

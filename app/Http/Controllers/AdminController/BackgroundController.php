<?php

namespace App\Http\Controllers\AdminController;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\BackgroundRequest;
use App\Models\Banner;

class BackgroundController extends Controller
{
    public function background()
    {
        $list = Banner::all();
        return view('Admin/Background')->with(compact('list'));
    }
    public function addbackground()
    {
        return view('Admin/AddBackground');
    }
    public function submit_bg(BackgroundRequest $request)
    {
        $request->validate(
            [
                'hinhanh' => 'required',
            ],
            [
                'required' => ':attribute phải đuọc chọn', //* cách thể hiện các rule
            ],
            [
                'hinhanh' => 'Hình Ảnh', //* tuỳ chỉnh thông báo ( :attribute)
            ]
        );
        $new = new Banner();
        $new->status = $request->status;
        
        $get_img = $request->file('hinhanh');
        if ($get_img) {
            $new_img = rand(0, 99999) . '.' . $get_img->getClientOriginalExtension(); //đổi duôi thành đuôi hình ảnh
            $get_img->move('uploads/', $new_img); //chọn đường dẫn upload ảnh
            $new->hinhanh = $new_img;
            $new->save();
            return redirect()->route('background')->with('ok', "Thêm Mới Thành Công");
        }
        $new->save();
        return redirect()->route('background')->with('ok', "Thêm Mới Thành Công");
    }
    public function delete_bg($id)
    {
        $item = Banner::find($id);
        $item->delete();
        return redirect()->route('background')->with('ok', "Xoá Thành Công");
    }
    public function edit_bg($id){
        $item = Banner::find($id);
        return view('Admin/EditBg')->with(compact('item'));
    }
    public function update_bg(BackgroundRequest $request, $id){
        $new = Banner::find($id);
        $new->status = $request->status;
        $get_img = $request->file('hinhanh');
        if ($get_img) {
            $new_img = rand(0, 99999) . '.' . $get_img->getClientOriginalExtension(); //đổi duôi thành đuôi hình ảnh
            $get_img->move('uploads/', $new_img); //chọn đường dẫn upload ảnh
            $new->hinhanh = $new_img;
            $new->save();
            return redirect()->route('background')->with('ok', "Cập Nhật Thành Công");
        }
        $new->save();
        return redirect()->route('background')->with('ok', "Cập Nhật Thành Công");
    }

    //@test change status
 
}

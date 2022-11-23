<?php

namespace App\Http\Controllers\AdminController;

use App\Http\Controllers\Controller;
use App\Http\Requests\AnimationRequest;
use App\Models\Animation;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;

class animaController extends Controller
{
    public  function Listanimation()
    {
        $animations = Animation::orderBy('id', 'DESC')->get();
        return view('Admin/AnimationList')->with('animations', $animations);
    }
    public function PageAddAnimation()
    {
        return view('Admin/AnimationAdd');
    }
    public function AddAnimation(AnimationRequest $request)
    {
        $item = new Animation();
        $item->name = $request->name;
        $item->slug = $request->slug;
        $item->status = $request->status;
        $item->save();
        return redirect()->route('animation');
    }
    public function DeleteAnimation($id)
    {
        $item = Animation::find($id);
        $item->delete();
        return redirect()->route('animation')->with('ok', 'Delete Completed');
    }
    public function EditAnimation($id)
    {
        $item = Animation::find($id);
        return view('Admin/AnimationEdit')->with(compact('item'));
    }
    public function UpdateAnimation(AnimationRequest $request, $id)
    {
        $item = Animation::find($id);
        $item->name = $request->name;
        $item->slug = $request->slug;
        $item->status = $request->status;
        $item->save();
        return redirect()->route('animation')->with('ok', 'Cập Nhật Thành Công');
    }
}

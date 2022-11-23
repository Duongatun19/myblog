<?php

namespace App\Http\Controllers\AdminController;

use App\Models\ParentCategory;
use App\Models\SubCategory;
use App\Http\Controllers\Controller;
use App\Http\Requests\ParentCategoryRequest;
use App\Http\Requests\SubRequest;
use Illuminate\Http\Request;

use function Termwind\render;

class AdCategoryController extends Controller
{
    public function ListParentCategory()
    {
        $list = ParentCategory::orderBy('id', 'desc')->paginate(5);
        return view('Admin/ListParentCategory')->with(compact('list'));
    }
    public function PageAddParentCategory()
    {
        return view('Admin/PageAddParentCategory');
    }
    public function Addparent(ParentCategoryRequest $request)
    {
        $new  = new ParentCategory();
        $new->nameparent = $request->parentCategory;
        $new->slugparent = $request->slugparent;
        $new->status = $request->status;
        $new->save();
        return redirect()->route('ParentCategory')->with('ok', 'Add Completed');
    }
    public function delete_parent($id)
    {
        $item = ParentCategory::find($id);
        $item->delete();
        return back()->with('ok', 'Delete Completed !');
    }
    public function edit_parent($id)
    {
        $item = ParentCategory::find($id);
        return view('Admin/Editparent')->with(compact('item'));
    }
    public function update_parent(ParentCategoryRequest $request, $id)
    {
        $new_item = ParentCategory::find($id);
        $new_item->nameparent = $request->parentCategory;
        $new_item->slugparent = $request->slugparent;
        $new_item->status = $request->status;
        $new_item->save();
        return redirect('Admin/ListParentCategory')->with('ok', 'Update Completed');
    }
    public function list_sub_category()
    {
        $list = SubCategory::with('ParentCategory')->orderBy('id', 'DESC')->paginate(10);

        return view('Admin/ListSubCategory')->with(compact('list'));
    }
    public function PageAddSubCategory()
    {
        $parent = ParentCategory::all();
        return view('Admin/AddSubCategory')->with(compact('parent'));
    }
    public function add_sub(SubRequest $request)
    {
        $new = new SubCategory();
        $new->subcategory = $request->subcategory;
        $new->slugsub = $request->slugsub;
        $new->parent_id = $request->parent_id;
        $new->status = $request->status;
        $old_sub = SubCategory::orderBy('id', 'Desc')->where('parent_id', $request->parent_id)->where('subcategory', $request->subcategory)->get();
        $count_sub = count($old_sub);
        if ($count_sub > 0) {
            return back()->with('loi', 'Already Exist');
        }
        $new->save();
        return redirect()->route('SubCategory')->with('ok', 'Add completed !');
    }
    public function delete_sub($id)
    {
        $item = SubCategory::find($id);
        $item->delete();
        return redirect()->route('SubCategory')->with('ok', 'Delete completed !');
    }
    public function edit_sub($id){
        $item = SubCategory::find($id);
        $parent = ParentCategory::all();
        return view('Admin/EditSub')->with(compact('item','parent'));
    }
    public function update_sub(SubRequest $request, $id){
        $new = SubCategory::find($id);
        
        $new->subcategory = $request->subcategory;
        $new->slugsub = $request->slugsub;
        $new->parent_id = $request->parent_id;
        $new->status = $request->status;
        $old_sub = SubCategory::orderBy('id', 'Desc')->where('parent_id', $request->parent_id)->where('subcategory', $request->subcategory)->get();
        $count_sub = count($old_sub);
        if ($count_sub > 0) {
            return back()->with('loi', 'Already Exist');
        }
        $new->save();
        return redirect()->route('SubCategory')->with('ok','Update completed !');

    }
}

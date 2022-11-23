<?php

namespace App\Http\Controllers\AdminController;

use App\Http\Controllers\Controller;
use App\Http\Requests\ProductRequest;
use App\Models\Horizontalmenu;
use App\Models\Product;
use Illuminate\Http\Request;
use App\Models\Delay;
use App\Models\Animation;

class ProductController extends Controller
{
    public function ListProduct()
    {   $list = Product::with('ProductMenu')->with('ProductAnimation')->with('ProductDelay')->get();
        return view('Admin/ProductList')->with(compact('list'));
    }
    public function PageAddProduct()
    {
        $category = Horizontalmenu::orderBy('id', 'DESC')->where('status', '1')->get();
        $animation = Animation::orderBy('id', 'DESC')->where('status', '1')->get();
        $delays = Delay::orderBy('id', 'DESC')->where('status', '1')->get();
        return view('Admin/ProductCreate')->with(compact('category','animation','delays'));
    }
    public function addproduct(ProductRequest $request)
    {
        $request->validate(
            [
                'imgproduct' => 'required',
            ],
            [
                'required' => ':attribute phải đuọc chọn', //* cách thể hiện các rule
            ],
            [
                'imgproduct' => 'Hình Ảnh', //* tuỳ chỉnh thông báo ( :attribute)
            ]
        );
        $new = new Product();
        $new ->animation_id = $request->animation_id;
        $new->delay_id = $request->delay_id;
        $new->titleproduct = $request->titleproduct;
        $new->slugproduct = $request->slugproduct;
        $new->category_id = $request->category_id;
        $new->link =  $request->link;
        $new->status = $request->status;
        $new->noidung = $request->noidung;
        $get_img = $request->file('imgproduct');
        if ($get_img) {
            $new_img = rand(0, 99999) . '.' . $get_img->getClientOriginalExtension(); //đổi duôi thành đuôi hình ảnh
            $get_img->move('uploads/', $new_img); //chọn đường dẫn upload ảnh
            $new->imgproduct = $new_img;
            $new->save();
            return redirect()->route('ListProduct')->with('ok', "Thêm Mới Thành Công");
        }
        $new->save();
        return redirect()->route('ListProduct')->with('ok', "Thêm Mới Thành Công");
    }
    public function delete_product($id) {
        $item = Product::find($id);
        $item->delete();
        return redirect()->route('ListProduct')->with('ok', "Xoá Thành Công");
    }
    public function edit_product($id) {
        $items = Product::find($id);
        $category = Horizontalmenu::orderBy('id', 'DESC')->where('status', '1')->get();
        $animation = Animation::orderBy('id', 'DESC')->where('status', '1')->get();
        $delays = Delay::orderBy('id', 'DESC')->where('status', '1')->get();
        return view('Admin/ProductEdit')->with(compact('items','category','animation','delays'));
    }
    public function update_product(ProductRequest $request,$id){
        $update_new = Product::find($id);
        $update_new->titleproduct = $request->titleproduct;
        $update_new->category_id = $request->category_id;
        $update_new->link = $request->link;
        $update_new->animation_id= $request->animation_id;
        $update_new->delay_id = $request->delay_id;
        $update_new->noidung = $request->noidung;
        $update_new->status = $request->status;
        $update_new->slugproduct = $request->slugproduct;
        $get_img = $request->file('imgproduct');
        if ($get_img) {
            $new_img = rand(0, 99999) . '.' . $get_img->getClientOriginalExtension(); //đổi duôi thành đuôi hình ảnh
            $get_img->move('uploads/', $new_img); //chọn đường dẫn upload ảnh
            $update_new->imgproduct = $new_img;
            $update_new->save();
            return redirect()->route('ListProduct')->with('ok', "Cập Nhật Thành Công");
        }
        $update_new->save();
        return redirect()->route('ListProduct')->with('ok', "Cập Nhật Thành Công");
    }
    public function ChangeStatusProduct(Request $request)
    {
        $status = Product::find($request->item_id);
        $status->status = $request->status;
        $status->save();
        return response()->json(['success' => 'Status Changed Successfully']);
    }
}

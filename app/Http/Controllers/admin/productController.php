<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Model_product;
use Illuminate\Http\Request;

class productController extends Controller
{
    public function addproduct(Request $request){
        $products = new Model_product;
        $products->name = $request->nameproduct;
        $products->amount =$request->amount;
        $products->id_type = $request->types;
        $products->unit_price = $request->prices;
        $products->new = 1;
        $products->description = $request->description;
        if ($request->hasFile('upload')) {
         $file =$request->file('upload');
         $ex = $file->getClientOriginalExtension();
         $filename = date('YmdHis').'.'.$ex;
         $file->move('product',$filename);
         $products->image = $filename;
     }
     if($request->sale){
        $products->promotion_price = $request->prices*((100 - $request->sale)/100); 
    }else{
        $products->promotion_price = 0;
    }
    $products->save();
    return redirect()->back()->with('sus','Thêm sản phẩm thành công');
}
public function news(Request $request){
    $new = $request->query('value');
    $id = $request->query('id');
    if($new == 0){
        $news = 1;
    }else{
        $news = 0;
    }
    $product = Model_product::find($id);
    $product->new =$news;
    $product->save();
    return response()->json(['code'=>200],200);
}
public function deletes(Request $request){
   $product = Model_product::find($request->query('id'));
   $product->delete();
   return response()->json(['code'=>200],200);
}
}

<?php

namespace App\Http\Controllers\page;
use Illuminate\Http\Request;
use App\Models\Model_product;
use App\Models\Model_bills;
use App\Models\Model_city;
use App\Models\Model_wards;
use App\Models\Model_district;
use App\Models\users;
use App\Repositories\Repository\Interfaces\PostRepositoryInterface ;
use App\Repositories\Repository\Interfaces\OrderRepositoryInterface ;
use Carbon\Carbon;
use App\Http\Controllers\Controller;
class indexController extends Controller
{
    protected $_postRepository;
    protected $_orderRepository;
    public function __construct(PostRepositoryInterface $_postRepository,OrderRepositoryInterface $_orderRepository)
    {
     $this->postRepository = $_postRepository;
     $this->orderRepository = $_orderRepository;
 }
 public function index()
 {
    $Products = $this->postRepository->getModel_product('new','==',1,4);
        //    $now = Carbon::now()->toDateString();
    $Sales = $this->postRepository->getModel_product('promotion_price','<>',0,8);
    return view('page.index',compact('Products','Sales'));
}

public function category($type){
   $type = $type;
   $listProduct = $this->postRepository->getModel_product('id_type','=',$type,9);
   $listPr = $this->postRepository->getModel_product('id_type','<>',$type,3);
   return view('page.product',compact('listProduct','listPr','type'));
}

public function login()
{
   return view('page.login');
}

public function logup()
{
   return view('page.signup');
}

public function contacts()
{
   return view('page.contact');
}
public function introduce()
{
   return view('page.introduce');
}
public function shoppingcarts(){
  $carts = session()->get('cart');
  return view('page.cart',compact('carts'));
}
public function checkouts(){

    $city = Model_city::get();
    $district = Model_district::get();
    $wards = Model_wards::get();
    return view('page.checkout',compact('city','district','wards'));
}
public function seach(Request $request){
   if($request->seach){
     $Products = $this->postRepository->getSearch_product(trim($request->seach));
     return view('page.seach',compact('Products'));
 }else{
  return redirect()->route('index');

}
}
    // public function account(){
    //   $listOrder = Model_bills::leftjoin('products','products.id','=','orders.id_products')
    //                             ->select('products.*','orders.*')->where('id_users','=',Auth::id())->get();
    //                                $user = users::find(Auth::id());
    //  return view('page.my-account',compact('listOrder','user'));
    // }
}

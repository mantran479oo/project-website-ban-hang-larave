<?php

namespace App\Http\Controllers\page;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Model_product;
use Illuminate\Support\Facades\Mail;
use App\Models\Model_user;
use App\Models\Model_bills;
use App\Models\Model_district;
use App\Models\Model_comment;
use Cart;
use App\Repositories\Repository\Interfaces\PostRepositoryInterface ;
use App\Repositories\Repository\Interfaces\OrderRepositoryInterface ;
use Illuminate\Support\Facades\Auth;
session_start();
class productController extends Controller
{
    protected $_postRepository;
    protected $_orderRepository;
    public function __construct(PostRepositoryInterface $_postRepository,OrderRepositoryInterface $_orderRepository)
   {
       $this->postRepository = $_postRepository;
       $this->orderRepository = $_orderRepository;
   }
    public function chitiet($id){
        $sp = $this->postRepository->find($id);
        $sptt = $this->postRepository->getSimilar_products($id,$sp->id_type); //sản phẩm tương tự
        $comment = Model_comment::where('id_product',$id)->get();
        return view('page.shopping',compact('sp','sptt','comment'));
    }
    public function addcart(Request $request){
        $id = $request->query('id');
      //session()->flush('cart');
       $products = $this->postRepository->find($id);
       if($products->promotion_price != 0){
          $prices = $products->promotion_price;
       }else{
        $prices = $products->unit_price;
       }

         $cart = session()->get( 'cart');
       if(isset($cart[$id])){
        $cart[$id]['quantity'] = $cart[$id]['quantity'] + 1;
       }else{
        $cart[$id]=[
         'id'=>$products->id,
         'name'=>$products->name,
         'prices'=> $prices,
         'quantity'=>1,
         'img'=>$products->image
        ];
       }
       session()->put('cart',$cart);
       return response()->json(['code'=>200],200);
    }
    public function destroy(Request $request){

          $id = $request->query('id');
        if($id){
           $cart = session()->get('cart');
             unset($cart[$id]);
             session()->put('cart',$cart);
             return response()->json(['code'=>200],200);
          }
    }
    public function orders(Request $request){
        // $cart = session()->get('cart');
        // if($cart){
       // $customer = new Model_user;
       // $customer->name = $request->name;
       // $customer->gender = 'null';
       // $customer->email = 'null';
       // $customer->address = $request->province ;
       // $customer->phone_number=$request->phone;
       // $customer->save();

        // $bill = new Model_bills;
        // $bill->id_customer = $customer->id;
        // $bill->date_order = date('Y-m-d');
        // // $bill->total= ;
        // $bill->payment = $request->payment;
        // $bill->save();
        $this->orderRepository->set_Order();
        // foreach($cart as $key => $value){
        //     $bill_detal = new Model_bills;
        //     $bill_detal->id_products= $value['id'] ;
        //     $bill_detal->quantity = $value['quantity'];
        //     $bill_detal->status = 0;
        //     $bill_detal->price = $value['prices'];
        //     $bill_detal->totals = ($value['prices']*$value['quantity']);
        //     $bill_detal->id_users = Auth::user()->id;

        //     $bill_detal->save();
        // }
    //     session()->forget('cart');
    //   return redirect()->route('my-account');
     // }
    }
    function send(){
        $user = ['name'=>'dsadasdas','body'=>'đâsdasd'];
       Mail::send('page.send', $user, function($message) use ($user) {
           $message->from('luongitbkap@gmail.com');
            $message->to('luongitbkap@gmail.com');
            $message->subject('Welcome Mail');
        });

        dd('Mail Send Successfully');
    }
    function updatecart(Request $request){
        $id = $request->query('id');
        $sl = $request->query('quantity');

        if($id && $sl){
            $cart = session()->get('cart');
            $cart[$id]['quantity'] = (int)$sl ;
        }
          session()->put('cart',$cart);
         return response()->json(['code'=>200],200);
    }
    public function buy(Request $request){
        $productss = $this->postRepository->find($request->rowid);
        if($productss->promotion_price != 0){
          $prices = $productss->promotion_price;
       }else{
        $prices = $productss->unit_price;
       }
        $cart = session()->get('cart');
        if($request->quantitys){
            $cart[$request->rowid]=[
            'id'=>$productss->id,
            'name'=>$productss->name,
            'prices'=> $prices,
            'quantity'=>(int)$request->quantitys,
            'img'=>$productss->image
            ];
        }
        session()->put('cart',$cart);
        return redirect()->route('shoppingcart');

    }
    public function comments(Request $request){
      $comment = new Model_comment;
      $comment->name = Auth::user()->full_name;
      $comment->id_product = $request->query('id');
      $comment->content = $request->query('comment');
      if($request->query('comment')){
        $comment->save();
      }
       return response()->json(['code'=>200],200);
    }
    public function remove(Request $request){
     $comment = Model_comment::find($request->query('id'));
     $comment->delete();
     return response()->json(['code'=>200],200);
    }
    function city(Request $request){
      $district = Model_district::where('matp','=',$request->query('id'))->get();
      return response()->json(['code'=>$district],200);
    }
}

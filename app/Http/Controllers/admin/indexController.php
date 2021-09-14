<?php

namespace App\Http\Controllers\admin;
use Illuminate\Http\Request;
use App\Models\Model_product;
use App\Models\Model_product_type;
use App\Models\users;
use App\Models\Model_bills;
use App\Models\admin\Model_information;
use App\Http\Controllers\Controller;

class indexController extends Controller
{
    public  function index(){
       $order = users::join('orders','orders.id_users','=','users.id')->get();
       return view('admin.index',compact('order'));
   }
   public function users()
   {
       return view('admin.user');
   }

   public function table()
   {
    $lists = Model_product::ORDERBY('created_at', 'DESC')->simplePaginate(10);
    $list_type = Model_product_type::get();
    $users = users::get();
    return view('admin.tableproduct',compact('lists','list_type','users'));
}

public function information()
{
    $contex = Model_information::get();
    return view('admin.information',compact('contex'));
}
    //  public function introduce()
    // {
    //      return view('page.introduce');
    // }
}

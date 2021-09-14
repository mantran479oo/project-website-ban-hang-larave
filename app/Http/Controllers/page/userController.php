<?php

namespace App\Http\Controllers\page;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;
use Hash;
use App\Models\users;

class userController extends Controller
{
   public function postlogin(Request $request){
    $this->validate($request,[
     'email'=>'email',
     'password'=>'min:6|max:20'
    ],[
      'password.min'=>'Mật khẩu ít nhất 6 ký tự',
      'password.max'=>'Mật khẩu ngắn hơn 20 ký tự'
    ]);
    $user = array('email'=>$request->email,'password'=>$request->password);
    if(Auth::attempt($user)){
        
         return redirect()->route('index');
    }   
    else {
         return redirect()->back()->with(['err'=>'Đăng nhập không thành công']);
    }
   }
   public function logout(){
    
    Auth::logout();
    return redirect()->route('index');
   }
   public function postregister(Request $request){
      $this->validate($request,[
       'email'=>'required|unique:users,email',
       'password'=>'required|min:6|max:10',
       //'fullname'=>'unique:full_name,users',
       'repassword'=>'required|same:password'
      ],[
      'email.required'=>'Vui lòng nhập email',
      'email.unique'=>'Email đã tồn tại',
      'fullname.unique'=>'Tên đã được sử dụng',
      'password.required'=>'Vui lòng nhập mật khẩu',
      'password.min'=>'Password tối thiểu 6 ký tự',
      'password.max'=>'Password không quá 10 ký tự',
      'repassword.same'=>' Mật khẩu không khớp !! '
      ]);
      $user = new users;
      $user->email = $request->email;
      $user->password = Hash::make( $request->password);
      $user->full_name = $request->fullname;
      $user->save();
      return redirect()->back()->with('successful','Đăng ký thành công');
   }
}

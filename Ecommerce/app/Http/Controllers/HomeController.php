<?php

namespace App\Http\Controllers;

use App\Models\product;
use App\Models\User;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    //
   public function redirect(){
    $usertype =Auth::user()->usertype;
    if($usertype=='1'){
         return View('admin.home');
      }
      else{
        $product =product::paginate(3);

        return View('home.userpage')->with('product',$product);
      }
}
   public function index(){
    $product =product::paginate(3);

         return View('home.userpage')->with('product',$product);


}
}

<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\product;
use App\Models\User;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    //
    public function redirect()
    {
        $usertype = Auth::user()->usertype;
        if ($usertype == '1') {
            return View('admin.home');
        } else {
            $product = product::paginate(3);

            return View('home.userpage')->with('product', $product);
        }
    }
    public function index()
    {
        $product = product::paginate(3);

        return View('home.userpage')->with('product', $product);
    }
    public function productdetails(Request $req)
    {
        $product = product::where('id', $req->id)->first();

        return View('home.productdetails')->with('product', $product);
    }
    public function addTocart(Request $req,$id)
    {
        if(Auth::id()){
        $user =Auth::user();
       $product = product::find($id);
       $cart = new Cart();
       $cart->name= $user->name;
       $cart->email= $user->email;
       $cart->phone= $user->phone;
       $cart->user_id= $user->id;


       $cart->address= $user->address;
       $cart->producttitle= $product->title;
       $cart->image= $product->image;
       if($product->discountprice){
        $cart->price= $product->discountprice * $req->quantity;
       }
        else{
            $cart->price= $product->price * $req->quantity;
       }

       $cart->quantity= $req->quantity;
       $cart->product_id= $product->id;
       $cart->save();
       return redirect()->back();
        }
        else{
            return redirect('login');
        }
    }
}

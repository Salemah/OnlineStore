<?php

namespace App\Http\Controllers;

use App\Models\Catagory;
use App\Models\product;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    //
    public function viewcatagory(){
        $data = Catagory::all();
        return view('admin.catagory')->with('data',$data);
    }
    public function addcatagory(Request $req){
        $data = new Catagory();
        $data->catagory_name= $req->catagory;
       $data->save();
       return redirect()->back()->with('message','Catagory Added Succesfully');
    }
    public function deletecatagory(Request $req){

        $data = Catagory::where('id', $req->id)->first();
        $data->delete();
        return redirect()->back()->with('message','Catagory Delete Succesfully');

    }
    public function viewproduct(Request $req){

        $data = Catagory::all();
        return  view('admin.product')->with('data',$data);

    }

    public function addproducts(Request $req){
        $product = new product();
        $product->title = $req->title;
        $product->description = $req->description;
        $product->catagory = $req->catagory;
        $product->price = $req->price;
        $product->discountprice = $req->discountprice;
        $product->quantity = $req->quantity;
        $product->title = $req->title;

        $image = $req->image;
        $imagename= time().'.'.$image->getClientOriginalExtension();
        $req->image->move('product',$imagename);
        $product->image =  $imagename;

       $product->save();
        return redirect()->back()->with('message','Product Add  Succesfully');

    }
    public function showproduct(Request $req){

        $product = product::all();
        return  view('admin.showproduct')->with('product',$product);

    }
    public function productdelete(Request $req){
        $product = product::where('id', $req->id)->first();
        $product->delete();
      return redirect()->back()->with('message','Product Delete  Succesfully');

    }
    public function productupdate(Request $req){
        $product = product::where('id', $req->id)->first();
        $cff = Catagory::all();
      return view('admin.updateproduct')
      ->with('data',$product)
      ->with('catagory',$cff );

    }
    public function updateproducts(Request $req){
        $product = product::where('id', $req->id)->first();
        $product->title = $req->title;
        $product->description = $req->description;
        $product->catagory = $req->catagory;
        $product->price = $req->price;
        $product->discountprice = $req->discountprice;
        $product->quantity = $req->quantity;
        $product->title = $req->title;

        $image = $req->image;
        if($image){
            $imagename= time().'.'.$image->getClientOriginalExtension();
        $req->image->move('product',$imagename);
        $product->image =  $imagename;

        }


       $product->update();
        return redirect()->back()->with('message','Product Update  Succesfully');

    }
}

<?php

namespace App\Http\Controllers;

use App\Models\Catagory;
use App\Models\Order;
use App\Models\product;
use Illuminate\Http\Request;
use Notification;
use PDF;
use App\Notifications\MyNotification;


class AdminController extends Controller
{
    //
    public function viewcatagory()
    {
        $data = Catagory::all();
        return view('admin.catagory')->with('data', $data);
    }
    public function addcatagory(Request $req)
    {
        $data = new Catagory();
        $data->catagory_name = $req->catagory;
        $data->save();
        return redirect()->back()->with('message', 'Catagory Added Succesfully');
    }
    public function deletecatagory(Request $req)
    {

        $data = Catagory::where('id', $req->id)->first();
        $data->delete();
        return redirect()->back()->with('message', 'Catagory Delete Succesfully');
    }
    public function viewproduct(Request $req)
    {

        $data = Catagory::all();
        return  view('admin.product')->with('data', $data);
    }

    public function addproducts(Request $req)
    {
        $product = new product();
        $product->title = $req->title;
        $product->description = $req->description;
        $product->catagory = $req->catagory;
        $product->price = $req->price;
        $product->discountprice = $req->discountprice;
        $product->quantity = $req->quantity;
        $product->title = $req->title;

        $image = $req->image;
        $imagename = time() . '.' . $image->getClientOriginalExtension();
        $req->image->move('product', $imagename);
        $product->image =  $imagename;

        $product->save();
        return redirect()->back()->with('message', 'Product Add  Succesfully');
    }
    public function showproduct(Request $req)
    {

        $product = product::all();
        return  view('admin.showproduct')->with('product', $product);
    }
    public function productdelete(Request $req)
    {
        $product = product::where('id', $req->id)->first();
        $product->delete();
        return redirect()->back()->with('message', 'Product Delete  Succesfully');
    }
    public function productupdate(Request $req)
    {
        $product = product::where('id', $req->id)->first();
        $cff = Catagory::all();
        return view('admin.updateproduct')
            ->with('data', $product)
            ->with('catagory', $cff);
    }
    public function updateproducts(Request $req)
    {
        $product = product::where('id', $req->id)->first();
        $product->title = $req->title;
        $product->description = $req->description;
        $product->catagory = $req->catagory;
        $product->price = $req->price;
        $product->discountprice = $req->discountprice;
        $product->quantity = $req->quantity;
        $product->title = $req->title;

        $image = $req->image;
        if ($image) {
            $imagename = time() . '.' . $image->getClientOriginalExtension();
            $req->image->move('product', $imagename);
            $product->image =  $imagename;
        }


        $product->update();
        return redirect()->back()->with('message', 'Product Update  Succesfully');
    }
    public function vieworder(Request $req)
    {

        $order = Order::all();
        return  view('admin.vieworder')->with('order', $order);
    }
    public function delivered(Request $req)
    {

        $order = Order::where('id', $req->id)->first();

        $order->deliverystatus = "Complete";
        $order->paymentstatus = "Paid";
        $order->update();
        return  redirect()->back()->with('message', 'order status update  Succesfully');
    }
    public function pdfview($id)
    {

        $order = Order::find($id);
        $pdf = PDF::loadView('admin.pdf', compact('order'));
        return $pdf->download('OrderDetails.pdf');
        //return view('admin.test')->with('order',$orders);




    }
    public function sendemail(Request $req)
    {

        $order = Order::where('id', $req->id)->first();
        return view('admin.emailinfo')->with('order',$order );
    }
    public function senduseremail(Request $req)
    {

        $order = Order::where('id', $req->id)->first();
        $details =[
            'greeting'=>$req->greeting,
            'firsline'=>$req->firsline,
            'body'=>$req->body,
            'button'=>$req->button,
            'url'=>$req->url,
            'lastline'=>$req->lastline,


        ];
        Notification::send($order, new MyNotification($details));

        return view('admin.emailinfo')->with('order',$order );
    }
    public function search(Request $req){
        $searchtext =$req->search;
        $order = Order::where('name', 'LIKE',"%$searchtext%")
        ->orwhere('email', 'LIKE',"%$searchtext%")
        ->orwhere('phone', 'LIKE',"%$searchtext%")
        ->orwhere('address', 'LIKE',"%$searchtext%")
        ->orwhere('producttitle', 'LIKE',"%$searchtext%")
        ->orwhere('product_id', 'LIKE',"%$searchtext%")->get();
        return  view('admin.vieworder')->with('order', $order);
    }
}

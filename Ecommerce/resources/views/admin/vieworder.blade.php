<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    @include('admin.css')
    <style>
        .htag{
            text-align: center;
            font-size: 25ps;
            font-weight: bold;
            padding: 10px 0;
        }
        .vieworder{

            width: 70%;
            padding-top: 40px;
            margin: auto;


        }
        .content-wrapper{
            background: rgba(117, 154, 175, 0.488);
        }
        #sds {

            background-color: rgb(5, 108, 204);

        }
       #thname{
        text-align: center;
            color: rgb(255, 255, 255);
            padding: 10px;
        }
        .table-data{
            text-align: center;
            color: white;
            padding: 0 10px;
        }
    </style>
  </head>
  <body>
    <div class="container-scroller">

     @include('admin.sidebar')
      <!-- partial -->
      @include('admin.header')
        <!-- partial -->
        <div class="main-panel">
            <div class="content-wrapper">
                <div class="">
                <h6 class="htag">All Order</h6>

                    <table class="vieworder table-bordered ">
                        <thead>
                          <tr id="sds" >
                            <th  id="thname">Name</th>
                            <th  id="thname">Email</th>
                            <th  id="thname">Phone</th>
                            <th  id="thname">Address</th>
                            <th id="thname">Product</th>
                            <th id="thname" >Quantity</th>
                            <th id="thname">Price</th>
                            <th  id="thname">Payment Status</th>
                            <th id="thname">Delivery Status</th>
                            <th id="thname" style="width:250px" >Image</th>
                          </tr>
                        </thead>
                        <tbody>
                            @foreach ($order as $order )
                            <tr>
                                <td  class="table-data" >{{$order->name}}</td>
                                <td class="table-data">{{$order->email}}</td>
                                <td class="table-data">{{$order->phone}}</td>
                                <td class="table-data">{{$order->address}}</td>
                                <td class="table-data" >{{$order->producttitle}}</td>
                                <td class="table-data">{{$order->quantity}}</td>
                                <td class="table-data">{{$order->price}}</td>
                                <td class="table-data">{{$order->paymentstatus}}</td>
                                <td class="table-data">{{$order->deliverystatus}}</td>

                                <td><img style="" src="/product/{{$order->image}}" alt=""></td>
                              </tr>


                            @endforeach


                      </table>
                </div>

            </div>
            </div>


    <!-- container-scroller -->
    <!-- plugins:js -->
@include('admin.script')
    <!-- End custom js for this page -->
  </body>
</html>

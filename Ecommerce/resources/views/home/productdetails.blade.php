<!DOCTYPE html>
<html>
   <head>
    <base  href="/public">
      <!-- Basic -->
      <meta charset="utf-8" />
      <meta http-equiv="X-UA-Compatible" content="IE=edge" />
      <!-- Mobile Metas -->
      <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
      <!-- Site Metas -->
      <meta name="keywords" content="" />
      <meta name="description" content="" />
      <meta name="author" content="" />
      <link rel="shortcut icon" href="images/favicon.png" type="">
      <title>Famms - Fashion HTML Template</title>
      <!-- bootstrap core css -->
      <link rel="stylesheet" type="text/css" href="home/css/bootstrap.css" />
      <!-- font awesome style -->
      <link href="home/css/font-awesome.min.css" rel="stylesheet" />
      <!-- Custom styles for this template -->
      <link href="home/css/style.css" rel="stylesheet" />
      <!-- responsive style -->
      <link href="home/css/responsive.css" rel="stylesheet" />
   </head>
   <body>
      <div class="hero_area">
         @include('home.header')
         <!-- end header section -->
         <!-- slider section -->

         <!-- end slider section -->

      <div class="col-sm-6 col-md-4 col-lg-4" style="margin: auto;padding:30px;width:50%">
        <div class="box">
           {{-- <div class="option_container">
              <div class="options">
                 <a href="{{url('productdetails',$product->id)}}" class="option1">
               Product Details
                 </a>
                 <a href="" class="option2">
                 Buy Now
                 </a>
              </div>
           </div> --}}
           <div class="img-box">
              <img style="width: 200px" src="product/{{$product->image}}" alt="">
           </div>
           <div class="detail-box">
              <h5>
                {{$product->title}}
              </h5>

              @if($product->discountprice !=null)
              <h6 style="color:rgb(255, 32, 32)">

               Discount Price : ${{$product->discountprice}}

              </h6>
              <h6 style="text-decoration:line-through;color:blue">
               Price
               :
                ${{$product->price}}
              </h6>


              @else
              <h6>
                Price
               :
                ${{$product->price}}
              </h6>

              @endif
              <h6>Catagory : {{$product->catagory}}</h6>
              <h6>Details  : {{$product->description}}</h6>
              <h6>Quantity : {{$product->quantity}}</h6>

              <form style="padding-top: 40px" action="{{url('addcart',$product->id)}}" method="POST">
                @csrf
                <div class="row">
                    <div class="col-md-4"><input type="number" style="width:60px;height:50px" name="quantity" min="1" value="1" ></div>
                    <div class="col-md-4"> <input  type="submit" value="Add To Cart"></div>
                </div>



             </form>
           </div>
        </div>
     </div>
      
      @include('home.footer')

      <!-- footer end -->
      <div class="cpy_">
         <p class="mx-auto">© 2021 All Rights Reserved By <a href="https://html.design/">Free Html Templates</a><br>

            Distributed By <a href="https://themewagon.com/" target="_blank">ThemeWagon</a>

         </p>
      </div>
      <!-- jQery -->
      <script src="home/js/jquery-3.4.1.min.js"></script>
      <!-- popper js -->
      <script src="home/js/popper.min.js"></script>
      <!-- bootstrap js -->
      <script src="home/js/bootstrap.js"></script>
      <!-- custom js -->
      <script src="home/js/custom.js"></script>
   </body>
</html>
<!DOCTYPE html>
<html>
   <head>
    <base href="/public">
      <!-- Basic -->
      <meta charset="utf-8" />
      <meta http-equiv="X-UA-Compatible" content="IE=edge" />
      <!-- Mobile Metas -->
      <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
      <!-- Site Metas -->
      <meta name="keywords" content="" />
      <meta name="description" content="" />
      <meta name="author" content="" />
      <link rel="shortcut icon" href="user/images/favicon.png" type="">
      <title>All Products</title>
      <!-- bootstrap core css -->
      <link rel="stylesheet" type="text/css" href="{{asset('user/css/bootstrap.css')}}" />
      <!-- font awesome style -->
      <link href="{{asset('user/css/font-awesome.min.css')}}" rel="stylesheet" />
      <!-- Custom styles for this template -->
      <link href="{{asset('user/css/style.css')}}" rel="stylesheet" />
      <!-- responsive style -->
      <link href="{{asset('user/css/responsive.css')}}" rel="stylesheet" />
   </head>
   <body>
      <div class="hero_area">
         <!-- header section strats -->
        @include('user.header')
         <!-- end header section -->
    
    
        
           <!-- inner page section -->
      <section class="inner_page_head">
        <div class="container_fuild">
           <div class="row">
              <div class="col-md-12">
                 <div class="full">
                    <h3>Our Products</h3>
                 </div>
              </div>
           </div>
        </div>
     </section>
     <!-- end inner page section -->
     <!-- product section -->
     <section class="product_section layout_padding">
        <div class="container">
           <div class="heading_container heading_center">
            <div class="col-md-12">
                <form action="{{url('searchallproducts')}}" method="get">
                   @csrf
                   <div class="form-row row">
                       <div class="col-md-12 ">
                           <input  type="text" name="search" placeholder="search the product">
                           <button type="submit" class="btn bg-danger text-light">Search</button>
                       </div>
                   </div>
               </form>
           </div>
           <div class="row">
            @foreach($product_detail as $product_details)
              <div class="col-sm-6 col-md-4 col-lg-3">
                 <div class="box">
                    <div class="option_container">
                       <div class="options">
                          <a href="" class="option1">
                          Men's Shirt
                          </a>
                          <a href="" class="option2">
                          Buy Now
                          </a>
                       </div>
                    </div>
                    <div class="img-box">
                        <img src="productimage/{{$product_details->image}}" alt="">
                    </div>
                    <div class="detail-box">
                       <h5>
                          {{$product_details->title}}
                       </h5>
                             

                    </div>
                    <div>
                        @if($product_details->discount_price != null)
                       
                        <h6 class="text-danger">
                          Discount<br>
                          ${{$product_details->discount_price}}
                        </h6>
  
                        <h6 class="text-primary" >
                          Price <br>
                          <p style="text-decoration: line-through">${{$product_details->price}}</p>
                        </h6>
                     
                     @else
 
                     <h6 class="text-primary" >
                       Price <br>
                       ${{$product_details->price}}
                     </h6>
  
                     
                     @endif
 
                    </div>
                    <div >
                        <h6 class="text-dark" >
                            Quantity : {{$product_details->quantity}}
                          </h6>
                        </div>
                    <div >
                    <h6 class="text-dark" >
                                       Category : {{$product_details->category}}
                    </h6>
                    </div>    
                    <div >
                     <h6 class="text-dark" >
                                Description : {{$product_details->description}}
                    </h6>
                    </div>

                 </div>
              </div>
              @endforeach
           </div>
     <!-- end product section -->
     <div class="container ml-5 mt-5">
        <center style="display: flex; justify-content:center;">
           {!!$product_detail->withQueryString()->links('pagination::bootstrap-4')!!}
        </center>
     </div>
        </div>
     </section>

   
      
      <!-- footer start -->
       @include('user.footer')
      <!-- footer end -->
      <div class="cpy_">
         <p class="mx-auto">© 2021 All Rights Reserved By <a href="https://html.design/">Free Html Templates</a><br>
         
            Distributed By <a href="https://themewagon.com/" target="_blank">ThemeWagon</a>
         
         </p>
      </div>
      <!-- jQery -->
      <script src="user/js/jquery-3.4.1.min.js"></script>
      <!-- popper js -->
      <script src="user/js/popper.min.js"></script>
      <!-- bootstrap js -->
      <script src="user/js/bootstrap.js"></script>
      <!-- custom js -->
      <script src="user/js/custom.js"></script>
   </body>
</html>
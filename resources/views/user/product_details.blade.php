<!DOCTYPE html>
<html>
   <head>
   
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
      <title>Ecommese Homepage</title>
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
    
    
     
      <section class="product_section layout_padding">
        <div class="container">
           <div class="heading_container heading_center">
              <h2>
                 Product <span>Details</span>
              </h2>
           </div>
         <center>
              <div class="col-sm-6 col-md-4 col-lg-4">
                 <div class="box" >
                    
                    <div class="img-box">
                       <img src="/productimage/{{$product_details->image}}" alt="">
                    </div>
                    <div class="detail-box">
                       <h5>
                          {{$product_details->title}}
                       </h5>
    
                       {{-- if product has no discount in that case we will be seing nothing --}}
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
                    <h5>
                        <b>Quantity</b> <span>{{$product_details->quantity}}</span>
                    </h5>
                    <h5>
                        <b>Description</b> <span>{{$product_details->description}}</span>
                    </h5>
                    <h5>
                        <b>Category</b> <span>{{$product_details->category}}</span>
                    </h5>

                    <form action="{{url('addtocart',$product_details->id)}}" method="post">
                        @csrf
                        <div class="row">
                           <div class="col-md-4">
                              <input value="1" type="number" name="addtocart_quantity" class="bg-dark text-light" min="1" id="">
                           </div>

                           <div class="col-md-6">
                              <input  type="submit" value="Add to Cart" class="bg-danger text-light">
                           </div>
                     </div>
                     </form>
                    {{-- <a href="" class="btn btn-lg bg-danger text-light">Add to Cart</a> --}}
                 </div>
 
              </div>
         

            </center>
            
          </div>
          
           {{-- <div class="btn-box">
              <a href="">
              View All products
              </a>
           </div> --}}
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
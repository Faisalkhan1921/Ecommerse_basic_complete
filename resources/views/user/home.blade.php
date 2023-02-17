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

      @include('sweetalert::alert')

      <div class="hero_area">
         <!-- header section strats -->
        @include('user.header')
         <!-- end header section -->
         <!-- slider section -->
       @include('user.slider')
         <!-- end slider section -->
      </div>
      <!-- why section -->
       @include('user.whyshopwithus')
      <!-- end why section -->
      
      <!-- arrival section -->
       @include('user.newarrivals')
      <!-- end arrival section -->
      
      <!-- product section -->
       @include('user.products')
      <!-- end product section -->

      {{-- comment system  --}}
      @include('user.comment_reply')
      {{-- comment system ends here  --}}

      <!-- subscribe section -->
       @include('user.subcribe')
      <!-- end subscribe section -->
      <!-- client section -->
       @include('user.testimonials')
      <!-- end client section -->
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
<header class="header_section">
    <div class="container">
       <nav class="navbar navbar-expand-lg custom_nav-container ">
          <a class="navbar-brand" href="{{url('/')}}"><img width="250" src="/user/images/logo.png" alt="#" /></a>
          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class=""> </span>
          </button>
          <div class="collapse navbar-collapse" id="navbarSupportedContent">
             <ul class="navbar-nav">
                <li class="nav-item active">
                   <a class="nav-link" href="{{url('/')}}">Home <span class="sr-only">(current)</span></a>
                </li>
               <li class="nav-item dropdown">
                   <a class="nav-link dropdown-toggle" href="#" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="true"> <span class="nav-label">Pages <span class="caret"></span></a>
                   <ul class="dropdown-menu">
                      <li><a href="user/about.html">About</a></li>
                      <li><a href="user/testimonial.html">Testimonial</a></li>
                   </ul>
                </li>
                <li class="nav-item">
                   <a class="nav-link" href="{{url('allproducts')}}">Products</a>
                </li>
                <li class="nav-item">
                   <a class="nav-link" href="blog_list.html">Blog</a>
                </li>
                <li class="nav-item">
                   <a class="nav-link" href="contact.html">Contact</a>
                </li>

                
                <li class="nav-item">
                  <a class="nav-link" href="{{url('show_cart')}}">Cart</a>
               </li>
               
               <li class="nav-item">
                  <a class="nav-link" href="{{url('orderdata')}}">Order</a>
               </li>
                @if(Route::has('login'))
              
                @auth 
                {{-- logout  --}}
                <li class="nav-item">
                    <x-app-layout>
                    </x-app-layout>
                   
                 </li>
                 @else
                {{-- login  --}}
                <li class="nav-item">
                    <a  style="border-radius: 15px;" class="btn bg-danger text-light mr-2" href="{{route('login')}}">Login</a>
                 </li>
                 {{-- register  --}}
                 <li class="nav-item">
                    <a style="border-radius: 15px;"  class="btn bg-danger text-light" href="{{route('register')}}">Register</a>
                 </li>
                 @endauth
                 @endif

               
                <form class="form-inline">
                   <button class="btn  my-2 my-sm-0 nav_search-btn" type="submit">
                   <i class="fa fa-search" aria-hidden="true"></i>
                   </button>
                </form>

               
             </ul>
          </div>
       </nav>
    </div>
 </header>

<div class="container-fluid">
  
</div>
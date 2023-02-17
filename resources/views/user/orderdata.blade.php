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
      
        {{-- modal code --}}
<!-- Button trigger modal -->

  
  <!-- Modal -->
  <div  class="modal fade" id="modal" tabindex="-1" role="dialog" aria-labelledby="modalTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLongTitle">Make an Order</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <h1 class="">Proceed to Order</h1>
                    </div>

                    <div class="col-md-6">
                       <a href="{{url('cashon_delivery')}}" class="btn bg-info text-light">Cash on Delivery</a>             
                    
                    </div>

                    <div class="col-md-6">
                        <?php $totalamount=0;?>
        
                        @foreach($orderdata as $order)
                        <?php $totalamount = $totalamount + $order->price ?>
                        @endforeach
                        <a href="{{url('stripe',$totalamount)}}" class="btn bg-success text-light">Pay Using Cards</a>
                    </div>
                </div>
            </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn bg-cancel text-primary" data-dismiss="modal">Close</button>
          {{-- <button type="button" class="btn bg-primary">Save changes</button> --}}
        </div>
      </div>
    </div>
  </div>



        <div class="container mt-5">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header bg-danger">
                            <h1 class="text-center text-light">Show Categories</h1>

                            
                        </div>

                        <div class="card-body">
                            
                            @if(session()->has('order_place'))
                            <div class="alert alert-success alert-dismissible fade show" role="alert">
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                    <span class="sr-only">Close</span>
                                </button>
                                {{session()->get('order_place')}}
                            </div>
                            
                            @endif

                            @if(session()->has('cancelorder'))
                            <div class="alert alert-success alert-dismissible fade show" role="alert">
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                    <span class="sr-only">Close</span>
                                </button>
                                {{session()->get('cancelorder')}}
                            </div>
                            
                            @endif
                            
                            <table class="table">
                                <thead  >
                                <tr >
                                    {{-- <th >sno</th> --}}
                                    <th >Image</th>
                                    {{-- <th >name</th>
                                    <th >email</th>
                                    <th >phone</th>
                                    <th >address</th> --}}
                                    <th >product_title</th>
                                    <th >Price</th>
                                    <th >Quantity</th>
                                    <th >Category</th>
                                    <th>Payment Status</th>
                                    <th>Delivery Status</th>
                                    {{-- <th >Update</th> --}}
                                    <th >Cancel</th>
                                    {{-- <th>Order</th> --}}
                                    {{-- <th>Remove</th> --}}
                                </tr>
                            </thead>

                         
                            @foreach($orderdata as $order)
                            <tbody   >
                                <tr>
                                    {{-- <td >{{$show_carts->id}}</td> --}}
                                    <td >
                                        <img src="productimage/{{$order->image}}" width="50" height="30" alt="">
                                    </td>
                                   
                                    <td  >{{$order->product_title}}</td>
                                    <td  >{{$order->price}}</td>
                                    <td  >{{$order->quantity}}</td>
                                    <td  >{{$order->category}}</td>
                                    
                                    @if($order->payment_status == 'Paid')
                                    <td  style="border: 2px solid grey" class="bg-success text-light">{{$order->payment_status}}</td>

                                    @else
                                    <td  style="border: 2px solid grey" class="bg-danger text-light">{{$order->payment_status}}</td>
                                    @endif

                                    @if($order->delivery_status=='Shipped')
                                    <td  style="border: 2px solid grey" class="bg-success text-light">{{$order->delivery_status}}</td>
                                    @else
                                    <td  style="border: 2px solid grey" class="bg-danger text-light">{{$order->delivery_status}}</td>
                                   
                                    @endif

                                    @if($order->delivery_status =='Shipped')
                                    <td>Paid</td>
                                    @elseif($order->delivery_status == 'Cancelled')
                                    <td>Cancelled</td>
                                    @else
                                    <td >
                                      <a onclick="return confirm('Are you sure want to Cancel this')" href="{{url('cancelorder',$order->id)}}" class="btn-sm btn bg-danger text-light">Cacel</a>
                                    </td>
                                    @endif
                                   

                                </tr>
                            </tbody>

                            <?php $totalamount = $totalamount + $order->price ?>
                          @endforeach
                            </table>
                           

                                      
                        </div>
                        <div class="container ml-5 mt-5">
                            <center style="display: flex; justify-content:center;">
                   
                               {!!$orderdata->withQueryString()->links('pagination::bootstrap-4')!!}
                            </center>
                         </div>
                    </div>
                </div>
            </div>
        </div>

       @include('user.footer')
      <!-- footer end -->
      <div class="cpy_">
         <p class="mx-auto">© 2021 All Rights Reserved By <a href="https://html.design/">Free Html Templates</a><br>
         
            Distributed By <a href="https://themewagon.com/" target="_blank">ThemeWagon</a>
         
         </p>
      </div>
      <script>
        document.addEventListener("DOMContentLoaded", function(event) { 
            var scrollpos = localStorage.getItem('scrollpos');
            if (scrollpos) window.scrollTo(0, scrollpos);
        });
    
        window.onbeforeunload = function(e) {
            localStorage.setItem('scrollpos', window.scrollY);
        };
    </script>
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
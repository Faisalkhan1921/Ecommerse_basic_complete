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

      <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js" integrity="sha512-AA1Bzp5Q0K1KanKKmvN/4d3IRKVlv9PYgwFPvm32nPO6QS8yH1HO7LbgB1pgiOxPtfeg5zEn2ba64MUcqJx6CA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
   </head>
   <body>

    @include('sweetalert::alert')
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
        
                        @foreach($show_cart as $show_carts)
                        <?php $totalamount = $totalamount + $show_carts->price ?>
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
                            {{-- <div class="alert alert-success">
                                <button type="button" class="close" data-dismiss="alert">
                                    x
                                </button>

                                {{session()->get('message')}}
                            </div> --}}
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
                                    {{-- <th >Update</th> --}}
                                    <th >Remove</th>
                                    {{-- <th>Order</th> --}}
                                    {{-- <th>Remove</th> --}}
                                </tr>
                            </thead>

                            <?php $totalamount=0;?>
        
                            @foreach($show_cart as $show_carts)
                            <tbody   >
                                <tr>
                                    {{-- <td >{{$show_carts->id}}</td> --}}
                                    <td >
                                        <img src="productimage/{{$show_carts->image}}" width="50" height="30" alt="">
                                    </td>
                                    {{-- <td  >{{$show_carts->name}}</td>
                                    <td  >{{$show_carts->email}}</td>
                                    <td  >{{$show_carts->phone}}</td>
                                    <td  >{{$show_carts->address}}</td> --}}
                                    <td  >{{$show_carts->product_title}}</td>
                                    <td  >{{$show_carts->price}}</td>
                                    <td  >{{$show_carts->quantity}}</td>
                                    <td  >{{$show_carts->category}}</td>
                          

                                   
                                    {{-- <td  >
                                          <a  href="{{url('update_product_view',$show_carts->id)}}" class="btn btn-sm bg-success text-light">Update</a>
                                    </td> --}}

                                    <td >
                                      <a onclick="confirmation(event)" href="{{url('removefrom_cart',$show_carts->id)}}" class="btn-sm btn bg-danger text-light">Remove</a>
                                    </td>

                                    <td >
                                        {{-- <button  type="button" class="btn bg-success text-light" data-toggle="modal" data-target="#modal">
                                            Order
                                          </button> --}}
                                      </td>
                                </tr>
                            </tbody>

                            <?php $totalamount = $totalamount + $show_carts->price ?>
                          @endforeach
                            </table>
                           
                                        <h1 class="text-center bg-danger">Total Price : <span>{{$totalamount}} </span></h1>
                                    
                             
                                        <button  type="button" class="form-control btn bg-success text-light" data-toggle="modal" data-target="#modal">
                                            Order All
                                          </button>
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
      <!-- jQery -->
      <script src="user/js/jquery-3.4.1.min.js"></script>
      <!-- popper js -->
      <script src="user/js/popper.min.js"></script>
      <!-- bootstrap js -->
      <script src="user/js/bootstrap.js"></script>
      <!-- custom js -->
      <script src="user/js/custom.js"></script>

      <script>
        function confirmation(ev) {
          ev.preventDefault();
          var urlToRedirect = ev.currentTarget.getAttribute('href');  
          console.log(urlToRedirect); 
          swal({
              title: "Are you sure to cancel this product",
              text: "You will not be able to revert this!",
              icon: "warning",
              buttons: true,
              dangerMode: true,
          })
          .then((willCancel) => {
              if (willCancel) {
  
  
                   
                  window.location.href = urlToRedirect;
                 
              }  
  
  
          });
  
          
      }
  </script>
  
  
   </body>
</html>
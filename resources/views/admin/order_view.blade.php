<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Corona Admin</title>
    <!-- plugins:css -->
    @include('admin.css')

    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js" integrity="sha512-AA1Bzp5Q0K1KanKKmvN/4d3IRKVlv9PYgwFPvm32nPO6QS8yH1HO7LbgB1pgiOxPtfeg5zEn2ba64MUcqJx6CA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
  </head>
  <body>
    @include('sweetalert::alert')
    <div class="container-scroller">
    
      <!-- partial:partials/_sidebar.html -->
     @include('admin.sidebar')
    
      @include('admin.navbarr')

        <div class="container-fluid page-body-wrapper">
       
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">

                            <div class="card-header bg-success">
                                <h1 class="text-center text-light">Display Orders
                                </h1>
                            </div>

                            <div class="card-body">
                              <a class="bg-danger btn-sm btn" href="{{url('pdfall')}}">PDF all</a>

                                <form action="{{url('search')}}" method="get">
                                    @csrf
                                    <div class="form-row row">
                                        <div class="col-md-6 mb-2">
                                            <input class="bg-dark text-light" type="text" name="search" placeholder="search the product">
                                            <button type="submit" class="btn bg-danger text-light">Search</button>
                                        </div>
                                    </div>
                                </form>
                                
                                @if(session()->has('delete_product_message'))
                                <div class="alert alert-success alert-dismissible fade show" role="alert">
                                    <button type="button" class="close" data-bs-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                        <span class="sr-only">Close</span>
                                    </button>
                                    {{session()->get('delete_product_message')}}
                                </div>
                                {{-- <div class="alert alert-success">
                                    <button type="button" class="close" data-dismiss="alert">
                                        x
                                    </button>

                                    {{session()->get('message')}}
                                </div> --}}
                                @endif
                                
                                <table style="border: 2px solid grey">
                                    <thead  >
                                    <tr style="border: 2px solid grey">
                                        <th style="border: 2px solid grey">sno</th>
                                        <th style="border: 2px solid grey">Image</th>
                                        <th style="border: 2px solid grey">Name</th>
                                        <th style="border: 2px solid grey">Email</th>
                                        <th style="border: 2px solid grey">Phone</th>
                                        <th style="border: 2px solid grey">Address</th>
                                        <th style="border: 2px solid grey">Product Title</th>
                                        <th style="border: 2px solid grey">Price</th>
                                        <th style="border: 2px solid grey">Quantity</th>
                                        <th style="border: 2px solid grey">Category</th>
                                        <th style="border: 2px solid grey">Payment Status</th>
                                        <th style="border: 2px solid grey">Delivery Status</th>
                                        <th style="border: 2px solid grey">Delivery</th>
                                        <th style="border: 2px solid grey">PDF</th>
                                        <th style="border: 2px solid grey">Send Email</th>
                                        {{-- <th>Remove</th> --}}
                                    </tr>
                                </thead>
            
                                @forelse($show_order_data as $show_order_datas)
                                <tbody   style="border: 2px solid grey">
                                    <tr>
                                        <td style="border: 2px solid grey">{{$show_order_datas->id}}</td>
                                        <td style="border: 2px solid grey">
                                            <img src="productimage/{{$show_order_datas->image}}" width="50" height="30" alt="">
                                        </td>
                                        <td  style="border: 2px solid grey">{{$show_order_datas->name}}</td>
                                        <td  style="border: 2px solid grey">{{$show_order_datas->email}}</td>
                                        <td  style="border: 2px solid grey">{{$show_order_datas->phone}}</td>
                                        <td  style="border: 2px solid grey">{{$show_order_datas->address}}</td>
                                        <td  style="border: 2px solid grey">{{$show_order_datas->product_title}}</td>
                                        <td  style="border: 2px solid grey">{{$show_order_datas->price}}</td>
                                        <td  style="border: 2px solid grey">{{$show_order_datas->quantity}}</td>
                                        <td  style="border: 2px solid grey">{{$show_order_datas->category}}</td>
                                        @if($show_order_datas->payment_status == 'Paid')
                                        <td  style="border: 2px solid grey" class="bg-success text-light">{{$show_order_datas->payment_status}}</td>

                                        @else
                                        <td  style="border: 2px solid grey" class="bg-danger text-light">{{$show_order_datas->payment_status}}</td>
                                        @endif

                                        @if($show_order_datas->delivery_status=='Shipped')
                                        <td  style="border: 2px solid grey" class="bg-success text-light">{{$show_order_datas->delivery_status}}</td>
                                        @else
                                        <td  style="border: 2px solid grey" class="bg-danger text-light">{{$show_order_datas->delivery_status}}</td>
                                       
                                        @endif
                              

                                     
                       
                                      @if($show_order_datas->delivery_status=='Shipped')
                                      <td style="border: 2px solid grey">Shipped</td>
                                      @else
                                      <td style="border: 2px solid grey">
                                        <a onclick="confirmation(event)" href="{{url('delivered',$show_order_datas->id)}}" class="btn-sm btn bg-primary text-light">Delivered</a>
                                      </td>
                                      @endif

                                      <td style="border: 2px solid grey">
                                        <a  href="{{url('print_pdf',$show_order_datas->id)}}" class="btn-sm btn bg-secondary text-light">Download PDF</a>
                                      </td>

                                      <td style="border: 2px solid grey">
                                        <a  href="{{url('send_email',$show_order_datas->id)}}" class="btn-sm btn bg-primary text-light">Send Email</a>
                                      </td>
                                    </tr>
                                </tbody>

                                @empty
                               <tr>
                                <td class="bg-warning text-light text-center"><p>No Record Found</p></td>
                               </tr>
                              @endforelse
                         

                                </table>
                                <div class="container ml-5 mt-5">
                                  <center style="display: flex; justify-content:center;">
                         
                                     {!!$show_order_data->withQueryString()->links('pagination::bootstrap-4')!!}
                                  </center>
                               </div>                                


                            </div>
                        </div>
                    </div>
                </div>
            </div>

         <!-- page-body-wrapper ends -->
       </div>

    </div>
       @include("admin.script")
       <script>
        function confirmation(ev) {
          ev.preventDefault();
          var urlToRedirect = ev.currentTarget.getAttribute('href');  
          console.log(urlToRedirect); 
          swal({
              title: "Are you sure Product is Shipped and Payments are made",
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
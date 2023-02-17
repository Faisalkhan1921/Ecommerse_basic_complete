<x-app-layout>
    {{-- <h1>This is a Admin Panel</h1> --}}
   </x-app-layout>
   
   
   <!DOCTYPE html>
   <html lang="en">
     <head>
       <!-- Required meta tags -->

     @include('admin.css')
     <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js" integrity="sha512-AA1Bzp5Q0K1KanKKmvN/4d3IRKVlv9PYgwFPvm32nPO6QS8yH1HO7LbgB1pgiOxPtfeg5zEn2ba64MUcqJx6CA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
     </head>
     <body>
      @include('sweetalert::alert')
       <div class="container-scroller">
         <div class="row p-0 m-0 proBanner" id="proBanner">
           <div class="col-md-12 p-0 m-0">
             <div class="card-body card-body-padding d-flex align-items-center justify-content-between">
               <div class="ps-lg-1">
                 <div class="d-flex align-items-center justify-content-between">
                   <p class="mb-0 font-weight-medium me-3 buy-now-text">Free 24/7 customer support, updates, and more with this template!</p>
                   <a href="https://www.bootstrapdash.com/product/corona-free/?utm_source=organic&utm_medium=banner&utm_campaign=buynow_demo" target="_blank" class="btn me-2 buy-now-btn border-0">Get Pro</a>
                 </div>
               </div>
               <div class="d-flex align-items-center justify-content-between">
                 <a href="https://www.bootstrapdash.com/product/corona-free/"><i class="mdi mdi-home me-3 text-white"></i></a>
                 <button id="bannerClose" class="btn border-0 p-0">
                   <i class="mdi mdi-close text-white me-0"></i>
                 </button>
               </div>
             </div>
           </div>
         </div>
         @include('admin.sidebar')
        
        @include('admin.navbar')

        <div class="container-fluid page-body-wrapper">
       
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header bg-danger">
                                <h1 class="text-center text-light">Show Products</h1>

                                
                            </div>

                            <div class="card-body">
                                
                                @if(session()->has('delete_product_message'))
                                <div class="alert alert-success alert-dismissible fade show" role="alert">
                                    <button type="button" class="close" data-bs-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                        <span class="sr-only">Close</span>
                                    </button>
                                    {{session()->get('delete_product_message')}}
                                </div>
                            
                                @endif
                                
                                <table style="border: 2px solid grey">
                                    <thead  >
                                    <tr style="border: 2px solid grey">
                                        <th style="border: 2px solid grey">sno</th>
                                        <th style="border: 2px solid grey">Image</th>
                                        <th style="border: 2px solid grey">Title</th>
                                        <th style="border: 2px solid grey">Description</th>
                                        <th style="border: 2px solid grey">Category</th>
                                        <th style="border: 2px solid grey">Quantity</th>
                                        <th style="border: 2px solid grey">Price</th>
                                        <th style="border: 2px solid grey">Discount Price</th>
                                        <th style="border: 2px solid grey">Update</th>
                                        <th style="border: 2px solid grey">Delete</th>
                                        {{-- <th>Remove</th> --}}
                                    </tr>
                                </thead>
            
                                @foreach($show_product as $show_products)
                                <tbody   style="border: 2px solid grey">
                                    <tr>
                                        <td style="border: 2px solid grey">{{$show_products->id}}</td>
                                        <td style="border: 2px solid grey">
                                            <img src="productimage/{{$show_products->image}}" width="50" height="30" alt="">
                                        </td>
                                        <td  style="border: 2px solid grey">{{$show_products->title}}</td>
                                        <td  style="border: 2px solid grey">{{$show_products->description}}</td>
                                        <td  style="border: 2px solid grey">{{$show_products->category}}</td>
                                        <td  style="border: 2px solid grey">{{$show_products->quantity}}</td>
                                        <td  style="border: 2px solid grey">{{$show_products->price}}</td>
                                        <td  style="border: 2px solid grey">{{$show_products->discount_price}}</td>
                              

                                       
                                        <td  style="border: 2px solid grey">
                                              <a  href="{{url('update_product_view',$show_products->id)}}" class="btn btn-sm bg-success text-light">Update</a>
                                        </td>
    
                                        <td style="border: 2px solid grey">
                                          <a onclick="confirmation(event)" href="{{url('delete_product',$show_products->id)}}" class="btn-sm btn bg-danger text-light">Remove</a>
                                        </td>
                                    </tr>
                                </tbody>
                              @endforeach
                                </table>
                                


                            </div>
                        </div>
                    </div>
                </div>
            </div>

         <!-- page-body-wrapper ends -->
       </div>

       <script>
        function confirmation(ev) {
          ev.preventDefault();
          var urlToRedirect = ev.currentTarget.getAttribute('href');  
          console.log(urlToRedirect); 
          swal({
              title: "Are you sure want to remove this product",
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
       @include("admin.script")

      
     </body>
   </html>
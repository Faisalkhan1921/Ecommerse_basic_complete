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
                                <h1 class="text-center text-light">Show Categories</h1>

                                
                            </div>

                            <div class="card-body">
                                
                                @if(session()->has('delete_category_message'))
                                <div class="alert alert-success alert-dismissible fade show" role="alert">
                                    <button type="button" class="close" data-bs-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                        <span class="sr-only">Close</span>
                                    </button>
                                    {{session()->get('delete_category_message')}}
                                </div>
                                {{-- <div class="alert alert-success">
                                    <button type="button" class="close" data-dismiss="alert">
                                        x
                                    </button>

                                    {{session()->get('message')}}
                                </div> --}}
                                @endif
                                
                                <table class="table">
                                    <thead  align="center">
                                    <tr >
                                        <th>sno</th>
                                        <th>Category Name</th>
                                        <th>Update</th>
                                        {{-- <th>Remove</th> --}}
                                    </tr>
                                </thead>
            
                                @foreach($show_category as $show_categories)
                                <tbody  align="center">
                                    <tr>
                                        <td>{{$show_categories->id}}</td>
                                        <td >{{$show_categories->category_name}}</td>
{{--                                        
                                        <td >
                                              <a  href="" class="btn btn-sm bg-success text-light">Update</a>
                                        </td>
     --}}
                                        <td>
                                          <a onclick="confirmation(event)" href="{{url('delete_category',$show_categories->id)}}" class="btn-sm btn bg-danger text-light">Remove</a>
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
       @include("admin.script")


       
     </body>
   </html>
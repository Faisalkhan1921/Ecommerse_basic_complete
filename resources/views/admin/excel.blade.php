

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
                          <div class="card-header bg-success text-light text-center">
                            <h1 >
                                Generate Excels Files
                            </h1>
                          </div>
                            <div class="card-body">
                                <div class="container"></div>
                                <div class="row justify-content-center">
                                    <div class="col-sm-6 mt-5">
                                        <div class="p-5 border-2 border border-secondary rounded">
                                            <h1 class="bg-danger text-light text-center">Generate Excel File</h1>
                                            <form  method="POST" enctype="multipart/form-data">
                                                @csrf
                                                {{-- <label for="">Select File</label>
                                                <input type="file" name="file" class="form-control">
                                 --}}
                                                <div class="mt-3 text-center">
                                                    {{-- <button type="submit" class="btn btn-info">Submit</button> --}}
                                                    <a href="{{url('export_user')}}" class="btn btn-primary float-right">Users Excel File</a>
                                                   
                                                </div>

                                                <div class="mt-3 text-center">
                                                    <a href="{{url('export_order')}}" class="btn btn-primary float-right">Orders Excel File</a>
                                                   
                                                </div>

                                                <div class="mt-3 text-center">
                                                    <a href="{{url('export_product')}}" class="btn btn-primary float-right">Products Excel File</a>
                                                    
                                                </div>

                                                <div class="mt-3 text-center">
                                                    <a href="{{url('export_category')}}" class="btn btn-primary float-right">Category Excel File</a>

                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                             
                             
                               

                            </div>
                        </div>
                    </div>
                </div>
            </div>

         <!-- page-body-wrapper ends -->
       </div>

       @include("admin.script")

      
     </body>
   </html>
  
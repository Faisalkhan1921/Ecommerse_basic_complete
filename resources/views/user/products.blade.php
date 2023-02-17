<section class="product_section layout_padding">
    <div class="container">
       <div class="heading_container heading_center">
          <h2>
             Our <span>products</span>
          </h2>


          <div class="row">
            <div class="col-md-12">
               <form action="{{url('search_product')}}" method="get">
                  @csrf
                  <div class="form-row row">
                      <div class="col-md-12 ">
                          <input  type="text" name="search" placeholder="search the product">
                          <button type="submit" class="btn bg-danger text-light">Search</button>
                      </div>
                  </div>
              </form>
              
            </div>
          </div>
       </div>
       @if(session()->has('addtocart_message'))
       <div class="alert alert-success alert-dismissible fade show" role="alert">
           <button type="button" class="close" data-dismiss="alert" aria-label="Close">
               <span aria-hidden="true">&times;</span>
               <span class="sr-only">Close</span>
           </button>
           {{session()->get('addtocart_message')}}
       </div>
       @endif
       <div class="row">
        
         @foreach($product as $products)
          <div class="col-sm-6 col-md-4 col-lg-4">
             <div class="box">
                <div class="option_container">
                   <div class="options">
                      <a href="{{url('product_details',$products->id)}}" class="option1">
                      Details
                      </a>
                    
                      <form action="{{url('addtocart',$products->id)}}" method="post">
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
                  
                  </div>
                </div>
                <div class="img-box">
                   <img src="productimage/{{$products->image}}" alt="">
                </div>
                <div class="detail-box">
                   <h5>
                      {{$products->title}}
                   </h5>

                   {{-- if product has no discount in that case we will be seing nothing --}}
                   @if($products->discount_price != null)
                   
                      <h6 class="text-danger">
                        Discount<br>
                        ${{$products->discount_price}}
                      </h6>

                      <h6 class="text-primary" >
                        Price <br>
                        <p style="text-decoration: line-through">${{$products->price}}</p>
                      </h6>
                   
                   @else
                  
                   <h6 class="text-primary" >
                     Price <br>
                     ${{$products->price}}
                   </h6>

                   @endif


                </div>
             </div>
          </div>

        @endforeach

        
      </div>
      <div class="container ml-5 mt-5">
         <center style="display: flex; justify-content:center;">

            {!!$product->withQueryString()->links('pagination::bootstrap-4')!!}
         </center>
      </div>
       {{-- <div class="btn-box">
          <a href="">
          View All products
          </a>
       </div> --}}
    </div>
 </section>

 <script>
   document.addEventListener("DOMContentLoaded", function(event) { 
       var scrollpos = localStorage.getItem('scrollpos');
       if (scrollpos) window.scrollTo(0, scrollpos);
   });

   window.onbeforeunload = function(e) {
       localStorage.setItem('scrollpos', window.scrollY);
   };
</script>
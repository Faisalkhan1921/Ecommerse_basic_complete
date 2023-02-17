<!doctype html>
<html lang="en">
  <head>
    <title>Order Details</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  </head>
  <body>
      
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h1 class="bg-danger text-light text-center">Order Details of Customer: {{$order->name}}</h1>
                    </div>

                    <div class="card-body">
                        <b>Image:</b> <img src="productimage/{{$order->image}}" width="150" height="80" alt=""> <br>

                        <b>ID:</b> {{$order->id}} <br>
                        <b>Name:</b> {{$order->name}} <br>
                       <b>Email:</b> {{$order->email}} <br>
                       <b>Phone:</b> {{$order->phone}} <br>
                       <b>Address:</b> {{$order->address}} <br>
                       <b>Product_Title:</b> {{$order->product_title}} <br>
                       <b>Price:</b> {{$order->price}} <br>
                       <b>Quantity:</b> {{$order->quantity}} <br>
                       <b>Category:</b> {{$order->category}} <br>
                        
                       <b>Payment Status:</b> {{$order->payment_status}} <br>

                        
                       <b>Delivery Status:</b> {{$order->delivery_status}} <br>
                        
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  </body>
</html>
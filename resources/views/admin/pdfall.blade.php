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
      
                           
                        <table >
                            <thead >
                            <tr >
                                <th >sno</th>
                                <th >Name</th>
                                <th >Email</th>
                                <th >Phone</th>
                                <th >Address</th>
                                <th >Product Title</th>
                                <th >Price</th>
                                <th >Quantity</th>
                                <th >Category</th>
                                <th >payment Status</th>
                                <th >Delivery Status</th>

                                {{-- <th>Remove</th> --}}
                            </tr>
                        </thead>
    
                        @foreach($order as $order)
                        <tbody   >
                            <tr>
                                <td >{{$order->id}}</td>
                                <td  >{{$order->name}}</td>
                                <td  >{{$order->email}}</td>
                                <td  >{{$order->phone}}</td>
                                <td  >{{$order->address}}</td>
                                <td  >{{$order->product_title}}</td>
                                <td  >{{$order->price}}</td>
                                <td  >{{$order->quantity}}</td>
                                <td  >{{$order->category}}</td>
                                <td  >{{$order->payment_status}}</td>
                                <td  >{{$order->delivery_status}}</td>
                      
                            </tr>
                        </tbody>
                      @endforeach
                        </table>
                        
    

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  </body>
</html>
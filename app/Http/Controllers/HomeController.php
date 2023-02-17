<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Category;
use App\Models\Order;
use App\Models\Product;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use Session;
use Stripe;
use App\Models\Comment;
use App\Models\Reply;

//sweetalert
Use RealRashid\SweetAlert\Facades\Alert;

class HomeController extends Controller
{
    //redirect function
    public function redirect()
    {

        if(Auth::id())
        {

        
        $usertype = Auth::user()->usertype;

        if($usertype=='1')
        {
            $total_products = Product::all()->count();
            $total_orders = Order::all()->count();
            $total_users = User::all()->count();

            $order = Order::all();

            $totalamount =0;
            foreach($order as $order)
            {
                $totalamount = $totalamount + $order->price;
            }

            $totaldelivered = Order::where('delivery_status','=','Shipped')->count();
            $totalpending = Order::where('delivery_status','=','Pending')->count();
            $totalcategories = Category::all()->count();

            return view('admin.home',compact('total_products','total_orders','total_users','totalamount','totaldelivered','totalpending','totalcategories'));
        }
        else
        {
            $product = Product::paginate(3);
            $cartcount = Cart::all()->count();
            $show_comment = Comment::orderby('id','desc')->get(); 
            $show_reply = Reply::all();
            if(Auth::id())
            {

                return view('user.home', compact('product','cartcount','show_comment','show_reply'));
            }
            else
            {
                return view('user.home');
            }
        }
    }
        else
        {
            return redirect()->back();
        }
    }

    public function index()
    {
        //this if block is responsible when you remove 'redirect' from url. it will still keep you on 
        //admin dashboard if you are admin....
        if(Auth::id())
        {
            return redirect('redirect');
        }
        else
        {
        $product = Product::paginate(3);
        $show_comment = Comment::orderby('id','desc')->get();
        $show_reply = Reply::all();

        return view('user.home', compact('product','show_comment','show_reply'));
        }
    }

    //product details
    public function product_details($id)
    {
        $product_details = Product::find($id);
        return view('user.product_details',compact('product_details'));
    }

    public function addtocart(Request $request,$id)
    {
        if(Auth::id())
        {
            $user = Auth::user();
            $userid = $user->id;
            $products = Product::find($id);
            
            $product_id_exist = Cart::where('product_id','=',$id)->where('user_id','=',$userid)->get('id')->first();
            $cart = new Cart;

            if($product_id_exist)
            {
                $cart = Cart::find($product_id_exist)->first();
                $quantity = $cart->quantity;
                $cart->quantity = $quantity + $request->addtocart_quantity;

                if($products->discount_price !='null')
                {
                    //we want our price should be multiplied with quantity
                    $cart->price = $products->discount_price * $cart->quantity;
                }
                else
                {
                    $cart->price = $products->price * $cart->quantity;
                }

                $cart->save();

                Alert::success('Product Added Successfully','We have added product to the cart');
                return redirect()->back();
            }
            else
            {
                $cart = new Cart;
                        //storing user table details
                        $cart->name = $user->name;
                        $cart->email = $user->email;
                        $cart->phone = $user->phone;
                        $cart->address = $user->address;
                        $cart->user_id = $user->id;

                        //storing product table detais
                        $cart->product_title = $products->title;
                        $cart->category = $products->category;
                        $cart->image = $products->image;
                        $cart->product_id = $products->id;
                        
                        //if any product has discount price we will show discountto cart
                        if($products->discount_price !='null')
                        {
                            //we want our price should be multiplied with quantity
                            $cart->price = $products->discount_price * $request->addtocart_quantity;
                        }
                        else
                        {
                            $cart->price = $products->price * $request->addtocart_quantity;
                        }
                        //requesting input field for addtocart quantity
                        $cart->quantity = $request->addtocart_quantity;

                        $cart->save();
                        Alert::success('Product Added Successfully','We have added product to the cart');
                        return redirect()->back();

            }


        }
        else
        {
            return redirect('login');
        }
    }

    //show cart 
    public function show_cart()
    {
        if(Auth::id())
        {
            $user_id = Auth::user()->id;
            $show_cart = Cart::where('user_id','=',$user_id)->get();
            // $show_cart = Cart::all();
            return view('user.show_cart',compact('show_cart'));
        }
        else
        {
            return redirect('login');
        }
    }

    // remove from cart 
    public function removefrom_cart($id)
    {
        $removefrom_cart = Cart::find($id);

        $removefrom_cart ->delete();
        Alert::warning('Product Removed Successfully','You have removed the Product from the Cart');
        return redirect()->back();
    }

    public function cashon_delivery()
    {
        $userid = auth::user()->id;

        $show_cart_data = Cart::where('user_id','=',$userid)->get();

        
        foreach($show_cart_data as $show_cart_data)
        {
            $order = new Order;

            $order -> name = $show_cart_data->name;
            $order -> email = $show_cart_data->email;
            $order -> phone = $show_cart_data->phone;
            $order -> address = $show_cart_data->address;
            $order -> user_id = $show_cart_data->user_id;

            $order -> product_title = $show_cart_data->product_title;
            $order -> price = $show_cart_data->price;
            $order -> quantity = $show_cart_data->quantity;
            $order -> image = $show_cart_data->image;
            $order -> category = $show_cart_data->category;
            $order -> product_id = $show_cart_data->product_id;

            $order->payment_status = 'Cash on Delivery';
            $order->delivery_status = 'Pending';

            $order->save();

            $cart_id = $show_cart_data->id;
            $cart = Cart::find($cart_id);
            $cart->delete();
        }

        return redirect('/orderdata')->with('order_place','Order Placed Successfully');

    }

    //using stripe
    public function stripe($totalamount)
    {
        return view('user.stripe',compact('totalamount'));
    }


    // stipe controlle code post 
    public function stripePost(Request $request,$totalamount)
    {
        Stripe\Stripe::setApiKey(env('STRIPE_SECRET'));
    
        Stripe\Charge::create ([
                "amount" => $totalamount * 100,
                "currency" => "usd",
                "source" => $request->stripeToken,
                "description" => "Test payment from itsolutionstuff.com." 
        ]);

        //here we are shiftingcart data to the order table

        $userid = auth::user()->id;

        $show_cart_data = Cart::where('user_id','=',$userid)->get();

        
        foreach($show_cart_data as $show_cart_data)
        {
            $order = new Order;

            $order -> name = $show_cart_data->name;
            $order -> email = $show_cart_data->email;
            $order -> phone = $show_cart_data->phone;
            $order -> address = $show_cart_data->address;
            $order -> user_id = $show_cart_data->user_id;

            $order -> product_title = $show_cart_data->product_title;
            $order -> price = $show_cart_data->price;
            $order -> quantity = $show_cart_data->quantity;
            $order -> image = $show_cart_data->image;
            $order -> category = $show_cart_data->category;
            $order -> product_id = $show_cart_data->product_id;

            $order->payment_status = 'Paid';
            $order->delivery_status = 'Pending';

            $order->save();

            $cart_id = $show_cart_data->id;
            $cart = Cart::find($cart_id);
            $cart->delete();
        }

      
        Session::flash('success', 'Payment successful!');
              
        return redirect()->back();
    }

    public function orderdata()
    {
        if(Auth::id())
        {
        $userid = auth::user()->id;
        $orderdata = Order::where('user_id','=',$userid)->orderby('id','desc')->paginate(3);
        return view('user.orderdata',compact('orderdata'));
        }
        else
        {
            return redirect('/login');
        }
    }

    public function cancelorder($id)
    {
        $cancelorder = Order::find($id);
        $cancelorder ->delivery_status='Cancelled';
        $cancelorder ->payment_status='N/A';
        $cancelorder->save();
        return redirect()->back()->with('cancelorder','Order Cancelled Successfully');
    }

    //comment section
    public function add_comment(Request $request)
    {
        if(Auth::id())
        {
            $add_comment = new Comment;

            $add_comment->name = Auth::user()->name;
            $add_comment->user_id = Auth::user()->id;
            $add_comment->comment = $request->comment;

            $add_comment->save();

            return redirect()->back();


        }
        else
        {
            return redirect('/login');
        }
    }
    public function add_reply(Request $request)
    {
        if(Auth::id())
        {
            $add_reply = new Reply;
            $add_reply->name = Auth::user()->name;
            $add_reply->user_id = Auth::user()->id;
            $add_reply->comment_id = $request->commentId;
            $add_reply->reply = $request->reply;

            $add_reply->save();
            
            return redirect()->back();    
        }
        else
        {
            return redirect('/login');
        }
    }

    //product search
    public function search_product(Request $request)
    {
       
        $search_text = $request->search;
        $product = Product::where('title','LIKE',"%$search_text%")->orwhere('price','LIKE',"$search_text")->orwhere('discount_price','LIKE',"$search_text")->orwhere('category','LIKE',"$search_text")->paginate(3);


        $show_comment = Comment::orderby('id','desc')->get();
        $show_reply = Reply::all();

        return view('user.home',compact('product','show_comment','show_reply'));
    }

    public function searchallproducts(Request $request)
    {
       
        $search_text = $request->search;
        $product_detail = Product::where('title','LIKE',"%$search_text%")->orwhere('price','LIKE',"$search_text")->orwhere('discount_price','LIKE',"$search_text")->orwhere('category','LIKE',"$search_text")->paginate(4);

        return view('user.allproducts',compact('product_detail'));
    }

    public function allproducts(Request $request)
    {
        $product_detail = Product::paginate(4);

        return view('user.allproducts',compact('product_detail'));
    }
}


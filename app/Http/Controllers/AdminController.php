<?php

namespace App\Http\Controllers;

// use App\Exports\OrdersExport;

use App\Exports\CategoriesExport;
use PDF;
use Notification;
use App\Models\Order;
use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
// use RealRashid\SweetAlert\Facades\Alert;
use App\Notifications\SendEmailNotification;

//sweetalert
Use RealRashid\SweetAlert\Facades\Alert;

use Excel;
use App\Exports\OrdersExport;
use App\Exports\ProductsExport;
use App\Exports\UsersExport;

class AdminController extends Controller
{
    //category_view
    public function category_view()
    {
        if(Auth::id())
        {
            return view('admin.category_view');
        }
        else
        {
            return redirect('/login');
        }
    }
    //add category code
    public function add_category(Request $request)
    {
        if(Auth::id())
        {
        $add_category = new Category;

        $add_category -> category_name = $request->category_name;

        $add_category->save();

        Alert::success('Category added Successfully','You have added a new product category');
        return redirect()->back();
        }
        else
        {
            return redirect('/login');
        }
    }

    //view category
    public function view_category()
    {
        if(Auth::id())
        {
        $show_category = Category::all();
        return view('admin.show_category',compact('show_category'));
        }
        else
        {
            return redirect('/login');
        }
    }

    //delete category
    public function delete_category($id)
    {
        if(Auth::id())
        {
        $delete_category = Category::find($id);

        $delete_category -> delete();
        Alert::Warning('Category removed Successfully','You have removed a category');
        return redirect()->back();
        }
        else
        {
            return redirect('/login');
        }
    }

    public function product_view()
    {
        if(Auth::id())
        {
        $show_category =Category::all();
        return view('admin.product_view' ,compact('show_category'));
        }
        else
        {
            return redirect('/login');
        }
    }

    public function add_product(Request $request)
    {
        if(Auth::id())
        {
        $add_product = new Product;

        $image = $request->image;
        //we are giving random name to the image 
        $imagename = time(). '.' . $image->getClientoriginalExtension(); 
        //moving the image in folder with imagename
        $request->image ->move('productimage', $imagename);

        //now we are sending doctor image to the database
        //here $doctor->image is database column name
        $add_product->image = $imagename;


        $add_product->title = $request->title;
        $add_product->description = $request->description;
        $add_product->category = $request->category_name;
        $add_product->quantity = $request->quantity;
        $add_product->price = $request->price;
        $add_product->discount_price = $request->discount_price;
       
        $add_product->save();
        Alert::success('Product Added Successfully','We have added new product');
        return redirect()->back();
        }
        else
        {
            return redirect('/login');
        }
    }

    //show product
    public function show_product()
    {
        if(Auth::id())
        {
        $show_product = Product::all();
        return view('admin.show_product',compact('show_product'));
        }
        else
        {
            return redirect('/login');
        }
    }

    // delete product
    public function delete_product($id)
    {
        if(Auth::id())
        {
        $delete_product = Product::find($id);
        $delete_product ->delete();

        return redirect()->back()->with('delete_product_message','Product deleted Successfully');
        }
        else
        {
            return redirect('/login');
        }
    }
    public function update_product_view($id)
    {
        if(Auth::id())
        {
        $update_product_view = Product::find($id);
        $all_category = Category::all();
        return view('admin.update_product_view',compact('update_product_view','all_category'));
        }
        else
        {
            return redirect('/login');
        }
    }

    public function update_product_confirm(Request $request,$id)
    {
        if(Auth::id())
        {
        $update_product_confirm = Product::find($id);



        $update_product_confirm->title = $request->title;
        $update_product_confirm->description = $request->description;
        $update_product_confirm->category = $request->category_name;
        $update_product_confirm->quantity = $request->quantity;
        $update_product_confirm->price = $request->price;
        $update_product_confirm->discount_price = $request->discount_price;

                  //we are getting image from the adddoctor form
                  $image = $request->image;

                  if($image)
                  {    
                  //we are giving random name to the image 
                  $imagename = time(). '.' . $image->getClientoriginalExtension(); 
                  //moving the image in folder with imagename
                  $request->image ->move('doctorimage', $imagename);
          
                  //now we are sending doctor image to the database
                  //here $doctor->image is database column name
                  $update_product_confirm->image = $imagename;
                  }
         
        $update_product_confirm ->save();

        Alert::success('Product Updated Successfully','You updated a product');
        return redirect()->back();
        }
        else
        {
            return redirect('/login');
        }
    }

    // order table data display 
    public function order_view()
    {
        if(Auth::id())
        {
        $userid = auth::user()->id;
        $show_order_data = Order::orderby('id','desc')->paginate(5);
        return view('admin.order_view',compact('show_order_data'));
        }
        else
        {
            return redirect('/login');
        }
    }

    //delivered
    public function delivered($id)
    {
        if(Auth::id())
        {
        $delivered = Order::find($id);

        $delivered->delivery_status='Shipped';
        $delivered->payment_status='Paid';
        $delivered->save();

        Alert::success('Delivered','Payment are made');
        return redirect()->back();
        }
        else
        {
            return redirect('/login');
        }
    }

    public function print_pdf($id)
    {
        if(Auth::id())
        {
        $order = Order::find($id);
        $pdf = PDF::loadView('admin.filepdf',compact('order'));
        return $pdf->download('orders_details.pdf');
        }
        else
        {
            return redirect('/login');
        }
    }

    public function send_email($id)
    {
        if(Auth::id())
        {
        $order = Order::find($id);
        return view('admin.email_view',compact('order'));
        }
        else
        {
            return redirect('/login');
        }
    }

    public function sendemail_user(Request $request,$id)
    {
        if(Auth::id())
        {
        $order = Order::find($id);

        $details = [
            'greeting' => $request->greeting,
            'firstline' => $request->firstline,
            'body' => $request->body,
            'button' => $request->button,
            'url' => $request->url,
            'lastline' => $request->lastline,
      
        ];

        Notification::send($order, new SendEmailNotification($details));
        // this command will find the specific email from order table row and send the email 
        return redirect()->back()->with('emailsend_success','Email sent Successfully');
    }
    else
    {
        return redirect('/login');
    }
    }

    //SEARCH FUNCTION
    public function search(Request $request)
    {
        if(Auth::id())
        {
        $search = $request-> search;
        $show_order_data = Order::where('name','LIKE',"%$search%")->orwhere('email','LIKE',"%$search%")->orwhere('phone','LIKE',"%$search%")->orwhere('product_title','LIKE',"%$search%")->orwhere('id','LIKE',"%$search%")->orwhere('address','LIKE',"%$search%")->orwhere('price','LIKE',"%$search%")->paginate(6);


        return view('admin.order_view',compact('show_order_data'));
        }
        else
        {
            return redirect('/login');
        }
    }
    public function pdfall()
    {
        $order = Order::all();
        $pdf = PDF::loadview('admin.pdfall',compact('order'));
        return $pdf->download('allrecords.pdf');
    }

    public function export_order()
    {
        if(Auth::id())
        {
            
        return Excel::download(new OrdersExport,'orders.xlsx');
        }
        else
        {
            return redirect('/login');
        }
    }

    public function export_user()
    {
        if(Auth::id())
        {
            
        return Excel::download(new UsersExport,'users.xlsx');
        }
        else
        {
            return redirect('/login');
        }
    }

    public function export_product()
    {
        if(Auth::id())
        {
            return Excel::download(new ProductsExport,'products.xlsx');
        }
        else
        {
            return redirect('/login');
        }
    }

    public function export_category()
    {
        if(Auth::id())
        {
            return Excel::download(new CategoriesExport,'categories.xlsx');
        }
        else
        {
            return redirect('/login');
        }
    }

}

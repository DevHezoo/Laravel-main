<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\ComingProducts;
use App\Models\ExclusiveTimer;
use App\Models\ExclusiveProducts;
use Carbon\Carbon;
use App\Models\Banner;

use App\Models\Contact;
use Illuminate\Support\Str;
use App\Models\Blog;
use App\Models\User;

use App\Models\Newsletter;
use App\Models\MultiImg;
class MainController extends Controller
{
    
    // Home Page, Store.
    public function Home(){

        // Show lates 8 Products/ Descending :foreach
        $products = Product::orderBy('created_at', 'desc')->take(8)->get();

        // Show lates 8 Products/ Descending :foreach
        $coming_products = ComingProducts::orderBy('created_at', 'desc')->take(8)->get();

        // Get Exclusive Timer Values. {Comparing Currently Time, With DB Timer = Exclusive time}

        $exclusive_timer = ExclusiveTimer::orderBy('data', 'desc')->first();
        // Example (2023-10-06 22:31:00)->{1900005656}
        $endTime = Carbon::parse($exclusive_timer->data);

        // Fetch All Exclusive Products, ID's
        $exclusiveProducts = ExclusiveProducts::all();


        // -1) Empty Seats(Dic), -2) Foreach to put inside the seats
        $productDetails = [];

        foreach($exclusiveProducts as $exclusiveProduct){
            $productID = $exclusiveProduct->product_id;
            $product = Product::with('exclusive')->find($productID);

        // Adding the products Details to an array
        $productDetails[] = 
        [
            'product_id' => $productID,
            'product_name' => $product->product_name,
            'product_price' => $product->product_price,
            'discount_price' => $product->discount_price,
            'product_thumbnail' => $product->product_thumbnail,
            'short_desc' => $product->short_desc,
            'product_code' => $product->product_code,
        ];

        }


        // Fetch Best Deals of All products -> 9 (Product's)
        // product_price discount_price  {Best PRoducts Price, As a big Deals}
        $deal = Product::orderByRaw('(discount_price) - (product_price) DESC')->take(9)->get();


        // Banner's Contoller:  {name, url, img}
        $banners = Banner::orderBy('name','ASC')->orderBy('url','ASC')->orderBy('img','ASC')->get();

        // // Load Banner_1 {Fitch first 4 raw Structure}
        // $banner_1 = $banners->take(4);

        // // Load Banner_2 {Fitch the 5th raw Structure}
        // $banner_2 = $banners->take(4,5);

        // // Load Banner_3 {Fitch the 6th raw Structure}
        // $banner_3 = $banners->take(5,6);

        return view('frontend.main', compact('products','coming_products','endTime', 'productDetails','deal','banners'));
    }

public function test(){
    return view('frontend.body.tester');
}


public function ContactSubmit(Request $request){

   // Fetching currently auth user id,
   $id = $request->ip();

   $ticket_checker = Contact::where('user_id', $id)->where('status', 'unread')->exists();

   if($ticket_checker){
      // User cant re submit new ticket until being as read first from admin

      $notification = array(
            'message' => 'Your Old Message Already Under Review',
            'alert-type' => 'error'
        );

      return redirect()->back()->with($notification);
   }
   else{

    Contact::insert([
    'name' => $request->name,
    'user_id' => $id,
    'ticket_number' => Str::random(10),
    'email' => $request->email,
    'phone' => $request->phone,
    'subject' => $request->subject,
    'message' => $request->message,
    'status' => "unread",
    'created_at' => Carbon::now()
    ]);

      $notification = array(
            'message' => 'Message Submit, Successfully',
            'alert-type' => 'success'
        );

         return redirect()->back()->with($notification);
   }



} // End Method


public function Blog(){
    
    // Fetching all news blogs, by descending  
    $blogs = Blog::orderBy('created_at', 'desc')->get();

    $admin = User::where('id','1')->first();
    
    
    return view('frontend.pages.blog.blog', compact('blogs','admin'));


} // End Method

public function BlogView($ID){
    
    // Fetching Specific Blog By ID  
    $blog = Blog::where('id', $ID)->first();

    $author = User::where('id',$blog->author_id)->first();
    
    
    return view('frontend.pages.blog.blog_view', compact('blog','author'));


} // End Method


public function NewsletterSubmit(Request $request){
    
    $checker_1 = Newsletter::where('email', $request->email)->first();

    $checker_2 = Newsletter::where('track', $request->ip())->first();

    if(!$checker_1 && !$checker_2 ){

    Newsletter::insert([
    'email' => $request->email,
    'track' => $request->ip(),
    'created_at' => Carbon::now()
    ]);

      $notification = array(
            'message' => 'Our New will hit you, Thanks',
            'alert-type' => 'success'
        );

    return redirect()->back()->with($notification);

    }else{

              $notification = array(
            'message' => 'You Submit Before',
            'alert-type' => 'error'
        );

    return redirect()->back()->with($notification);

    }

} // End Method


public function VendorPage($ID){

    // Fetching vendor by id
    $user = User::where('id', $ID)->first();

    // Fetching all products that currently vendor has beeen published it
    $products = Product::where('vendor_id', $user->id)->orderBy('created_at', 'desc')->get();


    return view('frontend.pages.vendor.vendor', compact('user','products'));

}

public function VendorProductView($ID){

    // Fetching specific product that currently vendor has beeen published it
    $product = Product::where('id', $ID)->first();

    $user = User::where('id',$product->vendor_id)->first();

    $imgs = MultiImg::where('product_id', $ID)->get();

    return view('frontend.pages.vendor.product_view', compact('product','imgs','user'));

}



}

<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

// products, multiimg,
use App\Models\Product;
use App\Models\MultiImg;
use App\Models\Banner;
class ProductController extends Controller
{

	public function ProductViewer(Request $request, $ProductCode){

		// Find Specific Product By product_code
		$product = Product::where('product_code', $ProductCode)->first();

		// Get All photos_name{url's} for specific item{product} by product_id
		$photoUrls = MultiImg::where('product_id', $ProductCode)->pluck('photo_url')->toArray();

		// Fetch Best Deals of All products -> 9 (Product's)
		// product_price discount_price {Best PRoducts Price, As a big Deals}
        $deal = Product::orderByRaw('(discount_price) - (product_price) DESC')->take(9)->get();

		return view('frontend.pages.product', compact('product','photoUrls','deal'));
	}

}

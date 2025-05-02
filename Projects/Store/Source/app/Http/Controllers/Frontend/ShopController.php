<?php

namespace App\Http\Controllers\Frontend;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\Banner;

use App\Models\Categories;
use App\Models\Subcategory;
use App\Models\Brand;
use Cookie;
class ShopController extends Controller
{
    // Start Viewing the Shop Page
    public function Shop(Request $request){

        // Get Product Status Of Date
        $Sort = '';
        $Sort_Value = '';

if(isset($_COOKIE['Sort'])){
    $Sort = $_COOKIE['Sort'];
    
    if($Sort == 'new'){
        $Sort_Value = 'desc';
    } elseif($Sort == 'old'){
        $Sort_Value = 'asc';
    } else {
        // Default to 'desc' for new products if the cookie value is not recognized
        $Sort_Value = 'desc';
    }
} else {
    // Set default sorting to 'new' if the cookie is not set
    $Sort_Value = 'desc';
    setcookie('Sort', 'new', time() + 3600, '/');
}
        

        // Get Product Status Of Date
        $Item_Per_Page = '';

        if(isset($_COOKIE['ItemsPage'])){
            $Item_Per_Page = $_COOKIE['ItemsPage'];
        }else{
             $Item_Per_Page == 6;
             setcookie('ItemsPage', 6, time(), 3600, '/');
        }
        
        // Sort By Price
        $lower = '';
        $upper = '';

if (!isset($_COOKIE['lower']) || !isset($_COOKIE['upper'])) {
    $lower = 0;
    $upper = 1000;

    // Set default values for lower and upper cookies with an expiration time
    setcookie('lower', $lower, time() + 3600, '/');
    setcookie('upper', $upper, time() + 3600, '/');
} else {
    $lower = $_COOKIE['lower'];
    $upper = $_COOKIE['upper'];
}

        // Fetch Best Deals of All products -> 9 (Product's)
        // product_price discount_price
        $deal = Product::orderByRaw('(discount_price) - (product_price) DESC')->take(9)->get();

        // Banner's Contoller:  {name, url, img}
        $banners = Banner::orderBy('name','ASC')->orderBy('url','ASC')->orderBy('img','ASC')->get();

        // First Need To fitch some filtering url
        // Categories
        $FilterCategory = $request->input('category');

        // SubCategories
        $FilterSubCategory = $request->input('subcategory');

        // Brands
        $FilterBrands = $request->input('brand');

        // Brands Color
        $FilterBrandColor = $request->input('color');



        // Start with base Query to retirve all products
        $query = Product::query();
        // Fetching lower products price
        $query->where('product_price', '>=', $lower);
        // Fetching upper products price
        $query->where('product_price', '<=', $upper);
        $query->orderBy('created_at', $Sort_Value);



        if($FilterCategory !== null){
         // Load Specific products from oldest to newest
            $query->where('category', $FilterCategory);
        }

        if($FilterSubCategory !== null){
         // Load Specific products from oldest to newest
            $query->where('subcategory', $FilterSubCategory);
        }

        if($FilterBrands !== null){
         // Load Specific products from oldest to newest
            $query->where('brand_id', $FilterBrands);
        }

        if($FilterBrandColor !== null){
         // Load Specific products from oldest to newest
            $query->where('product_color','LIKE', '%'. $FilterBrandColor . '%');
        }

        $products = $query->get();




        // Every 12 products will have them own page.
        // Total Products Counter
        $TotalProducts = $products->count();
		
        // Per page, how many product will show in single page
        $PerPage = $Item_Per_Page;
		

        // Convert $PerPage to an integer if it's numeric
if (!is_numeric($PerPage)) {
    // Set default value and create the cookie
    $PerPage = 6;
    setcookie('ItemsPage', 6, time() + 3600, '/');

    setcookie('Sort', 'new', time() + 3600, '/');
}


        // Function To make all our Required Pages (Ceil : 1.3 -> 1)
        $TotalPages = ceil($TotalProducts / $PerPage);

        // To know Currenly Page We Visiting ?page=1
        $CurrentlyPage = request()->get('page', 1);

        // Convert Products to Store As arrays
        $ProductsAsArray = $products->toArray();

        // Slice The Products Based on Currently Page
        $CurrentlyPageProducts = array_slice($ProductsAsArray, ($CurrentlyPage - 1) * $PerPage, $PerPage);


        // Fetching All product By Catagories ID
        $Categories = Categories::with('Products')->orderBy('category_name', 'ASC')->get();


        // Fetching All Categories By SubCatagories Name
        // $SubCategory = SubCategory::orderBy('subcategory_name', 'ASC')->get();

        $SubCategory = Subcategory::with('Products')->get(); // Include 'category_slug' in the query if it's not loaded by default

        // Fetching All Brands, By Brandname
        $Brands = Brand::orderBy('brand_name','ASC')->get();

        return view ('frontend.pages.shop', compact('deal','banners','products','TotalPages','CurrentlyPage','CurrentlyPageProducts','Categories','SubCategory','products','Brands'));
    }


}

<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Property;
use App\Models\PropertyType;
use App\Models\Featured;
use DB;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use App\Models\Seo;
use App\Models\Order;
use Illuminate\Support\Str;

class MainController extends Controller
{
    // Home Page, Hotel.

    public function Home(){

    $Properties = Property::orderBy('property_code', 'desc')->get();
    $types = PropertyType::orderBy('id', 'desc')->get();

    $feature = Featured::orderBy('id', 'desc')->first();
    // $feature = PropertyType::orderBy('id', 'desc')->value('1');

    // Fetch top 3 types of properities

    $deals = Property::join(
        DB::raw('(SELECT id FROM property_types ORDER BY id DESC LIMIT 3) as top_types'),
        'properties.property_type', '=', 'top_types.id'
    )
    ->where('properties.property_status', 'available')
    ->groupBy('properties.property_type', 'properties.id')
    ->select('properties.property_type', 'properties.id', DB::raw('MIN(properties.property_price) as min_price'))
    ->orderBy('properties.property_type')
    ->orderBy('min_price')
    ->get();

    return view('frontend.main', compact('Properties','types','feature','deals'));
    }
 }
<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Property;
use App\Models\Order;

use App\Models\User;
use DB;
use Illuminate\Support\Facades\Auth;

class BookingController extends Controller
{
    //


public function checkRoomAvailability(Request $request)
{
    // Validate incoming data
    $request->validate([
        'propertyId' => 'required|integer',
        'checkIn' => 'required|date',
        'checkOut' => 'required|date|after:checkIn',
    ]);

    $propertyId = $request->input('propertyId');
    $checkIn = $request->input('checkIn');
    $checkOut = $request->input('checkOut');

    // Get the property quantity for the specified property
    $propertyQty = Property::where('id', $propertyId)->value('property_qty');

    // Get the count of overlapping bookings for the specified dates
    // $existingBookings = Order::where('Property_ID', $propertyId)
    //     ->where(function ($query) use ($checkIn, $checkOut) {
    //         $query->where(function ($q) use ($checkIn, $checkOut) {
    //             $q->where('Check_In', '<', $checkOut)
    //                 ->where('Check_Out', '>', $checkIn);
    //         })->orWhere(function ($q) use ($checkIn, $checkOut) {
    //             $q->where('Check_In', '>=', $checkOut)
    //                 ->orWhere('Check_Out', '<=', $checkIn);
    //         });
    //     })
    //     ->count();

    // Get the count of overlapping bookings for the specified dates
    $existingBookings = Order::where('Property_ID', $propertyId)
    ->where(function ($query) use ($checkIn, $checkOut) {
        $query->where('Check_In', '<', $checkOut)
              ->where('Check_Out', '>', $checkIn);
    })
    ->count();

    // If there are no overlapping bookings and available quantity, the room is available
    return response()->json(['available' => $existingBookings < $propertyQty]);
}


public function getExistingCheckinDates()
{
    $existingCheckInDates = Order::pluck('Check_In')->toArray();

    return response()->json(['data' => $existingCheckInDates]);
}

public function getExistingCheckoutDates()
{
    $existingCheckOutDates = Order::pluck('Check_Out')->toArray();

    return response()->json(['data' => $existingCheckOutDates]);
}

}

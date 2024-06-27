<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\borrow;
use App\Models\trackableitems;
use App\Models\item;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use App\Models\borrowedgeneralitems;
use App\Models\borrowedtrackableitems;
use Carbon\Carbon;

class checkout extends Controller
{
    public function checkout(Request $request){

 //  lets first pick these orders in an array
  $products = $request->input('products');
  //dd($request->input('products'));

 
  $ExpectedReturnDate = $request->input('returnDate');
  $Reason = $request->input('reason');
  $currentDateTime = Carbon::now()->format('Y-m-d H:i:s');
  
  //this code uploads the picture from the form.
  $request->validate(['image' => 'required|image|mimes:png,jpg,jpeg|max:2048']);
  $picname = $request->file('image')->getClientOriginalName();
  $request->image->move(public_path('images/borrowing'), $picname);


   $user = null;
   // lets get the user from the array
   foreach ($products as $productData) {
    
    $user = $productData['user'];
       break;
   }
    //return $request->input();


    //insert order first.
    $mydata = new borrow;
    $mydata->user_id = $user;
    $mydata->borrowDate = $currentDateTime;
    $mydata->ExpectedReturnDate = $ExpectedReturnDate;
    $mydata->reason = $Reason;
    $mydata->borrow_image_url = $picname;
    $mydata->save();

 //first querry the orders table for the most recent order to attach these products.
  $lastOrderId = DB::table('borrow')->latest()->value('borrow_id');

  // process each product in the cart
  foreach ($products as $productData) {

    $quantity = $productData['quantity'];
    $id = $productData['id'];

// now lets querry the tables to insert the product in the right table.
 // Query the first table based on the product ID
 $firstTableItem = trackableitems::where('SerialNo', $id)->first();
 // Query the second table based on the product ID
 $secondTableItem = item::where('item_id', $id)->first();

 // Check which table the product belongs to
 if ($firstTableItem) {
     // Insert the product into the specific table for the first model

     $trackable = new borrowedtrackableitems;
     $trackable->SerialNo = $id;
     $trackable->borrow_id = $lastOrderId;
     $trackable->save();

     $new_quantity = 0;
     //lets now update the stock
     DB::table('trackableitems')
       ->where('SerialNo', $id)
       ->update(['quantity' => $new_quantity]);
       
 } elseif ($secondTableItem) {
     // Insert the product into the specific table for the second model
     $generalItem = new borrowedgeneralitems();
     $generalItem->item_id = $id;
     $generalItem->borrow_id = $lastOrderId;
     $generalItem->quantity = $quantity;
     $generalItem->save();

     //lets now query the previous balance before updating with the new quantity.
         $quantity_in_stock = DB::table('generalitems')
                ->select('quantity')
                ->where('item_id', $id)
                ->value('quantity');

          $new_quantity = $quantity_in_stock - $quantity;

          //lets now update the stock
          DB::table('generalitems')
            ->where('item_id', $id)
            ->update(['quantity' => $new_quantity]);
 }

  }//closes the foreach loop
      
      //lets now remove both the user and the items from the session.
      Session::forget('cart');
      Session::forget('user');
      Session::forget('username');

     return redirect('/borrows')->with('success', 'this borrowing has been successfully completed!. click orders page to view it.');

     }
}

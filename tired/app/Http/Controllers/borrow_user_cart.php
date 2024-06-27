<?php

namespace App\Http\Controllers;
use App\Models\item;
use App\Models\trackableitems;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class borrow_user_cart extends Controller
{

    public function addToCart(Request $request)
    {
//inputs from the user and borrow forms
 $userid = $request->input('user');
 $id1 = $request->input('item');
 $id2 = $request->input('trackeditem');
 $qty_to_borrow = $request->input('quantity');

 //return $request->input();

//global variables to pick from if statements
 $id = null;
 $item =null;
 $total_items=null;
 $itemid = null;



//lets create the cart first.
$cart = session()->get('cart');

if(is_null($id1) && is_null($id2)){
   // lets add this user to the session.
   $user = DB::table('users')
   ->where('user_id',$userid)
   ->first();
    $lastname= $user->lastname;
    Session::put('user',$userid);
    Session::put('username',$lastname);


   return redirect('/borrows')->with('success','user added for borrowing');
} 

 // if no id, we give the serial number as the id, 
 //then item as the item picked from the trackableitem table

  // if adding the general item to the cart.
 if(is_null($id1) && !is_null($id2)){

   $id = $id2;
   $itemid ="SerialNo";
   $item = DB::table('trackableitems')
                ->where('SerialNo',$id2)
                ->first();
   $total_items = $item->Quantity;

     // if stock less than whats needed.
    
     if ($total_items < $qty_to_borrow) {
      return redirect('/borrows')->with('error','insufficient items!');
    }
  if($qty_to_borrow <=0 ){
       return redirect('/borrows')->with('error','please enter valid quantity!');
    }


 // if cart is empty then this the first product
 if(!$cart) {
  $cart = [ 
   $id => [
       "id" => $item->$itemid, 
       "name" => $item->name, 
       "quantity" => $request->input('quantity'),
        ]
  ];
  session()->put('cart', $cart);
  return redirect('/borrows')->with('success', 'item added to the cart successfully!');
}
// else if not empty, we look for this product and replace it.
else if($cart){
$cart[$request->input('trackeditem')] = [ "id" => $item->$itemid, "name" => $item->name, "quantity" => $request->input('quantity')];
session()->put('cart', $cart);
return redirect('/borrows')->with('success', 'item added to cart successfully!');
}


  } 

  // if adding the general item to the cart.
  
  else if(!is_null($id1) && is_null($id2)){
    $id = $id1;
    $itemid ="item_id";

    $item = DB::table('generalitems')
    ->where('item_id',$id1)
    ->first();

    $total_items = $item->Quantity;

    
     // if stock less than whats needed.
    
   if ($total_items < $qty_to_borrow) {
    return redirect('/borrows')->with('error','insufficient items!');
  }
if($qty_to_borrow <=0 ){
     return redirect('/borrows')->with('error','please enter valid quantity!');
  }

  
 // if cart is empty then this the first product
 if(!$cart) {
  $cart = [ 
   $id => [
       "id" => $item->$itemid, 
       "name" => $item->name, 
       "quantity" => $request->input('quantity'),
        ]
  ];
  session()->put('cart', $cart);
  return redirect('/borrows')->with('success', 'item added to the cart successfully!');
}
// else if not empty, we look for this product and replace it.
else if($cart){
$cart[$request->input('item')] = [ "id" => $item->$itemid, "name" => $item->name, "quantity" => $request->input('quantity')];
session()->put('cart', $cart);
return redirect('/borrows')->with('success', 'item added to cart successfully!');


  }

} 

}   //closes the add to cart method.



    //delete from cart
    public function delete_from_cart(Request $request){
           
      $id = $request->input('item');
       // return $request->input();
// lets remove item from the cart
     $cartItems = session()->get('cart');
      unset($cartItems[$id]);
      session()->put('cart',$cartItems);

      return redirect('/borrows')->with('success', 'item removed successfully!');
        
    }



    // this displays the returned items for borrow completion.
    public function complete_order(Request $request){

      $borrow_id = $request->input('order');

   //trackable items

      $items = DB::table('borrowedtrackableitems')
      ->join('trackableitems', 'borrowedtrackableitems.SerialNo', '=', 'trackableitems.SerialNo')
      ->select('borrowedtrackableitems.*', 'trackableitems.name')
      ->where('borrowedtrackableitems.borrow_id', $borrow_id)
      ->where('borrowedtrackableitems.status', 'not returned')
      ->get();



//general items
          $results = DB::table('borrowedgeneralitems')
          ->join('generalitems', 'borrowedgeneralitems.item_id', '=', 'generalitems.item_id')
          ->select('borrowedgeneralitems.*', 'generalitems.name')
          ->where('borrowedgeneralitems.borrow_id', $borrow_id)
          ->where('borrowedgeneralitems.status', 'not returned')
          ->get();
        //lets first return this as a table on the return page

        return view('/return_items',compact('results','items'));

    }
  
}

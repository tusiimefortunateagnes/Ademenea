<?php
namespace App\Http\Controllers;
use App\Models\item;
use App\Models\trackableitems;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class return_items extends Controller
{
    public function return_items(Request $request){

        $returnedItems = $request->input('returned');
        $orderId = $request->input('order');

       // return $request->input();
        
         $itemId = null;
         $quantity = null;
         
//          // lets now loop over the array checking for the item type so we can change its status and convert it to returned.
  
         foreach ($returnedItems as $productData) {
  
//            //lets pick attributes differently.
//            //lets first skip the error if no id found on array number
    
           $itemId = $productData;
         //  dd($itemId);
    
           $item = DB::table('trackableitems')->where('SerialNo', $itemId)->first();
            if ($item) {
             // Item found, in trackable items so lets change its status in borrowedtrackable
             DB::table('borrowedtrackableitems')->where('SerialNo', $itemId)->update(['status' => 'returned']);
             DB::table('trackableitems')->where('SerialNo', $itemId)->update(['Quantity' => '1']);
             
            } else if (!$item) {
              // Item not found, its a generalitem, lets handle that as well.
              DB::table('borrowedgeneralitems')->where('item_id', $itemId)->update(['status' => 'returned']);
  
              //lets first retrieve quantity before adding the returned.
              $quantity = DB::table('borrowedgeneralitems')
              ->where('borrow_id',$orderId)   
              ->where('item_id', $itemId)
              ->value('quantity');

              $remainder_quantity = DB::table('generalitems')
              ->where('item_id', $itemId)
              ->value('quantity');
  
               $new_quantity = $remainder_quantity + $quantity;
              DB::table('generalitems')->where('item_id', $itemId)->update(['quantity' => $new_quantity]);
                      
            }

                     
      }          //closes foreach
   
  
//         // we will also change the overall order status from Not returned to incomplete, or complete if all has been brought.
//         // lets first alter the order in borrowed from not returned to incomplete.
              DB::table('borrow')->where('borrow_id', $orderId)->update(['borrow_status' => 'incomplete']);
  
  
//        // lets now check if all order is complete.
         $item = DB::table('borrowedtrackableitems')->where('borrow_id', $orderId)->get();
         $items = DB::table('borrowedgeneralitems')->where('borrow_id', $orderId)->get();
         $allReturned1 = true;
         $allReturned2 = true;
      
//       //check whether all trackableitems on this order are returned
           foreach ($item as $item) {
             if ($item->status != 'returned') {
                 $allReturned1 = false;
                  break;
              }
         }
  
//        //check whether all generalitems on this order are returned
         foreach ($items as $items) {
          if ($items->status != 'returned') {
               $allReturned2 = false;
                 break;
           }
       }


   //check whether all items on this order are returned
      if ($allReturned1 && $allReturned2) {
          DB::table('borrow')->where('borrow_id', $orderId)->update(['borrow_status' => 'completed']);
          return redirect('/orders')->with("success",'this order is now complete');
  
      } else {
         DB::table('borrow')->where('borrow_id', $orderId)->update(['borrow_status' => 'incomplete']);
         return redirect('/orders')->with("updated",'items returned successfully');
  
      }
  
   } //closes this function.
  
}

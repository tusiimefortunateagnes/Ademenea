<?php

namespace App\Http\Controllers;
use App\Models\item;
use App\Models\trackableitems;
use App\Models\category;
use App\Models\compartments;
use App\Models\borrowedgeneralitems;
use App\Models\borrowedtrackableitems;
use App\Models\users;
use App\Models\borrow;
use App\Models\vendors;
use App\Models\consignments;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class fetch_stuff extends Controller
{


  //fetching consignments from the db
   
  public function fetch_consignments(){

    $consignments = consignments::all();

   return view('/consignments',compact('consignments'));


   }

  //fetching compartments from the db
   
  public function fetch_compartments(){

    $compartments = compartments::all();

 return view('/compartments',compact('compartments'));


   }


    //this function fetches categories to the categories page
    public function fetch_things(){

        $categories = category::all();
   
     return view('/category',compact('categories'));
   
   
       }

       public function fetch_vendors(){

        $vendors = vendors::all();
   
      return view('/vendors',compact('vendors'));
   
   
       }



     // this functions sends categories and items to the items page.
       public function fetch_cat_item(){

        //lets use joins to return items and their storages.
        $generalitems = DB::table('generalitems')
            ->join('compartments', 'generalitems.compartment_id', '=', 'compartments.compartment_id')
            ->select('generalitems.*', 'compartments.number as number')
            ->get();

        $trackableitems = DB::table('trackableitems')
            ->join('compartments', 'trackableitems.compartment_id', '=', 'compartments.compartment_id')
            ->select('trackableitems.*', 'compartments.number as number')
            ->get();

        $categories = category::all();

        return view('/items',compact('categories','generalitems','trackableitems'));
   
   
       }

 //function fetches categories for the select dropdown in items page for the register_item page.
       public function fetch_cat_for_item(){
        
        $categories = category::all();
        $compartments = compartments::all();
        $consignments = consignments::all();
        return view('/register_item',compact('categories','consignments','compartments'));
   
       }

       public function fetch_vendor_for_consignment(){
        
        $vendors = vendors::all();
        return view('/register_consignment',compact('vendors'));
   
       }



       //function fetches users to their page
       public function fetch_users(){
        
        $users = users::all();
        return view('/users',compact('users'));
   
       }

       //function fetches items to the borrow page.
       public function fetch_borrow_items(){ 

        $categories = category::all();
        $trackableitems = trackableitems::all();
        $generalitems= item::all();


        return view('/borrows',compact('categories','generalitems','trackableitems'));
   
       }


       public function fetch_orders(){ 
        //we will join 4 tables and display who has borrowed which items and what their status is.

            $orders = DB::table('borrow as t1')
            ->join('users as t2', 't1.user_id', '=', 't2.user_id')
            ->select(
                't1.borrow_id',
                't1.borrow_status',
                DB::raw('CONCAT(t2.firstname, " ", t2.lastname) AS fullname'),
                't1.reason',
                't1.borrowDate',
                DB::raw('(SELECT GROUP_CONCAT(CONCAT(generalitems.name, "(", borrowedgeneralitems.quantity, ")  ","- ", borrowedgeneralitems.status) SEPARATOR ",\n") FROM borrowedgeneralitems JOIN generalitems ON borrowedgeneralitems.item_id = generalitems.item_id WHERE borrowedgeneralitems.borrow_id = t1.borrow_id) AS items'),
                DB::raw('(SELECT GROUP_CONCAT(trackableitems.name, "- ", borrowedtrackableitems.status  SEPARATOR ",\n") FROM borrowedtrackableitems JOIN trackableitems ON borrowedtrackableitems.SerialNo = trackableitems.SerialNo WHERE borrowedtrackableitems.borrow_id = t1.borrow_id) AS trackable_items')
            )
            ->get();
        

        return view('/orders',compact('orders'));
   
       }

}



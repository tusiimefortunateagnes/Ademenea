<?php

namespace App\Http\Controllers;
use App\Models\category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\users;
use App\Models\item;
use App\Models\vendors;


class edit_content extends Controller
{



     //edit the consignment

     public function edit_consignment(Request $request)
     {
         $id = $request->id;

        //this code uploads the picture from the form.
        $request->validate(['image' => 'required|image|mimes:png,jpg,jpeg|max:2048']);
        $picname = $request->file('image')->getClientOriginalName();
        $request->image->move(public_path('images'), $picname);
     
         DB::table('consignments')
             ->where('consignment_id', $id)
             ->update([
                 'receiptNo' => $request->input('receiptNo'),
                 'DateBought' => $request->input('dateBought'),
                 'DateReceived' => $request->input('dateReceived'),
                 'receipt_image_url' => $request = $picname,
                 // add more fields as needed
             ]);
         return redirect('/consignments')->with('updated', 'changes have been made successfully!');
     }
     

    //edit the compartment

    public function edit_compartment(Request $request)
{
    $id = $request->id;

    DB::table('compartments')
        ->where('compartment_id', $id)
        ->update([
            'number' => $request->input('number'),
            'description' => $request->input('description'),
            // add more fields as needed
        ]);
    return redirect('/compartments')->with('updated', 'changes have been made successfully!');
}

   // we will use this function to edit contents in the database. 

public function edit_category(Request $request)
{
    $id = $request->id;

    DB::table('categories')
        ->where('category_id', $id)
        ->update([
            'Category' => $request->input('category'),
            'description' => $request->input('description'),
            // add more fields as needed
        ]);
    return redirect('/category')->with('updated', 'changes have been made successfully!');
}

public function edit_vendor(Request $request)
{
    $id = $request->id;

    DB::table('vendors')
        ->where('vendor_id', $id)
        ->update([
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'phone' => $request->input('phone'),
            'website' => $request->input('website'),
            'location' => $request->input('location'),
            // add more fields as needed
        ]);
    return redirect('/vendors')->with('updated', 'changes have been made successfully!');
}


public function edit_user(Request $request)
{
    $id = $request->id;

    DB::table('users')
        ->where('user_id', $id)
        ->update([
            'firstname' => $request->input('firstname'),
            'lastname' => $request->input('lastname'),
            'email' => $request->input('email'),
            'phone_number' => $request->input('phone'),
            // add more fields as needed
        ]);
    return redirect('/users')->with('updated', 'changes have been made successfully!');
}


public function edit_item(Request $request)
{
    $id = $request->id;

    //lets check if its general or trackable item.
$item = item::find($id);
if ($item === null) {
    // if id is a serial no.
    DB::table('trackableitems')
    ->where('SerialNo', $id)
    ->update([
        'name' => $request->input('name'),
        'type' => $request->input('type'),
        //'Quantity' => $request->input('quantity'), cant edit the quantity manually as an integrity constraint.
        // add more fields as needed
    ]);
   
    } else {

        //if id found in general items
        DB::table('generalitems')
        ->where('item_id', $id)
        ->update([
            'name' => $request->input('name'),
            'type' => $request->input('type'),
            //'Quantity' => $request->input('quantity'), cant edit the quantity manually as an integrity constraint.
            // add more fields as needed
        ]);
    }

    return redirect('/items')->with('updated', 'changes have been made successfully!');
}


public function user_status(Request $request)
{
    $id = $request->id;
    $status = $request->status;

    if($status == 'active'){

        $status = "inactive";
    }
    else{
        $status = "active";
    }

    DB::table('users')
        ->where('user_id', $id)
        ->update([
            'status' => $status,
            // add more fields as needed
        ]);
    return redirect('/users')->with('updated', 'changes have been made successfully!');
}


public function delete_user(Request $request)
{
    $id = $request->id;

    $entry =    DB::table('users')
    ->where('user_id', $id)
    ->select();
    
    $entry->delete();
    return redirect('/users')->with('updated', 'user deleted successfully!');
}

}

<?php

namespace App\Http\Controllers;
use App\Models\category;
use Illuminate\Http\Request;
use App\Models\item;
use App\Models\trackableitems;
use App\Models\users;
use App\Models\consignments;
use App\Models\compartments;
use App\Models\vendors;

class register_category extends Controller
{

  //inserts consignments
public function insert_consignment(Request $request){
        
//return $data-> input();
  
//this code uploads the picture from the form.
  $request->validate(['image' => 'required|image|mimes:png,jpg,jpeg|max:2048']);
  $picname = $request->file('image')->getClientOriginalName();
  $request->image->move(public_path('images/consignments'), $picname);

  $mydata = new consignments;
  $mydata->vendor_id = $request->vendor;
  $mydata->receiptNo = $request->receiptNo;
  $mydata->DateBought = $request->dateBought;
  $mydata->DateReceived = $request->dateReceived;
  $mydata->receipt_image_url = $picname;
  $mydata->save();

return redirect('/consignments')->with('success', 'consignment added successfully!');
}


//inserts compartments
public function insert_compartment(Request $request){
        
  //return $data-> input();

  $mydata = new compartments;
  $mydata->number = $request->number;
  $mydata->description = $request->description;
  $mydata->save();

return redirect('/compartments')->with('success', $request->number.' '.'has been registered successfully!');
}



  //inserts category
    public function insert_category(Request $data){
        
        //return $data-> input();
    
        $mydata = new category;
        $mydata->category_name = $data->category;
        $mydata->description = $data->description;
        $mydata->save();

      return redirect('/category')->with('success','category successfully created!');
}

 //inserts vendors
 public function insert_vendor(Request $data){
        
  //return $data-> input();

  $mydata = new vendors;
  $mydata->name = $data->name;
  $mydata->email = $data->email;
  $mydata->phone = $data->phone;
  $mydata->website = $data->website;
  $mydata->location = $data->location;
  $mydata->save();

return redirect('/vendors')->with('success','vendor successfully registered!');
}



//registering an item.

public function insert_item(Request $request){
        
//   return $request-> input();

if(empty($request->input('serialNo'))) {
  // if we dont get serial no, its a general item.
  $mydata = new item;
  $mydata->category_id = $request->category;
  $mydata->compartment_id = $request->compartment;
  $mydata->consignment_id = $request->consignment;
  $mydata->name = $request->name;
  $mydata->type = $request->type;
  $mydata->quantity = $request->quantity;

  $mydata->save();
} else{

  $mydata = new trackableitems;
  $mydata->SerialNo = $request->serialNo;
  $mydata->category_id = $request->category;
  $mydata->compartment_id = $request->compartment;
  $mydata->consignment_id = $request->consignment;
  $mydata->name = $request->name;
  $mydata->type = $request->type;
  //$mydata->quantity = $request->quantity;

  $mydata->save();
}

return redirect('/items')->with('success','item successfully added!');
}


    public function insert_user(Request $request){
        
       //return $request-> input();
    
        $mydata = new users;
        $mydata->admin_id = $request->admin;
        $mydata->firstname = $request->firstname;
        $mydata->lastname = $request->lastname;
        $mydata->email = $request->email;
        $mydata->phone = $request->phone;
        $mydata->save();

      return redirect('/users')->with('success', $request->firstname.' '.'has been registered successfully!');
}





}
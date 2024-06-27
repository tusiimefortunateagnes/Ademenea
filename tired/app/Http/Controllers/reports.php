<?php


namespace App\Http\Controllers;
use App\Models\item;
use App\Models\trackableitems;
use App\Models\category;
use App\Models\faultytrackableitems;
use App\Models\faultygeneralitems;
use App\Models\borrowedgeneralitems;
use App\Models\borrowedtrackableitems;
use App\Models\users;
use App\Models\borrow;
use App\Models\consignments;
use Illuminate\Support\Facades\DB;
use DateTime;
use Carbon\Carbon;

class reports extends Controller
{
    public function fetch_reports(){

// initializing the variables we will send to the reports page.
                $total_orders = null;
                $closed_orders= null;
                $open_orders= null;
                $totalusers= null;
                $total_trackable= null;
                $total_general= null;
                $total_categories= null;
                $total_consignments= null;
                $total_faulty= null;
                $username= null;
                $borrowduration= null;
                $daysDue= null;


        $unreturned_orders = borrow::where('borrow_status', 'not returned')->count();
        $incomplete_orders = borrow::where('borrow_status', 'incomplete')->count();
        $closed_orders = borrow::where('borrow_status', 'completed')->count();


// lets see the due date for the most recent borrowing.
// plus the static days a person has borrwed for.
// to see who the latest borrowing belongs to, we will use the borrowed items table, joined with users and see the latest order.
    $latestOrder = DB::table('borrow')->latest()->first();
    $username = null;
    $userid = null;
    //lets now query the items table on most recent order, if data exists, we get username.

  //dd($latestOrder->id);


  // checking if any orders exist to catch errors.
      if($latestOrder){
      $userid = $latestOrder->user_id;

      $username = DB::table('users')->select('lastname')->where('user_id',$userid)->value('lastname');


     //dd($username);

        $datenow =  Carbon::now()->format('Y-m-d H:i:s');
        $borrowDate = new DateTime($latestOrder->borrowDate);
        $dueDate = new DateTime($latestOrder->ExpectedReturnDate);
        $realdatenow = new DateTime($datenow);

        $borrowduration = $dueDate->diff($borrowDate)->format('%a');
        $daysDue =   $dueDate->diff($realdatenow)->format('%a');

       // dd($borrowduration);
       // dd($daysDue);



        //this open orders variable includes both partially returned and fully unnreturned orders.
        $open_orders = $incomplete_orders + $unreturned_orders;

        $total_orders = $unreturned_orders + $incomplete_orders + $closed_orders;

        $totalusers = users::count();

        $total_trackable = trackableitems::count();
        
        $total_general = item::count();
        $total_categories = category::count();
        $total_consignments = consignments::count();

        $total_faulty1 = faultytrackableitems::count();
        $total_faulty2 = faultygeneralitems::count();

           $total_faulty = $total_faulty1 + $total_faulty2;


      } //closes the if statement

           //lets now send these to the reports page.

             return view('/dashboard')->with([
            'total_orders' => $total_orders,
            'closed_orders' => $closed_orders,
            'incomplete_orders'=> $open_orders,
            'users'=> $totalusers,
            'trackableitems'=> $total_trackable,
            'generalitems'=> $total_general,
            'categories'=> $total_categories,
            'consignments'=> $total_consignments,
            'faultyitems'=> $total_faulty,
            'username'=> $username,
            'borrow_duration'=> $borrowduration,
            'days_due'=> $daysDue,
        ]);
    }
  
}

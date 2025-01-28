<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\OrderItem;
use App\Models\Address;
use App\Models\User;
use App\Models\Transaction;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;

class UserController extends Controller
{
    //
    public function index()
    {
        return view('user.index');
    }
    
    public function account_orders()
    {
    $orders = Order::where('user_id',Auth::user()->id)->orderBy('created_at','DESC')->paginate(10);
    return view('user.orders',compact('orders'));
    }
    public function account_order_details($order_id)
    {
            $order = Order::where('user_id',Auth::user()->id)->find($order_id);        
            $orderItems = OrderItem::where('order_id',$order_id)->orderBy('id')->paginate(12);
            $transaction = Transaction::where('order_id',$order_id)->first();
            return view('user.order-details',compact('order','orderItems','transaction'));
    }
    public function account_cancel_order(Request $request)
    {
        $order = Order::find($request->order_id);
        $order->status = "canceled";
        $order->canceled_date = Carbon::now();
        $order->save();
        return back()->with("status", "Order has been cancelled successfully!");
    }
    public function account_address()
    {
        $address = Address::where('user_id',Auth::user()->id)->orderBy('created_at','DESC')->paginate(10);
        //dd($address);
        return view('user.address',compact('address'));
    }
    public function address_update(Request $request)
    {
        $user_id = Auth::user()->id;
        $address = Address::where('user_id',$user_id)->where('isdefault',true)->first();
        //dd($request->all());
        if(!$address)
        {
            
            $request->validate([                
                'name' => 'required|max:100',
                'phone' => 'required|numeric|digits:8',
                'zip' => 'required|numeric|digits:6',
                'state' => 'required',
                'city' => 'required',
                'address' => 'required',
                'locality' => 'required'
            ]);

            $address = new Address();    
            $address->user_id = $user_id;    
            $address->name = $request->name;
            $address->phone = $request->phone;
            $address->zip = $request->zip;
            $address->state = $request->state;
            $address->city = $request->city;
            $address->address = $request->address;
            $address->locality = $request->locality;
            $address->landmark = '';
            $address->country = '';
            $address->isdefault = true;
            $address->save();
        } else {
            
            $request->validate([                
                'name' => 'required|max:100',
                'phone' => 'required|numeric|digits:8',
                'zip' => 'required|numeric|digits:6',
                'state' => 'required',
                'city' => 'required',
                'address' => 'required',
                'locality' => 'required',      
            ]);  
            $address = Address::find($request->id);
            $address->user_id = $user_id;    
            $address->name = $request->name;
            $address->phone = $request->phone;
            $address->zip = $request->zip;
            $address->state = $request->state;
            $address->city = $request->city;
            $address->address = $request->address;
            $address->locality = $request->locality;
            $address->landmark = '';
            $address->country = '';
            $address->isdefault = true;
            $address->save();
        }

        return redirect()->route('user.account.address')->with('status','Address has been updated succesfully');;
    }
    public function account_profile()
    {
        $profile = User::where('id',Auth::user()->id)->orderBy('created_at','DESC')->paginate(10);
        return view('user.profile',compact('profile'));
    }
}

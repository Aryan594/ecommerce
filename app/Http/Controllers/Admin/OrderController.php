<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\OrderDetails;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class OrderController extends Controller
{
    function index(){
        $orders = Order::all();
        foreach($orders as $order)
        {
            $order_details = OrderDetails::where('order_id',$order->id)->get();
            foreach($order_details as $details)
            {
                $product = Product::where('id',$details->product_id)->first();
                $details['product_name'] = $product->product_name;
            }
            $order['order_details'] = $order_details; 
        }

        return view('admin.order.index',compact('orders'));
    }

    function changeOrderDetails(Request $request,$id){
        $order = Order::find($id);
        $order->payment_status = $request->payment_status;
        $order->order_status = $request->order_status;
        $order->save();

        return back()->with('message','Order Details Updated');

    }
    function orderdestroy($id)
    {
            $order = Order::find($id);
            $order->delete();
    
            return back();
        
    }
    function userindex(){
        $orders = Order::all();
        foreach($orders as $order)
        {
            $order_details = OrderDetails::where('order_id',$order->id)->get();
            foreach($order_details as $details)
            {
                $product = Product::where('id',$details->product_id)->first();
                $details['product_name'] = $product->product_name;
            }
            $order['order_details'] = $order_details; 
        }

        return view('user.layout.userOrder',compact('orders'));
    }
    public function cancelOrder($orderId)
    {
        // Retrieve the order from the database
        $order = Order::find($orderId);

        if ($order) {
            // Revert any changes made during the order processing
            // For example, delete the order from the database or update its status
                // Revert changes to the database here
                // For example:
                 $order->delete(); // Delete the order
                // or
                // $order->status = 'cancelled'; // Update the order status
                // $order->save();
            

            // Redirect the user to an appropriate page (e.g., order cancellation confirmation page)
            return redirect()->route('order.cancelled', ['order_id' => $orderId]);
        } else {
            // Handle the case where the order is not found
            // Redirect or show an error message as per your requirement
            return redirect()->route('home');
        }
    }
}

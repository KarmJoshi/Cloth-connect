<?php

namespace App\Http\Controllers;

use App\Mail\WelcomeEmail;
use Illuminate\Http\Request;
use App\Models\ngos;
use App\Models\user_donation;
use App\Models\client;
use App\Models\cart;
use App\Models\order;
use App\Models\delivery;
use Illuminate\Support\Facades\Mail;

class NgoController extends Controller
{
    public function register(Request $request){
        $data = new ngos();
        $data->NGOname = $request->TxtNGOname;
        $data->address = $request->TxtAddress;
        $data->mobilenumber = $request->TxtMobileNumber;
        $data->email = $request->TxtEmail;
        $data->password = bcrypt($request->TxtPassword);
        if($data->save()){
            $to = $request->TxtEmail; 
            $sub="Welcome to cloth connect";
            $mes='';
           // Mail::to($to)->send(new WelcomeEmail($data->NGOname,$sub,$mes));
            return view("login");
        }else{
            return "something went wrong";
        }
    }
    public function viewuser(Request $request){
        //$data = new ngos();
        if ($request->session()->has('NID')){
            $user_id = session()->get('NID');
            $ngo = ngos::where('NID', $user_id)->first();
            return view('ngo_profile',['ngo'=>$ngo]);
        }else {
            return redirect('/login')->with('error', 'Please login first.');
        }
    }

    public function updateuser(Request $request){
        if ($request->session()->has('NID')){
            $user_id = session()->get('NID');
            $ngo = ngos::where('NID', $user_id)->first();
        
            $changes = false;
            if ($request->NGOName !== $ngo->NGOname) {
                $changes = true;
                //$ngo -> update(['NGOname'=> $request->NGOName]);
                $ngo->NGOname = $request->NGOName;
                $ngo->save();
            }
            if ($request->Address !== $ngo->address) {
                $changes = true;
               // $ngo -> update(['address'=> $request->FirstName]);
                $ngo ->address = $request->Address;
                $ngo->save();
            }
            if ($request->Email !== $ngo->email) {
                $changes = true;
              //  $ngo -> update(['lastname'=> $request->Lastname]);
                $ngo->email = $request->Email;
                $ngo->save();
            }
            
            if ($changes) {
                return redirect('ngo-profile');
            }
            else{
                return response()->json(['message'=> 'no change found'], 200);
            }
        }else {
            return redirect('/login')->with('error', 'Please login first.');
        }
    }

    public function homepage(Request $request){
        if ($request->session()->has('NID')){
          //  $NID = session()->get('NID');
           // $ngo = ngos::where('NID', $user_id)->first();
            $donations = user_donation::Join('clients', 'user_donations.CID', '=', 'clients.CID')
            ->select('user_donations.*', 'clients.*')
            ->get();
            return view('ngo_homepage')->with('donation', $donations);
        }
        else{
            return redirect('/login')->with('error', 'Please login first.');
        }
    }
    public function addtocart(Request $request,$UDID){
        $NID = session()->get('NID');

        // Check if the item already exists in the cart
        $exists = cart::where('NID', $NID)->where('UDID', $UDID)->exists();

        if ($exists) {
            return redirect('ngo-homepage')->with('error', 'Item already in the cart.');
        }

        // If not exists, insert into the cart
        $data = new cart();
        $data->UDID = $UDID;
        $data->NID = $NID;

        if ($data->save()) {
            return redirect('ngo-homepage')->with('success', 'Item added to cart successfully.');
        } else {
            return redirect('ngo-homepage')->back()->with('error', 'Something went wrong.');
        }
    }

    public function cart(Request $request){
        if ($request->session()->has('NID')){
            $NID = $request->session()->get('NID');
            $cart = new cart();
            $donation = new user_donation();
         //   $get = cart::where('NID', $NID)->get();
            $cartdata = user_donation::Join('carts', 'user_donations.UDID', '=', 'carts.UDID')
            ->where('carts.NID', $NID)
            ->select('user_donations.*', 'carts.*')
            ->get();
            
    
            return view('cart')->with('cartdata', $cartdata);
        }
    }
    
    public function remove(Request $request, $UDID){
        if ($request->session()->has('NID')) {
            $NID = session()->get('NID');
    
            // Check if the cart item exists
            $cartItem = cart::where('NID', $NID)->where('UDID', $UDID)->first();
            if ($cartItem) {
                cart::where('NID', $NID)->where('UDID', $UDID)->delete();
                return redirect('ngo-cart')->with('success', 'Item removed from cart.');
            } else {
                return redirect()->back()->with('error', 'Item not found in cart.');
            }
        }
        return redirect()->route('login')->with('error', 'Please log in first.');
    }

    public function request(Request $request, $UDID){
        $NID = session()->get('NID');
        $order = new order();
        $ngo = ngos::where('NID',$NID)->first();
        $user_donation = user_donation::where('UDID', $UDID)->first();
        $CID = $user_donation->CID;
        $client = client::where('CID', $CID)->first();
        $order->UDID = $UDID;
        $order->CID = $CID;
        $order->NID = $NID;
        $order->firstname = $client->firstname;
        $order->lastname = $client->lastname;
        $order->NGOname = $ngo->NGOname;
        $order->client_email = $client->email;
        $order->NGO_email = $ngo->email;
        $order->pickup_address = $user_donation->address;
        $order->drop_address = $ngo->address;
        $order->client_mobilenumber = $user_donation->mobilenumber;
        $order->type = $user_donation->Type;
        $order->size = $user_donation->size;
        $order->number=$user_donation->number;
        if($order -> save()){
            user_donation::where('UDID',$UDID)->delete();
            $this->delivery();
            return redirect('ngo-cart');
        }         
    }

    public function delivery(){
        $NID = session()->get('NID');
        $delivery = new Delivery();
        $order = order::where('NID', $NID)->first();
        $delivery->OID = $order->OID;
        $delivery->status = "Pending";
        $delivery->time = "Pending";
        $delivery-> save();
    }

    public function orders(Request $request){
        if ($request->session()->has('NID')) {
            $NID = session()->get('NID');
            $orders = Order::where('NID',$NID)->get();
            return view('ngo_order_history')->with('orders', $orders);

        }else{
            return redirect()->route('login')->with('error', 'Please log in first.');
        }
    }
}
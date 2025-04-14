<?php

namespace App\Http\Controllers;

use App\Mail\WelcomeEmailForLogistics;
use App\Models\delivery;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

use App\Models\logistics;

class LogisticsController extends Controller
{
    public function register(Request $request){
        $data = new logistics();
        $data->companyname = $request->TxtCompanyName;
        $data->address = $request->TxtAddress;
        $data->email = $request->TxtEmail;
        $data->password = bcrypt($request->TxtPassword);
        $data->mobilenumber = $request->TxtMobileNumber;
        if($data->save()){
            $to = $request->TxtEmail; 
            $sub="Welcome to cloth connect";
            $mes='';
          //  Mail::to($to)->send(new WelcomeEmailForLogistics($data->name,$sub,$mes));
            return view('login');
        }
    }
    public function viewuser(Request $request){
        if ($request->session()->has('LID')){
            $LID = session()->get('LID');
            $logistics = logistics::where('LID',$LID)->first();
            return view('logistics_profile')->with('logistics',$logistics);
        }
    }
    public function updateuser(Request $request){
        if($request->session()->has('LID')){
            $LID = session()->get('LID');
            $logistics = logistics::where('LID', $LID)->first();
        
            $changes = false;
            if ($request->CompanyName !== $logistics->companyname) {
                $changes = true;
                //$logistics -> update(['logisticsname'=> $request->logisticsName]);
                $logistics->companyname = $request->CompanyName;
                $logistics->save();
            }
            if ($request->Address !== $logistics->address) {
                $changes = true;
               // $logistics -> update(['address'=> $request->FirstName]);
                $logistics ->address = $request->Address;
                $logistics->save();
            }
            if ($request->Email !== $logistics->email) {
                $changes = true;
              //  $logistics -> update(['lastname'=> $request->Lastname]);
                $logistics->email = $request->Email;
                $logistics->save();
            }
            if ($request->MobileNumber !== $logistics->mobilenumber) {
                $changes = true;
              //  $logistics -> update(['lastname'=> $request->Lastname]);
                $logistics->mobilenumber = $request->MobileNumber;
                $logistics->save();
            }
            
            if ($changes) {
                return redirect('logistics-profile');
            }
            else{
                return response()->json(['message'=> 'no change found'], 200);
            }
        }else {
            return redirect('/login')->with('error', 'Please login first.');
        }
    }
    public function delivery(Request $request){
        if($request->session()->has('LID')){
          //  $LID = session()->get('LID');
            $data = delivery::Join('orders', 'deliverys.OID', '=', 'orders.OID')
            ->select('deliverys.*', 'orders.*')->where('deliverys.status', 'Pending')
            ->get();
            
            return view('logistics_homepage')->with('data',$data);
        }else{
            return redirect('/login')->with('error', 'Please login first.');
        }
    }
    public function done($DID){
        $delivery = delivery::where('DID', $DID)->first();
        $delivery->status = "Done";
        if($delivery->save()){
            return redirect("logistics-homepage");
        }
        else{
            echo "Something with wrong";
        }
    }
    
    public function pickup_time(Request $request)
    {
        $date = $request->input('date');
        $timeSlot = $request->input('timeSlot');
        $DID = $request->input('DID');
        $delivery = delivery::where('DID', $DID)->first();
        if ($delivery->pickup_date !== null && $delivery->time !== 'Pending') {
            return redirect()->back()->with('error', 'Pickup has already been scheduled!');
        }
        $delivery->time = $timeSlot;
        $delivery->pickup_date = $date;
        $OID = $delivery->OID;
        $LID = session()->get('LID');
        $delivery->LID = $LID;
        echo $LID;
        if($delivery->save()){
            $data = delivery::Join('orders', 'deliverys.OID', '=', 'orders.OID')
            ->select('deliverys.*', 'orders.*')->where('orders.OID',$OID)
            ->first();

            $data2 = delivery::Join('logistics', 'deliverys.LID', '=', 'logistics.LID')
            ->select('deliverys.*', 'logistics.*')->where('logistics.LID',$LID)
            ->first();
            // // Format date
            $formattedDate = \Carbon\Carbon::parse($date)->format('l, d F Y');

            // Prepare message
            $messageBody = "Dear {$data->firstname}{$data->lastname},\n\n";
            $messageBody .= "Your donation pickup has been scheduled as follows:\n";
            $messageBody .= "📅 Date: $formattedDate\n";
            $messageBody .= "⏰ Time Slot: $timeSlot\n\n";
            $messageBody .= "👕 Type: {$data->type}\n";
            $messageBody .= "📏 Size: {$data->size}\n";
            $messageBody .= "🔢 Quantity: {$data->number}\n\n";
            $messageBody .= "Company Name: {$data2->companyname}\n";
            $messageBody .= "📞 Contact Number: {$data2->mobilenumber}\n\n";
            $messageBody .= "Thank you for your support!\n";
            $messageBody .= "Team ClothConnect";

            // Send email
            Mail::raw($messageBody, function ($message) use ($data) {
                $message->to($data->client_email)
                    ->subject('✅ Your Pickup Schedule is Confirmed');
            });
            return redirect()->route('logistics.homepage');
        }
    }
    

    public function history(Request $request){
        if($request->session()->has('LID')){
            $data = delivery::Join('orders', 'deliverys.OID', '=', 'orders.OID')
            ->select('deliverys.*', 'orders.*')->where('deliverys.status', 'Done')
            ->get();
            return view('logistics_delivery_history')->with('data',$data);
        }else{
            return redirect('/login')->with('error', 'Please login first.');
        }
    }
}
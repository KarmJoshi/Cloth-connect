<?php

namespace App\Http\Controllers;

use App\Mail\WelcomeEmailForUser;
use App\Models\user_donation;
use App\Models\donation_history;
use Illuminate\Http\Request;
use App\Models\Client; // Use correct Model (Singular)

use Illuminate\Support\Facades\Mail;

class UserController extends Controller
{
    
    public function register(Request $request)
    {
        // Creating a new Client instance
        $client = new Client(); // Use the correct model

        // Assigning values from the request
        $client->firstname = $request->TxtFirstname;
        $client->lastname = $request->TxtLastname;
        $client->mobilenumber = $request->TxtMobileNumber;
        $client->email = $request->TxtEmail;
        $client->password = bcrypt($request->TxtPassword); // Encrypt password

        // Save data and return response
        if ($client->save()) {
            $to = $request->TxtEmail; 
            $sub="Welcome to cloth connect";
            $mes='';
           // Mail::to($to)->send(new WelcomeEmailForUser($client->firstname,$sub,$mes));
            return view('login');
        } else {
            return response()->json(["message" => "Data is not inserted"], 500);
        }
    }

    public function homePage(Request $request){
            $user_id = $request->session()->get('CID');
            $donation = donation_history::where('CID', $user_id)->get();
            return view('user_homepage')->with('donation', $donation);
    }
    public function donation(Request $request){
   
        $user_id = $request->session()->get('CID');
        $donation = new user_donation();
        $donation->CID = $user_id;
        $donation->address = $request->address;
        $donation->area = $request->area;
        $donation->city = $request->city;
        $donation->type = $request->type;
        $donation->size = $request->size;
        $donation->number = $request->number;
        $donation->mobilenumber = $request->mobilenumber;

        $history = new donation_history();
        $history->CID = $user_id;
        $history->address = $request->address;
        $history->area = $request->area;
        $history->city = $request->city;
        $history->type = $request->type;
        $history->size = $request->size;
        $history->number = $request->number;
        $history->mobilenumber = $request->mobilenumber;
        
        if ($request->hasFile('image01')) {
            $imagePath = $request->file('image01')->store('donations', 'public'); // Save in storage/app/public/donations
            $donation->image01 = $imagePath; // Store image path in DB
            $history->image01 = $imagePath;
            $history->save();
        }

        if ( $donation->save() ) {
            return redirect('user-donation');
        } else {
            return response()->json(['message' => 'Failed to insert image.'], 500);
        }
        
    }

    public function viewuser(Request $request){
        $user_id = session()->get('CID');
        $client = client::where('CID', $user_id)->first();
        return view('user_profile',['client'=>$client]);
    }

    public function updateuser(Request $request){
        $user_id = session()->get('CID');
        $client = client::where('CID', $user_id)->first();
        $changes = false;
        if ($request->FirstName !== $client->firstname) {
            $changes = "firstname";
            $client -> update(['firstname'=> $request->FirstName]);
            $client->firstname = $request->FirstName;
            $client->save();
        }
        if ($request->LastName !== $client->lastname) {
            $changes = true;
            $client -> update(['firstname'=> $request->FirstName]);
            $client->lastname = $request->LastName;
            $client->save();
        }
        if ($request->Email !== $client->email) {
            $changes = true;
            $client -> update(['lastname'=> $request->Lastname]);
            $client->email = $request->Email;
            $client->save();
        }
        
        if ($changes) {
            // return redirect('user-profile');
            if ($request->ajax()) {
            return response()->json([
                'success' => true,
                'updatedFields' => $client,
            ]);
        }
        return redirect('user-profile')->with('success', 'Profile updated!');
        }
        else{
            return response()->json(['message'=> 'no change found'], 200);
        }
    }
}

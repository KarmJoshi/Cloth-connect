<?php

namespace App\Http\Controllers;

use App\Models\logistics;
use Illuminate\Http\Request;
use App\Models\admin;
use App\Models\ngos;
use App\Models\client;
use Illuminate\Support\Facades\Redirect;

class AdminController extends Controller
{
    public function register(Request $request){
        $admin = new admin();
        $admin->firstname = $request->FirstName;
        $admin->lastname = $request->LastName;
        $admin->email = $request->Email;
        $admin->password = bcrypt($request->Password);
        if($admin->save()){
            return view('login');
        }
    }
    public function approval(){
        $ngo = ngos::all();
        return view('admin_homepage')->with('ngos', $ngo);
    }
    public function approved($NID){
        $ngo = ngos::where('NID', $NID)->first();
        $ngo->status="Approved";
        if($ngo->save()){
            return redirect("admin-homepage");
        }
    }
    public function donorlist(){
        $donors = client::all();
        return view('admin_donar_list')->with('donors', $donors);
    }
    public function list($CID){
        $client = Client::where('CID', $CID)->first();
        return view('edit_donor')->with('client',$client);        
    }
    public function edit($CID,Request $request){
        $client = client::where('CID', $CID)->first();
        $changes = false;
        if ($request->FirstName !== $client->firstname) {
            $changes = true;
            //$client -> update(['firstname'=> $request->FirstName]);
            $client->firstname = $request->FirstName;
            $client->save();
        }
        if ($request->LastName !== $client->lastname) {
            $changes = true;
            //$client -> update(['firstname'=> $request->FirstName]);
            $client->lastname = $request->LastName;
            $client->save();
        }
        if ($request->Email !== $client->email) {
            $changes = true;
            //$client -> update(['lastname'=> $request->Lastname]);
            $client->email = $request->Email;
            $client->save();
        }
        if($request->MobileNumber !== $client->mobilenumber){
            $changes = true;
            $client->mobilenumber = $request->MobileNumber;
            $client->save();
        }
        if ($changes) {
            return view('edit_donor')->with('client',$client);
        }
        else{
            return response()->json(['message'=> 'no change found'], 200);
        }
    }
    public function delete($CID){
        $client = client::where('CID', $CID)->first();
        $client->delete();
        return redirect('admin-donar-list');
    }
    public function NGO_list(){
        $ngos = ngos::all();
        return view('admin_ngo_list')->with('ngos', $ngos);
    }    
    
    public function NGO_form_list($NID){
      $ngo = ngos::where('NID',$NID)->first();
      return view('admin_ngo_edit')->with('ngo', $ngo);
    }

    public function NGO_edit($NID,Request $request){

        $ngo = ngos::where('NID', $NID)->first();
        $changes = false;
        if ($request->NGOName !== $ngo->NGOName) {
            $changes = true;
            //$client -> update(['firstname'=> $request->FirstName]);
            $ngo->NGOName = $request->NGOName;
            $ngo->save();
        }
        if ($request->Address !== $ngo->address) {
            $changes = true;
            $ngo->address = $request->Address;
            $ngo->save();
        }
        if ($request->Email !== $ngo->email) {
            $changes = true;
            //$client -> update(['lastname'=> $request->Lastname]);
            $ngo->email = $request->Email;
            $ngo->save();
        }
        if($request->MobileNumber !== $ngo->mobilenumber){
            $changes = true;
            $ngo->mobilenumber = $request->MobileNumber;
            $ngo->save();
        }
        if ($changes) {
            return view('admin_ngo_edit')->with('ngo',$ngo);
        }
        else{
            return response()->json(['message'=> 'no change found'], 200);
        }
    }

    public function NGO_delete($NID){
        $ngo = Ngos::where('NID', $NID);
        $ngo->delete();
        return redirect('admin-NGO-list');
    }

    public function logistics_list(){
        $logistics = logistics::all();
        return view('admin_logistics_list')->with('logistics',$logistics);
    }
    
    public function logistics_form_list($LID){
        $logistics = logistics::where('LID', $LID)->first();
        return view('admin_logistics_edit')->with('log',$logistics);
    }
    public function logistics_edit($LID,Request $request){
        $logistics = logistics::where('LID',$LID)->first();
        $changes = false;
        if ($request->CompanyName !== $logistics->companyname) {
            $changes = true;
            //$client -> update(['firstname'=> $request->FirstName]);
            $logistics->companyname = $request->CompanyName;
            $logistics->save();
        }
        if ($request->Address !== $logistics->address) {
            $changes = true;
            $logistics->address = $request->Address;
            $logistics->save();
        }
        if ($request->Email !== $logistics->email) {
            $changes = true;
            //$client -> update(['lastname'=> $request->Lastname]);
            $logistics->email = $request->Email;
            $logistics->save();
        }
        if ($request->MobileNumber !== $logistics->mobilenumber) {
            $changes = true;
            $logistics->mobilenumber = $request->MobileNumber;
            $logistics->save();
        }
        if ($changes) {
            return view('admin_logistics_edit')->with('log',$logistics);
        }
        else{
            return response()->json(['message'=> 'no change found'], 200);
        } 
    }
    public function logistics_delete($LID){
        $logistics = logistics::where('LID',$LID)->first();
        $logistics->delete();
        return redirect('admin-logistics-list');
    }
}

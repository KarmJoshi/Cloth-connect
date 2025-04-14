<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\client;
use App\Models\ngos;
use App\Models\logistics;
use App\Models\admin;
use Illuminate\Support\Facades\Mail;
class AuthController extends Controller
{
    public function login(Request $request){
        $email = $request->email;
        $password = $request->password;
        $client = Client::where("email", $request->email)->first();
        $ngos = ngos::where("email", $request->email)->first();
        $logistics = logistics::where("email", $request->email)->first();
        $admin = admin::where("email", $request->email)->first();
        if($client == true){
            if (Auth::guard('web')->attempt(['email' => $email, 'password' => $password])) {
                session(['CID' => $client->CID]);
                return response()->json([
                    'success' => true,
                    'redirect' => url('/user-homepage')
                ]);
            } else {
                return response()->json([
                    'success' => false,
                    'errorMessage' => 'Please check your email and password and try again.'
                ]);
            }    
        }
        if($ngos == true){
            if (Auth::guard('ngos')->attempt(['email' => $email, 'password' => $password])) {
                session(['NID' => $ngos->NID]);
                return response()->json([
                    'success' => true,
                    'redirect' => url('/ngo-homepage')
                ]);
                //return redirect('ngo-homepage');
            }else {
                return response()->json([
                    'success' => false,
                    'errorMessage' => 'Please check your email and password and try again.'
                ]);
                //return redirect('/login')->with('error', 'Please check your email and password and try again.');
            }    
        }
        if($logistics == true){
            if (Auth::guard('logistics')->attempt(['email' => $email, 'password' => $password])) {
                session(['LID' => $logistics->LID]);
                return response()->json([
                    'success' => true,
                    'redirect' => url('/logistics-homepage')
                ]);
               // return redirect('logistics-homepage');
            }else {
                return response()->json([
                    'success' => false,
                    'errorMessage' => 'Please check your email and password and try again.'
                ]);
                //return redirect('/login')->with('error', 'Please check your email and password and try again.');
            }    
        }
        if($admin == true){
            if (Auth::guard('admins')->attempt(['email' => $email, 'password' => $password])) {
                session(['AID' => $admin->AID]);
                return response()->json([
                    'success' => true,
                    'redirect' => url('/admin-homepage')
                ]);
                //return redirect('admin-homepage');
            }else {
                return response()->json([
                    'success' => false,
                    'errorMessage' => 'Please check your email and password and try again.'
                ]);
                //return redirect('/login')->with('error', 'Please check your email and password and try again.');
            }    
        }
    }
    
    public function sendOtp(Request $request){
        $client = Client::where("email", $request->TxtEmail)->first();
        $ngos = ngos::where("email", $request->TxtEmail)->first();
        $logistics = logistics::where("email", $request->TxtEmail)->first();
        if($client == true){
            $otp = rand(1000,9999);
            $client->otp = $otp;
            $client->save();
            // send mail 
            mail::raw("Your OTP for pasword reset is : $otp",function($message) use ($client){
                $message->to($client->email)
                ->subject('password reset otp');
            });

            $role = "Client";
            session(['ID'=>$client->CID]);
            session(['role'=>$role]);
            session(['table_filed' => 'CID']);
            return view('otp_verification');
        }
        if($ngos == true){
            $otp = rand(1000,9999);
            $ngos -> otp = $otp;
            $ngos -> save();

            mail::raw("Your OTP for pasword reset is : $otp",function($message) use ($ngos){
                $message->to($ngos -> email)
                ->subject('password reset otp');
            });

            $role = "ngos";
            session(['ID'=>$ngos->NID]);
            session(['role'=>$role]);
            session(['table_filed' => 'NID']);
            return view('otp_verification');
        }
        if($logistics == true){
            $otp = rand(1000,9999);
            $logistics->otp = $otp;
            $logistics -> save();

            mail::raw("Your OTP for pasword reset is : $otp",function($message) use ($logistics){
                $message->to($logistics -> email)
                ->subject('password reset otp');
            });

            $role = "logistics";
            session(['ID'=>$logistics->LID]);
            session(['role'=>$role]);
            session(['table_filed' => 'LID']);
            return view('otp_verification');
        }
    }

    public function otpVerification(Request $request){
        $ID = $request->session()->get('ID');
        $role = $request->session()->get('role');
        $table_ID = $request->session()->get('table_filed');
        $modelClass = "App\\Models\\$role";
        $client = $modelClass::where($table_ID,$ID)->first();
        if($client->otp == $request->TxtOtp){
            return view('password_reset');
            }
    }
    public function passwordReset(Request $request){
        $ID = $request->session()->get('ID');
        $role = $request->session()->get('role');
        $table_ID = $request->session()->get('table_filed');
        $modelClass = "App\\Models\\$role";
        $client = $modelClass::where($table_ID,$ID)->first();
        if($request->TxtpasswordReset === $request->TxtpasswordConfirm){
            $client->password = bcrypt($request->TxtpasswordConfirm);
            if($client->save()){
                $request->session()->invalidate();
                $request->session()->regenerateToken();
                return view('login');
            }
        }
    }

    public function logout(Request $request) {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/login');
    }
}

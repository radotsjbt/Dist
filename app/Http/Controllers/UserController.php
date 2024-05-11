<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Distributor;
use App\Models\Farmer;
use Illuminate\Support\Facades\Auth;
use RealRashid\SweetAlert\Facades\Alert;
use Haruncpi\LaravelIdGenerator\IdGenerator;
use Illuminate\Support\Facades\DB;

class UserController extends Controller
{
    // store the data  of users that regist through the form
    public function store(){
     // create the new user
     $user = new User(); 
        $user->username = request('username');
        $user->phone = request('phone');
        $user->address = request('address');
        $user->email = request('email');
        $user->password = request('password');
        $user->role = request('role');
        //Condition based on the user's role when they're create account
        
            if($user->role === 'Farmer'){
                // create new farmer
                $farm = new Farmer();
                $farm->Farmer_ID = IdGenerator::generate([
                'table' => 'farmers',
                'length' => 7,
                'field' => 'Farmer_ID',
                'prefix' => 'FMR'
                ]);
                
                //And also insert the data to the farmer's table
                $user->User_ID= $farm->Farmer_ID;
                $farm->Farmer_Name = $user->username;
                $farm->Farmer_Email = $user->email;
                $farm->Farmer_Phone = $user->phone ;
                $farm->Farmer_Address = $user->address;

                $farm->save(); //insert to farmers table
            }
            if($user->role === 'Distributor'){
                 // create new customer
                $dist = new Distributor();
                $dist->Dist_ID = IdGenerator::generate([
                'table' => 'distributors',
                'length' => 7,
                'field' => 'Dist_ID',
                'prefix' => 'DSB'
                ]);
                
                //And also insert the data to the distributor's table 
                // $dist->Dist_ID = $user->User_ID;
                $user->User_ID= $dist->Dist_ID;
                $dist->Dist_Name = $user->username;
                $dist->Dist_Email = $user->email ;
                $dist->Dist_Phone = $user->phone;
                $dist->Dist_Address = $user->address;
             
                $dist->save(); //insert to distributors table
            }
// if($user->role ==='Farmer'){
//     $user->User_ID = $farm->Farmer_ID;
// }
// if($user->role === 'Distributor'){
//     $user->User_ID = $dist->Dist_ID;
// }
        
        $user->save(); //insert to users table
        return redirect('/auth/login');
    }

    public function authenticate(Request $request){
        $credentials = $request->validate([
            'email'=> 'required|email:dns',
            'password' => 'required'
        ]);
       

        if (Auth::attempt($credentials)) {

            //alert if the user succes to login
            Alert::success('Login Successfully');

            $request->session()->regenerate(); //session regenerate is to prevent session fixation attacks

            // the user will go to the dashboard
            return redirect()->intended('/dashboard');
        }
        //if the user failed to login
        return back()->with('loginError','Invalid Username and Password!');
        
    }

    public function logout(){
        Auth::logout();
        request()->session()->invalidate();
        request()->session()->regenerateToken();
        
        return redirect('/auth/login');
    }


    // show the profile of the user
    public function show($id){
        return view('/dashboard/profile/index', [ 
            'title' => 'User Profile',  
            'profile' => User::find($id)     
            ]);
    }

    public function update(Request $request, $id){
        $user = User::find($id);
        $usID = $user->User_ID; //get Farmer_ID = ex: FMR0005

    
        $username = $request->input('username'); 
        $address = $request->input('address'); 
        $phone = $request->input('phone'); 
        $email = $request->input('email'); 
        
        if($user->role === 'Farmer'){
            
            $Farmer_Name = $username;
            $Farmer_Address = $address;
            $Farmer_Phone = $phone;
            $Farmer_Email = $email;

            // update to table farmers
            DB::update('update farmers set Farmer_Name=?, Farmer_Address=?,  Farmer_Phone=?, Farmer_Email=? where Farmer_ID=?', [$Farmer_Name, $Farmer_Address,  $Farmer_Phone, $Farmer_Email, $usID]);

            // // update to table harvests
            DB::update('update harvests, offering set Farmer_Name=? where Farmer_Id=?', [$Farmer_Name, $id]);

           
        }
        if($user->role === 'Distributor'){

            $Dist_Name = $username;
            $Dist_Address = $address;
            $Dist_Phone = $phone;
            $Dist_Email = $email;

            // update to table distributors
            DB::update('update distributors set Dist_Name=?, Dist_Address= ?,  Dist_Phone=?, Dist_Email=? where Dist_Id=?', [$Dist_Name, $Dist_Address, $Dist_Phone, $Dist_Email, $usID]);

             // update to table orders
             DB::update('update orders set Dist_Name=? where Dist_Id=?', [$Dist_Name, $id]);

            // update to table offering
            DB::update('update offering set Dist_Name=? where Dist_Id=?', [$Dist_Name, $id]);

        }
        
        
        // update the data on database (table users)
        DB::update('update users set username=?, address=?,  phone=?, email=? where id=?', [$username, $address, $phone, $email, $id]);


        // return view('/dashboard/profile/index', [ 
        //     'title' => 'User Profile',  
        //     'profile' => User::find($id)     
        //     ]);
        return back();
    }

}

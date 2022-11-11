<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;

class CostumerController extends Controller
{
    //Show Register/Create Form
    public function create(){
        return view('Users.register');
    } 

    //Create New User
    public function store(Request $request){
        // Validating The Fields
        $formFields = $request->validate([
            'name'=>['required','min:3'],
            'username'=>['required',Rule::unique('users')],
            'address'=>['required'],
            'contact_1'=>['required'],
            'contact_2'=>['required'],
            'note'=>"",
            'password'=>['required','confirmed','min:6']
        ]);

        //Hashing Password
        $formFields['password'] = bcrypt($formFields['password']);

        //Create User
        $user = User::create($formFields);

        //Login
        auth()->login($user);

        return redirect('/')->with('message','User created and Logged in');
    }

    //Logout User
    public function logout(Request $request){
        //Logging Out User
        auth()->logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/')->with('message','You Have Been Logged Out!');
    }

    //Show Login Form
    public function login(){
        return view('Users.login');
    }

    //Authenticate User
    public function authenticate(Request $request){
        //Validating The Fields
        $formFields = $request->validate([
            'username'=>['required'],
            'password'=>['required']
        ]);
        if(auth()->attempt($formFields)){
            $request->session()->regenerate();
            return redirect('/')->with('message','You are now Logged in');
        }else{
            return back()->withErrors(['username'=>'Invalid Credentials'])->onlyInput('username');
        }
    }

    //Show Profile Form
    public function edit(){
        return view("Users.profile");
    }

    public function update(Request $request){
        // Getting User Data Back
        $user = Auth::user();

        //Validating Form Fields
        $formFields = $request->validate([
            'name'=>['required','min:3'],
            'username'=>['required'],
            'address'=>['required'],
            'contact_1'=>['required'],
            'contact_2'=>['required'],
            'note'=>['required'],
            'password'=>['required','confirmed','min:6']
        ]);

        //Updating Form Fields
        $user->update($formFields);
        return back()->with('message','Profile Updated Successfully');
    }

    public function destroy(){
        // Getting User Data
        $user = Auth::user();
        
        //Deleting User
        $user->delete();
        return redirect('/')->with('message','Profile Deleted Successfully');
    }
}
<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class UserController extends Controller
{
    public function index(){
        return view('users.index', [
            'title' => 'Employees',
            'employees'=> User::latest()->get()
        ]);
    }

    public function show(User $user){
        return view('users.show', [
            'emp'=> $user,
            'title'=>'Edit User'
        ]);
    }
    public function create(){
        return view('users.create', [
            'title'=>'Add New User'
        ]);
    }

    //store user data
    public function store(Request $request){
        $formFields = $request->validate([
            'name'=> ['required', 'min:3' ],
            'email'=> ['required', 'email', Rule::unique('users', 'email')],
            'password'=>['required', 'min:4'],
            'phone'=> ['required', 'min:11' ],
            'address'=>'required',
            'staff_dob'=> 'required',
            'marital_status'=>'required',
            'position'=>'required',
            'department'=> 'required',
            'role'=>'required'
           
           
           
        ]);

        //hash password
        $formFields['password'] = bcrypt($formFields['password']);

        //create user 
        $user = User::create($formFields);

        //login user automatically
       // auth()->login($user);

        return redirect('/dashboard')->with('message', 'User created and logged in');


        
    }

    //Log out

    public function logout(Request $request){
        auth()->logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/')->with('message', 'You have been logged out');
    }

    public function authenticate(Request $request){
        $formFields = $request->validate([
            'email'=> ['required', 'email'],
            'password'=>['required', 'min:4']
        ]);

        if(auth()->attempt($formFields)){
            $request->session()->regenerate();

            return redirect('/dashboard');
        }

        return back()->withErrors(['email'=> 'Invalid Credentials'])->onlyInput('email');

    }
}

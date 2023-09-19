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

    public function show($id){
        $user = User::find($id);
        return view('users.show', [
            'emp'=> $user,
            'title'=>'Edit User'
        ]);
    }

    public function profile($id){
        $user = User::find($id);
        return view('users.profile', [
            'emp'=> $user,
            'title'=>'Edit Profile'
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
            'phone'=> ['string', 'min:11' ],
            'address'=>'string',
            'staff_dob'=> 'required',
            'marital_status'=>'string',
            'position'=>'string',
            'department'=> 'string',
            'role'=>'string'
           
           
           
        ]);

        //hash password
        $formFields['password'] = bcrypt($formFields['password']);
        $formFields['position'] = strtolower($formFields['position']);

        //create user 
        $user = User::create($formFields);

        //login user automatically
       // auth()->login($user);

        return redirect('/dashboard')->with('message', 'User created successfully!');


        
    }

    public function update(Request $request, $id){
        $user = User::find($id);
        $formFields = $request->validate([
            'name'=> ['required', 'min:3' ],
            'email'=> ['required', 'email'],
            'phone'=> ['required', 'min:11' ],
            'address'=>'required',
            'staff_dob'=> 'required',
            'marital_status'=>'required'

        ]);



        //upload profilepic
        if($request->hasFile('profilepic')){
            $formFields['profilepic'] = $request->file('profilepic')->store('userimages', 'public');
        }

        //create user 
        $user->update($formFields);

        //login user automatically
       // auth()->login($user);

        return back()->with('message', 'Details updated successfully!');


        
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

    //delete user 

    public function delete($id){
        User::where('id', $id)->delete();

        return back()->with('message', 'User Deleted Successfully!');
    }
}

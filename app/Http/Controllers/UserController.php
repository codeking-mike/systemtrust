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

    //settings
    public function settings($id){
        $user = User::find($id);
        return view('users.settings', [
            'emp'=> $user,
            'title'=>'Change Password'
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
            'phone'=> ['string', 'min:11', 'nullable' ],
            'address'=>['string', 'nullable'],
            'staff_dob'=> ['string', 'nullable'],
            'marital_status'=>['string', 'nullable'],
            'position'=>['string', 'nullable'],
            'emp_date'=> ['string', 'nullable'],
            'cug'=> ['string', 'nullable'],
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
            'address'=>['string', 'nullable'],
            'staff_dob'=> ['string', 'nullable'],
            'marital_status'=>['string', 'nullable'],
            'anniversary'=>['string', 'nullable'],
            'alias'=> ['string', 'nullable' ],
            'cug'=> ['string', 'nullable' ],
            'emp_date'=> ['string', 'nullable' ]

        ]);



        //upload profilepic
        if($request->hasFile('profilepic')){
            $formFields['profilepic'] = $request->file('profilepic')->store('userimages', 'public');
        }

        //update user 
       /* 
        $user->name = $formFields['name'];
        $user->email = $formFields['email'];
        $user->phone = $formFields['phone'];
        $user->address = $formFields['address'];
        $user->staff_dob = $formFields['staff_dob'];
        $user->marital_status = $formFields['marital_status'];
        $user->anniversary = $formFields['anniversary']; 
        $user->alias = $formFields['alias']; 
        $user->cug = $formFields['cug'];
        $user->emp_date = $formFields['emp_date'];  */
        

        $user->update($formFields);

        //login user automatically
       // auth()->login($user);

        return back()->with('message', 'Details updated successfully!');


        
    }

   
//update password
public function password(Request $request, $id){
    $user = User::find($id);
    if($request->input('password') === $request->input('pass2')){

        $formFields = $request->validate([
            'password'=> ['required', 'min:5' ]
        ]);

        $formFields['password'] = bcrypt($formFields['password']);

        $user->password = $formFields['password'];

        $user->update();

        auth()->logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/')->with('message', 'Password Changed Successfully! Kindly login to continue');

        
    }else{
        return back()->with('message', 'Password and confirm password does not match!');
    }


    
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

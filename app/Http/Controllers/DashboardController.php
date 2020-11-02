<?php

namespace App\Http\Controllers;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;


class DashboardController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $all_users = User::all();
        return view('members',['users' => $all_users]);
    }

    public function settings($user)
    {
        if(Auth::id() == $user){
            return view('settings',['user' => User::Find($user)] );
        }

    }


    /**
     * Update the specified user.
     *
     * @param  Request  $request
     * @param  string  $id
     * @return Response
     */

    public function update_user(Request $request)
    {

        $current_user = Auth::user();

        $validatedData = $request->validate([
            'first_name' => ['nullable', 'string', 'max:255'],
            'last_name'  => ['nullable', 'string', 'max:255'],
            'user_name'  => ['required', 'string', 'max:255',
                Rule::unique('users')->ignore($current_user) ],
            'email'      => ['required', 'string', 'email', 'max:255',
                Rule::unique('users')->ignore($current_user) ],
        ]);

        if($validatedData && Auth::id() > 0){
            $status = User::where('id',Auth::id())->update($request->except ('_token'));
            if($status != false && $status != 0){
                $request->session()->flash('status', 'Information Updated');
            }

            return redirect()->back();
        }
    }

}
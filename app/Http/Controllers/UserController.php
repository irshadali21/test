<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserStoreRequest;
use App\Http\Requests\UserUpdateRequest;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Spatie\Permission\Models\Role;

class UserController extends Controller
{
    public function __construct()
    {

        $this->middleware('permission:view-user')->except(['profile', 'profileUpdate']);
        $this->middleware('permission:create-user', ['only' => ['create','store']]);
        $this->middleware('permission:update-user', ['only' => ['edit','update']]);
        $this->middleware('permission:destroy-user', ['only' => ['destroy']]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {

        if ($request->has('search')) {
            $users = User::where('name', 'like', '%'.$request->search.'%')->paginate(setting('record_per_page', 15));
        }else{
            $users= User::paginate(setting('record_per_page', 15));
        }
        $title =  'Manage Users';
        return view('users.index', compact('users','title'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $num = User::count();
        ++$num; // add 1;
        $code = 'USER'.$num;
        // dd(Auth::check());
        if(Auth::user()->hasrole('super-admin')){
        $roles = Role::pluck('name', 'id');
        }else if(Auth::user()->hasrole('coordinator')){
            $roles = Role::whereNotIn('name', ['super-admin', 'coordinator'])->pluck('name', 'id');
        }else{
            $roles = Role::whereNotIn('name', ['super-admin', 'coordinator', 'advisor'])->pluck('name', 'id');
        }
        
        $title = 'Create user';
        return view('users.create', compact('roles', 'title', 'code'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(UserStoreRequest $request)
    {
        $num = User::count();
        ++$num; // add 1;
        $code = 'USER'.$num;
        $userData = $request->except(['role', 'profile_photo']);
        $userData['code'] = $code;
        if ($request->profile_photo) {
            $userData['profile_photo'] = parse_url($request->profile_photo, PHP_URL_PATH);
        }
        if ($request->advoiser_stamp) {
            $userData['advoiser_stamp'] = parse_url($request->advoiser_stamp, PHP_URL_PATH);
        }
        // dd($userData);
        $user = User::create($userData);
        $user->assignRole($request->role);
        flash('User created successfully!')->success();
        return redirect()->route('users.index');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        $title = "User Details";
        if(Auth::user()->hasrole('super-admin')){
            $roles = Role::pluck('name', 'id');
        }else if(Auth::user()->hasrole('coordinator')){
            $roles = Role::whereNotIn('name', ['super-admin', 'coordinator'])->pluck('name', 'id');
        }else{
            $roles = Role::whereNotIn('name', ['super-admin', 'coordinator', 'advisor'])->pluck('name', 'id');
        }
        return view('users.show', compact('user','title', 'roles'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        $title = "User Details";
            if(Auth::user()->hasrole('super-admin')){
                $roles = Role::pluck('name', 'id');
            }else if(Auth::user()->hasrole('coordinator')){
                $roles = Role::whereNotIn('name', ['super-admin', 'coordinator'])->pluck('name', 'id');
            }else{
                $roles = Role::whereNotIn('name', ['super-admin', 'coordinator', 'advisor'])->pluck('name', 'id');
            }
        return view('users.edit', compact('user','title', 'roles'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(UserUpdateRequest $request, User $user)
    {
        $userData = $request->except(['role', 'profile_photo', 'advoiser_stamp']);
        if ($request->profile_photo) {
            $userData['profile_photo'] = parse_url($request->profile_photo, PHP_URL_PATH);
        }
        if ($request->advoiser_stamp) {
            $userData['advoiser_stamp'] = parse_url($request->advoiser_stamp, PHP_URL_PATH);
        }
        $user->update($userData);
        $user->syncRoles($request->role);
        flash('User updated successfully!')->success();
        return redirect()->route('users.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        if ($user->id == Auth::user()->id || $user->id ==1) {
            flash('You can not delete logged in user!')->warning();
            return back();
        }
        $user->delete();
        flash('User deleted successfully!')->info();
        return back();

    }


    public function profile(User $user)
    {
        $title = 'Edit Profile';
        $user=$user->where('id', auth()->user()->id)->firstorFail();
        if(Auth::user()->hasrole('super-admin')){
            $roles = Role::pluck('name', 'id');
        }else if(Auth::user()->hasrole('coordinator')){
            $roles = Role::whereNotIn('name', ['super-admin', 'coordinator'])->pluck('name', 'id');
        }else{
            $roles = Role::whereNotIn('name', ['super-admin', 'coordinator', 'advisor'])->pluck('name', 'id');
        }
        return view('users.profile', compact('title','user', 'roles'));
    }
    public function profileUpdate(UserUpdateRequest $request, User $user)
    {
        if(is_null($request->password)){
            $userData = $request->except(['role', 'profile_photo', 'advoiser_stamp','password', 'password_confirmation']);
        }else{
            $userData = $request->except(['role', 'profile_photo', 'advoiser_stamp']);
        }
        if ($request->profile_photo) {
            $userData['profile_photo'] = parse_url($request->profile_photo, PHP_URL_PATH);
        }
        if ($request->advoiser_stamp) {
            $userData['advoiser_stamp'] = parse_url($request->advoiser_stamp, PHP_URL_PATH);
        }
        $user->update($userData);
        $user->syncRoles($request->role);
    
        $user->update($userData);
        flash('Profile updated successfully!')->success();
        return redirect()->back();
    }
}

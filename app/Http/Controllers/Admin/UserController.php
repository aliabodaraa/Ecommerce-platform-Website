<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use App\Http\Requests\UserRequest;
use Illuminate\Support\Facades\Hash;
use App\Http\Controllers\Controller;
class UserController extends Controller
{
    /**
     * Display a listing of the users
     *
     * @param  \App\Models\User  $model
     * @return \Illuminate\View\View
     */
      public function index()
     {
        //$users=User::all();
        $users=User::where('admin',0)->orderBy('id','desc')->paginate(20);
         return view('admin.users.index',compact('users'));
         //['users'=>$model->paginate(15)]بتجبلي 15 مستخدم
     }
    public function create(){
        return view('admin.users.create');
    }
    public function store(UserRequest $request)
    {//$user=User::findOrFail($id);
        User::create([
           'name'=> $request->name,
           'email'=> $request->email,
           'password' => Hash::make($request['password']),
    ]);
    return redirect()->route('users.index')->withStatus(__('User succussfully created.'));
    }
    public function edit(User $user)
    {
        return view('admin.users.edit',compact('user'));
    }
    public function update(UserRequest $request,User $user)
    {//dd($user->name);
    $user->update($request->merge(['password'=>Hash::make($request->get('password'))])
            ->except([$request->get('password') ? '':'password'])
        );
            return redirect()->route('users.index')->withStatus(__('User succussfully updated.'));
    }
    public function destroy(User $user)
    {// dd($user->id);
        $user->delete();
        return redirect()->route('users.index')->withStatus(__('User succussfully deleted.'));
    }
    }
    // public function index(User $model)
    // {
    //     return view('admin.users.index',['users'=>$model->paginate(15)]);
    // }
    // public function create(){
    //     return view('admin.users.create');
    // }
    // public function store(UserRequest $request,User $model)
    // {
    // $model->create($request->merge(['password'=>Hash::make($request->get('password'))])->all());
    // return redirect()->route('admin.users.index')->withStatus(__('User succussfully created.'));
    // }
    // public function edit(User $user)
    // {
    //     return view('admin.users.edit',compact('user'));
    // }
    // public function update(UserRequest $request,User $user)
    // {
    // $user->update($request->merge(['password'=>Hash::make($request->get('password'))])
    //         ->except([$request->get('password') ? '':'password'])
    //     );
    //         return redirect()->route('admin.users.index')->withStatus(__('User succussfully updated.'));
    // }
    // public function destroy(User $user)
    // { $user->delete();
    //     return redirect()->route('admin.users.index')->withStatus(__('User succussfully deleted.'));
    // }

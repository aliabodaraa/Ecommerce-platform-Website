<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use Illuminate\Http\Request;
//use App\Http\Requests\UserRequest;
use Illuminate\Support\Facades\Hash;
use App\Http\Controllers\Controller;
use App\Http\Requests\UserRequest;
use Illuminate\Support\Facades\Auth;
class AdminController extends Controller
{
    public function __construct()
    {
        $this->middleware('Owner');
    }
    
      public function index()
     {
         $auth_id=Auth::user()->id;
        // dd($auth_id);
         $users=User::where('admin',1)->whereNotIn('id',[$auth_id])->orderBy('id','desc')->paginate(20);
         //->paginate(15);
         return view('admin.admins.index',compact('users'));
         //['users'=>$model->paginate(15)]بتجبلي 15 مستخدم
     }
    public function create(){
        return view('admin.admins.create');
    }
    public function store(UserRequest $request)
    {//$user=User::findOrFail($id);
        User::create([
           'name'=> $request->name,
           'email'=> $request->email,
           'password' => Hash::make($request['password']),
           'admin'=>1
    ]);
    return redirect()->route('admins.index')->withStatus(__('User succussfully created.'));
    }
    public function edit(User $admin)
    {
        return view('admin.admins.edit',['user'=>$admin]);
    }
    public function update(Request $request,User $admin)
    {//dd($admin->id);
      //No Validate
        // $this->validate($request,[
        //     'email' => 'required|unique:users,email,id',
        // ],
        
        // $messages = [
        //         'required' => 'The :attribute field is required11.',
        //         'unique' => 'The :attribute must be unique11',
        //     ]
        // );
      
        
        //  $admin->update([
        //     'name'=> $request->name,
        //     'email'=> $request->email,
        //     'password' => Hash::make($request['password']),
        //  ]);
        $rules=[
            'name'=> 'required|string|min:5|max:30',
            'email'=> 'required|email',
            'password'=> 'min:6|confirmed',
            //confirmed for stract to confirm field password
        ];
        $this->validate($request,$rules);
     $admin->update($request->merge(['password'=>Hash::make($request->get('password'))])
             ->except([$request->get('password') ? '':'password']));
            return redirect()->route('admins.index')->withStatus(__('Admin succussfully updated.'));
    }

    public function destroy(User $admin)
    {// dd($admin->id);
        $admin->delete();
        return redirect()->route('admins.index')->withStatus(__('User succussfully deleted.'));
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


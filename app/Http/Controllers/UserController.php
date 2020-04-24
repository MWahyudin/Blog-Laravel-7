<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use App\Rules\MatchOldPassword;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function index()
    {
        //
        $users = User::Orderby('id', 'ASC')->paginate(5);

        
        return view('admin.user.index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('admin.user.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $data = $request->validate([
            'name' => 'required|min:5',
            'email' => 'required|email',
            'type' => 'required'
        ]);
        
        User::create(array_merge($data, [
            'password' => bcrypt($request->password)
        ]));

        return redirect()->route('user.index')->withSuccess("User berhasil ditambahkan");
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $user = User::findorfail($id);

        return view('admin.user.edit', compact('user'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $user = User::findorfail($id);
        
        $data = $request->validate([
           'name' => 'required|min:5',
           'email' => 'required|email',
           'type' => 'required'
        ]);
        $user->update($data);

        return redirect()->route('user.index')->with('success', 'user berhasil di update');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $user = User::find($id);
        $user->delete();

        return redirect()->back()->withSuccess("User berhasil dihapus");
    }

    public function editpw($id)
    {
        $user = User::findorfail($id);

        return view('admin.user.editpw', compact('user'));
    }

    public function gantipw(request $request, $id)
    {
        $user = User::find($id);
      if(auth()->user()->type == 0){
        $request->validate([
            'passwordlama' => ['required', new MatchOldPassword],
            'passwordbaru' => ['required'],
            'passwordconfirm' => ['required', 'same:passwordbaru']
        ]);
      }
        else {
            $request->validate([
                'passwordbaru' => ['required'],
                'passwordconfirm' => ['required', 'same:passwordbaru']
            ]);
        }
   
        $user->update(['password'=> bcrypt($request->passwordbaru)]);
   
        return redirect()->route('user.index')->withSuccess('Password berhasil diganti');
    }

    
    
    
}
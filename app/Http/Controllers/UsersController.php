<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Inertia\Inertia;
use Illuminate\Support\Facades\Hash;

class UsersController extends Controller
{
    /**
     * Display a listing of the resource.
     */

    public function index()
    {
        $users=User::all();
        return inertia('User/Index',compact('users'));


    }

    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        $request->validate([

            'name' => 'required',
            'email' => 'required',
            'password' => 'required',
        ]);
        $users=new User($request->input());
        $users->password=Hash::make($request->password);
        $users->assignRole('cliente');
        $users->save();
        //echo "Hola mundo";
        return redirect('users');
    }

    /**
     * Display the specified resource.
     */
    public function show(User $users)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(User $users)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $users=User::find($id);
        $users->fill($request->input())->saveOrFail();
        return redirect('users');
    }

    /**
     * Remove the specified resource from storage.
     *   @param \App\Model\Orders
        @return \Illuminate\Http\Response
     */

    public function destroy($id)
    {
        $users=User::find($id);
        $users->delete();
        return redirect('users');
        //return redirect()->route('orders.index');
    }


}
